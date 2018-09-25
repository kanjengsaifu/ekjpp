<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function klien()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Data Klien";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/klien", $data);
	}
	
	function klien_edit($id = null)
	{
		$id 			= base64_decode($id);
		
		if (empty($id))
		{
			$data["title"] 	= "Klien Baru";
			
			$id			= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$nama 			= $this->formlib->_generate_input_text("nama", "Nama", "", TRUE, TRUE);
			$alamat 		= $this->formlib->_generate_input_textarea("alamat", "Alamat", "", TRUE, TRUE);
			$id_kota 		= $this->formlib->_generate_input_text("id_kota", "Silahkan pilih Provinsi dulu", "", TRUE, TRUE);
			$kode_pos 		= $this->formlib->_generate_input_text("kode_pos", "Kode Pos", "", TRUE, TRUE);
			$status_kepemilikan	= $this->formlib->_generate_dropdown_master("mst_status_kepemilikan","status_kepemilikan", "id", "status_kepemilikan", "", TRUE);
			$bidang_usaha	= $this->formlib->_generate_dropdown_master("mst_bidang_usaha","bidang_usaha", "id", "bidang_usaha", "", TRUE);
			$bidang_usaha_lainnya = $this->formlib->_generate_input_text("bidang_usaha_lainnya", "Bidang Usaha Lainnya", "", TRUE, TRUE);
			$id_provinsi	= $this->formlib->_generate_dropdown_master("mst_provinsi","id_provinsi", "id", "nama", "", TRUE);
			$npwp                   = $this->formlib->_generate_input_text("npwp", "NPWP", "", TRUE, TRUE, 15);
			$telepon 		= $this->formlib->_generate_input_text("telepon", "Telepon", "", TRUE, TRUE);
			$fax 			= $this->formlib->_generate_input_text("fax", "Fax", "", TRUE, TRUE);
			$no_kontak 		= $this->formlib->_generate_input_text("no_kontak", "Nomor Kontak", "", TRUE, TRUE);
			$nama_kontak 	= $this->formlib->_generate_input_text("nama_kontak", "Nama Kontak", "", TRUE, TRUE);
			$id_debitur 	= $this->formlib->_generate_dropdown_master("mst_debitur","id_debitur", "id", "nama", "", TRUE);
			$catatan 		= $this->formlib->_generate_input_textarea("catatan", "Catatan", "", TRUE, TRUE);
			$email                  = $this->formlib->_generate_input_text("email", "Email", "", TRUE, TRUE);
			$website                = $this->formlib->_generate_input_text("website", "Website", "", TRUE, TRUE);
			$emailpribadi           = $this->formlib->_generate_input_text("emailpribadi", "Email Pribadi", "", TRUE, TRUE);
		}
		else
		{
			$data["title"] 	= "Ubah Klien";
			$objek_edit		= $this->global_model->get_data("mst_klien", 1, array("id"), array($id))->row();
			$data['objek_edit'] = $objek_edit;
			$id				= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$nama 			= $this->formlib->_generate_input_text("nama", "Nama", $objek_edit->nama, TRUE, TRUE);
			$alamat 		= $this->formlib->_generate_input_textarea("alamat", "Alamat", $objek_edit->alamat, TRUE, TRUE);
			$id_kota		= $this->formlib->_generate_input_text("id_kota", "Silahkan pilih Provinsi dulu", $objek_edit->id_kota, TRUE, TRUE);
			$id_provinsi            = $this->formlib->_generate_dropdown_master("mst_provinsi","id_provinsi", "id", "nama", $objek_edit->id_provinsi, TRUE);
			
			$kode_pos 		= $this->formlib->_generate_input_text("kode_pos", "Kode Pos", $objek_edit->kode_pos, TRUE, TRUE);
			$status_kepemilikan	= $this->formlib->_generate_dropdown_master("mst_status_kepemilikan","status_kepemilikan", "id", "status_kepemilikan", $objek_edit->id_status_kepemilikan, TRUE);
			$bidang_usaha	= $this->formlib->_generate_dropdown_master("mst_bidang_usaha","bidang_usaha", "id", "bidang_usaha", $objek_edit->id_bidang_usaha, TRUE);
			$bidang_usaha_lainnya = $this->formlib->_generate_input_text("bidang_usaha_lainnya", "Bidang Usaha Lainnya", "", TRUE, TRUE);
			$npwp                   = $this->formlib->_generate_input_text("npwp", "NPWP", $objek_edit->npwp, TRUE, TRUE, 15);
			$telepon 		= $this->formlib->_generate_input_text("telepon", "Telepon", $objek_edit->telepon, TRUE, TRUE);
			$fax 			= $this->formlib->_generate_input_text("fax", "Fax", $objek_edit->fax, TRUE, TRUE);
			$no_kontak 		= $this->formlib->_generate_input_text("no_kontak", "Nomor Kontak", $objek_edit->no_kontak, TRUE, TRUE);
			$nama_kontak            = $this->formlib->_generate_input_text("nama_kontak", "Nama Kontak", $objek_edit->nama_kontak, TRUE, TRUE);
			$id_debitur             = $this->formlib->_generate_dropdown_master("mst_debitur","id_debitur", "id", "nama", $objek_edit->id_debitur, TRUE);
			$catatan 		= $this->formlib->_generate_input_textarea("catatan", "Catatan", $objek_edit->catatan, TRUE, TRUE);
            $email                  = $this->formlib->_generate_input_text("email", "Email", $objek_edit->email, TRUE, TRUE);
			$website 	= $this->formlib->_generate_input_text("website", "Website", $objek_edit->website, TRUE, TRUE);
			$emailpribadi                  = $this->formlib->_generate_input_text("emailpribadi", "Email Pribadi", $objek_edit->emailpribadi, TRUE, TRUE);
		}
		
		$data["input"]["id"]			= $id;
		$data["input"]["nama"]			= $nama;
		$data["input"]["alamat"]		= $alamat;
		$data["input"]["id_kota"]		= $id_kota;
		$data["input"]["id_provinsi"]           = $id_provinsi;
		$data["input"]["kode_pos"]		= $kode_pos;
		$data["input"]["status_kepemilikan"]= $status_kepemilikan;
		$data["input"]["bidang_usaha"]		= $bidang_usaha;
		$data["input"]["bidang_usaha_lainnya"] = $bidang_usaha_lainnya;
		$data["input"]["npwp"]                  = $npwp;
		$data["input"]["telepon"]		= $telepon;
		$data["input"]["fax"]			= $fax;
		$data["input"]["no_kontak"]		= $no_kontak;
		$data["input"]["nama_kontak"]           = $nama_kontak;
		$data["input"]["id_debitur"]            = $id_debitur;
		$data["input"]["catatan"]		= $catatan;
		$data["input"]["email"]                 = $email;
		$data["input"]["website"]		= $website;
                $data["input"]["emailpribadi"]          = $emailpribadi;
                
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/klien_edit", $data);
	}

	function debitur()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Data Debitur";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/debitur", $data);
	}
	
	function debitur_edit($id = null)
	{
		$id 			= base64_decode($id);
		
		if (empty($id))
		{
			$data["title"] 	= "Tambah Debitur";
			$data['objek_edit'] = false;
			$id				= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$nama 			= $this->formlib->_generate_input_text("nama", "Nama", "", TRUE, TRUE);
			$alamat 		= $this->formlib->_generate_input_textarea("alamat", "Alamat", "", TRUE, TRUE);
			$id_kota 		= $this->formlib->_generate_input_text("id_kota", "Silahkan pilih Provinsi dulu", "", TRUE, TRUE);
			$kode_pos 		= $this->formlib->_generate_input_text("kode_pos", "Kode Pos", "", TRUE, TRUE);
			$status_kepemilikan	= $this->formlib->_generate_dropdown_master("mst_status_kepemilikan","status_kepemilikan", "id", "status_kepemilikan", "", TRUE);
			$bidang_usaha	= $this->formlib->_generate_dropdown_master("mst_bidang_usaha","bidang_usaha", "id", "bidang_usaha", "", TRUE);
			$bidang_usaha_lainnya = $this->formlib->_generate_input_text("bidang_usaha_lainnya", "Bidang Usaha Lainnya", "", TRUE, TRUE);
			$id_provinsi	= $this->formlib->_generate_dropdown_master("mst_provinsi","id_provinsi", "id", "nama", "", TRUE);
			$npwp                   = $this->formlib->_generate_input_text("npwp", "NPWP", "", TRUE, TRUE, 15);
			$keterangan 	= $this->formlib->_generate_input_textarea("keterangan", "Keterangan", "", TRUE, TRUE);
		}
		else
		{
			$data["title"] 	= "Ubah Debitur";
			$objek_edit		= $this->global_model->get_data("mst_debitur", 1, array("id"), array($id))->row();
			
			$data['objek_edit'] = $objek_edit;
			$id				= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$nama 			= $this->formlib->_generate_input_text("nama", "Nama", $objek_edit->nama, TRUE, TRUE);
			$alamat 		= $this->formlib->_generate_input_textarea("alamat", "Alamat", $objek_edit->alamat, TRUE, TRUE);
			$id_kota		= $this->formlib->_generate_input_text("id_kota", "Silahkan pilih Provinsi dulu", $objek_edit->id_kota, TRUE, TRUE);
			$id_provinsi            = $this->formlib->_generate_dropdown_master("mst_provinsi","id_provinsi", "id", "nama", $objek_edit->id_provinsi, TRUE);
			$bidang_usaha_lainnya = $this->formlib->_generate_input_text("bidang_usaha_lainnya", "Bidang Usaha Lainnya", "", TRUE, TRUE);
			$kode_pos 		= $this->formlib->_generate_input_text("kode_pos", "Kode Pos", $objek_edit->kode_pos, TRUE, TRUE);
			$status_kepemilikan	= $this->formlib->_generate_dropdown_master("mst_status_kepemilikan","status_kepemilikan", "id", "status_kepemilikan", $objek_edit->id_status_kepemilikan, TRUE);
			$bidang_usaha	= $this->formlib->_generate_dropdown_master("mst_bidang_usaha","bidang_usaha", "id", "bidang_usaha", $objek_edit->id_bidang_usaha, TRUE);
			$bidang_usaha_lainnya = $this->formlib->_generate_input_text("bidang_usaha_lainnya", "Bidang Usaha Lainnya", $objek_edit->bidang_usaha_lainnya, TRUE, TRUE);
			$npwp                   = $this->formlib->_generate_input_text("npwp", "NPWP", $objek_edit->npwp, TRUE, TRUE, 15);
			$keterangan 	= $this->formlib->_generate_input_textarea("keterangan", "Keterangan", $objek_edit->keterangan, TRUE, TRUE);
		}
		
		$data["input"]["id"]			= $id;
		$data["input"]["nama"]			= $nama;
		$data["input"]["alamat"]		= $alamat;
		$data["input"]["id_kota"]		= $id_kota;
		$data["input"]["id_provinsi"]           = $id_provinsi;
		$data["input"]["kode_pos"]		= $kode_pos;
		$data["input"]["status_kepemilikan"]= $status_kepemilikan;
		$data["input"]["bidang_usaha"]		= $bidang_usaha;
		$data["input"]["bidang_usaha_lainnya"] = $bidang_usaha_lainnya;
		$data["input"]["npwp"]                  = $npwp;
		$data["input"]["keterangan"]	= $keterangan;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/debitur_edit", $data);
	}
	
	function jenis_objek()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Data Jenis Objek";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/jenis_objek", $data);
	}
	
	function jenis_objek_edit($id = null)
	{
		$id 			= base64_decode($id);
		
		if (empty($id))
		{
			$data["title"] 	= "Tambah Jenis Objek";
			
			$id				= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$nama 			= $this->formlib->_generate_input_text("nama", "Nama", "", TRUE, TRUE);
			$keterangan 	= $this->formlib->_generate_input_textarea("keterangan", "Keterangan", "", TRUE, TRUE);
		}
		else
		{
			$data["title"] 	= "Ubah Jenis Objek";
			$objek_edit		= $this->global_model->get_data("mst_jenis_objek", 1, array("id"), array($id))->row();
			
			$id				= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$nama 			= $this->formlib->_generate_input_text("nama", "Nama", $objek_edit->nama, TRUE, TRUE);
			$keterangan 	= $this->formlib->_generate_input_textarea("keterangan", "Keterangan", $objek_edit->keterangan, TRUE, TRUE);
		}
		
		$data["input"]["id"]			= $id;
		$data["input"]["nama"]			= $nama;
		$data["input"]["keterangan"]	= $keterangan;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/jenis_objek_edit", $data);
	}
	
	function transportasi()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Data Transportasi";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/transportasi", $data);
	}
	
	function transportasi_edit($id = null)
	{
		$id 			= base64_decode($id);
		
		if (empty($id))
		{
			$data["title"] 	= "Tambah Transportasi";
			
			$id				= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$nama 			= $this->formlib->_generate_input_text("nama", "Nama", "", TRUE, TRUE);
			$keterangan 	= $this->formlib->_generate_input_textarea("keterangan", "Keterangan", "", TRUE, TRUE);
		}
		else
		{
			$data["title"] 	= "Ubah Transportasi";
			$objek_edit		= $this->global_model->get_data("mst_transportasi_survey", 1, array("id"), array($id))->row();
			
			$id				= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$nama 			= $this->formlib->_generate_input_text("nama", "Nama", $objek_edit->nama, TRUE, TRUE);
			$keterangan 	= $this->formlib->_generate_input_textarea("keterangan", "Keterangan", $objek_edit->keterangan, TRUE, TRUE);
		}
		
		$data["input"]["id"]			= $id;
		$data["input"]["nama"]			= $nama;
		$data["input"]["keterangan"]	= $keterangan;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/transportasi_edit", $data);
	}
	function bidang_usaha()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Bidang Usaha";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/bidang_usaha", $data);
	}
	function bidang_usaha_edit($id = null)
	{
		$id 			= base64_decode($id);
		
		if (empty($id))
		{
			$data["title"] 	= "Tambah Bidang Usaha";
			
			$id				= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$bidang_usaha 	= $this->formlib->_generate_input_text("bidang_usaha", "Bidang Usaha", "", TRUE, TRUE);
			$kode 	= $this->formlib->_generate_input_text("kode", "Kode", "", TRUE, TRUE);
		}
		else
		{
			$data["title"] 	= "Ubah Bidang Usaha";
			$objek_edit		= $this->global_model->get_data("mst_bidang_usaha", 1, array("id"), array($id))->row();
			
			$id				= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$bidang_usaha 	= $this->formlib->_generate_input_text("bidang_usaha", "Bidang Usaha", $objek_edit->bidang_usaha, TRUE, TRUE);
			$kode 	= $this->formlib->_generate_input_text("kode", "Kode", $objek_edit->kode, TRUE, TRUE);
		}
		
		$data["input"]["id"]			= $id;
		$data["input"]["bidang_usaha"]			= $bidang_usaha;
		$data["input"]["kode"]	= $kode;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/bidang_usaha_edit", $data);
	}

	function jenis_jasa()
	{
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Jenis Jasa";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/jenis_jasa", $data);
	}
	function jenis_jasa_edit($id = null)
	{
		$id 			= base64_decode($id);
		
		if (empty($id))
		{
			$data["title"] 	= "Tambah Jenis Jasa";
			
			$id				= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$jenis_jasa 	= $this->formlib->_generate_input_text("jenis_jasa", "Jenis Jasa", "", TRUE, TRUE);
			$kode 	= $this->formlib->_generate_input_text("kode", "Kode", "", TRUE, TRUE);
		}
		else
		{
			$data["title"] 	= "Ubah Jenis Jasa";
			$objek_edit		= $this->global_model->get_data("mst_jenis_jasa", 1, array("id"), array($id))->row();
			
			$id				= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$jenis_jasa 	= $this->formlib->_generate_input_text("jenis_jasa", "Jenis Jasa", $objek_edit->jenis_jasa, TRUE, TRUE);
			$kode 	= $this->formlib->_generate_input_text("kode", "Kode", $objek_edit->kode, TRUE, TRUE);
		}
		
		$data["input"]["id"]			= $id;
		$data["input"]["jenis_jasa"]			= $jenis_jasa;
		$data["input"]["kode"]	= $kode;
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("master/jenis_jasa_edit", $data);
	}
}

?>