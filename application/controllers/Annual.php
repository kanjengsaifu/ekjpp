<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class annual extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{
		//$config			= $this->spmlib->get_config();
		//$data["title"] 	= " Laporan Tahunan PPPK (e-Reporting)";
		
		//$this->load->view("pppk/index", $data);
	}
	function pppk()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Laporan Tahunan PPPK (e-Reporting)";
		
		$this->load->view("annual/pppk", $data);
	}
	function bni()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Laporan Tahunan BNI";
		
		$this->load->view("annual/bni", $data);
	}
	function mandiri()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Laporan Tahunan Bank Mandiri";
		
		$this->load->view("annual/mandiri", $data);
	}
	function bri()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Laporan Tahunan BRI";
		
		$this->load->view("annual/bri", $data);
	}
	
	
}

?>