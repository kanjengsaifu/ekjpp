<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengaturan extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Pengaturan Umum";
		
		$data["input"]["site_name"]			= $this->formlib->_generate_input_text("site_name", "Nama Situs", $config["site_name"], TRUE, TRUE);
		$data["input"]["company_name"]		= $this->formlib->_generate_input_text("company_name", "Nama Perusahaan", $config["company_name"], TRUE, TRUE);
		$data["input"]["company_address"]	= $this->formlib->_generate_input_textarea("company_address", "Alamat", $config["company_address"], TRUE, TRUE);
		$data["input"]["company_phone"]		= $this->formlib->_generate_input_text("company_phone", "Telepn", $config["company_phone"], TRUE, TRUE);
		$data["input"]["company_fax"]		= $this->formlib->_generate_input_text("company_fax", "Fax", $config["company_fax"], TRUE, TRUE);
		$data["input"]["email_kontak"]		= $this->formlib->_generate_input_text("email_kontak", "Email Kontak", (!empty($config["email_kontak"]) ? $config["email_kontak"] : ""), TRUE, TRUE);
		
		$data["input"]["mail_host"]			= $this->formlib->_generate_input_text("mail_host", "Host", $config["mail_host"], TRUE, TRUE);
		$data["input"]["mail_smtp_auth"]	= $this->formlib->_generate_input_text("mail_smtp_auth", "SMTP Auth", $config["mail_smtp_auth"], TRUE, TRUE);
		$data["input"]["mail_smtp_secure"]	= $this->formlib->_generate_input_text("mail_smtp_secure", "SMTP Secure", $config["mail_smtp_secure"], TRUE, TRUE);
		$data["input"]["mail_port"]			= $this->formlib->_generate_input_text("mail_port", "Port", $config["mail_port"], TRUE, TRUE);
		$data["input"]["mail_username"]		= $this->formlib->_generate_input_text("mail_username", "Username", $config["mail_username"], TRUE, TRUE);
		$data["input"]["mail_password"]		= $this->formlib->_generate_input_text("mail_password", "Password", $config["mail_password"], TRUE, TRUE);
		$data["input"]["mail_from_name"]	= $this->formlib->_generate_input_text("mail_from_name", "Nama", $config["mail_from_name"], TRUE, TRUE);
		$data["input"]["mail_email"]		= $this->formlib->_generate_input_text("mail_email", "Email Pengrimim", $config["mail_email"], TRUE, TRUE);
		
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/index", $data);
	}
	
	function menu()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Pengaturan Menu";
		
		$table_menu		= "";
		
		// Table Menu
		{
			$list_group	= $this->global_model->get_data("mst_group");
			$table_menu	.= "<table cellpadding='0' cellspacing='0' border='0'>";
			
			// Heading
			{
				$table_menu	.= "<thead>";
				$table_menu	.= "<tr>";
				
				
				$table_menu	.= "<th>No</th>";
				$table_menu	.= "<th>Menu</th>";
				
				foreach ($list_group->result() as $item_group)
				{
					$table_menu	.= "<th>".$item_group->nama."</th>";
				}
				
				$table_menu	.= "</tr>";
				$table_menu	.= "</thead>";
			}
			
			
			// Body
			{
				$table_menu	.= "<tbody>";
				
				$list_menu	= $this->global_model->get_by_query("SELECT * FROM mst_menu WHERE id_parent is null ORDER BY `order`");
				
				$i = 1;
				foreach ($list_menu->result() as $item_menu)
				{
					$table_menu	.= "<tr style='font-weight: bold;'>";
					$table_menu	.= "<td>".$i."</td>";
					$table_menu	.= "<td>".$item_menu->label."</td>";
					
					foreach ($list_group->result() as $item_group)
					{
						$checked	= $this->global_model->get_data("txn_group_menu", 2, array("id_group", "id_menu"), array($item_group->id, $item_menu->id))->num_rows();
						$table_menu	.= "<td style='text-align: center;'><input class='menu_checked' data='group=".$item_group->id.":menu=".$item_menu->id."' type='checkbox' ".($checked == 1 ? "checked" : "")."></td>";
					}
					
					$table_menu	.= "</tr>";
					
					$list_child	= $this->global_model->get_data("mst_menu", 1, array("id_parent"), array($item_menu->id), "order");
					
					foreach ($list_child->result() as $item_child)
					{
						$table_menu	.= "<tr>";
						$table_menu	.= "<td></td>";
						$table_menu	.= "<td style='padding-left: 20px;'>".$item_child->label."</td>";
						foreach ($list_group->result() as $item_group)
						{
							$checked	= $this->global_model->get_data("txn_group_menu", 2, array("id_group", "id_menu"), array($item_group->id, $item_child->id))->num_rows();
							$table_menu	.= "<td style='text-align: center;'><input type='checkbox' class='menu_checked' data='group=".$item_group->id.":menu=".$item_child->id."' ".($checked == 1 ? "checked" : "")."></td>";
						}
						
						$table_menu	.= "</tr>";
						
						$list_child1	= $this->global_model->get_data("mst_menu", 1, array("id_parent"), array($item_child->id), "order");
						
						foreach ($list_child1->result() as $item_child1)
						{
							$table_menu	.= "<tr>";
							$table_menu	.= "<td></td>";
							$table_menu	.= "<td style='padding-left: 40px;'>".$item_child1->label."</td>";
							foreach ($list_group->result() as $item_group)
							{
								$checked	= $this->global_model->get_data("txn_group_menu", 2, array("id_group", "id_menu"), array($item_group->id, $item_child1->id))->num_rows();
								$table_menu	.= "<td style='text-align: center;'><input type='checkbox' class='menu_checked' data='group=".$item_group->id.":menu=".$item_child1->id."' ".($checked == 1 ? "checked" : "")."></td>";
							}
							
							$table_menu	.= "</tr>";
						}
					}
					
					$i++;
				}
				
				
				$table_menu	.= "</tbody>";
			}
			
			$table_menu	.= "</table>";
		}
		
		
		$data["table_menu"]	= $table_menu;
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/menu", $data);
	}
    function kjpp()
	{
		/*$config			= $this->spmlib->get_config();
		$data["title"] 	= "Listing KJPP";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/kjpp", $data);*/
		$id 			= NULL;
		$list_data = $this->global_model->get_list('mst_kjpp', NULL, NULL, NULL, 1);
		$mst_data = false;
		if ( count($list_data) > 0 ) {
			$mst_data		= $list_data[0];
			$id = $mst_data->kode_kjpp;	
		} else {
			show_404();
			return;
		}
		$input_kode_kjpp = $this->input->post('kode_kjpp');
		$input_nama_kjpp = $this->input->post('nama_kjpp');
		$input_kode_identitas_kantor = $this->input->post('kode_identitas_kantor');
		$msg_ekjpp = $this->session->flashdata('msg_ekjpp');
		$data['msg_ekjpp'] = $msg_ekjpp;
		$err_message = NULL;
		if ( $_POST ) {
			$simpan = true;
			if ( empty($id) )
				$check_kode = count_data('mst_kjpp', array('kode_kjpp' => $input_kode_kjpp));
			else
				$check_kode = count_data('mst_kjpp', array('kode_kjpp' => $input_kode_kjpp, 'kode_kjpp !=' => $mst_data->kode_kjpp));
			if ( $check_kode ) {
				$simpan = false;
				$err_message = 'Kode <b>'.$input_kode_kjpp.'</b> sudah digunakan.';
				$input_kode_kjpp = NULL;
			}
			if ( $simpan ) {
				$dt_update = array(
					'kode_kjpp' => $input_kode_kjpp,
					'nama_kjpp' => $input_nama_kjpp,
					'kode_identitas_kantor' => $input_kode_identitas_kantor
				);
				$file_logo = isset($_FILES['logo_kjpp']) ? $_FILES['logo_kjpp'] : array('tmp_name' => NULL);
				if ( !empty($file_logo['tmp_name']) ) {
					$this->load->library('upload');
                    $file_name = 'header_'.$input_kode_kjpp;
                    $dir_upload = './asset/images/logo_kjpp/';
                    $extensions = pathinfo($file_logo['name'], PATHINFO_EXTENSION);
                    $upload_conf = array(
                        'upload_path'       => $dir_upload,
                        'allowed_types'     => 'gif|jpg|png|jpeg',
                        'max_size'          => '1024',
                        'file_name'         => $file_name.'.'.$extensions,
                    );
                    $this->upload->initialize($upload_conf);
                    if ( !$this->upload->do_upload('logo_kjpp') ) {
                    	$simpan = false;
                        $err_message = 'Error upload file logo:<br/><ul>'.$this->upload->display_errors('<li>','</li>').'</ul>';
                    } else {
                    	$upload_data = $this->upload->data();
                        $images_width   = $upload_data['image_width'];
                        $images_height  = $upload_data['image_height'];

                        $max_height         = 102;
                        $max_width          = 400;
                        if ( $images_height > $max_height || $images_width > $max_width ) {
                            $this->load->library('image_lib');
                            if ( $images_height > $max_height ) {
                                $new_height = $max_height;
                                $new_width  = ($max_height/$images_height)*$images_width;
                                if ($new_width > $max_width) {
                                    $new_height  = ($max_width/$new_width)*$images_height;
                                    $new_width = $max_width;
                                }
                            } else if ( $images_width > $max_width ) {
                                $new_width = $max_width;
                                $new_height = ($max_width/$images_width)*$images_height;
                            }

                            $config_resize['image_library']     = 'gd2';
                            $config_resize['source_image']      = $upload_data['full_path'];
                            $config_resize['maintain_ratio']    = TRUE;
                            $config_resize['width']             = $new_width;
                            $config_resize['height']            = $new_height;

                            $this->image_lib->initialize($config_resize);
                            if ( ! $this->image_lib->resize() ) {
                                $simpan = false;
                                $err_message = 'Failed to resize company logo :<br/><ul>'.$this->image_lib->display_errors('<li>','</li>').'</ul>';
                                if ( file_exists($upload_data['full_path']) )
                                    unlink($upload_data['full_path']);
                            }
                        }
                        $dt_update['logo_kjpp'] = $upload_data['file_name'];
                    }
				}
				if ( $simpan ) {
					if ( !empty($id) ) {
						//edit
						if ( !empty($dt_update['logo_kjpp']) && $mst_data->logo_kjpp != $dt_update['logo_kjpp'] ) {
							$fullpath = './asset/images/logo_kjpp/'.$mst_data->logo_kjpp;
							if ( file_exists($fullpath))
								unlink($fullpath);
						}
						$this->global_model->update_data('mst_kjpp', 'kode_kjpp', $id, $dt_update);
					} else {
						//insert
						$this->global_model->insert_data('mst_kjpp', $dt_update);
					}
					$this->session->set_flashdata('msg_ekjpp', 'Profil KJPP berhasil disimpan');
					redirect(base_url().'pengaturan/kjpp/');
				}
			} 
		}
		if (empty($id))
		{
			$data["title"] 	= "Tambah KJPP";			
			$kode_kjpp 	= $this->formlib->_generate_input_text("kode_kjpp", "Kode KJPP", $input_kode_kjpp, TRUE, TRUE);
			$nama_kjpp	= $this->formlib->_generate_input_text("nama_kjpp", "Nama KJPP", $input_nama_kjpp, TRUE, TRUE);
			$kode_identitas_kantor	= $this->formlib->_generate_input_text("kode_identitas_kantor", "Kode Identitas Kantor", $input_kode_identitas_kantor, TRUE, TRUE, 5);
			$logo_kjpp  = NULL;
		}
		else
		{
			$data["title"] 	= "Ubah KJPP";
				
			$kode_kjpp 	= $this->formlib->_generate_input_text("kode_kjpp", "Kode KJPP", $mst_data->kode_kjpp, TRUE, TRUE);
			$nama_kjpp	= $this->formlib->_generate_input_text("nama_kjpp", "Nama KJPP", $mst_data->nama_kjpp, TRUE, TRUE);
			$kode_identitas_kantor	= $this->formlib->_generate_input_text("kode_identitas_kantor", "Kode Identitas Kantor", $mst_data->kode_identitas_kantor, TRUE, TRUE, 7);
			$logo_kjpp  = $mst_data->logo_kjpp;
		}
		$data['err_message'] = $err_message;
		$data["input"]["id"]			= $id;
		$data["input"]["kode_kjpp"]		= $kode_kjpp;
		$data["input"]["nama_kjpp"]		= $nama_kjpp;
		$data["input"]["kode_identitas_kantor"]		= $kode_identitas_kantor;
        $data["input"]["logo_kjpp"]		= $logo_kjpp;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/kjpp_edit", $data);
	}
	function kjpp_edit($id = null)
	{
		$id 			= base64_decode($id);
		$list_data = $this->global_model->get_list('mst_kjpp', NULL, NULL, NULL, 1);
		$mst_data = false;
		if ( count($list_data) > 0 ) {
			$mst_data		= $list_data[0];	
			$id = $mst_data->id;	
		} else {
			show_404();
			return;
		}
		$input_kode_kjpp = $this->input->post('kode_kjpp');
		$input_nama_kjpp = $this->input->post('nama_kjpp');
		$input_kode_identitas_kantor = $this->input->post('kode_identitas_kantor');
		$err_message = NULL;
		if ( $_POST ) {
			$simpan = true;
			if ( empty($id) )
				$check_kode = count_data('mst_kjpp', array('kode_kjpp' => $input_kode_kjpp));
			else
				$check_kode = count_data('mst_kjpp', array('kode_kjpp' => $input_kode_kjpp, 'kode_kjpp !=' => $mst_data->kode_kjpp));
			if ( $check_kode ) {
				$simpan = false;
				$err_message = 'Kode <b>'.$input_kode_kjpp.'</b> sudah digunakan.';
				$input_kode_kjpp = NULL;
			}
			if ( $simpan ) {
				$dt_update = array(
					'kode_kjpp' => $input_kode_kjpp,
					'nama_kjpp' => $input_nama_kjpp
				);
				$file_logo = isset($_FILES['logo_kjpp']) ? $_FILES['logo_kjpp'] : array('tmp_name' => NULL);
				if ( !empty($file_logo['tmp_name']) ) {
					$this->load->library('upload');
                    $file_name = 'header_'.$input_kode_kjpp;
                    $dir_upload = './asset/images/logo_kjpp/';
                    $extensions = pathinfo($file_logo['name'], PATHINFO_EXTENSION);
                    $upload_conf = array(
                        'upload_path'       => $dir_upload,
                        'allowed_types'     => 'gif|jpg|png|jpeg',
                        'max_size'          => '1024',
                        'file_name'         => $file_name.'.'.$extensions,
                    );
                    $this->upload->initialize($upload_conf);
                    if ( !$this->upload->do_upload('logo_kjpp') ) {
                    	$simpan = false;
                        $err_message = 'Error upload file logo:<br/><ul>'.$this->upload->display_errors('<li>','</li>').'</ul>';
                    } else {
                    	$upload_data = $this->upload->data();
                        $images_width   = $upload_data['image_width'];
                        $images_height  = $upload_data['image_height'];

                        $max_height         = 102;
                        $max_width          = 400;
                        if ( $images_height > $max_height || $images_width > $max_width ) {
                            $this->load->library('image_lib');
                            if ( $images_height > $max_height ) {
                                $new_height = $max_height;
                                $new_width  = ($max_height/$images_height)*$images_width;
                                if ($new_width > $max_width) {
                                    $new_height  = ($max_width/$new_width)*$images_height;
                                    $new_width = $max_width;
                                }
                            } else if ( $images_width > $max_width ) {
                                $new_width = $max_width;
                                $new_height = ($max_width/$images_width)*$images_height;
                            }

                            $config_resize['image_library']     = 'gd2';
                            $config_resize['source_image']      = $upload_data['full_path'];
                            $config_resize['maintain_ratio']    = TRUE;
                            $config_resize['width']             = $new_width;
                            $config_resize['height']            = $new_height;

                            $this->image_lib->initialize($config_resize);
                            if ( ! $this->image_lib->resize() ) {
                                $simpan = false;
                                $err_message = 'Failed to resize company logo :<br/><ul>'.$this->image_lib->display_errors('<li>','</li>').'</ul>';
                                if ( file_exists($upload_data['full_path']) )
                                    unlink($upload_data['full_path']);
                            }
                        }
                        $dt_update['logo_kjpp'] = $upload_data['file_name'];
                    }
				}
				if ( $simpan ) {
					if ( !empty($id) ) {
						//edit
						if ( !empty($dt_update['logo_kjpp']) && $mst_data->logo_kjpp != $dt_update['logo_kjpp'] ) {
							$fullpath = './asset/images/logo_kjpp/'.$mst_data->logo_kjpp;
							if ( file_exists($fullpath))
								unlink($fullpath);
						}
						$this->global_model->update_data('mst_kjpp', 'kode_kjpp', $id, $dt_update);
					} else {
						//insert
						$this->global_model->insert_data('mst_kjpp', $dt_update);
					}
					redirect(base_url().'pengaturan/kjpp/');
				}
			} 
		}
		if (empty($id))
		{
			$data["title"] 	= "Tambah KJPP";			
			$kode_kjpp 	= $this->formlib->_generate_input_text("kode_kjpp", "Kode KJPP", $input_kode_kjpp, TRUE, TRUE);
			$nama_kjpp	= $this->formlib->_generate_input_text("nama_kjpp", "Nama KJPP", $input_nama_kjpp, TRUE, TRUE);
			$kode_identitas_kantor	= $this->formlib->_generate_input_text("kode_identitas_kantor", "Kode Identitas Kantor", $input_kode_identitas_kantor, TRUE, TRUE, 5);
			$logo_kjpp  = NULL;
		}
		else
		{
			$data["title"] 	= "Ubah KJPP";
				
			$kode_kjpp 	= $this->formlib->_generate_input_text("kode_kjpp", "Kode KJPP", $mst_data->kode_kjpp, TRUE, TRUE);
			$nama_kjpp	= $this->formlib->_generate_input_text("nama_kjpp", "Nama KJPP", $mst_data->nama_kjpp, TRUE, TRUE);
			$kode_identitas_kantor	= $this->formlib->_generate_input_text("kode_identitas_kantor", "Kode Identitas Kantor", $mst_data->kode_identitas_kantor, TRUE, TRUE, 5);
			$logo_kjpp  = $mst_data->logo_kjpp;
		}
		$data['err_message'] = $err_message;
		$data["input"]["id"]			= $id;
		$data["input"]["kode_kjpp"]		= $kode_kjpp;
		$data["input"]["nama_kjpp"]		= $nama_kjpp;
		$data["input"]["kode_identitas_kantor"]		= $kode_identitas_kantor;
        $data["input"]["logo_kjpp"]		= $logo_kjpp;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/kjpp_edit", $data);
	}
	function user()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Listing User";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/user", $data);
	}
	
	function user_edit($id = null)
	{
		$id 			= base64_decode($id);
		
		if (empty($id))
		{
			$data["title"] 	= "Tambah User";
			
			
			
			$id 		= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$id_group 	= $this->formlib->_generate_dropdown_master("mst_group","id_group", "id", "nama", "", TRUE);
			$email 		= $this->formlib->_generate_input_text("email", "Email", "", TRUE, TRUE);
			
			$nama 		= $this->formlib->_generate_input_text("nama", "Nama", "", TRUE, TRUE);
			$alamat 	= $this->formlib->_generate_input_textarea("alamat", "Alamat", "", TRUE, TRUE);
			$telepon 	= $this->formlib->_generate_input_text("telepon", "Telepon", "", TRUE, TRUE);
            $jabatan 	= $this->formlib->_generate_input_text("jabatan", "Jabatan", "", TRUE, TRUE);
            $no_mappi 	= $this->formlib->_generate_input_text("no_mappi", "No. Mappi", "", TRUE, TRUE);
            $no_ijinpp 	= $this->formlib->_generate_input_text("no_ijinpp", "No. Izin Penilai Publik", "", TRUE, TRUE);
			
		}
		else
		{
			$data["title"] 	= "Ubah User";
			$mst_data		= $this->global_model->get_data("mst_user", 1, array("id"), array($id))->row();
			
			$id			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$id_group 	= $this->formlib->_generate_dropdown_master("mst_group","id_group", "id", "nama", $mst_data->id_group, TRUE);
			$email 		= $this->formlib->_generate_input_text("email", "Email", $mst_data->email, TRUE, TRUE);
			
			$nama 		= $this->formlib->_generate_input_text("nama", "Nama", $mst_data->nama, TRUE, TRUE);
			$alamat 	= $this->formlib->_generate_input_textarea("alamat", "Alamat", $mst_data->alamat, TRUE, TRUE);
			$telepon 	= $this->formlib->_generate_input_text("telepon", "Telepon", $mst_data->telepon, TRUE, TRUE);
            $jabatan 	= $this->formlib->_generate_input_text("jabatan", "Jabatan", $mst_data->jabatan, TRUE, TRUE);
			$no_mappi 	= $this->formlib->_generate_input_text("no_mappi", "No. Mappi", $mst_data->no_mappi, TRUE, TRUE);
            $no_ijinpp 	= $this->formlib->_generate_input_text("no_ijinpp", "No. Izin Penilai Publik", $mst_data->no_ijinpp, TRUE, TRUE);
		}
		
		$data["input"]["id"]			= $id;
		$data["input"]["id_group"]		= $id_group;
		$data["input"]["email"]			= $email;
		$data["input"]["nama"]			= $nama;
		
		$data["input"]["alamat"]		= $alamat;
		$data["input"]["telepon"]		= $telepon;
        $data["input"]["jabatan"]		= $jabatan;
        $data["input"]["no_mappi"]		= $no_mappi;
        $data["input"]["no_ijinpp"]		= $no_ijinpp;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/user_edit", $data);
	}
	
	function kategori_berita()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Kategori Berita";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/kategori_berita", $data);
	}
	
	function kategori_berita_edit($id = null)
	{
		$id 			= base64_decode($id);
		
		if (empty($id))
		{
			$data["title"] 	= "Tambah Kategori";
			
			
			
			$id 		= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			
			
			$nama 		= $this->formlib->_generate_input_text("nama", "Nama", "", TRUE, TRUE);
			$slug		= $this->formlib->_generate_input_text("slug", "Slug", "", TRUE, TRUE);
			$keterangan	= $this->formlib->_generate_input_textarea("keterangan", "Keterangan", "", TRUE, TRUE);
		}
		else
		{
			$data["title"] 	= "Ubah Kategori";
			$mst_data		= $this->global_model->get_data("mst_kategori", 1, array("id"), array($id))->row();
			
			
			$id 		= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$nama 		= $this->formlib->_generate_input_text("nama", "Nama", $mst_data->nama, TRUE, TRUE);
			$slug		= $this->formlib->_generate_input_text("slug", "Slug", $mst_data->slug, TRUE, TRUE);
			$keterangan	= $this->formlib->_generate_input_textarea("keterangan", "Keterangan", $mst_data->keterangan, TRUE, TRUE);
		}
		
		$data["input"]["id"]			= $id;
		$data["input"]["nama"]			= $nama;
		$data["input"]["slug"]			= $slug;
		$data["input"]["keterangan"]	= $keterangan;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/kategori_berita_edit", $data);
	}
	
	function berita()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Listing Berita";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/berita", $data);
	}

	function berita_edit($id = null)
	{
		$id 			= base64_decode($id);
		$user			= $this->auth->get_data_login();
		
		
		if (empty($id))
		{
			$data["title"] 	= "Tambah Berita";
			
			
			
			$id 			= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$judul 			= $this->formlib->_generate_input_text("judul", "Judul", "", TRUE, TRUE);
			$thumbnail		= $this->formlib->_generate_input_file_image("thumbnail", "Thumbnail", "", TRUE, TRUE);
			$content		= $this->formlib->_generate_input_textarea("content", "Content", "", TRUE, TRUE);
			$slug			= $this->formlib->_generate_input_text("slug", "Slug", "", TRUE, TRUE);
			$id_kategori 	= $this->formlib->_generate_dropdown_master("mst_kategori","id_kategori", "id", "nama", "", TRUE);
			
			$id_user		= $this->formlib->_generate_input_text("id_user", "user", $user["id"], FALSE, TRUE);
			$status 		= $this->formlib->_generate_dropdown_list("status", 2, array(1,0), array("Publish","Draf"), "", TRUE, TRUE);
			$created		= $this->formlib->_generate_input_date("created", "Tanggal", date("Y-m-d"), FALSE, TRUE, "yyyy-mm-dd");
			
		}
		else
		{
			$data["title"] 	= "Ubah Berita";
			$mst_data		= $this->global_model->get_data("mst_berita", 1, array("id"), array($id))->row();
			
			$id				= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$judul 			= $this->formlib->_generate_input_text("judul", "Judul", $mst_data->judul, TRUE, TRUE);
			$thumbnail		= $this->formlib->_generate_input_file_image("thumbnail", "Thumbnail", $mst_data->thumbnail, TRUE, TRUE);
			$content		= $this->formlib->_generate_input_textarea("content", "Content", $mst_data->content, TRUE, TRUE);
			$slug			= $this->formlib->_generate_input_text("slug", "Slug", $mst_data->slug, TRUE, TRUE);
			$id_kategori 	= $this->formlib->_generate_dropdown_master("mst_kategori","id_kategori", "id", "nama", $mst_data->id_kategori, TRUE);
			
			$id_user		= $this->formlib->_generate_input_text("id_user", "user", $user["id"], FALSE, TRUE);
			$status 		= $this->formlib->_generate_dropdown_list("status", 2, array("T","F"), array("Publish","Draf"), $mst_data->status, TRUE, TRUE);
			$created		= $this->formlib->_generate_input_date("created", "Tanggal", date("Y-m-d", strtotime($mst_data->created)), FALSE, TRUE, "yyyy-mm-dd");
			
		}
		
		/*echo date("Y-m-d", strtotime($mst_data->created));die();*/
		
		$data["input"]["id"]			= $id;
		$data["input"]["judul"]			= $judul;
		$data["input"]["thumbnail"]		= $thumbnail;
		$data["input"]["content"]		= $content;
		
		$data["input"]["slug"]			= $slug;
		$data["input"]["id_kategori"]	= $id_kategori;
		$data["input"]["id_user"]		= $id_user;
		$data["input"]["status"]		= $status;
		$data["input"]["created"]		= $created;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/berita_edit", $data);
	}

	function slide()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Pengaturan Slide";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/slide", $data);
	}

	function slide_edit($id = null)
	{
		$id 			= base64_decode($id);
		
		if (empty($id))
		{
			$data["title"] 	= "Tambah Slide";
			
			$id 			= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$title			= $this->formlib->_generate_input_text("title", "Title", "", TRUE, TRUE);
			$image			= $this->formlib->_generate_input_file_image("image", "Image", "", TRUE, TRUE);
			$keterangan		= $this->formlib->_generate_input_textarea("keterangan", "Keterangan", "", TRUE, TRUE);
			$order			= $this->formlib->_generate_input_text("order", "Order", "", TRUE, TRUE);
		}
		else
		{
			$data["title"] 	= "Ubah Slide";
			$mst_data		= $this->global_model->get_data("mst_slide", 1, array("id"), array($id))->row();
			
			$id 			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$title			= $this->formlib->_generate_input_text("title", "Title", $mst_data->title, TRUE, TRUE);
			$image			= $this->formlib->_generate_input_file_image("image", "Image", $mst_data->image, TRUE, TRUE);
			$keterangan		= $this->formlib->_generate_input_textarea("keterangan", "Keterangan", $mst_data->keterangan, TRUE, TRUE);
			$order			= $this->formlib->_generate_input_text("order", "Order", $mst_data->order, TRUE, TRUE);
		}
		
		$data["input"]["id"]			= $id;
		$data["input"]["title"]			= $title;
		$data["input"]["image"]			= $image;
		$data["input"]["keterangan"]	= $keterangan;
		$data["input"]["order"]			= $order;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/slide_edit", $data);
	}

	

	function kontak()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Pesan Kontak";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pengaturan/kontak", $data);
	}
}

?>