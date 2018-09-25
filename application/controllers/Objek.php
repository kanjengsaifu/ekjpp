<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class objek extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Objek Properti";
		
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("objek/index", $data);
	}
	
	function detail($id = null)
	{
		$id 			= base64_decode($id);
		$data["title"] 	= "Detail Objek Properti";
		$data["objek"]		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id))->row();
		$objek_tmp 			= $this->global_model->get_data("mst_lokasi_tmp", 1, array("id_lokasi"), array($id));
		$data["objek_tmp"]	= $objek_tmp;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("objek/detail", $data);
	}
}

?>