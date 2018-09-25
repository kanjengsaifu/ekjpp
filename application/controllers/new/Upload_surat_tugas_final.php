<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Author : Arif Kurniawan
 * Email : arif.kurniawan86@gmail.com
 * Website : infoharga123.com
 */
class Upload_surat_tugas_final extends CI_Controller {
    var $page_title = 'Upload surat tugas final';
    var $column_datatable = array('A.id', 'B.nama', 'A.surat_tugas_final', '');
    var $list_sub_array = array();
    var $list_sub_perusahaan = array();
    var $folder         = 'new';
    var $module         = '';

    function __construct(){
        parent::__construct();
        $module = $this->folder.'/'.$this->router->fetch_class();
        // var_dump($this->folder.'/'.'master_deviasi_model'); exit();
        $this->load->model($this->folder.'/'.'Upload_surat_tugas_final_model', 'app_model');
        $this->app_model->initialize($module);
        $this->module = $module;
    }
    
    public function index()
    {
        $module =$this->module; 
        $script = '
            var active_id = \'\';
            $(function () {
                var oTable = $("#datatable").DataTable({
                    // responsive: true,
                    // "order": [[ 0, "desc" ]],
                    // "aoColumnDefs": [{"bSortable": false, "aTargets": [3]}],
                    dom: "Bfrtip",
                    "buttons": [
                        {
                            text: "<span class=\'fa fa-pencil-circle\'></span> Tambah", 
                            className: "btn btn-sm btn-success",
                            action: function ( e, dt, node, config ) {
                                go_add_data();
                            }
                        },
                        {
                            text: "<span class=\'fa fa-pencil-circle\'></span> Edit", 
                            className: "btn btn-sm btn-primary",
                            action: function ( e, dt, node, config ) {
                                go_edit_data();
                            }
                        }
                    ],
                    // "processing": true,
                    "serverSide": true,
                    "ajax" : {
                        "url": "'.base_url().$module.'/getDataTable",
                        "type": "POST"
                    }
                });
                oTable.on( "click", "tr", function () {
                    var objcheck = $(this).children().find(".selectedrow");
                    selectrowtable(objcheck);
                } );
            });
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
            function go_add_data() {

                    document.location = "'.base_url().$this->module.'/add/";
            }
            function go_edit_data() {
                if ( active_id.length < 1 ) {
                    alert(\'Pilih baris data pada tabel yang ingin diubah!\');
                } else {
                    document.location = "'.base_url().$this->module.'/edit/" + active_id;
                }
            }
            function go_delete_data(id) {
                if (window.confirm("Apakah anda yakin?")){
                    $.post("'.base_url().$this->module.'/delete/"+id).done(function(data){
                        document.location = "'.base_url().$this->module.'";
                    });
                }
            }
        ';

        $data['title'] = $this->page_title; 
        $this->template2->add_css('resources/plugins/datatables/dataTables.bootstrap.css');
        $this->template2->add_css('resources/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css');
        $this->template2->add_js('resources/plugins/datatables/jquery.dataTables.min.js');
        $this->template2->add_js('resources/plugins/datatables/dataTables.bootstrap.min.js');
        $this->template2->add_js('resources/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js');
        $this->template2->add_js('resources/plugins/datatables/dataTables.buttons.min.js');
        $this->template2->add_js('resources/plugins/datatables/buttons.flash.min.js');
        $this->template2->add_js('resources/plugins/datatables/extensions/FixedHeader/js/dataTables.fixedHeader.min.js');

        $this->template2->add_js($script,'embed');
        $this->template2->write('title', $data['title']);
        $this->template2->write_view('content', $this->folder.'/upload_surat_tugas_final/datatable', $data, true);
        $this->template2->render();
    }
    function getDataTable()
    {
        $iDisplayStart = $this->input->get_post('start', true);
        $iDisplayLength = $this->input->get_post('length', true);
        $order = $this->input->get_post('order', true);
        $sSearch = $this->input->get_post('search', true);
        $input_sub = $this->input->get('sub');
        $con = array( );

        $view = $this->app_model->show_datatable($this->column_datatable, $iDisplayStart,$iDisplayLength,$order,$sSearch,$con);

        echo $view;
    }
    private function valid_form($act = 'add') {
        $this->load->library('form_validation');
        $config = array(
            array(
                'field' => 'surat_tugas_final',
                'label' => 'surat_tugas_final',
                'rules' => 'required|max_length[255]'
            ),
        );
        $this->form_validation->set_rules($config);
    }
    function add($id = 0) {
        $this->load->model('global_model');
        $module = $this->module;

        $data['detail']     = array();
        $data['title']      = "Tambah Data";
        $data['url_back']   = "window.location.href='".base_url().$module."'";
        $errMsg = NULL;

        if($_POST)
        {
            $data_post      = $this->input->post();
            $data['detail'] = $data_post;
            $data_insert    = array();
            $simpan         = true;
            $this->valid_form(strtolower(__FUNCTION__));

            if ( $this->form_validation->run() == FALSE ) {
                $simpan = false;
                $errMsg = '<ul>'.validation_errors('<li>','</li>').'</ul>';
            }

            if ( $simpan ) {
                $data_insert = array(
                    'sarana_pelengkap' => strip_tags($this->input->post('sarana_pelengkap')),
                    'nilai' => strip_tags($this->input->post('nilai')),
                );

                $insert = $this->app_model->insert_data($data_insert);
                if ( $insert ) {
                    redirect(base_url().$module);
                } else {
                    $errMsg = 'Data gagal disimpan';
                }
            }
        }
        $data['page_title'] = $this->page_title;
        $data['errMsg']     = $errMsg;
        $this->template2->add_css('resources/plugins/select2/select2.min.css');
        $this->template2->add_css('resources/plugins/select2/select2-bootstrap.min.css');
        $this->template2->add_js('resources/plugins/select2/placeholders.jquery.min.js');
        $this->template2->add_js('resources/plugins/select2/select2.min.js');
        $this->template2->write('title', 'Tambah '.$this->page_title);
        $this->template2->write_view('content', $this->folder.'/upload_surat_tugas_final/form', $data, true);
        $this->template2->render();
    }
    function edit($id = 0) {
        $this->load->model('global_model');
        $module = $this->module;
        $data['is_edit'] = true;
        $data['detail'] = $this->app_model->get_by_id($id);

        if ( !$data['detail'] ) {
            show_404();
            return;
        }
        $data['title'] = "";
        $data['url_back'] = "window.location.href='".base_url().$this->module."'";
        $errMsg = NULL;

        if($_POST)
        {
            $data_post      = $this->input->post();
            $data['detail'] = $data_post;
            $simpan         = true;

            $this->valid_form('edit');

            if ( $this->form_validation->run() == FALSE ) {
                $simpan = false;
                $errMsg = '<ul>'.validation_errors('<li>','</li>').'</ul>';
            }

            if ( $simpan ) {
                $data_update = array(
                    'surat_tugas_final' => strip_tags($this->input->post('surat_tugas_final')),
                );

                $update = $this->app_model->update_data($id, $data_update);
                if ( $update ) {
                    redirect(base_url().'pekerjaan/detail/'.base64_encode($id));
                } else {
                    $errMsg = 'Data gagal disimpan';
                }
            }
        }
        $data['page_title'] = $this->page_title;
        $data['id'] = $id;
        $data['errMsg'] = $errMsg;
        $this->template2->add_css('resources/plugins/select2/select2.min.css');
        $this->template2->add_css('resources/plugins/select2/select2-bootstrap.min.css');
        $this->template2->add_js('resources/plugins/select2/placeholders.jquery.min.js');
        $this->template2->add_js('resources/plugins/select2/select2.min.js');
        $this->template2->write('title', 'Edit '.$this->page_title);
        $this->template2->write_view('content', $this->folder.'/upload_surat_tugas_final/form', $data, true);
        $this->template2->render();
    }
    function delete($id = 0){
        $this->app_model->delete_data($id);
        redirect(base_url().$module);
    }
    function get_list_json(){
        $id_jenis_objek = $this->input->post("id_jenis_objek");

        $result = $this->db->select("A.*")
                ->from("mst_depresiasi_sarana_pelengkap A")
                ->where("A.id_jenis_objek", $id_jenis_objek)
                ->get()
                ->result();
        echo json_encode($result);
    }
}
