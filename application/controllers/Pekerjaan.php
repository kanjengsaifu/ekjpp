<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{
	function __construct() {
		parent::__construct();
        $this->load->model('Pekerjaan_model','app_model');
	}

	function index() {
		// redirect(base_url()."new/pekerjaan");
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Listing Pekerjaan";

		$data["status"]	= $this->global_model->get_data("mst_status")->result();

		$data["_template"]	= $this->template->generate_template("user", $data);


		$this->load->view("pekerjaan/index", $data);
	}

	function tambah($id = null) {
		$this->cek_tambah_pekerjaan($id);
		$id = base64_decode($id);
                $jmlobjek   = $this->global_model->get_by_query("select count(*) as jmlobjek from mst_lokasi where id_pekerjaan='".$id."' limit 1")->row()->jmlobjek;

		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Tambah Pekerjaan";

		$objek_edit		= $this->global_model->get_data("mst_pekerjaan", 1, array("id"), array($id))->row();

		$id					= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);

		$id_klien			= $this->formlib->_generate_dropdown_master("mst_klien", "id_klien", "id", "nama", $objek_edit->id_klien, TRUE);
		$id_debitur			= $this->formlib->_generate_dropdown_master("mst_debitur", "id_debitur", "id", "nama", $objek_edit->id_debitur, TRUE);

		$nama				= $this->formlib->_generate_input_text("nama", "Nama", $objek_edit->nama, TRUE, TRUE);
		$tanggal_penerimaan	= $this->formlib->_generate_input_date("tanggal_penerimaan", "Tanggal Penerimaan Informasi", $objek_edit->tanggal_penerimaan, true, true);
		$no_surat_tugas		= $this->formlib->_generate_input_text("no_surat_tugas", "Nomor Surat Tugas", $objek_edit->no_surat_tugas, TRUE, TRUE);
		$tgl_surat_tugas	= $this->formlib->_generate_input_date("tgl_surat_tugas", "Tanggal Surat Tugas", $objek_edit->tgl_surat_tugas, true, true);
		$deskripsi 		= $this->formlib->_generate_input_textarea("deskripsi", "Deskripsi", $objek_edit->deskripsi, TRUE, TRUE);

		$jenis_laporan 		= $this->formlib->_generate_dropdown_list("jenis_laporan", 2, array("Ringkas", "Lengkap"), array("Short Report", "Narrative Report"),$objek_edit->jenis_laporan, TRUE);
		
		$keterangan 		= $this->formlib->_generate_input_textarea("keterangan", "Keterangan", $objek_edit->keterangan, TRUE, TRUE);

		$jenis_pemberi_tugas = "<input type='radio' id='jenis_pemberi_tugas_0' name='jenis_pemberi_tugas' value='0' ";  
		if ($objek_edit->jenis_pemberi_tugas==0){
			$jenis_pemberi_tugas .="Checked";
		}
		$jenis_pemberi_tugas .="> Klien/Debitur ";
		$jenis_pemberi_tugas .= "<input type='radio' id='jenis_pemberi_tugas_1' name='jenis_pemberi_tugas' value='1' ";  
		if ($objek_edit->jenis_pemberi_tugas==1){
			$jenis_pemberi_tugas .="Checked";
		}
		$jenis_pemberi_tugas .="> Bank ";

		$jenis_pengguna_laporan = "<input type='radio' id='jenis_pengguna_laporan_0' name='jenis_pengguna_laporan' value='0' ";  
		if ($objek_edit->jenis_pengguna_laporan==0){
			$jenis_pengguna_laporan .="Checked";
		}
		$jenis_pengguna_laporan .="> Klien ";
		$jenis_pengguna_laporan .= "<input type='radio' id='jenis_pengguna_laporan_1' name='jenis_pengguna_laporan' value='1' ";  
		if ($objek_edit->jenis_pengguna_laporan==1){
			$jenis_pengguna_laporan .="Checked";
		}
		$jenis_pengguna_laporan .="> Bank ";
		$jenis_pengguna_laporan .= "<input type='radio' id='jenis_pengguna_laporan_2' name='jenis_pengguna_laporan' value='1' ";  
		if ($objek_edit->jenis_pengguna_laporan==1){
			$jenis_pengguna_laporan .="Checked";
		}
		$jenis_pengguna_laporan .="> Klien & Bank ";

		// $pemberi_tugas_klien = $this->formlib->_generate_dropdown_master("pemberi_tugas_klien", "pemberi_tugas_klien", "id", "nama", $objek_edit->pemberi_tugas, FALSE);
	 //    $pemberi_tugas_debitur = $this->formlib->_generate_dropdown_master("mst_debitur", "pemberi_tugas_debitur", "id", "nama", $objek_edit->pemberi_tugas, FALSE);

		$pemberi_tugas_klien_id = $this->formlib->_generate_input_text("pemberi_tugas_klien", "pemberi_tugas_klien", $objek_edit->pemberi_tugas, false, true);
		$pemberi_tugas_debitur_id = $this->formlib->_generate_input_text("pemberi_tugas_debitur", "pemberi_tugas_debitur", $objek_edit->pemberi_tugas, false, true);
		$pemberi_tugas_klien = $this->formlib->_generate_input_text("pemberi_tugas_klien_text", "pemberi_tugas_klien_text", $objek_edit->pemberi_tugas, true, true, 200, true);
	    $pemberi_tugas_debitur = $this->formlib->_generate_input_text("pemberi_tugas_debitur_text", "pemberi_tugas_debitur_text", $objek_edit->pemberi_tugas, true, true, 200, true);

		// $pengguna_laporan_klien = $this->formlib->_generate_dropdown_master("mst_klien", "pengguna_laporan_klien", "nama", "nama", $objek_edit->pengguna_laporan, FALSE);
	    // $pengguna_laporan_bank = $this->formlib->_generate_dropdown_master("mst_debitur", "pengguna_laporan_bank", "nama", "nama", $objek_edit->pengguna_laporan, FALSE);

		$pengguna_laporan = $this->formlib->_generate_input_text("pengguna_laporan", "pengguna_laporan", $objek_edit->pengguna_laporan, true, true, "", true);
	    $pengguna_laporan_bank = $this->formlib->_generate_input_text("pengguna_laporan_bank", "pengguna_laporan_bank", $objek_edit->pengguna_laporan, true, true);
	    $pengguna_laporan_klien_bank = $this->formlib->_generate_dropdown_master("mst_debitur", "pengguna_laporan_bank", "nama", "nama", $objek_edit->pengguna_laporan, FALSE);
	    
	    $pemilik_properti	= $this->formlib->_generate_input_text("pemilik_properti", "pemilik properti", $objek_edit->pemilik_properti, TRUE, TRUE);
		
	    $maksud_tujuan 		= $this->formlib->_generate_dropdown_master("mst_tujuan", "maksud_tujuan", "id_tujuan", "tujuan", $objek_edit->maksud_tujuan, FALSE);
			$tujuan_pelaporan_klien = $this->formlib->_generate_dropdown_master("mst_klien", "tujuan_pelaporan_klien", "id", "nama", $objek_edit->tujuan_pelaporan, FALSE);
	    $tujuan_pelaporan_debitur = $this->formlib->_generate_dropdown_master("mst_debitur", "tujuan_pelaporan_debitur", "id", "nama", $objek_edit->tujuan_pelaporan, FALSE);
	    $jenis_jasa = $this->formlib->_generate_dropdown_master("mst_jenis_jasa", "jenis_jasa", "id", "jenis_jasa", "", FALSE);

		$jenis_tujuan_pelaporan = "<input type='radio' id='jenis_tujuan_pelaporan_0' name='jenis_tujuan_pelaporan' value='0' ";  if ($objek_edit->jenis_tujuan_pelaporan==0){$jenis_tujuan_pelaporan .="Checked";}  $jenis_tujuan_pelaporan .="> Klien/Debitur ";
		$jenis_tujuan_pelaporan .= "<input type='radio' id='jenis_tujuan_pelaporan_1' name='jenis_tujuan_pelaporan' value='1' ";  if ($objek_edit->jenis_tujuan_pelaporan==1){$jenis_tujuan_pelaporan .="Checked";}  $jenis_tujuan_pelaporan .="> Bank ";

		$data["input"]["id"]				= $id;
		$data["input"]["id_klien"]			= $id_klien;
		$data["input"]["id_debitur"]		= $id_debitur;
		$data["input"]["nama"]				= $nama;
		$data["input"]["tanggal_penerimaan"]= $tanggal_penerimaan;
		$data["input"]["no_surat_tugas"]	= $no_surat_tugas;
		$data["input"]["tgl_surat_tugas"]= $tgl_surat_tugas;
		$data["input"]["deskripsi"]			= $deskripsi;
		$data["input"]["jenis_laporan"]		= $jenis_laporan;
		$data["input"]["keterangan"]		= $keterangan;
	    $data["jmlobjek"] = $jmlobjek+1;

	    $data["input"]["jenis_pemberi_tugas"]		= $jenis_pemberi_tugas;
	    $data["input"]["jenis_pengguna_laporan"]		= $jenis_pengguna_laporan;
		$data["input"]["pemberi_tugas_klien"]		= $pemberi_tugas_klien;
		$data["input"]["pemberi_tugas_debitur"]		= $pemberi_tugas_debitur;
		$data["input"]["pemberi_tugas_klien_id"]		= $pemberi_tugas_klien_id;
		$data["input"]["pemberi_tugas_debitur_id"]		= $pemberi_tugas_debitur_id;
		$data["input"]["pengguna_laporan"] = $pengguna_laporan;
		$data["input"]["pengguna_laporan_bank"] = $pengguna_laporan_bank;
		$data["input"]["pengguna_laporan_klien"] = $pengguna_laporan_klien;
		$data["input"]["pemilik_properti"]		= $pemilik_properti;
	    $data["input"]["pengguna_laporan"]		= $pengguna_laporan;
	    $data["input"]["maksud_tujuan"]		= $maksud_tujuan;
		$data["input"]["tujuan_pelaporan_klien"]		= $tujuan_pelaporan_klien;
		$data["input"]["tujuan_pelaporan_debitur"]		= $tujuan_pelaporan_debitur;
	    $data["input"]["jenis_tujuan_pelaporan"]		= $jenis_tujuan_pelaporan;
	    $data["input"]["jenis_jasa"]		= $jenis_jasa;

		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/tambah", $data);
	}

	function detail($id = null)
	{
		$base64_id = $id;
		$id 			= base64_decode($id);
		$user			= $this->auth->get_data_login();
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Detail Pekerjaan";
		$data["user"] 	= $user;
		$data['error_msg'] 	= "";

		$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id))->row();
		$klien			= $this->global_model->get_data("view_klien", 1, array("id"), array($pekerjaan->id_klien))->row();
		$lokasi			= $this->global_model->get_data("view_lokasi", 1, array("id_pekerjaan"), array($id));
		$id_lokasi 		= $lokasi->row()->id;
		

    	$jmlobjek   = $this->global_model->get_by_query("select count(*) as jmlobjek from mst_lokasi where id_pekerjaan='".$id."' limit 1")->row()->jmlobjek;
		//fee
		$lembar_kendali		= $this->global_model->get_data("mst_lembar_kendali", 2, array("id_pekerjaan","id_status"), array($id,3),"id","DESC")->row();
		if (isset($lembar_kendali)){
			$lembar_kendali_2		= $this->global_model->get_data("txn_lembar_kendali_2", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();
		}

		$data["base64_id"]				= $base64_id;
		$data["pekerjaan"]				= $pekerjaan;
		$data["klien"]					= $klien;
		$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
		$data["input"]["id_klien"]		= $this->formlib->_generate_input_text("id_klien", "id_klien", base64_encode($pekerjaan->id_klien), FALSE, TRUE);
		$data["button"]					= $this->generate_button($pekerjaan, $user);
		$data["jmlobjek"]				= $jmlobjek;
		$data["lembar_kendali"]				= $lembar_kendali;
		$data["lokasi"]				= $lokasi;
		//$data["array_lokasi"] = $array_lokasi;
		

		//print_r($lembar_kendali_2);
		if (isset($lembar_kendali_2)){
			$data["lembar_kendali_2"] = $lembar_kendali_2;
		}else{
			$lembar_kendali_2 = new ArrayObject();
			$lembar_kendali_2->harga=0;
			$lembar_kendali_2->jangka_waktu=0;
			$lembar_kendali_2->jumlah_orang=0;
			$data["lembar_kendali_2"]				= $lembar_kendali_2;
		}


		if ($pekerjaan->id_status > 10)
		{
			$data["po"]	= $this->global_model->get_data("mst_po", 1, array("id_pekerjaan"), array($id))->row();
		}

		// tambahan hendra 20180509
		$id_status = $pekerjaan->id_status;
		$this->load->library('upload');

		// var_dump($_FILES['file_xls']['name']);exit();

		if(isset($_FILES['file_xls']['name']) && $_FILES['file_xls']['name'] != "") {
			$allowedExtensions = array("xls","xlsx");
   			$ext = pathinfo($_FILES['file_xls']['name'], PATHINFO_EXTENSION);

   			if(in_array($ext, $allowedExtensions)) {
   				$file_size = $_FILES['file_xls']['size'] / 1024;
   				if($file_size < 20000) {
   					$file_name = $lokasi->row()->id.'.'.$ext;
   					// $file_name = $_FILES['file_xls']['name'];
                    $upload_conf = array(
                        'upload_path'       => './asset/file/kertas_kerja/',
                        'file_name'         => $file_name,
                    );

                    $this->upload->initialize($upload_conf);
                    $this->upload->data();
   					$file = "asset/file/kertas_kerja/".$upload_conf['file_name'];
           			$isUploaded = copy($_FILES['file_xls']['tmp_name'], $file);
           			if($isUploaded) {
           				require_once APPPATH."/third_party/PHPExcel.php";
           				require_once APPPATH."/third_party/PHPExcel/IOFactory.php";
           				$objPHPExcel = false;
           				$fileType = false;
           				try {
	                        // $objPHPExcel = PHPExcel_IOFactory::load($file); //commented 20180710

							$filetype = PHPExcel_IOFactory::identify($file);


	                    } catch (Exception $e) {
	                        die('Error loading file "' . pathinfo($file, PATHINFO_BASENAME). '": ' . $e->getMessage());
	                    }


	                    if ($filetype == "Excel5") {
	                    	$data['error_msg'] = "File Excel tidak dapat diproses, harap convert menjadi minimal Excel 2007!";
	                    }
	                    else
	                    {
							$objReader = PHPExcel_IOFactory::createReader($filetype);
							$objPHPExcel = $objReader->load($file);

		                    $sheet = $objPHPExcel->getSheet(1);
		                    $sheet_title = $objPHPExcel->getSheetByName('resume');
		                    if ($sheet_title != NULL) {
		                    	//====================== input data ke tabel kertas kerja ======================

		                    	$tanggal_penugasan_excel = $sheet->getCell('B10')->getFormattedValue();
		                    	$tanggal_penugasan = strtotime($tanggal_penugasan_excel);
		                    	if (!$tanggal_penugasan)
		                    	{
		                    		$data['error_msg'] = "Upload kertas kerja, format tanggal Penilaian salah (contoh: 2017-12-31)";
		                    	}
		                    	else
		                    	{
									$this->db->where("id_lokasi", $id_lokasi)->delete('txn_kertas_kerja');
									$this->db->where("id_lokasi", $id_lokasi)->delete('txn_tanah');
									$this->db->where("id_lokasi", $id_lokasi)->delete('txn_bangunan');
									$this->db->where("id_lokasi", $id_lokasi)->delete('txn_lampiran');
									$this->db->where("id_lokasi", $id_lokasi)->delete('txn_data_banding');

			                    	$data_insert_kertas_kerja = array(
		                    			'id_lokasi' 					=> $id_lokasi,
		                    			'nama_surveyor'					=> $this->input->post('nama_surveyor_upload'),
		                    			'tanggal_inspeksi_penilaian' 	=> $sheet->getCell('B7')->getFormattedValue(),
		                    			'tanggal_laporan'				=> $sheet->getCell('B2')->getFormattedValue(),
		                    			'nomor_laporan'					=> $sheet->getCell('E2')->getFormattedValue(),
		                    			'jenis_klien'					=> $sheet->getCell('A5')->getFormattedValue(),
		                    			'klien'							=> $sheet->getCell('B5')->getFormattedValue(),
		                    			'telepon_klien' 				=> $sheet->getCell('B6')->getFormattedValue(),
		                    			'debitur' 						=> $sheet->getCell('B4')->getFormattedValue(),
		                    			'nama_cabang'					=> $sheet->getCell('B8')->getFormattedValue(),
		                    			'nama_staff'					=> $sheet->getCell('B11')->getFormattedValue(),
		                    			'jabatan'						=> $sheet->getCell('B12')->getFormattedValue(),
		                    			'nomor_penugasan' 				=> $sheet->getCell('B9')->getFormattedValue(),
		                    			'tanggal_penugasan' 			=> $sheet->getCell('B10')->getFormattedValue(),
		                    			'tujuan_penilaian'				=> $sheet->getCell('B3')->getFormattedValue(),
		                    			'marketibility'					=> $sheet->getCell('B22')->getFormattedValue(),
		                    			'attachment_kertas_kerja' 		=> $upload_conf['file_name'],
		                    			'created'						=> date("Y-m-d H:i:s"),
			                    		'updated'						=> date("Y-m-d H:i:s"),
		                    		);

			                    	$insert_kertas_kerja = $this->db->insert('txn_kertas_kerja', $data_insert_kertas_kerja);
			                    	if ($insert_kertas_kerja) {
			                    		$id_kertas_kerja = $this->db->insert_id();
			                    	}

			                    	//====================== input data ke tabel tanah, bangunan, sarana ======================
			                    	//It returns the highest number of rows
			                		$total_rows = $sheet->getHighestRow();
			                		//It returns the highest number of columns
			                		$total_columns = $sheet->getHighestColumn();
			                		//Loop through each row of the worksheet
				                    for($row =16; $row <= $total_rows; $row++) {
				                        $single_row = $sheet->rangeToArray('A' . $row . ':' . $total_columns . $row, NULL, TRUE, FALSE);
				                        $data_insert = array(
				                        				'id_lokasi' 		=> $lokasi->row()->id,
				                        				'id_kertas_kerja'	=> $id_kertas_kerja,
				                        				'luas' 				=> $single_row[0][1],
				                        				'nilai_pasar' 		=> $single_row[0][3],
				                        				'nilai_likuidasi' 	=> $single_row[0][4],
				                        				'disc'				=> $single_row[0][5],
				                        				'created'			=> date("Y-m-d H:i:s"),
				                    					'updated'			=> date("Y-m-d H:i:s"),
				                        				);
				                        if(strtolower($single_row[0][0])=='tanah'){
				                        	$this->db->insert('txn_tanah', $data_insert);
				                        }elseif(strtolower($single_row[0][0])=='bangunan rumah tinggal'){
				                        	$this->db->insert('txn_bangunan', $data_insert);
				                        }elseif(strtolower($single_row[0][0])=='sarana pelengkap'){
				                        	$this->db->insert('txn_sarana_pelengkap', $data_insert);
				                        }
				                    }
				                    
				                   	//====================== update tabel pekerjaan status dan tambah row step selanjutnya ======================
									$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status));

									$data				= array(
										"id_pekerjaan"		=> $id,
										"id_status"			=> $id_status,
										"id_user"			=> $user["id"],
										"do"				=> 1
									);

									if ($cek_data->num_rows() != 0)
									{
										$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status), $data);
									}
									$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id))->row();
									$penilai	= $pekerjaan->penilai;

									// Next Step
									$data_next	= array(
										"id_pekerjaan"		=> $id,
										"id_status"			=> '19',
										"id_user"			=> $penilai
									);
									$success_update = $this->global_model->save("txn_pekerjaan_status", $data_next);
									if($success_update){
										redirect(base_url().'pekerjaan/');
									}
		                    	}

		                    } else {
		                    	$data['error_msg'] = "Sheet resume tidak ada atau harus di sheet pertama!";
		                    }
	                    }
           			} else {
	                    $data['error_msg'] = '<span class="msg">File gagal diupload!</span>';
	                }
   				} else {
	                $data['error_msg'] = '<span class="msg">Upload kertas kerja, maksimal File tidak boleh lebih dari 7MB!</span>';	
	            }

   			} else {
	           $data['error_msg'] = "Upload kertas kerja, tipe File hanya XLS dan XLSX";
	        }
		}

		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/detail", $data);
	}

	function log($id = null)
	{
		$id 			= base64_decode($id);
		$user			= $this->auth->get_data_login();
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Detail Pekerjaan";
		$data["user"] 	= $user;

		$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id))->row();
		$klien			= $this->global_model->get_data("view_klien", 1, array("id"), array($pekerjaan->id_klien))->row();

		$data["pekerjaan"]				= $pekerjaan;
		$data["klien"]					= $klien;
		$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
		$data["input"]["id_klien"]		= $this->formlib->_generate_input_text("id_klien", "id_klien", base64_encode($pekerjaan->id_klien), FALSE, TRUE);
		$data["button"]					= $this->generate_button($pekerjaan, $user);


		if ($pekerjaan->id_status > 10)
		{
			$data["po"]	= $this->global_model->get_data("mst_po", 1, array("id_pekerjaan"), array($id))->row();
		}


		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/log2", $data);
	}

	function log1($id = null)
	{
		$id 			= base64_decode($id);
		$user			= $this->auth->get_data_login();
		$config			= $this->spmlib->get_config();
		$data["title"] 	= "Log Pekerjaan";
		$data["user"] 	= $user;

		$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id))->row();
		$klien			= $this->global_model->get_data("view_klien", 1, array("id"), array($pekerjaan->id_klien))->row();

		$data["pekerjaan"]			= $pekerjaan;
		$data["klien"]				= $klien;
		$data["input"]["id"]		= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
		$data["input"]["id_klien"]	= $this->formlib->_generate_input_text("id_klien", "id_klien", base64_encode($pekerjaan->id_klien), FALSE, TRUE);
		$data["status"]	= $this->global_model->get_data("mst_status", 0, array("id"), array($id))->result();


		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/log", $data);
	}

	function lokasi_edit($id_pekerjaan = "", $id = "")
	{
		$id 			= base64_decode($id);
		$id_lokasi      = $id;
		$id_pekerjaan 	= base64_decode($id_pekerjaan);
		$jmlobjek   = $this->global_model->get_by_query("select count(*) as jmlobjek from mst_lokasi where id_pekerjaan='".$id_pekerjaan."' limit 1")->row()->jmlobjek;
    	$jmlobjek = $jmlobjek + 1;

		$objek_pekerjaan	= $this->global_model->get_data("mst_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$tanggal_penerimaan	= $this->formlib->_generate_input_text("tanggal_penerimaan", "tanggal_penerimaan", $objek_pekerjaan->tanggal_penerimaan, false, true);
		$sumber_nomor_sertifikat = $this->global_model->get_list('mst_sumber_nomor_sertifikat');

		//TXN TANAH
		$this->db->select('luas, sumber_nomor_sertifikat')
			     ->from('txn_tanah')
			     ->where('id_lokasi', $id_lokasi);
		$q_tanah = $this->db->get();
		$txn_tanah = array('sumber_nomor_sertifikat' => NULL, 'luas' => NULL);
		if ( is_object($q_tanah) ) {
			$txn_tanah = $q_tanah->row_array();
		}
		$data['txn_tanah'] = $txn_tanah;
		$detail=array();
		if (empty($id))
		{

            $data["title"] 	= "TAMBAH OBJEK PROPERTI - ".$jmlobjek; //"Tambah Objek Lokasi";

			$id				= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$id_pekerjaan	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);
			$id_jenis_objek	= $this->formlib->_generate_radio_master("mst_jenis_objek", "id_jenis_objek", "id", "nama", "", false, array("is_active"), array("1"));

			/*$this->formlib->_generate_input_chekbox_objek_lokasi("");*/
			$kode 			= $this->formlib->_generate_input_text("kode", "Kode", "", FALSE, TRUE);
			$alamat 		= $this->formlib->_generate_input_text("alamat", "Nama Jalan/Blok/Komplek", "", TRUE, TRUE);
			$gang 			= $this->formlib->_generate_input_text("gang", "Nama Gang", "", TRUE, TRUE);
			$nomor	 		= $this->formlib->_generate_input_text("nomor", "Nomor", "", TRUE, TRUE);
			$rt		 		= $this->formlib->_generate_input_text("rt", "RT", "", TRUE, TRUE);
			$rw		 		= $this->formlib->_generate_input_text("rw", "RW", "", TRUE, TRUE);
			$id_provinsi	= $this->formlib->_generate_dropdown_master("mst_provinsi","id_provinsi", "id", "nama", "", TRUE);
			$dh_provinsi	= $this->formlib->_generate_input_text("dh_provinsi","Nama propinsi dahulunya", "", TRUE, TRUE);
			$id_kota 		= $this->formlib->_generate_input_text("id_kota", "Silahkan pilih Provinsi dulu", "", TRUE, TRUE);
			$dh_kota		= $this->formlib->_generate_input_text("dh_kota","Nama kota dahulunya", "", TRUE, TRUE);
			$id_kecamatan	= $this->formlib->_generate_input_text("id_kecamatan", "Silahkan pilih Kota dulu", "", TRUE, TRUE);
			$dh_kecamatan	= $this->formlib->_generate_input_text("dh_kecamatan","Nama kecamatan dahulunya", "", TRUE, TRUE);
			$id_desa 		= $this->formlib->_generate_input_text("id_desa", "Silahkan pilih Kecamatan dulu", "", TRUE, TRUE);
			$dh_desa		= $this->formlib->_generate_input_text("dh_desa","Nama kelurahan/desa dahulunya", "", TRUE, TRUE);
			$zip		= $this->formlib->_generate_input_text("zip","Kode Pos", "", TRUE, TRUE);


			$temp_id_kota 		= $this->formlib->_generate_input_text("temp_id_kota", "", "", FALSE, TRUE);
			$temp_id_kecamatan	= $this->formlib->_generate_input_text("temp_id_kecamatan", "", "", FALSE, TRUE);
			$temp_id_desa 		= $this->formlib->_generate_input_text("temp_id_desa", "", "", FALSE, TRUE);

			$tanggal 		= $this->formlib->_generate_input_date_min("tanggal", "Tanggal", "", TRUE, TRUE,"",$objek_pekerjaan->tanggal_penerimaan);
			$jam	 		= $this->formlib->_generate_input_time("jam", "Jam", "", TRUE, TRUE);
			$id_transportasi= $this->formlib->_generate_dropdown_master("mst_transportasi_survey","id_transportasi", "id", "nama", "", TRUE);
			$pengembangan 		= $this->formlib->_generate_input_text("pengembangan", "Pengembangan Diatasnya Berupa", "", TRUE, TRUE);
			/*$pengembangan 		= $this->formlib->_generate_dropdown_list("pengembangan", 4, array("Jalan", "Perum", "Komplek", "Blok"), array("Jalan", "Perum", "Komplek", "Blok"), "", TRUE);*/
			$pemegang_hak 		= $this->formlib->_generate_input_text("pemegang_hak", "Nama Pemegang Hak", "", TRUE, TRUE);
			$kepemilikan 		= $this->formlib->_generate_dropdown_list("kepemilikan", 2, array("Tunggal", "Bersama"), array("Tunggal", "Bersama"), "", TRUE);
			$jenis_sertifikat 	= $this->formlib->_generate_dropdown_list("jenis_sertifikat", 5, array("Hak Milik (HM)", "Hak Guna Usaha (HGU)", "Hak Guna Bangunan (HGB)","Hak Milik Atas Satuan Rumah Susun (HMASRS)", "Hak Pakai", "Hak Sewa"), array("Hak Milik (HM)", "Hak Guna Usaha (HGU)", "Hak Guna Bangunan (HGB)","Hak Milik Atas Satuan Rumah Susun (HMASRS)", "Hak Pakai", "Hak Sewa"), "", TRUE);
			$no_sertifikat 		= $this->formlib->_generate_input_text("no_sertifikat", "Nomor Sertifikat", "", TRUE, TRUE);
			$luas_tanah 		= $this->formlib->_generate_input_text("luas_tanah", "Luas m2", "0", TRUE, TRUE);
			$luas_bangunan 		= $this->formlib->_generate_input_text("luas_bangunan", "Luas Bangunan (0 bila tidak ada bangunan)", "0", TRUE, TRUE);

			$jumlah_unit		=  $this->formlib->_generate_input_text("jml_unit", "Jumlah Unit", "", TRUE, TRUE);
			$nopol				=  $this->formlib->_generate_input_text("nopol", "NOPOL", "", TRUE, TRUE);
			$merk				=  $this->formlib->_generate_input_text("merk", "Merk", "", TRUE, TRUE);
			$model_tipe			=  $this->formlib->_generate_input_text("model_tipe", "Model / Tipe", "", TRUE, TRUE);
			$negara_pembuat		=  $this->formlib->_generate_input_text("negara_pembuat", "Negara Pembuat", "", TRUE, TRUE);
			$tahun_rakit		=  $this->formlib->_generate_input_text("tahun_rakit", "Tahun Perakitan", "", TRUE, TRUE);
			$tahun_buatan		=  $this->formlib->_generate_input_text("tahun_buatan", "Tahun Pembuatan", "", TRUE, TRUE);

			$nm_mesin			=  $this->formlib->_generate_input_text("nm_mesin", "Nama Mesin", "", TRUE, TRUE);
			$kapasitas			=  $this->formlib->_generate_input_text("kapasitas", "Kapasitas", "", TRUE, TRUE);
			$keterangan			=  $this->formlib->_generate_input_textarea("keterangan", "Keterangan", "", TRUE, TRUE);

			$panjang			=  $this->formlib->_generate_input_text("panjang", "Panjang", "", TRUE, TRUE);
			$lebar				=  $this->formlib->_generate_input_text("lebar", "Lebar", "", TRUE, TRUE);
			$tinggi				=  $this->formlib->_generate_input_text("tinggi", "Tinggi", "", TRUE, TRUE);
			$berat_bersih		=  $this->formlib->_generate_input_text("berat_bersih", "Berat Bersih", "", TRUE, TRUE);
			$berat_kotor		=  $this->formlib->_generate_input_text("berat_kotor", "Berat Kotor", "", TRUE, TRUE);
			$jenis_kapal		=  $this->formlib->_generate_input_text("jenis_kapal", "Jenis Kapal", "", TRUE, TRUE);
			$jml_unit_mesin		=  $this->formlib->_generate_input_text("jml_unit_mesin", "Jumlah Unit Mesin", "", TRUE, TRUE);
			$merk_tipe_mesin	=  $this->formlib->_generate_input_text("merk_tipe_mesin", "Merk Tipe Mesin", "", TRUE, TRUE);
			$negara_pembuat_mesin=  $this->formlib->_generate_input_text("negara_pembuat_mesin", "Negara Pembuat Mesin", "", TRUE, TRUE);
			$kapasitas_mesin	 =  $this->formlib->_generate_input_text("kapasitas_mesin", "Kapasitas Mesin", "", TRUE, TRUE);
			
		}
		else
		{
			$data["title"] 	= "UBAH OBJEK PROPERTI";
			$objek_edit		= $this->global_model->get_data("mst_lokasi", 1, array("id"), array($id))->row();
			$detail = $objek_edit;
			

			$id				= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$id_pekerjaan	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);
			$id_jenis_objek	= $this->formlib->_generate_radio_master("mst_jenis_objek", "id_jenis_objek", "id", "nama", $objek_edit->id_jenis_objek);
			$kode 			= $this->formlib->_generate_input_text("kode", "Kode", $objek_edit->kode, TRUE, TRUE);
			$alamat 		= $this->formlib->_generate_input_text("alamat", "Alamat", $objek_edit->alamat, TRUE, TRUE);
			$gang 			= $this->formlib->_generate_input_text("gang", "Nama Gang", $objek_edit->gang, TRUE, TRUE);
			$nomor	 		= $this->formlib->_generate_input_text("nomor", "Nomor", $objek_edit->nomor, TRUE, TRUE);
			$rt		 		= $this->formlib->_generate_input_text("rt", "RT", $objek_edit->rt, TRUE, TRUE);
			$rw		 		= $this->formlib->_generate_input_text("rw", "RW", $objek_edit->rw, TRUE, TRUE);
			$id_provinsi 	= $this->formlib->_generate_dropdown_master("mst_provinsi","id_provinsi", "id", "nama", $objek_edit->id_provinsi, TRUE);
			$dh_provinsi	= $this->formlib->_generate_input_text("dh_provinsi","Nama propinsi dahulunya", $objek_edit->dh_provinsi, TRUE, TRUE);
			$id_kota		= $this->formlib->_generate_input_text("id_kota", "Silahkan pilih Provinsi dulu", "", FALSE, TRUE);
			$dh_kota		= $this->formlib->_generate_input_text("dh_kota","Nama kota dahulunya", $objek_edit->dh_kota, TRUE, TRUE);
			$id_kecamatan	= $this->formlib->_generate_input_text("id_kecamatan", "Silahkan pilih Provinsi dulu", "", FALSE, TRUE);
			$dh_kecamatan	= $this->formlib->_generate_input_text("dh_kecamatan","Nama kecamatan dahulunya", $objek_edit->dh_kecamatan, TRUE, TRUE);
			$id_desa		= $this->formlib->_generate_input_text("id_desa", "Silahkan pilih Provinsi dulu", "", FALSE, TRUE);
			$dh_desa	= $this->formlib->_generate_input_text("dh_desa","Nama kelurahan/desa dahulunya", $objek_edit->dh_desa, TRUE, TRUE);
                        $zip		= $this->formlib->_generate_input_text("zip","Kode Pos", $objek_edit->zip, TRUE, TRUE);

			$temp_id_kota 		= $this->formlib->_generate_input_text("temp_id_kota", "", $objek_edit->id_kota, FALSE, TRUE);
			$temp_id_kecamatan	= $this->formlib->_generate_input_text("temp_id_kecamatan", "", $objek_edit->id_kecamatan, FALSE, TRUE);
			$temp_id_desa 		= $this->formlib->_generate_input_text("temp_id_desa", "", $objek_edit->id_desa, FALSE, TRUE);

			$tanggal 		= $this->formlib->_generate_input_date_min("tanggal", "Tanggal", $objek_edit->tanggal, TRUE, TRUE,"",$objek_pekerjaan->tanggal_penerimaan);
			$jam	 		= $this->formlib->_generate_input_time("jam", "Jam", $objek_edit->jam, TRUE, TRUE);
			$id_transportasi= $this->formlib->_generate_dropdown_master("mst_transportasi_survey","id_transportasi", "id", "nama", $objek_edit->id_transportasi, TRUE);

			$pengembangan 		= $this->formlib->_generate_input_text("pengembangan", "Pengembangan Diatasnya Berupa", $objek_edit->pengembangan, TRUE, TRUE);
			/*$pengembangan 		= $this->formlib->_generate_dropdown_list("pengembangan", 4, array("Jalan", "Perum", "Komplek", "Blok"), array("Jalan", "Perum", "Komplek", "Blok"), $objek_edit->pengembangan, TRUE);*/
			$pemegang_hak 		= $this->formlib->_generate_input_text("pemegang_hak", "Pemegang Hak", $objek_edit->pemegang_hak, TRUE, TRUE);
			$kepemilikan 		= $this->formlib->_generate_dropdown_list("kepemilikan", 2, array("Tunggal", "Bersama"), array("Tunggal", "Bersama"), $objek_edit->kepemilikan, TRUE);
			$jenis_sertifikat 	= $this->formlib->_generate_dropdown_list("jenis_sertifikat", 5, array("Hak Milik (HM)", "Hak Guna Usaha (HGU)", "Hak Guna Bangunan (HGB)","Hak Milik Atas Satuan Rumah Susun (HMASRS)","Hak Pakai", "Hak Sewa"), array("Hak Milik (HM)", "Hak Guna Usaha (HGU)", "Hak Guna Bangunan (HGB)","Hak Milik Atas Satuan Rumah Susun (HMASRS)", "Hak Pakai", "Hak Sewa"), $objek_edit->jenis_sertifikat, TRUE);
			$no_sertifikat 		= $this->formlib->_generate_input_text("no_sertifikat", "No Sertifikat", $objek_edit->no_sertifikat, TRUE, TRUE);
			$luas_tanah 		= $this->formlib->_generate_input_text("luas_tanah", "Luas m2", $objek_edit->luas_tanah, TRUE, TRUE);
			$luas_bangunan 		= $this->formlib->_generate_input_text("luas_bangunan", "Luas Bangunan (0 bila tidak ada bangunan)", $objek_edit->luas_bangunan, TRUE, TRUE);

			$jumlah_unit		=  $this->formlib->_generate_input_text("jml_unit", "Jumlah Unit", "", TRUE, TRUE);
			$nopol				=  $this->formlib->_generate_input_text("nopol", "NOPOL", "", TRUE, TRUE);
			$merk				=  $this->formlib->_generate_input_text("merk", "Merk", "", TRUE, TRUE);
			$model_tipe			=  $this->formlib->_generate_input_text("model_tipe", "Model / Tipe", "", TRUE, TRUE);
			$negara_pembuat		=  $this->formlib->_generate_input_text("negara_pembuat", "Negara Pembuat", "", TRUE, TRUE);
			$tahun_rakit		=  $this->formlib->_generate_input_text("tahun_rakit", "Tahun Perakitan", "", TRUE, TRUE);
			$tahun_buatan		=  $this->formlib->_generate_input_text("tahun_buatan", "Tahun Pembuatan", "", TRUE, TRUE);

			$nm_mesin			=  $this->formlib->_generate_input_text("nm_mesin", "Nama Mesin", "", TRUE, TRUE);
			$kapasitas			=  $this->formlib->_generate_input_text("kapasitas", "Kapasitas", "", TRUE, TRUE);
			$keterangan			=  $this->formlib->_generate_input_textarea("keterangan", "Keterangan", "", TRUE, TRUE);

			$panjang			=  $this->formlib->_generate_input_text("panjang", "Panjang", "", TRUE, TRUE);
			$lebar				=  $this->formlib->_generate_input_text("lebar", "Lebar", "", TRUE, TRUE);
			$tinggi				=  $this->formlib->_generate_input_text("tinggi", "Tinggi", "", TRUE, TRUE);
			$berat_bersih		=  $this->formlib->_generate_input_text("berat_bersih", "Berat Bersih", "", TRUE, TRUE);
			$berat_kotor		=  $this->formlib->_generate_input_text("berat_kotor", "Berat Kotor", "", TRUE, TRUE);
			$jenis_kapal		=  $this->formlib->_generate_input_text("jenis_kapal", "Jenis Kapal", "", TRUE, TRUE);
			$jml_unit_mesin		=  $this->formlib->_generate_input_text("jml_unit_mesin", "Jumlah Unit Mesin", "", TRUE, TRUE);
			$merk_tipe_mesin	=  $this->formlib->_generate_input_text("merk_tipe_mesin", "Merk Tipe Mesin", "", TRUE, TRUE);
			$negara_pembuat_mesin=  $this->formlib->_generate_input_text("negara_pembuat_mesin", "Negara Pembuat Mesin", "", TRUE, TRUE);
			$kapasitas_mesin	 =  $this->formlib->_generate_input_text("kapasitas_mesin", "Kapasitas Mesin", "", TRUE, TRUE);
		}
		$data["id_lokasi"]					= $id_lokasi;
		$data["input"]["id"]				= $id;
		$data["input"]["id_jenis_objek"]	= $id_jenis_objek;
		$data["input"]["kode"]				= $kode;
		$data["input"]["id_pekerjaan"]		= $id_pekerjaan;
		$data["input"]["tanggal_penerimaan"]		= $tanggal_penerimaan;
		$data["input"]["alamat"]			= $alamat;
		$data["input"]["gang"	]			= $gang;
		$data["input"]["nomor"]				= $nomor;
		$data["input"]["rt"]				= $rt;
		$data["input"]["rw"]				= $rw;
		$data["input"]["id_provinsi"]		= $id_provinsi;
		$data["input"]["id_kota"]			= $id_kota;
		$data["input"]["id_kecamatan"]		= $id_kecamatan;
		$data["input"]["id_desa"]			= $id_desa;
		$data["input"]["dh_provinsi"]		= $dh_provinsi;
		$data["input"]["dh_kota"]			= $dh_kota;
		$data["input"]["dh_kecamatan"]		= $dh_kecamatan;
		$data["input"]["dh_desa"]			= $dh_desa;
        $data["input"]["zip"]			= $zip;

		$data["input"]["temp_id_kota"]			= $temp_id_kota;
		$data["input"]["temp_id_kecamatan"]		= $temp_id_kecamatan;
		$data["input"]["temp_id_desa"]			= $temp_id_desa;

		$data["input"]["tanggal"]			= $tanggal;
		$data["input"]["jam"]				= $jam;
		$data["input"]["id_transportasi"]	= $id_transportasi;

		$data["input"]["pengembangan"]		= $pengembangan;
		$data["input"]["pemegang_hak"]		= $pemegang_hak;
		$data["input"]["kepemilikan"]		= $kepemilikan;
		$data["input"]["jenis_sertifikat"]	= $jenis_sertifikat;
		$data["input"]["no_sertifikat"]		= $no_sertifikat;
		$data["input"]["luas_tanah"]		= $luas_tanah;
		$data["input"]["luas_bangunan"]		= $luas_bangunan;
		$data["input"]["jumlah_unit"]		= $jumlah_unit;
		$data["input"]["nopol"]				= $nopol;
		$data["input"]["merk"]				= $merk;
		$data["input"]["model_tipe"]		= $model_tipe;
		$data["input"]["negara_pembuat"]	= $negara_pembuat;
		$data["input"]["tahun_rakit"]		= $tahun_rakit;

		$data["input"]["tahun_buatan"]		= $tahun_buatan;
		$data["input"]["nm_mesin"]			= $nm_mesin;
		$data["input"]["kapasitas"]			= $kapasitas;
		$data["input"]["keterangan"]		= $keterangan;

		$data["input"]["panjang"]			= $panjang;
		$data["input"]["lebar"]				= $lebar;
		$data["input"]["tinggi"]			= $tinggi;
		$data["input"]["berat_bersih"]		= $berat_bersih;
		$data["input"]["berat_kotor"]		= $berat_kotor;
		$data["input"]["jenis_kapal"]		= $jenis_kapal;
		$data["input"]["jml_unit_mesin"]	= $jml_unit_mesin;
		$data["input"]["merk_tipe_mesin"]	= $merk_tipe_mesin;
		$data["input"]["negara_pembuat_mesin"]	= $negara_pembuat_mesin;
		$data["input"]["kapasitas_mesin"]	= $kapasitas_mesin;
		$data["sumber_nomor_sertifikat"] = $sumber_nomor_sertifikat;
		$data["detail"]=$detail;

		$data["_template"]	= $this->template->generate_template("user", $data);
		
		$this->load->view("pekerjaan/lokasi_edit", $data);
	}

	function lembar_kendali_edit($id_pekerjaan = "", $id = "")
	{
		$id 			= base64_decode($id);
		$id_pekerjaan 	= base64_decode($id_pekerjaan);
		$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$data["pekerjaan"]	= $pekerjaan;

		if (empty($id))
		{
			//TAMBAH LKK
			if ($pekerjaan->id_status == 2)
			{
				$data["title"] 	= "Tambah Lembar Kendali Klien";

				$step 		= "";
				$id_status = "";
				$jawab_1a = "Ya";
				$jawab_1b = "";
				$jawab_2a = "Ya";
				$jawab_2b = "";
				$jawab_3a = "Ya";
				$jawab_3b = "";
				$jawab_4a = "Ya";
				$jawab_4b = "";
				$jawab_5a = "Ya";
				$jawab_5b = "";
				$jawab_6a = "Ya";
				$jawab_6b = "";
				$jawab_7a = "Ya";
				$jawab_7b = "";
				$jawab_8a = "Ya";
				$jawab_8b = "";
				$jawab_9a = "Ya";
				$jawab_9b = "";
				$jawab_10a = "Ya";
				$jawab_10b = "";
				$jawab_11a = "Ya";
				$jawab_11b = "";
				$jawab_12a = "Ya";
				$jawab_12b = "";
				$jawab_13a = "Ya";
				$jawab_13b = "";
				$jawab_14a = "Ya";
				$jawab_14b = "";
				$jawab_15a = "Ya";
				$jawab_15b = "";
				$jawab_16a = "Ya";
				$jawab_16b = "";
				$jawab_17a = "Ya";
				$jawab_17b = "";
				$jawab_18  = "";
				$jawab_19  = "Berisiko Rendah";
				$jawab_20  = "Menerima";


				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["step"]			= $this->formlib->_generate_input_text("step", "step", $step, FALSE, TRUE);
				$data["input"]["id_status"]		= $this->formlib->_generate_input_text("id_status", "id_status", $id_status, FALSE, TRUE);

				$data["input"]["jawab_1a"] = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_1a);
				$data["input"]["jawab_2a"] = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_2a);
				$data["input"]["jawab_3a"] = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_3a);
				$data["input"]["jawab_4a"] = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_4a);
				$data["input"]["jawab_5a"] = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_5a);
				$data["input"]["jawab_6a"] = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_6a);
				$data["input"]["jawab_7a"] = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_7a);
				$data["input"]["jawab_8a"] = $this->formlib->_generate_input_radio_no_caption("jawab_8a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_8a);
				$data["input"]["jawab_9a"] = $this->formlib->_generate_input_radio_no_caption("jawab_9a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_9a);
				$data["input"]["jawab_10a"] = $this->formlib->_generate_input_radio_no_caption("jawab_10a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_10a);
				$data["input"]["jawab_11a"] = $this->formlib->_generate_input_radio_no_caption("jawab_11a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_11a);
				$data["input"]["jawab_12a"] = $this->formlib->_generate_input_radio_no_caption("jawab_12a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_12a);
				$data["input"]["jawab_13a"] = $this->formlib->_generate_input_radio_no_caption("jawab_13a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_13a);
				$data["input"]["jawab_14a"] = $this->formlib->_generate_input_radio_no_caption("jawab_14a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_14a);
				$data["input"]["jawab_15a"] = $this->formlib->_generate_input_radio_no_caption("jawab_15a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_15a);
				$data["input"]["jawab_16a"] = $this->formlib->_generate_input_radio_no_caption("jawab_16a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_16a);
				$data["input"]["jawab_17a"] = $this->formlib->_generate_input_radio_no_caption("jawab_17a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_17a);

				$data["input"]["jawab_1b"] = $this->formlib->_generate_input_textarea("jawab_1b", "", $jawab_1b, TRUE, TRUE);
				$data["input"]["jawab_2b"] = $this->formlib->_generate_input_textarea("jawab_2b", "", $jawab_2b, TRUE, TRUE);
				$data["input"]["jawab_3b"] = $this->formlib->_generate_input_textarea("jawab_3b", "", $jawab_3b, TRUE, TRUE);
				$data["input"]["jawab_4b"] = $this->formlib->_generate_input_textarea("jawab_4b", "", $jawab_4b, TRUE, TRUE);
				$data["input"]["jawab_5b"] = $this->formlib->_generate_input_textarea("jawab_5b", "", $jawab_5b, TRUE, TRUE);
				$data["input"]["jawab_6b"] = $this->formlib->_generate_input_textarea("jawab_6b", "", $jawab_6b, TRUE, TRUE);
				$data["input"]["jawab_7b"] = $this->formlib->_generate_input_textarea("jawab_7b", "", $jawab_7b, TRUE, TRUE);
				$data["input"]["jawab_8b"] = $this->formlib->_generate_input_textarea("jawab_8b", "", $jawab_8b, TRUE, TRUE);
				$data["input"]["jawab_9b"] = $this->formlib->_generate_input_textarea("jawab_9b", "", $jawab_9b, TRUE, TRUE);
				$data["input"]["jawab_10b"] = $this->formlib->_generate_input_textarea("jawab_10b", "", $jawab_10b, TRUE, TRUE);
				$data["input"]["jawab_11b"] = $this->formlib->_generate_input_textarea("jawab_11b", "", $jawab_11b, TRUE, TRUE);
				$data["input"]["jawab_12b"] = $this->formlib->_generate_input_textarea("jawab_12b", "", $jawab_12b, TRUE, TRUE);
				$data["input"]["jawab_13b"] = $this->formlib->_generate_input_textarea("jawab_13b", "", $jawab_13b, TRUE, TRUE);
				$data["input"]["jawab_14b"] = $this->formlib->_generate_input_textarea("jawab_14b", "", $jawab_14b, TRUE, TRUE);
				$data["input"]["jawab_15b"] = $this->formlib->_generate_input_textarea("jawab_15b", "", $jawab_15b, TRUE, TRUE);
				$data["input"]["jawab_16b"] = $this->formlib->_generate_input_textarea("jawab_16b", "", $jawab_16b, TRUE, TRUE);
				$data["input"]["jawab_17b"] = $this->formlib->_generate_input_textarea("jawab_17b", "", $jawab_17b, TRUE, TRUE);
				$data["input"]["jawab_18"] = $this->formlib->_generate_input_textarea("jawab_18", "", $jawab_18, TRUE, TRUE);
				$data["input"]["jawab_19"] = $this->formlib->_generate_input_radio_no_caption("jawab_19", array("Berisiko Tinggi", "Berisiko Sedang", "Berisiko Rendah"), $jawab_19);
				$data["input"]["jawab_20"] = $this->formlib->_generate_input_radio_no_caption("jawab_20", array("Menerima", "Menolak"), $jawab_20);

				$data["_template"]	= $this->template->generate_template("user", $data);
				$this->load->view("pekerjaan/lembar_kendali_1_edit", $data);
			}
			else if ($pekerjaan->id_status == 3)
			{
				$data["title"] 	= "Tambah Lembar Kendali Klien 2";

				$step 					= "";
				$id_status 				= "";

				$ruang_lingkup 			= "Diterima";
				$bidang_penugasan 		= "Sesuai";
				$jumlah_orang 			= "";
				$jangka_waktu 			= "";
				$termin_pembayaran_1 	= "";
				$termin_pembayaran_2 	= "";
				$termin_pembayaran_3 	= "";
				$termin_pembayaran_4 	= "";
				$termin_pembayaran_5 	= "";
                                $termin_komentar_5 	= "";
                                $termin_komentar_4 	= "";
                                $termin_komentar_3 	= "";
                                $termin_komentar_2 	= "";
                                $termin_komentar_1 	= "";
				$project_manager 		= "";
				$resiko 				= "Rendah";
				$resiko_keterangan		= "";
				$harga 					= "";

				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["step"]			= $this->formlib->_generate_input_text("step", "step", $step, FALSE, TRUE);
				$data["input"]["id_status"]		= $this->formlib->_generate_input_text("id_status", "id_status", $id_status, FALSE, TRUE);

				$data["input"]["ruang_lingkup"] 	= $this->formlib->_generate_input_radio_no_caption("ruang_lingkup", array("Diterima","Ditolak"), $ruang_lingkup);
				$data["input"]["bidang_penugasan"] 	= $this->formlib->_generate_input_radio_no_caption("bidang_penugasan", array("Sesuai","Tidak"), $bidang_penugasan);
				$data["input"]["jumlah_orang"] 		= $this->formlib->_generate_input_text("jumlah_orang", "jumlah orang yang ditugaskan", $jumlah_orang, TRUE, TRUE);
				$data["input"]["jangka_waktu"] 		= $this->formlib->_generate_input_text("jangka_waktu", "lama waktu pengerjaan", $jangka_waktu, TRUE, TRUE);
				$data["input"]["termin_pembayaran_1"] = $this->formlib->_generate_input_text("termin_pembayaran_1", "", $termin_pembayaran_1, TRUE, TRUE);
				$data["input"]["termin_pembayaran_2"] = $this->formlib->_generate_input_text("termin_pembayaran_2", "", $termin_pembayaran_2, TRUE, TRUE);
				$data["input"]["termin_pembayaran_3"] = $this->formlib->_generate_input_text("termin_pembayaran_3", "", $termin_pembayaran_3, TRUE, TRUE);
				$data["input"]["termin_pembayaran_4"] = $this->formlib->_generate_input_text("termin_pembayaran_4", "", $termin_pembayaran_4, TRUE, TRUE);
				$data["input"]["termin_pembayaran_5"] = $this->formlib->_generate_input_text("termin_pembayaran_5", "", $termin_pembayaran_5, TRUE, TRUE);
				$data["input"]["termin_komentar_5"] = $this->formlib->_generate_input_text("termin_komentar_5", "", $termin_komentar_5, TRUE, TRUE);
                $data["input"]["termin_komentar_4"] = $this->formlib->_generate_input_text("termin_komentar_4", "", $termin_komentar_4, TRUE, TRUE);
                $data["input"]["termin_komentar_3"] = $this->formlib->_generate_input_text("termin_komentar_3", "", $termin_komentar_3, TRUE, TRUE);
                $data["input"]["termin_komentar_2"] = $this->formlib->_generate_input_text("termin_komentar_2", "", $termin_komentar_2, TRUE, TRUE);
                $data["input"]["termin_komentar_1"] = $this->formlib->_generate_input_text("termin_komentar_1", "", $termin_komentar_1, TRUE, TRUE);

                // $data["input"]["project_manager"] 	= $this->formlib->_generate_dropdown_master_condition("view_user", 1, array("id_group"), array(6), "project_manager", "id", "nama", $project_manager, TRUE);

                $data["input"]["project_manager"] 	= $this->formlib->_generate_dropdown_master_project_manager("project_manager", "id", "nama", $project_manager, TRUE);
                
				$data["input"]["resiko"] 	=  $this->formlib->_generate_input_radio_no_caption("resiko", array("Rendah", "Sedang", "Tinggi"), $resiko);

				$data["input"]["resiko_keterangan"] = $this->formlib->_generate_input_textarea("resiko_keterangan", "catatan tingkat resiko", $resiko_keterangan, TRUE, TRUE);
				$data["input"]["harga"] 		= $this->formlib->_generate_input_text("harga", "", $harga, TRUE, TRUE);


				$data["_template"]	= $this->template->generate_template("user", $data);
				$this->load->view("pekerjaan/lembar_kendali_2_edit", $data);
			}
			else if ($pekerjaan->id_status == 12)
			{
				$data["title"] 	= "Tambah Lembar Kendali Klien 3";

				$step 		= "";
				$id_status = "";
				$jawab_1a = "Ya";
				$jawab_1b = "";
				$jawab_2a = "Ya";
				$jawab_2b = "";
				$jawab_3a = "Ya";
				$jawab_3b = "";
				$jawab_4a = "Ya";
				$jawab_4b = "";
				$jawab_5a = "Ya";
				$jawab_5b = "";
				$jawab_6a = "Ya";
				$jawab_6b = "";
				$jawab_7a = "Ya";
				$jawab_7b = "";
				$jawab_8a = "Ya";
				$jawab_8b = "";
				$jawab_9a = "Ya";
				$jawab_9b = "";
				$jawab_10a = "Ya";
				$jawab_10b = "";
				$jawab_11a = "Ya";
				$jawab_11b = "";


				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["step"]			= $this->formlib->_generate_input_text("step", "step", $step, FALSE, TRUE);
				$data["input"]["id_status"]		= $this->formlib->_generate_input_text("id_status", "id_status", $id_status, FALSE, TRUE);

				$data["input"]["jawab_1a"] = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_1a);
				$data["input"]["jawab_2a"] = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_2a);
				$data["input"]["jawab_3a"] = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_3a);
				$data["input"]["jawab_4a"] = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_4a);
				$data["input"]["jawab_5a"] = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_5a);
				$data["input"]["jawab_6a"] = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_6a);
				$data["input"]["jawab_7a"] = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_7a);
				$data["input"]["jawab_8a"] = $this->formlib->_generate_input_radio_no_caption("jawab_8a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_8a);
				$data["input"]["jawab_9a"] = $this->formlib->_generate_input_radio_no_caption("jawab_9a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_9a);
				$data["input"]["jawab_10a"] = $this->formlib->_generate_input_radio_no_caption("jawab_10a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_10a);
				$data["input"]["jawab_11a"] = $this->formlib->_generate_input_radio_no_caption("jawab_11a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_11a);


				$data["input"]["jawab_1b"] = $this->formlib->_generate_input_textarea("jawab_1b", "", $jawab_1b, TRUE, TRUE);
				$data["input"]["jawab_2b"] = $this->formlib->_generate_input_textarea("jawab_2b", "", $jawab_2b, TRUE, TRUE);
				$data["input"]["jawab_3b"] = $this->formlib->_generate_input_textarea("jawab_3b", "", $jawab_3b, TRUE, TRUE);
				$data["input"]["jawab_4b"] = $this->formlib->_generate_input_textarea("jawab_4b", "", $jawab_4b, TRUE, TRUE);
				$data["input"]["jawab_5b"] = $this->formlib->_generate_input_textarea("jawab_5b", "", $jawab_5b, TRUE, TRUE);
				$data["input"]["jawab_6b"] = $this->formlib->_generate_input_textarea("jawab_6b", "", $jawab_6b, TRUE, TRUE);
				$data["input"]["jawab_7b"] = $this->formlib->_generate_input_textarea("jawab_7b", "", $jawab_7b, TRUE, TRUE);
				$data["input"]["jawab_8b"] = $this->formlib->_generate_input_textarea("jawab_8b", "", $jawab_8b, TRUE, TRUE);
				$data["input"]["jawab_9b"] = $this->formlib->_generate_input_textarea("jawab_9b", "", $jawab_9b, TRUE, TRUE);
				$data["input"]["jawab_10b"] = $this->formlib->_generate_input_textarea("jawab_10b", "", $jawab_10b, TRUE, TRUE);
				$data["input"]["jawab_11b"] = $this->formlib->_generate_input_textarea("jawab_11b", "", $jawab_11b, TRUE, TRUE);



				$data["_template"]	= $this->template->generate_template("user", $data);
				$this->load->view("pekerjaan/lembar_kendali_3_edit", $data);
			}
			else if ($pekerjaan->id_status == 19)
			{
				$data["title"] 	= "Tambah Lembar Kendali Klien 4";

				$step 		= "";
				$id_status = "";
				$jawab_1a = "Ya";
				$jawab_1b = "";
				$jawab_2a = "Ya";
				$jawab_2b = "";
				$jawab_3a = "Ya";
				$jawab_3b = "";
				$jawab_4a = "Ya";
				$jawab_4b = "";
				$jawab_5a = "Ya";
				$jawab_5b = "";
				$jawab_6a = "Ya";
				$jawab_6b = "";
				$jawab_7a = "Ya";
				$jawab_7b = "";
				$jawab_8a = "Ya";
				$jawab_8b = "";
				$jawab_9a = "Ya";
				$jawab_9b = "";

				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["step"]			= $this->formlib->_generate_input_text("step", "step", $step, FALSE, TRUE);
				$data["input"]["id_status"]		= $this->formlib->_generate_input_text("id_status", "id_status", $id_status, FALSE, TRUE);

				$data["input"]["jawab_1a"] = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_1a);
				$data["input"]["jawab_2a"] = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_2a);
				$data["input"]["jawab_3a"] = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_3a);
				$data["input"]["jawab_4a"] = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_4a);
				$data["input"]["jawab_5a"] = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_5a);
				$data["input"]["jawab_6a"] = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_6a);
				$data["input"]["jawab_7a"] = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_7a);
				$data["input"]["jawab_8a"] = $this->formlib->_generate_input_radio_no_caption("jawab_8a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_8a);
				$data["input"]["jawab_9a"] = $this->formlib->_generate_input_radio_no_caption("jawab_9a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_9a);


				$data["input"]["jawab_1b"] = $this->formlib->_generate_input_textarea("jawab_1b", "", $jawab_1b, TRUE, TRUE);
				$data["input"]["jawab_2b"] = $this->formlib->_generate_input_textarea("jawab_2b", "", $jawab_2b, TRUE, TRUE);
				$data["input"]["jawab_3b"] = $this->formlib->_generate_input_textarea("jawab_3b", "", $jawab_3b, TRUE, TRUE);
				$data["input"]["jawab_4b"] = $this->formlib->_generate_input_textarea("jawab_4b", "", $jawab_4b, TRUE, TRUE);
				$data["input"]["jawab_5b"] = $this->formlib->_generate_input_textarea("jawab_5b", "", $jawab_5b, TRUE, TRUE);
				$data["input"]["jawab_6b"] = $this->formlib->_generate_input_textarea("jawab_6b", "", $jawab_6b, TRUE, TRUE);
				$data["input"]["jawab_7b"] = $this->formlib->_generate_input_textarea("jawab_7b", "", $jawab_7b, TRUE, TRUE);
				$data["input"]["jawab_8b"] = $this->formlib->_generate_input_textarea("jawab_8b", "", $jawab_8b, TRUE, TRUE);
				$data["input"]["jawab_9b"] = $this->formlib->_generate_input_textarea("jawab_9b", "", $jawab_9b, TRUE, TRUE);



				$data["_template"]	= $this->template->generate_template("user", $data);
				$this->load->view("pekerjaan/lembar_kendali_4_edit", $data);
			}
			else if ($pekerjaan->id_status == 28)
			{
				$data["title"] 	= "Tambah Lembar Kendali Klien 5";

				$step 		= "";
				$id_status = "";
				$jawab_1a = "Ya";
				$jawab_1b = "";
				$jawab_2a = "Ya";
				$jawab_2b = "";
				$jawab_3a = "Ya";
				$jawab_3b = "";
				$jawab_4a = "Ya";
				$jawab_4b = "";
				$jawab_5a = "Ya";
				$jawab_5b = "";
				$jawab_6a = "Ya";
				$jawab_6b = "";
				$jawab_7a = "Ya";
				$jawab_7b = "";
				$jawab_8a = "Ya";
				$jawab_8b = "";
				$jawab_9a = "Ya";
				$jawab_9b = "";
				$jawab_10a = "Ya";
				$jawab_10b = "";
				$jawab_11a = "Ya";
				$jawab_11b = "";
				$jawab_12a = "Ya";
				$jawab_12b = "";
				$jawab_13a = "Ya";
				$jawab_13b = "";
				$jawab_14a = "Ya";
				$jawab_14b = "";
				$jawab_15a = "Ya";
				$jawab_15b = "";
				$jawab_16a = "Ya";
				$jawab_16b = "";
				$jawab_17a = "Ya";
				$jawab_17b = "";
				$jawab_18a = "Ya";
				$jawab_18b = "";
				$jawab_19a = "Ya";
				$jawab_19b = "";
				$jawab_20a = "Ya";
				$jawab_20b = "";
				$jawab_21a = "Ya";
				$jawab_21b = "";
				$jawab_22a = "Ya";
				$jawab_22b = "";



				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["step"]			= $this->formlib->_generate_input_text("step", "step", $step, FALSE, TRUE);
				$data["input"]["id_status"]		= $this->formlib->_generate_input_text("id_status", "id_status", $id_status, FALSE, TRUE);

				$data["input"]["jawab_1a"] = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_1a);
				$data["input"]["jawab_2a"] = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_2a);
				$data["input"]["jawab_3a"] = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_3a);
				$data["input"]["jawab_4a"] = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_4a);
				$data["input"]["jawab_5a"] = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_5a);
				$data["input"]["jawab_6a"] = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_6a);
				$data["input"]["jawab_7a"] = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_7a);
				$data["input"]["jawab_8a"] = $this->formlib->_generate_input_radio_no_caption("jawab_8a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_8a);
				$data["input"]["jawab_9a"] = $this->formlib->_generate_input_radio_no_caption("jawab_9a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_9a);
				$data["input"]["jawab_10a"] = $this->formlib->_generate_input_radio_no_caption("jawab_10a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_10a);
				$data["input"]["jawab_11a"] = $this->formlib->_generate_input_radio_no_caption("jawab_11a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_11a);
				$data["input"]["jawab_12a"] = $this->formlib->_generate_input_radio_no_caption("jawab_12a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_12a);
				$data["input"]["jawab_13a"] = $this->formlib->_generate_input_radio_no_caption("jawab_13a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_13a);
				$data["input"]["jawab_14a"] = $this->formlib->_generate_input_radio_no_caption("jawab_14a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_14a);
				$data["input"]["jawab_15a"] = $this->formlib->_generate_input_radio_no_caption("jawab_15a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_15a);
				$data["input"]["jawab_16a"] = $this->formlib->_generate_input_radio_no_caption("jawab_16a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_16a);
				$data["input"]["jawab_17a"] = $this->formlib->_generate_input_radio_no_caption("jawab_17a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_17a);
				$data["input"]["jawab_18a"] = $this->formlib->_generate_input_radio_no_caption("jawab_18a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_18a);
				$data["input"]["jawab_19a"] = $this->formlib->_generate_input_radio_no_caption("jawab_19a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_19a);
				$data["input"]["jawab_20a"] = $this->formlib->_generate_input_radio_no_caption("jawab_20a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_20a);
				$data["input"]["jawab_21a"] = $this->formlib->_generate_input_radio_no_caption("jawab_21a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_21a);
				$data["input"]["jawab_22a"] = $this->formlib->_generate_input_radio_no_caption("jawab_22a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_22a);


				$data["input"]["jawab_1b"] = $this->formlib->_generate_input_textarea("jawab_1b", "", $jawab_1b, TRUE, TRUE);
				$data["input"]["jawab_2b"] = $this->formlib->_generate_input_textarea("jawab_2b", "", $jawab_2b, TRUE, TRUE);
				$data["input"]["jawab_3b"] = $this->formlib->_generate_input_textarea("jawab_3b", "", $jawab_3b, TRUE, TRUE);
				$data["input"]["jawab_4b"] = $this->formlib->_generate_input_textarea("jawab_4b", "", $jawab_4b, TRUE, TRUE);
				$data["input"]["jawab_5b"] = $this->formlib->_generate_input_textarea("jawab_5b", "", $jawab_5b, TRUE, TRUE);
				$data["input"]["jawab_6b"] = $this->formlib->_generate_input_textarea("jawab_6b", "", $jawab_6b, TRUE, TRUE);
				$data["input"]["jawab_7b"] = $this->formlib->_generate_input_textarea("jawab_7b", "", $jawab_7b, TRUE, TRUE);
				$data["input"]["jawab_8b"] = $this->formlib->_generate_input_textarea("jawab_8b", "", $jawab_8b, TRUE, TRUE);
				$data["input"]["jawab_9b"] = $this->formlib->_generate_input_textarea("jawab_9b", "", $jawab_9b, TRUE, TRUE);
				$data["input"]["jawab_10b"] = $this->formlib->_generate_input_textarea("jawab_10b", "", $jawab_10b, TRUE, TRUE);
				$data["input"]["jawab_11b"] = $this->formlib->_generate_input_textarea("jawab_11b", "", $jawab_11b, TRUE, TRUE);
				$data["input"]["jawab_12b"] = $this->formlib->_generate_input_textarea("jawab_12b", "", $jawab_12b, TRUE, TRUE);
				$data["input"]["jawab_13b"] = $this->formlib->_generate_input_textarea("jawab_13b", "", $jawab_13b, TRUE, TRUE);
				$data["input"]["jawab_14b"] = $this->formlib->_generate_input_textarea("jawab_14b", "", $jawab_14b, TRUE, TRUE);
				$data["input"]["jawab_15b"] = $this->formlib->_generate_input_textarea("jawab_15b", "", $jawab_15b, TRUE, TRUE);
				$data["input"]["jawab_16b"] = $this->formlib->_generate_input_textarea("jawab_16b", "", $jawab_16b, TRUE, TRUE);
				$data["input"]["jawab_17b"] = $this->formlib->_generate_input_textarea("jawab_17b", "", $jawab_17b, TRUE, TRUE);
				$data["input"]["jawab_18b"] = $this->formlib->_generate_input_textarea("jawab_18b", "", $jawab_18b, TRUE, TRUE);
				$data["input"]["jawab_19b"] = $this->formlib->_generate_input_textarea("jawab_19b", "", $jawab_19b, TRUE, TRUE);
				$data["input"]["jawab_20b"] = $this->formlib->_generate_input_textarea("jawab_20b", "", $jawab_20b, TRUE, TRUE);
				$data["input"]["jawab_21b"] = $this->formlib->_generate_input_textarea("jawab_21b", "", $jawab_21b, TRUE, TRUE);
				$data["input"]["jawab_22b"] = $this->formlib->_generate_input_textarea("jawab_22b", "", $jawab_22b, TRUE, TRUE);

				$data["_template"]	= $this->template->generate_template("user", $data);
				$this->load->view("pekerjaan/lembar_kendali_5_edit", $data);
			}
		}

		else
		{
			//EDIT LKK

			$data["title"] 	= "Ubah Lembar Kendali Klien";
			$lembar_kendali	= $this->global_model->get_data("mst_lembar_kendali", 1, array("id"), array($id))->row();

			if ($lembar_kendali->id_status == 2)
			{
				$data["title"] 	= "Ubah Lembar Kendali Klien 1";
				$objek_edit		= $this->global_model->get_data("txn_lembar_kendali_1", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();

				$step = $lembar_kendali->step;
				$id_status = $lembar_kendali->id_status;

				$jawab_1a = $objek_edit->jawab_1a;
				$jawab_1b = $objek_edit->jawab_1b;
				$jawab_2a = $objek_edit->jawab_2a;
				$jawab_2b = $objek_edit->jawab_2b;
				$jawab_3a = $objek_edit->jawab_3a;
				$jawab_3b = $objek_edit->jawab_3b;
				$jawab_4a = $objek_edit->jawab_4a;
				$jawab_4b = $objek_edit->jawab_4b;
				$jawab_5a = $objek_edit->jawab_5a;
				$jawab_5b = $objek_edit->jawab_5b;
				$jawab_6a = $objek_edit->jawab_6a;
				$jawab_6b = $objek_edit->jawab_6b;
				$jawab_7a = $objek_edit->jawab_7a;
				$jawab_7b = $objek_edit->jawab_7b;
				$jawab_8a = $objek_edit->jawab_8a;
				$jawab_8b = $objek_edit->jawab_8b;
				$jawab_9a = $objek_edit->jawab_9a;
				$jawab_9b = $objek_edit->jawab_9b;
				$jawab_10a = $objek_edit->jawab_10a;
				$jawab_10b = $objek_edit->jawab_10b;
				$jawab_11a = $objek_edit->jawab_11a;
				$jawab_11b = $objek_edit->jawab_11b;
				$jawab_12a = $objek_edit->jawab_12a;
				$jawab_12b = $objek_edit->jawab_12b;
				$jawab_13a = $objek_edit->jawab_13a;
				$jawab_13b = $objek_edit->jawab_13b;
				$jawab_14a = $objek_edit->jawab_14a;
				$jawab_14b = $objek_edit->jawab_14b;
				$jawab_15a = $objek_edit->jawab_15a;
				$jawab_15b = $objek_edit->jawab_15b;
				$jawab_16a = $objek_edit->jawab_16a;
				$jawab_16b = $objek_edit->jawab_16b;
				$jawab_17a = $objek_edit->jawab_17a;
				$jawab_17b = $objek_edit->jawab_17b;
				$jawab_18 = $objek_edit->jawab_18;
				$jawab_19 = $objek_edit->jawab_19;
				$jawab_20 = $objek_edit->jawab_20;

				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["step"]			= $this->formlib->_generate_input_text("step", "step", $step, FALSE, TRUE);
				$data["input"]["id_status"]			= $this->formlib->_generate_input_text("id_status", "id_status", $id_status, FALSE, TRUE);

				$data["input"]["jawab_1a"] = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_1a);
				$data["input"]["jawab_2a"] = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_2a);
				$data["input"]["jawab_3a"] = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_3a);
				$data["input"]["jawab_4a"] = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_4a);
				$data["input"]["jawab_5a"] = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_5a);
				$data["input"]["jawab_6a"] = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_6a);
				$data["input"]["jawab_7a"] = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_7a);
				$data["input"]["jawab_8a"] = $this->formlib->_generate_input_radio_no_caption("jawab_8a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_8a);
				$data["input"]["jawab_9a"] = $this->formlib->_generate_input_radio_no_caption("jawab_9a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_9a);
				$data["input"]["jawab_10a"] = $this->formlib->_generate_input_radio_no_caption("jawab_10a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_10a);
				$data["input"]["jawab_11a"] = $this->formlib->_generate_input_radio_no_caption("jawab_11a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_11a);
				$data["input"]["jawab_12a"] = $this->formlib->_generate_input_radio_no_caption("jawab_12a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_12a);
				$data["input"]["jawab_13a"] = $this->formlib->_generate_input_radio_no_caption("jawab_13a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_13a);
				$data["input"]["jawab_14a"] = $this->formlib->_generate_input_radio_no_caption("jawab_14a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_14a);
				$data["input"]["jawab_15a"] = $this->formlib->_generate_input_radio_no_caption("jawab_15a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_15a);
				$data["input"]["jawab_16a"] = $this->formlib->_generate_input_radio_no_caption("jawab_16a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_16a);
				$data["input"]["jawab_17a"] = $this->formlib->_generate_input_radio_no_caption("jawab_17a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_17a);

				$data["input"]["jawab_1b"] = $this->formlib->_generate_input_textarea("jawab_1b", "", $jawab_1b, TRUE, TRUE);
				$data["input"]["jawab_2b"] = $this->formlib->_generate_input_textarea("jawab_2b", "", $jawab_2b, TRUE, TRUE);
				$data["input"]["jawab_3b"] = $this->formlib->_generate_input_textarea("jawab_3b", "", $jawab_3b, TRUE, TRUE);
				$data["input"]["jawab_4b"] = $this->formlib->_generate_input_textarea("jawab_4b", "", $jawab_4b, TRUE, TRUE);
				$data["input"]["jawab_5b"] = $this->formlib->_generate_input_textarea("jawab_5b", "", $jawab_5b, TRUE, TRUE);
				$data["input"]["jawab_6b"] = $this->formlib->_generate_input_textarea("jawab_6b", "", $jawab_6b, TRUE, TRUE);
				$data["input"]["jawab_7b"] = $this->formlib->_generate_input_textarea("jawab_7b", "", $jawab_7b, TRUE, TRUE);
				$data["input"]["jawab_8b"] = $this->formlib->_generate_input_textarea("jawab_8b", "", $jawab_8b, TRUE, TRUE);
				$data["input"]["jawab_9b"] = $this->formlib->_generate_input_textarea("jawab_9b", "", $jawab_9b, TRUE, TRUE);
				$data["input"]["jawab_10b"] = $this->formlib->_generate_input_textarea("jawab_10b", "", $jawab_10b, TRUE, TRUE);
				$data["input"]["jawab_11b"] = $this->formlib->_generate_input_textarea("jawab_11b", "", $jawab_11b, TRUE, TRUE);
				$data["input"]["jawab_12b"] = $this->formlib->_generate_input_textarea("jawab_12b", "", $jawab_12b, TRUE, TRUE);
				$data["input"]["jawab_13b"] = $this->formlib->_generate_input_textarea("jawab_13b", "", $jawab_13b, TRUE, TRUE);
				$data["input"]["jawab_14b"] = $this->formlib->_generate_input_textarea("jawab_14b", "", $jawab_14b, TRUE, TRUE);
				$data["input"]["jawab_15b"] = $this->formlib->_generate_input_textarea("jawab_15b", "", $jawab_15b, TRUE, TRUE);
				$data["input"]["jawab_16b"] = $this->formlib->_generate_input_textarea("jawab_16b", "", $jawab_16b, TRUE, TRUE);
				$data["input"]["jawab_17b"] = $this->formlib->_generate_input_textarea("jawab_17b", "", $jawab_17b, TRUE, TRUE);
				$data["input"]["jawab_18"] = $this->formlib->_generate_input_textarea("jawab_18", "", $jawab_18, TRUE, TRUE);
				$data["input"]["jawab_19"] = $this->formlib->_generate_input_radio_no_caption("jawab_19", array("Berisiko Tinggi", "Berisiko Sedang", "Berisiko Rendah"), $jawab_19);
				$data["input"]["jawab_20"] = $this->formlib->_generate_input_radio_no_caption("jawab_20", array("Menerima", "Menolak"), $jawab_20);




				$data["_template"]	= $this->template->generate_template("user", $data);
				$this->load->view("pekerjaan/lembar_kendali_1_edit", $data);
			}
			else if ($lembar_kendali->id_status == 3)
			{
				$data["title"] 	= "Ubah Lembar Kendali Klien 2";
				$objek_edit		= $this->global_model->get_data("txn_lembar_kendali_2", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();

				$step = $lembar_kendali->step;
				$id_status = $lembar_kendali->id_status;

				$ruang_lingkup 			= $objek_edit->ruang_lingkup;
				$bidang_penugasan 		= $objek_edit->bidang_penugasan;
				$jumlah_orang 			= $objek_edit->jumlah_orang;
				$jangka_waktu 			= $objek_edit->jangka_waktu;
				$termin_pembayaran_1 	= $objek_edit->termin_pembayaran_1;
				$termin_pembayaran_2 	= $objek_edit->termin_pembayaran_2;
				$termin_pembayaran_3 	= $objek_edit->termin_pembayaran_3;
				$termin_pembayaran_4 	= $objek_edit->termin_pembayaran_4;
				$termin_pembayaran_5 	= $objek_edit->termin_pembayaran_5;
                                $termin_komentar_5 	= $objek_edit->termin_komentar_5;
                                $termin_komentar_4 	= $objek_edit->termin_komentar_4;
                                $termin_komentar_3 	= $objek_edit->termin_komentar_3;
                                $termin_komentar_2 	= $objek_edit->termin_komentar_2;
                                $termin_komentar_1 	= $objek_edit->termin_komentar_1;
				$project_manager 		= $objek_edit->project_manager;
				$resiko 				= $objek_edit->resiko;
				$resiko_keterangan		= $objek_edit->resiko_keterangan;
				$harga 					= $objek_edit->harga;

				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["step"]			= $this->formlib->_generate_input_text("step", "step", $step, FALSE, TRUE);
				$data["input"]["id_status"]		= $this->formlib->_generate_input_text("id_status", "id_status", $id_status, FALSE, TRUE);

				$data["input"]["ruang_lingkup"] 	= $this->formlib->_generate_input_radio_no_caption("ruang_lingkup", array("Diterima","Ditolak"), $ruang_lingkup);
				$data["input"]["bidang_penugasan"] 	= $this->formlib->_generate_input_radio_no_caption("bidang_penugasan", array("Sesuai","Tidak"), $bidang_penugasan);
				$data["input"]["jumlah_orang"] 		= $this->formlib->_generate_input_text("jumlah_orang", "", $jumlah_orang, TRUE, TRUE);
				$data["input"]["jangka_waktu"] 		= $this->formlib->_generate_input_text("jangka_waktu", "", $jangka_waktu, TRUE, TRUE);
				$data["input"]["termin_pembayaran_1"] = $this->formlib->_generate_input_text("termin_pembayaran_1", "", $termin_pembayaran_1, TRUE, TRUE);
				$data["input"]["termin_pembayaran_2"] = $this->formlib->_generate_input_text("termin_pembayaran_2", "", $termin_pembayaran_2, TRUE, TRUE);
				$data["input"]["termin_pembayaran_3"] = $this->formlib->_generate_input_text("termin_pembayaran_3", "", $termin_pembayaran_3, TRUE, TRUE);
				$data["input"]["termin_pembayaran_4"] = $this->formlib->_generate_input_text("termin_pembayaran_4", "", $termin_pembayaran_4, TRUE, TRUE);
				$data["input"]["termin_pembayaran_5"] = $this->formlib->_generate_input_text("termin_pembayaran_5", "", $termin_pembayaran_5, TRUE, TRUE);
                $data["input"]["termin_komentar_5"] = $this->formlib->_generate_input_text("termin_komentar_5", "", $termin_komentar_5, TRUE, TRUE);
                $data["input"]["termin_komentar_4"] = $this->formlib->_generate_input_text("termin_komentar_4", "", $termin_komentar_4, TRUE, TRUE);
                $data["input"]["termin_komentar_3"] = $this->formlib->_generate_input_text("termin_komentar_3", "", $termin_komentar_3, TRUE, TRUE);
                $data["input"]["termin_komentar_2"] = $this->formlib->_generate_input_text("termin_komentar_2", "", $termin_komentar_2, TRUE, TRUE);
                $data["input"]["termin_komentar_1"] = $this->formlib->_generate_input_text("termin_komentar_1", "", $termin_komentar_1, TRUE, TRUE);


				// $data["input"]["project_manager"] 	= $this->formlib->_generate_dropdown_master_condition("view_user", 1, array("id_group"), array(6), "project_manager", "id", "nama", $project_manager, TRUE);
				
                $data["input"]["project_manager"] 	= $this->formlib->_generate_dropdown_master_project_manager("project_manager", "id", "nama", $project_manager, TRUE);
                

				$data["input"]["resiko"] 	=  $this->formlib->_generate_input_radio_no_caption("resiko", array("Rendah", "Sedang", "Tinggi"), $resiko);

				$data["input"]["resiko_keterangan"] = $this->formlib->_generate_input_textarea("resiko_keterangan", "catatan tingkat resiko", $resiko_keterangan, TRUE, TRUE);
				$data["input"]["harga"] 		= $this->formlib->_generate_input_text("harga", "", $harga, TRUE, TRUE);


				$data["_template"]	= $this->template->generate_template("user", $data);
				$this->load->view("pekerjaan/lembar_kendali_2_edit", $data);
			}
			else if ($lembar_kendali->id_status == 12)
			{
				$data["title"] 	= "Ubah Lembar Kendali Klien 3";
				$objek_edit		= $this->global_model->get_data("txn_lembar_kendali_3", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();

				$step = $lembar_kendali->step;
				$id_status = $lembar_kendali->id_status;

				$jawab_1a = $objek_edit->jawab_1a;
				$jawab_1b = $objek_edit->jawab_1b;
				$jawab_2a = $objek_edit->jawab_2a;
				$jawab_2b = $objek_edit->jawab_2b;
				$jawab_3a = $objek_edit->jawab_3a;
				$jawab_3b = $objek_edit->jawab_3b;
				$jawab_4a = $objek_edit->jawab_4a;
				$jawab_4b = $objek_edit->jawab_4b;
				$jawab_5a = $objek_edit->jawab_5a;
				$jawab_5b = $objek_edit->jawab_5b;
				$jawab_6a = $objek_edit->jawab_6a;
				$jawab_6b = $objek_edit->jawab_6b;
				$jawab_7a = $objek_edit->jawab_7a;
				$jawab_7b = $objek_edit->jawab_7b;
				$jawab_8a = $objek_edit->jawab_8a;
				$jawab_8b = $objek_edit->jawab_8b;
				$jawab_9a = $objek_edit->jawab_9a;
				$jawab_9b = $objek_edit->jawab_9b;
				$jawab_10a = $objek_edit->jawab_10a;
				$jawab_10b = $objek_edit->jawab_10b;
				$jawab_11a = $objek_edit->jawab_11a;
				$jawab_11b = $objek_edit->jawab_11b;

				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["step"]			= $this->formlib->_generate_input_text("step", "step", $step, FALSE, TRUE);
				$data["input"]["id_status"]			= $this->formlib->_generate_input_text("id_status", "id_status", $id_status, FALSE, TRUE);

				$data["input"]["jawab_1a"] = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_1a);
				$data["input"]["jawab_2a"] = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_2a);
				$data["input"]["jawab_3a"] = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_3a);
				$data["input"]["jawab_4a"] = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_4a);
				$data["input"]["jawab_5a"] = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_5a);
				$data["input"]["jawab_6a"] = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_6a);
				$data["input"]["jawab_7a"] = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_7a);
				$data["input"]["jawab_8a"] = $this->formlib->_generate_input_radio_no_caption("jawab_8a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_8a);
				$data["input"]["jawab_9a"] = $this->formlib->_generate_input_radio_no_caption("jawab_9a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_9a);
				$data["input"]["jawab_10a"] = $this->formlib->_generate_input_radio_no_caption("jawab_10a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_10a);
				$data["input"]["jawab_11a"] = $this->formlib->_generate_input_radio_no_caption("jawab_11a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_11a);

				$data["input"]["jawab_1b"] = $this->formlib->_generate_input_textarea("jawab_1b", "", $jawab_1b, TRUE, TRUE);
				$data["input"]["jawab_2b"] = $this->formlib->_generate_input_textarea("jawab_2b", "", $jawab_2b, TRUE, TRUE);
				$data["input"]["jawab_3b"] = $this->formlib->_generate_input_textarea("jawab_3b", "", $jawab_3b, TRUE, TRUE);
				$data["input"]["jawab_4b"] = $this->formlib->_generate_input_textarea("jawab_4b", "", $jawab_4b, TRUE, TRUE);
				$data["input"]["jawab_5b"] = $this->formlib->_generate_input_textarea("jawab_5b", "", $jawab_5b, TRUE, TRUE);
				$data["input"]["jawab_6b"] = $this->formlib->_generate_input_textarea("jawab_6b", "", $jawab_6b, TRUE, TRUE);
				$data["input"]["jawab_7b"] = $this->formlib->_generate_input_textarea("jawab_7b", "", $jawab_7b, TRUE, TRUE);
				$data["input"]["jawab_8b"] = $this->formlib->_generate_input_textarea("jawab_8b", "", $jawab_8b, TRUE, TRUE);
				$data["input"]["jawab_9b"] = $this->formlib->_generate_input_textarea("jawab_9b", "", $jawab_9b, TRUE, TRUE);
				$data["input"]["jawab_10b"] = $this->formlib->_generate_input_textarea("jawab_10b", "", $jawab_10b, TRUE, TRUE);
				$data["input"]["jawab_11b"] = $this->formlib->_generate_input_textarea("jawab_11b", "", $jawab_11b, TRUE, TRUE);

				$data["_template"]	= $this->template->generate_template("user", $data);
				$this->load->view("pekerjaan/lembar_kendali_3_edit", $data);
			}
			// else if ($lembar_kendali->id_status == 18 || $pekerjaan->id_status == 24 || $pekerjaan->id_status == 34)
			else if ( $lembar_kendali->id_status == 18 || $lembar_kendali->id_status == 19)
			{
				$data["title"] 	= "Ubah Lembar Kendali Klien 4";
				$objek_edit		= $this->global_model->get_data("txn_lembar_kendali_4", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();

				$step = $lembar_kendali->step;
				$id_status = $lembar_kendali->id_status;

				$jawab_1a = $objek_edit->jawab_1a;
				$jawab_1b = $objek_edit->jawab_1b;
				$jawab_2a = $objek_edit->jawab_2a;
				$jawab_2b = $objek_edit->jawab_2b;
				$jawab_3a = $objek_edit->jawab_3a;
				$jawab_3b = $objek_edit->jawab_3b;
				$jawab_4a = $objek_edit->jawab_4a;
				$jawab_4b = $objek_edit->jawab_4b;
				$jawab_5a = $objek_edit->jawab_5a;
				$jawab_5b = $objek_edit->jawab_5b;
				$jawab_6a = $objek_edit->jawab_6a;
				$jawab_6b = $objek_edit->jawab_6b;
				$jawab_7a = $objek_edit->jawab_7a;
				$jawab_7b = $objek_edit->jawab_7b;
				$jawab_8a = $objek_edit->jawab_8a;
				$jawab_8b = $objek_edit->jawab_8b;
				$jawab_9a = $objek_edit->jawab_9a;
				$jawab_9b = $objek_edit->jawab_9b;

				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["step"]			= $this->formlib->_generate_input_text("step", "step", $step, FALSE, TRUE);
				$data["input"]["id_status"]			= $this->formlib->_generate_input_text("id_status", "id_status", $id_status, FALSE, TRUE);

				$data["input"]["jawab_1a"] = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_1a);
				$data["input"]["jawab_2a"] = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_2a);
				$data["input"]["jawab_3a"] = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_3a);
				$data["input"]["jawab_4a"] = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_4a);
				$data["input"]["jawab_5a"] = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_5a);
				$data["input"]["jawab_6a"] = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_6a);
				$data["input"]["jawab_7a"] = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_7a);
				$data["input"]["jawab_8a"] = $this->formlib->_generate_input_radio_no_caption("jawab_8a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_8a);
				$data["input"]["jawab_9a"] = $this->formlib->_generate_input_radio_no_caption("jawab_9a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_9a);

				$data["input"]["jawab_1b"] = $this->formlib->_generate_input_textarea("jawab_1b", "", $jawab_1b, TRUE, TRUE);
				$data["input"]["jawab_2b"] = $this->formlib->_generate_input_textarea("jawab_2b", "", $jawab_2b, TRUE, TRUE);
				$data["input"]["jawab_3b"] = $this->formlib->_generate_input_textarea("jawab_3b", "", $jawab_3b, TRUE, TRUE);
				$data["input"]["jawab_4b"] = $this->formlib->_generate_input_textarea("jawab_4b", "", $jawab_4b, TRUE, TRUE);
				$data["input"]["jawab_5b"] = $this->formlib->_generate_input_textarea("jawab_5b", "", $jawab_5b, TRUE, TRUE);
				$data["input"]["jawab_6b"] = $this->formlib->_generate_input_textarea("jawab_6b", "", $jawab_6b, TRUE, TRUE);
				$data["input"]["jawab_7b"] = $this->formlib->_generate_input_textarea("jawab_7b", "", $jawab_7b, TRUE, TRUE);
				$data["input"]["jawab_8b"] = $this->formlib->_generate_input_textarea("jawab_8b", "", $jawab_8b, TRUE, TRUE);
				$data["input"]["jawab_9b"] = $this->formlib->_generate_input_textarea("jawab_9b", "", $jawab_9b, TRUE, TRUE);

				$data["_template"]	= $this->template->generate_template("user", $data);
				$this->load->view("pekerjaan/lembar_kendali_4_edit", $data);
			}
			else if ($lembar_kendali->id_status == 28)
			{
				$data["title"] 	= "Ubah Lembar Kendali Klien 5";
				$objek_edit		= $this->global_model->get_data("txn_lembar_kendali_5", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();

				$step = $lembar_kendali->step;
				$id_status = $lembar_kendali->id_status;

				$jawab_1a = $objek_edit->jawab_1a;
				$jawab_1b = $objek_edit->jawab_1b;
				$jawab_2a = $objek_edit->jawab_2a;
				$jawab_2b = $objek_edit->jawab_2b;
				$jawab_3a = $objek_edit->jawab_3a;
				$jawab_3b = $objek_edit->jawab_3b;
				$jawab_4a = $objek_edit->jawab_4a;
				$jawab_4b = $objek_edit->jawab_4b;
				$jawab_5a = $objek_edit->jawab_5a;
				$jawab_5b = $objek_edit->jawab_5b;
				$jawab_6a = $objek_edit->jawab_6a;
				$jawab_6b = $objek_edit->jawab_6b;
				$jawab_7a = $objek_edit->jawab_7a;
				$jawab_7b = $objek_edit->jawab_7b;
				$jawab_8a = $objek_edit->jawab_8a;
				$jawab_8b = $objek_edit->jawab_8b;
				$jawab_9a = $objek_edit->jawab_9a;
				$jawab_9b = $objek_edit->jawab_9b;
				$jawab_10a = $objek_edit->jawab_10a;
				$jawab_10b = $objek_edit->jawab_10b;
				$jawab_11a = $objek_edit->jawab_11a;
				$jawab_11b = $objek_edit->jawab_11b;
				$jawab_12a = $objek_edit->jawab_12a;
				$jawab_12b = $objek_edit->jawab_12b;
				$jawab_13a = $objek_edit->jawab_13a;
				$jawab_13b = $objek_edit->jawab_13b;
				$jawab_14a = $objek_edit->jawab_14a;
				$jawab_14b = $objek_edit->jawab_14b;
				$jawab_15a = $objek_edit->jawab_15a;
				$jawab_15b = $objek_edit->jawab_15b;
				$jawab_16a = $objek_edit->jawab_16a;
				$jawab_16b = $objek_edit->jawab_16b;
				$jawab_17a = $objek_edit->jawab_17a;
				$jawab_17b = $objek_edit->jawab_17b;
				$jawab_18a = $objek_edit->jawab_18a;
				$jawab_18b = $objek_edit->jawab_18b;
				$jawab_19a = $objek_edit->jawab_19a;
				$jawab_19b = $objek_edit->jawab_19b;
				$jawab_20a = $objek_edit->jawab_20a;
				$jawab_20b = $objek_edit->jawab_20b;
				$jawab_21a = $objek_edit->jawab_21a;
				$jawab_21b = $objek_edit->jawab_21b;
				$jawab_22a = $objek_edit->jawab_22a;
				$jawab_22b = $objek_edit->jawab_22b;


				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["step"]			= $this->formlib->_generate_input_text("step", "step", $step, FALSE, TRUE);
				$data["input"]["id_status"]			= $this->formlib->_generate_input_text("id_status", "id_status", $id_status, FALSE, TRUE);

				$data["input"]["jawab_1a"] = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_1a);
				$data["input"]["jawab_2a"] = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_2a);
				$data["input"]["jawab_3a"] = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_3a);
				$data["input"]["jawab_4a"] = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_4a);
				$data["input"]["jawab_5a"] = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_5a);
				$data["input"]["jawab_6a"] = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_6a);
				$data["input"]["jawab_7a"] = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_7a);
				$data["input"]["jawab_8a"] = $this->formlib->_generate_input_radio_no_caption("jawab_8a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_8a);
				$data["input"]["jawab_9a"] = $this->formlib->_generate_input_radio_no_caption("jawab_9a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_9a);
				$data["input"]["jawab_10a"] = $this->formlib->_generate_input_radio_no_caption("jawab_10a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_10a);
				$data["input"]["jawab_11a"] = $this->formlib->_generate_input_radio_no_caption("jawab_11a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_11a);
				$data["input"]["jawab_12a"] = $this->formlib->_generate_input_radio_no_caption("jawab_12a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_12a);
				$data["input"]["jawab_13a"] = $this->formlib->_generate_input_radio_no_caption("jawab_13a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_13a);
				$data["input"]["jawab_14a"] = $this->formlib->_generate_input_radio_no_caption("jawab_14a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_14a);
				$data["input"]["jawab_15a"] = $this->formlib->_generate_input_radio_no_caption("jawab_15a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_15a);
				$data["input"]["jawab_16a"] = $this->formlib->_generate_input_radio_no_caption("jawab_16a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_16a);
				$data["input"]["jawab_17a"] = $this->formlib->_generate_input_radio_no_caption("jawab_17a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_17a);
				$data["input"]["jawab_18a"] = $this->formlib->_generate_input_radio_no_caption("jawab_18a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_18a);
				$data["input"]["jawab_19a"] = $this->formlib->_generate_input_radio_no_caption("jawab_19a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_19a);
				$data["input"]["jawab_20a"] = $this->formlib->_generate_input_radio_no_caption("jawab_20a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_20a);
				$data["input"]["jawab_21a"] = $this->formlib->_generate_input_radio_no_caption("jawab_21a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_21a);
				$data["input"]["jawab_22a"] = $this->formlib->_generate_input_radio_no_caption("jawab_22a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $jawab_22a);


				$data["input"]["jawab_1b"] = $this->formlib->_generate_input_textarea("jawab_1b", "", $jawab_1b, TRUE, TRUE);
				$data["input"]["jawab_2b"] = $this->formlib->_generate_input_textarea("jawab_2b", "", $jawab_2b, TRUE, TRUE);
				$data["input"]["jawab_3b"] = $this->formlib->_generate_input_textarea("jawab_3b", "", $jawab_3b, TRUE, TRUE);
				$data["input"]["jawab_4b"] = $this->formlib->_generate_input_textarea("jawab_4b", "", $jawab_4b, TRUE, TRUE);
				$data["input"]["jawab_5b"] = $this->formlib->_generate_input_textarea("jawab_5b", "", $jawab_5b, TRUE, TRUE);
				$data["input"]["jawab_6b"] = $this->formlib->_generate_input_textarea("jawab_6b", "", $jawab_6b, TRUE, TRUE);
				$data["input"]["jawab_7b"] = $this->formlib->_generate_input_textarea("jawab_7b", "", $jawab_7b, TRUE, TRUE);
				$data["input"]["jawab_8b"] = $this->formlib->_generate_input_textarea("jawab_8b", "", $jawab_8b, TRUE, TRUE);
				$data["input"]["jawab_9b"] = $this->formlib->_generate_input_textarea("jawab_9b", "", $jawab_9b, TRUE, TRUE);
				$data["input"]["jawab_10b"] = $this->formlib->_generate_input_textarea("jawab_10b", "", $jawab_10b, TRUE, TRUE);
				$data["input"]["jawab_11b"] = $this->formlib->_generate_input_textarea("jawab_11b", "", $jawab_11b, TRUE, TRUE);
				$data["input"]["jawab_12b"] = $this->formlib->_generate_input_textarea("jawab_12b", "", $jawab_12b, TRUE, TRUE);
				$data["input"]["jawab_13b"] = $this->formlib->_generate_input_textarea("jawab_13b", "", $jawab_13b, TRUE, TRUE);
				$data["input"]["jawab_14b"] = $this->formlib->_generate_input_textarea("jawab_14b", "", $jawab_14b, TRUE, TRUE);
				$data["input"]["jawab_15b"] = $this->formlib->_generate_input_textarea("jawab_15b", "", $jawab_15b, TRUE, TRUE);
				$data["input"]["jawab_16b"] = $this->formlib->_generate_input_textarea("jawab_16b", "", $jawab_16b, TRUE, TRUE);
				$data["input"]["jawab_17b"] = $this->formlib->_generate_input_textarea("jawab_17b", "", $jawab_17b, TRUE, TRUE);
				$data["input"]["jawab_18b"] = $this->formlib->_generate_input_textarea("jawab_18b", "", $jawab_18b, TRUE, TRUE);
				$data["input"]["jawab_19b"] = $this->formlib->_generate_input_textarea("jawab_19b", "", $jawab_19b, TRUE, TRUE);
				$data["input"]["jawab_20b"] = $this->formlib->_generate_input_textarea("jawab_20b", "", $jawab_20b, TRUE, TRUE);
				$data["input"]["jawab_21b"] = $this->formlib->_generate_input_textarea("jawab_21b", "", $jawab_21b, TRUE, TRUE);
				$data["input"]["jawab_22b"] = $this->formlib->_generate_input_textarea("jawab_22b", "", $jawab_22b, TRUE, TRUE);


				$data["_template"]	= $this->template->generate_template("user", $data);
				$this->load->view("pekerjaan/lembar_kendali_5_edit", $data);
			}
		}



	}

	function lembar_kendali3_edit($id_pekerjaan = "", $id = "")
	{
		$id 			= base64_decode($id);
		$id_pekerjaan 	= base64_decode($id_pekerjaan);

		if (empty($id))
		{
			$data["title"] 	= "Tambah Lembar Kendali Klien 3";

			$id				= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$id_pekerjaan	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);
			$step			= $this->formlib->_generate_input_text("step", "step", "", FALSE, TRUE);

			$jawab_1a = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_1b = $this->formlib->_generate_input_textarea("jawab_1b", "", "", TRUE, TRUE);
			$jawab_2a = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_2b = $this->formlib->_generate_input_textarea("jawab_2b", "", "", TRUE, TRUE);
			$jawab_3a = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_3b = $this->formlib->_generate_input_textarea("jawab_3b", "", "", TRUE, TRUE);
			$jawab_4a = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_4b = $this->formlib->_generate_input_textarea("jawab_4b", "", "", TRUE, TRUE);
			$jawab_5a = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_5b = $this->formlib->_generate_input_textarea("jawab_5b", "", "", TRUE, TRUE);
			$jawab_6a = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_6b = $this->formlib->_generate_input_textarea("jawab_6b", "", "", TRUE, TRUE);
			$jawab_7a = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_7b = $this->formlib->_generate_input_textarea("jawab_7b", "", "", TRUE, TRUE);

		}
		else
		{
			$data["title"] 	= "Ubah Lembar Kendali Klien 3";
			$objek_edit		= $this->global_model->get_data("mst_lembar_kendali", 1, array("id"), array($id))->row();

			$id				= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$id_pekerjaan	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);
			$step			= $this->formlib->_generate_input_text("step", "step", $objek_edit->step, FALSE, TRUE);

			$jawab_1a = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_1a);
			$jawab_1b = $this->formlib->_generate_input_textarea("jawab_1b", "", $objek_edit->jawab_1b, TRUE, TRUE);
			$jawab_2a = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_2a);
			$jawab_2b = $this->formlib->_generate_input_textarea("jawab_2b", "", $objek_edit->jawab_2b, TRUE, TRUE);
			$jawab_3a = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_3a);
			$jawab_3b = $this->formlib->_generate_input_textarea("jawab_3b", "", $objek_edit->jawab_3b, TRUE, TRUE);
			$jawab_4a = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_4a);
			$jawab_4b = $this->formlib->_generate_input_textarea("jawab_4b", "", $objek_edit->jawab_4b, TRUE, TRUE);
			$jawab_5a = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_5a);
			$jawab_5b = $this->formlib->_generate_input_textarea("jawab_5b", "", $objek_edit->jawab_5b, TRUE, TRUE);
			$jawab_6a = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_6a);
			$jawab_6b = $this->formlib->_generate_input_textarea("jawab_6b", "", $objek_edit->jawab_6b, TRUE, TRUE);
			$jawab_7a = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_7a);
			$jawab_7b = $this->formlib->_generate_input_textarea("jawab_7b", "", $objek_edit->jawab_7b, TRUE, TRUE);
		}

		$data["input"]["id"]			= $id;
		$data["input"]["id_pekerjaan"]	= $id_pekerjaan;
		$data["input"]["step"]			= $step;
		$data["input"]["jawab_1a"] 		= $jawab_1a;
		$data["input"]["jawab_1b"] 		= $jawab_1b;
		$data["input"]["jawab_2a"] 		= $jawab_2a;
		$data["input"]["jawab_2b"] 		= $jawab_2b;
		$data["input"]["jawab_3a"] 		= $jawab_3a;
		$data["input"]["jawab_3b"] 		= $jawab_3b;
		$data["input"]["jawab_4a"] 		= $jawab_4a;
		$data["input"]["jawab_4b"] 		= $jawab_4b;
		$data["input"]["jawab_5a"] 		= $jawab_5a;
		$data["input"]["jawab_5b"] 		= $jawab_5b;
		$data["input"]["jawab_6a"] 		= $jawab_6a;
		$data["input"]["jawab_6b"] 		= $jawab_6b;
		$data["input"]["jawab_7a"] 		= $jawab_7a;
		$data["input"]["jawab_7b"] 		= $jawab_7b;


		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/lembar_kendali3_edit", $data);
	}

	function lembar_kendali4_edit($id_pekerjaan = "", $id = "")
	{
		$id 			= base64_decode($id);
		$id_pekerjaan 	= base64_decode($id_pekerjaan);

		if (empty($id))
		{
			$data["title"] 	= "Tambah Lembar Kendali Klien 4";

			$id				= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$id_pekerjaan	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);
			$step			= $this->formlib->_generate_input_text("step", "step", "", FALSE, TRUE);

			$jawab_1a = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_1b = $this->formlib->_generate_input_textarea("jawab_1b", "", "", TRUE, TRUE);
			$jawab_2a = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_2b = $this->formlib->_generate_input_textarea("jawab_2b", "", "", TRUE, TRUE);
			$jawab_3a = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_3b = $this->formlib->_generate_input_textarea("jawab_3b", "", "", TRUE, TRUE);
			$jawab_4a = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_4b = $this->formlib->_generate_input_textarea("jawab_4b", "", "", TRUE, TRUE);
			$jawab_5a = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_5b = $this->formlib->_generate_input_textarea("jawab_5b", "", "", TRUE, TRUE);
			$jawab_6a = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_6b = $this->formlib->_generate_input_textarea("jawab_6b", "", "", TRUE, TRUE);
			$jawab_7a = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_7b = $this->formlib->_generate_input_textarea("jawab_7b", "", "", TRUE, TRUE);

		}
		else
		{
			$data["title"] 	= "Ubah Lembar Kendali Klien 4";
			$objek_edit		= $this->global_model->get_data("mst_lembar_kendali", 1, array("id"), array($id))->row();

			$id				= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$id_pekerjaan	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);
			$step			= $this->formlib->_generate_input_text("step", "step", $objek_edit->step, FALSE, TRUE);

			$jawab_1a = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_1a);
			$jawab_1b = $this->formlib->_generate_input_textarea("jawab_1b", "", $objek_edit->jawab_1b, TRUE, TRUE);
			$jawab_2a = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_2a);
			$jawab_2b = $this->formlib->_generate_input_textarea("jawab_2b", "", $objek_edit->jawab_2b, TRUE, TRUE);
			$jawab_3a = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_3a);
			$jawab_3b = $this->formlib->_generate_input_textarea("jawab_3b", "", $objek_edit->jawab_3b, TRUE, TRUE);
			$jawab_4a = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_4a);
			$jawab_4b = $this->formlib->_generate_input_textarea("jawab_4b", "", $objek_edit->jawab_4b, TRUE, TRUE);
			$jawab_5a = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_5a);
			$jawab_5b = $this->formlib->_generate_input_textarea("jawab_5b", "", $objek_edit->jawab_5b, TRUE, TRUE);
			$jawab_6a = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_6a);
			$jawab_6b = $this->formlib->_generate_input_textarea("jawab_6b", "", $objek_edit->jawab_6b, TRUE, TRUE);
			$jawab_7a = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_7a);
			$jawab_7b = $this->formlib->_generate_input_textarea("jawab_7b", "", $objek_edit->jawab_7b, TRUE, TRUE);
		}

		$data["input"]["id"]			= $id;
		$data["input"]["id_pekerjaan"]	= $id_pekerjaan;
		$data["input"]["step"]			= $step;
		$data["input"]["jawab_1a"] 		= $jawab_1a;
		$data["input"]["jawab_1b"] 		= $jawab_1b;
		$data["input"]["jawab_2a"] 		= $jawab_2a;
		$data["input"]["jawab_2b"] 		= $jawab_2b;
		$data["input"]["jawab_3a"] 		= $jawab_3a;
		$data["input"]["jawab_3b"] 		= $jawab_3b;
		$data["input"]["jawab_4a"] 		= $jawab_4a;
		$data["input"]["jawab_4b"] 		= $jawab_4b;
		$data["input"]["jawab_5a"] 		= $jawab_5a;
		$data["input"]["jawab_5b"] 		= $jawab_5b;
		$data["input"]["jawab_6a"] 		= $jawab_6a;
		$data["input"]["jawab_6b"] 		= $jawab_6b;
		$data["input"]["jawab_7a"] 		= $jawab_7a;
		$data["input"]["jawab_7b"] 		= $jawab_7b;


		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/lembar_kendali4_edit", $data);
	}

	function lembar_kendali5_edit($id_pekerjaan = "", $id = "")
	{
		$id 			= base64_decode($id);
		$id_pekerjaan 	= base64_decode($id_pekerjaan);

		if (empty($id))
		{
			$data["title"] 	= "Tambah Lembar Kendali Klien 5";

			$id				= $this->formlib->_generate_input_text("id", "id", "", FALSE, TRUE);
			$id_pekerjaan	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);
			$step			= $this->formlib->_generate_input_text("step", "step", "", FALSE, TRUE);

			$jawab_1a = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_1b = $this->formlib->_generate_input_textarea("jawab_1b", "", "", TRUE, TRUE);
			$jawab_2a = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_2b = $this->formlib->_generate_input_textarea("jawab_2b", "", "", TRUE, TRUE);
			$jawab_3a = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_3b = $this->formlib->_generate_input_textarea("jawab_3b", "", "", TRUE, TRUE);
			$jawab_4a = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_4b = $this->formlib->_generate_input_textarea("jawab_4b", "", "", TRUE, TRUE);
			$jawab_5a = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_5b = $this->formlib->_generate_input_textarea("jawab_5b", "", "", TRUE, TRUE);
			$jawab_6a = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_6b = $this->formlib->_generate_input_textarea("jawab_6b", "", "", TRUE, TRUE);
			$jawab_7a = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), "");
			$jawab_7b = $this->formlib->_generate_input_textarea("jawab_7b", "", "", TRUE, TRUE);

		}
		else
		{
			$data["title"] 	= "Ubah Lembar Kendali Klien 5";
			$objek_edit		= $this->global_model->get_data("mst_lembar_kendali", 1, array("id"), array($id))->row();

			$id				= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
			$id_pekerjaan	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);
			$step			= $this->formlib->_generate_input_text("step", "step", $objek_edit->step, FALSE, TRUE);

			$jawab_1a = $this->formlib->_generate_input_radio_no_caption("jawab_1a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_1a);
			$jawab_1b = $this->formlib->_generate_input_textarea("jawab_1b", "", $objek_edit->jawab_1b, TRUE, TRUE);
			$jawab_2a = $this->formlib->_generate_input_radio_no_caption("jawab_2a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_2a);
			$jawab_2b = $this->formlib->_generate_input_textarea("jawab_2b", "", $objek_edit->jawab_2b, TRUE, TRUE);
			$jawab_3a = $this->formlib->_generate_input_radio_no_caption("jawab_3a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_3a);
			$jawab_3b = $this->formlib->_generate_input_textarea("jawab_3b", "", $objek_edit->jawab_3b, TRUE, TRUE);
			$jawab_4a = $this->formlib->_generate_input_radio_no_caption("jawab_4a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_4a);
			$jawab_4b = $this->formlib->_generate_input_textarea("jawab_4b", "", $objek_edit->jawab_4b, TRUE, TRUE);
			$jawab_5a = $this->formlib->_generate_input_radio_no_caption("jawab_5a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_5a);
			$jawab_5b = $this->formlib->_generate_input_textarea("jawab_5b", "", $objek_edit->jawab_5b, TRUE, TRUE);
			$jawab_6a = $this->formlib->_generate_input_radio_no_caption("jawab_6a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_6a);
			$jawab_6b = $this->formlib->_generate_input_textarea("jawab_6b", "", $objek_edit->jawab_6b, TRUE, TRUE);
			$jawab_7a = $this->formlib->_generate_input_radio_no_caption("jawab_7a", array("Ya", "Tidak", "Tidak dapat diterapkan"), $objek_edit->jawab_7a);
			$jawab_7b = $this->formlib->_generate_input_textarea("jawab_7b", "", $objek_edit->jawab_7b, TRUE, TRUE);
		}

		$data["input"]["id"]			= $id;
		$data["input"]["id_pekerjaan"]	= $id_pekerjaan;
		$data["input"]["step"]			= $step;
		$data["input"]["jawab_1a"] 		= $jawab_1a;
		$data["input"]["jawab_1b"] 		= $jawab_1b;
		$data["input"]["jawab_2a"] 		= $jawab_2a;
		$data["input"]["jawab_2b"] 		= $jawab_2b;
		$data["input"]["jawab_3a"] 		= $jawab_3a;
		$data["input"]["jawab_3b"] 		= $jawab_3b;
		$data["input"]["jawab_4a"] 		= $jawab_4a;
		$data["input"]["jawab_4b"] 		= $jawab_4b;
		$data["input"]["jawab_5a"] 		= $jawab_5a;
		$data["input"]["jawab_5b"] 		= $jawab_5b;
		$data["input"]["jawab_6a"] 		= $jawab_6a;
		$data["input"]["jawab_6b"] 		= $jawab_6b;
		$data["input"]["jawab_7a"] 		= $jawab_7a;
		$data["input"]["jawab_7b"] 		= $jawab_7b;


		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/lembar_kendali5_edit", $data);
	}

	function evaluasi_edit($id_pekerjaan = "", $id = "")
	{
		$id 			= base64_decode($id);
		$id_pekerjaan 	= base64_decode($id_pekerjaan);
		$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();


		if ($pekerjaan->id_status >= 4 && $pekerjaan->id_status < 9) // Evaluasi 1 => Pimpinan KJPP
		{
			$data["title"] 	= "Evaluasi 1 Pimpinan KJPP";

			if (empty($id))
			{
				$id_txn					= "";

				$ruang_lingkup = "";
				$bidang_penugasan = "";
				$jumlah_orang = "";
				$jangka_waktu = "";
				$termin_pembayaran = "";
				$project_manager = "";
				$resiko = "";
				$harga = "";
			}
			else
			{
				$mst_evaluasi	= $this->global_model->get_data("mst_evaluasi", 1, array("id"), array($id))->row();
				$objek_edit		= $this->global_model->get_data("txn_evaluasi_1", 1, array("id_evaluasi"), array($id))->row();

				$id_txn					= $objek_edit->id;

				$ruang_lingkup 		= $objek_edit->ruang_lingkup;
				$bidang_penugasan 	= $objek_edit->bidang_penugasan;
				$jumlah_orang 		= $objek_edit->jumlah_orang;
				$jangka_waktu 		= $objek_edit->jangka_waktu;
				$termin_pembayaran 	= $objek_edit->termin_pembayaran;
				$project_manager 	= $objek_edit->project_manager;
				$resiko 			= $objek_edit->resiko;
				$harga 				= $objek_edit->harga;

			}

			/*Generate Form*/
			{
				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_txn"]		= $this->formlib->_generate_input_text("id_txn", "id_txn", base64_encode($id_txn), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["ruang_lingkup"] 	= $this->formlib->_generate_dropdown_list("ruang_lingkup", 2, array("Diterima","Ditolak"), array("Diterima","Ditolak"), $ruang_lingkup);
				$data["input"]["bidang_penugasan"] 	= $this->formlib->_generate_dropdown_list("bidang_penugasan", 2, array("Sesuai","Tidak"), array("Sesuai","Tidak"), $bidang_penugasan);
				$data["input"]["jumlah_orang"] 		= $this->formlib->_generate_input_text("jumlah_orang", "", $jumlah_orang, TRUE, TRUE);
				$data["input"]["jangka_waktu"] 		= $this->formlib->_generate_input_text("jangka_waktu", "", $jangka_waktu, TRUE, TRUE);
				$data["input"]["termin_pembayaran"] = $this->formlib->_generate_dropdown_list("termin_pembayaran", 5, array(1,2,3,4,5), array(1,2,3,4,5), $termin_pembayaran);
				$data["input"]["project_manager"] 	= $this->formlib->_generate_dropdown_master_condition("view_user", 1, array("id_group"), array(6), "project_manager", "id", "nama", $project_manager, TRUE);
				$data["input"]["resiko"] 	= $this->formlib->_generate_dropdown_list("resiko", 3, array("Rendah","Sedang","Tinggi"), array("Rendah","Sedang","Tinggi"), $resiko);
				$data["input"]["harga"] 		= $this->formlib->_generate_input_text("harga", "", $harga, TRUE, TRUE);
			}



			$data["_template"]	= $this->template->generate_template("user", $data);
			$this->load->view("pekerjaan/evaluasi_1_edit", $data);
		}
		else if ($pekerjaan->id_status >= 9 && $pekerjaan->id_status < 12) // Evaluasi 2 => Pimpinan KJPP
		{
			$data["title"] 	= "Evaluasi 2 Pimpinan KJPP";

			if (empty($id))
			{
				$id_txn					= "";
				$catatan_lembar_kendali = "";
				$kriteria_keberhasilan 	= "";
				$termin_pembayaran 		= "";
				$project_manager 		= "";
				$kriteria_lain 			= "";
				$keterangan 			= "";

			}
			else
			{
				$mst_evaluasi	= $this->global_model->get_data("mst_evaluasi", 1, array("id"), array($id))->row();
				$objek_edit		= $this->global_model->get_data("txn_evaluasi_2", 1, array("id_evaluasi"), array($id))->row();

				$id_txn					= $objek_edit->id;
				$catatan_lembar_kendali = $objek_edit->catatan_lembar_kendali;
				$kriteria_keberhasilan 	= $objek_edit->kriteria_keberhasilan;
				$termin_pembayaran 		= $objek_edit->termin_pembayaran;
				$project_manager 		= $objek_edit->project_manager;
				$kriteria_lain 			= $objek_edit->kriteria_lain;
				$keterangan 			= $objek_edit->keterangan;
			}

			/*Generate Form*/
			{
				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_txn"]		= $this->formlib->_generate_input_text("id_txn", "id_txn", base64_encode($id_txn), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);
				$data["input"]["catatan_lembar_kendali"] = $this->formlib->_generate_input_textarea("catatan_lembar_kendali", "", $catatan_lembar_kendali, TRUE, TRUE);
				$data["input"]["kriteria_keberhasilan"]	 = $this->formlib->_generate_input_textarea("kriteria_keberhasilan", "", $kriteria_keberhasilan, TRUE, TRUE);
				$data["input"]["termin_pembayaran"] 	= $this->formlib->_generate_input_text("termin_pembayaran", "", $termin_pembayaran, TRUE, TRUE);
				$data["input"]["project_manager"] 		= $this->formlib->_generate_dropdown_master_condition("view_user", 1, array("id_group"), array(6), "project_manager", "id", "nama", $project_manager, TRUE);
				$data["input"]["kriteria_lain"] 		= $this->formlib->_generate_input_textarea("kriteria_lain", "", $kriteria_lain, TRUE, TRUE);
				$data["input"]["keterangan"] 			= $this->formlib->_generate_input_textarea("keterangan", "", $keterangan, TRUE, TRUE);
			}




			$data["_template"]	= $this->template->generate_template("user", $data);
			$this->load->view("pekerjaan/evaluasi_2_edit", $data);
		}
		else if ($pekerjaan->id_status >= 12 && $pekerjaan->id_status < 22) // Evaluasi 2 => Pimpinan KJPP
		{
			$data["title"] 	= "Evaluasi 3 Project Manager";

			if (empty($id))
			{
				$id_txn			= "";
				$catatan_teknis = "";
				$catatan_sdm	= "";
				$keterangan 	= "";

			}
			else
			{
				$mst_evaluasi	= $this->global_model->get_data("mst_evaluasi", 1, array("id"), array($id))->row();
				$objek_edit		= $this->global_model->get_data("txn_evaluasi_3", 1, array("id_evaluasi"), array($id))->row();

				$id_txn			= $objek_edit->id;
				$catatan_teknis = $objek_edit->catatan_teknis;
				$catatan_sdm	= $objek_edit->catatan_sdm;
				$keterangan 	= $objek_edit->keterangan;
			}

			/*Generate Form*/
			{
				$data["input"]["id"]			= $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);
				$data["input"]["id_txn"]		= $this->formlib->_generate_input_text("id_txn", "id_txn", base64_encode($id_txn), FALSE, TRUE);
				$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

				$data["input"]["catatan_teknis"]	= $this->formlib->_generate_input_textarea("catatan_teknis", "", $catatan_teknis, TRUE, TRUE);
				$data["input"]["catatan_sdm"] 		= $this->formlib->_generate_input_textarea("catatan_sdm", "", $catatan_sdm, TRUE, TRUE);
				$data["input"]["keterangan"] 		= $this->formlib->_generate_input_textarea("keterangan", "", $keterangan, TRUE, TRUE);
			}




			$data["_template"]	= $this->template->generate_template("user", $data);
			$this->load->view("pekerjaan/evaluasi_3_edit", $data);
		}
	}

	function dokumen_edit($id_pekerjaan = "", $id_dokumen_master = "", $id_dokumen_gabung = "")
	{
		$id_dokumen_master 	= base64_decode($id_dokumen_master);
		$id_pekerjaan 		= base64_decode($id_pekerjaan);

		// Dokumen Penawaran
		if ($id_dokumen_master == 1)
		{
			$pekerjaan = $this->db->select("A.*, B.*")->from("mst_pekerjaan A")->join("mst_tujuan B", "A.maksud_tujuan=B.id_tujuan", "left")->where("A.id", $id_pekerjaan)->get()->row();
			$dokumen	= $this->global_model->get_data("mst_dokumen_penawaran", 1, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, $id_dokumen_master));
			$harga	= $this->global_model->get_by_query("SELECT harga from txn_lembar_kendali_2  where id_lembar_kendali = (select id from view_lembar_kendali where id_status='3' and id_pekerjaan ='".$id_pekerjaan."' order by id  desc limit 1)");

			$data["title"] 	= "Tambah Dokumen Penawaran";

			$dokumen_final = "";
			if ($dokumen->num_rows() == 0)
			{
				$data["title"] 	= "Tambah Dokumen Penawaran";

				$document_penawaran	= $this->global_model->get_by_query("SELECT * FROM mst_dokumen_penawaran WHERE id_dokumen_master = 1 ORDER BY created DESC LIMIT 1");

				if ($document_penawaran->num_rows() == 1)
				{
					$last_number	= $document_penawaran->row()->no_penawaran;
					$last_number	= explode("/", $last_number);
					$last_number	= $last_number[0];
					$last_number	= $last_number + 1;
					$last_number	= sprintf("%04d", $last_number);
					$running_number	= $last_number."/SPK/KJPP-ASUS/".$this->spmlib->romanic_number(date("m"))."/".date("y");

				}
				else
				{
					$running_number	= "0001/SPK/KJPP-ASUS/".$this->spmlib->romanic_number(date("m"))."/".date("y");
				}

				$id 		= "";
				$no_penawaran = $running_number;
				$tanggal 		= date("Y-m-d");
				$kota = "";
				$up = "";
				$domisili = "";
				$kontak = "";
				$komunikasi_via = "";
				$komunikasi_via_keterangan = "";
				$tanggal_komunikasi = date("Y-m-d");

				$tujuan_penilaian = $pekerjaan->tujuan;
				$biaya = $harga->row()->harga;
				$penanda_tangan = "";
			}
			else
			{
				$data["title"] 	= "Ubah Dokumen Penawaran";

				$id = $dokumen->row()->id;
				$no_penawaran = $dokumen->row()->no_penawaran;
				$tanggal = $dokumen->row()->tanggal;
				$kota = $dokumen->row()->kota;
				$up = $dokumen->row()->up;
				$domisili = $dokumen->row()->domisili;
				$kontak = $dokumen->row()->kontak;
				$komunikasi_via = $dokumen->row()->komunikasi_via;
				$komunikasi_via_keterangan = $dokumen->row()->komunikasi_via_keterangan;
				$tanggal_komunikasi = $dokumen->row()->tanggal_komunikasi;
				$tujuan_penilaian = $dokumen->row()->tujuan_penilaian;
				$biaya = $dokumen->row()->biaya;
				$penanda_tangan = $dokumen->row()->penanda_tangan;
				$dokumen_final = $dokumen->row()->dokumen_final;

			}

			$data["dokumen_final"] = $dokumen_final;
			$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);
			$data["input"]["id_dokumen_master"] = $this->formlib->_generate_input_text("id_dokumen_master", "id_dokumen_master", base64_encode($id_dokumen_master), FALSE, TRUE);
			$data["input"]["id"] = $this->formlib->_generate_input_text("id", "id", base64_encode($id), FALSE, TRUE);

			$data["input"]["no_penawaran"] = $this->formlib->_generate_input_text("no_penawaran", "nomor surat penawaran harga otomatis dari system (mis. 3134/SPK/ZDR-APP/V/16)", $no_penawaran, TRUE, TRUE);
			//$data["input"]["tanggal"] = $this->formlib->_generate_input_text("tanggal", "tanggal", $tanggal, TRUE, TRUE);
			$data["input"]["tanggal"]	= $this->formlib->_generate_input_date("tanggal", "Tanggal Terbit Surat Penawaran", $tanggal, true, true);
			$data["input"]["kota"] = $this->formlib->_generate_input_text("kota", "nama kota tempat dibuatnya surat penawaran", $kota, TRUE, TRUE);
			$data["input"]["up"] = $this->formlib->_generate_input_text("up", "UP (Untuk Perhatian) mis. Bpk. Djindra Kusuma", $up, TRUE, TRUE);
			$data["input"]["domisili"] = $this->formlib->_generate_input_text("domisili", "domisili dari pemberi kerja, mis. Surabaya", $domisili, TRUE, TRUE);
			$data["input"]["kontak"] = $this->formlib->_generate_input_text("kontak", "nama kontak dari pemberi kerja, mis. Bpk. Lingga", $kontak, TRUE, TRUE);
			$data["input"]["komunikasi_via"] = $this->formlib->_generate_dropdown_list("komunikasi_via",3 ,array("Telephone","Email", "Surat"),array("Telephone","Email", "Surat"), $komunikasi_via);
			$data["input"]["komunikasi_via_keterangan"] = $this->formlib->_generate_input_text("komunikasi_via_keterangan", "Nomor Surat", $komunikasi_via_keterangan, TRUE, TRUE);
			//$data["input"]["tanggal_komunikasi"] = $this->formlib->_generate_input_text("tanggal_komunikasi", "tanggal dilakukan komunikasi", $tanggal_komunikasi, TRUE, TRUE);
			$data["input"]["tanggal_komunikasi"]	= $this->formlib->_generate_input_date("tanggal_komunikasi", "tanggal dilakukan komunikasi", $tanggal_komunikasi, true, true);
			//$data["input"]["tujuan_penilaian"] = $this->formlib->_generate_input_text("tujuan_penilaian", "tujuan dari penilaian", $tujuan_penilaian, TRUE, TRUE);
			$data["input"]["tujuan_penilaian"] = $this->formlib->_generate_dropdown_master("mst_tujuan", "tujuan_penilaian", "tujuan", "tujuan", $tujuan_penilaian, FALSE);
			// $data["input"]["tujuan_penilaian"]= $this->formlib->_generate_dropdown_list("tujuan_penilaian", 6, array("Jaminan / Aggunan Kredit","Penjaminan Utang","Asuransi","Jual Beli","Jual Beli Dalam Waktu Terbatas","Agunan Yang Diambil Alih Pada Perbankan"), array("Jaminan / Aggunan Kredit","Penjaminan Utang","Asuransi","Jual Beli","Jual Beli Dalam Waktu Terbatas","Agunan Yang Diambil Alih Pada Perbankan"), $tujuan_penilaian);

			$data["input"]["biaya"] = $this->formlib->_generate_input_text("biaya", "besarnya biaya penilaian, otomatis dari system ", $biaya, TRUE, TRUE);
			$data["input"]["penanda_tangan"] = $this->formlib->_generate_dropdown_master_condition("mst_user",1,array("id_group"),array("5"),"penanda_tangan", "id", "nama", $penanda_tangan, FALSE);


			$data["_template"]	= $this->template->generate_template("user", $data);
			$this->load->view("pekerjaan/dokumen_penawaran_edit", $data);
		}
		else if ($id_dokumen_master == 2)
		{
			$data["title"] 	= "Tambah Dokumen TOR";

			$data["_template"]	= $this->template->generate_template("user", $data);
			$this->load->view("pekerjaan/dokumen_tor_edit", $data);
		}
		else if ($id_dokumen_master == 3)
		{
			$data["title"] 	= "Tambah Dokumen Draf Kontrak";

			$data["_template"]	= $this->template->generate_template("user", $data);
			$this->load->view("pekerjaan/dokumen_kontrak_edit", $data);
		}
		else if ($id_dokumen_master == 7)
		{
			$mst_dokumen	= $this->global_model->get_data("mst_dokumen_master", 1, array("id"), array($id_dokumen_master))->row();
			$dokumen		= $this->global_model->get_data("mst_dokumen_kwitansi", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, $id_dokumen_master));

			$data["id_dokumen_master"]	= $id_dokumen_master;

			$dokumen_final = "";
			if ($dokumen->num_rows() == 0)
			{
				$data["title"] 	= "Tambah ".$mst_dokumen->nama;

				$id = "";
				$berupa = "";
				$bank = "";
				$no = "";
				$sebesar = "";
				$terbilang = "";
				$keterangan = "";
				$tanggal = date("Y-m-d");
				$dikirim = "";
				$diterima = "";

			}
			else
			{
				$data["title"] 	= "Ubah ".$mst_dokumen->nama;

				$id = $dokumen->row()->id;
				$berupa = $dokumen->row()->berupa;
				$bank = $dokumen->row()->bank;
				$no = $dokumen->row()->no;
				$sebesar = $dokumen->row()->sebesar;
				$terbilang = $dokumen->row()->terbilang;
				$keterangan = $dokumen->row()->keterangan;
				$tanggal = date("Y-m-d", strtotime($dokumen->row()->tanggal));
				$dikirim = $dokumen->row()->dikirim;
				$diterima = $dokumen->row()->diterima;
				$dokumen_final = $dokumen->row()->dokumen_final;
			}

			$data["dokumen_final"] = $dokumen_final;

			$user_login	= $this->auth->get_data_login();
			$id_user	= $user_login["id"];

			$data["input"]["type"] 				= $this->formlib->_generate_input_text("type", "type", "dokumen_kwitansi", FALSE, TRUE);
			$data["input"]["id_pekerjaan"]		= $this->formlib->_generate_input_text("input[id_pekerjaan]", "id_pekerjaan", $id_pekerjaan, FALSE, TRUE);
			$data["input"]["id_dokumen_master"] = $this->formlib->_generate_input_text("input[id_dokumen_master]", "id_dokumen_master", $id_dokumen_master, FALSE, TRUE);
			$data["input"]["id_user"] 			= $this->formlib->_generate_input_text("input[id_user]", "id_user", $id_user, FALSE, TRUE);
			$data["input"]["id"] 				= $this->formlib->_generate_input_text("id", "id", $id, FALSE, TRUE);

			$data["input"]["berupa"] 			= $this->formlib->_generate_input_radio_caption("input[berupa]", array("Uang Tunai", "Cek / Giro Biylet"), $berupa);
			$data["input"]["bank"] 				= $this->formlib->_generate_dropdown_master("mst_debitur", "input[bank]", "nama", "nama", $bank, TRUE);
			$data["input"]["no"] 				= $this->formlib->_generate_input_text("input[no]", "Nomor", $no, TRUE, TRUE);
			$data["input"]["sebesar"] 			= $this->formlib->_generate_input_text("input[sebesar]", "Rp", $sebesar, TRUE, TRUE);
			$data["input"]["terbilang"] 		= $this->formlib->_generate_input_text("input[terbilang]", "Terbilang", $terbilang, TRUE, TRUE);
			$data["input"]["keterangan"] 		= $this->formlib->_generate_input_textarea("input[keterangan]", "Keterangan", $keterangan, TRUE, TRUE);



			$data["input"]["tanggal"]			= $this->formlib->_generate_input_date("input[tanggal]", "Tanggal", $tanggal, true, true);
			$data["input"]["dikirim"] 		= $this->formlib->_generate_input_text("input[dikirim]", "Dikirim Oleh", $dikirim, TRUE, TRUE);
			$data["input"]["diterima"] 		= $this->formlib->_generate_input_text("input[diterima]", "Diterima Oleh", $diterima, TRUE, TRUE);



			$data["_template"]	= $this->template->generate_template("user", $data);
			$this->load->view("pekerjaan/dokumen_kwitansi_edit", $data);
		}
		else if ($id_dokumen_master == 4 || $id_dokumen_master == 5 || $id_dokumen_master == 6 || $id_dokumen_master == 7 || $id_dokumen_master == 8)
		{
			$mst_dokumen	= $this->global_model->get_data("mst_dokumen_master", 1, array("id"), array($id_dokumen_master))->row();

			if (!$id_dokumen_gabung) {
				$dokumen		= $this->global_model->get_data("mst_dokumen_gabung", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, $id_dokumen_master));
			}
			else
			{
				$id_dokumen_gabung = base64_decode($id_dokumen_gabung);
				$dokumen		= $this->global_model->get_data("mst_dokumen_gabung", 1, array(  "id"), array( $id_dokumen_gabung));
				// echo $this->db->last_query();
			}

			$data["id_dokumen_master"]	= $id_dokumen_master;

			$dokumen_final = "";
			if ($dokumen->num_rows() == 0)
			{
				$data["title"] 	= "Tambah ".$mst_dokumen->nama;

				$id 		= "";
				$no			= "";
				$tanggal 	= date("Y-m-d");

				if ($mst_dokumen->id != 8)
				{
					$total		= "";
				}

				$file 		= "";
				$keterangan	= "";
			}
			else
			{
				$data["title"] 	= "Ubah ".$mst_dokumen->nama;

				$id 		= $dokumen->row()->id;
				$no		 	= $dokumen->row()->no;
				$tanggal 	= date("Y-m-d", strtotime($dokumen->row()->tanggal));

				if ($mst_dokumen->id != 8)
				{
					$total		= $dokumen->row()->total;
				}

				$file 		= $dokumen->row()->file;
				$keterangan	= $dokumen->row()->keterangan;
				$dokumen_final = $dokumen->row()->dokumen_final;
			}

			$data['dokumen_nama'] = $mst_dokumen->nama;
			$data["dokumen"] = $dokumen->row();
			$data["dokumen_final"] = $dokumen_final;
			$user_login	= $this->auth->get_data_login();
			$id_user	= $user_login["id"];

			$data["input"]["type"] 				= $this->formlib->_generate_input_text("type", "type", "dokumen_gabung", FALSE, TRUE);
			$data["input"]["id_pekerjaan"]		= $this->formlib->_generate_input_text("input[id_pekerjaan]", "id_pekerjaan", $id_pekerjaan, FALSE, TRUE);
			$data["input"]["id_dokumen_master"] = $this->formlib->_generate_input_text("input[id_dokumen_master]", "id_dokumen_master", $id_dokumen_master, FALSE, TRUE);
			$data["input"]["id_user"] 			= $this->formlib->_generate_input_text("input[id_user]", "id_user", $id_user, FALSE, TRUE);
			$data["input"]["id"] 				= $this->formlib->_generate_input_text("id", "id", $id, FALSE, TRUE);

			$data["input"]["no"] 				= $this->formlib->_generate_input_text("input[no]", "Nomor", $no, TRUE, TRUE);
			$data["input"]["tanggal"]			= $this->formlib->_generate_input_date("input[tanggal]", "Tanggal", $tanggal, true, true);

			if ($mst_dokumen->id != 8)
			{
				$data["input"]["total"] 		= $this->formlib->_generate_input_text("input[total]", "Rp", $total, TRUE, TRUE);
			}

			$data["input"]["file"] 				= $this->formlib->_generate_input_file_image("input[file]", "File", $file, TRUE, TRUE);
			$data["input"]["keterangan"] 		= $this->formlib->_generate_input_textarea("input[keterangan]", "Keterangan", $keterangan, TRUE, TRUE);

			$data["_template"]	= $this->template->generate_template("user", $data);
			$this->load->view("pekerjaan/dokumen_gabung_edit", $data);
		}


	}


	function kertas_kerja_edit($id_pekerjaan = "", $id_lokasi = "")
	{
		$this->load->library("kertaskerjalib");
		$id_pekerjaan 		= base64_decode($id_pekerjaan);
		$id_lokasi 			= base64_decode($id_lokasi);
		$pekerjaan			= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$lokasi				= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();


		$data["lokasi"]		= $lokasi;
		$data["title"]		= "Kertas Kerja";
		$kertas_kerja		= "";

		if ($lokasi->id_jenis_objek == 1)
		{
			$kertas_kerja	= $this->kertaskerjalib->generate_form_1($pekerjaan, $lokasi);
		}

		if ($lokasi->id_jenis_objek == 2)
		{
			$kertas_kerja	= $this->kertaskerjalib->generate_form_2($pekerjaan, $lokasi);
			//$this->load->view("pekerjaan/kertas_kerja_edit/form_2");
		}

		if ($lokasi->id_jenis_objek == 6)
		{
			$kertas_kerja	= $this->kertaskerjalib->generate_form_6($pekerjaan, $lokasi);
		}

		if ($lokasi->id_jenis_objek == 7)
		{
			$kertas_kerja	= $this->kertaskerjalib->generate_form_7($pekerjaan, $lokasi);
		}

		if ($lokasi->id_jenis_objek == 5)
		{
			$kertas_kerja	= $this->kertaskerjalib->generate_form_5($pekerjaan, $lokasi);
		}

		if ($lokasi->id_jenis_objek == 3)
		{
			$kertas_kerja	= $this->kertaskerjalib->generate_form_3($pekerjaan, $lokasi);
		}

		$data["kertas_kerja"]	= $kertas_kerja;

		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/kertas_kerja_edit", $data);


	}

	function print_surat1($id_pekerjaan = "", $id_lokasi = "")
	{
		$this->load->view("pekerjaan/kertas_kerja/psr_1", "");
	}

	function print_surat2($id_pekerjaan = "", $id_lokasi = "")
	{
		$this->load->view("pekerjaan/kertas_kerja/psr_2", "");
	}

	function print_asm($id_pekerjaan = "", $id_lokasi = "")
	{
		$this->load->view("pekerjaan/kertas_kerja/pasm", "");
	}

	function print_db($id_pekerjaan = "", $id_lokasi = "")
	{
		$this->load->view("pekerjaan/kertas_kerja/pdb", "");
	}

	function print_bct($id_pekerjaan = "", $id_lokasi = "")
	{
		$this->load->view("pekerjaan/kertas_kerja/pbct", "");
	}


	function laporan_ringkas($id_pekerjaan = "", $id_lokasi = "")
	{
		$this->load->library('Pdf');
		$id_pekerjaan 		= base64_decode($id_pekerjaan);
		$id_lokasi 			= base64_decode($id_lokasi);
		$pekerjaan			= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$lokasi				= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();


		$data_lokasi		= $this->global_model->get_data("txn_lokasi_data", 1, array("id_lokasi"), array($id_lokasi))->result();

		$array_data_lokasi	= array();
		foreach ($data_lokasi as $item_data_lokasi)
		{
			$array_data_lokasi[$item_data_lokasi->id_field][$item_data_lokasi->keterangan]	= $item_data_lokasi->jawab;
		}

		$data["data_lokasi"]	= $array_data_lokasi;
		$data["lokasi"]			= $lokasi;



		ob_start();
		$content	= $this->load->view("pekerjaan/kertas_kerja/laporan_ringkas", $data, true);
		ob_clean();

		/*echo $content;
		die();*/
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(10, 10, 10, 10));
			//$html2pdf->setModeDebug();
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output("Laporan Ringkas.pdf", "D");
		}
		catch(HTML2PDF_exception $e)
		{
			echo $e;
			exit;
		}
	}

	function laporan_ringkas1($id_pekerjaan = "", $id_lokasi = "")
	{
		$id_pekerjaan 		= base64_decode($id_pekerjaan);
		$id_lokasi 			= base64_decode($id_lokasi);
		$pekerjaan			= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$lokasi				= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();


		$data_lokasi		= $this->global_model->get_data("txn_lokasi_data", 1, array("id_lokasi"), array($id_lokasi))->result();

		$array_data_lokasi	= array();
		foreach ($data_lokasi as $item_data_lokasi)
		{
			$array_data_lokasi[$item_data_lokasi->id_field][$item_data_lokasi->keterangan]	= $item_data_lokasi->jawab;
		}

		/*echo "<pre>";
		print_r($array_data_lokasi);
		echo "</pre>";*/
		$data["data_lokasi"]	= $array_data_lokasi;
		$data["lokasi"]			= $lokasi;

		$this->load->view("pekerjaan/kertas_kerja/print", $data);
	}

	function laporan_edit($id_pekerjaan = "", $id = "")
	{
		$id_pekerjaan 		= base64_decode($id_pekerjaan);

		$data["title"] 	= "Penyusunan Draf Laporan";
		$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

		$list_laporan	= $this->global_model->get_data("txn_draft_laporan", 2, array("id_pekerjaan", "type"), array($id_pekerjaan, "draft_laporan"));

		$history		= "<div class='table_div'>";
		$history		.= "<table class='table_custom' border='0' cellpadding='0' cellspacing='0'>";

		$history		.= "
			<thead>
				<tr>
					<th>No</th>
					<th>Nama File</th>
					<th>Keterangan</th>
					<th>Diupload Oleh</th>
					<th>Tanggal</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		";

		$i = 1;
		foreach ($list_laporan->result() as $item_laporan)
		{
			$nama		= "";
			$user		= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, 22), "created", "DESC", 0, 1);

			if ($user->num_rows() == 1)
			{
				$id_user	= $user->row()->id_user;
				$user		= $this->global_model->get_data("mst_user", 1, array("id"), array($id_user))->row();

				if (!empty($user) && !empty($user->nama))
					$nama		= $user->nama;
				else
					$nama		= "-";
			}

			$history	.= "
				<tr>
					<td align='center'>".$i."</td>
					<td><a href='".base_url("asset/file/".$item_laporan->filename)."' target='_blank'>".$item_laporan->filename."</a></td>
					<td> - </td>
					<td>".$nama."</td>
					<td align='center'>".$this->spmlib->indonesian_date($item_laporan->created, "d F Y - H:i:s", "")."</td>
				</tr>
			";

			$i++;
		}



		$history		.= "</tbody>";
		$history		.= "</table>";
		$history		.= "</div>";
		$data["history"]	= $history;

		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/laporan_edit", $data);


	}

	function laporan_final_edit($id_pekerjaan = "", $id = "")
	{
		$id_pekerjaan 		= base64_decode($id_pekerjaan);

		$data["title"] 	= "Penyusunan Laporan Final";
		$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

		$list_laporan	= $this->global_model->get_data("txn_draft_laporan", 2, array("id_pekerjaan", "type"), array($id_pekerjaan, "draft_laporan_final"));

		$history		= "<div class='table_div'>";
		$history		.= "<table class='table_custom' border='0' cellpadding='0' cellspacing='0'>";

		$history		.= "
			<thead>
				<tr>
					<th>No</th>
					<th>Nama File</th>
					<th>Keterangan</th>
					<th>Diupload Oleh</th>
					<th>Tanggal</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		";

		$i = 1;
		foreach ($list_laporan->result() as $item_laporan)
		{
			$nama		= "";
			$user		= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, 22), "created", "DESC", 0, 1);

			if ($user->num_rows() == 1)
			{
				$id_user	= $user->row()->id_user;
				$user		= $this->global_model->get_data("mst_user", 1, array("id"), array($id_user))->row();
				$nama		= $user->nama;
			}
			$history	.= "
				<tr>
					<td align='center'>".$i."</td>
					<td><a href='".base_url("asset/file/".$item_laporan->filename)."' target='_blank'>".$item_laporan->filename."</a></td>
					<td> - </td>
					<td>".$nama."</td>
					<td align='center'>".$this->spmlib->indonesian_date($item_laporan->created, "d F Y - H:i:s", "")."</td>
				</tr>
			";

			$i++;
		}



		$history		.= "</tbody>";
		$history		.= "</table>";
		$history		.= "</div>";
		$data["history"]	= $history;

		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/laporan_final_edit", $data);


	}
	
	function upload_tandaterima_dokumen_edit($id_pekerjaan = "", $id = "")
	{
		$id_pekerjaan 		= base64_decode($id_pekerjaan);

		$data["title"] 	= "Upload tanda terima dokumen";
		$data["input"]["id_pekerjaan"]	= $this->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($id_pekerjaan), FALSE, TRUE);

		$list_laporan	= $this->global_model->get_data("txn_draft_laporan", 2, array("id_pekerjaan", "type"), array($id_pekerjaan, "upload_tterima_dokumen"));

		$history		= "<div class='table_div'>";
		$history		.= "<table class='table_custom' border='0' cellpadding='0' cellspacing='0'>";

		$history		.= "
			<thead>
				<tr>
					<th>No</th>
					<th>Nama File</th>
					<th>Keterangan</th>
					<th>Diupload Oleh</th>
					<th>Tanggal</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
		";

		$i = 1;
		foreach ($list_laporan->result() as $item_laporan)
		{
			$nama		= "";
			$user		= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, 22), "created", "DESC", 0, 1);

			if ($user->num_rows() == 1)
			{
				$id_user	= $user->row()->id_user;
				$user		= $this->global_model->get_data("mst_user", 1, array("id"), array($id_user))->row();
				$nama		= $user->nama;
			}
			$history	.= "
				<tr>
					<td align='center'>".$i."</td>
					<td><a href='".base_url("asset/file/".$item_laporan->filename)."' target='_blank'>".$item_laporan->filename."</a></td>
					<td> - </td>
					<td>".$nama."</td>
					<td align='center'>".$this->spmlib->indonesian_date($item_laporan->created, "d F Y - H:i:s", "")."</td>
				</tr>
			";

			$i++;
		}



		$history		.= "</tbody>";
		$history		.= "</table>";
		$history		.= "</div>";
		$data["history"]	= $history;

		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/upload_tterima_dokumen_edit.php", $data);


	}



	function cek_tambah_pekerjaan($id = null)
	{
		if ($id == null)
		{
			$unix_string	= $this->spmlib->generate_random_string(50);
			$data_pekerjaan	= array("unix" => $unix_string);
			$this->global_model->save("mst_pekerjaan", $data_pekerjaan);
			$pekerjaan		= $this->global_model->get_data("mst_pekerjaan", 1, array("unix"), array($unix_string))->row();
			redirect(base_url()."pekerjaan/tambah/".base64_encode($pekerjaan->id)."/");
		}
	}

	function generate_button($pekerjaan, $user)
	{
		$id_status	= $pekerjaan->id_status;

		if ($user["id_group"] == 2){
			$status		= $this->global_model->get_data("mst_status", 1, array("id"), array($id_status));
		}else{
			$status		= $this->global_model->get_data("mst_status", 2, array("id", "id_group"), array($id_status, $user["id_group"]));
		}

		if ($id_status == 6 && $pekerjaan->hasil_status == "reject")
		{
			$button["reject"] 	= 0;
			$button["approve"] 	= 0;
			$button["kirim"] 	= 0;

			$button["tambah_lk"] 		= 0;
			$button["tambah_evaluasi"] 	= 0;
			$button["tambah_po"] 		= 0;
			$button["update_dokumen"] 	= 0;
		}
		else
		{
			$button["reject"] 	= $status->num_rows() == 0 ? 0 : $status->row()->tolak;
			$button["approve"] 	= $status->num_rows() == 0 ? 0 : $status->row()->setujui;
			$button["kirim"] 	= $status->num_rows() == 0 ? 0 : $status->row()->kirim;

			$button["tambah_lk"] 		= $status->num_rows() == 0 ? 0 : $status->row()->tambah_lk;
			$button["tambah_evaluasi"] 	= $status->num_rows() == 0 ? 0 : $status->row()->tambah_evaluasi;
			$button["tambah_po"] 		= $status->num_rows() == 0 ? 0 : $status->row()->tambah_po;
			$button["update_dokumen"] 	= $status->num_rows() == 0 ? 0 : $status->row()->update_dokumen;
		}




		return $button;
	}

	function dokumen_penawaran($id_pekerjaan = "", $id_lokasi = "")
	{
		$id_pekerjaan 		= base64_decode($id_pekerjaan);
		$id_lokasi 			= base64_decode($id_lokasi);
		$pekerjaan			= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$lokasi				= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();


		$data_lokasi		= $this->global_model->get_data("txn_lokasi_data", 1, array("id_lokasi"), array($id_lokasi))->result();

		$array_data_lokasi	= array();
		foreach ($data_lokasi as $item_data_lokasi)
		{
			$array_data_lokasi[$item_data_lokasi->id_field][$item_data_lokasi->keterangan]	= $item_data_lokasi->jawab;
		}

		/*echo "<pre>";
		print_r($array_data_lokasi);
		echo "</pre>";*/
		$data["pekerjaan"]		= $pekerjaan;
		$data["data_lokasi"]	= $array_data_lokasi;
		$data["lokasi"]			= $lokasi;

		$this->load->view("pekerjaan/dokumen_penawaran", $data);
	}
}

?>
