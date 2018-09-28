<?php
/*
 * Author : Arif Kurniawan
 * Email : arif.kurniawan86@gmail.com
 */
function count_data($table_name = '', $condition = '') {
    $CI = &get_instance();
    $CI->db->where($condition)
           ->from($table_name);
    $count = $CI->db->count_all_results();
    if ( $count > 0 ) {
        return true;
    }
    return false;
}
function get_data_web($name = '') {
    $output = '';
    $CI = &get_instance();
    $CI->db->select('value')
           ->from('setting_web')
           ->where('LOWER(variable_name)', strtolower($name));
    $query = $CI->db->get();
    if ( is_object($query) ) {
        $data = $query->row();
        if ( is_object($data) )
            $output = $data->value;
    }
    return $output;
}
function translate($key = '') {
    $output = '';
    $CI = &get_instance();
    $lang = $CI->languange;
    switch($lang) {
        default:
            $bahasa = 'indonesia';
            break;
        case 'en':
            $bahasa = 'english';
            break;
    }
    $CI->db->select($bahasa)
        ->from('kamus_bahasa')
        ->where('LOWER(kata_kunci)', strtolower($key));
    $query = $CI->db->get();
    if ( is_object($query) ) {
        $data = $query->row();
        if ( is_object($data) )
            $output = $data->$bahasa;
    }
    return $output;
}
function word_shorter($text = '', $length = 100) {
    $new_string = '';
    if ( !empty($text) ) {
        $new_string = substr(strip_tags($text), 0, $length);
        if ( strlen($text) > $length ) {
            $new_string .= ' ...';
        }
    }
    return $new_string;
}
function set_seo($text = "") {
    $text = str_replace('-', ' ', $text);
    $text = preg_replace("/[[:blank:]]+/"," ",$text);
    $result = str_replace('--','-',str_replace(' ','-', preg_replace('/[^a-zA-Z0-9\s]/', '-', strtolower(trim($text)))));
    if ( $result[strlen($result)-1] == '-' ) {
        $result = substr($result, 0, strlen($result)-1);
    }
    return $result;
}
function describe_seo($text = "") {
    $output = str_replace('-',' ',str_replace('_',' ',$text));
    return $output;
}
function convert_field_to_string($field = '') {
    $label = $field;
    if ( !empty($field) ) {
        $label = str_replace('_',' ',$label);
        $label = ucwords($label);
    }
    return $label;
}
function clear_text($text = '') {
    $val = strip_tags($text, '<blockquote><a><table><span><ul><ol><b><i><h1><h2><h3><h4><h5><div><hr>');
    return $val;
}
function get_field_data($table_name = '') {
    $CI = &get_instance();
    $sql = "SELECT COLUMN_NAME AS name,
            DATA_TYPE AS type,
            CHARACTER_MAXIMUM_LENGTH AS max_length,
            CASE WHEN UPPER(IS_NULLABLE) = 'NO' THEN 0 ELSE 1 END is_null,
            CASE WHEN UPPER(COLUMN_KEY) = 'PRI' THEN 1 ELSE 0 END primary_key,
            COLUMN_COMMENT AS label
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_SCHEMA = '".$CI->db->database."'
            AND TABLE_NAME= '".$table_name."'";
    $query = $CI->db->query($sql);
    if ( is_object($query) ) {
        $data = $query->result();
        return $data;
    }
    return false;
}
function format_datetime($datetime = '') {
    $result = '';
    if ( !empty($datetime) && !preg_match('/0000-00-00/', $datetime) ) {
        $expl_space     = explode(' ', $datetime);
        $tanggal        = $expl_space[0];
        $expl_tanggal   = explode('-', $tanggal);
        if ( count($expl_tanggal) > 2 ) {
            $result = $expl_tanggal[2] . ' ' . get_nama_bulan($expl_tanggal[1]) . ' ' . $expl_tanggal[0];
        }
    }

    return $result;
}
function short_datetime($datetime = '') {
    $result = '';
    if ( !empty($datetime) ) {
        $expl_space     = explode(' ', $datetime);
        $tanggal        = $expl_space[0];
        $expl_tanggal   = explode('-', $tanggal);
        if ( count($expl_tanggal) > 2 ) {
            $result = $expl_tanggal[2] . ' ' . get_nm_bulan($expl_tanggal[1]) . ' ' . $expl_tanggal[0];
        }
    }

    return $result;
}
function get_nm_bulan($kode_bulan = '') {
    $kode_bulan = (int)$kode_bulan;
    $result     = '';

    switch($kode_bulan) {
        default: $result = 'Jan'; break;case 2: $result = 'Feb'; break;
        case 3: $result = 'Mar'; break;case 4: $result = 'Apr'; break;
        case 5: $result = 'Mei'; break;case 6: $result = 'Jun'; break;
        case 7: $result = 'Jul'; break;case 8: $result = 'Ags'; break;
        case 9: $result = 'Sep'; break;case 10: $result = 'Okt'; break;
        case 11: $result = 'Nov'; break;case 12: $result = 'Des'; break;
    }
    return $result;
}

