<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class peta_model extends CI_Model 
{
	
	function __construct() 
	{
		parent::__construct();
	}
	function get_list_lokasi($con = NULL, $extends = NULL, $except = NULL) {
		$where_sub = NULL;
		$where = "WHERE 1=1";

		if ( is_array($con) ) {
			foreach ($con as $key => $value) {
				switch ($key) {
					case 'jenis_objek':
						if ( is_array($value) && count($value) > 0 ) {
							$where_sub .= " AND (";
							foreach ($value as $jo) {
								$where_sub .= "id_jenis_objek = '$jo' OR ";
							}
							$where_sub = rtrim($where_sub, ' OR');
							$where_sub .= ")";
						}
						break;
					case 'provinsi':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_provinsi = '$value'";
						}
						break;
					case 'kota':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_kota = '$value'";
						}
						break;
					case 'kecamatan':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_kecamatan = '$value'";
						}
						break;
					case 'desa':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_desa = '$value'";
						}
						break;
					case 'tanggal_mulai':
						if ( !empty($value) ) {
							$where_sub .= " AND (tanggal_mulai >= '$value')";
						}
						break;
					case 'tanggal_selesai':
						if ( !empty($value) ) {
							$where_sub .= " AND (tanggal_mulai <= '$value')";
						}
						break;
					case 'luas_tanah_min':
						if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_tanah_sertifikat,UNSIGNED INTEGER) >= $value";
						}
						break;
					case 'luas_tanah_max':
						if ( $value >= 7000 ) {
							//$where .= " AND CONVERT(luas_tanah_sertifikat,UNSIGNED INTEGER) >= 7000";
						} else if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_tanah_sertifikat,UNSIGNED INTEGER) <= ".(int)$value;
						}
						break;
					case 'luas_bangunan_min':
						if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_bangunan_imb,UNSIGNED INTEGER) >= $value";
						}
						break;
					case 'luas_bangunan_max':
						if ( $value >= 7000 ) {
							//$where .= " AND CONVERT(luas_bangunan,UNSIGNED INTEGER) >= 7000";
						} else if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_bangunan_imb,UNSIGNED INTEGER) <= ".(int)$value;
						}
						break;
					case 'harga_min':
						if ( !empty($value) ) {
							$where .= " AND CONVERT(harga,UNSIGNED INTEGER) >= $value";
						}
						break;
					case 'harga_max':
						if ( $value >= 20000000000 ) {
							//$where .= " AND CONVERT(harga,UNSIGNED INTEGER) >= 20000000000";
						} else if ( !empty($value) ) {
							$where .= " AND CONVERT(harga,UNSIGNED INTEGER) <= ".(int)$value;
						}
						break;
				}
			}
		}			
		if ( !empty($except) && is_numeric($except) ) {
			$where_sub .= " AND A.id != ".$except;
		}
		if ( is_array($extends) ) {
			$where_sub .= " AND CONVERT(latitude,DECIMAL(25,20)) >= ".$extends['y1'];
			$where_sub .= " AND CONVERT(latitude,DECIMAL(25,20)) <= ".$extends['y2'];
			$where_sub .= " AND CONVERT(longitude,DECIMAL(25,20)) >= ".$extends['x1'];
			$where_sub .= " AND CONVERT(longitude,DECIMAL(25,20)) <= ".$extends['x2'];
		}
		$sql = "SELECT *
				FROM (
					SELECT A.id AS id_lokasi, latitude, longitude, A.id,
					id_jenis_objek, A.id_pekerjaan,
					tanggal_mulai, tanggal_selesai,
					alamat, gang, rt, rw,
					D.nama AS provinsi,
					E.nama AS kota,
					F.nama AS kecamatan,
					G.nama AS desa,
					B.nama AS jenis_objek
					FROM mst_lokasi A
					LEFT JOIN (
						SELECT MAX(id_status) AS id_status, id_pekerjaan
						FROM txn_pekerjaan_status
						GROUP BY id_pekerjaan
					) MP ON A.id_pekerjaan = MP.id_pekerjaan
					LEFT JOIN mst_jenis_objek B ON A.id_jenis_objek = B.id
					LEFT JOIN mst_provinsi D ON A.id_provinsi = D.id
					LEFT JOIN mst_kota E ON A.id_kota = E.id
					LEFT JOIN mst_kecamatan F ON A.id_kecamatan = F.id
					LEFT JOIN mst_desa G ON A.id_desa = G.id
					WHERE MP.id_status >= 34 AND latitude IS NOT NULL AND longitude IS NOT NULL AND latitude != '' AND longitude != ''
					$where_sub
					order by id desc
				) lokasi
				$where
				";
				//echo nl2br($sql);
		$query = $this->db->query($sql);
		if ( is_object($query) ) {
			return $query->result();
		}
		return array();
	}
	function get_list_paging_lokasi($con = NULL, $page = 1, $limit = 10) {
		$index = ($page*$limit)-$limit;
		$where_sub = NULL;
		$where = "WHERE 1=1";

		if ( is_array($con) ) {
			foreach ($con as $key => $value) {
				switch ($key) {
					case 'jenis_objek':
						if ( is_array($value) && count($value) > 0 ) {
							$where_sub .= " AND (";
							foreach ($value as $jo) {
								$where_sub .= "id_jenis_objek = '$jo' OR ";
							}
							$where_sub = rtrim($where_sub, ' OR');
							$where_sub .= ")";
						}
						break;
					case 'provinsi':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_provinsi = '$value'";
						}
						break;
					case 'kota':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_kota = '$value'";
						}
						break;
					case 'kecamatan':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_kecamatan = '$value'";
						}
						break;
					case 'desa':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_desa = '$value'";
						}
						break;
					case 'tanggal_mulai':
						if ( !empty($value) ) {
							$where_sub .= " AND (tanggal_mulai >= '$value')";
						}
						break;
					case 'tanggal_selesai':
						if ( !empty($value) ) {
							$where_sub .= " AND (tanggal_mulai <= '$value')";
						}
						break;
					case 'luas_tanah_min':
						if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_tanah_sertifikat,UNSIGNED INTEGER) >= $value";
						}
						break;
					case 'luas_tanah_max':
						if ( $value >= 7000 ) {
							//$where .= " AND CONVERT(luas_tanah_sertifikat,UNSIGNED INTEGER) >= 7000";
						} else if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_tanah_sertifikat,UNSIGNED INTEGER) <= ".(int)$value;
						}
						break;
					case 'luas_bangunan_min':
						if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_bangunan_imb,UNSIGNED INTEGER) >= $value";
						}
						break;
					case 'luas_bangunan_max':
						if ( $value >= 7000 ) {
							//$where .= " AND CONVERT(luas_bangunan,UNSIGNED INTEGER) >= 7000";
						} else if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_bangunan_imb,UNSIGNED INTEGER) <= ".(int)$value;
						}
						break;
					case 'harga_min':
						if ( !empty($value) ) {
							$where .= " AND CONVERT(harga,UNSIGNED INTEGER) >= $value";
						}
						break;
					case 'harga_max':
						if ( $value >= 20000000000 ) {
							//$where .= " AND CONVERT(harga,UNSIGNED INTEGER) >= 20000000000";
						} else if ( !empty($value) ) {
							$where .= " AND CONVERT(harga,UNSIGNED INTEGER) <= ".(int)$value;
						}
						break;
				}
			}
		}	
		$sql = "SELECT *
				FROM (
					SELECT A.id AS id_lokasi, latitude, longitude, A.id,
					id_jenis_objek, A.id_pekerjaan,
					tanggal_mulai, tanggal_selesai,
					alamat, gang, rt, rw,
					D.nama AS provinsi,
					E.nama AS kota,
					F.nama AS kecamatan,
					G.nama AS desa,
					B.nama AS jenis_objek
					FROM mst_lokasi A
					LEFT JOIN (
						SELECT MAX(id_status) AS id_status, id_pekerjaan
						FROM txn_pekerjaan_status
						GROUP BY id_pekerjaan
					) MP ON A.id_pekerjaan = MP.id_pekerjaan
					LEFT JOIN mst_jenis_objek B ON A.id_jenis_objek = B.id
					LEFT JOIN mst_provinsi D ON A.id_provinsi = D.id
					LEFT JOIN mst_kota E ON A.id_kota = E.id
					LEFT JOIN mst_kecamatan F ON A.id_kecamatan = F.id
					LEFT JOIN mst_desa G ON A.id_desa = G.id
					WHERE MP.id_status >= 34 AND latitude IS NOT NULL AND longitude IS NOT NULL AND latitude != '' AND longitude != ''
					$where_sub
					order by id desc
				) lokasi
				$where
				limit $index, $limit
				";
				//echo nl2br($sql);
		$query = $this->db->query($sql);
		if ( is_object($query) ) {
			return $query->result();
		}
		return array();
	}
	function count_obyek($con) {
		$where_sub = NULL;
		$where = "WHERE 1=1";

		if ( is_array($con) ) {
			foreach ($con as $key => $value) {
				switch ($key) {
					case 'jenis_objek':
						if ( is_array($value) && count($value) > 0 ) {
							$where_sub .= " AND (";
							foreach ($value as $jo) {
								$where_sub .= "id_jenis_objek = '$jo' OR ";
							}
							$where_sub = rtrim($where_sub, ' OR ');
							$where_sub .= ")";
						}
						break;
					case 'provinsi':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_provinsi = '$value'";
						}
						break;
					case 'kota':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_kota = '$value'";
						}
						break;
					case 'kecamatan':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_kecamatan = '$value'";
						}
						break;
					case 'desa':
						if ( !empty($value) ) {
							$where_sub .= " AND A.id_desa = '$value'";
						}
						break;
					case 'tanggal_mulai':
						if ( !empty($value) ) {
							$where_sub .= " AND (tanggal_mulai >= '$value')";
						}
						break;
					case 'tanggal_selesai':
						if ( !empty($value) ) {
							$where_sub .= " AND (tanggal_mulai <= '$value')";
						}
						break;
					case 'luas_tanah_min':
						if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_tanah_sertifikat,UNSIGNED INTEGER) >= $value";
						}
						break;
					case 'luas_tanah_max':
						if ( $value >= 7000 ) {
							//$where .= " AND CONVERT(luas_tanah_sertifikat,UNSIGNED INTEGER) >= 7000";
						} else if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_tanah_sertifikat,UNSIGNED INTEGER) <= ".(int)$value;
						}
						break;
					case 'luas_bangunan_min':
						if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_bangunan_imb,UNSIGNED INTEGER) >= $value";
						}
						break;
					case 'luas_bangunan_max':
						if ( $value >= 7000 ) {
							//$where .= " AND CONVERT(luas_bangunan,UNSIGNED INTEGER) >= 7000";
						} else if ( !empty($value) ) {
							$where .= " AND CONVERT(luas_bangunan_imb,UNSIGNED INTEGER) <= ".(int)$value;
						}
						break;
					case 'harga_min':
						if ( !empty($value) ) {
							$where .= " AND CONVERT(harga,UNSIGNED INTEGER) >= $value";
						}
						break;
					case 'harga_max':
						if ( $value >= 20000000000 ) {
							//$where .= " AND CONVERT(harga,UNSIGNED INTEGER) >= 20000000000";
						} else if ( !empty($value) ) {
							$where .= " AND CONVERT(harga,UNSIGNED INTEGER) <= ".(int)$value;
						}
						break;
				}
			}
		}	
		$sql = "SELECT COUNT(*) AS total
				FROM (
					SELECT A.id AS id_lokasi, latitude, longitude, A.id,
					id_jenis_objek, A.id_pekerjaan,
					tanggal_mulai, tanggal_selesai,
					alamat, gang, rt, rw,
					D.nama AS provinsi,
					E.nama AS kota,
					F.nama AS kecamatan,
					G.nama AS desa,
					B.nama AS jenis_objek
					FROM mst_lokasi A
					LEFT JOIN (
						SELECT MAX(id_status) AS id_status, id_pekerjaan
						FROM txn_pekerjaan_status
						GROUP BY id_pekerjaan
					) MP ON A.id_pekerjaan = MP.id_pekerjaan
					LEFT JOIN mst_jenis_objek B ON A.id_jenis_objek = B.id
					LEFT JOIN mst_provinsi D ON A.id_provinsi = D.id
					LEFT JOIN mst_kota E ON A.id_kota = E.id
					LEFT JOIN mst_kecamatan F ON A.id_kecamatan = F.id
					LEFT JOIN mst_desa G ON A.id_desa = G.id
					WHERE MP.id_status >= 34 AND latitude IS NOT NULL AND longitude IS NOT NULL AND latitude != '' AND longitude != ''
					$where_sub
					order by id desc
				) lokasi
				$where
				";
				//echo nl2br($sql);
		$query = $this->db->query($sql);
		if ( is_object($query) ) {
			$row = $query->row();
			if ( is_object($row) ) {
				return $row->total;
			}
		}
		return 0;
	}
	function get_list_pembanding($id_lokasi) {
		$this->db->select('foto_1, foto_2,
						   alamat, latitude, longitude,
						   luas_tanah,
						   luas_bangunan,
						   nilai_pasar, nilai_likuidasi', false)
			     ->from('txn_data_banding')	
			     ->where('id_lokasi', $id_lokasi)
			     ->where('jenis_pembanding > 0')
			     ->where('latitude IS NOT NULL AND longitude IS NOT NULL');
		$query = $this->db->get();
		if ( is_object($query) ) {
			$result = $query->result();
			return $result;
		}
		return array();
	}
	function get_foto_objek($id_lokasi) {
		$this->db->select('lampiran')
				 ->from('txn_lampiran')
				 ->where('id_lokasi', $id_lokasi)
				 ->where('jenis_lampiran', 'Foto Properti')
				 ->limit(2);
		$query = $this->db->get();
		if ( is_object($query) ) {
			$row = $query->result();
			return $row;
		}
		return array();
	}/*
	function get_data_pembanding($id_jenis_objek, $id, $pembanding_ke = 1) {
		$this->db->select('A.*, B.nama')
				 ->from('txn_lokasi_data A')
				 ->join('mst_field_objek B', 'A.id_field = B.id')
				 ->where('A.id_lokasi', $id)
				 ->like('B.nama', 'pembanding')
				 ->where('A.keterangan', $pembanding_ke);
		$query = $this->db->get();
		$result_array = array(
			'foto_1'   => NULL,
			'foto_2'   => NULL,
			'alamat' => NULL,
			'harga'  => NULL,
			'luas_tanah' => NULL,
			'luas_bangunan' => NULL
		);
		if ( is_object($query) ) {
			$result = $query->result();
			foreach ($result as $res) {
				//Foto
				if ( $res->nama == 'pembanding_1' && in_array($id_jenis_objek, array(1,2,3,5,6,7)) ) {
					$result_array['foto_1'] = $res->jawab;
				}
				if ( $res->nama == 'pembanding_2' && in_array($id_jenis_objek, array(1,2,3,5)) ) {
					$result_array['foto_2'] = $res->jawab;
				}

				//Alamat
				if ( $res->nama == 'pembanding_7' && in_array($id_jenis_objek, array(1,2,5)) ) {
					$result_array['alamat'] = $res->jawab;
				}

				//Harga
				if ( $res->nama == 'pembanding_9' ) {
					$result_array['harga'] = $res->jawab;
				}

				//Luas Tanah
				if ( $res->id_field == 260 ) {
					$result_array['luas_tanah'] = $res->jawab;
				}

				//Luas Bangunan
				if ( $res->id_field == 261 ) {
					$result_array['luas_bangunan'] = $res->jawab;
				}
			}
		}
		return $result_array;
	}

	function get_data_objek($id_jenis_objek, $id) {
		$sql = "SELECT alamat, gang, nomor, rt, rw, ";
		$query = $this->db->get();
		$result_array = array(
			'foto_1'   => NULL,
			'foto_2'   => NULL,
			'alamat' => NULL,
			'harga'  => NULL,
			'luas_tanah' => NULL,
			'luas_bangunan' => NULL
		);
		if ( is_object($query) ) {
			$result = $query->result();
			foreach ($result as $res) {
				//Foto
				if ( $res->nama == 'tanah_32' && in_array($id_jenis_objek, array(1,2,3,5,6,7)) ) {
					$result_array['foto_1'] = $res->jawab;
				}

				//Alamat
				$result_array['alamat'] = $res->alamat;

				//Harga
				$total_harga = 0;
				if ( $res->nama == 'tanah_65' ) {
					$total_harga = $total_harga + $res->jawab;
				}
				if ( $res->nama == 'bangunan_65' ) {
					$total_harga = $total_harga + $res->jawab;
				}
				$result_array['harga'] = $total_harga;

				//Luas Tanah
				if ( $res->id_field == 260 ) {
					$result_array['luas_tanah'] = $res->jawab;
				}

				//Luas Bangunan
				if ( $res->id_field == 261 ) {
					$result_array['luas_bangunan'] = $res->jawab;
				}
			}
		}
		return $result_array;
	} */
}
?>