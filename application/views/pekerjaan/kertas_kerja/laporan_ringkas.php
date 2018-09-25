<style type="text/css">
	.page
	{
		width: 710px;
		font-size: 10px;
		/*border: 2px solid #ff0000;*/
	}

	.title
	{
		width: 50%;
		background-color: #010961;
		color: #ffffff;
		padding: 5px 10px 5px 10px;
		font-size: 16pt ;
	}

	.title-memo
	{
		font-size: 11px;
		font-style: italic;
		margin: 5px;
	}

	.content
	{
		margin-top: 20px;
		font-size: 12px;
	}

	.bank
	{
		font-size: 16pt;
		color: #1602d0;
		text-decoration: underline;
		margin-top: 20px;
		margin-bottom: 20px;
	}

	.panel
	{
		border: 1px dotted #ccc;
		padding: 0px;
		width: 720px;
		font-size: 10px;
	}

	.panel-heading
	{
		background-color: #eee;
		padding: 10px;
		font-size: 10px;
		font-weight: bold;
	}

	.panel-heading-blue
	{
		background-color: #010961;
		padding: 10px;
		font-size: 12px;
		font-weight: bold;
		color: #fff;
		text-align: center;
	}

	.panel-content
	{
		padding: 10px;
	}

	/*table{
	font-size: 11px;
	table-layout: fixed;
	}

	td{
	word-wrap: break-word;
	vertical-align: top;
	}*/

	.table
	{
		font-size: 10px;
		/*width: 100%;*/
		width: 720px;
		border-right: 1px dotted ;
		border-bottom: 1px dotted ;

	}
	.table th
	{
		font-size: 10px;
		border-left: 1px dotted ;
		border-top: 1px dotted ;
		background-color: #010961;
		color: #ffffff;
		padding: 2px 10px;
	}

	.table-1 td
	{
		font-size: 10px;
		vertical-align: top;
		border-left: 1px dotted ;
		border-top: 1px dotted ;
		padding: 2px 10px;
	}
	
	.table-1
	{
		font-size: 10px;
		/*width: 100%;*/
		width: 720px;
		border-right: 1px dotted ;
		border-bottom: 1px dotted ;

	}
	.table-1 thead th
	{
		font-size: 10px;
		border-left: 1px dotted ;
		border-top: 1px dotted ;
		background-color: #666;
		color: #ffffff;
		padding: 2px 10px;
	}
	.table-1 tfoot td
	{
		font-size: 9px;
		border-left: 1px dotted ;
		border-top: 1px dotted ;
		background-color: #ccc;
		color: #333;
		padding: 2px 10px;
	}

	.table td
	{
		font-size: 10px;
		vertical-align: top;
		border-left: 1px dotted ;
		border-top: 1px dotted ;
		padding: 2px 10px;
	}
	
	li{
		margin-left: 0px;
	}
</style>

