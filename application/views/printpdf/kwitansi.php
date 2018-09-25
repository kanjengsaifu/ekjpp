<style type="text/css">
	.page
	{
		border: 1px dotted #ccc;
		padding: 10px;
		width: 730px;
		font-size: 10px;
		color: #2c59d3;
	}
</style>
<body>
	<div class="page">
		<table cellpadding="0" cellspacing="0" style="width: 710px;">
			<tr>
				<td style="width: 500px;">
					<table>
						<tr>
							<td>
								<img src="<?=base_url("asset/images/kwitansi_logo.jpg")?>" style="width: 100px;"/>
							</td>
							<td>
								<img src="<?=base_url("asset/images/kwitansi_text.jpg")?>" style="width: 150px;"/><br />
								<span style="font-size: 10px; font-weight: bold;">Kantor Jasa Penilai Publik</span><br />
								<span style="font-size: 8px;">Nomor Izin : 2.10.0081, Kep. Menkeu Nomor : 83/KM, 1/2010</span><br />
								<span style="font-size: 9px;">d/h. : <b>PT. RAXINDO WARDANA</b></span><br />
								<span style="font-size: 10px;">Sentra Arteri Mas</span><br />
								<span style="font-size: 8px;">Jl. Sultan Iskandar Muda Kav. 10V (Arteri Pondok Indah), Kebayoran Lama - Jakarta 12240</span><br />
								<span style="font-size: 8px;">Telp : 021-727-95755 (hunting), Fax : 021-727-96335, Email : consulting@raxindo.com </span><br />
							</td>
						</tr>
					</table>
				</td>
				<td style="width: 210px; vertical-align: middle; text-align: center;">
					<div style="padding: 5px; background-color: #336FCB; color: #fff; font-size: 12px; width: 100px;">KWITANSI</div>
				</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" style="width: 710px; margin-top: 20px; font-size: 10px">
			<tr>
				<td>
					<table>
						<tr>
							<td colspan="4">Telah terima dari</td>
						</tr>
						<tr>
							<td>1.</td>
							<td>Nama</td>
							<td>:</td>
							<td><?=$klien->nama_kontak?></td>
						</tr>
						<tr>
							<td>2.</td>
							<td>Perusahaan</td>
							<td>:</td>
							<td><?=$klien->nama?></td>
						</tr>
						<tr>
							<td>3.</td>
							<td>Alamat</td>
							<td>:</td>
							<td><?=$klien->alamat?>, <?=$klien->kota?> - <?=$klien->provinsi?></td>
						</tr>
						<tr>
							<td>4.</td>
							<td>Telepon</td>
							<td>:</td>
							<td><?=$klien->telepon?></td>
						</tr>
						<tr>
							<td colspan="4"><br /><br /> Berupa :</td>
						</tr>
						<tr>
							<td colspan="4">
								<table cellpadding="0" cellspacing="0">
									<tr>
										<td style="width: 150px;">
											<span style="width: 30px; height: 30px;<?=($kwitansi->berupa == "Uang Tunai" ? "background-color: #999;" : "background-color: #ccc;")?> border: 1px solid #333;">&nbsp;&nbsp;&nbsp;</span> Uang Tunai
											<!--<input type="checkbox" <?=($kwitansi->berupa == "Uang Tunai" ? "background-color: #CCC;" : "")?> />--> 
										</td>
										<td style="width: 150px;">
											<span style="width: 30px; height: 30px; <?=($kwitansi->berupa == "Cek / Giro Biylet" ? "background-color: #999;" : "background-color: #ccc;")?> border: 1px solid #333;">&nbsp;&nbsp;&nbsp;</span> Cek / Giro Biylet
											<!--<input type="checkbox" <?=($kwitansi->berupa == "Cek / Giro Biylet" ? "checked" : "")?>/>--> 
										</td>
										<td style="width: 150px;">Bank : <?=$kwitansi->bank?></td>
										<td style="width: 150px;">No. : <?=$kwitansi->no?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<div style="width: 210px; margin-top: 20px; font-size: 10px; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; padding:10px; ">
			Sebesar <span style="font-size: 14px; margin-left: 15px;">Rp <?=number_format($kwitansi->sebesar)?></span>
		</div>
		
		<table cellpadding="0" cellspacing="0" style="width: 710px; margin-top: 20px; font-size: 10px">
			<tr>
				<td>
					<table>
						<tr>
							<td>Terbilang</td>
							<td>:</td>
							<td><?=$kwitansi->terbilang?></td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td>:</td>
							<td><?=$kwitansi->keterangan?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
		<table cellpadding="0" cellspacing="0" style="width: 710px; margin-top: 20px; font-size: 10px">
			<tr>
				<td style="width: 400px;" valign="top">
					Dikirim oleh : <?=$kwitansi->dikirim?>
				</td>
				<td valign="top">
					Jakarta, <?=date("d F Y", strtotime($kwitansi->tanggal))?><br />
					Diterima oleh : <?=$kwitansi->diterima?>
				</td>
			</tr>
		</table>
	</div>
</body>

