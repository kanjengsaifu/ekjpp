<!doctype html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/laporan_ringkas.css?v=<?php echo time() ?>">
</head>
<body>

<div class="page-container">
	<div class="page">
		<div class="box_title">
			<div class="title">LAPORAN PENILAIAN PROPERTI</div>
			<div class="subtitle"><?php echo $kertas_kerja->debitur; ?></div>
		</div>
		<div class="title-memo">Laporan ini terdiri dari dari 12 (dua belas) lembar yang tidak terpisahkan.</div>
		<br />
		<strong><span style="font-size: 11pt;">I. SURAT PERINTAH KERJA (SPK) PENILAIAN AGUNAN</span></strong>
		<br /><br />
		
		<div class="panel">
			<div class="panel-content" style="padding-bottom: 5px; padding-top: 5px;">
				<table class="default_table" border="0" >
					<tr>
						<td>Tanggal Laporan</td>
						<td>:</td>
						<td><?php echo format_datetime($kertas_kerja->tanggal_laporan) ?></td>
						<td>No. Laporan</td>
						<td>:</td>
						<td><?php echo $kertas_kerja->nomor_laporan; ?></td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="panel">
			<div class="panel-content" style="padding-bottom: 5px; padding-top: 5px;">
			</div>
		</div>

		<div class="panel">
			<div class="panel-content">
				<table class="default_table">
					<colgroup>
						<col style="width: 25%">
					</colgroup>
					<tr>
						<td>Perusahaan Jasa Penilai</td>
						<td width="20" align="center">:</td>
						<td>
							<span style="color: purple; font-weight: bold">
								KJPP ASNO MINANDA, USEP PRAWIRA DAN REKAN
							</span>
						</td>
					</tr>
					<tr>
						<td valign="top">
							Alamat
						</td>
						<td width="20" align="center">
							:
						</td>
						<td valign="top">
							Sentra Arteri Mas Building, Jl. Sultan Iskandar Muda Kav. 10-V (Arteri Pondok Indah)
						</td>
					</tr>
					<tr>
						<td>
							Penanggung Jawab
						</td>
						<td width="20" align="center">
							:
						</td>
						<td>
							<?php echo $penanda_tangan_laporan; ?>
						</td>
					</tr>
					<tr>
						<td>
							Penilai
						</td>
						<td width="20" align="center">
							:
						</td>
						<td>
							<?php echo $pekerjaan->nama_penilai; ?>
						</td>
					</tr>
					<tr>
						<td>
							Surveyor
						</td>
						<td width="20" align="center">
							:
						</td>
						<td>
							<?php echo $kertas_kerja->nama_surveyor; ?>
						</td>
					</tr>
					<tr>
						<td>Status Penilai</td>
						<td width="20" align="center">:</td>
						<td>Penilai Publik yang tidak memiliki keterlibatan material atau benturan kepentingan (baik aktual maupun potensial) dengan objek penilaian, serta tidak ada bantuan tenaga ahli dari manapun dalam penilaian ini. </td>
					</tr>
					<tr>
						<td colspan="3" style="padding: 0 0 0 0;"></td>
					</tr>
					<tr>
						<td colspan="3">
							Dengan ini di tugaskan untuk melakukan penilaian (appraisal) atas aset / properti, sebagai berikut:
						</td>
					</tr>
					<tr>
						<td>
							Jenis Obyek / Tipe Properti
						</td>
						<td width="20" align="center">
							:
						</td>
						<td><strong><?php echo $lokasi->jenis_objek ?></strong></td>
					</tr>
					<tr>
						<td valign="top">
							Alamat Obyek
						</td>
						<td width="20" align="center">
							:
						</td>
						<td valign="top"><?php echo $lokasi->alamat; ?></td>
					</tr>
					<tr>
						<td valign="top">Pemilik / Pemegang Hak</td>
						<td width="20" align="center">:</td>
						<td valign="top"><strong><?php echo $lokasi->pemegang_hak; ?></strong></td>
					</tr>
					<tr>
						<td valign="top">Bentuk Kepemilikan</td>
						<td width="20" align="center">:</td>
						<td valign="top"><?php echo $lokasi->kepemilikan; ?></td>
					</tr>
					<tr>
						<td style="width: 20%">Maksud & Tujuan Penilaian</td>
						<td width="20" align="center">:</td>
						<td>Memberikan opini Nilai Pasar properti, yang akan digunakan untuk keperluan <?php echo $kertas_kerja->tujuan_penilaian; ?> pada <?php echo $kertas_kerja->debitur; ?></td>
					</tr>
					<tr>
						<td valign="top">Pengguna Laporan</td>
						<td width="20" align="center">:</td>
						<td valign="top"><?php echo $pekerjaan->pengguna_laporan; ?></td>
					</tr>
					<tr>
						<td colspan="3"></td>
					</tr>
					<tr>
						<td colspan="3">Persetujuan pemilik aset/Pemberi Tugas/Debitur dan waktu penilaian aset yang disepakati :</td>
					</tr>
					<tr>
						<td valign="top">Pemberi Tugas</td>
						<td width="20" align="center">:</td>
						<td valign="top"><strong><?php echo $kertas_kerja->debitur; ?></strong></td>
					</tr>
					<tr>
						<td valign="top"><?php echo empty($kertas_kerja->jenis_klien) ? 'Nasabah / Debitur' : $kertas_kerja->jenis_klien ?></td>
						<td width="20" align="center">:</td>
						<td valign="top"><strong><?php echo $kertas_kerja->klien; ?></strong></td>
					</tr>
					<tr>
						<td valign="top">Telepon / HP</td>
						<td width="20" align="center">:</td>
						<td valign="top"><strong><?php echo empty($kertas_kerja->telepon_klien) ? '-' : $kertas_kerja->telepon_klien; ?></strong></td>
					</tr>
					<tr>
						<td>Tanggal Penilaian</td>
						<td width="20" align="center">:</td>
						<td><strong><?php echo format_datetime($lokasi->tanggal_mulai) ?></strong></td>
					</tr>
				</table>
			</div>
		</div>

		<div class="panel" style="border-top: 0px;">
			<div class="panel-content" style="padding: 0px;">
				<table  border="0" class="width-720">
					<tr>
						<td style="width: 50%;border-right: 1px dotted #ccc;">
							<table border="0" width="100%">
								<tr>
									<td colspan="3">
										<strong>
											<u>Penunjukan Atas Nama 
											<?php echo $kertas_kerja->debitur; ?></u>
										</strong>
									</td>
								</tr>
								<tr>
									<td width="140px">
										Cabang
									</td>
									<td width="20" align="center">:</td>
									<td><?php echo empty($kertas_kerja->nama_cabang) ? '-' : $kertas_kerja->nama_cabang; ?></td>
								</tr>
								<tr>
									<td>
										No. Surat Tugas
									</td>
									<td width="20" align="center">
										:
									</td>
									<td>
										<?php echo empty($kertas_kerja->nomor_penugasan) ? '-' : $kertas_kerja->nomor_penugasan; ?>
									</td>
								</tr>
								<tr>
									<td>
										Tanggal
									</td>
									<td width="20" align="center">
										:
									</td>
									<td>
										<?php echo empty($kertas_kerja->tanggal_penugasan) || $kertas_kerja->tanggal_penugasan == '0000-00-00' ? '-' : format_datetime($kertas_kerja->tanggal_penugasan); ?>
									</td>
								</tr>
								<tr>
									<td>
										Nama Pejabat
									</td>
									<td width="20" align="center">
										:
									</td>
									<td>
										<?php echo empty($kertas_kerja->nama_staff) ? '-' : $kertas_kerja->nama_staff; ?>
									</td>
								</tr>
								<tr>
									<td>
										Jabatan
									</td>
									<td width="20" align="center">
										:
									</td>
									<td>
										<?php echo empty($kertas_kerja->jabatan) ? '-' : $kertas_kerja->jabatan; ?>
									</td>
								</tr>
							</table>

						</td>
						<td style="width: 50%;">
							<table border="0" style="width: 100%">
								<tr>
									<td>
										<span style="text-decoration: underline; font-style: italic;">
											Informasi Tambahan:
										</span>
									</td>
								</tr>
								<tr>
									<td >
										<textarea rows="10" style="width: 100%; height: 90px">
										</textarea>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="panel" style="margin-top: 10px;">
			<div class="panel-content">
				<div class="panel-heading" style="padding: 2px; margin-bottom: 5px; font-size: 12pt; font-weight: bold; background-color: #CCC" bgcolor="#CCC">DEFINISI DAN ISTILAH NILAI YANG DIGUNAKAN</div>
				<p>
					<strong>
						NILAI PASAR (MARKET VALUE)
					</strong><br/>
					<!-- <i> -->
						"Estimasi  sejumlah uang  pada tanggal penilaian, yang dapat  diperoleh dari  hasil  penukaran  suatu  aset  atau  liabilitas  pada  tanggal penilaian,  antara  pembeli yang berminat membeli dengan  penjual  yang  berminat  menjual,  dalam  suatu transaksi bebas ikatan, yang pemasarannya  dilakukan  secara  layak, dimana kedua pihak masing-masing bertindak atas dasar pemahaman yang dimilikinya, kehati-hatian dan tanpa paksaan”, (SPI 101-Edisi VI 2015; klausul 3.1).
					<!-- </i> -->
				</p>
				<p>
					<strong>
						NILAI LIKUIDASI
					</strong><br/>
					<!-- <i> -->
						"Sejumlah uang yang mungkin diterima dari penjualan suatu  aset dalam jangka waktu yang relatif pendek untuk dapat memenuhi jangka waktu pemasaran dalam definisi Nilai Pasar. Pada beberapa situasi, Nilai Likuidasi dapat melibatkan penjual yang tidak berminat menjual, dan pembeli yang membeli dengan mengetahui situasi yang tidak menguntungkan penjual”, (SPI- Edisi VI 2015 ; klausul 3.7.1).
					<!-- </i> -->
				</p>
				<p>
					<strong>
						PENGGUNAAN TERBAIK DAN TERTINGGI (HIGHEST AND BEST USE / HBU)
					</strong><br/>
					<!-- <i> -->
						"Penggunaan yang paling mungkin dan optimal dari suatu properti (dalam hal ini berupa tanah / lahan), yang secara fisik dimungkinkan, telah  dipertimbangkan  secara  memadai,  secara  hukum  diijinkan,  secara  finansial layak dan menghasilkan nilai tertinggi dari properti tersebut”, (SPI-Edisi VI 2015; Konsep dan Prinsip Umum Penilaian; klausul 12.1).
					<!-- </i> -->
				</p>
				<p>
					<strong>
						BIAYA REPRODUKSI / BIAYA PENGGANTI(NEW REPRODUCTION COST)
					</strong>
					<!-- <i> -->
						"Biaya untuk menciptakan replika dari struktur yang ada, menerapkan disain dan material yang sama."(SPI KPUP;butir 4.11-Edisi VI 2015
					<!-- </i> -->
				</p>
			</div>
		</div>

	</div>

	<div class="page" style="page-break-before: always;">
		<div class="panel">
			<div class="panel-content">
				<div class="panel-heading" style="padding: 2px; margin-bottom: 5px; font-size: 12pt; font-weight: bold; background-color: #CCC" bgcolor="#CCC">
					PENDEKATAN PENILAIAN
				</div>
				<strong>
					PENDEKATAN PASAR (MARKET APPROACH)
				</strong>
				<p>
					<i>
						"Pendekatan Pasar  menghasilkan indikasi nilai dengan cara membandingkan aset yang dinilai dengan aset yang indentik atau sebanding dan adanya informasi harga transaksi atau penawaran di pasar. (SPI-Edisi VI 2015; Konsep dan Prinsip Umum Penilaian; klausul 17.1).
					</i>
				</p>

				<strong>
					PENDEKATAN BIAYA (COST APPROACH)
				</strong>
				<p>
					<i>
						"Pendekatan Biaya menghasilkan indikasi nilai dengan menggunakan prinsip ekonomi, dimana pembeli tidak akan membayar suatu aset / properti  lebih  dari  pada  biaya  untuk  memperoleh aset / properti dengan kegunaan yang sama atau setara, pada saat pembelian atau konstruksi. (SPI-Edisi VI 2015; Konsep dan Prinsip Umum Penilaian; klausul 19.1).
					</i>
				</p>
				<strong>
					PENILAIAN PROPERTI (OBJEK PENILAIAN)
				</strong>
				<p>
					<i>
						"Sesuai tipe properti yang dinilai dan tujuan penilaiannya, maka pendekatan penilaian yang digunakan yaitu; "Pendekatan Biaya (Cost Approach)", dimana khusus untuk meng-estimasi nilai tanah menggunakan "pendekatan pasar dengan metode Perbandingan langsung data transaksi pasar" dari properti/bidang tanah yang sejenis dan sebanding.
					</i>
				</p>
			</div>
		</div>
		<br />

		<strong><span style="font-size: 11pt;">II. RINGKASAN HASIL PENILAIAN BERDASARKAN FISIK</span></strong>
		<?php $total_nilai_pasar = $total_nilai_likuidasi = 0; ?>
		<table class="table padding-td-3"  cellpadding="2" cellspacing="0" style="margin-top: 5px;">
			<thead>
			<tr>
				<th>
					OBYEK PENILAIAN
				</th>
				<th>
					LUAS / <br/>SATUAN
				</th>
				<th>
					NILAI PASAR <br/>(Rp.)
				</th>
				<th>
					INDIKASI NILAI <br/>LIKUIDASI(Rp.)
				</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$np_rowspan = "";
			if ( in_array($lokasi->id_jenis_objek, array(3,5,6,7)) ) {
				$np_rowspan = ' rowspan="2"';
			}
			// else if ( in_array($lokasi->id_jenis_objek, array()) ) {
			// 	$np_rowspan = ' rowspan="3"';
			// }
			?>

			<?php
			$no_bangunan = 1;
			foreach( $bangunan as $bg ) {
				$suffix_banguan = count($bangunan) == 1 ? NULL : ' ke-'.$no_bangunan;
				?>
				<tr>
					<td>Bangunan<?php echo $suffix_banguan; ?></td>
					<td align="center">
						<?php echo empty($bg->luas) ? '-' : $bg->luas.' m&sup2;' ?>
					</td>

					<td align="right" <?php echo $np_rowspan ?>>
						<?php echo empty($bg->nilai_pasar) ? '-' : number_format($bg->nilai_pasar,0,',','.') ?>
						<?php $total_nilai_pasar = (int)$bg->nilai_pasar+$total_nilai_pasar ?>
					</td>

					<td align="right" <?php echo $np_rowspan ?>>
						<?php echo empty($bg->nilai_likuidasi) ? '-' : number_format($bg->nilai_likuidasi,0,',','.') ?>
						<?php $total_nilai_likuidasi = (int)$bg->nilai_likuidasi+$total_nilai_likuidasi ?>
					</td>
				</tr>
				<?php
				$no_bangunan++;
			}
			?>
			<tr>
				<td>
					Tanah
				</td>
				<td align="center">
					<?php echo empty($tanah->luas) ? '-' : $tanah->luas.' m&sup2;' ?>
				</td>
				<?php if (!$np_rowspan){ ?>
				<td align="right">
					<?php echo empty($tanah->nilai_pasar) ? '-' : number_format($tanah->nilai_pasar,0,',','.') ?>
					<?php $total_nilai_pasar = (int)$tanah->nilai_pasar+$total_nilai_pasar ?>
				</td>
				<td align="right">
					<?php echo empty($tanah->nilai_likuidasi) ? '-' : number_format($tanah->nilai_likuidasi,0,',','.') ?>
					<?php $total_nilai_likuidasi = (int)$tanah->nilai_likuidasi+$total_nilai_likuidasi ?>
				</td>
				<?php } ?>
			</tr>

			<?php
			if ( in_array($lokasi->id_jenis_objek, array(1,2,5)) ) {
				?>
				<tr>
					<td>
						Sarana Pelengkap
					</td>
					<td align="center">
						<span>1-Lot</span>
					</td>

					<?php if ( in_array($lokasi->id_jenis_objek, array(1,2,5)) ) { ?>
					<td align="right">
						<?php echo empty($sarana_pelengkap->nilai_pasar) ? '-' : number_format($sarana_pelengkap->nilai_pasar,0,',','.') ?>
						<?php $total_nilai_pasar = (int)$sarana_pelengkap->nilai_pasar+$total_nilai_pasar ?>
					</td>
					
					<td align="right">
						<?php
							$nilai_likuidasi = 0;
							if (!empty($sarana_pelengkap->nilai_pasar))
							{
								$nilai_likuidasi = ((int)$sarana_pelengkap->nilai_pasar)/2;
							}

							echo number_format($nilai_likuidasi,0,',','.');
						?>
						<?php $total_nilai_likuidasi = (int)$nilai_likuidasi+$total_nilai_likuidasi ?>
					</td>
					<?php } ?>
				</tr>
				<?php
			}
			?>
			<tr style="background-color: #cccccc">
				<td colspan="2">
					<strong>
						NILAI PROPERTI
					</strong>
				</td>
				<td align="right">
					<?=number_format($total_nilai_pasar,0,',','.')?>
				</td>
				<td align="right">
					<?=number_format($total_nilai_likuidasi,0,',','.')?>
				</td>
			</tr>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="2"><strong>PEMBULATAN</strong></td>
					<td align="right"><?=number_format(round($total_nilai_pasar,-6),0,',','.')?></td>
					<td align="right"><?=number_format(round($total_nilai_likuidasi,-6),0,',','.')?></td>
				</tr>
				<tr>
					<td colspan="2"><strong>TERBILANG</strong></td>
					<td align="right"><?=terbilang(round($total_nilai_pasar,-6))?></td>
					<td align="right"><?=terbilang(round($total_nilai_likuidasi,-6))?></td>
				</tr>
			</tfoot>
		</table>
		<br/>
		<strong><i>M a r k e t a b i l i t y   :</i> <i><u>Marketable</u></i></strong>
		<br/><br/>
		<div class="panel">
			<div class="panel-content">
				<p>Sesuai hasil survei lokasi yang mencakup analisa situasi (site data), lingkungan dan pengembangan area serta pemanfaatan dari properti saat ini, maka kami berpendapat bahwa pemanfaatan tertinggi dan terbaik dari properti termaksud adalah sebagai <?php echo  $kertas_kerja->kegunaan ?>.</p>
			</div>
		</div>
		<br />
		<div class="panel">
			<div class="panel-content">
				<p>
					Kami menjamin bahwa penilaian ini sesuai profesi selaku appraiser telah dilakukan dengan penuh kejujuran, tanggung jawab, dan obyektif berdasarkan Kode Etik Penilai Indonesia (KEPI) dan Standar Penilaian Indonesia (SPI) yang berlaku, tanpa adanya pengaruh / tekanan dari siapapun. Laporan ini hanya dapat digunakan untuk keperluan / kepentingan manajemen  <?php echo  $kertas_kerja->debitur ?>   dan Debitur / Calon Debitur sesuai dengan tujuan penilaian sebagaimana tercantum di atas serta tidak dapat digunakan untuk tujuan / keperluan lainnya.
				</p>
				<p>
					<span style="font-family: TIMMINS; font-size: 11.5pt; color: blue">KJPP ASNO MINANDA<br/>
					USEP PRAWIRA & REKAN</span><br/><br/><br/>
					
					<b><u><?php echo $penanda_tangan_laporan ?></u></b><br />
					<b><?php echo $data_penandatangan->jabatan ?></b>
				</p>
				<table cellspacing="0" cellpadding="0">
					<tr>
						<td>MAPPI</td>
						<td align="center" width="20">:</td>
						<td><?php echo $data_penandatangan->no_mappi ?></td>
					</tr>
					<tr>
						<td>Ijin Penilai Publik</td>
						<td align="center" width="20">:</td>
						<td><?php echo $data_penandatangan->no_ijinpp ?></td>
					</tr>
					<tr>
						<td>STTD OJK</td>
						<td align="center" width="20">:</td>
						<td><?php echo $data_penandatangan->no_sttdojk; ?></td>
					</tr>
					<tr>
						<td>Kualifikasi Penilai</td>
						<td align="center" width="20">:</td>
						<td><?php echo $data_penandatangan->kualifikasi ?></td>
					</tr>
				</table>
			</div>
		</div>
		<br />
	</div>

	<div class="page" style="page-break-before: always;">
		<div class="panel">
			<div class="panel-heading">TINGKAT KEDALAMAN INVESTIGASI</div>
			<div class="panel-content">
				<ol style="padding: 15px;padding-right:10px; padding-top: 0px; padding-bottom:px; margin-bottom: 0px; margin-top: 0px;">
					<li>Inspeksi terhadap properti dilakukan dengan akses memadai (tanpa hambatan) dan pengumpulan, penelaahan/verifikasi serta analisis data (properti/objek penilaian dan pasar properti) dilakukan dengan waktu yang memadai.</li>
					<li>Adanya batas atau pembatasan dalam melakukan inpeksi, menelaah, penghitungan dan analisis akan mempengaruhi tingkat kedalaman investigasi yang dapat kami lakukan, akan kami nyatakan secara terperinci sebagai "Asumsi Khusus".</li>
					<li>Dalam pelaksanaan inspeksi lapangan, Surveyor (Tim Inspeksi) kami didampingi oleh counterpart yang mengetahui (aspek teknis dan hukum) dari properti yang dinilai, dan Surat Tugas (Berita Acara Hasil Inspeksi) ditandatangani bersama keduanya.</li>
				</ol>
			</div>
			<div class="panel-heading">SIFAT DAN SUMBER INFORMASI YANG DAPAT DIANDALKAN</div>
			<div class="panel-content">
				Data terkait properti yang digunakan untuk kepentingan analisis (referensi) berasal dari "sumber informasi yang dapat diandalkan" yang bersumber dari lembaga resmi pemerintah, seperti; Jurnal PU, BI, BPS, REI, PHRI, BTB-MAPPI dan lembaga riset resmi lainnya.
			</div>
			<div class="panel-heading">ASUMSI DAN BATASAN</div>
			<div class="panel-content">
				<ol style="padding: 15px;padding-right:10px; padding-top: 0px; padding-bottom:px; margin-bottom: 0px; margin-top: 0px;">
					<li>Properti/objek penilaian diasumsikan "free & clear", dilengkapi dokumen kepemilikan yang sah, bebas dari; jaminan/hipotik; pengga-daian; sewa-menyewa; penyitaan; tuntutan atau hambatan hukum lainnya serta hak kepemilikan properti dapat dialihkan.</li>
					<li>Pemeriksaan atas fakta-fakta serta faktor-faktor yang mempengaruhi nilai properti sebagaimana tercantum dalam laporan ini telah dibuat sedemikian rupa hingga hal-hal yang dicantumkan / dilaporkan bersifat praktis.</li>
					<li>Semua data/dokumen dan informasi/keterangan yang diberikan Pemberi Tugas dan/atau Pihak Ketiga lainnya yang terkait penilaian ini, adalah; sah; valid; benar dan akurat sesuai dengan fakta fisik dan hukum sebenarnya (sesuai kondisi terlihat). Apabila asumsi ini tidak terpenuhi, maka kami tidak bertanggung jawab terhadap kerugian material, immaterial serta permasalahan hukum yang timbul.</li>
					<li>
						Kami tidak melaksanakan pengukuran detail properti (sebagaimana petugas yang berwenang / BPN) dan gambar properti yang ditampilkan dalam laporan ini dimaksudkan hanya sebagai bahan ilustrasi / visualisasi saja yang diperoleh dari data, dokumen serta gambaran yang diberikan Pemberi Tugas. Kami tidak dapat menjamin keakuratan gambar tersebut, karena kami berpedoman pada asumsi butir 4.
					</li>
					<li>
						Kondisi - kondisi yang tidak wajar yang tersembunyi atau tidak dapat dijangkau atau tidak / sulit terlihat baik terhadap struktur bangunan maupun tanah / tapak yang dapat membawa efek negatip terhadap nilai properti, tidak menjadi tanggung jawab kami sebab bukan merupakan bagian pekerjaan dan kewenangan kami.
					</li>
					<li>
						Laporan penilaian ini dan atau salinannya bersifat rahasia serta tidak diperkenankan untuk : disebarluaskan, dijadikan sebagai bahan referensi dan atau digunakan untuk tujuan lain tanpa ijin tertulis dari kami. Kami tidak bertanggung jawab dan tidak dapat dituntut atas segala kehilangan dan atau kerugian yang mungkin terjadi saat ini dan dimasa mendatang akibat penggunaan laporan ini oleh pihak lain tanpa persetujuan tertulis dari kami serta penggunaan diluar tujuan penilaian yang telah disebutkan.
					</li>
					<li>
						Nilai dalam laporan ini dinyatakan dalam mata uang Rupiah (Rp) dan atau ekuivalennya (sesuai kurs konversi yang berlaku pada tanggal penilaian).
					</li>
					<li>
						Sepanjang sesuai dan dibenarkan oleh ketentuan hukum yang berlaku, kami bersedia memberikan kesaksian dan atau penjelasan teknis penilaian kepada pihak lain (Pengadilan maupun Instansi Pemerintah terkait lainnya) yang berhubungan dengan penilaian properti ini.
					</li>
					<li>
						Laporan penilaian ini sah, apabila disertai tanda tangan asli, stampel, serta watermarking logo KJPP ASNO MINANDA, USEP PRAWIRA DAN REKAN.
					</li>
				</ol>
			</div>
		</div>

		<div class="panel" style="margin-top: 8px">
			<div class="panel-heading">PERNYATAAN PENILAI</div>
			<div class="panel-content">
				Dalam batas kemampuan dan keyakinan kami sebagai Penilai Independen, kami yang bertanda tangan di bawah ini menyatakan bahwa :<br/>
				<ol style="padding: 15px;padding-right:10px; padding-top: 0px; padding-bottom:px; margin-bottom: 0px; margin-top: 0px;">
					<li>Pernyataan faktual yang dipresentasikan dalam laporan penilaian ini, adalah benar dan sesuai dengan pemahaman terbaik kami sebagai Penilai.</li>
					<li>Analisis data dan kesimpulan hanya dibatasi oleh asumsi dan kondisi pembatas sebagaimana yang dilaporkan.</li>
					<li>Kami (Penilai) tidak memiliki kepentingan apapun terhadap properti yang dinilai.</li>
					<li>Imbalan jasa / fee Penilai yang kami terima tidak berkaitan dengan hasil penilaian yang dilaporkan.</li>
					<li>Penilaian dilakukan dengan memenuhi ketentuan Kode Etik Penilai Indonesia dan Standar Penilaian Indonesia Edisi VI - Tahun 2015.</li>
					<li>Penilai telah menyelesaikan persyaratan pendidikan profesional yang ditetapkan atau dilaksanakan oleh asosiasi MAPPI (Masyarakat Profesi Penilai Indonesia).</li>
					<li>Penilai memiliki pemahaman yang layak/kompeten dan memadai tentang lokasi dan/atau jenis properti yang dinilai.</li>
					<li>Penilai telah melaksanakan ruang lingkup penilaian, sesuai surat penugasan (kontrak kerja yang telah disepakati).</li>
					<li>Tidak ada seorangpun (Penilai dan tenaga ahli teknis lainnya), terlibat dalam pelaksanaan keseluruhan kegiatan penilaian ini.</li>
				</ol>
			</div>
		</div>
		<br />

		<table class="table padding-td-3" cellpadding="2" cellspacing="0">
			<thead>
			<tr>
				<th align="center" width="20">
					No.
				</th>
				<th>
					Nama / No. MAPPI
				</th>
				<th>
					Tanda- Tangan
				</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td style="padding-top: 10px; padding-bottom: 10px;" align="center">1.</td>
				<td style="padding-top: 10px; padding-bottom: 10px;">
					<div style="width: 55%; float: left">
						<u><?php echo $penanda_tangan_laporan ?></u><br />
						MAPPI No : <?php echo $data_penandatangan->no_mappi ?>
					</div>
					<div style="width: 40%; float: right">
						( Penanggung Jawab )
					</div>
				</td>
				<td valign="top" align="center">

				</td>
			</tr>
			<tr>
				<td style="padding-top: 10px; padding-bottom: 10px;" align="center">2.</td>
				<td style="padding-top: 10px; padding-bottom: 10px;">
					<div style="width: 55%; float: left">
						<u><?php echo $kertas_kerja->nama_penilai ?></u><br />
						MAPPI No : <?php echo $kertas_kerja->no_mappi_penilai ?>
					</div>
					<div style="width: 40%; float: right">
						( Penilai & Reviewer )
					</div>
				</td>
				<td valign="top" align="center">

				</td>
			</tr>
			<tr>
				<td style="padding-top: 10px; padding-bottom: 10px;" align="center">3.</td>
				<td style="padding-top: 10px; padding-bottom: 10px;">
					<div style="width: 55%; float: left">
						<u><?php echo $kertas_kerja->nama_surveyor ?></u><br />
						MAPPI No : <?php echo $kertas_kerja->no_mappi_surveyor ?>
					</div>
					<div style="width: 40%; float: right">
						( Tim Inspeksi )
					</div>
				</td>
				<td valign="top" align="center">

				</td>
			</tr>
			</tbody>
		</table>

	</div>

	<div class="page" style="page-break-before: always;">
		<div class="title">
			<span style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 5px 5px 5px 5px;">PENILAIAN TANAH</span>
		</div>
		<?php
		$jenis_batas_1 = $batas_properti_1 = '';
		$jenis_batas_2 = $batas_properti_2 = '';
		$jenis_batas_3 = $batas_properti_3 = '';
		$jenis_batas_4 = $batas_properti_4 = '';
		if ( $tanah ) {
			$jenis_batas_1 = empty($tanah->jenis_batas_1) ? NULL : $tanah->jenis_batas_1;
			$batas_properti_1 = empty($tanah->batas_properti_1) ? NULL : $tanah->batas_properti_1;
			$jenis_batas_2 = empty($tanah->jenis_batas_2) ? NULL : $tanah->jenis_batas_2;
			$batas_properti_2 = empty($tanah->batas_properti_2) ? NULL : $tanah->batas_properti_2;
			$jenis_batas_3 = empty($tanah->jenis_batas_3) ? NULL : $tanah->jenis_batas_3;
			$batas_properti_3 = empty($tanah->batas_properti_3) ? NULL : $tanah->batas_properti_3;
			$jenis_batas_4 = empty($tanah->jenis_batas_4) ? NULL : $tanah->jenis_batas_4;
			$batas_properti_4 = empty($tanah->batas_properti_4) ? NULL : $tanah->batas_properti_4;
		}
		?>
		<div class="panel" style="margin-top: 8px;">
			<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">O B Y E K&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P E N I L A I A N</div>
			<div class="panel-content">
				<table style="width: 100%;" border="0" >
					<tbody>
					<tr>
						<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
						<td valign="top" style="width: 120px"><?php echo empty($kertas_kerja->jenis_klien) ? 'Nasabah / Debitur' : $kertas_kerja->jenis_klien ?></td>
						<td width="10px" align="center">:</td>
						<td valign="top" colspan="4" style="width: 250px"><strong><?php echo $kertas_kerja->klien; ?></strong></td>
						<td style="width: 20px"></td>
						<td colspan="4"><strong><u>Batas - Batas Properti  :</u></strong></td>
					</tr>
					<tr>
						<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
						<td valign="top">Yang dijumpai dilokasi</td>
						<td width="10px" align="center">:</td>
						<td valign="top" colspan="4" style="width: 250px"><strong><?php echo empty($kertas_kerja->yang_dijumpai) ? NULL : $kertas_kerja->yang_dijumpai.', selaku '.$kertas_kerja->selaku; ?></strong></td>
						<td style="width: 20px"></td>
						<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
						<td valign="top"><?php echo ucwords(trim(str_replace('sebelah', '', strtolower($jenis_batas_1)))) ?></td>
						<td width="10px" align="center">:</td>
						<td valign="top"><strong><?php echo $batas_properti_1; ?></strong></td>
					</tr>
					<tr>
						<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
						<td valign="top"><strong><u>Informasi Properti</u></strong></td>
						<td width="10px" align="center">:</td>
						<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
						<td valign="top" style="width: 110px">Status Objek</td>
						<td width="10px" align="center">:</td>
						<td valign="top" style="width: 150px"><?php echo $kertas_kerja->status_objek ?></td>
						<td style="width: 20px"></td>
						<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
						<td valign="top"><?php echo ucwords(trim(str_replace('sebelah', '', strtolower($jenis_batas_2)))) ?></td>
						<td width="10px" align="center">:</td>
						<td valign="top"><strong><?php echo $batas_properti_2; ?></strong></td>
					</tr>
					<tr>
						<td width="5px" align="center"></td>
						<td valign="top"></td>
						<td width="10px" align="center"></td>
						<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
						<td valign="top" style="width: 110px">Dihuni Oleh</td>
						<td width="10px" align="center">:</td>
						<td valign="top" style="width: 150px"><?php echo $kertas_kerja->obyek_ditempati_oleh ?></td>
						<td style="width: 20px"></td>
						<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
						<td valign="top"><?php echo ucwords(trim(str_replace('sebelah', '', strtolower($jenis_batas_3)))) ?></td>
						<td width="10px" align="center">:</td>
						<td valign="top"><strong><?php echo $batas_properti_3; ?></strong></td>
					</tr>
					<tr>
						<td width="5px" align="center"></td>
						<td valign="top"></td>
						<td width="10px" align="center"></td>
						<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
						<td valign="top" style="width: 110px">Penggunaan Obyek</td>
						<td width="10px" align="center">:</td>
						<td valign="top" style="width: 150px"><?php echo $kertas_kerja->penggunaan_obyek ?></td>
						<td style="width: 20px"></td>
						<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
						<td valign="top"><?php echo ucwords(trim(str_replace('sebelah', '', strtolower($jenis_batas_4)))) ?></td>
						<td width="10px" align="center">:</td>
						<td valign="top"><strong><?php echo $batas_properti_4; ?></strong></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>

		<div class="panel" style="margin-top: 8px;">
			<table>
				<tr>
					<td style="padding: 0; width: 50%;">
						<div class="panel" style="width: 100%;">
							<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">L I N G K U N G A N</div>
							<div class="panel-content panel-content-0">
								<table class="">
									<tr>
										<td>Lokasi tanah</td>
										<?php
										foreach ($lokasi_tanah_obyek as $lto) {
											$selected = strtolower($lto->lokasi_tanah_objek) == strtolower($tanah->lokasi_tanah) ? '&#10003;' : '&#45;';
											?>
											<td style="border: 1px dotted #808080; width: 18px;" align="center"><?php echo $selected; ?></td>
											<td><?php echo $lto->lokasi_tanah_objek ?></td>
											<?php
										}
										?>
									</tr>
									<tr>
										<td colspan="7">obyek</td>
									</tr>
									<tr>
										<td>Kepadatan</td>
										<?php
										foreach ($kepadatan_bangunan as $kb) {
											$selected = strtolower($kb->kepadatan_bangunan) == strtolower($tanah->kepadatan_bangunan) ? '&#10003;' : '&#45;';
											?>
											<td style="border: 1px dotted #808080; width: 18px;" align="center"><?php echo $selected; ?></td>
											<td><?php echo $kb->kepadatan_bangunan ?></td>
											<?php
										}
										?>
									</tr>
									<tr>
										<td colspan="7">bangunan</td>
									</tr>
									<tr>
										<td>Pertumbuhan</td>
										<?php
										foreach ($pertumbuhan_bangunan as $kb) {
											$selected = strtolower($kb->pertumbuhan_bangunan) == strtolower($tanah->pertumbuhan_bangunan) ? '&#10003;' : '&#45;';
											?>
											<td style="border: 1px dotted #808080; width: 18px;" align="center"><?php echo $selected; ?></td>
											<td><?php echo $kb->pertumbuhan_bangunan ?></td>
											<?php
										}
										?>
									</tr>
									<tr>
										<td colspan="7">bangunan</td>
									</tr>	
									<tr>
										<td>Harga tanah</td>
										<?php
										foreach ($harga_tanah_obyek as $kb) {
											$selected = strtolower($kb->harga_tanah_objek) == strtolower($tanah->harga_tanah_obyek) ? '&#10003;' : '&#45;';
											?>
											<td ><?php echo $selected; ?></td>
											<td><?php echo $kb->harga_tanah_objek ?></td>
											<?php
										}
										?>
									</tr>
									<tr>
										<td colspan="7">obyek</td>
									</tr>	
								</table>
							</div>
						</div>
					</td>

					<td rowspan="2" style="padding: 0; width: 50%;">
						<div class="panel" style="width: 100%;">
							<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">A N A L I S A&nbsp;&nbsp;L I N G K U N G AN</div>
							<div class="panel-content">
								<table class="table no-border no-border-top no-border-left">
									<tr>
										<td></td>
										<td>Baik</td>
										<td></td>
										<td>Cukup</td>
										<td></td>
										<td>Kurang</td>
									</tr>
									<tr>
										<td colspan="6" style="height: 9px; border: 0px; padding: inherit;"></td>
									</tr>
									<tr>
										<td>Kemudahan mencapai</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_mencapai_lokasi) == 'baik' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_mencapai_lokasi) == 'cukup' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_mencapai_lokasi) == 'kurang' ? '&#10003;' : '&#45;'; ?></span></td>
									</tr>
									<tr>
										<td colspan="6">lokasi obyek</td>
									</tr>	
									<tr>
										<td colspan="6" style="height: 9px; border: 0px; padding: inherit;"></td>
									</tr>
									<tr>
										<td>Kemudahan belanja /</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_belanja) == 'baik' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_belanja) == 'cukup' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_belanja) == 'kurang' ? '&#10003;' : '&#45;'; ?></span></td>
									</tr>
									<tr>
										<td colspan="6">shopping</td>
									</tr>	
									<tr>
										<td colspan="6" style="height: 9px; border: 0px; padding: inherit;"></td>
									</tr>
									<tr>
										<td>Kemudahan ke sekolah /</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_sarana_pendidikan) == 'baik' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_sarana_pendidikan) == 'cukup' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_sarana_pendidikan) == 'kurang' ? '&#10003;' : '&#45;'; ?></span></td>
									</tr>
									<tr>
										<td colspan="6">sarana pendidikan</td>
									</tr>	
									<tr>
										<td colspan="6" style="height: 9px; border: 0px; padding: inherit;"></td>
									</tr>
									<tr>
										<td>Kemudahan transportasi /</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_angkutan_umum) == 'baik' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_angkutan_umum) == 'cukup' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_angkutan_umum) == 'kurang' ? '&#10003;' : '&#45;'; ?></span></td>
									</tr>
									<tr>
										<td colspan="6">angkutan umum</td>
									</tr>	
									<tr>
										<td colspan="6" style="height: 9px; border: 0px; padding: inherit;"></td>
									</tr>
									<tr>
										<td>Kemudahan rekreasi /</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_rekreasi) == 'baik' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_rekreasi) == 'cukup' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->kemudahan_rekreasi) == 'kurang' ? '&#10003;' : '&#45;'; ?></span></td>
									</tr>
									<tr>
										<td colspan="6">hiburan</td>
									</tr>	
									<tr>
										<td colspan="6" style="height: 9px; border: 0px; padding: inherit;"></td>
									</tr>
									<tr>
										<td>Keamanan terhadap /</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->keamanan_terhadap_kejahatan) == 'baik' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->keamanan_terhadap_kejahatan) == 'cukup' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->keamanan_terhadap_kejahatan) == 'kurang' ? '&#10003;' : '&#45;'; ?></span></td>
									</tr>
									<tr>
										<td colspan="6">kejahatan / kriminalitas</td>
									</tr>	
									<tr>
										<td colspan="6" style="height: 9px; border: 0px; padding: inherit;"></td>
									</tr>
									<tr>
										<td>Keamanan terhadap /</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->keamanan_terhadap_kebakaran) == 'baik' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->keamanan_terhadap_kebakaran) == 'cukup' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->keamanan_terhadap_kebakaran) == 'kurang' ? '&#10003;' : '&#45;'; ?></span></td>
									</tr>
									<tr>
										<td colspan="6">kebakaran</td>
									</tr>	
									<tr>
										<td colspan="6" style="height: 9px; border: 0px; padding: inherit;"></td>
									</tr>
									<tr>
										<td>Keamanan terhadap /</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->keamanan_terhadap_bencana) == 'baik' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->keamanan_terhadap_bencana) == 'cukup' ? '&#10003;' : '&#45;'; ?></span></td>
										<td>&nbsp;</td>
										<td ><span class="span-bordered"><?php echo strtolower($tanah->keamanan_terhadap_bencana) == 'kurang' ? '&#10003;' : '&#45;'; ?></span></td>
									</tr>
									<tr>
										<td colspan="6">bencana alam</td>
									</tr>	
								</table>
							</div>
						</div>
					</td>
				</tr>
				<!-- <tr>
					<td style="height: 5px;"></td>
				</tr> -->
				<tr>
					<td style="padding: 0px 0px 0px 0px;">
						<div class="panel" style="width: 100%;">
							<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">K A W A S A N</div>
							<div class="panel-content" style="padding: 0px;">
								<table class="table table-kawasan"  cellpadding="2" cellspacing="0" style="border: 0px; width: 100%;">
									<thead>
										<tr>
											<th class="text-center" style="background-color: #CCCCCC; color: #000000; font-weight: bold; font-size: 9pt; font-family: Arial; border: 1px solid #FFF;">Penggunaan Tanah<br/>Saat Ini</th>
											<th class="text-center" style="background-color: #CCCCCC; color: #000000; font-weight: bold; font-size: 9pt; font-family: Arial; border: 1px solid #FFF;">Perubahan Lingkungan /<br/>Tata Guna Tanah<br/>Akan Datang</th>
											<th class="text-center" style="background-color: #CCCCCC; color: #000000; font-weight: bold; font-size: 9pt; font-family: Arial; border: 1px solid #FFF;">Mayoritas<br/>Data Hunian</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="padding: 0px; width: 30%; border-color: #CCC;">
												<table style="width: 100%;">
													<tr>
														<td style="border: 0px; padding: 5px;">Perumahan</td>
														<td style="border: 0px; padding: 5px;" class="text-center">:</td>
														<td style="text-align: right; border: 0px; padding: 5px;"><?php echo empty($tanah->permukiman) ? '0' : $tanah->permukiman ?>%</td>
													</tr>
													<tr>
														<td style="border: 0px; padding: 5px;">Industri</td>
														<td style="border: 0px; padding: 5px;" class="text-center">:</td>
														<td style="text-align: right; border: 0px; padding: 5px;"><?php echo empty($tanah->industri) ? '0' : $tanah->industri ?>%</td>
													</tr>
													<tr>
														<td style="border: 0px; padding: 5px;">Perkantoran</td>
														<td style="border: 0px; padding: 5px;" class="text-center">:</td>
														<td style="text-align: right; border: 0px; padding: 5px;"><?php echo empty($tanah->perkantoran) ? '0' : $tanah->perkantoran ?>%</td>
													</tr>
													<tr>
														<td style="border: 0px; padding: 5px;">Pertokoan</td>
														<td style="border: 0px; padding: 5px;" class="text-center">:</td>
														<td style="text-align: right; border: 0px; padding: 5px;"><?php echo empty($tanah->pertokoan) ? '0' : $tanah->pertokoan ?>%</td>
													</tr>
													<tr>
														<td style="border: 0px; padding: 5px;">Taman /<br/>Penghijauan</td>
														<td style="border: 0px; padding: 5px;" class="text-center; border: 0px; padding: inherit;">:</td>
														<td style="text-align: right; border: 0px; padding: 5px;"><?php echo empty($tanah->taman) ? '0' : $tanah->taman ?>%</td>
													</tr>
													<tr>
														<td style="border: 0px; padding: 5px;">Tanah Kosong</td>
														<td style="border: 0px; padding: 5px;" class="text-center; border: 0px; padding: inherit;">:</td>
														<td style="text-align: right; border: 0px; padding: 5px;"><?php echo empty($tanah->tanah_kosong) ? '0' : $tanah->tanah_kosong ?>%</td>
													</tr>
												</table>
											</td>
											<td style="padding: 0px; width: 40%; border-color: #CCC;">
												<table class="table no-border-all">
													<tbody>
													<?php
													$list_perubahan_lingkungan = $this->global_model->get_list('mst_perubahan_lingkungan_response');
													$jum_lpl = count($list_perubahan_lingkungan);
													$ipl=1;
													foreach ($list_perubahan_lingkungan as $pl) {
														$selected = strtolower($pl->perubahan_lingkungan_response) == strtolower($tanah->perubahan_lingkungan) ? '&#10003;' : '&#45;';
														?>
														<tr>
															<td style="border: 0px; padding: 5px;"><?php echo $pl->perubahan_lingkungan_response; ?></td>
															<td style="width: 5px; border: 0px; padding: 5px;" class="text-center">:</td>
															<td><span class="span-bordered"><?php echo $selected ?></span></td>
														</tr>
														<?php
														if ( $ipl < $jum_lpl ) {
															?>
															<tr>
																<td colspan="3" style="height: 7px; border: 0px; padding: inherit;"></td>
															</tr>
															<?php
														}
														$ipl++;
													}
													?>
													</tbody>
												</table>
											</td>
											<td style="padding: 0px; width: 30%; border-color: #CCC;">
												<table class="table no-border-all">
													<tbody>
													<?php
													$list_mayoritas_hunian = $this->global_model->get_list('mst_tipe_hunian');
													$jum_lmh = count($list_mayoritas_hunian);
													$imh=1;
													foreach ($list_mayoritas_hunian as $mh) {
														$selected = strtolower($mh->tipe_hunian) == strtolower($tanah->mayoritas_data_hunian) ? '&#10003;' : '&#45;';
														?>
														<tr>
															<td style="border: 0px; padding: 5px;"><?php echo $mh->tipe_hunian; ?></td>
															<td style="width: 5px; border: 0px; padding: 5px;" class="text-center">:</td>
															<td><span class="span-bordered"><?php echo $selected ?></span></td>
														</tr>
														<?php
														if ( $imh < $jum_lmh ) {
															?>
															<tr>
																<td colspan="3" style="height: 7px; border: 0px; padding: inherit;"></td>
															</tr>
															<?php
														}
														$imh++;
													}
													?>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>

		<div class="panel" style="margin-top: 8px;">
			<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">L O K A S I&nbsp;&nbsp;S I T E</div>
			<div class="panel-heading-blue" style="background-color: #CCCCCC; color: #000; font-size: 14pt; font-family: Arial; font-size: 10pt; margin-top: 6px; padding: 3px; padding-left: 10px; text-align: left">Fasilitas Lingkungan</div>
			<div class="panel-content">
				<table style="width: 100%;" border="0" >
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td style="width: 25%">Jaringan Listrik</td>
						<td style="border: 1px dotted #808080; width: 30px; text-align: center;"><?php echo strtolower($tanah->jaringan_listrik) == 1 ? '&#10003;' : '&#45;'; ?></td>
						<td style="width: 10px;"></td>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td style="width: 25%">Lebar jalan di depan obyek</td>
						<td style="width: 10px;" class="text-center">:</td>
						<td><?php echo empty($tanah->lebar_jalan_depan) ? '-' : number_format($tanah->lebar_jalan_depan,0).' m' ?></td>
					</tr>
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td>Jaringan Air Bersih</td>
						<td style="border: 1px dotted #808080; width: 30px; text-align: center;"><?php echo strtolower($tanah->jaringan_air_bersih) == 1 ? '&#10003;' : '&#45;'; ?></td>
						<td></td>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td style="width: 200px">Lebar jalan lingkungan</td>
						<td style="width: 10px;" class="text-center">:</td>
						<td><?php echo empty($tanah->lebar_jalan_sekitar) ? '-' : number_format($tanah->lebar_jalan_sekitar,0).' m' ?></td>
					</tr>
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td>Jaringan Telepon</td>
						<td style="border: 1px dotted #808080; width: 30px; text-align: center;"><?php echo strtolower($tanah->jaringan_telepon) == 1 ? '&#10003;' : '&#45;'; ?></td>
						<td></td>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td style="width: 200px">Jenis jalan depan obyek</td>
						<td style="width: 10px;" class="text-center">:</td>
						<td><?php echo empty($tanah->jenis_jalan_depan) ? '-' : $tanah->jenis_jalan_depan; ?></td>
					</tr>
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td>Jaringan Gas</td>
						<td style="border: 1px dotted #808080; width: 30px; text-align: center;"><?php echo strtolower($tanah->jaringan_gas) == 1 ? '&#10003;' : '&#45;'; ?></td>
						<td></td>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td style="width: 200px">Drainase</td>
						<td style="width: 10px;" class="text-center">:</td>
						<td><?php echo empty($tanah->drainase) ? '-' : $tanah->drainase; ?></td>
					</tr>
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td>Penampungan Sampah</td>
						<td style="border: 1px dotted #808080; width: 30px; text-align: center;"><?php echo strtolower($tanah->penampungan_sampah) == 1 ? '&#10003;' : '&#45;'; ?></td>
						<td></td>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td style="width: 200px">Trotoar</td>
						<td style="width: 10px;" class="text-center">:</td>
						<td><?php echo empty($tanah->trotoar) ? '-' : $tanah->trotoar; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="panel" style="margin-top: 6px;">
			<div class="panel-heading-blue" style="background-color: #CCCCCC; color: #000; font-size: 14pt; font-family: Arial; font-size: 10pt; padding: 3px; padding-left: 10px; text-align: left">Gambaran Umum Site</div>
			<div class="panel-content">
				<table style="width: 100%;" border="0" >
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td style="width: 220px">Topografi</td>
						<td style="width: 10px;" class="text-center">:</td>
						<td><?php echo empty($tanah->topografi) ? '-' : $tanah->topografi ?></td>
					</tr>
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td>Jenis Tanah</td>
						<td class="text-center">:</td>
						<td><?php echo empty($tanah->jenis_tanah) ? '-' : $tanah->jenis_tanah ?></td>
					</tr>
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td>Tata Lingkungan</td>
						<td class="text-center">:</td>
						<td><?php echo empty($tanah->tata_lingkungan) ? '-' : $tanah->tata_lingkungan ?></td>
					</tr>
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td>Resiko Banjir</td>
						<td class="text-center">:</td>
						<td><?php echo empty($tanah->resiko_banjir) ? '-' : $tanah->resiko_banjir ?></td>
					</tr>
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td>Letak / Posisi</td>
						<td class="text-center">:</td>
						<td><?php echo empty($tanah->posisi_tanah) ? '-' : $tanah->posisi_tanah ?></td>
					</tr>
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td>Tinggi tanah terhadap jalan</td>
						<td class="text-center">:</td>
						<td><?php echo empty($tanah->tinggi_tanah) ? '-' : $tanah->tinggi_tanah ?></td>
					</tr>
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td>Sal. Udara Teg. Ekstra Tinggi</td>
						<td class="text-center">:</td>
						<td><?php echo empty($tanah->ruang_areal_sutet) ? '-' : $tanah->ruang_areal_sutet ?></td>
					</tr>
					<tr>
						<td width="5px" align="center" style="padding: 0px;"><span style="color: #808080">&#9642;</span></td>
						<td>Jarak obyek terhadap SUTET</td>
						<td class="text-center">:</td>
						<td><?php echo empty($tanah->jarak_obyek_terhadap_sutet) ? '-' : $tanah->jarak_obyek_terhadap_sutet ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="page" style="page-break-before: always;">
		<div class="panel">
			<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">D A T A&nbsp;&nbsp;L E G A L I T A S</div>
			<div class="panel-content" style="padding: 0px;">
				<table class="table padding-td-3"  cellpadding="2" cellspacing="0" style="margin-top: 0px; border-left: 0px; border-right: 0px ; border-bottom: 0px; border-top: 0px; width: 100%;">
				<thead>
				<tr>
					<th rowspan="2" class="text-center" style="width: 20px; border-left: 0px; border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px">No.</th>
					<th rowspan="2" class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px">Jenis<br/>Sertifikat</th>
					<th rowspan="2" class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px">Nomor Sertifikat</th>
					<th rowspan="2" class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px">Atas Nama</th>
					<th colspan="2" class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px">Tanggal Sertifikat</th>
					<th colspan="2" class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px"><?php echo empty($tanah->sumber_nomor_sertifikat) ? 'Surat Ukur' : $tanah->sumber_nomor_sertifikat; ?></th>
					<th rowspan="2" class="text-center" style="border-right: 0px; border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px">Luas Tanah<br/>( m<sup>2</sup> )</th>
				</tr>
				<tr>
					<th class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-top: 1px solid #FFF; border-color: #FFF; padding: 5px; width: 70px;">Terbit</th>
					<th class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-top: 1px solid #FFF; border-color: #FFF; padding: 5px; width: 70px;">Berakhir</th>
					<th class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-top: 1px solid #FFF; border-color: #FFF; padding: 5px; width: 70px;">Nomor</th>
					<th class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-top: 1px solid #FFF; border-color: #FFF; padding: 5px; width: 70px;">Tgl-Bln-Thn</th>
				</tr>
				</thead>
				<tbody>
					<?php
					$no_legal = 1;
					$total_luas_tanah = 0;
					foreach ($data_legalitas as $legal) {
						?>
						<tr>
							<td style="border-color: #CCC;"><?php echo $no_legal; ?></td>
							<td style="border-color: #CCC;"><?php echo $legal->tanah_53; ?></td>
							<td style="border-color: #CCC;"><?php echo $legal->tanah_54; ?></td>
							<td style="border-color: #CCC;"><?php echo $legal->tanah_55; ?></td>
							<td style="border-color: #CCC;"><?php echo date('d-m-Y', strtotime($legal->tanah_56)); ?></td>
							<td style="border-color: #CCC;"><?php echo date('d-m-Y', strtotime($legal->tanah_57)); ?></td>
							<td style="border-color: #CCC;"><?php echo $legal->tanah_58; ?></td>
							<td style="border-color: #CCC;"><?php echo $legal->tanah_59; ?></td>
							<td style="border-color: #CCC; text-align: right;" class="text-right"><?php echo $legal->tanah_60; ?></td>
						</tr>
						<?php
						$l_tanah_sertifikat = empty($legal->tanah_60) || !is_numeric($legal->tanah_60) ? 0 : $legal->tanah_60;
						$total_luas_tanah = $total_luas_tanah + $l_tanah_sertifikat;
						$no_legal++;
					}
					$luas_tanah_terpotong = empty($tanah->luas_tanah_terpotong) || !is_numeric($tanah->luas_tanah_terpotong) ? 0 : $tanah->luas_tanah_terpotong; 
					?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="8" class="text-right" style="border-top: 0px; border-bottom: 1px dotted #000; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px; text-align: right;">
							<b>TOTAL LUAS TANAH SESUAI SERTIFIKAT</b>
						</td>
						<td class="text-right" style="border-top: 0px; border-bottom: 1px dotted #000; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px 10px; text-align: right;">
							<?php echo number_format($total_luas_tanah,0); ?>
						</td>
					</tr>
					<tr>
						<td colspan="9" style="padding: 0px; background-color: #CCC; border-top: 0px;">
							<table style="width: 100%">
								<tfoot>
									<tr>
										<td colspan="8" class="text-right" style="border: 0px; background-color: #CCC; color: #000; padding: 5px; text-align: right;">
											Total luas tanah yang terpotong (rencana / pelebaran jalan) :
										</td>
										<td class="text-right" style=" width:60px; border: 0px; background-color: #CCC; color: #000; padding: 5px 10px; text-align: right;">
											<?php echo '&plusmn; '.number_format($luas_tanah_terpotong,0); ?> m<sup>2</sup>
										</td>
									</tr>
									<tr>
										<td colspan="8" class="text-right" style="border: 0px; background-color: #CCC; color: #000; padding: 5px; text-align: right;">
											Luas Tanah Yang Dinilai :
										</td>
										<td class="text-right" style="border: 0px; background-color: #CCC; color: #000; padding: 5px 10px; text-align: right;">
											<?php echo number_format($total_luas_tanah,0); ?> m<sup>2</sup>
										</td>
									</tr>
								</tfoot>
							</table>
						</td>
					</tr>
				</tfoot>
				</table>
			</div>
		</div>

		<div class="panel" style="margin-top: 16px;">
			<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">K E S I M P U L A N&nbsp;&nbsp;N I L A I&nbsp;&nbsp;T A N A H</div>
			<div class="panel-content" style="padding: 15px;">
				<table style="width: 100%; border: 1px dotted #ccc" >
					<tr>
						<td width="5px;" align="center" style="padding: 0px; vertical-align: middle; padding: 5px;"><span style="color: #808080">&#9642;</span></td>
						<td style="width: 70%; font-weight: bold; padding: 5px;">NILAI PASAR TANAH YANG DINILAI</td>
						<td style="padding: 5px;" class="text-center">:</td>
						<td style="padding: 5px;"><?php echo empty($tanah->nilai_pasar) || !is_numeric($tanah->nilai_pasar) ? 'Rp. -' : 'Rp. '.number_format($tanah->nilai_pasar,0,',','.') ?></td>
					</tr>
				</table>
			</div>
		</div>

		<div class="panel" style="margin-top: 16px;">
			<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">I N F O R M A S I&nbsp;&nbsp;T A M B A H A N</div>
			<div class="panel-content" style="padding: 15px;">
				<table style="width: 55%; border: 1px dotted #ccc" >
					<tr>
						<td style="padding: 5px; text-align: right">Informasi NJOP Properti</td>
						<td style="padding: 5px;" class="text-center">:</td>
						<td style="padding: 5px;"><?php echo empty($tanah->tanggal_njop) ? '-' : date('d-M-Y', strtotime($tanah->tanggal_njop)) ?></td>
					</tr>
					<tr>
						<td style="padding: 5px; text-align: right">BUMI ( / m<sup>2</sup> )</td>
						<td style="padding: 5px;" class="text-center">:</td>
						<td style="padding: 5px;"><?php echo empty($tanah->tanah_permeter) || !is_numeric($tanah->tanah_permeter) ? 'Rp. -' : 'Rp. '.number_format($tanah->tanah_permeter,0,',','.') ?></td>
					</tr>
					<tr>
						<td style="padding: 5px; text-align: right">BANGUNAN ( / m<sup>2</sup> )</td>
						<td style="padding: 5px;" class="text-center">:</td>
						<td style="padding: 5px;"><?php echo empty($tanah->bangunan_permeter) || !is_numeric($tanah->bangunan_permeter) ? 'Rp. -' : 'Rp. '.number_format($tanah->bangunan_permeter,0,',','.') ?></td>
					</tr>
				</table>
			</div>
		</div>

		<div class="panel" style="margin-top: 16px;">
			<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">C A T A T A N&nbsp;&nbsp;P E N I L A I</div>
			<div class="panel-content">
				<?php
				echo empty($tanah->catatan_penilai) ? '-' : $tanah->catatan_penilai;
				?>
			</div>
		</div>
	</div>

	<?php
	if ( in_array($lokasi->id_jenis_objek, array(2,3,5,6,7)) ) {
	$nomor_bangunan = 1;
	$jum_bangunan = count($bangunan);
	foreach ($bangunan as $item_bg) {
	?>
		<div class="page">
			<div class="title" style="page-break-before: always; margin-top: 10px;">
				<span style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 5px 5px 5px 5px;">PENILAIAN BANGUNAN <?php echo $jum_bangunan > 1 ? $nomor_bangunan : NULL; ?></span>
			</div>
			<div class="panel" style="margin-top: 8px;">
				<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">O B Y E K&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P E N I L A I A N</div>
				<div class="panel-content">
					<table style="width: 100%;" border="0" >
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 20%">Pemberi Tugas</td>
							<td width="10px" align="center">:</td>
							<td valign="top" style="width: 20%"><strong><?php echo $kertas_kerja->debitur; ?></strong></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 20%">Tanggal Inspeksi</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo format_datetime($lokasi->tanggal_mulai) ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 20%">Alamat Obyek</td>
							<td width="10px" align="center">:</td>
							<td valign="top" colspan="6"><?php echo $lokasi->alamat; ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 20%">Tipe Bangunan</td>
							<td width="10px" align="center">:</td>
							<td valign="top" style="width: 20%"><strong><?php echo empty($item_bg->tipe_bangunan) ? '-' : $item_bg->tipe_bangunan; ?></strong></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 20%">Penggunaan saat ini</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->penggunaan_saat_ini) ? '-' : $item_bg->penggunaan_saat_ini; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="panel" style="margin-top: 8px;">
				<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">LUAS BANGUNAN <?php echo strtoupper($item_bg->tipe_bangunan); ?></div>
				<div class="panel-content" style="padding: 0px;">
					<table class="table padding-td-3"  cellpadding="2" cellspacing="0" style="margin-top: 0px; border-left: 0px; border-right: 0px ; border-bottom: 0px; border-top: 0px; width: 100%;">
					<thead>
					<tr>
						<th class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px">Ruangan</th>
						<?php
						foreach ($ruangan[$item_bg->id_bangunan] as $rb) {
							?>
							<th class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px"><?php echo $rb['label'] ?></th>
							<?php
						}
						?>
						<th class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px">Jumlah</th>
						<?php
						foreach ($ruangan_last[$item_bg->id_bangunan] as $rbl) {
							foreach ($rbl as $vrbl) {
								?>
								<th class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 5px"><?php echo $vrbl['label'] ?></th>
								<?php
							}
						}
						?>
					</tr>
					</thead>
					<tbody>
						<?php
						/*$have_basement = false;
						if ( !in_array(1, $lantai[$item_bg->id_bangunan]) && count($ruangan) > 0 ) {
							$nama_lantai = 'Basement/Ground';
							?>
							<tr>
								<td style="border-color: #CCC;"><b><?php echo $nama_lantai; ?></b></td>
								<?php
								$total_row = 0;
								foreach ($ruangan[$item_bg->id_bangunan] as $rb) {
									$nilai_luas = 0;
									?>
									<td style="border-color: #CCC; text-align: right;"><?php echo $nilai_luas; ?></td>
									<?php
									$total_row = $total_row + $nilai_luas;
								}
								?>
								<td style="border-color: #CCC; text-align: right;"><?php echo $total_row; ?></td>
								<?php
								foreach ($ruangan_last[$item_bg->id_bangunan] as $rbl) {
									foreach ($rbl as $vrbl) {
										$nilai_luas = 0;
										?>
										<td style="border-color: #CCC; text-align: right;"><?php echo $nilai_luas; ?></td>
										<?php
									}
								}
								?>
							</tr>
							<?php
						}*/
						$jumlah_pertama = 0;
						$jumlah_kedua = array();
						foreach ($lantai[$item_bg->id_bangunan] as $key_y) {
							$nama_lantai = 'Basement/Ground';
							if ( $key_y > 1 )
								$nama_lantai = 'Lantai '.($key_y-1);
							else 
								$have_basement = true;
							?>
							<tr>
								<td style="border-color: #CCC;"><b><?php echo $nama_lantai; ?></b></td>
								<?php
								$total_row = 0;
								foreach ($ruangan[$item_bg->id_bangunan] as $rb) {
									$nilai_luas = isset($detil_luas_bangunan[$item_bg->id_bangunan][$key_y][$rb['index']][$rb['x']]) ? $detil_luas_bangunan[$item_bg->id_bangunan][$key_y][$rb['index']][$rb['x']]: 0;
									?>
									<td style="border-color: #CCC; text-align: right;"><?php echo $nilai_luas; ?></td>
									<?php
									$total_row = $total_row + $nilai_luas;
								}
								$jumlah_pertama = $jumlah_pertama+$total_row;
								?>
								<td style="border-color: #CCC; text-align: right;"><?php echo $total_row; ?></td>
								<?php
								foreach ($ruangan_last[$item_bg->id_bangunan] as $rbl) {
									foreach ($rbl as $vrbl) {
										if ( !array_key_exists($vrbl['index'], $jumlah_kedua) )
											$jumlah_kedua[$vrbl['index']] = array();
										if ( !array_key_exists($vrbl['x'], $jumlah_kedua[$vrbl['index']]) )
											$jumlah_kedua[$vrbl['index']][$vrbl['x']] = 0;
										$nilai_luas = isset($detil_luas_bangunan[$item_bg->id_bangunan][$key_y][$vrbl['index']][$vrbl['x']]) ? $detil_luas_bangunan[$item_bg->id_bangunan][$key_y][$vrbl['index']][$vrbl['x']]: 0;
										$jumlah_kedua[$vrbl['index']][$vrbl['x']] = $jumlah_kedua[$vrbl['index']][$vrbl['x']]+$nilai_luas;
										?>
										<td style="border-color: #CCC; text-align: right;"><?php echo $nilai_luas; ?></td>
										<?php
									}
								}
								?>
							</tr>
							<?php
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="<?php echo (count($ruangan[$item_bg->id_bangunan]) + 1) ?>" class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 2px 10px"><strong>LUAS PENGUKURAN FISIK BANGUNAN <?php echo strtoupper($item_bg->tipe_bangunan); ?></strong></td>
							<td class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 2px 10px; text-align: right;"><?php echo $jumlah_pertama ?></td>
							<?php
							foreach ($jumlah_kedua as $jk) {
								foreach ($jk as $vjk) {
									?>
									<td class="text-center" style="border-top: 0px; background-color: #CCC; color: #000; border-color: #FFF; padding: 2px 10px; text-align: right;"><?php echo $vjk ?></td>
									<?php
								}
							}
							?>	
						</tr>
					</tfoot>
					</table>
				</div>
			</div>
			<div class="panel" style="margin-top: 8px;">
				<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">K E T E R A N G A N&nbsp;&nbsp;B A N G U N A N</div>
				<div class="panel-content">
					<table style="width: 100%;" border="0" >
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 20%">Bentuk Arsitek Bangunan</td>
							<td width="10px" align="center">:</td>
							<td valign="top" style="width: 130px"><?php echo empty($item_bg->arsitektur_bangunan) ? '-' : ucwords(trim(str_replace('bentuk bangunan', '', strtolower($item_bg->arsitektur_bangunan)))); ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 200px">Nomor Ijin Mendirikan Bangunan</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->nomor_imb) ? '-' : $item_bg->nomor_imb; ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Tahun dibangun</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->tahun_dibangun) ? '-' : $item_bg->tahun_dibangun; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Tanggal dikeluarkan IMB</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->tanggal_imb) || $item_bg->tanggal_imb == '1970-01-01' || $item_bg->tanggal_imb == '0000-00-00' ? '-' : date('d-m-Y', strtotime($item_bg->tanggal_imb)); ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Tahun direnovasi</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->tahun_direnovasi) ? '-' : $item_bg->tahun_direnovasi; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Luas bangunan berdasarkan IMB</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->luas_imb) ? '-' : number_format($item_bg->luas_imb,0).' m<sup>2</sup>'; ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Pagar halaman</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->pagar_halaman) ? '-' : $item_bg->pagar_halaman; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Perbedaan luas IMB & pengukuran fisik</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->perbedaan_luas_fisik_imb) ? '-' : number_format($item_bg->perbedaan_luas_fisik_imb,0).' m<sup>2</sup>'; ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Keadaan halaman</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->keadaan_halaman) ? '-' : $item_bg->keadaan_halaman; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Pemotongan (rencana / pelebaran jalan)</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->pelebaran_jalan) ? '-' : number_format($item_bg->pelebaran_jalan,0).' m<sup>2</sup>'; ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Tinggi halaman terhadap jalan</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->ketinggian_halaman) ? '-' : number_format($item_bg->ketinggian_halaman,0).' m<sup>2</sup>'; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Pemotongan (ketentuan GSB)</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->total_luas_terpotong) ? '-' : number_format($item_bg->total_luas_terpotong,0).' m<sup>2</sup>'; ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Tinggi Bangunan</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->ketinggian_bangunan) ? '-' : number_format($item_bg->ketinggian_bangunan,0).' m<sup>2</sup>'; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top"><b>Luas Bangunan yang Dinilai</b></td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->luas) ? '-' : number_format($item_bg->luas,0).' m<sup>2</sup>'; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="panel" style="margin-top: 8px;">
				<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">S P E S I F I K A S I&nbsp;&nbsp;B A N G U N A N</div>
				<div class="panel-content">
					<table style="width: 100%;" border="0" >
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 80px">Pondasi</td>
							<td width="10px" align="center">:</td>
							<td valign="top" style="width: 120px"><?php echo empty($item_bg->pondasi) ? '-' : $item_bg->pondasi; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 80px">Lantai</td>
							<td width="10px" align="center">:</td>
							<td valign="top" style="width: 120px"><?php echo empty($item_bg->lantai) ? '-' : $item_bg->lantai; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 80px">Plafond</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->plafond) ? '-' : $item_bg->plafond; ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Dinding</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->dinding) ? '-' : $item_bg->dinding; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Kusen</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->kusen) ? '-' : $item_bg->kusen; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Atap</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->penutup_atap) ? '-' : $item_bg->penutup_atap; ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Partisi Ruangan</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->partisi_ruangan) ? '-' : $item_bg->partisi_ruangan; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Tangga</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->tangga) ? '-' : $item_bg->tangga; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Pagar</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->pagar_halaman) ? '-' : $item_bg->pagar_halaman; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="panel" style="margin-top: 8px;">
				<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">F A S I L I T A S</div>
				<div class="panel-content">
					<table style="width: 100%;" border="0" >
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 20%">Saluran listrik PLN</td>
							<td width="10px" align="center">:</td>
							<td valign="top" style="width: 20%"><?php echo empty($item_bg->saluran_listrik_pln) ? '-' : $item_bg->saluran_listrik_pln; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 20%">Carport / area parkir</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->area_parkir) ? '-' : $item_bg->area_parkir; ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Pendingin ruangan</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->pendingin_ruangan) ? '-' : ($item_bg->pendingin_ruangan.' unit'.(empty($item_bg->tipe_pendingin_ruangan) ? NULL : ', '.$item_bg->tipe_pendingin_ruangan)); ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Pemanas Air</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->pemanas_air) ? '-' : $item_bg->pemanas_air; ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Sambungan telepon</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->sambungan_telepon) ? '-' : $item_bg->sambungan_telepon.' line'; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Penangkal Petir</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->penangkal_petir) ? '-' : $item_bg->penangkal_petir; ?></td>
						</tr>
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Jaringan air bersih</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->jaringan_air_bersih) ? '-' : $item_bg->jaringan_air_bersih; ?></td>
							<td style="width: 20px"></td>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top">Kolam renang</td>
							<td width="10px" align="center">:</td>
							<td valign="top"><?php echo empty($item_bg->kolam_renang) ? '-' : $item_bg->kolam_renang; ?></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="panel" style="margin-top: 8px;">
				<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">K E S I M P U L A N&nbsp;&nbsp;N I L A I&nbsp;&nbsp;B A N G U N A N</div>
				<div class="panel-content" style="padding: 10px 10px 10px 10px">
					<table style="width: 100%; border: 1px dotted #CCC" >
						<tr>
							<td width="5px" align="center"><span style="color: #808080">&#9642;</span></td>
							<td valign="top" style="width: 70%"><strong>NILAI PASAR BANGUNAN</strong></td>
							<td width="10px" align="center">:</td>
							<td><strong>Rp. <?php echo number_format($item_bg->nilai_pasar,0,',','.').',-' ?></strong></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="panel" style="margin-top: 8px;">
				<div class="panel-heading-blue" style="background-color: #808080; font-size: 14pt; color: #FFF; padding: 3px;">C A T A T A N&nbsp;&nbsp;P E N I L A I</div>
				<div class="panel-content">
					<?php echo empty($item_bg->catatan_penilai) ? '-' : $item_bg->catatan_penilai; ?>
				</div>
			</div>
		</div>
	<?php
	$nomor_bangunan++;
	}
	}
	?>


	<?php 
	if ($lokasi->id_jenis_objek == 2) {
		$tab_bangunan = $custom_data["tab_bangunan"];


	$i_bangunan   = 1;
	$a_bangunan   = 1;
	
	//START FOREACH_1
	foreach($tab_bangunan as $key_bangunan => $item_bangunan)
	{
		$key_bangunan = str_replace(" ", "_", $key_bangunan);
		// var_dump($key_bangunan);

		$list_lantai  = $item_bangunan["lantai"];
		$list_ruangan = $item_bangunan["ruangan"];
		$luas_teras   = 0;
		$luas_balkon  = 0;
		$i            = 1;
		
		foreach($list_lantai as $item_lantai)
		{

			$data_keterangan   = $key_bangunan."__".$i." ".$key_bangunan;
			$data_value_teras  = (array_key_exists("747", $data_lokasi) && (array_key_exists($data_keterangan, $data_lokasi[747])) ? $data_lokasi[747][$data_keterangan] : 0);
			$data_value_balkon = (array_key_exists("748", $data_lokasi) && (array_key_exists($data_keterangan, $data_lokasi[748])) ? $data_lokasi[748][$data_keterangan] : 0);


			$luas_teras        = $luas_teras + $data_value_teras;
			$luas_balkon       = $luas_balkon + $data_value_balkon;
			$i++;
		}

		$type_bangunan        = (array_key_exists("635", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[635]) ? $data_lokasi[635][$key_bangunan] : "");
		$luas_bangunan        = (array_key_exists("639", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[639]) ? $data_lokasi[639][$key_bangunan] : 0);
		$harga_bangunan       = (array_key_exists("744", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[744]) ? $data_lokasi[744][$key_bangunan] : 0);
		$brb_bangunan         = $luas_bangunan * $harga_bangunan;
		$nilai_pasar_bangunan = (array_key_exists("745", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[745]) ? $data_lokasi[745][$key_bangunan] : 0) * $luas_bangunan;
		$liquidasi_bangunan   = $nilai_pasar_bangunan * 70 / 100;
	?>

	<div class="page">
		<div class="title">PENILAIAN BANGUNAN  <?=$a_bangunan?></div>
		<br /><br />
		
		<div class="panel">
			<div class="panel-heading-blue">OBJEK PENILAIAN</div>
			<div class="panel-content">
				<table style="width: 100%;">
					<tr>
						<td align="left">
							<?php echo $kertas_kerja->debitur ?>
						</td>
						<td align="right">
							Tanggal Inspeksi  :  <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][0] : 0)?>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							Alamat Obyek  :<br />
							<?php echo $kertas_kerja->alamat_properti ?>
						</td>
						
					</tr>
				</table>
			</div>
		</div>

		<div class="panel">
			<div class="panel-heading-blue">OBJEK PENILAIAN</div>
			<div class="panel-content">
				<table style="width: 100%;" >
					<tr>
						<td valign="top" align="left" style="width: 350px;">
							<table>
								<tr>
									<td>Tipe Bangunan</td>
									<td valign="top">:</td>
									<td><?=(array_key_exists("635", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[635])) ? $data_lokasi[635][$key_bangunan] : "")?></td>
								</tr>
							</table>
						</td>
						<td valign="top" width="50%" align="left">
							<table>
								<tr>
									<td>Penggunaan saat ini</td>
									<td valign="top">:</td>
									<td><?=(array_key_exists("636", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[636])) ? $data_lokasi[636][$key_bangunan] : "")?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="panel">
			<div class="panel-heading-blue">LUAS PENGUKURAN FISIK BANGUNAN <?=(array_key_exists("635", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[635])) ? $data_lokasi[635][$key_bangunan] : "")?></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td valign="top">
					<table class="table-1" cellpadding="0" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>
									Ruangan
								</th>

								<?php
								foreach($list_ruangan as $item_ruangan)
								{
									?>
									<th>
										<?=$item_ruangan?>
									</th>
									<?php
								}
								?>
								<th>
									Jumlah Luas (m
									<sup>
										2
									</sup>)
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$luas_lantai_total = 0;
							$i                 = 1;
							foreach($list_lantai as $item_lantai)
							{
								$luas_lantai = 0;

								?>

								<tr>
									<td align="left">
										<span>
											<?=$item_lantai?>
										</span>
									</td>
									<?php
									$a           = 1;
									foreach($list_ruangan as $item_ruangan)
									{
										$data_keterangan = $key_bangunan."__".$i."__".$a." ".$key_bangunan;
										$data_value      = (array_key_exists("637", $data_lokasi) && (array_key_exists($data_keterangan, $data_lokasi[637])) ? $data_lokasi[637][$data_keterangan] : 0);
										?>
										<td align="right">
											<span>
												<?=$data_value?>
											</span>
										</td>
										<?php
										$luas_lantai     = $luas_lantai + $data_value;
										$a++;
									}
									?>
									<td align="right">
										<span>
											<?=$luas_lantai?>
										</span>
									</td>
								</tr>
								<?php

								$luas_lantai_total = $luas_lantai_total + $luas_lantai;
								$i++;
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="<?=(count($list_ruangan) + 1)?>" align="right">
									<span>
										TOTAL LUAS PENGUKURAN FISIK BANGUNAN <?=(array_key_exists("635", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[635])) ? $data_lokasi[635][$key_bangunan] : "")?>
									</span>
								</td>
								<td align="right">
									<span>
										<?=$luas_lantai_total?>
									</span>
								</td>
							</tr>
						</tfoot>
					</table>
				</td>
			</tr>

			<tr>
				<td valign="top">
					<table class="table-1" cellpadding="0" cellspacing="0" width="90%">
						<thead>
							<tr>
								<th>
									Teras (m
									<sup>
										2
									</sup>)
								</th>
								<th>
									Balkon (m
									<sup>
										2
									</sup>)
								</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$luas_teras = 0;
							$luas_balkon= 0;
							$i          = 1;
							foreach($list_lantai as $item_lantai)
							{

								$data_keterangan   = $key_bangunan."__".$i." ".$key_bangunan;
								$data_value_teras  = (array_key_exists("747", $data_lokasi) && (array_key_exists($data_keterangan, $data_lokasi[747])) ? $data_lokasi[747][$data_keterangan] : 0);
								$data_value_balkon = (array_key_exists("748", $data_lokasi) && (array_key_exists($data_keterangan, $data_lokasi[748])) ? $data_lokasi[748][$data_keterangan] : 0);

								?>

								<tr>
									<td align="right">
										<span>
											<?=$data_value_teras?>
										</span>
									</td>
									<td align="right">
										<span>
											<?=$data_value_balkon?>
										</span>
									</td>
								</tr>
								<?php

								$luas_teras        = $luas_teras + $data_value_teras;
								$luas_balkon       = $luas_balkon + $data_value_balkon;
								$i++;
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<td align="right">
									<span>
										<?=$luas_teras?>
									</span>
								</td>
								<td align="right">
									<span>
										<?=$luas_balkon?>
									</span>
								</td>
							</tr>
						</tfoot>
					</table>
				</td>
			</tr>
		</table>

		<br />
		<div class="panel">
			<div class="panel-heading">INFORMASI DINAS TATAKOTA <?=(array_key_exists("23", $data_lokasi) ? strtoupper($data_lokasi[23][0]) : "")?></div>
			<div class="panel-content">
				<b>Ijin Mendirikan Bangunan (IMB)</b>
				<table style="width: 100%;" >
					<tr>
						<td valign="top" align="left" style="width: 220px;">
							<table>
								<tr>
									<td>
										Nomor
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("640", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[640])) ? $data_lokasi[640][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Jumlah Lantai
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("641", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[641])) ? $data_lokasi[641][$key_bangunan] : "-")?>
									</td>
								</tr>
							</table>
						</td>
						<td valign="top" align="left" style="width: 220px;">
							<table>
								<tr>
									<td>
										Tanggal
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("642", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[642])) ? $data_lokasi[642][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Total Luas IMB
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("643", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[643])) ? $data_lokasi[643][$key_bangunan] : "-")?>
									</td>
								</tr>
							</table>
						</td>
						<td valign="top" align="left" style="width: 220px;">
							<table>
								<tr>
									<td>
										Perbedaan Luas Fisik dengan Luas IMB
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("644", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[644])) ? $data_lokasi[644][$key_bangunan] : "-")?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="panel">
			<div class="panel-content">
				<b>Rencana Detail Tata Ruang (RDTR)</b>
				<table style="width: 100%;" >
					<tr>
						<td valign="top" align="left" style="width: 220px;">
							<img src="<?=base_url()?>asset/images/peruntukan_zoning.png" style="width: 90%">
						</td>
						<td valign="top" align="left" style="width: 440px;">
							<table>
								<tr>
									<td>
										Peruntukan / Zoning
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("645", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[645])) ? $data_lokasi[645][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Ketinggian Bangunan (KB)
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("646", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[646])) ? $data_lokasi[646][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Tipe Massa Bangunan (TMB)
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("647", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[647])) ? $data_lokasi[647][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Koefisien Dasar Bangunan (KDB)
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("648", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[648])) ? $data_lokasi[648][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Koefisien Lantai Bangunan (KLB)
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("649", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[649])) ? $data_lokasi[649][$key_bangunan] : "-")?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="panel">
			<div class="panel-content">
				<b>Pemotongan luas bangunan karena melanggar peraturan / ketentuan dan rencana tata ruang yang berlaku, adalah sbb :</b>
				<table style="width: 100%;" >
					<tr>
						<td valign="top" align="left" style="width: 330px;">
							<table>
							<tr>
								<td>
									Melanggar Ketinggian Bangunan
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("650", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[650])) ? $data_lokasi[650][$key_bangunan] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Pembangunan / pelebaran jalan
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("651", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[651])) ? $data_lokasi[651][$key_bangunan] : "-")?>
								</td>
							</tr>
							</table>
						</td>
						<td valign="top" align="left" style="width: 330px;">
							<table>
								<tr>
									<td>
										Garis Sempadan Bangunan (GSB)
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("652", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[652])) ? $data_lokasi[652][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Garis Sempadan Sungai (GSS)
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("653", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[653])) ? $data_lokasi[653][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										TOTAL LUAS BANGUNAN YANG TERPOTONG
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("654", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[654])) ? $data_lokasi[654][$key_bangunan] : "-")?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
		
		<br />
		<div class="panel">
			<div class="panel-heading-blue">KETERANGAN UMUM BANGUNAN</div>
			<div class="panel-content">
				<table style="width: 100%;" >
					<tr>
						<td valign="top" align="left" style="width: 330px;">
							<table>
								<tr>
									<td>
										Arsitektur bangunan
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("655", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[655])) ? $data_lokasi[655][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Tahun dibangun
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("656", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[656])) ? $data_lokasi[656][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Tahun direnovasi
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("657", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[657])) ? $data_lokasi[657][$key_bangunan] : "-")?>
									</td>
								</tr>
							</table>
						</td>
						<td valign="top" align="left" style="width: 330px;">
							<table>
								<tr>
									<td>
										<b>
											Tinggi halaman, terhadap
										</b>
									</td>
									<td>
									</td>
									<td>
									</td>
								</tr>
								<tr>
									<td>
										Lantai bangunan utama
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("658", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[658])) ? $data_lokasi[658][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Jalan di depan properti
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("659", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[659])) ? $data_lokasi[659][$key_bangunan] : "-")?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
		
		<br />
		<div class="panel">
			<div class="panel-heading-blue">SPESIFIKASI ELEMEN BANGUNAN</div>
			<div class="panel-content">
				<table style="width: 100%;" >
					<tr>
						<td valign="top" align="left" style="width: 330px;">
							<table>
								<tr>
									<td>
										Pondasi
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("660", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[660])) ? $data_lokasi[660][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Struktur
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("661", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[661])) ? $data_lokasi[661][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Rangka Atap
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("662", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[662])) ? $data_lokasi[662][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Penutup Atap
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("663", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[663])) ? $data_lokasi[663][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Plafond
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("664", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[664])) ? $data_lokasi[664][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Dinding
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("665", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[665])) ? $data_lokasi[665][$key_bangunan] : "-")?>
									</td>
								</tr>
							</table>
						</td>
						<td valign="top" align="left" style="width: 330px;">
							<table>
								<tr>
									<td>
										Partisi Ruangan
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("666", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[666])) ? $data_lokasi[666][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Kusen
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("667", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[667])) ? $data_lokasi[667][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Pintu & Jendela
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("668", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[668])) ? $data_lokasi[668][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Lantai
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("669", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[669])) ? $data_lokasi[669][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Tangga
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("670", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[670])) ? $data_lokasi[670][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Pagar Halaman
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("671", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[671])) ? $data_lokasi[671][$key_bangunan] : "-")?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
		
		<br />
		<div class="panel">
			<div class="panel-heading-blue">FASILITAS / SARANA PELENGKAP KESELURUHAN PADA AREAL PROPERTI</div>
			<div class="panel-content">
				<table style="width: 100%;" >
					<tr>
						<td valign="top" align="left" style="width: 330px;">
							<table>
							<tr>
								<td>
									Saluran listrik PLN
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("672", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[672])) ? $data_lokasi[672][$key_bangunan] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Sambungan telepon
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("673", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[673])) ? $data_lokasi[673][$key_bangunan] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Jaringan air bersih
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("674", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[674])) ? $data_lokasi[674][$key_bangunan] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Pendingin ruangan
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("675", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[675])) ? $data_lokasi[675][$key_bangunan] : "-")?>,
									<?=(array_key_exists("676", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[676])) ? $data_lokasi[676][$key_bangunan] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Pemanas air
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("677", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[677])) ? $data_lokasi[677][$key_bangunan] : "-")?>,
									<?=(array_key_exists("678", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[678])) ? $data_lokasi[678][$key_bangunan] : "-")?>

								</td>
							</tr>
							</table>
						</td>
						<td valign="top" align="left" style="width: 330px;">
							<table>
								<tr>
									<td>
										Penangkal petir
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("679", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[679])) ? $data_lokasi[679][$key_bangunan] : "-")?>,
										<?=(array_key_exists("680", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[680])) ? $data_lokasi[680][$key_bangunan] : "-")?>

									</td>
								</tr>
								<tr>
									<td>
										Kolam renang
									</td>
									<td>
										:
									</td>
									<td>
									<?=(array_key_exists("681", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[681])) ? $data_lokasi[681][$key_bangunan] : "-")?>,
									<?=(array_key_exists("682", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[682])) ? $data_lokasi[682][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Carport / area parkir
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("683", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[683])) ? $data_lokasi[683][$key_bangunan] : "-")?>,
										<?=(array_key_exists("684", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[684])) ? $data_lokasi[684][$key_bangunan] : "-")?>

									</td>
								</tr>
								<tr>
									<td>
										Pemagaran halaman
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("685", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[685])) ? $data_lokasi[685][$key_bangunan] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Keadaan halaman
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("686", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[686])) ? $data_lokasi[686][$key_bangunan] : "-")?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
		
		<br />
		<div class="panel">
			<div class="panel-heading-blue">KESIMPULAN NILAI BANGUNAN <?=(array_key_exists("635", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[635])) ? $data_lokasi[635][$key_bangunan] : "")?></div>
			<div class="panel-content">
				<table style="width: 100%;" >
					<tr>
						<td valign="top" align="left" style="width: 330px;">
							<table class="" cellpadding="0" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th colspan="3" align="left">INFORMASI NJOP BANGUNAN</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>NJOP Tanggal</td>
										<td>:</td>
										<td><?=(array_key_exists("687", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[687])) ? $data_lokasi[687][$key_bangunan] : "-")?></td>
									</tr>
									<tr>
										<td>Bangunan  ( / m<sup>2</sup> )</td>
										<td>:</td>
										<td><?=(array_key_exists("688", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[688])) ? number_format($data_lokasi[688][$key_bangunan]) : "-")?></td>
									</tr>
								</tbody>
							</table>
						</td>
						<td valign="top" align="left" style="width: 330px;">
							<table class="" cellpadding="0" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th colspan="3" align="left">BERDASARKAN FISIK</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>NILAI PASAR</td>
										<td>:</td>
										<td><?=(array_key_exists("689", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[689])) ? number_format($data_lokasi[689][$key_bangunan]) : "-")?></td>
									</tr>
									<tr>
										<td>INDIKASI NILAI LIKUIDASI</td>
										<td>:</td>
										<td><?=(array_key_exists("690", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[690])) ? number_format($data_lokasi[690][$key_bangunan]) : "-")?></td>
									</tr>
								</tbody>
							</table>
							<br />
							<table class="" cellpadding="0" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th colspan="3" align="left">BERDASARKAN PERATURAN TATA KOTA SETEMPAT</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>NILAI PASAR</td>
										<td>:</td>
										<td><?=(array_key_exists("691", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[691])) ? number_format($data_lokasi[691][$key_bangunan]) : "-")?></td>
									</tr>
									<tr>
										<td>INDIKASI NILAI LIKUIDASI</td>
										<td>:</td>
										<td><?=(array_key_exists("692", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[692])) ? number_format($data_lokasi[692][$key_bangunan]) : "-")?></td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
		
		<br />
		<div class="panel">
			<div class="panel-heading-blue">CATATAN PENILAI</div>
			<div class="panel-content">
				<p><?=(array_key_exists("693", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[693])) ? $data_lokasi[693][$key_bangunan] : "-")?></p>
			</div>
		</div>
	</div>
	<?php
		$i_bangunan++;
		$a_bangunan++;
	}//END FOREACH_1
	?>

	<div class="page" style="page-break-before: always;">
		<div class="title">PERHITUNGAN NILAI PASAR BANGUNAN & SARANA PELENGKAP</div>
		<br /><br />
		<div class="panel">
			<div class="panel-content">
				<table style="width: 100%;" >
					<tr>
						<td align="left">
							<?php echo $kertas_kerja->debitur ?>
						</td>
						<td align="right">
							Tanggal Inspeksi  :  <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][0] : 0)?>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							Alamat Obyek  :<br />
							<?php echo $kertas_kerja->alamat_properti ?>
						</td>
						
					</tr>
				</table>
			</div>
		</div>

		<?php
		$i_bangunan = 1;
		foreach($tab_bangunan as $key_bangunan => $item_bangunan)
		{
			$key_bangunan = str_replace(" ", "_", $key_bangunan);
	        $txn_bangunan = $this->global_model->get_list_array("txn_bangunan", "id_lokasi=\"$id_lokasi\" AND bangunan_role=\"$key_bangunan\"");
	        $txn_bangunan = (count($txn_bangunan)===0) ? array() : $txn_bangunan[0];
			$list_lantai  = $item_bangunan["lantai"];
			$list_ruangan = $item_bangunan["ruangan"];
			$luas_teras   = 0;
			$luas_balkon  = 0;
			$i            = 1;
			foreach($list_lantai as $item_lantai)
			{

				$data_keterangan   = $key_bangunan."__".$i." ".$key_bangunan;
				$data_value_teras  = (array_key_exists("747", $data_lokasi) && (array_key_exists($data_keterangan, $data_lokasi[747])) ? $data_lokasi[747][$data_keterangan] : 0);
				$data_value_balkon = (array_key_exists("748", $data_lokasi) && (array_key_exists($data_keterangan, $data_lokasi[748])) ? $data_lokasi[748][$data_keterangan] : 0);


				$luas_teras        = $luas_teras + $data_value_teras;
				$luas_balkon       = $luas_balkon + $data_value_balkon;
				$i++;
			}

			$type_bangunan        = (array_key_exists("635", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[635]) ? $data_lokasi[635][$key_bangunan] : "");
			$luas_bangunan        = (array_key_exists("639", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[639]) ? $data_lokasi[639][$key_bangunan] : 0);
			$harga_bangunan       = (array_key_exists("744", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[744]) ? $data_lokasi[744][$key_bangunan] : 0);
			$brb_bangunan         = $luas_bangunan * $harga_bangunan;
			$nilai_pasar_bangunan = (array_key_exists("745", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[745]) ? $data_lokasi[745][$key_bangunan] : 0) * $luas_bangunan;
			$liquidasi_bangunan   = $nilai_pasar_bangunan * 70 / 100;
		?>
		<table class="table width-720" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td rowspan="3" style="background-color: #010961; color: #fff; border-color: #010961; text-align: center; font-size: 32px; width: 60px;">
						<span>
							<?=$i_bangunan?>
						</span>
					</td>
					<td colspan="3" style="background-color: #010961; color: #fff; border-color: #010961;">
						<span>
							BANGUNAN <?=(array_key_exists("635", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[635])) ? $data_lokasi[635][$key_bangunan] : "")?>
						</span>
					</td>
					<td colspan="3" style="background-color: #010961; color: #fff; border-color: #010961; text-align: right;">
						<span>
							<i>
								( SESUAI KONDISI FISIK EKSISTING )
							</i>
						</span>
					</td>
				</tr>
				<tr>
					<td>
						<span>
							TAHUN DIBANGUN
						</span>
					</td>
					<td>
						<span>
							<?=(array_key_exists("656", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[656])) ? $data_lokasi[656][$key_bangunan] : "-")?>
						</span>
					</td>
					<td>
						<span>
							LUAS BANGUNAN UTAMA
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("639", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[639])) ? number_format($data_lokasi[639][$key_bangunan]) : "-")?> m
							<sup>
								2
							</sup>
						</span>
					</td>
					<td>
						<span>
							PENYUSUTAN  ( % )
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("740", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[740])) ? round($data_lokasi[740][$key_bangunan]) : "-")?> %
						</span>
					</td>
				</tr>
				<tr>
					<td>
						<span>
							TAHUN DIRENOVASI
						</span>
					</td>
					<td>
						<span>
							<?=(array_key_exists("657", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[657])) ? $data_lokasi[657][$key_bangunan] : "-")?>
						</span>
					</td>
					<td>
						<span>
							LUAS TERAS BANGUNAN
						</span>
					</td>
					<td align="right">
						<span>
							<?=$luas_teras?> m
							<sup>
								2
							</sup>
						</span>
					</td>
					<td>
						<span>
							KONDISI PROPERTI
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("741", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[741])) ? round($data_lokasi[741][$key_bangunan]) : "-")?> %
						</span>
					</td>
				</tr>
			</tbody>
		</table>

		<table class="table" cellspacing="0" cellpadding="0" style="margin-top: 5px;">
			<tr>
				<td colspan="5" style="background-color: #999; color: #fff; ; text-align: center;">
					<span>
						<i>
							PEMOTONGAN LUAS BANGUNAN KARENA MELANGGAR PERATURAN / KETENTUAN & RENCANA TATA RUANG YANG BERLAKU, <br />ADALAH SBB :
						</i>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						MELANGGAR KETINGGIAN BANGUNAN
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("650", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[650])) ? $data_lokasi[650][$key_bangunan] : "0")?> m
					</span>
				</td>
				<td rowspan="2">
					<span>
					</span>
				</td>
				<td>
					<span>
						GARIS SEMPADAN BANGUNAN (GSB)
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("652", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[652])) ? $data_lokasi[652][$key_bangunan] : "0")?> m
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						RENCANA PEMBANGUNAN / PELEBARAN JALAN
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("651", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[651])) ? $data_lokasi[651][$key_bangunan] : "0")?> m
					</span>
				</td>
				<td>
					<span>
						GARIS SEMPADAN SUNGAI (GSS)
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("653", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[653])) ? $data_lokasi[653][$key_bangunan] : "0")?> m
					</span>
				</td>
			</tr>
			<tr>
				<td colspan="4" style="background-color: #ddd; color: #333; text-align: right;">
					<span>
						TOTAL LUAS BANGUNAN "TERPOTONG"
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("654", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[654])) ? $data_lokasi[654][$key_bangunan] : "0")?> m
					</span>
				</td>
			</tr>
		</table>
		
		<table class="table" cellspacing="0" cellpadding="0" style="margin-top: 5px;">
			<tr>
				<td style="background-color: #010961; color: #fff; border-color: #010961;">
					<span>
						PENILAIAIN BANGUNAN <br /> <?=(array_key_exists("635", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[635])) ? $data_lokasi[635][$key_bangunan] : "")?>
					</span>
				</td>
				<td style="background-color: #010961; color: #fff; border-color: #010961; text-align: center;">
					<span>
						BRB / RCN <br />( Rp / m
						<sup>
							2
						</sup>)
					</span>
				</td>
				<td style="background-color: #010961; color: #fff; border-color: #010961; text-align: center;">
					<span>
						BRB / RCN <br />( Rp )
					</span>
				</td>
				<td style="background-color: #010961; color: #fff; border-color: #010961; text-align: center;">
					<span>
						NILAI PASAR <br />( Rp / m
						<sup>
							2
						</sup>)
					</span>
				</td>
				<td style="background-color: #010961; color: #fff; border-color: #010961; text-align: center;">
					<span>
						NILAI PASAR <br />( Rp )
					</span>
				</td>
				<td style="background-color: #010961; color: #fff; border-color: #010961; text-align: center;">
					<span>
						KONDISI <br />BANGUNAN
					</span>
				</td>
			</tr>
			<tr>
				<?php 
					$penyusutan_total = $txn_bangunan['kemunduran_fisik'] + $txn_bangunan['kondisi_terlihat'] + ((100 - ($txn_bangunan['kemunduran_fisik'])) * $txn_bangunan['keusangan_fungsional']) + ((100 - ($txn_bangunan['kemunduran_fisik'])) * $txn_bangunan['keusangan_ekonomis']);
					$kondisi_bangunan = 100-$penyusutan_total;
					$brb_rcn = $txn_bangunan['total_luas_btb']*$txn_bangunan['brb_rcn_permeter'];
					
					$nilai_pasar_m2 = $brb_rcn * (1-$penyusutan_total/100);

				?>
				<td style="background-color: #ddd; color: #333;">
					<span>
						SESUASI KONDISI FISIK EKSISTING
					</span>
				</td>
				<td align="right">
					<span>
						<?php echo number_format($txn_bangunan['brb_rcn_permeter']) ?>
					</span>
				</td>
				<td align="right">
					<span>
						<?php echo number_format($brb_rcn); ?>
					</span>
				</td>
				<td align="right">
					<span>
						<?php echo number_format($nilai_pasar_m2) ?>
					</span>
				</td>
				<td align="right">
					<span>
						<?php echo number_format($txn_bangunan['nilai_pasar']) ?>
					</span>
				</td>
				<td rowspan="2" style="background-color: #ddd; color: #333; text-align: center;">
					<span>
						<?php echo number_format($kondisi_bangunan) ?>
					</span>
					<span>%</span>
				</td>
			</tr>
			<?php
			$type_bangunan        = (array_key_exists("635", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[635]) ? $data_lokasi[635][$key_bangunan] : "");
			$luas_bangunan        = (array_key_exists("639", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[639]) ? $data_lokasi[639][$key_bangunan] : 0);
			$harga_bangunan       = (array_key_exists("744", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[744]) ? $data_lokasi[744][$key_bangunan] : 0);
			$brb_bangunan         = $luas_bangunan * $harga_bangunan;
			$nilai_pasar_bangunan = (array_key_exists("745", $data_lokasi) && array_key_exists($key_bangunan, $data_lokasi[745]) ? $data_lokasi[745][$key_bangunan] : 0) * $luas_bangunan;
			$liquidasi_bangunan   = $nilai_pasar_bangunan * 70 / 100;
			?>
			<tr style="display: none">
				<td style="background-color: #ddd; color: #333;">
					<span data-label="BERDASARKAN PERATURAN TATA KOTA SETEMPAT">
						BERDASARKAN PERATURAN <br />TATA KOTA SETEMPAT
					</span>
				</td>
				<td align="right">
					<span>
						<?=number_format($harga_bangunan)?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=number_format($brb_bangunan)?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("745", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[745])) ? number_format($data_lokasi[745][$key_bangunan]) : 0)?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=number_format($nilai_pasar_bangunan)?>
					</span>
				</td>
			</tr>
		</table>
		
		<?php
			$i_bangunan++;
		}
		?>
		
		<table class="table" cellspacing="0" cellpadding="0" style="margin-top: 30px;">
			<tr>
				<td align="center" colspan="4" style="background-color: #010961; color: #fff; border-color: #010961;">
					<span>
						KESELURUHAN SARANA PELENGKAP
					</span>
				</td>
			</tr>
			<tr>
				<td style="background-color: #ddd; color: #333;">
					<span>
						URAIAN SARANA PELENGKAP
					</span>
				</td>
				<td style="background-color: #ddd; color: #333;">
					<span>
						UNIT / LUAS
					</span>
				</td>
				<td style="background-color: #ddd; color: #333;">
					<span>
						BRB / RCN ( Rp / m
						<sup>
							2
						</sup>)
					</span>
				</td>
				<td style="background-color: #ddd; color: #333;">
					<span>
						NILAI PASAR( Rp )
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pemasangan instalasi listrik dari PLN
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("749", $data_lokasi) ? $data_lokasi[749][0] : "-")?> VA
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("751", $data_lokasi) ? number_format($data_lokasi[751][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("753", $data_lokasi) ? number_format($data_lokasi[753][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pemasangan jaringan line telepon dari TELKOM
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("754", $data_lokasi) ? $data_lokasi[754][0] : "-")?> unit
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("757", $data_lokasi) ? number_format($data_lokasi[757][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("759", $data_lokasi) ? number_format($data_lokasi[759][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pembuatan sumur bor / pantek + mesin pompa air + instalasi pemipaan
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("766", $data_lokasi) ? $data_lokasi[766][0] : "-")?> saluran
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("768", $data_lokasi) ? number_format($data_lokasi[768][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("770", $data_lokasi) ? number_format($data_lokasi[770][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pengadaan unit pendingin ruangan / Air Conditioner (AC) tipe split
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("777", $data_lokasi) ? $data_lokasi[777][0] : "-")?> unit
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("779", $data_lokasi) ? number_format($data_lokasi[779][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("781", $data_lokasi) ? number_format($data_lokasi[781][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pembuatan area parkir kendaraan / carport + canopy
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("783", $data_lokasi) ? $data_lokasi[783][0] : "-")?> m
						<sup>
							2
						</sup>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("785", $data_lokasi) ? number_format($data_lokasi[785][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("787", $data_lokasi) ? number_format($data_lokasi[787][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pembuatan perkerasan halaman dengan material / bahan batu alam
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("789", $data_lokasi) ? $data_lokasi[789][0] : "-")?> m
						<sup>
							2
						</sup>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("791", $data_lokasi) ? number_format($data_lokasi[791][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("793", $data_lokasi) ? number_format($data_lokasi[793][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pembuatan pintu pagar dengan material / bahan besi tempa
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("795", $data_lokasi) ? $data_lokasi[795][0] : "-")?> m
						<sup>
							2
						</sup>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("797", $data_lokasi) ? number_format($data_lokasi[797][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("799", $data_lokasi) ? number_format($data_lokasi[799][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pembuatan pagar halaman dengan material / bahan b. bata + besi tempa
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("801", $data_lokasi) ? $data_lokasi[801][0] : "-")?> m
						<sup>
							2
						</sup>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("803", $data_lokasi) ? number_format($data_lokasi[803][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("805", $data_lokasi) ? number_format($data_lokasi[805][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pengadaan unit pemanas air dengan tipe solar water heater
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("807", $data_lokasi) ? $data_lokasi[807][0] : "-")?> unit
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("809", $data_lokasi) ? number_format($data_lokasi[809][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("811", $data_lokasi) ? number_format($data_lokasi[811][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pengadaan unit penangkal petir konvensional
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("813", $data_lokasi) ? $data_lokasi[813][0] : "-")?> unit
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("815", $data_lokasi) ? number_format($data_lokasi[815][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("817", $data_lokasi) ? number_format($data_lokasi[817][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pembuatan Gapura
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("819", $data_lokasi) ? $data_lokasi[819][0] : "-")?> m
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("821", $data_lokasi) ? number_format($data_lokasi[821][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("823", $data_lokasi) ? number_format($data_lokasi[823][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pengadaan water toren + filter air
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("825", $data_lokasi) ? $data_lokasi[825][0] : "-")?> unit
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("827", $data_lokasi) ? number_format($data_lokasi[827][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("829", $data_lokasi) ? number_format($data_lokasi[829][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pembuatan kolam renang + pompa + pemipaan, dengan luas permukaan kolam
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("831", $data_lokasi) ? $data_lokasi[831][0] : "-")?>  m
						<sup>
							2
						</sup>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("833", $data_lokasi) ? number_format($data_lokasi[833][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("835", $data_lokasi) ? number_format($data_lokasi[835][0]) : "-")?>
					</span>
				</td>
			</tr>


			<tr>
				<td colspan="4">
					<span>
					</span>
				</td>
			</tr>
			<tr>
				<td style="background-color: #ddd; color: #333;" colspan="4">
					<span>
						BAGIAN SARANA PELENGKAP "TERPOTONG" PERATURAN & KETENTUAN YANG BERLAKU :
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Area parkir / carport
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("839", $data_lokasi) ? $data_lokasi[839][0] : "-")?> m
						<sup>
							2
						</sup>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("841", $data_lokasi) ? number_format($data_lokasi[841][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("843", $data_lokasi) ? number_format($data_lokasi[843][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Perkerasan halaman
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("845", $data_lokasi) ? $data_lokasi[845][0] : "-")?> m
						<sup>
							2
						</sup>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("847", $data_lokasi) ? number_format($data_lokasi[847][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("849", $data_lokasi) ? number_format($data_lokasi[849][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Pagar halaman
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("851", $data_lokasi) ? $data_lokasi[851][0] : "-")?> m
						<sup>
							2
						</sup>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("853", $data_lokasi) ? number_format($data_lokasi[853][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("855", $data_lokasi) ? number_format($data_lokasi[855][0]) : "-")?>
					</span>
				</td>
			</tr>
			<tr>
				<td>
					<span>
						Taman / landscaping
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("857", $data_lokasi) ? $data_lokasi[857][0] : "-")?> m
						<sup>
							2
						</sup>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("859", $data_lokasi) ? number_format($data_lokasi[859][0]) : "-")?>
					</span>
				</td>
				<td align="right">
					<span>
						<?=(array_key_exists("861", $data_lokasi) ? number_format($data_lokasi[861][0]) : "-")?>
					</span>
				</td>
			</tr>
		</table>

		<table class="table" cellspacing="0" cellpadding="0">
			<tr>
				<td align="center" style="background-color: #010961; color: #fff; border-color: #010961;">
					<span>
						PENILAIAN KESELURUHAN SARANA PELENGKAP
					</span>
				</td>
				<td align="center" style="background-color: #010961; color: #fff; border-color: #010961;">
					<span>
						BRB / RCN ( Rp )
					</span>
				</td>
				<td align="center" style="background-color: #010961; color: #fff; border-color: #010961;">
					<span>
						NILAI PASAR ( Rp )
					</span>
				</td>
			</tr>
			<tr>
				<td style="background-color: #ddd; color: #333;">
					<span>
						SESUASI KONDISI FISIK EKSISTING
					</span>
				</td>
				<td align="right">
					<?php echo number_format($sarana_pelengkap->brb_rcn) ?>
				</td>
				<td align="right">
					<?php echo number_format($sarana_pelengkap->nilai_pasar) ?>
				</td>
			</tr>

			<tr style="display: none">
				<td style="background-color: #ddd; color: #333;">
					<span>
						BERDASARKAN PERATURAN TATA KOTA SETEMPAT
					</span>
				</td>
				<td align="right">
					<?=number_format($brb_sp2)?>
				</td>
				<td align="right">
					<?=number_format($nilai_pasar_sp2)?>
				</td>
			</tr>
		</table>
	</div>
	<?php 
	} //ID_OBJEK 2 
	?>


	<div class="page" style="page-break-before: always;">
		<div class="title">PERHITUNGAN NILAI PASAR TANAH</div>

		<br /><br />

		<table class="table padding-td-3" cellspacing="0" cellpadding="0" style="" style="table-layout: fixed;">
			<colgroup>
				<col style="width: 20%">
				<col style="width: 20%">
				<col style="width: 20%">
				<col style="width: 20%">
				<col style="width: 20%">
			</colgroup>
			<thead>
			</thead>
			<tbody>
				<tr>
					<td style="background-color: #ddd; color: #333;">URAIAN</td>
					<td style="background-color: #ddd; color: #333;">OBYEK PENILAIAN</td>
					<td style="background-color: #ddd; color: #333;">DATA-1</td>
					<td style="background-color: #ddd; color: #333;">DATA-2</td>
					<td style="background-color: #ddd; color: #333;">DATA-3</td>
				</tr>
				<?php foreach($txn_data_banding[0] as $key => $value){
					if (!in_array($key, array("foto_1", "foto_2"))) continue;
						?>
				<tr>
					<td>
						<span><?php echo ucwords(str_replace("_", " ", $key)); ?></span>
					</td>
					<?php 
					for($i = 0; $i < count($txn_data_banding); $i++){
						$img_src = $txn_data_banding[$i]->{$key};
						if (!$img_src)
						{
							$img_src = "default.jpg";
						}
						?>
					<td style="background: url(<?php echo base_url() ?>asset/file/<?php echo $img_src; ?>) 50% 50% no-repeat; width: 144px; height: 144px;-webkit-print-color-adjust: exact;">
						<!-- <img src="<?php echo base_url() ?>asset/file/<?php echo $img_src; ?>" style="max-width: 100%"> -->
					</td>
					<?php } ?>
				</tr>
				<?php } ?>

				<tr>
					<td style="background-color: #ddd; color: #333;" colspan="5">INFORMASI</td>
				</tr>

				<?php 
				// echo "<div style='display:none'>";var_dump($txn_data_banding);echo"</div>"; 
				foreach($txn_data_banding[0] as $key => $value){
					if (!in_array($key, array("sumber_data_nama","sumber_data_keterangan","jenis_properti","alamat","latitude","longitude","jarak_dengan_objek","harga_penawaran","waktu_penawaran"))) continue;
					?>
				<tr>
					<td>
						<span><?php echo ucwords(str_replace("_", " ", $key)); ?></span>
					</td>
					<?php
					for($i = 0; $i < count($txn_data_banding); $i++){
						?>
					<?php if ($i===0){ ?>
					<td>
						<span></span>
					</td>
					<?php }elseif ($key == "harga_penawaran"){ ?>
					<td style="text-align: right;">
						<span style="float: left">Rp</span>
						<span><?php echo number_format($txn_data_banding[$i]->{$key}); ?></span>
					</td>
					<?php }elseif($key == "jarak_dengan_objek"){ ?>
					<td>
						<span><?php echo $txn_data_banding[$i]->{$key}; ?></span>
						<span> </span>
						<span>m</span>
					</td>
					<?php }else{ ?>
					<td>
						<span><?php echo $txn_data_banding[$i]->{$key}; ?></span>
					</td>
					<?php } ?>
					<?php } ?>
				</tr>
				<?php } ?>

				<tr>
					<td style="background-color: #ddd; color: #333;" colspan="5">SPESIFIKASI DATA</td>
				</tr>

				<?php foreach($txn_data_banding[0] as $key => $value){
					if (!in_array($key, array("dokumen_legalitas","luas_tanah","luas_bangunan","lebar_jalan","bentuk_tanah","letak_posisi_tanah","peruntukan","kondisi_existing_tanah","topografi"))) continue;
					?>
				<tr>
					<td>
						<span><?php echo ucwords(str_replace("_", " ", $key)); ?></span>
					</td>
					<?php for($i = 0; $i < count($txn_data_banding); $i++){ ?>
					<?php if ($key === "luas_tanah" || $key === "luas_bangunan"){ ?>
					<td>
						<span><?php echo $txn_data_banding[$i]->{$key}; ?></span>
						<span> </span>
						<span>m</span>
						<sup>2</sup>
					</td>
					<?php }else if ($key === "lebar_jalan"){ ?>
					<td>
						<span><?php echo $txn_data_banding[$i]->{$key}; ?></span>
						<span> </span>
						<span>m</span>
					</td>
					<?php }else{ ?>
					<td>
						<span><?php echo $txn_data_banding[$i]->{$key}; ?></span>
					</td>
					<?php } ?>
					<?php } ?>
				</tr>
				<?php } ?>

				<tr>
					<td style="background-color: #ddd; color: #333;" colspan="5">ANALISA DATA</td>
				</tr>

				<?php foreach($txn_data_banding[0] as $key => $value){
					if (!in_array($key, array("brb_bangunan","indikasi_nilai_pasar_bangunan_permeter","indikasi_nilai_pasar_bangunan","indikasi_nilai_pasar_tanah","indikasi_nilai_tanah_permeter"))) continue;
					?>
				<tr>
					<td>
						<span><?php echo ucwords(str_replace("_", " ", $key)); ?></span>
					</td>
					<td>
						<span></span>
					</td>
					<?php for($i = 0; $i < count($txn_data_banding); $i++){ 
						if ($i === 0) continue;
						?>
					<td style="text-align:right">
						<span style="float: left">Rp</span>
						<span><?php echo number_format($txn_data_banding[$i]->{$key}); ?></span>
					</td>
					<?php } ?>
				</tr>
				<?php } ?>

				<tr>
					<td style="background-color: #ddd; color: #333;" colspan="5">PENYESUAIAN</td>
				</tr>

				<?php foreach($txn_data_banding[0] as $key => $value){
					if (!in_array($key, array("lokasi_0","dokumen_legalitas_0","luas_tanah_0","lebar_kondisi_jalan_0","bentuk_tanah_0","posisi_tanah_sudut_0","posisi_tanah_tusuk_sate_0","peruntukan_0","topografi_0","waktu_penawaran_0","lain_lain_0","indikasi_nilai_tanah", "bobot_rekonsiliasi","indikasi_nilai_pasar_tanah_permeter"))) continue;
					?>
				<tr>
					<?php
					$key_nozero = explode("_", $key);
					array_pop($key_nozero);
					$key_nozero = implode("_", $key_nozero);
					if ($key == "indikasi_nilai_tanah"){ 
						?>
					<td style="text-align: right;background: #ddd; color: #333">
						<span><?php echo ucwords(str_replace("_", " ", $key)); ?></span>
					</td>
					<?php }else if ($key == "indikasi_nilai_pasar_tanah_permeter"){ ?>
					<td style="text-align: right;background: #ddd; color: #333">
						<span><?php echo ucwords(str_replace("_", " ", $key)); ?></span>
					</td>
					<?php }else{ ?>
					<td>
						<span><?php echo ucwords(str_replace("_", " ", $key_nozero)); ?></span>
					</td>
					<?php } ?>

					<?php if ($key == "bobot_rekonsiliasi"){ ?>
					<td style="text-align: center;">
						<span><?php echo $txn_data_banding[0]->{$key}; ?></span>
						<span>%</span>
					</td>
					<?php }else if ($key == "indikasi_nilai_tanah"){ ?>
					<td style="text-align: center;background: #ddd; color: #333">
						<span></span>
					</td>
					<?php }else if ($key == "indikasi_nilai_pasar_tanah_permeter"){ ?>
					<td style="text-align: center;background: #ddd; color: #333">
						<span style="float: left;">Rp</span>
						<span><?php echo number_format($txn_data_banding[0]->{$key}); ?></span>
					</td>
					<?php }else{ ?>
					<td style="text-align: center;">
						<span></span>
					</td>
					<?php } ?>

					<?php for($i = 0; $i < count($txn_data_banding); $i++){ 
						if ($i === 0) continue;
						?>
					<?php if ($key == "indikasi_nilai_tanah"){ ?>
					<td style="text-align: right;background: #ddd; color: #333">
						<span style="float: left;">Rp</span>
						<span><?php echo number_format($txn_data_banding[$i]->{$key}); ?></span>
					</td>
					<?php }else if ($key == "indikasi_nilai_pasar_tanah_permeter"){ ?>
					<td style="text-align: right;background: #ddd; color: #333">
						<span style="float: left;">Rp</span>
						<span><?php echo number_format($txn_data_banding[$i]->{$key}); ?></span>
					</td>
					<?php } else { ?>
					<td style="text-align: center">
						<span><?php echo (!$txn_data_banding[$i]->{$key}) ? 0 : $txn_data_banding[$i]->{$key}; ?></span>
						<span>%</span>
					</td>
					<?php } ?>
					<?php } ?>
				</tr>
				<?php } ?>
				<tr style="">
					<td style="background: #aaa; font-size: 13px">Pembulatan</td>
					<td style="background: #aaa; font-size: 13px" colspan="4">
						<span style="float: left;">Rp</span>
						<span><?php echo number_format(round($txn_data_banding[0]->indikasi_nilai_pasar_tanah_permeter,-5)); ?></span>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="page" style="page-break-before: always;">
		<div class="panel">
			<div class="panel-content">
				<table cellspacing="0" cellpadding="0" style="" >
					<tr>
						<td style="padding: 10px; font-size: 16px;" align="center">
							LAMPIRAN 1<br />
							FOTO-FOTO PROPERTI
						</td>
						<td style="padding: 10px;">
							
							<table>
								<tr>
									<td align="left">
										<?php echo $kertas_kerja->debitur ?>
									</td>
									<td align="right">
										Tanggal Inspeksi  : <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][0] : 0)?>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="width: 500px;">
										Alamat Obyek  :<br />
										<?php echo $kertas_kerja->alamat_properti ?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="panel">
			<div class="panel-content">
				<table style="width: 100%;" align="center" >
					<?php
						$ii = 0;
						for ($i=0; $i < count($list_image_lampiran)/2; $i++)
						{
							$item_image = $list_image_lampiran[$ii];
	                        $multi_ket        = explode("##", $item_image->keterangan);
	                        $multi_file       = $item_image->jawab;
	                        $multi_urut       = $multi_ket[0];
	                        $multi_keterangan = $multi_ket[1];
					?>
					<tr>
						<td valign="top" align="center" style="width: 330px;">
							<img src="<?=base_url("asset/file/".$multi_file)?>" style="height: 200px; width: auto; margin-bottom: 10px;"/><br />
							<div style="font-weight: bold">Keterangan : </div>
							<?=$multi_keterangan?>
						</td>
						<?php $ii++ ?>

						<?php
							$item_image = $list_image_lampiran[$ii];
	                        $multi_ket        = explode("##", $item_image->keterangan);
	                        $multi_file       = $item_image->jawab;
	                        $multi_urut       = $multi_ket[0];
	                        $multi_keterangan = $multi_ket[1];
						?>

						<td valign="top" align="center" style="width: 330px;">
							<img src="<?=base_url("asset/file/".$multi_file)?>" style="height: 200px; width: auto; margin-bottom: 10px;"/><br />
							<div style="font-weight: bold">Keterangan : </div>
							<?=$multi_keterangan?>
						</td>
						<?php $ii++ ?>
					</tr>
					<?php
							
							// if ($i % 2 == 0)
							// {
							// 	echo "</tr>";
							// 	if ($i != count($list_image_lampiran)){
							// 		echo "<tr>";
							// 	}
								
							// }
							
							// $i++;
						}
					?>
				</table>
			</div>
		</div>
	</div>

	<div class="page" style="page-break-before: always;">
		<div class="panel">
			<div class="panel-content">
				<table cellspacing="0" cellpadding="0" style="" >
					<tr>
						<td style="padding: 10px; font-size: 14x;" align="center">
							LAMPIRAN 2<br />
							DENAH TANAH - BANGUNAN <br />& PETA LOKASI PROPERTI	
						</td>
						<td style="padding: 10px;">
							
							<table>
								<tr>
									<td align="left"><?=(array_key_exists("249", $data_lokasi) ? $data_lokasi[249][0] : 0)?></td>
									<td align="right">
										Tanggal Inspeksi  : <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][0] : 0)?>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="width: 500px;">
										Alamat Obyek  :<br />
										<?php echo $kertas_kerja->alamat_properti ?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>
		
		<div class="panel">
			<div class="panel-content">

				<?php foreach ($txn_lampiran as $item_txn_lampiran){ ?>
					<?php if($item_txn_lampiran->jenis_lampiran == "Layout Properti"){ ?>

					<b>DENAH TANAH & BANGUNAN</b><br />
					
					<img src="<?php echo base_url()."asset/file/".$item_txn_lampiran->lampiran ?>" style="width: 500px"/>
					<br /><br />
					<?php }else if($item_txn_lampiran->jenis_lampiran == "Peta Lokasi Properti"){ ?>
					
					<b>PETA LOKASI PROPERTI & DATA PEMBANDING</b><br />
					
					<img src="<?php echo base_url()."asset/file/".$item_txn_lampiran->lampiran ?>" style="width: 500px"/>
					<br /><br />
					<?php } ?>

				<?php } ?>
			</div>
		</div>	
	</div>

	<div class="page" style="page-break-before: always;">
		<div class="panel">
			<div class="panel-content">
				<table cellspacing="0" cellpadding="0" style="" >
					<tr>
						<td style="padding: 10px; font-size: 14px;" align="center">
							LAMPIRAN 3<br />
							INFORMASI <br />DINAS TATAKOTA	
						</td>
						<td style="padding: 10px;">
							
							<table>
								<tr>
									<td align="left">
										<?php echo $kertas_kerja->debitur ?>
									</td>
									<td align="right">
										Tanggal Inspeksi  : <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][0] : 0)?>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="width: 500px;">
										Alamat Obyek  :<br />
										<?php echo $kertas_kerja->alamat_properti ?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
		</div>

		<div class="panel">
			<div class="panel-content">
				<!-- <b>INFORMASI DINAS TATA KOTA</b><br />
				<img src="<?=(array_key_exists("893", $data_lokasi) ? base_url()."asset/file/".$data_lokasi[893][0] : base_url()."asset/file/default.jpg")?>" style="width: 500px"/>
				<br /><br /> -->

				<?php foreach ($txn_lampiran as $item_txn_lampiran){ ?>
					<?php if($item_txn_lampiran->jenis_lampiran == "Keterangan Tata Kota"){ ?>

					<b>INFORMASI DINAS TATA KOTA</b><br />

					<img src="<?php echo base_url()."asset/file/".$item_txn_lampiran->lampiran ?>" style="width: 500px"/>
					<br /><br />
					<?php } ?>
				<?php } ?>

			</div>
		</div>
	</div>

</div>

<script src="<?=base_url()?>asset/beeanca/assets/js/jquery.min.js"></script>
<script type="text/javascript">
	// $("body").append("<div class=\"page\"></div>");
</script>
</body>
</html>