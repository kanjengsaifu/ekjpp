<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pppk extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= " Laporan Tahunan PPPK (e-Reporting)";
		
		$this->load->view("pppk/index", $data);
	}
	
	
}

?>