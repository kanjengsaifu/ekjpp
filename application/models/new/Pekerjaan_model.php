<?php

class Pekerjaan_model extends CI_Model
{
	var $module;
	var $view_pekerjaan = 'view_pekerjaan';
	var $mst_status = 'mst_status';
	var $view_lokasi = 'view_lokasi';
	var $mst_user = 'mst_user';
	var $txn_kertas_kerja = 'txn_kertas_kerja';
	var $mst_kegunaan = 'mst_kegunaan';
	var $mst_jenis_klien = 'mst_jenis_klien';
	var $mst_status_objek = 'mst_status_objek';
	var $mst_debitur = 'mst_debitur';
	var $mst_tujuan = 'mst_tujuan';
	var $txn_tanah = 'txn_tanah';
	var $mst_batas_properti = 'mst_batas_properti';
	var $mst_lokasi_tanah_objek = 'mst_lokasi_tanah_objek';
	var $mst_harga_tanah_objek = 'mst_harga_tanah_objek';
	var $mst_kepadatan_bangunan = 'mst_kepadatan_bangunan';
	var $mst_pertumbuhan_bangunan = 'mst_pertumbuhan_bangunan';
	var $mst_analisa_lingkungan_response = 'mst_analisa_lingkungan_response';
	var $mst_perubahan_lingkungan_response = 'mst_perubahan_lingkungan_response';
	var $mst_tipe_hunian = 'mst_tipe_hunian';
	var $mst_tipe_jalan = 'mst_tipe_jalan';
	var $mst_kehadiran = 'mst_kehadiran';
	var $mst_keterbukaan = 'mst_keterbukaan';
	var $mst_topografi = 'mst_topografi';
	var $mst_jenis_tanah = 'mst_jenis_tanah';
	var $mst_tipe_penilaian = 'mst_tipe_penilaian';
	var $mst_tipe_kejadian = 'mst_tipe_kejadian';
	var $mst_tipe_posisi_tanah = 'mst_tipe_posisi_tanah';
	var $r_data_legalitas = 'r_data_legalitas';
	var $mst_tipe_sertifikat = 'mst_tipe_sertifikat';
	var $mst_arsitektur_bangunan = 'mst_arsitektur_bangunan';
	var $txn_bangunan = 'txn_bangunan';
	var $mst_tipe_pondasi = 'mst_tipe_pondasi';
	var $mst_tipe_struktur = 'mst_tipe_struktur';
	var $mst_tipe_rangka_atap = 'mst_tipe_rangka_atap';
	var $mst_tipe_penutup_atap = 'mst_tipe_penutup_atap';
	var $mst_tipe_plafond = 'mst_tipe_plafond';
	var $mst_tipe_dinding = 'mst_tipe_dinding';
	var $mst_tipe_partisi_ruangan = 'mst_tipe_partisi_ruangan';
	var $mst_tipe_kusen = 'mst_tipe_kusen';
	var $mst_tipe_pintu_jendela = 'mst_tipe_pintu_jendela';
	var $mst_tipe_lantai = 'mst_tipe_lantai';
	var $mst_tipe_tangga = 'mst_tipe_tangga';
	var $mst_tipe_pagar_halaman = 'mst_tipe_pagar_halaman';
	var $mst_jaringan_air = 'mst_jaringan_air';
	var $mst_tipe_pendingin_ruangan = 'mst_tipe_pendingin_ruangan';
	var $mst_tipe_pemanas_air = 'mst_tipe_pemanas_air';
	var $mst_tipe_bangunan = 'mst_tipe_bangunan';
	var $mst_tipe_masa_bangunan = 'mst_tipe_masa_bangunan';
	var $mst_tipe_penangkal_petir = 'mst_tipe_penangkal_petir';
	var $mst_tipe_kolam_renang = 'mst_tipe_kolam_renang';
	var $mst_tipe_area_parkir = 'mst_tipe_area_parkir';
	var $mst_tipe_pemagaran_halaman = 'mst_tipe_pemagaran_halaman';
	var $mst_tipe_keadaan_halaman = 'mst_tipe_keadaan_halaman';
	var $mst_tipe_bangunan_btb = 'mst_tipe_bangunan_btb';
	var $mst_tipe_renovasi = 'mst_tipe_renovasi';
	var $mst_klasifikasi_bangunan = 'mst_klasifikasi_bangunan';
	var $mst_zoning = 'mst_zoning';
	var $mst_kelas_bangunan = 'mst_kelas_bangunan';
	var $mst_tipe_lokasi_kios = 'mst_tipe_lokasi_kios';
	var $mst_daya_listrik = 'mst_daya_listrik';
	var $mst_pemasangan = 'mst_pemasangan';
	var $txn_data_banding = 'txn_data_banding';
	var $mst_keterangan_sumber_data = 'mst_keterangan_sumber_data';
	var $mst_jenis_properti = 'mst_jenis_properti';
	var $mst_waktu_penawaran = 'mst_waktu_penawaran';
	var $mst_tipe_legalitas_tanah = 'mst_tipe_legalitas_tanah';
	var $mst_bentuk_tanah = 'mst_bentuk_tanah';
	var $mst_kondisi_existing_tanah = 'mst_kondisi_existing_tanah';
	var $mst_brb_bangunan = 'mst_brb_bangunan';
	var $txn_lokasi_data = 'txn_lokasi_data';
	var $mst_field_objek = 'mst_field_objek';
	var $txn_sarana_pelengkap = 'txn_sarana_pelengkap';
	var $mst_tipe_perkerasan = 'mst_tipe_perkerasan';
	var $txn_lampiran = 'txn_lampiran';
	var $txn_ruang_lantai = 'txn_ruang_lantai';
	var $mst_tipe_pusat_perbelanjaan = 'mst_tipe_pusat_perbelanjaan';
	var $mst_tipe_strategis = 'mst_tipe_strategis';
	var $mst_tipe_posisi_kios = 'mst_tipe_posisi_kios';
	var $mst_kondisi_eksterior_interior = 'mst_kondisi_eksterior_interior';
	var $mst_persen_deviasi = 'mst_persen_deviasi';
	var $mst_lokasi_bidang_tanah = 'mst_lokasi_bidang_tanah';
	var $mst_arah = 'mst_arah';
	var $mst_peruntukan_kawasan = 'mst_peruntukan_kawasan';
	var $mst_sumber_nomor_sertifikat = 'mst_sumber_nomor_sertifikat';
	var $txn_tugas = 'txn_tugas';

