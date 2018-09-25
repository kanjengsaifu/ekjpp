<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kontak extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{
		if ($this->auth->is_login()) redirect(base_url());
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Kontak :: ".$config["site_name"];
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		// $this->load->view("kontak/index", $data);
		$this->load->view("home/kontak_open_mind", $data);
	}

	
}

?>