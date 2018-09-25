<style>p{margin-bottom: 0px; margin-top: 0px}</style>
<!--<pre><?php print_r($dokumen_penawaran); ?></pre>-->

<p>No. <?=$dokumen_penawaran->no_penawaran?></p>
<p><?=$dokumen_penawaran->kota?>, <?=date("d F Y", strtotime($dokumen_penawaran->tanggal))?></p>
<p>&nbsp;</p>
<p>Kepada Yang Terhormat</p>
<p><?=strtoupper($pekerjaan->nama_klien)?></p>
<p><?=$klien->alamat?></p>
<p><?=$klien->kota?>, <?=$klien->provinsi?></p>
<p>&nbsp;</p>
<p>Up. <?=$dokumen_penawaran->up?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center"><h3><b>Perihal : Surat Penawaran Pekerjaan Penilaian Properti/Aset Tetap</b></h3></div>
<p>&nbsp;</p>
<p>Sehubungan dengan informasi yang kami terima dari <?=$debitur->nama?>, Tbk yang  berdomisili <?=$dokumen_penawaran->domisili?> dengan C.P <?=$dokumen_penawaran->kontak?> via <?=$dokumen_penawaran->komunikasi_via?> tanggal <?=date("d F Y", strtotime($dokumen_penawaran->tanggal_komunikasi))?> tentang kebutuhan Manajemen <?=strtoupper($pekerjaan->nama_klien)?> untuk melakukan penilaian properti/aset tetap, maka bersama ini kami sampaikan perihal tersebut di atas dengan persyaratan/ruang lingkup penugasan, sebagai berikut :</p>
<p>&nbsp;</p>
<ol>
	<li>
		<b>STATUS PENILAI</b>
		<p>&nbsp;</p>
		<p>Kami adalah Penilai Publik (Penilai Independent) yang bernaung di bawah Kantor Jasa Penilai Publik ZUCHRI & REKAN (KJPP ZDR) dengan ijin usaha No. 83/KM.1/2010, yang akan memberikan opini penilaian objektip dan tidak memihak. Dalam pelaksanaan penilaian ini, kami (beserta seluruh karyawan KJPP ZDR) tidak memiliki Benturan kepentingan dengan subjek dan atau objek penilaian, serta kami memiliki kompetensi untuk melaksanakan pekerjaan ini sesuai ketentuan yang berlaku (KEPI dan SPI serta Peraturan Perundang-undangan terkait lainnya).</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>PEMBERI TUGAS DAN PENGGUNA LAPORAN</b>
		<p>&nbsp;</p>
		<ul>
			<li>Pemberi Tugas : <b><?=strtoupper($pekerjaan->nama_klien)?></b> yang berdomisili di <?=$klien->kota?>.</li>
			<li>Laporan	:	Manajemen Pemberi Tugas.</li>
		</ul>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>MAKSUD DAN TUJUAN PENILAIAN</b>
		<p>&nbsp;</p>
		<p>Untuk memberikan pendapat/opini nilai properti/asset yang akan digunakan untuk tujuan "<?=$dokumen_penawaran->tujuan_penilaian?>".</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>OBJEK PENILAIAN DAN LINGKUP PENUGASAN</b>
		<?php
			$i = 1;
			foreach ($data_lokasi as $item_lokasi)
			{
		?>
		<p>&nbsp;</p>
		<p><b>LOKASI PROPERTI <?=$i?></b></p>
		<p>&nbsp;</p>
		
		
		<ul>
			<li>Properti/Aset Tetap :	1-<?=$item_lokasi->nama_jenis_objek?> <?=$item_lokasi->jenis_sertifikat?> No. <?=$item_lokasi->no_sertifikat?> seluas <?=$item_lokasi->luas_tanah?> m<sup>2</sup>, beserta pengembangan di atasnya berupa <?=$item_lokasi->pengembangan?>. </li>
			<li>Pemegang Hak	:	<?=$item_lokasi->pemegang_hak?></li>
			<li>Lokasi Properti	:	<?="".$item_lokasi->alamat." ".(!empty($item_lokasi->gang) ? "Gang ".$item_lokasi->gang : "")." No. ".$item_lokasi->nomor.", RT. ".$item_lokasi->rt." RW. ".$item_lokasi->rw." Kel. ".$item_lokasi->nama_desa." ".(!empty($item_lokasi->dh_desa) ? "(d/h ".$item_lokasi->dh_desa.")" : "")." Kec. ".$item_lokasi->nama_kecamatan." ".(!empty($item_lokasi->dh_kecamatan) ? "(d/h ".$item_lokasi->dh_kecamatan.")" : "")." ".$item_lokasi->nama_kota." ".(!empty($item_lokasi->dh_kota) ? "(d/h ".$item_lokasi->dh_kota.")" : "").", ".$item_lokasi->nama_provinsi ." ".(!empty($item_lokasi->dh_provinsi) ? "(d/h ".$item_lokasi->dh_provinsi.")" : "")?></li>
			<li>Bentuk kepemilikan	:	Properti yang dinilai adalah kepemilikan <?=$item_lokasi->kepemilikan?>.</li>
			<li>Lingkup penugasan :
				<ol>
					<li>Identifikasi syarat penugasan (properti dan data terkait).</li>
				<li>Analisis pendahuluan dan pengumpulan data awal properti.</li>
				<li>Proses Inspeksi lapangan, berupa; pengumpulan dan verifikasi data fisik properti, lingkungan serta pasar properti.</li>
				<li>Penerapan Pendekatan Penilaian.</li>
				<li>Rekonsiliasi indikasi nilai bila digunakan lebih dari satu pendekatan dan opini nilai akhir.</li>
				<li>Pelaporan/Penulisan Laporan Penilaian.</li>
				<li>Waktu penyelesaian 7 (tujuh) hari kerja, setelah survey dan data- data yang diperlukan dipenuhi oleh Pemberi Tugas.</li>
				</ol>
			</li>
		</ul>
		<p>&nbsp;</p>
		<?php
				$i++;
			}
		?>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>DASAR NILAI DAN PENDEKATAN PENILAIAN</b>
		<p>&nbsp;</p>
		
		<ul>
			<li>Dasar nilai yang digunakan dalam penilaian ini, yaitu Nilai Pasar yang menurut SPI Edisi VI Tahun 2015 didefinisikan,  sebagai berikut : 
			<p><i>"estimasi sejumlah uang pada tanggal penilaian, yang dapat diperoleh dari hasil penukaran suatu aset atau liabilitas pada tanggal penilaian, antara pembeli yang berminat membeli dengan penjual yang berminat menjual, dalam suatu transaksi bebas ikatan, yang pemasarannya dilakukan secara layak, dimana kedua pihak masing-masing bertindak atas dasar pemahaman yang dimilikinya, kehati-hatian dan tanpa paksaan (SPI 101-2013; klausul 3.1)".</i></p>
			</li>
			<li>Pendekatan penilaian yang digunakan yaitu; "Pendekatan Pasar untuk menilai aset Tanah dengan metode Perbandingan langsung data transaksi pasar", sedangkan Bangunan dan Sarana Pelengkap menggunakan Pendekatan biaya dengan metode Biaya Pengganti Baru Terdepresiasi".</li>
		</ul>
		<p>&nbsp;</p>
	</li>
	<li><b>TANGGAL INSPEKSI, PENILAIAN DAN PELAPORAN</b>
		<p>&nbsp;</p>
		<ul>
			<li>Tanggal Inspeksi	:	Sesuai kesepakatan yang ditetapkan oleh Pemberi Tugas.</li>
			<li>Tanggal Penilaian	:	Sama dengan tanggal terakhir inspeksi lapangan.</li>
			<li>Tanggal Laporan	:	Sesuai tanggal berakhirnya masa kerja penugasan.</li>
		</ul>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>MATA UANG YANG DIGUNAKAN</b>
		<p>&nbsp;</p>
		<p>Opini Nilai Properti menggunakan mata uang Rupiah (Rp.-) dan apabila dicantumkan dalam mata uang asing, maka akan dilakukan konversi sesuai kurs konversi Bank Indonesia (BI) per tanggal penilaian.</p>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>TINGKAT KEDALAMAN INVESTIGASI</b>
		<p>&nbsp;</p>
		<ul>
			<li>Inspeksi terhadap properti dilakukan dengan akses memadai (tanpa hambatan) dan pengumpulan, penelaahan/verifikasi serta analisis data (properti dan pasar properti) dilakukan dengan waktu yang memadai.</li>
			<li>Adanya batas atau pembatasan dalam melakukan inpeksi, menelaah, penghitungan dan analisis akan mempengaruhi tingkat kedalaman investigasi yang dapat kami lakukan, dan akan kami nyatakan secara terperinci dalam laporan penilaian.</li>
			<li>Dalam pelaksanaan inspeksi lapangan, Surveyor (Tim Inspeksi) kami harus didampingi oleh counterpart yang mengetahui (aspek teknis dan hukum) dari properti yang dinilai, dan Surat Tugas kami (yang dapat berlaku sebagai dokumen Berita Acara Hasil Inspeksi) harus ditandatangani bersama antara Surveyor dengan counterpart lapangan.</li>
		</ul>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>SIFAT DAN SUMBER INFORMASI YANG DAPAT DIANDALKAN</b>
		<p>&nbsp;</p>
		<p>Data terkait properti yang bersumber dari lembaga resmi pemerintah yang digunakan sebagai referensi/bahan analisis (tanpa verifikasi) dalam proses penilaian ini (seperti; Jurnal PU, BI, BPS, REI, PHRI, BTB-MAPPI dan lembaga riset resmi lainnya) telah dimengerti dan disetujui oleh Pemberi Tugas. </p>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>LAPORAN PENILAIAN</b>
		<p>&nbsp;</p>
		<p>Laporan penilaian ditulis dalam Bahasa Indonesia berupa "Laporan Lengkap (Narrative Report), sesuai SPI 105 (Standar Umum: Pelaporan Penilaian). Laporan ini ditujukan kepada Pemberi Tugas serta diberikan sebanyak 2 (dua) eksemplar asli.</p>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>PERSYARATAN ATAS PERSETUJUAN UNTUK PUBLIKASI</b>
		<p>&nbsp;</p>
		<p>Laporan penilaian ini beserta seluruh lampirannya adalah dokumen rahasia yang hanya ditujukan untuk pengguna dan dengan tujuan penilaian sebagaimana tercantum pada butir 2 dan 3. Setiap publikasi terhadap keseluruhan atau sebagian dari laporan, atau referensi yang dipublikasikan, termasuk referensi mengenai laporan keuangan perusahaan, dan/atau laporan direksi/pimpinan perusahaan, dan/atau pernyataan atau kajian lainnya atau pernyataan/edaran apapun dari Perusahaan (Pemberi Tugas), harus mendapat persetujuan (ijin) tertulis dari kami/Penilai (KJPP ZDR). </p>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>SYARAT PEMBATAS</b>
		<p>&nbsp;</p>
		<ul>
			<li>Kami/Penilai tidak memiliki tanggung jawab (dalam bentuk apapun juga) kepada pihak Ketiga, selama tidak menyimpang dari Peraturan dan ketentuan hukum yang berlaku.</li>
			<li>Kami/Penilai tidak bertanggung jawab atas kerugian serta permasalahan hukum yang dapat/akan terjadi ketentuan pada butir 11 dilanggar.</li>
			<li>Sebelum ada kesepakatan tentang kompensasi biaya (atas kehilangan waktu kerja/Man days), kami/Penilai tidak berkewajiban menjadi saksi (memberikan kesaksian) dalam suatu permasalahan hukum yang timbul dari penggunaan laporan ini.</li>
		</ul>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>SURAT REPRESENTASI DARI PEMBERI TUGAS</b>
		<p>&nbsp;</p>
		<p>Pemberi Tugas harus membuat pernyataan tertulis berupa "surat representasi" mengenai; sifat informasi; kebenaran/validitas;, keaslian/absah dan keakuratan seluruh data, informasi/ keterangan tentang objek penilaian yang diberikan kepada kami. </p>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>ASUMSI DAN ASUMSI KHUSUS PENILAIAN</b>
		<p>&nbsp;</p>
		<ul>
			<li>Properti (objek penilaian) dilengkapi dokumen kepemilikan yang syah, bebas dari jaminan/tuntutan atau hambatan lainnya dan dapat dialihkan.</li>
			<li>Semua data/dokumen dan informasi/keterangan yang diberikan Pemberi Tugas; sah/ valid, benar dan akurat sesuai dengan fakta fisik dan hukumnya.</li>
			<li>Penilai diberi akses yang memadai untuk melakukan inspeksi lapangan.</li>
			<li>Keseluruhan properti dapat beroperasi secara normal, wajar, dalam kondisi yang layak dan on-going concern serta tidak menimbulkan dampak/pencemaran lingkungan.</li>
			<li>Pemberi Tugas menyetujui, dilakukannya inspeksi dari luar objek penilaian terhadap properti yang memiliki hambatan fisik dan hukum untuk dapat dilakukan pemeriksaan secara memadai. Informasi tentang properti diberikan secara lisan dan/atau tertulis oleh Pemberi Tugas dan/atu counterpart yang ditunjuknya.</li>
			<li>Jika setelah inspeksi lapangan ditemukan beberapa kondisi yang memerlukan asumsi khusus, maka asumsi khusus tersebut akan dinyatakan dalam laporan Penilaian.</li>
		</ul>
		<p>&nbsp;</p>
	</li>
	<li>
		<b>BIAYA JASA PENILAIAN (PROFESSIONAL FEE)</b>
		<p>&nbsp;</p>
		<p>Besarnya biaya jasa pelaksanaan penilaian ini didasarkan atas ruang lingkup pekerjaan, mencakup; jumlah tenaga/pekerja yang terlibat, waktu penyelesaian dan biaya lainnya yang dibutuhkan untuk menyelesaikan keseluruhan pekerjaan. Atas dasar hal tersebut, kami mengajukan biaya jasa penilaian, sebagai berikut :</p>
		<p>&nbsp;</p>
		
		<table cellpadding="0" cellspacing="0" style="border-left: 1px solid #999; border-top: 1px solid #999;">
			<thead>
				<tr style="background-color: #ff0000; color: #fff;">
					<th style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;">UNSUR BIAYA</th>
					<th style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;">JUMLAH</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;">Biaya Jasa Penilaian Properti (Professional Fee) </td>
					<td style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;" align="right">Rp.  <?=number_format($dokumen_penawaran->biaya)?></td>
				</tr>
			</tbody>
			<thead>
				<tr>
					<th style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;">TOTAL IMBALAN JASA</th>
					<th style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;">Rp.  <?=number_format($dokumen_penawaran->biaya)?></th>
				</tr>
			</thead>
		</table>
		<p>&nbsp;</p>
		<b>Syarat & Kondisi Penawaran:</b>
		<p>&nbsp;</p>
		<ul>
			<li>Fee belum termasuk  Pajak PPN 10%.</li>
			<li>Fee sudah termasuk transportasi pesawat udara, transportasi lokal dan akomodasi yang ditanggung oleh pihak pemberi pekerjaan. </li>
			<li>Apabila pihak pemberi kerja memutuskan pekerjaan sepihak, sedangkan pekerjaan telah selesai dikerjakan maka pemberi kerja tetap harus membayar biaya jasa penilaian sesuai dengan yang telah disepakati.</li>
			<li>Kami akan mengenakan denda sebesar 0,2 % untuk setiap hari keterlambatan, terhitung 5 hari sejak penyampaian tagihan.</li>
			<li>Apabila pekerjaan dihentikan oleh Pemberi Tugas sebelum dikeluarkannya laporan final maka pemberi tugas berkewajiban menyelesaikan pembiayaan hingga termin yang telah dilaksanakan. Laporan akan difinalisasikan paling lambat 1 (satu) minggu setelah minggu setelah penyampaian draft laporan, kecuali terdapat kesepakatan lainnya antara kedua belah pihak.</li>
		</ul>
		
		<p>&nbsp;</p>
		<b>Termin pembayaran :</b>
		<p>&nbsp;</p>
		<ul>
			<li>Termin 1 : <?=$lembar_kendali->termin_pembayaran_1?> %</li>
			<li>Termin 2 : <?=$lembar_kendali->termin_pembayaran_2?> %</li>
			<li>Termin 3 : <?=$lembar_kendali->termin_pembayaran_3?> %</li>
			<li>Termin 4 : <?=$lembar_kendali->termin_pembayaran_4?> %</li>
			<li>Termin 5 : <?=$lembar_kendali->termin_pembayaran_5?> %</li>
		</ul>
		
	</li>