function get_list_bulan() {
    $bulan = array(
        '01'    => 'Januari',
        '02'    => 'Februari',
        '03'    => 'Maret',
        '04'    => 'April',
        '05'    => 'Mei',
        '06'    => 'Juni',
        '07'    => 'Juli',
        '08'    => 'Agustus',
        '09'    => 'September',
        '10'    => 'Oktober',
        '11'    => 'November',
        '12'    => 'Desember'
    );
    return $bulan;
}
function get_nama_bulan($kode_bulan = '') {
    $kode_bulan = (int)$kode_bulan;
    $result     = '';

    switch($kode_bulan) {
        default: $result = 'Januari'; break;case 2: $result = 'Februari'; break;
        case 3: $result = 'Maret'; break;case 4: $result = 'April'; break;
        case 5: $result = 'Mei'; break;case 6: $result = 'Juni'; break;
        case 7: $result = 'Juli'; break;case 8: $result = 'Agustus'; break;
        case 9: $result = 'September'; break;case 10: $result = 'Oktober'; break;
        case 11: $result = 'November'; break;case 12: $result = 'Desember'; break;
    }
    return $result;
}
function GetBetween($var1="",$var2="",$pool){
    if ( !empty($var1) )
        $temp1 = strpos($pool,$var1)+strlen($var1);
    else
        $temp1 = 0;
    $result = substr($pool,$temp1,strlen($pool));

    $dd = 0;
    if ( !empty($var2) )
        $dd=strpos($result,$var2);
    if($dd == 0){
        $dd = strlen($result);
    }

    return substr($result,0,$dd);
}
function random_word($length = 5, $is_upper = false, $is_lower = true, $is_number=false) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    if($is_number){
     $chars = "0123456789";
    } else {

    if ( $is_upper )
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    if ( $is_lower )
        $chars = "abcdefghijklmnopqrstuvwxyz";
    }
    $i = 0;
    $string = "";
    while ($i < $length) {
        $string .= $chars{mt_rand(0,strlen($chars)-1)};
        $i++;
    }
    return $string;
}
function get_list_kategori_menu() {
    $CI = &get_instance();
    $query = $CI->db->get('tbl_kategori_menu');
    if ( is_object($query) ) {
        return $query->result();
    }
    return array();
}
function get_list_menu($id_kategori_menu = NULL) {
    $CI = &get_instance();
    $CI->load->model('global_model');
    $id_role = $CI->session->userdata('id_role');
    $is_super_admin = $CI->session->userdata('is_super_admin');
    
    $where = "1=1";
    $user_list_produk = $CI->global_model->get_list('r_user_kelompok','id_user = '.$_SESSION['id_user']);
    $arr_user_list_produk = array();
    foreach ($user_list_produk as $key) {
        $arr_user_list_produk[] = $key->id_kategori_kelompok;
    }

    if($id_role == 5){
        if (in_array('1', $arr_user_list_produk) && in_array('2', $arr_user_list_produk)) {
            $where .= " AND cname NOT IN('verifikasi_produk_parfum_deko')";
        }else if (in_array('1', $arr_user_list_produk) && in_array('3', $arr_user_list_produk)) {
            $where .= " AND cname NOT IN('verifikasi_produk_parfum')";
        }else if (in_array('2', $arr_user_list_produk) && in_array('3', $arr_user_list_produk)) {
            $where .= " AND cname NOT IN('verifikasi_produk')";
        }else if (in_array('1', $arr_user_list_produk)) {
            $where .= " AND cname NOT IN('verifikasi_produk_parfum','verifikasi_produk_parfum_deko')";
        }else if (in_array('2', $arr_user_list_produk)) {
            $where .= " AND cname NOT IN('verifikasi_produk','verifikasi_produk_parfum_deko')";
        }else if (in_array('3', $arr_user_list_produk)) {
            $where .= " AND cname NOT IN('verifikasi_produk','verifikasi_produk_parfum')";
        }
    }
    
    if ( empty($id_kategori_menu) )
        $where .= " AND id_kategori_menu IS NULL";
    else
        $where .= " AND id_kategori_menu = ".$id_kategori_menu;
    if ( $is_super_admin == 1 ) {
        $CI->db->select('A.*')
            ->from('tbl_menu A')
            ->where($where)
            ->order_by('urutan');
    } else {
        $where .= " AND B.is_read = 1";
        $CI->db->select('A.*')
            ->from('tbl_menu A')
            ->join('tbl_hak_akses B', 'A.id_menu = B.id_menu AND B.id_role = '.$id_role)
            ->where($where)
            ->order_by('urutan');
    }
    $query = $CI->db->get();
    if ( is_object($query) ) {
        $result = $query->result();
        return $result;
    }
    return array();
}

