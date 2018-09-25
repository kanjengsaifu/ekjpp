<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peta extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('peta_model');
		$this->load->model('global_model');
	}

	function index()
	{
		$config			= $this->spmlib->get_config();
		//Filter
		$jenis_objek    = $this->input->get('jenis_objek');
		$harga_min		= $this->input->get('harga_min');
		$harga_min 		= empty($harga_min) ? 0 : $harga_min;
		$harga_max		= $this->input->get('harga_max');
		$harga_max      = empty($harga_max) ? 20000000000 : $harga_max;
		$luas_bangunan_min = $this->input->get('luas_bangunan_min');
		$luas_bangunan_max = $this->input->get('luas_bangunan_max');
		$luas_bangunan_min 		= empty($luas_bangunan_min) ? 0 : $luas_bangunan_min;
		$luas_bangunan_max      = empty($luas_bangunan_max) ? 7000 : $luas_bangunan_max;
		$luas_tanah_min = $this->input->get('luas_tanah_min');
		$luas_tanah_max = $this->input->get('luas_tanah_max');
		$luas_tanah_min 		= empty($luas_tanah_min) ? 0 : $luas_tanah_min;
		$luas_tanah_max      = empty($luas_tanah_max) ? 7000 : $luas_tanah_max;
		$provinsi 	= $this->input->get('provinsi');
		$kota 		= $this->input->get('kota');
		$kecamatan	= $this->input->get('kecamatan');
		$desa		= $this->input->get('desa');
		$tanggal_pekerjaan = $this->input->get('tanggal_pekerjaan');
		$expl_tgl = explode('-', $tanggal_pekerjaan);
		$tanggal_mulai = $tanggal_selesai = '';

		if ( !empty($tanggal_pekerjaan) && count($expl_tgl) > 1 ) {
			$tanggal_mulai = date('Y-m-d', strtotime(trim($expl_tgl[0])));
			$tanggal_selesai = date('Y-m-d', strtotime(trim($expl_tgl[1])));
		}
		//echo $tanggal_mulai.' - '.$tanggal_selesai;
		$is_filter = false;
		$list_jenis_objek = $this->global_model->get_list('mst_jenis_objek');
		if ( empty($jenis_objek) && count($list_jenis_objek) > 0 ) {
			$jenis_objek = $list_jenis_objek[0]->id;
		}

		if ( !empty($provinsi) && !empty($kota) )
			$is_filter = true;
		$list_harga = array(
			50000000,
			100000000,
			200000000,
			500000000,
			1000000000,
			2000000000,
			5000000000,
			10000000000,
			20000000000,
			50000000000,
			100000000000,
			200000000000,
			500000000000,
			1000000000000,
			2000000000000,
			5000000000000,
			10000000000000,
			20000000000000,
		);
		$con = array(
			'jenis_objek'		=> $jenis_objek,
			'provinsi'	=> $provinsi,
			'kota'		=> $kota,
			'kecamatan'	=> $kecamatan,
			'desa'		=> $desa,
			'luas_tanah_min'	=> $luas_tanah_min,
			'luas_tanah_max'	=> $luas_tanah_max,
			'luas_bangunan_min'	=> $luas_bangunan_min,
			'luas_bangunan_max'	=> $luas_bangunan_max,
			'harga_min'			=> $harga_min,
			'harga_max'			=> $harga_max,
			'tanggal_mulai'		=> $tanggal_mulai,
			'tanggal_selesai'	=> $tanggal_selesai
		);
		$lokasi = $this->peta_model->get_list_lokasi($con);
		$list_lokasi = array();
		$index = 0;
		foreach ($lokasi as $l) {
			$list_lokasi[$index] = (array)$l;
			$icon_name = 'tanah';
			switch ($l->id_jenis_objek) {
				case 1:
					$icon_name = 'tanah';
					break;
				case 2:
					$icon_name = 'tanah';
					break;
				case 3:
					$icon_name = 'kios';
					break;
				case 5:
					$icon_name = 'ruko';
					break;
				case 6:
					$icon_name = 'apartemen';
					break;
			}
			$string_alamat = $l->alamat;
			if ( !empty($l->gang) ) {
				$string_alamat .= ' Gang '.$l->gang;
			}
			if ( !empty($l->nomor) ) {
				$string_alamat .= ' No. '.$l->nomor;
			}
			if ( !empty($l->rt) ) {
				$string_alamat .= ' RT '.$l->rt;
			}
			if ( !empty($l->rw) ) {
				$string_alamat .= ' RW '.$l->rw;
			}
			if ( !empty($l->desa) ) {
				$string_alamat .= ', Kel '.$l->desa;
			}
			if ( !empty($l->kecamatan) ) {
				$string_alamat .= ', Kec '.$l->kecamatan;
			}
			if ( !empty($l->kota) ) {
				$string_alamat .= ', '.$l->kota;
			}
			if ( !empty($l->provinsi) ) {
				$string_alamat .= ', '.$l->provinsi;
			}
			$list_foto_objek = $this->peta_model->get_foto_objek($l->id);
			$foto_1 = $foto_2 = '';
			foreach ($list_foto_objek as $fto) {
				if ( empty($foto_1) )
					$foto_1 = $fto->lampiran;
				else if ( empty($foto_2) )
					$foto_2 = $fto->lampiran;
			}
			$nilai = get_nilai_pasar_objek($l->id_lokasi, $l->id_jenis_objek);
			$detail_objek = array(
				'foto_1'   => $foto_1,
				'foto_2'   => $foto_2,
				'alamat' => $string_alamat,
				'harga'  => $nilai['nilai_pasar'],
				'luas_tanah' => $l->luas_tanah_sertifikat,
				'luas_bangunan' => $l->luas_bangunan_imb,
				'tanggal_pekerjaan' => $l->tanggal_mulai,
				'icon' => $icon_name.'.png'
			);
			$list_lokasi[$index]['data_objek'] = $detail_objek;
			$list_data_banding = $this->peta_model->get_list_pembanding($l->id);
			foreach ($list_data_banding as $dbg) {
				$detail_pembanding = array(
					'latitude' => $dbg->latitude,
					'longitude' => $dbg->longitude, 
					'foto_1'   => preg_replace("/[\n\r]/","",$dbg->foto_1),
					'foto_2'   => preg_replace("/[\n\r]/","",$dbg->foto_2),
					'alamat' => $dbg->alamat,
					'harga'  => $dbg->harga,
					'luas_tanah' => $dbg->luas_tanah,
					'luas_bangunan' => $dbg->luas_bangunan,
					'tanggal_pekerjaan' => $l->tanggal_mulai,
					'icon' => $icon_name.'_pembanding.png'
				);
				$list_lokasi[$index]['data_pembanding'][] = $detail_pembanding;
			}
			$list_lokasi[$index]['link_detil'] = base_url().'pekerjaan/detail/'.base64_encode($l->id_pekerjaan).'?role=lembar';
			$index++;
		}
		$data['jenis_objek'] = $jenis_objek;
		$data['harga_min'] = $harga_min;
		$data['harga_max'] = $harga_max;
		$data['luas_bangunan_min'] = $luas_bangunan_min;
		$data['luas_bangunan_max'] = $luas_bangunan_max;
		$data['luas_tanah_min'] = $luas_tanah_min;
		$data['luas_tanah_max'] = $luas_tanah_max;
		$data['tanggal_mulai'] = $tanggal_mulai;
		$data['tanggal_selesai'] = $tanggal_selesai;
		$data['tanggal_pekerjaan'] = $tanggal_pekerjaan;
		$data['list_jenis_objek'] = $list_jenis_objek;
		$data['list_harga'] = $list_harga;
		$data['is_filter'] = $is_filter;
		$data['list_lokasi'] = $list_lokasi;
		$data['provinsi'] 	= $provinsi;
		$data['kota'] 		= $kota;
		$data['kecamatan']	= $kecamatan;
		$data['desa']		= $desa;
		$data["title"] 	= "Peta";

		//$data["_template"]	= $this->template->generate_template("user", $data);
		$content = $this->load->view("peta/peta", $data, true);
		$template = array(
			'content'		=> $content,
		);
		$this->load->view('template/top_menu', $template);
	}
	function new_peta() {
		$list_jenis_objek = $this->global_model->get_list('mst_jenis_objek');
		$data['list_jenis_objek'] = $list_jenis_objek;
		$content = $this->load->view("peta/new_peta", $data, true);
		$template = array(
			'content'		=> $content,
			'title'			=> 'Peta'
		);
		$this->load->view('template/top_menu', $template);
	}
	function list_obyek() {
		$jenis_objek    = $this->input->get('jenis_objek');
		$harga_min		= $this->input->get('harga_min');
		$harga_min 		= empty($harga_min) ? 0 : $harga_min;
		$harga_max		= $this->input->get('harga_max');
		$harga_max      = empty($harga_max) ? 20000000000 : $harga_max;
		$luas_bangunan_min = $this->input->get('luas_bangunan_min');
		$luas_bangunan_max = $this->input->get('luas_bangunan_max');
		$luas_bangunan_min 		= empty($luas_bangunan_min) ? 0 : $luas_bangunan_min;
		$luas_bangunan_max      = empty($luas_bangunan_max) ? 7000 : $luas_bangunan_max;
		$luas_tanah_min = $this->input->get('luas_tanah_min');
		$luas_tanah_max = $this->input->get('luas_tanah_max');
		$luas_tanah_min 		= empty($luas_tanah_min) ? 0 : $luas_tanah_min;
		$luas_tanah_max      = empty($luas_tanah_max) ? 7000 : $luas_tanah_max;
		$provinsi 	= $this->input->get('provinsi');
		$kota 		= $this->input->get('kota');
		$kecamatan	= $this->input->get('kecamatan');
		$desa		= $this->input->get('desa');
		$tanggal_pekerjaan = $this->input->get('tanggal_pekerjaan');
		$expl_tgl = explode('-', $tanggal_pekerjaan);
		$tanggal_mulai = $tanggal_selesai = '';

		if ( !empty($tanggal_pekerjaan) && count($expl_tgl) > 1 ) {
			$tanggal_mulai = date('Y-m-d', strtotime(trim($expl_tgl[0])));
			$tanggal_selesai = date('Y-m-d', strtotime(trim($expl_tgl[1])));
		}
		//echo $tanggal_mulai.' - '.$tanggal_selesai;
		$is_filter = false;
		$list_jenis_objek = $this->global_model->get_list('mst_jenis_objek');
		
		if ( !empty($provinsi) && !empty($kota) )
			$is_filter = true;
		$list_harga = array(
			50000000,
			100000000,
			200000000,
			500000000,
			1000000000,
			2000000000,
			5000000000,
			10000000000,
			20000000000,
			50000000000,
			100000000000,
			200000000000,
			500000000000,
			1000000000000,
			2000000000000,
			5000000000000,
			10000000000000,
			20000000000000,
		);
		$filter_jenis_objek = array();
		if ( !empty($jenis_objek) ) {
			$expl = explode(';', $jenis_objek);
			foreach ($expl as $jo) {
				if ( !empty($jo) && is_numeric($jo)) {
					$filter_jenis_objek[] = $jo;
				}
			}
		}
		$con = array(
			'jenis_objek'		=> $filter_jenis_objek,
			'provinsi'	=> $provinsi,
			'kota'		=> $kota,
			'kecamatan'	=> $kecamatan,
			'desa'		=> $desa,
			'luas_tanah_min'	=> $luas_tanah_min,
			'luas_tanah_max'	=> $luas_tanah_max,
			'luas_bangunan_min'	=> $luas_bangunan_min,
			'luas_bangunan_max'	=> $luas_bangunan_max,
			'harga_min'			=> $harga_min,
			'harga_max'			=> $harga_max,
			'tanggal_mulai'		=> $tanggal_mulai,
			'tanggal_selesai'	=> $tanggal_selesai
		);
		$limit = 10;
		$page = $this->input->get('page');
		if ( !is_numeric($page) || $page < 2 )
			$page = 1;
		$lokasi = $this->peta_model->get_list_paging_lokasi($con, $page, $limit);
		$count_obyek = $this->peta_model->count_obyek($con);
		$jum_page = empty($count_obyek) ? 0 : ceil($count_obyek/$limit);
		$data = array(
			'lokasi'	=> $lokasi,
			'data_ke'		=> count($lokasi) < 1 ? 0 : (($page*$limit)-$limit)+1,
			'page'		=> $page,
			'count_obyek' => $count_obyek,
			'jum_page'	=> $jum_page
		);
		$this->load->view('peta/list.php', $data);
	}
	function get_info($is_pembanding, $pembanding_ke, $id_lokasi, $id_jenis_objek) {
		$detail = array();
		if ( $is_pembanding == 1 ) {
			$detail = $this->peta_model->get_data_pembanding($id_jenis_objek, $id_lokasi, $pembanding_ke);
		} else {
			$detail = $this->peta_model->get_data_objek($id_jenis_objek, $id_lokasi);
		}
		$detail;
	}	
	function get_data_lokasi() {
		$x1 = $this->input->get('x1');
		$x2 = $this->input->get('x2');
		$y1 = $this->input->get('y1');
		$y2 = $this->input->get('y2');
		$except = $this->input->get('except');
		$jenis_objek = $this->input->get('jenis_objek');
		$filter_jenis_objek = array();
		if ( !empty($jenis_objek) ) {
			$expl = explode(';', $jenis_objek);
			foreach ($expl as $jo) {
				if ( !empty($jo) && is_numeric($jo)) {
					$filter_jenis_objek[] = $jo;
				}
			}
		}
		$con = array(
			'jenis_objek'	=> $filter_jenis_objek
		);
		$extent =  array(
			'x1'	=> $x1,
			'x2'	=> $x2,
			'y1'	=> $y1,
			'y2'	=> $y2
		);
		$lokasi = $this->peta_model->get_list_lokasi($con, $extent, $except);
		$list_lokasi = array();
		$index = 0;
		$result_location = array();
		foreach ($lokasi as $item) {
			$list_foto_objek = $this->peta_model->get_foto_objek($item->id);
			$foto = $foto_2 = NULL;
			foreach ($list_foto_objek as $fo) {
				if ( empty($foto) ) {
					$foto = $fo->lampiran;
				} else if ( empty($foto_2) ) 
					$foto_2 = $fo->foto_2;
			}
			if ( !empty($foto) && !file_exists('./asset/file/'.$foto) )
				$foto = NULL;
			if ( !empty($foto_2) && !file_exists('./asset/file/'.$foto_2) )
				$foto_2 = NULL;
			if ( empty($foto) )
				$image_src = base_url().'asset/images/property_icon.png';
			else
				$image_src = base_url().'asset/file/'.$foto;

			$tanggal_penilaian = $item->tanggal_mulai;
			$tanggal_penilaian = empty($tanggal_penilaian) ? '-' : $tanggal_penilaian;

			$alamat = $item->alamat;
			$alamat .= empty($item->gang) ? NULL : ' Gang '.$item->gang;
			$alamat .= empty($item->nomor) ? NULL : ' No. '.$item->nomor;
			$alamat .= empty($item->rt) ? NULL : ' RT '.$item->rt;
			$alamat .= empty($item->rw) ? NULL : ' RW '.$item->rw;
			$alamat .= empty($item->desa) ? NULL : ', '.$item->desa;
			$alamat .= empty($item->kecamatan) ? NULL : ', '.$item->kecamatan;
			$alamat .= empty($item->kota) ? NULL : ', '.$item->kota;
			$alamat .= empty($item->provinsi) ? NULL : ', '.$item->provinsi;
			$label_luas_tanah = 'Luas Tanah';
			$label_luas_bangunan = 'Luas Bangunan';
			if ( $item->id_jenis_objek == 6 ) {
				$label_luas_bangunan = 'Luas Ruang';
			}
			$icon_name = 'tanah';
					switch ($item->id_jenis_objek) {
						case 1:
							$icon_name = 'tanah';
							break;
						case 2:
							$icon_name = 'tanah';
							break;
						case 3:
							$icon_name = 'kios';
							break;
						case 5:
							$icon_name = 'ruko';
							break;
						case 6:
							$icon_name = 'apartemen';
							break;
						default:
							$icon_name = 'apartemen';
							break;
					}
			$data_obyek = get_nilai_pasar_objek($item->id, $item->id_jenis_objek);
			$list_pembanding = $this->peta_model->get_list_pembanding($item->id);
			
			$result_location[] = array(
				'id'	=> $item->id,
				'type'	=> 'obyek',
				'latitude' => $item->latitude,
				'longitude' => $item->longitude,
				'jenis_objek'	=> $item->jenis_objek,
				'foto_1'		=> preg_replace("/[\n\r]/","",$foto),
				'foto_2'		=> preg_replace("/[\n\r]/","",$foto_2),
				'icon'	=> $icon_name.'.png',
				'tanggal_penilaian'	=> $tanggal_penilaian,
				'alamat'	=> addslashes($alamat),
				'luas_tanah'	=> empty($data_obyek['luas_tanah']) ? '-' : $data_obyek['luas_tanah'],
				'luas_bangunan'	=> empty($data_obyek['luas_bangunan']) ? '-' : $data_obyek['luas_bangunan'],
				'label_tanah'	=> empty($label_luas_tanah) ? '-' : $label_luas_tanah,
				'label_bangunan' => empty($label_luas_bangunan) ? '-' : $label_luas_bangunan,
				'nilai_pasar'	=> $data_obyek['nilai_pasar'],
				'nilai_likuidasi'	=> $data_obyek['nilai_likuidasi']
			);
			foreach ($list_pembanding as $lp) {
				$result_location[] = array(
					'id'	=> $item->id,
					'type'	=> 'banding',
					'latitude' => $lp->latitude,
					'longitude' => $lp->longitude,
					'jenis_objek'	=> $item->jenis_objek,
					'foto_1'		=> preg_replace("/[\n\r]/","",$lp->foto_1),
					'foto_2'		=> preg_replace("/[\n\r]/","",$lp->foto_2),
					'icon'	=> $icon_name.'_pembanding.png',
					'tanggal_penilaian'	=> $tanggal_penilaian,
					'alamat'	=> addslashes($lp->alamat),
					'luas_tanah'	=> empty($lp->luas_tanah) ? '-' : $lp->luas_tanah,
					'luas_bangunan'	=> empty($lp->luas_bangunan) ? '-' : $lp->luas_bangunan,
					'label_tanah'	=> $label_luas_tanah,
					'label_bangunan' => $label_luas_bangunan,
					'nilai_pasar'	=> $lp->nilai_pasar,
					'nilai_likuidasi'	=> $lp->nilai_likuidasi
				);
			}
			$index++;
		}
		echo json_encode((array)$result_location);
	}
}
?>