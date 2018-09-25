<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class printpdf extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function laporan_ringkas($id_pekerjaan = "", $id_lokasi = "", $type = "pdf")
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
		
		$data["list_image_lampiran"]	= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($lokasi->id, 896), "keterangan", "ASC")->result();
		
		if ($type == "print")
		{
			echo $this->load->view("printpdf/laporan_ringkas", $data, true);;
			die();
		}
		
		ob_start();
		$content	= $this->load->view("printpdf/laporan_ringkas", $data, true);
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

	function dokumen_penawaran($id_pekerjaan = "")
	{
		

            
        $id_pekerjaan 		= base64_decode($id_pekerjaan);
		$pekerjaan			= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$dokumen_penawaran	= $this->global_model->get_data("mst_dokumen_penawaran", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, 1))->row();
		$lokasi				= $this->global_model->get_data("view_lokasi", 1, array("id_pekerjaan"), array($id_pekerjaan))->result();
		$klien				= $this->global_model->get_data("view_klien", 1, array("id"), array($pekerjaan->id_klien))->row();
		$debitur			= $this->global_model->get_data("mst_debitur", 1, array("id"), array($klien->id_debitur))->row();
		$pekerjaan_status	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, 5))->row();
			
		$lembar_kendali		= $this->global_model->get_data("mst_lembar_kendali", 2, array("id_pekerjaan", "step"), array($id_pekerjaan, "LKK-2"))->row();
		$lembar_kendali		= $this->global_model->get_data("txn_lembar_kendali_2", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();
			
		$user_approve		= $this->global_model->get_data("mst_user", 1, array("id"), array($pekerjaan_status->id_user))->row();
		$id_tugas			= $this->global_model->get_data("mst_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$beri_tugas			= $this->global_model->get_data("mst_debitur", 1, array("id"), array($id_tugas->pemberi_tugas))->row();

		// echo $id_tugas->pengguna_laporan;
		// exit();
		// Next Step
		{
			if ($pekerjaan->id_status == 9)
			{
				$id_status		= 9;
				$user			= $this->auth->get_data_login();
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
		}
		
			
		$data_lokasi		= array();
		foreach($lokasi as $item_lokasi)
		{
			array_push($data_lokasi, $item_lokasi);
		}
			
			
		$harikerja  = 	$lembar_kendali->jangka_waktu;
        $this->load->library("terbilang");
		$terbilang = $this->terbilang->terbilang($harikerja);
                
		$data["pekerjaan"]			= $pekerjaan;
		$data["dokumen_penawaran"]	= $dokumen_penawaran;
		$data["klien"]				= $klien;
		$data["beri_tugas"]			= $beri_tugas;
		$data["id_tugas"]			= $id_tugas;
		$data["debitur"]			= $debitur;
		$data["data_lokasi"]		= $data_lokasi;
		$data["user_approve"]		= $user_approve;
		$data["lembar_kendali"]		= $lembar_kendali;
        $data["harikerja"]			= $harikerja.' ('.$terbilang.' )';
			
		$this->load->library('Pdf');
		
		ob_start();
		$content	= $this->load->view("printpdf/dokumen_penawaran", $data, true);
		ob_clean(); 
		
header('Content-Type: application/force-download');
header('Content-disposition: attachment; filename=tes.doc');

header("Pragma: ");
header("Cache-Control: ");
		$word_xml_settings = "<xml><w:WordDocument><w:View>Print</w:View><w:Zoom>100</w:Zoom></w:WordDocument></xml>";
		$word_landscape_style = "@page {size: 8.5in 10.8in;
            margin: 0.3in 1.0in 1.0in 0.6in ;
            mso-header-margin: .3in;
            mso-footer-margin: .3in;
            mso-paper-source: 0;} div.Section1{page:Section1;}";
    	$word_landscape_div_start = '<div class="Section1">';
		$word_landscape_div_end = '</div>';
		echo "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'>";
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
		echo '<head>'.$word_xml_settings.'<style type="text/css">
		'.$word_landscape_style.' table,td {border:0px solid #FFFFFF;} </style>
		</head>';
		echo "<body>";
		echo $word_landscape_div_start.''.$content.''.$word_landscape_div_end;
		echo "</body>";
		echo "</html>";
		die();
		try
		{
			// $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(10, 10, 10, 10));
			$html2pdf = new HTML2PDF('P','A4','fr', false, 'ISO-8859-15',array(30, 0, 20, 0));
			//$html2pdf->setModeDebug();
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output("Dokumen Penawaran.pdf", "D");
		}
		catch(HTML2PDF_exception $e)
		{
			echo $e;
			exit;
		}
	}

	function kwitansi($id_pekerjaan = "")
	{
		if (!empty($id_pekerjaan))
		{
			$id_pekerjaan		= base64_decode($id_pekerjaan);
			$pekerjaan			= $this->global_model->get_data("mst_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$klien				= $this->global_model->get_data("view_klien", 1, array("id"), array($pekerjaan->id_klien))->row();
			
			$data["klien"]		= $klien;
			$data["kwitansi"]	= $this->global_model->get_data("mst_dokumen_kwitansi", 2, array("id_pekerjaan", "id_dokumen_master"), array($id_pekerjaan, 7))->row();
			
			$this->load->library('Pdf');
		
			ob_start();
			$content	= $this->load->view("printpdf/kwitansi", $data, true);
			ob_clean(); 
			
			/*echo $content;
			die();*/
			try
			{
				$html2pdf = new HTML2PDF('L', 'A5', 'en', true, 'UTF-8', array(5, 5, 5, 5));
				//$html2pdf->setModeDebug();
				$html2pdf->setDefaultFont('Arial');
				$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
				$html2pdf->Output("Kwitansi.pdf", "D");
			}
			catch(HTML2PDF_exception $e)
			{
				echo $e;
				exit;
			}
		}
		else
		{
			redirect(base_url());
		}
	}
	
	function surat_tugas($id_lokasi = "")
	{
		
		if (!empty($id_lokasi))
		{
			$id_lokasi			= base64_decode($id_lokasi);
			$lokasi				= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();
			$id_pekerjaan		= $lokasi->id_pekerjaan;
			$pekerjaan			= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$klien				= $this->global_model->get_data("view_klien", 1, array("id"), array($pekerjaan->id_klien))->row();
			
			// Next Step
			{
				if ($pekerjaan->id_status == 16)
				{
					$id_status		= $pekerjaan->id_status;
					$user			= $this->auth->get_data_login();
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
			}
			
			$data["lokasi"]		= $lokasi;
			$data["pekerjaan"]	= $pekerjaan;
			$data["klien"]		= $klien;
			
			$data_lokasi		= $this->global_model->get_data("txn_lokasi_data", 1, array("id_lokasi"), array($id_lokasi))->result();
		
			$array_data_lokasi	= array();
			foreach ($data_lokasi as $item_data_lokasi)
			{
				$array_data_lokasi[$item_data_lokasi->id_field][$item_data_lokasi->keterangan]	= $item_data_lokasi->jawab;
			}
			
			$data["data_lokasi"]	= $array_data_lokasi;
			
			$this->load->library('Pdf');
		
			ob_start();
			$content	= $this->load->view("printpdf/surat_tugas", $data, true);
			ob_clean(); 
			
			/*echo "<pre>";
			print_r($array_data_lokasi);
			echo "</pre>";
			
			echo $content;
			die();*/
			try
			{
				$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(20,20,20,20));
				//$html2pdf->setModeDebug();
				$html2pdf->setDefaultFont('Arial');
				$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
				$html2pdf->Output("Surat Tugas.pdf", "D");
			}
			catch(HTML2PDF_exception $e)
			{
				echo $e;
				exit;
			}
		}
		else
		{
			redirect(base_url());
		}
	}
	
	function ringkasan($id_pekerjaan = "")
	{
		
		if (!empty($id_pekerjaan))
		{
			$id_pekerjaan		= base64_decode($id_pekerjaan);
			
			$lokasi				= $this->global_model->get_data("view_lokasi", 1, array("id_pekerjaan"), array($id_pekerjaan));
			
			$data_survey		= array();
			
			$total_np		= 0;
			$total_nl		= 0;
			
			$list_lokasi	= array();
			foreach ($lokasi->result() as $item_lokasi)
			{
				$urutan			= (int)(str_replace("K", "", $item_lokasi->kode));
				$custom_data	= unserialize($item_lokasi->custom_data);
				$subtotal_np	= 0;
				$subtotal_nl	= 0;
				
				$tanah_np	= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($item_lokasi->id, 244));
				$tanah_nl	= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($item_lokasi->id, 245));
				$tanah_luas = $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($item_lokasi->id, 162));
				$tanah_np	= ($tanah_np->num_rows() == 1 ? $tanah_np->row()->jawab : 0);
				$tanah_nl	= ($tanah_nl->num_rows() == 1 ? $tanah_nl->row()->jawab : 0);
				$tanah_luas = ($tanah_luas->num_rows() == 1 ? $tanah_luas->row()->jawab : 0);
				
				$subtotal_np	= $subtotal_np + $tanah_np;
				$subtotal_nl	= $subtotal_nl + $tanah_nl;
				
				$content		= array();
				
				$content["Tanah"]	= array(
					"jumlah"			=> number_format($tanah_luas),
					"nilai_pasar"		=> number_format($tanah_np),
					"nilai_likuidasi"	=> number_format($tanah_nl)
				);
				
				if ($item_lokasi->id_jenis_objek == 2)
				{
					if (array_key_exists("tab_bangunan", $custom_data))
					{
						foreach ($custom_data["tab_bangunan"] as $key_bangunan => $item_bangunan)
						{
							$key_bangunan	= str_replace(" ", "_", $key_bangunan);
							
							$bangunan_name	= $this->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($item_lokasi->id, 635, $key_bangunan));					
							$bangunan_np	= $this->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($item_lokasi->id, 691, $key_bangunan));					
							$bangunan_nl	= $this->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($item_lokasi->id, 692, $key_bangunan));					
							$bangunan_luas 	= $this->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($item_lokasi->id, 639, $key_bangunan));					
							
							$bangunan_name	= $bangunan_name->num_rows() == 1 ? $bangunan_name->row()->jawab : "-";
							$bangunan_np	= $bangunan_np->num_rows() == 1 ? $bangunan_np->row()->jawab : 0;
							$bangunan_nl	= $bangunan_nl->num_rows() == 1 ? $bangunan_nl->row()->jawab : 0;
							$bangunan_luas	= $bangunan_luas->num_rows() == 1 ? $bangunan_luas->row()->jawab : 0;
							
							$subtotal_np	= $subtotal_np + $bangunan_np;
							$subtotal_nl	= $subtotal_nl + $bangunan_nl;
							
							$content[$bangunan_name]	= array(
								"jumlah"			=> number_format($bangunan_luas),
								"nilai_pasar"		=> number_format($bangunan_np),
								"nilai_likuidasi"	=> number_format($bangunan_nl)
							);
						}
					}
				}
				
				$sarana_np	= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($item_lokasi->id, 865));
			
				$sarana_nl	= ($sarana_np->num_rows() == 1 ? $sarana_np->row()->jawab/2 : 0);
				$sarana_np	= ($sarana_np->num_rows() == 1 ? $sarana_np->row()->jawab : 0);
				
				$subtotal_np	= $subtotal_np + $sarana_np;
				$subtotal_nl	= $subtotal_nl + $sarana_nl;
				
				$content["Sarana Pelengkap"]	= array(
					"jumlah"			=> "1-Lot",
					"nilai_pasar"		=> number_format($sarana_np),
					"nilai_likuidasi"	=> number_format($sarana_nl)
				);
				
				
				$data_lokasi["title"]	= "PROPERTI - ".$urutan." ".$item_lokasi->alamat." -  ".$item_lokasi->nama_provinsi;
				$data_lokasi["content"]	= $content;
				$data_lokasi["subtotal"]	= array(
					"nilai_pasar"		=> number_format($subtotal_np),
					"nilai_likuidasi"	=> number_format($subtotal_nl)
				);
				
				$list_lokasi[$item_lokasi->id]	= $data_lokasi;
				
				$total_np	= $subtotal_np + $total_np;
				$total_nl	= $subtotal_nl + $total_nl;
			}
			$data_survey["lokasi"]		= $list_lokasi;
			$data_survey["total_np"]	= number_format($total_np);
			$data_survey["total_nl"]	= number_format($total_nl);
			$data_survey["total_np_bulat"]	= number_format(round($total_np/1000000)*1000000);
			$data_survey["total_nl_bulat"]	= number_format(round($total_nl/1000000)*1000000);
			
			/*echo "<pre>";
			print_r($data_survey);
			echo "</pre>";*/
			$data["data_survey"]	= $data_survey;
			
			
			
			$this->load->library('Pdf');
			ob_start();
			$content	= $this->load->view("printpdf/ringkasan", $data, true);
			ob_clean(); 
			
			try
			{
				$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(20,20,20,20));
				//$html2pdf->setModeDebug();
				$html2pdf->setDefaultFont('Arial');
				$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
				$html2pdf->Output("Ringkasan Penilaian.pdf", "D");
			}
			catch(HTML2PDF_exception $e)
			{
				echo $e;
				exit;
			}
		}
		else
		{
			redirect(base_url());
		}
	}
        
        
}