function generate_kategori_menu($id_parent = 0, $level = 1) {
    $CI = &get_instance();
    $controller = $CI->router->fetch_class();
    if ( $level <= 2 ) {
        if ( empty($id_parent) ){
            $CI->db->where('id_parent IS NULL');
        } else {
            $CI->db->where('id_parent', $id_parent);
        }            

        $CI->db->order_by('urutan');
        $query = $CI->db->get('tbl_kategori_menu');
        if ( is_object($query) ) {
            $result = $query->result();
            $string_menu = NULL;
            foreach ($result as $res) {
                $cat_active = '';
                $list_menu = get_list_menu($res->id_kategori_menu);
                $sub_kategori_menu = generate_kategori_menu($res->id_kategori_menu, ($level+1));
                $cat_icon = '<i class="fa fa-folder"></i>';
                if ( count($list_menu) > 0 ) {

                    $temp_string_menu = NULL;
                    $temp_string_menu .= '<ul class="treeview-menu">';

                    $have_active = false;
                    foreach ($list_menu as $menu) {
                        $class_active = NULL;
                        if ( $menu->cname == $controller ) {
                            $class_active = ' class="active"';
                            $have_active = true;
                        }
                        $icon = '<i class="fa fa-th-list"></i>';
                        if ( $menu->cname == 'pendaftaran' ) {
                            $count_verifikasi = get_count_verif_head_unit($_SESSION['id_role']);
                            $string_count_verifikasi = NULL;
                            if ( $count_verifikasi > 0 ) {
                                $string_count_verifikasi = '<span class="pull-right-container"><span class="label label-primary pull-right">'.$count_verifikasi.'</span></span>';
                            }
                            $temp_string_menu .= '<li'.$class_active.'><a href="'.base_url().$menu->uri.'">'.$icon.' '.$menu->menu.' '.$string_count_verifikasi.'</a></li>';
                        } else if ( $menu->cname == 'verifikasi_sub_account' ) {
                            $count_verifikasi = get_count_verif_sub_account($_SESSION['id_role']);
                            $string_count_verifikasi = NULL;
                            if ( $count_verifikasi > 0 ) {
                                $string_count_verifikasi = '<span class="pull-right-container"><span class="label label-primary pull-right">'.$count_verifikasi.'</span></span>';
                            }
                            $temp_string_menu .= '<li'.$class_active.'><a href="'.base_url().$menu->uri.'">'.$icon.' '.$menu->menu.' '.$string_count_verifikasi.'</a></li>';
                        }else if ( $menu->cname == 'verifikasi_variasi_perusahaan' ) {
                            $count_verifikasi = get_count_verif_variasi_perusahaan($_SESSION['id_role']);
                            $string_count_verifikasi = NULL;
                            if ( $count_verifikasi > 0 ) {
                                $string_count_verifikasi = '<span class="pull-right-container"><span class="label label-primary pull-right">'.$count_verifikasi.'</span></span>';
                            }
                            $temp_string_menu .= '<li'.$class_active.'><a href="'.base_url().$menu->uri.'">'.$icon.' '.$menu->menu.' '.$string_count_verifikasi.'</a></li>';
                        }else if ( $menu->cname == 'verifikasi_variasi_edit_perusahaan' ) {
                            $count_verifikasi = get_count_verif_variasi_edit_perusahaan($_SESSION['id_role']);
                            $string_count_verifikasi = NULL;
                            if ( $count_verifikasi > 0 ) {
                                $string_count_verifikasi = '<span class="pull-right-container"><span class="label label-primary pull-right">'.$count_verifikasi.'</span></span>';
                            }
                            $temp_string_menu .= '<li'.$class_active.'><a href="'.base_url().$menu->uri.'">'.$icon.' '.$menu->menu.' '.$string_count_verifikasi.'</a></li>';
                        }else if ( $menu->cname == 'verifikasi_variasi_pabrik' ) {
                            $count_verifikasi = get_count_verif_variasi_pabrik($_SESSION['id_role']);
                            $string_count_verifikasi = NULL;
                            if ( $count_verifikasi > 0 ) {
                                $string_count_verifikasi = '<span class="pull-right-container"><span class="label label-primary pull-right">'.$count_verifikasi.'</span></span>';
                            }
                            $temp_string_menu .= '<li'.$class_active.'><a href="'.base_url().$menu->uri.'">'.$icon.' '.$menu->menu.' '.$string_count_verifikasi.'</a></li>';
                        }else if ( $menu->cname == 'verifikasi_variasi_edit_pabrik' ) {
                            $count_verifikasi = get_count_verif_variasi_edit_pabrik($_SESSION['id_role']);
                            $string_count_verifikasi = NULL;
                            if ( $count_verifikasi > 0 ) {
                                $string_count_verifikasi = '<span class="pull-right-container"><span class="label label-primary pull-right">'.$count_verifikasi.'</span></span>';
                            }
                            $temp_string_menu .= '<li'.$class_active.'><a href="'.base_url().$menu->uri.'">'.$icon.' '.$menu->menu.' '.$string_count_verifikasi.'</a></li>';
                        } else {
                            $temp_string_menu .= '<li'.$class_active.'><a href="'.base_url().$menu->uri.'">'.$icon.' '.$menu->menu.'</a></li>';
                        }
                    }
                    $class_active_cat = $have_active || preg_match('/class\=\"active\"/', $sub_kategori_menu) ? ' class="active"' : NULL;
                    $string_menu .= '<li'.$class_active_cat.'>';
                    $string_menu .= '<a href="#">'.$cat_icon.' '.strtoupper($res->kategori_menu).' <span class="fa fa-arrow"></span></a>';
                    $string_menu .= $temp_string_menu;
                    $string_menu .= $sub_kategori_menu;
                    $string_menu .= '</ul>';
                    $string_menu .= '</li>';
                } 
                else if ( !empty($sub_kategori_menu) ) {
                    $temp_string_menu = NULL;
                    $temp_string_menu .= '<ul class="treeview-menu">';
                    $temp_string_menu .= $sub_kategori_menu;
                    $class_active_cat = preg_match('/class\=\"active\"/', $sub_kategori_menu) ? ' class="active"' : NULL;
                    $string_menu .= '<li'.$class_active_cat.'>';
                    $string_menu .= '<a href="#">'.$cat_icon.' '.strtoupper($res->kategori_menu).' <span class="fa fa-arrow"></span></a>';
                    $string_menu .= $temp_string_menu;
                    $string_menu .= '</ul>';
                    $string_menu .= '</li>';
                }
            }
            return $string_menu;
        }
    }
    return NULL;
}

