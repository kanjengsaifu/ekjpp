<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class kertaskerjalib
{
	function __construct() 
	{
		$this->_ci =& get_instance();
		
	}
	
	function generate_form_1($pekerjaan = null, $lokasi = null)
	{
		$data["pekerjaan"]				= $pekerjaan;
		$data["lokasi"]					= $lokasi;
		$data["input"]["id_pekerjaan"]	= $this->_ci->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($pekerjaan->id), FALSE, TRUE);
		$data["input"]["id_lokasi"]		= $this->_ci->formlib->_generate_input_text("id_lokasi", "id_lokasi", $lokasi->id, FALSE, TRUE);
		
		$data["urutan"]					= (int)(str_replace("K", "", $lokasi->kode));
		$data["lokasi"]			= $lokasi;
		$list_field				= $this->_ci->global_model->get_data("mst_field_objek", 1, array("id_jenis_objek"), array($lokasi->id_jenis_objek));
		
		
		foreach ($list_field->result() as $item_field)
		{
			$name	= "update[".$item_field->nama."]";
			$value	= "";
			
			$data["input"][$item_field->nama]	= $this->get_textbox($lokasi, $item_field);
			
		}
		
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
			}
		}
		
		
		
		$content	= $this->_ci->load->view("pekerjaan/kertas_kerja/form_1", $data, true);
		return $content;
	}

	function generate_form_2($pekerjaan = null, $lokasi = null)
	{
		$data["pekerjaan"]				= $pekerjaan;
		$data["lokasi"]					= $lokasi;
		
		
		$data["urutan"]					= (int)(str_replace("K", "", $lokasi->kode));
		
		$data["input"]["id_pekerjaan"]	= $this->_ci->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($pekerjaan->id), FALSE, TRUE);
		$data["input"]["id_lokasi"]		= $this->_ci->formlib->_generate_input_text("id_lokasi", "id_lokasi", $lokasi->id, FALSE, TRUE);
		$data["list_image_lampiran"]	= $this->_ci->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($lokasi->id, 896), "keterangan", "ASC")->result();
		
		
		$list_field = $this->_ci->global_model->get_data("mst_field_objek", 1, array("id_jenis_objek"), array(1));
		
		foreach ($list_field->result() as $item_field)
		{
			$name	= "update[".$item_field->nama."]";
			$value	= "";
			
			$data["input"][$item_field->nama]	= $this->get_textbox($lokasi, $item_field);
			
		}
		
		$list_field = $this->_ci->global_model->get_by_query("SELECT * FROM mst_field_objek WHERE id_jenis_objek = 2 AND nama LIKE '%sarana%'");
		
		
		foreach ($list_field->result() as $item_field)
		{
			$name	= "update[".$item_field->nama."]";
			$value	= "";
			
			$data["input"][$item_field->nama]	= $this->get_textbox($lokasi, $item_field);
			
		}
		
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
			
			$data["input"]["jumlah_bangunan"]		= $this->_ci->formlib->_generate_input_text("jumlah_bangunan", "jumlah_bangunan", $bangunan, FALSE, TRUE);
		}
		
		$data["lokasi"]			= $lokasi;
		$data["custom_data"]	= $custom_data;

		$content	= $this->_ci->load->view("pekerjaan/kertas_kerja/form_2", $data, true);
		//$content	= $this->_ci->load->view("pekerjaan/kertas_kerja_edit/form_2", $data, true);
		return $content;
	}

	function generate_form_6($pekerjaan = null, $lokasi = null)
	{
		$data["pekerjaan"]				= $pekerjaan;
		$data["lokasi"]					= $lokasi;
		
		$data["urutan"]					= (int)(str_replace("K", "", $lokasi->kode));
		
		$data["input"]["id_pekerjaan"]	= $this->_ci->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($pekerjaan->id), FALSE, TRUE);
		$data["input"]["id_lokasi"]		= $this->_ci->formlib->_generate_input_text("id_lokasi", "id_lokasi", $lokasi->id, FALSE, TRUE);
		$data["list_image_lampiran"]	= $this->_ci->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($lokasi->id, 896), "keterangan", "ASC")->result();
		
		
		$list_field				= $this->_ci->global_model->get_data("mst_field_objek_apartemen", 1, array("id_jenis_objek"), array(1));
		
		foreach ($list_field->result() as $item_field)
		{
			$name	= "update[".$item_field->nama."]";
			$value	= "";
			
			$data["input"][$item_field->nama]	= $this->get_textbox($lokasi, $item_field);
			
		}
		
		$list_field				= $this->_ci->global_model->get_by_query("SELECT * FROM mst_field_objek_apartemen WHERE id_jenis_objek = 6 AND nama LIKE '%sarana%'");
		
		
		foreach ($list_field->result() as $item_field)
		{
			$name	= "update[".$item_field->nama."]";
			$value	= "";
			
			$data["input"][$item_field->nama]	= $this->get_textbox($lokasi, $item_field);
			
		}
		
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
			
			$data["input"]["jumlah_bangunan"]		= $this->_ci->formlib->_generate_input_text("jumlah_bangunan", "jumlah_bangunan", $bangunan, FALSE, TRUE);
		}

		$data["lokasi"]			= $lokasi;
		$data["custom_data"]	= $custom_data;
		
		$content	= $this->_ci->load->view("pekerjaan/kertas_kerja/form_4", $data, true);
		return $content;
	}


	function generate_form_7($pekerjaan = null, $lokasi = null)
	{
		$data["pekerjaan"]				= $pekerjaan;
		$data["lokasi"]					= $lokasi;
		
		$data["urutan"]					= (int)(str_replace("K", "", $lokasi->kode));
		
		$data["input"]["id_pekerjaan"]	= $this->_ci->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($pekerjaan->id), FALSE, TRUE);
		$data["input"]["id_lokasi"]		= $this->_ci->formlib->_generate_input_text("id_lokasi", "id_lokasi", $lokasi->id, FALSE, TRUE);
		$data["list_image_lampiran"]	= $this->_ci->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($lokasi->id, 896), "keterangan", "ASC")->result();
		
		
		$list_field				= $this->_ci->global_model->get_data("mst_field_objek_office_space", 1, array("id_jenis_objek"), array(1));
		
		foreach ($list_field->result() as $item_field)
		{
			$name	= "update[".$item_field->nama."]";
			$value	= "";
			
			$data["input"][$item_field->nama]	= $this->get_textbox($lokasi, $item_field);
			
		}
		
		$list_field				= $this->_ci->global_model->get_by_query("SELECT * FROM mst_field_objek_office_space WHERE id_jenis_objek = 7 AND nama LIKE '%sarana%'");
		
		
		foreach ($list_field->result() as $item_field)
		{
			$name	= "update[".$item_field->nama."]";
			$value	= "";
			
			$data["input"][$item_field->nama]	= $this->get_textbox($lokasi, $item_field);
			
		}
		
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
						"lantai" 	=> array("Lantai 1"),
						"ruangan" 	=> array("Ruang 1")
					)
				);
				
				$this->_ci->global_model->update("mst_lokasi", 1, array("id"), array($lokasi->id), array("custom_data" => serialize($custom_data)));
				$lokasi		= $this->_ci->global_model->get_data("view_lokasi", 1, array("id"), array($lokasi->id))->row();
			}
			
			$bangunan	= count($custom_data["tab_bangunan"]);
			
			$data["input"]["jumlah_bangunan"]		= $this->_ci->formlib->_generate_input_text("jumlah_bangunan", "jumlah_bangunan", $bangunan, FALSE, TRUE);
		}

		$data["lokasi"]			= $lokasi;
		$data["custom_data"]	= $custom_data;
		
		$content	= $this->_ci->load->view("pekerjaan/kertas_kerja/form_7", $data, true);
		return $content;
	}

	function generate_form_5($pekerjaan = null, $lokasi = null)
	{
		$data["pekerjaan"]				= $pekerjaan;
		$data["lokasi"]					= $lokasi;
		
		$data["urutan"]					= (int)(str_replace("K", "", $lokasi->kode));
		
		$data["input"]["id_pekerjaan"]	= $this->_ci->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($pekerjaan->id), FALSE, TRUE);
		$data["input"]["id_lokasi"]		= $this->_ci->formlib->_generate_input_text("id_lokasi", "id_lokasi", $lokasi->id, FALSE, TRUE);
		$data["list_image_lampiran"]	= $this->_ci->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($lokasi->id, 896), "keterangan", "ASC")->result();
		
		
		$list_field				= $this->_ci->global_model->get_data("mst_field_objek_ruko", 1, array("id_jenis_objek"), array(1));
		
		foreach ($list_field->result() as $item_field)
		{
			$name	= "update[".$item_field->nama."]";
			$value	= "";
			
			$data["input"][$item_field->nama]	= $this->get_textbox($lokasi, $item_field);
			
		}
		
		$list_field				= $this->_ci->global_model->get_by_query("SELECT * FROM mst_field_objek_ruko WHERE id_jenis_objek = 5 AND nama LIKE '%sarana%'");
		
		
		foreach ($list_field->result() as $item_field)
		{
			$name	= "update[".$item_field->nama."]";
			$value	= "";
			
			$data["input"][$item_field->nama]	= $this->get_textbox($lokasi, $item_field);
			
		}
		
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
						"lantai" 	=> array("Lantai 1"),
						"ruangan" 	=> array("Ruang 1")
					)
				);
				
				$this->_ci->global_model->update("mst_lokasi", 1, array("id"), array($lokasi->id), array("custom_data" => serialize($custom_data)));
				$lokasi		= $this->_ci->global_model->get_data("view_lokasi", 1, array("id"), array($lokasi->id))->row();
			}
			
			$bangunan	= count($custom_data["tab_bangunan"]);
			
			$data["input"]["jumlah_bangunan"]		= $this->_ci->formlib->_generate_input_text("jumlah_bangunan", "jumlah_bangunan", $bangunan, FALSE, TRUE);
		}
		
		$data["lokasi"]			= $lokasi;
		$data["custom_data"]	= $custom_data;
		
		$content	= $this->_ci->load->view("pekerjaan/kertas_kerja/form_5", $data, true);
		return $content;
	}


	function generate_form_3($pekerjaan = null, $lokasi = null)
	{
		$data["pekerjaan"]				= $pekerjaan;
		$data["lokasi"]					= $lokasi;
		
		$data["urutan"]					= (int)(str_replace("K", "", $lokasi->kode));
		
		$data["input"]["id_pekerjaan"]	= $this->_ci->formlib->_generate_input_text("id_pekerjaan", "id_pekerjaan", base64_encode($pekerjaan->id), FALSE, TRUE);
		$data["input"]["id_lokasi"]		= $this->_ci->formlib->_generate_input_text("id_lokasi", "id_lokasi", $lokasi->id, FALSE, TRUE);
		$data["list_image_lampiran"]	= $this->_ci->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($lokasi->id, 896), "keterangan", "ASC")->result();
		
		
		$list_field				= $this->_ci->global_model->get_data("mst_field_objek_kios", 1, array("id_jenis_objek"), array(1));
		
		foreach ($list_field->result() as $item_field)
		{
			$name	= "update[".$item_field->nama."]";
			$value	= "";
			
			$data["input"][$item_field->nama]	= $this->get_textbox($lokasi, $item_field);
			
		}
		
		$list_field				= $this->_ci->global_model->get_by_query("SELECT * FROM mst_field_objek_kios WHERE id_jenis_objek = 3 AND nama LIKE '%sarana%'");
		
		
		foreach ($list_field->result() as $item_field)
		{
			$name	= "update[".$item_field->nama."]";
			$value	= "";
			
			$data["input"][$item_field->nama]	= $this->get_textbox($lokasi, $item_field);
			
		}
		
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
						"lantai" 	=> array("Lantai 1"),
						"ruangan" 	=> array("Ruang 1")
					)
				);
				
				$this->_ci->global_model->update("mst_lokasi", 1, array("id"), array($lokasi->id), array("custom_data" => serialize($custom_data)));
				$lokasi		= $this->_ci->global_model->get_data("view_lokasi", 1, array("id"), array($lokasi->id))->row();
			}
			
			$bangunan	= count($custom_data["tab_bangunan"]);
			
			$data["input"]["jumlah_bangunan"]		= $this->_ci->formlib->_generate_input_text("jumlah_bangunan", "jumlah_bangunan", $bangunan, FALSE, TRUE);
		}
		
		$data["lokasi"]			= $lokasi;
		$data["custom_data"]	= $custom_data;
		
		$content	= $this->_ci->load->view("pekerjaan/kertas_kerja/form_3", $data, true);
		return $content;
	}

	function get_textbox($lokasi, $item_field, $keterangan = "")
	{
		$pekerjaan	= $this->_ci->global_model->get_data("view_pekerjaan", 1, array("id"), array($lokasi->id_pekerjaan))->row();
		
		$name       = "update[".$item_field->nama."]";
		$content	= "";
		
		// Date Value
		if ($keterangan == "" && $keterangan != 0)
		{
			$data_value	= $this->_ci->global_model->get_data("txn_lokasi_data", 2, array("id_lokasi", "id_field"), array($lokasi->id, $item_field->id));
			
			if ($data_value->num_rows() == 1)
			{
				$value	= $data_value->row()->jawab;
				// echo "$item_field->id 1<br>";
			}
			else
			{
				if ($item_field->nama == "entry_18"){
					$value	= $lokasi->alamat." ".$lokasi->gang." No ".$lokasi->nomor." RT ".$lokasi->rt." RW ".$lokasi->rw;
				}else if ($item_field->nama == "entry_21"){
					$value	= $lokasi->nama_provinsi;
				}else if ($item_field->nama == "entry_23"){
					$value	= $lokasi->nama_kota;
				}else if ($item_field->nama == "entry_25"){
					$value	= $lokasi->nama_kecamatan;
				}else if ($item_field->nama == "entry_27"){
					$value	= $lokasi->nama_desa;
				}
				
				else if ($item_field->nama == "entry_33"){
					$value	= $lokasi->dh_provinsi;
				}else if ($item_field->nama == "entry_34"){
					$value	= $lokasi->dh_kota;
				}else if ($item_field->nama == "entry_35"){
					$value	= $lokasi->dh_kecamatan;
				}else if ($item_field->nama == "entry_36"){
					$value	= $lokasi->dh_desa;
				}
				
				else{
					$value = $this->cek_value($pekerjaan, $lokasi, $item_field);
					// echo "$item_field->id 2<br>";
				}
			}
		}
		else
		{
			if ($item_field->id == 261 && $keterangan == "0")
			{
				$data_value = $this->_ci->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi","id_field", "keterangan"), array($lokasi->id, 639, "Bangunan_1"));
			}
			else
			{
				$data_value = $this->_ci->global_model->get_data("txn_lokasi_data", 3, array("id_lokasi","id_field","keterangan"), array($lokasi->id,$item_field->id,$keterangan));
			}
			

			if($data_value->num_rows() == 1)
			{
				$value = $data_value->row()->jawab;
			}
			else
			{
				$value = $this->cek_value($pekerjaan, $lokasi, $item_field);
			}
			// echo "$item_field->id :";
			// echo $value;
			// // echo $this->_ci->global_model->db->last_query();
			// echo "<br>";
		}
		
		if($item_field->type == "Textbox")
		{
			$content = "<input type='text' id='textbox_".$item_field->nama."' name='".$name."' class='form-control table_input input_".$item_field->id."_".$keterangan." ".$keterangan."' value='".((set_value(".$name.")) ? set_value(".$name.") : $value)."' data-id-field='".$item_field->id."' data-keterangan='".$keterangan."'>";
		}
		else if($item_field->type == "Number")
		{
			if (!empty($item_field->keterangan))
			{
				$default = explode(";", $item_field->keterangan);
				$min     = $default[0];
				$max     = $default[1];
			}
			else
			{
				$min     = null;
				$max     = null;
			}
			
			
			

			$content = "<input type='number' id='textbox_".$item_field->nama."' name='".$name."' class='form-control table_input number  input_".$item_field->id."_".$keterangan."' value='".((set_value(".$name.")) ? set_value(".$name.") : $value)."' data-id-field='".$item_field->id."' min='".$min."' max='".$max."' data-keterangan='".$keterangan."'>";
		}
		else if($item_field->type == "Date")
		{
			$content = "
			<input type='text' id='textbox_".$item_field->nama."' name='".$name."' class='form-control table_input' value='".((set_value(".$name.")) ? set_value(".$name.") : $value)."' data-id-field='".$item_field->id."' data-date-format='dd-mm-yyyy' data-date-autoclose='true' data-keterangan='".$keterangan."'>
			<script>
			$('#textbox_".$item_field->nama."').datepicker();
			</script>
			";
		}
		else if($item_field->type == "Dropdown")
		{
			$dropdown = "<select class='form-control table_input input_".$item_field->id."_".$keterangan."' id='textbox_".$item_field->nama."' name='".$name."' data-id-field='".$item_field->id."' data-keterangan='".$keterangan."'>";
			$dropdown .= "<option selected='selected' disabled='disabled'>Select</option>";

			$list_option = explode(";", $item_field->keterangan);

			//echo "<pre>"; var_dump($item_field->keterangan); var_dump($this->_ci->global_model->db->last_query());echo "</pre>";

			foreach($list_option as $item_option){

				if(!empty($item_option) || $item_option == "0"){
					
					if ($item_field->id == 270)
					{
						if($value == $item_option)
						$dropdown .= "<option value='".$item_option."' selected='selected'>".number_format($item_option)."</option>";
						else
						$dropdown .= "<option value='".$item_option."'>".number_format($item_option)."</option>";
					}
					else
					{
						if($value == $item_option)
						$dropdown .= "<option value='".$item_option."' selected='selected'>".$item_option."</option>";
						else
						$dropdown .= "<option value='".$item_option."'>".$item_option."</option>";
					}
					
					
				}
			}


			$dropdown .= "</select>";

			$content = $dropdown;
		}
		else if($item_field->type == "Dropdown Master")
		{
			$dropdown = "<select class='form-control table_input' id='textbox_".$item_field->nama."' name='".$name."' data-id-field='".$item_field->id."' data-keterangan='".$keterangan."'>";
			$dropdown .= "<option selected='selected' disabled='disabled'>Select</option>";
			
			if (!empty($item_field->condition))
			{
				$condition	= explode("||", $item_field->condition);
				
				$field_name		= array();
				$field_value	= array();
				
				for ($i = 0; $i < count($condition); $i++)
				{
					$field	= explode("=", $condition[$i]);
					array_push($field_name, $field[0]);
					array_push($field_value, $field[1]);
				}
				
				$list_option = $this->_ci->global_model->get_data($item_field->keterangan, count($condition), $field_name, $field_value);
			}
			else
			{
				$list_option = $this->_ci->global_model->get_data($item_field->keterangan);
			}
			
			

			//echo "<pre>"; var_dump($list_option->result()); var_dump($this->_ci->global_model->db->last_query());echo "</pre>";

			foreach($list_option->result() as $item_option){
				if($value == $item_option->nama)
				$dropdown .= "<option value='".$item_option->nama."' selected='selected'>".$item_option->nama."</option>";
				else
				$dropdown .= "<option value='".$item_option->nama."'>".$item_option->nama."</option>";
			}


			$dropdown .= "</select>";

			$content = $dropdown;
		}
		else if($item_field->type == "Textarea")
		{
			$content = "<textarea id='textbox_".$item_field->nama."' name='".$name."' class='form-control table_input input_".$item_field->id."_".$keterangan."' data-id-field='".$item_field->id."' data-keterangan='".$keterangan."'>".((set_value(".$name.")) ? set_value(".$name.") : $value)."</textarea>";
		}
		else if ($item_field->type == "Image")
		{
			if ($value == ""){
				$value = "default.jpg";
			}
			$img_style	= "";
			if ($item_field->id == 133)
			{
				$img_style	= "style='border: 1px solid #ccc; margin-top: 10px; margin-bottom: 20px; height: 100px;'";
			}
			else if ($item_field->id == 248 || $item_field->id == 247)
			{
				$img_style	= "style='display:block; min-width:100%;'";
			}
			else if ($item_field->id == 878 || $item_field->id == 877 || $item_field->id == 876 || $item_field->id == 875 || $item_field->id == 874 || $item_field->id == 873 || $item_field->id == 871 || $item_field->id == 870 || $item_field->id == 869 || $item_field->id == 868 || $item_field->id == 867 || $item_field->id == 866)
			{
				$img_style	= "style='display:block; width:100%;'";
			}
				
			$content	= "
				<img id='img_".$item_field->nama."' src='".base_url()."/asset/file/".$value."' data-id-field='".$item_field->id."'  data-name-field='".$item_field->nama."' data-keterangan='".$keterangan."' class='btn-upload-image img-".$item_field->id."-".$keterangan."' ".$img_style." />
				<input type='file' id='file-".$item_field->id."' class='tmp_file file-".$item_field->id."-".$keterangan."' data-id-field='".$item_field->id."' data-name-field='".$item_field->nama."' style='display: none;' data-keterangan='".$keterangan."'>
				<input type='hidden' id='textbox_".$item_field->nama."' name='".$name."' class='table_input textbox-".$item_field->id."-".$keterangan."' value='".((set_value(".$name.")) ? set_value(".$name.") : $value)."' data-id-field='".$item_field->id."' data-name-field='".$item_field->nama."' data-keterangan='".$keterangan."'>
			";
		}
		else if ($item_field->type == "Checkbox Single")
		{
			$content	= "
				<input type='checkbox' id='textbox_".$item_field->nama."' name='".$name."' class='table_input' ".($value == 1 ? "checked" : "")." data-id-field='".$item_field->id."' data-keterangan='".$keterangan."'>";
		}

		return $content;
	}
	
	function cek_value($pekerjaan, $lokasi, $item_field)
	{
		$value	= "";
		
		if (empty($item_field->keterangan))
		{
			if ($item_field->nama == "entry_3")
			{
				$value	= $pekerjaan->nama_penilai;
			}
			else if ($item_field->nama == "entry_5")
			{
				$get_data_login	= $this->_ci->auth->get_data_login();
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
				$value	= date("d-m-Y");
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
		
		
		
		
		return $value;
	}
}
?>