	function __construct()
	{
		parent::__construct();
	}

    function initialize($module) 
    {
        if ( !empty($module) )
            $this->module = $module;
        else
            $this->module = $this->module;
    }

    function show_datatable($column_datatable, $iDisplayStart, $iDisplayLength, $order, $sSearch)
    {
        $aColumns = $column_datatable;
        $columns = $this->input->get_post('columns', true);
        $where = "1=1";
        $iDisplayLength_escaped = $this->db->escape_str($iDisplayLength);
        $iDisplayStart_escaped = $this->db->escape_str($iDisplayStart);

		$user = $this->auth->get_data_login();

        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($iDisplayLength_escaped, $iDisplayStart_escaped);
        }

        if( isset($order) > 0 )
        {
            for( $i=0; $i<count($order); $i++ ) 
            {
                $orderable = $columns[$order[$i]['column']]['orderable'];
                if( $orderable == 'true' )
                {
                    $column = $aColumns[intval($order[$i]['column'])];
                    $dir = $order[$i]['dir'];
                    $this->db->order_by($column, $dir);
                }
            }
        }

        if ( count($order) < 1 ) 
        {
            //$this->db->order_by($this->pk_name, 'desc');
        }

        if( isset($sSearch) && !empty($sSearch['value']) ) 
        {
            $where .= " AND (";
            for( $i=0; $i<count($aColumns); $i++ )
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                if( $columns[$i]['searchable'] == 'true')
                {
                    if (!empty($aColumns[$i]))
                    {
                        $where .= "LOWER(".$aColumns[$i].") LIKE '%".strtolower($this->db->escape_like_str($sSearch['value']))."%' OR ";
                    }
                }
            }
            $where  = substr($where, 0, strlen($where)-4);
            $where .= ")";
        }

        if ($user['id_group'] != 2)
        {
        	$where .= " AND A.id_group='".$user['id_group']."'";
        }

        $this->db->where($where);
        $this->db->select('A.*');
        $this->db->from($this->view_pekerjaan .' A');

        $rResult = $this->db->get();

        $this->db->where($where);
        $this->db->from($this->view_pekerjaan .' A');

        $iFilteredTotal = $this->db->count_all_results();
        $iTotal = $iFilteredTotal;
        $output = array(
            'sEcho' => 0,
            'iTotalRecords' => 0,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );

        $nomor = (!empty($iDisplayStart) && $iDisplayStart != -1 ) ? $iDisplayStart+1 : 1;

        $total_records = 0; 
        foreach($rResult->result_array() as $aRow)
        {
            $row = array();

			$mst_status	= $this->get_status($aRow['id_status']);
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

			$action	= "";
			$action	.= "<div class='text-center'>";
			$action .= "<a href='".base_url().$this->module."/detail/".base64_encode($aRow['id'])."'><span class='badge bg-blue'>PROSES</span></a> ";

			if ($user["id_group"] == 2)
			{
				$action .= "<a href='".base_url().$this->module."/log/".base64_encode($aRow['id'])."'><span class='badge bg-blue'>LOG</span></a>";
			}

			$action	.= "</div>";

            $row[] = $nomor;
            $row[] = $aRow['nama'];
            $row[] = $aRow['nama_klien'];
            $row[] = $aRow['tanggal_penerimaan'];
            $row[] = $aRow['nama_group'];
            $row[] = $status;
            $row[] = $action;

            $output['aaData'][] = $row;
            $nomor++;
            $total_records++;
        }
        $output['iTotalDisplayRecords'] = $total_records;
        echo json_encode($output);
    }
    
    function datatable_penugasan($column_datatable, $iDisplayStart, $iDisplayLength, $order, $sSearch, $con=array())
    {
    	$id_pekerjaan = $con['id_pekerjaan'];
		$user = $this->auth->get_data_login();

        $aColumns = $column_datatable;
        $columns = $this->input->get_post('columns', true);
        $where = "1=1";
        $iDisplayLength_escaped = $this->db->escape_str($iDisplayLength);
        $iDisplayStart_escaped = $this->db->escape_str($iDisplayStart);

        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($iDisplayLength_escaped, $iDisplayStart_escaped);
        }

        if( isset($order) > 0 )
        {
            for( $i=0; $i<count($order); $i++ ) 
            {
                $orderable = $columns[$order[$i]['column']]['orderable'];
                if( $orderable == 'true' )
                {
                    $column = $aColumns[intval($order[$i]['column'])];
                    $dir = $order[$i]['dir'];
                    $this->db->order_by($column, $dir);
                }
            }
        }

        if ( count($order) < 1 ) 
        {
            //$this->db->order_by($this->pk_name, 'desc');
        }

        if( isset($sSearch) && !empty($sSearch['value']) ) 
        {
            $where .= " AND (";
            for( $i=0; $i<count($aColumns); $i++ )
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                if( $columns[$i]['searchable'] == 'true')
                {
                    if (!empty($aColumns[$i]))
                    {
                        $where .= "LOWER(".$aColumns[$i].") LIKE '%".strtolower($this->db->escape_like_str($sSearch['value']))."%' OR ";
                    }
                }
            }
            $where  = substr($where, 0, strlen($where)-4);
            $where .= ")";
        }

        $this->db->where($where);
        $this->db->where('A.id_pekerjaan', $id_pekerjaan);
        $this->db->select('A.*');
        $this->db->from($this->view_lokasi .' A');

        $rResult = $this->db->get();

		//var_dump($this->db->last_query());exit();
		
        $this->db->where($where);
        $this->db->where('A.id_pekerjaan', $id_pekerjaan);
        $this->db->from($this->view_lokasi .' A');

        $iFilteredTotal = $this->db->count_all_results();
        $iTotal = $iFilteredTotal;
        $output = array(
            'sEcho' => 0,
            'iTotalRecords' => 0,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );

        $nomor = (!empty($iDisplayStart) && $iDisplayStart != -1 ) ? $iDisplayStart+1 : 1;

        $total_records = 0; 
		$pekerjaan = $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$status			= $this->global_model->get_data("mst_status", 1, array("id"), array($pekerjaan->id_status))->row();

		$res = $rResult->result();
		$i = 0;
        foreach($res as $item_lokasi)
        {
            $row = array();

			if ($user["id_group"] == 7 && in_array($pekerjaan->id_status, array(16,17,18,19)))
			{
				$cek_petugas	= $this->global_model->get_data("txn_tugas", 2, array("id_lokasi", "id_user"), array($item_lokasi->id, $user["id"]));

				if ($cek_petugas->num_rows() > 0)
				{
					$row[] = $nomor;
					$row[] = !empty($item_lokasi->kode) ? $item_lokasi->kode : "-";
					$row[] = $item_lokasi->alamat." ".(!empty($item_lokasi->gang) ? "Gang ".$item_lokasi->gang : "")." No. ".$item_lokasi->nomor.", RT. ".$item_lokasi->rt." RW. ".$item_lokasi->rw."<br> Kel. ".$item_lokasi->nama_desa." ".(!empty($item_lokasi->dh_desa) ? "(d/h ".$item_lokasi->dh_desa.")" : "")." Kec. ".$item_lokasi->nama_kecamatan." ".(!empty($item_lokasi->dh_kecamatan) ? "(d/h ".$item_lokasi->dh_kecamatan.")" : "")." ".$item_lokasi->nama_kota." ".(!empty($item_lokasi->dh_kota) ? "(d/h ".$item_lokasi->dh_kota.")" : "");
					$row[] = !empty($item_lokasi->nama_provinsi) ? $item_lokasi->nama_provinsi : "-";
					$row[] = $item_lokasi->tanggal_mulai;
					$row[] = $item_lokasi->jam;
					$row[] = $item_lokasi->tanggal_selesai;
					$row[] = number_format($item_lokasi->biaya);
					$row[] = "<div class='text-center'>".$user["nama"]."</div>";

					if ($pekerjaan->id_status == 16 || $pekerjaan->id_status == 17)
					{
						$row[]	= "<div class='text-center'><a href='".base_url()."printpdf/surat_tugas/".base64_encode($item_lokasi->id)."' target='_blank' class='btn btn-primary btn-sm btn-print-tugas download'>DOWNLOAD SURAT TUGAS</a></div>";
					}

					if ($pekerjaan->id_status == 17)
					{
						$row[] = "<div class='text-center'><a href='".base_url().$this->module."/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>INPUT KERTAS KERJA</a></div> ";
					}
					else
					if ($pekerjaan->id_status >= 18 || $pekerjaan->id_status == 19 || $pekerjaan->id_status == 20)
					{
						$row[] = "<div class='text-center'><a href='".base_url().$this->module."/pekerjaan_baru/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>KERTAS KERJA</a></div> ";
					}

					$i++;
					$nomor++;
				}
			}
			else
			{
				$row[] = $nomor;
				$row[] = !empty($item_lokasi->kode) ? $item_lokasi->kode : "-";
				$row[] = $item_lokasi->alamat." ".(!empty($item_lokasi->gang) ? "Gang ".$item_lokasi->gang : "")." No. ".$item_lokasi->nomor.", RT. ".$item_lokasi->rt." RW. ".$item_lokasi->rw." Kel. ".$item_lokasi->nama_desa." ".(!empty($item_lokasi->dh_desa) ? "(d/h ".$item_lokasi->dh_desa.")" : "")." Kec. ".$item_lokasi->nama_kecamatan." ".(!empty($item_lokasi->dh_kecamatan) ? "(d/h ".$item_lokasi->dh_kecamatan.")" : "")." ".$item_lokasi->nama_kota." ".(!empty($item_lokasi->dh_kota) ? "(d/h ".$item_lokasi->dh_kota.")" : "");
				$row[] = !empty($item_lokasi->nama_provinsi) ? $item_lokasi->nama_provinsi : "-";

				if ($status->tambah_petugas)
				{
					$row[] 		= "
						<div class='input-group date default-date-picker' data-date-format='yyyy-mm-dd' data-date-autoclose='true' style='width: 130px;'>
							<input type='text' id='tanggal_mulai_".$item_lokasi->id."' name='tanggal_mulai'  class='form-control input-sm tanggal_mulai textbox_penugasan' value='".$item_lokasi->tanggal_mulai."' placeholder='Tanggal Mulai' data-id-lokasi='".$item_lokasi->id."' />
							<span class='input-group-addon'><i class='fa fa-calendar'></i></span>
						</div>
					";


					$row[] 					= '
						<div class="input-group time" id="datetimepicker3" style="width: 95px;">
							<input id="jam_'.$item_lokasi->id.'" name="jam" class="form-control input-sm jam textbox_penugasan" value="'.$item_lokasi->jam.'" required="" data-format="hh:mm:ss" type="text"  data-id-lokasi="'.$item_lokasi->id.'">
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
							</span>
						</div>

					';

					$row[] 		= "
						<div class='input-group date default-date-picker' data-date-format='yyyy-mm-dd' data-date-autoclose='true' style='width: 130px;'>
							<input type='text' id='tanggal_selesai_".$item_lokasi->id."' name='tanggal_selesai'  class='form-control input-sm tanggal_selesai  textbox_penugasan' value='".$item_lokasi->tanggal_selesai."' placeholder='Tanggal Selesai' data-id-lokasi='".$item_lokasi->id."' />
							<span class='input-group-addon'><i class='fa fa-calendar'></i></span>
						</div>
					";
					$row[] 				= "
						<input type='text' name='biaya' class='form-control input-sm biaya textbox_penugasan' value='".$item_lokasi->biaya."' placeholder='Biaya' data-id-lokasi='".$item_lokasi->id."' style='min-width: 70px;' />
					";
				}
				else
				{
					$row[] = $item_lokasi->tanggal_mulai;
					$row[] = $item_lokasi->jam;
					$row[] = $item_lokasi->tanggal_selesai;
					$row[] = number_format($item_lokasi->biaya);
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

				$row[] 				= "<div class='text-center'>".$petugas."</div>";

				if ($pekerjaan->id_status == 16 || $pekerjaan->id_status == 17)
				{
					$row[]	= "<div class='text-center'><a href='".base_url()."printpdf/surat_tugas/".base64_encode($item_lokasi->id)."' target='_blank' class='btn btn-primary btn-sm btn-print-tugas download'>DOWNLOAD SURAT TUGAS</a></div>";
				}

				if ($pekerjaan->id_status == 17)
				{
					$row[] = "<div class='text-center'><a href='".base_url().$this->module."/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>INPUT KERTAS KERJA</a></div> ";
				}
				else
				if ($pekerjaan->id_status >= 18 || $pekerjaan->id_status == 19 || $pekerjaan->id_status == 20)
				{
					$row[] = "<div class='text-center'><a href='".base_url().$this->module."/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>KERTAS KERJA</a></div> ";
				}

				$i++;
				$nomor++;
			}

            // $row[] = $nomor;
            // $row[] = $aRow['nama'];
            // $row[] = $aRow['nama_klien'];
            // $row[] = $aRow['tanggal_penerimaan'];
            // $row[] = $aRow['nama_group'];
            // $row[] = $status;
            // $row[] = $action;

            $output['aaData'][] = $row;
            $nomor++;
            $total_records++;
        }
        $output['iTotalDisplayRecords'] = $total_records;
        echo json_encode($output);
    }
    
    function datatable_legalitas($column_datatable, $iDisplayStart, $iDisplayLength, $order, $sSearch, $con=array())
    {
    	$id_lokasi = $con['id_lokasi'];
        $aColumns = $column_datatable;
        $columns = $this->input->get_post('columns', true);
        $where = "1=1";
        $iDisplayLength_escaped = $this->db->escape_str($iDisplayLength);
        $iDisplayStart_escaped = $this->db->escape_str($iDisplayStart);

		$user = $this->auth->get_data_login();

        if(isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->db->limit($iDisplayLength_escaped, $iDisplayStart_escaped);
        }

        if( isset($order) > 0 )
        {
            for( $i=0; $i<count($order); $i++ ) 
            {
                $orderable = $columns[$order[$i]['column']]['orderable'];
                if( $orderable == 'true' )
                {
                    $column = $aColumns[intval($order[$i]['column'])];
                    $dir = $order[$i]['dir'];
                    $this->db->order_by($column, $dir);
                }
            }
        }

        if ( count($order) < 1 ) 
        {
            //$this->db->order_by($this->pk_name, 'desc');
        }

        if( isset($sSearch) && !empty($sSearch['value']) ) 
        {
            $where .= " AND (";
            for( $i=0; $i<count($aColumns); $i++ )
            {
                $bSearchable = $this->input->get_post('bSearchable_'.$i, true);

                if( $columns[$i]['searchable'] == 'true')
                {
                    if (!empty($aColumns[$i]))
                    {
                        $where .= "LOWER(".$aColumns[$i].") LIKE '%".strtolower($this->db->escape_like_str($sSearch['value']))."%' OR ";
                    }
                }
            }
            $where  = substr($where, 0, strlen($where)-4);
            $where .= ")";
        }

        $this->db->where($where);
        $this->db->where('A.id_lokasi', $id_lokasi);
        $this->db->select('A.*');
        $this->db->from($this->r_data_legalitas .' A');

        $rResult = $this->db->get();

        $this->db->where($where);
        $this->db->where('A.id_lokasi', $id_lokasi);
        $this->db->from($this->r_data_legalitas .' A');

        $iFilteredTotal = $this->db->count_all_results();
        $iTotal = $iFilteredTotal;
        $output = array(
            'sEcho' => 0,
            'iTotalRecords' => 0,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );

        $nomor = (!empty($iDisplayStart) && $iDisplayStart != -1 ) ? $iDisplayStart+1 : 1;

        $total_records = 0; 
        $tipe_sertifikat = $this->get_tipe_sertifikat();

        foreach($rResult->result_array() as $aRow)
        {
            $row = array();
		    $jenis_sertifikat = '<select class="form-control table_input" id="textbox_tanah_53" name="update[tanah_53]" data-id-field="154" data-keterangan="1">
		         <option selected="selected" disabled="disabled">Select</option>';
		    foreach ($tipe_sertifikat as $key => $value) {
		    	$selected = ($value->tipe_sertifikat==$aRow['jenis_sertifikat']) ? "selected" : "";
		         $jenis_sertifikat .= '<option value="'.$value->tipe_sertifikat.'" '.$selected.'>'.$value->tipe_sertifikat.'</option>';
		    }
		    
		    $jenis_sertifikat .= '</select>';

		    $nomor_sertifikat = '<input type="text" id="textbox_tanah_54" name="update[tanah_54]" class="form-control table_input" value="'.$aRow['nomor_sertifikat'].'" required="" data-id-field="155" data-keterangan="1">';

		    $atas_nama = '<input type="text" id="textbox_tanah_55" name="update[tanah_55]" class="form-control table_input" value="'.$aRow['atas_nama'].'" required="" data-id-field="156" data-keterangan="1">';

		    $tanggal_sertifikat_terbit = '<input type="text" id="textbox_tanah_56" name="update[tanah_56]" class="form-control table_input textbox_tanah_56" value="'.$aRow['tanggal_sertifikat_terbit'].'" required="" data-id-field="157" data-date-format="dd-mm-yyyy" data-date-autoclose="true" data-keterangan="1"> <script> $(".textbox_tanah_56[data-keterangan=1]").datepicker(); </script>';

		    $tanggal_sertifikat_berakhir = '<input type="text" id="textbox_tanah_57" name="update[tanah_57]" class="form-control table_input textbox_tanah_57" value="'.$aRow['tanggal_sertifikat_berakhir'].'" required="" data-id-field="158" data-date-format="dd-mm-yyyy" data-date-autoclose="true" data-keterangan="1"> <script> $(".textbox_tanah_57[data-keterangan=1]").datepicker(); </script>';

		    $nomor_sertifikat = '<input type="text" id="textbox_tanah_58" name="update[tanah_58]" class="form-control table_input" value="'.$aRow['nomor'].'" required="" data-id-field="159" data-keterangan="1">';

		    $tgl_bln_thn = '<input type="text" id="textbox_tanah_59" name="update[tanah_59]" class="form-control table_input textbox_tanah_59" value="'.$aRow['tgl_bln_thn'].'" required="" data-id-field="160" data-date-format="dd-mm-yyyy" data-date-autoclose="true" data-keterangan="1"> <script> $(".textbox_tanah_59[data-keterangan=1]").datepicker();  </script>';

		    $luas_tanah = '<input type="text" id="textbox_tanah_60" name="update[tanah_60]" class="form-control table_input text-right" value="'.$aRow['luas_tanah'].'" required="" data-id-field="161" data-keterangan="1">';

            $btn = '<div class="text-center"><i class="fa fa-trash btn-data-legalitas" data-id="1" data-type="delete" aria-hidden="true" style="cursor: pointer; "></i></div>';

            $row[] = $nomor;
            $row[] = $jenis_sertifikat;
            $row[] = $nomor_sertifikat;
            $row[] = $atas_nama;
            $row[] = $tanggal_sertifikat_terbit;
            $row[] = $tanggal_sertifikat_berakhir;
            $row[] = $nomor_sertifikat;
            $row[] = $tgl_bln_thn;
            $row[] = $luas_tanah;
            $row[] = $btn;

            $output['aaData'][] = $row;
            $nomor++;
            $total_records++;
        }
        $output['iTotalDisplayRecords'] = $total_records;
        echo json_encode($output);
    }
    

    function get_status($id_status)
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_status." A");
    	$this->db->where('id', $id_status);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->row();
    		return $row;
    	}
    	return false;
    }

    function get_list_penandatangan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_user." A");
    	$this->db->where("is_tandatanganlaporan", 1);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_txn_kertas_kerja_by_id_lokasi($id_lokasi)
    {
    	$this->db->select('A.*');
    	$this->db->from($this->txn_kertas_kerja.' A');
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->row_array();
    		return $row;
    	}
    	return false;
    }
    function get_txn_bangunan_by_id_lokasi($id_lokasi)
    {
    	$this->db->select('A.*');
    	$this->db->from($this->txn_bangunan.' A');
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->row_array();
    		return $row;
    	}
    	return false;
    }
    function get_txn_sarana_pelengkap_by_id_lokasi($id_lokasi)
    {
    	$this->db->select('A.*');
    	$this->db->from($this->txn_sarana_pelengkap.' A');
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->row_array();
    		return $row;
    	}
    	return false;
    }
    function get_txn_lampiran_by_id_lokasi($id_lokasi)
    {
    	$this->db->select('A.*');
    	$this->db->from($this->txn_lampiran.' A');
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result_array();
    		return $row;
    	}
    	return false;
    }
    function get_txn_lampiran_by_jenis($id_lokasi, $jenis_lampiran)
    {
    	$this->db->select('A.*');
    	$this->db->from($this->txn_lampiran.' A');
    	$this->db->where('A.jenis_lampiran', $jenis_lampiran);
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->row_array();
    		return $row;
    	}
    	return false;
    }
    function get_list_kegunaan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_kegunaan." A");
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_jenis_klien()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_jenis_klien.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_status_objek()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_status_objek.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_debitur()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_debitur.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tujuan_penilaian()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tujuan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_txn_tanah_by_id_lokasi($id_lokasi)
    {
    	$this->db->select('A.*');
    	$this->db->from($this->txn_tanah.' A');
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->row_array();
    		return $row;
    	}
    	return false;
    }
    function get_batas_properti()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_batas_properti.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_lokasi_tanah_objek()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_lokasi_tanah_objek.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_harga_tanah_objek()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_harga_tanah_objek.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_kepadatan_bangunan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_kepadatan_bangunan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_pertumbuhan_bangunan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_pertumbuhan_bangunan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_analisa_lingkungan_response()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_analisa_lingkungan_response.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_perubahan_lingkungan_response()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_perubahan_lingkungan_response.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_hunian()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_hunian.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_jalan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_jalan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_kehadiran()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_kehadiran.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_keterbukaan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_keterbukaan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_topografi()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_topografi.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_jenis_tanah()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_jenis_tanah.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_penilaian()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_penilaian.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_kejadian()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_kejadian.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_posisi_tanah()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_posisi_tanah.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_data_legalitas_tanah_by_id_lokasi($id_lokasi)
    {
    	$this->db->select('A.*');
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$this->db->from($this->r_data_legalitas.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_sertifikat()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_sertifikat.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
	function bangunan_list_field($id_jenis_objek)
	{
		if($id_jenis_objek == 1 || $id_jenis_objek == 2)
		{
			$list_field = $this->global_model->get_by_query("SELECT * FROM mst_field_objek WHERE id_jenis_objek = 2 AND nama LIKE '%bangunan%' ");
		}
		else if ($id_jenis_objek == 6) 
		{
			$list_field = $this->global_model->get_by_query("SELECT * FROM mst_field_objek_apartemen WHERE id_jenis_objek = 6 AND nama LIKE '%bangunan%' ");
		}
		else if ($id_jenis_objek == 7) 
		{
			$list_field = $this->global_model->get_by_query("SELECT * FROM mst_field_objek_office_space WHERE id_jenis_objek = 7 AND nama LIKE '%bangunan%' ");
		}
		else if ($id_jenis_objek==5)
		{
			$list_field = $this->global_model->get_by_query("SELECT * FROM mst_field_objek_ruko WHERE id_jenis_objek = 5 AND nama LIKE '%bangunan%' ");
		}
		else if ($id_jenis_objek==3)
		{
			$list_field = $this->global_model->get_by_query("SELECT * FROM mst_field_objek_kios WHERE id_jenis_objek = 3 AND nama LIKE '%bangunan%' ");
		}
		$result = $list_field->result();
		return $result;
	}
    function get_arsitektur_bangunan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_arsitektur_bangunan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_pondasi()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_pondasi.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_struktur()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_struktur.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_rangka_atap()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_rangka_atap.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_penutup_atap()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_penutup_atap.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_plafond()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_plafond.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_dinding()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_dinding.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_partisi_ruangan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_partisi_ruangan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_kusen()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_kusen.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_pintu_jendela()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_pintu_jendela.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_lantai()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_lantai.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_tangga()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_tangga.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_pagar_halaman()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_pagar_halaman.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_jaringan_air()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_jaringan_air.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_pendingin_ruangan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_pendingin_ruangan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_tipe_pemanas_air()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_pemanas_air.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_bangunan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_bangunan.' A');
    	$this->db->order_by("A.tipe_bangunan", "ASC");
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_zoning()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_zoning.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_masa_bangunan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_masa_bangunan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_penangkal_petir()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_penangkal_petir.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_kolam_renang()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_kolam_renang.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_area_parkir()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_area_parkir.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_pemagaran_halaman()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_pemagaran_halaman.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_keadaan_halaman()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_keadaan_halaman.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_bangunan_btb()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_bangunan_btb.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_renovasi()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_renovasi.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_klasifikasi_bangunan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_klasifikasi_bangunan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_kelas_bangunan($klasifikasi_bangunan="")
    {
    	if (!empty($klasifikasi_bangunan))
    	{
    		$this->db->where("tipe", $klasifikasi_bangunan);
    	}
    	$this->db->select('A.*');
    	$this->db->from($this->mst_kelas_bangunan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_lokasi_kios()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_lokasi_kios.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_posisi_kios()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_posisi_kios.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_daya_listrik()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_daya_listrik.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_pemasangan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_pemasangan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_txn_data_banding_by_id_lokasi($id_lokasi)
    {
    	$this->db->select('A.*');
    	$this->db->from($this->txn_data_banding.' A');
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result_array();
    		return $row;
    	}
    	return false;
    }

    function get_txn_data_banding_jenis_pembanding($id_lokasi, $jenis_pembanding)
    {
    	$this->db->select('A.*');
    	$this->db->from($this->txn_data_banding.' A');
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$this->db->where('A.jenis_pembanding', $jenis_pembanding);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->row_array();
    		return $row;
    	}
    	return false;
    }

    function get_keterangan_sumber_data()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_keterangan_sumber_data.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }

    function get_jenis_properti()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_jenis_properti.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_waktu_penawaran()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_waktu_penawaran.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_legalitas_tanah()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_legalitas_tanah.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_bentuk_tanah()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_bentuk_tanah.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_kondisi_existing_tanah()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_kondisi_existing_tanah.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_brb_bangunan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_brb_bangunan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_perkerasan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_perkerasan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_value_kertas_kerja($id_pekerjaan, $id_lokasi, $id_field)
    {
    	$this->db->select('A.*');
    	$this->db->where('A.id_field', $id_field);
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$this->db->from($this->txn_lokasi_data.' A');
    	$query = $this->db->get();
    	// echo $this->db->last_query(); exit();

    	$value = '';
    	if ($query->num_rows() == 0)
    	{
    		$pekerjaan = $this->get_pekerjaan($id_pekerjaan);
    		$item_field = $this->get_field_object($id_field);
    		$lokasi = $this->get_lokasi($id_lokasi);

			$get_data_login = $this->auth->get_data_login();

			if ($item_field->nama == "entry_3")
			{
				$value	= $pekerjaan->nama_penilai;
			}
			else if ($item_field->nama == "entry_5")
			{
				$value	= $get_data_login["nama"];
			}
			else if ($item_field->nama == "entry_7")
			{
				$value	= $pekerjaan->nama_klien;
			}
			else if ($item_field->nama == "entry_9")
			{
				$value	= date("d-m-Y", strtotime($lokasi->tanggal_mulai));
			}
			else if ($item_field->nama == "entry_12")
			{
				$value	= "";
			}
			else if ($item_field->nama == "entry_2")
			{
				$value	= $lokasi->nama_jenis_objek;
			}
			else if ($item_field->nama == "entry_18")
			{
				$value	= $lokasi->alamat." ".(!empty($lokasi->gang) ? "Gang ".$lokasi->gang : "")." No. ".$lokasi->nomor.", RT. ".$lokasi->rt." RW. ".$lokasi->rw." Kel. ".$lokasi->nama_desa." ".(!empty($lokasi->dh_desa) ? "(d/h ".$lokasi->dh_desa.")" : "")." Kec. ".$lokasi->nama_kecamatan." ".(!empty($lokasi->dh_kecamatan) ? "(d/h ".$lokasi->dh_kecamatan.")" : "")." ".$lokasi->nama_kota." ".(!empty($lokasi->dh_kota) ? "(d/h ".$lokasi->dh_kota.")" : "").", ".$lokasi->nama_provinsi ." ".(!empty($lokasi->dh_provinsi) ? "(d/h ".$lokasi->dh_provinsi.")" : "") ;
			}
			else if ($item_field->nama == "entry_21")
			{
				$value	= $lokasi->nama_provinsi;
			}
			else if ($item_field->nama == "entry_23")
			{
				$value	= $lokasi->nama_kota;
			}
			else if ($item_field->nama == "entry_25")
			{
				$value	= $lokasi->nama_kecamatan;
			}
			else if ($item_field->nama == "entry_27")
			{
				$value	= $lokasi->nama_desa;
			}

    	}
    	else
    	{
	    	if (is_object($query))
	    	{
		    	$row = $query->row();
		    	$value = $row->jawab;
	    	}
    	}
    	return $value;
    }
    function get_pekerjaan($id_pekerjaan)
    {
    	$this->db->select('A.*');
    	$this->db->where('A.id', $id_pekerjaan);

    	$this->db->from($this->view_pekerjaan.' A');
    	$query = $this->db->get();
    	// echo $this->db->last_query(); exit();
    	if (is_object($query))
    	{
	    	$row = $query->row();
	    	return $row;
    	}
    	return false;
    }
    function get_field_object($id)
    {
    	$this->db->select('A.*');
    	$this->db->where('A.id', $id);

    	$this->db->from($this->mst_field_objek.' A');
    	$query = $this->db->get();
    	// echo $this->db->last_query(); exit();
    	if (is_object($query))
    	{
	    	$row = $query->row();
	    	return $row;
    	}
    	return false;
    }
    function get_lokasi($id)
    {
    	$this->db->select('A.*');
    	$this->db->where('A.id', $id);

    	$this->db->from($this->view_lokasi.' A');
    	$query = $this->db->get();
    	// echo $this->db->last_query(); exit();
    	if (is_object($query))
    	{
	    	$row = $query->row();
	    	return $row;
    	}
    	return false;
    }
    function insert_txn_lampiran($data)
    {
    	unset($data['id_lampiran']);
    	$this->db->insert($this->txn_lampiran, $data);
    	$return_id = $this->db->insert_id();
    	return $return_id;
    }
    function update_txn_lampiran($data)
    {
    	$this->db->where("id_lampiran", $data['id_lampiran']);
    	$this->db->update($this->txn_lampiran, $data);
    	return true;
    }
    function get_list_ruangan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_perkerasan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_luas_kordiant_as_key($id_lokasi, $bangunan_role, $jenis="Ruangan")
    {
    	$this->db->select('A.*');
    	$this->db->from($this->txn_ruang_lantai.' A');
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$this->db->where('A.bangunan_role', $bangunan_role);
    	$this->db->where('A.jenis', $jenis);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$result = $query->result_array();
    		$new_result = array();
    		for ($i=0; $i<count($result); $i++)
    		{
    			$koordinat_x = $result[$i]['koordinat_x'];
    			$koordinat_y = $result[$i]['koordinat_y'];
    			$luas = $result[$i]['luas'];
    			$new_result[$koordinat_x][$koordinat_y] = $luas;

    		}
    		return $new_result;
    	}
    	return array();
    }
    function get_tipe_pusat_perbelanjaan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_pusat_perbelanjaan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_tipe_strategis()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_tipe_strategis.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_kondisi_eksterior_interior()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_kondisi_eksterior_interior.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_nilai_deviasi($id_jenis_objek)
    {
    	$this->db->select('A.nilai');
    	$this->db->from($this->mst_persen_deviasi.' A');
    	$this->db->where("A.id_jenis_objek", $id_jenis_objek);
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->row_array();
    		return $row['nilai'];
    	}
    	return 0;
    }
    function get_lokasi_bidang_tanah()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_lokasi_bidang_tanah.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_arah()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_arah.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_peruntukan_kawasan()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_peruntukan_kawasan.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_sumber_nomor_sertifikat()
    {
    	$this->db->select('A.*');
    	$this->db->from($this->mst_sumber_nomor_sertifikat.' A');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function get_petugas($id_lokasi = '')
    {

    	$this->db->select('A.*,B.*');
    	$this->db->where('A.id_lokasi', $id_lokasi);
    	$this->db->from($this->txn_tugas.' A');
    	$this->db->join($this->mst_user.' B', 'B.id=A.id_user', 'left');
    	$query = $this->db->get();

    	if (is_object($query))
    	{
    		$row = $query->result();
    		return $row;
    	}
    	return false;
    }
    function detail_penilai($id_pekerjaan) {
    	$get = $this->db->select("B.*")
    	->from("mst_pekerjaan A")
    	->join("mst_user B", "B.id=A.penilai")
    	->where("A.id", $id_pekerjaan)
    	->get();

    	$result = $get->row_array();
    	return $result;
    }
    function detail_surveyor() {
		$get_data_login = $this->auth->get_data_login();
		$id_user = $get_data_login['id'];

    	$get = $this->db->select("A.*")
    	->from("mst_user A")
    	->where("A.id", $id_user)
    	->get();

    	$result = $get->row_array();
    	return $result;
    }
    function get_data_klien_by_pekerjaan($id_pekerjaan) {
    	$this->db->select('B.*, C.kode AS kode_bidang_usaha')
    			 ->from('mst_pekerjaan A')
    			 ->join('mst_klien B', 'A.id_klien = B.id')
    			 ->join('mst_bidang_usaha C', 'B.id_bidang_usaha = C.id', 'left')
    			 ->where('A.id', $id_pekerjaan);
    	$query = $this->db->get();
    	if ( is_object($query) ) {
    		$row = $query->row();
    		if ( is_object($row) )
    			return $row;
    	}
    	return false;
    }
}