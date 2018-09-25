<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth 
{
	protected $_ci;
	
	function __construct() 
	{
		$this->_ci =& get_instance();
		
	}
	
	// Account Member
	function is_login()
	{
		
		if($this->_ci->session->userdata("id_user"))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function login($email, $password)
	{
		$user	= $this->_ci->global_model->get_data("mst_user", 2, array("email", "password"), array($email, md5($password)));
		
		if ($user->num_rows() == 1)
		{
			$this->_ci->session->set_userdata(array("id_user" => $user->row()->id));
			
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function get_data_login()
	{
		$id_user	= $this->_ci->session->userdata("id_user");
		$user		= array();
		
		if ($this->is_login())
		{	
			$mst_user		= $this->_ci->global_model->get_data("view_user", 1, array("id"), array($id_user))->row();
			
			$user["id"]				= $mst_user->id;
			$user["email"]			= $mst_user->email;
			$user["password"]		= $mst_user->password;
			$user["nama"]			= $mst_user->nama;
			$user["id_group"]		= $mst_user->id_group;
			$user["nama_group"]		= $mst_user->nama_group;
			$user["avatar"]			= base_url()."assets/file/foto/".$mst_user->avatar;
			
			
		}
		
		return $user;
	}

	function generate_user_auth($user)
	{
		return md5($user->id."-".$user->email."-".$user->password);
	}
}
?>