function generate_menu() {
    $CI = &get_instance();
    $controller = $CI->router->fetch_class();
    $string_menu = '<ul class="sidebar-menu">';
    $string_menu .= '<li class="header">MENU UTAMA</li>';
    $dashboard_active = $controller == 'dashboard' ? 'class="active"' : NULL;
    $string_menu .= '<li '.$dashboard_active.'>
                    <a href="'.base_url().'dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>';
    if($_SESSION['id_role']!= 99){
        $list_menu = get_list_menu();
        foreach ($list_menu as $menu) {
            $class_active = $controller == $menu->cname ? ' class="active"' : NULL;
            $icon = '<i class="fa fa-th-list"></i>';
            $string_menu .= '<li'.$class_active.'>';
            $string_menu .= '<a href="'.base_url().$menu->uri.'">'.$icon.' '.$menu->menu.'</a>';
            $string_menu .= '</li>';
        }
        $string_menu .=  generate_kategori_menu();
    }else{
        $string_menu .= '<li class="active">
                    <a href="'.base_url().'administrasi_website/verifikasi_head_unit"><i class="fa fa-menu"></i> <span>Verifikasi Head Unit</span></a>
                </li>';
    }
    $string_menu .= '</ul>';
    return $string_menu;
}

function check_unique_pk_table($table_name, $pk_name, $value, $current_id = '', $is_numeric = false) {
    $CI = &get_instance();
    if ( $is_numeric )
        $where = $pk_name." = ".$value;
    else
        $where = $pk_name." = '".$value."'";

    if ( !empty($current_id) && $is_numeric ) {
        $where .= " AND ".$pk_name." <> ".$current_id;
    } else if ( !empty($current_id) ) {
        $where .= " AND ".$pk_name." <> '".$current_id."'";
    }

    $CI->db->where($where);
    $count = $CI->db->count_all_results($table_name);
    if ( $count > 0 )
        return true;

    return false;
}
function get_count_verif_head_unit($role) {
    if ( $role >= VERIFIKATOR_ID && $role <= DIREKTUR_ID ) {
        $CI = &get_instance();
        if ( !empty($role) ) {
            if ( $role == VERIFIKATOR_ID ) {
                $CI->db->where('posisi_data >= '.$role);
            } else {
                $CI->db->where('posisi_data', $role);
            }
            $count = $CI->db->count_all_results('tbl_perusahaan');

            return $count;
        }
    }
    return 0;
}
function get_count_verif_sub_account($role) {
    if ( $role >= VERIFIKATOR_ID && $role <= DIREKTUR_ID ) {
        $CI = &get_instance();
        if ( !empty($role) ) {
            $CI->db->where('posisi_data', $role);
            $count = $CI->db->count_all_results('tbl_sub_perusahaan');
            return $count;
        }
    }
    return 0;
}
function get_list_akun_by_role($role) {
    $CI = &get_instance();
    $CI->db->select('id_user, nama')->from('tbl_user')->where('id_role', $role);
    $query = $CI->db->get();
    if ( is_object($query) ) {
        $result = $query->result();
        return $result;
    }
    return array();
}
function get_last_proses_verifikasi_perusahaan($id_perusahaan) {
    $CI = &get_instance();
    $CI->db->select('A.*, B.proses_verifikasi')
             ->from('tbl_verifikasi_perusahaan A')
             ->join('m_proses_verifikasi B', 'A.id_proses_verifikasi = B.id_proses_verifikasi')
             ->where('id_perusahaan', $id_perusahaan)
             ->order_by('id_verifikasi_perusahaan', 'desc');
    $query = $CI->db->get();
    if ( is_object($query) ) {
        $row = $query->row();
        if ( is_object($row) ) {
            return $row;
        }
    }
    return false;
}

