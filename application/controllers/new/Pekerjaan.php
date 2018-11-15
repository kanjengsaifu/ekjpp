<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pekerjaan extends CI_Controller
{
    var $page_title       = 'Pekerjaaan';
    var $column_datatable = array('', 'nama', 'nama_klien', 'tanggal_penerimaan');
    var $folder           = 'new';
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
		$this->template2->write_view('content', $this->module.'/datatable', $data, true);
        $this->template2->render();
	}
	function tambah($id = null)
	{
		$data = array();
        $data['id'] = $id;
        $data['title'] = "Tambah Pekerjaan";
        $data['url_back'] = base_url($this->module);
        $data['page_title'] = $this->page_title;

        $script = '';

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
		$this->template2->write_view('content', $this->module.'/tambah', $data, true);
        $this->template2->render();

	}
    function lokasi_edit($id_pekerjaan = "", $id = "")
    {
        $data = array();
        $data['title'] = "TAMBAH OBJEK PROPERTI - 1";
        $data['url_back'] = base_url($this->module);
        $data['page_title'] = $this->page_title;

        $script = '';

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
        $this->template2->write_view('content', $this->module.'/lokasi_edit', $data, true);
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
		$this->template2->write_view('content', $this->module.'/detail', $data, true);
        $this->template2->render();
    }

    function kertas_kerja_edit($id_pekerjaan = "", $id_lokasi = "")
    {
        $this->load->library("kertaskerjalib");
        $user   = $this->auth->get_data_login();
                
        $data['id_pekerjaan'] = $id_pekerjaan;
        $data['penandatangan_laporan'] = get_penandatangan_laporan($id_pekerjaan);
        $id_pekerjaan = base64_decode($id_pekerjaan);
        $id_lokasi = base64_decode($id_lokasi);
        $pekerjaan = $this->global_model->get_data("view_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
        $lokasi = $this->global_model->get_data("view_lokasi", 1, array("id"), array($id_lokasi))->row();
        $data["lokasi"] = $lokasi;
        $id_tugas           = $this->global_model->get_data("mst_pekerjaan", 1, array("id"), array($id_pekerjaan))->row();
        $jenis_pemberi_tugas = $id_tugas->jenis_pemberi_tugas;
        if ( $jenis_pemberi_tugas == 0 )
            $beri_tugas         = $this->global_model->get_data("mst_klien", 1, array("id"), array($id_tugas->pemberi_tugas))->row();
        else if ( $jenis_pemberi_tugas == 1 ) 
            $beri_tugas         = $this->global_model->get_data("mst_debitur", 1, array("id"), array($id_tugas->pemberi_tugas))->row();

        $kertas_kerja = "";
        $custom_data  = unserialize($lokasi->custom_data);
        if (($custom_data) && array_key_exists("tab_pembanding", $custom_data))
        {
        }
        else
        {
            $custom_data["tab_pembanding"]  = array("Objek Penilaian", "Pembanding 1", "Pembanding 2", "Pembanding 3");
            
            $this->global_model->update("mst_lokasi", 1, array("id"), array($lokasi->id), array("custom_data" => serialize($custom_data)));
            $lokasi = $this->global_model->get_data("view_lokasi", 1, array("id"), array($lokasi->id))->row();
        }
        $data_penilai = false;
        if ( !empty($pekerjaan->penilai) ) {
            $data_penilai = get_data_user($pekerjaan->penilai);
        }
        $custom_data    = unserialize($lokasi->custom_data);
    
        if (($custom_data) && array_key_exists("tab_bangunan", $custom_data))
        {   
        }
        else
        {
            $custom_data["tab_bangunan"]    = array(
                "Bangunan 1"    => array(
                    "lantai"    => array("Basement/Ground", "Lantai 1"),
                    "ruangan"   => array("Ruang 1")
                )
            );
            
            $this->global_model->update("mst_lokasi", 1, array("id"), array($lokasi->id), array("custom_data" => serialize($custom_data)));
            $lokasi     = $this->global_model->get_data("view_lokasi", 1, array("id"), array($lokasi->id))->row();
        }
        
        $jumlah_bangunan = count($custom_data["tab_bangunan"]);
        $txn_kertas_kerja = $this->app_model->get_txn_kertas_kerja_by_id_lokasi($id_lokasi);
        if (empty($txn_kertas_kerja))
        {
            $data_kertas_kerja = array(
                "id_lokasi" => $id_lokasi,
            );
            if ( $data['penandatangan_laporan'] ) {
                $data_kertas_kerja["no_mappi_penandatangan_laporan"] = $data['penandatangan_laporan']['no_mappi'];
                $data_kertas_kerja["no_ijinpp_penandatangan"] = $data['penandatangan_laporan']['no_ijinpp'];
                $data_kertas_kerja["penandatangan_laporan"] = $data['penandatangan_laporan']['nama_penanda_tangan'];
            }
            if ( $data_penilai ) {
                $data_kertas_kerja["nama_penilai"] = $data_penilai['nama'];
                $data_kertas_kerja["no_mappi_penilai"] = $data_penilai['no_mappi'];
            }
            if ( $id_tugas ) {
                $id_jenis_jasa = $id_tugas->jenis_jasa;
                if ( !empty($id_jenis_jasa) ) {
                    $data_jenis_jasa = $this->global_model->get_by_id('mst_jenis_jasa', 'id', $id_jenis_jasa);
                    if ( $data_jenis_jasa )
                        $data_kertas_kerja["kode_jenis_jasa"] = $data_jenis_jasa->kode;
                }
                $maksud_tujuan = $id_tugas->maksud_tujuan;
                if ( !empty($maksud_tujuan) ) {
                    $tujuan_penilaian = $this->global_model->get_value_column('mst_tujuan', 'tujuan', array('id_tujuan' => $maksud_tujuan));
                    if ( !empty($tujuan_penilaian) ) {
                        $data_kertas_kerja["tujuan_penilaian"] = $tujuan_penilaian;
                    }
                }
            }

            $id_kertas_kerja = $this->global_model->insert_data('txn_kertas_kerja', $data_kertas_kerja );
            $txn_kertas_kerja = $this->app_model->get_txn_kertas_kerja_by_id_lokasi($id_lokasi);
        } else {
            $dupdate_kertas_kerja = array();
            if ( empty($txn_kertas_kerja['penandatangan_laporan']) && $data['penandatangan_laporan'] ) {
                $dupdate_kertas_kerja["no_mappi_penandatangan_laporan"] = $data['penandatangan_laporan']['no_mappi'];
                $dupdate_kertas_kerja["no_ijinpp_penandatangan"] = $data['penandatangan_laporan']['no_ijinpp'];
                $dupdate_kertas_kerja["penandatangan_laporan"] = $data['penandatangan_laporan']['nama_penanda_tangan'];
            }
            if ( empty($txn_kertas_kerja['nama_penilai']) && $data_penilai ) {
                $dupdate_kertas_kerja["nama_penilai"] = $data_penilai['nama'];
                $dupdate_kertas_kerja["no_mappi_penilai"] = $data_penilai['no_mappi'];
            }
            if ( empty($txn_kertas_kerja['kode_jenis_jasa']) && $id_tugas ) {
                $id_jenis_jasa = $id_tugas->jenis_jasa;
                if ( !empty($id_jenis_jasa) ) {
                    $data_jenis_jasa = $this->global_model->get_by_id('mst_jenis_jasa', 'id', $id_jenis_jasa);
                    if ( $data_jenis_jasa )
                        $dupdate_kertas_kerja["kode_jenis_jasa"] = $data_jenis_jasa->kode;
                }
            }
            if ( empty($txn_kertas_kerja['tujuan_penilaian']) && $id_tugas ) {
                $maksud_tujuan = $id_tugas->maksud_tujuan;
                if ( !empty($maksud_tujuan) ) {
                    $tujuan_penilaian = $this->global_model->get_value_column('mst_tujuan', 'tujuan', array('id_tujuan' => $maksud_tujuan));
                    if ( !empty($tujuan_penilaian) ) {
                        $dupdate_kertas_kerja["tujuan_penilaian"] = $tujuan_penilaian;
                    }
                }
            }
            if ( count($dupdate_kertas_kerja) > 0 ) {
                $this->global_model->update_data('txn_kertas_kerja', 'id_kertas_kerja', $txn_kertas_kerja['id_kertas_kerja'], $dupdate_kertas_kerja);
                foreach ($dupdate_kertas_kerja as $ku => $vu) {
                    $txn_kertas_kerja[$ku] = $vu;
                }
            }
        }
        $txn_data_banding = $this->app_model->get_txn_data_banding_by_id_lokasi($id_lokasi);
        $total_data_banding = count($txn_data_banding);

        $data["total_data_banding"]    = $total_data_banding;
        $data["custom_data"]    = $custom_data;

        for ($i = 0; $i < $total_data_banding; $i++)
        {
            $data['data_banding'][$i] = $this->app_model->get_txn_data_banding_jenis_pembanding($id_lokasi, $i);
        }

        $is_nilai_properti = in_array($lokasi->id_jenis_objek, array(3, 5, 6, 7));
        $jenis_jasa_penilaian = $this->global_model->get_list('mst_jenis_jasa');

        //Penomoran laporan
        $data_kjpp = get_data_kjpp();
        $data_klien = $this->app_model->get_data_klien_by_pekerjaan($id_pekerjaan);
        $nomor_laporan = $txn_kertas_kerja['nomor_laporan'];
        $expl_nomor = explode('/', $nomor_laporan);
        $nomor_urut = empty($expl_nomor[0]) ? NULL : $expl_nomor[0];
        $kode_identitas_kantor = $data_kjpp ? $data_kjpp->kode_identitas_kantor : NULL;
        $kode_jenis_jasa = $txn_kertas_kerja['kode_jenis_jasa'];
        $kode_industri_pengguna_jasa = $data_klien ? $data_klien->kode_bidang_usaha : NULL;
        $kode_nomor_izin_profesi = substr($txn_kertas_kerja['no_ijinpp_penandatangan'], -4);
        $kode_npwp = empty($data_klien->npwp) ? 0 : 1;
        $tanggal_laporan = $txn_kertas_kerja['tanggal_laporan'];
        $bulan = empty($tanggal_laporan) ? NULL : date('m', strtotime($tanggal_laporan));
        $tahun = empty($tanggal_laporan) ? NULL : date('Y', strtotime($tanggal_laporan));
        $bulan_romawi = empty($bulan) ? NULL : numberToRomanRepresentation((int)$bulan);
        $data['nomor_urut'] = $nomor_urut;
        $data['kode_identitas_kantor'] = $kode_identitas_kantor;
        $data['kode_jenis_jasa'] = $kode_jenis_jasa;
        $data['kode_industri_pengguna_jasa'] = $kode_industri_pengguna_jasa;
        $data['kode_nomor_izin_profesi'] = $kode_nomor_izin_profesi;
        $data['kode_npwp'] = $kode_npwp;
        $data['bulan_romawi'] = $bulan_romawi;
        $data['tahun_laporan'] = $tahun;

        $data['title'] = "Kertas Kerja";
        $data['url_back'] = base_url($this->module);
        $data['page_title'] = $this->page_title;
        $data['id_lokasi'] = $id_lokasi;
        $data['pekerjaan'] = $pekerjaan;
        $data['jumlah_bangunan'] = $jumlah_bangunan;
        $data['txn_kertas_kerja'] = $txn_kertas_kerja;
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
        $data['arsitektur_bangunan'] = $this->app_model->get_arsitektur_bangunan();
        $data['txn_bangunan'] = $this->app_model->get_txn_bangunan_by_id_lokasi($id_lokasi);
        $data['txn_sarana_pelengkap'] = $this->app_model->get_txn_sarana_pelengkap_by_id_lokasi($id_lokasi);
        $data['txn_lampiran'] = $this->app_model->get_txn_lampiran_by_id_lokasi($id_lokasi);
        $data['tipe_pondasi'] = $this->app_model->get_tipe_pondasi();
        $data['tipe_struktur'] = $this->app_model->get_tipe_struktur();
        $data['tipe_rangka_atap'] = $this->app_model->get_tipe_rangka_atap();
        $data['tipe_penutup_atap'] = $this->app_model->get_tipe_penutup_atap();
        $data['tipe_plafond'] = $this->app_model->get_tipe_plafond();
        $data['tipe_dinding'] = $this->app_model->get_tipe_dinding();
        $data['tipe_partisi_ruangan'] = $this->app_model->get_tipe_partisi_ruangan();
        $data['tipe_kusen'] = $this->app_model->get_tipe_kusen();
        $data['tipe_pintu_jendela'] = $this->app_model->get_tipe_pintu_jendela();
        $data['tipe_lantai'] = $this->app_model->get_tipe_lantai();
        $data['tipe_tangga'] = $this->app_model->get_tipe_tangga();
        $data['tipe_pagar_halaman'] = $this->app_model->get_tipe_pagar_halaman();
        $data['jaringan_air'] = $this->app_model->get_jaringan_air();
        $data['tipe_pendingin_ruangan'] = $this->app_model->get_tipe_pendingin_ruangan();
        $data['tipe_pemanas_air'] = $this->app_model->get_tipe_pemanas_air();
        $data['tipe_bangunan'] = $this->app_model->get_tipe_bangunan();
        $data['tipe_masa_bangunan'] = $this->app_model->get_tipe_masa_bangunan();
        $data['tipe_penangkal_petir'] = $this->app_model->get_tipe_penangkal_petir();
        $data['tipe_kolam_renang'] = $this->app_model->get_tipe_kolam_renang();
        $data['tipe_area_parkir'] = $this->app_model->get_tipe_area_parkir();
        $data['tipe_pemagaran_halaman'] = $this->app_model->get_tipe_pemagaran_halaman();
        $data['tipe_keadaan_halaman'] = $this->app_model->get_tipe_keadaan_halaman();
        $data['tipe_bangunan_btb'] = $this->app_model->get_tipe_bangunan_btb();
        $data['tipe_renovasi'] = $this->app_model->get_tipe_renovasi();
        $data['klasifikasi_bangunan'] = $this->app_model->get_klasifikasi_bangunan();
        $data['kelas_bangunan'] = $this->app_model->get_kelas_bangunan();
        $data['sumber_nomor_sertifikat'] = $this->app_model->get_sumber_nomor_sertifikat();
        $data['zoning'] = $this->app_model->get_zoning();
        $data['tipe_lokasi_kios'] = $this->app_model->get_tipe_lokasi_kios();
        $data['tipe_posisi_kios'] = $this->app_model->get_tipe_posisi_kios();
        $data['daya_listrik'] = $this->app_model->get_daya_listrik();
        $data['pemasangan'] = $this->app_model->get_pemasangan();
        $data['lokasi_bidang_tanah'] = $this->app_model->get_lokasi_bidang_tanah();
        $data['arah'] = $this->app_model->get_arah();
        $data['mst_peruntukan_kawasan'] = $this->app_model->get_peruntukan_kawasan();
        $data['txn_data_banding'] = $txn_data_banding;
        $data['txn_data_banding_0'] = $this->app_model->get_txn_data_banding_jenis_pembanding($id_lokasi, 0);
        $data['txn_data_banding_1'] = $this->app_model->get_txn_data_banding_jenis_pembanding($id_lokasi, 1);
        $data['txn_data_banding_2'] = $this->app_model->get_txn_data_banding_jenis_pembanding($id_lokasi, 2);
        $data['txn_data_banding_3'] = $this->app_model->get_txn_data_banding_jenis_pembanding($id_lokasi, 3);
        $data['keterangan_sumber_data'] = $this->app_model->get_keterangan_sumber_data();
        $data['jenis_properti'] = $this->app_model->get_jenis_properti();
        $data['waktu_penawaran'] = $this->app_model->get_waktu_penawaran();
        $data['tipe_legalitas_tanah'] = $this->app_model->get_tipe_legalitas_tanah();
        $data['bentuk_tanah'] = $this->app_model->get_bentuk_tanah();
        $data['kondisi_existing_tanah'] = $this->app_model->get_kondisi_existing_tanah();
        $data['brb_bangunan'] = $this->app_model->get_brb_bangunan();
        $data['tipe_perkerasan'] = $this->app_model->get_tipe_perkerasan();
        $data['lampiran_layout_properti'] = $this->app_model->get_txn_lampiran_by_jenis($id_lokasi, "Layout Properti");
        $data['lampiran_peta_lokasi'] = $this->app_model->get_txn_lampiran_by_jenis($id_lokasi, "Peta Lokasi Properti");
        $data['lampiran_tata_kota'] = $this->app_model->get_txn_lampiran_by_jenis($id_lokasi, "Keterangan Tata Kota");
        $data['list_ruangan'] = $this->app_model->get_list_ruangan($id_lokasi);
        $data['penandatangan_laporan'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 1);
        $data['nama_penilai'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 3);
        $data['nama_surveyor'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 5);
        $data['nomor_laporan'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 15);
        $data['obyek_penilaian'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 2);
        $data['tanggal_inspeksi_penilaian'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 9);
        $data['tanggal_laporan'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 12);
        $data['klien'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 7);
        $data['alamat_properti'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 18);
        $data['provinsi'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 21);
        $data['kotakab'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 23);
        $data['kecamatan'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 25);
        $data['kelurahan'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 27);
        $data['dh_provinsi'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 897);
        $data['dh_kotakab'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 898);
        $data['dh_kecamatan'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 899);
        $data['dh_kelurahan'] = $this->app_model->get_value_kertas_kerja($id_pekerjaan, $id_lokasi, 900);
        $data['tipe_pusat_perbelanjaan'] = $this->app_model->get_tipe_pusat_perbelanjaan();
        $data['tipe_strategis'] = $this->app_model->get_tipe_strategis();
        $data['kondisi_eksterior_interior'] = $this->app_model->get_kondisi_eksterior_interior();
        $deviasi_data = $this->app_model->get_nilai_deviasi($lokasi->id_jenis_objek);
        $data['deviasi_data'] = (float)$deviasi_data;
        $data['petugas'] = $this->app_model->get_petugas($id_lokasi);
        $data['user'] = $user;
        $detail_penilai = $this->app_model->detail_penilai($id_pekerjaan);
        $data['detail_penilai'] = $detail_penilai;
        $detail_surveyor = $this->app_model->detail_surveyor();
        $data['detail_surveyor'] = $detail_surveyor;
        $data['id_jenis_objek'] = $lokasi->id_jenis_objek;
        $data['is_nilai_properti'] = $is_nilai_properti;
        $data['jenis_jasa_penilaian'] = $jenis_jasa_penilaian;
        
        $custom_data = unserialize($lokasi->custom_data);
        $list_bangunan  = $custom_data["tab_bangunan"];
        $tab_bangunan = $custom_data["tab_bangunan"];
        $role = 'Bangunan_1';
        $data['role_bangunan'] = 'Bangunan_1';
        $bangunan = $tab_bangunan[str_replace("_", " ", $role)];
        $list_lantai = $bangunan["lantai"];
        $list_ruangan = $bangunan["ruangan"];
        $data['list_lantai'] =  $list_lantai;
        $data['list_ruangan'] = $list_ruangan;
        $data['list_bangunan'] = $list_bangunan;

        $tanggal_inspeksi   = $this->global_model->get_by_query("SELECT * FROM txn_lokasi_data WHERE id_lokasi = ".$id_lokasi." AND id_field = 9  ");

        if ($tanggal_inspeksi->num_rows() == 1)
        {
            $tanggal_inspeksi   = $tanggal_inspeksi->row()->jawab;
        }
        else
        {
            $tanggal_inspeksi   = date("Y-m-d");
        }

        $tab_role = explode("_", $role);

        $data['tanggal_inspeksi'] = $tanggal_inspeksi;
        $data['tab_role'] = $tab_role;
        $data['penandatangan'] = $this->app_model->get_list_penandatangan();


        $tmbl = '';
        $script = '
        ';

        $view_form = "form".$lokasi->id_jenis_objek;
        // if (!empty($_GET['test']))
        // {
        //     $view_form = "form".$lokasi->id_jenis_objek."b";
        // }
        // $view_form = 'form';
        
        $this->template2->add_css('resources/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css');
        $this->template2->add_js('resources/plugins/datatables/jquery.dataTables.min.js');
        $this->template2->add_js('resources/plugins/datatables/dataTables.bootstrap.min.js');
        $this->template2->add_js('resources/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js');
        $this->template2->add_js('resources/plugins/datatables/dataTables.buttons.min.js');
        $this->template2->add_js('resources/plugins/datatables/buttons.flash.min.js');
        $this->template2->add_js('resources/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.min.js');
        $this->template2->write('title', 'Beranda');
        $this->template2->add_js($script, 'embed');
        $this->template2->write_view('content', $this->module.'/'.$view_form, $data, true);
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
	function generate_getter()
	{
		$list = "mst_tipe_pondasi
		mst_tipe_struktur
		mst_tipe_rangka_atap
		mst_tipe_penutup_atap
		mst_tipe_plafond
		mst_tipe_dinding
		mst_tipe_partisi_ruangan
		mst_tipe_kusen
		mst_tipe_pintu_jendela
		mst_tipe_lantai
		mst_tipe_tangga
		mst_tipe_pagar_halaman
		mst_jaringan_air
		mst_tipe_pendingin_ruangan
		mst_tipe_pemanas_air";
		
		$list_array = explode(PHP_EOL, $list);
		foreach ($list_array as $key => $value) {
			$value = trim($value);
			$value_name = explode('mst_', $value);
			$value_name = $value_name[1];
		    echo "\n".'
		    function get_'.$value_name.'()
		    {
		    	$this->db->select(\'A.*\');
		    	$this->db->from($this->'.$value.'.\' A\');
		    	$query = $this->db->get();

		    	if (is_object($query))
		    	{
		    		$row = $query->result();
		    		return $row;
		    	}
		    	return false;
		    }';
		}
	}
	function generate_properti()
	{
		$list = "mst_tipe_pondasi
		mst_tipe_struktur
		mst_tipe_rangka_atap
		mst_tipe_penutup_atap
		mst_tipe_plafond
		mst_tipe_dinding
		mst_tipe_partisi_ruangan
		mst_tipe_kusen
		mst_tipe_pintu_jendela
		mst_tipe_lantai
		mst_tipe_tangga
		mst_tipe_pagar_halaman
		mst_jaringan_air
		mst_tipe_pendingin_ruangan
		mst_tipe_pemanas_air";
		
		$list_array = explode(PHP_EOL, $list);
		foreach ($list_array as $key => $value) {
			$value = trim($value);
		    echo 'var $'.$value.' = \''.$value."';\n";
		}
	}
	function generate_set_data()
	{
		$list = "mst_tipe_pondasi
		mst_tipe_struktur
		mst_tipe_rangka_atap
		mst_tipe_penutup_atap
		mst_tipe_plafond
		mst_tipe_dinding
		mst_tipe_partisi_ruangan
		mst_tipe_kusen
		mst_tipe_pintu_jendela
		mst_tipe_lantai
		mst_tipe_tangga
		mst_tipe_pagar_halaman
		mst_jaringan_air
		mst_tipe_pendingin_ruangan
		mst_tipe_pemanas_air";
		
		$list_array = explode(PHP_EOL, $list);
		foreach ($list_array as $key => $value) {
			$value = trim($value);
			$value_name = explode('mst_', $value);
			$value_name = $value_name[1];
		    echo '$data[\''.$value_name.'\'] = $this->app_model->get_'.$value_name."();\n";
		}
	}
	function generate_combo_iterator()
	{
		$list = "mst_tipe_pondasi
		mst_tipe_struktur
		mst_tipe_rangka_atap
		mst_tipe_penutup_atap
		mst_tipe_plafond
		mst_tipe_dinding
		mst_tipe_partisi_ruangan
		mst_tipe_kusen
		mst_tipe_pintu_jendela
		mst_tipe_lantai
		mst_tipe_tangga
		mst_tipe_pagar_halaman
		mst_jaringan_air
		mst_tipe_pendingin_ruangan
		mst_tipe_pemanas_air";
		
		$list_array = explode(PHP_EOL, $list);
		foreach ($list_array as $key => $value) {
			$value = trim($value);
			$value_name = explode('mst_', $value);
			$value_name = $value_name[1];
			echo '<?php foreach($'.$value_name.' as $key => $value){ ?>'."\n";
			echo '<option value=\'<?php echo $value->'.$value_name.' ?>\' <?php echo ($value->'.$value_name.'==$txn_bangunan[\''.$value_name.'\']) ? "selected" : "" ?>><?php echo $value->'.$value_name.' ?></option>'."\n";
			echo '<?php } ?>'."\n\n";
		}
	}
	function test()
	{
		$i  = 0;
		if ($i === 2)
		{
			echo 1;
		}
		elseif($i===0)
		{
			echo 2;
		}
		elseif($i===0)
		{
			echo 3;
		}
	}
    function ajax_update_lampiran()
    {
        $id_lampiran = $this->input->post("id_lampiran");
        $id_lokasi = $this->input->post("id_lokasi");
        $jenis_lampiran = $this->input->post("jenis_lampiran");
        $lampiran = $this->input->post("lampiran");
        $lampiran = trim($lampiran);
        $no_urut = $this->input->post("no_urut");
        $keterangan = $this->input->post("keterangan");

        $get_txn_kertas_kerja = $this->global_model->get_by_id('txn_kertas_kerja', 'id_lokasi', $id_lokasi);
        $id_kertas_kerja = $get_txn_kertas_kerja->id_kertas_kerja;
        

        $data = array(
            "id_lokasi" => $id_lokasi,
            "jenis_lampiran" => $jenis_lampiran,
            "id_kertas_kerja" => $id_kertas_kerja,
            "lampiran" => $lampiran,
            "no_urut" => $no_urut,
            "keterangan" => $keterangan,
        );

        $this->app_model->insert_txn_lampiran( $data );
    }
    function tambah_lantai()
    {

    }
    function tambah_ruang()
    {
        
    }
}