<body>

	<?php
		$custom_data    = unserialize($lokasi->custom_data);
		$data_legalitas = $custom_data["data_legalitas"];
	?>


	<div class="title">LAPORAN PENILAIAN PROPERTI</div>
	<div class="title-memo">Laporan ini terdiri dari dari 17 (tujuh belas) lembar yang tidak terpisahkan.</div>

	<div class="bank"><?=$data_lokasi[17][null]?></div>
	
	<br />
	<strong>I. SURAT PERINTAH KERJA (SPK) PENILAIAN</strong>
	<br /><br />
	
	<!--Panel-->
	<div class="panel">
		<div class="panel-content">
			<table  border="0" style="max-width: 680px;width: 680px;">
				<tr>
					<td>
						Perusahaan Jasa Penilai
					</td>
					<td width="20" align="center">
						:
					</td>
					<td>
						<span style="color: #1602d0;">
							KJPP ZUCHRI &amp; REKAN
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
						Sentra Arteri Mas Building, Jl. Sultan Iskandar Muda Kav. 10V (Arteri Pondok Indah)<br/>Kebayoran Lam, Jakarta 12240
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
						<?=$data_lokasi[1][null]?>
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
						<?=$data_lokasi[3][null]?>
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
						<?=$data_lokasi[5][null]?>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						&nbsp;
					</td>
				</tr>
				<tr>
					<td colspan="3">
						Dengan ini di tugaskan untuk melakukan penilaian (appraisal) atas aset / properti, sebagai berikut:
					</td>
				</tr>
				<tr>
					<td>
						Jenis Obyek
					</td>
					<td width="20" align="center">
						:
					</td>
					<td>
						<strong>
							<?=$lokasi->nama_jenis_objek?>
						</strong>
					</td>
				</tr>
				<tr>
					<td valign="top">
						Alamat Obyek
					</td>
					<td width="20" align="center">
						:
					</td>
					<td valign="top">
						<strong>
							<?=str_replace("Kota", "<br />Kota", str_replace("Kab.", "<br />Kab.",  $data_lokasi[277][0]))?>
						</strong>
					</td>
				</tr>
				<tr>
					<td>
						Tujuan Penilaian
					</td>
					<td width="20" align="center">
						:
					</td>
					<td>
						<strong>
							<?=$data_lokasi[28][null]?>
						</strong>
					</td>
				</tr>
				<tr>
					<td>
						Tanggal Penilaian
					</td>
					<td width="20" align="center">
						:
					</td>
					<td>
						<strong>
							<?=$data_lokasi[9][null]?>
						</strong>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						&nbsp;
					</td>
				</tr>
				<tr>
					<td colspan="3">
						Persetujuan pemilik aset dan waktu penilaian aset yang disepakati:
					</td>
				</tr>
				<tr>
					<td>
						Calon Nasabah / Debitur
					</td>
					<td width="20" align="center">
						:
					</td>
					<td>
						<strong>
							<span style="color: #1602d0;">
								<?=$data_lokasi[249][0]?>
							</span>
						</strong>
					</td>
				</tr>
				<tr>
					<td>
						Telephon / HP.
					</td>
					<td width="20" align="center">
						:
					</td>
					<td>
						<strong>
							<?=$data_lokasi[8][null]?>
						</strong>
					</td>
				</tr>
				<tr>
					<td>
						No.Laporan
					</td>
					<td width="20" align="center">
						:
					</td>
					<td>
						<strong>
							<?=$data_lokasi[15][null]?>
						</strong>
					</td>
				</tr>
				<tr>
					<td>
						Tanggal Laporan
					</td>
					<td width="20" align="center">
						:
					</td>
					<td>
						<strong>
							<?=$data_lokasi[12][null]?>
						</strong>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<!--Panel-->
	<div class="panel" style="border-top: 0px;">
		<div class="panel-content" style="padding: 0px;">
			<table  border="0" style="max-width: 720px; width: 720px;">
				<tr>
					<td style="width: 50%; padding: 10px;border-right: 1px dotted #ccc;">
						<table border="0" width="100%">
							<tr>
								<td colspan="3">
									<strong>
										Penunjukan Atas Nama <?=$data_lokasi[17][null]?>
									</strong>
								</td>
							</tr>
							<tr>
								<td width="15%">
									Cabang
								</td>
								<td width="20" align="center">
									:
								</td>
								<td>
									<?=(array_key_exists("19", $data_lokasi) ? $data_lokasi[19][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Nomor
								</td>
								<td width="20" align="center">
									:
								</td>
								<td>
									<?=(array_key_exists("24", $data_lokasi) ? $data_lokasi[24][null] : "-")?>
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
									<?=(array_key_exists("26", $data_lokasi) ? $data_lokasi[26][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Nama
								</td>
								<td width="20" align="center">
									:
								</td>
								<td>
									<?=(array_key_exists("20", $data_lokasi) ? $data_lokasi[20][null] : "-")?>
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
									<?=(array_key_exists("22", $data_lokasi) ? $data_lokasi[22][null] : "-")?>
								</td>
							</tr>
						</table>

					</td>
					<td style="width: 50%; padding: 10px;">
						<table border="0">
							<tr>
								<td>
									<span style="text-decoration: underline; font-style: italic;">
										Informasi Tambahan:
									</span>

								</td>
							</tr>
							<tr>
								<td >
									<textarea rows="5" style="width: 300px">
									</textarea>

								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<br /><br />
	<!--Panel-->
	<div class="panel">
		<div class="panel-heading">DEFINISI DAN ISTILAH NILAI YANG DIGUNAKAN</div>
		<div class="panel-content">
			<strong>
				NILAI PASAR (MARKET VALUE)
			</strong>
			<p>
				<i>
					"Estimasi sejumlah uang yang dapat diperoleh dari hasil penukaran suatu aset atau liabilitas pada tanggal penilaian, antara pembeli yang berminat membeli dengan penjual yang berminat menjual, dalam suatu transaksi bebas ikatan, yang pemasarannya dilakukan secara layak, dimana kedua pihak masing-masing bertindak atas dasar pemahaman yang dimilikinya, kehati-hatian dan tanpa paksaan." (SPI 101;butir 3.1-Edisi VI 2015)
				</i>
			</p>

			<strong>
				NILAI LIKUIDASI
			</strong>
			<p>
				<i>
					"Sejumlah uang yang mungkin diterima dari penjualan suatu aset dalam jangka waktu yang relatif pendek untuk dapat memenuhi jangka waktu pemasaran dalam definisi Nilai Pasar. Pada beberapa situasi, Nilai Likuidasi dapat melibatkan penjualan yang tidak berminat menjual, dan pembeli yang membeli dengan mengetahui situasi yang tidak menguntungkan penjual."(SPI 102;butir 3.7.1-Edisi VI 2015)
				</i>
			</p>

			<strong>
				PENGGUNAAN TERBAIK DAN TERTINGGI(HIGHEST AND BEST USE / HBU)
			</strong>
			<p>
				<i>
					"Penggunaan yang paling mungkin dan optimal dari suatu aset, yang secara fisik dimungkinkan, telah dipertimbangkan secara memadai, secara hukum diijinkan, secara finansial layak, dan menghasilkan nilai tertinggi dari aset tersebut." (SPI KPUP;butir 12,1-Edisi VI 2015)
				</i>
			</p>

			<strong>
				BIAYA REPRODUKSI / BIAYA PENGGANTI(NEW REPRODUCTION COST)
			</strong>
			<p>
				<i>
					"Biaya untuk menciptakan replika dari struktur yang ada, menerapkan disain dan material yang sama."(SPI KPUP;butir 4.11-Edisi VI 2015
				</i>
			</p>
		</div>
	</div>
	<br /><br />

	<!--Panel-->
	<div class="panel">
		<div class="panel-heading">
			PENDEKATAN PENILAIAN
		</div>
		<div class="panel-content">
			<strong>
				PENDEKATAN PASAR (MARKET APPROACH)
			</strong>
			<p>
				<i>
					"Pendakatan Pasar menghasilkan indikasi nilai dengan cara membandingkan aset yang dinilai dengan aset yang identik atau sebanding, dimana informasi harga transaksi atau penawaran tersedia."(SPI KPUP;butir 17.1 - Edisi VI 2015)
				</i>
			</p>

			<strong>
				PENDEKATAN BIAYA (COST APPROACH)
			</strong>
			<p>
				<i>
					"Pendekatan Biaya menghasilkan indikasi nilai dengan menggunakan prinsip ekonomi, dimana pembeli tidak akan membayar suatu aset lebih dari pada biaya untuk memperoleh aset dengan kegunaan yang sama atau setara, pada saat pembelian atau konstruksi."(SPI KPUP; butir 19.1 - Edisi VI 2015)
				</i>
			</p>
		</div>
	</div>

	<br /><br /><br /><br /><br />
	<strong>II. RINGKASAN HASIL PENILAIAN BERDASARKAN FISIK</strong>
	<br /><br />

	<?php
		$total_brb         = 0;
		$total_nilai_pasar = 0;
		$total_liquidasi   = 0;

		$luas_tanah        = (array_key_exists("162", $data_lokasi) ? $data_lokasi[162][null] : 0);
		$harga_satuan_tanah = (array_key_exists("294", $data_lokasi) ? $data_lokasi[294][null] : 0);
		$brb_tanah       = $luas_tanah * $harga_satuan_tanah;
		$liquidasi_tanah = $brb_tanah * 80 / 100;

		$total_brb += $brb_tanah;
		$total_nilai_pasar += $brb_tanah;
		$total_liquidasi += $liquidasi_tanah;
	?>
	<table class="table"  cellpadding="2" cellspacing="0">
		<tr>
			<th>
				OBYEK PENILAIAN
			</th>
			<th>
				LUAS / <br/>SATUAN
			</th>
			<th>
				HARGA SATUAN <br/>(Rp./m&sup2;)
			</th>
			<th>
				BRB / RCN <br/>(Rp.)
			</th>
			<th>
				NILAI PASAR <br/>(Rp.
			</th>
			<th>
				INDIKASI NILAI <br/>LIKUIDASI(Rp.)
			</th>
		</tr>
		<tr>
			<td>
				Tanah
			</td>
			<td align="right">
				<?=$luas_tanah?> m&sup2;
			</td>
			<td align="right">
				<?=number_format($harga_satuan_tanah)?>
			</td>
			<td align="right">
				<?=number_format($brb_tanah)?>
			</td>
			<td align="right">
				<?=number_format($brb_tanah)?>
			</td>
			<td align="right">
				<?=number_format($liquidasi_tanah)?>
			</td>
		</tr>

		<?php
		if($lokasi->id_jenis_objek == 2)
		{
			$custom_data = unserialize($lokasi->custom_data);
			$tab_bangunan= $custom_data["tab_bangunan"];

			foreach($tab_bangunan as $key_bangunan => $item_bangunan)
			{
				$key_bangunan         = str_replace(" ", "_", $key_bangunan);
				$type_bangunan        = (array_key_exists("635", $data_lokasi) ? $data_lokasi[635][$key_bangunan] : 0);
				$luas_bangunan        = (array_key_exists("639", $data_lokasi) ? $data_lokasi[639][$key_bangunan] : 0);
				$harga_bangunan       = (array_key_exists("744", $data_lokasi) ? $data_lokasi[744][$key_bangunan] : 0);
				$brb_bangunan         = $luas_bangunan * $harga_bangunan;
				$nilai_pasar_bangunan = (array_key_exists("745", $data_lokasi) ? $data_lokasi[745][$key_bangunan] : 0) * $luas_bangunan;
				$liquidasi_bangunan   = $nilai_pasar_bangunan * 70 / 100;

				$total_brb += $brb_bangunan;
				$total_nilai_pasar += $nilai_pasar_bangunan;
				$total_liquidasi += $liquidasi_bangunan;
				?>

				<tr>
					<td>
						Bgn. <?=$type_bangunan?>
					</td>
					<td align="right">
						<?=$luas_bangunan?> m&sup2;
					</td>
					<td align="right">
						<?=number_format($harga_bangunan)?>
					</td>
					<td align="right">
						<?=number_format($brb_bangunan)?>
					</td>
					<td align="right">
						<?=number_format($nilai_pasar_bangunan)?>
					</td>
					<td align="right">
						<?=number_format($liquidasi_bangunan)?>
					</td>
				</tr>

				<?php
			}

		}

		$brb_sp = (array_key_exists("199", $data_lokasi) ? $data_lokasi[199][null] : 0);
		$nilai_pasar_sp = (array_key_exists("200", $data_lokasi) ? $data_lokasi[200][null] : 0);
		$liquidasi_sp = $nilai_pasar_sp * 80 / 100;


		$total_brb += $brb_sp;
		$total_nilai_pasar += $nilai_pasar_sp;
		$total_liquidasi += $liquidasi_sp;
		?>

		<tr>
			<td>
				Sarana Pelengkap
			</td>
			<td colspan="2" align="center">
				1 Lot
			</td>
			<td align="right">
				<?=number_format($brb_sp)?>
			</td>
			<td align="right">
				<?=number_format($nilai_pasar_sp)?>
			</td>
			<td align="right">
				<?=number_format($liquidasi_sp)?>
			</td>
		</tr>
		<tr style="background-color: #cccccc">
			<td colspan="3" align="center">
				<strong>
					NILAI PROPERTI
				</strong>
			</td>
			<td align="right">
				<?=number_format($total_brb)?>
			</td>
			<td align="right">
				<?=number_format($total_nilai_pasar)?>
			</td>
			<td align="right">
				<?=number_format($total_liquidasi)?>
			</td>
		</tr>

	</table>

	<br /><br />
	<strong>III. RINGKASAN HASIL PENILAIAN BERDASARKAN PERATURAN TATA KOTA SETEMPAT</strong>
	<br/><br/>

	<?php
		$total_brb         = 0;
		$total_nilai_pasar = 0;
		$total_liquidasi   = 0;

		$luas_tanah        = (array_key_exists("162", $data_lokasi) ? $data_lokasi[162][null] : 0) - (array_key_exists("241", $data_lokasi) ? $data_lokasi[241][null] : 0);
		$harga_satuan_tanah = (array_key_exists("294", $data_lokasi) ? $data_lokasi[294][null] : 0);
		$brb_tanah       = $luas_tanah * $harga_satuan_tanah;
		$liquidasi_tanah = $brb_tanah * 80 / 100;

		$total_brb += $brb_tanah;
		$total_nilai_pasar += $brb_tanah;
		$total_liquidasi += $liquidasi_tanah;
	?>
	<table class="table"  cellpadding="2" cellspacing="0" width="100%">
		<tr>
			<th>
				OPYEK PENILAIAN
			</th>
			<th>
				LUAS / <br/>SATUAN
			</th>
			<th>
				HARGA SATUAN <br/>(Rp./m&sup2;)
			</th>
			<th>
				BRB / RCN <br/>(Rp.)
			</th>
			<th>
				NILAI PASAR <br/>(Rp.
			</th>
			<th>
				INDIKASI NILAI <br/>LIKUIDASI(Rp.)
			</th>
		</tr>
		<tr>
			<td>
				Tanah
			</td>
			<td align="right">
				<?=$luas_tanah?> m&sup2;
			</td>
			<td align="right">
				<?=number_format($harga_satuan_tanah)?>
			</td>
			<td align="right">
				<?=number_format($brb_tanah)?>
			</td>
			<td align="right">
				<?=number_format($brb_tanah)?>
			</td>
			<td align="right">
				<?=number_format($liquidasi_tanah)?>
			</td>
		</tr>

		<?php
		if($lokasi->id_jenis_objek == 2){
			$custom_data = unserialize($lokasi->custom_data);
			$tab_bangunan= $custom_data["tab_bangunan"];

			foreach($tab_bangunan as $key_bangunan => $item_bangunan){
				$key_bangunan         = str_replace(" ", "_", $key_bangunan);
				$type_bangunan        = (array_key_exists("635", $data_lokasi) ? $data_lokasi[635][$key_bangunan] : 0);
				$luas_bangunan        = (array_key_exists("639", $data_lokasi) ? $data_lokasi[639][$key_bangunan] : 0) - (array_key_exists("654", $data_lokasi) ? $data_lokasi[654][$key_bangunan] : 0);
				$harga_bangunan       = (array_key_exists("744", $data_lokasi) ? $data_lokasi[744][$key_bangunan] : 0);
				$brb_bangunan         = $luas_bangunan * $harga_bangunan;
				$nilai_pasar_bangunan = (array_key_exists("745", $data_lokasi) ? $data_lokasi[745][$key_bangunan] : 0) * $luas_bangunan;
				$liquidasi_bangunan   = $nilai_pasar_bangunan * 70 / 100;

				$total_brb += $brb_bangunan;
				$total_nilai_pasar += $nilai_pasar_bangunan;
				$total_liquidasi += $liquidasi_bangunan;
				?>

				<tr>
					<td>
						Bgn. <?=$type_bangunan?>
					</td>
					<td align="right">
						<?=$luas_bangunan?> m&sup2;
					</td>
					<td align="right">
						<?=number_format($harga_bangunan)?>
					</td>
					<td align="right">
						<?=number_format($brb_bangunan)?>
					</td>
					<td align="right">
						<?=number_format($nilai_pasar_bangunan)?>
					</td>
					<td align="right">
						<?=number_format($liquidasi_bangunan)?>
					</td>
				</tr>

				<?php
			}

		}
		?>


		<?php
		$brb_sp2 = (array_key_exists("239", $data_lokasi) ? $data_lokasi[199][null] : 0);
		$nilai_pasar_sp2 = (array_key_exists("240", $data_lokasi) ? $data_lokasi[240][null] : 0);
		$liquidasi_sp2 = $nilai_pasar_sp2 * 80 / 100;


		$total_brb += $brb_sp2;
		$total_nilai_pasar += $nilai_pasar_sp2;
		$total_liquidasi += $liquidasi_sp2;
		?>


		<tr>
			<td>
				Sarana Pelengkap
			</td>
			<td colspan="2" align="center">
				1 Lot
			</td>
			<td align="right">
				<?=number_format($brb_sp)?>
			</td>
			<td align="right">
				<?=number_format($nilai_pasar_sp)?>
			</td>
			<td align="right">
				<?=number_format($liquidasi_sp)?>
			</td>
		</tr>
		<tr style="background-color: #cccccc">
			<td colspan="3" align="center">
				<strong>
					NILAI PROPERTI
				</strong>
			</td>
			<td align="right">
				<?=number_format($total_brb)?>
			</td>
			<td align="right">
				<?=number_format($total_nilai_pasar)?>
			</td>
			<td align="right">
				<?=number_format($total_liquidasi)?>
			</td>
		</tr>
	</table>
	
	<br/>
	<strong>M a r k e t a b i l i t y   : Marketable</strong>
	<br/><br/>
	
	<div class="panel">
		<div class="panel-heading">PENGGUNAAN TERBAIK DAN TERTINGGI (HIGHEST AND BEST USE / HBU)</div>
		<div class="panel-content">
			
			<p>
				Sesuai hasil survei lokasi yang mencakup analisa situasi (site data), lingkungan dan pengembangan area serta pemanfaatan dari properti saat ini, maka kami berpendapat bahwa pemanfaatan tertinggi dan terbaik dari properti termaksud adalah sebagai <?=(array_key_exists("4", $data_lokasi) ? $data_lokasi[4][null] : 0)?>.
			</p>
		</div>
	</div>
	<br />
	<div class="panel">
		<div class="panel-content">
			
			<p>
				Kami menjamin bahwa penilaian ini sesuai profesi selaku appraiser telah dilakukan dengan penuh kejujuran, tanggung jawab, dan obyektif berdasarkan Kode Etik Penilai Indonesia (KEPI) dan Standar Penilaian Indonesia (SPI) yang berlaku, tanpa adanya pengaruh / tekanan dari siapapun. Laporan ini hanya dapat digunakan untuk keperluan / kepentingan manajemen  <?=(array_key_exists("17", $data_lokasi) ? $data_lokasi[17][null] : 0)?>   dan Debitur / Calon Debitur sesuai dengan tujuan penilaian sebagaimana tercantum di atas serta tidak dapat digunakan untuk tujuan / keperluan lainnya.
			</p>
			<p>
				Hormat kami,<br />
				KJPP ZUCHRI & REKAN<br/><br/><br/><br/><br/>
				
				<b><u>Asno Minanda, SE., M.Ec.Dev., MAPPI (Cert.)</u></b><br />
				<b>Managing Partner</b>

			</p>
			<table cellspacing="0" cellpadding="0">
				<tr>
					<td>MAPPI</td>
					<td align="center" width="20">:</td>
					<td>06-S-02041</td>
				</tr>
				<tr>
					<td>Ijin Penilai Publik</td>
					<td align="center" width="20">:</td>
					<td>PB-1.13.00383</td>
				</tr>
				<tr>
					<td>STTD OJK</td>
					<td align="center" width="20">:</td>
					<td>09/PM.22/STTD-P/A/2015</td>
				</tr>
				<tr>
					<td>Kualifikasi Penilai</td>
					<td align="center" width="20">:</td>
					<td>Properti & Bisnis</td>
				</tr>
			</table>
		</div>
	</div>
	<br />
	<div class="panel">
		<div class="panel-heading">ASUMSI DAN BATASAN</div>
		<div class="panel-content">
			<ol type="1" style="padding: 5px; padding-right:20px; margin-left: 0px;">
				<li>
					Penilaian ini didasarkan atas inspeksi lapangan secara langsung yaitu dengan melakukan verifikasi atas kesesuaian dokumen, data, dan informasi relevan / terkait dengan kondisi properti dan pasar properti pada tanggal inspeksi / penilaian.
				</li>
				<li>
					Hak kepemilikan atas properti yang dinilai dianggap bebas dari segala; ikatan, sewa-menyewa, penggadaian, penyitaan, hipotik serta masalah hukum lainnya dan properti ini dapat dialihkan hak kepemilikannya.
				</li>
				<li>
					Pemeriksaan atas fakta-fakta serta faktor-faktor yang mempengaruhi nilai properti sebagaimana tercantum dalam laporan ini telah dibuat sedemikian rupa hingga hal-hal yang dicantumkan / dilaporkan bersifat praktis.
				</li>
				<li>
					Semua pernyataan, informasi, dokumen-dokumen yang diberikan Pemberi Tugas dan atau Pihak Ketiga yang terkait, kami asumsikan; sah, benar, lengkap dan sesuai dengan kenyataan sebenarnya.
				</li>
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
					Laporan penilaian ini sah, apabila disertai tanda tangan asli, stampel, serta watermarking logo KJPP ZUCHRI & REKAN.
				</li>

			</ol>
		</div>
	</div>
	<br />
	<div class="panel">
		<div class="panel-heading">PERNYATAAN PENILAI</div>
		<div class="panel-content">
			<p>Dalam batas kemampuan dan keyakinan kami sebagai Penilai Independen, kami yang bertanda tangan di bawah ini menyatakan bahwa :</p>
			<ol type="1" style="padding: 5px; padding-right:20px; margin-left: 0px;">
				<li>
					Pernyataan faktual yang dipresentasikan dalam laporan penilaian ini berdasarkan analisis data, opini dan kesimpulan nilai, adalah benar dan sesuai dengan pemahaman terbaik kami sebagai Penilai.
				</li>
				<li>
					Analisis data dan kesimpulan hanya dibatasi oleh asumsi dan kondisi pembatas sebagaimana yang dicantumkan pada asumsi dan batasan diatas.
				</li>
				<li>
					Kami (Penilai) tidak memiliki hubungan relasi apapun dengan pemilik properti (pemberi tugas) serta yang terkait lainnya yang dapat menimbulkan “conflict of interest” dan kami juga tidak mempunyai kepentingan apapun baik langsung maupun tidak langsung dan saat ini maupun di masa mendatang terhadap properti yang dinilai.
				</li>
				<li>
					Imbalan jasa / fee Penilai yang kami terima tidak berkaitan dengan hasil penilaian yang dilaporkan.
				</li>
				<li>
					Penilaian dilakukan dengan memenuhi ketentuan Kode Etik Penilai Indonesia (KEPI) dan Standar Penilaian Indonesia (SPI) yang berlaku yaitu : KEPI & SPI Edisi VI - 2015 dan peraturan-peraturan yang berlaku.
				</li>
				<li>
					Penilai telah menyelesaikan persyaratan pendidikan profesional yang ditetapkan atau dilaksanakan oleh asosiasi MAPPI (Masyarakat Profesi Penilai Indonesia).
				</li>
				<li>
					Penilai memiliki kompetensi (pengetahuan dan pemahaman) yang layak dan memadai tentang properti yang dinilai serta perusahaan pemiliknya.
				</li>
				<li>
					Penilai telah melaksanakan ruang lingkup penilaian, sbb :
					<ul type="circle" style="padding: 5px; padding-right:20px; margin-left: 0px;">
						<li>
							Identifikasi masalah (identifikasi batasan, tujuan dan objek, definisi penilaian dan tanggal penilaian);
						</li>
						<li>
							Inspeksi lapangan berupa kegiatan verifikasi data / dokumen dengan fakta dan fisik teknis properti di lapangan, meliputi : pengumpulan data, wawancara dan pemeriksaan fisik properti;
						</li>
						<li>
							Analisis data dan kesimpulan estimasi nilai properti dengan menggunakan pendekatan penilaian yang terdiri dari : biaya reproduksi / pengganti baru, nilai pasar, nilai likuidasi dan penggunaan terbaik dan tertinggi;
						</li>
						<li>
							Penulisan Laporan Penilaian.
						</li>
					</ul>
				</li>
				<li>
					Tidak ada seorangpun (Penilai dan tenaga ahli teknis lainnya), kecuali yang disebutkan dalam laporan ini yang telah terlibat dalam pelaksanaan keseluruhan kegiatan penilaian ini.
				</li>
			</ol>
		</div>
	</div>
	<br />
	<table class="table"  cellpadding="2" cellspacing="0" width="100%">
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
		<tr style="height: 100px;">
			<td align="center">
				1
			</td>
			<td>
				Moh. Sugianto, SE. ( Penilai / Valuer )<br />
				MAPPI : 92-T-00279
			</td>
			<td valign="top" align="center">

			</td>
		</tr>
		<tr style="height: 100px;">
			<td align="center">
				2
			</td>
			<td>
				Daud Kiat Suryana, ST. ( Surveyor )<br />
				MAPPI : 16-A-06229
			</td>
			<td valign="top" align="center">

			</td>
		</tr>
	</table>
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	
	<div class="title">PENILAIAN TANAH</div>
	<br /><br />
	
	<div class="panel">
		<div class="panel-heading-blue">OBJEK PENILAIAN</div>
		<div class="panel-content">
			<table style="width: 720px;" >
				<tr>
					<td align="left">
						<?=$data_lokasi[249][0]?>
					</td>
					<td align="right">
						Tanggal Inspeksi  :  <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][null] : 0)?>
					</td>
				</tr>
				<tr>
					<td style="word-wrap: break-word; width: 500px;">
						Alamat Obyek  :<br />
						<?=(array_key_exists("277", $data_lokasi) ? $data_lokasi[277][0] : 0)?>
					</td>
					<td></td>
				</tr>
			</table>
			
			
		</div>
	</div>
	<div class="panel">
		<div class="panel-content">
			<table style="width: 720px;" >
				<tr>
					<td colspan="2">
						Yang dijumpai dilokasi : Bpk. Gusti Iskandar, sebagai Pemilik
					</td>
				</tr>
				<tr>
					<td valign="top" align="left" style="width: 350px;">
						<b>
							Informasi Properti :
						</b><br />
						<table>
							<tr>
								<td>
									Status obyek
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("10", $data_lokasi) ? $data_lokasi[10][null] : "")?>
								</td>
							</tr>
							<tr>
								<td>
									Obyek dihuni oleh
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("13", $data_lokasi) ? $data_lokasi[13][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Penggunaan obyek
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("116", $data_lokasi) ? $data_lokasi[116][null] : "-")?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top" width="50%" align="left">
						<b>
							Batas - Batas Properti
						</b><br />
						<table>
							<tr>
								<td>
									<?=(array_key_exists("105", $data_lokasi) ? $data_lokasi[105][null] : "-")?>
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("106", $data_lokasi) ? $data_lokasi[106][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									<?=(array_key_exists("107", $data_lokasi) ? $data_lokasi[107][null] : "-")?>
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("108", $data_lokasi) ? $data_lokasi[108][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									<?=(array_key_exists("109", $data_lokasi) ? $data_lokasi[109][null] : "-")?>
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("110", $data_lokasi) ? $data_lokasi[110][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									<?=(array_key_exists("111", $data_lokasi) ? $data_lokasi[111][null] : "-")?>
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("112", $data_lokasi) ? $data_lokasi[112][null] : "-")?>
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
		<div class="panel-heading">INFORMASI LINGKUNGAN</div>
		<div class="panel-content">
			<table style="width: 720px;" >
				<tr>
					<td valign="top" align="left" style="width: 350px;">
						<table>
							<tr>
								<td>
									Lokasi tanah obyek
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("113", $data_lokasi) ? $data_lokasi[113][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Harga tanah obyek
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("114", $data_lokasi) ? $data_lokasi[114][null] : "-")?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top" width="50%" align="left">
						<table>
							<tr>
								<td>
									Kepadatan bangunan
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("115", $data_lokasi) ? $data_lokasi[115][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Pertumbuhan bangunan
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("116", $data_lokasi) ? $data_lokasi[116][null] : "-")?>
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
		<div class="panel-heading">ANALISA LINGKUNGAN</div>
		<div class="panel-content">
			<table style="width: 720px;" >
				<tr>
					<td valign="top" align="left" style="width: 350px;">
						<table>
							<tr>
								<td>
									Kemudahan mencapai lokasi obyek
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("117", $data_lokasi) ? $data_lokasi[117][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Kemudahan belanja / shooping
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("118", $data_lokasi) ? $data_lokasi[118][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Kemudahan rekreasi /  hiburan
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("119", $data_lokasi) ? $data_lokasi[119][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Kemudahan angkutan umum / transportasi
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("120", $data_lokasi) ? $data_lokasi[120][null] : "-")?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top" width="50%" align="left">
						<table>
							<tr>
								<td>
									Kemudahan sarana pendidikan / sekolah
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("121", $data_lokasi) ? $data_lokasi[121][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Keamanan terhadap kejahatan / kriminal
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("122", $data_lokasi) ? $data_lokasi[122][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Keamanan terhadap bencana kebakaran
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("123", $data_lokasi) ? $data_lokasi[123][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Keamanan terhadap bencana alam
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("124", $data_lokasi) ? $data_lokasi[124][null] : "-")?>
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
		<div class="panel-heading">INFORMASI KAWASAN</div>
		<div class="panel-content">
			<table style="width: 720px;" >
				<tr>
					<td valign="top" style="width: 180px;">
						Penggunaan tanah saat ini : <br />
					</td>
					<td valign="top" style="width: 250px;">
						<table>
							<tr>
								<td>
									Perumahan / pemukiman
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("125", $data_lokasi) ? $data_lokasi[125][null]."%" : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Industri / pergudangan
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("126", $data_lokasi) ? $data_lokasi[126][null]."%" : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Pertokoan / perniagaan
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("127", $data_lokasi) ? $data_lokasi[127][null]."%" : "-")?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top" style="width: 250px;">
						<table>
							<tr>
								<td>
									Perkantoran / perdagangan & jasa
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("128", $data_lokasi) ? $data_lokasi[128][null]."%" : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Taman /  penghijauan / jalur hijau
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("129", $data_lokasi) ? $data_lokasi[129][null]."%" : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Tanah kosong / tanah idle
								</td>
								<td>
									:
								</td>
								<td>
									<?=(array_key_exists("130", $data_lokasi) ? $data_lokasi[130][null]."%" : "-")?>
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
			<table style="width: 720px;" >
				<tr>
					<td valign="top" align="left" style="width: 330px;">
						<table>
							<tr>
								<td valign="top">
									Perubahan lingkungan / tata <br />guna tanah pada masa akan datang
								</td>
								<td valign="top">
									:
								</td>
								<td valign="top">
									<?=(array_key_exists("131", $data_lokasi) ? $data_lokasi[131][null] : "-")?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top" align="left" style="width: 330px;">
						<table>
							<tr>
								<td valign="top">
									Mayoritas data hunian <br />pada kawasan
								</td>
								<td valign="top">
									:
								</td>
								<td valign="top">
									<?=(array_key_exists("132", $data_lokasi) ? $data_lokasi[132][null] : "-")?>
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
		<div class="panel-heading-blue">LOKASI SITE</div>
		<div class="panel-heading">FASILITAS LINGKUNGAN</div>
		<div class="panel-content">
			<table style="width: 720px;" >
				<tr>
					<td valign="top" align="left" style="width: 220px;">
						<table>
							<tr>
								<td>
									Jaringan Listrik
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("134", $data_lokasi) && ($data_lokasi[134][null] == 1) ? "V" : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Jaringan Telepon
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("135", $data_lokasi) && ($data_lokasi[135][null] == 1) ? "V" : "-")?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top" align="left" style="width: 220px;">
						<table>
							<tr>
								<td>
									Jaringan Air Bersih
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("136", $data_lokasi) && ($data_lokasi[136][null] == 1) ? "V" : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Jaringan Gas
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("137", $data_lokasi) && ($data_lokasi[137][null] == 1) ? "V" : "-")?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top" align="left" style="width: 220px;">
						<table>
							<tr>
								<td>
									Taman Pemakaman Umum
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("138", $data_lokasi) && ($data_lokasi[138][null] == 1) ? "V" : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Penampungan Sampah
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("139", $data_lokasi) && ($data_lokasi[139][null] == 1) ? "V" : "-")?>
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
			<table style="width: 720px;" >
				<tr>
					<td valign="top" align="left" style="width: 330px;">
						<table>
							<tr>
								<td>
									Lebar jalan di depan obyek
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("140", $data_lokasi) ? $data_lokasi[140][null]." meter" : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Lebar jalan di sekitar obyek
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("141", $data_lokasi) ? $data_lokasi[141][null]." meter" : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Jenis jalan depan obyek
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("142", $data_lokasi) ? $data_lokasi[142][null] : "-")?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top" align="left" style="width: 330px;">
						<table>
							<tr>
								<td>
									Drainage / Saluran
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("143", $data_lokasi) ? $data_lokasi[143][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Trotoar
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("144", $data_lokasi) ? $data_lokasi[144][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Lampu Jalan (PJU)
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("145", $data_lokasi) ? $data_lokasi[145][null] : "-")?>
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
		<div class="panel-heading">GAMBARAN UMUM SITE</div>
		<div class="panel-content">		
			<table style="width: 720px;" >
				<tr>
					<td valign="top" align="left" style="width: 330px;">
						<table>
							<tr>
								<td>
									Topografi / Kontur
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("146", $data_lokasi) ? $data_lokasi[146][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Jenis Tanah
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("147", $data_lokasi) ? $data_lokasi[147][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Tata Lingkungan
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("148", $data_lokasi) ? $data_lokasi[148][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Resiko Banjir
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("149", $data_lokasi) ? $data_lokasi[149][null] : "-")?>
								</td>
							</tr>
						</table>
					</td>
					<td valign="top" align="left" style="width: 330px;">
						<table>
							<tr>
								<td>
									Letak / Posisi Tanah
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("150", $data_lokasi) ? $data_lokasi[150][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Tinggi Tanah (terhadap jalan) (centimeter)
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("151", $data_lokasi) ? $data_lokasi[151][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Jalur / Ruang Areal SUTT - SUTET
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("152", $data_lokasi) ? $data_lokasi[152][null] : "-")?>
								</td>
							</tr>
							<tr>
								<td>
									Jarak obyek terhadap SUTT - SUTET (m)
								</td>
								<td valign="top">
									:
								</td>
								<td>
									<?=(array_key_exists("153", $data_lokasi) ? $data_lokasi[153][null] : "-")?>
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
		<div class="panel-heading-blue">DATA LEGALITAS</div>
	</div>
	<br />
	<table class="table-1" cellpadding="0" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th rowspan="2">
					No
				</th>
				<th rowspan="2">
					Jenis Sertifikat
				</th>
				<th rowspan="2">
					Nomor Sertifikat
				</th>
				<th rowspan="2">
					Atas Nama
				</th>
				<th colspan="2">
					Tanggal Sertifikat
				</th>
				<th colspan="2">
					Gambar Situasi
				</th>
				<th rowspan="2">
					Luas Tanah (m
					<sup>
						2
					</sup>)
				</th>
			</tr>
			<tr>
				<th>
					Terbit
				</th>
				<th>
					Berakhir
				</th>
				<th>
					Nomor
				</th>
				<th>
					Tgl-Bln-Thn
				</th>
			</tr>
		</thead>
		<tbody>

			<?php
			$i = 1;
			foreach($data_legalitas as $item_legalitas){
				?>

				<tr>
					<td align="center">
						<span>
							<?=$i?>
						</span>
					</td>
					<td>
						<span>
							<?=(array_key_exists("154", $data_lokasi) && (array_key_exists($i, $data_lokasi[154])) ? $data_lokasi[154][$i] : "-")?>
						</span>
					</td>
					<td align="center">
						<span>
							<?=(array_key_exists("155", $data_lokasi) && (array_key_exists($i, $data_lokasi[155])) ? $data_lokasi[155][$i] : 0)?>
						</span>
					</td>
					<td>
						<span>
							<?=(array_key_exists("156", $data_lokasi) && (array_key_exists($i, $data_lokasi[156])) ? $data_lokasi[156][$i] : 0)?>
						</span>
					</td>
					<td align="center">
						<span>
							<?=(array_key_exists("157", $data_lokasi) && (array_key_exists($i, $data_lokasi[157])) ? $data_lokasi[157][$i] : 0)?>
						</span>
					</td>
					<td align="center">
						<span>
							<?=(array_key_exists("158", $data_lokasi) && (array_key_exists($i, $data_lokasi[158])) ? $data_lokasi[158][$i] : 0)?>
						</span>
					</td>
					<td align="center">
						<span>
							<?=(array_key_exists("159", $data_lokasi) && (array_key_exists($i, $data_lokasi[159])) ? $data_lokasi[159][$i] : 0)?>
						</span>
					</td>
					<td align="center">
						<span>
							<?=(array_key_exists("160", $data_lokasi) && (array_key_exists($i, $data_lokasi[160])) ? $data_lokasi[160][$i] : 0)?>
						</span>
					</td>
					<td align="center">
						<span>
							<?=(array_key_exists("161", $data_lokasi) && (array_key_exists($i, $data_lokasi[161])) ? $data_lokasi[161][$i] : 0)?>
						</span>
					</td>
				</tr>
				<?php
				$i++;
			}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="8" align="center">
					<span>
						TOTAL LUAS TANAH SESUAI SERTIFIKAT
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("162", $data_lokasi) ? $data_lokasi[162][null] : "-")?>
					</span>
				</td>
			</tr>
		</tfoot>
	</table>
	<table class="table-1" id="" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
		<tbody>
			<tr>
				<td colspan="2">
					<span>
						INFORMASI DINAS TATA KOTA TENTANG RENCANA PEMBANGUNAN / PELEBARAN JALAN  :
					</span>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td align="center">
					<span>
						Total luas tanah yang terpotong (rencana pembangunan / pelebaran jalan)
					</span>
				</td>
				<td align="center">
					<span>
						<?=(array_key_exists("241", $data_lokasi) ? $data_lokasi[241][null] : "-")?>
					</span>
				</td>
			</tr>
		</tfoot>
	</table>

	<br />
	<div class="panel">
		<div class="panel-heading-blue">KESIMPULAN NILAI TANAH</div>
		<div class="panel-content">
			<table style="width: 720px;" >
				<tr>
					<td valign="top" align="left" style="width: 330px;">
						<table class="" cellpadding="0" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th colspan="3" align="left">
										INFORMASI NJOP TANAH
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										NJOP Tanggal
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("242", $data_lokasi) ? $data_lokasi[242][null] : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										Tanah ( / m
										<sup>
											2
										</sup>)
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("243", $data_lokasi) ? $data_lokasi[243][null] : "-")?>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
					<td valign="top" align="left" style="width: 330px;">
						<table class="" cellpadding="0" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th colspan="3" align="left">
										BERDASARKAN FISIK
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										NILAI PASAR
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("244", $data_lokasi) ? number_format($data_lokasi[244][null]) : "-")?>
									</td>
								</tr>
								<tr>
									<td>
										INDIKASI NILAI LIKUIDASI
									</td>
									<td>
										:
									</td>
									<td>
										<?=(array_key_exists("245", $data_lokasi) ? number_format($data_lokasi[245][null]) : "-")?>
									</td>
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
			<p><?=(array_key_exists("246", $data_lokasi) ? $data_lokasi[246][null] : "-")?></p>
		</div>
	</div>


	<?php
		if ($lokasi->id_jenis_objek == 2)
		{
			$tab_bangunan = $custom_data["tab_bangunan"];

			$i_bangunan   = 1;
			$a_bangunan   = 1;
			
			foreach($tab_bangunan as $key_bangunan => $item_bangunan)
			{
				$key_bangunan = str_replace(" ", "_", $key_bangunan);

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

				$type_bangunan        = (array_key_exists("635", $data_lokasi) ? $data_lokasi[635][$key_bangunan] : 0);
				$luas_bangunan        = (array_key_exists("639", $data_lokasi) ? $data_lokasi[639][$key_bangunan] : 0);
				$harga_bangunan       = (array_key_exists("744", $data_lokasi) ? $data_lokasi[744][$key_bangunan] : 0);
				$brb_bangunan         = $luas_bangunan * $harga_bangunan;
				$nilai_pasar_bangunan = (array_key_exists("745", $data_lokasi) ? $data_lokasi[745][$key_bangunan] : 0) * $luas_bangunan;
				$liquidasi_bangunan   = $nilai_pasar_bangunan * 70 / 100;
	?>
	
	<br /><br /><br />
	
	<div class="title">PENILAIAN BANGUNAN  <?=$a_bangunan?></div>
	<br /><br />
	
	<div class="panel">
		<div class="panel-heading-blue">OBJEK PENILAIAN</div>
		<div class="panel-content">
			<table style="width: 720px;" >
				<tr>
					<td align="left">
						<?=$data_lokasi[249][0]?>
					</td>
					<td align="right">
						Tanggal Inspeksi  :  <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][null] : 0)?>
					</td>
				</tr>
				<tr>
					<td style="word-wrap: break-word; width: 500px;">
						Alamat Obyek  :<br />
						<?=(array_key_exists("277", $data_lokasi) ? $data_lokasi[277][0] : 0)?>
					</td>
					<td></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="panel">
		<div class="panel-heading-blue">OBJEK PENILAIAN</div>
		<div class="panel-content">
			<table style="width: 720px;" >
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
			<td width="70%" valign="top">
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
			<td width="30%" valign="top" align="right" style="padding-left: 10px;">
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
		<div class="panel-heading">INFORMASI DINAS TATAKOTA <?=(array_key_exists("23", $data_lokasi) ? strtoupper($data_lokasi[23][null]) : "")?></div>
		<div class="panel-content">
			<b>Ijin Mendirikan Bangunan (IMB)</b>
			<table style="width: 720px;" >
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
			<table style="width: 720px;" >
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
			<table style="width: 720px;" >
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
			<table style="width: 720px;" >
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
			<table style="width: 720px;" >
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
			<table style="width: 720px;" >
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
			<table style="width: 720px;" >
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
									<td><?=(array_key_exists("688", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[688])) ? $data_lokasi[688][$key_bangunan] : "-")?></td>
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
	
	
	<?php
				$i_bangunan++;
				$a_bangunan++;
			}
	?>
	
	
	<br /><br /><br />
	
	<div class="title">PERHITUNGAN NILAI PASAR BANGUNAN & SARANA PELENGKAP</div>
	<br /><br />
	<div class="panel">
		<div class="panel-content">
			<table style="width: 720px;" >
				<tr>
					<td align="left">
						<?=$data_lokasi[249][0]?>
					</td>
					<td align="right">
						Tanggal Inspeksi  :  <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][null] : 0)?>
					</td>
				</tr>
				<tr>
					<td style="word-wrap: break-word; width: 500px;">
						Alamat Obyek  :<br />
						<?=(array_key_exists("277", $data_lokasi) ? $data_lokasi[277][0] : 0)?>
					</td>
					<td></td>
				</tr>
			</table>
		</div>
	</div>
	
	<br />
	<?php
			$i_bangunan = 1;
			foreach($tab_bangunan as $key_bangunan => $item_bangunan)
			{
				$key_bangunan = str_replace(" ", "_", $key_bangunan);

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

				$type_bangunan        = (array_key_exists("635", $data_lokasi) ? $data_lokasi[635][$key_bangunan] : 0);
				$luas_bangunan        = (array_key_exists("639", $data_lokasi) ? $data_lokasi[639][$key_bangunan] : 0);
				$harga_bangunan       = (array_key_exists("744", $data_lokasi) ? $data_lokasi[744][$key_bangunan] : 0);
				$brb_bangunan         = $luas_bangunan * $harga_bangunan;
				$nilai_pasar_bangunan = (array_key_exists("745", $data_lokasi) ? $data_lokasi[745][$key_bangunan] : 0) * $luas_bangunan;
				$liquidasi_bangunan   = $nilai_pasar_bangunan * 70 / 100;
	?>
		
				<table class="table" cellspacing="0" cellpadding="0" width="720">
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
						<td style="background-color: #ddd; color: #333;">
							<span>
								SESUASI KONDISI FISIK EKSISTING
							</span>
						</td>
						<td align="right">
							<span>
								<?=(array_key_exists("744", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[744])) ? number_format($data_lokasi[744][$key_bangunan]) : 0)?>
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
								<?=(array_key_exists("746", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[746])) ? number_format($data_lokasi[746][$key_bangunan]) : 0)?>
							</span>
						</td>
						<td rowspan="2" style="background-color: #ddd; color: #333; text-align: center;">
							<span>
								<?=(array_key_exists("742", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[742])) ? strtoupper($data_lokasi[742][$key_bangunan]) : "-")?>
							</span>
						</td>
					</tr>
					<?php
					$luas_bangunan        = (array_key_exists("639", $data_lokasi) ? $data_lokasi[639][$key_bangunan] : 0) - (array_key_exists("654", $data_lokasi) ? $data_lokasi[654][$key_bangunan] : 0);
					$harga_bangunan       = (array_key_exists("744", $data_lokasi) ? $data_lokasi[744][$key_bangunan] : 0);
					$brb_bangunan         = $luas_bangunan * $harga_bangunan;
					$nilai_pasar_bangunan = (array_key_exists("745", $data_lokasi) ? $data_lokasi[745][$key_bangunan] : 0) * $luas_bangunan;
					$liquidasi_bangunan   = $nilai_pasar_bangunan * 70 / 100;
					?>
					<tr>
						<td style="background-color: #ddd; color: #333;">
							<span>
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
				<br /><br />
		
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
							<?=(array_key_exists("749", $data_lokasi) ? $data_lokasi[749][null] : "-")?> VA
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("751", $data_lokasi) ? number_format($data_lokasi[751][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("753", $data_lokasi) ? number_format($data_lokasi[753][null]) : "-")?>
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
							<?=(array_key_exists("754", $data_lokasi) ? $data_lokasi[754][null] : "-")?> unit
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("757", $data_lokasi) ? number_format($data_lokasi[757][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("759", $data_lokasi) ? number_format($data_lokasi[759][null]) : "-")?>
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
							<?=(array_key_exists("766", $data_lokasi) ? $data_lokasi[766][null] : "-")?> saluran
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("768", $data_lokasi) ? number_format($data_lokasi[768][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("770", $data_lokasi) ? number_format($data_lokasi[770][null]) : "-")?>
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
							<?=(array_key_exists("777", $data_lokasi) ? $data_lokasi[777][null] : "-")?> unit
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("779", $data_lokasi) ? number_format($data_lokasi[779][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("781", $data_lokasi) ? number_format($data_lokasi[781][null]) : "-")?>
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
							<?=(array_key_exists("783", $data_lokasi) ? $data_lokasi[783][null] : "-")?> m
							<sup>
								2
							</sup>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("785", $data_lokasi) ? number_format($data_lokasi[785][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("787", $data_lokasi) ? number_format($data_lokasi[787][null]) : "-")?>
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
							<?=(array_key_exists("789", $data_lokasi) ? $data_lokasi[789][null] : "-")?> m
							<sup>
								2
							</sup>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("791", $data_lokasi) ? number_format($data_lokasi[791][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("793", $data_lokasi) ? number_format($data_lokasi[793][null]) : "-")?>
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
							<?=(array_key_exists("795", $data_lokasi) ? $data_lokasi[795][null] : "-")?> m
							<sup>
								2
							</sup>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("797", $data_lokasi) ? number_format($data_lokasi[797][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("799", $data_lokasi) ? number_format($data_lokasi[799][null]) : "-")?>
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
							<?=(array_key_exists("801", $data_lokasi) ? $data_lokasi[801][null] : "-")?> m
							<sup>
								2
							</sup>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("803", $data_lokasi) ? number_format($data_lokasi[803][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("805", $data_lokasi) ? number_format($data_lokasi[805][null]) : "-")?>
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
							<?=(array_key_exists("807", $data_lokasi) ? $data_lokasi[807][null] : "-")?> unit
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("809", $data_lokasi) ? number_format($data_lokasi[809][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("811", $data_lokasi) ? number_format($data_lokasi[811][null]) : "-")?>
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
							<?=(array_key_exists("813", $data_lokasi) ? $data_lokasi[813][null] : "-")?> unit
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("815", $data_lokasi) ? number_format($data_lokasi[815][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("817", $data_lokasi) ? number_format($data_lokasi[817][null]) : "-")?>
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
							<?=(array_key_exists("819", $data_lokasi) ? $data_lokasi[819][null] : "-")?> m
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("821", $data_lokasi) ? number_format($data_lokasi[821][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("823", $data_lokasi) ? number_format($data_lokasi[823][null]) : "-")?>
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
							<?=(array_key_exists("825", $data_lokasi) ? $data_lokasi[825][null] : "-")?> unit
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("827", $data_lokasi) ? number_format($data_lokasi[827][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("829", $data_lokasi) ? number_format($data_lokasi[829][null]) : "-")?>
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
							<?=(array_key_exists("831", $data_lokasi) ? $data_lokasi[831][null] : "-")?>  m
							<sup>
								2
							</sup>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("833", $data_lokasi) ? number_format($data_lokasi[833][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("835", $data_lokasi) ? number_format($data_lokasi[835][null]) : "-")?>
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
							<?=(array_key_exists("839", $data_lokasi) ? $data_lokasi[839][null] : "-")?> m
							<sup>
								2
							</sup>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("841", $data_lokasi) ? number_format($data_lokasi[841][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("843", $data_lokasi) ? number_format($data_lokasi[843][null]) : "-")?>
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
							<?=(array_key_exists("845", $data_lokasi) ? $data_lokasi[845][null] : "-")?> m
							<sup>
								2
							</sup>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("847", $data_lokasi) ? number_format($data_lokasi[847][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("849", $data_lokasi) ? number_format($data_lokasi[849][null]) : "-")?>
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
							<?=(array_key_exists("851", $data_lokasi) ? $data_lokasi[851][null] : "-")?> m
							<sup>
								2
							</sup>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("853", $data_lokasi) ? number_format($data_lokasi[853][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("855", $data_lokasi) ? number_format($data_lokasi[855][null]) : "-")?>
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
							<?=(array_key_exists("857", $data_lokasi) ? $data_lokasi[857][null] : "-")?> m
							<sup>
								2
							</sup>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("859", $data_lokasi) ? number_format($data_lokasi[859][null]) : "-")?>
						</span>
					</td>
					<td align="right">
						<span>
							<?=(array_key_exists("861", $data_lokasi) ? number_format($data_lokasi[861][null]) : "-")?>
						</span>
					</td>
				</tr>
			</table>
			<br />
			<table class="table" cellspacing="0" cellpadding="0" width="60%" style="width: 60%" align="center">
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
						<?=number_format($brb_sp)?>
					</td>
					<td align="right">
						<?=number_format($nilai_pasar_sp)?>
					</td>
				</tr>
				<tr>
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
	
	<?php
		}
	?>
	
	<br /><br />
	<div class="panel">
		<div class="panel-content">
			<table cellspacing="0" cellpadding="0" style="" >
				<tr>
					<td style="padding: 10px; font-size: 16px;" align="center">
						LAMPIRAN 1<br />
						FOTO-FOTO TANAH
					</td>
					<td style="padding: 10px;">
						
						<table>
							<tr>
								<td align="left"><?=$data_lokasi[249][0]?></td>
								<td align="right">
									Tanggal Inspeksi  : <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][null] : 0)?>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="word-wrap: break-word; width: 500px;">
									Alamat Obyek  :<br />
									<?=(array_key_exists("277", $data_lokasi) ? $data_lokasi[277][0] : 0)?>
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
			<table style="width: 720px;" align="center" >
				<tr>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=(array_key_exists("866", $data_lokasi) ? base_url()."asset/file/".$data_lokasi[866][null] : 0)?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<div style="font-weight: bold">Keterangan : </div>
						<?=(array_key_exists("879", $data_lokasi) ? $data_lokasi[879][null] : 0)?>
					</td>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=(array_key_exists("867", $data_lokasi) ? base_url()."asset/file/".$data_lokasi[867][null] : 0)?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<span style="font-weight: bold">Keterangan :</span><br />
						<?=(array_key_exists("880", $data_lokasi) ? $data_lokasi[880][null] : 0)?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=(array_key_exists("868", $data_lokasi) ? base_url()."asset/file/".$data_lokasi[868][null] : 0)?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<span style="font-weight: bold">Keterangan :</span><br />
						<?=(array_key_exists("881", $data_lokasi) ? $data_lokasi[881][null] : 0)?>
					</td>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=(array_key_exists("869", $data_lokasi) ? base_url()."asset/file/".$data_lokasi[869][null] : 0)?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<span style="font-weight: bold">Keterangan :</span><br />
						<?=(array_key_exists("882", $data_lokasi) ? $data_lokasi[882][null] : 0)?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=(array_key_exists("870", $data_lokasi) ? base_url()."asset/file/".$data_lokasi[870][null] : 0)?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<span style="font-weight: bold">Keterangan :</span><br />
						<?=(array_key_exists("883", $data_lokasi) ? $data_lokasi[883][null] : 0)?>
					</td>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=(array_key_exists("871", $data_lokasi) ? base_url()."asset/file/".$data_lokasi[871][null] : 0)?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<span style="font-weight: bold">Keterangan :</span><br />
						<?=(array_key_exists("884", $data_lokasi) ? $data_lokasi[884][null] : 0)?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	
	<?php
		if($lokasi->id_jenis_objek == 2)
		{
			$tab_bangunan = $custom_data["tab_bangunan"];

			$i_bangunan   = 1;
			$a_bangunan   = 1;
			foreach($tab_bangunan as $key_bangunan => $item_bangunan)
			{
				$key_bangunan = str_replace(" ", "_", $key_bangunan);
	?>
	
	<br /><br />
	<div class="panel">
		<div class="panel-content">
			<table style="width: 720px;">
				<tr>
					<td style="padding: 10px; font-size: 16px;" align="center">
						LAMPIRAN 1<br />
						FOTO-FOTO <br />BANGUNAN <?=$i_bangunan?>
					</td>
					<td style="padding: 10px;">
						
						<table>
							<tr>
								<td align="left"><?=$data_lokasi[249][0]?></td>
								<td align="right">
									Tanggal Inspeksi  : <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][null] : 0)?>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="word-wrap: break-word; width: 500px;">
									Alamat Obyek  :<br />
									<?=(array_key_exists("277", $data_lokasi) ? $data_lokasi[277][0] : 0)?>
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
			<table style="width: 720px;" align="center" >
				<tr>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=base_url()?>asset/file/<?=(array_key_exists("873", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[873])) ? $data_lokasi[873][$key_bangunan] : "default.jpg")?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<span style="font-weight: bold">Keterangan :</span><br />
						<?=(array_key_exists("885", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[885])) ? $data_lokasi[885][$key_bangunan] : "")?>
					</td>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=base_url()?>asset/file/<?=(array_key_exists("874", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[874])) ? $data_lokasi[874][$key_bangunan] : "default.jpg")?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<span style="font-weight: bold">Keterangan :</span><br />
						<?=(array_key_exists("886", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[886])) ? $data_lokasi[886][$key_bangunan] : "")?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=base_url()?>asset/file/<?=(array_key_exists("875", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[875])) ? $data_lokasi[875][$key_bangunan] : "default.jpg")?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<span style="font-weight: bold">Keterangan :</span><br />
						<?=(array_key_exists("887", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[887])) ? $data_lokasi[887][$key_bangunan] : "")?>
					</td>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=base_url()?>asset/file/<?=(array_key_exists("876", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[876])) ? $data_lokasi[876][$key_bangunan] : "default.jpg")?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<span style="font-weight: bold">Keterangan :</span><br />
						<?=(array_key_exists("888", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[888])) ? $data_lokasi[888][$key_bangunan] : "")?>
					</td>
				</tr>
				<tr>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=base_url()?>asset/file/<?=(array_key_exists("877", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[877])) ? $data_lokasi[877][$key_bangunan] : "default.jpg")?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<span style="font-weight: bold">Keterangan :</span><br />
						<?=(array_key_exists("889", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[889])) ? $data_lokasi[889][$key_bangunan] : "")?>
					</td>
					<td valign="top" align="center" style="width: 330px;">
						<img src="<?=base_url()?>asset/file/<?=(array_key_exists("878", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[878])) ? $data_lokasi[878][$key_bangunan] : "default.jpg")?>" style="height: 200px; width: 330px; margin-bottom: 10px;"/><br />
						<span style="font-weight: bold">Keterangan :</span><br />
						<?=(array_key_exists("890", $data_lokasi) && (array_key_exists($key_bangunan, $data_lokasi[890])) ? $data_lokasi[890][$key_bangunan] : "")?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	
	
	<?php
				$i_bangunan++;
			}
		}
	?>
	
	<br /><br />
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
								<td align="left"><?=$data_lokasi[249][0]?></td>
								<td align="right">
									Tanggal Inspeksi  : <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][null] : 0)?>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="word-wrap: break-word; width: 500px;">
									Alamat Obyek  :<br />
									<?=(array_key_exists("277", $data_lokasi) ? $data_lokasi[277][0] : 0)?>
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
			<b>DENAH TANAH & BANGUNAN</b><br />
			<img src="<?=(array_key_exists("891", $data_lokasi) ? base_url()."asset/file/".$data_lokasi[891][null] : 0)?>" style="width: 500px"/>
			
			<br /><br />
			<b>PETA LOKASI PROPERTI & DATA PEMBANDING</b><br />
			<img src="<?=(array_key_exists("892", $data_lokasi) ? base_url()."asset/file/".$data_lokasi[892][null] : 0)?>" style="width: 500px"/>
		</div>
	</div>
	
	<br /><br />
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
								<td align="left"><?=$data_lokasi[249][0]?></td>
								<td align="right">
									Tanggal Inspeksi  : <?=(array_key_exists("9", $data_lokasi) ? $data_lokasi[9][null] : 0)?>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="word-wrap: break-word; width: 500px;">
									Alamat Obyek  :<br />
									<?=(array_key_exists("277", $data_lokasi) ? $data_lokasi[277][0] : 0)?>
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
			<b>INFORMASI DINAS TATA KOTA</b><br />
			<img src="<?=(array_key_exists("893", $data_lokasi) ? base_url()."asset/file/".$data_lokasi[893][null] : 0)?>" style="width: 500px"/>
			
			<br /><br />
			<b>Tabel Intensitas (Berupa Capture)</b><br />
			<img src="<?=(array_key_exists("894", $data_lokasi) ? base_url()."asset/file/".$data_lokasi[894][null] : 0)?>" style="width: 500px"/>
		</div>
	</div>
	
</body>