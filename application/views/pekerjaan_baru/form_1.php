<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="content">
	<div class="content-inner inner-page">
		<h2 class="page-heading">Kertas Kerja</h2>
		<form name="form-kertas-kerja" id="form-kertas-kerja" method="post">
			<?=$input["id_pekerjaan"]?>
			<?=$input["id_lokasi"]?>
			
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#entry" class="panel-head panel-entry" aria-controls="entry" role="tab" data-toggle="tab">Entry</a>
				</li>
				<li role="presentation">
					<a href="#tanah" class="panel-head panel-tanah" aria-controls="tanah" role="tab" data-toggle="tab">Tanah</a>
				</li>
				<li role="presentation">
					<a href="#splengkap" class="panel-head panel-splengkap" aria-controls="splengkap" role="tab" data-toggle="tab">Sarana Pelengkap</a>
				</li>
				<li role="presentation">
					<a href="#dbanding" class="panel-head panel-dbanding" aria-controls="dbanding" role="tab" data-toggle="tab">Data Banding</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content" style="padding: 20px; border: 1px solid #eee;">
				<div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="entry">
					<h4>FORM DATA ENTRY SURVEYOR</h4>
					<div class="table_div">
						<table class="table_border" cellpadding="0" cellspacing="0" >
							<tbody>
								<tr bgcolor="#ccc">
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
								<tr bgcolor="#ccc">
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
									<td><span>Alamat Properti</span></td>
									<td rowspan="2"><?=$input["entry_18"]?></td>
								</tr>
								<tr>
									<td><span>Nama Cabang</span></td>
									<td><?=$input["entry_19"]?></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>d/h</span></td>
									<td><input readonly="readonly" class="readonly" type="text" value="<?=$lokasi->dh_provinsi?>" style="width: 100%;height: 100%;border: 0px;padding: 5px;white-space: normal;color: #2d40ea;display: inline-block;position: relative;font-size: 12px;height: auto;"></td>
								</tr>
								<tr>
									<td><span>Jabatan</span></td>
									<td><?=$input["entry_22"]?></td>
									<td>&nbsp;</td>
									<td><span>Nama Kota / Kabupaten</span></td>
									<td><?=$input["entry_23"]?></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>d/h</span></td>
									<td><input readonly="readonly" class="readonly"  style="width: 100%;height: 100%;border: 0px;padding: 5px;white-space: normal;color: #2d40ea;display: inline-block;position: relative;font-size: 12px;height: auto;" type="text" value="<?=$lokasi->dh_kota?>"></td>
								</tr>
								<tr>
									<td><span>Nomor Penugasan</span></td>
									<td><?=$input["entry_24"]?></td>
									<td>&nbsp;</td>
									<td><span>Kecamatan</span></td>
									<td><?=$input["entry_25"]?></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>d/h</span></td>
									<td><input readonly="readonly" class="readonly" style="width: 100%;height: 100%;border: 0px;padding: 5px;white-space: normal;color: #2d40ea;display: inline-block;position: relative;font-size: 12px;height: auto;" type="text" value="<?=$lokasi->dh_kecamatan?>"></td>
								</tr>
								<tr>
									<td><span>Tanggal Penugasan</span></td>
									<td><?=$input["entry_26"]?></td>
									<td>&nbsp;</td>
									<td><span>Kelurahan / Desa</span></td>
									<td><?=$input["entry_27"]?></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td><span>d/h</span></td>
									<td><input readonly="readonly" class="readonly" style="width: 100%;height: 100%;border: 0px;padding: 5px;white-space: normal;color: #2d40ea;display: inline-block;position: relative;font-size: 12px;height: auto;" type="text" value="<?=$lokasi->dh_desa?>"></td>
								</tr>
								<tr>
									<td><span>Tujuan Penilaian</span></td>
									<td><?=$input["entry_28"]?></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
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
									<td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Uraian Properti</span></td>
									<td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Luas (m<sup>2</sup>) / Jumlah</span></td>
									<td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Nilai Pasar (Rp)</span></td>
									<td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Nilai Lukuidasi (Rp)</span></td>
								</tr>
							</tbody>
							<tbody  id="table_body_ringkasan">
							</tbody>
						</table>
					</div>
					
					
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
												<?="".$lokasi->alamat." ".(!empty($lokasi->gang) ? "Gang ".$lokasi->gang : "")." No. ".$lokasi->nomor.", RT. ".$lokasi->rt." RW. ".$lokasi->rw." Kel. ".$lokasi->nama_desa." ".(!empty($lokasi->dh_desa) ? "(d/h ".$lokasi->dh_desa.")" : "")." Kec. ".$lokasi->nama_kecamatan." ".(!empty($lokasi->dh_kecamatan) ? "(d/h ".$lokasi->dh_kecamatan.")" : "")." ".$lokasi->nama_kota." ".(!empty($lokasi->dh_kota) ? "(d/h ".$lokasi->dh_kota.")" : "").", ".$lokasi->nama_provinsi ." ".(!empty($lokasi->dh_provinsi) ? "(d/h ".$lokasi->dh_provinsi.")" : "")?>
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
										</tr>
										<tr valign="top">
											<td>Jabatan</td>
											<td align="center" width="20">:</td>
											<td class="tanah-td-jabatan"></td>
										</tr>
										<tr valign="top">
											<td>Upload Photo</td>
											<td align="center" width="20">:</td>
											<td><?=$input["tanah_32"];?></td>
										</tr>
									</table>
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
									<h4>INFORMASI LINGKUNGAN</h4>
									<div class="col-lg-6" style="padding: 0px;">
										<table class="table_border" cellpadding="0" cellspacing="0">
											<tr>
												<td width="15%"><span>Lokasi tanah obyek</span></td>
												<td><?=$input["tanah_12"];?></td>
											</tr>
											<tr>
												<td><span>Harga tanah obyek</span></td>
												<td><?=$input["tanah_13"];?></td>
											</tr>
										</table>
									</div>
									<div class="col-lg-6" style="padding: 0px">
										<table class="table_border" cellpadding="0" cellspacing="0">
											<tr>
												<td width="15%"><span>Kepadatan bangunan</span></td>
												<td><?=$input["tanah_14"];?></td>
											</tr>
											<tr>
												<td><span>Pertumbuhan bangunan</span></td>
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
												<td><span>Keamanan terhadap bencana alam</span></td>
												<td><?=$input["tanah_23"];?></td>
											</tr>
										</table>
									</div>
									<div class="col-lg-6" style="padding: 0px">
										<h4>INFORMASI KAWASAN</h4>
										<table class="table_border">
											<tr>
												<td width="25%"><span>Perumahan / pemukiman (%)</span></td>
												<td><?=$input["tanah_24"];?></td>
											</tr>
											<tr>
												<td><span>Industri / pergudangan (%)</span></td>
												<td><?=$input["tanah_25"];?></td>
											</tr>
											<tr>
												<td><span>Pertokoan / perniagaan (%)</span></td>
												<td><?=$input["tanah_26"];?></td>
											</tr>
											<tr>
												<td width="25%"><span>Perkantoran / perdagangan & jasa (%)</span></td>
												<td><?=$input["tanah_27"];?></td>
											</tr>
											<tr>
												<td><span>Taman /  penghijauan / jalur hijau (%)</span></td>
												<td><?=$input["tanah_28"];?></td>
											</tr>
											<tr>
												<td><span>Tanah kosong / tanah idle (%)</span></td>
												<td><?=$input["tanah_29"];?></td>
											</tr>
											<tr>
												<td><span>Perubahan lingkungan / tata guna<br> tanah pada masa akan datang</span></td>
												<td>
													<?=$input["tanah_30"];?><br>
													<?=$input["tanah_73"];?>
												</td>
											</tr>
											<tr>
												<td ><span>Mayoritas data hunian pada kawasan</span></td>
												<td>
													<?=$input["tanah_31"];?><br>
													<?=$input["tanah_74"];?>
												</td>
											</tr>
														
										</table>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">L O K A S I&nbsp;&nbsp;&nbsp;S I T E</h3>
								</div>
								<div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
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
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">D A T A&nbsp;&nbsp;&nbsp;L E G A L I T A S</h3>
								</div>
								<input type="hidden" id="total_data_legalitas">
								<div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
									<table id="table_data_legalitas_1" class="table_border_2" width="100%" cellpadding="0" cellspacing="0">
										<thead>
											<tr>
												<th rowspan="2">No</th>
												<th rowspan="2">Jenis Sertifikat</th>
												<th rowspan="2">Nomor Sertifikat</th>
												<th rowspan="2">Atas Nama</th>
												<th colspan="2">Tanggal Sertifikat</th>
												<th colspan="2"><?=$input["tanah_87"];?></th>
												<th rowspan="2">Luas Tanah (m<sup>2</sup>)</th>
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
												<td align="center" colspan="8"><span>TOTAL LUAS TANAH SESUAI SERTIFIKAT</span></td>
												<td><?=$input["tanah_61"];?></td>
												<td></td>
											</tr>
										</tfoot>
									</table><br> 
									<button type="button" class="btn btn-primary btn-sm btn-data-legalitas" data-type="tambah" data-id="">TAMBAH</button>
									
									<table class="table_border_2" id="" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
										<tbody>
											<td colspan="2"><span> INFORMASI DINAS TATA KOTA TENTANG RENCANA PEMBANGUNAN / PELEBARAN JALAN  :</span></td>
										</tbody>
										<tfoot>
											<tr>
												<td align="center"><span>Total luas tanah yang terpotong (rencana pembangunan / pelebaran jalan)</span></td>
												<td><?=$input["tanah_62"];?></td>
											</tr>
										</tfoot>
									</table><br>
								</div>
							</div>
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
								
							</div>
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
								<td><span>Carpot (m<sup>2</sup>)</span></td>
								<td><?=$input["sarana_1"];?></td>
								<td><?=$input["sarana_2"];?></td>
								<td><?=$input["sarana_3"];?></td>
								<td><?=$input["sarana_4"];?></td>
								<td><?=$input["sarana_5"];?></td>
								<td style="text-align: right;"><?=$input["sarana_6"];?></td>
							</tr>
							<tr>
								<td><span>Perkerasan (m<sup>2</sup>)</span></td>
								<td><?=$input["sarana_7"];?></td>
								<td><?=$input["sarana_8"];?></td>
								<td><?=$input["sarana_9"];?></td>
								<td><?=$input["sarana_10"];?></td>
								<td><?=$input["sarana_11"];?></td>
								<td><?=$input["sarana_12"];?></td>
							</tr>
							<tr>
								<td><span>Pintu Pagar (m<sup>2</sup>)</span></td>
								<td><?=$input["sarana_13"];?></td>
								<td><?=$input["sarana_14"];?></td>
								<td><?=$input["sarana_15"];?></td>
								<td><?=$input["sarana_16"];?></td>
								<td><?=$input["sarana_17"];?></td>
								<td><?=$input["sarana_18"];?></td>
							</tr>
							<tr>
								<td><span>Pagar Halaman (m<sup>2</sup>)</span></td>
								<td><?=$input["sarana_19"];?></td>
								<td><?=$input["sarana_20"];?></td>
								<td><?=$input["sarana_21"];?></td>
								<td><?=$input["sarana_22"];?></td>
								<td><?=$input["sarana_23"];?></td>
								<td><?=$input["sarana_24"];?></td>
							</tr>
							<tr>
								<td><span>Gapura (m)</span></td>
								<td><?=$input["sarana_25"];?></td>
								<td><?=$input["sarana_26"];?></td>
								<td><?=$input["sarana_27"];?></td>
								<td><?=$input["sarana_28"];?></td>
								<td><?=$input["sarana_29"];?></td>
								<td><?=$input["sarana_30"];?></td>
							</tr>
							<tr>
								<td><span>Taman / Lanscaping</span></td>
								<td><?=$input["sarana_31"];?></td>
								<td><?=$input["sarana_32"];?></td>
								<td><?=$input["sarana_33"];?></td>
								<td><?=$input["sarana_34"];?></td>
								<td><?=$input["sarana_35"];?></td>
								<td><?=$input["sarana_36"];?></td>
							</tr>
							<tr style="font-weight: bold;">
								<td align="right" colspan="4" style="background-color: #eee;" colspan="4"><span>TOTAL SARANA PELENGKAP</span></td>
								<td><?=$input["sarana_37"];?></td>
								<td style="background-color: #eee;"></td>
								<td><?=$input["sarana_38"];?></td>
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
								<td><?=$input["sarana_39"];?></td>
								<td><?=$input["sarana_40"];?></td>
								<td><?=$input["sarana_41"];?></td>
								<td><?=$input["sarana_42"];?></td>
								<td><?=$input["sarana_43"];?></td>
								<td><?=$input["sarana_44"];?></td>
							</tr>
							<tr>
								<td><span>Perkerasan (m<sup>2</sup>)</span></td>
								<td><?=$input["sarana_45"];?></td>
								<td><?=$input["sarana_46"];?></td>
								<td><?=$input["sarana_47"];?></td>
								<td><?=$input["sarana_48"];?></td>
								<td><?=$input["sarana_49"];?></td>
								<td><?=$input["sarana_50"];?></td>
							</tr>
							<tr>
								<td><span>Pintu Pagar (m<sup>2</sup>)</span></td>
								<td><?=$input["sarana_51"];?></td>
								<td><?=$input["sarana_52"];?></td>
								<td><?=$input["sarana_53"];?></td>
								<td><?=$input["sarana_54"];?></td>
								<td><?=$input["sarana_55"];?></td>
								<td><?=$input["sarana_56"];?></td>
							</tr>
							<tr>
								<td><span>Pagar Halaman (m<sup>2</sup>)</span></td>
								<td><?=$input["sarana_57"];?></td>
								<td><?=$input["sarana_58"];?></td>
								<td><?=$input["sarana_59"];?></td>
								<td><?=$input["sarana_60"];?></td>
								<td><?=$input["sarana_61"];?></td>
								<td><?=$input["sarana_62"];?></td>
							</tr>
							<tr>
								<td><span>Gapura (m)</span></td>
								<td><?=$input["sarana_63"];?></td>
								<td><?=$input["sarana_64"];?></td>
								<td><?=$input["sarana_65"];?></td>
								<td><?=$input["sarana_66"];?></td>
								<td><?=$input["sarana_67"];?></td>
								<td><?=$input["sarana_68"];?></td>
							</tr>
							<tr>
								<td><span>Taman / Lanscaping</span></td>
								<td><?=$input["sarana_69"];?></td>
								<td><?=$input["sarana_70"];?></td>
								<td><?=$input["sarana_71"];?></td>
								<td><?=$input["sarana_72"];?></td>
								<td><?=$input["sarana_73"];?></td>
								<td><?=$input["sarana_74"];?></td>
							</tr>
							<tr style="font-weight: bold;">
								<td align="right" colspan="4" style="background-color: #eee;"><span>TOTAL SARANA PELENGKAP</span></td>
								<td ><?=$input["sarana_75"];?></td>
								<td style="background-color: #eee;"></td>
								<td><?=$input["sarana_76"];?></td>
							</tr>
							<tr style="font-weight: bold;">
								<td align="right" colspan="4" style="background-color: #1680e9; color: #fff;"><span>SISA TOTAL SARANA PELENGKAP</span></td>
								<td><?=$input["sarana_77"];?></td>
								<td style="background-color: #eee;"></td>
								<td><?=$input["sarana_78"];?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="dbanding">
					<!--<h4>Data Banding</h4>-->
					
					<div id="table_pembanding"></div>
					<!--<button type="button" class="btn btn-sm btn-primary btn-tambah-pembanding" data-type="tambah" data-id="">TAMBAH PEMBANDING</button><br><br>-->
					<table id="table_data_legalitas_2" class="table_border_2" width="100%" cellpadding="0" cellspacing="0">
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
					</table><br>

					<table class="table_border_2" width="100%" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td style="background-color: #eee;"><span>Indikasi Nilai Tanah Setelah Pembobotan ( / m<sup>2</sup> )</span></td>
								<td><?=$input["pembanding_47"];?></td>
							</tr>
							<tr>
								<td style="background-color: #eee;"><span>P E M B U L A T A N</span></td>
								<td><?=$input["pembanding_48"];?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>


			<div class="row">
				
				<div class="col-md-12">
					<div class="form-group text-right" style="padding: 15px;">
						<button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>
						<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
					</div>
				</div>
				<div class="col-md-12">
					<label><a target="_blank" href="<?=base_url()?>printpdf/laporan_ringkas/<?=base64_encode($pekerjaan->id)?>/<?=base64_encode($lokasi->id)?>" target="_blank">LAPORAN RINGKAS</a></label><br/>
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
<script src="<?=base_url()?>asset/js/form_1.js"></script>


