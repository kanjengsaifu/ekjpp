<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{
		$data["title"] 	= "Profile";
		
		$user			= $this->auth->get_data_login();
		$data["user"]	= $this->global_model->get_data("view_user", 1, array("id"), array($user["id"]))->row();
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("profile/index", $data);
	}	
	
	function ubah_password()
	{
		$data["title"] 	= "Ubah Password";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("profile/ubah_password", $data);
	}

}

?>