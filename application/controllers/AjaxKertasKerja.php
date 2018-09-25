<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajaxkertaskerja extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}
	
	function get_tab()
	{
		$id_pekerjaan	= $_POST["id_pekerjaan"];
		$id_lokasi		= $_POST["id_lokasi"];
		
		$tab_head		= "
			<ul class='nav nav-tabs' role='tablist'>
				<li role='presentation' class='active'>
					<a href='#entry' class='panel-head panel-entry' aria-controls='entry' role='tab' data-toggle='tab'>Entry</a>
				</li>
				<li role='presentation'>
					<a href='#tanah' class='panel-head panel-tanah' aria-controls='tanah' role='tab' data-toggle='tab'>Tanah</a>
				</li>
				<li role='presentation'>
					<a href='#splengkap' class='panel-head panel-splengkap' aria-controls='splengkap' role='tab' data-toggle='tab'>Sarana Pelengkap</a>
				</li>
				<li role='presentation'>
					<a href='#dbanding' class='panel-head panel-dbanding' aria-controls='dbanding' role='tab' data-toggle='tab'>Data Banding</a>
				</li>
			</ul>
		";
		
		
		$tab_content	= "
			<div class='tab-content' style='padding: 20px; border: 1px solid #eee;'>
				<div role='tabpanel' class='tab-pane active' style='padding: 0px;' id='entry'>
					<h3>Entry</h3>
					<div id='content_entry'></div>
				</div>
				<div role='tabpanel' class='tab-pane' style='padding: 0px;' id='tanah'>
					<h3>Tanah</h3>
					<div id='content_tanah'></div>
				</div>
				<div role='tabpanel' class='tab-pane' style='padding: 0px;' id='splengkap'>
					<h3>Sarana Pelengkap</h3>
					<div id='content_splengkap'></div>
				</div>
				<div role='tabpanel' class='tab-pane' style='padding: 0px;' id='dbanding'>
					<h3>Data Banding</h3>
					<div id='content_dbanding'></div>
				</div>
			</div>
		";
		
		$content		= $tab_head.$tab_content;
		echo $content;
		
	}

	function get_tab_detail()
	{
		$id_pekerjaan	= $_POST["id_pekerjaan"];
		$id_lokasi		= $_POST["id_lokasi"];
		$role			= $_POST["role"];
		$content		= "";
		
		if ($role == "tanah")
		{
			$content	= $this->load_tab_tanah($id_pekerjaan, $id_lokasi);
		}
		
		
		echo $content;
		
	}
	
	function load_tab_tanah($id_pekerjaan, $id_lokasi)
	{
		$content	= "
			<h4>FORM DATA ENTRY SURVEYOR</h4>
					<div class='table_div'>
						<table class='table_border' cellpadding='0' cellspacing='0' >
							<tbody>
								<tr bgcolor='#ccc'>
									<td colspan='2' style='color:#ffffff; padding-left: 10px'><span>SURVEYOR & LAPORAN</span></td>
									<td>
									</td>
									<td colspan='2' style='color:#ffffff; padding-left: 10px'>
										<span>DATA-DATA UMUM PROPERTI</span>
									</td>
								</tr>
								<tr>
									<td><span>Penandatangan Laporan</span></td>
									<td></td>
									<td width='50'>&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td><span>Obyek Penilaian</span></td>
									<td><?=$input['entry_2']?></td>
								</tr>
								<tr>
									<td><span>Nama Penilai</span></td>
									<td><?=$input['entry_3']?></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td><span>Highest and Best Use</span></td>
									<td><?=$input['entry_4']?></td>
								</tr>
								<tr>
									<td><span>Nama Surveyor</span></td>
									<td><?=$input['entry_5']?></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td><?=$input['entry_6']?></td>
									<td><?=$input['entry_7']?></td>
								</tr>
								<tr>
									<td style=' background-color:#eee;'>&nbsp;</td>
									<td style=' background-color:#eee;'>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>Telepon / HP.</span></td>
									<td><?=$input['entry_8']?></td>
								</tr>
								<tr>
									<td><span>Tanggal Inspeksi & Penilaian</span></td>
									<td><?=$input['entry_9']?></td>
									<td>&nbsp;</td>
									<td><span>Status Obyek</span></td>
									<td><?=$input['entry_10']?></td>
								</tr>
								<tr>
									<td style=' background-color:#eee;'>&nbsp;</td>
									<td style=' background-color:#eee;'>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>Yang dijumpai</span></td>
									<td><?=$input['entry_11']?></td>
								</tr>
								<tr>
									<td><span>Tanggal Laporan</span></td>
									<td><?=$input['entry_12']?></td>
									<td>&nbsp;</td>
									<td><span>Selaku</span></td>
									<td><?=$input['entry_13']?></td>
								</tr>
								<tr>
									<td style=' background-color:#eee;'>&nbsp;</td>
									<td style=' background-color:#eee;'>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>Obyek ditempati oleh</span></td>
									<td><?=$input['entry_14']?></td>
								</tr>
								<tr>
									<td><span>Nomor Laporan</span></td>
									<td><?=$input['entry_15']?></td>
									<td>&nbsp;</td>
									<td><span>Penggunaan Obyek</span></td>
									<td><?=$input['entry_16']?></td>
								</tr>
								<tr bgcolor='#ccc'>
									<td colspan='2' style='color:#ffffff; padding-left: 10px'>
										<span>DATA-DATA PEMBERI TUGAS</span>
									</td>
									<td></td>
									<td colspan='2' style='color:#ffffff; padding-left: 10px'>
										<span>ALAMAT LENGKAP PROPERTI</span>
									</td>
								</tr>
								<tr>
									<td><span>Nama Instansi / Perorangan</span></td>
									<td><?=$input['entry_17']?></td>
									<td>&nbsp;</td>
									<td><span>Alamat Properti</span></td>
									<td rowspan='2'><?=$input['entry_18']?></td>
								</tr>
								<tr>
									<td><span>Nama Cabang</span></td>
									<td><?=$input['entry_19']?></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td><span>Nama Staff</span></td>
									<td><?=$input['entry_20']?></td>
									<td>&nbsp;</td>
									<td><span>Nama Provinsi</span></td>
									<td><?=$input['entry_21']?></td>
								</tr>
								<tr>
									<td><span>Jabatan</span></td>
									<td><?=$input['entry_22']?></td>
									<td>&nbsp;</td>
									<td><span>Nama Kota / Kabupaten</span></td>
									<td><?=$input['entry_23']?></td>
								</tr>
								<tr>
									<td><span>Nomor Penugasan</span></td>
									<td><?=$input['entry_24']?></td>
									<td>&nbsp;</td>
									<td><span>Kecamatan</span></td>
									<td><?=$input['entry_25']?></td>
								</tr>
								<tr>
									<td><span>Tanggal Penugasan</span></td>
									<td><?=$input['entry_26']?></td>
									<td>&nbsp;</td>
									<td><span>Kelurahan / Desa</span></td>
									<td><?=$input['entry_27']?></td>
								</tr>
								<tr>
									<td><span>Tujuan Penilaian</span></td>
									<td><?=$input['entry_28']?></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>

								<tr>
									<td colspan='5'>
										<table class='table_border' cellpadding='0' cellspacing='0'>
											<tr bgcolor='#ccc'>
												<td align='center' colspan='6' style='color:#ffffff;'>
													<span>HASIL PENILAIAN TERDAHULU</span>
												</td>
											</tr>
											<tr bgcolor='#05fa67'>
												<td align='center' style='color: #ffffff'>No.</td>
												<td align='center' style='color: #ffffff'>U R A I A N</td>
												<td align='center' style='color: #ffffff'>TAHUN 2013</td>
												<td align='center' style='color: #ffffff'>TAHUN 2014</td>
												<td align='center' style='color: #ffffff'>TAHUN 2015</td>
												<td align='center' style='color: #ffffff'>TAHUN 2016</td>
											</tr>
											<tr>
												<td><span>1.</span></td>
												<td><span>Nama Surveyor</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
											</tr>
											<tr>
												<td><span>2.</span></td>
												<td><span>Tanggal Inspeksi</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
											</tr>
											<tr>
												<td><span>3.</span></td>
												<td><span>Luas Tanah</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
											</tr>
											<tr>
												<td><span>4.</span></td>
												<td><span>Luas Bangunan</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
											</tr>
											<tr>
												<td><span>5.</span></td>
												<td><span>Nilai Pasar Tanah</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
											</tr>
											<tr>
												<td><span>6.</span></td>
												<td><span>Nilai Pasar Bangunan</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
											</tr>
											<tr>
												<td><span>7.</span></td>
												<td><span>Nilai Pasar</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
											</tr>
											<tr>
												<td><span>8.</span></td>
												<td><span>Nilai Likuidasi</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
												<td><span>-</span></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td colspan='5'>
										&nbsp;
									</td>
								</tr>


							</tbody>
						</table>

					</div>
		
		";
		
		
		return $content;
	}
}
?>