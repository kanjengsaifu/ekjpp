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
							<td rowspan="2"><img src="<?=base_url("asset/images/kwitansi_logo.png")?>" style="width: 150px;"/></td>
							<td><span style="font-size: 12px; font-weight: bold; color: #201A48">KJPP ASNO MINANDA USEP PRAWIRA DAN REKAN</span></td>
						</tr>
						<tr>
							<td>
								<span style="font-size: 10px; font-weight: bold;">Kantor Jasa Penilai Publik</span><br />
								<span style="font-size: 8px;">Nomor Izin : 2.16.0139, Kep. Menkeu Nomor : 1020/KM, 1/2016</span><br />
								<span style="font-size: 8px;">Wilayah Negara Republik Indonesia</span><br />
								<span style="font-size: 8px;"><?=$company_address;?></span><br />
								<span style="font-size: 8px;">Telp : <?=$company_phone?> (hunting), Fax : <?=$company_fax?>, Email : consulting@kjpp-asus.com </span><br />
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
							<td width="20px">1.</td>
							<td width="80px">Nama</td>
							<td width="10px" style="text-align: center">:</td>
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
										<td style="width: 150px;">No. Kwitansi : <?=$kwitansi->no?></td>
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
							<td><?=terbilang($kwitansi->sebesar)?></td>
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