function get_last_proses_verifikasi_sub_perusahaan($id_sub_perusahaan) {
    $CI->db->select('A.*, B.proses_verifikasi')
             ->from('tbl_verifikasi_sub_perusahaan A')
             ->join('m_proses_verifikasi B', 'A.id_proses_verifikasi = B.id_proses_verifikasi')
             ->where('id_sub_perusahaan', $id_sub_perusahaan)
             ->order_by('id_verifikasi_sub_perusahaan', 'desc');
   $query = $CI->db->get();
   if ( is_object($query) ) {
        $row = $query->row();
        if ( is_object($row) ) {
            return $row;
        }
    }
    return false;
}
function show_file_columns($filename = '', $path = '') {
    if ( !empty($filename) ) {
        $expl = explode('.', $filename);
        $extension = $expl[count($expl)-1];
        if ( in_array(strtolower($extension), array('jpg','jpeg','gif','png','ico','bmp')) ) {
            return '<img class="img" src="'.base_url().$path.$filename.'" style="max-width: 100%">';
        } else {
           return '<a href="javascript:Popup(\''.base_url().$path.$filename.'\')">Lihat Dokumen</a>';
            // return '<a href="'.base_url().$path.$filename.'" target="_blank">Lihat File</a>';
        }
    }
    return NULL;
}
function get_one_row($table='',$con='',$val=''){
    if(isset($con)){
        $con = array($con => $val);
    }
    $CI = &get_instance();
    $CI->db->select('value')
        ->from($table)
        ->where($con);
    $query = $CI->db->get();
    if ( is_object($query) ) {
        $data = $query->row();
        if ( is_object($data) )
            $output = $data->value;
    }
    return $output;
}
function get_identitas_perusahaan($id_identitas_perusahaan=''){
    $CI = &get_instance();
    $CI->db->select('identitas_perusahaan')
        ->from('m_identitas_perusahaan')
        ->where('id_identitas_perusahaan', $id_identitas_perusahaan);
    $query = $CI->db->get();
    if ( is_object($query) ) {
        $data = $query->row();
        if ( is_object($data) )
            return $data->identitas_perusahaan;
    }
    return NULL;
}
function format_npwp($string = '') {
    $length = strlen($string);
    $new_string = NULL;
    for ( $i=0; $i<$length; $i++ ) {
        if ( in_array($i, array(2,5,8,12)) ) {
            $new_string .= '.';
        } else if ( $i == 9 ) {
            $new_string .= '-';
        }
        $new_string .= $string[$i];
    }
    return $new_string;
}