</ol>
<p>Demikian Surat Penawaran Pekerjaan Penilaian ini kami sampaikan dan berlaku juga sebagai dokumen Kontrak Kerja antara <?=strtoupper($pekerjaan->nama_klien)?> dengan KJPP ZUCHRI & REKAN. Atas perhatian dan kerja sama yang baik, kami mengucapkan terima kasih.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table style="width: 100%">
	<tr>
		<td width="50%" valign="top">
			KJPP ZUCHRI & REKAN
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p style="text-decoration: underline"><?=$user_approve->nama?></p>
			<p><?=$user_approve->jabatan?></p>
							
			<p>MAPPI (Cert.)	: <?=$user_approve->no_mappi?></p>
			<p>Ijin Penilai Publik	: <?=$user_approve->no_ijinpp?></p>
			<p>Kualifikasi  Penilai	: <?=$user_approve->kualifikasi?></p>

		</td>
		<td width="50%" valign="top">
			<?=strtoupper($pekerjaan->nama_klien)?>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p style="text-decoration: underline"><?=$dokumen_penawaran->up?></p>
			<p>Jabatan : .................................</p>
			<p>Tgl persetujuan	: ...........................</p>
			<p>No NPWP	: ...........................</p>
			<p>Alamat NPWP	: ...........................</p>
		</td>
	</tr>
</table>