<style type="text/css">
	.page
	{
		/*border: 1px dotted #ccc;*/
		padding: 10px;
		width: 620px;
		font-size: 10px;
	}
	
	.page-heading{
		text-align: center;
		padding-bottom: 10px;
		border-bottom: 1px solid #ccc;
		
	}
	
	.title{
		font-size: 14px;
		font-weight: bold;
		text-align: center;
	}
	
	.title-sub{
		margin-top: 5px;
		font-size: 12px;
		font-weight: normal;
		text-align: center;
	}
	
	.title-date{
		margin-top: 10px;
		font-size: 12px;
		font-weight: normal;
		text-align: right;
	}
	
	.page-content{
		margin-top: 20px;
	}
	
	table{
		font-size: 10px;
	}
</style>

<body>
	<div class="page">
		<table style="width: 620px; border-bottom: 1px dotted #ccc; padding-bottom: 5px;">
			<tr>
				<td class="title" style="width: 620px"><u>SURAT TUGAS INSPEKSI</u></td>
			</tr>
			<tr>
				<td class="title-sub">No. <?=$pekerjaan->no_surat_tugas?></td>
			</tr>
			<tr>
				<td class="title-date">Tanggal  :  <?=$this->spmlib->indonesian_date(date("d-m-Y"), "d F Y", "")?></td>
			</tr>
		</table>
		
		<div class="page-content">
			<div style="font-weight: bold; font-size: 11px;"><b>PEMBERI TUGAS</b></div>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td style="width: 200px;">Bank / Perusahaan / Perorangan</td>
					<td style="width: 30px; text-align: center;">:</td>
					<td><?=$debitur->nama?></td>
				</tr>
				<tr>
					<td>Alamat Pemberi Tugas</td>
					<td style="text-align: center;">:</td>
					<td>-</td>
				</tr>
				<tr>
					<td>No. Telp. / HP & Fax</td>
					<td style="text-align: center;">:</td>
					<td>-</td>
				</tr>
				<tr>
					<td>Nama Marketing</td>
					<td style="text-align: center;">:</td>
					<td>-</td>
				</tr>
				<tr>
					<td>Tanggal Penugasan</td>
					<td style="text-align: center;">:</td>
					<td><?=$this->spmlib->indonesian_date($lokasi->tanggal_mulai, "d F Y", "")?></td>
				</tr>
				<tr>
					<td>Jam Penugasan</td>
					<td style="text-align: center;">:</td>
					<td><?=$lokasi->jam?></td>
				</tr>
				
			</table>

			
			
			<div style="font-weight: bold; font-size: 11px; margin-top: 10px;"><b>LOKASI PROPERTI</b></div>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td style="width: 200px;">Jenis Properti</td>
					<td style="width: 30px; text-align: center;">:</td>
					<td><?=$lokasi->nama_jenis_objek?></td>
				</tr>
				<tr>
					<td>Alamat Properti</td>
					<td style="width: 30px; text-align: center;">:</td>
					<td>
						<?=$lokasi->alamat." ".(!empty($lokasi->gang) ? "Gang ".$lokasi->gang : "")." No. ".$lokasi->nomor.", RT. ".$lokasi->rt." RW. ".$lokasi->rw?>
					</td>
				</tr>
				<tr>
					<td>Kelurahan / Desa</td>
					<td style="text-align: center;">:</td>
					<td>
						<?=$lokasi->nama_desa?> <?=(!empty($lokasi->dh_desa) ? "(d/h ".$lokasi->dh_desa.")" : "")?>
					</td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td style="text-align: center;">:</td>
					<td>
						<?=$lokasi->nama_kecamatan?>  <?=(!empty($lokasi->dh_kecamatan) ? "(d/h ".$lokasi->dh_kecamatan.")" : "")?>
					</td>
				</tr>
				<tr>
					<td>Kodya / Kabupaten</td>
					<td style="text-align: center;">:</td>
					<td>
						<?=$lokasi->nama_kota?> <?=(!empty($lokasi->dh_kota) ? "(d/h ".$lokasi->dh_kota.")" : "")?>
					</td>
				</tr>
				<tr>
					<td>Propinsi</td>
					<td style="text-align: center;">:</td>
					<td>
						<?=$lokasi->nama_provinsi?> ." <?=(!empty($lokasi->dh_provinsi) ? "(d/h ".$lokasi->dh_provinsi.")" : "")?>
					</td>
				</tr>
				
			</table>
			
			<div style="font-weight: bold; font-size: 11px; margin-top: 10px;"><b>DATA INSPEKSI</b></div>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td style="width: 200px;">Contact Person di lokasi properti</td>
					<td style="width: 30px; text-align: center;">:</td>
					<td><?=$lokasi->pemegang_hak?></td>
				</tr>
				<tr>
					<td>No. Telp. / HP</td>
					<td style="width: 30px; text-align: center;">:</td>
					<td><?=(array_key_exists(8 ,$data_lokasi) ? $data_lokasi[8][null] : "-")?></td>
				</tr>
				<tr>
					<td>Penilai</td>
					<td style="text-align: center;">:</td>
					<td><?=$pekerjaan->nama_penilai?></td>
				</tr>
				<tr>
					<td>Tanggal inspeksi</td>
					<td style="text-align: center;">:</td>
					<?php if (!($lokasi->tanggal) ) { ?>
					<td>-</td>
					<?php }else{ ?>
					<td><?=$this->spmlib->indonesian_date(date("d F Y", strtotime($lokasi->tanggal)), "d F Y", "")?></td>
					<?php } ?>
				</tr>
				<tr>
					<td>Inspeksi dilaksanakan pada jam</td>
					<td style="text-align: center;">:</td>
					<td><?=$lokasi->jam?></td>
				</tr>
				<tr>
					<td>Transportasi ke lokasi dengan</td>
					<td style="text-align: center;">:</td>
					<td><?=$lokasi->nama_transportasi?></td>
				</tr>
			</table>
			
			<div style="font-weight: bold; font-size: 11px; margin-top: 10px;"><b>DATA PROPERTI</b></div>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td style="width: 200px;">Luas Tanah</td>
					<td style="width: 30px; text-align: center;">:</td>
					<td><?=$lokasi->luas_tanah?> m<sup>2</sup></td>
				</tr>
				<tr>
					<td>Luas Bangunan</td>
					<td style="width: 30px; text-align: center;">:</td>
					<td><?=$lokasi->luas_bangunan?> m<sup>2</sup></td>
				</tr>
				<tr>
					<td>Mesin-mesin</td>
					<td style="text-align: center;">:</td>
					<td>Tidak Ada</td>
				</tr>
				<tr>
					<td>Legalitas Kepemilikan (Sertifikasi)</td>
					<td style="text-align: center;">:</td>
					<td><?=$lokasi->jenis_sertifikat?> No. <?=$lokasi->no_sertifikat?></td>
				</tr>
				<tr>
					<td>Nama dalam Sertifikat</td>
					<td style="text-align: center;">:</td>
					<td><?=$lokasi->pemegang_hak?></td>
				</tr>
				<tr>
					<td>Bukti Setoran Pajak (PBB)</td>
					<td style="text-align: center;">:</td>
					<td>Tidak Ada</td>
				</tr>
				<tr>
					<td>Izin Mendirikan Bangunan (IMB)</td>
					<td style="text-align: center;">:</td>
					<td><?=(array_key_exists(640 ,$data_lokasi) ? (array_key_exists("Bangunan_1",  $data_lokasi[640]) ? $data_lokasi[640]["Bangunan_1"] : "-") : "-")?></td>
				</tr>
				
			</table>
			
			<div style="font-weight: bold; font-size: 11px; margin-top: 10px;"><b>BUKU LAPORAN</b></div>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td style="width: 200px;">Jenis Laporan</td>
					<td style="width: 30px; text-align: center;">:</td>
					<td><?=$pekerjaan->jenis_laporan?></td>
				</tr>
				<tr>
					<td>Laporan Ditujukan Ke</td>
					<td style="text-align: center;">:</td>
					<td><?=$klien->debitur?></td>
				</tr>
				<tr>
					<td>Tujuan Penilaian</td>
					<td style="text-align: center;">:</td>
					<td><?=$pt->tujuan_penilaian?></td>
				</tr>
				<tr>
					<td>Jenis Nilai yang digunakan</td>
					<td style="text-align: center;">:</td>
					<td>Nilai Pasar dan Nilai Likuidasi</td>
				</tr>
				<tr>
					<td>Penandatanganan Laporan oleh</td>
					<td style="text-align: center;">:</td>
					<td><?=$penanda->nama?></td>
				</tr>
				
			</table>
			
			<div style="font-weight: bold; font-size: 11px; margin-top: 10px;"><b>TARGET PENYELESAIAN LAPORAN</b></div>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td style="width: 200px;">Batas waktu pekerjaan</td>
					<td style="width: 30px; text-align: center;">:</td>
					<td>7 Hari Kerja (setelah survey & data lengkap)</td>
				</tr>
				<tr>
					<td>Target laporan diserahkan pada tanggal</td>
					<td style="text-align: center;">:</td>
					<td></td>
				</tr>
				
			</table>
			
			<div style="margin-top: 40px;"> <?=date("d F Y")?></div>
			
		</div>
		
		<table style="width: 620px;" cellpadding="0" cellspacing="0">
			<tr>
				<td style="width: 200px; vertical-align: top;">
					Ditugaskan oleh,<br /><br /><br /><br /><br /><br />
					
					<b><?=$lokasi->nama_user?></b><br />
					Administrasi
				</td>
				<td style="width: 200px; vertical-align: top;">
					Nama  Tim Inspeksi,<br /><br /><br /><br /><br /><br />
					
					<b><?=$surveyor->nama?></b><br />
					Tim Inspeksi
				</td>
				<td style="width: 200px; vertical-align: top;">
					Yang ditemui,<br /><br /><br /><br /><br /><br />
					
					<table>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<td>................</td>
						</tr>
						<tr>
							<td>Tgl. Inspeksi</td>
							<td>:</td>
							<td>................</td>
						</tr>
						<tr>
							<td>Bidang Usaha</td>
							<td>:</td>
							<td>................</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
	</div>
</body>