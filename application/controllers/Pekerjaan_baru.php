<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pekerjaan_baru extends CI_Controller
{
    var $page_title       = 'Pekerjaaan';
    var $column_datatable = array('', 'nama', 'nama_klien', 'tanggal_penerimaan');
    var $folder           = '';
    var $module           = '';

	function __construct()
	{
		parent::__construct();
        $this->load->model($this->folder.'/pekerjaan_model', 'app_model');
        $module = $this->folder.'/'.$this->router->fetch_class();
        $this->page_title = $this->page_title;
        $this->app_model->initialize($module);
        $this->module = $module;
	}

	function index()
	{
		$data = array();
        $data['title'] = "Listing Pekerjaan";
        $data['url_back'] = base_url($this->module);
        $data['page_title'] = $this->page_title;

        $tmbl = '';
        $script = '
            $(function () {
            	(function(){
	                var active_id;
	                var oTable = $("#datatable").DataTable({
	                    responsive: true,
	                    "order": [[ 1, "ASC" ]],
	                    //dom: "Bfrtip",
	                    buttons: [
	                        '.$tmbl.'
	                    ],
	                    "processing": true,
	                    "serverSide": true,
	                    "ajax" : {
	                        "url": "'.base_url().$this->module.'/getDataTable",
	                        "type": "POST"
	                    }
	                });
	                oTable.on( "click", "tr", function () {
	                    var objcheck = $(this).children().find(".selectedrow");
	                    selectrowtable(objcheck);
	                } );

	                function selectrowtable(obj) {
	                    var parentrow = obj.parent().parent();
	                    if (  active_id != obj.val() ) {
	                        $("#datatable tbody tr").removeClass("selected");
	                        parentrow.addClass("selected");
	                        active_id = obj.val();
	                    } else {
	                            parentrow.removeClass("selected");
	                            active_id = "";
	                    }
	                }
            	})();
            });
        ';

		$data['_template']['_user'] = $this->auth->get_data_login();

        $this->template2->add_css('resources/plugins/datatables/dataTables.bootstrap.css');
        $this->template2->add_css('resources/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css');
        $this->template2->add_js('resources/plugins/datatables/jquery.dataTables.min.js');
        $this->template2->add_js('resources/plugins/datatables/dataTables.bootstrap.min.js');
        $this->template2->add_js('resources/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js');
        $this->template2->add_js('resources/plugins/datatables/dataTables.buttons.min.js');
        $this->template2->add_js('resources/plugins/datatables/buttons.flash.min.js');
        $this->template2->add_js('resources/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.min.js');

        $this->template2->write('title', 'Beranda');
        $this->template2->add_js($script, 'embed');
		$this->template2->write_view('content', 'pekerjaan_baru/datatable', $data, true);
        $this->template2->render();
	}

    function getDataTable()
    {
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        $order = $this->input->get_post('order', true);
        $sSearch = $this->input->get_post('search', true);
        $view = $this->app_model->show_datatable($this->column_datatable, $iDisplayStart,$iDisplayLength,$order,$sSearch);
        echo $view;
    }

    function getDataTable_penugasan($id_pekerjaan)
    {
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        $order = $this->input->get_post('order', true);
        $sSearch = $this->input->get_post('search', true);
        $column_datatable = array("", "kode");
        $con = array(
        	"id_pekerjaan" => $id_pekerjaan
        );
        $view = $this->app_model->datatable_penugasan($column_datatable, $iDisplayStart,$iDisplayLength,$order,$sSearch, $con);
        echo $view;
    }

    function getDataTable_legalitas($id_lokasi)
    {
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        $order = $this->input->get_post('order', true);
        $sSearch = $this->input->get_post('search', true);
        $column_datatable = array("", "jenis_sertifikat");
        $con = array(
        	"id_lokasi" => $id_lokasi
        );
        $view = $this->app_model->datatable_legalitas($column_datatable, $iDisplayStart,$iDisplayLength,$order,$sSearch, $con);
        echo $view;
    }

    function detail($id)
    {
		$data = array();
		$id = base64_decode($id);
		$user = $this->auth->get_data_login();

		$pekerjaan = $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id))->row();
		$klien = $this->global_model->get_data("view_klien", 1, array("id"), array($pekerjaan->id_klien))->row();
		$lokasi			= $this->global_model->get_data("view_lokasi", 1, array("id_pekerjaan"), array($id));
		$data['id'] = $id;
		$data['id_klien'] = base64_encode($pekerjaan->id_klien);
		$data["pekerjaan"] = $pekerjaan;
		$data["klien"] = $klien;

    	$jmlobjek   = $this->global_model->get_by_query("select count(*) as jmlobjek from mst_lokasi where id_pekerjaan='".$id."' limit 1")->row()->jmlobjek;
		//fee
		$lembar_kendali		= $this->global_model->get_data("mst_lembar_kendali", 2, array("id_pekerjaan","id_status"), array($id,3),"id","DESC")->row();
		if (isset($lembar_kendali)){
			$lembar_kendali_2		= $this->global_model->get_data("txn_lembar_kendali_2", 1, array("id_lembar_kendali"), array($lembar_kendali->id))->row();
		}

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
			$data["lembar_kendali_2"] = $lembar_kendali_2;
		}


		if ($pekerjaan->id_status > 10)
		{
			$data["po"]	= $this->global_model->get_data("mst_po", 1, array("id_pekerjaan"), array($id))->row();
		}


        $tmbl = '';
        $script = '
            $(function () {
                var active_id;
                var oTable = $("#datatable_penugasan").DataTable({
                    // responsive: true,
                    "order": [[ 1, "ASC" ]],
                    // dom: "Bfrtip",
                    buttons: [
                        '.$tmbl.'
                    ],
                    "processing": true,
                    "serverSide": true,
                    "ajax" : {
                        "url": "'.base_url().$this->module.'/getDataTable_penugasan/'.$pekerjaan->id.'",
                        "type": "POST"
                    }
                });
                oTable.on( "click", "tr", function () {
                    var objcheck = $(this).children().find(".selectedrow");
                    selectrowtable(objcheck);
                } );

                function selectrowtable(obj) {
                    var parentrow = obj.parent().parent();
                    if (  active_id != obj.val() ) {
                        $("#datatable tbody tr").removeClass("selected");
                        parentrow.addClass("selected");
                        active_id = obj.val();
                    } else {
                            parentrow.removeClass("selected");
                            active_id = "";
                    }
                }
            });
        ';

		$data['_template']['_user'] = $this->auth->get_data_login();
		$data['user'] = $user;

        $data['title'] = "Detail Pekerjaan";
        $data['url_back'] = base_url($this->module);
        $data['page_title'] = $this->page_title;

        $this->template2->add_css('resources/plugins/datatables/dataTables.bootstrap.css');
        $this->template2->add_css('resources/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css');
        $this->template2->add_js('resources/plugins/datatables/jquery.dataTables.min.js');
        $this->template2->add_js('resources/plugins/datatables/dataTables.bootstrap.min.js');
        $this->template2->add_js('resources/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js');
        $this->template2->add_js('resources/plugins/datatables/dataTables.buttons.min.js');
        $this->template2->add_js('resources/plugins/datatables/buttons.flash.min.js');
        $this->template2->add_js('resources/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.min.js');

        $this->template2->write('title', 'Beranda');
        $this->template2->add_js($script, 'embed');
		$this->template2->write_view('content', 'pekerjaan_baru/detail', $data, true);
        $this->template2->render();
    }


	function kertas_kerja_edit($id_pekerjaan = "", $id_lokasi = "")
	{
		$this->load->library("kertaskerjalib");
		$id_pekerjaan 		= base64_decode($id_pekerjaan);
		$id_lokasi 			= base64_decode($id_lokasi);
		$pekerjaan			= $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
		$lokasi				= $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();

		//echo "<pre>";var_dump($pekerjaan);echo "</pre>";
		//echo "<pre>";var_dump($lokasi);echo "</pre>";

		$data["lokasi"]		= $lokasi;
		$data["title"]		= "Kertas Kerja";
		$kertas_kerja		= "";


		// if ($lokasi->id_jenis_objek == 1)
			// {
			// 	$kertas_kerja	= $this->kertaskerjalib->generate_form_1($pekerjaan, $lokasi);
			// }

			// if ($lokasi->id_jenis_objek == 2)
			// {
			// 	$kertas_kerja	= $this->kertaskerjalib->generate_form_2($pekerjaan, $lokasi);
			// }

			// if ($lokasi->id_jenis_objek == 6)
			// {
			// 	$kertas_kerja	= $this->kertaskerjalib->generate_form_6($pekerjaan, $lokasi);
			// }

			// if ($lokasi->id_jenis_objek == 7)
			// {
			// 	$kertas_kerja	= $this->kertaskerjalib->generate_form_7($pekerjaan, $lokasi);
			// }

			// if ($lokasi->id_jenis_objek == 5)
			// {
			// 	$kertas_kerja	= $this->kertaskerjalib->generate_form_5($pekerjaan, $lokasi);
			// }

			// if ($lokasi->id_jenis_objek == 3)
			// {
			// 	$kertas_kerja	= $this->kertaskerjalib->generate_form_3($pekerjaan, $lokasi);
			// }

			// //$data["kertas_kerja"]	= $kertas_kerja;



		// Data Pembanding Default
		{
			$custom_data	= unserialize($lokasi->custom_data);
		
			if (($custom_data) && array_key_exists("tab_pembanding", $custom_data))
			{
				
			}
			else
			{
				$custom_data["tab_pembanding"]	= array("Objek Penilaian", "Pembanding 1", "Pembanding 2", "Pembanding 3");
				
				$this->_ci->global_model->update("mst_lokasi", 1, array("id"), array($lokasi->id), array("custom_data" => serialize($custom_data)));
				$lokasi		= $this->_ci->global_model->get_data("view_lokasi", 1, array("id"), array($lokasi->id))->row();
			}
		}
		
		// Data Bangunan default
		{
			$custom_data	= unserialize($lokasi->custom_data);
		
			if (($custom_data) && array_key_exists("tab_bangunan", $custom_data))
			{
				
			}
			else
			{
				$custom_data["tab_bangunan"]	= array(
					"Bangunan 1"	=> array(
						"lantai" 	=> array("Basement/Ground", "Lantai 1"),
						"ruangan" 	=> array("Ruang 1")
					)
				);
				
				$this->_ci->global_model->update("mst_lokasi", 1, array("id"), array($lokasi->id), array("custom_data" => serialize($custom_data)));
				$lokasi		= $this->_ci->global_model->get_data("view_lokasi", 1, array("id"), array($lokasi->id))->row();
			}
			
			$bangunan	= count($custom_data["tab_bangunan"]);
			
			$data["input"]["jumlah_bangunan"]		= $this->formlib->_generate_input_text("jumlah_bangunan", "jumlah_bangunan", $bangunan, FALSE, TRUE);
		}
		
		$data["custom_data"]	= $custom_data;
        $data['title'] = "Detail Pekerjaan";
        $data['url_back'] = base_url($this->module);
        $data['page_title'] = $this->page_title;
        $data['id_pekerjaan'] = $id_pekerjaan;
        $data['id_lokasi'] = $id_lokasi;
        $data['pekerjaan'] = $pekerjaan;
        $data['jumlah_bangunan'] = 1;
        $data['txn_kertas_kerja'] = $this->app_model->get_txn_kertas_kerja_by_id_lokasi($id_lokasi);
        $data['list_kegunaan'] = $this->app_model->get_list_kegunaan();
        $data['jenis_klien'] = $this->app_model->get_jenis_klien();
        $data['status_objek'] = $this->app_model->get_status_objek();
        $data['list_debitur'] = $this->app_model->get_debitur();
        $data['tujuan_penilaian'] = $this->app_model->get_tujuan_penilaian();
        $data['txn_tanah'] = $this->app_model->get_txn_tanah_by_id_lokasi($id_lokasi);
        $data['batas_properti'] = $this->app_model->get_batas_properti();
        $data['lokasi_tanah_objek'] = $this->app_model->get_lokasi_tanah_objek();
        $data['harga_tanah_objek'] = $this->app_model->get_harga_tanah_objek();
        $data['kepadatan_bangunan'] = $this->app_model->get_kepadatan_bangunan();
        $data['pertumbuhan_bangunan'] = $this->app_model->get_pertumbuhan_bangunan();
        $data['tipe_penilaian'] = $this->app_model->get_tipe_penilaian();
        $data['perubahan_lingkungan_response'] = $this->app_model->get_perubahan_lingkungan_response();
        $data['tipe_hunian'] = $this->app_model->get_tipe_hunian();
        $data['tipe_jalan'] = $this->app_model->get_tipe_jalan();
        $data['kehadiran'] = $this->app_model->get_kehadiran();
        $data['keterbukaan'] = $this->app_model->get_keterbukaan();
        $data['topografi'] = $this->app_model->get_topografi();
        $data['jenis_tanah'] = $this->app_model->get_jenis_tanah();
        $data['tipe_kejadian'] = $this->app_model->get_tipe_kejadian();
        $data['tipe_posisi_tanah'] = $this->app_model->get_tipe_posisi_tanah();
        $data['legalitas_tanah'] = $this->app_model->get_data_legalitas_tanah_by_id_lokasi($id_lokasi);



        //BANGUNAN
		$custom_data = unserialize($lokasi->custom_data);
		$tab_bangunan = $custom_data["tab_bangunan"];
		$role = 'Bangunan_1';
		$data['role_bangunan'] = 'Bangunan_1';
		$bangunan = $tab_bangunan[str_replace("_", " ", $role)];
		$list_lantai = $bangunan["lantai"];
		$list_ruangan = $bangunan["ruangan"];
        $data['list_lantai'] =  $list_lantai;
		$data['list_ruangan'] = $list_ruangan;

		if($lokasi->id_jenis_objek == 1 || $lokasi->id_jenis_objek == 2)
		{
			$list_field = $this->global_model->get_by_query("SELECT * FROM mst_field_objek WHERE id_jenis_objek = 2 AND nama LIKE '%bangunan%' ");
		}
		else if ($lokasi->id_jenis_objek == 6) 
		{
			$list_field = $this->global_model->get_by_query("SELECT * FROM mst_field_objek_apartemen WHERE id_jenis_objek = 6 AND nama LIKE '%bangunan%' ");
		}
		else if ($lokasi->id_jenis_objek == 7) 
		{
			$list_field = $this->global_model->get_by_query("SELECT * FROM mst_field_objek_office_space WHERE id_jenis_objek = 7 AND nama LIKE '%bangunan%' ");
		}
		else if ($lokasi->id_jenis_objek==5)
		{
			$list_field = $this->global_model->get_by_query("SELECT * FROM mst_field_objek_ruko WHERE id_jenis_objek = 5 AND nama LIKE '%bangunan%' ");
		}
		else if ($lokasi->id_jenis_objek==3)
		{
			$list_field = $this->global_model->get_by_query("SELECT * FROM mst_field_objek_kios WHERE id_jenis_objek = 3 AND nama LIKE '%bangunan%' ");
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

		$data['textbox_bangunan'] = $textbox;


		$tanggal_inspeksi	= $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 9  ");

		if ($tanggal_inspeksi->num_rows() == 1)
		{
			$tanggal_inspeksi	= $tanggal_inspeksi->row()->jawab;
		}
		else
		{
			$tanggal_inspeksi	= date("Y-m-d");
		}
		$data['tanggal_inspeksi'] = $tanggal_inspeksi;
		$tab_role	= explode("_", $role);
		$data['tab_role'] = $tab_role;


        $tmbl = '';
        $script = '
            	(function(){
	                var active_id;
	                var oTable = $("#table_data_legalitas_1").DataTable({
	                    // responsive: true,
	                    "order": [[ 1, "ASC" ]],
	                    // dom: "Bfrtip",
	                    buttons: [
	                        '.$tmbl.'
	                    ],
	                    "processing": true,
	                    "serverSide": true,
	                    "ajax" : {
	                        "url": "'.base_url().$this->module.'/getDataTable_legalitas/'.$id_lokasi.'",
	                        "type": "POST"
	                    }
	                });
	                oTable.on( "click", "tr", function () {
	                    var objcheck = $(this).children().find(".selectedrow");
	                    selectrowtable(objcheck);
	                } );

	                function selectrowtable(obj) {
	                    var parentrow = obj.parent().parent();
	                    if (  active_id != obj.val() ) {
	                        $("#datatable tbody tr").removeClass("selected");
	                        parentrow.addClass("selected");
	                        active_id = obj.val();
	                    } else {
	                            parentrow.removeClass("selected");
	                            active_id = "";
	                    }
	                }
            	})();
        ';


        $data['penandatangan'] = $this->app_model->get_list_penandatangan();

        $this->template2->add_css('resources/plugins/datatables/dataTables.bootstrap.css');
        $this->template2->add_css('resources/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css');
        $this->template2->add_js('resources/plugins/datatables/jquery.dataTables.min.js');
        $this->template2->add_js('resources/plugins/datatables/dataTables.bootstrap.min.js');
        $this->template2->add_js('resources/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js');
        $this->template2->add_js('resources/plugins/datatables/dataTables.buttons.min.js');
        $this->template2->add_js('resources/plugins/datatables/buttons.flash.min.js');
        $this->template2->add_js('resources/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.min.js');

        $this->template2->write('title', 'Beranda');
        $this->template2->add_js($script, 'embed');
		$this->template2->write_view('content', 'pekerjaan_baru/form_2', $data, true);
        $this->template2->render();

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
}