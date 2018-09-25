<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{
		if ($this->auth->is_login()) redirect(base_url());
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Login :: ".$config["site_name"];
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("login/index", $data);
	}

	function lupa_password()
	{
		if ($this->auth->is_login()) redirect(base_url());
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Lupa Password :: ".$config["site_name"];
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("login/lupa_password", $data);
	}
	
	function do_login()
	{
		if ($this->auth->is_login()) redirect(base_url());
		$email		= $_POST["email"];
		$password	= $_POST["password"];
		$result		= "error";
		$message	= "";
		
		if (empty($email) || empty($password))
		{
			$message	= "Email atau Password tidak boleh kosong.";
		}
		else if ($this->auth->login($email, $password))
		{
			$result		= "success";
			$message	= "Anda berhasil login";
		}
		else
		{
			$message	= "Email atau Password tidak sesuai.";
		}
		
		echo json_encode(array("result" => $result, "message" => $message));
		
	}

	function do_lupa_password()
	{
		$return		= array();
		$email		= $_POST["email"];
		
		$users		= $this->global_model->get_data("mst_user", 1, array("email"), array($email));
		
		if (empty($email)){
			$return	= array("result" => "error", "message" => "Email tidak boleh kosong.");
		}else if ($users->num_rows() == 0){
			$return	= array("result" => "error", "message" => "Email Anda tidak terdaftar.");
		}else{
			$to			= array();
			$cc			= array();
			$subject	= "Lupa Password";
			$content	= "";
			
			array_push($to, array("Email" => $users->row()->email, "Nama" => ""));
			$content		= "Anda telah melakukan permintaan untuk reset password. Harap mengkonfirmasi permintaan Anda dengan mengklik link dibawah ini <br><br> <a href='".base_url()."login/do_reset_password/".$users->row()->auth."' class='link'>Konfirmasi Reset Password</a>";
			
			
			
			$this->spmlib->send_mail($to, $cc, $subject, $content);
			
			$return	= array("result" => "success", "message" => "Silahkan cek email Anda untuk langkah selanjutnya.");
		}
		
		echo json_encode($return);
	}

	function do_reset_password($auth)
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Reset Password - ".$config["site_name"];
		
		$users			= $this->global_model->get_data("mst_user", 1, array("auth"), array($auth));
		$message		= "";
		
		if ($users->num_rows() == 0)
		{
			$message	.= "Link reset password telah kadaluarsa.";
		}
		else
		{
			$new_password	= $this->spmlib->generate_random_string(6);
			
			$array_data		= array(
				"password"	=> md5($new_password),
				"auth"		=> $this->auth->generate_user_auth($users->row())
			);
			
			$this->global_model->update("mst_user", 1, array("id"), array($users->row()->id), $array_data);
			
			$to			= array();
			$cc			= array();
			$subject	= "Lupa Password";
			$content	= "";
			
			array_push($to, array("Email" => $users->row()->email, "Nama" => $users->row()->nama));
			$content		= "
				Anda Telah berhasil mereset password. <br>Berikut data Anda : <br><br>
				<table cellpadding='2' cellspacing='0' border='0'>
					<tr>
						<td>Nama</td>
						<td align='center' width='30'>:</td>
						<td>".$users->row()->nama."</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td align='center' width='30'>:</td>
						<td>".$users->row()->alamat."</td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td align='center' width='30'>:</td>
						<td>".$users->row()->telepon."</td>
					</tr>
					<tr>
						<td>Email</td>
						<td align='center' width='30'>:</td>
						<td>".$users->row()->email."</td>
					</tr>
					<tr>
						<td>Password Baru</td>
						<td align='center' width='30'>:</td>
						<td><b>".$new_password."</b></td>
					</tr>
				</table>
				
			";
			
			$this->spmlib->send_mail($to, $cc, $subject, $content);
			
			$message	.= "Password behasil di reset. Silahkan buka email Anda untuk melihat password baru.";
		}
		
		$message			.= "<br><br>Kembali ke halaman <a href='".base_url()."login/'>Login</a>";
		$data["message"]	= $message;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("login/reset_password", $data);
	}
}

?>