/** Variasi Count **/
function get_count_verif_variasi_perusahaan($role) {
    if ( $role >= VERIFIKATOR_ID && $role <= DIREKTUR_ID ) {
        $CI = &get_instance();
        if ( !empty($role) ) {
            $CI->db->where('posisi_data', $role);
            $CI->db->where('is_active', 1);
            $CI->db->where('is_variasi', 1);
            $count = $CI->db->count_all_results('tbl_variasi_perusahaan_pending');
            return $count;
        }
    }
    return 0;
}
function get_count_verif_variasi_pabrik($role) {
    if ( $role >= VERIFIKATOR_ID && $role <= DIREKTUR_ID ) {
        $CI = &get_instance();
        if ( !empty($role) ) {
            $CI->db->where('posisi_data', $role);
            $CI->db->where('is_active', 1);
            $CI->db->where('is_variasi', 1);
            $count = $CI->db->count_all_results('tbl_variasi_pabrik_pending');
            return $count;
        }
    }
    return 0;
}
function get_count_verif_variasi_edit_perusahaan($role) {
    if ( $role >= VERIFIKATOR_ID && $role <= DIREKTUR_ID ) {
        $CI = &get_instance();
        if ( !empty($role) ) {
            $CI->db->where('posisi_data', $role);
            $CI->db->where('is_active', 1);
            $CI->db->where('is_variasi', 0);
            $count = $CI->db->count_all_results('tbl_variasi_perusahaan_pending');
            return $count;
        }
    }
    return 0;
}
function get_count_verif_variasi_edit_pabrik($role) {
    if ( $role >= VERIFIKATOR_ID && $role <= DIREKTUR_ID ) {
        $CI = &get_instance();
        if ( !empty($role) ) {
            $CI->db->where('posisi_data', $role);
            $CI->db->where('is_active', 1);
            $CI->db->where('is_variasi', 0);
            $count = $CI->db->count_all_results('tbl_variasi_pabrik_pending');
            return $count;
        }
    }
    return 0;
}
function random_number($length = 5) {
    $chars = "1234567890";
    $i = 0;
    $number = "";
    while ($i < $length) {
        $number .= $chars{mt_rand(0,strlen($chars)-1)};
        $i++;
    }
    return $number;
}

function format_date_with_time($datetime = '') {
    $result = '';
    if ( !empty($datetime) && !preg_match('/0000-00-00/', $datetime) ) {
        $expl_space     = explode(' ', $datetime);
        $tanggal        = $expl_space[0];
        $expl_tanggal   = explode('-', $tanggal);
        if ( count($expl_tanggal) > 2 ) {
            $result = $expl_tanggal[2] . ' ' . get_nama_bulan($expl_tanggal[1]) . ' ' . $expl_tanggal[0];
        }
        if ( count($expl_space) > 1 ) {
            $time = $expl_space[1];
            $result .= ' '.substr($time, 0, 5);
        }
    }

    return $result;
}

