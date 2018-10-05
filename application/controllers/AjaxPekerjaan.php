<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajaxpekerjaan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model("new/pekerjaan_model", "pekerjaan_model_new");
	}
	function get_data_pekerjaan()
	{
		$type			= $_POST["type"];
		$page			= $_POST["page"];
		$filter_keyword	= trim($_POST["keyword"]);
		$filter_field	= trim($_POST["field"]);
		$perpage		= $_POST["perpage"];

		$user			= $this->auth->get_data_login();

		$query_generate	= $this->generate_query_pekerjaan($_POST, $user);

		$query_list		= $query_generate["query_list"];
		$query_count	= $query_generate["query_count"];

		$list_data	= $this->global_model->get_by_query($query_list);
		// var_dump($query_list); exit();

		$total_data	= $this->global_model->get_by_query($query_count)->num_rows();
		$data_table	= array();
		$i 			= ($perpage * ($page)) - ($perpage - 1);

		// var_dump($this->global_model->db->last_query()); exit();
		
		foreach ($list_data->result() as $item_data)
		{
			// Status
			{
				$mst_status	= $this->global_model->get_data("mst_status", 1, array("id"), array($item_data->id_status))->row();
				$list_dot	= explode("-", $mst_status->status_step);
				$color		= array(
					"merah"	=> "red",
					"kuning"	=> "yellow",
					"hijau"		=> "green"
				);

				$status	= "<div class='text-center'>";

				for($a = 0; $a < count($list_dot); $a++)
				{
					$status	.= "<span class='badge bg-".$color[trim($list_dot[$a])]."'>".($a + 1)."</span>";
				}
				$status .= "</div>";
			}

			$action	= "";
			$action	.= "<div class='text-center'>";
			$action .= "<a href='".base_url()."pekerjaan/detail/".base64_encode($item_data->id)."'><span class='badge bg-blue'>PROSES</span></a> ";

			if ($user["id_group"] == 2)
			{
				$action .= "<a href='".base_url()."pekerjaan/log/".base64_encode($item_data->id)."'><span class='badge bg-blue'>LOG</span></a>";
				$action .= "<a href='#' class='hapus-pekerjaan' data-id='".$item_data->id."'><span class='badge bg-red'>HAPUS</span></a>";
			}

			$action	.= "</div>";

			$data_table[$i]["nama"]					= $item_data->nama;
			$data_table[$i]["nama_klien"]			= $item_data->nama_klien;
			$data_table[$i]["tanggal_penerimaan"]	= "<div class='text-center'>".format_datetime($item_data->tanggal_penerimaan)."</div>";
			$data_table[$i]["pic"]			= "<strong>".$item_data->nama_group . "</strong> <span>(".$item_data->sub_status.")</span>";
			$data_table[$i]["status"]				= $status;
			$data_table[$i]["action"]				= $action;

			$i++;
		}


		$return		= array(
			"data_table"	=> $data_table,
			"data_total"	=> $total_data,
			"data_paging"	=> $this->generate_paging(($page), ceil($total_data / $perpage))
		);
		echo json_encode($return);
	}
	function get_data_objek()
	{
		$type			= $_POST["type"];
		$page			= $_POST["page"];
		$filter_keyword	= trim($_POST["keyword"]);
		$perpage		= $_POST["perpage"];

		$table_name		= "view_lokasi";
		$primary_key	= "id";

		// Query

		if (!empty($filter_keyword))
		{
			$query_list		= "SELECT * FROM ".$table_name." WHERE

			`id` LIKE '%".$filter_keyword."%' OR
			`id_pekerjaan` LIKE '%".$filter_keyword."%' OR
			`nama_jenis_objek` LIKE '%".$filter_keyword."%' OR
			`kode` LIKE '%".$filter_keyword."%' OR
			`alamat` LIKE '%".$filter_keyword."%' OR
			`id_provinsi` LIKE '%".$filter_keyword."%' OR
			`nama_provinsi` LIKE '%".$filter_keyword."%' OR
			`id_kota` LIKE '%".$filter_keyword."%' OR
			`nama_kota` LIKE '%".$filter_keyword."%' OR
			`id_kecamatan` LIKE '%".$filter_keyword."%' OR
			`nama_kecamatan` LIKE '%".$filter_keyword."%' OR
			`id_desa` LIKE '%".$filter_keyword."%' OR
			`nama_desa` LIKE '%".$filter_keyword."%' OR
			`tanggal` LIKE '%".$filter_keyword."%' OR
			`id_transportasi` LIKE '%".$filter_keyword."%' OR
			`nama_transportasi` LIKE '%".$filter_keyword."%' OR
			`id_user` LIKE '%".$filter_keyword."%' OR
			`nama_user` LIKE '%".$filter_keyword."%' OR
			`pengembangan` LIKE '%".$filter_keyword."%' OR
			`pemegang_hak` LIKE '%".$filter_keyword."%' OR
			`kepemilikan` LIKE '%".$filter_keyword."%' OR
			`jenis_sertifikat` LIKE '%".$filter_keyword."%' OR
			`no_sertifikat` LIKE '%".$filter_keyword."%' OR
			`luas_tanah` LIKE '%".$filter_keyword."%' OR
			`luas_bangunan` LIKE '%".$filter_keyword."%' OR
			`tanggal_mulai` LIKE '%".$filter_keyword."%' OR
			`tanggal_selesai` LIKE '%".$filter_keyword."%' OR
			`biaya` LIKE '%".$filter_keyword."%' OR
			`tanggal_survey` LIKE '%".$filter_keyword."%' OR
			`tanggal_laporan` LIKE '%".$filter_keyword."%' OR
			`created` LIKE '%".$filter_keyword."%' OR
			`updated` LIKE '%".$filter_keyword."%'

			ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";

			$query_count	= "SELECT * FROM ".$table_name." WHERE

			`id` LIKE '%".$filter_keyword."%' OR
			`id_pekerjaan` LIKE '%".$filter_keyword."%' OR
			`nama_jenis_objek` LIKE '%".$filter_keyword."%' OR
			`kode` LIKE '%".$filter_keyword."%' OR
			`alamat` LIKE '%".$filter_keyword."%' OR
			`id_provinsi` LIKE '%".$filter_keyword."%' OR
			`nama_provinsi` LIKE '%".$filter_keyword."%' OR
			`id_kota` LIKE '%".$filter_keyword."%' OR
			`nama_kota` LIKE '%".$filter_keyword."%' OR
			`id_kecamatan` LIKE '%".$filter_keyword."%' OR
			`nama_kecamatan` LIKE '%".$filter_keyword."%' OR
			`id_desa` LIKE '%".$filter_keyword."%' OR
			`nama_desa` LIKE '%".$filter_keyword."%' OR
			`tanggal` LIKE '%".$filter_keyword."%' OR
			`id_transportasi` LIKE '%".$filter_keyword."%' OR
			`nama_transportasi` LIKE '%".$filter_keyword."%' OR
			`id_user` LIKE '%".$filter_keyword."%' OR
			`nama_user` LIKE '%".$filter_keyword."%' OR
			`pengembangan` LIKE '%".$filter_keyword."%' OR
			`pemegang_hak` LIKE '%".$filter_keyword."%' OR
			`kepemilikan` LIKE '%".$filter_keyword."%' OR
			`jenis_sertifikat` LIKE '%".$filter_keyword."%' OR
			`no_sertifikat` LIKE '%".$filter_keyword."%' OR
			`luas_tanah` LIKE '%".$filter_keyword."%' OR
			`luas_bangunan` LIKE '%".$filter_keyword."%' OR
			`tanggal_mulai` LIKE '%".$filter_keyword."%' OR
			`tanggal_selesai` LIKE '%".$filter_keyword."%' OR
			`biaya` LIKE '%".$filter_keyword."%' OR
			`tanggal_survey` LIKE '%".$filter_keyword."%' OR
			`tanggal_laporan` LIKE '%".$filter_keyword."%' OR
			`created` LIKE '%".$filter_keyword."%' OR
			`updated` LIKE '%".$filter_keyword."%'



			";
		}
		else
		{
			$query_list		= "SELECT * FROM ".$table_name." ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
			$query_count	= "SELECT * FROM ".$table_name." ";
		}

		$list_data	= $this->global_model->get_by_query($query_list);
		$total_data	= $this->global_model->get_by_query($query_count)->num_rows();
		$data_table	= array();
		$i 			= ($perpage * ($page)) - ($perpage - 1);

		foreach ($list_data->result() as $item_data)
		{
			$action	= "<div class='text-center'><a href='".base_url()."objek/detail/".base64_encode($item_data->id)."'><span class='badge bg-blue'>LIHAT</span></a></div>";


			$data_table[$i]["nama_jenis_objek"]		= $item_data->nama_jenis_objek;
			$data_table[$i]["alamat"]			= $item_data->alamat;
			$data_table[$i]["tanggal_survey"]	= "<div class='text-center'>".$item_data->tanggal_survey."</div>";
			$data_table[$i]["luas_tanah"]		= "<div class='text-right'>".$item_data->luas_tanah."</div>";
			$data_table[$i]["luas_bangunan"]	= "<div class='text-right'>".$item_data->luas_bangunan."</div>";
			$data_table[$i]["tanggal_laporan"]	= "<div class='text-center'>".$item_data->tanggal_laporan."</div>";
			$data_table[$i]["action"]			= $action;

			$i++;
		}


		$return		= array(
			"data_table"	=> $data_table,
			"data_total"	=> $total_data,
			"data_paging"	=> $this->generate_paging(($page), ceil($total_data / $perpage))
		);
		echo json_encode($return);
	}
	function generate_query_pekerjaan($post, $user)
	{
		$type			= $post["type"];
		$page			= $post["page"];
		$filter_keyword	= trim($post["keyword"]);
		$filter_field	= trim($post["field"]);
		$perpage		= $post["perpage"];

		if ($user["id_group"] == 4) // Group Marketing
		{
			if (!empty($filter_keyword))
			{
				$query_list		= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' AND id_user = ".$user["id"]." ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				$query_count	= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' AND id_user = ".$user["id"]." ";
			}
			else
			{
				$query_list		= "SELECT * FROM view_pekerjaan WHERE id_user = ".$user["id"]." ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				$query_count	= "SELECT * FROM view_pekerjaan WHERE id_user = ".$user["id"]." ";
			}
		}
		else if ($user["id_group"] == 5) // Group Pimpinan KJPP
		{
			if (!empty($filter_keyword))
			{
				$query_list		= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				$query_count	= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' ";
			}
			else
			{
				$query_list		= "SELECT * FROM view_pekerjaan ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				$query_count	= "SELECT * FROM view_pekerjaan ";
			}
		}
		else if ($user["id_group"] == 6) // Project Manager
		{
			if (!empty($filter_keyword))
			{
				// $query_list		= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' AND id_user = ".$user["id"]." ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				// $query_count	= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' AND id_user = ".$user["id"]." ";
				$query_list		= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' AND (id_user IS NULL OR id_user = ".$user["id"].") ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				$query_count	= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' AND (id_user IS NULL OR id_user = ".$user["id"].") ";
			}
			else
			{
				// $query_list		= "SELECT * FROM view_pekerjaan WHERE id_user = ".$user["id"]." ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				// $query_count	= "SELECT * FROM view_pekerjaan WHERE id_user = ".$user["id"]." ";
				$query_list		= "SELECT * FROM view_pekerjaan WHERE (id_user IS NULL OR id_user = ".$user["id"].") ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				$query_count	= "SELECT * FROM view_pekerjaan WHERE (id_user IS NULL OR id_user = ".$user["id"].") ";
			}
		}
		else if ($user["id_group"] == 2 || $user["id_group"] == 3) // Admin
		{
			if (!empty($filter_keyword))
			{
				$query_list		= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				$query_count	= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' ";
			}
			else
			{
				$query_list		= "SELECT * FROM view_pekerjaan ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				$query_count	= "SELECT * FROM view_pekerjaan ";
			}
		}
		else
		{
			if (!empty($filter_keyword))
			{
				$query_list		= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' AND id_group = ".$user["id_group"]." ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				$query_count	= "SELECT * FROM view_pekerjaan WHERE `".$filter_field."` LIKE '%".$filter_keyword."%' AND id_group = ".$user["id_group"]." ";
			}
			else
			{
				$query_list		= "SELECT * FROM view_pekerjaan WHERE id_group = ".$user["id_group"]." ORDER BY created DESC LIMIT ".(($page - 1) * $perpage).", ".$perpage." ";
				$query_count	= "SELECT * FROM view_pekerjaan WHERE id_group = ".$user["id_group"]." ";
			}
		}

		return array("query_list" => $query_list, "query_count" => $query_count);
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
			$out .= "<li><a href='#'  class='btn-paging-pekerjaan' data='".($page-1)."' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-left'></i></span></a></li>";
		}
		else
		{
			$out .= "<li><a href='#'  class='btn-paging-pekerjaan' data='1' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-left'></i><i class='fa fa-angle-left'></i></span></a></li><li><a href='#'  class='btn-paging-pekerjaan' data='".($page-1)."' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-left'></i></span></a></li>";
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
				$out .= "<li><a href='#' class='btn-paging-pekerjaan' data='".$i."'>".$i."</a></li>";
			}
			else
			{
				$out .= "<li><a href='#' class='btn-paging' data='".$i."'>".$i. "</a></li>";
			}
		}

		if($page < $tpages)
		{
			$out .= "<li><a href='#'  class='btn-paging-pekerjaan' data='".($page+1)."' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-right'></i></span></a></li><li><a href='#'  class='btn-paging-pekerjaan' data='".($tpages)."' aria-label='Previous'><span aria-hidden='true'><i class='fa fa-angle-right'></i><i class='fa fa-angle-right'></i></span></a></li>";
		}
		else
		{
			$out .= "<li class='disabled'><a href='#' aria-label='Next'><span aria-hidden='true'><i class='fa fa-angle-right'></i></span></a></li>";
		}
		$out .= "</ul>";
		return $out;
	}
	function update_informasi_penilaian(){
			$id			= base64_decode($_POST["id"]);
			$result		= "error";
			$message	= "";
			$user		= $this->auth->get_data_login();
			$jenis_laporan		= $_POST["jenis_laporan"];
			$keterangan			= $_POST["keterangan"];
			if (empty($jenis_laporan)){
				$message	.= "Silahkan pilih jenis laporan.<br>";
			}

			if (empty($message))
			{
				$data				= array(
					"jenis_laporan"			=> $jenis_laporan,
					"keterangan"			=> $keterangan,
				);

				$this->global_model->update("mst_pekerjaan", 1, array("id"), array($id), $data);
				$result = "success";
				$message	= "Data berhasil disimpan";
			}
			echo json_encode(array("result" => $result, "message" => $message));
	}
	function update_pekerjaan()
	{
		$type 		= $_POST["type"];
		$id			= base64_decode($_POST["id"]);
		$result		= "error";
		$message	= "";
		$user		= $this->auth->get_data_login();

		if ($type == "step-1a")
		{
			$id_klien			= $_POST["id_klien"];
			$nama				= $_POST["nama"];
			$tanggal_penerimaan	= $_POST["tanggal_penerimaan"];
			$no_surat_tugas				= $_POST["no_surat_tugas"];
			$tgl_surat_tugas	= $_POST["tgl_surat_tugas"];
			$deskripsi			= $_POST["deskripsi"];
			$jenis_laporan	= $_POST["jenis_laporan"];
			$keterangan			= $_POST["keterangan"];
			

			$jenis_pemberi_tugas			= $_POST["jenis_pemberi_tugas"];
			$pemberi_tugas		= $_POST["pemberi_tugas"];



			$pemilik_properti			= $_POST["pemilik_properti"];
			$maksud_tujuan			= $_POST["maksud_tujuan"];
			$pengguna_laporan			= $_POST["pengguna_laporan"];
			$jenis_pengguna_laporan			= $_POST["jenis_pengguna_laporan"];
			$jenis_tujuan_pelaporan			= $_POST["jenis_tujuan_pelaporan"];
			$tujuan_pelaporan		= $_POST["tujuan_pelaporan"];
			$jenis_jasa		= $_POST["jenis_jasa"];

			if (empty($id_klien)){
				$message	.= "Silahkan pilih dulu Klien.<br>";
			}

			if (empty($nama)){
				$message	.= "Silahkan isi dulu Nama Pekerjaan.<br>";
			}
			if (empty($no_surat_tugas)){
				$message	.= "Silahkan isi dulu No Surat Tugas.<br>";
			}
			if (empty($tgl_surat_tugas)){
				$message	.= "Silahkan isi dulu Tgl Surat Tugas.<br>";
			}
			if (empty($jenis_laporan)){
				$message	.= "Silahkan isi dulu Jenis Laporan.<br>";
			}

			if (empty($pemberi_tugas)){
				$message	.= "Silahkan isi dulu Nama Pemberi Tugas.<br>";
			}
			if (empty($pemilik_properti)){
				$message	.= "Silahkan isi dulu Nama Pemilik Properti.<br>";
			}
			if (empty($maksud_tujuan)){
				$message	.= "Silahkan isi dulu Maksud Tujuan Penilaian.<br>";
			}
			if (empty($pengguna_laporan)){
				$message	.= "Silahkan isi dulu Pengguna Laporan.<br>";
			}
			if (empty($tujuan_pelaporan)){
				$message	.= "Silahkan isi dulu Tujuan Pelaporan.<br>";
			}
			if (empty($jenis_jasa)){
				$message	.= "Silahkan isi dulu Tujuan Jasa.<br>";
			}

			if (empty($message))
			{
				$data				= array(
					"id_klien"				=> $id_klien,
					"nama"					=> $nama,
					"tanggal_penerimaan" 	=> $tanggal_penerimaan,
					"no_surat_tugas"		=> $no_surat_tugas,
					"tgl_surat_tugas" 	=> $tgl_surat_tugas,
					"deskripsi"				=> $deskripsi,
					"jenis_laporan" 	=> $jenis_laporan,
					"keterangan"				=> $keterangan,
					"jenis_pemberi_tugas" => $jenis_pemberi_tugas,
					"jenis_pengguna_laporan" => $jenis_pengguna_laporan,
					"pemberi_tugas"		=> $pemberi_tugas,
					"pemilik_properti" => $pemilik_properti,
					"maksud_tujuan"			=> $maksud_tujuan,
					"pengguna_laporan"			=> $pengguna_laporan,
					"tujuan_pelaporan"		=> $tujuan_pelaporan,
					"jenis_jasa"		=> $jenis_jasa,
					"jenis_tujuan_pelaporan" => $jenis_tujuan_pelaporan,
				);



				$this->global_model->update("mst_pekerjaan", 1, array("id"), array($id), $data);


				//
				{
					$cek_status1	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 1));
					$data_txn1				= array(
						"id_pekerjaan"	=> $id,
						"id_status"		=> 1,
						"id_user"		=> $user["id"],
						"do"			=> 0
					);

					if ($cek_status1->num_rows() != 0)
					{
						$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 1), $data_txn1);
					}
					else
					{
						$this->global_model->save("txn_pekerjaan_status", $data_txn1);
					}
				}

				$result = "success";
			}
		}
		else if ($type == "step-1b")
		{
			$id_klien			= $_POST["id_klien"];
			$nama				= $_POST["nama"];
			$tanggal_penerimaan	= $_POST["tanggal_penerimaan"];
			$deskripsi			= $_POST["deskripsi"];
			$jenis_laporan		= $_POST["jenis_laporan"];
			$keterangan			= $_POST["keterangan"];

			// Cek Lokasi
			{
				$lokasi	= $this->global_model->get_data("mst_lokasi", 1, array("id_pekerjaan"), array($id));

				if ($lokasi->num_rows() == 0)
				{
					$message	.= "Objek Penilaian tidak boleh kosong.<br>";
				}
			}

			if (empty($jenis_laporan)){
				$message	.= "Silahkan pilih jenis laporan.<br>";
			}

			if (empty($message))
			{
				$data				= array(
					"id_klien"				=> $id_klien,
					"nama"					=> $nama,
					"tanggal_penerimaan" 	=> $tanggal_penerimaan,
					"deskripsi"				=> $deskripsi,
					"jenis_laporan"			=> $jenis_laporan,
					"keterangan"			=> $keterangan,
					"status"				=> 1
				);

				$this->global_model->update("mst_pekerjaan", 1, array("id"), array($id), $data);

				// Update txn_pekerjaan_status
				{
					// Step 1
					$cek_status1	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 1));
					$data_txn1				= array(
						"id_pekerjaan"	=> $id,
						"id_status"		=> 1,
						"id_user"		=> $user["id"],
						"do"			=> 1
					);

					if ($cek_status1->num_rows() != 0)
					{
						$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 1), $data_txn1);
					}
					else
					{
						$this->global_model->save("txn_pekerjaan_status", $data_txn1);
					}

					//Step 2
					$cek_status2	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 2));
					$data_txn2				= array(
						"id_pekerjaan"	=> $id,
						"id_status"		=> 2,
						"id_user"		=> $user["id"],
						"do"			=> 0
					);

					if ($cek_status2->num_rows() != 0)
					{
						$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 2), $data_txn2);
					}
					else
					{
						$this->global_model->save("txn_pekerjaan_status", $data_txn2);
					}
				}


				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}


		}

		// Submit Pekerjaan
		else if ($type == 5)
		{
			$id_status	= $type;
			// Cek Lokasi
			{
				$lokasi	= $this->global_model->get_data("mst_lokasi", 1, array("id_pekerjaan"), array($id));

				if ($lokasi->num_rows() == 0)
				{
					$message	.= "Objek Penilaian tidak boleh kosong.<br>";
				}
			}

			// Cek Lembar Kendali
			{
				$lembar_kendali	= $this->global_model->get_data("mst_lembar_kendali", 1, array("id_pekerjaan"), array($id));

				if ($lembar_kendali->num_rows() == 0)
				{
					$message	.= "Lembar Kendali Klien tidak boleh kosong.<br>";
				}
			}

			if (empty($message))
			{
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, ($id_status-1)));

				$data				= array(
					"id_pekerjaan"		=> $id,
					"id_status"			=> ($id_status-1),
					"id_user"			=> $user["id"],
					"do"				=> 1
				);

				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, ($id_status-1)), $data);
				}

				// Next Step
				{

					$data_next	= array(
						"id_pekerjaan"		=> $id,
						"id_status"			=> $id_status
					);
					$this->global_model->save("txn_pekerjaan_status", $data_next);
				}

				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}
		// Approve Approval Pimpinan KJPP
		else if ($type == 7)
		{
			$id_status		= 6;

			if (empty($message))
			{
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status));

				$data				= array(
					"id_pekerjaan"		=> $id,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"hasil"				=> $_POST["hasil"],
					"keterangan"		=> $_POST["keterangan"],
					"do"				=> 1
				);

				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status), $data);
				}

				// Next Step
				if ($_POST["hasil"] != "reject")
				{
					$lembar_kendali			= $this->global_model->get_data("mst_lembar_kendali", 2, array("id_pekerjaan", "step"), array($id, "LKK-2"))->row();
					$txn_lembar_kendali		= $this->global_model->get_data("txn_lembar_kendali_2", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();

					$data_next	= array(
						"id_pekerjaan"		=> $id,
						"id_status"			=> ($id_status + 1),
						"id_user"			=> $txn_lembar_kendali->project_manager
					);
					$this->global_model->save("txn_pekerjaan_status", $data_next);
				}

				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}
		// Approve Approval Project Manager
		else if ($type == 8)
		{
			$id_status		= 7;

			if (empty($message))
			{
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status));

				$data				= array(
					"id_pekerjaan"		=> $id,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"hasil"				=> $_POST["hasil"],
					"keterangan"		=> $_POST["keterangan"],
					"do"				=> 1
				);

				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status), $data);
				}



				// Next Step
				{
					$get_user_first_step	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 2))->row();

					if ($_POST["hasil"] == "reject")
					{
						$cek_lagi 	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 5), "id", "DESC", 0, 1)->row();
						$data_next	= array(
							"id_pekerjaan"		=> $id,
							"id_status"			=> 5,
							"id_user"			=> $cek_lagi->id_user
						);
					}
					else
					{
						$data_next	= array(
							"id_pekerjaan"		=> $id,
							"id_status"			=> ($id_status + 1),
							"id_user"			=> $get_user_first_step->id_user
						);
					}

					$this->global_model->save("txn_pekerjaan_status", $data_next);
				}

				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}


		else if ($type == 9)
		{
			$id_status		= 8;
			$id_status_next	= $type;

			if (empty($message))
			{
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

				// Next Step 9
				{
					$data_next	= array(
						"id_pekerjaan"		=> $id,
						"id_status"			=> $id_status_next
					);
					$this->global_model->save("txn_pekerjaan_status", $data_next);
				}

				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}

		else if ($type == 12)
		{
			$id_status		= 11;
			$id_status_next	= $type;

			if (empty($message))
			{
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status));

				$data				= array(
					"id_pekerjaan"		=> $id,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"hasil"				=> $_POST["hasil"],
					"keterangan"		=> $_POST["keterangan"],
					"do"				=> 1
				);

				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status), $data);
				}

				// Next Step
				if ($_POST["hasil"] != "reject")
				{
					$mst_evaluasi			= $this->global_model->get_by_query("SELECT GROUP_CONCAT(id SEPARATOR ', ') as id FROM mst_evaluasi WHERE id_pekerjaan = ".$id." ")->row();
					$get_project_manager	= $this->global_model->get_by_query("SELECT project_manager FROM txn_evaluasi_2 WHERE id_evaluasi IN (".$mst_evaluasi->id.")  ORDER BY updated DESC LIMIT 1 ")->row();

					$data_next	= array(
						"id_pekerjaan"		=> $id,
						"id_status"			=> $id_status_next,
						"id_user"			=> $get_project_manager->project_manager
					);
					$this->global_model->save("txn_pekerjaan_status", $data_next);
				}

				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}


		// Approve Approval Pimpinan KJPP (Lembar Kendali 3)
		else if ($type == 14)
		{
			$id_status		= 13;
			$id_status_next	= $type;

			if (empty($message))
			{
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

				// Next Step
				$data_next	= array(
					"id_pekerjaan"		=> $id,
					"id_status"			=> $id_status_next
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);

				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}
		// Approve Pimpinan KJPP
		else if ($type == 16)
		{
			$id_status		= 15;
			$id_status_next	= $type;

			if (empty($message))
			{
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status));

				$data				= array(
					"id_pekerjaan"		=> $id,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"hasil"				=> $_POST["hasil"],
					"keterangan"		=> $_POST["keterangan"],
					"do"				=> 1
				);

				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status), $data);
				}

				// Next Step
				if ($_POST["hasil"] != "reject")
				{
					/*$get_user_first_step	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 2))->row();*/
					$data_next	= array(
						"id_pekerjaan"		=> $id,
						"id_status"			=> $id_status_next
					);
					$this->global_model->save("txn_pekerjaan_status", $data_next);
				}
				else
				{
					$cek_lagi 	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 11), "id", "DESC", 0, 1)->row();
					$data_next	= array(
						"id_pekerjaan"		=> $id,
						"id_status"			=> 11,
						"id_user"			=> $cek_lagi->id_user
					);
					$this->global_model->save("txn_pekerjaan_status", $data_next);
				}

				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}


		// Kirim Kertas Kerja
		else if ($type == 19)
		{
			$id_status		= $type - 1;
			$id_status_next	= $type;

			if (empty($message))
			{
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
					"id_status"			=> $id_status_next,
					"id_user"			=> $penilai
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);

				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}

		// Evaluasi Kertas Kerja / Approve
		else if ($type == 21 || $type == 22 || $type == 24 || $type == 26 || $type == 28 || $type == 30 || $type == 32)
		{
			$id_status		= $type - 1;
			$id_status_next	= $type;
			
			//pada step 21 jika laporan ringkas next ke 32
			// untuk laporan ringkas : jika $id_status ==21 maka next status nya 32
			
			if ($id_status==21) {
				
			
				$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id))->row();
				$laporan	= $pekerjaan->jenis_laporan;
				
				if ($laporan =='Ringkas'){
					$id_status_next = 32;
				}
				
			}

			if (empty($message))
			{
				$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status));

				$data				= array(
					"id_pekerjaan"		=> $id,
					"id_status"			=> $id_status,
					"id_user"			=> $user["id"],
					"hasil"				=> $_POST["hasil"],
					"keterangan"		=> $_POST["keterangan"],
					"do"				=> 1
				);

				if ($cek_data->num_rows() != 0)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, $id_status), $data);
				}


				// Next Step
				if ($_POST["hasil"] != "reject")
				{
					$id_user = null;

					$data_next	= array(
						"id_pekerjaan"		=> $id,
						"id_status"			=> $id_status_next,
						"id_user"			=> $id_user
					);
					$this->global_model->save("txn_pekerjaan_status", $data_next);
				}
				else
				{
					if ($type == 21 || $type == 22)
					{
						$cek_lagi 	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 17), "id", "DESC", 0, 1)->row();

						$data_next	= array(
							"id_pekerjaan"		=> $id,
							"id_status"			=> 17,
							"id_user"			=> $cek_lagi->id_user
						);
						$this->global_model->save("txn_pekerjaan_status", $data_next);
					}
					else if ($type == 26)
					{
						$cek_lagi 	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 22), "id", "DESC", 0, 1)->row();

						$data_next	= array(
							"id_pekerjaan"		=> $id,
							"id_status"			=> 22,
							"id_user"			=> $cek_lagi->id_user
						);
						$this->global_model->save("txn_pekerjaan_status", $data_next);
					}
					else if ($type == 28 ||  $type == 30 || $type == 32)
					{
						$cek_lagi 	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id, 26), "id", "DESC", 0, 1)->row();

						$data_next	= array(
							"id_pekerjaan"		=> $id,
							"id_status"			=> 26,
							"id_user"			=> $cek_lagi->id_user
						);
						$this->global_model->save("txn_pekerjaan_status", $data_next);
					}
				}

				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}

		// Kirim Laporan
		else if ($type == 24)
		{
			$id_status		= $type - 1;
			$id_status_next	= $type;

			if (empty($message))
			{
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

				// Next Step
				$data_next	= array(
					"id_pekerjaan"		=> $id,
					"id_status"			=> $id_status_next
				);
				$this->global_model->save("txn_pekerjaan_status", $data_next);

				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}

		echo json_encode(array("result" => $result, "message" => $message));
	}
	function update_evaluasi()
	{
		$id_pekerjaan	= base64_decode($_POST["id_pekerjaan"]);
		$id 			= base64_decode($_POST["id"]);
		$id_txn 		= base64_decode($_POST["id_txn"]);
		$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$user_login		= $this->auth->get_data_login();
		$result			= "error";
		$message		= "";

		if ($pekerjaan->id_status >= 4 && $pekerjaan->id_status < 9) // Evaluasi 1 Pimpinan KJPP
		{
			if ($message != "")
			{
				$result			= "error";
				$message		= $message;
			}
			else
			{
				$data["id_user"]	= $user_login["id"];

				$ruang_lingkup 		= $_POST["ruang_lingkup"];
				$bidang_penugasan	= $_POST["bidang_penugasan"];
				$jumlah_orang 		= $_POST["jumlah_orang"];
				$jangka_waktu		= $_POST["jangka_waktu"];
				$termin_pembayaran 	= $_POST["termin_pembayaran"];
				$project_manager	= $_POST["project_manager"];
				$resiko 			= $_POST["resiko"];
				$harga				= $_POST["harga"];

				$data_master	= array(
					"id_pekerjaan"	=> $id_pekerjaan,
					"id_status"		=> 4,
					"id_user"		=> $user_login["id"],
					"tipe"			=> "Evaluasi 1 Pimpinan KJPP"
				);

				$data_txn		= array(
					"ruang_lingkup"				=> $ruang_lingkup,
					"bidang_penugasan"	=> $bidang_penugasan,
					"jumlah_orang"			=> $jumlah_orang,
					"jangka_waktu"			=> $jangka_waktu,
					"termin_pembayaran"		=> $termin_pembayaran,
					"project_manager"				=> $project_manager,
					"resiko"		=> $resiko,
					"harga"		=> $harga
				);

				if (empty($id))
				{
					$unix_string				= $this->spmlib->generate_random_string(50);
					$data_master["unix_string"] = $unix_string;
					$this->global_model->save("mst_evaluasi", $data_master);

					$evaluasi_master			= $this->global_model->get_data("mst_evaluasi", 1, array("unix_string"), array($unix_string))->row();

					$data_txn["id_evaluasi"]	= $evaluasi_master->id;
					$this->global_model->save("txn_evaluasi_1", $data_txn);
				}
				else
				{
					$data_txn["id_evaluasi"]	= $id;

					$this->global_model->update("mst_evaluasi", 1, array("id"), array($id), $data_master);
					$this->global_model->update("txn_evaluasi_1", 1, array("id"), array($id_txn), $data_txn);
				}

				if ($pekerjaan->id_status == 4)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 4), array("id_pekerjaan" => $pekerjaan->id, "id_status" => 4, "id_user" => $data["id_user"], "do" => 1) );
					// Next Step
					$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" => $pekerjaan->id, "id_status" => 5) );
				}


				$result			= "success";
				$message		= "Data berhasil disimpan.";
			}
		}
		else if ($pekerjaan->id_status >= 9 && $pekerjaan->id_status < 12) // Evaluasi 2 Pimpinan KJPP
		{
			if ($message != "")
			{
				$result			= "error";
				$message		= $message;
			}
			else
			{
				$data["id_user"]	= $user_login["id"];

				$catatan_lembar_kendali = $_POST["catatan_lembar_kendali"];
				$kriteria_keberhasilan 	= $_POST["kriteria_keberhasilan"];
				$termin_pembayaran 		= $_POST["termin_pembayaran"];
				$project_manager 		= $_POST["project_manager"];
				$kriteria_lain 			= $_POST["kriteria_lain"];
				$keterangan				= $_POST["keterangan"];


				$data_master	= array(
					"id_pekerjaan"	=> $id_pekerjaan,
					"id_status"		=> 9,
					"id_user"		=> $user_login["id"],
					"tipe"			=> "Evaluasi 2 Pimpinan KJPP"
				);

				$data_txn		= array(
					"catatan_lembar_kendali"	=> $catatan_lembar_kendali,
					"kriteria_keberhasilan"		=> $kriteria_keberhasilan,
					"termin_pembayaran"			=> $termin_pembayaran,
					"project_manager"			=> $project_manager,
					"kriteria_lain"				=> $kriteria_lain,
					"keterangan"				=> $keterangan
				);

				if (empty($id))
				{
					$unix_string				= $this->spmlib->generate_random_string(50);
					$data_master["unix_string"] = $unix_string;
					$this->global_model->save("mst_evaluasi", $data_master);

					$evaluasi_master			= $this->global_model->get_data("mst_evaluasi", 1, array("unix_string"), array($unix_string))->row();

					$data_txn["id_evaluasi"]	= $evaluasi_master->id;
					$this->global_model->save("txn_evaluasi_2", $data_txn);
				}
				else
				{
					$data_txn["id_evaluasi"]	= $id;

					$this->global_model->update("mst_evaluasi", 1, array("id"), array($id), $data_master);
					$this->global_model->update("txn_evaluasi_2", 1, array("id"), array($id_txn), $data_txn);
				}

				if ($pekerjaan->id_status == 9)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 9), array("id_pekerjaan" => $pekerjaan->id, "id_status" => 9, "id_user" => $data["id_user"], "do" => 1) );
					// Next Step
					$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" => $pekerjaan->id, "id_status" => 10) );
				}


				$result			= "success";
				$message		= "Data berhasil disimpan.";
			}
		}
		else if ($pekerjaan->id_status >= 12 && $pekerjaan->id_status < 22) // Evaluasi 2 Pimpinan KJPP
		{
			if ($message != "")
			{
				$result			= "error";
				$message		= $message;
			}
			else
			{
				$data["id_user"]	= $user_login["id"];


				$catatan_teknis = $_POST["catatan_teknis"];
				$catatan_sdm 	= $_POST["catatan_sdm"];
				$keterangan		= $_POST["keterangan"];


				$data_master	= array(
					"id_pekerjaan"	=> $id_pekerjaan,
					"id_status"		=> 12,
					"id_user"		=> $user_login["id"],
					"tipe"			=> "Evaluasi 3 Project Manager"
				);

				$data_txn		= array(
					"catatan_teknis"	=> $catatan_teknis,
					"catatan_sdm"		=> $catatan_sdm,
					"keterangan"		=> $keterangan
				);

				if (empty($id))
				{
					$unix_string				= $this->spmlib->generate_random_string(50);
					$data_master["unix_string"] = $unix_string;
					$this->global_model->save("mst_evaluasi", $data_master);

					$evaluasi_master			= $this->global_model->get_data("mst_evaluasi", 1, array("unix_string"), array($unix_string))->row();

					$data_txn["id_evaluasi"]	= $evaluasi_master->id;
					$this->global_model->save("txn_evaluasi_3", $data_txn);
				}
				else
				{
					$data_txn["id_evaluasi"]	= $id;

					$this->global_model->update("mst_evaluasi", 1, array("id"), array($id), $data_master);
					$this->global_model->update("txn_evaluasi_3", 1, array("id"), array($id_txn), $data_txn);
				}

				if ($pekerjaan->id_status == 12)
				{
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 12), array("id_pekerjaan" => $pekerjaan->id, "id_status" => 12, "id_user" => $data["id_user"], "do" => 1) );
					// Next Step
					$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" => $pekerjaan->id, "id_status" => 13, "id_user" => $user_login["id"]) );
				}


				$result			= "success";
				$message		= "Data berhasil disimpan.";
			}
		}

		echo json_encode(array("result" => $result, "message" => $message));
	}
	function update_lembar_kendali()
	{
		$id 				= base64_decode($_POST["id"]);
		$id_pekerjaan		= base64_decode($_POST["id_pekerjaan"]);
		$type				= $_POST["type"];
		$is_update 			= $_POST["is_update"];
		$is_update 			= ("true" == $is_update);
		$list_field_txn		= array();
		$required_field		= array();
		$required_label		= array();
		$result				= "error";
		$message			= "";
		$user				= $this->auth->get_data_login();
		$pekerjaan			= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();

		if ($type == "lembar_kendali_1")
		{
			$table_txn			= "txn_lembar_kendali_1";
			$list_field_txn		= array("jawab_1a","jawab_1b","jawab_2a","jawab_2b","jawab_3a","jawab_3b","jawab_4a","jawab_4b","jawab_5a","jawab_5b","jawab_6a","jawab_6b","jawab_7a","jawab_7b","jawab_8a","jawab_8b","jawab_9a","jawab_9b","jawab_10a","jawab_10b","jawab_11a","jawab_11b","jawab_12a","jawab_12b","jawab_13a","jawab_13b","jawab_14a","jawab_14b","jawab_15a","jawab_15b","jawab_16a","jawab_16b","jawab_17a","jawab_17b","jawab_18","jawab_19","jawab_20");
		}
		else if ($type == "lembar_kendali_2")
		{
			$table_txn			= "txn_lembar_kendali_2";
			$list_field_txn		= array("ruang_lingkup","bidang_penugasan","jumlah_orang","jangka_waktu","termin_pembayaran_1","termin_pembayaran_2","termin_pembayaran_3","termin_pembayaran_4","termin_pembayaran_5","termin_komentar_5","termin_komentar_4","termin_komentar_3","termin_komentar_2","termin_komentar_1","project_manager","resiko","resiko_keterangan","harga");
			$required_field		= array("ruang_lingkup","bidang_penugasan","jumlah_orang","jangka_waktu","termin_pembayaran_1","project_manager","resiko","harga");
			$required_label		= array("Ruang Lingkup","Bidang Penugasan","Jumlah Orang","Jangka Waktu","Termin 1","Project Manager","Rsiko","Harga");
		}
		else if ($type == "lembar_kendali_3")
		{
			$table_txn			= "txn_lembar_kendali_3";
			$list_field_txn		= array("jawab_1a","jawab_1b","jawab_2a","jawab_2b","jawab_3a","jawab_3b","jawab_4a","jawab_4b","jawab_5a","jawab_5b","jawab_6a","jawab_6b","jawab_7a","jawab_7b","jawab_8a","jawab_8b","jawab_9a","jawab_9b","jawab_10a","jawab_10b","jawab_11a","jawab_11b");
		}
		else if ($type == "lembar_kendali_4")
		{
			$table_txn			= "txn_lembar_kendali_4";
			$list_field_txn		= array("jawab_1a","jawab_1b","jawab_2a","jawab_2b","jawab_3a","jawab_3b","jawab_4a","jawab_4b","jawab_5a","jawab_5b","jawab_6a","jawab_6b","jawab_7a","jawab_7b","jawab_8a","jawab_8b","jawab_9a","jawab_9b");
		}
		else if ($type == "lembar_kendali_5")
		{
			$table_txn			= "txn_lembar_kendali_5";
			$list_field_txn		= array("jawab_1a","jawab_1b","jawab_2a","jawab_2b","jawab_3a","jawab_3b","jawab_4a","jawab_4b","jawab_5a","jawab_5b","jawab_6a","jawab_6b","jawab_7a","jawab_7b","jawab_8a","jawab_8b","jawab_9a","jawab_9b","jawab_10a","jawab_10b","jawab_11a","jawab_11b","jawab_12a","jawab_12b","jawab_13a","jawab_13b","jawab_14a","jawab_14b","jawab_15a","jawab_15b","jawab_16a","jawab_16b","jawab_17a","jawab_17b","jawab_18a","jawab_18b","jawab_19a","jawab_19b","jawab_20a","jawab_20b","jawab_21a","jawab_21b","jawab_22a","jawab_22b");
		}

		$data_txn	= array();
		$data_txn["id_lembar_kendali"] 	= $id;
		$data_txn["id_user"] 			= $user["id"];

		$invoice_list = array();

		if ($type == "lembar_kendali_2") {
			$total	=  $_POST["termin_pembayaran_1"] + $_POST["termin_pembayaran_2"] + $_POST["termin_pembayaran_3"] + $_POST["termin_pembayaran_4"] + $_POST["termin_pembayaran_5"];

			if (false!=$_POST["termin_pembayaran_1"]){
				$invoice_list[] = 1;
			}

			if (false!=$_POST["termin_pembayaran_2"]){
				$invoice_list[] = 2;
			}

			if (false!=$_POST["termin_pembayaran_3"]){
				$invoice_list[] = 3;
			}

			if (false!=$_POST["termin_pembayaran_4"]){
				$invoice_list[] = 4;
			}

			if (false!=$_POST["termin_pembayaran_5"]){
				$invoice_list[] = 5;
			}

			if ($total != 100)
			$message .= "Total Termin Pembayaran harus 100%<br>";
		}

		foreach ($list_field_txn as $item_field_txn)
		{
			if (in_array($item_field_txn, $required_field) && empty($_POST[$item_field_txn]))
			{
				$key_field = array_keys($required_field, $item_field_txn);
				$get_label = !empty($key_field) ? $required_label[$key_field[0]] : "";
				$message .= "".$get_label." tidak boleh kosong.<br>";
			}
			else
			{
				$data_txn[$item_field_txn] = array_key_exists($item_field_txn, $_POST) ? $_POST[$item_field_txn] : "";
			}
		}

		if ($message != "")
		{
			$result			= "error";
			$message		= $message;
		}
		else
		{
			$unix_string	= $this->spmlib->generate_random_string(50);

			$data_master	 = array(
				"id_pekerjaan"	=> $id_pekerjaan,
				"id_user"		=> $user["id"],
				"unix_string"	=> $unix_string
			);

			if (empty($id))
			{
				// Lembar Kerndali Master
				$data_master["step"]		= $pekerjaan->step;
				$data_master["id_status"]	= $pekerjaan->id_status;

				$this->global_model->save("mst_lembar_kendali", $data_master);
				$lembar_kendali	= $this->global_model->get_data("mst_lembar_kendali", 1, array("unix_string"), array($unix_string))->row();
				$id				= $lembar_kendali->id;
				$data_txn["id_lembar_kendali"] 	= $id;

				$this->global_model->save($table_txn, $data_txn);
			}
			else
			{
				$data_master["step"]		= $_POST["step"];
				$data_master["id_status"]	= $_POST["id_status"];
				$this->global_model->update("mst_lembar_kendali", 1, array("id"), array($id), $data_master);

				$this->global_model->update($table_txn, 1, array("id_lembar_kendali"), array($id), $data_txn);
			}

			if ($pekerjaan->id_status == 2)
			{
				//simpan LKK1
				if (!$is_update) {
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 2), array("do" => 1, "id_user" => $user["id"]));

					$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_user" => $user["id"], "id_status" => 3) );
				}
			}
			else if ($pekerjaan->id_status == 3)
			{
				//simpan LKK2
				if (!$is_update) {
					$dokumen_gabung = array();
					$dokumen_gabung["created"] = date("Y-m-d");
					$dokumen_gabung["updated"] = date("Y-m-d");
					$dokumen_gabung["tanggal"] = date("Y-m-d");
					$dokumen_gabung["id_pekerjaan"] = $id_pekerjaan;
					$dokumen_gabung["id_dokumen_master"] = 4;

					$dokumen_kwitansi = array();
					$dokumen_kwitansi["created"] = date("Y-m-d");
					$dokumen_kwitansi["updated"] = date("Y-m-d");
					$dokumen_kwitansi["tanggal"] = date("Y-m-d");
					$dokumen_kwitansi["id_pekerjaan"] = $id_pekerjaan;
					$dokumen_kwitansi["id_dokumen_master"] = 7;
					foreach ($invoice_list as $ke) {
						$dokumen_gabung["termin"] = $ke;
						$this->global_model->save("mst_dokumen_gabung", $dokumen_gabung);

						$dokumen_kwitansi["termin"] = $ke;
						$this->global_model->save("mst_dokumen_kwitansi", $dokumen_kwitansi);
					}
					
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 3), array("do" => 1, "id_user" => $user["id"]));

					$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_user" => $user["id"], "id_status" => 4) );

				}
				else
				{

				}
			}
			else if ($pekerjaan->id_status == 5)
			{
				//approve LKK2
				$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 5), array("do" => 1, "id_user" => $user["id"]));

				$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_user" => $user["id"], "id_status" => 6) );
			}
			else if ($pekerjaan->id_status == 12)
			{
				//simpan LKK3
				if (!$is_update) {
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 12), array("do" => 1, "id_user" => $user["id"]));

					$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_user" => $user["id"], "id_status" => 13) );
				}
			}
			else if ($pekerjaan->id_status == 14)
			{
				//approve LKK3
				$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 14), array("do" => 1, "id_user" => $user["id"]));

				$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_user" => $user["id"], "id_status" => 15) );
			}
			else if ($pekerjaan->id_status == 19)
			{
				//simpan LKK4
				if (!$is_update) {
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 19), array("do" => 1, "id_user" => $user["id"]));

					$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_user" => $user["id"], "id_status" => 20) );
				}
			}
			else if ($pekerjaan->id_status == 24)
			{
				//approve LKK4
				$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 24), array("do" => 1, "id_user" => $user["id"]));

				$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_user" => $user["id"], "id_status" => 25) );
			}
			else if ($pekerjaan->id_status == 28)
			{
				//simpan LKK5
				if (!$is_update) {
					$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 28), array("do" => 1, "id_user" => $user["id"]));

					$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_user" => $user["id"], "id_status" => 29) );
				}
			}
			else if ($pekerjaan->id_status == 30)
			{
				//approve LKK5
				$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($pekerjaan->id, 30), array("do" => 1, "id_user" => $user["id"]));

				$this->global_model->save("txn_pekerjaan_status", array("id_pekerjaan" =>$pekerjaan->id, "id_user" => $user["id"], "id_status" => 31) );
			}

			$result	= "success";
			$message	= "Data berhasil disimpan";
		}

		echo json_encode(array("result" => $result, "message" => $message));
	}
	function get_lokasi_pekerjaan()
	{
		$id_pekerjaan 	= base64_decode($_POST["id_pekerjaan"]);
		$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();

		$list_pekerjaan	= $this->global_model->get_data("view_lokasi", 1, array("id_pekerjaan"), array($id_pekerjaan));
		$data_table		= array();
		$i = 1;
		foreach ($list_pekerjaan->result() as $item_data)
		{
			$colom_1								= "

				<table>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Jenis Objek</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>".$item_data->nama_jenis_objek."</b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Alamat</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>". 
											$item_data->alamat ." No.". $item_data->nomor ." RT.". $item_data->rt ." RW.". $item_data->rw ."<br>"  
											.$item_data->nama_desa .", ". $item_data->nama_kecamatan ."<br>" 
											.$item_data->nama_kota .", ". $item_data->nama_provinsi 
						."</b></td>
					</tr>
					<!--
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Tanggal Rencana Survey</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>".  date("d-M-Y",strtotime($item_data->tanggal))."</b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Jam</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>".$item_data->jam."</b></td>
					</tr>
					
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Transportasi Survey</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>".$item_data->nama_transportasi."</b></td>
					</tr>
					-->
				</table>
			";

			$colom_2								= "
				<table>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Pengembangan Diatasnya Berupa</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>".$item_data->pengembangan."</b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Pemegang Hak</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>".$item_data->pemegang_hak."</b></td>
					</tr>
                                        <tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Jenis Sertifikat</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>".$item_data->jenis_sertifikat."</b></td>
					</tr>
                                        <tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Nomor Sertifiakt</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>".$item_data->no_sertifikat."</b></td>
					</tr>";
			if($item_data->id_jenis_objek == 1 || $item_data->id_jenis_objek == 2  || $item_data->id_jenis_objek == 5){
					$colom_2 .=	"<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Luas Tanah (M<sup>2</sup>)</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>".$item_data->luas_tanah."</b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Luas Bangunan (M<sup>2</sup>)</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>".$item_data->luas_bangunan."</b></td>
					</tr>";
			}elseif ($item_data->id_jenis_objek == 6 || $item_data->id_jenis_objek == 7 || $item_data->id_jenis_objek == 3) {
					$colom_2 .=	"<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Luas Lantai (M<sup>2</sup>)</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b>".$item_data->luas_tanah."</b></td>
					</tr>";
			}
			$colom_2 .="		
				</table>
			";

			$data_table[$i]["colom"]	= "
				<div class='col-md-12'><h4>DATA OBJEK PROPERTI  - ".$i."</h4></div>
				<div class='col-md-6'>".$colom_1."</div>
				<div class='col-md-6'>".$colom_2."</div>

			";
			/*$data_table[$i]["kode"] 				= !empty($item_data->kode) ? $item_data->kode : "-";
			$data_table[$i]["alamat"] 				= !empty($item_data->alamat) ? $item_data->alamat : "-";
			$data_table[$i]["nama_kota"] 			= !empty($item_data->nama_kota) ? $item_data->nama_kota : "-";
			$data_table[$i]["nama_provinsi"] 		= !empty($item_data->nama_provinsi) ? $item_data->nama_provinsi : "-";
			$data_table[$i]["tanggal"] 				= !empty($item_data->tanggal) ? $item_data->tanggal : "-";
			$data_table[$i]["nama_transportasi"] 	= !empty($item_data->nama_transportasi) ? $item_data->nama_transportasi : "-";*/

			if (!empty($pekerjaan) && $pekerjaan->id_status < 4)
			{
				$data_table[$i]["action"]				= "<i class='fa fa-pencil-square-o btn-edit-lokasi' data='".base64_encode($item_data->id)."' aria-hidden='true'></i><i class='fa fa-trash btn-delete-lokasi' data='".base64_encode($item_data->id)."' aria-hidden='true'></i>";
			}


			$i++;
		}

		$return		= array(
			"data_table"	=> $data_table
		);
		echo json_encode($return);
	}

	function get_penugasan() {
		$id_pekerjaan 	= base64_decode($_POST["id_pekerjaan"]);
		$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$status			= $this->global_model->get_data("mst_status", 1, array("id"), array($pekerjaan->id_status))->row();
		$user			= $this->auth->get_data_login();

		/*echo "<pre>";
		print_r($user);
		echo "</pre>";*/

		$list_lokasi	= $this->global_model->get_data("view_lokasi", 1, array("id_pekerjaan"), array($id_pekerjaan));
		$data_table		= array();
		$i = 1;

		//var_dump($this->global_model->db->last_query()); exit();

		foreach ($list_lokasi->result() as $item_lokasi)
		{
			if ($user["id_group"] == 7 && in_array($pekerjaan->id_status, array(16,17,18,19)))
			{
				$cek_petugas	= $this->global_model->get_data("txn_tugas", 2, array("id_lokasi", "id_user"), array($item_lokasi->id, $user["id"]));

				if ($cek_petugas->num_rows() > 0)
				{
					$data_table[$i]["kode"] 				= !empty($item_lokasi->kode) ? $item_lokasi->kode : "-";
					$data_table[$i]["alamat"] 				= $item_lokasi->alamat." ".(!empty($item_lokasi->gang) ? "Gang ".$item_lokasi->gang : "")." No. ".$item_lokasi->nomor.", RT. ".$item_lokasi->rt." RW. ".$item_lokasi->rw."<br> Kel. ".$item_lokasi->nama_desa." ".(!empty($item_lokasi->dh_desa) ? "(d/h ".$item_lokasi->dh_desa.")" : "")." Kec. ".$item_lokasi->nama_kecamatan." ".(!empty($item_lokasi->dh_kecamatan) ? "(d/h ".$item_lokasi->dh_kecamatan.")" : "")." ".$item_lokasi->nama_kota." ".(!empty($item_lokasi->dh_kota) ? "(d/h ".$item_lokasi->dh_kota.")" : "");
					$data_table[$i]["nama_provinsi"] 		= !empty($item_lokasi->nama_provinsi) ? $item_lokasi->nama_provinsi : "-";
					$data_table[$i]["tanggal_mulai"] 		= format_datetime($item_lokasi->tanggal_mulai);
					$data_table[$i]["jam"] 					= $item_lokasi->jam;
					$data_table[$i]["tanggal_selesai"] 		= format_datetime($item_lokasi->tanggal_selesai);
					$data_table[$i]["biaya"] 				= number_format($item_lokasi->biaya);
					$data_table[$i]["petugas"] 				= "<div class='text-center'>".$user["nama"]."</div>";


					if ($pekerjaan->id_status == 16 || $pekerjaan->id_status == 17)
					{
						$data_table[$i]["surat_tugas"]	= "<div class='text-center'><a href='".base_url()."printpdf/surat_tugas/".base64_encode($item_lokasi->id)."' target='_blank' class='btn btn-primary btn-sm btn-print-tugas download'><i class=\"fa fa-download\"></i></a></div>";
					}

					if ($pekerjaan->id_status == 17)
					{
						$data_table[$i]["kertas_kerja"] = '<div class="input-group-btn">
											                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">KERTAS KERJA
											                    <span class="fa fa-caret-down"></span></button>
											                  <ul class="dropdown-menu" style="display: block; left: -63px;">
											                    <li><a href="'.base_url().'new/pekerjaan/kertas_kerja_edit/'.base64_encode($pekerjaan->id).'/'.base64_encode($item_lokasi->id).'" class="btn-input-kertas-kerja">INPUT KERTAS KERJA</a></li>
											                    <li><a href="#" class="btn_load_excel" data-toggle="modal" data-target="#upload_modal">UPLOAD EXCEL</a></li>
											                  </ul>
											                </div>';
						// $data_table[$i]["kertas_kerja"] = "<div class='text-center'><a href='".base_url()."pekerjaan/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>INPUT KERTAS KERJA</a></div> ";

						// $data_table[$i]["kertas_kerja"] = "<div class='text-center'><a href='".base_url()."new/pekerjaan/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>INPUT KERTAS KERJA</a></div> ";
					}
					else
					if ($pekerjaan->id_status >= 18 || $pekerjaan->id_status == 19 || $pekerjaan->id_status == 20)
					{
						// $data_table[$i]["kertas_kerja"] = "<div class='text-center'><a href='".base_url()."pekerjaan/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>KERTAS KERJA</a></div> ";

						// $data_table[$i]["kertas_kerja"] = "<div class='text-center'><a href='".base_url()."new/pekerjaan/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>KERTAS KERJA</a></div> ";
						$list_kertas_kerja	= $this->global_model->get_data("txn_kertas_kerja", 1, array("id_lokasi"), array($item_lokasi->id),'id_kertas_kerja')->row();
						$con_btn_kertas_kerja = !empty($list_kertas_kerja->attachment_kertas_kerja) ? '<a href="'.base_url().'asset/file/kertas_kerja/'.$list_kertas_kerja->attachment_kertas_kerja.'">DOWNLOAD KERTAS KERJA</a>' : "<div class='text-center'><a href='".base_url()."new/pekerjaan/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>KERTAS KERJA</a></div> ";
						$data_table[$i]["kertas_kerja"] = $con_btn_kertas_kerja;
					}

					$i++;
				}
			}
			else
			{
				// var_dump($pekerjaan->id_status);
				$data_table[$i]["kode"] 				= !empty($item_lokasi->kode) ? $item_lokasi->kode : "-";
				$data_table[$i]["alamat"] 				= $item_lokasi->alamat." ".(!empty($item_lokasi->gang) ? "Gang ".$item_lokasi->gang : "")." No. ".$item_lokasi->nomor.", RT. ".$item_lokasi->rt." RW. ".$item_lokasi->rw." Kel. ".$item_lokasi->nama_desa." ".(!empty($item_lokasi->dh_desa) ? "(d/h ".$item_lokasi->dh_desa.")" : "")." Kec. ".$item_lokasi->nama_kecamatan." ".(!empty($item_lokasi->dh_kecamatan) ? "(d/h ".$item_lokasi->dh_kecamatan.")" : "")." ".$item_lokasi->nama_kota." ".(!empty($item_lokasi->dh_kota) ? "(d/h ".$item_lokasi->dh_kota.")" : "");
				$data_table[$i]["nama_provinsi"] 			= !empty($item_lokasi->nama_provinsi) ? $item_lokasi->nama_provinsi : "-";

				if ($status->tambah_petugas)
				{
                    $date_name = "tanggal_mulai";
                    $date_label = "tanggal_mulai";
                    $date_value = $item_lokasi->tanggal_mulai;
                    $date_id = "tanggal_mulai_".$item_lokasi->id;
                    $date_class = "input-sm tanggal_mulai textbox_penugasan";
                    $date_attr = " data-id-lokasi='".$item_lokasi->id."' ";
					$tanggal_mulai_dpicker = $this->formlib->_generate_input_date($date_name, $date_label, $date_value, true, false, "dd-mm-yyyy", $date_id, $date_class, $date_attr);

					$data_table[$i]["tanggal_mulai"] 		= $tanggal_mulai_dpicker;
					// "
					// 	<div class='input-group date default-date-picker' data-date-format='yyyy-mm-dd' data-date-autoclose='true' style='width: 130px;'>
					// 		<input type='text' id='tanggal_mulai_".$item_lokasi->id."' name='tanggal_mulai'  class='form-control input-sm tanggal_mulai textbox_penugasan' value='".$item_lokasi->tanggal_mulai."' placeholder='Tanggal Mulai' data-id-lokasi='".$item_lokasi->id."' />
					// 		<span class='input-group-addon'><i class='fa fa-calendar'></i></span>
					// 	</div>
					// ";


					$data_table[$i]["jam"] 					= '
						<div class="input-group time" id="datetimepicker3" style="width: 95px;">
							<input id="jam_'.$item_lokasi->id.'" name="jam" class="form-control input-sm jam textbox_penugasan" value="'.$item_lokasi->jam.'" required="" data-format="hh:mm:ss" type="text"  data-id-lokasi="'.$item_lokasi->id.'">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</span>
						</div>

					';

                    $date_name = "tanggal_selesai";
                    $date_label = "tanggal_selesai";
                    $date_value = $item_lokasi->tanggal_selesai;
                    $date_id = "tanggal_selesai_".$item_lokasi->id;
                    $date_class = "input-sm tanggal_selesai textbox_penugasan";
                    $date_attr = " data-id-lokasi='".$item_lokasi->id."' ";
					$tanggal_selesai_dpicker = $this->formlib->_generate_input_date($date_name, $date_label, $date_value, true, false, "dd-mm-yyyy", $date_id, $date_class, $date_attr);

					$data_table[$i]["tanggal_selesai"] 		= $tanggal_selesai_dpicker;
					// "
					// 	<div class='input-group date default-date-picker' data-date-format='yyyy-mm-dd' data-date-autoclose='true' style='width: 130px;'>
					// 		<input type='text' id='tanggal_selesai_".$item_lokasi->id."' name='tanggal_selesai'  class='form-control input-sm tanggal_selesai  textbox_penugasan' value='".$item_lokasi->tanggal_selesai."' placeholder='Tanggal Selesai' data-id-lokasi='".$item_lokasi->id."' />
					// 		<span class='input-group-addon'><i class='fa fa-calendar'></i></span>
					// 	</div>
					// ";
					$data_table[$i]["biaya"] 				= "
						<input type='text' name='biaya' class='form-control input-sm biaya textbox_penugasan' value='".$item_lokasi->biaya."' placeholder='Biaya' data-id-lokasi='".$item_lokasi->id."' style='min-width: 70px;' />
					";
				}
				else
				{
					$data_table[$i]["tanggal_mulai"] 		= format_datetime($item_lokasi->tanggal_mulai);
					$data_table[$i]["jam"] 					= $item_lokasi->jam;
					$data_table[$i]["tanggal_selesai"] 		= format_datetime($item_lokasi->tanggal_selesai);
					$data_table[$i]["biaya"] 				= number_format($item_lokasi->biaya);
				}


				$list_petugas	= $this->global_model->get_data("txn_tugas", 1, array("id_lokasi"), array($item_lokasi->id));
				$petugas		= "";
				foreach	($list_petugas->result() as $item_petugas)
				{
					$user_petugas	= $this->global_model->get_data("view_user", 1, array("id"), array($item_petugas->id_user))->row();

					$petugas	.= $user_petugas->nama;

					if ($pekerjaan->id_status >= 17 || $pekerjaan->id_status == 18 || $pekerjaan->id_status == 19 || $pekerjaan->id_status == 20)
					{
						/*$petugas .= " [<a href='".base_url()."pekerjaan/kertas_kerja_edit/".base64_encode($id_pekerjaan)."/".base64_encode($id_pekerjaan)."?url=".base_url()."pekerjaan/detail/".base64_encode($id_pekerjaan)."'>Kertas Kerja</a>]";*/
					}

					if ($status->tambah_petugas)
					{
						$petugas	.= " <i class='fa fa-trash btn-delete-petugas' data='".base64_encode($item_petugas->id)."' aria-hidden='true'></i>";
					}

					$petugas	.= "<br>";
				}

				if ($status->tambah_petugas)
				{
					$petugas	.= "<button type='button' data-toggle='modal' data-target='#TugasModal' class='btn btn-xs btn-primary btn-btn-tambah-petugas' style='margin-top: 5px; margin-bottom: 5px;' data-id-lokasi='".$item_lokasi->id."'>Tambah</button>";
				}

				$data_table[$i]["petugas"] 				= "<div class='text-center'>".$petugas."</div>";

				if ($pekerjaan->id_status == 16 || $pekerjaan->id_status == 17)
				{
					$data_table[$i]["surat_tugas"]	= "<div class='text-center'><a href='".base_url()."printpdf/surat_tugas/".base64_encode($item_lokasi->id)."' target='_blank' class='btn btn-primary btn-sm btn-print-tugas download'><i class=\"fa fa-download\"></i></a></div>";
				}

				if ($pekerjaan->id_status == 17)
				{
					$data_table[$i]["kertas_kerja"] = '<div class="input-group-btn">
										                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">KERTAS KERJA
										                    <span class="fa fa-caret-down"></span></button>
										                  <ul class="dropdown-menu">
										                    <li><a href="'.base_url().'new/pekerjaan/kertas_kerja_edit/'.base64_encode($pekerjaan->id).'/'.base64_encode($item_lokasi->id).'" class="btn-input-kertas-kerja">INPUT KERTAS KERJA</a></li>
										                    <li><a href="#" class="btn_load_excel" data-toggle="modal" data-target="#upload_modal">UPLOAD EXCEL</a></li>
										                  </ul>
										                </div>';
					// $data_table[$i]["kertas_kerja"] = "<div class='text-center'><a href='".base_url()."pekerjaan/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>INPUT KERTAS KERJA</a></div> ";

					// $data_table[$i]["kertas_kerja"] = "<div class='text-center'><a href='".base_url()."new/pekerjaan/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>INPUT KERTAS KERJA</a></div> ";
				}
				else
				if ($pekerjaan->id_status >= 18 || $pekerjaan->id_status == 19 || $pekerjaan->id_status == 20)
				{
					$list_kertas_kerja	= $this->global_model->get_data("txn_kertas_kerja", 1, array("id_lokasi"), array($item_lokasi->id),'id_kertas_kerja')->row();
					$con_btn_kertas_kerja = !empty($list_kertas_kerja->attachment_kertas_kerja) ? '<a class="btn btn-primary btn-sm" href="'.base_url().'asset/file/kertas_kerja/'.$list_kertas_kerja->attachment_kertas_kerja.'">DOWNLOAD KERTAS KERJA</a>' : "<div class='text-center'><a href='".base_url()."new/pekerjaan/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>KERTAS KERJA</a></div> ";
					$data_table[$i]["kertas_kerja"] = $con_btn_kertas_kerja;
					// $data_table[$i]["kertas_kerja"] = "<div class='text-center'><a href='".base_url()."pekerjaan/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>KERTAS KERJA</a></div> ";
					// $data_table[$i]["kertas_kerja"] = "<div class='text-center'><a href='".base_url()."new/pekerjaan/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>KERTAS KERJA</a></div> ";
				}

				$i++;
			}
		}
		$return		= array(
			"data_table"	=> $data_table
		);
		echo json_encode($return);
	}
	function get_catatan()
	{
		$id_pekerjaan 	= base64_decode($_POST["id_pekerjaan"]);

		$query	= "SELECT * FROM txn_pekerjaan_status WHERE id_pekerjaan = ".$id_pekerjaan." AND (id_status IN(5,6,7,14,15,24) OR keterangan IS NOT NULL)";
		$list	= $this->global_model->get_by_query($query);
		$data_table		= array();
		$i = 1;
		foreach ($list->result() as $item)
		{
			$user	= $this->global_model->get_data("view_user", 1, array("id"), array($item->id_user));
			$status	= $this->global_model->get_data("mst_status", 1, array("id"), array($item->id_status));

			if (empty($item->hasil) || is_null($item->hasil))
			{
				$hasil	= "";
			}
			else
			{
				$hasil	= ucfirst($item->hasil);
			}

			$data_table[$i]["module"] 	= !empty($status) ? $status->row()->module : "-";
			$data_table[$i]["hasil"] 	= $hasil;
			$data_table[$i]["catatan"] 	= empty($item->keterangan) ? "" : $item->keterangan;
			$data_table[$i]["user"] 	= $user ? $user->row()->nama : "";
			$data_table[$i]["tanggal"] 	= $this->spmlib->indonesian_date(date("d-m-Y H:i:s", strtotime($item->created)), "d F Y - H:i:s", "" );

			$i++;
		}

		$return		= array(
			"data_table"	=> $data_table
		);
		echo json_encode($return);
	}
	function get_petugas()
	{
		$id_group	= $_POST["id_group"];
		$id_lokasi	= $_POST["id_lokasi"];
		$return		= array();

		// $user		= $this->global_model->get_data("view_user",1, array("id_group"), array($id_group));
		$user		= $this->global_model->get_list("view_user", "id_group=$id_group OR id_group=2", "nama");

		// foreach ($user->result() as $item_user) {
		foreach ($user as $item_user) {
			$cek_user	= $this->global_model->get_data("txn_tugas", 2, array("id_lokasi", "id_user"), array($id_lokasi, $item_user->id));

			if ($cek_user->num_rows() == 0)
			array_push($return, array("id" => $item_user->id, "nama" => $item_user->nama));
		}

		echo json_encode($return);
	}
	function get_po()
	{
		$id_pekerjaan 	= base64_decode($_POST["id_pekerjaan"]);
		$po				= $this->global_model->get_data("mst_po", 1, array("id_pekerjaan"), array($id_pekerjaan));
		$data			= array();

		if ($po->num_rows() == 1)
		{
			$data["no"]			= $po->row()->no;
			$data["tanggal"]	= date("d-m-Y", strtotime($po->row()->tanggal));
			$data["file"]		= $po->row()->file;
			$data["keterangan"]	= $po->row()->keterangan;
		}
		else
		{
			$data["no"]			= "";
			$data["tanggal"]	= "";
			$data["file"]		= "";
			$data["keterangan"]	= "";
		}

		echo json_encode($data);
	}
	function submit_po()
	{
		$result		= "error";
		$message	= "";

		$id_pekerjaan	= base64_decode($_POST["id_pekerjaan"]);
		$no				= $_POST["no"];
		$tanggal		= $_POST["tanggal"];
		$file			= $_POST["file"];
		$keterangan		= $_POST["keterangan"];

		if (!empty($id_pekerjaan))
		{
			$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
			$user			= $this->auth->get_data_login();

			if(empty($tanggal)){
				$message	.= "Silahkan isi Tanggal PO.<br>";
			}
			if(empty($file)){
				$message	.= "Silahkan pilih File Scan PO.<br>";
			}

			if (empty($message))
			{
				$data	= array(
					"id_pekerjaan"	=> $id_pekerjaan,
					"no"			=> $no,
					"tanggal"		=> date("Y-m-d", strtotime($tanggal)),
					"file"			=> $file,
					"keterangan"	=> $keterangan
				);

				$this->global_model->save("mst_po", $data);

				if ($pekerjaan->id_status == 10)
				{
					$cek_data	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, $pekerjaan->id_status));

					$data_pekerjaan_old	= array(
						"id_pekerjaan"		=> $id_pekerjaan,
						"id_status"			=> $pekerjaan->id_status,
						"id_user"			=> $user["id"],
						"do"				=> 1
					);

					if ($cek_data->num_rows() != 0)
					{
						$this->global_model->update("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, ($pekerjaan->id_status)), $data_pekerjaan_old);
					}



					/*$mst_evaluasi			= $this->global_model->get_by_query("SELECT GROUP_CONCAT(id SEPARATOR ', ') as id FROM mst_evaluasi WHERE id_pekerjaan = ".$id_pekerjaan." ")->row();*/
					$get_project_manager	= $this->global_model->get_data("txn_pekerjaan_status", 2, array("id_pekerjaan", "id_status"), array($id_pekerjaan, 7))->row();

					$data_next	= array(
						"id_pekerjaan"		=> $id_pekerjaan,
						"id_status"			=> ($pekerjaan->id_status + 1),
						"id_user"			=> $get_project_manager->id_user
					);
					$this->global_model->save("txn_pekerjaan_status", $data_next);
				}

				$result 	= "success";
				$message	= "Data berhasil disimpan";
			}
		}

		echo json_encode(array("result" => $result, "message" => $message));
	}
	function update_textbox_penugasan()
	{
		$id_lokasi	= $_POST["id_lokasi"];
		$field		= $_POST["field"];
		$value		= $_POST["value"];
		$user		= $this->auth->get_data_login();

		// Cek Status
		/*{
			$is_update	= false;
			$lokasi		= $this->global_model->get_data("mst_lokasi", 1, array("id"), array($id_lokasi))->row();
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

				redirect(base_url()."pekerjaan/detail/".base64_encode($pekerjaan->id));
			}


		}*/

		$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), array($field => $value));
	}
	function update_penugasan()
	{
		$id			= base64_decode($_POST["id"]);
		$penilai	= $_POST["penilai"];
		$reviewer	= $_POST["reviewer"];
		$result		= "error";
		$message	= "";
		$user		= $this->auth->get_data_login();

		$is_update	= false;
		$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id))->row();
		$list_lokasi	= $this->global_model->get_data("mst_lokasi", 1, array("id_pekerjaan"), array($id));

		foreach ($list_lokasi->result() as $item_lokasi)
		{
			$cek_petugas	= $this->global_model->get_data("txn_tugas", 1, array("id_lokasi"), array($item_lokasi->id));

			if (!empty($item_lokasi->tanggal_mulai) && !empty($item_lokasi->tanggal_selesai) && !empty($item_lokasi->biaya) && $cek_petugas->num_rows() > 0)
			{
				$is_update = true;
			}
		}

		if (!$is_update)
		{
			$message	.= "Silahkan lengkapi Rencana Penugasan.<br>";
		}

		if (empty($id) || empty($penilai) || empty($reviewer))
		{
			$message	.= "Silahkan Pilih Penilai dam QC (Reviewer)";
		}

		if (empty($message))
		{

			$this->global_model->update("mst_pekerjaan", 1, array("id"), array($id), array("penilai" => $penilai, "reviewer" => $reviewer));

			if ($pekerjaan->id_status == 11)
			{
				$id_status			= 11;
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
			}

			$result	= "success";
			$message	= "Data Berhasil diisimpan";
		}


		echo json_encode(array("result" => $result, "message" => $message));
	}
	/*Kertas Kerja*/
	function update_lokasi_pembanding_by_map() {
		$id_lokasi	= $_POST["id_lokasi"];
		$latitude		= $_POST["latitude"];
		$longitude		= $_POST["longitude"];
		$keterangan	= $_POST["keterangan"];
		$user		= $this->auth->get_data_login();

		$data_update = array(
			'latitude_pembanding_'.$keterangan => $latitude,
			'longitude_pembanding_'.$keterangan => $longitude
		);
		$this->global_model->update_by_id("mst_lokasi", 'id', $id_lokasi, $data_update);	
	}
	function update_lokasi_pembanding()
	{
		$id_lokasi	= $_POST["id_lokasi"];
		$value		= $_POST["value"];
		$keterangan	= $_POST["keterangan"];
		$user		= $this->auth->get_data_login();

		$arr_column = array(
						'latitude_pembanding_0', 
						'longitude_pembanding_0',
						'latitude_pembanding_1', 
						'longitude_pembanding_1',
						'latitude_pembanding_2', 
						'longitude_pembanding_2'
						);
		$data_update = array();
		if ( in_array($keterangan, $arr_column) ) {
			$data_update[$keterangan] = $value;
		}
		if ( count($data_update) > 0 ) {
			$this->global_model->update_by_id("mst_lokasi", 'id', $id_lokasi, $data_update);
		}
	}
	function update_textbox_kertas_kerja()
	{
		$id_lokasi	= $_POST["id_lokasi"];
		$id_field	= $_POST["id_field"];
		$value		= $_POST["value"];
		$keterangan	= $_POST["keterangan"];
		$user		= $this->auth->get_data_login();
		$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();
		// $lokasi->id_jenis_objek= 2;
		$data = array(
			"id_lokasi"		=> $id_lokasi,
			"id_field"		=> $id_field,
			"jawab"			=> $value,
			"keterangan" 	=> $keterangan
		);

		if ($id_field != 9900 && $id_field != 9901)
		{
			$is_update_text = false;
			$current_value = "";
			if ($keterangan != "")
			{
				$data_value	= $this->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($id_lokasi, $id_field, $keterangan));
				if ( is_object($data_value) ) {
					$row_value = $data_value->row();
					if ( is_object($row_value) ) {
						$current_value = $row_value->jawab;
					}
				}
				if ($data_value->num_rows() == 0){
					$this->global_model->save("txn_lokasi_data", $data);
				}else{
					$is_update_text = true;
					$this->global_model->update("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($id_lokasi, $id_field, $keterangan), $data);
				}
			}
			else
			{
				$data_value	= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, $id_field));
				if ( is_object($data_value) ) {
					$row_value = $data_value->row();
					if ( is_object($row_value) ) {
						$current_value = $row_value->jawab;
					}
				}
				if ($data_value->num_rows() == 0){
					$this->global_model->save("txn_lokasi_data", $data);
				}else{
					$is_update_text = true;
					$this->global_model->update("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, $id_field), $data);
				}
			}
			$data_field = $this->global_model->get_data("mst_field_objek", 1, array("id"), array($id_field));
			if ( is_object($data_field) ) {
				$row_field = $data_field->row();
				if ( is_object($row_field) ) {
					if ( $row_field->nama == 'tanah_98'  && $is_update_text ) {
						if ( !empty($current_value) && $current_value != $value ) {
							if ( file_exists('./asset/file/'.$current_value) )
								unlink('./asset/file/'.$current_value);
						}
					}
				}
			}
		}

		/* array (id_field => field_di_txn_kertas_kerja) */

		if ($lokasi->id_jenis_objek == 1)
		{ 
			$mapping_id_field  = array(
				"1" => array("table" => "txn_kertas_kerja", "field" => "penandatangan_laporan"),
				"2" => array("table" => "txn_kertas_kerja", "field" => "obyek_penilaian"),
				"3" => array("table" => "txn_kertas_kerja", "field" => "nama_penilai"),
				"4" => array("table" => "txn_kertas_kerja", "field" => "kegunaan"),
				"5" => array("table" => "txn_kertas_kerja", "field" => "nama_surveyor"),
				"6" => array("table" => "txn_kertas_kerja", "field" => "jenis_klien"),
				"7" => array("table" => "txn_kertas_kerja", "field" => "klien"),
				"8" => array("table" => "txn_kertas_kerja", "field" => "telepon_klien"),
				"9" => array("table" => "txn_kertas_kerja", "field" => "tanggal_inspeksi_penilaian"),
				"10" => array("table" => "txn_kertas_kerja", "field" => "status_objek"),
				"11" => array("table" => "txn_kertas_kerja", "field" => "yang_dijumpai"),
				"12" => array("table" => "txn_kertas_kerja", "field" => "tanggal_laporan"),
				"13" => array("table" => "txn_kertas_kerja", "field" => "selaku"),
				"14" => array("table" => "txn_kertas_kerja", "field" => "obyek_ditempati_oleh"),
				"15" => array("table" => "txn_kertas_kerja", "field" => "nomor_laporan"),
				"16" => array("table" => "txn_kertas_kerja", "field" => "penggunaan_obyek"),
				"17" => array("table" => "txn_kertas_kerja", "field" => "debitur"),
				"18" => array("table" => "txn_kertas_kerja", "field" => "alamat_properti"),
				"19" => array("table" => "txn_kertas_kerja", "field" => "nama_cabang"),
				"20" => array("table" => "txn_kertas_kerja", "field" => "nama_staff"),
				"21" => array("table" => "txn_kertas_kerja", "field" => "provinsi"),
				"22" => array("table" => "txn_kertas_kerja", "field" => "jabatan"),
				"23" => array("table" => "txn_kertas_kerja", "field" => "kotakab"),
				"24" => array("table" => "txn_kertas_kerja", "field" => "nomor_penugasan"),
				"25" => array("table" => "txn_kertas_kerja", "field" => "kecamatan"),
				"26" => array("table" => "txn_kertas_kerja", "field" => "tanggal_penugasan"),
				"27" => array("table" => "txn_kertas_kerja", "field" => "kelurahan"),
				"28" => array("table" => "txn_kertas_kerja", "field" => "tujuan_penilaian"),
				"133" => array("table" => "txn_tanah", "field" => "foto"),
				"105" => array("table" => "txn_tanah", "field" => "jenis_batas_1"),
				"106" => array("table" => "txn_tanah", "field" => "batas_properti_1"),
				"107" => array("table" => "txn_tanah", "field" => "jenis_batas_2"),
				"108" => array("table" => "txn_tanah", "field" => "batas_properti_2"),
				"109" => array("table" => "txn_tanah", "field" => "jenis_batas_3"),
				"110" => array("table" => "txn_tanah", "field" => "batas_properti_3"),
				"111" => array("table" => "txn_tanah", "field" => "jenis_batas_4"),
				"112" => array("table" => "txn_tanah", "field" => "batas_properti_4"),
				"113" => array("table" => "txn_tanah", "field" => "lokasi_tanah"),
				"114" => array("table" => "txn_tanah", "field" => "harga_tanah_obyek"),
				"115" => array("table" => "txn_tanah", "field" => "kepadatan_bangunan"),
				"116" => array("table" => "txn_tanah", "field" => "pertumbuhan_bangunan"),
				"117" => array("table" => "txn_tanah", "field" => "kemudahan_mencapai_lokasi"),
				"118" => array("table" => "txn_tanah", "field" => "kemudahan_belanja"),
				"119" => array("table" => "txn_tanah", "field" => "kemudahan_rekreasi"),
				"120" => array("table" => "txn_tanah", "field" => "kemudahan_angkutan_umum"),
				"121" => array("table" => "txn_tanah", "field" => "kemudahan_sarana_pendidikan"),
				"122" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kejahatan"),
				"123" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kebakaran"),
				"124" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_bencana"),
				"125" => array("table" => "txn_tanah", "field" => "permukiman"),
				"126" => array("table" => "txn_tanah", "field" => "industri"),
				"127" => array("table" => "txn_tanah", "field" => "pertokoan"),
				"128" => array("table" => "txn_tanah", "field" => "perkantoran"),
				"129" => array("table" => "txn_tanah", "field" => "taman"),
				"130" => array("table" => "txn_tanah", "field" => "tanah_kosong"),
				"131" => array("table" => "txn_tanah", "field" => "perubahan_lingkungan"),
				"132" => array("table" => "txn_tanah", "field" => "data_hunian"),
				"133" => array("table" => "txn_tanah", "field" => "foto"),
				"140" => array("table" => "txn_tanah", "field" => "lebar_jalan_depan"),
				"141" => array("table" => "txn_tanah", "field" => "lebar_jalan_sekitar"),
				"142" => array("table" => "txn_tanah", "field" => "jenis_jalan_depan"),
				"143" => array("table" => "txn_tanah", "field" => "drainase"),
				"144" => array("table" => "txn_tanah", "field" => "trotoar"),
				"145" => array("table" => "txn_tanah", "field" => "lampu_jalan"),
				"134" => array("table" => "txn_tanah", "field" => "jaringan_listrik"),
				"135" => array("table" => "txn_tanah", "field" => "jaringan_telepon"),
				"136" => array("table" => "txn_tanah", "field" => "jaringan_air_bersih"),
				"137" => array("table" => "txn_tanah", "field" => "jaringan_gas"),
				"138" => array("table" => "txn_tanah", "field" => "pemakaman_umum"),
				"139" => array("table" => "txn_tanah", "field" => "penampungan_sampah"),
				"146" => array("table" => "txn_tanah", "field" => "topografi"),
				"147" => array("table" => "txn_tanah", "field" => "jenis_tanah"),
				"148" => array("table" => "txn_tanah", "field" => "tata_lingkungan"),
				"149" => array("table" => "txn_tanah", "field" => "resiko_banjir"),
				"150" => array("table" => "txn_tanah", "field" => "posisi_tanah"),
				"151" => array("table" => "txn_tanah", "field" => "tinggi_tanah"),
				"152" => array("table" => "txn_tanah", "field" => "ruang_areal_sutet"),
				"153" => array("table" => "txn_tanah", "field" => "jarak_obyek_terhadap_sutet"),
				"154" => array("table" => "r_data_legalitas", "field" => "jenis_sertifikat"),
				"155" => array("table" => "r_data_legalitas", "field" => "nomor_sertifikat"),
				"156" => array("table" => "r_data_legalitas", "field" => "atas_nama"),
				"157" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_terbit"),
				"158" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_berakhir"),
				"159" => array("table" => "r_data_legalitas", "field" => "nomor"),
				"160" => array("table" => "r_data_legalitas", "field" => "tgl_bln_thn"),
				"161" => array("table" => "r_data_legalitas", "field" => "luas_tanah"),
				"162" => array("table" => "txn_tanah", "field" => "luas"),
				"163" => array("table" => "txn_sarana_pelengkap", "field" => "carport_keterangan"),
				"164" => array("table" => "txn_sarana_pelengkap", "field" => "carport_ukuran"),
				"165" => array("table" => "txn_sarana_pelengkap", "field" => "carport_biaya"),
				"166" => array("table" => "txn_sarana_pelengkap", "field" => "carport_brb"),
				"167" => array("table" => "txn_sarana_pelengkap", "field" => "carport_dep"),
				"168" => array("table" => "txn_sarana_pelengkap", "field" => "carport_nilai_pasar"),
				"169" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_keterangan"),
				"170" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_ukuran"),
				"171" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_biaya"),
				"172" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_brb"),
				"173" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_dep"),
				"174" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_nilai_pasar"),
				"175" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_keterangan"),
				"176" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_ukuran"),
				"177" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_biaya"),
				"178" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_brb"),
				"179" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_dep"),
				"180" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_nilai_pasar"),
				"181" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_keterangan"),
				"182" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_ukuran"),
				"183" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_biaya"),
				"184" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_brb"),
				"185" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_dep"),
				"186" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_nilai_pasar"),
				"187" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_keterangan"),
				"188" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_ukuran"),
				"189" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_biaya"),
				"190" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_brb"),
				"191" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_dep"),
				"192" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_nilai_pasar"),
				"193" => array("table" => "txn_sarana_pelengkap", "field" => "taman_keterangan"),
				"194" => array("table" => "txn_sarana_pelengkap", "field" => "taman_ukuran"),
				"195" => array("table" => "txn_sarana_pelengkap", "field" => "taman_biaya"),
				"196" => array("table" => "txn_sarana_pelengkap", "field" => "taman_brb"),
				"197" => array("table" => "txn_sarana_pelengkap", "field" => "taman_dep"),
				"198" => array("table" => "txn_sarana_pelengkap", "field" => "taman_nilai_pasar"),
				"200" => array("table" => "txn_sarana_pelengkap", "field" => "nilai_pasar"),
				"201" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_keterangan"),
				"202" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_ukuran"),
				"203" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_biaya"),
				"204" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_brb"),
				"205" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_dep"),
				"206" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_nilai_pasar"),
				"207" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_keterangan"),
				"208" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_ukuran"),
				"209" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_biaya"),
				"210" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_brb"),
				"211" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_dep"),
				"212" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_nilai_pasar"),
				"213" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar2_keterangan"),
				"214" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar2_ukuran"),
				"215" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar2_biaya"),
				"216" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar2_brb"),
				"217" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar2_dep"),
				"218" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar2_nilai_pasar"),
				"219" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_keterangan"),
				"220" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_ukuran"),
				"221" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_biaya"),
				"222" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_brb"),
				"223" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_dep"),
				"224" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_nilai_pasar"),
				"225" => array("table" => "txn_sarana_pelengkap", "field" => "gapura2_keterangan"),
				"226" => array("table" => "txn_sarana_pelengkap", "field" => "gapura2_ukuran"),
				"227" => array("table" => "txn_sarana_pelengkap", "field" => "gapura2_biaya"),
				"228" => array("table" => "txn_sarana_pelengkap", "field" => "gapura2_brb"),
				"229" => array("table" => "txn_sarana_pelengkap", "field" => "gapura2_dep"),
				"230" => array("table" => "txn_sarana_pelengkap", "field" => "gapura2_nilai_pasar"),
				"231" => array("table" => "txn_sarana_pelengkap", "field" => "taman2_keterangan"),
				"232" => array("table" => "txn_sarana_pelengkap", "field" => "taman2_ukuran"),
				"233" => array("table" => "txn_sarana_pelengkap", "field" => "taman2_biaya"),
				"234" => array("table" => "txn_sarana_pelengkap", "field" => "taman2_brb"),
				"235" => array("table" => "txn_sarana_pelengkap", "field" => "taman2_dep"),
				"236" => array("table" => "txn_sarana_pelengkap", "field" => "taman2_nilai_pasar"),
				"862" => array("table" => "txn_sarana_pelengkap", "field" => "catatan_penilai"),
				"241" => array("table" => "txn_tanah", "field" => "luas_tanah_terpotong"),
				"242" => array("table" => "txn_tanah", "field" => "tanggal_njop"),
				"243" => array("table" => "txn_tanah", "field" => "luas_tanah"),
				"244" => array("table" => "txn_tanah", "field" => "nilai_pasar"),
				"245" => array("table" => "txn_tanah", "field" => "nilai_likuidasi"),
				"246" => array("table" => "txn_tanah", "field" => "catatan_penilai"),
				"247" => array("table" => "txn_data_banding", "field" => "foto_1"),
				"248" => array("table" => "txn_data_banding", "field" => "foto_2"),
				"249" => array("table" => "txn_data_banding", "field" => "sumber_data_nama"),
				"250" => array("table" => "txn_data_banding", "field" => "sumber_data_keterangan"),
				"251" => array("table" => "txn_data_banding", "field" => "sumber_data_telepon"),
				"252" => array("table" => "txn_data_banding", "field" => "jenis_properti"),
				"253" => array("table" => "txn_data_banding", "field" => "alamat"),
				"254" => array("table" => "txn_data_banding", "field" => "jarak_dengan_objek"),
				"255" => array("table" => "txn_data_banding", "field" => "harga_penawaran"),
				"256" => array("table" => "txn_data_banding", "field" => "perkiraan_diskon"),
				"257" => array("table" => "txn_data_banding", "field" => "indikasi_harga_transaksi"),
				"258" => array("table" => "txn_data_banding", "field" => "waktu_penawaran"),
				"259" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas"),
				"260" => array("table" => "txn_data_banding", "field" => "luas_tanah"),
				"261" => array("table" => "txn_data_banding", "field" => "luas_bangunan"),
				"262" => array("table" => "txn_data_banding", "field" => "jumlah_lantai"),
				"263" => array("table" => "txn_data_banding", "field" => "tahun_dibangun"),
				"264" => array("table" => "txn_data_banding", "field" => "lebar_jalan"),
				"265" => array("table" => "txn_data_banding", "field" => "bentuk_tanah"),
				"266" => array("table" => "txn_data_banding", "field" => "letak_posisi_tanah"),
				"267" => array("table" => "txn_data_banding", "field" => "peruntukan"),
				"268" => array("table" => "txn_data_banding", "field" => "kondisi_existing_tanah"),
				"269" => array("table" => "txn_data_banding", "field" => "topografi"),
				"2079" => array("table" => "txn_data_banding", "field" => "tipe_bangunan"),
				"2080" => array("table" => "txn_data_banding", "field" => "brb_standar_mappi"),
				"2081" => array("table" => "txn_data_banding", "field" => "lokasi_op"),
				"2082" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas_op"),
				"2083" => array("table" => "txn_data_banding", "field" => "luas_tanah_op"),
				"2084" => array("table" => "txn_data_banding", "field" => "lebar_kondisi_jalan_op"),
				"2085" => array("table" => "txn_data_banding", "field" => "bentuk_tanah_op"),
				"2086" => array("table" => "txn_data_banding", "field" => "posisi_tanah_sudut_op"),
				"2087" => array("table" => "txn_data_banding", "field" => "posisi_tanah_tusuk_sate_op"),
				"2088" => array("table" => "txn_data_banding", "field" => "peruntukan_op"),
				"2089" => array("table" => "txn_data_banding", "field" => "topografi_op"),
				"2090" => array("table" => "txn_data_banding", "field" => "waktu_penawaran_op"),
				"270" => array("table" => "txn_data_banding", "field" => "brb_bangunan"),
				"271" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan"),
				"272" => array("table" => "txn_data_banding", "field" => "kondisi_fisik_bangunan"),
				"273" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan_permeter"),
				"274" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_tanah"),
				"276" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_tanah_permeter"),
				"290" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_tanah"),
				"291" => array("table" => "txn_data_banding", "field" => "bobot_rekonsiliasi"),
				"292" => array("table" => "txn_data_banding", "field" => "nilai_pasar_tanah"),
				"353" => array("table" => "txn_tanah", "field" => "perubahan_lingkungan_lainya"),
				"354" => array("table" => "txn_tanah", "field" => "data_hunian_lainya"),
				"635" => array("table" => "txn_bangunan", "field" => "tipe_bangunan"),
				"636" => array("table" => "txn_bangunan", "field" => "penggunaan_saat_ini"),
				"640" => array("table" => "txn_bangunan", "field" => "nomor_imb"),
				"642" => array("table" => "txn_bangunan", "field" => "tanggal_imb"),
				"641" => array("table" => "txn_bangunan", "field" => "jumlah_lantai"),
				"643" => array("table" => "txn_bangunan", "field" => "luas_imb"),
				"644" => array("table" => "txn_bangunan", "field" => "perbedaan_luas_fisik_imb"),
				"645" => array("table" => "txn_bangunan", "field" => "peruntukan"),
				"646" => array("table" => "txn_bangunan", "field" => "ketinggian_bangunan"),
				"647" => array("table" => "txn_bangunan", "field" => "tipe_massa_bangunan"),
				"648" => array("table" => "txn_bangunan", "field" => "koefisien_dasar_bangunan"),
				"649" => array("table" => "txn_bangunan", "field" => "koefisien_dasar_lantai"),
				"650" => array("table" => "txn_bangunan", "field" => "melanggar_ketinggian_bangunan"),
				"651" => array("table" => "txn_bangunan", "field" => "pelebaran_jalan"),
				"652" => array("table" => "txn_bangunan", "field" => "gsb"),
				"653" => array("table" => "txn_bangunan", "field" => "gss"),
				"654" => array("table" => "txn_bangunan", "field" => "total_luas_terpotong"),
				"655" => array("table" => "txn_bangunan", "field" => "arsitektur_bangunan"),
				"656" => array("table" => "txn_bangunan", "field" => "tahun_dibangun"),
				"657" => array("table" => "txn_bangunan", "field" => "tahun_direnovasi"),
				"658" => array("table" => "txn_bangunan", "field" => "lantai_bangunan_utama"),
				"659" => array("table" => "txn_bangunan", "field" => "jalan_depan_properti"),
				"660" => array("table" => "txn_bangunan", "field" => "pondasi"),
				"661" => array("table" => "txn_bangunan", "field" => "struktur"),
				"662" => array("table" => "txn_bangunan", "field" => "rangka_atap"),
				"663" => array("table" => "txn_bangunan", "field" => "penutup_atap"),
				"664" => array("table" => "txn_bangunan", "field" => "plafond"),
				"665" => array("table" => "txn_bangunan", "field" => "dinding"),
				"666" => array("table" => "txn_bangunan", "field" => "partisi_ruangan"),
				"667" => array("table" => "txn_bangunan", "field" => "kusen"),
				"668" => array("table" => "txn_bangunan", "field" => "pintu_jendela"),
				"669" => array("table" => "txn_bangunan", "field" => "lantai"),
				"670" => array("table" => "txn_bangunan", "field" => "tangga"),
				"671" => array("table" => "txn_bangunan", "field" => "pagar_halaman"),
				"672" => array("table" => "txn_bangunan", "field" => "saluran_listrik_pln"),
				"673" => array("table" => "txn_bangunan", "field" => "sambungan_telepon"),
				"674" => array("table" => "txn_bangunan", "field" => "jaringan_air_bersih"),
				"675" => array("table" => "txn_bangunan", "field" => "pendingin_ruangan"),
				"676" => array("table" => "txn_bangunan", "field" => "tipe_pendingin_ruangan"),
				"677" => array("table" => "txn_bangunan", "field" => "pemanas_air"),
				"678" => array("table" => "txn_bangunan", "field" => "tipe_pemanas_air"),
				"679" => array("table" => "txn_bangunan", "field" => "penangkal_petir"),
				"680" => array("table" => "txn_bangunan", "field" => "tipe_penangkal_petir"),
				"681" => array("table" => "txn_bangunan", "field" => "kolam_renang"),
				"682" => array("table" => "txn_bangunan", "field" => "tipe_kolam_renang"),
				"683" => array("table" => "txn_bangunan", "field" => "area_parkir"),
				"684" => array("table" => "txn_bangunan", "field" => "tipe_area_parkir"),
				"685" => array("table" => "txn_bangunan", "field" => "pemagaran_halaman"),
				"686" => array("table" => "txn_bangunan", "field" => "keadaan_halaman"),
				"687" => array("table" => "txn_bangunan", "field" => "tanggal_njop"),
				"688" => array("table" => "txn_bangunan", "field" => "harga_per_meter"),
				"689" => array("table" => "txn_bangunan", "field" => "nilai_pasar_fisik"),
				"690" => array("table" => "txn_bangunan", "field" => "indikasi_nilai_likuidasi_fisik"),
				"691" => array("table" => "txn_bangunan", "field" => "nilai_pasar_peraturan"),
				"692" => array("table" => "txn_bangunan", "field" => "indikasi_nilai_likuidasi_peraturan"),
				"693" => array("table" => "txn_bangunan", "field" => "catatan_penilai"),
				"891" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"892" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"893" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"895" => array("table" => "txn_tanah", "field" => "sumber_nomor_sertifikat"),
				"897" => array("table" => "txn_kertas_kerja", "field" => "dh_provinsi"),
				"898" => array("table" => "txn_kertas_kerja", "field" => "dh_kotakab"),
				"899" => array("table" => "txn_kertas_kerja", "field" => "dh_kecamatan"),
				"900" => array("table" => "txn_kertas_kerja", "field" => "dh_kelurahan"),
				"912" => array("table" => "txn_bangunan_btb", "field" => "tipe_bangunan"),
				"913" => array("table" => "txn_bangunan_btb", "field" => "jumlah_lantai"),
				"914" => array("table" => "txn_bangunan_btb", "field" => "tahun_penilaian"),
				"915" => array("table" => "txn_bangunan_btb", "field" => "tahun_bangun"),
				"916" => array("table" => "txn_bangunan_btb", "field" => "jenis_renovasi"),
				"917" => array("table" => "txn_bangunan_btb", "field" => "tahun_renovasi"),
				"918" => array("table" => "txn_bangunan_btb", "field" => "klasifikasi_bangunan"),
				"919" => array("table" => "txn_bangunan_btb", "field" => "kelas_bangunan"),
				"920" => array("table" => "txn_bangunan_btb", "field" => "umur_ekonomis"),
				"921" => array("table" => "txn_bangunan_btb", "field" => "umur_efektif"),
				"2074" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penandatangan_laporan"),
				"2075" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penilai"),
				"2076" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_surveyor"),
				"9900" => array("table" => "txn_data_banding", "field" => "latitude"),
				"9901" => array("table" => "txn_data_banding", "field" => "longitude"),
			);
		}
		elseif ($lokasi->id_jenis_objek == 2)
		{
			$mapping_id_field  = array(
				"1" => array("table" => "txn_kertas_kerja", "field" => "penandatangan_laporan"),
				"2" => array("table" => "txn_kertas_kerja", "field" => "obyek_penilaian"),
				"3" => array("table" => "txn_kertas_kerja", "field" => "nama_penilai"),
				"4" => array("table" => "txn_kertas_kerja", "field" => "kegunaan"),
				"5" => array("table" => "txn_kertas_kerja", "field" => "nama_surveyor"),
				"6" => array("table" => "txn_kertas_kerja", "field" => "jenis_klien"),
				"7" => array("table" => "txn_kertas_kerja", "field" => "klien"),
				"8" => array("table" => "txn_kertas_kerja", "field" => "telepon_klien"),
				"9" => array("table" => "txn_kertas_kerja", "field" => "tanggal_inspeksi_penilaian"),
				"10" => array("table" => "txn_kertas_kerja", "field" => "status_objek"),
				"11" => array("table" => "txn_kertas_kerja", "field" => "yang_dijumpai"),
				"12" => array("table" => "txn_kertas_kerja", "field" => "tanggal_laporan"),
				"13" => array("table" => "txn_kertas_kerja", "field" => "selaku"),
				"14" => array("table" => "txn_kertas_kerja", "field" => "obyek_ditempati_oleh"),
				"15" => array("table" => "txn_kertas_kerja", "field" => "nomor_laporan"),
				"16" => array("table" => "txn_kertas_kerja", "field" => "penggunaan_obyek"),
				"17" => array("table" => "txn_kertas_kerja", "field" => "debitur"),
				"18" => array("table" => "txn_kertas_kerja", "field" => "alamat_properti"),
				"19" => array("table" => "txn_kertas_kerja", "field" => "nama_cabang"),
				"20" => array("table" => "txn_kertas_kerja", "field" => "nama_staff"),
				"21" => array("table" => "txn_kertas_kerja", "field" => "provinsi"),
				"22" => array("table" => "txn_kertas_kerja", "field" => "jabatan"),
				"23" => array("table" => "txn_kertas_kerja", "field" => "kotakab"),
				"24" => array("table" => "txn_kertas_kerja", "field" => "nomor_penugasan"),
				"25" => array("table" => "txn_kertas_kerja", "field" => "kecamatan"),
				"26" => array("table" => "txn_kertas_kerja", "field" => "tanggal_penugasan"),
				"27" => array("table" => "txn_kertas_kerja", "field" => "kelurahan"),
				"28" => array("table" => "txn_kertas_kerja", "field" => "tujuan_penilaian"),
				"133" => array("table" => "txn_tanah", "field" => "foto"),
				"105" => array("table" => "txn_tanah", "field" => "jenis_batas_1"),
				"106" => array("table" => "txn_tanah", "field" => "batas_properti_1"),
				"107" => array("table" => "txn_tanah", "field" => "jenis_batas_2"),
				"108" => array("table" => "txn_tanah", "field" => "batas_properti_2"),
				"109" => array("table" => "txn_tanah", "field" => "jenis_batas_3"),
				"110" => array("table" => "txn_tanah", "field" => "batas_properti_3"),
				"111" => array("table" => "txn_tanah", "field" => "jenis_batas_4"),
				"112" => array("table" => "txn_tanah", "field" => "batas_properti_4"),
				"113" => array("table" => "txn_tanah", "field" => "lokasi_tanah"),
				"114" => array("table" => "txn_tanah", "field" => "harga_tanah_obyek"),
				"115" => array("table" => "txn_tanah", "field" => "kepadatan_bangunan"),
				"116" => array("table" => "txn_tanah", "field" => "pertumbuhan_bangunan"),
				"117" => array("table" => "txn_tanah", "field" => "kemudahan_mencapai_lokasi"),
				"118" => array("table" => "txn_tanah", "field" => "kemudahan_belanja"),
				"119" => array("table" => "txn_tanah", "field" => "kemudahan_rekreasi"),
				"120" => array("table" => "txn_tanah", "field" => "kemudahan_angkutan_umum"),
				"121" => array("table" => "txn_tanah", "field" => "kemudahan_sarana_pendidikan"),
				"122" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kejahatan"),
				"123" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kebakaran"),
				"124" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_bencana"),
				"125" => array("table" => "txn_tanah", "field" => "permukiman"),
				"126" => array("table" => "txn_tanah", "field" => "industri"),
				"127" => array("table" => "txn_tanah", "field" => "pertokoan"),
				"128" => array("table" => "txn_tanah", "field" => "perkantoran"),
				"129" => array("table" => "txn_tanah", "field" => "taman"),
				"130" => array("table" => "txn_tanah", "field" => "tanah_kosong"),
				"131" => array("table" => "txn_tanah", "field" => "perubahan_lingkungan"),
				"132" => array("table" => "txn_tanah", "field" => "data_hunian"),
				"133" => array("table" => "txn_tanah", "field" => "foto"),
				"140" => array("table" => "txn_tanah", "field" => "lebar_jalan_depan"),
				"141" => array("table" => "txn_tanah", "field" => "lebar_jalan_sekitar"),
				"142" => array("table" => "txn_tanah", "field" => "jenis_jalan_depan"),
				"143" => array("table" => "txn_tanah", "field" => "drainase"),
				"144" => array("table" => "txn_tanah", "field" => "trotoar"),
				"145" => array("table" => "txn_tanah", "field" => "lampu_jalan"),
				"134" => array("table" => "txn_tanah", "field" => "jaringan_listrik"),
				"135" => array("table" => "txn_tanah", "field" => "jaringan_telepon"),
				"136" => array("table" => "txn_tanah", "field" => "jaringan_air_bersih"),
				"137" => array("table" => "txn_tanah", "field" => "jaringan_gas"),
				"138" => array("table" => "txn_tanah", "field" => "pemakaman_umum"),
				"139" => array("table" => "txn_tanah", "field" => "penampungan_sampah"),
				"146" => array("table" => "txn_tanah", "field" => "topografi"),
				"147" => array("table" => "txn_tanah", "field" => "jenis_tanah"),
				"148" => array("table" => "txn_tanah", "field" => "tata_lingkungan"),
				"149" => array("table" => "txn_tanah", "field" => "resiko_banjir"),
				"150" => array("table" => "txn_tanah", "field" => "posisi_tanah"),
				"151" => array("table" => "txn_tanah", "field" => "tinggi_tanah"),
				"152" => array("table" => "txn_tanah", "field" => "ruang_areal_sutet"),
				"153" => array("table" => "txn_tanah", "field" => "jarak_obyek_terhadap_sutet"),
				"154" => array("table" => "r_data_legalitas", "field" => "jenis_sertifikat"),
				"155" => array("table" => "r_data_legalitas", "field" => "nomor_sertifikat"),
				"156" => array("table" => "r_data_legalitas", "field" => "atas_nama"),
				"157" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_terbit"),
				"158" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_berakhir"),
				"159" => array("table" => "r_data_legalitas", "field" => "nomor"),
				"160" => array("table" => "r_data_legalitas", "field" => "tgl_bln_thn"),
				"161" => array("table" => "r_data_legalitas", "field" => "luas_tanah"),
				"162" => array("table" => "txn_tanah", "field" => "luas"),
				"176" => array("table" => "txn_bangunan", "field" => "brb_rcn_permeter"),
				"241" => array("table" => "txn_tanah", "field" => "luas_tanah_terpotong"),
				"242" => array("table" => "txn_tanah", "field" => "tanggal_njop"),
				"243" => array("table" => "txn_tanah", "field" => "luas_tanah"),
				"244" => array("table" => "txn_tanah", "field" => "nilai_pasar"),
				"245" => array("table" => "txn_tanah", "field" => "nilai_likuidasi"),
				"246" => array("table" => "txn_tanah", "field" => "catatan_penilai"),
				"247" => array("table" => "txn_data_banding", "field" => "foto_1"),
				"248" => array("table" => "txn_data_banding", "field" => "foto_2"),
				"249" => array("table" => "txn_data_banding", "field" => "sumber_data_nama"),
				"250" => array("table" => "txn_data_banding", "field" => "sumber_data_keterangan"),
				"251" => array("table" => "txn_data_banding", "field" => "sumber_data_telepon"),
				"252" => array("table" => "txn_data_banding", "field" => "jenis_properti"),
				"253" => array("table" => "txn_data_banding", "field" => "alamat"),
				"254" => array("table" => "txn_data_banding", "field" => "jarak_dengan_objek"),
				"255" => array("table" => "txn_data_banding", "field" => "harga_penawaran"),
				"256" => array("table" => "txn_data_banding", "field" => "perkiraan_diskon"),
				"257" => array("table" => "txn_data_banding", "field" => "indikasi_harga_transaksi"),
				"258" => array("table" => "txn_data_banding", "field" => "waktu_penawaran"),
				"259" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas"),
				"260" => array("table" => "txn_data_banding", "field" => "luas_tanah"),
				"261" => array("table" => "txn_data_banding", "field" => "luas_bangunan"),
				"262" => array("table" => "txn_data_banding", "field" => "jumlah_lantai"),
				"263" => array("table" => "txn_data_banding", "field" => "tahun_dibangun"),
				"264" => array("table" => "txn_data_banding", "field" => "lebar_jalan"),
				"265" => array("table" => "txn_data_banding", "field" => "bentuk_tanah"),
				"266" => array("table" => "txn_data_banding", "field" => "letak_posisi_tanah"),
				"267" => array("table" => "txn_data_banding", "field" => "peruntukan"),
				"268" => array("table" => "txn_data_banding", "field" => "kondisi_existing_tanah"),
				"269" => array("table" => "txn_data_banding", "field" => "topografi"),
				"2079" => array("table" => "txn_data_banding", "field" => "tipe_bangunan"),
				"2080" => array("table" => "txn_data_banding", "field" => "brb_standar_mappi"),
				"2081" => array("table" => "txn_data_banding", "field" => "lokasi_op"),
				"2082" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas_op"),
				"2083" => array("table" => "txn_data_banding", "field" => "luas_tanah_op"),
				"2084" => array("table" => "txn_data_banding", "field" => "lebar_kondisi_jalan_op"),
				"2085" => array("table" => "txn_data_banding", "field" => "bentuk_tanah_op"),
				"2086" => array("table" => "txn_data_banding", "field" => "posisi_tanah_sudut_op"),
				"2087" => array("table" => "txn_data_banding", "field" => "posisi_tanah_tusuk_sate_op"),
				"2088" => array("table" => "txn_data_banding", "field" => "peruntukan_op"),
				"2089" => array("table" => "txn_data_banding", "field" => "topografi_op"),
				"2090" => array("table" => "txn_data_banding", "field" => "waktu_penawaran_op"),
				"270" => array("table" => "txn_data_banding", "field" => "brb_bangunan"),
				"271" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan"),
				"272" => array("table" => "txn_data_banding", "field" => "kondisi_fisik_bangunan"),
				"273" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan_permeter"),
				"274" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_tanah"),
				"276" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_tanah_permeter"),
				"290" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_tanah"),
				"291" => array("table" => "txn_data_banding", "field" => "bobot_rekonsiliasi"),
				"292" => array("table" => "txn_data_banding", "field" => "nilai_pasar"),
				"353" => array("table" => "txn_tanah", "field" => "perubahan_lingkungan_lainya"),
				"354" => array("table" => "txn_tanah", "field" => "data_hunian_lainya"),
				"635" => array("table" => "txn_bangunan", "field" => "tipe_bangunan"),
				"636" => array("table" => "txn_bangunan", "field" => "penggunaan_saat_ini"),
				"639" => array("table" => "txn_bangunan", "field" => "luas"),
				"640" => array("table" => "txn_bangunan", "field" => "nomor_imb"),
				"642" => array("table" => "txn_bangunan", "field" => "tanggal_imb"),
				"641" => array("table" => "txn_bangunan", "field" => "jumlah_lantai"),
				"643" => array("table" => "txn_bangunan", "field" => "luas_imb"),
				"644" => array("table" => "txn_bangunan", "field" => "perbedaan_luas_fisik_imb"),
				"645" => array("table" => "txn_bangunan", "field" => "peruntukan"),
				"646" => array("table" => "txn_bangunan", "field" => "ketinggian_bangunan"),
				"647" => array("table" => "txn_bangunan", "field" => "tipe_massa_bangunan"),
				"648" => array("table" => "txn_bangunan", "field" => "koefisien_dasar_bangunan"),
				"649" => array("table" => "txn_bangunan", "field" => "koefisien_dasar_lantai"),
				"650" => array("table" => "txn_bangunan", "field" => "melanggar_ketinggian_bangunan"),
				"651" => array("table" => "txn_bangunan", "field" => "pelebaran_jalan"),
				"652" => array("table" => "txn_bangunan", "field" => "gsb"),
				"653" => array("table" => "txn_bangunan", "field" => "gss"),
				"654" => array("table" => "txn_bangunan", "field" => "total_luas_terpotong"),
				"655" => array("table" => "txn_bangunan", "field" => "arsitektur_bangunan"),
				"656" => array("table" => "txn_bangunan", "field" => "tahun_dibangun"),
				"657" => array("table" => "txn_bangunan", "field" => "tahun_direnovasi"),
				"658" => array("table" => "txn_bangunan", "field" => "lantai_bangunan_utama"),
				"659" => array("table" => "txn_bangunan", "field" => "jalan_depan_properti"),
				"660" => array("table" => "txn_bangunan", "field" => "pondasi"),
				"661" => array("table" => "txn_bangunan", "field" => "struktur"),
				"662" => array("table" => "txn_bangunan", "field" => "rangka_atap"),
				"663" => array("table" => "txn_bangunan", "field" => "penutup_atap"),
				"664" => array("table" => "txn_bangunan", "field" => "plafond"),
				"665" => array("table" => "txn_bangunan", "field" => "dinding"),
				"666" => array("table" => "txn_bangunan", "field" => "partisi_ruangan"),
				"667" => array("table" => "txn_bangunan", "field" => "kusen"),
				"668" => array("table" => "txn_bangunan", "field" => "pintu_jendela"),
				"669" => array("table" => "txn_bangunan", "field" => "lantai"),
				"670" => array("table" => "txn_bangunan", "field" => "tangga"),
				"671" => array("table" => "txn_bangunan", "field" => "pagar_halaman"),
				"672" => array("table" => "txn_bangunan", "field" => "saluran_listrik_pln"),
				"673" => array("table" => "txn_bangunan", "field" => "sambungan_telepon"),
				"674" => array("table" => "txn_bangunan", "field" => "jaringan_air_bersih"),
				"675" => array("table" => "txn_bangunan", "field" => "pendingin_ruangan"),
				"676" => array("table" => "txn_bangunan", "field" => "tipe_pendingin_ruangan"),
				"677" => array("table" => "txn_bangunan", "field" => "pemanas_air"),
				"678" => array("table" => "txn_bangunan", "field" => "tipe_pemanas_air"),
				"679" => array("table" => "txn_bangunan", "field" => "penangkal_petir"),
				"680" => array("table" => "txn_bangunan", "field" => "tipe_penangkal_petir"),
				"681" => array("table" => "txn_bangunan", "field" => "kolam_renang"),
				"682" => array("table" => "txn_bangunan", "field" => "tipe_kolam_renang"),
				"683" => array("table" => "txn_bangunan", "field" => "area_parkir"),
				"684" => array("table" => "txn_bangunan", "field" => "tipe_area_parkir"),
				"685" => array("table" => "txn_bangunan", "field" => "pemagaran_halaman"),
				"686" => array("table" => "txn_bangunan", "field" => "keadaan_halaman"),
				"687" => array("table" => "txn_bangunan", "field" => "tanggal_njop"),
				"688" => array("table" => "txn_bangunan", "field" => "harga_per_meter"),
				"689" => array("table" => "txn_bangunan", "field" => "nilai_pasar"),
				"690" => array("table" => "txn_bangunan", "field" => "nilai_likuidasi"),
				"691" => array("table" => "txn_bangunan", "field" => "nilai_pasar_peraturan"),
				"692" => array("table" => "txn_bangunan", "field" => "indikasi_nilai_likuidasi_peraturan"),
				"693" => array("table" => "txn_bangunan", "field" => "catatan_penilai"),
				"749" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_ukuran"),
				"750" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_biaya"),
				"751" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_brb"),
				"752" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_dep"),
				"753" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_nilai_pasar"),
				"754" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_ukuran"),
				"756" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_biaya"),
				"757" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_brb"),
				"758" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_dep"),
				"759" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_nilai_pasar"),
				"760" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_keterangan"),
				"761" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_ukuran"),
				"762" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_biaya"),
				"763" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_brb"),
				"764" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_dep"),
				"765" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_nilai_pasar"),
				"766" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_ukuran"),
				"767" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_biaya"),
				"768" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_brb"),
				"769" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_dep"),
				"770" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_nilai_pasar"),
				"771" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_ukuran"),
				"772" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_biaya"),
				"773" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_brb"),
				"774" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_dep"),
				"775" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_nilai_pasar"),
				"776" => array("table" => "txn_sarana_pelengkap", "field" => "ac_keterangan"),
				"777" => array("table" => "txn_sarana_pelengkap", "field" => "ac_ukuran"),
				"778" => array("table" => "txn_sarana_pelengkap", "field" => "ac_biaya"),
				"779" => array("table" => "txn_sarana_pelengkap", "field" => "ac_brb"),
				"780" => array("table" => "txn_sarana_pelengkap", "field" => "ac_dep"),
				"781" => array("table" => "txn_sarana_pelengkap", "field" => "ac_nilai_pasar"),
				"782" => array("table" => "txn_sarana_pelengkap", "field" => "carport_keterangan"),
				"783" => array("table" => "txn_sarana_pelengkap", "field" => "carport_ukuran"),
				"784" => array("table" => "txn_sarana_pelengkap", "field" => "carport_biaya"),
				"785" => array("table" => "txn_sarana_pelengkap", "field" => "carport_brb"),
				"786" => array("table" => "txn_sarana_pelengkap", "field" => "carport_dep"),
				"787" => array("table" => "txn_sarana_pelengkap", "field" => "carport_nilai_pasar"),
				"788" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_keterangan"),
				"789" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_ukuran"),
				"790" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_biaya"),
				"791" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_brb"),
				"792" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_dep"),
				"793" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_nilai_pasar"),
				"794" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_keterangan"),
				"795" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_ukuran"),
				"796" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_biaya"),
				"797" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_brb"),
				"798" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_dep"),
				"799" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_nilai_pasar"),
				"800" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_keterangan"),
				"801" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_ukuran"),
				"802" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_biaya"),
				"803" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_brb"),
				"804" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_dep"),
				"805" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_nilai_pasar"),
				"806" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_keterangan"),
				"807" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_ukuran"),
				"808" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_biaya"),
				"809" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_brb"),
				"810" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_dep"),
				"811" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_nilai_pasar"),
				"812" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_keterangan"),
				"813" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_ukuran"),
				"814" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_biaya"),
				"815" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_brb"),
				"816" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_dep"),
				"817" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_nilai_pasar"),
				"818" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_keterangan"),
				"819" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_ukuran"),
				"820" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_biaya"),
				"821" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_brb"),
				"822" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_dep"),
				"823" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_nilai_pasar"),
				"824" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_keterangan"),
				"825" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_ukuran"),
				"826" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_biaya"),
				"827" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_brb"),
				"828" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_dep"),
				"829" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_nilai_pasar"),
				"830" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_keterangan"),
				"831" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_ukuran"),
				"832" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_biaya"),
				"833" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_brb"),
				"834" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_dep"),
				"835" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_nilai_pasar"),
				"836" => array("table" => "txn_sarana_pelengkap", "field" => "brb_rcn"),
				"837" => array("table" => "txn_sarana_pelengkap", "field" => "nilai_pasar"),
				"838" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_keterangan"),
				"839" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_ukuran"),
				"840" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_biaya"),
				"841" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_brb"),
				"842" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_dep"),
				"843" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_nilai_pasar"),
				"844" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_keterangan"),
				"845" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_ukuran"),
				"846" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_biaya"),
				"847" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_brb"),
				"848" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_dep"),
				"849" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_nilai_pasar"),
				"850" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_keterangan"),
				"851" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_ukuran"),
				"852" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_biaya"),
				"853" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_brb"),
				"854" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_dep"),
				"855" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_nilai_pasar"),
				"856" => array("table" => "txn_sarana_pelengkap", "field" => "taman_keterangan"),
				"857" => array("table" => "txn_sarana_pelengkap", "field" => "taman_ukuran"),
				"858" => array("table" => "txn_sarana_pelengkap", "field" => "taman_biaya"),
				"859" => array("table" => "txn_sarana_pelengkap", "field" => "taman_brb"),
				"860" => array("table" => "txn_sarana_pelengkap", "field" => "taman_dep"),
				"861" => array("table" => "txn_sarana_pelengkap", "field" => "taman_nilai_pasar"),
				"862" => array("table" => "txn_sarana_pelengkap", "field" => "catatan_penilai"),
				"895" => array("table" => "txn_tanah", "field" => "sumber_nomor_sertifikat"),
				"897" => array("table" => "txn_kertas_kerja", "field" => "dh_provinsi"),
				"898" => array("table" => "txn_kertas_kerja", "field" => "dh_kotakab"),
				"899" => array("table" => "txn_kertas_kerja", "field" => "dh_kecamatan"),
				"900" => array("table" => "txn_kertas_kerja", "field" => "dh_kelurahan"),
				"891" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"892" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"893" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"901" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_nama"),
				"902" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_keterangan"),
				"903" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_ukuran"),
				"904" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_biaya"),
				"905" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_brb"),
				"906" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_dep"),
				"907" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_nilai_pasar"),
				"911" => array("table" => "txn_bangunan", "field" => "total_luas_btb"),
				"912" => array("table" => "txn_bangunan", "field" => "tipe_bangunan_btb"),
				"913" => array("table" => "txn_bangunan", "field" => "jumlah_lantai_btb"),
				"914" => array("table" => "txn_bangunan", "field" => "tahun_penilaian_btb"),
				"915" => array("table" => "txn_bangunan", "field" => "tahun_bangun_btb"),
				"916" => array("table" => "txn_bangunan", "field" => "jenis_renovasi_btb"),
				"917" => array("table" => "txn_bangunan", "field" => "tahun_renovasi_btb"),
				"918" => array("table" => "txn_bangunan", "field" => "klasifikasi_bangunan_btb"),
				"919" => array("table" => "txn_bangunan", "field" => "kelas_bangunan_btb"),
				"920" => array("table" => "txn_bangunan", "field" => "umur_ekonomis_btb"),
				"921" => array("table" => "txn_bangunan", "field" => "umur_efektif_btb"),
				"933" => array("table" => "txn_bangunan", "field" => "kemunduran_fisik"),
				"934" => array("table" => "txn_bangunan", "field" => "kondisi_terlihat"),
				"935" => array("table" => "txn_bangunan", "field" => "keusangan_fungsional"),
				"936" => array("table" => "txn_bangunan", "field" => "keusangan_ekonomis"),
				"937" => array("table" => "txn_bangunan", "field" => "total_penyusutan"),
				"969" => array("table" => "txn_data_banding", "field" => "nilai_pasar_bangunan_kios"),
				"979" => array("table" => "txn_data_banding", "field" => "depresiasi"),
				"980" => array("table" => "txn_data_banding", "field" => "nilai_likuidasi"),
				"1117" => array("table" => "txn_data_banding", "field" => "depresiasi"),
				"2074" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penandatangan_laporan"),
				"2075" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penilai"),
				"2076" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_surveyor"),
				"9900" => array("table" => "txn_data_banding", "field" => "latitude"),
				"9901" => array("table" => "txn_data_banding", "field" => "longitude"),
			);
		}
		elseif ($lokasi->id_jenis_objek == 3)
		{
			$mapping_id_field  = array(
				"1" => array("table" => "txn_kertas_kerja", "field" => "penandatangan_laporan"),
				"2" => array("table" => "txn_kertas_kerja", "field" => "obyek_penilaian"),
				"3" => array("table" => "txn_kertas_kerja", "field" => "nama_penilai"),
				"4" => array("table" => "txn_kertas_kerja", "field" => "kegunaan"),
				"5" => array("table" => "txn_kertas_kerja", "field" => "nama_surveyor"),
				"6" => array("table" => "txn_kertas_kerja", "field" => "jenis_klien"),
				"7" => array("table" => "txn_kertas_kerja", "field" => "klien"),
				"8" => array("table" => "txn_kertas_kerja", "field" => "telepon_klien"),
				"9" => array("table" => "txn_kertas_kerja", "field" => "tanggal_inspeksi_penilaian"),
				"10" => array("table" => "txn_kertas_kerja", "field" => "status_objek"),
				"11" => array("table" => "txn_kertas_kerja", "field" => "yang_dijumpai"),
				"12" => array("table" => "txn_kertas_kerja", "field" => "tanggal_laporan"),
				"13" => array("table" => "txn_kertas_kerja", "field" => "selaku"),
				"14" => array("table" => "txn_kertas_kerja", "field" => "obyek_ditempati_oleh"),
				"15" => array("table" => "txn_kertas_kerja", "field" => "nomor_laporan"),
				"16" => array("table" => "txn_kertas_kerja", "field" => "penggunaan_obyek"),
				"17" => array("table" => "txn_kertas_kerja", "field" => "debitur"),
				"18" => array("table" => "txn_kertas_kerja", "field" => "alamat_properti"),
				"19" => array("table" => "txn_kertas_kerja", "field" => "nama_cabang"),
				"20" => array("table" => "txn_kertas_kerja", "field" => "nama_staff"),
				"21" => array("table" => "txn_kertas_kerja", "field" => "provinsi"),
				"22" => array("table" => "txn_kertas_kerja", "field" => "jabatan"),
				"23" => array("table" => "txn_kertas_kerja", "field" => "kotakab"),
				"24" => array("table" => "txn_kertas_kerja", "field" => "nomor_penugasan"),
				"25" => array("table" => "txn_kertas_kerja", "field" => "kecamatan"),
				"26" => array("table" => "txn_kertas_kerja", "field" => "tanggal_penugasan"),
				"27" => array("table" => "txn_kertas_kerja", "field" => "kelurahan"),
				"28" => array("table" => "txn_kertas_kerja", "field" => "tujuan_penilaian"),
				"133" => array("table" => "txn_tanah", "field" => "foto"),
				"105" => array("table" => "txn_tanah", "field" => "jenis_batas_1"),
				"106" => array("table" => "txn_tanah", "field" => "batas_properti_1"),
				"107" => array("table" => "txn_tanah", "field" => "jenis_batas_2"),
				"108" => array("table" => "txn_tanah", "field" => "batas_properti_2"),
				"109" => array("table" => "txn_tanah", "field" => "jenis_batas_3"),
				"110" => array("table" => "txn_tanah", "field" => "batas_properti_3"),
				"111" => array("table" => "txn_tanah", "field" => "jenis_batas_4"),
				"112" => array("table" => "txn_tanah", "field" => "batas_properti_4"),
				"113" => array("table" => "txn_tanah", "field" => "lokasi_pusat_perbelanjaan"),
				"114" => array("table" => "txn_tanah", "field" => "harga_unit_kios"),
				"115" => array("table" => "txn_tanah", "field" => "kepadatan_hunian"),
				"116" => array("table" => "txn_tanah", "field" => "pertumbuhan_hunian"),
				"117" => array("table" => "txn_tanah", "field" => "kemudahan_mencapai_lokasi"),
				"118" => array("table" => "txn_tanah", "field" => "kemudahan_belanja"),
				"119" => array("table" => "txn_tanah", "field" => "kemudahan_rekreasi"),
				"120" => array("table" => "txn_tanah", "field" => "kemudahan_angkutan_umum"),
				"121" => array("table" => "txn_tanah", "field" => "kemudahan_sarana_pendidikan"),
				"122" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kejahatan"),
				"123" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kebakaran"),
				"124" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_bencana"),
				"125" => array("table" => "txn_tanah", "field" => "permukiman"),
				"126" => array("table" => "txn_tanah", "field" => "industri"),
				"127" => array("table" => "txn_tanah", "field" => "pertokoan"),
				"128" => array("table" => "txn_tanah", "field" => "perkantoran"),
				"129" => array("table" => "txn_tanah", "field" => "taman"),
				"130" => array("table" => "txn_tanah", "field" => "tanah_kosong"),
				"131" => array("table" => "txn_tanah", "field" => "perubahan_lingkungan"),
				"132" => array("table" => "txn_tanah", "field" => "data_hunian"),
				"133" => array("table" => "txn_tanah", "field" => "foto"),
				"140" => array("table" => "txn_tanah", "field" => "ac_control"),
				"141" => array("table" => "txn_tanah", "field" => "food_court"),
				"142" => array("table" => "txn_tanah", "field" => "gallery_atm"),
				"143" => array("table" => "txn_tanah", "field" => "sarana_ibadah"),
				"144" => array("table" => "txn_tanah", "field" => "lift_penumpang"),
				"145" => array("table" => "txn_tanah", "field" => "lift_barang"),
				"147" => array("table" => "txn_tanah", "field" => "cctv"),
				"149" => array("table" => "txn_tanah", "field" => "fasilitas_parkir"),
				"134" => array("table" => "txn_tanah", "field" => "jaringan_listrik"),
				"135" => array("table" => "txn_tanah", "field" => "jaringan_telepon"),
				"136" => array("table" => "txn_tanah", "field" => "jaringan_air_bersih"),
				"137" => array("table" => "txn_tanah", "field" => "jaringan_gas"),
				"138" => array("table" => "txn_tanah", "field" => "excalator"),
				"139" => array("table" => "txn_tanah", "field" => "tangga_darurat"),
				"142" => array("table" => "txn_tanah", "field" => "gallery_atm"),
				"146" => array("table" => "txn_tanah", "field" => "topografi"),
				"147" => array("table" => "txn_tanah", "field" => "cctv"),
				"148" => array("table" => "txn_tanah", "field" => "hydrant"),
				"149" => array("table" => "txn_tanah", "field" => "fasilitas_parkir"),
				"150" => array("table" => "txn_tanah", "field" => "posisi_tanah"),
				"151" => array("table" => "txn_tanah", "field" => "nomor_imb"),
				"152" => array("table" => "txn_tanah", "field" => "tanggal_dikeluarkan_imb"),
				"153" => array("table" => "txn_tanah", "field" => "luas_imb"),
				"154" => array("table" => "r_data_legalitas", "field" => "jenis_sertifikat"),
				"155" => array("table" => "r_data_legalitas", "field" => "nomor_sertifikat"),
				"156" => array("table" => "r_data_legalitas", "field" => "atas_nama"),
				"157" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_terbit"),
				"158" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_berakhir"),
				"159" => array("table" => "r_data_legalitas", "field" => "nomor"),
				"160" => array("table" => "r_data_legalitas", "field" => "tgl_bln_thn"),
				"161" => array("table" => "r_data_legalitas", "field" => "luas_tanah"),
				"162" => array("table" => "txn_tanah", "field" => "luas"),
				"241" => array("table" => "txn_tanah", "field" => "luas_tanah_terpotong"),
				"242" => array("table" => "txn_tanah", "field" => "tanggal_njop"),
				"243" => array("table" => "txn_tanah", "field" => "luas_tanah"),
				"244" => array("table" => "txn_tanah", "field" => "nilai_pasar"),
				"245" => array("table" => "txn_tanah", "field" => "nilai_likuidasi"),
				"246" => array("table" => "txn_tanah", "field" => "catatan_penilai"),
				"247" => array("table" => "txn_data_banding", "field" => "foto_1"),
				"248" => array("table" => "txn_data_banding", "field" => "foto_2"),
				"249" => array("table" => "txn_data_banding", "field" => "sumber_data_nama"),
				"250" => array("table" => "txn_data_banding", "field" => "sumber_data_keterangan"),
				"251" => array("table" => "txn_data_banding", "field" => "sumber_data_telepon"),
				"252" => array("table" => "txn_data_banding", "field" => "jenis_properti"),
				"253" => array("table" => "txn_data_banding", "field" => "nama_pusat_perbelanjaan"),
				"254" => array("table" => "txn_data_banding", "field" => "letak_lantai_kios"),
				"255" => array("table" => "txn_data_banding", "field" => "harga_penawaran"),
				"256" => array("table" => "txn_data_banding", "field" => "perkiraan_diskon"),
				"257" => array("table" => "txn_data_banding", "field" => "indikasi_harga_transaksi"),
				"258" => array("table" => "txn_data_banding", "field" => "waktu_penawaran"),
				"259" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas"),
				"260" => array("table" => "txn_data_banding", "field" => "luas_unit_kios"),
				"261" => array("table" => "txn_data_banding", "field" => "luas_bangunan"),
				"262" => array("table" => "txn_data_banding", "field" => "jumlah_lantai"),
				"263" => array("table" => "txn_data_banding", "field" => "blok_area"),
				"264" => array("table" => "txn_data_banding", "field" => "lebar_jalan"),
				"265" => array("table" => "txn_data_banding", "field" => "bentuk_tanah"),
				"266" => array("table" => "txn_data_banding", "field" => "letak_posisi_tanah"),
				"267" => array("table" => "txn_data_banding", "field" => "peruntukan"),
				"268" => array("table" => "txn_data_banding", "field" => "kondisi_existing_tanah"),
				"269" => array("table" => "txn_data_banding", "field" => "topografi"),
				"2079" => array("table" => "txn_data_banding", "field" => "tipe_bangunan"),
				"2080" => array("table" => "txn_data_banding", "field" => "brb_standar_mappi"),
				"2081" => array("table" => "txn_data_banding", "field" => "lokasi_op"),
				"2082" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas_op"),
				"2083" => array("table" => "txn_data_banding", "field" => "luas_kios_op"),
				"2084" => array("table" => "txn_data_banding", "field" => "letak_lantai_kios_op"),
				"2085" => array("table" => "txn_data_banding", "field" => "lokasi_kios_op"),
				"2086" => array("table" => "txn_data_banding", "field" => "posisi_kios_op"),
				"2087" => array("table" => "txn_data_banding", "field" => "fasilitas_kios_op"),
				"2088" => array("table" => "txn_data_banding", "field" => "peruntukan_op"),
				"2089" => array("table" => "txn_data_banding", "field" => "topografi_op"),
				"2090" => array("table" => "txn_data_banding", "field" => "waktu_penawaran_op"),
				"270" => array("table" => "txn_data_banding", "field" => "brb_bangunan"),
				"271" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan"),
				"272" => array("table" => "txn_data_banding", "field" => "kondisi_fisik_bangunan"),
				"273" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan_permeter"),
				"274" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_tanah"),
				"276" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_bangunan_permeter"),
				"293" => array("table" => "txn_data_banding", "field" => "pembulatan_nilai_pasar_kios"),
				"294" => array("table" => "txn_data_banding", "field" => "pembulatan_nilai_likuidasi"),
				"290" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_properti"),
				"291" => array("table" => "txn_data_banding", "field" => "bobot_rekonsiliasi"),
				"292" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_properti_permeter"),
				"353" => array("table" => "txn_tanah", "field" => "perubahan_lingkungan_lainya"),
				"354" => array("table" => "txn_tanah", "field" => "data_hunian_lainya"),
				"635" => array("table" => "txn_bangunan", "field" => "tipe_bangunan"),
				"636" => array("table" => "txn_bangunan", "field" => "penggunaan_saat_ini"),
				"639" => array("table" => "txn_bangunan", "field" => "luas"),
				"640" => array("table" => "txn_bangunan", "field" => "nomor_imb"),
				"642" => array("table" => "txn_bangunan", "field" => "tanggal_imb"),
				"641" => array("table" => "txn_bangunan", "field" => "jumlah_lantai"),
				"643" => array("table" => "txn_bangunan", "field" => "luas_imb"),
				"644" => array("table" => "txn_bangunan", "field" => "perbedaan_luas_fisik_imb"),
				"645" => array("table" => "txn_bangunan", "field" => "lokasi_unit_kios"),
				"646" => array("table" => "txn_bangunan", "field" => "letak_lantai_kios"),
				"647" => array("table" => "txn_bangunan", "field" => "blok_area"),
				"648" => array("table" => "txn_bangunan", "field" => "posisi_unit_kios"),
				"649" => array("table" => "txn_bangunan", "field" => "interior_kios"),
				"650" => array("table" => "txn_bangunan", "field" => "produk_dagang"),
				"651" => array("table" => "txn_bangunan", "field" => "daya_listrik"),
				"652" => array("table" => "txn_bangunan", "field" => "unit_ac"),
				"653" => array("table" => "txn_bangunan", "field" => "telepon"),
				"654" => array("table" => "txn_bangunan", "field" => "total_luas_terpotong"),
				"655" => array("table" => "txn_bangunan", "field" => "arsitektur_bangunan"),
				"656" => array("table" => "txn_bangunan", "field" => "tahun_dibangun"),
				"657" => array("table" => "txn_bangunan", "field" => "tahun_direnovasi"),
				"658" => array("table" => "txn_bangunan", "field" => "lantai_bangunan_utama"),
				"659" => array("table" => "txn_bangunan", "field" => "jalan_depan_properti"),
				"660" => array("table" => "txn_bangunan", "field" => "pondasi"),
				"661" => array("table" => "txn_bangunan", "field" => "struktur"),
				"662" => array("table" => "txn_bangunan", "field" => "rangka_atap"),
				"663" => array("table" => "txn_bangunan", "field" => "penutup_atap"),
				"664" => array("table" => "txn_bangunan", "field" => "plafond"),
				"665" => array("table" => "txn_bangunan", "field" => "dinding"),
				"666" => array("table" => "txn_bangunan", "field" => "partisi_ruangan"),
				"667" => array("table" => "txn_bangunan", "field" => "kusen"),
				"668" => array("table" => "txn_bangunan", "field" => "pintu_jendela"),
				"669" => array("table" => "txn_bangunan", "field" => "lantai"),
				"670" => array("table" => "txn_bangunan", "field" => "tangga"),
				"671" => array("table" => "txn_bangunan", "field" => "pagar_halaman"),
				"672" => array("table" => "txn_bangunan", "field" => "saluran_listrik_pln"),
				"673" => array("table" => "txn_bangunan", "field" => "sambungan_telepon"),
				"674" => array("table" => "txn_bangunan", "field" => "jaringan_air_bersih"),
				"675" => array("table" => "txn_bangunan", "field" => "pendingin_ruangan"),
				"676" => array("table" => "txn_bangunan", "field" => "tipe_pendingin_ruangan"),
				"677" => array("table" => "txn_bangunan", "field" => "pemanas_air"),
				"678" => array("table" => "txn_bangunan", "field" => "tipe_pemanas_air"),
				"679" => array("table" => "txn_bangunan", "field" => "penangkal_petir"),
				"680" => array("table" => "txn_bangunan", "field" => "tipe_penangkal_petir"),
				"681" => array("table" => "txn_bangunan", "field" => "kolam_renang"),
				"682" => array("table" => "txn_bangunan", "field" => "tipe_kolam_renang"),
				"683" => array("table" => "txn_bangunan", "field" => "area_parkir"),
				"684" => array("table" => "txn_bangunan", "field" => "tipe_area_parkir"),
				"685" => array("table" => "txn_bangunan", "field" => "pemagaran_halaman"),
				"686" => array("table" => "txn_bangunan", "field" => "keadaan_halaman"),
				"687" => array("table" => "txn_bangunan", "field" => "tanggal_njop"),
				"688" => array("table" => "txn_bangunan", "field" => "harga_per_meter"),
				"689" => array("table" => "txn_bangunan", "field" => "nilai_pasar_fisik"),
				"690" => array("table" => "txn_bangunan", "field" => "indikasi_nilai_likuidasi_fisik"),
				"691" => array("table" => "txn_bangunan", "field" => "nilai_pasar"),
				"692" => array("table" => "txn_bangunan", "field" => "nilai_likuidasi"),
				"693" => array("table" => "txn_bangunan", "field" => "catatan_penilai"),
				"749" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_ukuran"),
				"750" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_biaya"),
				"751" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_brb"),
				"752" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_dep"),
				"753" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_nilai_pasar"),
				"754" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_ukuran"),
				"756" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_biaya"),
				"757" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_brb"),
				"758" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_dep"),
				"759" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_nilai_pasar"),
				"760" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_keterangan"),
				"761" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_ukuran"),
				"762" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_biaya"),
				"763" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_brb"),
				"764" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_dep"),
				"765" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_nilai_pasar"),
				"766" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_ukuran"),
				"767" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_biaya"),
				"768" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_brb"),
				"769" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_dep"),
				"770" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_nilai_pasar"),
				"771" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_ukuran"),
				"772" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_biaya"),
				"773" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_brb"),
				"774" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_dep"),
				"775" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_nilai_pasar"),
				"776" => array("table" => "txn_sarana_pelengkap", "field" => "ac_keterangan"),
				"777" => array("table" => "txn_sarana_pelengkap", "field" => "ac_ukuran"),
				"778" => array("table" => "txn_sarana_pelengkap", "field" => "ac_biaya"),
				"779" => array("table" => "txn_sarana_pelengkap", "field" => "ac_brb"),
				"780" => array("table" => "txn_sarana_pelengkap", "field" => "ac_dep"),
				"781" => array("table" => "txn_sarana_pelengkap", "field" => "ac_nilai_pasar"),
				"782" => array("table" => "txn_sarana_pelengkap", "field" => "carport_keterangan"),
				"783" => array("table" => "txn_sarana_pelengkap", "field" => "carport_ukuran"),
				"784" => array("table" => "txn_sarana_pelengkap", "field" => "carport_biaya"),
				"785" => array("table" => "txn_sarana_pelengkap", "field" => "carport_brb"),
				"786" => array("table" => "txn_sarana_pelengkap", "field" => "carport_dep"),
				"787" => array("table" => "txn_sarana_pelengkap", "field" => "carport_nilai_pasar"),
				"788" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_keterangan"),
				"789" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_ukuran"),
				"790" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_biaya"),
				"791" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_brb"),
				"792" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_dep"),
				"793" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_nilai_pasar"),
				"794" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_keterangan"),
				"795" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_ukuran"),
				"796" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_biaya"),
				"797" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_brb"),
				"798" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_dep"),
				"799" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_nilai_pasar"),
				"800" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_keterangan"),
				"801" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_ukuran"),
				"802" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_biaya"),
				"803" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_brb"),
				"804" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_dep"),
				"805" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_nilai_pasar"),
				"806" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_keterangan"),
				"807" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_ukuran"),
				"808" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_biaya"),
				"809" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_brb"),
				"810" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_dep"),
				"811" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_nilai_pasar"),
				"812" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_keterangan"),
				"813" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_ukuran"),
				"814" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_biaya"),
				"815" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_brb"),
				"816" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_dep"),
				"817" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_nilai_pasar"),
				"818" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_keterangan"),
				"819" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_ukuran"),
				"820" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_biaya"),
				"821" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_brb"),
				"822" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_dep"),
				"823" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_nilai_pasar"),
				"824" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_keterangan"),
				"825" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_ukuran"),
				"826" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_biaya"),
				"827" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_brb"),
				"828" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_dep"),
				"829" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_nilai_pasar"),
				"830" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_keterangan"),
				"831" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_ukuran"),
				"832" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_biaya"),
				"833" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_brb"),
				"834" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_dep"),
				"835" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_nilai_pasar"),
				"838" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_keterangan"),
				"839" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_ukuran"),
				"840" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_biaya"),
				"841" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_brb"),
				"842" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_dep"),
				"843" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_nilai_pasar"),
				"844" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_keterangan"),
				"845" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_ukuran"),
				"846" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_biaya"),
				"847" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_brb"),
				"848" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_dep"),
				"849" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_nilai_pasar"),
				"850" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_keterangan"),
				"851" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_ukuran"),
				"852" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_biaya"),
				"853" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_brb"),
				"854" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_dep"),
				"855" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_nilai_pasar"),
				"856" => array("table" => "txn_sarana_pelengkap", "field" => "taman_keterangan"),
				"857" => array("table" => "txn_sarana_pelengkap", "field" => "taman_ukuran"),
				"858" => array("table" => "txn_sarana_pelengkap", "field" => "taman_biaya"),
				"859" => array("table" => "txn_sarana_pelengkap", "field" => "taman_brb"),
				"860" => array("table" => "txn_sarana_pelengkap", "field" => "taman_dep"),
				"861" => array("table" => "txn_sarana_pelengkap", "field" => "taman_nilai_pasar"),
				"891" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"892" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"893" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"895" => array("table" => "txn_tanah", "field" => "sumber_nomor_sertifikat"),
				"897" => array("table" => "txn_kertas_kerja", "field" => "nama_gedung"),
				"898" => array("table" => "txn_kertas_kerja", "field" => "blok"),
				"899" => array("table" => "txn_kertas_kerja", "field" => "lantai"),
				"900" => array("table" => "txn_kertas_kerja", "field" => "nomor"),
				"901" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_nama"),
				"902" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_keterangan"),
				"903" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_ukuran"),
				"904" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_biaya"),
				"905" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_brb"),
				"906" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_dep"),
				"907" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_nilai_pasar"),
				"912" => array("table" => "txn_bangunan_btb", "field" => "tipe_bangunan"),
				"913" => array("table" => "txn_bangunan_btb", "field" => "jumlah_lantai"),
				"914" => array("table" => "txn_bangunan_btb", "field" => "tahun_penilaian"),
				"915" => array("table" => "txn_bangunan_btb", "field" => "tahun_bangun"),
				"916" => array("table" => "txn_bangunan_btb", "field" => "jenis_renovasi"),
				"917" => array("table" => "txn_bangunan_btb", "field" => "tahun_renovasi"),
				"918" => array("table" => "txn_bangunan_btb", "field" => "klasifikasi_bangunan"),
				"919" => array("table" => "txn_bangunan_btb", "field" => "kelas_bangunan"),
				"920" => array("table" => "txn_bangunan_btb", "field" => "umur_ekonomis"),
				"921" => array("table" => "txn_bangunan_btb", "field" => "umur_efektif"),
				"969" => array("table" => "txn_data_banding", "field" => "nilai_pasar_bangunan_kios"),
				"979" => array("table" => "txn_data_banding", "field" => "depresiasi"),
				"980" => array("table" => "txn_data_banding", "field" => "nilai_likuidasi"),
				"2074" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penandatangan_laporan"),
				"2075" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penilai"),
				"2076" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_surveyor"),
				"1117" => array("table" => "txn_data_banding", "field" => "depresiasi"),
				"9900" => array("table" => "txn_data_banding", "field" => "latitude"),
				"9901" => array("table" => "txn_data_banding", "field" => "longitude"),
			);
		}
		elseif ($lokasi->id_jenis_objek == 5)
		{
			$mapping_id_field  = array(
				"1" => array("table" => "txn_kertas_kerja", "field" => "penandatangan_laporan"),
				"2" => array("table" => "txn_kertas_kerja", "field" => "obyek_penilaian"),
				"3" => array("table" => "txn_kertas_kerja", "field" => "nama_penilai"),
				"4" => array("table" => "txn_kertas_kerja", "field" => "kegunaan"),
				"5" => array("table" => "txn_kertas_kerja", "field" => "nama_surveyor"),
				"6" => array("table" => "txn_kertas_kerja", "field" => "jenis_klien"),
				"7" => array("table" => "txn_kertas_kerja", "field" => "klien"),
				"8" => array("table" => "txn_kertas_kerja", "field" => "telepon_klien"),
				"9" => array("table" => "txn_kertas_kerja", "field" => "tanggal_inspeksi_penilaian"),
				"10" => array("table" => "txn_kertas_kerja", "field" => "status_objek"),
				"11" => array("table" => "txn_kertas_kerja", "field" => "yang_dijumpai"),
				"12" => array("table" => "txn_kertas_kerja", "field" => "tanggal_laporan"),
				"13" => array("table" => "txn_kertas_kerja", "field" => "selaku"),
				"14" => array("table" => "txn_kertas_kerja", "field" => "obyek_ditempati_oleh"),
				"15" => array("table" => "txn_kertas_kerja", "field" => "nomor_laporan"),
				"16" => array("table" => "txn_kertas_kerja", "field" => "penggunaan_obyek"),
				"17" => array("table" => "txn_kertas_kerja", "field" => "debitur"),
				"18" => array("table" => "txn_kertas_kerja", "field" => "alamat_properti"),
				"19" => array("table" => "txn_kertas_kerja", "field" => "nama_cabang"),
				"20" => array("table" => "txn_kertas_kerja", "field" => "nama_staff"),
				"21" => array("table" => "txn_kertas_kerja", "field" => "provinsi"),
				"22" => array("table" => "txn_kertas_kerja", "field" => "jabatan"),
				"23" => array("table" => "txn_kertas_kerja", "field" => "kotakab"),
				"24" => array("table" => "txn_kertas_kerja", "field" => "nomor_penugasan"),
				"25" => array("table" => "txn_kertas_kerja", "field" => "kecamatan"),
				"26" => array("table" => "txn_kertas_kerja", "field" => "tanggal_penugasan"),
				"27" => array("table" => "txn_kertas_kerja", "field" => "kelurahan"),
				"28" => array("table" => "txn_kertas_kerja", "field" => "tujuan_penilaian"),
				"133" => array("table" => "txn_tanah", "field" => "foto"),
				"105" => array("table" => "txn_tanah", "field" => "jenis_batas_1"),
				"106" => array("table" => "txn_tanah", "field" => "batas_properti_1"),
				"107" => array("table" => "txn_tanah", "field" => "jenis_batas_2"),
				"108" => array("table" => "txn_tanah", "field" => "batas_properti_2"),
				"109" => array("table" => "txn_tanah", "field" => "jenis_batas_3"),
				"110" => array("table" => "txn_tanah", "field" => "batas_properti_3"),
				"111" => array("table" => "txn_tanah", "field" => "jenis_batas_4"),
				"112" => array("table" => "txn_tanah", "field" => "batas_properti_4"),
				"113" => array("table" => "txn_tanah", "field" => "lokasi_tanah"),
				"114" => array("table" => "txn_tanah", "field" => "harga_tanah_obyek"),
				"115" => array("table" => "txn_tanah", "field" => "kepadatan_bangunan"),
				"116" => array("table" => "txn_tanah", "field" => "pertumbuhan_bangunan"),
				"117" => array("table" => "txn_tanah", "field" => "kemudahan_mencapai_lokasi"),
				"118" => array("table" => "txn_tanah", "field" => "kemudahan_belanja"),
				"119" => array("table" => "txn_tanah", "field" => "kemudahan_rekreasi"),
				"120" => array("table" => "txn_tanah", "field" => "kemudahan_angkutan_umum"),
				"121" => array("table" => "txn_tanah", "field" => "kemudahan_sarana_pendidikan"),
				"122" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kejahatan"),
				"123" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kebakaran"),
				"124" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_bencana"),
				"125" => array("table" => "txn_tanah", "field" => "permukiman"),
				"126" => array("table" => "txn_tanah", "field" => "industri"),
				"127" => array("table" => "txn_tanah", "field" => "pertokoan"),
				"128" => array("table" => "txn_tanah", "field" => "perkantoran"),
				"129" => array("table" => "txn_tanah", "field" => "taman"),
				"130" => array("table" => "txn_tanah", "field" => "tanah_kosong"),
				"131" => array("table" => "txn_tanah", "field" => "perubahan_lingkungan"),
				"132" => array("table" => "txn_tanah", "field" => "data_hunian"),
				"133" => array("table" => "txn_tanah", "field" => "foto"),
				"140" => array("table" => "txn_tanah", "field" => "lebar_jalan_depan"),
				"141" => array("table" => "txn_tanah", "field" => "lebar_jalan_sekitar"),
				"142" => array("table" => "txn_tanah", "field" => "jenis_jalan_depan"),
				"143" => array("table" => "txn_tanah", "field" => "drainase"),
				"144" => array("table" => "txn_tanah", "field" => "trotoar"),
				"145" => array("table" => "txn_tanah", "field" => "lampu_jalan"),
				"134" => array("table" => "txn_tanah", "field" => "jaringan_listrik"),
				"135" => array("table" => "txn_tanah", "field" => "jaringan_telepon"),
				"136" => array("table" => "txn_tanah", "field" => "jaringan_air_bersih"),
				"137" => array("table" => "txn_tanah", "field" => "jaringan_gas"),
				"138" => array("table" => "txn_tanah", "field" => "pemakaman_umum"),
				"139" => array("table" => "txn_tanah", "field" => "penampungan_sampah"),
				"146" => array("table" => "txn_tanah", "field" => "topografi"),
				"147" => array("table" => "txn_tanah", "field" => "jenis_tanah"),
				"148" => array("table" => "txn_tanah", "field" => "tata_lingkungan"),
				"149" => array("table" => "txn_tanah", "field" => "resiko_banjir"),
				"150" => array("table" => "txn_tanah", "field" => "posisi_tanah"),
				"151" => array("table" => "txn_tanah", "field" => "tinggi_tanah"),
				"152" => array("table" => "txn_tanah", "field" => "ruang_areal_sutet"),
				"153" => array("table" => "txn_tanah", "field" => "jarak_obyek_terhadap_sutet"),
				"154" => array("table" => "r_data_legalitas", "field" => "jenis_sertifikat"),
				"155" => array("table" => "r_data_legalitas", "field" => "nomor_sertifikat"),
				"156" => array("table" => "r_data_legalitas", "field" => "atas_nama"),
				"157" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_terbit"),
				"158" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_berakhir"),
				"159" => array("table" => "r_data_legalitas", "field" => "nomor"),
				"160" => array("table" => "r_data_legalitas", "field" => "tgl_bln_thn"),
				"161" => array("table" => "r_data_legalitas", "field" => "luas_tanah"),
				"162" => array("table" => "txn_tanah", "field" => "luas"),
				"241" => array("table" => "txn_tanah", "field" => "luas_tanah_terpotong"),
				"242" => array("table" => "txn_tanah", "field" => "tanggal_njop"),
				"243" => array("table" => "txn_tanah", "field" => "tanah_permeter"),
				"244" => array("table" => "txn_tanah", "field" => "ukuran_lebar"),
				"245" => array("table" => "txn_tanah", "field" => "ukuran_panjang"),
				"246" => array("table" => "txn_tanah", "field" => "catatan_penilai"),
				"247" => array("table" => "txn_data_banding", "field" => "foto_1"),
				"248" => array("table" => "txn_data_banding", "field" => "foto_2"),
				"249" => array("table" => "txn_data_banding", "field" => "sumber_data_nama"),
				"250" => array("table" => "txn_data_banding", "field" => "sumber_data_keterangan"),
				"251" => array("table" => "txn_data_banding", "field" => "sumber_data_telepon"),
				"252" => array("table" => "txn_data_banding", "field" => "jenis_properti"),
				"253" => array("table" => "txn_data_banding", "field" => "alamat"),
				"254" => array("table" => "txn_data_banding", "field" => "jarak_dengan_objek"),
				"255" => array("table" => "txn_data_banding", "field" => "harga_penawaran"),
				"256" => array("table" => "txn_data_banding", "field" => "perkiraan_diskon"),
				"257" => array("table" => "txn_data_banding", "field" => "indikasi_harga_transaksi"),
				"258" => array("table" => "txn_data_banding", "field" => "waktu_penawaran"),
				"259" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas"),
				"260" => array("table" => "txn_data_banding", "field" => "luas_tanah"),
				"261" => array("table" => "txn_data_banding", "field" => "luas_bangunan"),
				"262" => array("table" => "txn_data_banding", "field" => "jumlah_lantai"),
				"263" => array("table" => "txn_data_banding", "field" => "tahun_dibangun"),
				"264" => array("table" => "txn_data_banding", "field" => "lebar_jalan"),
				"265" => array("table" => "txn_data_banding", "field" => "kondisi_eksterior_interior"),
				"266" => array("table" => "txn_data_banding", "field" => "letak_posisi_tanah"),
				"267" => array("table" => "txn_data_banding", "field" => "peruntukan"),
				"268" => array("table" => "txn_data_banding", "field" => "luas_depan"),
				"269" => array("table" => "txn_data_banding", "field" => "panjang_bangunan"),
				"2079" => array("table" => "txn_data_banding", "field" => "tipe_bangunan"),
				"2080" => array("table" => "txn_data_banding", "field" => "brb_standar_mappi"),
				"2081" => array("table" => "txn_data_banding", "field" => "lokasi_op"),
				"2082" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas_op"),
				"2083" => array("table" => "txn_data_banding", "field" => "luas_tanah_op"),
				"2084" => array("table" => "txn_data_banding", "field" => "lebar_kondisi_jalan_op"),
				"2085" => array("table" => "txn_data_banding", "field" => "bentuk_tanah_op"),
				"2086" => array("table" => "txn_data_banding", "field" => "posisi_tanah_sudut_op"),
				"2087" => array("table" => "txn_data_banding", "field" => "posisi_tanah_tusuk_sate_op"),
				"2088" => array("table" => "txn_data_banding", "field" => "peruntukan_op"),
				"2089" => array("table" => "txn_data_banding", "field" => "topografi_op"),
				"2090" => array("table" => "txn_data_banding", "field" => "waktu_penawaran_op"),
				"2091" => array("table" => "txn_data_banding", "field" => "luas_bangunan_op"),
				"2092" => array("table" => "txn_data_banding", "field" => "lebar_depan_op"),
				"2093" => array("table" => "txn_data_banding", "field" => "panjang_bangunan_op"),
				"2094" => array("table" => "txn_data_banding", "field" => "kondisi_eksterior_interior_op"),
				"2095" => array("table" => "txn_data_banding", "field" => "fasilitas_lingkungan_op"),
				"2096" => array("table" => "txn_data_banding", "field" => "sarana_parkir_op"),
				"2097" => array("table" => "txn_data_banding", "field" => "sarana_parkir_op"),
				"270" => array("table" => "txn_data_banding", "field" => "brb_bangunan"),
				"271" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan"),
				"272" => array("table" => "txn_data_banding", "field" => "kondisi_fisik_bangunan"),
				"273" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan_permeter"),
				"274" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_tanah"),
				"276" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_bangunan_permeter"),
				"290" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_properti"),
				"291" => array("table" => "txn_data_banding", "field" => "bobot_rekonsiliasi"),
				"292" => array("table" => "txn_data_banding", "field" => "nilai_pasar_tanah"),
				"353" => array("table" => "txn_tanah", "field" => "perubahan_lingkungan_lainya"),
				"354" => array("table" => "txn_tanah", "field" => "data_hunian_lainya"),
				"635" => array("table" => "txn_bangunan", "field" => "tipe_bangunan"),
				"636" => array("table" => "txn_bangunan", "field" => "penggunaan_saat_ini"),
				"639" => array("table" => "txn_bangunan", "field" => "luas"),
				"640" => array("table" => "txn_bangunan", "field" => "nomor_imb"),
				"642" => array("table" => "txn_bangunan", "field" => "tanggal_imb"),
				"641" => array("table" => "txn_bangunan", "field" => "jumlah_lantai"),
				"643" => array("table" => "txn_bangunan", "field" => "luas_imb"),
				"644" => array("table" => "txn_bangunan", "field" => "perbedaan_luas_fisik_imb"),
				"645" => array("table" => "txn_bangunan", "field" => "peruntukan"),
				"646" => array("table" => "txn_bangunan", "field" => "ketinggian_bangunan"),
				"647" => array("table" => "txn_bangunan", "field" => "tipe_massa_bangunan"),
				"648" => array("table" => "txn_bangunan", "field" => "koefisien_dasar_bangunan"),
				"649" => array("table" => "txn_bangunan", "field" => "koefisien_dasar_lantai"),
				"650" => array("table" => "txn_bangunan", "field" => "melanggar_ketinggian_bangunan"),
				"651" => array("table" => "txn_bangunan", "field" => "pelebaran_jalan"),
				"652" => array("table" => "txn_bangunan", "field" => "gsb"),
				"653" => array("table" => "txn_bangunan", "field" => "gss"),
				"654" => array("table" => "txn_bangunan", "field" => "total_luas_terpotong"),
				"655" => array("table" => "txn_bangunan", "field" => "arsitektur_bangunan"),
				"656" => array("table" => "txn_bangunan", "field" => "tahun_dibangun"),
				"657" => array("table" => "txn_bangunan", "field" => "tahun_direnovasi"),
				"658" => array("table" => "txn_bangunan", "field" => "lantai_bangunan_utama"),
				"659" => array("table" => "txn_bangunan", "field" => "jalan_depan_properti"),
				"660" => array("table" => "txn_bangunan", "field" => "pondasi"),
				"661" => array("table" => "txn_bangunan", "field" => "struktur"),
				"662" => array("table" => "txn_bangunan", "field" => "rangka_atap"),
				"663" => array("table" => "txn_bangunan", "field" => "penutup_atap"),
				"664" => array("table" => "txn_bangunan", "field" => "plafond"),
				"665" => array("table" => "txn_bangunan", "field" => "dinding"),
				"666" => array("table" => "txn_bangunan", "field" => "partisi_ruangan"),
				"667" => array("table" => "txn_bangunan", "field" => "kusen"),
				"668" => array("table" => "txn_bangunan", "field" => "pintu_jendela"),
				"669" => array("table" => "txn_bangunan", "field" => "lantai"),
				"670" => array("table" => "txn_bangunan", "field" => "tangga"),
				"671" => array("table" => "txn_bangunan", "field" => "pagar_halaman"),
				"672" => array("table" => "txn_bangunan", "field" => "saluran_listrik_pln"),
				"673" => array("table" => "txn_bangunan", "field" => "sambungan_telepon"),
				"674" => array("table" => "txn_bangunan", "field" => "jaringan_air_bersih"),
				"675" => array("table" => "txn_bangunan", "field" => "pendingin_ruangan"),
				"676" => array("table" => "txn_bangunan", "field" => "tipe_pendingin_ruangan"),
				"677" => array("table" => "txn_bangunan", "field" => "pemanas_air"),
				"678" => array("table" => "txn_bangunan", "field" => "tipe_pemanas_air"),
				"679" => array("table" => "txn_bangunan", "field" => "penangkal_petir"),
				"680" => array("table" => "txn_bangunan", "field" => "tipe_penangkal_petir"),
				"681" => array("table" => "txn_bangunan", "field" => "area_parkir"),
				"682" => array("table" => "txn_bangunan", "field" => "tipe_kolam_renang"),
				"683" => array("table" => "txn_bangunan", "field" => "security_parking"),
				"684" => array("table" => "txn_bangunan", "field" => "tipe_area_parkir"),
				"685" => array("table" => "txn_bangunan", "field" => "pemagaran_halaman"),
				"686" => array("table" => "txn_bangunan", "field" => "keadaan_halaman"),
				"687" => array("table" => "txn_bangunan", "field" => "tanggal_njop"),
				"688" => array("table" => "txn_bangunan", "field" => "harga_per_meter"),
				"689" => array("table" => "txn_bangunan", "field" => "nilai_pasar"),
				"690" => array("table" => "txn_bangunan", "field" => "indikasi_nilai_likuidasi_fisik"),
				"691" => array("table" => "txn_bangunan", "field" => "nilai_pasar_peraturan"),
				"692" => array("table" => "txn_bangunan", "field" => "indikasi_nilai_likuidasi_peraturan"),
				"693" => array("table" => "txn_bangunan", "field" => "catatan_penilai"),
				"749" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_ukuran"),
				"750" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_biaya"),
				"751" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_brb"),
				"752" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_dep"),
				"753" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_nilai_pasar"),
				"754" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_ukuran"),
				"756" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_biaya"),
				"757" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_brb"),
				"758" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_dep"),
				"759" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_nilai_pasar"),
				"760" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_keterangan"),
				"761" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_ukuran"),
				"762" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_biaya"),
				"763" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_brb"),
				"764" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_dep"),
				"765" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_nilai_pasar"),
				"766" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_ukuran"),
				"767" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_biaya"),
				"768" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_brb"),
				"769" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_dep"),
				"770" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_nilai_pasar"),
				"771" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_ukuran"),
				"772" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_biaya"),
				"773" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_brb"),
				"774" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_dep"),
				"775" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_nilai_pasar"),
				"776" => array("table" => "txn_sarana_pelengkap", "field" => "ac_keterangan"),
				"777" => array("table" => "txn_sarana_pelengkap", "field" => "ac_ukuran"),
				"778" => array("table" => "txn_sarana_pelengkap", "field" => "ac_biaya"),
				"779" => array("table" => "txn_sarana_pelengkap", "field" => "ac_brb"),
				"780" => array("table" => "txn_sarana_pelengkap", "field" => "ac_dep"),
				"781" => array("table" => "txn_sarana_pelengkap", "field" => "ac_nilai_pasar"),
				"782" => array("table" => "txn_sarana_pelengkap", "field" => "carport_keterangan"),
				"783" => array("table" => "txn_sarana_pelengkap", "field" => "carport_ukuran"),
				"784" => array("table" => "txn_sarana_pelengkap", "field" => "carport_biaya"),
				"785" => array("table" => "txn_sarana_pelengkap", "field" => "carport_brb"),
				"786" => array("table" => "txn_sarana_pelengkap", "field" => "carport_dep"),
				"787" => array("table" => "txn_sarana_pelengkap", "field" => "carport_nilai_pasar"),
				"788" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_keterangan"),
				"789" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_ukuran"),
				"790" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_biaya"),
				"791" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_brb"),
				"792" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_dep"),
				"793" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_nilai_pasar"),
				"794" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_keterangan"),
				"795" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_ukuran"),
				"796" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_biaya"),
				"797" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_brb"),
				"798" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_dep"),
				"799" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_nilai_pasar"),
				"800" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_keterangan"),
				"801" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_ukuran"),
				"802" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_biaya"),
				"803" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_brb"),
				"804" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_dep"),
				"805" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_nilai_pasar"),
				"806" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_keterangan"),
				"807" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_ukuran"),
				"808" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_biaya"),
				"809" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_brb"),
				"810" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_dep"),
				"811" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_nilai_pasar"),
				"812" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_keterangan"),
				"813" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_ukuran"),
				"814" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_biaya"),
				"815" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_brb"),
				"816" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_dep"),
				"817" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_nilai_pasar"),
				"818" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_keterangan"),
				"819" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_ukuran"),
				"820" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_biaya"),
				"821" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_brb"),
				"822" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_dep"),
				"823" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_nilai_pasar"),
				"824" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_keterangan"),
				"825" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_ukuran"),
				"826" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_biaya"),
				"827" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_brb"),
				"828" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_dep"),
				"829" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_nilai_pasar"),
				"830" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_keterangan"),
				"831" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_ukuran"),
				"832" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_biaya"),
				"833" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_brb"),
				"834" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_dep"),
				"835" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_nilai_pasar"),
				"837" => array("table" => "txn_sarana_pelengkap", "field" => "nilai_pasar"),
				"838" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_keterangan"),
				"839" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_ukuran"),
				"840" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_biaya"),
				"841" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_brb"),
				"842" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_dep"),
				"843" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_nilai_pasar"),
				"844" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_keterangan"),
				"845" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_ukuran"),
				"846" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_biaya"),
				"847" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_brb"),
				"848" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_dep"),
				"849" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_nilai_pasar"),
				"850" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_keterangan"),
				"851" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_ukuran"),
				"852" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_biaya"),
				"853" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_brb"),
				"854" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_dep"),
				"855" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_nilai_pasar"),
				"856" => array("table" => "txn_sarana_pelengkap", "field" => "taman_keterangan"),
				"857" => array("table" => "txn_sarana_pelengkap", "field" => "taman_ukuran"),
				"858" => array("table" => "txn_sarana_pelengkap", "field" => "taman_biaya"),
				"859" => array("table" => "txn_sarana_pelengkap", "field" => "taman_brb"),
				"860" => array("table" => "txn_sarana_pelengkap", "field" => "taman_dep"),
				"861" => array("table" => "txn_sarana_pelengkap", "field" => "taman_nilai_pasar"),
				"862" => array("table" => "txn_sarana_pelengkap", "field" => "catatan_penilai"),
				"891" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"892" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"893" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"895" => array("table" => "txn_tanah", "field" => "sumber_nomor_sertifikat"),
				"897" => array("table" => "txn_kertas_kerja", "field" => "dh_provinsi"),
				"898" => array("table" => "txn_kertas_kerja", "field" => "dh_kotakab"),
				"899" => array("table" => "txn_kertas_kerja", "field" => "dh_kecamatan"),
				"900" => array("table" => "txn_kertas_kerja", "field" => "dh_kelurahan"),
				"901" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_nama"),
				"902" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_keterangan"),
				"903" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_ukuran"),
				"904" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_biaya"),
				"905" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_brb"),
				"906" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_dep"),
				"907" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_nilai_pasar"),
				"910" => array("table" => "txn_bangunan", "field" => "lebar_bangunan_depan"),
				"911" => array("table" => "txn_bangunan", "field" => "panjang"),
				"912" => array("table" => "txn_bangunan_btb", "field" => "tipe_bangunan"),
				"913" => array("table" => "txn_bangunan_btb", "field" => "jumlah_lantai"),
				"914" => array("table" => "txn_bangunan_btb", "field" => "tahun_penilaian"),
				"915" => array("table" => "txn_bangunan_btb", "field" => "tahun_bangun"),
				"916" => array("table" => "txn_bangunan_btb", "field" => "jenis_renovasi"),
				"917" => array("table" => "txn_bangunan_btb", "field" => "tahun_renovasi"),
				"918" => array("table" => "txn_bangunan_btb", "field" => "klasifikasi_bangunan"),
				"919" => array("table" => "txn_bangunan_btb", "field" => "kelas_bangunan"),
				"920" => array("table" => "txn_bangunan_btb", "field" => "umur_ekonomis"),
				"921" => array("table" => "txn_bangunan_btb", "field" => "umur_efektif"),
				"957" => array("table" => "txn_tanah", "field" => "fasilitas_parkir"),
				"958" => array("table" => "txn_tanah", "field" => "fasum_lain"),
				"959" => array("table" => "txn_tanah", "field" => "lokasi_bidang_tanah"),
				"960" => array("table" => "txn_tanah", "field" => "peruntukan_kawasan"),
				"961" => array("table" => "txn_tanah", "field" => "menghadap_ke"),
				"968" => array("table" => "txn_data_banding", "field" => "nilai_pasar_bangunan_kios"),
				"969" => array("table" => "txn_data_banding", "field" => "depresiasi"),
				"970" => array("table" => "txn_data_banding", "field" => "nilai_likuidasi"),
				"971" => array("table" => "txn_bangunan", "field" => "nilai_likuidasi"),
				"981" => array("table" => "txn_tanah", "field" => "bangunan_permeter"),
				"1117" => array("table" => "txn_data_banding", "field" => "depresiasi"),
				"2074" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penandatangan_laporan"),
				"2075" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penilai"),
				"2076" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_surveyor"),
				"9900" => array("table" => "txn_data_banding", "field" => "latitude"),
				"9901" => array("table" => "txn_data_banding", "field" => "longitude"),
			);
		}
		elseif ($lokasi->id_jenis_objek == 6)
		{
			$mapping_id_field  = array(
				"1" => array("table" => "txn_kertas_kerja", "field" => "penandatangan_laporan"),
				"2" => array("table" => "txn_kertas_kerja", "field" => "obyek_penilaian"),
				"3" => array("table" => "txn_kertas_kerja", "field" => "nama_penilai"),
				"4" => array("table" => "txn_kertas_kerja", "field" => "kegunaan"),
				"5" => array("table" => "txn_kertas_kerja", "field" => "nama_surveyor"),
				"6" => array("table" => "txn_kertas_kerja", "field" => "jenis_klien"),
				"7" => array("table" => "txn_kertas_kerja", "field" => "klien"),
				"8" => array("table" => "txn_kertas_kerja", "field" => "telepon_klien"),
				"9" => array("table" => "txn_kertas_kerja", "field" => "tanggal_inspeksi_penilaian"),
				"10" => array("table" => "txn_kertas_kerja", "field" => "status_objek"),
				"11" => array("table" => "txn_kertas_kerja", "field" => "yang_dijumpai"),
				"12" => array("table" => "txn_kertas_kerja", "field" => "tanggal_laporan"),
				"13" => array("table" => "txn_kertas_kerja", "field" => "selaku"),
				"14" => array("table" => "txn_kertas_kerja", "field" => "obyek_ditempati_oleh"),
				"15" => array("table" => "txn_kertas_kerja", "field" => "nomor_laporan"),
				"16" => array("table" => "txn_kertas_kerja", "field" => "penggunaan_obyek"),
				"17" => array("table" => "txn_kertas_kerja", "field" => "debitur"),
				"18" => array("table" => "txn_kertas_kerja", "field" => "alamat_properti"),
				"19" => array("table" => "txn_kertas_kerja", "field" => "nama_cabang"),
				"20" => array("table" => "txn_kertas_kerja", "field" => "nama_staff"),
				"21" => array("table" => "txn_kertas_kerja", "field" => "provinsi"),
				"22" => array("table" => "txn_kertas_kerja", "field" => "jabatan"),
				"23" => array("table" => "txn_kertas_kerja", "field" => "kotakab"),
				"24" => array("table" => "txn_kertas_kerja", "field" => "nomor_penugasan"),
				"25" => array("table" => "txn_kertas_kerja", "field" => "kecamatan"),
				"26" => array("table" => "txn_kertas_kerja", "field" => "tanggal_penugasan"),
				"27" => array("table" => "txn_kertas_kerja", "field" => "kelurahan"),
				"28" => array("table" => "txn_kertas_kerja", "field" => "tujuan_penilaian"),
				"102" => array("table" => "txn_data_banding", "field" => "lantai_ruang_apartment"),
				"105" => array("table" => "txn_tanah", "field" => "jenis_batas_1"),
				"106" => array("table" => "txn_tanah", "field" => "batas_properti_1"),
				"107" => array("table" => "txn_tanah", "field" => "jenis_batas_2"),
				"108" => array("table" => "txn_tanah", "field" => "batas_properti_2"),
				"109" => array("table" => "txn_tanah", "field" => "jenis_batas_3"),
				"110" => array("table" => "txn_tanah", "field" => "batas_properti_3"),
				"111" => array("table" => "txn_tanah", "field" => "jenis_batas_4"),
				"112" => array("table" => "txn_tanah", "field" => "batas_properti_4"),
				"113" => array("table" => "txn_tanah", "field" => "lokasi_apartment"),
				"114" => array("table" => "txn_tanah", "field" => "harga_apartment"),
				"115" => array("table" => "txn_tanah", "field" => "kepadatan_hunian"),
				"116" => array("table" => "txn_tanah", "field" => "pertumbuhan_hunian"),
				"117" => array("table" => "txn_tanah", "field" => "kemudahan_mencapai_lokasi"),
				"118" => array("table" => "txn_tanah", "field" => "kemudahan_belanja"),
				"119" => array("table" => "txn_tanah", "field" => "kemudahan_rekreasi"),
				"120" => array("table" => "txn_tanah", "field" => "kemudahan_angkutan_umum"),
				"121" => array("table" => "txn_tanah", "field" => "kemudahan_sarana_pendidikan"),
				"122" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kejahatan"),
				"123" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kebakaran"),
				"124" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_bencana"),
				"125" => array("table" => "txn_tanah", "field" => "permukiman"),
				"126" => array("table" => "txn_tanah", "field" => "industri"),
				"127" => array("table" => "txn_tanah", "field" => "pertokoan"),
				"128" => array("table" => "txn_tanah", "field" => "perkantoran"),
				"129" => array("table" => "txn_tanah", "field" => "taman"),
				"130" => array("table" => "txn_tanah", "field" => "tanah_kosong"),
				"131" => array("table" => "txn_tanah", "field" => "perubahan_lingkungan"),
				"132" => array("table" => "txn_tanah", "field" => "data_hunian"),
				"133" => array("table" => "txn_tanah", "field" => "foto"),
				"140" => array("table" => "txn_tanah", "field" => "lebar_jalan_depan"),
				"141" => array("table" => "txn_tanah", "field" => "lebar_jalan_sekitar"),
				"142" => array("table" => "txn_tanah", "field" => "jenis_jalan_depan"),
				"143" => array("table" => "txn_tanah", "field" => "drainase"),
				"144" => array("table" => "txn_tanah", "field" => "trotoar"),
				"145" => array("table" => "txn_tanah", "field" => "lampu_jalan"),
				"134" => array("table" => "txn_tanah", "field" => "jaringan_listrik"),
				"135" => array("table" => "txn_tanah", "field" => "jaringan_telepon"),
				"136" => array("table" => "txn_tanah", "field" => "jaringan_air_bersih"),
				"137" => array("table" => "txn_tanah", "field" => "jaringan_gas"),
				"138" => array("table" => "txn_tanah", "field" => "pemakaman_umum"),
				"139" => array("table" => "txn_tanah", "field" => "penampungan_sampah"),
				"146" => array("table" => "txn_tanah", "field" => "topografi"),
				"147" => array("table" => "txn_tanah", "field" => "jenis_tanah"),
				"148" => array("table" => "txn_tanah", "field" => "tata_lingkungan"),
				"149" => array("table" => "txn_tanah", "field" => "resiko_banjir"),
				"150" => array("table" => "txn_tanah", "field" => "posisi_tanah"),
				"151" => array("table" => "txn_tanah", "field" => "nomor_imb"),
				"152" => array("table" => "txn_tanah", "field" => "luas_imb"),
				"153" => array("table" => "txn_tanah", "field" => "tanggal_dikeluarkan_imb"),
				"154" => array("table" => "r_data_legalitas", "field" => "jenis_sertifikat"),
				"155" => array("table" => "r_data_legalitas", "field" => "nomor_sertifikat"),
				"156" => array("table" => "r_data_legalitas", "field" => "atas_nama"),
				"157" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_terbit"),
				"158" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_berakhir"),
				"159" => array("table" => "r_data_legalitas", "field" => "nomor"),
				"160" => array("table" => "r_data_legalitas", "field" => "tgl_bln_thn"),
				"161" => array("table" => "r_data_legalitas", "field" => "luas_tanah"),
				"162" => array("table" => "txn_tanah", "field" => "luas"),
				"170" => array("table" => "txn_tanah", "field" => "perusahaan_pengembang"),
				"171" => array("table" => "txn_tanah", "field" => "tahun_dibangun"),
				"172" => array("table" => "txn_tanah", "field" => "keadaan_lingkungan"),
				"173" => array("table" => "txn_tanah", "field" => "penghijauan"),
				"174" => array("table" => "txn_tanah", "field" => "pemeliharaan_bangunan"),
				"241" => array("table" => "txn_tanah", "field" => "luas_tanah_terpotong"),
				"242" => array("table" => "txn_tanah", "field" => "tanggal_njop"),
				"243" => array("table" => "txn_tanah", "field" => "luas_tanah"),
				"244" => array("table" => "txn_tanah", "field" => "nilai_pasar"),
				"245" => array("table" => "txn_tanah", "field" => "nilai_likuidasi"),
				"246" => array("table" => "txn_tanah", "field" => "catatan_penilai"),
				"247" => array("table" => "txn_data_banding", "field" => "foto_1"),
				"248" => array("table" => "txn_data_banding", "field" => "foto_2"),
				"249" => array("table" => "txn_data_banding", "field" => "sumber_data_nama"),
				"250" => array("table" => "txn_data_banding", "field" => "sumber_data_keterangan"),
				"251" => array("table" => "txn_data_banding", "field" => "sumber_data_telepon"),
				"252" => array("table" => "txn_data_banding", "field" => "jenis_properti"),
				"253" => array("table" => "txn_data_banding", "field" => "alamat"),
				"254" => array("table" => "txn_data_banding", "field" => "jarak_dengan_objek"),
				"255" => array("table" => "txn_data_banding", "field" => "harga_penawaran"),
				"256" => array("table" => "txn_data_banding", "field" => "perkiraan_diskon"),
				"257" => array("table" => "txn_data_banding", "field" => "indikasi_harga_transaksi"),
				"258" => array("table" => "txn_data_banding", "field" => "waktu_penawaran"),
				"259" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas"),
				"260" => array("table" => "txn_data_banding", "field" => "luas_ruangan_apartment"),
				"261" => array("table" => "txn_data_banding", "field" => "luas_bangunan"),
				"2066" => array("table" => "txn_data_banding", "field" => "jumlah_kamar_tidur"),
				"262" => array("table" => "txn_data_banding", "field" => "jumlah_lantai"),
				"263" => array("table" => "txn_data_banding", "field" => "tahun_dibangun"),
				"264" => array("table" => "txn_data_banding", "field" => "lebar_jalan"),
				"265" => array("table" => "txn_data_banding", "field" => "bentuk_tanah"),
				"266" => array("table" => "txn_data_banding", "field" => "letak_posisi_tanah"),
				"267" => array("table" => "txn_data_banding", "field" => "peruntukan"),
				"268" => array("table" => "txn_data_banding", "field" => "kondisi_existing_tanah"),
				"269" => array("table" => "txn_data_banding", "field" => "topografi"),
				"2079" => array("table" => "txn_data_banding", "field" => "tipe_bangunan"),
				"2080" => array("table" => "txn_data_banding", "field" => "brb_standar_mappi"),
				"2081" => array("table" => "txn_data_banding", "field" => "lokasi_op"),
				"2082" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas_op"),
				"2083" => array("table" => "txn_data_banding", "field" => "lantai_ruang_apartment_op"),
				"2084" => array("table" => "txn_data_banding", "field" => "luas_ruangan_apartment_op"),
				"2085" => array("table" => "txn_data_banding", "field" => "view_menghadap_ke_op"),
				"2086" => array("table" => "txn_data_banding", "field" => "posisi_ruang_apartment_op"),
				"2087" => array("table" => "txn_data_banding", "field" => "furnished_op"),
				"2088" => array("table" => "txn_data_banding", "field" => "jumlah_kamar_tidur_op"),
				"2089" => array("table" => "txn_data_banding", "field" => "topografi_op"),
				"2090" => array("table" => "txn_data_banding", "field" => "waktu_penawaran_op"),
				"270" => array("table" => "txn_data_banding", "field" => "brb_bangunan"),
				"271" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan"),
				"272" => array("table" => "txn_data_banding", "field" => "kondisi_fisik_bangunan"),
				"273" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan_permeter"),
				"274" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_tanah"),
				"276" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_tanah_permeter"),
				"290" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_tanah"),
				"291" => array("table" => "txn_data_banding", "field" => "bobot_rekonsiliasi"),
				"292" => array("table" => "txn_data_banding", "field" => "nilai_pasar_tanah"),
				"635" => array("table" => "txn_bangunan", "field" => "tipe_bangunan"),
				"636" => array("table" => "txn_bangunan", "field" => "penggunaan_saat_ini"),
				"640" => array("table" => "txn_bangunan", "field" => "luas"),
				"642" => array("table" => "txn_bangunan", "field" => "tanggal_imb"),
				"641" => array("table" => "txn_bangunan", "field" => "jumlah_lantai"),
				"643" => array("table" => "txn_bangunan", "field" => "luas_imb"),
				"644" => array("table" => "txn_bangunan", "field" => "perbedaan_luas_fisik_imb"),
				"645" => array("table" => "txn_bangunan", "field" => "peruntukan"),
				"646" => array("table" => "txn_bangunan", "field" => "ketinggian_bangunan"),
				"647" => array("table" => "txn_bangunan", "field" => "tipe_massa_bangunan"),
				"648" => array("table" => "txn_bangunan", "field" => "koefisien_dasar_bangunan"),
				"649" => array("table" => "txn_bangunan", "field" => "koefisien_dasar_lantai"),
				"650" => array("table" => "txn_bangunan", "field" => "melanggar_ketinggian_bangunan"),
				"651" => array("table" => "txn_bangunan", "field" => "pelebaran_jalan"),
				"652" => array("table" => "txn_bangunan", "field" => "gsb"),
				"653" => array("table" => "txn_bangunan", "field" => "gss"),
				"654" => array("table" => "txn_bangunan", "field" => "total_luas_terpotong"),
				"655" => array("table" => "txn_bangunan", "field" => "arsitektur_bangunan"),
				"656" => array("table" => "txn_bangunan", "field" => "tahun_dibangun"),
				"657" => array("table" => "txn_bangunan", "field" => "tahun_direnovasi"),
				"658" => array("table" => "txn_bangunan", "field" => "lantai_bangunan_utama"),
				"659" => array("table" => "txn_bangunan", "field" => "jalan_depan_properti"),
				"660" => array("table" => "txn_bangunan", "field" => "pondasi"),
				"661" => array("table" => "txn_bangunan", "field" => "struktur"),
				"662" => array("table" => "txn_bangunan", "field" => "rangka_atap"),
				"663" => array("table" => "txn_bangunan", "field" => "penutup_atap"),
				"664" => array("table" => "txn_bangunan", "field" => "plafond"),
				"665" => array("table" => "txn_bangunan", "field" => "dinding"),
				"666" => array("table" => "txn_bangunan", "field" => "partisi_ruangan"),
				"667" => array("table" => "txn_bangunan", "field" => "kusen"),
				"668" => array("table" => "txn_bangunan", "field" => "pintu_jendela"),
				"669" => array("table" => "txn_bangunan", "field" => "lantai"),
				"670" => array("table" => "txn_bangunan", "field" => "tangga"),
				"671" => array("table" => "txn_bangunan", "field" => "pagar_halaman"),
				"672" => array("table" => "txn_bangunan", "field" => "saluran_listrik_pln"),
				"673" => array("table" => "txn_bangunan", "field" => "sambungan_telepon"),
				"674" => array("table" => "txn_bangunan", "field" => "jaringan_air_bersih"),
				"675" => array("table" => "txn_bangunan", "field" => "pendingin_ruangan"),
				"676" => array("table" => "txn_bangunan", "field" => "tipe_pendingin_ruangan"),
				"677" => array("table" => "txn_bangunan", "field" => "pemanas_air"),
				"678" => array("table" => "txn_bangunan", "field" => "tipe_pemanas_air"),
				"679" => array("table" => "txn_bangunan", "field" => "penangkal_petir"),
				"680" => array("table" => "txn_bangunan", "field" => "tipe_penangkal_petir"),
				"681" => array("table" => "txn_bangunan", "field" => "kolam_renang"),
				"682" => array("table" => "txn_bangunan", "field" => "tipe_kolam_renang"),
				"683" => array("table" => "txn_bangunan", "field" => "area_parkir"),
				"684" => array("table" => "txn_bangunan", "field" => "tipe_area_parkir"),
				"685" => array("table" => "txn_bangunan", "field" => "pemagaran_halaman"),
				"686" => array("table" => "txn_bangunan", "field" => "keadaan_halaman"),
				"687" => array("table" => "txn_bangunan", "field" => "tanggal_njop"),
				"688" => array("table" => "txn_bangunan", "field" => "harga_per_meter"),
				"689" => array("table" => "txn_bangunan", "field" => "nilai_pasar_fisik"),
				"690" => array("table" => "txn_bangunan", "field" => "indikasi_nilai_likuidasi_fisik"),
				"691" => array("table" => "txn_bangunan", "field" => "nilai_pasar_peraturan"),
				"692" => array("table" => "txn_bangunan", "field" => "indikasi_nilai_likuidasi_peraturan"),
				"693" => array("table" => "txn_bangunan", "field" => "catatan_penilai"),
				"749" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_ukuran"),
				"750" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_biaya"),
				"751" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_brb"),
				"752" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_dep"),
				"753" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_nilai_pasar"),
				"754" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_ukuran"),
				"756" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_biaya"),
				"757" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_brb"),
				"758" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_dep"),
				"759" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_nilai_pasar"),
				"760" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_keterangan"),
				"761" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_ukuran"),
				"762" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_biaya"),
				"763" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_brb"),
				"764" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_dep"),
				"765" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_nilai_pasar"),
				"766" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_ukuran"),
				"767" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_biaya"),
				"768" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_brb"),
				"769" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_dep"),
				"770" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_nilai_pasar"),
				"771" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_ukuran"),
				"772" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_biaya"),
				"773" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_brb"),
				"774" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_dep"),
				"775" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_nilai_pasar"),
				"776" => array("table" => "txn_sarana_pelengkap", "field" => "ac_keterangan"),
				"777" => array("table" => "txn_sarana_pelengkap", "field" => "ac_ukuran"),
				"778" => array("table" => "txn_sarana_pelengkap", "field" => "ac_biaya"),
				"779" => array("table" => "txn_sarana_pelengkap", "field" => "ac_brb"),
				"780" => array("table" => "txn_sarana_pelengkap", "field" => "ac_dep"),
				"781" => array("table" => "txn_sarana_pelengkap", "field" => "ac_nilai_pasar"),
				"782" => array("table" => "txn_sarana_pelengkap", "field" => "carport_keterangan"),
				"783" => array("table" => "txn_sarana_pelengkap", "field" => "carport_ukuran"),
				"784" => array("table" => "txn_sarana_pelengkap", "field" => "carport_biaya"),
				"785" => array("table" => "txn_sarana_pelengkap", "field" => "carport_brb"),
				"786" => array("table" => "txn_sarana_pelengkap", "field" => "carport_dep"),
				"787" => array("table" => "txn_sarana_pelengkap", "field" => "carport_nilai_pasar"),
				"788" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_keterangan"),
				"789" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_ukuran"),
				"790" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_biaya"),
				"791" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_brb"),
				"792" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_dep"),
				"793" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_nilai_pasar"),
				"794" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_keterangan"),
				"795" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_ukuran"),
				"796" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_biaya"),
				"797" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_brb"),
				"798" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_dep"),
				"799" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_nilai_pasar"),
				"800" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_keterangan"),
				"801" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_ukuran"),
				"802" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_biaya"),
				"803" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_brb"),
				"804" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_dep"),
				"805" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_nilai_pasar"),
				"806" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_keterangan"),
				"807" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_ukuran"),
				"808" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_biaya"),
				"809" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_brb"),
				"810" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_dep"),
				"811" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_nilai_pasar"),
				"812" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_keterangan"),
				"813" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_ukuran"),
				"814" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_biaya"),
				"815" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_brb"),
				"816" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_dep"),
				"817" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_nilai_pasar"),
				"818" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_keterangan"),
				"819" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_ukuran"),
				"820" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_biaya"),
				"821" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_brb"),
				"822" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_dep"),
				"823" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_nilai_pasar"),
				"824" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_keterangan"),
				"825" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_ukuran"),
				"826" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_biaya"),
				"827" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_brb"),
				"828" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_dep"),
				"829" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_nilai_pasar"),
				"830" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_keterangan"),
				"831" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_ukuran"),
				"832" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_biaya"),
				"833" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_brb"),
				"834" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_dep"),
				"835" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_nilai_pasar"),
				"838" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_keterangan"),
				"839" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_ukuran"),
				"840" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_biaya"),
				"841" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_brb"),
				"842" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_dep"),
				"843" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_nilai_pasar"),
				"844" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_keterangan"),
				"845" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_ukuran"),
				"846" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_biaya"),
				"847" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_brb"),
				"848" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_dep"),
				"849" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_nilai_pasar"),
				"850" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_keterangan"),
				"851" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_ukuran"),
				"852" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_biaya"),
				"853" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_brb"),
				"854" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_dep"),
				"855" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_nilai_pasar"),
				"856" => array("table" => "txn_sarana_pelengkap", "field" => "taman_keterangan"),
				"857" => array("table" => "txn_sarana_pelengkap", "field" => "taman_ukuran"),
				"858" => array("table" => "txn_sarana_pelengkap", "field" => "taman_biaya"),
				"859" => array("table" => "txn_sarana_pelengkap", "field" => "taman_brb"),
				"860" => array("table" => "txn_sarana_pelengkap", "field" => "taman_dep"),
				"861" => array("table" => "txn_sarana_pelengkap", "field" => "taman_nilai_pasar"),
				"891" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"892" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"893" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"895" => array("table" => "txn_tanah", "field" => "sumber_nomor_sertifikat"),
				"897" => array("table" => "txn_kertas_kerja", "field" => "dh_provinsi"),
				"898" => array("table" => "txn_kertas_kerja", "field" => "dh_kotakab"),
				"899" => array("table" => "txn_kertas_kerja", "field" => "dh_kecamatan"),
				"900" => array("table" => "txn_kertas_kerja", "field" => "dh_kelurahan"),
				"901" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_nama"),
				"902" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_keterangan"),
				"903" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_ukuran"),
				"904" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_biaya"),
				"905" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_brb"),
				"906" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_dep"),
				"907" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_nilai_pasar"),
				"910" => array("table" => "txn_bangunan_btb", "field" => "lebar_bangunan_depan"),
				"911" => array("table" => "txn_bangunan_btb", "field" => "panjang"),
				"912" => array("table" => "txn_bangunan_btb", "field" => "tipe_bangunan"),
				"913" => array("table" => "txn_bangunan_btb", "field" => "jumlah_lantai"),
				"914" => array("table" => "txn_bangunan_btb", "field" => "tahun_penilaian"),
				"915" => array("table" => "txn_bangunan_btb", "field" => "tahun_bangun"),
				"916" => array("table" => "txn_bangunan_btb", "field" => "jenis_renovasi"),
				"917" => array("table" => "txn_bangunan_btb", "field" => "tahun_renovasi"),
				"918" => array("table" => "txn_bangunan_btb", "field" => "klasifikasi_bangunan"),
				"919" => array("table" => "txn_bangunan_btb", "field" => "kelas_bangunan"),
				"920" => array("table" => "txn_bangunan_btb", "field" => "umur_ekonomis"),
				"921" => array("table" => "txn_bangunan_btb", "field" => "umur_efektif"),
				"969" => array("table" => "txn_data_banding", "field" => "nama_apartment"),
				"979" => array("table" => "txn_data_banding", "field" => "nama_tower"),
				"1117" => array("table" => "txn_data_banding", "field" => "depresiasi"),
				"2000" => array("table" => "txn_bangunan", "field" => "nama_tower"),
				"2001" => array("table" => "txn_bangunan", "field" => "letak_lantai_objek"),
				"2002" => array("table" => "txn_bangunan", "field" => "posisi_ruang_apartment"),
				"2003" => array("table" => "txn_bangunan", "field" => "view_menghadap_ke"),
				"2004" => array("table" => "txn_bangunan", "field" => "jumlah_kamar_tidur"),
				"2005" => array("table" => "txn_bangunan", "field" => "jumlah_kamar_mandi"),
				"2006" => array("table" => "txn_bangunan", "field" => "furnished"),
				"2007" => array("table" => "txn_bangunan", "field" => "dinding_ruangan"),
				"2008" => array("table" => "txn_bangunan", "field" => "dapur_bersih"),
				"2009" => array("table" => "txn_bangunan", "field" => "laundry_room"),
				"2010" => array("table" => "txn_bangunan", "field" => "kamar_pembantu"),
				"2011" => array("table" => "txn_bangunan", "field" => "teras_balkon"),
				"2012" => array("table" => "txn_bangunan", "field" => "saluran_listrik"),
				"2013" => array("table" => "txn_bangunan", "field" => "ac"),
				"2014" => array("table" => "txn_bangunan", "field" => "sambungan_telepon"),
				"2015" => array("table" => "txn_bangunan", "field" => "air_bersih"),
				"2016" => array("table" => "txn_bangunan", "field" => "pemanas_air"),
				"2017" => array("table" => "txn_bangunan", "field" => "jenis_kamar_mandi"),
				"2018" => array("table" => "txn_bangunan", "field" => "sanitair"),
				"2019" => array("table" => "txn_bangunan", "field" => "pembuangan_sampah"),
				"2020" => array("table" => "txn_bangunan", "field" => "informasi_njop_properti"),
				"2021" => array("table" => "txn_bangunan", "field" => "bumi_bersama"),
				"2022" => array("table" => "txn_bangunan", "field" => "bangunan_bersama"),
				"2023" => array("table" => "txn_bangunan", "field" => "nilai_pasar"),
				"2024" => array("table" => "txn_bangunan", "field" => "nilai_likuidasi"),
				"2025" => array("table" => "txn_tanah", "field" => "perusahaan_pengembang"),
				"2026" => array("table" => "txn_tanah", "field" => "tahun_dibangun"),
				"2027" => array("table" => "txn_tanah", "field" => "keadaan_lingkungan"),
				"2028" => array("table" => "txn_tanah", "field" => "penghijauan"),
				"2029" => array("table" => "txn_tanah", "field" => "pemeliharaan_bangunan"),
				"2030" => array("table" => "txn_tanah", "field" => "status_objek"),
				"2031" => array("table" => "txn_tanah", "field" => "kepemilkan"),
				"2032" => array("table" => "txn_tanah", "field" => "penyewaan"),
				"2033" => array("table" => "txn_tanah", "field" => "instansi"),
				"2034" => array("table" => "txn_tanah", "field" => "kosong"),
				"2035" => array("table" => "txn_tanah", "field" => "jaringan_listrik"),
				"2036" => array("table" => "txn_tanah", "field" => "lobby_utama"),
				"2037" => array("table" => "txn_tanah", "field" => "mini_market"),
				"2038" => array("table" => "txn_tanah", "field" => "lift_penumpang"),
				"2039" => array("table" => "txn_tanah", "field" => "genset"),
				"2040" => array("table" => "txn_tanah", "field" => "swimming_pool"),
				"2041" => array("table" => "txn_tanah", "field" => "restaurant"),
				"2042" => array("table" => "txn_tanah", "field" => "lift_barang"),
				"2043" => array("table" => "txn_tanah", "field" => "jaringan_air_bersih"),
				"2044" => array("table" => "txn_tanah", "field" => "jogging_track"),
				"2045" => array("table" => "txn_tanah", "field" => "music_lounge"),
				"2046" => array("table" => "txn_tanah", "field" => "tangga_darurat"),
				"2047" => array("table" => "txn_tanah", "field" => "jaringan_telepon"),
				"2048" => array("table" => "txn_tanah", "field" => "fitness_center"),
				"2049" => array("table" => "txn_tanah", "field" => "atm_banking"),
				"2050" => array("table" => "txn_tanah", "field" => "hydrant"),
				"2051" => array("table" => "txn_tanah", "field" => "jaringan_gas"),
				"2052" => array("table" => "txn_tanah", "field" => "sport_center"),
				"2053" => array("table" => "txn_tanah", "field" => "shoping_center"),
				"2054" => array("table" => "txn_tanah", "field" => "alarm_system"),
				"2055" => array("table" => "txn_tanah", "field" => "jaringan_wifi"),
				"2056" => array("table" => "txn_tanah", "field" => "play_ground"),
				"2057" => array("table" => "txn_tanah", "field" => "bookstore"),
				"2058" => array("table" => "txn_tanah", "field" => "cctv"),
				"2059" => array("table" => "txn_tanah", "field" => "taman"),
				"2060" => array("table" => "txn_tanah", "field" => "medical_center"),
				"2061" => array("table" => "txn_tanah", "field" => "laundry_room"),
				"2062" => array("table" => "txn_tanah", "field" => "secure_parking"),
				"2063" => array("table" => "txn_data_banding", "field" => "view_menghadap_ke"),
				"2064" => array("table" => "txn_data_banding", "field" => "posisi_ruang_apartment"),
				"2065" => array("table" => "txn_data_banding", "field" => "furnished"),
				"2072" => array("table" => "txn_tanah", "field" => "nilai_pasar"),
				"2073" => array("table" => "txn_tanah", "field" => "nilai_likuidasi"),
				"2074" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penandatangan_laporan"),
				"2075" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penilai"),
				"2076" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_surveyor"),
				"9100" => array("table" => "txn_kertas_kerja", "field" => "nama_apartment"),
				"9101" => array("table" => "txn_kertas_kerja", "field" => "nama_tower"),
				"9102" => array("table" => "txn_kertas_kerja", "field" => "letak_lantai_objek"),
				"9103" => array("table" => "txn_kertas_kerja", "field" => "nomor_ruang"),
				"9900" => array("table" => "txn_data_banding", "field" => "latitude"),
				"9901" => array("table" => "txn_data_banding", "field" => "longitude"),
			);
		}
		elseif ($lokasi->id_jenis_objek == 7)
		{
			$mapping_id_field  = array(
				"1" => array("table" => "txn_kertas_kerja", "field" => "penandatangan_laporan"),
				"2" => array("table" => "txn_kertas_kerja", "field" => "obyek_penilaian"),
				"3" => array("table" => "txn_kertas_kerja", "field" => "nama_penilai"),
				"4" => array("table" => "txn_kertas_kerja", "field" => "kegunaan"),
				"5" => array("table" => "txn_kertas_kerja", "field" => "nama_surveyor"),
				"6" => array("table" => "txn_kertas_kerja", "field" => "jenis_klien"),
				"7" => array("table" => "txn_kertas_kerja", "field" => "klien"),
				"8" => array("table" => "txn_kertas_kerja", "field" => "telepon_klien"),
				"9" => array("table" => "txn_kertas_kerja", "field" => "tanggal_inspeksi_penilaian"),
				"10" => array("table" => "txn_kertas_kerja", "field" => "status_objek"),
				"11" => array("table" => "txn_kertas_kerja", "field" => "yang_dijumpai"),
				"12" => array("table" => "txn_kertas_kerja", "field" => "tanggal_laporan"),
				"13" => array("table" => "txn_kertas_kerja", "field" => "selaku"),
				"14" => array("table" => "txn_kertas_kerja", "field" => "obyek_ditempati_oleh"),
				"15" => array("table" => "txn_kertas_kerja", "field" => "nomor_laporan"),
				"16" => array("table" => "txn_kertas_kerja", "field" => "penggunaan_obyek"),
				"17" => array("table" => "txn_kertas_kerja", "field" => "debitur"),
				"18" => array("table" => "txn_kertas_kerja", "field" => "alamat_properti"),
				"19" => array("table" => "txn_kertas_kerja", "field" => "nama_cabang"),
				"20" => array("table" => "txn_kertas_kerja", "field" => "nama_staff"),
				"21" => array("table" => "txn_kertas_kerja", "field" => "provinsi"),
				"22" => array("table" => "txn_kertas_kerja", "field" => "jabatan"),
				"23" => array("table" => "txn_kertas_kerja", "field" => "kotakab"),
				"24" => array("table" => "txn_kertas_kerja", "field" => "nomor_penugasan"),
				"25" => array("table" => "txn_kertas_kerja", "field" => "kecamatan"),
				"26" => array("table" => "txn_kertas_kerja", "field" => "tanggal_penugasan"),
				"27" => array("table" => "txn_kertas_kerja", "field" => "kelurahan"),
				"28" => array("table" => "txn_kertas_kerja", "field" => "tujuan_penilaian"),
				"133" => array("table" => "txn_tanah", "field" => "foto"),
				"105" => array("table" => "txn_tanah", "field" => "jenis_batas_1"),
				"106" => array("table" => "txn_tanah", "field" => "batas_properti_1"),
				"107" => array("table" => "txn_tanah", "field" => "jenis_batas_2"),
				"108" => array("table" => "txn_tanah", "field" => "batas_properti_2"),
				"109" => array("table" => "txn_tanah", "field" => "jenis_batas_3"),
				"110" => array("table" => "txn_tanah", "field" => "batas_properti_3"),
				"111" => array("table" => "txn_tanah", "field" => "jenis_batas_4"),
				"112" => array("table" => "txn_tanah", "field" => "batas_properti_4"),
				"113" => array("table" => "txn_tanah", "field" => "lokasi_perkantoran"),
				"114" => array("table" => "txn_tanah", "field" => "harga_unit_ruang_kantor"),
				"115" => array("table" => "txn_tanah", "field" => "kepadatan_hunian"),
				"116" => array("table" => "txn_tanah", "field" => "pertumbuhan_hunian"),
				"117" => array("table" => "txn_tanah", "field" => "kemudahan_mencapai_lokasi"),
				"118" => array("table" => "txn_tanah", "field" => "kemudahan_belanja"),
				"119" => array("table" => "txn_tanah", "field" => "kemudahan_rekreasi"),
				"120" => array("table" => "txn_tanah", "field" => "kemudahan_angkutan_umum"),
				"121" => array("table" => "txn_tanah", "field" => "kemudahan_sarana_pendidikan"),
				"122" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kejahatan"),
				"123" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_kebakaran"),
				"124" => array("table" => "txn_tanah", "field" => "keamanan_terhadap_bencana"),
				"125" => array("table" => "txn_tanah", "field" => "permukiman"),
				"126" => array("table" => "txn_tanah", "field" => "industri"),
				"127" => array("table" => "txn_tanah", "field" => "pertokoan"),
				"128" => array("table" => "txn_tanah", "field" => "perkantoran"),
				"129" => array("table" => "txn_tanah", "field" => "taman"),
				"130" => array("table" => "txn_tanah", "field" => "tanah_kosong"),
				"131" => array("table" => "txn_tanah", "field" => "perubahan_lingkungan"),
				"132" => array("table" => "txn_tanah", "field" => "data_hunian"),
				"133" => array("table" => "txn_tanah", "field" => "foto"),
				"140" => array("table" => "txn_tanah", "field" => "lebar_jalan_depan"),
				"141" => array("table" => "txn_tanah", "field" => "lebar_jalan_sekitar"),
				"142" => array("table" => "txn_tanah", "field" => "jenis_jalan_depan"),
				"143" => array("table" => "txn_tanah", "field" => "drainase"),
				"144" => array("table" => "txn_tanah", "field" => "trotoar"),
				"145" => array("table" => "txn_tanah", "field" => "lampu_jalan"),
				"134" => array("table" => "txn_tanah", "field" => "jaringan_listrik"),
				"135" => array("table" => "txn_tanah", "field" => "jaringan_telepon"),
				"136" => array("table" => "txn_tanah", "field" => "jaringan_air_bersih"),
				"137" => array("table" => "txn_tanah", "field" => "jaringan_gas"),
				"138" => array("table" => "txn_tanah", "field" => "pemakaman_umum"),
				"139" => array("table" => "txn_tanah", "field" => "penampungan_sampah"),
				"146" => array("table" => "txn_tanah", "field" => "topografi"),
				"147" => array("table" => "txn_tanah", "field" => "jenis_tanah"),
				"148" => array("table" => "txn_tanah", "field" => "tata_lingkungan"),
				"149" => array("table" => "txn_tanah", "field" => "resiko_banjir"),
				"150" => array("table" => "txn_tanah", "field" => "posisi_tanah"),
				"151" => array("table" => "txn_tanah", "field" => "nomor_imb"),
				"152" => array("table" => "txn_tanah", "field" => "tanggal_dikeluarkan_imb"),
				"153" => array("table" => "txn_tanah", "field" => "luas_imb"),
				"154" => array("table" => "r_data_legalitas", "field" => "jenis_sertifikat"),
				"155" => array("table" => "r_data_legalitas", "field" => "nomor_sertifikat"),
				"156" => array("table" => "r_data_legalitas", "field" => "atas_nama"),
				"157" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_terbit"),
				"158" => array("table" => "r_data_legalitas", "field" => "tanggal_sertifikat_berakhir"),
				"159" => array("table" => "r_data_legalitas", "field" => "nomor"),
				"160" => array("table" => "r_data_legalitas", "field" => "tgl_bln_thn"),
				"161" => array("table" => "r_data_legalitas", "field" => "luas_tanah"),
				"162" => array("table" => "txn_tanah", "field" => "luas"),
				"170" => array("table" => "txn_tanah", "field" => "perusahaan_pengembang"),
				"171" => array("table" => "txn_tanah", "field" => "tahun_dibangun"),
				"172" => array("table" => "txn_tanah", "field" => "keadaan_lingkungan"),
				"173" => array("table" => "txn_tanah", "field" => "penghijauan"),
				"174" => array("table" => "txn_tanah", "field" => "pemeliharaan_bangunan"),
				"241" => array("table" => "txn_tanah", "field" => "luas_tanah_terpotong"),
				"242" => array("table" => "txn_tanah", "field" => "tanggal_njop"),
				"243" => array("table" => "txn_tanah", "field" => "luas_tanah"),
				"244" => array("table" => "txn_tanah", "field" => "nilai_pasar"),
				"245" => array("table" => "txn_tanah", "field" => "nilai_likuidasi"),
				"246" => array("table" => "txn_tanah", "field" => "catatan_penilai"),
				"247" => array("table" => "txn_data_banding", "field" => "foto_1"),
				"248" => array("table" => "txn_data_banding", "field" => "foto_2"),
				"249" => array("table" => "txn_data_banding", "field" => "sumber_data_nama"),
				"250" => array("table" => "txn_data_banding", "field" => "sumber_data_keterangan"),
				"251" => array("table" => "txn_data_banding", "field" => "sumber_data_telepon"),
				"252" => array("table" => "txn_data_banding", "field" => "jenis_properti"),
				"253" => array("table" => "txn_data_banding", "field" => "alamat"),
				"254" => array("table" => "txn_data_banding", "field" => "jarak_dengan_objek"),
				"255" => array("table" => "txn_data_banding", "field" => "harga_penawaran"),
				"256" => array("table" => "txn_data_banding", "field" => "perkiraan_diskon"),
				"257" => array("table" => "txn_data_banding", "field" => "indikasi_harga_transaksi"),
				"258" => array("table" => "txn_data_banding", "field" => "waktu_penawaran"),
				"259" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas"),
				"260" => array("table" => "txn_data_banding", "field" => "luas_ruangan_apartment"),
				"261" => array("table" => "txn_data_banding", "field" => "luas_bangunan"),
				"262" => array("table" => "txn_data_banding", "field" => "jumlah_lantai"),
				"263" => array("table" => "txn_data_banding", "field" => "tahun_dibangun"),
				"264" => array("table" => "txn_data_banding", "field" => "lebar_jalan"),
				"265" => array("table" => "txn_data_banding", "field" => "bentuk_tanah"),
				"266" => array("table" => "txn_data_banding", "field" => "letak_posisi_tanah"),
				"267" => array("table" => "txn_data_banding", "field" => "peruntukan"),
				"268" => array("table" => "txn_data_banding", "field" => "kondisi_existing_tanah"),
				"269" => array("table" => "txn_data_banding", "field" => "topografi"),
				"2079" => array("table" => "txn_data_banding", "field" => "tipe_bangunan"),
				"2080" => array("table" => "txn_data_banding", "field" => "brb_standar_mappi"),
				"2081" => array("table" => "txn_data_banding", "field" => "lokasi_op"),
				"2082" => array("table" => "txn_data_banding", "field" => "dokumen_legalitas_op"),
				"2083" => array("table" => "txn_data_banding", "field" => "lantai_ruang_apartment_op"),
				"2084" => array("table" => "txn_data_banding", "field" => "luas_ruangan_apartment_op"),
				"2085" => array("table" => "txn_data_banding", "field" => "view_menghadap_ke_op"),
				"2086" => array("table" => "txn_data_banding", "field" => "posisi_ruang_apartment_op"),
				"2087" => array("table" => "txn_data_banding", "field" => "furnished_op"),
				"2088" => array("table" => "txn_data_banding", "field" => "jumlah_kamar_tidur_op"),
				"2089" => array("table" => "txn_data_banding", "field" => "topografi_op"),
				"2090" => array("table" => "txn_data_banding", "field" => "waktu_penawaran_op"),
				"2091" => array("table" => "txn_data_banding", "field" => "fasilitas_ruang_apartment_op"),
				"270" => array("table" => "txn_data_banding", "field" => "brb_bangunan"),
				"271" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan"),
				"272" => array("table" => "txn_data_banding", "field" => "kondisi_fisik_bangunan"),
				"273" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_bangunan_permeter"),
				"274" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_pasar_tanah"),
				"276" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_tanah_permeter"),
				"290" => array("table" => "txn_data_banding", "field" => "indikasi_nilai_tanah"),
				"291" => array("table" => "txn_data_banding", "field" => "bobot_rekonsiliasi"),
				"292" => array("table" => "txn_data_banding", "field" => "nilai_pasar_tanah"),
				"635" => array("table" => "txn_bangunan", "field" => "tipe_bangunan"),
				"636" => array("table" => "txn_bangunan", "field" => "penggunaan_saat_ini"),
				"639" => array("table" => "txn_bangunan", "field" => "luas"),
				"640" => array("table" => "txn_bangunan", "field" => "nomor_imb"),
				"642" => array("table" => "txn_bangunan", "field" => "tanggal_imb"),
				"641" => array("table" => "txn_bangunan", "field" => "jumlah_lantai"),
				"643" => array("table" => "txn_bangunan", "field" => "luas_imb"),
				"644" => array("table" => "txn_bangunan", "field" => "perbedaan_luas_fisik_imb"),
				"645" => array("table" => "txn_bangunan", "field" => "peruntukan"),
				"646" => array("table" => "txn_bangunan", "field" => "ketinggian_bangunan"),
				"647" => array("table" => "txn_bangunan", "field" => "tipe_massa_bangunan"),
				"648" => array("table" => "txn_bangunan", "field" => "koefisien_dasar_bangunan"),
				"649" => array("table" => "txn_bangunan", "field" => "koefisien_dasar_lantai"),
				"650" => array("table" => "txn_bangunan", "field" => "melanggar_ketinggian_bangunan"),
				"651" => array("table" => "txn_bangunan", "field" => "pelebaran_jalan"),
				"652" => array("table" => "txn_bangunan", "field" => "gsb"),
				"653" => array("table" => "txn_bangunan", "field" => "gss"),
				"654" => array("table" => "txn_bangunan", "field" => "total_luas_terpotong"),
				"655" => array("table" => "txn_bangunan", "field" => "arsitektur_bangunan"),
				"656" => array("table" => "txn_bangunan", "field" => "tahun_dibangun"),
				"657" => array("table" => "txn_bangunan", "field" => "tahun_direnovasi"),
				"658" => array("table" => "txn_bangunan", "field" => "lantai_bangunan_utama"),
				"659" => array("table" => "txn_bangunan", "field" => "jalan_depan_properti"),
				"660" => array("table" => "txn_bangunan", "field" => "pondasi"),
				"661" => array("table" => "txn_bangunan", "field" => "struktur"),
				"662" => array("table" => "txn_bangunan", "field" => "rangka_atap"),
				"663" => array("table" => "txn_bangunan", "field" => "penutup_atap"),
				"664" => array("table" => "txn_bangunan", "field" => "plafond"),
				"665" => array("table" => "txn_bangunan", "field" => "dinding"),
				"666" => array("table" => "txn_bangunan", "field" => "partisi_ruangan"),
				"667" => array("table" => "txn_bangunan", "field" => "kusen"),
				"668" => array("table" => "txn_bangunan", "field" => "pintu_jendela"),
				"669" => array("table" => "txn_bangunan", "field" => "lantai"),
				"670" => array("table" => "txn_bangunan", "field" => "tangga"),
				"671" => array("table" => "txn_bangunan", "field" => "pagar_halaman"),
				"672" => array("table" => "txn_bangunan", "field" => "saluran_listrik_pln"),
				"673" => array("table" => "txn_bangunan", "field" => "sambungan_telepon"),
				"674" => array("table" => "txn_bangunan", "field" => "jaringan_air_bersih"),
				"675" => array("table" => "txn_bangunan", "field" => "pendingin_ruangan"),
				"676" => array("table" => "txn_bangunan", "field" => "tipe_pendingin_ruangan"),
				"677" => array("table" => "txn_bangunan", "field" => "pemanas_air"),
				"678" => array("table" => "txn_bangunan", "field" => "tipe_pemanas_air"),
				"679" => array("table" => "txn_bangunan", "field" => "penangkal_petir"),
				"680" => array("table" => "txn_bangunan", "field" => "tipe_penangkal_petir"),
				"681" => array("table" => "txn_bangunan", "field" => "kolam_renang"),
				"682" => array("table" => "txn_bangunan", "field" => "tipe_kolam_renang"),
				"683" => array("table" => "txn_bangunan", "field" => "area_parkir"),
				"684" => array("table" => "txn_bangunan", "field" => "tipe_area_parkir"),
				"685" => array("table" => "txn_bangunan", "field" => "pemagaran_halaman"),
				"686" => array("table" => "txn_bangunan", "field" => "keadaan_halaman"),
				"687" => array("table" => "txn_bangunan", "field" => "tanggal_njop"),
				"688" => array("table" => "txn_bangunan", "field" => "harga_per_meter"),
				"689" => array("table" => "txn_bangunan", "field" => "nilai_pasar"),
				"690" => array("table" => "txn_bangunan", "field" => "nilai_likuidasi"),
				"691" => array("table" => "txn_bangunan", "field" => "nilai_pasar_peraturan"),
				"692" => array("table" => "txn_bangunan", "field" => "indikasi_nilai_likuidasi_peraturan"),
				"693" => array("table" => "txn_bangunan", "field" => "catatan_penilai"),
				"749" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_ukuran"),
				"750" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_biaya"),
				"751" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_brb"),
				"752" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_dep"),
				"753" => array("table" => "txn_sarana_pelengkap", "field" => "daya_listrik_nilai_pasar"),
				"754" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_ukuran"),
				"756" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_biaya"),
				"757" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_brb"),
				"758" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_dep"),
				"759" => array("table" => "txn_sarana_pelengkap", "field" => "telkom_nilai_pasar"),
				"760" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_keterangan"),
				"761" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_ukuran"),
				"762" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_biaya"),
				"763" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_brb"),
				"764" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_dep"),
				"765" => array("table" => "txn_sarana_pelengkap", "field" => "pdam_nilai_pasar"),
				"766" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_ukuran"),
				"767" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_biaya"),
				"768" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_brb"),
				"769" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_dep"),
				"770" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_bor_nilai_pasar"),
				"771" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_ukuran"),
				"772" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_biaya"),
				"773" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_brb"),
				"774" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_dep"),
				"775" => array("table" => "txn_sarana_pelengkap", "field" => "sumur_dalam_nilai_pasar"),
				"776" => array("table" => "txn_sarana_pelengkap", "field" => "ac_keterangan"),
				"777" => array("table" => "txn_sarana_pelengkap", "field" => "ac_ukuran"),
				"778" => array("table" => "txn_sarana_pelengkap", "field" => "ac_biaya"),
				"779" => array("table" => "txn_sarana_pelengkap", "field" => "ac_brb"),
				"780" => array("table" => "txn_sarana_pelengkap", "field" => "ac_dep"),
				"781" => array("table" => "txn_sarana_pelengkap", "field" => "ac_nilai_pasar"),
				"782" => array("table" => "txn_sarana_pelengkap", "field" => "carport_keterangan"),
				"783" => array("table" => "txn_sarana_pelengkap", "field" => "carport_ukuran"),
				"784" => array("table" => "txn_sarana_pelengkap", "field" => "carport_biaya"),
				"785" => array("table" => "txn_sarana_pelengkap", "field" => "carport_brb"),
				"786" => array("table" => "txn_sarana_pelengkap", "field" => "carport_dep"),
				"787" => array("table" => "txn_sarana_pelengkap", "field" => "carport_nilai_pasar"),
				"788" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_keterangan"),
				"789" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_ukuran"),
				"790" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_biaya"),
				"791" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_brb"),
				"792" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_dep"),
				"793" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan_nilai_pasar"),
				"794" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_keterangan"),
				"795" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_ukuran"),
				"796" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_biaya"),
				"797" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_brb"),
				"798" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_dep"),
				"799" => array("table" => "txn_sarana_pelengkap", "field" => "pintu_pagar_nilai_pasar"),
				"800" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_keterangan"),
				"801" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_ukuran"),
				"802" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_biaya"),
				"803" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_brb"),
				"804" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_dep"),
				"805" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman_nilai_pasar"),
				"806" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_keterangan"),
				"807" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_ukuran"),
				"808" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_biaya"),
				"809" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_brb"),
				"810" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_dep"),
				"811" => array("table" => "txn_sarana_pelengkap", "field" => "pemanas_air_nilai_pasar"),
				"812" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_keterangan"),
				"813" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_ukuran"),
				"814" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_biaya"),
				"815" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_brb"),
				"816" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_dep"),
				"817" => array("table" => "txn_sarana_pelengkap", "field" => "penangkal_petir_nilai_pasar"),
				"818" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_keterangan"),
				"819" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_ukuran"),
				"820" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_biaya"),
				"821" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_brb"),
				"822" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_dep"),
				"823" => array("table" => "txn_sarana_pelengkap", "field" => "gapura_nilai_pasar"),
				"824" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_keterangan"),
				"825" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_ukuran"),
				"826" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_biaya"),
				"827" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_brb"),
				"828" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_dep"),
				"829" => array("table" => "txn_sarana_pelengkap", "field" => "water_toren_nilai_pasar"),
				"830" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_keterangan"),
				"831" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_ukuran"),
				"832" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_biaya"),
				"833" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_brb"),
				"834" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_dep"),
				"835" => array("table" => "txn_sarana_pelengkap", "field" => "kolam_renang_nilai_pasar"),
				"838" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_keterangan"),
				"839" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_ukuran"),
				"840" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_biaya"),
				"841" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_brb"),
				"842" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_dep"),
				"843" => array("table" => "txn_sarana_pelengkap", "field" => "carport2_terpotong_nilai_pasar"),
				"844" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_keterangan"),
				"845" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_ukuran"),
				"846" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_biaya"),
				"847" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_brb"),
				"848" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_dep"),
				"849" => array("table" => "txn_sarana_pelengkap", "field" => "perkerasan2_nilai_pasar"),
				"850" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_keterangan"),
				"851" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_ukuran"),
				"852" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_biaya"),
				"853" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_brb"),
				"854" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_dep"),
				"855" => array("table" => "txn_sarana_pelengkap", "field" => "pagar_halaman2_nilai_pasar"),
				"856" => array("table" => "txn_sarana_pelengkap", "field" => "taman_keterangan"),
				"857" => array("table" => "txn_sarana_pelengkap", "field" => "taman_ukuran"),
				"858" => array("table" => "txn_sarana_pelengkap", "field" => "taman_biaya"),
				"859" => array("table" => "txn_sarana_pelengkap", "field" => "taman_brb"),
				"860" => array("table" => "txn_sarana_pelengkap", "field" => "taman_dep"),
				"861" => array("table" => "txn_sarana_pelengkap", "field" => "taman_nilai_pasar"),
				"891" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"892" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"893" => array("table" => "txn_lampiran", "field" => "lampiran"),
				"895" => array("table" => "txn_tanah", "field" => "sumber_nomor_sertifikat"),
				"897" => array("table" => "txn_kertas_kerja", "field" => "dh_provinsi"),
				"898" => array("table" => "txn_kertas_kerja", "field" => "dh_kotakab"),
				"899" => array("table" => "txn_kertas_kerja", "field" => "dh_kecamatan"),
				"900" => array("table" => "txn_kertas_kerja", "field" => "dh_kelurahan"),
				"901" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_nama"),
				"902" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_keterangan"),
				"903" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_ukuran"),
				"904" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_biaya"),
				"905" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_brb"),
				"906" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_dep"),
				"907" => array("table" => "txn_sarana_pelengkap", "field" => "tambahan_nilai_pasar"),
				"912" => array("table" => "txn_bangunan_btb", "field" => "tipe_bangunan"),
				"913" => array("table" => "txn_bangunan_btb", "field" => "jumlah_lantai"),
				"914" => array("table" => "txn_bangunan_btb", "field" => "tahun_penilaian"),
				"915" => array("table" => "txn_bangunan_btb", "field" => "tahun_bangun"),
				"916" => array("table" => "txn_bangunan_btb", "field" => "jenis_renovasi"),
				"917" => array("table" => "txn_bangunan_btb", "field" => "tahun_renovasi"),
				"918" => array("table" => "txn_bangunan_btb", "field" => "klasifikasi_bangunan"),
				"919" => array("table" => "txn_bangunan_btb", "field" => "kelas_bangunan"),
				"920" => array("table" => "txn_bangunan_btb", "field" => "umur_ekonomis"),
				"921" => array("table" => "txn_bangunan_btb", "field" => "umur_efektif"),
				"981" => array("table" => "txn_tanah", "field" => "lift_barang"),
				"1117" => array("table" => "txn_data_banding", "field" => "depresiasi"),
				"2001" => array("table" => "txn_bangunan", "field" => "letak_lantai_objek"),
				"2002" => array("table" => "txn_bangunan", "field" => "posisi_ruang_apartment"),
				"2003" => array("table" => "txn_bangunan", "field" => "view_menghadap_ke"),
				"2004" => array("table" => "txn_bangunan", "field" => "jumlah_kamar_tidur"),
				"2005" => array("table" => "txn_bangunan", "field" => "jumlah_kamar_mandi"),
				"2006" => array("table" => "txn_bangunan", "field" => "furnished"),
				"2010" => array("table" => "txn_bangunan", "field" => "pantry"),
				"2011" => array("table" => "txn_bangunan", "field" => "teras_balkon"),
				"2012" => array("table" => "txn_bangunan", "field" => "saluran_listrik"),
				"2013" => array("table" => "txn_bangunan", "field" => "ac"),
				"2014" => array("table" => "txn_bangunan", "field" => "sambungan_telepon"),
				"2015" => array("table" => "txn_bangunan", "field" => "air_bersih"),
				"2016" => array("table" => "txn_bangunan", "field" => "ac"),
				"2017" => array("table" => "txn_bangunan", "field" => "jenis_kamar_mandi"),
				"2018" => array("table" => "txn_bangunan", "field" => "sanitair"),
				"2019" => array("table" => "txn_bangunan", "field" => "pembuangan_sampah"),
				"2020" => array("table" => "txn_bangunan", "field" => "informasi_njop_properti"),
				"2021" => array("table" => "txn_bangunan", "field" => "bumi_bersama"),
				"2022" => array("table" => "txn_bangunan", "field" => "bangunan_bersama"),
				"2023" => array("table" => "txn_bangunan", "field" => "nilai_pasar"),
				"2024" => array("table" => "txn_bangunan", "field" => "nilai_likuidasi"),
				"2025" => array("table" => "txn_tanah", "field" => "perusahaan_pengembang"),
				"2026" => array("table" => "txn_tanah", "field" => "tahun_dibangun"),
				"2027" => array("table" => "txn_tanah", "field" => "keadaan_lingkungan"),
				"2028" => array("table" => "txn_tanah", "field" => "penghijauan"),
				"2029" => array("table" => "txn_tanah", "field" => "pemeliharaan_bangunan"),
				"2031" => array("table" => "txn_tanah", "field" => "kepemilkan"),
				"2032" => array("table" => "txn_tanah", "field" => "penyewaan"),
				"2033" => array("table" => "txn_tanah", "field" => "instansi"),
				"2034" => array("table" => "txn_tanah", "field" => "kosong"),
				"2035" => array("table" => "txn_tanah", "field" => "jaringan_listrik"),
				"2036" => array("table" => "txn_tanah", "field" => "lobby_utama"),
				"2037" => array("table" => "txn_tanah", "field" => "mini_market"),
				"2038" => array("table" => "txn_tanah", "field" => "lift_penumpang"),
				"2039" => array("table" => "txn_tanah", "field" => "genset"),
				"2040" => array("table" => "txn_tanah", "field" => "swimming_pool"),
				"2041" => array("table" => "txn_tanah", "field" => "restaurant"),
				"2042" => array("table" => "txn_tanah", "field" => "lift_barang"),
				"2043" => array("table" => "txn_tanah", "field" => "jaringan_air_bersih"),
				"2044" => array("table" => "txn_tanah", "field" => "jogging_track"),
				"2045" => array("table" => "txn_tanah", "field" => "music_lounge"),
				"2046" => array("table" => "txn_tanah", "field" => "tangga_darurat"),
				"2047" => array("table" => "txn_tanah", "field" => "jaringan_telepon"),
				"2048" => array("table" => "txn_tanah", "field" => "fitness_center"),
				"2049" => array("table" => "txn_tanah", "field" => "atm_banking"),
				"2050" => array("table" => "txn_tanah", "field" => "hydrant"),
				"2051" => array("table" => "txn_tanah", "field" => "jaringan_gas"),
				"2052" => array("table" => "txn_tanah", "field" => "sport_center"),
				"2053" => array("table" => "txn_tanah", "field" => "shoping_center"),
				"2054" => array("table" => "txn_tanah", "field" => "alarm_system"),
				"2055" => array("table" => "txn_tanah", "field" => "jaringan_wifi"),
				"2056" => array("table" => "txn_tanah", "field" => "play_ground"),
				"2057" => array("table" => "txn_tanah", "field" => "bookstore"),
				"2058" => array("table" => "txn_tanah", "field" => "cctv"),
				"2059" => array("table" => "txn_tanah", "field" => "taman"),
				"2060" => array("table" => "txn_tanah", "field" => "medical_center"),
				"2061" => array("table" => "txn_tanah", "field" => "laundry_room"),
				"2062" => array("table" => "txn_tanah", "field" => "secure_parking"),
				"2063" => array("table" => "txn_data_banding", "field" => "view_menghadap_ke"),
				"2064" => array("table" => "txn_data_banding", "field" => "posisi_ruang_apartment"),
				"2065" => array("table" => "txn_data_banding", "field" => "furnished"),
				"2072" => array("table" => "txn_tanah", "field" => "nilai_pasar"),
				"2073" => array("table" => "txn_tanah", "field" => "nilai_likuidasi"),
				"2074" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penandatangan_laporan"),
				"2075" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_penilai"),
				"2076" => array("table" => "txn_kertas_kerja", "field" => "no_mappi_surveyor"),
				"9900" => array("table" => "txn_data_banding", "field" => "latitude"),
				"9901" => array("table" => "txn_data_banding", "field" => "longitude"),
			);
		}

		$data_txn_kertas_kerja = array(
			"id_lokasi" => $id_lokasi
		);

		$table = false;
		$field = false;

		if (isset($mapping_id_field[$id_field]))
		{
			$field = $mapping_id_field[$id_field]["field"];
			$table = $mapping_id_field[$id_field]["table"];
		}
		else
		{
			// pastiError();
		}

		if (((int)$id_field >= 277  && (int)$id_field <= 289) || ((int)$id_field >= 975 && (int)$id_field <= 976) || ((int)$id_field >= 1103  && (int)$id_field <= 1111) || (int)$id_field === 292)
		{
			$table = 'txn_data_banding';

			if ($lokasi->id_jenis_objek == 1)
			{
				$databanding_map = array(
					"277" => array(
						"0" => "lokasi_0",
						"2" => "lokasi_1",
						"3" => "lokasi_2",
					),
					"278" => array(
						"0" => "dokumen_legalitas_0",
						"2" => "dokumen_legalitas_1",
						"3" => "dokumen_legalitas_2",
					),
					"279" => array(
						"0" => "luas_tanah_0",
						"2" => "luas_tanah_1",
						"3" => "luas_tanah_2",
					),
					"280" => array(
						"0" => "lebar_kondisi_jalan_0",
						"2" => "lebar_kondisi_jalan_1",
						"3" => "lebar_kondisi_jalan_2",
					),
					"281" => array(
						"0" => "bentuk_tanah_0",
						"2" => "bentuk_tanah_1",
						"3" => "bentuk_tanah_2",
					),
					"283" => array(
						"0" => "posisi_tanah_sudut_0",
						"1" => "posisi_tanah_sudut_1",
						"2" => "posisi_tanah_sudut_2",
					),
					"284" => array(
						"0" => "posisi_tanah_tusuk_sate_0",
						"1" => "posisi_tanah_tusuk_sate_1",
						"2" => "posisi_tanah_tusuk_sate_2",
					),
					"285" => array(
						"0" => "peruntukan_0",
						"2" => "peruntukan_1",
						"3" => "peruntukan_2",
					),
					"286" => array(
						"0" => "topografi_0",
						"2" => "topografi_1",
						"3" => "topografi_2",
					),
					"287" => array(
						"0" => "waktu_penawaran_0",
						"2" => "waktu_penawaran_1",
						"3" => "waktu_penawaran_2",
					),
					"288" => array(
						"0" => "lain_lain_0",
						"1" => "lain_lain_1",
						"2" => "lain_lain_2",
					),
					"289" => array(
						"0" => "total_0",
						"1" => "total_1",
						"2" => "total_2",
					),
					"292" => array(
						"0" => "indikasi_nilai_pasar_tanah_permeter",
						"1" => "indikasi_nilai_pasar_tanah_permeter",
						"2" => "indikasi_nilai_pasar_tanah_permeter",
					),
				);

			}
			elseif ($lokasi->id_jenis_objek == 2)
			{
				$databanding_map = array(
					"277" => array(
						"0" => "lokasi_0",
						"2" => "lokasi_1",
						"3" => "lokasi_2",
					),
					"278" => array(
						"0" => "dokumen_legalitas_0",
						"2" => "dokumen_legalitas_1",
						"3" => "dokumen_legalitas_2",
					),
					"279" => array(
						"0" => "luas_tanah_0",
						"2" => "luas_tanah_1",
						"3" => "luas_tanah_2",
					),
					"280" => array(
						"0" => "lebar_kondisi_jalan_0",
						"2" => "lebar_kondisi_jalan_1",
						"3" => "lebar_kondisi_jalan_2",
					),
					"281" => array(
						"0" => "bentuk_tanah_0",
						"2" => "bentuk_tanah_1",
						"3" => "bentuk_tanah_2",
					),
					"283" => array(
						"0" => "posisi_tanah_sudut_0",
						"1" => "posisi_tanah_sudut_1",
						"2" => "posisi_tanah_sudut_2",
					),
					"284" => array(
						"0" => "posisi_tanah_tusuk_sate_0",
						"1" => "posisi_tanah_tusuk_sate_1",
						"2" => "posisi_tanah_tusuk_sate_2",
					),
					"285" => array(
						"0" => "peruntukan_0",
						"2" => "peruntukan_1",
						"3" => "peruntukan_2",
					),
					"286" => array(
						"0" => "topografi_0",
						"2" => "topografi_1",
						"3" => "topografi_2",
					),
					"287" => array(
						"0" => "waktu_penawaran_0",
						"2" => "waktu_penawaran_1",
						"3" => "waktu_penawaran_2",
					),
					"288" => array(
						"0" => "lain_lain_0",
						"1" => "lain_lain_1",
						"2" => "lain_lain_2",
					),
					"289" => array(
						"0" => "total_0",
						"1" => "total_1",
						"2" => "total_2",
					),
					"292" => array(
						"0" => "indikasi_nilai_pasar_tanah_permeter",
						"1" => "indikasi_nilai_pasar_tanah_permeter",
						"2" => "indikasi_nilai_pasar_tanah_permeter",
					),
				);

			}
			elseif ($lokasi->id_jenis_objek == 3)
			{
				$databanding_map = array(
					"277" => array(
						"0" => "lokasi_0",
						"2" => "lokasi_1",
						"3" => "lokasi_2",
					),
					"278" => array(
						"0" => "dokumen_legalitas_0",
						"2" => "dokumen_legalitas_1",
						"3" => "dokumen_legalitas_2",
					),
					"279" => array(
						"0" => "luas_kios_0",
						"2" => "luas_kios_1",
						"3" => "luas_kios_2",
					),
					"280" => array(
						"0" => "lebar_kondisi_jalan_0",
						"2" => "lebar_kondisi_jalan_1",
						"3" => "lebar_kondisi_jalan_2",
					),
					"281" => array(
						"0" => "posisi_kios_0",
						"2" => "posisi_kios_1",
						"3" => "posisi_kios_2",
					),
					"283" => array(
						"0" => "letak_lantai_kios_0",
						"1" => "letak_lantai_kios_1",
						"2" => "letak_lantai_kios_2",
					),
					"284" => array(
						"0" => "lokasi_kios_0",
						"1" => "lokasi_kios_1",
						"2" => "lokasi_kios_2",
					),
					"285" => array(
						"0" => "peruntukan_0",
						"2" => "peruntukan_1",
						"3" => "peruntukan_2",
					),
					"286" => array(
						"0" => "fasilitas_kios_0",
						"2" => "fasilitas_kios_1",
						"3" => "fasilitas_kios_2",
					),
					"287" => array(
						"0" => "waktu_penawaran_0",
						"2" => "waktu_penawaran_1",
						"3" => "waktu_penawaran_2",
					),
					"288" => array(
						"0" => "lain_lain_0",
						"1" => "lain_lain_1",
						"2" => "lain_lain_2",
					),
					"289" => array(
						"0" => "total_0",
						"1" => "total_1",
						"2" => "total_2",
					),
				);
			}
			elseif ($lokasi->id_jenis_objek == 5)
			{
				$databanding_map = array(
					"277" => array(
						"0" => "lokasi_0",
						"2" => "lokasi_1",
						"3" => "lokasi_2",
					),
					"278" => array(
						"0" => "dokumen_legalitas_0",
						"2" => "dokumen_legalitas_1",
						"3" => "dokumen_legalitas_2",
					),
					"279" => array(
						"0" => "luas_bangunan_0",
						"2" => "luas_bangunan_1",
						"3" => "luas_bangunan_2",
					),
					"280" => array(
						"0" => "lebar_kondisi_jalan_0",
						"2" => "lebar_kondisi_jalan_1",
						"3" => "lebar_kondisi_jalan_2",
					),
					"281" => array(
						"0" => "kondisi_eksterior_interior_0",
						"2" => "kondisi_eksterior_interior_1",
						"3" => "kondisi_eksterior_interior_2",
					),
					"283" => array(
						"0" => "lebar_depan_0",
						"1" => "lebar_depan_1",
						"2" => "lebar_depan_2",
					),
					"284" => array(
						"0" => "panjang_bangunan_0",
						"1" => "panjang_bangunan_1",
						"2" => "panjang_bangunan_2",
					),
					"285" => array(
						"0" => "peruntukan_0",
						"2" => "peruntukan_1",
						"3" => "peruntukan_2",
					),
					"286" => array(
						"0" => "fasilitas_lingkungan_0",
						"2" => "fasilitas_lingkungan_1",
						"3" => "fasilitas_lingkungan_2",
					),
					"287" => array(
						"0" => "waktu_penawaran_0",
						"2" => "waktu_penawaran_1",
						"3" => "waktu_penawaran_2",
					),
					"288" => array(
						"0" => "lain_lain_0",
						"1" => "lain_lain_1",
						"2" => "lain_lain_2",
					),
					"289" => array(
						"0" => "total_0",
						"1" => "total_1",
						"2" => "total_2",
					),
					"975" => array(
						"0" => "sarana_parkir_0",
						"1" => "sarana_parkir_1",
						"2" => "sarana_parkir_2",
					),
					"976" => array(
						"0" => "letak_posisi_bangunan_0",
						"1" => "letak_posisi_bangunan_1",
						"2" => "letak_posisi_bangunan_2",
					),
				);

			}
			elseif ($lokasi->id_jenis_objek == 6)
			{
				$databanding_map = array(
					"1103" => array(
						"0" => "dokumen_legalitas_0",
						"2" => "dokumen_legalitas_1",
						"3" => "dokumen_legalitas_2",
					),
					"1104" => array(
						"0" => "lantai_ruang_apartment_0",
						"2" => "lantai_ruang_apartment_1",
						"3" => "lantai_ruang_apartment_2",
					),
					"1105" => array(
						"0" => "luas_ruangan_apartment_0",
						"2" => "luas_ruangan_apartment_1",
						"3" => "luas_ruangan_apartment_2",
					),
					"1106" => array(
						"0" => "view_menghadap_ke_0",
						"2" => "view_menghadap_ke_1",
						"3" => "view_menghadap_ke_2",
					),
					"1107" => array(
						"0" => "posisi_ruang_apartment_0",
						"1" => "posisi_ruang_apartment_1",
						"2" => "posisi_ruang_apartment_2",
					),
					"1108" => array(
						"0" => "furnished_0",
						"1" => "furnished_1",
						"2" => "furnished_2",
					),
					"1109" => array(
						"0" => "jumlah_kamar_tidur_0",
						"2" => "jumlah_kamar_tidur_1",
						"3" => "jumlah_kamar_tidur_2",
					),
					"1110" => array(
						"0" => "fasilitas_ruang_apartment_0",
						"2" => "fasilitas_ruang_apartment_1",
						"3" => "fasilitas_ruang_apartment_2",
					),
					"1111" => array(
						"0" => "waktu_penawaran_0",
						"2" => "waktu_penawaran_1",
						"3" => "waktu_penawaran_2",
					),
					"1112" => array(
						"0" => "total_0",
						"1" => "total_1",
						"2" => "total_2",
					),
				);

			}
			elseif ($lokasi->id_jenis_objek == 7)
			{
				$databanding_map = array(
					"1103" => array(
						"0" => "dokumen_legalitas_0",
						"2" => "dokumen_legalitas_1",
						"3" => "dokumen_legalitas_2",
					),
					"1104" => array(
						"0" => "lantai_ruang_apartment_0",
						"2" => "lantai_ruang_apartment_1",
						"3" => "lantai_ruang_apartment_2",
					),
					"1105" => array(
						"0" => "luas_ruangan_apartment_0",
						"2" => "luas_ruangan_apartment_1",
						"3" => "luas_ruangan_apartment_2",
					),
					"1106" => array(
						"0" => "view_menghadap_ke_0",
						"2" => "view_menghadap_ke_1",
						"3" => "view_menghadap_ke_2",
					),
					"1107" => array(
						"0" => "posisi_ruang_apartment_0",
						"1" => "posisi_ruang_apartment_1",
						"2" => "posisi_ruang_apartment_2",
					),
					"1108" => array(
						"0" => "furnished_0",
						"1" => "furnished_1",
						"2" => "furnished_2",
					),
					"1109" => array(
						"0" => "jumlah_kamar_tidur_0",
						"2" => "jumlah_kamar_tidur_1",
						"3" => "jumlah_kamar_tidur_2",
					),
					"1110" => array(
						"0" => "fasilitas_ruang_apartment_0",
						"2" => "fasilitas_ruang_apartment_1",
						"3" => "fasilitas_ruang_apartment_2",
					),
					"1111" => array(
						"0" => "waktu_penawaran_0",
						"2" => "waktu_penawaran_1",
						"3" => "waktu_penawaran_2",
					),
					"1112" => array(
						"0" => "total_0",
						"1" => "total_1",
						"2" => "total_2",
					),
				);

			}

			$databanding_pos = 0;

			if (false != strpos($keterangan, '-'))
			{
				$databanding_pos_expl = explode('-', $keterangan);
				$databanding_pos = $databanding_pos_expl[1];
				$keterangan = $databanding_pos_expl[0];
			}
			$field = $databanding_map[$id_field][$databanding_pos];
		}

		if ((int)$id_field == 637 || (int)$id_field == 747 || (int)$id_field == 908 || (int)$id_field == 909)
		{
			$table = 'txn_ruang_lantai';
			$field = 'luas';
		}


		// echo json_encode($table);
		// echo json_encode($field); exit();

		$response = array();
		if (false !== $field && false !== $table)
		{
			$get_txn_kertas_kerja = $this->global_model->get_by_id('txn_kertas_kerja', 'id_lokasi', $id_lokasi);
			$id_kertas_kerja = $get_txn_kertas_kerja->id_kertas_kerja;
			
			$data_txn_kertas_kerja[$field] = trim($value);
			$data_txn_kertas_kerja["id_kertas_kerja"] = $id_kertas_kerja;

			$row_lokasi = $this->global_model->get_data($table, 1, array("id_lokasi"), array($id_lokasi), "created");
			$row_lokasi_result = $row_lokasi->result();
			$row_lokasi_count = count($row_lokasi_result);

			if ($table === 'txn_kertas_kerja')
			{
				$bangunan_role = $keterangan;
				$data_txn_bangunan = $this->global_model->get_list_array($table, "id_lokasi='".$id_lokasi."'");
				$is_exists = (count($data_txn_bangunan) > 0);
				if ($is_exists)
				{
					$update_data = $data_txn_kertas_kerja;
					$this->global_model->update_data($table, 'id_lokasi', $id_lokasi, $update_data);
				}
				else
				{
					//print_r($data_txn_kertas_kerja);
					$id_kertas_kerja = $this->global_model->insert_data($table, $data_txn_kertas_kerja);
				}
			}
			elseif ($table === 'txn_tanah')
			{
				$bangunan_role = $keterangan;
				$data_txn_bangunan = $this->global_model->get_list_array($table, "id_lokasi='".$id_lokasi."'");
				$is_exists = (count($data_txn_bangunan) > 0);
				if ($is_exists)
				{
					$update_data = $data_txn_kertas_kerja;
					$this->global_model->update_data($table, 'id_lokasi', $id_lokasi, $update_data);
				}
				else
				{
					$this->global_model->insert_data($table, $data_txn_kertas_kerja);
				}
			}
			elseif ($table === 'txn_bangunan')
			{
				$bangunan_role = $keterangan;
				$data_txn_kertas_kerja['bangunan_role'] = $bangunan_role;
				$data_txn_bangunan = $this->global_model->get_list_array($table, "id_lokasi='".$id_lokasi."' AND bangunan_role='".$bangunan_role."'");
				$is_exists = (count($data_txn_bangunan) > 0);

				if ($is_exists)
				{
					$this->global_model->update($table, 2, array("id_lokasi", "bangunan_role"), array($id_lokasi, $bangunan_role), $data_txn_kertas_kerja);
				}
				else
				{
					$data_txn_kertas_kerja['bangunan_role'] = $bangunan_role;
					$this->global_model->insert_data($table, $data_txn_kertas_kerja);
				}
			}
			elseif ($table === 'txn_sarana_pelengkap')
			{
				$bangunan_role = $keterangan;
				$data_txn_bangunan = $this->global_model->get_list_array($table, "id_lokasi='".$id_lokasi."'");
				$is_exists = (count($data_txn_bangunan) > 0);
				if ($is_exists)
				{
					$update_data = $data_txn_kertas_kerja;
					$this->global_model->update_data($table, 'id_lokasi', $id_lokasi, $update_data);
				}
				else
				{
					$this->global_model->insert_data($table, $data_txn_kertas_kerja);
				}
			}
			elseif ($table === 'txn_data_banding')
			{
				$jenis_pembanding = $keterangan;
				$data_txn_bangunan = $this->global_model->get_list_array($table, "id_lokasi='".$id_lokasi."' AND jenis_pembanding='".$jenis_pembanding."'");
				$is_exists = (count($data_txn_bangunan) > 0);
				if ($is_exists)
				{
					$this->global_model->update($table, 2, array("id_lokasi", "jenis_pembanding"), array($id_lokasi, $jenis_pembanding), $data_txn_kertas_kerja);
				}
				else
				{
					$data_txn_kertas_kerja['jenis_pembanding'] = $jenis_pembanding;
					$this->global_model->insert_data($table, $data_txn_kertas_kerja);
				}
			}
			elseif ($table === 'txn_lampiran')
			{
				$jenis_lampiran = $keterangan;
				$data_txn_kertas_kerja['jenis_lampiran'] = $jenis_lampiran;
				$data_txn_bangunan = $this->global_model->get_list_array($table, "id_lokasi='".$id_lokasi."' AND jenis_lampiran='".$jenis_lampiran."'");
				$is_exists = (count($data_txn_bangunan) > 0);

				if ($is_exists)
				{
					$this->global_model->update($table, 2, array("id_lokasi", "jenis_lampiran"), array($id_lokasi, $jenis_lampiran), $data_txn_kertas_kerja);
				}
				else
				{
					$data_txn_kertas_kerja['jenis_lampiran'] = $jenis_lampiran;
					$this->global_model->insert_data($table, $data_txn_kertas_kerja);
				}
			}
			elseif ($table === 'txn_ruang_lantai')
			{
				$keterangan_explode = explode(" ", $keterangan);

				if (count($keterangan_explode) == 2)
				{
					$koordinat_full = $keterangan_explode[0];
					$find_spec_koordinat = explode("__",$koordinat_full);
					$koordinat_y = (isset($find_spec_koordinat[1])) ? $find_spec_koordinat[1] : 1;
					$koordinat_x = (isset($find_spec_koordinat[2])) ? $find_spec_koordinat[2] : 1;
					$bangunan_role = $keterangan_explode[1];
					switch ($id_field) {
						case '747':
							$jenis = "Teras Balkon";
							break;
						
						case '908':
							$jenis = "Lantai Mezzanine";
							break;
						
						case '909':
							$jenis = "Lain-lain";
							break;
						
						default:
							$jenis = "Ruangan";
							break;
					}

					$data_txn_kertas_kerja['bangunan_role'] = $bangunan_role;
					$data_txn_kertas_kerja['koordinat_x'] = $koordinat_x;
					$data_txn_kertas_kerja['koordinat_y'] = $koordinat_y;
					$data_txn_kertas_kerja['jenis'] = $jenis;

					$data_txn_ruang_lantai = $this->global_model->get_list_array($table, "id_lokasi='".$id_lokasi."' AND bangunan_role='".$bangunan_role."' AND koordinat_x='".$koordinat_x."' AND koordinat_y='".$koordinat_y."' AND jenis='".$jenis."'");

					$is_exists = (count($data_txn_ruang_lantai) > 0);
					if ($is_exists)
					{
						$this->global_model->update($table, 5, array("id_lokasi", "bangunan_role", "koordinat_x", "koordinat_y", "jenis"), array($id_lokasi, $bangunan_role, $koordinat_x, $koordinat_y, $jenis), $data_txn_kertas_kerja);
					}
					else
					{
						$this->global_model->insert_data($table, $data_txn_kertas_kerja);
					}
				}
			}

			$id_bangunan = false;

			$response['id_bangunan'] = $this->global_model->db->last_query();
		}

		echo json_encode($response);
	}
	function get_data_legalitas()
	{
		$data_table	= $data_value = array();
		$id_lokasi	= $_POST["id_lokasi"];
		$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();

		$custom_data	= unserialize($lokasi->custom_data);
		// echo "<pre>";var_dump($custom_data);echo "</pre>";

		if (($custom_data) && array_key_exists("data_legalitas", $custom_data))
		{
			$data_legalitas 	= $custom_data["data_legalitas"];

			$i = 1;
			foreach($data_legalitas as $item_legalitas)
			{
				$file_legalitas = NULL;
				$list_field	= $this->global_model->get_data("mst_field_objek", 1, array("condition"), array("multiple_data_legalitas"));

				foreach ($list_field->result() as $item_field)
				{
					$name	= "update[".$item_field->nama."]";
					$data_value	= $this->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($lokasi->id, $item_field->id, $item_legalitas));

					if ($data_value->num_rows() == 1){
						$value	= $data_value->row()->jawab;
					}else{
						$value	= "";
					}

					if ($item_field->type == "Textbox")
					{
						if ( $item_field->nama == 'tanah_98' )
							$file_legalitas = ((set_value(".$name.")) ? set_value(".$name.") : $value);
						$data["input"][$item_field->nama] = "<input type='".($item_field->nama == 'tanah_98' ? 'hidden' : 'text')."' id='textbox_".$item_field->nama."' name='".$name."' class='form-control table_input' value='".((set_value(".$name.")) ? set_value(".$name.") : $value)."' required data-id-field='".$item_field->id."' data-keterangan='".$item_legalitas."'>";
						if ( $item_field->nama == 'tanah_98' ) 
							$data["input"][$item_field->nama] .= "<div style='margin-left: 12px;' class='box_file_po'>".(empty($file_legalitas) ? NULL : "<a href='".base_url()."/asset/file/".$file_legalitas."' target='_blank'>Download</a>")."</div>"; 
					}
					else if ($item_field->type == "Date")
					{
						$date_name = $name;
                        $date_label = $name;
                        $date_value = ((set_value(".$name.")) ? set_value(".$name.") : $value);
                        $date_id = $item_field->id;
                        $date_class = "table_input textbox_".$item_field->nama;
                        $date_attr = "data-id-field='".$item_field->id."' data-keterangan='".$item_legalitas."'";

						$data["input"][$item_field->nama]	= $this->formlib->_generate_input_date($date_name, $date_label, $date_value, true, false, "dd-mm-yyyy", $date_id, $date_class, $date_attr);

						// $data["input"][$item_field->nama]	= "
						// 	<input type='text' id='textbox_".$item_field->nama."' name='".$name."' class='form-control table_input textbox_".$item_field->nama."' value='".((set_value(".$name.")) ? set_value(".$name.") : $value)."' required data-id-field='".$item_field->id."' data-date-format='dd-mm-yyyy' data-date-autoclose='true' data-keterangan='".$item_legalitas."'>
						// 	<script>
						// 		$('.textbox_".$item_field->nama."[data-keterangan=".$item_legalitas."]').datepicker();
						// 	</script>
						// ";
					}
					else if ($item_field->type == "Dropdown")
					{
						$dropdown	= "<select class='form-control table_input' id='textbox_".$item_field->nama."' name='".$name."' data-id-field='".$item_field->id."' data-keterangan='".$item_legalitas."'>";
						$dropdown	.= "<option selected='selected' disabled='disabled'>Select</option>";

						$list_option = explode(";", $item_field->keterangan);

						if ($lokasi->id_jenis_objek == 6)
						{
							$list_option = array();
							$tipe_legalitas_tanah = $this->pekerjaan_model_new->get_tipe_legalitas_tanah();

							foreach($tipe_legalitas_tanah as $val)
							{
								$list_option[] = $val->tipe_legalitas_tanah;
							}
						}

						foreach ($list_option as $item_option)
						{

							if (!empty($item_option))
							{
								if ($value == $item_option)
									$dropdown .= "<option value='".$item_option."' selected='selected'>".$item_option."</option>";
								else
									$dropdown .= "<option value='".$item_option."'>".$item_option."</option>";
							}
						}


						$dropdown	.= "</select>";

						$data["input"][$item_field->nama]	= $dropdown;
					}

					$data_table[$i][$item_field->nama]	= $data["input"][$item_field->nama];
				}
				$data_table[$i]["action"]	= "<div class='text-center'><i class='fa fa-trash btn-data-legalitas' data-id='".$item_legalitas."' data-type='delete' aria-hidden='true' style='cursor: pointer; '></i></div>";

				$i++;
			}
		}


		$return		= array(
			"data_table"	=> $data_table
		);
		echo json_encode($return);
	}
	function get_data_legalitas2()
	{
		$this->load->library("kertaskerjalib");
		$data_table	= array();
		$id_lokasi	= $_POST["id_lokasi"];
		$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();

		$custom_data	= unserialize($lokasi->custom_data);

		if (($custom_data) && array_key_exists("data_legalitas", $custom_data))
		{
			$data_legalitas 	= $custom_data["data_legalitas"];

			$i = 1;
			foreach($data_legalitas as $item_legalitas)
			{
				/*$data_table[$i][$item_legalitas]	= "asd";*/
				/*$data["input"][$item_field->nama]	= */
				$list_field_53	= $this->global_model->get_data("mst_field_objek", 1, array("nama"), array("tanah_53"))->row();
				$list_field_54	= $this->global_model->get_data("mst_field_objek", 1, array("nama"), array("tanah_54"))->row();
				$list_field_60	= $this->global_model->get_data("mst_field_objek", 1, array("nama"), array("tanah_60"))->row();
				$list_field_68	= $this->global_model->get_data("mst_field_objek", 1, array("nama"), array("tanah_68"))->row();
				$list_field_69	= $this->global_model->get_data("mst_field_objek", 1, array("nama"), array("tanah_69"))->row();
				$list_field_70	= $this->global_model->get_data("mst_field_objek", 1, array("nama"), array("tanah_70"))->row();


				$data_table[$i]["tanah_53"]	= $this->kertaskerjalib->get_textbox($lokasi, $list_field_53, $i);
				$data_table[$i]["tanah_54"]	= $this->kertaskerjalib->get_textbox($lokasi, $list_field_54, $i);
				$data_table[$i]["tanah_60"]	= $this->kertaskerjalib->get_textbox($lokasi, $list_field_60, $i);
				$data_table[$i]["tanah_68"]	= $this->kertaskerjalib->get_textbox($lokasi, $list_field_68, $i);
				$data_table[$i]["tanah_69"]	= $this->kertaskerjalib->get_textbox($lokasi, $list_field_69, $i);
				$data_table[$i]["tanah_70"]	= $this->kertaskerjalib->get_textbox($lokasi, $list_field_70, $i);

				$i++;
			}
		}


		$return		= array(
			"data_table"	=> $data_table
		);
		echo json_encode($return);
	}
	function update_data_legalitas()
	{
		$id_lokasi	= $_POST["id_lokasi"];
		$type		= $_POST["type"];
		$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();

		if ($type == "tambah")
		{
			$new_data		= array();
			$custom_data	= unserialize($lokasi->custom_data);

			/*if (array_key_exists("data_legalitas", $custom_data))*/

			if (!($custom_data) || !array_key_exists("data_legalitas", $custom_data))
			{
				$data	= array(
					"custom_data" => serialize(array(
						"data_legalitas"	=> array(1)
					))
				);

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
			else
			{
				$data_legalitas 	= $custom_data["data_legalitas"];
				$end_data_legalitas = end($custom_data["data_legalitas"]);
				$new_data_legalitas	= $end_data_legalitas + 1;
				array_push($data_legalitas, $new_data_legalitas);

				foreach ($custom_data as $key => $data)
				{
					if ($key == "data_legalitas")
					{
						$new_data["data_legalitas"]	= $data_legalitas;
					}
					else
					{
						$new_data[$key]	= $data;
					}
				}

				$data	= array(
					"custom_data" => serialize($new_data)
				);

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
		}
		else if ($type == "delete")
		{
			$id 	= $_POST["id"];

			$new_data		= array();
			$custom_data	= unserialize($lokasi->custom_data);

			/*if (array_key_exists("data_legalitas", $custom_data))*/

			if (!($custom_data) || !array_key_exists("data_legalitas", $custom_data))
			{
				$data	= array(
					"custom_data" => serialize(array(
						"data_legalitas"	=> array(1)
					))
				);

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
			else
			{
				$data_legalitas 	= $custom_data["data_legalitas"];

				if(($key = array_search($id, $data_legalitas)) !== false)
				{
					unset($data_legalitas[$key]);
				}


				foreach ($custom_data as $key => $data)
				{
					if ($key == "data_legalitas")
					{
						$new_data["data_legalitas"]	= $data_legalitas;
					}
					else
					{
						$new_data[$key]	= $data;
					}
				}

				$data	= array("custom_data" => serialize($new_data));

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);

				// Delete Value
				$list_field	= $this->global_model->get_data("mst_field_objek", 1, array("alias"), array("Data Legalitas"));

				foreach ($list_field->result() as $item_field)
				{
					$this->global_model->delete("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($id_lokasi, $item_field->id, $id));
				}
			}
		}
	}
	// Get Tab Pembanding
	function update_jumlah_pembanding()
	{
		$id_lokasi	= $_POST["id_lokasi"];
		$type		= $_POST["type"];
		$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();

		if ($type == "tambah")
		{
			$new_data		= array();
			$custom_data	= unserialize($lokasi->custom_data);

			if (!($custom_data) || !array_key_exists("tab_pembanding", $custom_data))
			{
				$data	= array(
					"custom_data" => serialize(array(
						"tab_pembanding"	=> array(1)
					))
				);

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
			else
			{
				$tab_pembanding 	= $custom_data["tab_pembanding"];
				$end_data_legalitas = end($custom_data["tab_pembanding"]);
				$end_data_legalitas	= explode(" ", $end_data_legalitas);
				$new_data_legalitas1	= $end_data_legalitas[0]." ".($end_data_legalitas[1] + 1);
				array_push($tab_pembanding, $new_data_legalitas1);

				foreach ($custom_data as $key => $data)
				{
					if ($key == "tab_pembanding")
					{
						$new_data["tab_pembanding"]	= $tab_pembanding;
					}
					else
					{
						$new_data[$key]	= $data;
					}
				}

				$data	= array(
					"custom_data" => serialize($new_data)
				);

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
		}
		else if ($type == "delete")
		{
			$id 	= $_POST["id"];

			$new_data		= array();
			$custom_data	= unserialize($lokasi->custom_data);

			/*if (array_key_exists("data_legalitas", $custom_data))*/

			if (!($custom_data) || !array_key_exists("tab_pembanding", $custom_data))
			{
				$data	= array(
					"custom_data" => serialize(array(
						"tab_pembanding"	=> array(1)
					))
				);

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
			else
			{
				$tab_pembanding	= $custom_data["tab_pembanding"];

				if(($key = array_search($id, $tab_pembanding)) !== false)
				{
					unset($tab_pembanding[$key]);
				}


				foreach ($custom_data as $key => $data)
				{
					if ($key == "tab_pembanding")
					{
						$new_data["tab_pembanding"]	= $tab_pembanding;
					}
					else
					{
						$new_data[$key]	= $data;
					}
				}

				$data	= array("custom_data" => serialize($new_data));

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
		}
	}
	function get_tab_pembanding()
	{
		$this->load->library("kertaskerjalib");

		// $_POST["id_lokasi"] = 71;
		
		$id_lokasi	= $_POST["id_lokasi"];
		$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();

		// $lokasi->id_jenis_objek = 7;

		$custom_data		= unserialize($lokasi->custom_data);

		if (!array_key_exists("tab_pembanding", $custom_data))
		{
			$custom_data1["tab_pembanding"]	= array("Objek Penilaian", "Pembanding 1", "Pembanding 2", "Pembanding 3");

			$this->_ci->global_model->update("mst_lokasi", 1, array("id"), array($lokasi->id), array("custom_data" => serialize($custom_data1)));

			$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();

			$custom_data		= unserialize($lokasi->custom_data);
		}

		$pembanding_master 	= $custom_data["tab_pembanding"];
		$list_field_tanah	= $this->global_model->get_data("mst_field_tanah");


		if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2){
			$list_field			= $this->global_model->get_by_query("SELECT * FROM mst_field_objek WHERE id_jenis_objek = 1 AND nama LIKE '%pembanding%' ");
		}else if ($lokasi->id_jenis_objek == 6) {
			$list_field			= $this->global_model->get_by_query("SELECT * FROM mst_field_objek_apartemen WHERE id_jenis_objek = 1 AND nama LIKE '%pembanding%' ");
		}else if ($lokasi->id_jenis_objek == 7) {
			$list_field			= $this->global_model->get_by_query("SELECT * FROM mst_field_objek_office_space WHERE id_jenis_objek = 1 AND nama LIKE '%pembanding%' ");
		}else if ($lokasi->id_jenis_objek==5){
		$list_field			= $this->global_model->get_by_query("SELECT * FROM mst_field_objek_ruko WHERE id_jenis_objek = 1 AND nama LIKE '%pembanding%' ");
		}else if ($lokasi->id_jenis_objek==3){
		$list_field			= $this->global_model->get_by_query("SELECT * FROM mst_field_objek_kios WHERE id_jenis_objek = 1 AND nama LIKE '%pembanding%' ");
		}


		// Load Textbox
		{
			for($a = 0; $a < count($pembanding_master); $a++)
			{
				$i	= 1;
				foreach ($list_field->result() as $item_field)
				{
				if ($lokasi->id_jenis_objek==3 || $lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2  || $lokasi->id_jenis_objek == 6 || $lokasi->id_jenis_objek == 7){
					if (($i == 118 || $i == 111 || $i == 110 ||$i == 112 || $i == 113 ||$i == 114 || $i == 115 || $i == 116 || $i == 117 || $i == 31 || $i == 32 || $i == 33 || $i == 34 || $i == 35 || $i == 39 || $i == 40 || $i == 41) &&  $a != 0)
					{
						$textbox[$a][$i][0]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-0");
						$textbox[$a][$i][1]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-1");
						$textbox[$a][$i][2]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-2");
						$textbox[$a][$i][3]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-3");
					}
					else if (($i == 37 || $i == 38 || $i == 42 || $i == 43 || $i == 119) &&  $a != 0)
					{
						$textbox[$a][$i][0]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-0");
						$textbox[$a][$i][1]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-1");
						$textbox[$a][$i][2]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-2");
					}
					else
					{
						$textbox[$a][$i]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a);
					}
				}elseif ($lokasi->id_jenis_objek==5){
					if (($i == 118 || $i == 111 || $i == 110 ||$i == 112 || $i == 113 ||$i == 114 || $i == 115 || $i == 116 || $i == 117 || $i == 31 || $i == 32 || $i == 33 || $i == 34 || $i == 35 || $i == 39 || $i == 40 || $i == 41  || $i == 104 || $i == 105) &&  $a != 0)
					{
						$textbox[$a][$i][0]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-0");
						$textbox[$a][$i][1]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-1");
						$textbox[$a][$i][2]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-2");
						$textbox[$a][$i][3]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-3");
					}
					else if (($i == 37 || $i == 38 || $i == 42 || $i == 43 || $i == 119) &&  $a != 0)
					{
						$textbox[$a][$i][0]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-0");
						$textbox[$a][$i][1]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-1");
						$textbox[$a][$i][2]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a."-2");
					}
					else
					{
						$textbox[$a][$i]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $a);
					}
				}
					$i++;
				}
			}
		}


		$content	= "<input type='hidden' id='jumlah_pembanding' value='".count($pembanding_master)."'>";
		$content	.= "<div class='table_div'>";
		$content	.= "<table class='table_border_3' cellpadding='0' cellspacing='0'>";

		// Header
		{
			$content	.= "<thead>";
			$content	.= "<tr>";
			$content	.= "<th>URAIAN</th>";
			for($a = 0; $a < count($pembanding_master); $a++)
			{
				$content	.= "<th>".$pembanding_master[$a]."</th>";
			}
			$content	.= "</tr>";
			$content	.= "</thead>";
		}

		// Content
		{
			$content	.= "<tbody>";

			// Textbox 1 & 2 => Lampiran Foto
			if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2  || $lokasi->id_jenis_objek == 3 || $lokasi->id_jenis_objek == 5){
				{
					$content	.= "<tr>";
					$content	.= "<td rowspan='2'><span>Lampiran Foto</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][1]."</td>";
					}
					$content	.= "</tr>";

					$content	.= "<tr>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][2]."</td>";
					}
					$content	.= "</tr>";
				}
			}elseif($lokasi->id_jenis_objek == 6 || $lokasi->id_jenis_objek == 7){
				{
					$content	.= "<tr>";
					$content	.= "<td rowspan='2'><span>Lampiran Foto</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][1]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Informasi
			{
				$content	.= "<tr>";

				$content	.= "<tr>";
				$content	.= "<td colspan='".(count($pembanding_master) + 1)."' style='background-color: #eee; padding: 10px;'><span>INFORMASI</span></td>";
				$content	.= "</tr>";
			}
			// Textbox 3
			{
				$content	.= "<tr>";
				$content	.= "<td><span>Sumber Data (Nama) </span></td>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					$content	.= "<td>".$textbox[$a][3]."</td>";
				}
				$content	.= "</tr>";
			}
			// Textbox 4
			{
				$content	.= "<tr>";
				$content	.= "<td><span>Keterangan Sumber Data</span></td>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					if ($a == 0)
					$content	.= "<td style='background-color:#eee' ></td>";
					else
					$content	.= "<td>".$textbox[$a][4]."</td>";
				}
				$content	.= "</tr>";
			}
			// Textbox 5
			{
				$content	.= "<tr>";
				$content	.= "<td><span>Telepon / Hp. </span></td>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					$content	.= "<td>".$textbox[$a][5]."</td>";
				}
				$content	.= "</tr>";
			}
			// Textbox 6
			{
			if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2  || $lokasi->id_jenis_objek == 5 || $lokasi->id_jenis_objek == 3){
				$content	.= "<tr>";
				$content	.= "<td><span>Jenis Properti </span></td>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					if ($a == 0)
					$content	.= "<td style='background-color:#eee' ><input readonly='readonly' id='textbox_pembanding_6' name='update[pembanding_6]' class='table_input input_252_0 readonly' value='' data-id-field='252' data-keterangan='0' type='text'></td>";
					else
					$content	.= "<td>".$textbox[$a][6]."</td>";
				}
				$content	.= "</tr>";
				}else if($lokasi->id_jenis_objek == 6 || $lokasi->id_jenis_objek == 7){
					$content	.= "<tr>";
					$content	.= "<td><span>Jenis Properti </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						$content	.= "<td style='background-color:#eee' ><input readonly='readonly' id='textbox_pembanding_6' name='update[pembanding_6]' class='table_input input_252_0 readonly' value='' data-id-field='252' data-keterangan='0' type='text'></td>";
						else
						$content	.= "<td>".$textbox[$a][6]."</td>";
					}
					$content	.= "</tr>";
				}
			}if ($lokasi->id_jenis_objek== 3){
			{
				$content	.= "<tr>";
				$content	.= "<td><span>Nama pusat perbelanjaan</span></td>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					$content	.= "<td>".$textbox[$a][7]."</td>";
				}
				$content	.= "</tr>";
			}
			// Textbox 8
			{
				$content	.= "<tr>";
				$content	.= "<td><span>Letak lantai unit kios</span></td>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					$content	.= "<td>".$textbox[$a][8]."</td>";
				}
				$content	.= "</tr>";
			}
			{
				$content	.= "<tr>";
				$content	.= "<td><span>Blok / Area</span></td>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					$content	.= "<td>".$textbox[$a][17]."</td>";
				}
				$content	.= "</tr>";
			}
			}
			// Textbox 7
			//SET LOKASI DATA PEMBANDING
			{
				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Alamat</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][7]."</td>";
					}
					$content	.= "</tr>";
					$content	.= "<tr>";
					$content	.= "<td><span>Latitude</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= '<td><input type="text" id="latitude_pembanding_'.$a.'" data-keterangan="latitude_pembanding_'.$a.'"></td>';
					}
					$content	.= "</tr>";
					$content	.= "<tr>";
					$content	.= "<td><span>Longitude</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= '<td><input type="text" id="longitude_pembanding_'.$a.'" data-keterangan="longitude_pembanding_'.$a.'"></td>';
					}
					$content	.= "</tr>";
					$content	.= "<tr>";
					$content	.= "<td><span>Set Lokasi</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= '<td><input type="button" value="Input Lokasi" onclick="open_map(\''.$a.'\')"></td>';
					}
					$content	.= "</tr>";
				}else if($lokasi->id_jenis_objek == 6){
					$content	.= "<tr>";
					$content	.= "<td><span>Nama Apartemen</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][101]."</td>";
					}
					$content	.= "</tr>";
				}else if($lokasi->id_jenis_objek == 7){
					$content	.= "<tr>";
					$content	.= "<td><span>Nama Gedung Apartemen</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][101]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Textbox 8
			{
				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Jarak dengan obyek </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][8]."</td>";
					}
					$content	.= "</tr>";
				}else if($lokasi->id_jenis_objek == 6){
					$content	.= "<tr>";
					$content	.= "<td><span>Nama Tower </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][102]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Textbox 9 Apartemen
			{
				if($lokasi->id_jenis_objek == 6){
					$content	.= "<tr>";
					$content	.= "<td><span>Lantai Ruang Apartemen </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][104]."</td>";
					}
					$content	.= "</tr>";
				}elseif($lokasi->id_jenis_objek == 7){
					$content	.= "<tr>";
					$content	.= "<td><span>Lantai Unit Ruang Apartemen </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][104]."</td>";
					}
					$content	.= "</tr>";
				}
			}// Textbox 9
			{
				$content	.= "<tr>";
				$content	.= "<td><span>Harga penawaran </span></td>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					$content	.= "<td>".$textbox[$a][9]."</td>";
				}
				$content	.= "</tr>";
			}
			// Textbox 10
			{
				$content	.= "<tr>";
				$content	.= "<td><span>Perkiraan diskon </span></td>";
				$content	.= "<td>".$textbox[0][10]."</td>";
				for($a = 1; $a < count($pembanding_master); $a++)
				{
					$content	.= "<td>".$textbox[$a][10]."<div style='margin-top:-2%;position:absolute;margin-left:11%;'>%</div>"."</td>";
				}
				$content	.= "</tr>";
			}
			// Textbox 11
			{
				$content	.= "<tr>";
				$content	.= "<td><span>Indikasi harga transaksi </span></td>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					$content	.= "<td>".$textbox[$a][11]."</td>";
				}
				$content	.= "</tr>";
			}
			// Textbox 12
			{
				$content	.= "<tr>";
				$content	.= "<td><span>Waktu penawaran / transaksi </span></td>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					if ($a == 0)
					$content	.= "<td style='background-color:#eee' ></td>";
					else
					$content	.= "<td>".$textbox[$a][12]."</td>";
				}
				$content	.= "</tr>";
			}
			// Informasi
			{
				$content	.= "<tr>";
				$content	.= "<td colspan='".(count($pembanding_master) + 1)."' style='background-color: #eee; padding: 10px;'><span>SPESIFIKASI DATA</span></td>";
				$content	.= "</tr>";
			}
			// Textbox 13
			{
				$content	.= "<tr>";
				$content	.= "<td><span>Dokumen / legalitas</span></td>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					if ($a == 0)
					$content	.= "<td style='background-color:#eee' ><input readonly='readonly' id='textbox_pembanding_13' name='update[pembanding_6]' class='table_input input_259_0 readonly' value='' data-id-field='252' data-keterangan='0' type='text'></td>";
					else
					$content	.= "<td>".$textbox[$a][13]."</td>";
				}
				$content	.= "</tr>";
			}if ($lokasi->id_jenis_objek==3){
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Luas unit kios </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][14]."</td>";
					}
					$content	.= "</tr>";
				}
				// Textbox 15
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Posisi unit kios</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][16]."</td>";
					}
					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Lokasi unit kios</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][18]."</td>";
					}
					$content	.= "</tr>";
				}
				{

					$content	.= "<tr>";
					$content	.= "<td align='right' colspan='2' style='background-color: #f7eb09;'><span>Indikasi Nilai Bangunan ( / m<sup>2</sup> )</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a != 0)
						$content	.= "<td>".$textbox[$a][30]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Textbox 14
			{

				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Luas tanah </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][14]."</td>";
					}
					$content	.= "</tr>";
				}elseif($lokasi->id_jenis_objek == 6){
					$content	.= "<tr>";
					$content	.= "<td><span>Luas Ruangan Apartemen </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][14]."</td>";
					}
					$content	.= "</tr>";
				}elseif($lokasi->id_jenis_objek == 7){
					$content	.= "<tr>";
					$content	.= "<td><span>Luas Unit Ruangan Apartemen </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][14]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Textbox 15
			{
				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Luas bangunan</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][15]."</td>";
					}
					$content	.= "</tr>";
				}elseif($lokasi->id_jenis_objek == 6 || $lokasi->id_jenis_objek == 7){
					$content	.= "<tr>";
					$content	.= "<td><span>View (Menghadap Ke)</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][105]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Textbox 16
			{
				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Jumlah lantai bangunan </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						$content	.= "<td style='background-color:#eee' ><input readonly='readonly' id='textbox_pembanding_16' name='update[pembanding_6]' class='table_input input_262_0 readonly' value='0' data-id-field='262' data-keterangan='0' type='text'></td>";
						else
						$content	.= "<td>".$textbox[$a][16]."</td>";
					}
					$content	.= "</tr>";
				}elseif($lokasi->id_jenis_objek == 6){
					$content	.= "<tr>";
					$content	.= "<td><span>Posisi Ruang Apartemen</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][106]."</td>";
					}
					$content	.= "</tr>";
				}elseif($lokasi->id_jenis_objek == 7){
					$content	.= "<tr>";
					$content	.= "<td><span>Posisi Unit Ruang Kantor</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][106]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Textbox 17
			{
				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Tahun di bangun </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][17]."</td>";
					}
					$content	.= "</tr>";
				}elseif($lokasi->id_jenis_objek == 6 || $lokasi->id_jenis_objek == 7){
					$content	.= "<tr>";
					$content	.= "<td><span>Furnished</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][107]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Textbox 18
			{
				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Lebar jalan </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][18]."</td>";
					}
					$content	.= "</tr>";
				}elseif($lokasi->id_jenis_objek == 6){
					$content	.= "<tr>";
					$content	.= "<td><span>Jumlah Kamar Tidur</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][108]."</td>";
					}
					$content	.= "</tr>";
				}	
			}
			// Textbox 19
			{
				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2){
					$content	.= "<tr>";
					$content	.= "<td><span>Bentuk tanah </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][19]."</td>";
					}
					$content	.= "</tr>";
				}elseif($lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Kondisi Eksterior dan Interior</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][19]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Textbox 20
			{
				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Letak / posisi tanah </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						$content	.= "<td style='background-color:#eee' ><input readonly='readonly' id='textbox_pembanding_20' name='update[pembanding_20]' class='table_input input_266_0 readonly' value='0' data-id-field='266' data-keterangan='0' type='text'></td>";
						else
						$content	.= "<td>".$textbox[$a][20]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Textbox 21
			{
				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Peruntukan / zoning </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][21]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Textbox 22
			{
				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2){
					$content	.= "<tr>";
					$content	.= "<td><span>Kondisi eksisting tanah </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						$content	.= "<td style='background-color:#eee' ><input readonly='readonly' id='textbox_pembanding_22' name='update[pembanding_22]' class='table_input input_268_0 readonly' value='0' data-id-field='268' data-keterangan='0' type='text'></td>";
						else
						$content	.= "<td>".$textbox[$a][22]."</td>";
					}
					$content	.= "</tr>";
				}elseif($lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Luas Depan / Fountage </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						$content	.= "<td style='background-color:#eee' ><input readonly='readonly' id='textbox_pembanding_22' name='update[pembanding_22]' class='table_input input_268_0 readonly' value='0' data-id-field='268' data-keterangan='0' type='text'></td>";
						else
						$content	.= "<td>".$textbox[$a][22]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			// Textbox 23
			{
				if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2){
					$content	.= "<tr>";
					$content	.= "<td><span>Kontur tanah / topograpi </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						$content	.= "<td style='background-color:#eee' ><input readonly='readonly' id='textbox_pembanding_23' name='update[pembanding_23]' class='table_input input_269_0 readonly' value='0' data-id-field='269' data-keterangan='0' type='text'></td>";
						else
						$content	.= "<td>".$textbox[$a][23]."</td>";
					}
					$content	.= "</tr>";
				}elseif($lokasi->id_jenis_objek == 5){
					$content	.= "<tr>";
					$content	.= "<td><span>Panjang Bangunan </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						$content	.= "<td style='background-color:#eee' ><input readonly='readonly' id='textbox_pembanding_23' name='update[pembanding_23]' class='table_input input_269_0 readonly' value='0' data-id-field='269' data-keterangan='0' type='text'></td>";
						else
						$content	.= "<td>".$textbox[$a][23]."</td>";
					}
					$content	.= "</tr>";
					$content	.= "<tr>";
					$content	.= "<td align='right' colspan='2' style='background-color: #f7eb09;'><span>Indikasi Nilai Bangunan ( / m<sup>2</sup> )</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a != 0)
						$content	.= "<td>".$textbox[$a][30]."</td>";
					}
					$content	.= "</tr>";
				}
			}
			{
				if($lokasi->id_jenis_objek == 6){
					$content	.= "<tr>";
					$content	.= "<td colspan='2' align='center'><span>Indikasi Rasio M2 Space Ruang Apartemen</span></td>";
					for($a = 1; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][109]."</td>";
					}
					$content	.= "</tr>";
				}
			}



			$content	.= "</tbody>";
		}

		// Header

		if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2){
			{
				$content	.= "<thead>";
				$content	.= "<tr>";
				$content	.= "<th>ANALISA DATA</th>";
				for($a = 0; $a < count($pembanding_master); $a++)
				{
					$content	.= "<th>".$pembanding_master[$a]."</th>";
				}
				$content	.= "</tr>";
				$content	.= "</thead>";
			}

			// Content
			{
				$content	.= "<tbody>";
				$obj = $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 957 ");
				//echo $id_lokasi;
				$brb_m2 = 0;
				if ($obj->num_rows() == 1)
				{
					$brb_m2	= $obj->row()->jawab;
				}
				
				// Textbox 24
				{
					$content	.= "<tr>";
					$content	.= "<td><span>BRB Bangunan ( / m<sup>2</sup> ) </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						$content	.= "<td style='background-color:#eee' ><input readonly='readonly' id='textbox_pembanding_24' name='update[pembanding_24]' class='table_input input_270_0 readonly' value='". number_format((double)$brb_m2,0) ."' data-id-field='270' data-keterangan='". number_format((double)$brb_m2,0) ."' type='text'></td>";
						else
						$content	.= "<td>".$textbox[$a][24]."</td>";
					}
					$content	.= "</tr>";

				}
				// Textbox 26
				{
					$content	.= "<tr>";
					$content	.= "<td style='background-color: yellow'><span>Kondisi fisik bangunan (%)</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][26]."<div style='margin-top:-2%;position:absolute;margin-left:11%;'>%</div>"."</td>";
					}
					$content	.= "</tr>";
				}
				// Textbox 27
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Indikasi Nilai Pasar Bgn. ( / m<sup>2</sup> ) </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][27]."</td>";
					}
					$content	.= "</tr>";
				}
				// Textbox 25
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Indikasi Nilai Pasar Bangunan</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][25]."</td>";
					}
					$content	.= "</tr>";

				}
				// Textbox 28
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Indikasi Nilai Pasar Tanah</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][28]."</td>";
					}
					$content	.= "</tr>";
				}
				// Textbox 29
				{
					/*$content	.= "<tr>";
					$content	.= "<td><span>Kondisi fisik bangunan</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][29]."</td>";
					}
					$content	.= "</tr>";*/
				}
				// Textbox 30
				{
					$content	.= "<tr>";
					$content	.= "<td align='right' colspan='2' style='background-color: #f7eb09;'><span>Indikasi Nilai Tanah ( / m<sup>2</sup> )</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a != 0)
						$content	.= "<td>".$textbox[$a][30]."</td>";
					}
					$content	.= "</tr>";
				}

				$content	.= "</tbody>";
			}
		}

		// Header

		{
			$content	.= "<thead>";
			$content	.= "<tr>";
			$content	.= "<th>PENYESUAIAN</th>";
			for($a = 0; $a < count($pembanding_master); $a++)
			{
				$content	.= "<th>".$pembanding_master[$a]."</th>";
			}
			$content	.= "</tr>";
			$content	.= "</thead>";
		}

		// Content
		{
			if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2){
				// Textbox 31
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Lokasi</span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][31]."</td>";
						}
						else
						{
							/*$content	.= "<td>".$textbox[$a][31]."</td>";*/

							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][31][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][31][2]."</td>
											<td>".$textbox[$a][31][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				// Textbox 32
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Dokumen / legalitas tanah</span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][32]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][32][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][32][2]."</td>
											<td>".$textbox[$a][32][3]."</td>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				// Textbox 33
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Luas tanah </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][33]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][33][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][33][2]."</td>
											<td>".$textbox[$a][33][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				// Textbox 34
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Lebar dan kondisi jalan </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][34]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][34][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][34][2]."</td>
											<td>".$textbox[$a][34][3]."</td>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				// Textbox 35
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Bentuk tanah</span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][35]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][35][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][35][2]."</td>
											<td>".$textbox[$a][35][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}

				// Textbox 36
				/*{
					$content	.= "<tr>";
					$content	.= "<td><span>POSISI / LETAK TANAH</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][36]."</td>";
					}
					$content	.= "</tr>";
				}*/

				// Textbox 37
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Posisi tanah sudut / hook </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][37]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][37][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][37][1]."</td>
											<td>".$textbox[$a][37][2]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				// Textbox 38
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Posisi tanah tusuk sate </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][38]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][38][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][38][1]."</td>
											<td>".$textbox[$a][38][2]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}

				// Textbox 39
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Peruntukan / zoning</span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][39]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][39][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][39][2]."</td>
											<td>".$textbox[$a][39][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				// Textbox 40
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Kontur tanah / topograpi </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][40]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][40][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][40][2]."</td>
											<td>".$textbox[$a][40][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				// Textbox 41
				{
					$content	.= "<tr>";
					$content	.= "<td><span> Waktu penawaran / transaksi </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][41]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][41][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][41][2]."</td>
											<td>".$textbox[$a][41][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}

				// Textbox 42
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Lain-lain  </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][42]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][42][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][42][1]."</td>
											<td>".$textbox[$a][42][2]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				}elseif($lokasi->id_jenis_objek == 5){
					{
						$content	.= "<tr>";
						$content	.= "<td><span>Lokasi</span></td>";

						for($a = 0; $a < count($pembanding_master); $a++)
						{
							if ($a == 0)
							{
								$content	.= "<td>".$textbox[$a][31]."</td>";
							}
							else
							{
								/*$content	.= "<td>".$textbox[$a][31]."</td>";*/

								$content	.= "<td>";
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td>".$textbox[$a][31][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
												<td>".$textbox[$a][31][2]."</td>
												<td>".$textbox[$a][31][3]."</td>
											</tr>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}

						$content	.= "</tr>";
					}
					// Textbox 32
					{
						$content	.= "<tr>";
						$content	.= "<td><span>Dokumen / legalitas tanah</span></td>";

						for($a = 0; $a < count($pembanding_master); $a++)
						{
							if ($a == 0)
							{
								$content	.= "<td>".$textbox[$a][32]."</td>";
							}
							else
							{
								$content	.= "<td>";
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td>".$textbox[$a][32][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
												<td>".$textbox[$a][32][2]."</td>
												<td>".$textbox[$a][32][3]."</td>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}

						$content	.= "</tr>";
					}
					// Textbox 33
					{
						$content	.= "<tr>";
						$content	.= "<td><span>Luas Bangunan </span></td>";

						for($a = 0; $a < count($pembanding_master); $a++)
						{
							if ($a == 0)
							{
								$content	.= "<td>".$textbox[$a][15]."</td>";
							}
							else
							{
								$content	.= "<td>";
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td>".$textbox[$a][33][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
												<td>".$textbox[$a][33][2]."</td>
												<td>".$textbox[$a][33][3]."</td>
											</tr>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}

						$content	.= "</tr>";
					}
					// Textbox 34
					{
						$content	.= "<tr>";
						$content	.= "<td><span>Lebar dan kondisi jalan </span></td>";

						for($a = 0; $a < count($pembanding_master); $a++)
						{
							if ($a == 0)
							{
								$content	.= "<td>".$textbox[$a][34]."</td>";
							}
							else
							{
								$content	.= "<td>";
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td>".$textbox[$a][34][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
												<td>".$textbox[$a][34][2]."</td>
												<td>".$textbox[$a][34][3]."</td>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}

						$content	.= "</tr>";
					}
					{
					$content	.= "<tr>";
					$content	.= "<td><span>Lebar Depan / Frontage </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][37]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][37][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][37][1]."</td>
											<td>".$textbox[$a][37][2]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				// Textbox 38
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Panjang Bangunan </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][38]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][38][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][38][1]."</td>
											<td>".$textbox[$a][38][2]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
					}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Kondisi Eksterior & Interior</span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][35]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][35][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][35][2]."</td>
											<td>".$textbox[$a][35][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Fasilitas Lingkungan </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][40]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][40][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][40][2]."</td>
											<td>".$textbox[$a][40][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Fasilitas/sarana parkir</span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][104]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][104][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div></td>
											
											<td>".$textbox[$a][104][2]."</td>
											<td>".$textbox[$a][104][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";	
				}
						// Textbox 40
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Letak/Posisi bangunan</span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][105]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][105][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div></td>
											
											<td>".$textbox[$a][105][2]."</td>
											<td>".$textbox[$a][105][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Peruntukan / Zoning </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][39]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][39][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][39][2]."</td>
											<td>".$textbox[$a][39][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Waktu Penawaran / Transaksi </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][41]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][41][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][41][2]."</td>
											<td>".$textbox[$a][41][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Lain - Lain </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][42]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][42][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][42][1]."</td>
											<td>".$textbox[$a][42][2]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				}elseif($lokasi->id_jenis_objek == 3){
						{
							$content	.= "<tr>";
							$content	.= "<td><span>Dokumen / legalitas</span></td>";

							for($a = 0; $a < count($pembanding_master); $a++)
							{
								if ($a == 0)
								{
									$content	.= "<td>".$textbox[$a][32]."</td>";
								}
								else
								{
									$content	.= "<td>";
									$content	.= "
										<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
											<tbody>
												<tr>
													<td>".$textbox[$a][32][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div></td>
													
													<td>".$textbox[$a][32][2]."</td>
													<td>".$textbox[$a][32][3]."</td>
											</tbody>
										</table>
									";

									$content	.= "</td>";
								}
							}

							$content	.= "</tr>";
						}
						{
						$content	.= "<tr>";
						$content	.= "<td><span>Luas unit kios </span></td>";

						for($a = 0; $a < count($pembanding_master); $a++)
						{
							if ($a == 0)
							{
								$content	.= "<td>".$textbox[$a][33]."</td>";
							}
							else
							{
								$content	.= "<td>";
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td>".$textbox[$a][33][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div></td>
												
												<td>".$textbox[$a][33][2]."</td>
												<td>".$textbox[$a][33][3]."</td>
											</tr>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}

						$content	.= "</tr>";
					}
					{
						$content	.= "<tr>";
						$content	.= "<td><span>Letak lantai unit kios</span></td>";

						for($a = 0; $a < count($pembanding_master); $a++)
						{
							if ($a == 0)
							{
								$content	.= "<td>".$textbox[$a][37]."</td>";
							}
							else
							{
								$content	.= "<td>";
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td>".$textbox[$a][37][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div></td>
												
												<td>".$textbox[$a][37][1]."</td>
												<td>".$textbox[$a][37][2]."</td>
											</tr>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}

						$content	.= "</tr>";
					}
					// Textbox 38
					{
						$content	.= "<tr>";
						$content	.= "<td><span>Lokasi unit kios</span></td>";

						for($a = 0; $a < count($pembanding_master); $a++)
						{
							if ($a == 0)
							{
								$content	.= "<td>".$textbox[$a][38]."</td>";
							}
							else
							{
								$content	.= "<td>";
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td>".$textbox[$a][38][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div></td>
												
												<td>".$textbox[$a][38][1]."</td>
												<td>".$textbox[$a][38][2]."</td>
											</tr>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}

						$content	.= "</tr>";
					}
					{
						$content	.= "<tr>";
						$content	.= "<td><span>Posisi unit kios</span></td>";

						for($a = 0; $a < count($pembanding_master); $a++)
						{
							if ($a == 0)
							{
								$content	.= "<td>".$textbox[$a][35]."</td>";
							}
							else
							{
								$content	.= "<td>";
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td>".$textbox[$a][35][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div></td>
												
												<td>".$textbox[$a][35][2]."</td>
												<td>".$textbox[$a][35][3]."</td>
											</tr>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}

						$content	.= "</tr>";
					}
							// Textbox 40
					{
						$content	.= "<tr>";
						$content	.= "<td><span>Fasilitas unit kios</span></td>";

						for($a = 0; $a < count($pembanding_master); $a++)
						{
							if ($a == 0)
							{
								$content	.= "<td>".$textbox[$a][40]."</td>";
							}
							else
							{
								$content	.= "<td>";
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td>".$textbox[$a][40][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div></td>
												
												<td>".$textbox[$a][40][2]."</td>
												<td>".$textbox[$a][40][3]."</td>
											</tr>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}
						{
						$content	.= "<tr>";
						$content	.= "<td><span> Waktu penawaran / transaksi </span></td>";

						for($a = 0; $a < count($pembanding_master); $a++)
						{
							if ($a == 0)
							{
								$content	.= "<td>".$textbox[$a][41]."</td>";
							}
							else
							{
								$content	.= "<td>";
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td>".$textbox[$a][41][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div></td>
												
												<td>".$textbox[$a][41][2]."</td>
												<td>".$textbox[$a][41][3]."</td>
											</tr>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}

						$content	.= "</tr>";
					}
				}
			}elseif($lokasi->id_jenis_objek == 6 || $lokasi->id_jenis_objek == 7){

				{
					$content	.= "<tr>";
					$content	.= "<td><span>Dokumen / legalitas</span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][110]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][110][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][110][2]."</td>
											<td>".$textbox[$a][110][3]."</td>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				// Textbox 33
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Lantai Ruang Apartemen </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][111]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][111][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][111][2]."</td>
											<td>".$textbox[$a][111][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Luas Ruang Apartemen </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][112]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][112][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][112][2]."</td>
											<td>".$textbox[$a][112][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}
					$content	.= "</tr>";
				}	
				{
					$content	.= "<tr>";
					$content	.= "<td><span>View (Menghadap Ke) </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][113]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][113][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][113][2]."</td>
											<td>".$textbox[$a][113][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}
					$content	.= "</tr>";
				}	
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Posisi Ruang Apartemen </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][114]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][114][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][114][2]."</td>
											<td>".$textbox[$a][114][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}
					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Furnished </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][115]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][115][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][115][2]."</td>
											<td>".$textbox[$a][115][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				if($lokasi->id_jenis_objek == 6){
					{
						$content	.= "<tr>";
						$content	.= "<td><span>Jumlah Kamar Tidur </span></td>";

						for($a = 0; $a < count($pembanding_master); $a++)
						{
							if ($a == 0)
							{
								$content	.= "<td>".$textbox[$a][116]."</td>";
							}
							else
							{
								$content	.= "<td>";
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td>".$textbox[$a][116][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
												<td>".$textbox[$a][116][2]."</td>
												<td>".$textbox[$a][116][3]."</td>
											</tr>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}

						$content	.= "</tr>";
					}
				}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Fasilitas Ruang Apartemen </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][117]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][117][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][117][2]."</td>
											<td>".$textbox[$a][117][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Waktu Penawaran / Transaksi </span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a == 0)
						{
							$content	.= "<td>".$textbox[$a][118]."</td>";
						}
						else
						{
							$content	.= "<td>";
							$content	.= "
								<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
									<tbody>
										<tr>
											<td>".$textbox[$a][118][0]."<div style='margin-top:-2%;position:absolute;margin-left:4%;'>%</div>"."</td>
											<td>".$textbox[$a][118][2]."</td>
											<td>".$textbox[$a][118][3]."</td>
										</tr>
									</tbody>
								</table>
							";

							$content	.= "</td>";
						}
					}

					$content	.= "</tr>";
				}
			}
				// Textbox 43
				{
					$content	.= "<tr>";
					$content	.= "<td align='right' colspan='2' style='background-color: #f7eb09;'><span>Total Penyesuaian</span></td>";

					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a != 0)
						{
							$content	.= "<td>";
							if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 3 || $lokasi->id_jenis_objek == 5){
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td style='width: 50px;'>".$textbox[$a][43][0]."<div style='margin-top:-2%;position:absolute;margin-left:3.3%;'>%</div>"."</td>
												<td>".$textbox[$a][43][1]."</td>
												<td>".$textbox[$a][43][2]."</td>
											</tr>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}else if($lokasi->id_jenis_objek == 6 || $lokasi->id_jenis_objek == 7){
								$content	.= "
									<table border='0' cellpadding='0' cellspacing='0' class='table_border_4'>
										<tbody>
											<tr>
												<td style='width: 50px;'>".$textbox[$a][119][0]."<div style='margin-top:-2%;position:absolute;margin-left:3.3%;'>%</div>"."</td>
												<td>".$textbox[$a][119][1]."</td>
												<td>".$textbox[$a][119][2]."</td>
											</tr>
										</tbody>
									</table>
								";

								$content	.= "</td>";
							}
						}
					}

					$content	.= "</tr>";
				}

			if($lokasi->id_jenis_objek == 3 || $lokasi->id_jenis_objek == 5){
				{
					$content	.= "<tr style='background-color: #eee;'>";
					$content	.= "<td colspan='2'><span>Indikasi Nilai Properti Setelah Penyesuaian ( / m<sup>2</sup> )</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a != 0)
						$content	.= "<td>".$textbox[$a][44]."</td>";
					}
					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Bobot Rekonsiliasi (%)</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][45]."<div style='margin-top:-2%;position:absolute;margin-left:11%;'>%</div>"."</td>";
					}
					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td style='background-color: #eee;'><span>Indikasi Nilai Properti ( / m<sup>2</sup> ) </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][46]."</td>";
					}
					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td style='background-color: #eee;'><span>Nilai Pasar Bangunan Kios (Fisik)</span></td>";
					for($a = 0; $a <1 ; $a++)
					{
						$content	.= "<td>".$textbox[$a][101]."</td>";
					}
					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td style='background-color: #eee;'><span>Depresiasi %</span></td>";
					for($a = 0; $a < 1; $a++)
					{
						$content	.= "<td>".$textbox[$a][102]."</td>";
					}
					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td style='background-color: #eee;'><span>Nilai Likuidasi</span></td>";
					for($a = 0; $a < 1; $a++)
					{
						$content	.= "<td>".$textbox[$a][103]."</td>";
					}
					$content	.= "</tr>";
				}
			}

				// Textbox 44
			if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2){
				{
					$content	.= "<tr style='background-color: #eee;'>";
					$content	.= "<td colspan='2'><span>Indikasi Nilai Tanah Setelah Penyesuaian ( / m<sup>2</sup> )</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a != 0)
							$content	.= "<td>".$textbox[$a][44]."</td>";
					}
					$content	.= "</tr>";
				}
				// Textbox 45
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Bobot Rekonsiliasi (%)</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][45]."<div style='margin-top:-2%;position:absolute;margin-left:11%;'>%</div>"."</td>";
					}
					$content	.= "</tr>";
				}
				// Textbox 46
				{
					$content	.= "<tr>";
					$content	.= "<td style='background-color: #eee;'><span>Nilai Pasar Tanah ( / m<sup>2</sup> ) </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
							$content	.= "<td>".$textbox[$a][46]."</td>";
					}
					$content	.= "</tr>";
				}
			}else if($lokasi->id_jenis_objek == 6 || $lokasi->id_jenis_objek == 7){
				{
					$content	.= "<tr style='background-color: #eee;'>";
					$content	.= "<td colspan='2'><span>Indikasi Nilai Properti Setelah Penyesuaian ( / m<sup>2</sup> )</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						if ($a != 0)
							$content	.= "<td>".$textbox[$a][120]."</td>";
					}
					$content	.= "</tr>";
				}
				// Textbox 45
				{
					$content	.= "<tr>";
					$content	.= "<td><span>Bobot Rekonsiliasi (%)</span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
						$content	.= "<td>".$textbox[$a][121]."<div style='margin-top:-2%;position:absolute;margin-left:11%;'>%</div>"."</td>";
					}
					$content	.= "</tr>";
				}
				// Textbox 46
				{
					$content	.= "<tr>";
					$content	.= "<td style='background-color: #eee;'><span>Indikasi Nilai Properti ( / m<sup>2</sup> ) </span></td>";
					for($a = 0; $a < count($pembanding_master); $a++)
					{
							$content	.= "<td>".$textbox[$a][122]."</td>";
					}
					$content	.= "</tr>";
				}
				{
					$content	.= "<tr>";
					$content	.= "<td style='background-color: #eee;'><span>Nilai Pasar Properti</span></td>";
					for($a = 3; $a < count($pembanding_master); $a++)
					{
							$content	.= "<td>".$textbox[$a][123]."</td>";
					}
					$content	.= "</tr>";
				}						
				{
					$content	.= "<tr>";
					$content	.= "<td style='background-color: #eee;'><span>Deprisiasi</span></td>";
					for($a = 3; $a < count($pembanding_master); $a++)
					{
							$content	.= "<td>".$textbox[$a][124]."<div style='margin-top:-2%;position:absolute;margin-left:11%;'>%</div>"."</td>";
					}
					$content	.= "</tr>";
				}		
				{
					$content	.= "<tr>";
					$content	.= "<td style='background-color: #eee;'><span>Nilai Jual Cepat / Likuidasi</span></td>";
					for($a = 3; $a < count($pembanding_master); $a++)
					{
							$content	.= "<td>".$textbox[$a][125]."</td>";
					}
					$content	.= "</tr>";
				}
			}
		}




		$content	.= "</table>";
		$content	.= "</div>";

		// echo "<pre>".htmlentities($content)."</pre>"; return;
		echo $content;
	}
	// Bangunan
	function tambah_bangunan()
	{

		$id_lokasi	= $_POST["id_lokasi"];
		$type		= $_POST["type"];
		$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();

		if ($type == "tambah")
		{
			$new_data		= array();
			$custom_data	= unserialize($lokasi->custom_data);

			{
				$tab_bangunan 	= $custom_data["tab_bangunan"];

				foreach ($custom_data as $key => $data)
				{
					if ($key == "tab_bangunan")
					{
						$new_data_bangunan	= array();

						foreach ($data as $key_bangunan => $data_bangunan)
						{
							$new_data_bangunan[$key_bangunan] 	= $data_bangunan;
						}

						$count_bangunan		= count($new_data_bangunan) + 1;

						$new_bangunan 		= "Bangunan ".$count_bangunan;

						$new_data_bangunan[$new_bangunan] = array(
							"lantai" 	=> array("Lantai 1"),
							"ruangan" 	=> array("Ruang 1")
						);

						$new_data["tab_bangunan"]	= $new_data_bangunan;

					}
					else
					{
						$new_data[$key]	= $data;
					}
				}

				$data	= array(
					"custom_data" => serialize($new_data)
				);

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
		}
		else if ($type == "delete")
		{
			$id 	= $_POST["id"];

			$new_data		= array();
			$custom_data	= unserialize($lokasi->custom_data);

			/*if (array_key_exists("data_legalitas", $custom_data))*/

			if (!($custom_data) || !array_key_exists("tab_pembanding", $custom_data))
			{
				$data	= array(
					"custom_data" => serialize(array(
						"tab_pembanding"	=> array(1)
					))
				);

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
			else
			{
				$tab_pembanding	= $custom_data["tab_pembanding"];

				if(($key = array_search($id, $tab_pembanding)) !== false)
				{
					unset($tab_pembanding[$key]);
				}


				foreach ($custom_data as $key => $data)
				{
					if ($key == "tab_pembanding")
					{
						$new_data["tab_pembanding"]	= $tab_pembanding;
					}
					else
					{
						$new_data[$key]	= $data;
					}
				}

				$data	= array("custom_data" => serialize($new_data));

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
		}

		echo "success";
	}
	function tambah_lantai()
	{
		$id_lokasi	= $_POST["id_lokasi"];
		$type		= $_POST["type"];
		$bangunan	= str_replace("_", " ", $_POST["bangunan"]);
		$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();

		if ($type == "tambah")
		{
			$new_data		= array();
			$custom_data	= unserialize($lokasi->custom_data);

			$tab_bangunan 	= $custom_data["tab_bangunan"];

			foreach($custom_data as $key => $data)
			{
				if($key == "tab_bangunan")
				{
					$new_data_bangunan = array();

					foreach($data as $key_bangunan => $data_bangunan)
					{
						if ($key_bangunan == $bangunan)
						{
							$array_lantai	= $data_bangunan["lantai"];
							$array_ruangan	= $data_bangunan["ruangan"];

							$end_lantai		= end($array_lantai);
							$end_lantai		= str_replace("Lantai ", "", $end_lantai);

							$count_lantai	= count($array_lantai);
							array_push($array_lantai, "Lantai ".($end_lantai + 1));

							$new_data_bangunan[$key_bangunan] = array(
								"lantai"	=> $array_lantai,
								"ruangan"	=> $array_ruangan
							);
						}
						else
						{
							$new_data_bangunan[$key_bangunan] = $data_bangunan;
						}

					}

					$new_data["tab_bangunan"] = $new_data_bangunan;

				}
				else
				{
					$new_data[$key] = $data;
				}
			}

			$data = array(
				"custom_data"=> serialize($new_data)
			);

			$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);

		}
		else if ($type == "delete")
		{
			$id 	= $_POST["id"];

			$new_data		= array();
			$custom_data	= unserialize($lokasi->custom_data);

			/*if (array_key_exists("data_legalitas", $custom_data))*/

			if (!($custom_data) || !array_key_exists("tab_pembanding", $custom_data))
			{
				$data	= array(
					"custom_data" => serialize(array(
						"tab_pembanding"	=> array(1)
					))
				);

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
			else
			{
				$tab_pembanding	= $custom_data["tab_pembanding"];

				if(($key = array_search($id, $tab_pembanding)) !== false)
				{
					unset($tab_pembanding[$key]);
				}


				foreach ($custom_data as $key => $data)
				{
					if ($key == "tab_pembanding")
					{
						$new_data["tab_pembanding"]	= $tab_pembanding;
					}
					else
					{
						$new_data[$key]	= $data;
					}
				}

				$data	= array("custom_data" => serialize($new_data));

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
		}

		echo "success";
	}
	function tambah_ruangan()
	{
		$id_lokasi	= $_POST["id_lokasi"];
		$type		= $_POST["type"];
		$bangunan	= str_replace("_", " ", $_POST["bangunan"]);
		$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();

		if ($type == "tambah")
		{
			$new_data		= array();
			$custom_data	= unserialize($lokasi->custom_data);

			$tab_bangunan 	= $custom_data["tab_bangunan"];

			foreach($custom_data as $key => $data)
			{
				if($key == "tab_bangunan")
				{
					$new_data_bangunan = array();

					foreach($data as $key_bangunan => $data_bangunan)
					{
						if ($key_bangunan == $bangunan)
						{
							$array_lantai	= $data_bangunan["lantai"];
							$array_ruangan	= $data_bangunan["ruangan"];

							$count_ruangan	= count($array_ruangan);


							if ($count_ruangan == 9)
							{
								echo "Maksimal ruangan adalah 9";
								die();
							}
							else
							{
								array_push($array_ruangan, "Ruang ".($count_ruangan + 1));

								$new_data_bangunan[$key_bangunan] = array(
									"lantai"	=> $array_lantai,
									"ruangan"	=> $array_ruangan
								);
							}


						}
						else
						{
							$new_data_bangunan[$key_bangunan] = $data_bangunan;
						}

					}

					$new_data["tab_bangunan"] = $new_data_bangunan;

				}
				else
				{
					$new_data[$key] = $data;
				}
			}

			$data = array(
				"custom_data"=> serialize($new_data)
			);

			$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);

		}
		else if ($type == "ubah")
		{
			$id_ruangan		= $_POST["id_ruangan"];
			$nama_ruangan	= $_POST["nama_ruangan"];

			$new_data		= array();
			$custom_data	= unserialize($lokasi->custom_data);

			$tab_bangunan 	= $custom_data["tab_bangunan"];

			foreach($custom_data as $key => $data)
			{
				if($key == "tab_bangunan")
				{
					$new_data_bangunan = array();

					foreach($data as $key_bangunan => $data_bangunan)
					{
						if ($key_bangunan == $bangunan)
						{
							$array_lantai	= $data_bangunan["lantai"];
							$array_ruangan	= $data_bangunan["ruangan"];
							$new_ruangan	= array();

							$i = 1;
							foreach ($array_ruangan as $item_ruangan)
							{
								if ($id_ruangan == $i)
								{
									array_push($new_ruangan, $nama_ruangan);
								}
								else
								{
									array_push($new_ruangan, $item_ruangan);
								}

								$i++;
							}

							$new_data_bangunan[$key_bangunan] = array(
								"lantai"	=> $array_lantai,
								"ruangan"	=> $new_ruangan
							);
						}
						else
						{
							$new_data_bangunan[$key_bangunan] = $data_bangunan;
						}

					}

					$new_data["tab_bangunan"] = $new_data_bangunan;

				}
				else
				{
					$new_data[$key] = $data;
				}
			}

			$data = array(
				"custom_data"=> serialize($new_data)
			);

			$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);

		}
		else if ($type == "delete")
		{
			$id 	= $_POST["id"];

			$new_data		= array();
			$custom_data	= unserialize($lokasi->custom_data);

			/*if (array_key_exists("data_legalitas", $custom_data))*/

			if (!($custom_data) || !array_key_exists("tab_pembanding", $custom_data))
			{
				$data	= array(
					"custom_data" => serialize(array(
						"tab_pembanding"	=> array(1)
					))
				);

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
			else
			{
				$tab_pembanding	= $custom_data["tab_pembanding"];

				if(($key = array_search($id, $tab_pembanding)) !== false)
				{
					unset($tab_pembanding[$key]);
				}


				foreach ($custom_data as $key => $data)
				{
					if ($key == "tab_pembanding")
					{
						$new_data["tab_pembanding"]	= $tab_pembanding;
					}
					else
					{
						$new_data[$key]	= $data;
					}
				}

				$data	= array("custom_data" => serialize($new_data));

				$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), $data);
			}
		}

		echo "success";
	}
	function get_info_bangunan(){
		$data		= $this->global_model->get_data("mst_reference", 1, array("tipe"), array("TIPE BANGUNAN MAPPI"));
		$str = "";
		$str  = $str ."<option value=''>Select</option>";
		foreach($data->result() as $item){
			//print_r($item);
			$str  = $str ."<option value='". $item->data1. "'>". $item->data1 ."</option>";
		}
		echo $str;
	}
	function get_klasifikasi_bangunan(){
		$data		= $this->global_model->get_data("mst_reference", 1, array("tipe"), array("UMUR_EKONOMIS_BANGUNAN"));
		$str = "";
		$str  = $str ."<option value=''>Select</option>";
		foreach($data->result() as $item){
			//print_r($item);
			$str  = $str ."<option value='". $item->data2. "'>". $item->data1 ."</option>";
		}
		echo $str;
	}
	function get_kelas_bangunan(){
		$id	= $_POST["id"];
		$data		= $this->global_model->get_list("mst_kelas_bangunan", "tipe='$id'", "tahun_ekonomis", "asc");
		$str = "";
		$str  = $str ."<option value=''>Select</option>";
		foreach($data as $item){
			//print_r($item);
			$str  = $str ."<option value='". $item->tahun_ekonomis. "'>". $item->kelas_bangunan ."</option>";
		}
		echo $str;
	}
	function get_koefisien_lantai(){
		$tipe	= $_POST["tipe"];
		$jml	= $_POST["jml"];
		$obj = $this->global_model->get_by_query("SELECT * FROM mst_koefisien_lantai WHERE bangunan='". $tipe ."' AND jml_lantai='". $jml ."'");
		//echo $id_lokasi;
		$koefisien = 1;
		if ($obj->num_rows() == 1)
		{
			$koefisien	= $obj->row()->koefisien;
		}
		echo $koefisien;
	}
	function get_biaya_langsung() {
		$this->load->library("kertaskerjalib");
		$id	= $_POST["id"];
		$role = $_POST["role"];
		$id_lokasi	= $_POST["id_lokasi"];
		$kode_tipe_bangunan	= $_POST["kode_tipe_bangunan"];
		$id_kertas_kerja = $this->input->get("id_kertas_kerja");
		$tab_role	= explode("_", $role);
		//$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();
		
		$this->db->select('ML.*, MP.nama AS nama_provinsi, MK.nama AS nama_kota')
				 ->from('mst_lokasi ML')
				 ->join('mst_provinsi MP', 'ML.id_provinsi = MP.id', 'left')
				 ->join('mst_kota MK', 'ML.id_kota = MK.id', 'left')
				 ->where('ML.id', $id_lokasi);
		$query_lokasi = $this->db->get();//$this->global_model->get_data("mst_lokasi", 1, array("id"), array($id_lokasi));
		//echo $this->db->last_query();
		$lokasi = false;
		if ( is_object($query_lokasi) ) {
			$row_l = $query_lokasi->row();
			if ( is_object($row_l))
				$lokasi = $row_l;
		}
		if ( !$lokasi ) {
			return false;
		}
		$id_kota	= $lokasi->id_kota;

		$ikk = 1;
		if ($id_kota == 3171 || $id_kota == 3172 || $id_kota == 3173 || $id_kota == 3174 || $id_kota == 3175)
		{
			$ikk	= 1;
		}
		else
		{
			$ikk	= $this->global_model->get_data("kotakab_btb_2018", 1, array("ID_KOTAKAB"), array($id_kota), "ID_KOTAKAB")->row()->INDEKS;
			$ikk	= ($ikk);
		}

		// echo $ikk;

	    $list_biaya	= $this->global_model->get_by_query("SELECT * FROM mst_reference WHERE data1 = '$id' AND data3<>'' AND tipe<>'TIPE BANGUNAN MAPPI'");
		$list_field = $this->global_model->get_by_query("SELECT * FROM mst_field_objek WHERE id_jenis_objek = 2 AND nama LIKE '%bangunan%' ");

		$i	= 1;
		foreach ($list_field->result() as $item_field)
		{
			if ($i == 157)
			{
				$id_lantai	= 1;
				foreach ($list_biaya as $item_lantai)
				{
					$unix_name	= $role."__".$id_lantai." ".$role;
					$textbox[$role][$i][$id_lantai]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $unix_name);

					$id_lantai++;
				}
				$unix_name	= $role."__".$id_lantai." ".$role;
				$textbox[$role][$i][$id_lantai]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $unix_name);
			}
			$i = $i+1;
		}
		
		$obj = $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 912 AND keterangan='". $role ."'");

		$tipe_bangunan = "";
		if ($obj->num_rows() == 1) {
			$tipe_bangunan	= $obj->row()->jawab;
		}
		$obj = $this->global_model->get_by_query("SELECT * FROM mst_reference where data1='". $tipe_bangunan ."' AND tipe='TIPE BANGUNAN MAPPI'");
		$jml_lantai_standard = "";
		if ($obj->num_rows() == 1) {
			$jml_lantai_standard	= $obj->row()->data3;
		}

		$obj = $this->global_model->get_by_query("SELECT * FROM txn_bangunan WHERE id_kertas_kerja = ".$id_kertas_kerja." AND bangunan_role='". $role ."'");
		$jml_lantai_dinilai = "";

		if ($obj->num_rows() > 0) {
			$jml_lantai_dinilai	= $obj->row()->jumlah_lantai_btb;
		}
		$obj = $this->global_model->get_by_query("SELECT * FROM mst_koefisien_lantai WHERE bangunan='". $id ."' AND jml_lantai='". $jml_lantai_dinilai ."'");
		$koefisien = 1;
		if ($obj->num_rows() > 0 ) {
			$koefisien	= $obj->row()->koefisien;
		}

		$content = "";
		$content	.= "
			<div class='col-lg-12' style='overflow-x: scroll;'>
			<table class='table table_border_2 table_biaya_langsung_". $tab_role[1] ."' cellpadding='0' cellspacing='0'>
				<thead>
					<tr>
						<input type='hidden' id='hdnKoefisien' value='". $koefisien ."'>
						<th colspan='5' style='text-align: center; background-color: #336600; color: #FFF;'><span>BTB SPESIFIKASI STANDAR MAPPI</span></th>
						<th colspan='3' style='background: #4b89b7; color: white;'><span>HASIL INSPEKSI & PENYESUAIAN MATERIAL YANG BERBEDA</span></th>
						<th rowspan='6' style='background: #4b89b7; color: white;'>HASIL<br>PENYESUAIAN<br>MATERIAL<br>PER-ELEMEN<br>BANGUNAN<br>(Rp/m²)</th>
					</tr>
					<tr>
						<th colspan='9' style='text-align: center; background-color: #dbf3c4;'><span>". $id."</span></th>
					</tr>
					<tr>
						<th width='35%' colspan='3' style='text-align: center; background-color: #336600; color: #FFF;'>". strtoupper($lokasi->nama_provinsi) ."</th>
						<th width='5%' rowspan='4' style='text-align: center; background-color: #336600; color: #FFF;'>BOBOT<br>ELEMENT<br>BANGUNAN<br>(%)</th>
						<th width='5%' rowspan='4' style='text-align: center; background-color: #336600; color: #FFF;'>PERSENTASE<br>TERPASANG<br>(%)</th>
						<th width='45%' colspan='3' style='text-align: center; background-color: #dadada;'>JUMLAH LANTAI BANGUNAN DINILAI - <div id='jumlah_lantai_dinilai'></div> LANTAI</th>
					</tr>
					<tr>
						<th width='35%' colspan='3' style='text-align: center; background-color: #336600; color: #FFF;'>". strtoupper($lokasi->nama_kota) ."</th>
						<th rowspan='3' style='text-align: center; background-color: #dadada'>NAMA MATERIAL YANG<br>BERBEDA</th>
						<th rowspan='3' style='text-align: center; background-color: #dadada;'>VOLUME</th>
						<th rowspan='3' style='text-align: center; background-color: #dadada;'>HARGA<br/>SATUAN / M<sup>2</sup><br/>(BUT MAPPI)</th>
						<!--th style='text-align: center; background-color: #dadada;' id='index_koefisien_lantai'>".$koefisien."</th-->
					</tr>
					<tr>
						<th rowspan='2' style='text-align: center; background-color: #336600; color: #FFF;'>ELEMEN<br>COMPONENT<br>BANGUNAN</th>
						<th colspan='2' style='text-align: center; background-color: #dde626;'>JUMLAH LANTAI - <div id='jumlah_lantai_standard'>". $jml_lantai_standard ."</div> LANTAI</th>
						<!--th rowspan='2' style='text-align: center; background-color: #dadada;'>INDEX<br/>LANTAI<br/>MAPPI</th-->
					</tr>
					<tr>
						<th style='text-align: center; background-color: #336600; color: #FFF;'>NAMA MATERIAL</th>
						<th style='text-align: center; background-color: #336600; color: #FFF;'>HARGA<br>SATUAN (Rp/M2)</th>
					</tr>
					<tr>
						<th colspan='10' class='bg-info text-center'>A. BIAYA LANGSUNG</th>
					</tr>
				</thead>
				<tbody>";



				$total_a = 0;
				foreach($list_biaya->result() as $item)
				{	
					$data3 = ($item->data3)*$ikk;
					$total_a = $total_a + $data3;
				}


				$i = 0;
				$id_lantai = 1;

				foreach($list_biaya->result() as $item) {
					//Break
					$obj_vol = $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 944 AND keterangan='". $role ."_". $id_lantai ."'");

					$volume_b = 0;
					if ($obj_vol->num_rows() == 1)
					{
						$volume_b	= $obj_vol->row()->jawab;
					}
					$harga_a = 0;
					$harga_a = ($item->data3)*$ikk;
					$bobot_a = $harga_a / $total_a * 100;
					$volume_a = empty($harga_a) ? 0 : (empty($volume_b) ? 100 : (100-$volume_b));
					$obj_lm = $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 941 AND keterangan='". $role ."_". $id_lantai ."'");

					$val_but = "";
					if ($obj_lm->num_rows() == 1) {
						$val_but	= $obj_lm->row()->jawab;
					}
					$index_lantai_mappi = 0;
					if ( empty($val_but) ) {
						$index_lantai_mappi = $harga_a*$koefisien;
					} else {
						$index_lantai_mappi = $val_but*$koefisien;
						
					}

					$harga_b = $val_but;
					//$harga_penyesuaian = ($harga_a*($volume_a/100))+($index_lantai_mappi*($volume_b/100));
					$harga_penyesuaian = 0;
					if ( empty($val_but) ) {
						$harga_penyesuaian = $harga_a*$koefisien;
					} else {
						if ( empty($volume_b) ) {
							$harga_penyesuaian = $harga_a*$koefisien;
						} else if ( $volume_b == 100 ) {
							$harga_penyesuaian = $val_but*$koefisien;
						} else {
							$harga_penyesuaian = (($harga_a*($volume_a/100))+($val_but*($volume_b/100)))*$koefisien;
						}
						
					}

					/*if ($i==0 || $i==1) {
						$textbox_bangunan_162 = "penyesuaian index lantai";
						if ($textbox_bangunan_162=="penyesuaian index lantai") {
							$harga_b = ($koefisien)*($harga_a);
						} else {
							//harga_b
						}
					} else {
						//harga_b
					}*/
					
					$list_element	= $this->global_model->get_by_query("SELECT * FROM mst_but WHERE element = '". $item->tipe."' AND bangunan='$id'");

					$content	.= "<tr>
							<td><span>". $item->tipe ."</span></td>
							<td><span>". $item->data2 ."</span>
							<input type='hidden' id='a_harga_1' value='". trim($harga_a) ."'>
							</td>";

					$content .= "
							<td><input type='text' id='textbox_bangunan_157' class='form-control table_input input_938_Bangunan_1 text-right readonly' name='update[bangunan_157]' data-id-field='938' data-keterangan='". $role ."_". $id_lantai ."' value='". number_format(round($harga_a),0) ."' readonly></td>
							<td><input type='text' id='textbox_bangunan_158' class='form-control table_input input_939_Bangunan_1 text-right readonly' name='update[bangunan_158]' data-id-field='939' data-keterangan='". $role ."_". $id_lantai ."' value='". round($bobot_a,1) ."' readonly></td>
							<td><input type='text' id='textbox_bangunan_159' class='form-control table_input input_940_Bangunan_1 text-right readonly' name='update[bangunan_159]' data-id-field='940' data-keterangan='". $role ."_". $id_lantai ."' value='".$volume_a."' readonly></td>
							<td>";

					$content .= "<select  id='textbox_bangunan_160' class='form-control table_input input_941_Bangunan_1' name='update[bangunan_160]' data-id-field='941' data-keterangan='". $role ."_". $id_lantai ."'><option value=''>Pilih</option>";
					
					foreach($list_element->result() as $element) {
							$str = "";
							if ($val_but==$element->but){
								$str = "selected";
							}
							$content .= "<option value='". $element->but ."' ". $str .">". $element->lov ."</option>";
					}
					$content .= "</select>
					</td>";
					$content .= "<td><input type='text' id='textbox_bangunan_163' class='form-control table_input input_944_Bangunan_1' name='update[bangunan_163]' data-id-field='944' data-keterangan='". $role ."_". $id_lantai ."' value='". $volume_b ."' ></td>";
					$content .= "<td><input type='text' id='textbox_bangunan_164' class='form-control table_input input_945_Bangunan_1' name='update[bangunan_164]' data-id-field='945' data-keterangan='". $role ."_". $id_lantai ."' value='". number_format(round($val_but),0) ."' ></td>";
					
					//$content .= "<td><input type='text' id='index_lantai_mappi' class='form-control table_input' name='index_lantai_mappi' value='". number_format(round($index_lantai_mappi),0) ."' ></td>";
					$content .= "<td><input type='text' id='textbox_bangunan_165' class='form-control table_input input_946_Bangunan_1 text-right readonly' name='update[bangunan_165]' data-id-field='946' data-keterangan='". $role ."_". $id_lantai ."' value='". trim($harga_penyesuaian) ."' ></td>
					</tr>";
					
					$id_lantai = $id_lantai + 1;
					$i = $i + 1;
				}
				
				
			  $content	.= "
			  <input type='hidden' id='biaya_jumlah' value='". $i ."'>
			  </tbody>
			  <tfoot>
				<tr>
					<th colspan='2'><span>TOTAL BIAYA LANGSUNG  ( A )</span></th>
					<th>
						<input type='text' id='textbox_bangunan_172' class='form-control table_input input_953_Bangunan_1 text-right' name='update[bangunan_172]' data-id-field='953' data-keterangan='". $role  ."'  value='". number_format($total_a,0) ."'>
						<input type='hidden' id='textbox_bangunan_175' class='form-control table_input input_956_Bangunan_1 text-right' name='update[bangunan_175]' data-id-field='956' data-keterangan='". $role  ."'  value='". $total_a ."'>

					</th>
					<th>
						<input type='text' id='textbox_bangunan_173' class='form-control table_input input_954_Bangunan_1 text-right' name='update[bangunan_173]' data-id-field='954' data-keterangan='". $role  ."' value='100'  >
					</th>
					<th></th>
					<th colspan='1'><span>LANTAI MEZZANINE</span></th>
					<th>";
						$mezzanine = $this->global_model->get_by_query("SELECT * FROM mst_reference WHERE tipe = 'LANTAI MEZZANINE'");
 
						$obj = $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 947 ");
							//echo $id_lokasi;
							$val = "";
							if ($obj->num_rows() == 1)
							{
								$val	= $obj->row()->jawab;
							}
						$content .= "<select  id='textbox_bangunan_166' class='form-control table_input input_947_Bangunan_1' name='update[bangunan_166]' data-id-field='947' data-keterangan='". $role ."'><option value=''>Pilih</option>";
							foreach($mezzanine->result() as $item){
								   $str = "";
									if ($val==$item->data2){
										$str = "selected";
									}
									$content .= "<option value='". $item->data2 ."' ". $str .">". $item->data1 ."</option>";
							}
						
						$content .= "</select>				 
					</th>
					<th>
						<input type='text' id='textbox_bangunan_168' class='form-control table_input input_949_Bangunan_1 text-right' name='update[bangunan_168]' data-id-field='949' data-keterangan='". $role  ."'  >
					</th>
					<th>
						<input type='text' id='textbox_bangunan_169' class='form-control table_input input_950_Bangunan_1 text-right readonly' name='update[bangunan_169]' data-id-field='950' data-keterangan='". $role  ."' readonly  >
					</th>
				</tr>
				<tr>
					<th colspan='2'></th>
					<th></th>
					<th></th>
					<th></th>
					<th colspan='1'><span>BGN. KANTOR / LAINNYA</span></th>
					<th>";
					$bangunan_lainya = $this->global_model->get_by_query("SELECT * FROM mst_reference WHERE tipe = 'BGN. KANTOR / LAINNYA'");
 
					$obj = $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 948 ");
					//echo $id_lokasi;
					$val = "";
					if ($obj->num_rows() == 1) {
						$val	= $obj->row()->jawab;
					}
					$content .= "<select  id='textbox_bangunan_167' class='form-control table_input input_948_Bangunan_1' name='update[bangunan_167]' data-id-field='948' data-keterangan='". $role ."'><option value=''>Pilih</option>";

					foreach($bangunan_lainya->result() as $item) {
						$str = "";
						if ($val==$item->data2) {
							$str = "selected";
						}
						$content .= "<option value='". $item->data2 ."' ". $str .">". $item->data1 ."</option>";
					}

					$content .= "</select>
					</th>
					<th >
						<input type='text' id='textbox_bangunan_170' class='form-control table_input input_951_Bangunan_1 text-right' name='update[bangunan_170]' data-id-field='952' data-keterangan='". $role  ."'  >
					</th>
					<th>
						<input type='text' id='textbox_bangunan_171' class='form-control table_input input_952_Bangunan_1 text-right' name='update[bangunan_171]' data-id-field='952' data-keterangan='". $role  ."'  >
			
					</th>
				</tr>
				<tr>
					<th colspan='2'></th>
					<th></th>
					<th></th>
					<th></th>
					<th colspan='3'><span>TOTAL BIAYA LANSUNG (A)</span></th>
					<th>
						<input type='text' id='textbox_bangunan_174' class='form-control table_input input_955_Bangunan_1 text-right' name='update[bangunan_175]' data-id-field='955' data-keterangan='". $role  ."'  value='". number_format($total_a,0) ."'>
					</th>
				</tr>
			  </tfoot>
			</table>
		</div>	
			";
		echo $content;	
	}
	function load_bangunan()
	{
		$this->load->library("kertaskerjalib");
		$id_lokasi	= $_POST["id_lokasi"];
		$role		= $_POST["role"];

		// $id_lokasi = 71;
		// $role = 'Bangunan_1';


		$tab_role	= explode("_", $role);
		$lokasi		= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();
		$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($lokasi->id_pekerjaan))->row();
		
		$content	= "";

		$custom_data	= unserialize($lokasi->custom_data);
		$tab_bangunan	= $custom_data["tab_bangunan"];
		$bangunan		= $tab_bangunan[str_replace("_", " ", $role)];
		$list_lantai	= $bangunan["lantai"];
		$list_ruangan	= $bangunan["ruangan"];

		// $lokasi->id_jenis_objek = 7;

		if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2){
			$list_field			= $this->global_model->get_by_query("SELECT * FROM mst_field_objek WHERE id_jenis_objek = 2 AND nama LIKE '%bangunan%' ");
		}else if ($lokasi->id_jenis_objek == 6) {
			$list_field			= $this->global_model->get_by_query("SELECT * FROM mst_field_objek_apartemen WHERE id_jenis_objek = 6 AND nama LIKE '%bangunan%' ");
		}else if ($lokasi->id_jenis_objek == 7) {
			$list_field			= $this->global_model->get_by_query("SELECT * FROM mst_field_objek_office_space WHERE id_jenis_objek = 7 AND nama LIKE '%bangunan%' ");
		}
		else if ($lokasi->id_jenis_objek==5)
		{
		$list_field			= $this->global_model->get_by_query("SELECT * FROM mst_field_objek_ruko WHERE id_jenis_objek = 5 AND nama LIKE '%bangunan%' ");
		}
		else if ($lokasi->id_jenis_objek==3)
		{
		$list_field			= $this->global_model->get_by_query("SELECT * FROM mst_field_objek_kios WHERE id_jenis_objek = 3 AND nama LIKE '%bangunan%' ");
		}


		$i	= 1;
		foreach ($list_field->result() as $item_field)
		{
			if ($i == 3)
			{
				//var_dump($list_lantai);
				$id_lantai	= 1;
				foreach ($list_lantai as $item_lantai)
				{
					$id_ruangan	= 1;
					foreach ($list_ruangan as $item_ruangan)
					{
						$unix_name	= $role."__".$id_lantai."__".$id_ruangan." ".$role;
						$textbox[$role][$i][$id_lantai][$id_ruangan]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $unix_name);
						$id_ruangan++;
					}
					$unix_name	= $role."__".$id_lantai."__".$id_ruangan;
					$textbox[$role][$i][$id_lantai][$id_ruangan]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $unix_name);

					$id_lantai++;
				}
				$unix_name	= $role."__".$id_lantai."__".$id_ruangan;
				$textbox[$role][$i][$id_lantai][$id_ruangan]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $unix_name);

			}
			else if ($i == 113 || $i == 114 || $i == 127 || $i == 128 )
			{
				$id_lantai	= 1;
				foreach ($list_lantai as $item_lantai)
				{
					$unix_name	= $role."__".$id_lantai." ".$role;
					$textbox[$role][$i][$id_lantai]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $unix_name);

					$id_lantai++;
				}
				$unix_name	= $role."__".$id_lantai." ".$role;
				$textbox[$role][$i][$id_lantai]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $unix_name);
			}
			else
			{
				$textbox[$role][$i]	= $this->kertaskerjalib->get_textbox($lokasi, $item_field, $role);
			}

			$i++;
		}

		$tanggal_inspeksi	= $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 9  ");

		if ($tanggal_inspeksi->num_rows() == 1)
		{
			$tanggal_inspeksi	= $tanggal_inspeksi->row()->jawab;
		}
		else
		{
			$tanggal_inspeksi	= date("Y-m-d");
		}

		$content	.= "
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<h3 class='panel-title'>O B Y E K&nbsp;&nbsp;&nbsp;P E N I L A I A N</h3>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1; border-top: 0px;'>
					Tanggal Inspeksi : ".date("d-m-Y", strtotime($tanggal_inspeksi))."<br>
					<b>".$pekerjaan->nama_klien."</b><br>
					Alamat Objek : <br>
					".$lokasi->alamat." ".(!empty($lokasi->gang) ? "Gang ".$lokasi->gang : "")." No. ".$lokasi->nomor.", RT. ".$lokasi->rt." RW. ".$lokasi->rw." ".$lokasi->nama_desa." ".(!empty($lokasi->dh_desa) ? "(d/h ".$lokasi->dh_desa.")" : "")." ".$lokasi->nama_kecamatan." ".(!empty($lokasi->dh_kecamatan) ? "(d/h ".$lokasi->dh_kecamatan.")" : "")." ".$lokasi->nama_kota." ".(!empty($lokasi->dh_kota) ? "(d/h ".$lokasi->dh_kota.")" : "").", ".$lokasi->nama_provinsi ." ".(!empty($lokasi->dh_provinsi) ? "(d/h ".$lokasi->dh_provinsi.")" : "")."

				</div>";

		if($lokasi->id_jenis_objek == 1 ||  $lokasi->id_jenis_objek == 2){
			$content .="
				<div class='panel-body' style='border: 1px solid #e1e1e1; border-top: 0px;'>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Tipe Bangunan</span></td>
								<td>".$textbox[$role][1]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Penggunaan saat ini  :</span></td>
								<td>".$textbox[$role][2]."</td>
							</tr>
						</table>
					</div>
				</div>

				<div class='panel-heading'>
					<h3 class='panel-title'>LUAS PENGUKURAN FISIK BANGUNAN <span class='tipe_bangunan'></span></h3>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1; border-top: 0px;'>
			";
		}else if($lokasi->id_jenis_objek == 6){
			$content .= "
				<div class='panel-heading' style='margin-top:2.5%;'>
					<h3 class='panel-title'>P E N G G U N A A N&nbsp;&nbsp;&nbsp;R U A N G&nbsp;&nbsp;&nbsp;A P A R T E M E N</h3>
				</div>
				<table id='table_data_legalitas_1' class='table table_border_2' width='100%' cellpadding='0' cellspacing='0'>
					<thead>
						<tr>
							<th rowspan='2' colspan='4'>Luas Unit Apartemen</th>
							<th rowspan='2'>Jumlah</th>
						</tr>
					</thead>
					<tbody id='tbody_data_legalitas_1'>
						<tr>
							<td align='center' colspan='4'>".$textbox[$role][189]."</td>
							<td><span>".$textbox[$role][190]."</span></td>
						</tr>
					<tfoot>
						<tr>
							<td align='center' colspan='4'><span>TOTAL LUAS RUANG APARTEMEN</span></td>
							<td>".$textbox[$role][191]."</td>
						</tr>
					</tfoot>
				</table>
				<div class='panel-body' style='border: 1px solid #e1e1e1; border-top: 0px;'>
			";
		}elseif($lokasi->id_jenis_objek == 7){
			$content	= "			
				<div class='panel-heading'>
					<h3 class='panel-title'>LUAS PENGUKURAN FISIK BANGUNAN <span class='tipe_bangunan'></span></h3>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1; border-top: 0px;'>";
			$content	.= "<table class='table_border_2 table_bangunan ".$role."' cellpadding='0' cellspacing='0'>";
			$content	.= "<thead>";
			$content	.= "<tr>";
			$content	.= "<th>Ruangan</th>";

			$id_ruangan	= 1;
			foreach ($list_ruangan as $item_ruangan)
			{
				$content	.= "<th><a style='cursor: pointer; color: #eee' class='change-ruang' data-id='".$id_ruangan."' data-bangunan='".$role."' >".$item_ruangan."</a></th>";

				$id_ruangan++;
			}
			$content	.= "<th>Jumlah Luas<br>&nbsp;</th>";

			$content	.= "</tr>";
			$content	.= "</thead>";
			$content	.= "<tbody>";

			$id_lantai	= 1;
			foreach ($list_lantai as $item_lantai)
			{
				$content	.= "<tr>";
				$content	.= "<td><span>".$item_lantai."</span></td>";

				$id_ruangan	= 1;
				foreach ($list_ruangan as $item_ruangan)
				{
					$content	.= "<td>".$textbox[$role][3][$id_lantai][$id_ruangan]."</td>";

					$id_ruangan++;
				}
				$content	.= "<td>".$textbox[$role][3][$id_lantai][$id_ruangan]."</td>";

				$content	.= "</tr>";

				$id_lantai++;

			}
			$content	.= "</tbody>";

				// Footer
				$content	.= "<thead>";
				$content	.= "<tr>";
				$content	.= "<th colspan='".($id_ruangan)."'>TOTAL LUAS PENGUKURAN FISIK BANGUNAN UTAMA <span class='tipe_bangunan'></span></th>";
				$content	.= "<th>".$textbox[$role][5]."</th>";

				$content	.= "</tr>";
				
				$content	.= "</thead>";


				$content	.= "</table>";

				$content .= "
					<br><br>
					<button type='button' class='btn btn-primary btn-sm btn-tambah-lantai' data-bangunan='".$role."'>Tambah Lantai</button>
					<button type='button' class='btn btn-primary btn-sm btn-tambah-ruangan' data-bangunan='".$role."'>Tambah Ruangan</button>
					<br>
					<br>";
		}

		$table_pengukuran	= "";
		$table_pengukuran	.= "<table class='table table_border_2 table_bangunan ".$role."' cellpadding='0' cellspacing='0'>";
		$table_pengukuran	.= "<thead>";
		$table_pengukuran	.= "<tr>";
		$table_pengukuran	.= "<th>Ruangan</th>";

		$id_ruangan	= 1;
		foreach ($list_ruangan as $item_ruangan)
		{
			$table_pengukuran	.= "<th><a style='cursor: pointer; color: #eee' class='change-ruang' data-id='".$id_ruangan."' data-bangunan='".$role."' >".$item_ruangan."</a></th>";

			$id_ruangan++;
		}
		$table_pengukuran	.= "<th>Jumlah Luas<br>&nbsp;</th>";

		$table_pengukuran	.= "</tr>";
		$table_pengukuran	.= "</thead>";
		$table_pengukuran	.= "<tbody>";

		$table_teras		= "";
		$table_teras	.= "<table class='table table_border_2 teras_".$tab_role[1]."' cellpadding='0' cellspacing='0' style='text-align: center'>";
		$table_teras	.= "<thead>";
		$table_teras	.= "<tr>";
		$table_teras	.= "<th>Teras<br>Balkon(m<sup>2</sup>)</th>";
		//$table_teras	.= "<th>Balkon (m<sup>2</sup>)</th>";
		$table_teras	.= "</tr>";
		$table_teras	.= "</thead>";
		
		$table_gudang		= "";
		$table_gudang	.= "<table class='table table_border_2 gudang_".$tab_role[1]."' cellpadding='0' cellspacing='0' style='text-align: center'>";
		$table_gudang	.= "<thead>";
		$table_gudang	.= "<tr>";
		$table_gudang	.= "<th>Lantai<br>Mezzanine(m²)</th>";
		$table_gudang	.= "<th>Bgn. Kantor<br>Lainnya (m²)</th>";
		$table_gudang	.= "</tr>";
		$table_gudang	.= "</thead>";
		

		$id_lantai	= 1;
		foreach ($list_lantai as $item_lantai)
		{
			$table_pengukuran	.= "<tr>";
			$table_pengukuran	.= "<td><span>".$item_lantai."</span></td>";

			$id_ruangan	= 1;
			foreach ($list_ruangan as $item_ruangan)
			{
				$table_pengukuran	.= "<td>".$textbox[$role][3][$id_lantai][$id_ruangan]."</td>";

				$id_ruangan++;
			}
			$table_pengukuran	.= "<td>".$textbox[$role][3][$id_lantai][$id_ruangan]."</td>";

			$table_pengukuran	.= "</tr>";

			// Table Teras
			$table_teras	.= "<tr>";
			$table_teras	.= "<td align='center'>".$textbox[$role][113][$id_lantai]."</td>";
			//$table_teras	.= "<td align='center'>".$textbox[$role][114][$id_lantai]."</td>";
			$table_teras	.= "</tr>";
			
			// Table Gudang
			$table_gudang	.= "<tr>";
			$table_gudang	.= "<td align='center'>".$textbox[$role][127][$id_lantai]."</td>";
			$table_gudang	.= "<td align='center'>".$textbox[$role][128][$id_lantai]."</td>";
			$table_gudang	.= "</tr>";

			$id_lantai++;

		}



		$table_pengukuran	.= "</tbody>";


		// Footer
		$table_pengukuran	.= "<thead>";
		$table_pengukuran	.= "<tr>";
		$table_pengukuran	.= "<th colspan='".($id_ruangan)."'>TOTAL LUAS PENGUKURAN FISIK BANGUNAN UTAMA <span class='tipe_bangunan'></span></th>";
		$table_pengukuran	.= "<th>".$textbox[$role][5]."</th>";

		$table_pengukuran	.= "</tr>";
		
		if($lokasi->id_jenis_objek == 1 ||  $lokasi->id_jenis_objek == 2){
			$table_pengukuran	.= "<tr>";
			$table_pengukuran	.= "<th colspan='".($id_ruangan)."'>Keterangan dari BTB MAPPI =====> LUAS BANGUNAN = Luas Bangunan Utama + (½ x Luas Teras)</th>";
			$table_pengukuran	.= "<th>".$textbox[$role][5]."</th>";
			$table_pengukuran	.= "</tr>";
			
			$table_pengukuran	.= "<tr>";
			$table_pengukuran	.= "<th colspan='".($id_ruangan)."'>TOTAL LUAS BANGUNAN</th>";
			$table_pengukuran	.= "<th>".$textbox[$role][130]."</th>";
			$table_pengukuran	.= "</tr>";
		}
		
		$table_pengukuran	.= "</thead>";


		$table_pengukuran	.= "</table>";

		$table_teras	.= "<thead>";
		$table_teras	.= "<tr>";
		$table_teras	.= "<th>".$textbox[$role][113][$id_lantai]."</th>";
		//$table_teras	.= "<th>".$textbox[$role][114][$id_lantai]."</th>";
		$table_teras	.= "</tr>";
		
		if($lokasi->id_jenis_objek == 1 ||  $lokasi->id_jenis_objek == 2){
			$table_teras	.= "<tr>";
			$table_teras	.= "<th>".$textbox[$role][129] ."</th>";
			//$table_teras	.= "<th>".$textbox[$role][114][$id_lantai]."</th>";
			$table_teras	.= "</tr>";
		}

		$table_teras	.= "</thead>";
		$table_teras	.= "</table>";
		
		//Gudang
		$table_gudang	.= "<thead>";
		$table_gudang	.= "<tr>";
		$table_gudang	.= "<th>".$textbox[$role][127][$id_lantai]."</th>";
		$table_gudang	.= "<th>".$textbox[$role][128][$id_lantai]."</th>";
		$table_gudang	.= "</tr>";
		
		
		
		$table_gudang	.= "</thead>";
		$table_gudang	.= "</table>";
		
		if($lokasi->id_jenis_objek == 3 || $lokasi->id_jenis_objek == 5){
			$content .="
				<br>
				<div class='panel-heading'>
					<h3 class='panel-title'>LUAS PENGUKURAN FISIK BANGUNAN <span class='tipe_bangunan'></span></h3>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1; border-top: 0px;'>
					<div class='row'>
						
						<div class='col-lg-8' style='overflow-x: scroll;'>
							".$table_pengukuran."
						</div>
						<div class='col-lg-1'>
							".$table_teras."
						</div>
						

						</div>
						
					</div>
					<br><br>
					<button type='button' class='btn btn-primary btn-sm btn-tambah-lantai' data-bangunan='".$role."'>Tambah Lantai</button>
					<button type='button' class='btn btn-primary btn-sm btn-tambah-ruangan' data-bangunan='".$role."'>Tambah Ruangan</button>
					<br>
					<br>
				";
		}
		/*
		$content	.= "
					<div class='row'>
						<div class='col-lg-8' style='overflow-x: scroll;'>
							".$table_pengukuran."
						</div>
						<div class='col-lg-1'>
							".$table_teras."
						</div>
						<div class='col-lg-2'>
							".$table_gudang."
						</div>
					</div>
					<br><br>
					<button type='button' class='btn btn-primary btn-sm btn-tambah-lantai' data-bangunan='".$role."'>Tambah Lantai</button>
					<button type='button' class='btn btn-primary btn-sm btn-tambah-ruangan' data-bangunan='".$role."'>Tambah Ruangan</button>
				</div>
			</div>
		";*/
		$content	.= "
			</div>
				</div>";

		if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2)
		{
			$content	.= "
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>INFORMASI DINAS TATAKOTA <span class='div-provinsi' style=''></span></h4>
					<p style='font-weight: bold;'>Ijin Mendirikan Bangunan (IMB)</p>
					<div class='col-lg-4' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Nomor</span></td>
								<td>".$textbox[$role][6]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Tanggal</span></td>
								<td>".$textbox[$role][8]."</td>
							</tr>
						</table>
					</div>

					<div class='col-lg-4' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Jumlah Lantai</span></td>
								<td>".$textbox[$role][7]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Total Luas IMB (m<sup>2</sup>)</span></td>
								<td>".$textbox[$role][9]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-4' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Perbedaan Luas Fisik dengan <br>Luas IMB (m<sup>2</sup>)</span></td>
								<td>".$textbox[$role][10]."</td>
							</tr>
						</table>
					</div>
				</div>

				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<p style='font-weight: bold;'>Rencana Detail Tata Ruang (RDTR)</p>
					<div class='col-lg-3' style='padding: 0px; padding-right: 20px;'>
						<img src='".base_url()."asset/images/peruntukan_zoning.png' style='width: 100%'>
					</div>
					<div class='col-lg-9' style='padding: 0px; '>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>Peruntukan / Zoning</span></td>
								<td>".$textbox[$role][11]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Ketinggian Bangunan (KB)</span></td>
								<td>".$textbox[$role][12]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Tipe Massa Bangunan (TMB)</span></td>
								<td>".$textbox[$role][13]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Koefisien Dasar Bangunan (KDB)</span></td>
								<td>".$textbox[$role][14]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Koefisien Lantai Bangunan (KLB)</span></td>
								<td>".$textbox[$role][15]."</td>
							</tr>
						</table>
					</div>
				</div>

				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<p style='font-weight: bold;'>Pemotongan luas bangunan karena melanggar peraturan / ketentuan dan rencana tata ruang yang berlaku, adalah sbb :</p>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='20%'><span>Melanggar Ketinggian Bangunan</span></td>
								<td>".$textbox[$role][16]."</td>
							</tr>
							<tr>
								<td width='20%'><span>Pembangunan / pelebaran jalan</span></td>
								<td>".$textbox[$role][17]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Garis Sempadan Bangunan (GSB)</span></td>
								<td>".$textbox[$role][18]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Garis Sempadan Sungai (GSS)</span></td>
								<td>".$textbox[$role][19]."</td>
							</tr>
							<tr>
								<td width='15%'><span><b>TOTAL LUAS BANGUNAN YANG TERPOTONG</b></span></td>
								<td>".$textbox[$role][20]."</td>
							</tr>
						</table>
					</div>
				</div>

				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>KETERANGAN UMUM BANGUNAN</h4>
					<div class='col-lg-6' style='padding: 0px;'>
						<p style='font-weight: bold;'>&nbsp;</p>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='20%'><span>Arsitektur bangunan</span></td>
								<td>".$textbox[$role][21]."</td>
							</tr>
							<tr>
								<td width='20%'><span>Tahun dibangun</span></td>
								<td>".$textbox[$role][22]."</td>
							</tr>
							<tr>
								<td width='20%'><span>Tahun direnovasi</span></td>
								<td>".$textbox[$role][23]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<p style='font-weight: bold;'>Tinggi halaman, terhadap</p>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='20'><span>Lantai bangunan utama</span></td>
								<td>".$textbox[$role][24]."</td>
							</tr>
							<tr>
								<td width='20%'><span>Jalan di depan properti</span></td>
								<td>".$textbox[$role][25]."</td>
							</tr>
						</table>
					</div>
				</div>


				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>SPESIFIKASI ELEMEN BANGUNAN</h4>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>Pondasi</span></td>
								<td>".$textbox[$role][26]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Struktur</span></td>
								<td>".$textbox[$role][27]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Rangka Atap</span></td>
								<td>".$textbox[$role][28]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Penutup Atap</span></td>
								<td>".$textbox[$role][29]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Plafond</span></td>
								<td>".$textbox[$role][30]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Dinding</span></td>
								<td>".$textbox[$role][31]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='20'><span>Partisi Ruangan</span></td>
								<td>".$textbox[$role][32]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Kusen</span></td>
								<td>".$textbox[$role][33]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Pintu & Jendela</span></td>
								<td>".$textbox[$role][34]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Lantai</span></td>
								<td>".$textbox[$role][35]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Tangga</span></td>
								<td>".$textbox[$role][36]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Pagar Halaman</span></td>
								<td>".$textbox[$role][37]."</td>
							</tr>
						</table>
					</div>
				</div>


				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>FASILITAS / SARANA PELENGKAP KESELURUHAN PADA AREAL PROPERTI</h4>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>Saluran listrik PLN</span></td>
								<td colspan='2'>".$textbox[$role][38]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Sambungan telepon</span></td>
								<td colspan='2'>".$textbox[$role][39]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Jaringan air bersih</span></td>
								<td colspan='2'>".$textbox[$role][40]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Pendingin ruangan</span></td>
								<td>".$textbox[$role][41]."</td>
								<td>".$textbox[$role][42]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Pemanas air</span></td>
								<td>".$textbox[$role][43]."</td>
								<td>".$textbox[$role][44]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='20'><span>Penangkal petir</span></td>
								<td>".$textbox[$role][45]."</td>
								<td>".$textbox[$role][46]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Kolam renang</span></td>
								<td>".$textbox[$role][47]."</td>
								<td>".$textbox[$role][48]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Carport / area parkir</span></td>
								<td>".$textbox[$role][49]."</td>
								<td>".$textbox[$role][50]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Pemagaran halaman</span></td>
								<td colspan='2'>".$textbox[$role][51]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Keadaan halaman</span></td>
								<td colspan='2'>".$textbox[$role][52]."</td>
							</tr>
						</table>
					</div>
				</div>

				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>KESIMPULAN NILAI BANGUNAN  <span class='tipe_bangunan'></span></h4>
					<div class='col-lg-6' style='padding: 0px;'>
						<p style='font-weight: bold;'>INFORMASI NJOP BANGUNAN</p>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>NJOP Tanggal</span></td>
								<td>".$textbox[$role][53]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Bangunan ( / m<sup>2</sup> ) Rp.</span></td>
								<td>".$textbox[$role][54]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<p style='font-weight: bold;'>BERDASARKAN FISIK</p>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>NILAI PASAR</span></td>
								<td>".$textbox[$role][55]."</td>
							</tr>
							<tr>
								<td width='25%'><span>INDIKASI NILAI LIKUIDASI</span></td>
								<td>".$textbox[$role][56]."</td>
							</tr>
						</table>

						<p style='font-weight: bold; margin-top: 20px;'>BERDASARKAN PERATURAN TATA KOTA SETEMPAT</p>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>NILAI PASAR</span></td>
								<td>".$textbox[$role][57]."</td>
							</tr>
							<tr>
								<td width='25%'><span>INDIKASI NILAI LIKUIDASI</span></td>
								<td>".$textbox[$role][58]."</td>
							</tr>
						</table>
					</div>
				</div>
				";
		}
		elseif ($lokasi->id_jenis_objek==5) 
		{
			$content	.= "
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>INFORMASI DINAS TATAKOTA <span class='div-provinsi' style=''></span></h4>
					<p style='font-weight: bold;'>Ijin Mendirikan Bangunan (IMB)</p>
					<div class='col-lg-4' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Nomor</span></td>
								<td>".$textbox[$role][6]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Tanggal</span></td>
								<td>".$textbox[$role][8]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-4' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Jumlah Lantai</span></td>
								<td>".$textbox[$role][7]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Total Luas IMB (m<sup>2</sup>)</span></td>
								<td>".$textbox[$role][9]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-4' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Perbedaan Luas Fisik dengan <br>Luas IMB (m<sup>2</sup>)</span></td>
								<td>".$textbox[$role][10]."</td>
							</tr>
						</table>
					</div>
				</div>";

				$content .= "
					<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<p style='font-weight: bold;'>Pemotongan luas bangunan karena melanggar peraturan / ketentuan dan rencana tata ruang yang berlaku, adalah sbb :</p>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='20%'><span>Melanggar Ketinggian Bangunan</span></td>
								<td>".$textbox[$role][16]."</td>
							</tr>
							<tr>
								<td width='20%'><span>Pembangunan / pelebaran jalan</span></td>
								<td>".$textbox[$role][17]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Garis Sempadan Bangunan (GSB)</span></td>
								<td>".$textbox[$role][18]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Garis Sempadan Sungai (GSS)</span></td>
								<td>".$textbox[$role][19]."</td>
							</tr>
							<tr>
								<td width='15%'><span><b>TOTAL LUAS BANGUNAN YANG TERPOTONG</b></span></td>
								<td>".$textbox[$role][20]."</td>
							</tr>
						</table>
					</div>
				</div>

				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>KETERANGAN UMUM BANGUNAN</h4>
					<div class='col-lg-6' style='padding: 0px;'>
						<p style='font-weight: bold;'>&nbsp;</p>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='20%'><span>Arsitektur bangunan</span></td>
								<td colspan='3'>".$textbox[$role][21]."</td>
							</tr>
							<tr>
								<td width='20%'><span>Lebar depan / Frontage</span></td>
								<td>".$textbox[$role][129]."</td>
								<td width='10%'><span>& Pjg.</span></td>
								<td>".$textbox[$role][130]."</td>
							</tr>
							<tr>
								<td width='20%'><span>Tahun dibangun</span></td>
								<td colspan='3'>".$textbox[$role][22]."</td>
							</tr>
							<tr>
								<td width='20%'><span>Tahun direnovasi</span></td>
								<td colspan='3'>".$textbox[$role][23]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<p style='font-weight: bold;'>Tinggi halaman, terhadap</p>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='20'><span>Lantai bangunan utama</span></td>
								<td>".$textbox[$role][24]."</td>
							</tr>
							<tr>
								<td width='20%'><span>Lebar jalan di depan properti</span></td>
								<td>".$textbox[$role][25]."</td>
							</tr>
						</table>
					</div>
				</div>


				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>SPESIFIKASI ELEMEN BANGUNAN</h4>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>Pondasi</span></td>
								<td>".$textbox[$role][26]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Struktur</span></td>
								<td>".$textbox[$role][27]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Rangka Atap</span></td>
								<td>".$textbox[$role][28]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Penutup Atap</span></td>
								<td>".$textbox[$role][29]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Plafond</span></td>
								<td>".$textbox[$role][30]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Dinding</span></td>
								<td>".$textbox[$role][31]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='20'><span>Partisi Ruangan</span></td>
								<td>".$textbox[$role][32]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Kusen</span></td>
								<td>".$textbox[$role][33]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Pintu & Jendela</span></td>
								<td>".$textbox[$role][34]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Lantai</span></td>
								<td>".$textbox[$role][35]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Tangga</span></td>
								<td>".$textbox[$role][36]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Pagar Halaman</span></td>
								<td>".$textbox[$role][37]."</td>
							</tr>
						</table>
					</div>
				</div>";
				$content .="
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>FASILITAS / SARANA PELENGKAP KESELURUHAN PADA AREAL PROPERTI</h4>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>Saluran listrik PLN</span></td>
								<td colspan='2'>".$textbox[$role][38]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Sambungan telepon</span></td>
								<td colspan='2'>".$textbox[$role][39]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Jaringan air bersih</span></td>
								<td colspan='2'>".$textbox[$role][40]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Pendingin ruangan</span></td>
								<td>".$textbox[$role][41]."</td>
								<td>".$textbox[$role][42]."</td>
							</tr>
							
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>Pemanas air</span></td>
								<td>".$textbox[$role][43]."</td>
								<td>".$textbox[$role][44]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Penangkal petir</span></td>
								<td colspan='2'>".$textbox[$role][45]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Area parkir</span></td>
								<td colspan='2'>".$textbox[$role][47]."</td>
								
							</tr>
							<tr>
								<td width='25%'><span>Security parking</span></td>
								<td colspan='2'>".$textbox[$role][49]."</td>
							</tr>
							
						</table>
					</div>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>KESIMPULAN NILAI BANGUNAN  <span class='tipe_bangunan'></span></h4>
					
					<div class='col-lg-6' style='padding: 0px;'>
						
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>NILAI PASAR</span></td>
								<td>".$textbox[$role][55]."</td>
							</tr>
							<tr>
								<td width='25%'><span>INDIKASI NILAI LIKUIDASI</span></td>
								<td>".$textbox[$role][182]."</td>
							</tr>
						</table>

						
						</table>
					</div>
				</div>";
		}
		else if($lokasi->id_jenis_objek == 6)
		{
				$content .="
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>SPESIFIKASI RUANG   APARTEMEN<span class='div-provinsi' style=''></span></h4>
					<div class='col-lg-12' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Nama Tower</span></td>
								<td>".$textbox[$role][177]."</td>
								<td width='15%'><span>Jumlah Kamar Tidur</span></td>
								<td>".$textbox[$role][178]."</td>
								<td width='15%'><span>Dapur Bersih</span></td>
								<td>".$textbox[$role][185]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Letak Lantai Obyek</span></td>
								<td>".$textbox[$role][179]."</td>
								<td width='15%'><span>Jumlah Kamar Mandi</span></td>
								<td>".$textbox[$role][180]."</td>
								<td width='15%'><span>Laundry Room</span></td>
								<td>".$textbox[$role][186]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Posisi Ruang Apartemen</span></td>
								<td>".$textbox[$role][181]."</td>
								<td width='15%'><span>Furnished</span></td>
								<td>".$textbox[$role][182]."</td>
								<td width='15%'><span>Kamar Pembantu</span></td>
								<td>".$textbox[$role][187]."</td>
							</tr>
							<tr>
								<td width='15%'><span>View (Menghadap Ke)</span></td>
								<td>".$textbox[$role][183]."</td>
								<td width='15%'><span>Dinding Ruangan</span></td>
								<td>".$textbox[$role][184]."</td>
								<td width='15%'><span>Teras / Balkon</span></td>
								<td>".$textbox[$role][188]."</td>
							</tr>
						</table>
					</div>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>FASILITAS RUANG   APARTEMEN<span class='div-provinsi' style=''></span></h4>
					<div class='col-lg-12' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Saluran Listrik</span></td>
								<td>".$textbox[$role][192]."</td>
								<td width='15%'><span>Pemanas Air</span></td>
								<td>".$textbox[$role][195]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Pendingin Ruangan (AC)</span></td>
								<td>".$textbox[$role][196]."</td>
								<td width='15%'><span>Jenis Kamar Mandi</span></td>
								<td>".$textbox[$role][193]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Sambungan Telepon</span></td>
								<td>".$textbox[$role][197]."</td>
								<td width='15%'><span>Sanitair</span></td>
								<td>".$textbox[$role][194]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Air Bersih</span></td>
								<td>".$textbox[$role][198]."</td>
								<td width='15%'><span>Pembuangan Sampah</span></td>
								<td>".$textbox[$role][199]."</td>
							</tr>
						</table>
					</div>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>KESIMPULAN NILAI PROPERTI  <span class='tipe_bangunan'></span></h4>
					<div class='col-lg-6' style='padding: 0px;'>
						<p style='font-weight: bold;'>INFORMASI NJOP BANGUNAN</p>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>Informasi NJOP Properti</span></td>
								<td>".$textbox[$role][200]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Bumi Bersama ( / m<sup>2</sup> ) Rp.</span></td>
								<td>".$textbox[$role][201]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Bangunan Bersama ( / m<sup>2</sup> ) Rp.</span></td>
								<td>".$textbox[$role][202]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<p style='font-weight: bold;'>BERDASARKAN FISIK</p>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>NILAI PASAR</span></td>
								<td>".$textbox[$role][55]."</td>
							</tr>
							<tr>
								<td width='25%'><span>INDIKASI NILAI LIKUIDASI</span></td>
								<td>".$textbox[$role][56]."</td>
							</tr>
						</table>
					</div>
				</div>";
		}
		else if($lokasi->id_jenis_objek == 7)
		{
			$content .="
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>SPESIFIKASI UNIT RUANG KANTOR<span class='div-provinsi' style=''></span></h4>
					<div class='col-lg-12' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>								
								<td width='15%'><span>Letak Lantai Obyek</span></td>
								<td>".$textbox[$role][179]."</td>
								<td width='15%'><span>Furnished</span></td>
								<td>".$textbox[$role][182]."</td>
								<td width='15%'><span>Pantry</span></td>
								<td>".$textbox[$role][187]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Posisi Ruang Apartemen</span></td>
								<td>".$textbox[$role][181]."</td>
								<td width='15%'><span>View (Menghadap Ke)</span></td>
								<td>".$textbox[$role][183]."</td>
								<td width='15%'><span>Teras / Balkon</span></td>
								<td>".$textbox[$role][188]."</td>
							</tr>
						</table>
					</div>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>FASILITAS UNIT RUANG KANTOR<span class='div-provinsi' style=''></span></h4>
					<div class='col-lg-12' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='15%'><span>Saluran Listrik</span></td>
								<td>".$textbox[$role][192]."</td>
								<td width='15%'><span>Pemanas Air</span></td>
								<td>".$textbox[$role][195]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Pendingin Ruangan (AC)</span></td>
								<td>".$textbox[$role][196]."</td>
								<td width='15%'><span>Jenis Kamar Mandi</span></td>
								<td>".$textbox[$role][193]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Sambungan Telepon</span></td>
								<td>".$textbox[$role][197]."</td>
								<td width='15%'><span>Sanitair</span></td>
								<td>".$textbox[$role][194]."</td>
							</tr>
							<tr>
								<td width='15%'><span>Air Bersih</span></td>
								<td>".$textbox[$role][198]."</td>
								<td width='15%'><span>Pembuangan Sampah</span></td>
								<td>".$textbox[$role][199]."</td>
							</tr>
						</table>
					</div>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
				<h4>KESIMPULAN NILAI PROPERTI  <span class='tipe_bangunan'></span></h4>
					<div class='col-lg-6' style='padding: 0px;'>
						<p style='font-weight: bold;'>INFORMASI NJOP BANGUNAN</p>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>Bumi Bersama ( / m<sup>2</sup> ) Rp.</span></td>
								<td>".$textbox[$role][201]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Bangunan Bersama ( / m<sup>2</sup> ) Rp.</span></td>
								<td>".$textbox[$role][202]."</td>
							</tr>
						</table>
					</div>
					<div class='col-lg-6 pull-right' style='padding: 0px;'>
						<p style='font-weight: bold;'>BERDASARKAN FISIK</p>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>NILAI PASAR</span></td>
								<td>".$textbox[$role][55]."</td>
							</tr>
							<tr>
								<td width='25%'><span>INDIKASI NILAI LIKUIDASI</span></td>
								<td>".$textbox[$role][56]."</td>
							</tr>
						</table>
					</div>
				</div>";
				// Faktor nilai penentu
				// 	<div class='col-lg-6' style='padding: 0px;'>
				// 		<p style='font-weight: bold;'><u>Faktor Penentu Nilai Properti :</u></p>
				// 		<table class='table table_border' cellpadding='0' cellspacing='0'>
				// 			<tr>
				// 				<td width='25%'><span>Perawatan</span></td>
				// 				<td width='18%'>".$textbox[$role][200]."</td>
				// 				<td>".$textbox[$role][205]."</td>
				// 			</tr>
				// 			<tr>
				// 				<td width='25%'><span>Kondisi</span></td>
				// 				<td width='18%'>".$textbox[$role][201]."</td>
				// 				<td>".$textbox[$role][206]."</td>
				// 			</tr>
				// 			<tr>
				// 				<td width='25%'><span>Kontruksi</span></td>
				// 				<td width='18%'>".$textbox[$role][202]."</td>
				// 				<td>".$textbox[$role][207]."</td>
				// 			</tr>
				// 			<tr>
				// 				<td width='25%'><span>Lantai</span></td>
				// 				<td width='18%'>".$textbox[$role][203]."</td>
				// 				<td>".$textbox[$role][208]."</td>
				// 			</tr>
				// 			<tr>
				// 				<td width='25%'><span>Umur Bangunan</span></td>
				// 				<td width='18%'>".$textbox[$role][204]."</td>
				// 				<td>".$textbox[$role][209]."</td>
				// 			</tr>
				// 			<tr>
				// 				<td width='25%'><span>Total</span></td>
				// 				<td width='18%'>".$textbox[$role][210]."</td>
				// 			</tr>
				// 		</table>
				// 	</div>
		}
		elseif ($lokasi->id_jenis_objek==5)
		{
			$content .="
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>FASILITAS / SARANA PELENGKAP KESELURUHAN PADA AREAL PROPERTI</h4>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>Saluran listrik PLN</span></td>
								<td colspan='2'>".$textbox[$role][38]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Sambungan telepon</span></td>
								<td colspan='2'>".$textbox[$role][39]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Jaringan air bersih</span></td>
								<td colspan='2'>".$textbox[$role][40]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Pendingin ruangan</span></td>
								<td>".$textbox[$role][41]."</td>
								<td>".$textbox[$role][42]."</td>
							</tr>
							
						</table>
					</div>
					<div class='col-lg-6' style='padding: 0px;'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>Pemanas air</span></td>
								<td>".$textbox[$role][43]."</td>
								<td>".$textbox[$role][44]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Penangkal petir</span></td>
								<td colspan='2'>".$textbox[$role][45]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Area parkir</span></td>
								<td colspan='2'>".$textbox[$role][47]."</td>
								
							</tr>
							<tr>
								<td width='25%'><span>Security parking</span></td>
								<td colspan='2'>".$textbox[$role][49]."</td>
							</tr>
							
						</table>
					</div>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>KESIMPULAN NILAI BANGUNAN  <span class='tipe_bangunan'></span></h4>
					
					<div class='col-lg-6' style='padding: 0px;'>
						
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>NILAI PASAR</span></td>
								<td>".$textbox[$role][55]."</td>
							</tr>
							<tr>
								<td width='25%'><span>INDIKASI NILAI LIKUIDASI</span></td>
								<td>".$textbox[$role][182]."</td>
							</tr>
						</table>

						
						</table>
					</div>
				</div>

			";

			// echo $id_lokasi	= $_POST["id_lokasi"];
			// echo $id_field	= $_POST["id_field"];
			// echo $value		= $_POST["value"];
			// echo $keterangan	= $_POST["keterangan"];
		}
		elseif ($lokasi->id_jenis_objek==3)
		{

			$content .="<div class='panel panel-default'>
				
				<div class='panel-heading'>
				<h3 class='panel-title'>LOKASI DAN FASILITAS UNIT KIOS <span class='tipe_bangunan'></span></h3>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					
					<div class='col-lg-6' style='padding: 0px;'>
						
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>Lokasi unit kios</span></td>
								<td>".$textbox[$role][11]."</td>

							</tr>
							<tr>
								<td width='25%'><span>Letak lantai kios</span></td>
								<td>".$textbox[$role][12]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Blok / Area</span></td>
								<td>".$textbox[$role][13]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Posisi unit kios</span></td>
								<td>".$textbox[$role][14]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Interior kios</span></td>
								<td>".$textbox[$role][15]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Produk dagang</span></td>
								<td>".$textbox[$role][16]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Daya listrik</span></td>
								<td>".$textbox[$role][17]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Unit AC</span></td>
								<td>".$textbox[$role][18]."</td>
							</tr>
							<tr>
								<td width='25%'><span>Telepon</span></td>
								<td>".$textbox[$role][19]."</td>
							</tr>
						</table>
					</div>
					</div>
					<div class='panel panel-default'><br>
				
				<div class='panel-heading'>
				<h3 class='panel-title'>KESIMPULAN NILAI PROPERTI<span class='tipe_bangunan'></span></h3>
				</div>
				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<div class='col-lg-6' style='padding: 0px;'>
					
						
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td  width='25%'><span>NILAI PASAR</span></td>
								<td colspan = '2'>".$textbox[$role][57]."</td>
							</tr>
							
							<tr>
								<td width='25%'><span>INDIKASI NILAI LIKUIDASI</span></td>
								<td colspan = '2'>".$textbox[$role][58]."</td>
							</tr>
						</table>

						
						</table>
					</div>
				</div>
			";
		}
		
		$content .= "

				<div class='panel-body' style='border: 1px solid #e1e1e1;'>
					<h4>C A T A T A N    P E N I L A I</h4>
					".$textbox[$role][59]."
				</div>
			";
		
		//BTB
		//$tipe_bangunan = $this->global_model->get_data("mst_reference",1,array("tipe"),array("TIPE BANGUNAN MAPPI"))->row();
		$tipe_bangunan = '';
		$jumlah_lantai = '';
		$input['tipe_bangunan'] = $this->formlib->_generate_dropdown_master_condition("mst_reference",1,array("tipe"),array("TIPE BANGUNAN MAPPI"),"tipe_bangunan", "id", "data1", $tipe_bangunan, FALSE);
		$lantai = array();
		
		for($i=0;$i<=39;$i++){
			$lantai[$i] = $i+1;
		}
		$input["jumlah_lantai"] = $this->formlib->_generate_dropdown_list("jumlah_lantai",40 ,$lantai,$lantai, $jumlah_lantai);
		$input['tipe_bangunan'] = $this->formlib->_generate_dropdown_master_condition("mst_reference",1,array("tipe"),array("TIPE BANGUNAN MAPPI"),"tipe_bangunan", "data1", "data1", $tipe_bangunan, FALSE);
		$input['jenis_renovasi'] = $this->formlib->_generate_dropdown_master_condition("mst_reference",1,array("tipe"),array("Jenis Renovasi"),"jenis_renovasi", "data1", "data1",null,FALSE);
		$input['klasifikasi_bangunan'] = $this->formlib->_generate_dropdown_master_condition("mst_reference",1,array("tipe"),array("UMUR_EKONOMIS_BANGUNAN"),"klasifikasi_bangunan", "data2", "data1",null,FALSE);
	
	
		//END
		$content_btb	= "
			<div class='row'>
			<div class='col-md-6'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<h3 class='panel-title'>Bangunan</h3>
					</div>
					<div class='panel-body' style='border: 1px solid #e1e1e1; border-top: 0px;'>
						<div class='col-lg-12' style='padding: 0px;'>
							<table class='table table_border' cellpadding='0' cellspacing='0'>
								<tr>
									<td width='15%'><span>Tipe Bangunan</span></td>
									<td>";
									
										$data = $this->global_model->get_data("mst_reference", 1, array("tipe"), array("TIPE BANGUNAN MAPPI"));
										$obj = $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 912");
										//echo $id_lokasi;
										$val = "";
										if ($obj->num_rows() == 1)
										{
											$val	= $obj->row()->jawab;
										}
										$content_btb .= "<select  id='textbox_bangunan_131' class='table_input input_912_Bangunan_1' name='update[bangunan_131]' data-id-field='912' data-keterangan='". $role ."'><option value=''>Pilih</option>";
										foreach($data->result() as $item){
												$str = "";
												if (trim($val)==trim($item->data1)){
													$str = "selected";
												}
												$content_btb .= "<option value='". $item->data1 ."' lantai='". $item->data3 ."' ". $str ." >". $item->data1 ."</option>";
										}
						
										$content_btb .= "</select>		
										
									</td>  
								</tr>
								<tr>
									<td width='15%'><span>Jumlah Lantai</span></td>
									<td>". $textbox[$role][132] /*$input['jumlah_lantai']*/."</td>
								</tr>
								<tr>
									<td width='15%'><span>Tahun Penilaian</span></td>
									<td>". $textbox[$role][133] ."</td>
								</tr>
								<tr>
									<td width='15%'><span>Tahun Bangun</span></td>
									<td>". $textbox[$role][134] ."</td>
								</tr>
								<tr>
									<td width='15%'><span>Jenis Renovasi</span></td>
									<td>". $textbox[$role][135] ."</td>
								</tr>
								<tr>
									<td width='15%'><span>Tahun Renovasi</span></td>
									<td>". $textbox[$role][136] ."</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class='col-md-6'>
				<div class='panel panel-default'>
					<div class='panel-heading'>
						<h3 class='panel-title'>Umur Ekonomis / Manfaat Bangunan</h3>
					</div>
					<div class='panel-body' style='border: 1px solid #e1e1e1; border-top: 0px;'>
						<div class='col-lg-12' style='padding: 0px;'>
							<table class='table table_border' cellpadding='0' cellspacing='0'>
								<tr>
									<td width='15%'><span>Klasifikasi Bangunan</span></td>
									<td>"; 
									    $data= $this->global_model->get_data("mst_reference", 1, array("tipe"), array("UMUR_EKONOMIS_BANGUNAN"));
										$obj = $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 918");
										//echo $id_lokasi;
										$val = "";
										if ($obj->num_rows() == 1)
										{
											$val	= $obj->row()->jawab;
										}
										$content_btb .= "<select  id='textbox_bangunan_137' class='table_input input_918_'". $role ."' name='update[bangunan_137]' data-id-field='918' data-keterangan='". $role ."'><option value=''>Pilih</option>";
										foreach($data->result() as $item){
												$str = "";
												if (trim($val)==trim($item->data2)){
													$str = "selected";
												}
												$content_btb .= "<option value='". $item->data2 ."' ". $str ." >". $item->data1 ."</option>";
										}
									$content_btb .="</td>
								</tr>
								<tr>
									<td width='15%'><span>Kelas Bangunan</span></td>
									<td>". $textbox[$role][138];
									$obj = $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 919");
										//echo $id_lokasi;
										$val = "";
										if ($obj->num_rows() == 1)
										{
											$val	= $obj->row()->jawab;
										}
									$content_btb .="<input type='hidden' id='hdnKelasBangunan' value='". $val ."'>
									</td>
								</tr>
								<tr>
									<td width='15%'><span>Umur Ekonomis</span></td>
									<td>". $textbox[$role][139] ." Tahun</td>
									
								</tr>
								<tr>
									<td width='15%'><span>Umur Efektif</span></td>
									<td>". $textbox[$role][140] ." Tahun</td>
									
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			</div>
		";

		$content_btb .= "
					<div class='row'>
						<div class='col-lg-8' style='overflow-x: scroll;'>
							".$table_pengukuran."
						</div>
						<div class='col-lg-1'>
							".$table_teras."
						</div>
						<div class='col-lg-2'>
							".$table_gudang."
						</div>
					</div>
					<br><br>
					<button type='button' class='btn btn-primary btn-sm btn-tambah-lantai' data-bangunan='".$role."'>Tambah Lantai</button>
					<button type='button' class='btn btn-primary btn-sm btn-tambah-ruangan' data-bangunan='".$role."'>Tambah Ruangan</button>
					<br>
					<br>
		";
		$content_btb	.= "
			<div class='row'>
				<div class='col-md-12'>
					<div id='div_biaya_langsung'></div>
					<table class='table_border_2' width='100%' cellpadding='0' cellspacing='0'>
					<thead>
						<tr >
							<th colspan='5' style='background-color: #4C9ED9;color: #fff;text-align: center;' >B. BIAYA TIDAK LANGSUNG</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td width='30%'><span>PROFESSIONAL FEE + PERIJINAN + KEUNTUNGAN KONTRAKTOR</span></td>
							<td width='15%'>".$textbox[$role][141]."</td>
							<td width='10%'></td>
							<td width='30%'><span>PROFESSIONAL FEE + PERIJINAN + KEUNTUNGAN KONTRAKTOR</span></td>
							<td width='15%'>".$textbox[$role][146]."</td>
						</tr>
						<tr>
							<td><span>TOTAL BIAYA TIDAK LANGSUNG  ( B )</span></td>
							<td>".$textbox[$role][142]."</td>
							<td></td>
							<td><span>TOTAL BIAYA TIDAK LANGSUNG  ( B )</span></td>
							<td>".$textbox[$role][147]."</td>
						</tr>
						<tr>
							<td><span>TOTAL BIAYA PEMBANGUNAN BARU ( A + B )</span></td>
							<td>".$textbox[$role][143]."</td>
							<td></td>
							<td><span>TOTAL BIAYA PEMBANGUNAN BARU ( A + B )</span></td>
							<td>".$textbox[$role][148]."</td>
						</tr>
						<tr>
							<td><span>PPN 10%</span></td>
							<td>".$textbox[$role][144]."</td>
							<td align='center'><b>SELISIH</b></td>
							<td><span>PPN 10%</span></td>
							<td>".$textbox[$role][149]."</td>
						</tr>
						<tr>
							<td><span>TOTAL BRB SETELAH PPN (PEMBULATAN) - MAPPI</span></td>
							<td>".$textbox[$role][145]."</td>
							<td>".$textbox[$role][151]."</td>
							<td><span>TOTAL BRB SETELAH PPN (PEMBULATAN) - MAPPI</span></td>
							<td>".$textbox[$role][150]."</td>
						</tr>
					</tbody>
					</table>
				</div>
			</div>
			<div class='row'>
				<div class='col-md-12'>
					<table class='table_border_2' width='100%' cellpadding='0' cellspacing='0'>
						<thead>
							<tr>
								<th colspan='5' style='background-color: #4C9ED9;color: #fff;text-align: center;'>PENYUSUTAN BANGUNAN</th>
							</tr>
							<tr>
								<th colspan='2' style='background-color: #4C9ED9;color: #fff;text-align: center;'>PENYUSUTAN FISIK</th>
								<th rowspan='2' style='background-color: #4C9ED9;color: #fff;text-align: center;'>KEUSANGAN FUNGSIONAL (%)</th>
								<th rowspan='2' style='background-color: #4C9ED9;color: #fff;text-align: center;'>KEUSANGAN EKONOMIS (%)</th>
								<th rowspan='2' style='background-color: #4C9ED9;color: #fff;text-align: center;'>TOTAL PENYUSUTAN (%)</th>
							</tr>
							<tr>
								<th style='background-color: #4C9ED9;color: #fff;text-align: center;'>KEMUNDURAN FISIK (%)</th>
								<th style='background-color: #4C9ED9;color: #fff;text-align: center;'>KONDISI TERLIHAT (%)</th>
							</tr>
						</thead>
						<tbody>
						<tr>
							<td>".$textbox[$role][152]."</td>
							<td>".$textbox[$role][153]."</td>
							<td>".$textbox[$role][154]."</td>
							<td>".$textbox[$role][155]."</td>
							<td>".$textbox[$role][156]."</td>
						<tr>
					</table>
					<table class='table_border_2'>
						<thead>
							<tr>
								<th colspan='2' style='background-color: #4C9ED9;color: #fff;text-align: center;'>NILAI PASAR BANGUNAN</th>
							</tr>
							
						</thead>
						<tbody>
						
						<tr>
							<td><span> BRB / RCN  ( / M² )</span></td>
							<td>".(isset($textbox[$role][176])) ? $textbox[$role][176] : '' ."</td>		
						<tr>
						<tr>
							<td><span> BRB / RCN</span></td>
							<td><input type='text' id='brb' name='' class='table_input text-right readonly' value=''></td>		
						<tr>
						<tr>
							<td><span> NILAI PASAR BANGUNAN  ( / M² )</span></td>
							<td><input type='text' id='nilai_pasar_m2' name='' class='table_input text-right readonly' value=''></td>		
						<tr>
						<tr>
							<td><span>NILAI PASAR BANGUNAN</span></td>
							<td><input type='text' id='nilai_pasar' name='' class='table_input text-right readonly' value=''></td>		
						<tr>
					</table>
					<table class='table_border1'>
						<thead>
							<tr>
								<th colspan='2' style='background-color: #4C9ED9;color: #fff;text-align: center;'>KONDISI BANGUNAN</th>
							</tr>
							
						</thead>
						<tbody>
						<tr>
							<td align='right'><font size='6' id='kondisi_bangunan_persen'>%</font></td>
							<td><font size='6' id='kondisi_bangunan'>_</font></td>		
						<tr>
						
					</table>
				</div>
				
			</div>
			</div>
			</div>
		";
		
		$content_bct	= "
			<table class='table_border1' cellpadding='0' cellspacing='0'>
				<tr>
					<td colspan='6' style='text-align: center; background-color: #336600; color: #FFF;'><span><h3>PERHITUNGAN BRB / RCN BANGUNAN</h3></span></td>
				</tr>
				<tr>
					<td colspan='6' style='text-align: center; background-color: #d9d9d9; color: #333;'><span>DATA INSPEKSI & PENGUKURAN FISIK BANGUNAN</span></td>
				</tr>
				<tr>
					<td width='25%' colspan='2'><span>JENIS BANGUNAN</span></td>
					<td width='20%'>".$textbox[$role][60]."</td>
					<td width='25%' colspan='2'><span>LUAS BANGUNAN</span></td>
					<td width='25%'>".$textbox[$role][61]."</td>
				</tr>
				<tr>
					<td colspan='2'><span>TYPE BANGUNAN</span></td>
					<td>".$textbox[$role][62]."</td>
					<td colspan='2'><span>JUMLAH LANTAI</span></td>
					<td>".$textbox[$role][63]."</td>
				</tr>
				<tr>
					<td colspan='2' style='text-align: center; background-color: #eee; color: #333;'><span>DATA FORM  BANGUNAN YANG DIPILIH</span></td>
					<td style='text-align: center; background-color: #eee; color: #333;'><span>ELEMEN BANGUNAN</span></td>
					<td colspan='2' style='text-align: center; background-color: #eee; color: #333;'><span>KETERANGAN SATUAN</span></td>
					<td style='text-align: center; background-color: #eee; color: #333;'><span>HARGA</span></td>
				</tr>
				<tr>
					<td colspan='2'>".$textbox[$role][64]."</td>
					<td><span>PONDASI</span></td>
					<td colspan='2' rowspan='2'> ".$this->load_dropdown_pondasi_struktur($lokasi, $role)."</td>
					<td rowspan='2'>".$textbox[$role][66]."</td>
				</tr>
				<tr>
					<td colspan='2'>".$textbox[$role][67]."</td>
					<td><span>STRUKTUR</span></td>
				</tr>
				<tr>
					<td colspan='2'>".$textbox[$role][68]."</td>
					<td><span>RANGKA ATAP</span></td>
					<td colspan='2' rowspan='2'>".$textbox[$role][69]."</td>
					<td rowspan='2'>".$textbox[$role][70]."</td>
				</tr>
				<tr>
					<td colspan='2'>".$textbox[$role][71]."</td>
					<td><span>PENUTUP ATAP</span></td>
				</tr>
				<tr>
					<td colspan='2'>".$textbox[$role][72]."</td>
					<td><span>PLAFOND</span></td>
					<td colspan='2'>".$textbox[$role][73]."</td>
					<td>".$textbox[$role][74]."</td>
				</tr>
				<tr>
					<td colspan='2'>".$textbox[$role][75]."</td>
					<td><span>DINDING</span></td>
					<td colspan='2' rowspan='2'>".$textbox[$role][76]."</td>
					<td rowspan='2'>".$textbox[$role][77]."</td>
				</tr>
				<tr>
					<td colspan='2'>".$textbox[$role][78]."</td>
					<td><span>PINTU & JENDELA</span></td>
				</tr>
				<tr>
					<td colspan='2'>".$textbox[$role][79]."</td>
					<td><span>LANTAI</span></td>
					<td colspan='2' rowspan='2'>".$textbox[$role][80]."</td>
					<td rowspan='2'>".$textbox[$role][81]."</td>
				</tr>
				<tr>
					<td colspan='2'></td>
					<td><span>UTILITAS</span></td>
				</tr>
				<tr>
					<td rowspan='6'>
						<table class='table table_border' cellpadding='0' cellspacing='0'>
							<tr>
								<td width='25%'><span>TAHUN PENILAIAN</span></td>
								<td>".$textbox[$role][82]."</td>
							</tr>
							<tr>
								<td width='25%'><span>TAHUN DIBANGUN</span></td>
								<td>".$textbox[$role][83]."</td>
							</tr>
							<tr>
								<td width='25%'><span>TAHUN DIRENOVASI</span></td>
								<td>".$textbox[$role][84]."</td>
							</tr>
							<tr>
								<td colspan='2' align='center'><span>UMUR BANGUNAN</span></td>
							</tr>
							<tr>
								<td width='25%'><span>UMUR EKONOMIS</span></td>
								<td>".$textbox[$role][85]."</td>
							</tr>
							<tr>
								<td width='25%'><span>UMUR EFFEKTIF</span></td>
								<td>".$textbox[$role][86]."</td>
							</tr>
						</table>
					</td>
					<td colspan='4' align='right'><span>JUMLAH BRB / RCN BANGUNAN</span></td>
					<td>".$textbox[$role][87]."</td>
				</tr>
				<tr>
					<td><span>TERAS</span></td>
					<td>".$textbox[$role][88]."</td>
					<td>".$textbox[$role][89]."</td>
					<td>".$textbox[$role][90]."</td>
					<td>".$textbox[$role][91]."</td>
				</tr>
				<tr>
					<td><span>BALKON</span></td>
					<td>".$textbox[$role][92]."</td>
					<td>".$textbox[$role][93]."</td>
					<td>".$textbox[$role][94]."</td>
					<td>".$textbox[$role][95]."</td>
				</tr>
				<tr>
					<td colspan='4' align='right'><span>JUMLAH BRB / RCN PAGAR & BALKON</span></td>
					<td>".$textbox[$role][96]."</td>
				</tr>
				<tr>
					<td colspan='4' align='right'><span>TOTAL JUMLAH BRB / RCN BANGUNAN</span></td>
					<td>".$textbox[$role][97]."</td>
				</tr>
				<tr>
					<td colspan='4' align='right'><span>PEMBULATAN TOTAL BRB / RCN  ( Rp / m<sup>2</sup> )</span></td>
					<td>".$textbox[$role][98]."</td>
				</tr>
				<tr>
					<td colspan='6' style='height: 20px;' ></td>
				</tr>
				<tr>
					<td colspan='3'>
							<table class='table table_border' cellpadding='0' cellspacing='0'>
								<tr>
									<td colspan='5' align='center'><span>PENYUSUTAN BANGUNAN (%)</span></td>
								</tr>
								<tr>
									<td colspan='2' align='center' style='word-wrap:break-word;'><span>PENYUSUTAN FISIK</span></td>
									<td rowspan='2' align='center' style='word-wrap:break-word;'><span>KEUSANGAN FUNGSIONAL</span></td>
									<td rowspan='2' align='center' style='word-wrap:break-word;'><span>KEUSANGAN EKONOMIS</span></td>
									<td rowspan='3' align='center' style='word-wrap:break-word;'><span>TOTAL PENYUSUTAN</span></td>
								</tr>
								<tr>
									<td align='center' style='word-wrap:break-word;'><span>KEMUNDURAN FISIK</span></td>
									<td align='center' style='word-wrap:break-word;'><span>KONDISI TERLIHAT</span></td>
								</tr>
								<tr>
									<td>".$textbox[$role][99]."</td>
									<td>".$textbox[$role][100]."</td>
									<td>".$textbox[$role][101]."</td>
									<td>".$textbox[$role][102]."</td>
								</tr>
								<tr>
									<td colspan='2'>".$textbox[$role][103]."</td>
									<td>".$textbox[$role][104]."</td>
									<td>".$textbox[$role][105]."</td>
									<td>".$textbox[$role][106]."</td>
								</tr>
							</table>
					</td>
					<td colspan='3'>
							<table class='table table_border' cellpadding='0' cellspacing='0'>
								<tr>
									<td><span>Kondisi Bangunan ( % )</span></td>
									<td>".$textbox[$role][107]."</td>
								</tr>
								<tr>
									<td><span>Kondisi Bangunan</span></td>
									<td>".$textbox[$role][108]."</td>
								</tr>
								<tr>
									<td><span>BRB / RCN  ( Rp )</span></td>
									<td>".$textbox[$role][109]."</td>
								</tr>
								<tr>
									<td><span>BRB / RCN  ( Rp / m<sup>2</sup> )</span></td>
									<td>".$textbox[$role][110]."</td>
								</tr>
								<tr>
									<td><span>Nilai Pasar  ( Rp / m<sup>2</sup> )</span></td>
									<td>".$textbox[$role][111]."</td>
								</tr>
								<tr>
									<td><span>Nilai Pasar  ( Rp )</span></td>
									<td>".$textbox[$role][112]."</td>
								</tr>
							</table>
					</td>
				</tr>
			</table>

		";

		$content_lampiran	= '
			<div class="row">
				<div class="col-lg-12">
					<table class="table_border_2" id="" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td width="50%" style="padding: 10px;">
									'.$textbox[$role][115].'
									<span>Keterangan</span>
									'.$textbox[$role][121].'
								</td>
								<td width="50%" style="padding: 10px;">
									'.$textbox[$role][116].'
									<span>Keterangan</span>
									'.$textbox[$role][122].'
								</td>
							</tr>
							<tr>
								<td width="50%" style="padding: 10px;">
									'.$textbox[$role][117].'
									<span>Keterangan</span>
									'.$textbox[$role][123].'
								</td>
								<td width="50%" style="padding: 10px;">
									'.$textbox[$role][118].'
									<span>Keterangan</span>
									'.$textbox[$role][124].'
								</td>
							</tr>
							<tr>
								<td width="50%" style="padding: 10px;">
									'.$textbox[$role][119].'
									<span>Keterangan</span>
									'.$textbox[$role][125].'
								</td>
								<td width="50%" style="padding: 10px;">
									'.$textbox[$role][120].'
									<span>Keterangan</span>
									'.$textbox[$role][126].'
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<style>
				.input_885_'.$role.',
				.input_886_'.$role.',
				.input_887_'.$role.',
				.input_888_'.$role.',
				.input_889_'.$role.',
				.input_890_'.$role.'
				{
					border: 1px solid #eee;
				}
			</style>
		';

		$content_bangunan	= $content;
		$content_bct		= $content_bct;
		$content_btb		= $content_btb;

		$content_load		= '
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="">
					<a aria-expanded="false" href="#bangunan_bangunan_'.$role.'" class="panel-bangunan_bangunan active" aria-controls="bangunan_bangunan" role="tab" data-toggle="tab" data-type="">Form Bangunan</a>
				</li>';

		if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2){
			$content_load	.='
				<li role="presentation" class="">
					<a aria-expanded="false" href="#bangunan_btb_'.$role.'" class="panel-bangunan_btb" aria-controls="bangunan_btb" role="tab" data-toggle="tab" data-type="">Form BTB</a>
				</li>

			';
		}

		$content_load	.='</ul>
			<div class="tab-content" style="padding: 20px; border: 1px solid #eee;">
				<div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="bangunan_bangunan_'.$role.'">
					'.$content_bangunan.'
				</div>';

		if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2){
			$content_load .='
				<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="bangunan_btb_'.$role.'">
					'.$content_btb.'
				</div>';
		}

		$content_load .='
			</div>
		';

		echo $content_load;
		// echo htmlentities($content_load);
	}
	function load_dropdown_pondasi_struktur($lokasi, $role)
	{
		$content	= '<select class="table_input input_699_Bangunan_1" id="textbox_bangunan_65" name="update[bangunan_65]" data-id-field="699" data-keterangan="Bangunan_1">';

		$content	.= '<option selected="selected" disabled="disabled">Select</option>';

		$query_value	= "SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$lokasi->id." AND id_field = 699 AND keterangan = '".$role."' ";
		$data_value		= $this->global_model->get_by_query($query_value);
		$value			= "";

		if ($data_value->num_rows() == 1)
		{
			$value	= $data_value->row()->jawab;
		}

		$custom_data	= unserialize($lokasi->custom_data);
		$tab_bangunan	= $custom_data["tab_bangunan"];
		$bangunan		= $tab_bangunan[str_replace("_", " ", $role)];
		$list_lantai	= $bangunan["lantai"];
		$list_ruangan	= $bangunan["ruangan"];

		$basemant		= 0;
		$keterangan		= $role."__1__".(count($list_ruangan) + 1);

		$query_basemant	= "SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$lokasi->id." AND id_field = 637 AND keterangan = '".$keterangan."'";
		$data_basemant	= $this->global_model->get_by_query($query_basemant);


		if ($data_basemant->num_rows() == 1)
		{
			$basemant	= $data_basemant->row()->jawab;
		}

		if (count($list_lantai) - 1 == 1)
		{
			$query	= "SELECT * FROM tmp_btb_zdr WHERE element2 = 'BANGUNAN TIDAK BERTINGKAT'";
		}
		else if (count($list_lantai) - 1 == 2 && $basemant == 0)
		{
			$query	= "SELECT * FROM tmp_btb_zdr WHERE element2 = 'BANGUNAN BERTINGKAT'";
		}
		else
		{
			$query	= "SELECT * FROM tmp_btb_zdr WHERE element2 = 'BANGUNAN BERTINGKAT > 2 LT + BASEMENT'";
		}


		$list_option	= $this->global_model->get_by_query($query);

		foreach ($list_option->result() as $item_option)
		{
			$selected	= '';

			if ($item_option->element3 == $value)
			{
				$selected	= 'selected="selected"';
			}

			$content	.= '<option value="'.$item_option->element3.'" '.$selected.'>'.$item_option->element3.'</option>';
		}


		$content	.= '</select>';

		/*die();*/

		return $content;
	}
	function hitung_bct_bangunan()
	{
		$id_lokasi		= $_POST["data"]["id_lokasi"];
		$type_bangunan	= $_POST["data"]["type_bangunan"];
		$luas_bangunan	= $_POST["data"]["luas_bangunan"];

		$ket_pondasi_struktur	= $_POST["data"]["ket_pondasi_struktur"];
		$ket_rangka_penutup		= $_POST["data"]["ket_rangka_penutup"];
		$ket_plafond			= $_POST["data"]["ket_plafond"];
		$ket_dinding_pintu		= $_POST["data"]["ket_dinding_pintu"];
		$ket_lantai_utilitas	= $_POST["data"]["ket_lantai_utilitas"];

		$teras_luas				= $_POST["data"]["teras_luas"];
		$teras_type				= $_POST["data"]["teras_type"];
		$balkon_luas			= $_POST["data"]["balkon_luas"];
		$balkon_type			= $_POST["data"]["balkon_type"];

		$tahun_penilaian		= date("Y");
		$tahun_bangun			= $_POST["data"]["tahun_bangun"];
		$tahun_renof			= $_POST["data"]["tahun_renof"];
		$total_penyusutan		= $_POST["data"]["total_penyusutan"];

		// var_dump($_POST);

		$lokasi		= $this->global_model->get_data("mst_lokasi", 1, array("id"), array($id_lokasi))->row();
		$id_kota	= $lokasi->id_kota;

		if ($id_kota == 3171 || $id_kota == 3172 || $id_kota == 3173 || $id_kota == 3174 || $id_kota == 3175)
		{
			$btb_kota	= 1;
		}
		else
		{
			$btb_kota	= $this->global_model->get_data("kotakab_btb_2", 1, array("ID_KOTAKAB"), array($id_kota), "ID_KOTAKAB")->row()->INDEKS;
		}

		$harga_dki_pondasi_struktur	= $this->global_model->get_data("tmp_btb_zdr", 1, array("element3"), array(trim($ket_pondasi_struktur)))->row()->harga_dki;
		$harga_dki_rangka_penutup	= $this->global_model->get_data("tmp_btb_zdr", 1, array("element3"), array(trim($ket_rangka_penutup)))->row()->harga_dki;
		$harga_dki_plafond			= $this->global_model->get_data("tmp_btb_zdr", 1, array("element3"), array(trim($ket_plafond)))->row()->harga_dki;
		$harga_dki_dinding_pintu	= $this->global_model->get_data("tmp_btb_zdr", 1, array("element3"), array(trim($ket_dinding_pintu)))->row()->harga_dki;
		$harga_dki_lantai_utilitas	= $this->global_model->get_data("tmp_btb_zdr", 1, array("element3"), array(trim($ket_lantai_utilitas)))->row()->harga_dki;

		$harga_pondasi_struktur	= $harga_dki_pondasi_struktur * $btb_kota - 200000;
		$harga_rangka_penutup	= $harga_dki_rangka_penutup * $btb_kota;
		$harga_plafond			= $harga_dki_plafond * $btb_kota;
		$harga_dinding_pintu	= $harga_dki_dinding_pintu * $btb_kota;
		$harga_lantai_utilitas	= $harga_dki_lantai_utilitas * $btb_kota;

		$rcn_bangunan			= $harga_pondasi_struktur + $harga_rangka_penutup + $harga_plafond + $harga_dinding_pintu + $harga_lantai_utilitas;

		$ket_teras				= $this->global_model->get_data("tmp_btb_zdr", 1, array("element3"), array(trim($teras_type)))->row()->harga_dki;
		$ket_balkon				= $this->global_model->get_data("tmp_btb_zdr", 1, array("element3"), array(trim($balkon_type)))->row()->harga_dki;

		$harga_teras			= ($teras_luas == 0 ? 0 : ($ket_teras * $teras_luas / $luas_bangunan));
		$harga_balkon			= ($balkon_luas == 0 ? 0 : ($ket_balkon * $balkon_luas / $luas_bangunan));

		$rcn_teras_balkon		= $harga_balkon + $harga_teras;
		$rcn_bangunan2			= $rcn_bangunan + $rcn_teras_balkon;
		$pembulatan_rcn			= round($rcn_bangunan2/100000) * 100000;

		$umur_ekonomis			= $this->global_model->get_data("tmp_btb_zdr", 1, array("element3"), array(trim($type_bangunan)))->row()->harga_dki;
		$umur_efektif			= empty($tahun_bangun) ? 0 : (($tahun_penilaian-$tahun_bangun)-($tahun_renof-$tahun_bangun)/2);

		$kondisi_bangunan_persen	= round( (100 - $total_penyusutan) , 1);

		if ($kondisi_bangunan_persen > 89){
			$kondisi_bangunan	= "Sangat Baik";
		}else if ($kondisi_bangunan_persen > 69){
			$kondisi_bangunan	= "Baik";
		}else if ($kondisi_bangunan_persen > 55){
			$kondisi_bangunan	= "Cukup";
		}else{
			$kondisi_bangunan	= "Kurang";
		}

		$rcn_rp_m		= $pembulatan_rcn;
		$rcn_rp			= $luas_bangunan * $rcn_rp_m;
		$nilai_pasar	= round($pembulatan_rcn * $kondisi_bangunan_persen / 100 / 100000) * 100000;
		$nilai_pasar2	= $nilai_pasar * $luas_bangunan;

		$data_return = array(
			"harga_pondasi_struktur"	=> $harga_pondasi_struktur,
			"harga_rangka_penutup"		=> $harga_rangka_penutup,
			"harga_plafond"				=> $harga_plafond,
			"harga_dinding_pintu"		=> $harga_dinding_pintu,
			"harga_lantai_utilitas"		=> $harga_lantai_utilitas,
			"rcn_bangunan"				=> $rcn_bangunan,

			"ket_teras"					=> $ket_teras,
			"harga_teras"				=> $harga_teras,
			"ket_balkon"				=> $ket_balkon,
			"harga_balkon"				=> $harga_balkon,
			"rcn_teras_balkon"			=> $rcn_teras_balkon,
			"rcn_bangunan2"				=> $rcn_bangunan2,
			"pembulatan_rcn"			=> $pembulatan_rcn,

			"umur_ekonomis"				=> $umur_ekonomis,
			"umur_efektif"				=> round($umur_efektif),

			"kondisi_bangunan_persen"	=> $kondisi_bangunan_persen,
			"kondisi_bangunan"			=> $kondisi_bangunan,
			"rcn_rp"					=> $rcn_rp,
			"rcn_rp_m"					=> $rcn_rp_m,
			"nilai_pasar"				=> $nilai_pasar,
			"nilai_pasar2"				=> $nilai_pasar2
		);

		echo json_encode($data_return);
	}
	function get_ringkasan_penilaian()
	{
		$id_lokasi	 	= $_POST["id_lokasi"];
		$id_kertas_kerja = $_GET['id_kertas_kerja'];
		$lokasi			= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();
		$urutan			= (int)(str_replace("K", "", $lokasi->kode));
		$data_table		= array();
		$custom_data	= unserialize($lokasi->custom_data);

		/*print_r($lokasi);*/

		$total_np		= 0;
		$total_nl		= 0;
		/*echo "<pre>";
		print_r($custom_data);
		echo "</pre>";*/

		$table	= "";
		$table	.= "
			<tr>
				<td align='center'><span>".$urutan."</span></td>
				<td colspan='4'><span>PROPERTI - ".$urutan." ".$lokasi->alamat." -  ".$lokasi->nama_provinsi."</span></td>
			</tr>
		";

		/*Tanah*/
		{
			$txn_tanah = $this->global_model->get_by_id('txn_tanah', 'id_kertas_kerja', $id_kertas_kerja);
			$tanah_np = 0;
			$tanah_nl = 0;
			$tanah_luas = 0;

			if (!empty($txn_tanah))
			{
				$tanah_np = $txn_tanah->nilai_pasar;
				$tanah_nl = $txn_tanah->nilai_likuidasi;
				$tanah_diskon = $txn_tanah->diskon;
				if ( empty($tanah_diskon) && !is_numeric($tanah_diskon) ) {
					$tanah_diskon = $tanah_nl < $tanah_np ?
					(100-(($tanah_nl/$tanah_np)*100)): 0;
					$this->global_model->update_data('txn_tanah', 'id_tanah', $txn_tanah->id_tanah, array('diskon' => $tanah_diskon));
				}
				$tanah_diskon = number_format($tanah_diskon,0);
				$tanah_luas = $txn_tanah->luas;
			}
			
			// $tanah_npa = $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 1116));
			// $tanah_nla = $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 1118));

			// $tanah_np = $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 244));
			// $tanah_npa = $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 1116));
			// $tanah_nla = $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 1118));
			// $tanah_nl = $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 245));
			// $tanah_luas = $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 162));

			$total_np = $total_np + (!empty($tanah_np) ? $tanah_np : 0);
			$total_nl = $total_nl + (!empty($tanah_nl) ? $tanah_nl : 0);
			// $total_npa = $total_np + ($tanah_npa->num_rows() == 1 && !empty($tanah_npa->row()->jawab) ? $tanah_npa->row()->jawab : 0);
			// $total_nla = $total_nl + ($tanah_nla->num_rows() == 1 && !empty($tanah_nla->row()->jawab) ? $tanah_nla->row()->jawab : 0);

			// $tanah_npa = number_format($tanah_npa->num_rows() == 1 && !empty($tanah_npa->row()->jawab) ? $tanah_npa->row()->jawab : 0);
			// $tanah_nla = number_format($tanah_nla->num_rows() == 1 && !empty($tanah_nla->row()->jawab) ? $tanah_nla->row()->jawab : 0);
			$tanah_np = number_format(!empty($tanah_np) ? $tanah_np : 0);
			$tanah_nl = number_format(!empty($tanah_nl) ? $tanah_nl : 0);

			if ($lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 1)
			{
			
				$tanah_luas	= number_format(!empty($tanah_luas) ? $tanah_luas : 0);
				$table	.= "
					<tr>
						<td align='center'><span></span></td>
						<td><span style='font-weight: normal;'>Tanah ".$lokasi->jenis_sertifikat."</span></td>
						<td align='center'><span style='font-weight: normal;'>".$tanah_luas."</span></td>
						<td align='right'><span style='font-weight: normal;'>".$tanah_np."</span></td>
						<td align='right'><span style='font-weight: normal;'>".$tanah_nl."</span></td>
						<td align='right'><input type='number' class='form-control' step='1' max='100' min='0' value='".$tanah_diskon."' style='text-align: right'></td>
					</tr>
				";
			}
			elseif ($lokasi->id_jenis_objek == 6 || $lokasi->id_jenis_objek == 7)
			{
				$tanah_luas	= number_format(!empty($tanah_luas) ? $tanah_luas : 0);

				$table	.= "
					<tr>
						<td align='center'><span></span></td>
						<td><span style='font-weight: normal;'>".$lokasi->jenis_sertifikat."</span></td>
						<td align='center'><span style='font-weight: normal;'>".floatval($tanah_luas)."</span></td>
						<td align='right'><span style='font-weight: normal;'>".$tanah_np."</span></td>
						<td align='right'><span style='font-weight: normal;'>".$tanah_nl."</span></td>
						<td align='right'><input type='number' class='form-control' step='1' max='100' min='0' value='".$tanah_diskon."' style='text-align: right'></td>
					</tr>
				";
			}
		}

		/*Bangunan*/
		// var_dump("TEST ".$lokasi->id_jenis_objek);
		if ($lokasi->id_jenis_objek == 2)
		{
			$list_bangunan = $this->global_model->get_list('txn_bangunan', "id_kertas_kerja='".$id_kertas_kerja."'");

			// var_dump($list_bangunan);
			
			$i = 1;
			foreach ($list_bangunan as $key_bangunan => $item_bangunan) {
				$key_bangunan = $item_bangunan->bangunan_role;

				$bangunan_name	= $item_bangunan->bangunan_role;
				$bangunan_np	= $item_bangunan->nilai_pasar;
				$bangunan_nl	= $item_bangunan->nilai_likuidasi;
				$bangunan_luas 	= $item_bangunan->luas;


				$total_np	= $total_np + $bangunan_np;
				$total_nl	= $total_nl + $bangunan_nl;

				$bangunan_np = number_format(is_numeric($bangunan_np) ? $bangunan_np : 0);
				$bangunan_nl = number_format(is_numeric($bangunan_nl) ? $bangunan_nl : 0);
				$bangunan_diskon = $item_bangunan->diskon;
				if ( empty($bangunan_diskon) && !is_numeric($bangunan_diskon) ) {
					$bangunan_diskon = $bangunan_nl < $bangunan_np ?
					100-(($bangunan_nl/$bangunan_np)*100): 0;
					$this->global_model->update_data('txn_bangunan', 'id_bangunan', $item_bangunan->id_bangunan, array('diskon' => $bangunan_diskon));
				}
				$bangunan_diskon = number_format($bangunan_diskon, 0);
				$bangunan_luas = number_format(is_numeric($bangunan_luas) ? $bangunan_luas : 0);

				$table	.= "
					<tr>
						<td align='center'><span></span></td>
						<td><span style='font-weight: normal;'>Bangunan ".$bangunan_name."</span></td>
						<td align='center'><span style='font-weight: normal;'>".$bangunan_luas."</span></td>
						<td align='right'><span style='font-weight: normal;'>".$bangunan_np."</span></td>
						<td align='right'><span style='font-weight: normal;'>".$bangunan_nl."</span></td>
						<td align='right'><input type='number' class='form-control' step='1' max='100' min='0' value='".$bangunan_diskon."' style='text-align: right'></td>
					</tr>
				";

				$i++;
			}


			// if (array_key_exists("tab_bangunan", $custom_data))
			// {
			// 	$i = 1;
			// 	foreach ($custom_data["tab_bangunan"] as $key_bangunan => $item_bangunan)
			// 	{
			// 		$key_bangunan	= str_replace(" ", "_", $key_bangunan);

			// 		$bangunan_name	= $this->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($id_lokasi, 635, $key_bangunan));
			// 		$bangunan_np	= $this->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($id_lokasi, 691, $key_bangunan));
			// 		$bangunan_nl	= $this->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($id_lokasi, 692, $key_bangunan));
			// 		$bangunan_luas 	= $this->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi", "id_field", "keterangan"), array($id_lokasi, 639, $key_bangunan));


			// 		$total_np	= $total_np + ($bangunan_np->num_rows() == 1 ? $bangunan_np->row()->jawab : 0);
			// 		$total_nl	= $total_nl + ($bangunan_nl->num_rows() == 1 ? $bangunan_nl->row()->jawab : 0);

			// 		$bangunan_name	= $bangunan_name->num_rows() == 1 ? $bangunan_name->row()->jawab : "-";
					
			// 		$bangunan_np		= number_format($bangunan_np->num_rows() == 1 ? (is_numeric($bangunan_np->row()->jawab) ? $bangunan_np->row()->jawab : 0) : 0);
			// 		$bangunan_nl		= number_format($bangunan_nl->num_rows() == 1 ? (is_numeric($bangunan_nl->row()->jawab) ? $bangunan_nl->row()->jawab : 0):0);
			// 		$bangunan_luas		= number_format($bangunan_luas->num_rows() == 1 ? (is_numeric($bangunan_luas->row()->jawab) ? $bangunan_luas->row()->jawab : 0):0);
 

			// 		$table	.= "
			// 			<tr>
			// 				<td align='center'><span></span></td>
			// 				<td><span style='font-weight: normal;'>Bangunan ".$bangunan_name."</span></td>
			// 				<td align='center'><span style='font-weight: normal;'>".$bangunan_luas."</span></td>
			// 				<td align='right'><span style='font-weight: normal;'>".$bangunan_np."</span></td>
			// 				<td align='right'><span style='font-weight: normal;'>".$bangunan_nl."</span></td>
			// 			</tr>
			// 		";

			// 		$i++;
			// 	}
			// }
		}

		/*Sarana Pelengkap*/
		{
			// $sarana_np	= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 865));

			$saran_np_new = $this->global_model->get_by_id('txn_sarana_pelengkap', 'id_kertas_kerja', $id_kertas_kerja);
			$count_sarana = count($saran_np_new);


			$sarana_nl	= 0;
			$sarana_np	= 0;

			if (!empty($saran_np_new))
			{
				$total_np	= $total_np + ($count_sarana == 1 ? $saran_np_new->nilai_pasar : 0);
				$total_nl	= $total_nl + ($count_sarana == 1 ? $saran_np_new->nilai_pasar/2 : 0);
				// $total_npa	= $total_npa + ($count_sarana == 1 ? $saran_np_new->nilai_pasar : 0);
				// $total_nla	= $total_nla + ($count_sarana == 1 ? $saran_np_new->nilai_pasar/2 : 0);
				$sarana_nl	= number_format(($count_sarana == 1 ? $saran_np_new->nilai_pasar/2 : 0));
				$sarana_np	= number_format($count_sarana == 1 ? $saran_np_new->nilai_pasar : 0);
				$sarana_diskon = $saran_np_new->diskon;
				if ( empty($sarana_diskon) && !is_numeric($sarana_diskon) ) {
					$sarana_diskon = $sarana_nl < $sarana_np ?
					100-(($sarana_nl/$sarana_np)*100): 0;
					$this->global_model->update_data('txn_sarana_pelengkap', 'id_sarana_pelengkap', $saran_np_new->id_sarana_pelengkap, array('diskon' => $sarana_diskon));
				}
				$sarana_diskon = number_format($sarana_diskon, 0);
			}

			if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2){
				$table	.= "
					<tr>
						<td align='center'><span></span></td>
						<td><span style='font-weight: normal;'>Sarana Pelengkap</span></td>
						<td align='center'><span style='font-weight: normal;'>1-Lot</span></td>
						<td align='right'><span style='font-weight: normal;'>".$sarana_np."</span></td>
						<td align='right'><span style='font-weight: normal;'>".$sarana_nl."</span></td>
						<td align='right'><input type='number' class='form-control' step='1' max='100' min='0' value='".$sarana_diskon."' style='text-align: right'></td>
					</tr>
				";
			}
		}



		/*TOTAL*/
		{
			$sarana_np	= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 865));
			$sarana_nl	= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 245));
			$sarana_luas = $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 162));

			$sarana_np		= number_format($sarana_np->num_rows() == 1 && !empty($sarana_np->row()->jawab) ? $sarana_np->row()->jawab : 0);
			$sarana_nl		= number_format($sarana_nl->num_rows() == 1 && !empty($sarana_nl->row()->jawab) ? $sarana_nl->row()->jawab : 0);
			$sarana_luas	= number_format($sarana_luas->num_rows() == 1 && !empty($sarana_luas->row()->jawab) ? $sarana_luas->row()->jawab : 0);
			$sarana_nl		= 0;


			$total_np	= $total_np + $sarana_np;
			$total_nl	= $total_nl + $sarana_nl;

			if ($lokasi->id_jenis_objek == 2 || $lokasi->id_jenis_objek == 1){
				$table	.= "
					<tr style='background-color: #eee;'>
						<td align='center' colspan='3'><span>Sub Total PROPERTI ".$urutan."</span></td>
						<td align='right'><span>".number_format($total_np)."</span></td>
						<td align='right'><span>".number_format($total_nl)."</span></td>
					</tr>
				";
			}elseif($lokasi->id_jenis_objek == 6 || $lokasi->id_jenis_objek == 7){
				$table	.= "
					<tr style='background-color: #eee;'>
						<td align='center' colspan='3'><span>Sub Total PROPERTI ".$urutan."</span></td>
						<td align='right'><span>".number_format($total_np)."</span></td>
						<td align='right'><span>".number_format($total_nl)."</span></td>
					</tr>
				";
			}
		}

		echo ($table);
	}
	/*Kertas Kerja*/
	function get_log()
	{
		$id_pekerjaan	= $_GET["id_pekerjaan"];
		$id_status		= $_GET["id_status"];

		$pekerjaan	= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
	}
	function get_history_penilaian()
	{
		$id_lokasi	 	= $_POST["id_lokasi"];
		$lokasi			= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();
		$pekerjaan		= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($lokasi->id_pekerjaan))->row();

		$pekerjaan_history	= $this->global_model->get_data("view_pekerjaan", 1, array("id_klien"), array($pekerjaan->id_klien));
		$id_pekerjaan		= array();
		foreach ($pekerjaan_history->result() as $item_pekerjaan)
		{
			array_push($id_pekerjaan, $item_pekerjaan->id);
		}

		$query				= "SELECT * FROM view_lokasi WHERE id_pekerjaan IN (".implode(",", $id_pekerjaan).") AND no_sertifikat = '".$lokasi->no_sertifikat."' AND jenis_sertifikat = '".$lokasi->jenis_sertifikat."' AND id <> ".$id_lokasi." ";
		$lokasi_history		= $this->global_model->get_by_query($query);

		$data_history		= array();

		foreach	($lokasi_history->result() as $item)
		{
			$txn_tugas	= $this->global_model->get_by_query("SELECT GROUP_CONCAT(mu.nama SEPARATOR ', ') as 'nama' FROM txn_tugas tt JOIN mst_user mu ON mu.id = tt.id_user WHERE id_lokasi =  ".$item->id." ")->row();

			$luas_tanah		= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 162));
			$luas_tanah		= $luas_tanah->num_rows() == 1 && !empty($luas_tanah->row()->jawab) ? $luas_tanah->row()->jawab : 0;

			$luas_bangunan	= $this->global_model->get_by_query("SELECT SUM(jawab) as 'jawab' FROM txn_lokasi_data WHERE id_field = 639 AND id_lokasi = ".$id_lokasi." ");
			$luas_bangunan	= $luas_bangunan->num_rows() == 1 && !empty($luas_bangunan->row()->jawab) ? $luas_bangunan->row()->jawab : 0;

			$np_tanah		= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 244));
			$np_tanah		= $np_tanah->num_rows() == 1 && !empty($np_tanah->row()->jawab) ? $np_tanah->row()->jawab : 0;

			$nl_tanah		= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 245));
			$nl_tanah		= $nl_tanah->num_rows() == 1 && !empty($nl_tanah->row()->jawab) ? $nl_tanah->row()->jawab : 0;

			$np_bangunan	= $this->global_model->get_by_query("SELECT SUM(jawab) as 'jawab' FROM txn_lokasi_data WHERE id_field = 691 AND id_lokasi = ".$id_lokasi." ");
			$np_bangunan	= $np_bangunan->num_rows() == 1 && !empty($np_bangunan->row()->jawab) ? $np_bangunan->row()->jawab : 0;

			$nl_bangunan	= $this->global_model->get_by_query("SELECT SUM(jawab) as 'jawab' FROM txn_lokasi_data WHERE id_field = 692 AND id_lokasi = ".$id_lokasi." ");
			$nl_bangunan	= $nl_bangunan->num_rows() == 1 && !empty($nl_bangunan->row()->jawab) ? $nl_bangunan->row()->jawab : 0;


			$np_sarana		= $this->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($id_lokasi, 865));
			$np_sarana		= $np_sarana->num_rows() == 1 && !empty($np_sarana->row()->jawab) ? $np_sarana->row()->jawab : 0;

			$nl_sarana		= $np_sarana/2;

			$np				= $np_tanah+$np_bangunan+$np_sarana;
			$nl				= $nl_tanah+$nl_bangunan+$nl_sarana;

			$data_history[date("Y", strtotime($item->tanggal_survey))]	= array(
				"nama_surveyor"		=> $txn_tugas->nama,
				"tanggal_inspeksi"	=> $this->spmlib->indonesian_date($item->tanggal_survey, "d F Y", ""),
				"luas_tanah"		=> number_format($luas_tanah),
				"luas_bangunan"		=> number_format($luas_bangunan),
				"np_tanah"			=> number_format($np_tanah),
				"np_bangunan"		=> number_format($np_bangunan),
				"np_sarana"			=> number_format($np_sarana),
				"np"				=> number_format($np),
				"nl"				=> number_format($nl)
			);
		}


		$content	= "";

		$content	.= "
			<table class='table table_border' cellpadding='0' cellspacing='0'>
				<tr bgcolor='#4C9ED9'>
					<td align='center' style='color: #ffffff'>No.</td>
					<td align='center' style='color: #ffffff'>U R A I A N</td>
		";

		foreach ($data_history as $tahun => $item_history)
		{
			$content	.= "
					<td align='center' style='color: #ffffff'>TAHUN ".$tahun."</td>
			";
		}

		$content	.= "
				</tr>
				<tr>
					<td><span>1.</span></td>
					<td><span>Nama Surveyor</span></td>
		";

		foreach ($data_history as $tahun => $item_history)
		{
			$content	.= "
					<td><span>".$item_history["nama_surveyor"]."</span></td>
			";
		}

		$content	.= "
				</tr>
				<tr>
					<td><span>2.</span></td>
					<td><span>Tanggal Inspeksi</span></td>
		";

		foreach ($data_history as $tahun => $item_history)
		{
			$content	.= "
					<td><span>".$item_history["tanggal_inspeksi"]."</span></td>
			";
		}

		$content	.= "
				</tr>
				<tr>
					<td><span>3.</span></td>
					<td><span>Luas Tanah</span></td>
		";

		foreach ($data_history as $tahun => $item_history)
		{
			$content	.= "
					<td align='right'><span>".$item_history["luas_tanah"]."</span></td>
			";
		}

		$content	.= "
				</tr>
				<tr>
					<td><span>4.</span></td>
					<td><span>Luas Bangunan</span></td>
		";

		foreach ($data_history as $tahun => $item_history)
		{
			$content	.= "
					<td align='right'><span>".$item_history["luas_bangunan"]."</span></td>
			";
		}

		$content	.= "
				</tr>
				<tr>
					<td><span>5.</span></td>
					<td><span>Nilai Pasar Tanah</span></td>
		";

		foreach ($data_history as $tahun => $item_history)
		{
			$content	.= "
					<td align='right'><span>".$item_history["np_tanah"]."</span></td>
			";
		}

		$content	.= "
				</tr>
				<tr>
					<td><span>6.</span></td>
					<td><span>Nilai Pasar Bangunan</span></td>
		";

		foreach ($data_history as $tahun => $item_history)
		{
			$content	.= "
					<td align='right'><span>".$item_history["np_bangunan"]."</span></td>
			";
		}

		$content	.= "
				</tr>
				<tr>
					<td><span>6.</span></td>
					<td><span>Nilai Pasar Sarana Pelengkap</span></td>
		";

		foreach ($data_history as $tahun => $item_history)
		{
			$content	.= "
					<td align='right'><span>".$item_history["np_sarana"]."</span></td>
			";
		}

		$content	.= "
				</tr>
				<tr>
					<td><span>7.</span></td>
					<td><span>Nilai Pasar</span></td>
		";

		foreach ($data_history as $tahun => $item_history)
		{
			$content	.= "
					<td align='right'><span>".$item_history["np"]."</span></td>
			";
		}

		$content	.= "
				</tr>
				<tr>
					<td><span>8.</span></td>
					<td><span>Nilai Likuidasi</span></td>
		";

		foreach ($data_history as $tahun => $item_history)
		{
			$content	.= "
					<td align='right'><span>".$item_history["nl"]."</span></td>
			";
		}

		$content	.= "
				</tr>
			</table>
		";

		echo $content;
		/*echo "<pre>";
		print_r($data_history);
		echo "</pre>";*/
	}
	function get_alamat()
	{
		$id_lokasi	 	= $_POST["id_lokasi"];
		$dh_provinsi	= $_POST["dh_provinsi"];
		$dh_kota		= $_POST["dh_kota"];
		$dh_kecamatan	= $_POST["dh_kecamatan"];
		$dh_desa		= $_POST["dh_desa"];

		$this->global_model->update("mst_lokasi", 1, array("id"), array($id_lokasi), array(
			"dh_provinsi"	=> $dh_provinsi,
			"dh_kota"		=> $dh_kota,
			"dh_kecamatan"	=> $dh_kecamatan,
			"dh_desa"		=> $dh_desa
		));

		$lokasi			= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();

		$alamat			= $lokasi->alamat." ".(!empty($lokasi->gang) ? "Gang ".$lokasi->gang : "")." No. ".$lokasi->nomor.", RT. ".$lokasi->rt." RW. ".$lokasi->rw." Kel. ".$lokasi->nama_desa." ".(!empty($lokasi->dh_desa) ? "(d/h ".$lokasi->dh_desa.")" : "")." Kec. ".$lokasi->nama_kecamatan." ".(!empty($lokasi->dh_kecamatan) ? "(d/h ".$lokasi->dh_kecamatan.")" : "")." ".$lokasi->nama_kota." ".(!empty($lokasi->dh_kota) ? "(d/h ".$lokasi->dh_kota.")" : "").", ".$lokasi->nama_provinsi ." ".(!empty($lokasi->dh_provinsi) ? "(d/h ".$lokasi->dh_provinsi.")" : "");

		echo $alamat;
	}
	function update_kertas_kerja($id_kertas_kerja = NULL) {
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		
		$dt_update = array(
			$name => $value
		);
		$this->global_model->update_data('txn_kertas_kerja', 'id_kertas_kerja', $id_kertas_kerja, $dt_update);
	}
	function get_brb_standar_mappi_dbanding($id_kertas_kerja = NULL) {
		$jenis_bangunan = $this->input->post('jenis_bangunan');
		$input_jenis = json_decode($jenis_bangunan, true);
		$jumlah_lantai = $this->input->post('jumlah_lantai');
		$input_lantai = json_decode($jumlah_lantai, true);

		$result = array();
		foreach ( $input_jenis as $index_banding=>$jenis ) {
			$obj = $this->global_model->get_by_query("SELECT * FROM mst_koefisien_lantai WHERE bangunan='". $jenis ."' AND jml_lantai='". $input_lantai[$index_banding] ."'");
			$koefisien = 1;
			if ($obj->num_rows() > 0 ) {
				$koefisien	= $obj->row()->koefisien;
			}

			$biaya_langsung = $biaya_tidak_langsung = $total = 0;
			$where = "tipe <> 'TIPE BANGUNAN MAPPI' AND data3 <> '' AND data1 = '$jenis'";
			$this->db->select('SUM(CAST(data3 AS DECIMAL(10,2))) AS total', false)
					 ->from('mst_reference')
					 ->where($where);
			$query = $this->db->get();
			if ( is_object($query) ) {
				$row = $query->row();
				if ( is_object($row) ) {
					$biaya_langsung = $row->total;
				}
			}
			if ( $biaya_langsung > 0 ) {
				$profesional_fee = $biaya_langsung*0.03;
				$biaya_perizinan = $biaya_langsung*0.015;
				$keuntungan_kontraktor = $biaya_langsung*0.1;
				$biaya_tidak_langsung = $profesional_fee+$biaya_perizinan+$keuntungan_kontraktor;
			}
			$total_biaya_bangunan_baru = $biaya_langsung+$biaya_tidak_langsung;
			$ppn = $total_biaya_bangunan_baru*0.1;
			$total_pembiayaan_setelah_ppn = $total_biaya_bangunan_baru+$ppn;
			$total = round($total_pembiayaan_setelah_ppn, -4);
			$total = $total*$koefisien;
			$result[$index_banding] = $total;
		}
		echo json_encode(array('result' => $result));
	}
	function get_brb_standar_mappi() {
		$jenis_bangunan = $this->input->post('jenis_bangunan');
		$index_banding = $this->input->post('index_dbanding');
		$jumlah_lantai = $this->input->post('lantai');

		$obj = $this->global_model->get_by_query("SELECT * FROM mst_koefisien_lantai WHERE bangunan='". $jenis_bangunan ."' AND jml_lantai='". $jumlah_lantai ."'");
		$koefisien = 1;
		if ($obj->num_rows() > 0 ) {
			$koefisien	= $obj->row()->koefisien;
		}

		$biaya_langsung = $biaya_tidak_langsung = $total = 0;
		$where = "tipe <> 'TIPE BANGUNAN MAPPI' AND data3 <> '' AND data1 = '$jenis_bangunan'";
		$this->db->select('SUM(CAST(data3 AS DECIMAL(10,2))) AS total', false)
			     ->from('mst_reference')
				 ->where($where);
		$query = $this->db->get();
		if ( is_object($query) ) {
			$row = $query->row();
			if ( is_object($row) ) {
				$biaya_langsung = $row->total;
			}
		}
		if ( $biaya_langsung > 0 ) {
			$profesional_fee = $biaya_langsung*0.03;
			$biaya_perizinan = $biaya_langsung*0.015;
			$keuntungan_kontraktor = $biaya_langsung*0.1;
			$biaya_tidak_langsung = $profesional_fee+$biaya_perizinan+$keuntungan_kontraktor;
		}
		$total_biaya_bangunan_baru = $biaya_langsung+$biaya_tidak_langsung;
		$ppn = $total_biaya_bangunan_baru*0.1;
		$total_pembiayaan_setelah_ppn = $total_biaya_bangunan_baru+$ppn;
		$total = round($total_pembiayaan_setelah_ppn, -4);
		$total = $total*$koefisien;
		echo $total;
	}
}
