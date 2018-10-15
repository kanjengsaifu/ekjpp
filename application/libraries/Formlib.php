<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class formlib
{
	function __construct()
	{
		$this->_ci =& get_instance();

	}

	// Initial Form Component
	function _generate_input_text($name = "", $placeholder = "", $value = "", $visible = true, $required = false, $maxlength = "", $readonly = false)
	{
		$content	= "<input type='".($visible == true ? "text" : "hidden")."' id='".$name."' name='".$name."' class='form-control input-sm number-".str_replace("input[", "", str_replace("]", "", $name))."' value='".((set_value(".$name.")) ? set_value(".$name.") : $value)."' placeholder='".$placeholder."'".(empty($maxlength) ? NULL : " maxlength='".$maxlength."'")." ".($required ? "required" : "").(!$readonly ? "":" readonly").">";

		return $content;
	}

	function _generate_input_textarea($name = "", $placeholder = "", $value = "", $visible = true, $required = false)
	{
		$content	= "<textarea id='".$name."' name='".$name."' class='form-control input-sm' placeholder='".$placeholder."'>".((set_value(".$name.")) ? set_value(".$name.") : $value)."</textarea>";

		return $content;
	}

	function _generate_dropdown_master($table_name, $name, $field_id, $field_name, $selected, $required = false)
	{
		$order_field	= "id";
		if ( !empty($field_name) ) {
			$order_field = $field_name;
		}

		$list_dropdown	= $this->_ci->global_model->get_data($table_name, 0, array(), array(), $order_field, "asc")->result();

		$data_dropdown = "<select id='".$name."' name='".$name."' class='form-control cmb_select2 input-sm' ".($required ? "required" : "").">";
		$data_dropdown .= "<option disabled='disabled' selected='selected'>Pilih</option>";
		foreach ($list_dropdown as $item_dropdown)
		{
			$data_dropdown .= "<option ";
			if ($selected == $item_dropdown->$field_id){
				$data_dropdown .= " selected='selected' ";
			}
			$data_dropdown .= " value='".$item_dropdown->$field_id."'>".$item_dropdown->$field_name."</option>";
		}
		$data_dropdown .= "</select>";

		return $data_dropdown;
	}

	function _generate_dropdown_master_condition($table_name, $total_condition = 0, $condition_field_name = array(), $field_value = array() , $name, $field_id, $field_name, $selected, $required = false)
	{
		$order_field	= "id";

		$list_dropdown	= $this->_ci->global_model->get_data($table_name, $total_condition, $condition_field_name, $field_value, $order_field, "asc")->result();

		$data_dropdown = "<select id='".$name."' name='".$name."' class='form-control input-sm' ".($required ? "required" : "").">";
		$data_dropdown .= "<option disabled='disabled' selected='selected'>Pilih</option>";
		foreach ($list_dropdown as $item_dropdown)
		{
			$data_dropdown .= "<option ";
			if ($selected == $item_dropdown->$field_id){
				$data_dropdown .= " selected='selected' ";
			}
			$data_dropdown .= " value='".$item_dropdown->$field_id."'>".$item_dropdown->$field_name."</option>";
		}
		$data_dropdown .= "</select>";

		return $data_dropdown;
	}

	function _generate_dropdown_master_project_manager($name, $field_id, $field_name, $selected, $required = false)
	{
		$order_field	= "id";

		$list_dropdown	= $this->_ci->global_model->get_list("view_user", "id_group=6 OR id_group=2", "nama");

		$data_dropdown = "<select id='".$name."' name='".$name."' class='form-control input-sm' ".($required ? "required" : "").">";
		$data_dropdown .= "<option disabled='disabled' selected='selected'>Pilih</option>";
		foreach ($list_dropdown as $item_dropdown)
		{
			$data_dropdown .= "<option ";
			if ($selected == $item_dropdown->$field_id){
				$data_dropdown .= " selected='selected' ";
			}
			$data_dropdown .= " value='".$item_dropdown->$field_id."'>".$item_dropdown->$field_name."</option>";
		}
		$data_dropdown .= "</select>";

		return $data_dropdown;
	}

	function _generate_dropdown_list($name, $list_count, $list_value, $list_caption, $selected, $required = false)
	{
		$data_dropdown = "<select id='".$name."' name='".$name."' class='form-control input-sm' ".($required ? "required" : "").">";

		$data_dropdown .= "<option disabled='disabled' selected='selected'>Pilih</option>";

		for ($i = 0; $i < $list_count; $i++)
		{
			$data_dropdown .= "<option ";
			if ($selected == $list_value[$i]){
				$data_dropdown .= " selected='selected' ";
			}
			$data_dropdown .= " value='".$list_value[$i]."'>".$list_caption[$i]."</option>";
		}
		$data_dropdown .= "</select>";

		return $data_dropdown;
	}

	function _generate_input_date($name = "", $placeholder = "", $value = "", $visible = true, $required = false, $format = "dd-mm-yyyy", $id = "", $class='', $addattr='')
	{
		$attr_id = (!$id) ? ' id="'.$name.'" ' : ' id="'.$id.'" ';
		$format_datepicker = "dd MM yyyy";
		$format_datepicker_php = "d M Y";
		$value_formated = "";
		if (false!=$value){
			$value_formated = format_datetime( $value );
			// var_dump($value_formated);
		}

		if ($format == "dd-mm-yyyy"){
			$format_php = "d-m-Y";
		}else{
			$format_php = "Y-m-d";
		}
		$content	= "
			<div class='date-group'>
				<input type='text' class='form-control input-sm date' value='".$value_formated."' required data-date-format='".$format_datepicker."' data-date-autoclose='true'>
				<input ".$attr_id." class='date-value ".$class."' type='hidden' name='".$name."' value='".(empty($value) ? date($format_php) : date($format_php, strtotime($value)))."' ".$addattr.">
			</div>
		";

		return $content;
	}
	function _generate_input_date_min($name = "", $placeholder = "", $value = "", $visible = true, $required = false, $format = "dd-mm-yyyy",$minDate="")
	{
		if ($format==""){
			$format = "dd-mm-yyyy";
		}
		if ($format == "dd-mm-yyyy"){
			$format_php = "d-m-Y";
		}else{
			$format_php = "Y-m-d";
		}
		$minDate2 = $minDate;
		if ($minDate==""){
			$minDate = date('Y-m-d');
			$date = DateTime::createFromFormat("Y-m-d", $minDate);
		}else{
			$date = new DateTime($minDate);
		}


    //echo $date->format("Y");
    $month = $date->format('n') - 1;
		$content	= "
			<input readonly type='text' id='".$name."' name='".$name."' class='form-control input-sm tanggal' value='".(empty($value) ? date($format_php) : date($format_php, strtotime($value)))."' required data-date-format='".$format."' data-date-autoclose='true'>
			<script>
			   $('#".$name."').datepicker({
					   startDate : new Date(". $date->format('Y') .",". $month .",". $date->format('d') .")
				 });
			</script>
		";

		return $content;
	}

	function _generate_input_time($name = "", $placeholder = "", $value = "", $visible = true, $required = false)
	{
		$content	= "
			<div class='input-group date' id='datetimepicker3'>
			<input type='text' id='".$name."' name='".$name."' class='form-control input-sm tanggal' value='".(empty($value) ? date("H:i:s") : date("H:i:s", strtotime($value)))."' required  data-format='H:i:s'>
			<span class='input-group-addon'>
                        <span class='glyphicon glyphicon-time'></span>
                    </span>
			</div>
			<script>
			$('#". $name ."').timepicker({
		     timeFormat: 'H:i:s'
		    });
			</script>
		";

		return $content;
	}

	function _generate_input_date1($name = "", $placeholder = "", $value = "", $visible = true, $required = false)
	{
		$content	= "
			<div class='input-group date default-date-picker' data-date-format='dd-mm-yyyy' data-date-autoclose='true'>

				<input type='".($visible == true ? "text" : "hidden")."' id='".$name."' name='".$name."' class='form-control input-sm' value='".((set_value(".$name.")) ? set_value(".$name.") : date("d-m-Y", strtotime($value)))."' placeholder='".$placeholder."'>
				<span class='input-group-addon'><i class='fa fa-calendar'></i></span>
			</div>
		";

		return $content;
	}

	function _generate_input_file_image($name = "", $placeholder = "", $value = "", $visible = true, $required = false)
	{
		$content	= "
			<input type='file' id='tmp_file' data-id='".$name."' value='' readonly='' />
			<input type='hidden' id='file' name='".$name."' value='".$value."' readonly='' />
			<div id='box_file' style='margin-top: 10px;'>".((!empty($value) ? "<a href='".base_url()."asset/file/".$value."' target='_blank'><img src='".base_url("asset/file/".$value)."' style='width: 200px;'></a>" : ""))."</div>

		";

		return $content;
	}

	function _generate_radio_master($table_name, $name, $field_id, $field_name, $selected, $required = false, $where_field = array(), $where_value = array())
	{
		$order_field	= "id";
		$list_dropdown	= $this->_ci->global_model->get_data($table_name, count($where_field), $where_field, $where_value, $order_field, "asc")->result();
		$content = "";
		
		foreach ($list_dropdown as $item_dropdown)
		{
			$content	.= "<input type='radio' id='".$name."' name='".$name."' value='".$item_dropdown->$field_id."' ".($selected == $item_dropdown->$field_id ? "checked='true'" : "")." class='objek_data' /> <span>".$item_dropdown->$field_name."</span><br> ";
		}
		$content .= "</select>";

		return $content;
	}

	function _generate_input_radio_no_caption($name = "", $list_value = array(), $value = "")
	{
		$content	= "";

		foreach($list_value as $item_value)
		{

			if($item_value=="Ya" || $item_value=="Diterima" || $item_value=="Sesuai" || $item_value=="Sedang" || $item_value=="Menerima" || $item_value=="Berisiko Rendah")
			{
				$content	.= "<input type='radio' id='".$name."' name='".$name."' value='".$item_value."' ".($item_value == $value ? "checked='true'" : "")." /> <span style='color:blue'>".$item_value."</span> ";
			}
			else if ($item_value=="Tidak" || $item_value=="Ditolak" || $item_value=="Tinggi" || $item_value=="Menolak" || $item_value=="Berisiko Tinggi")
			{
				$content	.= "<input type='radio' id='".$name."' name='".$name."' value='".$item_value."' ".($item_value == $value ? "checked='true'" : "")." /> <span style='color:red'>".$item_value."</span> ";
			}
			else
			{
				$content	.= "<input type='radio' id='".$name."' name='".$name."' value='".$item_value."' ".($item_value == $value ? "checked='true'" : "")." /> <span>".$item_value."</span> ";
			}

		}

		return $content;
	}

	function _generate_input_radio_no_caption1($name = "", $list_value = array(), $value = "")
	{
		$content	= "";

		foreach($list_value as $item_value)
		{
			$content	.= "<input type='radio' id='".$name."' name='".$name."' value='".$item_value."' ".($item_value == $value ? "checked='true'" : "")." /> ";
		}

		return $content;
	}

	function _generate_input_radio_caption($name = "", $list_value = array(), $value = "")
	{
		$content	= "";

		foreach($list_value as $item_value)
		{
			$content	.= "<input type='radio' id='".$name."' name='".$name."' value='".$item_value."' ".($item_value == $value ? "checked='true'" : "")." /> ".$item_value."<br />";
		}

		return $content;
	}

	function _generate_input_chekbox_objek_lokasi($id_lokasi = "")
	{
		$content	= "";
		$list_data	= $this->_ci->global_model->get_data("mst_jenis_objek");
		$list_chek	= $this->_ci->global_model->get_data("txn_lokasi_objek", 1, array("id_lokasi"), array($id_lokasi));

		$list_checked	= array();

		foreach ($list_chek->result() as $item_checked)
		{
			array_push($list_checked, $item_checked->id_jenis_objek);
		}

		foreach ($list_data->result() as $item_data)
		{
			$content	.= "
				<div class='checkbox'>
					<label>
					 	<input id='id_jenis_objek_".$item_data->id."' name='list_objek' ".(in_array($item_data->id, $list_checked) ? "checked='checked'" : "")."  type='checkbox' value='".$item_data->id."'>
						<label for='id_jenis_objek_".$item_data->id."'><span></span>".$item_data->nama."</label>
					</label>
				</div>
			";
		}

		return $content;
	}

}

?>