function check_counter(){
    $CI = &get_instance();
    $sql = "SELECT value_task as jml FROM tbl_setting_content WHERE variable_task = 'counter_website' LIMIT 1";
    $query = $CI->db->query($sql);
    if(is_object($query)){
        return $query->row()->jml;
    }
    return false;
}

function update_counter(){
    $CI = &get_instance();
    $sql = "UPDATE tbl_setting_content SET value_task = value_task+1 WHERE variable_task = 'counter_website'";
    $query = $CI->db->query($sql);
    if(is_object($query)){
        if(is_object($query->row()))
        return $query->row_array();
    }
    return false;
}
function get_nilai_pasar_objek($id_lokasi, $jenis_objek, $jenis_pembanding = 0) {
    $CI = &get_instance(); 
    $result = array('nilai_pasar' => 0, 'nilai_likuidasi' => 0, 'jumlah_satuan' => 1, 'jumlah_data_banding' => 0, 'luas_tanah' => 0, 'luas_bangunan' => 0);
    $nilai_pasar_tanah = $nilai_pasar_bangunan = 0;
                $nilai_likuidasi_tanah = $nilai_likuidasi_bangunan = 0;
                $luas_tanah = $luas_bangunan = 0;
                $jumlah_satuan = 0;
                $CI = &get_instance();
                $CI->db->select('nilai_pasar, nilai_likuidasi, luas_tanah')
                       ->from('txn_tanah')
                       ->where('id_lokasi', $id_lokasi);
                $query_tanah = $CI->db->get();
                if ( is_object($query_tanah) ) {
                    $row_tanah = $query_tanah->row();
                    if ( is_object($row_tanah) ) {
                        $nilai_pasar_tanah = $row_tanah->nilai_pasar;
                        $nilai_likuidasi_tanah = $row_tanah->nilai_likuidasi;
                        $luas_tanah = $row_tanah->luas_tanah;
                    }
                }
                $CI->db->select('SUM(nilai_pasar_fisik) AS nilai_pasar,
                                 SUM(indikasi_nilai_likuidasi_fisik) AS nilai_likuidasi,
                                 COUNT(*) AS jumlah_satuan,
                                 SUM(cast(luas as decimal(18,0))) AS luas_bangunan', false)
                       ->from('txn_bangunan')
                       ->where('id_lokasi', $id_lokasi);
                $query_bangunan = $CI->db->get();

                if ( is_object($query_bangunan) ) {
                    $row_bangunan = $query_bangunan->row();
                    if ( is_object($row_bangunan) ) {
                        $nilai_pasar_bangunan = $row_bangunan->nilai_pasar;
                        $nilai_likuidasi_bangunan = $row_bangunan->nilai_likuidasi;
                        $jumlah_satuan = $row_bangunan->jumlah_satuan;
                        $luas_bangunan =  $row_bangunan->luas_bangunan;
                    }
                }
                $nilai_pasar = $nilai_pasar_tanah+$nilai_pasar_bangunan;
                $nilai_likuidasi = $nilai_likuidasi_tanah+$nilai_likuidasi_bangunan;
                $result = array(
                    'nilai_pasar' => $nilai_pasar, 
                    'nilai_likuidasi' => $nilai_likuidasi,
                    'jumlah_satuan' => 1,
                    'luas_tanah'    => $luas_tanah,
                    'luas_bangunan' => $luas_bangunan
                );
    $jumlah_data_banding = 0;
    $CI->db->select('COUNT(*) AS total', false)
           ->from('txn_data_banding')
           ->where('id_lokasi', $id_lokasi)
           ->where('jenis_pembanding > 0');
    $query_banding = $CI->db->get();
    if ( is_object($query_banding) ) {
        $row_banding = $query_banding->row();
        if ( is_object($row_banding) ) {
            $jumlah_data_banding = $row_banding->total;
        }
    }
    $result['jumlah_data_banding'] = $jumlah_data_banding;
    return $result;
}
function format_ymd($str)
{
    if (empty($str) || $str=="0000-00-00" || $str == "0000-00-00 00:00:00")
    {
        return "";
    }

    $time = strtotime($str);

    if (!$time)
    {
        return "";
    }
    $ymd = date("Y-m-d", $time);

    return $ymd;
}
function terbilang($angka) {
    // pastikan kita hanya berususan dengan tipe data numeric
    $angka = (float)$angka;
     
    // array bilangan 
    // sepuluh dan sebelas merupakan special karena awalan 'se'
    $bilangan = array(
            '',
            'satu',
            'dua',
            'tiga',
            'empat',
            'lima',
            'enam',
            'tujuh',
            'delapan',
            'sembilan',
            'sepuluh',
            'sebelas'
    );
     
    // pencocokan dimulai dari satuan angka terkecil
    if ($angka < 12) {
        // mapping angka ke index array $bilangan
        return $bilangan[$angka];
    } else if ($angka < 20) {
        // bilangan 'belasan'
        // misal 18 maka 18 - 10 = 8
        return $bilangan[$angka - 10] . ' belas';
    } else if ($angka < 100) {
        // bilangan 'puluhan'
        // misal 27 maka 27 / 10 = 2.7 (integer => 2) 'dua'
        // untuk mendapatkan sisa bagi gunakan modulus
        // 27 mod 10 = 7 'tujuh'
        $hasil_bagi = (int)($angka / 10);
        $hasil_mod = $angka % 10;
        return trim(sprintf('%s puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
    } else if ($angka < 200) {
        // bilangan 'seratusan' (itulah indonesia knp tidak satu ratus saja? :))
        // misal 151 maka 151 = 100 = 51 (hasil berupa 'puluhan')
        // daripada menulis ulang rutin kode puluhan maka gunakan
        // saja fungsi rekursif dengan memanggil fungsi terbilang(51)
        return sprintf('seratus %s', terbilang($angka - 100));
    } else if ($angka < 1000) {
        // bilangan 'ratusan'
        // misal 467 maka 467 / 100 = 4,67 (integer => 4) 'empat'
        // sisanya 467 mod 100 = 67 (berupa puluhan jadi gunakan rekursif terbilang(67))
        $hasil_bagi = (int)($angka / 100);
        $hasil_mod = $angka % 100;
        return trim(sprintf('%s ratus %s', $bilangan[$hasil_bagi], terbilang($hasil_mod)));
    } else if ($angka < 2000) {
        // bilangan 'seribuan'
        // misal 1250 maka 1250 - 1000 = 250 (ratusan)
        // gunakan rekursif terbilang(250)
        return trim(sprintf('seribu %s', terbilang($angka - 1000)));
    } else if ($angka < 1000000) {
        // bilangan 'ribuan' (sampai ratusan ribu
        $hasil_bagi = (int)($angka / 1000); // karena hasilnya bisa ratusan jadi langsung digunakan rekursif
        $hasil_mod = $angka % 1000;
        return sprintf('%s ribu %s', terbilang($hasil_bagi), terbilang($hasil_mod));
    } else if ($angka < 1000000000) {
        // bilangan 'jutaan' (sampai ratusan juta)
        // 'satu puluh' => SALAH
        // 'satu ratus' => SALAH
        // 'satu juta' => BENAR 
        // @#$%^ WT*
         
        // hasil bagi bisa satuan, belasan, ratusan jadi langsung kita gunakan rekursif
        $hasil_bagi = (int)($angka / 1000000);
        $hasil_mod = $angka % 1000000;
        return trim(sprintf('%s juta %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
    } else if ($angka < 1000000000000) {
        // bilangan 'milyaran'
        $hasil_bagi = (int)($angka / 1000000000);
        // karena batas maksimum integer untuk 32bit sistem adalah 2147483647
        // maka kita gunakan fmod agar dapat menghandle angka yang lebih besar
        $hasil_mod = fmod($angka, 1000000000);
        return trim(sprintf('%s milyar %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
    } else if ($angka < 1000000000000000) {
        // bilangan 'triliun'
        $hasil_bagi = $angka / 1000000000000;
        $hasil_mod = fmod($angka, 1000000000000);
        return trim(sprintf('%s triliun %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
    } else {
        return 'Wow...';
    }
}
function get_data_kjpp() {
    $CI = &get_instance();
    $CI->db->from('mst_kjpp')
           ->limit(1);
    $query = $CI->db->get();
    if ( is_object($query) ) {
        $row = $query->row();
        if ( is_object($row) )
            return $row;
    }
    return false;
}
function numberToRomanRepresentation($number) {
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}
?>