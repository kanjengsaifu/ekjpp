<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class printpdf extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function laporan_ringkas($id_pekerjaan = "", $id_lokasi = "", $id_kertas_kerja = "", $type = "pdf")
	{
		$user			= $this->auth->get_data_login();
		$allowed_type = array('pdf', 'print');
		if ( !in_array($type, $allowed_type) ) $type = "pdf";
		$this->load->library('Pdf');
		$id_pekerjaan 		= base64_decode($id_pekerjaan);
		$id_lokasi 			= base64_decode($id_lokasi);
		$id_kertas_kerja    = base64_decode($id_kertas_kerja);
		$this->db->select('A.pengguna_laporan, E.tujuan AS tujuan_penilaian,
						   F.nama AS nama_penilai,
						   B.nama AS nama_klien, B.telepon AS telepon_klien,
						   A.no_surat_tugas, A.tgl_surat_tugas,
						   F.no_mappi, F.no_ijinpp, F.no_sttdojk, F.kualifikasi', false)
				 ->from('mst_pekerjaan A')
				 ->join('mst_klien B', 'A.id_klien = B.id', 'left')
				 ->join('mst_tujuan E', 'A.maksud_tujuan = E.id_tujuan', 'left')
				 ->join('mst_user F', 'A.penilai = F.id', 'left')
				 ->where('A.id', $id_pekerjaan);
		$query = $this->db->get();
		$pekerjaan = false;
		if ( is_object($query) ) {
			$row = $query->row();
			if ( is_object($row) ) 
				$pekerjaan = $row;
		}
		if ( !$pekerjaan ) {
			show_404();
			return;
		}
		$lokasi = false;

		//$view_lokasi = $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();
		$this->db->select('A.id_jenis_objek,
						   A.tanggal_mulai, A.pemegang_hak, A.kepemilikan,
						   A.alamat, A.gang, A.nomor, A.rt, 
						   A.rw, 
						   B.nama AS jenis_objek,
						   C.nama AS desa, D.nama AS kecamatan,
						   E.nama AS kota, F.nama AS provinsi')
				 ->from('mst_lokasi A')
				 ->join('mst_jenis_objek B', 'A.id_jenis_objek = B.id')
				 ->join('mst_desa C', 'A.id_desa = C.id', 'left')
				 ->join('mst_kecamatan D', 'A.id_kecamatan = D.id', 'left')
				 ->join('mst_kota E', 'A.id_kota = E.id', 'left')
				 ->join('mst_provinsi F', 'A.id_provinsi = F.id', 'left')
				 ->where('A.id_pekerjaan', $id_pekerjaan)
				 ->where('A.id', $id_lokasi);
				 
		$query_obyek = $this->db->get();
		if ( is_object($query_obyek) ) {
			$row_obyek = $query_obyek->row();
			if ( is_object($row_obyek) ) {
				$lokasi = $row_obyek;
			}
		}
		if ( !$lokasi ) {
			show_404();
			return;
		}
		//Alamat
		$alamat = $lokasi->alamat;
		$alamat .= empty($lokasi->gang) ? NULL : ' Gang '.$lokasi->gang;
		$alamat .= empty($lokasi->nomor) ? NULL : ' No. '.$lokasi->nomor;
		$alamat .= empty($lokasi->rt) ? NULL : ' RT '.$lokasi->rt;
		$alamat .= empty($lokasi->rw) ? NULL : ' RW '.$lokasi->rw;
		$alamat .= empty($lokasi->desa) ? NULL : ', '.$lokasi->desa;
		$alamat .= empty($lokasi->kecamatan) ? NULL : ', '.$lokasi->kecamatan;
		$alamat .= empty($lokasi->kota) ? NULL : ', '.$lokasi->kota;
		$alamat .= empty($lokasi->provinsi) ? NULL : ', '.$lokasi->provinsi;
		$lokasi->alamat = $alamat;
		//Akhir Alamat

		//Kertas Kerja
		$kertas_kerja = false;
		$this->db->select('tujuan_penilaian, debitur, nama_cabang,  nama_staff, jabatan,
						   nomor_penugasan, tanggal_penugasan, yang_dijumpai, selaku,
						   tujuan_penilaian, status_objek, obyek_ditempati_oleh, penggunaan_obyek,
						   nama_penilai, no_mappi_penilai,
						  no_mappi_surveyor, nama_surveyor, nomor_laporan, tanggal_laporan,
						   jenis_klien, klien, telepon_klien,
						   tanggal_inspeksi_penilaian, alamat_properti, kegunaan')
				 ->from('txn_kertas_kerja')
				 ->where('id_lokasi', $id_lokasi)
				 ->where('id_kertas_kerja', $id_kertas_kerja);
		$query_kj = $this->db->get();
		if ( is_object($query_kj) ) {
			$row_kj = $query_kj->row();
			if ( is_object($row_kj) )
				$kertas_kerja = $row_kj;
		}
		if ( !$kertas_kerja ) {
			show_404();
			return;
		}
		
		//Akhir kertas kerja

		//Penandatangan laporan
		$penanda_tangan_laporan = NULL;
		$data_penandatangan = (object)array('penanda_tangan' => NULL, 'nama_penanda_tangan' => NULL, 
								'no_mappi' => NULL, 'jabatan' => NULL, 'no_ijinpp' => NULL, 'no_sttdojk' => NULL,
								'kualifikasi' => NULL);
		$this->db->select('A.penanda_tangan, B.nama AS nama_penanda_tangan,
						   B.no_mappi, B.jabatan, B.no_ijinpp, B.no_sttdojk, B.kualifikasi')
				 ->from('mst_dokumen_penawaran A')
				 ->join('mst_user B', 'A.penanda_tangan = B.id')
				 ->where('A.id_pekerjaan', $id_pekerjaan)
				 ->where('A.id_dokumen_master', 1);
		$query_ptl = $this->db->get();
		if ( is_object($query_ptl) ) {
			$row_ptl = $query_ptl->row();
			if ( is_object($row_ptl) ) {
				$data_penandatangan = $row_ptl;
				if ( !empty($row_ptl->penanda_tangan) )
					$penanda_tangan_laporan = $row_ptl->nama_penanda_tangan;
			}
		}
		//Akhir Penandatangan Laporan
		
		//Tanah
		$tanah = (object)array(
			'luas'	=> NULL,
			'nilai_pasar' => NULL,
			'nilai_likuidasi' => NULL,
		);
		$this->db->select('*')
				 ->from('txn_tanah')
				 ->where('id_lokasi', $id_lokasi)
				 ->where('id_kertas_kerja', $id_kertas_kerja);
		$query = $this->db->get();
		if ( is_object($query) ) {
			$row = $query->row();
			if ( is_object($row) ) $tanah = $row;
		}
		//Bangunan
		$bangunan = array();
		$this->db->select('*')
				 ->from('txn_bangunan')
				 ->where('id_lokasi', $id_lokasi)
				 ->where('id_kertas_kerja', $id_kertas_kerja);
		$query = $this->db->get();
		$detil_luas_bangunan = array();
		$lantai = array();
		$ruangan = $ruangan_last = array();

		if ( is_object($query) ) {
			$bangunan = $query->result();
			$no_bangunan = 1;
			foreach ($bangunan as $bg) {
				$list_ruangan_last = array();
				$detil_luas_bangunan[$bg->id_bangunan] = array();
				$lantai[$bg->id_bangunan] = array();
				//default lantai
				$lantai[$bg->id_bangunan][] = 2;
				//end default lantai
				$ruangan[$bg->id_bangunan] = array();
				$ruangan_last[$bg->id_bangunan] = array();
				$koordinat_x[$bg->id_bangunan] = array();
				$ruangan_number[$bg->id_bangunan] = array();
				//Ambil data detil luas bangunan
				$con_luas = array('id_kertas_kerja' => $id_kertas_kerja, 'id_bangunan' => $bg->id_bangunan);
				$this->db->from('txn_ruang_lantai')
						 ->where($con_luas)
						 ->order_by('jenis, koordinat_y, koordinat_x');
				$query_lust_b = $this->db->get();
				if ( is_object($query_lust_b) ) {
					$result_luas_b = $query_lust_b->result();
					$last_y = '';
					$x = 1;
					$count_ruangan = array();
					$have_lain = false;
					$last_jenis = $last_y = '';
					$index_ruangan = 0;
					//var_dump($result_luas_b);
					foreach ($result_luas_b as $lb) {
						if ( !array_key_exists($lb->jenis, $ruangan_number[$bg->id_bangunan]) ) {
							$ruangan_number[$bg->id_bangunan][$lb->jenis] = array();
						}
						$index_ruangan = $lb->koordinat_x;
						$label = $lb->jenis;
						if ( strtolower($lb->jenis) == 'ruangan' )
							$lb->jenis = 'Ruang';
						$nama_ruang = $lb->jenis_ruang;
						if ( !in_array($lb->koordinat_y, $lantai[$bg->id_bangunan]) )
							$lantai[$bg->id_bangunan][] = $lb->koordinat_y;
						if ( !array_key_exists($lb->jenis, $count_ruangan) ) {
							$count_ruangan[$lb->jenis] = array();
						}
						if ( !array_key_exists($lb->koordinat_y, $count_ruangan[$lb->jenis]) ) {
							$count_ruangan[$lb->jenis][$lb->koordinat_y] = 0;
						}
						if ( strtolower($lb->jenis) <> 'lain-lain' ) {
							if ( strtolower($lb->jenis) == 'ruang'  ) {
								if ( !in_array($lb->koordinat_x, $ruangan_number[$bg->id_bangunan][$lb->jenis])) {
									/*if ( $lb->koordinat_x > 1 )
										$label = $this->get_label_ruangan($lokasi->id_jenis_objek, $lb->jenis .' '.$lb->koordinat_x);
									else
										$label = $this->get_label_ruangan($lokasi->id_jenis_objek, $lb->jenis);
									if ( $lb->koordinat_x > 1 ) {
										for ( $xi=1; $xi<$lb->koordinat_x; $xi++ ) {
											$label = $this->get_label_ruangan($lokasi->id_jenis_objek, $lb->jenis .' '.$xi);
											$ruangan[$bg->id_bangunan][$xi] = array('label' => $label, 'index' => $lb->jenis, 'x' => $xi);
											if ( !in_array($xi, $ruangan_number[$bg->id_bangunan][$lb->jenis]) )
												$ruangan_number[$bg->id_bangunan][$lb->jenis][] = $xi;
										}
									}*/
									$label = $this->get_label_ruangan($lokasi->id_jenis_objek, $lb->jenis .' '.$lb->koordinat_x);
									$ruangan[$bg->id_bangunan][$index_ruangan] = array('label' => $label, 'index' => $lb->jenis, 'x' => $lb->koordinat_x);
									$ruangan_number[$bg->id_bangunan][$lb->jenis][] = $lb->koordinat_x;
								}
							} else {
								if ( !in_array($lb->koordinat_x, $ruangan_number[$bg->id_bangunan][$lb->jenis])) {
									if ( $lb->koordinat_x > 1 )
										$label = $this->get_label_ruangan($lokasi->id_jenis_objek, $lb->jenis .' '.$lb->koordinat_x);
									else
										$label = $this->get_label_ruangan($lokasi->id_jenis_objek, $lb->jenis);
									if ( $lb->koordinat_x > 1 ) {
										for ( $xi=1; $xi<$lb->koordinat_x; $xi++ ) {
											$label = $this->get_label_ruangan($lokasi->id_jenis_objek, $lb->jenis .' '.$xi);
											$ruangan_last[$bg->id_bangunan][$lb->jenis][$xi] = array('label' => $label, 'index' => $lb->jenis, 'x' => $xi);
											if ( !in_array($xi, $ruangan_number[$bg->id_bangunan][$lb->jenis]) )
												$ruangan_number[$bg->id_bangunan][$lb->jenis][] = $xi;
										}
									}
									if ( !in_array(strtolower($lb->jenis), $list_ruangan_last) )
										$list_ruangan_last[] = strtolower($lb->jenis);
									$ruangan_last[$bg->id_bangunan][$lb->jenis][] = array('label' => $label, 'index' => $lb->jenis, 'x' => $lb->koordinat_x);
									$ruangan_number[$bg->id_bangunan][$lb->jenis][] = $lb->koordinat_x;
								}
							}
						} 
						$count_ruangan[$lb->jenis][$lb->koordinat_y]++;
						
						if ( strtolower($lb->jenis) == 'lain-lain' ) {
							$have_lain = true;
						}
						$last_jenis = $lb->jenis;
						$last_y = $lb->koordinat_y;
						$detil_luas_bangunan[$bg->id_bangunan][$lb->koordinat_y][$lb->jenis][$lb->koordinat_x] = $lb->luas;
						$x++;
					}
					if ( count($result_luas_b) > 0 && $have_lain ) {
						$ruangan[$bg->id_bangunan][] = array('label' => 'Lain-lain', 'index' => 'Lain-lain');
					}
				}
				//default ruangan last
				if ( in_array($lokasi->id_jenis_objek, array(6)) ) {
					$jns = 'Ruang';
					$lbl = 'Ruang';
					if ( !in_array(strtolower($jns), $list_ruangan_last) ) {
						$ruangan_last[$bg->id_bangunan][$jns][] = array('label' => $lbl, 'index' => $jns, 'x' => 1);
					}
				} else {
					$jns = 'Ruang';
					$lbl = 'Ruang 1';
					$current_x = isset($ruangan_number[$bg->id_bangunan][$jns]) ? $ruangan_number[$bg->id_bangunan][$jns] : array();
					if ( !in_array(1, $current_x) ) {
						$ruangan[$bg->id_bangunan][1] = array('label' => $lbl, 'index' => $jns, 'x' => 1);
					}
				}
				if ( in_array($lokasi->id_jenis_objek, array(2, 3, 5, 7)) ) {
					$jns = 'Teras Balkon';
					$lbl = $this->get_label_ruangan($lokasi->id_jenis_objek, $jns);
					if ( !in_array(strtolower($jns), $list_ruangan_last) ) {
						$ruangan_last[$bg->id_bangunan][$jns][] = array('label' => $lbl, 'index' => $jns, 'x' => 1);
					}
				}
				if ( in_array($lokasi->id_jenis_objek, array(2, 3, 7)) ) {
					$jns = 'Lantai Mezzanine';
					$lbl = $this->get_label_ruangan($lokasi->id_jenis_objek, $jns);
					if ( !in_array(strtolower($jns), $list_ruangan_last) ) {
						$ruangan_last[$bg->id_bangunan][$jns][] = array('label' => $lbl, 'index' => $jns, 'x' => 1);
					}
				}
				if ( in_array($lokasi->id_jenis_objek, array(2)) ) {
					$jns = 'cc';
					$lbl = $this->get_label_ruangan($lokasi->id_jenis_objek, $jns);
					if ( !in_array(strtolower($jns), $list_ruangan_last) ) {
						$ruangan_last[$bg->id_bangunan][$jns][] = array('label' => $lbl, 'index' => $jns, 'x' => 1);
					}
				}
				if ( in_array($lokasi->id_jenis_objek, array(3, 7)) ) {
					$jns = 'Lain-lain';
					$lbl = $this->get_label_ruangan($lokasi->id_jenis_objek, $jns);
					if ( !in_array(strtolower($jns), $list_ruangan_last) ) {
						$ruangan_last[$bg->id_bangunan][$jns][] = array('label' => $lbl, 'index' => $jns, 'x' => 1);
					}
				}
				
				//end default ruangan last
				ksort($ruangan_last[$bg->id_bangunan]);
				ksort($ruangan[$bg->id_bangunan]);
				sort($lantai[$bg->id_bangunan]);
				/*if ( count($ruangan[$bg->id_bangunan]) < 1) {
					$ruangan[$bg->id_bangunan][] = array('label' => 'Ruang 1', 'index' => 'Ruang');
				}
				if ( count($ruangan_last[$bg->id_bangunan]) < 1 ) {
					if ( $lokasi->id_jenis_objek == 2 ) {
						$label = $this->get_label_ruangan($lokasi->id_jenis_objek, 'Teras Balkon');
						$ruangan_last[$bg->id_bangunan][$label] = array('label' => $label, 'index' => $label, 'x' => 1);
						$label = $this->get_label_ruangan($lokasi->id_jenis_objek, 'Lantai Mezzanine');
						$ruangan_last[$bg->id_bangunan][$label] = array('label' => $label, 'index' => $label, 'x' => 1);
						$label = $this->get_label_ruangan($lokasi->id_jenis_objek, 'cc');
						$ruangan_last[$bg->id_bangunan][$label] = array('label' => $label, 'index' => 'cc', 'x' => 1);
					} else {
						$label = 'Teras Balkon';
						$ruangan_last[$bg->id_bangunan]['Teras Balkon'] = array('label' => $label, 'index' => $label, 'x' => 1);
					}
				}*/
				$no_bangunan++;
			}
		}

		//var_dump($ruangan);
		//print_r($detil_luas_bangunan);
		$data['detil_luas_bangunan'] = $detil_luas_bangunan;

		$data['lantai'] = $lantai;
		$data['ruangan'] = $ruangan;
		$data['ruangan_last'] = $ruangan_last;
		$data['koordinat_x'] = $koordinat_x;
		//sarana_pelengkap
		$sarana_pelengkap = (object)array(
			'luas'	=> NULL,
			'nilai_pasar' => NULL,
			'nilai_likuidasi' => NULL,
		);
		$this->db->select('luas, brb_rcn, nilai_pasar, nilai_likuidasi')
				 ->from('txn_sarana_pelengkap')
				 ->where('id_lokasi', $id_lokasi)
				 ->where('id_kertas_kerja', $id_kertas_kerja);
		$query = $this->db->get();
		if ( is_object($query) ) {
			$row = $query->row();
			if ( is_object($row) ) $sarana_pelengkap = $row;
		}

		$txn_data_banding = array();
		$this->db->select('*')
				 ->from('txn_data_banding')
				 ->where('id_lokasi', $id_lokasi)
				 ->where('id_kertas_kerja', $id_kertas_kerja)
				 ->order_by('jenis_pembanding', 'asc')
				 ;
		$query = $this->db->get();

		if ( is_object($query) ) {
			$result = $query->result();
			$txn_data_banding = $result;
		}

		// echo '<pre>';var_dump($txn_data_banding);echo '</pre>';exit();

		//txn_lampiran
		$txn_lampiran = array();
		$this->db->select('*')
				 ->from('txn_lampiran')
				 ->where('id_lokasi', $id_lokasi)
				 ->where('id_kertas_kerja', $id_kertas_kerja);
		$query = $this->db->get();
		if ( is_object($query) ) {
			$result = $query->result();
			if ( is_object($row) ) $txn_lampiran = $result;
		}

		$lokasi_tanah_obyek = $this->global_model->get_list('mst_lokasi_tanah_objek', NULL, NULL, NULL, 3);
		$kepadatan_bangunan = $this->global_model->get_list('mst_kepadatan_bangunan', NULL, NULL, NULL, 3);
		$pertumbuhan_bangunan = $this->global_model->get_list('mst_pertumbuhan_bangunan', NULL, NULL, NULL, 3);
		$harga_tanah_obyek = $this->global_model->get_list('mst_harga_tanah_objek', NULL, NULL, NULL, 3);

		$data['lokasi_tanah_obyek'] = $lokasi_tanah_obyek;
		$data['kepadatan_bangunan'] = $kepadatan_bangunan;
		$data['pertumbuhan_bangunan'] = $pertumbuhan_bangunan;
		$data['harga_tanah_obyek'] = $harga_tanah_obyek;
		$data['kertas_kerja'] = $kertas_kerja;
		$data["lokasi"]			= $lokasi;
		$data['pekerjaan']		= $pekerjaan;
		$data['data_penandatangan'] = $data_penandatangan;
		$data['penanda_tangan_laporan'] = $penanda_tangan_laporan;
		$data['tanah'] = $tanah;
		$data['bangunan'] = $bangunan;
		$data['sarana_pelengkap'] = $sarana_pelengkap;
		$data['txn_data_banding'] = $txn_data_banding;
		$data['txn_lampiran'] = $txn_lampiran;
		//$data['data_lokasi'] = $data_lokasi;
		$data['data_legalitas'] = $this->get_data_legalitas($id_lokasi);
		//$data['custom_data'] = $custom_data;
		$data['id_lokasi'] = $id_lokasi;
		
		$data["list_image_lampiran"]	= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 896), "keterangan", "ASC")->result();
		
		if ($type == "print")
		{
			echo $this->load->view("printpdf/laporan_ringkas", $data, true);;
			die();
		}
		ob_start();
		$content	= $this->load->view("printpdf/laporan_ringkas", $data, true);
		ob_clean(); 
		echo $content; return;

		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(10, 10, 10, 10));
			// $html2pdf->setModeDebug();
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output("Laporan Ringkas.pdf", "D");
		}
		catch(HTML2PDF_exception $e)
		{
			echo $e;
			exit;
		}
		echo $content;
	}
	private function get_label_ruangan($jenis_objek, $jenis) {
		$label = $jenis;
		//echo $jenis_objek.'<br/>';
		if ( $jenis_objek == 2 ) {
			if ( strtolower($jenis) == 'cc' ) {
				$label = 'Bgn. Kantor<br/>Lainnya';
			}
		} else if ( $jenis_objek == 5 ) {

			if ( preg_match('/ruang/', strtolower($jenis)) ) {

				if ( strtolower($jenis) == 'ruang 1' ) {
					$label = 'Ruang Staff';
				} else if ( strtolower($jenis) == 'ruang 2' ) {
					$label = 'Ruang Barang & Gudang';
				} else if ( strtolower($jenis) == 'ruang 3' ) {
					$label = 'Kamar Mandi';
				} else if ( strtolower($jenis) == 'ruang 4' ) {
					$label = 'Lain-lain';
				}
			}
		}
		return $label;
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
			
		$user_approve		= $this->global_model->get_data("mst_user", 1, array("id"), array($dokumen_penawaran->penanda_tangan))->row();
		$id_tugas			= $this->global_model->get_data("mst_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$beri_tugas			= $this->global_model->get_data("mst_debitur", 1, array("id"), array($id_tugas->pemberi_tugas))->row();

		// echo $dokumen_penawaran->no_penawaran;
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

		$data_lokasi = array();
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
		header('Content-disposition: attachment; filename=Surat_Penawaran_'.$dokumen_penawaran->no_penawaran.'.doc');

		header("Pragma: ");
		header("Cache-Control: ");
		$word_xml_settings = "<xml><w:WordDocument><w:View></w:View><w:Zoom></w:Zoom></w:WordDocument></xml>";
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
			$pekerjaan1			= $this->global_model->get_data("mst_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$pemberi_tugas	    = $pekerjaan1->pemberi_tugas;		
     		$debitur			= $this->global_model->get_data("mst_debitur", 1, array("id"), array($pemberi_tugas))->row();
			$klien				= $this->global_model->get_data("view_klien", 1, array("id"), array($pekerjaan->id_klien))->row();
			$pt	 				= $this->global_model->get_data("mst_dokumen_penawaran", 1, array("id_pekerjaan"), array($id_pekerjaan))->row();
			$tanda_tangan		= $pt->penanda_tangan;
     		$penanda 			= $this->global_model->get_data("view_user", 1, array("id"), array($tanda_tangan))->row();
     		$tugas      		= $this->global_model->get_data("txn_tugas", 1, array("id_lokasi"), array($id_lokasi))->row();
     		$id_user 			= $tugas->id_user;
     		$surveyor			= $this->global_model->get_data("view_user", 1, array("id"), array($id_user))->row();


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
			$data["pt"]		= $pt;
			$data["lokasi"]		= $lokasi;
			$data["surveyor"]	= $surveyor;
			$data["penanda"]	= $penanda;			
			$data["pekerjaan"]	= $pekerjaan;		
			$data["klien"]		= $klien;
			$data["debitur"]	= $debitur;
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
			print_r($array_data_lokasi); return
			echo "</pre>";
			die();*/
			
			// echo $content;return;
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
	
	function ringkasan($id_pekerjaan = "", $id_lokasi = "", $id_kertas_kerja = "", $type = "pdf")
	{
		$id_pekerjaan 		= base64_decode($id_pekerjaan);
		$id_lokasi 			= base64_decode($id_lokasi);
		$id_kertas_kerja    = base64_decode($id_kertas_kerja);

		if (!empty($id_pekerjaan))
		{
			$lokasi				= $this->global_model->get_data("view_lokasi", 1, array("id_pekerjaan"), array($id_pekerjaan));
			
			$data_survey		= array();
			
			$total_np		= 0;
			$total_nl		= 0;
			
			$list_lokasi	= array();

			foreach ($lokasi->result() as $item_lokasi) {
				$urutan			= (int)(str_replace("K", "", $item_lokasi->kode));
				$custom_data	= unserialize($item_lokasi->custom_data);
				$subtotal_np	= 0;
				$subtotal_nl	= 0;
				
				//TANAH
				$tanah_np = 0;
				$tanah_nl = 0;
				$tanah_luas = 0;
				$this->db->select('luas, nilai_pasar, nilai_likuidasi,
							jenis_batas_1, batas_properti_1,
							jenis_batas_2, batas_properti_2,
							jenis_batas_3, batas_properti_3,
							jenis_batas_4, batas_properti_4,
							lokasi_tanah, kepadatan_bangunan, pertumbuhan_bangunan, harga_tanah_obyek,
							kemudahan_mencapai_lokasi, kemudahan_belanja,
							kemudahan_sarana_pendidikan, kemudahan_angkutan_umum,
							kemudahan_rekreasi, keamanan_terhadap_kejahatan, 
							keamanan_terhadap_kebakaran, keamanan_terhadap_bencana')
				 ->from('txn_tanah')
				 ->where('id_lokasi', $id_lokasi)
				 ->where('id_kertas_kerja', $id_kertas_kerja);
				$txn_tanah = $this->db->get()->row();

				if (!empty($txn_tanah)) {
					$tanah_np = $txn_tanah->nilai_pasar;
					$tanah_nl = $txn_tanah->nilai_likuidasi;
					$tanah_luas = $txn_tanah->luas;
				}

				$subtotal_np	= $subtotal_np + $tanah_np;
				$subtotal_nl	= $subtotal_nl + $tanah_nl;
				
				$content		= array();
				
				$content["Tanah"]	= array(
					"jumlah"			=> number_format($tanah_luas),
					"nilai_pasar"		=> number_format($tanah_np),
					"nilai_likuidasi"	=> number_format($tanah_nl)
				);

				//BANGUNAN
				if ($item_lokasi->id_jenis_objek == 2)
				{
					$this->db->select('luas, bangunan_role, nilai_pasar, nilai_likuidasi, tipe_bangunan')
							->from('txn_bangunan')
							->where('id_lokasi', $id_lokasi)
							->where('id_kertas_kerja', $id_kertas_kerja);

					$txn_bangunan = $this->db->get()->result();

					foreach ($txn_bangunan as $item_bangunan)
					{
						$key_bangunan	= $item_bangunan->bangunan_role;

						$bangunan_name = "";
						$bangunan_np = "";
						$bangunan_nl = "";
						$bangunan_luas = "";

						$bangunan_name	= "Bangunan"; //$item_bangunan->tipe_bangunan					
						$bangunan_np	= $item_bangunan->nilai_pasar;				
						$bangunan_nl	= $item_bangunan->nilai_likuidasi;				
						$bangunan_luas 	= $item_bangunan->luas;

						$subtotal_np	= $subtotal_np + $bangunan_np;
						$subtotal_nl	= $subtotal_nl + $bangunan_nl;
						
						$content[$bangunan_name]	= array(
							"jumlah"			=> number_format($bangunan_luas),
							"nilai_pasar"		=> number_format($bangunan_np),
							"nilai_likuidasi"	=> number_format($bangunan_nl)
						);
					}
				}
				
				//SARANA PELENGKAP
				$sarana_nl = 0;
				$sarana_np = 0;
				$this->db->select('luas, brb_rcn, nilai_pasar, nilai_likuidasi')
						 ->from('txn_sarana_pelengkap')
						 ->where('id_lokasi', $id_lokasi)
						 ->where('id_kertas_kerja', $id_kertas_kerja);
				$txn_sarana_pelengkap = $this->db->get()->row();

				// var_dump($id_kertas_kerja);

				if (!empty($txn_sarana_pelengkap)) {
					$sarana_nl	= $txn_sarana_pelengkap->nilai_likuidasi;
					$sarana_np	= $txn_sarana_pelengkap->nilai_pasar;
				}
				
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
			
			$data["data_survey"]	= $data_survey;

			$this->load->library('Pdf');
			ob_start();
			$content	= $this->load->view("printpdf/ringkasan", $data, true);
			ob_clean(); 
			echo $content; return;
			
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
        
	function get_data_legalitas($id_lokasi)
	{
		$data_table	= array();
		$id_lokasi	= $id_lokasi;
		$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();
		$data_legalitas = array();
		$custom_data	= unserialize($lokasi->custom_data);
		$result_legalitas = array();
		if (($custom_data) && array_key_exists("data_legalitas", $custom_data))
		{
			$data_legalitas 	= $custom_data["data_legalitas"];
			$index = 0;
			foreach($data_legalitas as $item_legalitas)
			{
				$list_field	= $this->global_model->get_data("mst_field_objek", 1, array("condition"), array("multiple_data_legalitas"));
				$field_result = array();
				foreach ($list_field->result() as $item_field)
				{
					$name	= $item_field->nama;
					$data_value	= $this->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($lokasi->id, $item_field->id, $item_legalitas));

					if ($data_value->num_rows() == 1){
						$value	= $data_value->row()->jawab;
					}else{
						$value	= "";
					}
					$field_result[$name] = $value;
				}
				if ( count($field_result) > 0 ) {
					$result_legalitas[$index] = (object)$field_result;
				}
				$index++;
			}
		}
		//print_r($result_legalitas);
		$final_result = $result_legalitas;
		return $final_result;
	}        
}


