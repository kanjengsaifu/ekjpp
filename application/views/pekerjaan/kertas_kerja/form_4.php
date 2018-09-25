<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed'); 

$list_bangunan	= $custom_data["tab_bangunan"];
					
?>

<div class="content">
	<div class="content-inner inner-page">
		<h2 class="page-heading">Kertas Kerja</h2>
		<form name="form-kertas-kerja" id="form-kertas-kerja" method="post">
			<?=$input["id_pekerjaan"]?>
			<?=$input["id_lokasi"]?>
			<?=$input["jumlah_bangunan"]?>
			
			<!--<pre>
				<?php print_r($custom_data); ?>
			</pre>-->
		
			
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#entry" class="panel-head panel-entry" aria-controls="entry" role="tab" data-toggle="tab" data-type="">Entry</a>
				</li>
				<li role="presentation">
					<a href="#tanah" class="panel-head panel-tanah" aria-controls="tanah" role="tab" data-toggle="tab" data-type="">Tanah</a>
				</li>
				
				<!--Tab Bangunan-->
				
				<?php
					$i = 1;
					
					foreach ($list_bangunan as $id_bangunan => $item_bangunan)
					{
						$role	= str_replace(" ", "_", $id_bangunan);
				?>
				
				<li role="presentation">
					<a href="#<?=$role?>" class="panel-head panel-<?=$role?>" aria-controls="<?=$role?>" role="tab" data-toggle="tab" data-type="bangunan"><?=$id_bangunan?></a>
				</li>
				
				<?php
						$i++;
					}
					
				?>
				
				<!--Tab Bangunan-->
				<!-- 
				<li role="presentation">
					<a href="#splengkap" class="panel-head panel-splengkap" aria-controls="splengkap" role="tab" data-toggle="tab" data-type="">Sarana Pelengkap</a>
				</li> -->
				<li role="presentation">
					<a href="#dbanding" class="panel-head panel-dbanding" aria-controls="dbanding" role="tab" data-toggle="tab" data-type="">Data Banding</a>
				</li>
				<li role="presentation">
					<a href="#lampiran" class="panel-head panel-lampiran" aria-controls="lampiran" role="tab" data-toggle="tab" data-type="">Lampiran-Lampiran</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content" style="padding: 20px; border: 1px solid #eee;">
				<div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="entry">
					<h4>FORM DATA ENTRY SURVEYOR</h4>
					<div class="table_div">
						<table class="table_border" cellpadding="0" cellspacing="0" >
							<tbody>
								<tr bgcolor="#2862bb">
									<td colspan="2" style="color:#ffffff; padding-left: 10px"><span>SURVEYOR & LAPORAN</span></td>
									<td>
									</td>
									<td colspan="2" style="color:#ffffff; padding-left: 10px">
										<span>DATA-DATA UMUM PROPERTI</span>
									</td>
								</tr>
								<tr>
									<td><span>Penandatangan Laporan</span></td>
									<td ><?=$input["entry_1"]?></td>
									<td width="50">&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td><span>Obyek Penilaian</span></td>
									<td><?=$input["entry_2"]?></td>
								</tr>
								<tr>
									<td><span>Nama Penilai</span></td>
									<td><?=$input["entry_3"]?></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td><span>Highest and Best Use</span></td>
									<td><?=$input["entry_4"]?></td>
								</tr>
								<tr>
									<td><span>Nama Surveyor</span></td>
									<td><?=$input["entry_5"]?></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td><?=$input["entry_6"]?></td>
									<td><?=$input["entry_7"]?></td>
								</tr>
								<tr>
									<td style=" background-color:#eee;">&nbsp;</td>
									<td style=" background-color:#eee;">&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>Telepon / HP.</span></td>
									<td><?=$input["entry_8"]?></td>
								</tr>
								<tr>
									<td><span>Tanggal Inspeksi & Penilaian</span></td>
									<td><?=$input["entry_9"]?></td>
									<td>&nbsp;</td>
									<td><span>Status Obyek</span></td>
									<td><?=$input["entry_10"]?></td>
								</tr>
								<tr>
									<td style=" background-color:#eee;">&nbsp;</td>
									<td style=" background-color:#eee;">&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>Yang dijumpai</span></td>
									<td><?=$input["entry_11"]?></td>
								</tr>
								<tr>
									<td><span>Tanggal Laporan</span></td>
									<td><?=$input["entry_12"]?></td>
									<td>&nbsp;</td>
									<td><span>Selaku</span></td>
									<td><?=$input["entry_13"]?></td>
								</tr>
								<tr>
									<td style=" background-color:#eee;">&nbsp;</td>
									<td style=" background-color:#eee;">&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>Obyek ditempati oleh</span></td>
									<td><?=$input["entry_14"]?></td>
								</tr>
								<tr>
									<td><span>Nomor Laporan</span></td>
									<td><?=$input["entry_15"]?></td>
									<td>&nbsp;</td>
									<td><span>Penggunaan Obyek</span></td>
									<td><?=$input["entry_16"]?></td>
								</tr>
								
								<tr bgcolor="#2862bb">
									<td colspan="2" style="color:#ffffff; padding-left: 10px">
										<span>DATA-DATA PEMBERI TUGAS</span>
									</td>
									<td></td>
									<td colspan="2" style="color:#ffffff; padding-left: 10px">
										<span>ALAMAT LENGKAP PROPERTI</span>
									</td>
								</tr>
								
								<tr>
									<td><span>Nama Instansi / Perorangan</span></td>
									<td><?=$input["entry_17"]?></td>
									<td>&nbsp;</td>
									<td><span>Nama Apartemen</span></td>
									<td><?=$input["entry_43"]?></td>
								</tr>
								<tr>
									<td><span>Nama Cabang</span></td>
									<td><?=$input["entry_19"]?></td>
									<td>&nbsp;</td>
									<td><span>Nama Tower</span></td>
									<td><?=$input["entry_44"]?></td>
								</tr>								
								<tr>
									<td><span>Nama Staff</span></td>
									<td><?=$input["entry_20"]?></td>
									<td>&nbsp;</td>
									<td><span>Letak Lantai Obyek</span></td>
									<td><?=$input["entry_45"]?></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>Nomor Ruang Apartemen</span></td>
									<td><?=$input["entry_46"]?></td>
								</tr>
								<tr>
									<td><span>Jabatan</span></td>
									<td><?=$input["entry_22"]?></td>
									<td>&nbsp;</td>
									<td><span>Nama Jalan Lokasi Apartemen</span></td>
									<td><?=$input["entry_18"]?></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>d/h</span></td>
									<td><?=$input["entry_33"]?></td>
								</tr>
								<tr>
									<td><span>Nomor Penugasan</span></td>
									<td><?=$input["entry_24"]?></td>
									<td>&nbsp;</td>
									<td><span>Nama Kota / Kabupaten</span></td>
									<td><?=$input["entry_23"]?></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>d/h</span></td>
									<td><?=$input["entry_34"]?></td>
								</tr>
								<tr>
									<td><span>Tanggal Penugasan</span></td>
									<td><?=$input["entry_26"]?></td>
									<td>&nbsp;</td>
									<td><span>Kecamatan</span></td>
									<td><?=$input["entry_25"]?></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>d/h</span></td>
									<td><?=$input["entry_35"]?></td>
								</tr>
								<tr>
									<td><span>Tujuan Penilaian</span></td>
									<td><?=$input["entry_28"]?></td>
									<td>&nbsp;</td>
									<td><span>Kelurahan / Desa</span></td>
									<td><?=$input["entry_27"]?></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>d/h</span></td>
									<td><?=$input["entry_36"]?></td>
								</tr>
								<!--<tr>
									<td><span>Tabel Intensitas (Berupa Capture)</span></td>
									<td colspan="4" style="padding: 10px; border-right: 0px;"><?=$input["entry_32"]?></td>
								</tr>-->
							</tbody>
						</table>
					</div>
					
					<br />
					<h4>RINGKASAN PENILAIAN PROPERTI <?=$urutan?></h4>
					<div class="table_div">
						<table class="table_border" cellpadding="0" cellspacing="0" >
							<tbody>
								<tr bgcolor="#4C9ED9">
									<td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>No</span></td>
									<td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Obyek Penilaian</span></td>
									<td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Luas (m<sup>2</sup>) / Jumlah</span></td>
									<td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Nilai Pasar (Rp)</span></td>
									<td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Nilai Lukuidasi (Rp)</span></td>
								</tr>
							</tbody>
							<tbody  id="table_body_ringkasan">
							</tbody>
						</table>
					</div>
					<br />
					<div class="table_div">
						<table class="table_border" cellpadding="0" cellspacing="0" >
							<tbody>
								<tr>
									<td colspan="5">
										<table class="table_border" cellpadding="0" cellspacing="0">
											<tr bgcolor="#2862bb">
												<td align="center" colspan="6" style="color:#ffffff;">
													<span>HASIL PENILAIAN TERDAHULU</span>
												</td>
											</tr>
										
										</table>
									</td>
								</tr>
								<tr>
									<td colspan="5" id="history_penilaian">
										<table class="table_border" cellpadding="0" cellspacing="0">
											<tr bgcolor="#4C9ED9">
												<td align="center" style="color: #ffffff">No.</td>
												<td align="center" style="color: #ffffff">U R A I A N</td>
												<td align="center" style="color: #ffffff">TAHUN 2013</td>
												<td align="center" style="color: #ffffff">TAHUN 2014</td>
												<td align="center" style="color: #ffffff">TAHUN 2015</td>
												<td align="center" style="color: #ffffff">TAHUN 2016</td>
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


							</tbody>
						</table>

					</div>
				</div>
				<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="tanah">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="">
							<a aria-expanded="false" href="#tanah_form" class="panel-tanah_tanah active" aria-controls="tanah_tanah" role="tab" data-toggle="tab" data-type="">Form Tanah</a>
						</li>
					</ul>
					<div class="tab-content" style="padding: 20px; border: 1px solid #eee;">
						<div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="tanah_form">
							<div class="row">
						
								<div class="col-lg-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">O B Y E K&nbsp;&nbsp;&nbsp;P E N I L A I A N</h3>
										</div>
										<div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
											<table class="table_info" cellpadding="0" cellspacing="0">
												<tr valign="top">
													<td width="120">Nama</td>
													<td align="center" width="20">:</td>
													<td><?=$pekerjaan->nama_klien?></td>
												</tr>
												<tr valign="top">
													<td>Tanggal Inspeksi</td>
													<td align="center" width="20">:</td>
													<td class="tanah-td-tanggal-inspeksi"><?=date("d-m-Y", strtotime($lokasi->tanggal_mulai))?></td>
												</tr>
												<tr valign="top">
													<td>Alamat Obyek</td>
													<td align="center" width="20">:</td>
													<td>
														<?=$lokasi->alamat." ".(!empty($lokasi->gang) ? "Gang ".$lokasi->gang : "")." No. ".$lokasi->nomor.", RT. ".$lokasi->rt." RW. ".$lokasi->rw." ".$lokasi->nama_desa." ".(!empty($lokasi->dh_desa) ? "(d/h ".$lokasi->dh_desa.")" : "")." ".$lokasi->nama_kecamatan." ".(!empty($lokasi->dh_kecamatan) ? "(d/h ".$lokasi->dh_kecamatan.")" : "")." ".$lokasi->nama_kota." ".(!empty($lokasi->dh_kota) ? "(d/h ".$lokasi->dh_kota.")" : "").", ".$lokasi->nama_provinsi ." ".(!empty($lokasi->dh_provinsi) ? "(d/h ".$lokasi->dh_provinsi.")" : "")?>
													</td>
												</tr>
											</table>
										</div>
										<div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
											<table class="table_info" cellpadding="0" cellspacing="0">
												<tr valign="top">
													<td>Yang dijumpai dilokasi</td>
													<td align="center" width="20">:</td>
													<td class="tanah-td-yang-dijumpai"></td>
												</tr><!-- 
												<tr valign="top">
													<td>Jabatan</td>
													<td align="center" width="20">:</td>
													<td class="tanah-td-jabatan"></td>
												</tr> -->
												<tr valign="top">
													<td>Upload Photo</td>
													<td align="center" width="20">:</td>
													<td><?=$input["tanah_32"];?></td>
												</tr>
											</table>									
											<h4>Informasi Bangunan</h4>
											<div class="panel-body" style="padding: 0px;">
											<table class="table_info col-lg-6" cellpadding="0" cellspacing="0">
												<tr>
													<td style="border: 1px solid #e1e1e1; padding-left: 3%;"><span><b>Perusahaan Pengembang</b></span></td>
													<td style="border: 1px solid #e1e1e1;"><?=$input["entry_41"]?></td>
												</tr>
												<tr>
													<td style="border: 1px solid #e1e1e1; padding-left: 3%;"><span><b>Tahun Dibangun</b></span></td>
													<td style="border: 1px solid #e1e1e1;"><?=$input["entry_42"]?></td>
												</tr>
												<tr>
													<td style="border: 1px solid #e1e1e1; padding-left: 3%;"><span><b>Keadaan lingkungan</b></span></td>
													<td style="border: 1px solid #e1e1e1;"><?=$input["tanah_120"]?></td>
												</tr>
												<tr>
													<td style="border: 1px solid #e1e1e1; padding-left: 3%;"><span><b>Penghijauan / taman</b></span></td>
													<td style="border: 1px solid #e1e1e1;"><?=$input["tanah_121"]?></td>
												</tr>
												<tr>
													<td style="border: 1px solid #e1e1e1; padding-left: 3%;"><span><b>Pemeliharaan bangunan</b></span></td>
													<td style="border: 1px solid #e1e1e1;"><?=$input["tanah_122"]?></td>
												</tr>
											</table>
											</div>
											<div class="col-lg-6" style="padding: 0px;">
												<h4>Informasi Properti</h4>
												<table class="table_border" cellpadding="0" cellspacing="0">
													<tr>
														<td width="15%"><span>Status obyek</span></td>
														<td><?=$input["tanah_1"];?></td>
													</tr>
													<tr>
														<td><span>Obyek dihuni oleh</span></td>
														<td><?=$input["tanah_2"];?></td>
													</tr>
													<tr>
														<td><span>Penggunaan obyek</span></td>
														<td><?=$input["tanah_3"];?></td>
													</tr>
												</table>
												
											</div>
											<div class="col-lg-6" style="padding: 0px">
												<h4>Batas-batas Properti</h4>
												<table class="table_border" cellpadding="0" cellspacing="0">
													<tr>
														<td width="30%"><?=$input["tanah_4"];?></td>
														<td><?=$input["tanah_5"];?></td>
													</tr>
													<tr>
														<td><?=$input["tanah_6"];?></td>
														<td><?=$input["tanah_7"];?></td>
													</tr>
													<tr>
														<td><?=$input["tanah_8"];?></td>
														<td><?=$input["tanah_9"];?></td>
													</tr>
													<tr>
														<td><?=$input["tanah_10"];?></td>
														<td><?=$input["tanah_11"];?></td>
													</tr>
												</table>
												
											</div>
										</div>
										<div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
											<h4>GAMBARAN LINGKUNGAN</h4>
											<div class="col-lg-6" style="padding: 0px;">
												<table class="table_border" cellpadding="0" cellspacing="0">
													<tr>
														<td width="15%"><span>Lokasi Apartemen</span></td>
														<td><?=$input["tanah_12"];?></td>
													</tr>
													<tr>
														<td><span>Harga Apartemen</span></td>
														<td><?=$input["tanah_13"];?></td>
													</tr>
												</table>
											</div>
											<div class="col-lg-6" style="padding: 0px">
												<table class="table_border" cellpadding="0" cellspacing="0">
													<tr>
														<td width="15%"><span>Kepadatan Hunian</span></td>
														<td><?=$input["tanah_14"];?></td>
													</tr>
													<tr>
														<td><span>Pertumbuhan Hunian</span></td>
														<td><?=$input["tanah_15"];?></td>
													</tr>
												</table>
											</div>
										</div>
										<div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
											<div class="col-lg-6" style="padding: 0px;">
												<h4>ANALISA LINGKUNGAN</h4>
												<table class="table_border">
													<tr>
														<td width="25%"><span>Kemudahan mencapai lokasi obyek</span></td>
														<td><?=$input["tanah_16"];?></td>
													</tr>
													<tr>
														<td><span>Kemudahan belanja / shooping</span></td>
														<td><?=$input["tanah_17"];?></td>
													</tr>
													<tr>
														<td><span>Kemudahan rekreasi /  hiburan</span></td>
														<td><?=$input["tanah_18"];?></td>
													</tr>
													<tr>
														<td><span>Kemudahan angkutan umum / transportasi</span></td>
														<td><?=$input["tanah_19"];?></td>
													</tr>
													<tr>
														<td><span>Kemudahan sarana pendidikan / sekolah</span></td>
														<td><?=$input["tanah_20"];?></td>
													</tr>
													<tr>
														<td><span>Keamanan terhadap kejahatan / kriminal</span></td>
														<td><?=$input["tanah_21"];?></td>
													</tr>
													<tr>
														<td><span>Keamanan terhadap bencana kebakaran</span></td>
														<td><?=$input["tanah_22"];?></td>
													</tr>
													<tr>
														<td><span>Keamanan terhadap bencana alam / banjir</span></td>
														<td><?=$input["tanah_23"];?></td>
													</tr>
												</table>
											</div>
											<div class="col-lg-6" style="padding: 0px;">
												<h4>MAYORITAS DATA HUNIAN</h4>
												<table class="table_border">
													<tr>
														<td><span>Kepemilikan</span></td>
														<td><?=$input["tanah_116"];?></td>
													</tr>
													<tr>
														<td><span>Penyewaa</span></td>
														<td><?=$input["tanah_117"];?></td>
													</tr>
													<tr>
														<td><span>Instansi</span></td>
														<td><?=$input["tanah_118"];?></td>
													</tr>
													<tr>
														<td><span>Kosong</span></td>
														<td><?=$input["tanah_119"];?></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
									<div class="panel panel-defa ult">
										<div class="panel-body" style="border: 1px solid #e1e1e1;">
											<h4>FASILITAS BANGUNAN</h4>
											<div class="col-lg-12" style="padding: 0px;">
												<table class="table_border" cellpadding="0" cellspacing="0">
													<tr>
														<td width="10%"><span>Jaringan listrik</span></td>
														<td><?=$input["tanah_88"];?></td>
														<td width="15%"><span>Lobby Utama</span></td>
														<td><?=$input["tanah_89"];?></td>
														<td width="10%"><span>Mini Market</span></td>
														<td><?=$input["tanah_90"];?></td>
														<td width="15%"><span>Lift Penumpang</span></td>
														<td><?=$input["tanah_91"];?></td>
													</tr>
													<tr>
														<td width="10%"><span>Genset</span></td>
														<td><?=$input["tanah_92"];?></td>
														<td width="15%"><span>Swimming Pool</span></td>
														<td><?=$input["tanah_93"];?></td>
														<td width="10%"><span>Restaurant</span></td>
														<td><?=$input["tanah_94"];?></td>
														<td width="15%"><span>Lift Barang</span></td>
														<td><?=$input["tanah_95"];?></td>
													</tr>
													<tr>
														<td width="10%"><span>Jaringan Air Bersih</span></td>
														<td><?=$input["tanah_96"];?></td>
														<td width="15%"><span>jogging Track</span></td>
														<td><?=$input["tanah_97"];?></td>
														<td width="10%"><span>Music Lounge</span></td>
														<td><?=$input["tanah_98"];?></td>
														<td width="15%"><span>Tangga Darurat</span></td>
														<td><?=$input["tanah_99"];?></td>
													</tr>
													<tr>
														<td width="10%"><span>Jaringan Telpon</span></td>
														<td><?=$input["tanah_100"];?></td>
														<td width="15%"><span>Fitness Center</span></td>
														<td><?=$input["tanah_101"];?></td>
														<td width="10%"><span>ATM / Banking</span></td>
														<td><?=$input["tanah_102"];?></td>
														<td width="15%"><span>Hydrant</span></td>
														<td><?=$input["tanah_103"];?></td>
													</tr>
													<tr>
														<td width="10%"><span>Jaringan Gas</span></td>
														<td><?=$input["tanah_104"];?></td>
														<td width="15%"><span>Sport Center</span></td>
														<td><?=$input["tanah_105"];?></td>
														<td width="10%"><span>Shooping Center</span></td>
														<td><?=$input["tanah_106"];?></td>
														<td width="15%"><span>Alarm System</span></td>
														<td><?=$input["tanah_107"];?></td>
													</tr>
													<tr>
														<td width="10%"><span>Jaringan Wifi</span></td>
														<td><?=$input["tanah_108"];?></td>
														<td width="15%"><span>Play Ground</span></td>
														<td><?=$input["tanah_109"];?></td>
														<td width="10%"><span>Book Store</span></td>
														<td><?=$input["tanah_110"];?></td>
														<td width="15%"><span>CCTV System</span></td>
														<td><?=$input["tanah_111"];?></td>
													</tr>
													<tr>
														<td width="10%"><span>Taman</span></td>
														<td><?=$input["tanah_112"];?></td>
														<td width="15%"><span>Medical Center</span></td>
														<td><?=$input["tanah_113"];?></td>
														<td width="10%"><span>Loundry Room</span></td>
														<td><?=$input["tanah_114"];?></td>
														<td width="15%"><span>Secure Parking</span></td>
														<td><?=$input["tanah_115"];?></td>
													</tr>
												</table>
											</div>
										</div>
										<!-- <div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
											<h4>FASILITAS LINGKUNGAN</h4>
											<div class="col-lg-6" style="padding: 0px;">
												<table class="table_border">
													<tr>
														<td><span>Lebar jalan di depan obyek (m)</span></td>
														<td><?=$input["tanah_39"];?></td>
													</tr>
													<tr>
														<td><span>Lebar jalan di sekitar obyek (m)</span></td>
														<td><?=$input["tanah_40"];?></td>
													</tr>
													<tr>
														<td><span>Jenis jalan depan obyek</span></td>
														<td><?=$input["tanah_41"];?></td>
													</tr>
													<tr>
														<td><span>Drainage / Saluran</span></td>
														<td><?=$input["tanah_42"];?></td>
													</tr>
													<tr>
														<td><span>Trotoar</span></td>
														<td><?=$input["tanah_43"];?></td>
													</tr>
													<tr>
														<td><span>Lampu Jalan (PJU)</span></td>
														<td><?=$input["tanah_44"];?></td>
													</tr>
												</table>
											</div>
											<div class="col-lg-6" style="padding: 0px;">
												<table class="table_border">
													<tr>
														<td><span>Jaringan Listrik</span></td>
														<td width="25px"><?=$input["tanah_33"];?></td>
													</tr>
													<tr>
														<td><span>Jaringan Telepon</span></td>
														<td><?=$input["tanah_34"];?></td>
													</tr>
													<tr>
														<td><span>Jaringan Air Bersih</span></td>
														<td><?=$input["tanah_35"];?></td>
													</tr>
													<tr>
														<td><span>Jaringan Gas</span></td>
														<td><?=$input["tanah_36"];?></td>
													</tr>
													<tr>
														<td><span>Taman Pemakaman Umum</span></td>
														<td><?=$input["tanah_37"];?></td>
													</tr>
													<tr>
														<td><span>Penampungan Sampah</span></td>
														<td><?=$input["tanah_38"];?></td>
													</tr>
												</table>
											</div>
										</div>
										<div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
											<h4>GAMBARAN UMUM SITE</h4>
											<div class="col-lg-6" style="padding: 0px;">
												<table class="table_border">
													<tr>
														<td><span>Topografi / Kontur</span></td>
														<td><?=$input["tanah_45"];?></td>
													</tr>
													<tr>
														<td><span>Jenis Tanah</span></td>
														<td><?=$input["tanah_46"];?></td>
													</tr>
													<tr>
														<td><span>Tata Lingkungan</span></td>
														<td><?=$input["tanah_47"];?></td>
													</tr>
													<tr>
														<td><span>Resiko Banjir</span></td>
														<td><?=$input["tanah_48"];?></td>
													</tr>
												</table>
											</div>
											<div class="col-lg-6" style="padding: 0px;">
												<table class="table_border">
													<tr>
														<td><span>Letak / Posisi Tanah</span></td>
														<td><?=$input["tanah_49"];?></td>
													</tr>
													<tr>
														<td><span>Tinggi Tanah (terhadap jalan) (cm)</span></td>
														<td><?=$input["tanah_50"];?></td>
													</tr>
													<tr>
														<td><span>Jalur / Ruang Areal SUTT - SUTET (cm)</span></td>
														<td><?=$input["tanah_51"];?></td>
													</tr>
													<tr>
														<td><span>Jarak obyek terhadap SUTT - SUTET (m)</span></td>
														<td><?=$input["tanah_52"];?></td>
													</tr>
												</table>
											</div>
										</div> -->
									</div> -->
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">D A T A&nbsp;&nbsp;&nbsp;L E G A L I T A S</h3>
										</div>
										<input type="hidden" id="total_data_legalitas">
										<div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
											<table width="100%" cellpadding="0" cellspacing="0">
												<thead>
													<tr>
														<td>Nomor IMB (Bersama)</td>		
														<td><span style="border: 1px solid #e1e1e1; border-right:0px;"><?=$input["tanah_123"];?></span></td>
														<td>Luas bangunan berdasarkan IMB</td>		
														<td><span style="border: 1px solid #e1e1e1; border-right:0px;"><?=$input["tanah_124"];?></span></td>
													</tr>
													<tr>
														<td>Tgl. dikeluarkan IMB (Bersama)</td>
														<td><span style="border: 1px solid #e1e1e1; border-right:0px;"><?=$input["tanah_125"];?></span></td>
														<td>(Luas Keseluruhan Tower <span class="tower-name"></span>)</td>
													</tr>
												</thead>
											</table>
											<table id="table_data_legalitas_1" class="table_border_2" width="100%" cellpadding="0" cellspacing="0">
												<thead>
													<tr>
														<th rowspan="2">No</th>
														<th rowspan="2">Jenis Sertifikat</th>
														<th rowspan="2">Nomor Sertifikat</th>
														<th rowspan="2">Atas Nama</th>
														<th colspan="2">Tanggal Sertifikat</th>
														<th colspan="2"><?=$input["tanah_87"];?></th>
														<th rowspan="2">Luas Lantai (m<sup>2</sup>)</th>
														<th rowspan="2"></th>
													</tr>
													<tr>
														<th>Terbit</th>
														<th>Berakhir</th>
														<th>Nomor</th>
														<th>Tgl-Bln-Thn</th>
													</tr>
												</thead>
												<tbody id="tbody_data_legalitas_1"></tbody>
												<tfoot>
													<tr>
														<td align="center" colspan="8"><span>TOTAL LUAS RUANG APARTEMEN SESUAI SERTIFIKAT</span></td>
														<td><?=$input["tanah_61"];?></td>
														<td></td>
													</tr>
												</tfoot>
											</table><br> 
											<button type="button" class="btn btn-primary btn-sm btn-data-legalitas" data-type="tambah" data-id="">TAMBAH</button>
											
											<!-- <table class="table_border_2" id="" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
												<tbody>
													<td colspan="2"><span> INFORMASI DINAS TATA KOTA TENTANG RENCANA PEMBANGUNAN / PELEBARAN JALAN  :</span></td>
												</tbody>
												<tfoot>
													<tr>
														<td align="center"><span>Total luas tanah yang terpotong (rencana pembangunan / pelebaran jalan)</span></td>
														<td><?=$input["tanah_62"];?></td>
													</tr>
												</tfoot>
											</table><br> -->
										</div>
									</div>
									<!-- 
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">K E S I M P U L A N&nbsp;&nbsp;&nbsp;N I L A I&nbsp;&nbsp;&nbsp;T A N A H</h3>
										</div>
										<div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
											<div class="col-lg-6" style="padding: 0px;">
												<table class="table_border" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th colspan="2">INFORMASI NJOP TANAH</th>
														</tr>
													</thead>
													<tbody>
														
														<tr>
															<td><span>NJOP Tanggal</span></td>
															<td><?=$input["tanah_63"];?></td>
														</tr>
														<tr>
															<td><span>Tanah ( / m<sup>2</sup> )</span></td>
															<td><?=$input["tanah_64"];?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-lg-6" style="padding: 0px;">
												<table class="table_border" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th colspan="2">BERDASARKAN FISIK</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><span>NILAI PASAR</span></td>
															<td><?=$input["tanah_65"];?></td>
														</tr>
														<tr>
															<td><span>INDIKASI NILAI LIKUIDASI</span></td>
															<td><?=$input["tanah_66"];?></td>
														</tr>
													</tbody>
												</table>
											</div>
											
										</div>
										
									</div> -->
									<div class="panel panel-default">
										<div class="panel-heading">
											<h3 class="panel-title">C A T A T A N&nbsp;&nbsp;&nbsp;P E N I L A I</h3>
										</div>
										<div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
											<?=$input["tanah_67"];?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					

				</div>

				<!--Tab Bangunan-->
				<?php
					$i = 1;
					
					foreach ($list_bangunan as $id_bangunan => $item_bangunan)
					{
						$role	= str_replace(" ", "_", $id_bangunan);
				?>
				
				<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="<?=$role?>">
					<h4>Penilaian <?=$id_bangunan?></h4>
					<div id="tab_<?=$role?>">
						
					</div>
				</div>
				
				<?php
						$i++;
					}
					
				?>
				<!--Tab Bangunan-->
				
				<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="splengkap">
					<table class="table_border_2 table_sarana" id="" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th colspan="7" style="background-color: #1680e9; color: #fff;">PERHITUNGAN SARANA PELENGKAP</th>
							</tr>
							<tr>
								<th>Unit Sarana Pelengkap</th>
								<th colspan="2">Ukuran / Jumlah</th>
								<th>Biaya Satuan</th>
								<th>BRB / RCN</th>
								<th>Dep.</th>
								<th>Nilai Pasar</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><span>Daya listrik PLN</span></td>
								<td colspan="2"><?=$input["sarana_1"];?></td>
								<td><?=$input["sarana_2"];?></td>
								<td><?=$input["sarana_3"];?></td>
								<td><?=$input["sarana_4"];?></td>
								<td style="text-align: right;"><?=$input["sarana_5"];?></td>
							</tr>
							<tr>
								<td><span>Jaringan telepon TELKOM</span></td>
								<td colspan="2"><?=$input["sarana_6"];?></td>
								<td><?=$input["sarana_8"];?></td>
								<td><?=$input["sarana_9"];?></td>
								<td><?=$input["sarana_10"];?></td>
								<td><?=$input["sarana_11"];?></td>
							</tr>
							<tr>
								<td><span>Jaringan air bersih PDAM</span></td>
								<td rowspan="3" style="background-color: #eee"><?=$input["sarana_12"];?></td>
								<td><?=$input["sarana_13"];?></td>
								<td><?=$input["sarana_14"];?></td>
								<td><?=$input["sarana_15"];?></td>
								<td><?=$input["sarana_16"];?></td>
								<td><?=$input["sarana_17"];?></td>
							</tr>
							<tr>
								<td><span>Sumur bor / pantek</span></td>
								<td><?=$input["sarana_18"];?></td>
								<td><?=$input["sarana_19"];?></td>
								<td><?=$input["sarana_20"];?></td>
								<td><?=$input["sarana_21"];?></td>
								<td><?=$input["sarana_22"];?></td>
							</tr>
							<tr>
								<td><span>Sumur dalam / artesis</span></td>
								<td><?=$input["sarana_23"];?></td>
								<td><?=$input["sarana_24"];?></td>
								<td><?=$input["sarana_25"];?></td>
								<td><?=$input["sarana_26"];?></td>
								<td><?=$input["sarana_27"];?></td>
							</tr>
							<tr>
								<td><span>Air Conditioner (AC)</span></td>
								<td><?=$input["sarana_28"];?></td>
								<td><?=$input["sarana_29"];?></td>
								<td><?=$input["sarana_30"];?></td>
								<td><?=$input["sarana_31"];?></td>
								<td><?=$input["sarana_32"];?></td>
								<td><?=$input["sarana_33"];?></td>
							</tr>

							<tr>
								<td><span>Carport</span></td>
								<td><?=$input["sarana_34"];?></td>
								<td><?=$input["sarana_35"];?></td>
								<td><?=$input["sarana_36"];?></td>
								<td><?=$input["sarana_37"];?></td>
								<td><?=$input["sarana_38"];?></td>
								<td><?=$input["sarana_39"];?></td>
							</tr>
							<tr>
								<td><span>Perkerasan</span></td>
								<td><?=$input["sarana_40"];?></td>
								<td><?=$input["sarana_41"];?></td>
								<td><?=$input["sarana_42"];?></td>
								<td><?=$input["sarana_43"];?></td>
								<td><?=$input["sarana_44"];?></td>
								<td><?=$input["sarana_45"];?></td>
							</tr>
							<tr>
								<td><span>Pintu Pagar</span></td>
								<td><?=$input["sarana_46"];?></td>
								<td><?=$input["sarana_47"];?></td>
								<td><?=$input["sarana_48"];?></td>
								<td><?=$input["sarana_49"];?></td>
								<td><?=$input["sarana_50"];?></td>
								<td><?=$input["sarana_51"];?></td>
							</tr>
							<tr>
								<td><span>Pagar halaman</span></td>
								<td><?=$input["sarana_52"];?></td>
								<td><?=$input["sarana_53"];?></td>
								<td><?=$input["sarana_54"];?></td>
								<td><?=$input["sarana_55"];?></td>
								<td><?=$input["sarana_56"];?></td>
								<td><?=$input["sarana_57"];?></td>
							</tr>
							<tr>
								<td><span>Pemanas air / water heater</span></td>
								<td><?=$input["sarana_58"];?></td>
								<td><?=$input["sarana_59"];?></td>
								<td><?=$input["sarana_60"];?></td>
								<td><?=$input["sarana_61"];?></td>
								<td><?=$input["sarana_62"];?></td>
								<td><?=$input["sarana_63"];?></td>
							</tr>
							<tr>
								<td><span>Penangkal petir</span></td>
								<td><?=$input["sarana_64"];?></td>
								<td><?=$input["sarana_65"];?></td>
								<td><?=$input["sarana_66"];?></td>
								<td><?=$input["sarana_67"];?></td>
								<td><?=$input["sarana_68"];?></td>
								<td><?=$input["sarana_69"];?></td>
							</tr>
							<tr>
								<td><span>Gapura</span></td>
								<td><?=$input["sarana_70"];?></td>
								<td><?=$input["sarana_71"];?></td>
								<td><?=$input["sarana_72"];?></td>
								<td><?=$input["sarana_73"];?></td>
								<td><?=$input["sarana_74"];?></td>
								<td><?=$input["sarana_75"];?></td>
							</tr>
							<tr>
								<td><span>Water Toren + Filter</span></td>
								<td><?=$input["sarana_76"];?></td>
								<td><?=$input["sarana_77"];?></td>
								<td><?=$input["sarana_78"];?></td>
								<td><?=$input["sarana_79"];?></td>
								<td><?=$input["sarana_80"];?></td>
								<td><?=$input["sarana_81"];?></td>
							</tr>
							<tr>
								<td><span>Kolam renang + pompa</span></td>
								<td><?=$input["sarana_82"];?></td>
								<td><?=$input["sarana_83"];?></td>
								<td><?=$input["sarana_84"];?></td>
								<td><?=$input["sarana_85"];?></td>
								<td><?=$input["sarana_86"];?></td>
								<td><?=$input["sarana_87"];?></td>
							</tr>
							<tr>
								<td><?=$input["sarana_118"];?></td>
								<td><?=$input["sarana_119"];?></td>
								<td><?=$input["sarana_120"];?></td>
								<td><?=$input["sarana_121"];?></td>
								<td><?=$input["sarana_122"];?></td>
								<td><?=$input["sarana_123"];?></td>
								<td><?=$input["sarana_124"];?></td>
							</tr>

							<tr style="font-weight: bold;">
								<td align="right" colspan="4" style="background-color: #eee;" colspan="4"><span>TOTAL SARANA PELENGKAP</span></td>
								<td><?=$input["sarana_88"];?></td>
								<td style="background-color: #eee;"></td>
								<td><?=$input["sarana_89"];?></td>
							</tr>
						</tbody>
						<thead>
							<tr>
								<th colspan="7" style="background-color: #1680e9; color: #fff;">BAGIAN SARANA PELENGKAP "TERPOTONG" KETENTUAN & PERATURAN (GSB / PELEBARAN JALAN)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><span>Carpot (m<sup>2</sup>)</span></td>
								<td><?=$input["sarana_90"];?></td>
								<td><?=$input["sarana_91"];?></td>
								<td><?=$input["sarana_92"];?></td>
								<td><?=$input["sarana_93"];?></td>
								<td><?=$input["sarana_94"];?></td>
								<td><?=$input["sarana_95"];?></td>
							</tr>
							<tr>
								<td><span>Perkerasan</span></td>
								<td><?=$input["sarana_96"];?></td>
								<td><?=$input["sarana_97"];?></td>
								<td><?=$input["sarana_98"];?></td>
								<td><?=$input["sarana_99"];?></td>
								<td><?=$input["sarana_100"];?></td>
								<td><?=$input["sarana_101"];?></td>
							</tr>
							<tr>
								<td><span>Pagar Halaman</span></td>
								<td><?=$input["sarana_102"];?></td>
								<td><?=$input["sarana_103"];?></td>
								<td><?=$input["sarana_104"];?></td>
								<td><?=$input["sarana_105"];?></td>
								<td><?=$input["sarana_106"];?></td>
								<td><?=$input["sarana_107"];?></td>
							</tr>
							<tr>
								<td><span>Taman / Lanscaping</span></td>
								<td><?=$input["sarana_108"];?></td>
								<td><?=$input["sarana_109"];?></td>
								<td><?=$input["sarana_110"];?></td>
								<td><?=$input["sarana_111"];?></td>
								<td><?=$input["sarana_112"];?></td>
								<td><?=$input["sarana_113"];?></td>
							</tr>
							<tr style="font-weight: bold;">
								<td align="right" colspan="4" style="background-color: #eee;"><span>TOTAL SARANA PELENGKAP</span></td>
								<td><?=$input["sarana_114"];?></td>
								<td style="background-color: #eee;"></td>
								<td><?=$input["sarana_115"];?></td>
							</tr>
							<tr style="font-weight: bold;">
								<td align="right" colspan="4" style="background-color: #1680e9; color: #fff;"><span>SISA TOTAL SARANA PELENGKAP</span></td>
								<td><?=$input["sarana_116"];?></td>
								<td style="background-color: #eee;"></td>
								<td><?=$input["sarana_117"];?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="dbanding">
					<!--<h4>Data Banding</h4>-->
					
					<div id="table_pembanding"></div>
					<!--<button type="button" class="btn btn-sm btn-primary btn-tambah-pembanding" data-type="tambah" data-id="">TAMBAH PEMBANDING</button><br><br>-->
					<!-- <table id="table_data_legalitas_2" class="table_border_2" width="100%" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Jenis Sertifikat</th>
								<th>Nomor Sertifikat</th>
								<th>Luas Tanah (m<sup>2</sup>)</th>
								<th>Bobot</th>
								<th>Indikasi Nilai Tanah ( Rp. / m<sup>2</sup> ) </th>
								<th>Total Nilai Tanah ( Rp. )</th>
							</tr>
						</thead>
						<tbody id="tbody_data_legalitas_2"></tbody>
						<tfoot>
							<tr>
								<td align="center" colspan="3"><span>TOTAL LUAS TANAH SESUAI SERTIFIKAT</span></td>
								<td><?=$input["tanah_61"];?></td>
								<td></td>
								<td><?=$input["tanah_71"];?></td>
								<td><?=$input["tanah_72"];?></td>
							</tr>
						</tfoot>
					</table><br> -->
					<table class="table_border_2" width="100%" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td style="background-color: #eee;"><span>P E M B U L A T A N&nbsp;&nbsp;&nbsp;N I L A I&nbsp;&nbsp;&nbsp;P A S A R</td>
								<td><?=$input["pembanding_126"];?></td>
							</tr>
							<tr>
								<td style="background-color: #eee;"><span>P E M B U L A T A N&nbsp;&nbsp;&nbsp;N I L A I&nbsp;&nbsp;&nbsp;L I K U I D A S I</span></td>
								<td><?=$input["pembanding_127"];?></td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="lampiran">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a aria-expanded="false" href="#lampiran_properti" class="panel-lampiran_properti " aria-controls="lampiran_properti" role="tab" data-toggle="tab" data-type="">Foto Properti</a>
						</li>
						<li role="presentation" class="">
							<a aria-expanded="false" href="#lampiran_layout" class="panel-lampiran_layout" aria-controls="lampiran_layout" role="tab" data-toggle="tab" data-type="">Layout Properti</a>
						</li>
						<li role="presentation" class="">
							<a aria-expanded="false" href="#lampiran_peta" class="panel-lampiran_peta" aria-controls="lampiran_peta" role="tab" data-toggle="tab" data-type="">Peta Lokasi Properti</a>
						</li>
						<li role="presentation" class="">
							<a aria-expanded="false" href="#lampiran_kota" class="panel-lampiran_kota" aria-controls="lampiran_kota" role="tab" data-toggle="tab" data-type="">Keterangan Tata Kota</a>
						</li>
					</ul>
					<div class="tab-content" style="padding: 20px; border: 1px solid #eee;">
						<div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="lampiran_properti">
							<h4>Foto Properti</h4>
							<div class="row">
								<div class="col-lg-12">
									<div id="image_lampiran">
										<?php
											foreach ($list_image_lampiran as $item_image)
											{
												$multi_ket			= explode("##", $item_image->keterangan);
												$multi_file			= $item_image->jawab;
												$multi_urut			= $multi_ket[0];
												$multi_keterangan	= $multi_ket[1];
												
										?>
										<div class="col-lg-6 list_multi_image list_<?=str_replace(".", "", $multi_file)?>">
											<img src="<?=base_url("asset/file/".$multi_file)?>" style="width: 100%" />
											<table style="margin-bottom: 10px;">
												<tr>
													<td>No. Urut</td>
													<td>:</td>
													<td><?=$multi_urut?></td>
												</tr>
												<tr>
													<td>Keterangan</td>
													<td>:</td>
													<td><?=$multi_keterangan?></td>
												</tr>
											</table>
											<button type="button" class="btn btn-warning btn-sm btn-delete-image-multi" data-file="<?=str_replace(".", "", $multi_file)?>" data-id="<?=base64_encode($item_image->id)?>">Delete</button>
										</div>
										<?php
											}
										?>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-6">
											<div style="margin-top: 10px; background-color: #f3f3f3; border: 1px solid #eee; padding: 10px;">
												<div class="form-group">
													<label>File</label>
													<input type="file" name="multi_image" id="multi_image" />
												</div>
												<div class="form-group">
													<label>No. Urut</label>
													<input type="text" name="multi_urut" id="multi_urut" class="form-control input-xs" />
												</div>
												<div class="form-group">
													<label>Keterangan</label>
													<textarea name="multi_keterangan" id="multi_keterangan" class="form-control input-xs"></textarea>
												</div>
												<div class="form-group">
													<button type="button" id="btn_upload_multi" class="btn btn-primary btn-sm">UPLOAD</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="lampiran_layout">
							<h4>Layout Properti</h4>
							<?=$input["entry_29"]?>
						</div>
						<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="lampiran_peta">
							<h4>Peta Lokasi Properti</h4>
							<?=$input["entry_30"]?>
						</div>
						<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="lampiran_kota">
							<h4>Keterangan Tata Kota</h4>
							<?=$input["entry_31"]?>
						</div>
					</div>
				</div>
			</div>


			<div class="row">
				
				<div class="col-md-6">
					<div class="form-group text-left" style="padding: 15px;">
						<button type="button" class="btn btn-primary btn-sm" onclick="window.open('<?=base_url()?>printpdf/laporan_ringkas/<?=base64_encode($pekerjaan->id)?>/<?=base64_encode($lokasi->id)?>/pdf/', '_blank')" >PDF LAPORAN (SORT REPORT)</button>
						<!--<button type="button" class="btn btn-primary btn-sm" onclick="window.open('<?=base_url()?>printpdf/laporan_ringkas/<?=base64_encode($pekerjaan->id)?>/<?=base64_encode($lokasi->id)?>/print/', '_blank')" >PRINT LAPORAN RINGKAS</button>-->
						<button type="button" class="btn btn-success btn-sm btn-tambah-bangunan">TAMBAH BANGUNAN</button>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group text-right" style="padding: 15px;">
						<button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>
						<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
					</div>
				</div>
				<div class="col-md-12">
					<!--<label><a href="/ekjpp/pekerjaan/print_surat1" target="_blank">PRINT</a></label><br/>-->
					<!--<label><a href="/ekjpp/pekerjaan/print_surat2"  target="_blank">PRINT SR_2</a></label><br/>
					<label><a href="/ekjpp/pekerjaan/print_asm"  target="_blank">PRINT ASM</a></label><br/>
					<label><a href="/ekjpp/pekerjaan/print_db"  target="_blank">PRINT DB</a></label><br/>
					<label><a href="/ekjpp/pekerjaan/print_bct"  target="_blank">PRINT BCT</a></label><br/>-->
				</div>
			</div>
		</form>
	</div>
</div>

<style>
	h4{
		color: #1196ee;
		
	}
	.panel .panel-heading{
		background-color: #2397dc;
		color: #fff;
		font-weight: bold;
	}
	.panel .panel-heading h3{
		font-weight: bold;
	}
</style>


<script src="<?=base_url()?>asset/js/form_4.js?ver=4"></script>
<style>
	.input_879_,
	.input_880_,
	.input_881_,
	.input_882_,
	.input_883_,
	.input_884_
	{
		border: 1px solid #eee;
	}
</style>

