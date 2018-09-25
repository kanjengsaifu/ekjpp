<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class template 
{
	protected $_ci;
	
	public function __construct() 
	{
		$this->_ci =& get_instance();
		date_default_timezone_set("Asia/Jakarta");
		
		$this->controller		= $this->_ci->router->fetch_class();
		$this->method			= $this->_ci->router->fetch_method();
	}
	
	public function generate_template($type, $data)
	{
		$data["info_login"]			= "";
		$controller_not_login		= array("home", "berita", "kontak", "login");
		if (!$this->_ci->auth->is_login())
		{
			if (!in_array($this->controller, $controller_not_login))
				redirect(base_url()."/");
		}
		else
		{
			$user				= $this->_ci->auth->get_data_login();
			$data["info_login"]	= " | ".$user["nama"]." | ".$user["nama_group"];
		}
		
		
		$data["_controller"]	= $this->controller;
		$data["_method"]		= $this->method;
		$data["_user"]			= $this->_ci->auth->get_data_login();
		$data["_config"]		= $this->_ci->spmlib->get_config();
		$data["_menu"]			= $this->_generate_menu($type, $data);
		$data["_breadcrumb"]	= $this->_generate_breadcrumb($type, $data);
		$data["_head"]			= $this->_generate_head($type, $data);
		$data["_header"]		= $this->_generate_header($type, $data);
		$data["_footer"]		= $this->_generate_footer($type, $data);
		$data["_foot"]			= $this->_generate_foot($type, $data);
		
		
		
		
		
		return $data;
	}
	
	private function _generate_head($type, $data)
	{
		if ($type == 'user') {
			$content	= $this->_ci->load->view("template/head_lte", $data, true);
		}else{
			$content	= $this->_ci->load->view("template/head", $data, true);
		}
		
		
		return $content;
	}
	
	private function _generate_header($type, $data)
	{
		$content	= "";
		
		return $content;
	}
	
	private function _generate_breadcrumb($type, $data)
	{
		$content	= "<a href='".base_url()."'>Home</a> ";
		
		
		
		if ($this->controller == "berita")
		{
			switch ($this->method) {
			    case "index":
			        $content	.= " >> Berita ";
			        break;
			    default:	
			    	$content	.= " >> <a href='".base_url()."".$this->controller."/'>Berita</a> >> ".$data["title"]."";
			        
			}
		}
		else if ($this->controller == "pekerjaan")
		{
			switch ($this->method) {
			    case "index":
			        $content	.= " >> Pekerjaan ";
			        break;
			    default:	
			    	$content	.= " >> <a href='".base_url()."pekerjaan/'>Pekerjaan</a> >> ".$data["title"]."";
			        
			}
		}
		else if ($this->controller == "pengaturan" || $this->controller == "master")
		{
			switch ($this->method) {
			    case "index":
			        $content	.= " >> Pengaturan ";
			        break;
			    default:	
			    	$content	.= " >> <a href='".base_url()."pengaturan/'>Pengaturan</a> >> ".$data["title"]."";
			        
			}
		}
		
		return $content;
	}
	
	private function _generate_footer($type, $data)
	{
		if ($type == 'user') {
			$content	= $this->_ci->load->view("template/footer_lte", $data, true);
		}else{
			$content	= $this->_ci->load->view("template/footer", $data, true);
		}
		
		return $content;
	}
	
	private function _generate_foot($type, $data)	
	{
		$content	= $this->_ci->load->view("template/foot", $data, true);
		
		return $content;
	}
	
	private function _generate_menu($type, $data)
	{
		$class_active	= array(
			"home"			=> "home",
			"berita"		=> "berita",
			"pekerjaan"		=> "pekerjaan",
			"dokumen"		=> "dokumen",
			"laporan"		=> "laporan",
			"pengaturan"	=> "pengaturan",
			"master"		=> "pengaturan",
			"peta"		=> "peta",
			"login"			=> "login",
			"kontak"		=> "kontak",
			"objek"			=> "objek"
		);
		
		$content	= '';
		$list_menu	= array();
		$id_group	= 1;
		
		if ($this->_ci->auth->is_login())
		{
			$id_group	= $data["_user"]["id_group"];
		}
		
		$list_menu	= $this->_ci->global_model->get_by_query("SELECT * FROM view_menu WHERE id_parent is null AND id_group = '".$id_group."' ORDER BY `order`");
		
		if ($type=='user') {
			$content = '<ul class="sidebar-menu">';
			$content .= '<b><li class="text-center header">MENU UTAMA</li></b>';
			foreach($list_menu->result() as $item_menu)
			{
				$list_child	= $this->_ci->global_model->get_data("view_menu", 2, array("id_parent", "id_group"), array($item_menu->id_menu, $id_group), "order");
				// $class		= (array_key_exists(strtolower($this->controller), $class_active) && strtolower($item_menu->controller) == $class_active[strtolower($this->controller)] ? "active" : "");
				
				$link		= $list_child->num_rows() == 0 ? base_url()."".$item_menu->link : "#";

				if ($list_child->num_rows() == 0) {
					$class		= (array_key_exists(strtolower($this->controller), $class_active) && strtolower($item_menu->controller) == $class_active[strtolower($this->controller)] ? 'class="active"' : NULL);
					$content	.= '<li '.$class.'><a href="'.$link.'"><i class="fa fa-folder"></i><span>'.$item_menu->label.'</span></a>';
				}
				else
				{
					$class		= (array_key_exists(strtolower($this->controller), $class_active) && strtolower($item_menu->controller) == $class_active[strtolower($this->controller)] ? 'class="treeview active"' : 'class="treeview"');
					$content	.= '<li '.$class.'><a href="'.$link.'"><i class="fa fa-folder"></i><span>'.$item_menu->label.'</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>';

					$content .= '<ul class="treeview-menu">';
				
					foreach($list_child->result() as $item_child)
					{
						$list_child1	= $this->_ci->global_model->get_data("view_menu", 2, array("id_parent", "id_group"), array($item_child->id_menu, $id_group), "order");
						
						$link		= $list_child1->num_rows() == 0 ? base_url()."".$item_child->link : "#";
						$content	.= '<li>';
						if($list_child1->num_rows() == 0){
							$content 	.= '<a href="'.$link.'"><i class="fa fa-list"></i>'.$item_child->label.'</a>';
						}else{
							$content 	.= '<a href="'.$link.'"><i class="fa fa-folder"></i>'.$item_child->label.'<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>';
						}
						
				
						if($list_child1->num_rows() != 0)
						{
							$content .= '<ul class="treeview-menu">';
						
							foreach($list_child1->result() as $item_child1)
							{
								$content	.= '<li>';
								$content 	.= '<a href="'.base_url().$item_child1->link.'"><i class="fa fa-list"></i>'.$item_child1->label.'</a>';
								
								$content	.= '</li>';
							}

							$content .= "</ul>";
						}
						
						$content	.= "</li>";
					}

					$content .= "</ul>";
				}

				$content .= "</li>";
			}
			$content .= '</ul>';
		}else{
			$content	= "<ul class='main-nav'>";
		
			foreach($list_menu->result() as $item_menu)
			{
				$list_child	= $this->_ci->global_model->get_data("view_menu", 2, array("id_parent", "id_group"), array($item_menu->id_menu, $id_group), "order");
				
				$class		= (array_key_exists(strtolower($this->controller), $class_active) && strtolower($item_menu->controller) == $class_active[strtolower($this->controller)] ? "class='active'" : "");
				
				$link		= $list_child->num_rows() == 0 ? base_url()."".$item_menu->link : "#";
				$content	.= "<li ".$class.">";
				$content	.= "<a href='".$link."'>".$item_menu->label."</a>";
				
				if($list_child->num_rows() != 0)
				{
					$content .= "<ul class='sub-nav'>";
				
					foreach($list_child->result() as $item_child)
					{
						$list_child1	= $this->_ci->global_model->get_data("view_menu", 2, array("id_parent", "id_group"), array($item_child->id_menu, $id_group), "order");
						
						$link		= $list_child1->num_rows() == 0 ? base_url()."".$item_child->link : "#";
						$content	.= "<li>";
						$content 	.= "<a href='".$link."'>".$item_child->label."</a>";
						
						
				
				
						if($list_child1->num_rows() != 0)
						{
							$content .= "<ul class='sub-nav'>";
						
							foreach($list_child1->result() as $item_child1)
							{
								$content	.= "<li>";
								$content 	.= "<a href='".base_url()."".$item_child1->link."'>".$item_child1->label."</a>";
								
								$content	.= "</li>";
							}

							$content .= "</ul>";
						}
						
						$content	.= "</li>";
					}

					$content .= "</ul>";
				}

				$content .= "</li>";
			}
			
			$content	.= "</ul>";
		}
		
		return $content;
	}

	private function get_menu_parent($id)
	{
		$parent	= null;
		$menu	= $this->_ci->global_model->get_data("mst_menu", 1, array("id"), array($id))->row();
		
		if ($menu->id_parent){
			$menu	= $this->_ci->global_model->get_data("mst_menu", 1, array("id"), array($menu->id_parent))->row();
			
			if ($menu->id_parent){
				$menu	= $this->_ci->global_model->get_data("mst_menu", 1, array("id"), array($menu->id_parent))->row();
				
				if ($menu->id_parent){
					$menu	= $this->_ci->global_model->get_data("mst_menu", 1, array("id"), array($menu->id_parent))->row();
				}
			}
		}
		
		
		
		return $menu;
	}
}

?>