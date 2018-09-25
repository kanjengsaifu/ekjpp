<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class errors extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function error404()
	{
		$data["title"] 		= "Halaman tidak ditemukan";
		$data["message"] 	= "The page you are looking for does not exist. It may have been moved, or removed altogether.<br /> Perhaps you can return back to the site's homepage and see if you can find what you are looking for.";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("errors/html/error_404", $data);
	}
}

?>