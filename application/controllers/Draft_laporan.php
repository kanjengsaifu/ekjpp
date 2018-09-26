<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Draft_laporan extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}

	function index() 
	{
		redirect(base_url());
		$this->do_download();
	}

	function download($id_pekerjaan) {
		require_once APPPATH."/third_party/PHPWord/vendor/autoload.php";

	    $phpWord = new \PhpOffice\PhpWord\PhpWord();
	    $template = $phpWord->loadTemplate("./asset/template/laporan.docx");

	    $data = array();
	    $nama_kjpp = "KJPP ASNO MINANDA, USEP PRAWIRA DAN REKAN";
	    $data["nama_kjpp"] = $nama_kjpp;
	    $data["list_lokasi"] = $this->get_string_lokasi($id_pekerjaan);
	    $data["table_ringkasan"] = $this->get_table_ringkasan($id_pekerjaan);
	    $data["nilai_ringkasan"] = $this->get_nilai_ringkasan($id_pekerjaan);
	    $penawaran = $this->get_penawaran($id_pekerjaan);

	    // var_dump($data["nilai_ringkasan"]);return;

	    $vars = $template->getVariables();
	    $data_pekerjaan = $this->get_pekerjaan($id_pekerjaan);
	    $data = array_merge($data, $data_pekerjaan, $penawaran);
	    // echo "<pre>";var_dump($data);"</pre>";

	    foreach ($vars as $var) {
	    	$data_item = !empty($data[$var]) ? $data[$var] : "TEST";
	    	$template->setValue($var, $data_item);
	    }

	    $temp_filename = "laporan-".date("d-m-Y-his",time()).".docx";
	    $template->saveAs($temp_filename);

	    // var_dump($template); return;

	    $this->do_dialog_save($temp_filename);
	}

	private function do_dialog_save($temp_filename){
	    header("Content-Description: File Transfer");
	    header("Content-Type: application/octet-stream");
	    header("Content-Disposition: attachment; filename=".$temp_filename);
	    header("Content-Transfer-Encoding: binary");
	    header("Expires: 0");
	    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	    header("Pragma: public");
	    header("Content-Length: " . filesize($temp_filename));
	    flush();
	    readfile($temp_filename);
	    unlink($temp_filename);
	    exit;
	}

	private function get_pekerjaan($id_pekerjaan) 
	{
		$this->db->select("A.*, E.tujuan AS tujuan_penilaian,
						   F.nama AS nama_penilai,
						   B.nama AS nama_klien, B.telepon AS telepon_klien,
						   B.alamat AS alamat_klien,
						   A.no_surat_tugas, A.tgl_surat_tugas,
						   F.no_mappi, F.no_ijinpp, F.no_sttdojk, F.kualifikasi", false)
				 ->from("mst_pekerjaan A")
				 ->join("mst_klien B", "A.id_klien = B.id", "left")
				 ->join("mst_tujuan E", "A.maksud_tujuan = E.id_tujuan", "left")
				 ->join("mst_user F", "A.penilai = F.id", "left")
				 ->where("A.id", $id_pekerjaan);

		$query = $this->db->get();
		$res = $query->row_array();
		return $res;
	}

	private function get_list_lokasi($id_pekerjaan) 
	{
		$this->db->select("A.*, B.nama AS nama_desa, C.nama AS nama_kecamatan, D.nama AS nama_kota, E.nama AS nama_provinsi,F.id_kertas_kerja", false)
				->join("mst_desa B", "B.id=A.id_desa", "left")
				->join("mst_kecamatan C", "C.id=A.id_kecamatan", "left")
				->join("mst_kota D", "D.id=A.id_kota", "left")
				->join("mst_provinsi E", "E.id=A.id_provinsi", "left")
				->join("txn_kertas_kerja F", "F.id_lokasi=A.id", "left")
				 ->from("mst_lokasi A")
				 ->where("A.id_pekerjaan", $id_pekerjaan);

		$query = $this->db->get();
		$res = $query->result();
		return $res;
	}

	private function get_string_lokasi($id_pekerjaan) {
		$res = "";
		$lokasi = $this->get_list_lokasi($id_pekerjaan);
		$no = 1;
		foreach ($lokasi as $row) {
			$res .= "<w:proofErr w:type=\"spellStart\"/><w:r><w:t>- PROPERTI-".$no ." berupa bidang tanah dengan luas tanah keseluruhan ".$row->luas_tanah."meter persegi yang terletak di ".$row->alamat.", Kel. ".$row->nama_desa.", Kec. ".$row->nama_kecamatan.", Kota. ".$row->nama_kota.", Prov. ".$row->nama_kota."</w:t></w:r><w:proofErr w:type=\"spellEnd\"/><w:br/>";

		}

		return $res;
	}

	private function get_penawaran($id_pekerjaan) 
	{
		$this->db->select("A.no_penawaran AS penawaran_no, A.kota AS penawaran_kota, A.kota AS penawaran_tanggal, 
			CONCAT(DAY(A.tanggal), ' ', (CASE 
				WHEN MONTH(tanggal)='1' THEN 'Januari'
				WHEN MONTH(tanggal)='2' THEN 'Februari'
				WHEN MONTH(tanggal)='3' THEN 'Maret'
				WHEN MONTH(tanggal)='4' THEN 'April'
				WHEN MONTH(tanggal)='5' THEN 'Mei'
				WHEN MONTH(tanggal)='6' THEN 'Juni'
				WHEN MONTH(tanggal)='7' THEN 'Juli'
				WHEN MONTH(tanggal)='8' THEN 'Agustust'
				WHEN MONTH(tanggal)='9' THEN 'September'
				WHEN MONTH(tanggal)='10' THEN 'Oktober'
				WHEN MONTH(tanggal)='11' THEN 'November'
				WHEN MONTH(tanggal)='12' THEN 'Desember'
				ELSE ''
			END), ' ', YEAR(A.tanggal)) as penawaran_tanggal_indo
			", false)
				 ->from("mst_dokumen_penawaran A")
				 ->where("A.id_pekerjaan", $id_pekerjaan);

		$query = $this->db->get();
		$res = $query->row_array();
		return $res;
	}

	private function get_table_ringkasan($id_pekerjaan ){
		$lokasi = $this->get_list_lokasi($id_pekerjaan);
		$id_lokasi = $lokasi[0]->id;
		$id_kertas_kerja = $lokasi[0]->id_kertas_kerja;

		$data_survey = $this->get_data_survey($id_pekerjaan, $id_lokasi, $id_kertas_kerja);
		$table_xml = <<<EOT
		<w:tbl>
            <w:tblPr>
                <w:tblW w:w="0" w:type="auto" />
                <w:tblCellSpacing w:w="0" w:type="dxa" />
                <w:tblBorders>
                    <w:top w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                    <w:right w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                </w:tblBorders>
                <w:tblCellMar>
                    <w:left w:w="0" w:type="dxa" />
                    <w:right w:w="0" w:type="dxa" />
                </w:tblCellMar>
                <w:tblLook w:val="04A0" w:firstRow="1" w:lastRow="0" w:firstColumn="1" w:lastColumn="0" w:noHBand="0" w:noVBand="1" />
            </w:tblPr>
            <w:tblGrid>
                <w:gridCol w:w="540" />
                <w:gridCol w:w="1728" />
                <w:gridCol w:w="1811" />
                <w:gridCol w:w="1616" />
                <w:gridCol w:w="1931" />
            </w:tblGrid>
            
            <w:tr w:rsidR="00604527" w:rsidRPr="00604527" w:rsidTr="00604527">
                <w:trPr>
                    <w:tblCellSpacing w:w="0" w:type="dxa" />
                </w:trPr>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:shd w:val="clear" w:color="auto" w:fill="4C9ED9" />
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>NO</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:shd w:val="clear" w:color="auto" w:fill="4C9ED9" />
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>URAIAN PROPERTI</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:shd w:val="clear" w:color="auto" w:fill="4C9ED9" />
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>LUAS (M</w:t>
                        </w:r>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                                <w:vertAlign w:val="superscript" />
                            </w:rPr>
                            <w:t>2</w:t>
                        </w:r>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t> / JUMLAH)</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:shd w:val="clear" w:color="auto" w:fill="4C9ED9" />
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>NILAI PASAR (</w:t>
                        </w:r>
                        <w:proofErr w:type="spellStart" />
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>Rp</w:t>
                        </w:r>
                        <w:proofErr w:type="spellEnd" />
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>)</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:shd w:val="clear" w:color="auto" w:fill="4C9ED9" />
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>NILAI LIKUIDASI (</w:t>
                        </w:r>
                        <w:proofErr w:type="spellStart" />
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>Rp</w:t>
                        </w:r>
                        <w:proofErr w:type="spellEnd" />
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>)</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
            </w:tr>
EOT;


		$i = 1;
		foreach ($data_survey["lokasi"] as $item_lokasi) {
            $table_xml .= <<<EOT
            <w:tr w:rsidR="00604527" w:rsidRPr="00604527" w:rsidTr="00604527">
                <w:trPr>
                    <w:tblCellSpacing w:w="0" w:type="dxa" />
                </w:trPr>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:jc w:val="center" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>{$i}</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:gridSpan w:val="4" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t xml:space="preserve">{$item_lokasi["title"]}</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
            </w:tr>
EOT;
            foreach ($item_lokasi["content"] as $key_content => $item_content) {
	            $table_xml .= <<<EOT
	            <w:tr w:rsidR="00604527" w:rsidRPr="00604527" w:rsidTr="00604527">
	                <w:trPr>
	                    <w:tblCellSpacing w:w="0" w:type="dxa" />
	                </w:trPr>
	                <w:tc>
	                    <w:tcPr>
	                        <w:tcW w:w="0" w:type="auto" />
	                        <w:tcBorders>
	                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
	                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
	                        </w:tcBorders>
	                        <w:tcMar>
	                            <w:top w:w="75" w:type="dxa" />
	                            <w:left w:w="150" w:type="dxa" />
	                            <w:bottom w:w="75" w:type="dxa" />
	                            <w:right w:w="150" w:type="dxa" />
	                        </w:tcMar>
	                        <w:vAlign w:val="center" />
	                        <w:hideMark />
	                    </w:tcPr>
	                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
	                        <w:pPr>
	                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
	                            <w:rPr>
	                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
	                                <w:b />
	                                <w:bCs />
	                                <w:sz w:val="15" />
	                                <w:szCs w:val="15" />
	                            </w:rPr>
	                        </w:pPr>
	                    </w:p>
	                </w:tc>
	                <w:tc>
	                    <w:tcPr>
	                        <w:tcW w:w="0" w:type="auto" />
	                        <w:tcBorders>
	                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
	                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
	                        </w:tcBorders>
	                        <w:tcMar>
	                            <w:top w:w="75" w:type="dxa" />
	                            <w:left w:w="150" w:type="dxa" />
	                            <w:bottom w:w="75" w:type="dxa" />
	                            <w:right w:w="150" w:type="dxa" />
	                        </w:tcMar>
	                        <w:vAlign w:val="center" />
	                        <w:hideMark />
	                    </w:tcPr>
	                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
	                        <w:pPr>
	                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
	                            <w:rPr>
	                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
	                                <w:sz w:val="15" />
	                                <w:szCs w:val="15" />
	                            </w:rPr>
	                        </w:pPr>
	                        <w:r w:rsidRPr="00604527">
	                            <w:rPr>
	                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
	                                <w:sz w:val="15" />
	                                <w:szCs w:val="15" />
	                            </w:rPr>
	                            <w:t>{$key_content}</w:t>
	                        </w:r>
	                    </w:p>
	                </w:tc>
	                <w:tc>
	                    <w:tcPr>
	                        <w:tcW w:w="0" w:type="auto" />
	                        <w:tcBorders>
	                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
	                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
	                        </w:tcBorders>
	                        <w:tcMar>
	                            <w:top w:w="75" w:type="dxa" />
	                            <w:left w:w="150" w:type="dxa" />
	                            <w:bottom w:w="75" w:type="dxa" />
	                            <w:right w:w="150" w:type="dxa" />
	                        </w:tcMar>
	                        <w:vAlign w:val="center" />
	                        <w:hideMark />
	                    </w:tcPr>
	                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
	                        <w:pPr>
	                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
	                            <w:jc w:val="center" />
	                            <w:rPr>
	                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
	                                <w:sz w:val="15" />
	                                <w:szCs w:val="15" />
	                            </w:rPr>
	                        </w:pPr>
	                        <w:r w:rsidRPr="00604527">
	                            <w:rPr>
	                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
	                                <w:sz w:val="15" />
	                                <w:szCs w:val="15" />
	                            </w:rPr>
	                            <w:t>{$item_content["jumlah"]}</w:t>
	                        </w:r>
	                    </w:p>
	                </w:tc>
	                <w:tc>
	                    <w:tcPr>
	                        <w:tcW w:w="0" w:type="auto" />
	                        <w:tcBorders>
	                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
	                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
	                        </w:tcBorders>
	                        <w:tcMar>
	                            <w:top w:w="75" w:type="dxa" />
	                            <w:left w:w="150" w:type="dxa" />
	                            <w:bottom w:w="75" w:type="dxa" />
	                            <w:right w:w="150" w:type="dxa" />
	                        </w:tcMar>
	                        <w:vAlign w:val="center" />
	                        <w:hideMark />
	                    </w:tcPr>
	                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
	                        <w:pPr>
	                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
	                            <w:jc w:val="right" />
	                            <w:rPr>
	                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
	                                <w:sz w:val="15" />
	                                <w:szCs w:val="15" />
	                            </w:rPr>
	                        </w:pPr>
	                        <w:r w:rsidRPr="00604527">
	                            <w:rPr>
	                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
	                                <w:sz w:val="15" />
	                                <w:szCs w:val="15" />
	                            </w:rPr>
	                            <w:t>{$item_content["nilai_pasar"]}</w:t>
	                        </w:r>
	                    </w:p>
	                </w:tc>
	                <w:tc>
	                    <w:tcPr>
	                        <w:tcW w:w="0" w:type="auto" />
	                        <w:tcBorders>
	                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
	                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
	                        </w:tcBorders>
	                        <w:tcMar>
	                            <w:top w:w="75" w:type="dxa" />
	                            <w:left w:w="150" w:type="dxa" />
	                            <w:bottom w:w="75" w:type="dxa" />
	                            <w:right w:w="150" w:type="dxa" />
	                        </w:tcMar>
	                        <w:vAlign w:val="center" />
	                        <w:hideMark />
	                    </w:tcPr>
	                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
	                        <w:pPr>
	                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
	                            <w:jc w:val="right" />
	                            <w:rPr>
	                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
	                                <w:sz w:val="15" />
	                                <w:szCs w:val="15" />
	                            </w:rPr>
	                        </w:pPr>
	                        <w:r w:rsidRPr="00604527">
	                            <w:rPr>
	                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
	                                <w:sz w:val="15" />
	                                <w:szCs w:val="15" />
	                            </w:rPr>
	                            <w:t>{$item_content["nilai_likuidasi"]}</w:t>
	                        </w:r>
	                    </w:p>
	                </w:tc>
	            </w:tr>
EOT;
	        }
    	}

    	$table_xml .= <<<EOT
            <w:tr w:rsidR="00604527" w:rsidRPr="00604527" w:rsidTr="00604527">
                <w:trPr>
                    <w:tblCellSpacing w:w="0" w:type="dxa" />
                </w:trPr>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:gridSpan w:val="3" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:shd w:val="clear" w:color="auto" w:fill="4C9ED9" />
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>TOTAL NILAI PROPERTI</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:shd w:val="clear" w:color="auto" w:fill="4C9ED9" />
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:jc w:val="right" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>{$data_survey["total_np"]}</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:shd w:val="clear" w:color="auto" w:fill="4C9ED9" />
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:jc w:val="right" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>{$data_survey["total_nl"]}</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
            </w:tr>
            <w:tr w:rsidR="00604527" w:rsidRPr="00604527" w:rsidTr="00604527">
                <w:trPr>
                    <w:tblCellSpacing w:w="0" w:type="dxa" />
                </w:trPr>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:gridSpan w:val="3" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:shd w:val="clear" w:color="auto" w:fill="4C9ED9" />
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>DIBULATKAN</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:shd w:val="clear" w:color="auto" w:fill="4C9ED9" />
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:jc w:val="right" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>{$data_survey["total_np_bulat"]}</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
                <w:tc>
                    <w:tcPr>
                        <w:tcW w:w="0" w:type="auto" />
                        <w:tcBorders>
                            <w:left w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                            <w:bottom w:val="single" w:sz="6" w:space="0" w:color="CCCCCC" />
                        </w:tcBorders>
                        <w:shd w:val="clear" w:color="auto" w:fill="4C9ED9" />
                        <w:tcMar>
                            <w:top w:w="75" w:type="dxa" />
                            <w:left w:w="150" w:type="dxa" />
                            <w:bottom w:w="75" w:type="dxa" />
                            <w:right w:w="150" w:type="dxa" />
                        </w:tcMar>
                        <w:vAlign w:val="center" />
                        <w:hideMark />
                    </w:tcPr>
                    <w:p w:rsidR="00604527" w:rsidRPr="00604527" w:rsidRDefault="00604527" w:rsidP="00604527">
                        <w:pPr>
                            <w:spacing w:after="0" w:line="240" w:lineRule="auto" />
                            <w:jc w:val="right" />
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                        </w:pPr>
                        <w:r w:rsidRPr="00604527">
                            <w:rPr>
                                <w:rFonts w:ascii="Times New Roman" w:eastAsia="Times New Roman" w:hAnsi="Times New Roman" w:cs="Times New Roman" />
                                <w:b />
                                <w:bCs />
                                <w:color w:val="FFFFFF" />
                                <w:sz w:val="15" />
                                <w:szCs w:val="15" />
                            </w:rPr>
                            <w:t>{$data_survey["total_nl_bulat"]}</w:t>
                        </w:r>
                    </w:p>
                </w:tc>
            </w:tr>
EOT;
        $table_xml .= <<<EOT
        </w:tbl>
EOT;
        return $table_xml;
	}

	private function get_data_survey($id_pekerjaan, $id_lokasi, $id_kertas_kerja){
		$data_survey = array();

		if (!empty($id_pekerjaan))
		{
			$lokasi				= $this->global_model->get_data("view_lokasi", 1, array("id_pekerjaan"), array($id_pekerjaan));
			
			$data_survey		= array();
			
			$total_np		= 0;
			$total_nl		= 0;
			
			$list_lokasi	= array();

			foreach ($lokasi->result() as $item_lokasi) {
				$urutan			= (int)(str_replace("K", "", $item_lokasi->kode));
				$custom_data	= unserialize($item_lokasi->custom_data);
				$subtotal_np	= 0;
				$subtotal_nl	= 0;
				
				//TANAH
				$tanah_np = 0;
				$tanah_nl = 0;
				$tanah_luas = 0;
				$this->db->select('luas, nilai_pasar, nilai_likuidasi,
							jenis_batas_1, batas_properti_1,
							jenis_batas_2, batas_properti_2,
							jenis_batas_3, batas_properti_3,
							jenis_batas_4, batas_properti_4,
							lokasi_tanah, kepadatan_bangunan, pertumbuhan_bangunan, harga_tanah_obyek,
							kemudahan_mencapai_lokasi, kemudahan_belanja,
							kemudahan_sarana_pendidikan, kemudahan_angkutan_umum,
							kemudahan_rekreasi, keamanan_terhadap_kejahatan, 
							keamanan_terhadap_kebakaran, keamanan_terhadap_bencana')
				 ->from('txn_tanah')
				 ->where('id_lokasi', $id_lokasi)
				 ->where('id_kertas_kerja', $id_kertas_kerja);
				$txn_tanah = $this->db->get()->row();

				if (!empty($txn_tanah)) {
					$tanah_np = $txn_tanah->nilai_pasar;
					$tanah_nl = $txn_tanah->nilai_likuidasi;
					$tanah_luas = $txn_tanah->luas;
				}

				$subtotal_np	= $subtotal_np + $tanah_np;
				$subtotal_nl	= $subtotal_nl + $tanah_nl;
				
				$content		= array();
				
				$content["Tanah"]	= array(
					"jumlah"			=> number_format($tanah_luas),
					"nilai_pasar"		=> number_format($tanah_np),
					"nilai_likuidasi"	=> number_format($tanah_nl)
				);

				//BANGUNAN
				if ($item_lokasi->id_jenis_objek == 2)
				{
					$this->db->select('luas, bangunan_role, nilai_pasar, nilai_likuidasi, tipe_bangunan')
							->from('txn_bangunan')
							->where('id_lokasi', $id_lokasi)
							->where('id_kertas_kerja', $id_kertas_kerja);

					$txn_bangunan = $this->db->get()->result();

					foreach ($txn_bangunan as $item_bangunan)
					{
						$key_bangunan	= $item_bangunan->bangunan_role;

						$bangunan_name = "";
						$bangunan_np = "";
						$bangunan_nl = "";
						$bangunan_luas = "";

						$bangunan_name	= "Bangunan"; //$item_bangunan->tipe_bangunan					
						$bangunan_np	= $item_bangunan->nilai_pasar;				
						$bangunan_nl	= $item_bangunan->nilai_likuidasi;				
						$bangunan_luas 	= $item_bangunan->luas;

						$subtotal_np	= $subtotal_np + $bangunan_np;
						$subtotal_nl	= $subtotal_nl + $bangunan_nl;
						
						$content[$bangunan_name]	= array(
							"jumlah"			=> number_format($bangunan_luas),
							"nilai_pasar"		=> number_format($bangunan_np),
							"nilai_likuidasi"	=> number_format($bangunan_nl)
						);
					}
				}
				
				//SARANA PELENGKAP
				$sarana_nl = 0;
				$sarana_np = 0;
				$this->db->select('luas, brb_rcn, nilai_pasar, nilai_likuidasi')
						 ->from('txn_sarana_pelengkap')
						 ->where('id_lokasi', $id_lokasi)
						 ->where('id_kertas_kerja', $id_kertas_kerja);
				$txn_sarana_pelengkap = $this->db->get()->row();

				// var_dump($id_kertas_kerja);

				if (!empty($txn_sarana_pelengkap)) {
					$sarana_nl	= $txn_sarana_pelengkap->nilai_likuidasi;
					$sarana_np	= $txn_sarana_pelengkap->nilai_pasar;
				}
				
				$subtotal_np	= $subtotal_np + $sarana_np;
				$subtotal_nl	= $subtotal_nl + $sarana_nl;
				
				$content["Sarana Pelengkap"]	= array(
					"jumlah"			=> "1-Lot",
					"nilai_pasar"		=> number_format($sarana_np),
					"nilai_likuidasi"	=> number_format($sarana_nl)
				);

				$data_lokasi["title"]	= "PROPERTI - ".$urutan." ".$item_lokasi->alamat." -  ".$item_lokasi->nama_provinsi;
				$data_lokasi["content"]	= $content;
				$data_lokasi["subtotal"]	= array(
					"nilai_pasar"		=> number_format($subtotal_np),
					"nilai_likuidasi"	=> number_format($subtotal_nl)
				);
				
				$list_lokasi[$item_lokasi->id]	= $data_lokasi;
				
				$total_np	= $subtotal_np + $total_np;
				$total_nl	= $subtotal_nl + $total_nl;
			}

			$data_survey["lokasi"]		= $list_lokasi;
			$data_survey["total_nilai_pasar"]	=  ($total_np);
			$data_survey["total_nilai_likuidasi"]	=  ($total_nl);
			$data_survey["total_np"]	= number_format($total_np);
			$data_survey["total_nl"]	= number_format($total_nl);
			$data_survey["total_np_bulat"]	= number_format(round($total_np/1000000)*1000000);
			$data_survey["total_nl_bulat"]	= number_format(round($total_nl/1000000)*1000000);
			
		}
		return $data_survey;
	}

	private function get_nilai_ringkasan($id_pekerjaan) {
		$res = "";

		$lokasi = $this->get_list_lokasi($id_pekerjaan);
		$id_lokasi = $lokasi[0]->id;
		$id_kertas_kerja = $lokasi[0]->id_kertas_kerja;


		$data_survey = $this->get_data_survey($id_pekerjaan, $id_lokasi, $id_kertas_kerja);

		$nilai_pasar_bulat = round($data_survey['total_nilai_pasar'],3);
		$nilai_likuidasi_bulat = round($data_survey['total_nilai_likuidasi'],3);
		$nilai_pasar_format = number_format($nilai_pasar_bulat);
		$nilai_likuidasi_format = number_format($nilai_likuidasi_bulat);
		$nilai_pasar_terbilang = terbilang( $nilai_pasar_bulat );
		$nilai_likuidasi_terbilang = terbilang( $nilai_likuidasi_bulat );

		$res .= <<<EOT
		<w:tbl>
			<w:tblPr>
			<w:tblStyle w:val="TableGrid"/>
			<w:tblW w:w="5000" w:type="pct"/>
			</w:tblPr>
			<w:tblGrid>
			<w:gridCol w:w="1300"/>
			<w:gridCol w:w="2880"/>
			</w:tblGrid>
			<w:tr>
				<w:tc>
					<w:tcPr>
					<w:tcW w:w="1300" w:type="dxa"/>
					</w:tcPr>
					<w:p>
					<w:r>
					<w:t>Nilai Pasar</w:t>
					</w:r>
					</w:p>
				</w:tc>
				<w:tc>
					<w:tcPr>
					<w:tcW w:w="2880" w:type="dxa"/>
					</w:tcPr>
					<w:p>
					<w:r>
					<w:t>: Rp. {$nilai_pasar_format}</w:t>
					</w:r>
					<w:br/>
					<w:rPr>
						<w:i w:val="true"/>
					</w:rPr>
					<w:r>
						<w:t>{$nilai_pasar_terbilang}</w:t>
					</w:r>
					</w:p>
				</w:tc>
			</w:tr> 
			<w:tr>
				<w:tc>
					<w:tcPr>
						<w:tcW w:w="1300" w:type="dxa"/>
					</w:tcPr>
					<w:p>
					<w:r>
						<w:t>Indikasi Nilai Likuidasi</w:t>
					</w:r>
					</w:p>
				</w:tc>
				<w:tc>
					<w:tcPr>
						<w:tcW w:w="2880" w:type="dxa"/>
					</w:tcPr>
					<w:p>
					<w:r>
						<w:t>: Rp {$nilai_likuidasi_format}</w:t>
					</w:r>
					<w:br/>
					<w:rPr>
						<w:i w:val="true"/>
					</w:rPr>
					<w:r>
						<w:t>{$nilai_likuidasi_terbilang}</w:t>
					</w:r>
					</w:p>
				</w:tc>
			</w:tr> 
		</w:tbl>
EOT;

        return $res;
	}
}