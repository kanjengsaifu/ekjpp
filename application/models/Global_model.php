<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class global_model extends CI_Model 
{
	
	function __construct() 
	{
		parent::__construct();
	}
	function generate_nomor_laporan() {
		$nomor_laporan = '000000000';
		$nomor_urut = 1;
		$this->db->select_max('id')
				 ->from('mst_pekerjaan');
		$query = $this->db->get();
		if ( is_object($query) ) {
			$row = $query->row();
			if ( is_object($row) ) {
				$max = $row->id;
				$nomor_urut = $max+1;
			}
		}
		$jum_str = strlen($nomor_laporan);
		$no_laporan = str_pad($nomor_urut,$jum_str,$nomor_laporan,STR_PAD_LEFT);
		return $no_laporan;
	}
	
	function get_data($table_name = "", $total_condition = 0, $field_name = array(), $field_value = array(), $order_field = "id", $order_type = "ASC", $page = null, $data_size = null)
	{
		$this->db->from($table_name);
		
		for ($i = 0; $i < $total_condition; $i++)
		{
			$this->db->where($field_name[$i], $field_value[$i]);
		}
		
		$this->db->order_by($order_field, $order_type);
		
		if ($page != null && $data_size != null){
			$this->db->limit($data_size, $page);
		}
		
		return $this->db->get();
	}
	
	function get_by_query($query)
	{
		$query_run = $this->db->query($query);
		return $query_run;
	}
	
	function get_for_paging($table_name = "", $field = array(), $total_condition = 0, $field_name = array(), $field_value = array(), $order_field = "id", $order_type = "ASC", $page = 0, $data_size = 0)
	{
		$query	= "SELECT ";
		$query 	.= empty($field) ? " * " : join(", ",$field );
		$query	.= " FROM ".$table_name." ";
		$query	.= $total_condition != 0 ? "WHERE " : "";
		
		for ($a = 0; $a < $total_condition; $a++)
		{
			$query	.= $field_name[$a]." = '".$field_value[$a]."' ";
			$query	.= $a != ($total_condition - 1) ? " AND " : "";
		}
		
		$query	.= " ORDER BY ".$order_field." ".$order_type;
		$query	.= $data_size != 0 ? " LIMIT ".$page.", ".$data_size : "";
		
		$query_run = $this->db->query($query);
		return $query_run;
	}
	
	function save($table_name, $data)
	{
		$data["created"]	= empty($data["created"]) ? date("Y-m-d H:i:s") : $data["created"];
		$data["updated"]	= empty($data["updated"]) ? date("Y-m-d H:i:s") : $data["updated"];
		
		$this->db->insert($table_name, $data);
		return $this->db->insert_id();		
	}
	function save_history($table_name, $data)
	{
		$data["created_by"]	= empty($data["created_by"]) ? 'admin' : $data["created_by"];
		$data["created"]	= empty($data["created"]) ? date("Y-m-d H:i:s") : $data["created"];
		
		$this->db->insert($table_name, $data);
		return $this->db->insert_id();		
	}
	
	function update($table_name = "", $total_condition = 0, $field_name = array(), $field_value = array(), $data)
	{
		for ($i = 0; $i < $total_condition; $i++)
		{
			$this->db->where($field_name[$i], $field_value[$i]);
		}
		
		$data["updated"]	= date("Y-m-d H:i:s");
		
		return $this->db->update($table_name, $data);
	}
	
	function update_by_id($table_name = "", $pk_name = '', $pk_value = NULL, $data)
	{
		if ( !empty($pk_value) ) {
			$this->db->where($pk_name, $pk_value);
			$this->db->update($table_name, $data);
		}
	}
	
	function delete($table_name, $total_condition = 0, $field_name = array(), $field_value = array())
	{
		for ($i = 0; $i < $total_condition; $i++)
		{
			$this->db->where($field_name[$i], $field_value[$i]);
		}
		
		$this->db->delete($table_name);
		return TRUE;		
	}
	function get_list($table = '', $con = '', $sort_by = '', $order_by = 'ASC', $limit = NULL) {
        $this->db->from($table);
        if ( !empty($con) ) {
            $this->db->where($con);
        }
        if ( !empty($limit) && $limit > 0 ) {
        	$this->db->limit($limit);
        }
        if ( !empty($sort_by) )
            $this->db->order_by($sort_by, $order_by);
        $query = $this->db->get();
        if ( is_object($query) ) {
            $result = $query->result();
            return $result;
        }
        return array();
    }
    
    function get_list_array($table = '', $con = '', $sort_by = '', $order_by = 'ASC', $limit = '') {
        $this->db->from($table);
        if ( !empty($con) ) {
            $this->db->where($con);
        }
        if ( !empty($sort_by) ){
            $this->db->order_by($sort_by, $order_by);
        }
        if ( !empty($limit) ){
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        if ( is_object($query) ) {
            $result = $query->result_array();
            return $result;
        }
        return array();
    }
    function get_by_id($table = '', $pk_name = '', $id = '') {
        $this->db->from($table)->where($pk_name, $id);
        $query = $this->db->get();
        if ( is_object($query) ) {
            $data = $query->row();
            if ( is_object($data) )
                return $data;
        }
        return false;
    }

    function get_by_id_array($table = '', $con = '', $val = ''){
        $this->db->from($table)->where($con, $val);
        $query = $this->db->get();
        $data = $query->row_array();
        return $data;
    }

    function insert_data($table = '', $data, $return_last_id = true) {
        $this->db->insert($table, $data);
        if ( $return_last_id )
            return $this->db->insert_id();
        else
            return true;
    }
    function update_data($table = '', $pk_name = '', $id, $data) {
        $this->db->where($pk_name, $id);
        $update = $this->db->update($table, $data);
        return $update;
    }
    function delete_data($table = '', $pk_name = '', $id = '') {
        $this->db->where($pk_name, $id);
        $delete = $this->db->delete($table);
        return $delete;
    }
    function get_value_column($table_name = "", $value_name, $con = array()) {
    	$this->db->select($value_name)->from($table_name)->where($con);
    	$query = $this->db->get();
    	if ( is_object($query) ) {
    		$row = $query->row();
    		if ( is_object($row) )
    			return $row->$value_name;
    	}
    	return NULL;
	}
}

?>