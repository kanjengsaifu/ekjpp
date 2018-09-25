<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class properti extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Database Properti MAPPI";
		
		$this->load->view("properti/index", $data);
	}
	
	
}

?>