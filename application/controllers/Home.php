<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if ($this->auth->is_login()) redirect(base_url()."home/dashboard/");

		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Beranda :: ".$config["site_name"];

		$list_kategori		= $this->global_model->get_data("mst_kategori");
		$kategori			= array();

		foreach ($list_kategori->result() as $item_kategori)
		{
			$count_berita	= $this->global_model->get_data("mst_berita", 2, array("id_kategori", "status"), array($item_kategori->id, "T"))->num_rows();

			if ($count_berita > 0)
			{
				array_push($kategori, array(
					"label"	=> $item_kategori->nama,
					"link"	=> base_url()."berita/view/".$item_kategori->slug,
					"count_berita"	=> $count_berita
				));
			}
		}

		$list_slide			= $this->global_model->get_data("mst_slide", 0, array(), array(), "order", "ASC")->result();
		$data["list_slide"]	= $list_slide;

		$data["kategori"]	= $kategori;

		$data["_template"]	= $this->template->generate_template("", $data);
		//$this->load->view("home/index", $data);
		// $this->load->view("home/home_new", $data);
		$this->load->view("home/home_open_mind", $data);
	}

	function dashboard()
	{
		/*$this->load->library("FusionCharts");*/
		if (!$this->auth->is_login()) redirect(base_url());

		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Beranda :: ".$config["site_name"];

		$user				= $this->auth->get_data_login();
		$query_condition	= $this->generate_query_contition($user);

		$data["count_1"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 1 AND 3 ".$query_condition)->row();
		$data["count_2"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 1 AND 33 ".$query_condition)->row();
		$data["count_3"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status = 34 ")->row();

		$data["count_4"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 1 AND 6 ".$query_condition)->row();
		$data["count_5"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 7 AND 10 ".$query_condition)->row();
		$data["count_6"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 11 AND 15 ".$query_condition)->row();
		$data["count_7"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 16 AND 23 ".$query_condition)->row();
		$data["count_8"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 24 AND 34 ".$query_condition)->row();
		

		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("home/dashboard", $data);
	}

	function image()
	{
		/*$this->load->library("FusionCharts");*/
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Beranda :: ".$config["site_name"];

		$user				= $this->auth->get_data_login();
		$query_condition	= $this->generate_query_contition($user);

		$data["count_1"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 1 AND 3 ".$query_condition)->row();
		$data["count_2"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 1 AND 32 ".$query_condition)->row();
		$data["count_3"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status = 33 ")->row();

		$data["count_4"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 1 AND 6 ".$query_condition)->row();
		$data["count_5"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 7 AND 10 ".$query_condition)->row();
		$data["count_6"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 11 AND 15 ".$query_condition)->row();
		$data["count_7"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 16 AND 23 ".$query_condition)->row();
		$data["count_8"]	= $this->global_model->get_by_query("SELECT COUNT(*) as 'count' FROM view_pekerjaan WHERE id_status BETWEEN 24 AND 32 ".$query_condition)->row();
		

		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("home/image", $data);
	}

	function get_grafik_pekerjaan(){
		$data_pekerjaan	= array();

		$last_month	= date("Y-m-d");

		for ($i = 11; $i >= 0; $i--)
		{
			$month			= date("M Y", strtotime("-".$i." month", time()));
			$month_query	= date("Y-m", strtotime("-".$i." month", time()));
			$jml			= $this->global_model->get_by_query("SELECT COUNT(*) as total FROM mst_pekerjaan WHERE created BETWEEN '".$month_query."-01' AND '".$month_query."-31' AND `status` ='1'  ")->row()->total;

			$data_pekerjaan[]	= array(
				"label"		=> $month,
				"value"		=> $jml
			);
		}
		//print_r($data_pekerjaan);
		$data_json	= array(
			"chart" => array(
					"caption" => "Grafik Jumlah Pekerjaan",
					"subCaption" => "",
					"xAxisName" => "Bulan",
					"yAxisName" => "Jumlah Pekerjaan",
					"paletteColors" => "#0075c2",
					"bgColor" => "#ffffff",
					"borderAlpha" => "20",
					"canvasBorderAlpha" => "0",
					"usePlotGradientColor" => "0",
					"plotBorderAlpha" => "10",
					"placeValuesInside" => "1",
					"rotatevalues" => "0",
					"slantlabels"=> "1",
					"valueFontColor" => "#ffffff",
					"showXAxisLine" => "1",
					"xAxisLineColor" => "#999999",
					"divlineColor" => "#999999",
					"divLineIsDashed" => "1",
					"showAlternateHGridColor" => "0",
					"subcaptionFontSize" => "14",
					"subcaptionFontBold" => "0"
				),
				"data"	=> $data_pekerjaan
		);
		
		echo json_encode($data_json);
	}
	function get_berita_list()
	{
		$page		= $_GET["page"];
		$perpage	= 5;

		$list_berita	= $this->global_model->get_for_paging("view_berita", null, 1, array("status"), array("Publish"), "created", "DESC", ($page * $perpage), $perpage);
		$total_berita	= $this->global_model->get_data("view_berita", 1, array("status"), array("Publish"))->num_rows();
		$content		= "";
		$i				= 1;
		foreach ($list_berita->result() as $item_berita)
		{
			$content	.= "
				<div class='item'>
					<div class='item-inner'>
						<div class='featured-img'>
							<a href='".$this->spmlib->generate_link_berita($item_berita->slug)."'><img src='".$this->spmlib->generate_thumbnail_berita($item_berita->thumbnail)."' alt='Image'></a>
						</div><!-- /.featured-img -->
						<div class='caption'>
							<p class='category'>
								<span><a href='".$this->spmlib->generate_link_berita($item_berita->slug_kategori)."'>".$item_berita->nama_kategori."</a></span>
							</p><!-- /.category -->
							<h5 class='post-title'><a href='".$this->spmlib->generate_link_berita($item_berita->slug)."'>".$item_berita->judul."</a></h5>
							<p class='post-meta'>
								<span><a href='#'><strong>".$item_berita->nama_user."</strong></a></span>
								<span>".date("d F Y", strtotime($item_berita->created))."</span>
							</p>
							<p>".$this->spmlib->get_text_resume(preg_replace('#<[^>]+>#', ' ', $item_berita->content), 15)."</p>
							<a href='".$this->spmlib->generate_link_berita($item_berita->slug)."' class='btn btn-main btn-main-primary btn-main-sm inner-dashed'>READ MORE</a>
						</div><!-- /.caption -->
					</div><!-- /.item-inner -->
				</div>
			";
			$i++;
		}
		echo json_encode(array("list" => $content, "paging" => ($this->generate_paging(($page + 1), ceil($total_berita / $perpage)))));
	}

	function get_berita_grid()
	{
		$get 		= $_GET;
		$kategori	= array_key_exists("kategori", $_GET) ? $_GET["kategori"] : null;
		$page		= $_GET["page"];
		$perpage	= $_GET["perpage"];

		if ($kategori){
			$get_kategori	= $this->global_model->get_data("mst_kategori", 1, array("slug"), array($kategori))->row();
			$list_berita	= $this->global_model->get_data("view_berita", 1, array("id_kategori"), array($get_kategori->id), "created", "DESC", $page, $perpage);
		}else{
			$list_berita	= $this->global_model->get_data("view_berita", 0, array(), array(), "created", "DESC", $page, $perpage);
		}

		$content	= "";
		$i			= 1;
		foreach ($list_berita->result() as $item_berita)
		{
			$content	.= "
				<div class='item'>
					<div class='item-inner'>
						<div class='featured-img'>
							<a href='".$this->spmlib->generate_link_berita($item_berita->slug)."'><img src='".$this->spmlib->generate_thumbnail_berita($item_berita->thumbnail)."' alt='Image'></a>
						</div><!-- /.featured-img -->
						<div class='caption'>
							<p class='post-meta'>
								<span><a href='#'><strong>".$item_berita->nama_user."</strong></a></span>
								<span>".date("d F Y", strtotime($item_berita->created))."</span>
							</p>
							<p class='post-meta' style='margin-top: 10px;'>
								<a href='".$this->spmlib->generate_link_berita($item_berita->slug_kategori)."'><span class='label label-danger label-square'><strong>".$item_berita->nama_kategori."</strong></span></a>
							</p>
							<h5 class='post-title'><a href='".$this->spmlib->generate_link_berita($item_berita->slug)."'>".$item_berita->judul."</a></h5>
						</div><!-- /.caption -->
					</div><!-- /.item-inner -->
				</div>
			";
			$i++;
		}

		echo $content;
	}

	function generate_paging($page, $tpages)
	{
		$adjacents = 1;
		$prevlabel = "&lsaquo; Prev";
		$nextlabel = "Next &rsaquo;";
		$out       = "";

		$out	= "<ul class='pagination'>";

		// previous
		if($page == 1)
		{
			$out .= "
				<li class='disabled'>
					<a href='#' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-left'></i></span></a>
				</li>
			";
		}
		elseif($page == 2)
		{
			$out .= "
				<li>
					<a href='#'  class='btn-paging' data='".($page-1)."' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-left'></i></span></a>
				</li>
			";
		}
		else
		{
			$out .= "
				<li>
					<a href='#'  class='btn-paging' data='".($page-1)."' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-left'></i></span></a>
				</li>
			";
		}
		$pmin = ($page > $adjacents)?($page - $adjacents):1;
		$pmax = ($page < ($tpages - $adjacents))?($page + $adjacents):$tpages;
		for($i = $pmin; $i <= $pmax; $i++)
		{
			if($i == $page)
			{
				$out .= "<li class='active disabled'><a href='#' data='".$i."'>".$i."</a></li>";
			}
			elseif($i == 1)
			{
				$out .= "<li><a href='#' class='btn-paging' data='".$i."'>".$i."</a></li>";
			}
			else
			{
				$out .= "<li><a href='#' class='btn-paging' data='".$i."'>".$i. "</a></li>";
			}
		}

		/*if($page < ($tpages - $adjacents))
		{
			$out .= "<li><a style='font-size:11px' href=''>" .$tpages."</a></li>";
		}*/
		// next
		if($page < $tpages)
		{
			$out .= "
				<li>
					<a href='#'  class='btn-paging' data='".($page+1)."' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-right'></i></span></a>
				</li>
			";
		}
		else
		{
			$out .= "
				<li class='disabled'>
					<a href='#' aria-label='Next'>
						<span aria-hidden='true'><i class='fa fa-angle-right'></i></span>
					</a>
				</li>";
		}
		$out .= "</ul>";
		return $out;
	}

	function get_project()
	{
		$status	= $_GET["status"];


		if ($status == 0)
		{
			$list_project	= $this->global_model->get_by_query("SELECT nama_klien, nama, step FROM view_pekerjaan WHERE id_status > 15 ");
		}
		else if ($status == 1)
		{
			$list_project	= $this->global_model->get_by_query("SELECT nama_klien, nama, step FROM view_pekerjaan WHERE id_status <= 15 ");
		}

		echo json_encode($list_project->result());



	}



	function lupa_password()
	{
		if ($this->auth->is_login()) redirect(base_url());
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Lupa Password :: ".$config["site_name"];

		$list_kategori		= $this->global_model->get_data("mst_kategori");
		$kategori			= array();

		foreach ($list_kategori->result() as $item_kategori)
		{
			$count_berita	= $this->global_model->get_data("mst_berita", 1, array("id_kategori"), array($item_kategori->id))->num_rows();

			if ($count_berita > 0)
			{
				array_push($kategori, array(
					"label"	=> $item_kategori->nama,
					"link"	=> base_url()."berita/view/".$item_kategori->slug,
					"count_berita"	=> $count_berita
				));
			}
		}

		$data["kategori"]	= $kategori;

		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("home/resetpw_open_mind", $data);
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
			$content		= "Anda telah melakukan permintaan untuk reset password. Harap mengkonfirmasi permintaan Anda dengan mengklik link dibawah ini <br><br> <a href='".base_url()."home/do_reset_password/".$users->row()->auth."' class='link'>Konfirmasi Reset Password</a>";



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

		$message			.= "<br><br>Kembali ke halaman <a href='".base_url()."/'>Login</a>";
		$data["message"]	= $message;

		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("home/reset_password", $data);
	}

	function generate_query_contition($user)
	{
		$query	= "";
		if ($user["id_group"] == 4) // Group Marketing
		{
			$query		= " AND id_user = ".$user["id"]." ";
		}
		else if ($user["id_group"] == 6) // Project Manager
		{
			$query		= " AND id_user = ".$user["id"]." ";
		}

		return $query;
	}

	public function show_agenda() {
		$user			= $this->auth->get_data_login();
		$month_now 		= date('m');
		$con_group 		= $user['id_group'] == 7 ? ' AND id_user='.$user['id'] : NULL ;
        $agenda_bulan 	= $this->global_model->get_by_query("SELECT A.nama nama_pekerjaan, C.nama jenis_objek, B.alamat, B.tanggal_mulai, B.tanggal_selesai, E.nama nama_user
															FROM mst_pekerjaan A
															JOIN mst_lokasi B
															ON A.id = B.id_pekerjaan
															JOIN mst_jenis_objek C
															ON B.id_jenis_objek = C.id 
															JOIN txn_tugas D 
															ON B.id = D.id_lokasi
															JOIN mst_user E
															ON D.id_user = E.id
															WHERE MONTH(B.tanggal_mulai) BETWEEN 01 AND $month_now")->result_array();
        // echo $this->db->last_query();exit();
        $dates = array();
        $i=0;
        foreach($agenda_bulan as $key => $value){
            $tglMulai 		= $value['tanggal_mulai'];
            $year           = date('Y', strtotime($tglMulai));
            $month          = date('m', strtotime($tglMulai));
            $lastday        = date('d', strtotime($tglMulai));
           
			$list_judul  ='<span><ol>';
            $list_judul .= '
                <li>
                    <h4>'.$value['nama_pekerjaan'].'</h4>
                    <ul>
                        <li>Jenis Objek : '. $value['jenis_objek'] .'</li>
                        <li>Lokasi : '. $value['alamat'] .'</li>
                        <li>Mulai &nbsp&nbsp: <span class="badge bg-green">'.format_tanggal($value['tanggal_mulai']).'</span> </li>
                        <li>Selesai: <span class="badge bg-red">'.format_tanggal($value['tanggal_selesai']).'</span></li>
                        <li>
                        	<a href="#">Surveyor : </a>
                        	<p>'.$value['nama_user'].'</p>
                        </li>
                    </ul>
                </li>
            ';
            $list_judul .= "<hr>";
			$list_judul .= "</ol></span>";
		
            $date = $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($lastday, 2, '0', STR_PAD_LEFT);
            $dates[$i] = array(
                'date' => $date,
                'badge' => $i,
                'title' => 'List Survey : '.format_tanggal() ,
                'body' => $list_judul,
                'footer' => 'EKJPP_ASUS',
            );
            $i++;
       }
        $dates[$i] = array(
            'date'   => date('Y')."-".date('m')."-".date('d'),
        );        
        echo json_encode($dates);
    }
}

?>
