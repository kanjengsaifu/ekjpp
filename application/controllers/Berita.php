<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class berita extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Berita";
		
		$data["berita_top"]	= $this->global_model->get_data("view_berita", 0, array(), array(), "created", "DESC", 0, 1)->row();
		
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
		$this->load->view("berita/index", $data);
	}
	
	function view($slug)
	{
		$view_slug			= $this->global_model->get_data("view_slug", 1, array("slug"), array($slug))->row();
		
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
		
		if ($view_slug->type == "berita")
		{
			$berita				= $this->global_model->get_data("view_berita", 1, array("id"), array($view_slug->id))->row();
			$data["content"]	= $berita;
			$data["title"]		= $berita->judul;
			
			$data["_template"]	= $this->template->generate_template("user", $data);
			$this->load->view("berita/single", $data);
		}
		else if ($view_slug->type == "kategori")
		{
			$kategori			= $this->global_model->get_data("mst_kategori", 1, array("id"), array($view_slug->id))->row();
			//$berita				= $this->global_model->get_data("view_berita", 1, array("id_kategori"), array($kategori->id))->row();
			$data["content"]	= $kategori;
			$data["title"]		= "Berita ".$kategori->nama;
			
			$data["_template"]	= $this->template->generate_template("user", $data);
			$this->load->view("berita/kategori", $data);
		}
	}
}

?>