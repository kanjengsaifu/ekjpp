<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	
	function do_change_menu_access()
	{
		$data	= $_POST["data"];
		$value	= $_POST["value"];
		
		$data	= explode(":", $data);
		$group	= explode("=", $data[0]);
		$menu	= explode("=", $data[1]);
		$id_group	= $group[1];
		$id_menu	= $menu[1];
		
		$cek_menu	= $this->global_model->get_data("txn_group_menu", 2, array("id_group", "id_menu"), array($id_group, $id_menu))->num_rows();
		
		if ($value == "true"){
			if ($cek_menu == 0){
				$this->global_model->save("txn_group_menu", array("id_group" => $id_group, "id_menu" => $id_menu));
			}
		}else if ($value == "false"){
			$this->global_model->delete("txn_group_menu", 2, array("id_group", "id_menu"), array($id_group, $id_menu));
		}
	}

	function do_ubah_password()
	{
		$user		= $this->auth->get_data_login();
		$password1	= $_POST["password1"];
		$password2	= $_POST["password2"];
		$password3	= $_POST["password3"];
		$result		= "error";
		$message	= "";
		
		if (empty($password1) || empty($password2) || empty($password3)){
			$message	= "Silahkan isi semua kolom yang ada.";
		}else if ($user["password"] != md5($password1)){
			$message	= "Password Lama tidak sesuai.";
		}else if ($password2 != $password3){
			$message	= "Password baru tidak sama.";
		}else{
			$update_password = $this->global_model->update("mst_user", 1, array("id"), array($user["id"]), array("password" => md5($password2)));
			
			if ($update_password){
				$result		= "success";
				$message 	= "Password berhasil diubah";
			}
		}
		
		echo json_encode(array("result" => $result, "message" => $message));
	}
	
	
	function do_klien_edit()
	{
		$id 			= base64_decode($_POST["id"]);
		$nama 			= $_POST["nama"];
		$alamat 		= $_POST["alamat"];
		$id_kota 		= $_POST["id_kota"];
		$kode_pos 		= $_POST["kode_pos"];
		$id_status_kepemilikan 		= $_POST["id_status_kepemilikan"];
		$id_bidang_usaha 		= $_POST["id_bidang_usaha"];
		$bidang_usaha_lainnya = $_POST["bidang_usaha_lainnya"];
		$go_publik		= isset($_POST['go_publik']) ? $_POST['go_publik'] : NULL;
		$id_provinsi 	= $_POST["id_provinsi"];
		$telepon 		= $_POST["telepon"];
		$fax 			= $_POST["fax"];
		$no_kontak 		= $_POST["no_kontak"];
		$nama_kontak 	= $_POST["nama_kontak"];
		$id_debitur 	= $_POST["id_debitur"];
		$catatan 		= $_POST["catatan"];
        $npwp                   = $_POST["npwp"];
        $npwp_file                   = $_POST["npwp_file"];
        $email                  = $_POST["email"];
        $website                = $_POST["website"];
        $emailpribadi           = $_POST["emailpribadi"];
		$result			= "error";
		$message		= "";
		
		
		if (empty($nama))
		{
			$message	.= "Nama tidak boleh kosong.<br>";
		} else if (empty($id_bidang_usaha))
		{
			$message	.= "Bidang usaha tidak boleh kosong.<br>";
		}
		else
		{
			$data	= array(
				"nama" => $nama,
				"alamat" => $alamat,
				"id_kota" => empty($id_kota) ? NULL : $id_kota,
				"id_provinsi" => empty($id_provinsi) ? NULL : $id_provinsi,
				"kode_pos"	=> empty($kode_pos) ? NULL : $kode_pos,
				"id_status_kepemilikan" => empty($id_status_kepemilikan) ? NULL : $id_status_kepemilikan,
				"id_bidang_usaha"	=> empty($id_bidang_usaha) ? NULL : $id_bidang_usaha,
				"go_publik"	=> is_numeric($go_publik) ? $go_publik : NULL,
				"telepon" => $telepon,
				"fax" => $fax,
				"no_kontak" => $no_kontak,
				"nama_kontak" => $nama_kontak,
				"id_debitur" => $id_debitur,
				"catatan" => $catatan,
                "npwp" => $npwp,
                "npwp_file" => $npwp_file,
                "email" => $email,
                "website" => $website,
                "emailpribadi" => $emailpribadi
			);
			if ( $data["id_bidang_usaha"] == 17 ) {
				$data["bidang_usaha_lainnya"] = $bidang_usaha_lainnya;
			} else {
				$data["bidang_usaha_lainnya"] = NULL;
			}
			if (!empty($id_kota)){
				$data["id_kota"]	= $id_kota;
			}
			
			if (!empty($id_provinsi)){
				$data["id_provinsi"]	= $id_provinsi;
			}
			
			if (!empty($id_debitur)){
				$data["id_debitur"]	= $id_debitur;
			}
			
			if (empty($id)){
				$this->global_model->save("mst_klien", $data);
			}else{
				$this->global_model->update("mst_klien", 1, array("id"), array($id), $data);
			}
			
			$result			= "success";
			$message		= "Data berhasil disimpan.";
		}
		
		echo json_encode(array("result" => $result, "message" => $message));
	}

	function do_debitur_edit()
	{
		$id 			= base64_decode($_POST["id"]);
		$nama 			= $_POST["nama"];
		$alamat 		= $_POST["alamat"];
		$id_kota 		= $_POST["id_kota"];
		$kode_pos 		= $_POST["kode_pos"];
		$id_status_kepemilikan 		= $_POST["id_status_kepemilikan"];
		$id_bidang_usaha 		= $_POST["id_bidang_usaha"];
		$bidang_usaha_lainnya = $_POST["bidang_usaha_lainnya"];
		$go_publik		= isset($_POST['go_publik']) ? $_POST['go_publik'] : NULL;
		$id_provinsi 	= $_POST["id_provinsi"];
		$npwp                   = $_POST["npwp"];
        $keterangan           = $_POST["keterangan"];
		$result			= "error";
		$message		= "";
		
		
		if (empty($nama))
		{
			$message	.= "Nama tidak boleh kosong.<br>";
		} else if (empty($id_bidang_usaha))
		{
			$message	.= "Bidang usaha tidak boleh kosong.<br>";
		}
		else
		{
			$data	= array(
				"nama" => $nama,
				"alamat" => $alamat,
				"id_kota" => empty($id_kota) ? NULL : $id_kota,
				"id_provinsi" => empty($id_provinsi) ? NULL : $id_provinsi,
				"kode_pos"	=> empty($kode_pos) ? NULL : $kode_pos,
				"id_status_kepemilikan" => empty($id_status_kepemilikan) ? NULL : $id_status_kepemilikan,
				"id_bidang_usaha"	=> empty($id_bidang_usaha) ? NULL : $id_bidang_usaha,
				"go_publik"	=> is_numeric($go_publik) ? $go_publik : NULL,
				"npwp" => $npwp,
                "keterangan" => $keterangan
			);
			if ( $data["id_bidang_usaha"] == 17 ) {
				$data["bidang_usaha_lainnya"] = $bidang_usaha_lainnya;
			} else {
				$data["bidang_usaha_lainnya"] = NULL;
			}
			if (!empty($id_kota)){
				$data["id_kota"]	= $id_kota;
			}
			
			if (!empty($id_provinsi)){
				$data["id_provinsi"]	= $id_provinsi;
			}
			
			if (empty($id)){
				$this->global_model->save("mst_debitur", $data);
			}else{
				$this->global_model->update("mst_debitur", 1, array("id"), array($id), $data);
			}
			
			$result			= "success";
			$message		= "Data berhasil disimpan.";
		}
		
		echo json_encode(array("result" => $result, "message" => $message));
	}
	
	function do_user_edit()
	{
		$config			= $this->spmlib->get_config();
		$id 			= base64_decode($_POST["id"]);
		$id_group 		= $_POST["id_group"];
		$email 			= $_POST["email"];
		$nama 			= $_POST["nama"];
		$alamat 		= $_POST["alamat"];
		$telepon 		= $_POST["telepon"];
		$no_mappi 		= $_POST["no_mappi"];
		$no_ijinpp		= $_POST["no_ijinpp"];
		$jabatan  		= $_POST["jabatan"];
		
		
		$result			= "error";
		$message		= "";
		
		if (empty($nama) || empty($email) || empty($id_group))
		{
			$message	.= "Nama tidak boleh kosong.<br>";
		}
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$message 	.= "Email tidak valid.<br>"; 
		}
		else
		{
			// Cek Email
			if (empty($id)){
				$cek_email	= $this->global_model->get_data("mst_user", 1, array("email"), array($email));
			}else{
				$cek_email	= $this->global_model->get_by_query("SELECT * FROM mst_user WHERE `email` = '".$email."' AND`id` <> ".$id." ");
			}
			
			if ($cek_email->num_rows() <> 0)
			{
				$message	.= "Email yang Anda masukan telah ada.<br>";
			}
			else
			{
				if (empty($id))
				{
					$password	= $this->spmlib->generate_random_string(6);
				
					$data	= array(
						"id_group" => $id_group,
						"email" => $email,
						"nama" => $nama,
						"alamat" => $alamat,
						"telepon" => $telepon,
						"jabatan"	=> $jabatan,
						"no_mappi" => $no_mappi,
						"no_ijinpp" => $no_ijinpp,
						"password" => md5($password),
						"auth" => md5($email."-".$password)
					);
					
					$to			= array();
					$cc			= array();
					$subject	= "Pendaftaran User";
					$content	= "";
					
					array_push($to, array("Email" => $email, "Nama" => $nama));
					$content		= "
						Anda Telah berhasil didaftarkan di <b>".$config["site_name"]."</b>. <br>Berikut data Anda : <br><br>
						<table cellpadding='2' cellspacing='0' border='0'>
							<tr>
								<td>Nama</td>
								<td align='center' width='30'>:</td>
								<td>".$nama."</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td align='center' width='30'>:</td>
								<td>".$alamat."</td>
							</tr>
							<tr>
								<td>Telepon</td>
								<td align='center' width='30'>:</td>
								<td>".$telepon."</td>
							</tr>
							<tr>
								<td>Email</td>
								<td align='center' width='30'>:</td>
								<td>".$email."</td>
							</tr>
							<tr>
								<td>Password</td>
								<td align='center' width='30'>:</td>
								<td><b>".$password."</b></td>
							</tr>
						</table><br><br>
						
						Untuk login user, silahkan klik link dibawah.<br>
						<a href='".base_url()."login/'>".$config["site_name"]."</a>
						
					";
					
					$this->spmlib->send_mail($to, $cc, $subject, $content);
				}
				else
				{
					$data	= array(
						"id_group" => $id_group,
						"email" => $email,
						"nama" => $nama,
						"alamat" => $alamat,
						"jabatan" => $jabatan,
						"no_mappi" => $no_mappi,
						"no_ijinpp" => $no_ijinpp,
						"telepon" => $telepon
					);
				}
				
				
				if (empty($id)){
					$this->global_model->save("mst_user", $data);
				}else{
					$this->global_model->update("mst_user", 1, array("id"), array($id), $data);
				}
				
				
				$result			= "success";
				$message		= "Data berhasil disimpan.";
			}
		}
		echo json_encode(array("result" => $result, "message" => $message));
	}
	
	function do_update_data()
	{
		$id 			= base64_decode($_POST["id"]);
		$type			= $this->input->post('type');
		$nama 			= $this->input->post('nama');
		$keterangan		= $this->input->post('keterangan');
		
		$result			= "error";
		$message		= "";
		
		$table_name		= "";
		if ($type == "jenis_objek"){
			$table_name		= "mst_jenis_objek";
		}else if ($type == "transportasi"){
			$table_name		= "mst_transportasi_survey";
		}else if ($type == "debitur"){
			$table_name		= "mst_debitur";
		} else if ( $type == "bidang_usaha" ) {
			$table_name = 'mst_bidang_usaha';
			$nama = 'bidang_usaha';
		} else if ( $type == "jenis_jasa" ) {
			$table_name = 'mst_jenis_jasa';
			$nama = 'jenis_jasa';
		}
		
		if (empty($nama))
		{
			if ( $type == 'bidang_usaha' ) {
				$message	.= "Bidang usaha tidak boleh kosong.";
			} else if ( $type == 'status_kepemilikan' ) {
				$message	.= "Status kepemilikan tidak boleh kosong.";
			} else if ( $type == 'jenis_jasa' ) {
				$message	.= "Jenis jasa tidak boleh kosong.";
			} else {
				$message	.= "Nama tidak boleh kosong.";
			}
		}
		else
		{
			if ( in_array($type, array('bidang_usaha', 'status_kepemilikan', 'jenis_jasa')) ) {
				$data = array();
				foreach ($_POST as $key => $value) {
					if ( $key != 'id' && $key != 'type' && $key != 'updated' ) {
						$data[$key] = $value;
					}
				}
				if (empty($id)){
					$this->global_model->insert_data($table_name, $data);
				}else{
					//print_r($data);
					$this->global_model->update_data($table_name, "id", $id, $data);
					//echo $this->db->last_query();
				}
			} else {
				$data	= array(
					"nama" => $nama,
					"keterangan" => $keterangan
				);
				if (empty($id)){
					$this->global_model->save($table_name, $data);
				}else{
					$this->global_model->update($table_name, 1, array("id"), array($id), $data);
				}
			}
			
			$result			= "success";
			$message		= "Data berhasil disimpan.";
		}
		
		echo json_encode(array("result" => $result, "message" => $message));
	}
	
	function do_update_data_global()
	{
		$id 			= base64_decode($_POST["id"]);
		$type			= $_POST["type"];
		$table_name		= "";
		$list_field		= array();
		$required_field	= array();
		$result			= "error";
		$message		= "";
		$data			= array();
		$id_lokasi = false;
		
		if ($type == "jenis_objek")
		{
			$table_name		= "mst_jenis_objek";
			$list_field		= array("nama", "keterangan");
			$required_field	= array("nama");
		}
		else if ($type == "transportasi")
		{
			$table_name		= "mst_transportasi_survey";
			$list_field		= array("nama", "keterangan");
			$required_field	= array("nama");
		}
		else if ($type == "debitur")
		{
			$table_name		= "mst_debitur";
			$list_field		= array("nama", "keterangan");
			$required_field	= array("nama");
		}
		else if ($type == "lokasi")
		{
			$table_name		= "mst_lokasi";
			$jenis_objek = $_POST['id_jenis_objek'];

			$list_field		= array("id_pekerjaan","kode","alamat","id_provinsi","id_kota","id_kecamatan","id_desa","pengembangan","pemegang_hak","kepemilikan","jenis_sertifikat","no_sertifikat","luas_tanah","luas_bangunan",
			"id_jenis_objek","gang","nomor","rt","rw","dh_provinsi","dh_kota","dh_kecamatan","dh_desa","zip","latitude","longitude");
			$required_field	= array("id_pekerjaan","id_jenis_objek","alamat","nomor","rt","rw","id_provinsi","id_kota","id_kecamatan","id_desa","pengembangan","pemegang_hak","kepemilikan","jenis_sertifikat","no_sertifikat","luas_tanah");
			
			if($jenis_objek == 1) {
				$required_label	= array("Pekerjaa","Jenis Objek","Alamat", "Nomor","RT", "RW","Provinsi","Kota","Kecamatan","Desa","Pengembangan","Pemegang Hak","Kepemilikan","Jenis Sertifikat","No Sertifikat","Luas Tanah");
			}
		}
		else if ($type == "lembar_kendali")
		{
			$table_name		= "mst_lembar_kendali";
			$list_field		= array("id_pekerjaan","step","jawab_1a","jawab_1b","jawab_2a","jawab_2b","jawab_3a","jawab_3b","jawab_4a","jawab_4b","jawab_5a","jawab_5b","jawab_6a","jawab_6b","jawab_7a","jawab_7b");
			$required_field	= array();
			
		}
		else if ($type == "evaluasi")
		{
			$table_name		= "mst_evaluasi";
			$list_field		= array("id_pekerjaan","catatan_lembar_kendali","kriteria_keberhasilan","termin_pembayaran","project_manager","kriteria_lain","keterangan");
			$required_field	= array();
			
		}
		else if ($type == "dokumen_penawaran")
		{
			$table_name		= "mst_dokumen_penawaran";
			$list_field		= array("id_pekerjaan","id_dokumen_master","no_penawaran","tanggal","kota","up","domisili","kontak","komunikasi_via","komunikasi_via_keterangan","tanggal_komunikasi","tujuan_penilaian","biaya","penanda_tangan","dokumen_final");
			$required_field	= array("kota", "tanggal", "up", "domisili", "kontak", "komunikasi_via", "tanggal_komunikasi", "tujuan_penilaian","penanda_tangan");
			$required_label	= array("Kota", "Tanggal Terbit Surat", "UP", "Domisili Pemberi Kerja", "Kontak Pemberi Kerja", "Komunikasi Via", "Tanggal Komunikasi", "Tujuan Penilaian","Penanda Tangan Laporan");
			
		}
		else if ($type == "dokumen_gabung")
		{
			$table_name		= "mst_dokumen_gabung";
			$list_field		= $_POST["input"];
			$required_field	= array("no","tanggal","total","file");
			$required_label	= array("Nomor","Tanggal","Total","File");
			
		}
		else if ($type == "dokumen_kwitansi")
		{
			$table_name		= "mst_dokumen_kwitansi";
			$list_field		= $_POST["input"];
			$required_field	= array("berupa","bank","no","sebesar","terbilang","keterangan","tanggal","dikirim","diterima");
			$required_label	= array("Berupa","Bank","No","Sebesar","Terbilang","Keterangan","Tanggal","Dikirim","Diterima");
			
		}
		else if ($type == "profile")
		{
			$table_name		= "mst_user";
			$list_field		= array("nama","email","alamat","telepon");
			$required_field	= array();
			
		}
		else if ($type == "penugasan")
		{
			$table_name		= "txn_tugas";
			$list_field		= array("id_lokasi","id_user");
			$required_field	= array("id_user");
			$required_label	= array("Petugas");
			
		}
		else if ($type == "draft_laporan" || $type == "draft_laporan_final" || $type == "upload_tterima_dokumen" )
		{
			$table_name		= "txn_draft_laporan";
			$list_field		= array("id_pekerjaan","filename");
			$required_field	= array("filename");
			$required_label	= array("File tidak boleh kosong");
			$data["type"]	= $type;
		}

		else if ($type == "kategori_berita")
		{
			$table_name		= "mst_kategori";
			$list_field		= array("nama","slug","keterangan");
			$required_field	= array("nama","slug");
			$required_label	= array("Nama", "Slug");
		}
		else if ($type == "berita")
		{
			$table_name		= "mst_berita";
			$list_field		= array("judul","thumbnail","content","slug","id_kategori","id_user","status","created");
			$required_field	= array("judul","thumbnail","content","slug","id_kategori","id_user","status","created");
			$required_label	= array("Judul","Thumbnail","Content","Slug","Kategori","User","Status","created");
		}
		else if ($type == "slide")
		{
			$table_name		= "mst_slide";
			$list_field		= array("title","image","keterangan","order");
			$required_field	= array("title","image","order");
			$required_label	= array("Title","File Image","Order (Urutan)");
		}

		if ($type == "dokumen_gabung" || $type == "dokumen_kwitansi")
		{
			foreach ($list_field as $field_name => $field_value)
			{
				if (in_array($field_name, $required_field) && empty($field_value) )
				{
					$key_field = array_keys($required_field, $field_name);
					$get_label = !empty($key_field) ? $required_label[$key_field[0]] : "";
					$message .= "".$get_label." tidak boleh kosongtidak boleh kosong.<br>";
				}
			}
			
			if($message != "")
			{
				$result			= "error";
				$message		= $message;
			}
			else
			{
				$list_field["tanggal"]	= date("Y-m-d", strtotime($list_field["tanggal"]));
				
				if(empty($_POST["id"])){
					$this->global_model->save($table_name, $list_field);
					$message		= "Data berhasil ditambahkan";
				}else{
					$this->global_model->update($table_name, 1, array("id"), array($_POST["id"]), $list_field);
					$message		= "Data berhasil diubah";
				}
					
				$result			= "success";
			}
		}
		else
		{
			$i 		= 0;
			foreach ($list_field as $item_field)
			{
				if (in_array($item_field, $required_field) && empty($_POST[$item_field]) )
				{
					$key_field = array_keys($required_field, $item_field);
					$get_label = !empty($key_field) ? $required_label[$key_field[0]] : "";
					$message .= "".$get_label." tidak boleh kosong.<br>";
				}
				else
				{
					if (($type == "lokasi" || $type == "lembar_kendali" || $type == "evaluasi" || $type == "dokumen_penawaran") && $item_field == "id_pekerjaan")
					{
						$data[$item_field] = base64_decode(array_key_exists($item_field, $_POST) ? $_POST[$item_field] : "");
					}
					else if ($type == "dokumen_penawaran" && $item_field == "id_dokumen_master")
					{
						$data[$item_field] = base64_decode(array_key_exists($item_field, $_POST) ? $_POST[$item_field] : "");
					}
					else if ($type == "dokumen_penawaran" && ($item_field == "tanggal" || $item_field == "tanggal_komunikasi"))
					{
						$data[$item_field] = date("Y-m-d", strtotime($_POST[$item_field]));
					}
					else if (($type == "draft_laporan" || $type == "draft_laporan_final" || $type == "upload_tterima_dokumen") && ($item_field == "id_pekerjaan"))
					{
						$data[$item_field] = base64_decode($_POST[$item_field]);
					}
					else
					{
						$data[$item_field] = array_key_exists($item_field, $_POST) ? $_POST[$item_field] : "";
					}
				}
				
				
				$i++;
			}
			
			if ($message != "")
			{
				$result			= "error";
				$message		= $message;
			}
			else
			{
				$user_login	= $this->auth->get_data_login();
				
				if ($type == "lokasi")
				{
					$data["id_user"]	= $user_login["id"];
					
					if (empty($id))
					{
						$last_lokasi	= $this->global_model->get_by_query("SELECT * FROM mst_lokasi WHERE id_pekerjaan = ".$data["id_pekerjaan"]." ORDER BY kode DESC LIMIT 1 ");
						
						if ($last_lokasi->num_rows() == 0)
						{
							$data["kode"]	= "K0001";
						}
						else
						{
							$last_kode	= $last_lokasi->row()->kode;
							$last_kode	= str_replace("K", "", $last_kode);
							$last_kode	= ((int)$last_kode) + 1;
							$last_kode	= "K".sprintf('%04d', $last_kode);;
							
							
							$data["kode"]	= $last_kode;
						}
						
					}
				}
				
				if ($type == "lembar_kendali")
				{
					$data["id_user"]	= $user_login["id"];
					
					if (empty($id))
					{
						$data["step"]		= "4K/00/2016";
					}
					// 
					$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($data["id_pekerjaan"]))->row();
					
					if ($pekerjaan->id_status <= 3 )
					{
						$data["id_status"]		= 2;
						
						if ($pekerjaan->id_status == 2)
						{
							$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 2), array("do" => 1, "id_user" => $data["id_user"]));
							$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_user" => $data["id_user"], "id_status" => 3) );
						}
					}
					else if ($pekerjaan->id_status <= 5 )
					{
						$data["id_status"]		= 5;
						
						if ($pekerjaan->id_status == 5)
						{
							$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 5), array("do" => 1, "id_user" => $data["id_user"]));
							$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_status" => 6) );
						}
					}
					else if ($pekerjaan->id_status <= 8 )
					{
						$data["id_status"]		= 8;
						
						if ($pekerjaan->id_status == 8)
						{
							$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 8), array("do" => 1, "id_user" => $data["id_user"]));
							$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_status" => 9, "id_user" => $data["id_user"]) );
						}
					}
					
				}
				
				if ($type == "evaluasi")
				{
					$data["id_user"]	= $user_login["id"];
					
					// 
					$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($data["id_pekerjaan"]))->row();
					
					if ($pekerjaan->id_status == 4)
					{
						$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 4), array("id_pekerjaan" => $pekerjaan->id, "id_status" => 4, "id_user" => $data["id_user"], "do" => 1) );
						// Next Step
						$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" => $pekerjaan->id, "id_status" => 5) );
						//$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_status" => 6) );
					}
					
					if ($pekerjaan->id_status == 9)
					{
						$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 9), array("id_pekerjaan" => $pekerjaan->id, "id_status" => 9, "id_user" => $data["id_user"], "do" => 1) );
						// Next Step
						$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" => $pekerjaan->id, "id_status" => 10) );
					}
				}
				
				if ($type == "dokumen_penawaran")
				{
					$data["id_user"]	= $user_login["id"];
					$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($data["id_pekerjaan"]))->row();
					if ($pekerjaan->id_status == 8) {
						$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 8), array("id_pekerjaan" => $pekerjaan->id, "id_status" => 8, "id_user" => $data["id_user"], "do" => 1) );
						// Next Step
						$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" => $pekerjaan->id, "id_status" => 9, "id_user" => $data["id_user"]) );
						
					}
				}
				
				if ($type == "dokumen_invoice")
				{
					$data["id_user"]			= $user_login["id"];
					$data["id_pekerjaan"]		= base64_decode($data["id_pekerjaan"]);
					$data["id_dokumen_master"]	= base64_decode($data["id_dokumen_master"]);
				}
				
				// Update Data
				if ($type == "dokumen_penawaran" || $type == "dokumen_invoice")
				{
					$cek_dokumen	= $this->global_model->get_data($table_name, 2, array("id_pekerjaan", "id_dokumen_master"), array($data["id_pekerjaan"], $data["id_dokumen_master"]));
					
					if ($cek_dokumen->num_rows() == 0)
					{
						$this->global_model->save($table_name, $data);
						$message		= "Data berhasil ditambahkan";
					}
					else
					{
						$this->global_model->update($table_name, 1, array("id"), array($cek_dokumen->row()->id), $data);
						$message		= "Data berhasil diubah";
					}
				}
				else
				{
					if (empty($id))
					{
						$id_lokasi = $this->global_model->save($table_name, $data);
						$message = "Data berhasil ditambahkan";
					}else{
						$id_lokasi = $id;
						$this->global_model->update($table_name, 1, array("id"), array($id), $data);
						$message		= "Data berhasil diubah";
					}
					
					
					// Update Penugasan
					if ($type == "penugasan")
					{
						// Cek Status
						$user		= $this->auth->get_data_login();
						$is_update	= false;
						$lokasi		= $this->global_model->get_data("mst_lokasi", 1, array("id"), array($data["id_lokasi"]))->row();
						$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($lokasi->id_pekerjaan))->row();
						$list_lokasi	= $this->global_model->get_data("mst_lokasi", 1, array("id_pekerjaan"), array($lokasi->id_pekerjaan));
						
						foreach ($list_lokasi->result() as $item_lokasi)
						{
							$cek_petugas	= $this->global_model->get_data("txn_tugas", 1, array("id_lokasi"), array($item_lokasi->id));
							
							if (!empty($item_lokasi->tanggal_mulai) && !empty($item_lokasi->tanggal_selesai) && !empty($item_lokasi->biaya) && $cek_petugas->num_rows() > 0)
							{
								$is_update = true;
							}
						}
						
						if ($is_update && $pekerjaan->id_status == 12)
						{
							$id_status			= 12;
							$data				= array(
								"id_pekerjaan"		=> $pekerjaan->id,
								"id_status"			=> $id_status,
								"id_user"			=> $user["id"],
								"do"				=> 1
							);
							$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, $id_status));
							if ($cek_data->num_rows() != 0)
							{
								$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, $id_status), $data);
							}
							
							// Next Step
							{
								$data_next	= array(
									"id_pekerjaan"		=> $pekerjaan->id,
									"id_status"			=> ($id_status + 1),
									"id_user"			=> $user["id"]
								);
								$this->global_model->save("txn_pekerjaan_status", $data_next);
							}
							
							//redirect(base_url()."pekerjaan/detail/".base64_encode($pekerjaan->id));
						}
					}
				}
				
				
				
				
				$result			= "success";
			}

			if ($type == "lokasi")
			{
				if (array_key_exists("list_objek", $_POST))
				{
					$list_objek		= $_POST["list_objek"];
					$current_lokasi	= $this->global_model->get_by_query("SELECT * FROM mst_lokasi ORDER BY updated DESC LIMIT 1")->row();
					$query_delete	= $this->global_model->delete("txn_lokasi_objek", 1, array("id_lokasi"), array($current_lokasi->id));
					
					foreach ($list_objek as $item_objek)
					{
						$this->global_model->save("txn_lokasi_objek", array("id_lokasi" => $current_lokasi->id, "id_jenis_objek" => $item_objek));
					}
				}
			}
		}

		if ($type == "draft_laporan")
		{
			$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($data["id_pekerjaan"]))->row();
			
			
			
			if ($pekerjaan->id_status == 22)
			{
				$user	= $this->auth->get_data_login();
				
				$data				= array(
					"id_pekerjaan"		=> $data["id_pekerjaan"],
					"id_status"			=> $pekerjaan->id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				
				$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($data["id_pekerjaan"], $pekerjaan->id_status), $data);
				
				$lembar_kendali			= $this->global_model->get_data("mst_lembar_kendali", 2, array("id_pekerjaan", "step"), array($data["id_pekerjaan"], "LKK-2"))->row();
				
				$txn_lembar_kendali		= $this->global_model->get_data("txn_lembar_kendali_2", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();
				
				
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $data["id_pekerjaan"],
					"id_status"			=> ($pekerjaan->id_status + 1),
					"id_user"			=> $txn_lembar_kendali->project_manager
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
					
				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}
		
		if ($type == "draft_laporan_final")
		{
			$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($data["id_pekerjaan"]))->row();
			
			if ($pekerjaan->id_status == 26)
			{
				$user	= $this->auth->get_data_login();
				
				$data				= array(
					"id_pekerjaan"		=> $data["id_pekerjaan"],
					"id_status"			=> $pekerjaan->id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($data["id_pekerjaan"], $pekerjaan->id_status), $data);
				
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $data["id_pekerjaan"],
					"id_status"			=> ($pekerjaan->id_status + 1)
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
					
				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}
		
		if ($type == "upload_tterima_dokumen")
		{
			$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($data["id_pekerjaan"]))->row();
			
			if ($pekerjaan->id_status == 33)
			{
				$user	= $this->auth->get_data_login();
				
				$data				= array(
					"id_pekerjaan"		=> $data["id_pekerjaan"],
					"id_status"			=> $pekerjaan->id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($data["id_pekerjaan"], $pekerjaan->id_status), $data);
				
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $data["id_pekerjaan"],
					"id_status"			=> ($pekerjaan->id_status + 1)
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
				$this->save_report_akhir_pekerjaan($data["id_pekerjaan"]);
				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}
		
		
		echo json_encode(array(
			"result" => $result, 
			"message" => $message,
			"id_lokasi" => $id_lokasi
		));
	}
	
    private function get_tanggal_penilaian($id_pekerjaan) {
		$this->db->select('MIN(tanggal_mulai) AS tanggal_mulai')
				 ->from('mst_lokasi')
				 ->where('id_pekerjaan', $id_pekerjaan);
		$query = $this->db->get();
		if ( is_object($query) ) {
			$row = $query->row();
			if ( is_object($row) )
				return $row->tanggal_mulai;
		}
		return NULL;
	}
	private function save_report_akhir_pekerjaan($id_pekerjaan) {
		$this->db->select('A.*, D.pengguna_laporan, E.tujuan AS tujuan_penilaian', false)
				 ->from('mst_pekerjaan A')
				 ->join('mst_pengguna_laporan D', 'A.pengguna_laporan = D.id', 'left')
				 ->join('mst_tujuan E', 'A.maksud_tujuan = E.id_tujuan', 'left')
				 ->where('A.id', $id_pekerjaan);
		$query = $this->db->get();
		if ( is_object($query) ) {
			$row = $query->row();
			if ( is_object($row) ) {
				$data_pekerjaan = $row;
				$data_pemberi_tugas = (object)array(
					'nama' 					=> NULL,
					'alamat'				=> NULL,
					'provinsi'				=> NULL,
					'kota'					=> NULL,
					'kode_pos'				=> NULL,
					'npwp'					=> NULL,
					'go_publik'				=> NULL,
					'id_status_kepemilikan'	=> NULL,
					'kode_status_kepemilikan'	=> NULL,
					'status_kepemilikan'	=> NULL,
					'id_bidang_usaha'		=> NULL,
					'kode_bidang_usaha'		=> NULL,
					'bidang_usaha'			=> NULL,
				);
				$table_pemberi_tugas = NULL;
				if ( $data_pekerjaan->jenis_pemberi_tugas == 0 ) {
					$table_pemberi_tugas = 'mst_klien';
				} else if ( $data_pekerjaan->jenis_pemberi_tugas == 1 ) {
					$table_pemberi_tugas = 'mst_debitur';
				}

				if ( !empty($table_pemberi_tugas) && !empty($data_pekerjaan->pemberi_tugas)) {
					$this->db->select('A.nama,alamat, D.nama AS provinsi, E.nama AS kota,
									   kode_pos,npwp,go_publik,
									   A.id_status_kepemilikan,
									   B.kode AS kode_status_kepemilikan, status_kepemilikan,
									   A.id_bidang_usaha,
									   C.kode AS kode_bidang_usaha, bidang_usaha, A.bidang_usaha_lainnya')
							 ->from($table_pemberi_tugas. ' A')
							 ->join('mst_status_kepemilikan B', 'A.id_status_kepemilikan = B.id', 'left')
							 ->join('mst_bidang_usaha C', 'A.id_bidang_usaha = B.id', 'left')
							 ->join('mst_provinsi D', 'A.id_provinsi = D.id', 'left')
							 ->join('mst_kota E', 'A.id_kota = E.id', 'left')
							 ->where('A.id', $data_pekerjaan->pemberi_tugas);
					$query_pt = $this->db->get();
					if ( is_object($query_pt) ) {
						$row_pt = $query_pt->row();
						if ( is_object($row_pt) ) 
							$data_pemberi_tugas = $row_pt;
					}
				}
				//Bidang Usaha

				//Penandatangan laporan
				$penanda_tangan_laporan = NULL;
				$this->db->select('A.penanda_tangan, B.nama AS nama_penanda_tangan')
						 ->from('mst_dokumen_penawaran A')
						 ->join('mst_user B', 'A.penanda_tangan = B.id')
						 ->where('A.id_pekerjaan', $id_pekerjaan)
						 ->where('A.id_dokumen_master', 1);
				$query_ptl = $this->db->get();
				if ( is_object($query_ptl) ) {
					$row_ptl = $query_ptl->row();
					if ( is_object($row_ptl) ) {
						if ( !empty($row_ptl->penanda_tangan) )
							$penanda_tangan_laporan = $row_ptl->nama_penanda_tangan;
					}
				}
				$nomor_laporan = $this->global_model->generate_nomor_laporan();
				//Akhir penandatangan laporan

				//Imbalan Fee, LKK 2
				$imbalan_jasa_fee = NULL;
				$this->db->select('B.harga')
						 ->from('mst_lembar_kendali A')
						 ->join('txn_lembar_kendali_2 B', 'A.id = B.id_lembar_kendali')
						 ->where('A.id_pekerjaan', $id_pekerjaan)
						 ->where('A.step', 'LKK-2');
				$query_lkk2 = $this->db->get();
				if ( is_object($query_lkk2) ) {
					$row_lkk2 = $query_lkk2->row();
					if ( is_object($row_lkk2) ) 
						$imbalan_jasa_fee = $row_lkk2->harga;
				} 
				//Akhir Imbalan Fee, LKK 2

				//Pengguna Laporan
				$pengguna_laporan = $pengguna_laporan_lainnya = NULL;
				$list_pengguna_laporan = $this->global_model->get_list('mst_pengguna_laporan');
				$kode_pl_lainnya = 6;
				$arr_pl = array();
				foreach ($list_pengguna_laporan as $pl) {
					$arr_pl[$pl->id] = $pl->pengguna_laporan;
				}
				unset($list_pengguna_laporan);
				$kode_pengguna_laporan = array_search(strtolower($data_pekerjaan->pengguna_laporan), array_map('strtolower', $arr_pl));
				if ( empty($kode_pengguna_laporan) ) {
					$kode_pengguna_laporan = $kode_pl_lainnya;
					$pengguna_laporan = $arr_pl[$kode_pengguna_laporan];
					$pengguna_laporan_lainnya = $data_pekerjaan->pengguna_laporan_lainnya;
				} else if ( $kode_pengguna_laporan == $kode_pl_lainnya ) {
					$pengguna_laporan = $arr_pl[$kode_pengguna_laporan];
					$pengguna_laporan_lainnya = $data_pekerjaan->pengguna_laporan_lainnya;
				} else {
					$pengguna_laporan = $arr_pl[$kode_pengguna_laporan];
				}
				unset($arr_pl);
				//Akhir pengguna laporan
				$dt_insert_laporan = array(
					'id_pekerjaan' 			=> $id_pekerjaan,
					'nomor_laporan'			=> $nomor_laporan,
					'tanggal_laporan'		=> date('Y-m-d', strtotime($data_pekerjaan->updated)),
					'nama_pemberi_tugas'	=> $data_pemberi_tugas->nama,
					'alamat_pemberi_tugas'	=> $data_pemberi_tugas->alamat,
					'provinsi_pemberi_tugas'	=> $data_pemberi_tugas->provinsi,
					'kota_pemberi_tugas'	=> $data_pemberi_tugas->kota,
					'kodepos_pemberi_tugas'	=> $data_pemberi_tugas->kode_pos,
					'npwp_pemberi_tugas'	=> $data_pemberi_tugas->npwp,
					'go_publik'				=> ($data_pemberi_tugas->go_publik == 1 ? 'Ya' : (is_numeric($data_pemberi_tugas->go_publik) && $data_pemberi_tugas->go_publik == 0 ? 'Tidak' : NULL)),
					'status_kepemilikan'	=> empty($data_pemberi_tugas->status_kepemilikan) ? NULL : $data_pemberi_tugas->status_kepemilikan,
					'bidang_usaha'			=>empty($data_pemberi_tugas->bidang_usaha) ? NULL : $data_pemberi_tugas->bidang_usaha,
					'bidang_usaha_lainnya'	=> $data_pemberi_tugas->id_bidang_usaha == 17 ? $data_pemberi_tugas->bidang_usaha_lainnya : NULL,
					'tanggal_penilaian'		=> $this->get_tanggal_penilaian($id_pekerjaan),
					'pengguna_laporan'		=> $pengguna_laporan,
					'pengguna_laporan_lainnya' => $pengguna_laporan_lainnya,
					'tujuan_penilaian'		=> $data_pekerjaan->tujuan_penilaian,
					'pendekatan_penilaian'	=> NULL,
					'pendekatan_penilaian_lainnya'	=> NULL,
					'metode_penilaian'		=> NULL,
					'nilai_yang_dihasilkan'	=> NULL,
					'nilai_lainnya'			=> NULL,
					'kesimpulan'			=> NULL,
					'jenis_jasa'			=> NULL,
					'imbalan_jasa_fee'		=> $imbalan_jasa_fee, //Lembar kendali kerja 2
					'penanda_tangan_laporan_penilaian'	=> $penanda_tangan_laporan,
					'ditandatangani_oleh'	=> 'Kantor Pusat',
					'keterangan'			=> NULL,
				);
				$insert_hp = $this->db->insert('txn_history_pekerjaan', $dt_insert_laporan);
				$id_history_pekerjaan = NULL;
				if ($insert_hp)
					$id_history_pekerjaan = $this->db->insert_id();

				//Obyek
				if ( !empty($id_history_pekerjaan) ) {
					//GET PM
					$this->db->select('A.nama, B.nama AS group_name')
							 ->from('mst_user A')
							 ->join('mst_group B', 'A.id_group = B.id')
							 ->where('A.id_group', 6)
							 ->limit(1);
					$query_pm = $this->db->get();
					if ( is_object($query_pm) ) {
						$row_pm = $query_pm->row();
						if ( is_object($row_pm) ) {
							$dt_insert_pm = array(
								'nomor_laporan'	=> $nomor_laporan,
								'tenaga_kerja'	=> $row_pm->nama,
								'jabatan'		=> $row_pm->group_name
							);
							$this->global_model->insert_data('txn_tenagakerja', $dt_insert_pm);
						}
					}
					//Get Penilai
					$this->db->select('A.nama, B.nama AS group_name')
							 ->from('mst_user A')
							 ->join('mst_group B', 'A.id_group = B.id')
							 ->where('A.id', $data_pekerjaan->penilai)
							 ->limit(1);
					$query_pn = $this->db->get();
					if ( is_object($query_pn) ) {
						$row_pn = $query_pn->row();
						if ( is_object($row_pn) ) {
							$dt_insert_pn = array(
								'nomor_laporan'	=> $nomor_laporan,
								'tenaga_kerja'	=> $row_pn->nama,
								'jabatan'		=> $row_pn->group_name
							);
							$this->global_model->insert_data('txn_tenagakerja', $dt_insert_pn);
						}
					}

					$this->db->select('A.*, B.nama AS jenis_objek,
									   C.nama AS desa, D.nama AS kecamatan,
									   E.nama AS kota, F.nama AS provinsi')
							 ->from('mst_lokasi A')
							 ->join('mst_jenis_objek B', 'A.id_jenis_objek = B.id')
							 ->join('mst_desa C', 'A.id_desa = C.id', 'left')
							 ->join('mst_kecamatan D', 'A.id_kecamatan = D.id', 'left')
							 ->join('mst_kota E', 'A.id_kota = E.id', 'left')
							 ->join('mst_provinsi F', 'A.id_provinsi = F.id', 'left')
							 ->where('A.id_pekerjaan', $id_pekerjaan);
					$query_obyek = $this->db->get();
					if ( is_object($query_obyek) ) {
						$result_obyek = $query_obyek->result();
						foreach ($result_obyek as $obj) {
							//Get Surveyor
							$this->db->select('B.nama, C.nama AS group_name')
									 ->from('txn_tugas A')
									 ->join('mst_user B', 'A.id_user = B.id')
									 ->join('mst_group C', 'B.id_group = C.id')
									 ->where('A.id_lokasi', $obj->id);
							$query_sv = $this->db->get();
							if ( is_object($query_sv) ) {
								$row_sv = $query_sv->result();
								foreach ($row_sv as $sv) {
									$dt_insert_sv = array(
										'nomor_laporan'	=> $nomor_laporan,
										'tenaga_kerja'	=> $sv->nama,
										'jabatan'		=> $sv->group_name
									);
									$this->global_model->insert_data('txn_tenagakerja', $dt_insert_sv);
								}
							}
							$nilai_objek = get_nilai_pasar_objek($obj->id, $obj->id_jenis_objek);
							$alamat = $obj->alamat;
							$alamat .= empty($obj->gang) ? NULL : ' Gang '.$obj->gang;
							$alamat .= empty($obj->nomor) ? NULL : ' No. '.$obj->nomor;
							$alamat .= empty($obj->rt) ? NULL : ' RT '.$obj->rt;
							$alamat .= empty($obj->rw) ? NULL : ' RW '.$obj->rw;
							$alamat .= empty($obj->desa) ? NULL : ', '.$obj->desa;
							$alamat .= empty($obj->kecamatan) ? NULL : ', '.$obj->kecamatan;
							$dt_obyek = array(
								'nomor_laporan'	=> $nomor_laporan,
								'nama_obyek'	=> $obj->jenis_objek,
								'alamat'		=> $alamat,
								'provinsi'		=> $obj->provinsi,
								'kota'			=> $obj->kota,
								'jumlah_satuan'	=> $nilai_objek['jumlah_satuan'],
								'total_nilai'	=> $nilai_objek['nilai_pasar'],
								'klasifikasi_jenis_jasa_lainnya'	=> $obj->jenis_objek,
								'data_pembanding'	=> $nilai_objek['jumlah_data_banding']
							);
							$this->global_model->insert_data('txn_obyek', $dt_obyek);

							//Get Kertas Kerja
							$this->db->select('A.id_kertas_kerja')
									 ->from('txn_kertas_kerja A')
									 ->where('A.id_lokasi', $obj->id);
							$query_kj = $this->db->get();
							$id_kertas_kerja = NULL;
							if ( is_object($query_kj) ) {
								$row_kj = $query_kj->row();
								if ( is_object($row_kj) )
									$id_kertas_kerja = $row_kj->id_kertas_kerja;
							}
							//Pembanding
							if ( !empty($id_kertas_kerja) ) {
								$this->db->select('A.jenis_properti, A.luas_tanah, A.luas_bangunan,
												   A.alamat, A.harga_penawaran, YEAR(A.created) AS tahun,
												   sumber_data_nama')
									 	 ->from('txn_data_banding A')
									 	 ->where('A.id_kertas_kerja', $id_kertas_kerja)
									 	 ->where('jenis_pembanding > 0')
									 	 ->order_by('jenis_pembanding');
								$query_pb = $this->db->get();
								if ( is_object($query_pb) ) {
									$result_pb = $query_pb->result();
									foreach ($result_pb as $rpb) {
										$dt_insert_pb = array(
											'nomor_laporan'		=> $nomor_laporan,
											'nama_obyek'		=> $obj->jenis_objek,
											'jenis'				=> $rpb->jenis_properti,
											'luas_tanah'		=> !is_numeric($rpb->luas_tanah) ? NULL : $rpb->luas_tanah,
											'luas_bangunan'		=> !is_numeric($rpb->luas_bangunan) ? NULL : $rpb->luas_bangunan,
											'alamat'			=> $rpb->alamat,
											'harga'	=> !is_numeric($rpb->harga_penawaran) ? NULL : $rpb->harga_penawaran,
											'tahun_data' 	=> $rpb->tahun,
											'sumber_data'		=> $rpb->sumber_data_nama
										);
										$this->global_model->insert_data('txn_pembanding', $dt_insert_pb);
									}
								}
							}
						}
					}
				}
			}
		}
	}
	function do_update_config($type)
	{
		$result				= "success";
		$message			= "Data berhasil disimpan";
		
		if ($type == "umum")
		{
			
			$site_name 			= $_POST["site_name"];
			$company_name 		= $_POST["company_name"];
			$company_address 	= $_POST["company_address"];
			$company_phone 		= $_POST["company_phone"];
			$company_fax 		= $_POST["company_fax"];
			$email_kontak 		= $_POST["email_kontak"];
			
			
			$this->global_model->update("mst_config", 1, array("key"), array("site_name"), array("value" => $site_name));
			$this->global_model->update("mst_config", 1, array("key"), array("company_name"), array("value" => $company_name));
			$this->global_model->update("mst_config", 1, array("key"), array("company_address"), array("value" => $company_address));
			$this->global_model->update("mst_config", 1, array("key"), array("company_phone"), array("value" => $company_phone));
			$this->global_model->update("mst_config", 1, array("key"), array("company_fax"), array("value" => $company_fax));
			$this->global_model->update("mst_config", 1, array("key"), array("email_kontak"), array("value" => $email_kontak));
		}
		else if ($type == "mail")
		{
			$mail_host			= $_POST["mail_host"];
			$mail_smtp_auth 	= $_POST["mail_smtp_auth"];
			$mail_smtp_secure 	= $_POST["mail_smtp_secure"];
			$mail_port 			= $_POST["mail_port"];
			$mail_username 		= $_POST["mail_username"];
			$mail_password 		= $_POST["mail_password"];
			$mail_from_name 	= $_POST["mail_from_name"];
			$mail_email		 	= $_POST["mail_email"];
			
			$this->global_model->update("mst_config", 1, array("key"), array("mail_host"), array("value" => $mail_host));
			$this->global_model->update("mst_config", 1, array("key"), array("mail_smtp_auth"), array("value" => $mail_smtp_auth));
			$this->global_model->update("mst_config", 1, array("key"), array("mail_smtp_secure"), array("value" => $mail_smtp_secure));
			$this->global_model->update("mst_config", 1, array("key"), array("mail_port"), array("value" => $mail_port));
			$this->global_model->update("mst_config", 1, array("key"), array("mail_username"), array("value" => $mail_username));
			$this->global_model->update("mst_config", 1, array("key"), array("mail_password"), array("value" => $mail_password));
			$this->global_model->update("mst_config", 1, array("key"), array("mail_from_name"), array("value" => $mail_from_name));
			$this->global_model->update("mst_config", 1, array("key"), array("mail_email"), array("value" => $mail_email));
			
			
		}
		echo json_encode(array("result" => $result, "message" => $message));
	}
	
	function do_upload_data()
	{
		$this->load->helper('pic');
		$data = array();
		$newfilename = base_url()."asset/file/default.jpg";
		if(isset($_GET['files']))
		{	
			$error = false;
			$files = array();

			$uploaddir =  "asset/file/";
			
			
			foreach($_FILES as $file)
			{
				$temp = explode(".", $file["name"]);
				$newfilename = round(microtime(true))."-".(date("Ymd")) . '.' . end($temp);
				
				if(move_uploaded_file($file['tmp_name'], $uploaddir .$newfilename))
				{
					$files[] = $newfilename;
				}
				else
				{
				    $error = true;
				}
			}

			// compress_image($uploaddir .$newfilename, 20);
			resize_image($uploaddir .$newfilename);
			make_thumb($uploaddir .$newfilename);

			$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
		}
		else
		{
			$data = array('success' => 'Form was submitted', 'formData' => $_POST);
		}

		echo trim($newfilename);
	}
	
	function do_upload_multi()
	{
		$this->load->helper('pic');
		$data = array();
		$newfilename = base_url()."asset/file/default.jpg";
		if(isset($_GET['files']))
		{	
			$error = false;
			$files = array();

			$uploaddir =  "asset/file/";
			
			
			foreach($_FILES as $file)
			{
				$temp = explode(".", $file["name"]);
				$newfilename = round(microtime(true))."-".(date("Ymd")) . '.' . end($temp);
				// echo 1;
				if(move_uploaded_file($file['tmp_name'], $uploaddir .$newfilename))
				{
					$files[] = $newfilename;
				}
				else
				{
				    $error = true;
				}
			}

			resize_image($uploaddir .$newfilename);
			make_thumb($uploaddir .$newfilename);
			
			$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
		}
		else
		{
			$data = array('success' => 'Form was submitted', 'formData' => $_POST);
		}

		echo $newfilename;
	}
	
	function do_upload_multi_table()
	{
		$id_lokasi	= $_POST["id_lokasi"];
		$id_field	= 896;
		$jawab		= $_POST["multi_file"];
		$keterangan	= $_POST["multi_urut"]."##".$_POST["multi_keterangan"];
		
		$array_data	= array(
			"id_lokasi"		=> $id_lokasi,
			"id_field"		=> $id_field,
			"jawab"			=> $jawab,
			"keterangan"	=> $keterangan
		);
		
		$this->global_model->save("txn_lokasi_data", $array_data);
		
		$last_data	= $this->global_model->get_data("txn_lokasi_data", 4, array("id_lokasi", "id_field", "jawab", "keterangan"), array($id_lokasi, $id_field, $jawab, $keterangan))->row();
		
		$return	= "
			<div class='col-lg-6 list_multi_image list_".str_replace(".", "", $jawab)."'>
				<img src='".base_url('asset/file/'.$jawab)."' style='width: 100%' />
				<table  style='margin-bottom: 10px;'>
					<tr>
						<td>No. Urut</td>
						<td>:</td>
						<td>".$_POST["multi_urut"]."</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>:</td>
						<td>".$_POST["multi_keterangan"]."</td>
					</tr>
				</table>
				<button type='button' class='btn btn-warning btn-sm btn-delete-image-multi' data-file='".str_replace(".", "", $jawab)."' data-id='".base64_encode($last_data->id)."'>Delete</button>
			</div>
		";
		
		echo $return;
	}
	
	function get_data()
	{
		$type			= $_POST["type"];
		$page			= $_POST["page"];
		$filter_keyword	= trim($_POST["keyword"]);
		$filter_field	= trim($_POST["field"]);
		$perpage		= $_POST["perpage"];
		
		if ($type == "user")
		{
			$table_name		= "view_user";
			$primary_key	= "id";
			$field_list		= array("id","nama_group","nama","jabatan","email","alamat","telepon","created","updated");
			$field_view		= array("nama_group","nama","jabatan","email","alamat","telepon","created","updated");
		}
		else if ($type == "kjpp")
		{
			$table_name		= "mst_kjpp";
			$primary_key	= "kode_kjpp";
			$field_list		= array("kode_kjpp","nama_kjpp");
			$field_view		= array("kode_kjpp","nama_kjpp");
		}
		else if ($type == "klien")
		{
			$table_name		= "view_klien";
			$primary_key	= "id";
			$field_list		= array("id","nama","alamat","id_provinsi","provinsi","id_kota","kota","telepon","fax","email","website","npwp","nama_kontak","no_kontak","emailpribadi","id_debitur","debitur","catatan","created","updated");
			$field_view		= array("nama","alamat");
		}
		else if ($type == "debitur")
		{
			$table_name		= "mst_debitur";
			$primary_key	= "id";
			$field_list		= array("id","nama","keterangan","created","updated");
			$field_view		= array("nama","keterangan","created","updated");
		}
		else if ($type == "jenis_objek")
		{
			$table_name		= "mst_jenis_objek";
			$primary_key	= "id";
			$field_list		= array("id","nama","keterangan","created","updated");
			$field_view		= array("nama","keterangan","created","updated");
		}
		else if ($type == "transportasi")
		{
			$table_name		= "mst_transportasi_survey";
			$primary_key	= "id";
			$field_list		= array("id","nama","keterangan","created","updated");
			$field_view		= array("nama","keterangan","created","updated");
		}
		else if ($type == "kategori_berita")
		{
			$table_name		= "mst_kategori";
			$primary_key	= "id";
			$field_list		= array("id","nama","slug", "keterangan","created","updated");
			$field_view		= array("nama","slug","keterangan","created","updated");
		}
		else if ($type == "berita")
		{
			$table_name		= "view_berita";
			$primary_key	= "id";
			$field_list		= array("id","slug","judul","nama_kategori","status","created","updated");
			$field_view		= array("judul","nama_kategori","status","created","updated");
		}
		else if ($type == "slide")
		{
			$table_name		= "mst_slide";
			$primary_key	= "id";
			$field_list		= array("*");
			$field_view		= array("image","title","keterangan","order","created","updated");
		}
		else if ($type == "kontak")
		{
			$table_name		= "mst_kontak";
			$primary_key	= "id";
			$field_list		= array("*");
			$field_view		= array("nama","email","judul","pesan","created","updated");
		}
		else if ($type == "history")
		{
			$table_name		= "txn_history_pekerjaan";
			$primary_key	= "id";
			$field_list		= array("*");
			$field_view		= array("nomor_laporan","tanggal_laporan","nama_pemberi_tugas","alamat_pemberi_tugas","npwp_pemberi_tugas","go_publik","status_kepemilikan","bidang_usaha","tanggal_penilaian","tujuan_penilaian","pendekatan_penilaian","metode_penilaian","nilai_yang_dihasilkan");
		}
		else if ($type == "bidang_usaha")
		{
			$table_name		= "mst_bidang_usaha";
			$primary_key	= "id";
			$field_list		= array("*");
			$field_view		= array("kode","bidang_usaha");
		}
		else if ($type == "jenis_jasa")
		{
			$table_name		= "mst_jenis_jasa";
			$primary_key	= "id";
			$field_list		= array("*");
			$field_view		= array("kode","jenis_jasa");
		}
		else
		{
			$field_list	= array();
		}
		$column_order = 'created';
		if ( in_array($type, array('bidang_usaha', 'status_kepemilikan', 'jenis_jasa')) )
			$column_order = 'id';
		if (!empty($filter_keyword))
		{
			$list_field		= join(",", $field_list);
			$query_list		= "SELECT ".$list_field." FROM ".$table_name." WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' ORDER BY $column_order DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
			$query_count	= "SELECT * FROM ".$table_name." WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' ";
		}
		else
		{
			$list_field		= join(",", $field_list);
			$query_list		= "SELECT ".$list_field." FROM ".$table_name." ORDER BY $column_order DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
			$query_count	= "SELECT * FROM ".$table_name." ";
		}
		
		$list_data	= $this->global_model->get_by_query($query_list);
		$total_data	= $this->global_model->get_by_query($query_count)->num_rows();
		$data_table	= array();
		$i 			= ($perpage * ($page)) - ($perpage - 1);
		
		foreach ($list_data->result() as $item_data)
		{
			

			foreach ($field_view as $item_field_view)
			{
				if ($type == "berita" && $item_field_view == "judul"){
					$data_table[$i][$item_field_view]	= "<a href='".base_url("berita/view/".$item_data->slug)."' target='_blank'>".$item_data->$item_field_view."</a>";
				}
				if ($type == "slide" && $item_field_view == "image"){
					$data_table[$i][$item_field_view]	= "<a href='".base_url("asset/file/".$item_data->$item_field_view)."' target='_blank'><img src='".base_url("asset/file/".$item_data->$item_field_view)."' style='height: 50px; margin: 5px;'></a>";
				}elseif ($type == "history" && ($item_field_view == "tanggal_laporan" || $item_field_view == "tanggal_penilaian")){
					$data_table[$i][$item_field_view]	= format_tanggal($item_data->$item_field_view);
				}elseif ( $item_field_view == "created" || $item_field_view == "updated" ){
					$data_table[$i][$item_field_view]	= format_tanggal($item_data->$item_field_view);
				}else{
					$data_table[$i][$item_field_view]	= !empty($item_data->$item_field_view) ? $item_data->$item_field_view : "-";
				}
			}
			if ($type != "history"){	
				if ($type == "kontak")
				{
					$data_table[$i]["action"]	= "<i class='fa fa-trash btn-delete' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'></i>";
				}
				else
				{
					$data_table[$i]["action"]	= "<i class='fa fa-pencil-square-o btn-edit' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'></i><i class='fa fa-trash btn-delete' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'></i>";
				}
			}	
				if ($type == "history"){
					$data_table[$i][$item_field_view]	= '<input type="hidden" class="selectedrow" value="'.$item_data->$primary_key.'">';
				}
			$i++;
		}
		
		
		$return		= array(
			"data_table"	=> $data_table,
			"data_total"	=> $total_data,
			"data_paging"	=> $this->generate_paging(($page), ceil($total_data / $perpage))
		);
		echo json_encode($return);
	}
	
	function get_data_table()
	{
		$type			= $_POST["type"];
		
		if ($type == "lembar_kendali")
		{
			$table_name		= "view_lembar_kendali";
			$primary_key	= "id";
			$field_list		= array("id","step","jabatan","nama_user","id_status", "id_user","created","updated");
			$field_view		= array("step","jabatan","nama_user","created","updated");
			
			$id_pekerjaan	= base64_decode($_POST["id_pekerjaan"]);
		}
		else if ($type == "evaluasi")
		{
			$table_name		= "view_evaluasi";
			$primary_key	= "id";
			$field_list		= array("id","id_pekerjaan","id_status","tipe","id_user","nama_user","nama_group","created","updated");
			$field_view		= array("tipe","nama_group","nama_user");
			
			$id_pekerjaan	= base64_decode($_POST["id_pekerjaan"]);
		}
		else if ($type == "dokumen")
		{
			$table_name		= "view_dokumen";
			$primary_key	= "id";
			$field_list		= array("id","id_pekerjaan","tipe", "file", "keterangan","id_user","nama_user","nama_group","created","updated");
			$field_view		= array("tipe","file","keterangan","nama_group","nama_user");
			
			$id_pekerjaan	= base64_decode($_POST["id_pekerjaan"]);
		}
		else
		{
			$field_list	= array();
		}
		
		$list_field		= join(",", $field_list);
		
		if ($type == "lembar_kendali" || $type == "evaluasi")
		{
			$query_list		= "SELECT ".$list_field." FROM ".$table_name." WHERE id_pekerjaan = '".$id_pekerjaan."' ";
			$query_count	= "SELECT * FROM ".$table_name." WHERE id_pekerjaan = '".$id_pekerjaan."' ";
		}
		else
		{
			$query_list		= "SELECT ".$list_field." FROM ".$table_name." ";
			$query_count	= "SELECT * FROM ".$table_name." ";
		}
		
		$list_data	= $this->global_model->get_by_query($query_list);
		$total_data	= $this->global_model->get_by_query($query_count)->num_rows();
		$data_table	= array();
		$i 			= 1;
		
		foreach ($list_data->result() as $item_data)
		{
			foreach ($field_view as $item_field_view)
			{
				if ($type == "dokumen" && $item_field_view == "file")
				{
					$data_table[$i][$item_field_view]	= !empty($item_data->$item_field_view) ? "<a href='".base_url()."ajax/download/dokumen_penawaran/".base64_encode($item_data->id)."'>Download</a>" : "-";		
				}
				else if ($type == "lembar_kendali" && $item_field_view == "step")
				{
					$status	= $this->global_model->get_data("mst_status", 1, array("id"), array($item_data->id_status))->row();
					$data_table[$i][$item_field_view]	= $status->step;
				}
				else if ($type == "lembar_kendali" && ($item_field_view == "created" || $item_field_view == "updated"))
				{
					$data_table[$i][$item_field_view]	= !empty($item_data->$item_field_view) ? format_tanggal($item_data->$item_field_view) : "-";
				}
				else
				{
					$data_table[$i][$item_field_view]	= !empty($item_data->$item_field_view) ? $item_data->$item_field_view : "-";
				}
			}
			
			if ($type == "lembar_kendali")
			{
				$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
				$user		= $this->auth->get_data_login();
				
				if ($pekerjaan->id_status != 6 && $pekerjaan->hasil_status != "reject")
				{
					$data_table[$i]["action"]	= "<div class='text-center'><button class='btn btn-warning btn-edit-lembar-kendali ' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'><span class='glyphicon glyphicon-pencil' ></span>Edit</button>&nbsp;<button class='btn btn-danger btn-delete-lembar-kendali ' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'><span class='glyphicon glyphicon-remove' ></span>Delete</button></div>";
				}
			}
			else if ($type == "evaluasi")
			{
				$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
				$user		= $this->auth->get_data_login();
				
				$exam	= array(
					4 => array(4,5,6,7,8),
					9 => array(9,10,11),
					12 => array(12,13,14,15,16,17,18,19,20,21,22)
				);
				
				$exama	= $exam[$item_data->id_status];
				if (in_array($pekerjaan->id_status, $exama))
				{
					if ($user["id"] == $item_data->id_user)
					{
						$data_table[$i]["action"]	= "<div class='text-center'><i class='fa fa-pencil-square-o btn-edit-".$type." tambah_".$type."' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'></i><i class='fa fa-trash btn-delete-".$type." tambah_".$type."' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'></i></div>";
					}
				}
			}
			else if ($type == "dokumen")
			{
				$data_table[$i]["action"]	= "<div class='text-center'><i class='fa fa-pencil-square-o btn-edit-".$type." tambah_".$type."' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'></i><i class='fa fa-trash btn-delete-".$type." tambah_".$type."' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'></i></div>";
			}
			else
			{
				$data_table[$i]["action"]	= "<div class='text-center'><i class='fa fa-pencil-square-o btn-edit' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'></i><i class='fa fa-trash btn-delete' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'></i></div>";
			}
			
			$i++;
		}
		
		
		$return		= array(
			"data_table"	=> $data_table,
			"data_total"	=> $total_data
		);
		echo json_encode($return);
	}
	
	function get_data_table_custom()
	{
		$type			= $_POST["type"];
		
		if ($type == "dokumen")
		{
			$table_name		= "mst_dokumen_master";
			$primary_key	= "id";
			$id_pekerjaan	= base64_decode($_POST["id_pekerjaan"]);
			
			$query_list		= "SELECT * FROM mst_dokumen_master WHERE nama NOT IN('Draf Kontrak', 'TOR')";
			$query_count	= "SELECT COUNT(*) FROM mst_dokumen_master";
			
			$list_data	= $this->global_model->get_by_query($query_list);
			$total_data	= $this->global_model->get_by_query($query_count)->num_rows();
			
			$data_table	= array();
			$i 			= 1;
			
			foreach ($list_data->result() as $item_data)
			{
				$file		= "#";
				$keterangan	= "-";
				$nama_group	= "-";
				$nama_user	= "-";
				
				if ($item_data->id == 1)
				{
					$txn_dokumen	= $this->global_model->get_data("mst_dokumen_penawaran", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, $item_data->id));
					
					if ($txn_dokumen->num_rows() == 1)
					{
						$user		= $this->global_model->get_data("view_user", 1, array("id"), array($txn_dokumen->row()->id_user))->row();
						
						$file		= base_url()."printpdf/dokumen_penawaran/".base64_encode($id_pekerjaan);
						$keterangan	= "-";
						$nama_group	= $user->nama_group;
						$nama_user	= $user->nama;
					}
					else
					{
						$file		= "#";
						$keterangan	= "-";
						$nama_group	= "-";
						$nama_user	= "-";
					}
				}
				else if ($item_data->id == 2)
				{
					$txn_dokumen	= $this->global_model->get_data("mst_dokumen_penawaran", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, $item_data->id));
					
					if ($txn_dokumen->num_rows() == 1)
					{
						$user		= $this->global_model->get_data("view_user", 1, array("id"), array($txn_dokumen->row()->id_user))->row();
						
						$file		= "#";
						$keterangan	= "-";
						$nama_group	= $user->nama_group;
						$nama_user	= $user->nama;
					}
					else
					{
						$file		= "#";
						$keterangan	= "-";
						$nama_group	= "-";
						$nama_user	= "-";
					}
				}
				else if ($item_data->id == 3)
				{
					$txn_dokumen	= $this->global_model->get_data("mst_dokumen_penawaran", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, $item_data->id));
					
					if ($txn_dokumen->num_rows() == 1)
					{
						$user		= $this->global_model->get_data("view_user", 1, array("id"), array($txn_dokumen->row()->id_user))->row();
						
						$file		= "#";
						$keterangan	= "-";
						$nama_group	= $user->nama_group;
						$nama_user	= $user->nama;
					}
					else
					{
						$file		= "-";
						$keterangan	= "-";
						$nama_group	= "-";
						$nama_user	= "-";
					}
				}
				else if ($item_data->id == 7)
				{
					$txn_dokumen	= $this->global_model->get_data("mst_dokumen_kwitansi", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, $item_data->id));
					
					if ($txn_dokumen->num_rows() == 1)
					{
						$user		= $this->global_model->get_data("view_user", 1, array("id"), array($txn_dokumen->row()->id_user))->row();
						
						$file		= base_url()."printpdf/kwitansi/".base64_encode($id_pekerjaan);
						$keterangan	= "-";
						$nama_group	= $user->nama_group;
						$nama_user	= $user->nama;
					}
				}
				else if ($item_data->id == 4)
				{
					$txn_dokumen	= $this->global_model->get_data("mst_dokumen_gabung", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, $item_data->id));
					
					if ($txn_dokumen->num_rows() == 1)
					{
						$user		= $this->global_model->get_data("view_user", 1, array("id"), array($txn_dokumen->row()->id_user))->row();
						
						$file		= base_url()."asset/file/".$txn_dokumen->row()->file;
						$keterangan	= "-";
						$nama_group	= $user->nama_group;
						$nama_user	= $user->nama;
					}
				}
				else if ($item_data->id == 5 || $item_data->id == 6 || $item_data->id == 7 || $item_data->id == 8)
				{
					$txn_dokumen	= $this->global_model->get_data("mst_dokumen_gabung", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, $item_data->id));
					
					if ($txn_dokumen->num_rows() == 1)
					{
						$user		= $this->global_model->get_data("view_user", 1, array("id"), array($txn_dokumen->row()->id_user))->row();
						
						$file		= base_url()."asset/file/".$txn_dokumen->row()->file;
						$keterangan	= "-";
						$nama_group	= $user->nama_group;
						$nama_user	= $user->nama;
					}
				}

				//if invoice
				if ($item_data->id == 4){
					$invs = $this->global_model->get_list( 'mst_dokumen_gabung', 'id_dokumen_master=4 AND id_pekerjaan='.$id_pekerjaan, 'termin' );
					$j = 1;
					foreach ($invs as $inv) {
						$file = !$inv->file ? "#" : base_url()."asset/file/".$inv->file;
						$id_dokumen_gabung = $inv->id;
						$data_table[$i]["dokumen"]		= $item_data->nama." - ".$j;
						//$data_table[$i]["file"]			= "<div class='text-center'>".$file."</div>";
						$data_table[$i]["keterangan"]	= $keterangan;
						$data_table[$i]["nama_group"]	= "<div class='text-center'>".$nama_group."</div>";
						$data_table[$i]["nama_user"]	= $nama_user;
						//$data_table[$i]["action"]		= "<div class='text-center'><i class='fa fa-pencil-square-o btn-edit-dokumen ' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'></i><i class='fa fa-trash btn-delete-dokumen ' data='".base_url($item_data->$primary_key)."' aria-hidden='true'></i></div>";
						$data_table[$i]["action"]	= "<div class='text-center' data-id_dokumen_gabung=\"".base64_encode($id_dokumen_gabung)."\">";
						if ($file !='#'){
							$data_table[$i]["action"]	.="<a target='_blank' href='". $file ."' class='btn btn-success btn-download'><span class='glyphicon glyphicon-download' ></span>Download</a>&nbsp;<a target='_blank' href='". $file ."' class='btn btn-primary'><span class='glyphicon glyphicon-search' ></span>View</a>";
						}else {
							$data_table[$i]["action"]	.="<a href='". $file ."' class='btn btn-success disabled'><span class='glyphicon glyphicon-download' ></span>Download</a>&nbsp;<a href='". $file ."' class='btn btn-primary disabled'><span class='glyphicon glyphicon-search' ></span>View</a>";
						}
						$data_table[$i]["action"]	.="&nbsp;<button class='btn btn-warning btn-edit-dokumen' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'><span class='glyphicon glyphicon-pencil' ></span>Edit</button>&nbsp;<button class='btn btn-danger btn-edit-dokumen' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'><span class='glyphicon glyphicon-remove' ></span>Delete</button>";
						$data_table[$i]["action"]	.= "</div>";
						$j++;
						$i++;
					}
				}else{
					$data_table[$i]["dokumen"]		= $item_data->nama;
					//$data_table[$i]["file"]			= "<div class='text-center'>".$file."</div>";
					$data_table[$i]["keterangan"]	= $keterangan;
					$data_table[$i]["nama_group"]	= "<div class='text-center'>".$nama_group."</div>";
					$data_table[$i]["nama_user"]	= $nama_user;
					//$data_table[$i]["action"]		= "<div class='text-center'><i class='fa fa-pencil-square-o btn-edit-dokumen ' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'></i><i class='fa fa-trash btn-delete-dokumen ' data='".base_url($item_data->$primary_key)."' aria-hidden='true'></i></div>";
					$data_table[$i]["action"]	= "<div class='text-center'>";
					if ($file !='#'){
						$data_table[$i]["action"]	.="<a target='_blank' href='". $file ."' class='btn btn-success btn-download'><span class='glyphicon glyphicon-download' ></span>Download</a>&nbsp;<a target='_blank' href='". $file ."' class='btn btn-primary'><span class='glyphicon glyphicon-search' ></span>View</a>";
					}else {
						$data_table[$i]["action"]	.="<a href='". $file ."' class='btn btn-success disabled'><span class='glyphicon glyphicon-download' ></span>Download</a>&nbsp;<a href='". $file ."' class='btn btn-primary disabled'><span class='glyphicon glyphicon-search' ></span>View</a>";
					}
					$data_table[$i]["action"]	.="&nbsp;<button class='btn btn-warning btn-edit-dokumen' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'><span class='glyphicon glyphicon-pencil' ></span>Edit</button>&nbsp;<button class='btn btn-danger btn-edit-dokumen' data='".base64_encode($item_data->$primary_key)."' aria-hidden='true'><span class='glyphicon glyphicon-remove' ></span>Delete</button>";
					$data_table[$i]["action"]	.= "</div>";
					$i++;
				}
				
			}
		}
		
		$return		= array(
			"data_table"	=> $data_table,
			"data_total"	=> $total_data
		);
		echo json_encode($return);
	}
	
	function generate_paging($page, $tpages)
	{
		$adjacents = 2;
		$prevlabel = "&lsaquo; Prev";
		$nextlabel = "Next &rsaquo;";
		$out       = "";
		
		$out	= "<ul class='pagination'>";
		
		// previous
		if($page == 1)
		{
			$out .= "<li class='disabled'><a href='#' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-left'></i></span></a></li>";
		}
		elseif($page == 2)
		{
			$out .= "<li><a href='#'  class='btn-paging' data='".($page-1)."' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-left'></i></span></a></li>";
		}
		else
		{
			$out .= "<li><a href='#'  class='btn-paging' data='1' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-left'></i><i class='fa fa-angle-left'></i></span></a></li><li><a href='#'  class='btn-paging' data='".($page-1)."' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-left'></i></span></a></li>";
		}
		$pmin = ($page > $adjacents)?($page - $adjacents):1;
		$pmax = ($page < ($tpages - $adjacents))?($page + $adjacents):$tpages;
		for($i = $pmin; $i <= $pmax; $i++)
		{
			if($i == $page)
			{
				$out .= "<li class='active disabled'><a href='#' data='".$i."'>".$i."</a></li>";
			}
			elseif($i == 1)
			{
				$out .= "<li><a href='#' class='btn-paging' data='".$i."'>".$i."</a></li>";
			}
			else
			{
				$out .= "<li><a href='#' class='btn-paging' data='".$i."'>".$i. "</a></li>";
			}
		}
		
		if($page < $tpages)
		{
			$out .= "<li><a href='#'  class='btn-paging' data='".($page+1)."' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-right'></i></span></a></li><li><a href='#'  class='btn-paging' data='".($tpages)."' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-right'></i><i class='fa fa-angle-right'></i></span></a></li>";
		}
		else
		{
			$out .= "<li class='disabled'><a href='#' aria-label='Next'><span aria-hidden='true'><i class='fa fa-angle-right'></i></span></a></li>";
		}
		$out .= "</ul>";
		return $out;
	}

	function delete_data($type)
	{
		$id			= base64_decode($_POST["id"]);
		$result		= "error";
		$message	= "";
		
		if ($type == "klien"){
			$table_name		= "mst_klien";
			$primary_key	= "id";
		}else if ($type == "user"){
			$table_name		= "mst_user";
			$primary_key	= "id";
		}else if ($type == "kjpp"){
			$table_name		= "mst_kjpp";
			$primary_key	= "kode_kjpp";

			$data_kjpp = $this->global_model->get_by_id($table_name, $primary_key, $id);
			if ( $data_kjpp ) {
				$file = $data_kjpp->logo_kjpp;
				if ( !empty($file) ) {
					$filepath = './asset/images/logo_kjpp/'.$file;
					if ( file_exists($filepath) )
						unlink($filepath);
				}
			}
		}else if ($type == "jenis_objek"){
			$table_name		= "mst_jenis_objek";
			$primary_key	= "id";
		}else if ($type == "debitur"){
			$table_name		= "mst_debitur";
			$primary_key	= "id";
		}else if ($type == "transportasi"){
			$table_name		= "mst_transportasi_survey";
			$primary_key	= "id";
		}else if ($type == "lokasi"){
			$table_name		= "mst_lokasi";
			$primary_key	= "id";
		}else if ($type == "lembar_kendali"){
			$table_name		= "mst_lembar_kendali";
			$primary_key	= "id";
		}else if ($type == "petugas"){
			$table_name		= "txn_tugas";
			$primary_key	= "id";
		}else if ($type == "multi_image"){
			$table_name		= "txn_lokasi_data";
			$primary_key	= "id";
		}else if ($type == "kategori_berita"){
			$table_name		= "mst_kategori";
			$primary_key	= "id";
		}else if ($type == "berita"){
			$table_name		= "mst_berita";
			$primary_key	= "id";
		}else if ($type == "slide"){
			$table_name		= "mst_slide";
			$primary_key	= "id";
		}else if ($type == "kontak"){
			$table_name		= "mst_kontak";
			$primary_key	= "id";
		}else if ($type == "bidang_usaha"){
			$table_name		= "mst_bidang_usaha";
			$primary_key	= "id";
		}else if ($type == "status_kepemilikan"){
			$table_name		= "mst_status_kepemilikan";
			$primary_key	= "id";
		}
		
		$action	= $this->global_model->delete($table_name, 1, array($primary_key), array($id));
		
		if ($action){
			$result		= "success";
			$message	= "Data berhasil dihapus";
		}else{
			$message	= "Data gagal dihapus";
		}
		
		echo json_encode(array("result" => $result, "message" => $message));
	}
	
	function get_location()
	{
		$type			= $_POST["type"];
		$id_parent		= $_POST["id_parent"];
		$return			= array();
		
		if ($type == "kota"){
			$table_name	= "mst_kota";
			$field_key	= "id_provinsi";
		}else if ($type == "kecamatan"){
			$table_name	= "mst_kecamatan";
			$field_key	= "id_kota";
		}else if ($type == "desa"){
			$table_name	= "mst_desa";
			$field_key	= "id_kecamatan";
		}
		
		$list_location		= $this->global_model->get_data($table_name, 1, array($field_key), array($id_parent), "nama");
		
		foreach ($list_location->result() as $item_location)
		{
			array_push($return, array("id" => $item_location->id, "nama" => $item_location->nama));
		}
		
		echo json_encode($return);
	}
	function get_kode_pos()
	{
		$id			= $_POST["id"];
		$return			= "";
		
		
		$list_location = $this->global_model->get_data("mst_desa", 1, array("id"), array($id));
		foreach ($list_location->result() as $item_location)
		{
			$return = $item_location->kode_pos;
		}
		
		echo json_encode(array("kode_pos"=>$return));
		
	}


	function download($type = "" , $id_pekerjaan = "")
	{
		if ($type == "dokumen_penawaran")
		{
			$id_pekerjaan	= base64_decode($id_pekerjaan);
			$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$user			= $this->auth->get_data_login();
			$client			= $this->global_model->get_data("view_klien", 1, array("id"), array($pekerjaan->id_klien))->row();
			$lokasi			= $this->global_model->get_data("view_lokasi", 1, array("id_pekerjaan"), array($id_pekerjaan));
			
			if ($pekerjaan->id_status == 9)
			{
				$id_status		= 9;
			
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status));
			
				$data				= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status), $data);
				}
				
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status + 1,
					"id_user"			=> $user["id"]
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
			}

			$dokument		= $this->global_model->get_data("mst_dokumen_penawaran", 1, array("id_dokumen_master", "id_pekerjaan"), array(1, $id_pekerjaan))->row();
			$dokumen_master	= $this->global_model->get_data("mst_dokumen_master", 1, array("id"), array(1))->row();
			
			/*redirect(base_url()."asset/template/".$dokumen_master->template);*/
			
			
			
			
			/*$document = $PHPWord->loadTemplate('Template.docx');*/
			
			
			
			$dokumen_penawaran	= $this->global_model->get_data("mst_dokumen_penawaran", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, 1))->row();
			
			$alamat	= $client->alamat;
			$kota	= $client->kota.", ".$client->provinsi;
			$text_lokasi	= "";
			
			$PHPWord = new PHPWord();
			$section = $PHPWord->createSection(
				array(
			        'space'      	=> array('line' => 1000),
			        'spaceAfter'	=> 0,
			        'spaceBefore'   => 0,
		        )
			);
			
			$PHPWord->addParagraphStyle(
				'pStyle',
		    	array(
			        'space'      	=> array('line' => 1000),
			        'spaceAfter'	=> 0,
			        'spaceBefore'   => 0,
		        )
		    );
			
			/*$PHPWord->addParagraphStyle('pStyle', array('space' => array('line' => 1000), 'spaceAfter'=>0 ,'spaceBefore'=>0));*/
			$PHPWord->addFontStyle('BoldText', array('bold'=>true));
			$PHPWord->addFontStyle('ColoredText', array('color'=>'FF8080'));
			$PHPWord->addLinkStyle('NLink', array('color'=>'0000FF', 'underline'=>PHPWord_Style_Font::UNDERLINE_SINGLE));
			
			
			$textrun = $section->createTextRun('pStyle');
			
			$section->addText($dokumen_penawaran->no_penawaran);
			$section->addTextBreak(0);
			$section->addText($dokumen_penawaran->kota.", ".date("d F Y", strtotime($dokumen_penawaran->tanggal)));
			
			$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
			$objWriter->save('asset/template/result_dokumen_penawaran.docx');
			
			$data = file_get_contents("asset/template/result_dokumen_penawaran.docx"); // Read the file's contents
			//unlink("asset/attachment/hasil.docx"); 
			$name = 'Dokumen Penawaran.docx';

			force_download($name, $data);
			
			/*$PHPWord = new PHPWord();
			$document	= $PHPWord->loadTemplate("asset/template/template_dokumen_penawaran.docx");*/
			
			/*$document->setValue('Value1', $dokumen_penawaran->no_penawaran);
			$document->setValue('Value2', $dokumen_penawaran->kota);
			$document->setValue('Value3', date("d F Y", strtotime($dokumen_penawaran->tanggal)));
			$document->setValue('Value4', strtoupper($pekerjaan->nama_klien));
			$document->setValue('Value5', $alamat);
			$document->setValue('Value6', $kota);
			$document->setValue('Value7', $dokumen_penawaran->up);
			$document->setValue('Value8', $client->debitur);
			$document->setValue('Value9', $dokumen_penawaran->domisili);
			$document->setValue('Value10', $dokumen_penawaran->kontak);
			$document->setValue('Value11', $dokumen_penawaran->komunikasi_via);
			$document->setValue('Value12', date("d F Y", strtotime($dokumen_penawaran->tanggal_komunikasi)));
			$document->setValue('Value13', strtoupper($pekerjaan->nama_klien));
			$document->setValue('Value14', strtoupper($pekerjaan->nama_klien));
			$document->setValue('Value15', $client->kota);
			$document->setValue('Value16', $dokumen_penawaran->tujuan_penilaian);*/
			
			
			
			
			/*$document->setValue('Value17', $text_lokasi);
						
			$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
			$objWriter->save('ListItem.docx');
			$document->save("asset/template/result_dokumen_penawaran.docx");*/
			
			
		
			$data = file_get_contents("asset/template/result_dokumen_penawaran.docx"); // Read the file's contents
			//unlink("asset/attachment/hasil.docx"); 
			$name = 'Dokumen Penawaran.docx';

			force_download($name, $data);
		}
		else if ($type == "surat_tugas")
		{
			$id_pekerjaan	= base64_decode($id_pekerjaan);
			$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$user			= $this->auth->get_data_login();
			
			if ($pekerjaan->id_status == 16)
			{
				$id_status		= 16;
			
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status));
			
				$data				= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status), $data);
				}
				
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> ($id_status + 1),
					"id_user"			=> $user["id"]
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
			}
			
			redirect(base_url()."asset/template/SURAT TUGAS.doc");
		}
		else if ($type == "form_pengiriman_dokumen")
		{
			$id_pekerjaan	= base64_decode($id_pekerjaan);
			$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$user			= $this->auth->get_data_login();
			
			if ($pekerjaan->id_status == 32)
			{
				$id_status		= 32;
			
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status));
			
				$data				= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status), $data);
				}
				
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> ($id_status + 1),
					"id_user"			=> $user["id"]
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
			}
			
			redirect(base_url()."asset/template/Form Pengiriman Dokumen.doc");
		}
		else if ($type == "bukti_pengiriman_dokumen")
		{
			$id_pekerjaan	= base64_decode($id_pekerjaan);
			$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$user			= $this->auth->get_data_login();
			
			if ($pekerjaan->id_status == 33)
			{
				$id_status		= 33;
			
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status));
			
				$data				= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status), $data);
				}
				
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> ($id_status + 1),
					"id_user"			=> $user["id"]
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
			}
			
			//redirect(base_url()."asset/template/Bukti Pengiriman Dokumen.doc");
		}
	}
	
	function download_dokumen($type, $id)
	{
		$id		= base64_decode($id);
		
		if ($type == "dokumen_penawaran")
		{
			$id_pekerjaan 		= $id;
			$pekerjaan			= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$dokumen_penawaran	= $this->global_model->get_data("mst_dokumen_penawaran", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, 1))->row();
			$lokasi				= $this->global_model->get_data("view_lokasi", 1, array("id_pekerjaan"), array($id_pekerjaan))->result();
			$klien				= $this->global_model->get_data("view_klien", 1, array("id"), array($pekerjaan->id_klien))->row();
			$debitur			= $this->global_model->get_data("mst_debitur", 1, array("id"), array($klien->id_debitur))->row();
			$pekerjaan_status	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, 5))->row();
			
			$lembar_kendali		= $this->global_model->get_data("mst_lembar_kendali", 2, array("id_pekerjaan", "step"), array($id_pekerjaan, "LKK-2"))->row();
			$lembar_kendali		= $this->global_model->get_data("txn_lembar_kendali_2", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();
			
			/*echo "<pre>";
			print_r($lembar_kendali);
			echo "</pre>";*/
			
			$user_approve		= $this->global_model->get_data("mst_user", 1, array("id"), array($pekerjaan_status->id_user))->row();
			
			
			$data_lokasi		= array();
			foreach ($lokasi as $item_lokasi)
			{
				array_push($data_lokasi, $item_lokasi);
				/*$data_lokasi		= $this->global_model->get_data("txn_lokasi_data", 1, array("id_lokasi"), array($item_lokasi->id))->result();*/
			}
			
			
			
			
			$data["pekerjaan"]			= $pekerjaan;
			$data["dokumen_penawaran"]	= $dokumen_penawaran;
			$data["klien"]				= $klien;
			$data["debitur"]			= $debitur;
			$data["data_lokasi"]		= $data_lokasi;
			$data["user_approve"]		= $user_approve;
			$data["lembar_kendali"]		= $lembar_kendali;
			
			$this->load->view("pekerjaan/dokumen_penawaran", $data);
		}
	}
	
	function download1($type = "" , $id_pekerjaan = "")
	{
		if ($type == "dokumen_penawaran")
		{
			$id_pekerjaan	= base64_decode($id_pekerjaan);
			$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$user			= $this->auth->get_data_login();
			$client			= $this->global_model->get_data("view_klien", 1, array("id"), array($pekerjaan->id_klien))->row();
			$lokasi			= $this->global_model->get_data("view_lokasi", 1, array("id_pekerjaan"), array($id_pekerjaan));
			
			if ($pekerjaan->id_status == 9)
			{
				$id_status		= 9;
			
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status));
			
				$data				= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status), $data);
				}
				
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status + 1,
					"id_user"			=> $user["id"]
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
			}

			$dokument		= $this->global_model->get_data("mst_dokumen_penawaran", 1, array("id_dokumen_master", "id_pekerjaan"), array(1, $id_pekerjaan))->row();
			$dokumen_master	= $this->global_model->get_data("mst_dokumen_master", 1, array("id"), array(1))->row();
			
			/*redirect(base_url()."asset/template/".$dokumen_master->template);*/
			
			
			
			
			/*$document = $PHPWord->loadTemplate('Template.docx');*/
			
			$PHPWord = new PHPWord();
			$document	= $PHPWord->loadTemplate("asset/template/template_dokumen_penawaran.docx");
			
			$dokumen_penawaran	= $this->global_model->get_data("mst_dokumen_penawaran", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, 1))->row();
			
			$alamat	= $client->alamat;
			$kota	= $client->kota.", ".$client->provinsi;
			
			$document->setValue('Value1', $dokumen_penawaran->no_penawaran);
			$document->setValue('Value2', $dokumen_penawaran->kota);
			$document->setValue('Value3', date("d F Y", strtotime($dokumen_penawaran->tanggal)));
			$document->setValue('Value4', strtoupper($pekerjaan->nama_klien));
			$document->setValue('Value5', $alamat);
			$document->setValue('Value6', $kota);
			$document->setValue('Value7', $dokumen_penawaran->up);
			$document->setValue('Value8', $client->debitur);
			$document->setValue('Value9', $dokumen_penawaran->domisili);
			$document->setValue('Value10', $dokumen_penawaran->kontak);
			$document->setValue('Value11', $dokumen_penawaran->komunikasi_via);
			$document->setValue('Value12', date("d F Y", strtotime($dokumen_penawaran->tanggal_komunikasi)));
			$document->setValue('Value13', strtoupper($pekerjaan->nama_klien));
			$document->setValue('Value14', strtoupper($pekerjaan->nama_klien));
			$document->setValue('Value15', $client->kota);
			$document->setValue('Value16', $dokumen_penawaran->tujuan_penilaian);
			
			$text_lokasi	= "asd \n\n 
			
			 asdasd";
			
			
			$document->setValue('Value17', $text_lokasi);
						

			$document->save("asset/template/result_dokumen_penawaran.docx");
			
			
		
			$data = file_get_contents("asset/template/result_dokumen_penawaran.docx"); // Read the file's contents
			//unlink("asset/attachment/hasil.docx"); 
			$name = 'Dokumen Penawaran.docx';

			force_download($name, $data);
		}
		else if ($type == "surat_tugas")
		{
			$id_pekerjaan	= base64_decode($id_pekerjaan);
			$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$user			= $this->auth->get_data_login();
			
			if ($pekerjaan->id_status == 16)
			{
				$id_status		= 16;
			
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status));
			
				$data				= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status), $data);
				}
				
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> ($id_status + 1),
					"id_user"			=> $user["id"]
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
			}
			
			redirect(base_url()."asset/template/SURAT TUGAS.doc");
		}
		else if ($type == "form_pengiriman_dokumen")
		{
			$id_pekerjaan	= base64_decode($id_pekerjaan);
			$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$user			= $this->auth->get_data_login();
			
			if ($pekerjaan->id_status == 32)
			{
				$id_status		= 32;
			
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status));
			
				$data				= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status), $data);
				}
				
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> ($id_status + 1),
					"id_user"			=> $user["id"]
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
			}
			
			redirect(base_url()."asset/template/Form Pengiriman Dokumen.doc");
		}
		else if ($type == "bukti_pengiriman_dokumen")
		{
			$id_pekerjaan	= base64_decode($id_pekerjaan);
			$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$user			= $this->auth->get_data_login();
			
			if ($pekerjaan->id_status == 33)
			{
				$id_status		= 33;
			
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status));
			
				$data				= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status), $data);
				}
			}
			
			redirect(base_url()."asset/template/Bukti Pengiriman Dokumen.doc");
		}
	}

	function do_update_data_tmp()
	{
		$type			= $_POST["type"];
		$id_pekerjaan	= base64_decode($_POST["id_pekerjaan"]);
		$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		
		$id_status		= $pekerjaan->id_status;
		
		$result			= "error";
		$message		= "";
		
		if ($type == "kertas_kerja")
		{
		    $id_kertas_kerja = $this->input->get('id_kertas_kerja');
			if ($id_status == 17)
			{
			 //    if ( !empty($id_kertas_kerja) ) {
				// 	//Get Data Banding 0 / OByek
				// 	$data_banding = false;
				// 	$this->db->select('A.nilai_pasar_tanah, A.brb_bangunan, C.id_jenis_objek')
				// 			 ->from('txn_data_banding A')
				// 			 ->join('txn_kertas_kerja B', 'A.id_kertas_kerja = B.id_kertas_kerja')
				// 			 // ->join('mst_lokasi C', 'B.id_lokasi = C.id_lokasi')
				// 			 ->join('mst_lokasi C', 'B.id_lokasi = C.id')
				// 			 ->where('A.id_kertas_kerja', $id_kertas_kerja)
				// 			 ->where('A.jenis_pembanding', 0);
				// 	$query_banding = $this->db->get();
				// 	if ( is_object($query_banding) ) {
				// 		$row_banding = $query_banding->row();
				// 		if ( is_object($row_banding) ) $data_banding = $row_banding;
				// 	}
				// 	//Save Nilai Pasar, Likuidasi, dan Luas Tanah

				// 	if ( in_array($data_banding->id_jenis_objek, array(1,2)) ) {
				// 		//Get Tanah
				// 		$data_tanah = false;
				// 		$this->db->select('id_tanah, luas_tanah_pada_sertifikat, disc')
				// 				 ->from('txn_tanah')
				// 				 ->where('id_kertas_kerja', $id_kertas_kerja);
				// 		$query_tanah = $this->db->get();
				// 		if ( is_object($query_tanah) ) {
				// 			$row_tanah = $query_tanah->row();
				// 			if ( is_object($row_tanah) )
				// 				$data_tanah = $row_tanah;
				// 		}
				// 		if ( $data_tanah && $data_banding ) {
				// 			$id_tanah = $data_tanah->id_tanah;
				// 			$disc = $data_tanah->disc;
				// 			$disc = empty($disc) || !is_numeric($disc) ? 0 : $disc;
				// 			$nilai_pasar_tanah = $data_banding->nilai_pasar_tanah;
				// 			$nilai_pasar_tanah = preg_replace('/[^0-9]/','',$nilai_pasar_tanah);
				// 			$nilai_pasar_tanah = empty($nilai_pasar_tanah) || !is_numeric($nilai_pasar_tanah) ? 0 : $nilai_pasar_tanah;
				// 			$this->db->select('bobot, luas_tanah')
				// 					 ->from('r_data_legalitas')
				// 					 ->where('id_tanah', $id_tanah);
				// 			$query_legalitas = $this->db->get();
				// 			if ( is_object($query_legalitas) ) {
				// 				$result_legalitas = $query_legalitas->result();
				// 				$total_indikasi_nilai_tanah = $total_nilai_tanah = $total_luas = 0;
				// 				foreach ($result_legalitas as $legal) {
				// 					$legal->bobot = preg_replace('/[^0-9]/','',$legal->bobot);
				// 					$legal->luas_tanah = preg_replace('/[^0-9]/','',$legal->luas_tanah);
				// 					$bobot = empty($legal->bobot) || !is_numeric($legal->bobot) ? 0 : $legal->bobot;
				// 					$luas_tanah = empty($legal->luas_tanah) || !is_numeric($legal->luas_tanah) ? 0 : $legal->luas_tanah;
				// 					$indikasi_nilai_tanah = ($bobot/100)*$nilai_pasar_tanah;
				// 					$nilai_tanah = $luas_tanah*$indikasi_nilai_tanah;
				// 					$total_indikasi_nilai_tanah = $total_indikasi_nilai_tanah+$indikasi_nilai_tanah;
				// 					$total_nilai_tanah = $total_nilai_tanah+$nilai_tanah;
				// 					$total_luas = $luas_tanah+$total_luas;
				// 				}
				// 				$total_indikasi_nilai_tanah = $total_nilai_tanah/$total_luas;
				// 				$pembulatan = round($total_indikasi_nilai_tanah, -4);
				// 				$result_nilai_pasar_tanah = $pembulatan*$data_tanah->luas_tanah_pada_sertifikat;
				// 				$nilai_likuidasi_tanah = $nilai_pasar*(1-(($disc > 0 ? $disc/100 : 0)));
				// 				$dt_update_tanah = array(
				// 					'nilai_pasar' 	=> $result_nilai_pasar_tanah,
				// 					'nilai_likuidasi' => $nilai_likuidasi_tanah,
				// 					'luas' 			=> $data_tanah->luas_tanah_pada_sertifikat
				// 				);
				// 				$this->db->where('id_tanah', $data_tanah->id_tanah);
				// 				$this->db->update('txn_tanah', $dt_update_tanah);
				// 			}
				// 		}
				// 		//Akhir Tanah
				// 	}
				// 	//Get Bangunan
				// 	if ( in_array($data_banding->id_jenis_objek, array(2)) ) {
				// 		$brb_bangunan = $data_banding->brb_bangunan;
				// 		$ppn = $brb_bangunan > 0 ? (10/100)*$brb_bangunan : 0;
				// 		$total_brb_bangunan = $brb_bangunan+$ppn;
				// 		$total_brb_bangunan = round($total_brb_bangunan,-4);
				// 		$this->db->select('id_bangunan, luas, kondisi_terlihat, keusangan_fungsional,
				// 						   keusangan_ekonomis, umur_ekonomis_btb, umur_efektif_btb,
				// 						   disc, total_luas_btb')
				// 				 ->from('txn_bangunan')
				// 				 ->where('id_kertas_kerja', $id_kertas_kerja);
				// 		$query_bab = $this->db->get();
				// 		if ( is_object($query_bab) ) {
				// 			$row_bab = $query_bab->row();
				// 			if ( is_object($row_bab) ) {
				// 				$disc = empty($row_bab->disc) || !is_numeric($row_bab->disc) ? 0 : $row_bab->disc;
				// 				$luas = empty($row_bab->total_luas_btb) || !is_numeric($row_bab->total_luas_btb) ? 0 : $row_bab->total_luas_btb;
				// 				$kondisi_terlihat = empty($row_bab->kondisi_terlihat) || !is_numeric($row_bab->kondisi_terlihat) ? 0 : $row_bab->kondisi_terlihat;
				// 				$keusangan_fungsional = empty($row_bab->keusangan_fungsional)|| !is_numeric($row_bab->keusangan_fungsional) ? 0 : $row_bab->keusangan_fungsional;
				// 				$keusangan_ekonomis = empty($row_bab->keusangan_ekonomis) || !is_numeric($row_bab->keusangan_ekonomis) ? 0 : $row_bab->keusangan_ekonomis;
				// 				$umur_ekonomis_btb = empty($row_bab->umur_ekonomis_btb) || !is_numeric($row_bab->umur_ekonomis_btb) ? 0 : $row_bab->umur_ekonomis_btb;
				// 				$umur_efektif_btb = empty($row_bab->umur_efektif_btb) || !is_numeric($row_bab->umur_efektif_btb) ? 0 : $row_bab->umur_efektif_btb;
				// 				$kemunduran_fisik = empty($umur_ekonomis_btb) ? 0 : ($umur_efektif_btb/$umur_ekonomis_btb);
				// 				$total_penyusutan = ($kemunduran_fisik+$kondisi_terlihat)+((1-$kemunduran_fisik)*$keusangan_fungsional)+((1-$kemunduran_fisik)*$keusangan_ekonomis);
				// 				$all_brb_bangunan = $total_brb_bangunan*$luas;
				// 				$nilai_pasar_bangunan = $all_brb_bangunan*(1-($total_penyusutan/100));
				// 				$nilai_likuidasi_bangunan = $disc > 0 ? $nilai_pasar_bangunan*(1-($disc/100)) : $nilai_pasar_bangunan;
				// 				$dt_update_bangunan = array(
				// 					'nilai_pasar'	=> $nilai_pasar_bangunan,
				// 					'nilai_likuidasi' => $nilai_likuidasi_bangunan
				// 				);
				// 				// $this->db->where('id_bangunan', $row_bab->id_bangunan);
				// 				// $this->db->update('txn_bangunan', $dt_update_bangunan);
				// 			}
				// 		}
				// 	}
				// }
				$user	= $this->auth->get_data_login();
				
				$data				= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status), $data);
				
				// Next Step 
				$nextstatus=$id_status + 1;

				$data_next	= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> ($nextstatus)
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
					
				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
			else
			{
				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}
		else if ($type == "laporan")
		{
			if ($id_status == 22)
			{
				$user	= $this->auth->get_data_login();
				
				$data				= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status), $data);
				
				$lembar_kendali			= $this->global_model->get_data("mst_lembar_kendali", 2, array("id_pekerjaan", "step"), array($id_pekerjaan, "LKK-2"))->row();
				$txn_lembar_kendali		= $this->global_model->get_data("txn_lembar_kendali_2", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> ($id_status + 1),
					"id_user"			=> $txn_lembar_kendali->project_manager
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
					
				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}
		else if ($type == "laporan_final")
		{
			if ($id_status == 26)
			{
				$user	= $this->auth->get_data_login();
				
				$data				= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"do"				=> 1
				);
				
				$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $id_status), $data);
				
				// Next Step 
				$data_next	= array(
					"id_pekerjaan"		=> $id_pekerjaan,
					"id_status"			=> ($id_status + 1)
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);
					
				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}
		
		echo json_encode(array("result" => $result, "message" => $message));
	}

	function send_kontak()
	{
		$nama		= $_POST["nama"];
		$email		= $_POST["email"];
		$judul		= $_POST["judul"];
		$pesan		= $_POST["pesan"];
		
		$result		= "error";
		$message	= "";
		
		if (empty($nama) || empty($email) || empty($judul) || empty($pesan))
		{
			$message	= "Silahkan lengkapi semua kolom.";
		}
		else if (!valid_email($email))
		{
			$message	= "Email Anda tidak valid.";
		}
		else
		{
			
			
			$email_kontak	= $this->spmlib->get_config()["email_kontak"];
			
			$data_kontak	= array(
				"nama"	=> $nama,
				"email"	=> $email,
				"judul"	=> $judul,
				"pesan"	=> $pesan
			);
			
			$this->global_model->save("mst_kontak", $data_kontak);
			
			$to			= array();
			$cc			= array();
			$subject	= "Pesan Kontak";
			$content	= "";
			
			array_push($to, array("Email" => $email_kontak, "Nama" => ""));
			$content		= "
				Dear Admin,<br>
				Anda telah mendapatkan pesan dari : <br><br>
				<table border='0'>
					<tr>
						<td valign='top'>Nama<td>
						<td valign='top'>:<td>
						<td valign='top'>".$nama."<td>
					</tr>
					<tr>
						<td valign='top'>Email<td>
						<td valign='top'>:<td>
						<td valign='top'>".$email."<td>
					</tr>
					<tr>
						<td valign='top'>Judul<td>
						<td valign='top'>:<td>
						<td valign='top'>".$judul."<td>
					</tr>
					<tr>
						<td valign='top'>Pesan<td>
						<td valign='top'>:<td>
						<td valign='top'>".$pesan."<td>
					</tr>
				</table>

			";
			
			$this->spmlib->send_mail($to, $cc, $subject, $content);
			$result		= "success";
			$message	= "Pesan Anda berhasil terkirim.";
		}
		
		echo json_encode(array("result" => $result, "message" => $message));
	}

	function chart_pekerjaan()
	{
		/*"cols": [
		        {"id":"","label":"","pattern":"","type":"string"},
		        {"id":"","label":"Framework","pattern":"","type":"number"}
		      ],
		  "rows": [
		        {"c":[{"v":"Laravel","f":null},{"v":2112,"f":null}]},
		        {"c":[{"v":"Symfony2","f":null},{"v":1005,"f":null}]},
		        {"c":[{"v":"Nette","f":null},{"v":703,"f":null}]},
		        {"c":[{"v":"Yii 2","f":null},{"v":620,"f":null}]},
		        {"c":[{"v":"CodeIgniter","f":null},{"v":482,"f":null}]},
		        {"c":[{"v":"PHPixie","f":null},{"v":420,"f":null}]},
		        {"c":[{"v":"Zend 2","f":null},{"v":346,"f":null}]},
		        {"c":[{"v":"No Framework","f":null},{"v":306,"f":null}]},
		        {"c":[{"v":"Yii 1","f":null},{"v":293,"f":null}]},
		        {"c":[{"v":"Phalcon","f":null},{"v":231,"f":null}]}
		      ]*/
		$data_pekerjaan	= array();
		$last_month	= date("Y-m-d");
		
		for ($i = 0; $i < 12; $i++)
		{
			$month	= date("M Y", strtotime("-".$i." month", time()));
			
			
			$data_pekerjaan[]	= array(
				"c"		=> array(
					array(
						"v" 	=> $month,
						"f"		=> ""
					),array(
						"v" 	=> $i,
						"f"		=> ""
					)
				)
			);
		}
		
		
		$data	= array(
			"cols" 	=> array(
				"id" 		=> "",
				"label"		=> "Jumlah Pekerjaan",
				"pattern"	=> "",
				"type"		=> "number"
				
			),
			"rows"	=> $data_pekerjaan
		);
		
		echo json_encode($data);
	}

	function get_client_info()
	{
		$search	= trim($_REQUEST["search"]);
		
		if (!empty($search)){
			$query	= "SELECT * FROM view_klien WHERE nama LIKE '%".$search."%' ORDER BY created DESC LIMIT 10";
		}else{
			$query	= "SELECT * FROM view_klien ORDER BY created DESC LIMIT 8";	
		}
		
		$clients	= $this->global_model->get_by_query($query);	
		$data	= '<ul class="nav nav-stacked">';
		
		foreach ($clients->result() as $client)
		{
			$data	.= '<li><a href="'.base_url().'pekerjaan?field=true&cari='.$client->nama.'">'.$client->nama."</li>";
		}
		
		if (empty($data))
		{
			$data	= "<div style='border-bottom: 1px solid #eee; padding-bottom: 5px; font-size: 12px; color: #333;'>Data Kosong.</div>";
		}

		$data .= '</ul>';
		
		echo $data;
	}
	function get_data_kota() {
        $id_provinsi = $this->input->get('provinsi');
        $list_kota = $this->global_model->get_list('mst_kota', array('id_provinsi' => $id_provinsi));
        echo json_encode(array('result' => (array)$list_kota));
	}
	function get_data_kecamatan() {
        $id_kota = $this->input->get('kota');
        $list_kecamatan = $this->global_model->get_list('mst_kecamatan', array('id_kota' => $id_kota));
        echo json_encode(array('result' => (array)$list_kecamatan));
	}
	function get_data_desa() {
        $id_kecamatan = $this->input->get('kecamatan');
        $list_desa = $this->global_model->get_list('mst_desa', array('id_kecamatan' => $id_kecamatan));
        echo json_encode(array('result' => (array)$list_desa));
	}

	function get_today_agenda()
	{	$user			= $this->auth->get_data_login();
		$con_group 		= $user['id_group'] == 7 ? ' AND id_user='.$user['id'] : NULL ;	
		$query 	= "SELECT nama,nama_jenis_objek,alamat,tanggal_mulai,tanggal_selesai,A.id id_lokasi FROM view_lokasi A JOIN mst_pekerjaan B ON A.id_pekerjaan = B.id WHERE tanggal_mulai = ".date('Y-m-d').$con_group;

		$today_agenda	= $this->global_model->get_by_query($query);
		$check_empty = $today_agenda->result_array();
		$data	= '<ul class="nav nav-stacked">';
		
		foreach ($today_agenda->result_array() as $key => $value)
		{
			$data	.= '<li><a href="#">'.$value['nama']."</li>";
		}
		
		if (empty($check_empty))
		{
			$data	.= "<h5 class='text-center'>Tidak ada agenda hari ini.</h5>";
		}

		$data .= '</ul>';
		
		echo $data;
	}
	function do_save_data_legalitas() {
		$table_name = "r_data_legalitas";
		$data_post = $_POST;
		
		foreach ($data_post as $data) {
			$tanggal_sertifikat_terbit = $data['tanggal_sertifikat_terbit'];
			$tanggal_sertifikat_berakhir = $data['tanggal_sertifikat_berakhir'];
			$tgl_bln_thn = $data['tgl_bln_thn'];

			$data['tanggal_sertifikat_terbit'] = date("Y-m-d", strtotime($tanggal_sertifikat_terbit));
			$data['tanggal_sertifikat_berakhir'] = date("Y-m-d", strtotime($tanggal_sertifikat_berakhir));
			$data['tgl_bln_thn'] = date("Y-m-d", strtotime($tgl_bln_thn));

			$this->global_model->save($table_name, $data);
		}

		echo json_encode(true);
	}
	function delete_pekerjaan(){
		$id_pekerjaan = $this->input->post("id_pekerjaan");
		if (!$id_pekerjaan)
		{

			echo json_encode(false);
			return;
		}
		$this->global_model->delete_data("mst_lokasi","id_pekerjaan",$id_pekerjaan);
		$this->global_model->delete_data("mst_pekerjaan","id",$id_pekerjaan);
		echo json_encode(true);
	}
}