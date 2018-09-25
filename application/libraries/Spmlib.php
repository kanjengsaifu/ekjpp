<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class spmlib 
{
	protected $_ci;
	
	function __construct() 
	{
		$this->_ci =& get_instance();
		date_default_timezone_set("Asia/Jakarta");
	}
	
	function generate_list_controller()
	{
		foreach(glob(APPPATH . 'controllers/*' . EXT) as $controller)
		{
		    $controller = basename($controller, EXT);

		    $route[$controller] = $controller . '/index';
		    $route[$controller . '/(.+)'] = $controller . '/$1';
		}
	}
	
	function get_config()
	{
		$list_config 	= $this->_ci->global_model->get_data("mst_config");
		$data			= array();
		
		foreach($list_config->result() as $item_config)
		{
			$data[$item_config->key]	= $item_config->value;	
		}
		
		return $data;
	}
	
	// Send Mail
	function send_mail($to = null, $cc = null, $subject = null, $content = null)
	{
		ob_start();
		// Mail Get Configuration
		{
			$config["host"]			= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("mail_host"))->row();
			$config["smtp_auth"]	= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("mail_smtp_auth"))->row();
			$config["smtp_secure"]	= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("mail_smtp_secure"))->row();
			$config["port"]			= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("mail_port"))->row();
			$config["username"]		= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("mail_username"))->row();
			$config["password"]		= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("mail_password"))->row();
			$config["from_name"]	= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("mail_from_name"))->row();
			$config["email"]		= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("mail_email"))->row();
			
			
			$config["company_name"]	= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("company_name"))->row();
			$config["company_address"]	= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("company_address"))->row();
			$config["company_phone"]	= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("company_phone"))->row();
			$config["company_fax"]		= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("company_fax"))->row();
			$config["mail_header"]		= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("mail_header"))->row();
			$config["site_name"]		= $this->_ci->global_model->get_data("mst_config", 1, array("key"), array("site_name"))->row();
		}
		
		require_once("asset/phpmailer/class.phpmailer.php");
		
		$mail = new PHPMailer();
		
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host 		= $config["host"]->value; // SMTP server
		$mail->SMTPDebug 	= false;
		$mail->do_debug 	= 0;

		$mail->SMTPAuth 	= $config["smtp_auth"]->value == 1 ? TRUE : FALSE;  // enable SMTP authentication
		$mail->SMTPSecure 	= $config["smtp_secure"]->value; // sets the prefix to the servier
		$mail->Port 		= $config["port"]->value;
		$mail->Username 	= $config["username"]->value;
		$mail->Password 	= $config["password"]->value;
		$mail->SetFrom($config["email"]->value, $config["from_name"]->value);
		
		
		
		// Add Address		
		//$mail->AddAddress($config["username"]->value, $config["from_name"]->value);
		
		$count_to	= count($to);
		$count_cc	= count($cc);
		
		for ($i = 0; $i < count($to); $i++)
		{
			$mail->AddAddress($to[$i]["Email"], $to[$i]["Nama"]);
		}
		
		// Add CC
		$mail->AddCC($mail->Username, "Admin");
		
		for ($j = 0; $j < count($cc); $j++)
		{
			$email	= $cc[$j]["Email"];
			$name	= $cc[$j]["Nama"];
			$mail->AddCC($email,$name);
		}
		
		$mail->Subject = $subject." [".$config["site_name"]->value."]";

		$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	
		// Load Email Template
		$data["ucapan"]		= $this->ucapan();
		$data["content"]	= $content;
		$data["config"]		= $config;
		$body				= $this->_ci->load->view("template/email", $data, true);
		
		ob_clean();
		$mail->MsgHTML($body);
		$mail->Send();
	}

	function ucapan()
	{
		date_default_timezone_set("Asia/Jakarta");
		$waktu	= date("H:i:s");
		$t		= explode(":",$waktu); 
		$jam	= $t[0]; 
		$menit	= $t[1]; 
		//by : http://ridwanblog.web.id 
		if ($jam >= 00 and $jam < 10 )
		{ 
		    if ($menit >= 00 and $menit < 60)
		    { 
		    	$ucapan="Selamat Pagi"; 
		    } 
		}
		else if ($jam >= 10 and $jam < 15 )
		{ 
		    if ($menit >= 00 and $menit < 60)
		    { 
		    	$ucapan="Selamat Siang"; 
		    } 
		}
		else if ($jam >= 15 and $jam < 18 )
		{ 
		    if ($menit >= 00 and $menit < 60)
		    { 
		    	$ucapan="Selamat Sore"; 
		    } 
		}
		else if ($jam >= 18 and $jam <= 24 )
		{ 
		    if ($menit >= 00 and $menit < 60)
		    { 
		    	$ucapan="Selamat Malam"; 
		    } 
		}
		else 
		{ 
		    $ucapan="Error"; 
		} 
		
		return $ucapan;
	}
	
	function generate_random_string($length = 10) 
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	
	function generate_link_berita($slug = "")
	{
		return base_url()."berita/view/".$slug;
	}
	
	function generate_thumbnail_berita($thumbnail = "")
	{
		if (file_exists("asset/images/article_thumbnail/".$thumbnail))
			return base_url()."asset/images/article_thumbnail/".$thumbnail;
		else
			return base_url()."asset/file/".$thumbnail;
	}
	
	function get_text_resume($text, $limit)
	{
		if(str_word_count($text, 0) > $limit)
		{
			$words = str_word_count($text, 2);
			$pos   = array_keys($words);
			$text  = substr($text, 0, $pos[$limit]) . '...';
		}
		return $text;
	}

	function romanic_number($integer, $upcase = true)
	{
		$table = array('M' =>1000,'CM'=>900,'D' =>500,'CD'=>400,'C' =>100,'XC'=>90,'L' =>50,'XL'=>40,'X' =>10,'IX'=>9,'V' =>5,'IV'=>4,'I' =>1);
		$return = '';
		while($integer > 0){
			foreach($table as $rom=>$arb){
				if($integer >= $arb){
					$integer -= $arb;
					$return .= $rom;
					break;
				}
			}
		}

		return $return;
	}
	
	function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB')
	{
		if(trim ($timestamp) == ''){
			$timestamp = time ();
		}
		elseif(!ctype_digit ($timestamp)){
			$timestamp = strtotime ($timestamp);
		}
		# remove S (st,nd,rd,th) there are no such things in indonesia :p
		$date_format = preg_replace ("/S/", "", $date_format);
		$pattern = array (
			'/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
			'/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
			'/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
			'/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
			'/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
			'/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
			'/April/','/June/','/July/','/August/','/September/','/October/',
			'/November/','/December/',
		);
		$replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
			'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
			'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
			'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
			'Oktober','November','Desember',
		);
		$date = date ($date_format, $timestamp);
		$date = preg_replace ($pattern, $replace, $date);
		$date = "{$date} {$suffix}";
		return $date;
	} 
	
	function master_data()
	{
		$data["objeck_penilaian"]	= array("Tanah, Bangunan & Sarana Pelengkap", "Tanah, Bangunan Pabrik & Sarana Pelengkap", "Tanah, Bangunan Pabrik, Sarana Pelengkap, Mesin & Peralatan");
		
		
		return $data;
	}
}

?>