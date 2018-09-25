<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class history extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}
	
	function index()
	{
        $tahun = $this->input->get('tahun');
        if ( empty($tahun) || !is_numeric($tahun) )
            $tahun = date('Y');
		$config			= $this->spmlib->get_config();
                $data["tahun"]  = $tahun;
		$data["title"] 	= "History Pekerjaan";
		
		$data["_template"]	= $this->template->generate_template("user", $data);
		$this->load->view("pekerjaan/history", $data);
	}
	function export_excel() {
                $tahun = $this->input->get('tahun');
                $tahun = empty($tahun) ? date('Y') : $tahun;
		$this->load->library('PHPXl');
		$objPHPExcel = IOFactory::createReader('Excel2007');
                $objPHPExcel = $objPHPExcel->load('./asset/template/laporanpenilaian.xlsx');

                //Sheet Laporan
                $objPHPExcel->setActiveSheetIndex(0);
                $kolom_laporan = array(
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
                $con = "YEAR(tanggal_laporan) = '$tahun'";
                $laporan_penilaian = $this->global_model->get_list('txn_history_pekerjaan', $con, 'nomor_laporan');
                $row = 2;
                foreach ($laporan_penilaian as $lap) {
                        $res_array = (array)$lap;
                        foreach ($res_array as $key => $value) {
                                $excel_column = array_search($key, $kolom_laporan);
                                if ( $excel_column ) {
                                        $objPHPExcel->getActiveSheet()->setCellValue($excel_column.$row, $value);
                                }
                        }
                        $row++;
                }

                //Obyek
                $objPHPExcel->setActiveSheetIndex(1);
                $kolom_obyek = array(
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
                $sql_obyek = "SELECT A.* FROM txn_obyek A
                              join txn_history_pekerjaan B ON A.nomor_laporan = B.nomor_laporan
                              WHERE $con ORDER BY A.nomor_laporan ASC";
                $q_obyek = $this->global_model->get_by_query($sql_obyek);
                $result_obyek = array();
                if ( is_object($q_obyek) ) {
                        $result_obyek = $q_obyek->result();
                }

                $row = 2;
                foreach ($result_obyek as $oby) {
                        $res_array = (array)$oby;
                        foreach ($res_array as $key => $value) {
                                $excel_column = array_search($key, $kolom_obyek);
                                if ( $excel_column ) {
                                        $objPHPExcel->getActiveSheet()->setCellValue($excel_column.$row, $value);
                                }
                        }
                        $row++;
                }

                //Pembanding
                $objPHPExcel->setActiveSheetIndex(2);
                $kolom_pembanding = array(
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
                        'N'     => NULL,//Merek
                        'O'     => NULL,//Produsen
                        'P'     => NULL //Tahun Pembuatan
                );
                $sql_pembanding = "SELECT A.* FROM txn_pembanding A
                              join txn_history_pekerjaan B ON A.nomor_laporan = B.nomor_laporan
                              WHERE $con ORDER BY A.nomor_laporan ASC";
                $q_pembanding = $this->global_model->get_by_query($sql_pembanding);
                $result_pembanding = array();
                if ( is_object($q_pembanding) ) {
                        $result_pembanding = $q_pembanding->result();
                }

                $row = 2;
                foreach ($result_pembanding as $pmb) {
                        $res_array = (array)$pmb;
                        foreach ($res_array as $key => $value) {
                                $excel_column = array_search($key, $kolom_pembanding);
                                if ( $excel_column ) {
                                        $objPHPExcel->getActiveSheet()->setCellValue($excel_column.$row, $value);
                                }
                        }
                        $row++;
                }

                //Tenaga Kerja
                $objPHPExcel->setActiveSheetIndex(3);
                $kolom_tenagakerja = array(
                        'A'     => 'nomor_laporan',
                        'B'     => 'tenaga_kerja',
                        'C'     => 'jabatan'
                );
                $sql_tenagakerja = "SELECT A.* FROM txn_tenagakerja A
                                  join txn_history_pekerjaan B ON A.nomor_laporan = B.nomor_laporan
                                  WHERE $con ORDER BY A.nomor_laporan ASC";
                $q_tenagakerja = $this->global_model->get_by_query($sql_tenagakerja);
                $result_tenagakerja = array();
                if ( is_object($q_tenagakerja) ) {
                        $result_tenagakerja = $q_tenagakerja->result();
                }

                $row = 2;
                foreach ($result_tenagakerja as $rtg) {
                        $res_array = (array)$rtg;
                        foreach ($res_array as $key => $value) {
                                $excel_column = array_search($key, $kolom_tenagakerja);
                                if ( $excel_column ) {
                                        $objPHPExcel->getActiveSheet()->setCellValue($excel_column.$row, $value);
                                }
                        }
                        $row++;
                }  

                //Export File
                $title = 'Laporan_Penilaian';
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');
                header('Cache-Control: max-age=0');
                $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel2007');
                $objWriter->save('php://output');              
        }
        function detail($id)
        {
            $txn_laporan = array();
            $txn_objek = array();
            $txn_pembanding = array();
            $txn_tenagakerja = array();

            $this->db->select('A.*');
            $this->db->from('txn_history_pekerjaan A');
            $this->db->where("id", $id);
            $get = $this->db->get();
            $txn_laporan = $get->row();
            $nomor_laporan = $txn_laporan->nomor_laporan;
            // var_dump($nomor_laporan);

            $this->db->select('A.*');
            $this->db->from('txn_obyek A');
            $this->db->where("nomor_laporan", $nomor_laporan);
            $get = $this->db->get();
            $txn_objek = $get->result();

            $this->db->select('A.*');
            $this->db->from('txn_pembanding A');
            $this->db->where("nomor_laporan", $nomor_laporan);
            $get = $this->db->get();
            $txn_pembanding = $get->result();

            $this->db->select('A.*');
            $this->db->from('txn_tenagakerja A');
            $this->db->where("nomor_laporan", $nomor_laporan);
            $get = $this->db->get();
            $txn_tenagakerja = $get->result();

            $data['txn_laporan'] = $txn_laporan;
            $data['txn_objek'] = $txn_objek;
            $data['txn_pembanding'] = $txn_pembanding;
            $data['txn_tenagakerja'] = $txn_tenagakerja;
            // var_dump($txn_tenagakerja);
            
            $config         = $this->spmlib->get_config();
                    // $data["tahun"]  = $tahun;
            $data["title"]  = "History Pekerjaan";
            
            $data["_template"]  = $this->template->generate_template("user", $data);
            $this->load->view("pekerjaan/history_detail", $data);
        }
}

?>