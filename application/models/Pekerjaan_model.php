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

			// $action .= "<a href='".base_url().$this->module."/detail/".base64_encode($aRow['id'])."'><span class='badge bg-blue'>PROSES</span></a> ";
			$action = "<a href='".base_url()."pekerjaan/detail/".base64_encode($aRow['id'])."'><span class='badge bg-blue'>PROSES</span></a> ";

			if ($user["id_group"] == 2)
			{
				// $action .= "<a href='".base_url().$this->module."/log/".base64_encode($aRow['id'])."'><span class='badge bg-blue'>LOG</span></a>";
				$action .= "<a href='".base_url()."/pekerjaan/log/".base64_encode($aRow['id'])."'><span class='badge bg-blue'>LOG</span></a>";
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
						$row[] = "<div class='text-center'><a href='".base_url()."pekerjaan_baru/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>INPUT KERTAS KERJA</a></div> ";
					}
					else
					if ($pekerjaan->id_status >= 18 || $pekerjaan->id_status == 19 || $pekerjaan->id_status == 20)
					{
						$row[] = "<div class='text-center'><a href='".base_url()."pekerjaan_baru/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>KERTAS KERJA</a></div> ";
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
					$row[] = "<div class='text-center'><a href='".base_url()."pekerjaan_baru/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>INPUT KERTAS KERJA</a></div> ";
				}
				else
				if ($pekerjaan->id_status >= 18 || $pekerjaan->id_status == 19 || $pekerjaan->id_status == 20)
				{
					$row[] = "<div class='text-center'><a href='".base_url()."pekerjaan_baru/kertas_kerja_edit/".base64_encode($pekerjaan->id)."/".base64_encode($item_lokasi->id)."' class='btn btn-primary btn-sm btn-input-kertas-kerja'>KERTAS KERJA</a></div> ";
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
	function load_dropdown_pondasi_struktur()
	{

	}
}