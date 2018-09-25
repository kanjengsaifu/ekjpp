<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class import extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{
		$config			= $this->spmlib->get_config();
		$data_view["title"] 	= "Import Pekerjaan Lama";
	   			
		$config['upload_path']          = './asset/file/';
		$config['allowed_types']        = 'csv|xls|xlsx';
		$config['max_size']             = 1000;
		
		//echo ($this->ExcelToPHPObject(42727)->format('Y-m-d'));
		//$config['encrypt_name'] = TRUE;
		
		//$sys = mime_content_type($_FILES["inpFile"]["tmp_name"]);
		
		//echo $sys; 
		if (isset($_FILES["inpFile"])){
			$new_name = trim(addslashes($_FILES["inpFile"]['name']));
			$new_name = str_replace(' ', '_', $new_name);
			$new_name = time()."_". $new_name;
			$config['file_name'] = $new_name;
		}
		$this->load->library('upload', $config);
		
			
		//print_r($this->upload);
		
		if (! $this->upload->do_upload('inpFile'))
		{
				$data_view['error'] = array('error' => $this->upload->display_errors());
				//print_r($error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			//print_r($data);
			//echo  $new_name;
			$file = FCPATH .'asset/file/'. $new_name;

			//load the excel library
			$this->load->library('PHPXl');
			//read file from path
			$objPHPExcel = IOFactory::load($file);
			//get only the Cell Collection
			$objPHPExcel->setActiveSheetIndex(0);
			$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
			//extract to a PHP readable array format
			$kolom = array(
				'A'    => 'nomor_laporan',
                'B'    => 'tanggal_laporan',
                'C'    => 'nama_pemberi_tugas',
                'D'    => 'alamat_pemberi_tugas',
                'E'    => 'provinsi_pemberi_tugas',
                'F'    => 'kota_pemberi_tugas',
                'G'    => 'kodepos_pemberi_tugas',
                'H'    => 'npwp_pemberi_tugas',
               	'I'    => 'go_publik',
                'J'    => 'status_kepemilikan',
                'K'    => 'bidang_usaha',
               	'L'    => 'bidang_usaha_lainnya',
                'M'    => 'tanggal_penilaian',
                'N'    => 'pengguna_laporan',
                'O'    => 'pengguna_laporan_lainnya',
                'P'    => 'tujuan_penilaian',
                'Q'    => 'pendekatan_penilaian',
                'R'    => 'pendekatan_penilaian_lainnya',
                'S'    => 'metode_penilaian',
                'T'    => 'nilai_yang_dihasilkan',
                'U'    => 'nilai_lainnya',
                'V'    => 'kesimpulan',
                'W'    => 'jenis_jasa',
                'X'    => 'imbalan_jasa_fee',
                'Y'    => 'penanda_tangan_laporan_penilaian',
                'Z'    => 'ditandatangani_oleh',
                'AA'   => 'keterangan'
			);
			$jumlah = 1;
			$datainsert = array();
			foreach ($cell_collection as $cell) {
				$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				//header will/should be in row 1 only. of course this can be modified to suit your need.
				if ($row == 1) {
					//$header[$row][$column] = $data_value;
				} else {
					$arr_data[$row][$column] = $data_value;
					if ($column=='B' || $column=='M'){
						$datainsert[$row][$kolom[$column]] = $this->ExcelToPHPObject($data_value)->format('Y-m-d'); 
					}else{
						$datainsert[$row][$kolom[$column]] = $data_value; 
					}
				}
				
				
			}
			$jumlah = $row;
			$inserted_laporan = array();
			//print_r($datainsert);
			for($i=2;$i<=$jumlah;$i++){
				//$datainsert[$i]['created_date'] = date("Y-m-d");
				$user = $this->auth->get_data_login();
				$datainsert[$i]['is_from_excel'] = 1;
				$datainsert[$i]['created_by'] = $user['email'];
				if ($datainsert[$i]['nomor_laporan']!=''){
					$check_exists = count_data("txn_history_pekerjaan", array("nomor_laporan" => $datainsert[$i]['nomor_laporan']));
					if ( !$check_exists ) {
						$this->global_model->save_history("txn_history_pekerjaan", $datainsert[$i]);
						$inserted_laporan[] = $datainsert[$i]['nomor_laporan'];
					}
				}else{
					exit;
				}
			}
			unset($datainsert);

			//Obyek
			$objPHPExcel->setActiveSheetIndex(1);
			$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
			//extract to a PHP readable array format
			$kolom = array(
				'A'     => 'nomor_laporan',
                'B'     => 'nama_obyek',
                'C'     => 'alamat',
                'D'     => 'provinsi',
                'E'     => 'kota',
                'F'     => 'jumlah_satuan',
                'G'     => 'total_nilai',
                'H'     => 'klasifikasi_jenis_jasa',
                'I'     => 'klasifikasi_jenis_jasa_lainnya',
                'J'     => 'data_pembanding'
			);
			$jumlah = 1;
			$datainsert = array();
			foreach ($cell_collection as $cell) {
				$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				//header will/should be in row 1 only. of course this can be modified to suit your need.
				if ($row == 1) {
					//$header[$row][$column] = $data_value;
				} else {
					$arr_data[$row][$column] = $data_value;
					$datainsert[$row][$kolom[$column]] = $data_value;
				}
				
				
			}
			$jumlah = $row;
			//print_r($datainsert);
			for($i=2;$i<=$jumlah;$i++){
				//$datainsert[$i]['created_date'] = date("Y-m-d");
				$user = $this->auth->get_data_login();
				if ($datainsert[$i]['nomor_laporan']!=''){
					if ( in_array($datainsert[$i]['nomor_laporan'], $inserted_laporan) ) {
						$this->global_model->save_history("txn_obyek", $datainsert[$i]);
					}
				}
			}
			unset($datainsert);

			//Pembanding
			$objPHPExcel->setActiveSheetIndex(2);
			$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
			//extract to a PHP readable array format
			$kolom = array(
				'A'     => 'nomor_laporan',
                        'B'     => 'nama_obyek',
                        'C'     => 'tipe_properti',
                        'D'     => 'jenis',
                        'E'     => 'luas_tanah',
                        'F'     => 'luas_bangunan',
                        'G'     => 'alamat',
                        'H'     => 'provinsi',
                        'I'     => 'kota',
                        'J'     => 'transaksi_penawaran',
                        'K'     => 'harga',
                        'L'     => 'tahun_data',
                        'M'     => 'sumber_data',
                        'N'     => 'merk',//Merek
                        'O'     => 'produsen',//Produsen
                        'P'     => 'tahun_pembuatan' //Tahun Pembuatan
			);
			$jumlah = 1;
			$datainsert = array();
			foreach ($cell_collection as $cell) {
				$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				//header will/should be in row 1 only. of course this can be modified to suit your need.
				if ($row == 1) {
					//$header[$row][$column] = $data_value;
				} else {
					$arr_data[$row][$column] = $data_value;
					$datainsert[$row][$kolom[$column]] = $data_value;
				}
			}
			$jumlah = $row;
			//print_r($datainsert);
			for($i=2;$i<=$jumlah;$i++){
				//$datainsert[$i]['created_date'] = date("Y-m-d");
				$user = $this->auth->get_data_login();
				if ($datainsert[$i]['nomor_laporan']!=''){
					if ( in_array($datainsert[$i]['nomor_laporan'], $inserted_laporan) ) {
						$this->global_model->save_history("txn_pembanding", $datainsert[$i]);
					}
				}
			}
			unset($datainsert);

			//Tenaga Kerja
			$objPHPExcel->setActiveSheetIndex(3);
			$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
			//extract to a PHP readable array format
			$kolom = array(
				'A'     => 'nomor_laporan',
                'B'     => 'tenaga_kerja',
                'C'     => 'jabatan',
                'D'		=> 'jumlah_jam'
			);
			$jumlah = 1;
			$datainsert = array();
			foreach ($cell_collection as $cell) {
				$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				//header will/should be in row 1 only. of course this can be modified to suit your need.
				if ($row == 1) {
					//$header[$row][$column] = $data_value;
				} else {
					$arr_data[$row][$column] = $data_value;
					$datainsert[$row][$kolom[$column]] = $data_value;
				}
			}
			$jumlah = $row;
			//print_r($datainsert);
			for($i=2;$i<=$jumlah;$i++){
				//$datainsert[$i]['created_date'] = date("Y-m-d");
				$user = $this->auth->get_data_login();
				if ($datainsert[$i]['nomor_laporan']!=''){
					if ( in_array($datainsert[$i]['nomor_laporan'], $inserted_laporan) ) {
						$this->global_model->save_history("txn_tenagakerja", $datainsert[$i]);
					}
				}
			}
    
			redirect(base_url().'history');
			//print_r($header); 
			//print_r($arr_data);
		}
		
		
		$data_view["_template"]	= $this->template->generate_template("user", $data_view);
		$this->load->view("import/form", $data_view);
	}
	public static function ExcelToPHP($dateValue = 0) {
    if (true == true) {
        $myExcelBaseDate = 25569;
        //    Adjust for the spurious 29-Feb-1900 (Day 60)
        if ($dateValue < 60) {
            --$myExcelBaseDate;
        }
    } else {
        $myExcelBaseDate = 24107;
    }

    // Perform conversion
    if ($dateValue >= 1) {
        $utcDays = $dateValue - $myExcelBaseDate;
        $returnValue = round($utcDays * 86400);
        if (($returnValue <= PHP_INT_MAX) && ($returnValue >= -PHP_INT_MAX)) {
            $returnValue = (integer) $returnValue;
        }
    } else {
        $hours = round($dateValue * 24);
        $mins = round($dateValue * 1440) - round($hours * 60);
        $secs = round($dateValue * 86400) - round($hours * 3600) - round($mins * 60);
        $returnValue = (integer) gmmktime($hours, $mins, $secs);
    }

    // Return
    return $returnValue;
}    //    function ExcelToPHP()
	function ExcelToPHPObject($dateValue = 0) {
		$dateTime = $this->ExcelToPHP($dateValue);
		$days = floor($dateTime / 86400);
		$time = round((($dateTime / 86400) - $days) * 86400);
		$hours = round($time / 3600);
		$minutes = round($time / 60) - ($hours * 60);
		$seconds = round($time) - ($hours * 3600) - ($minutes * 60);

		$dateObj = date_create('1-Jan-1970+'.$days.' days');
		$dateObj->setTime($hours,$minutes,$seconds);

		return $dateObj;
	}
}

?>