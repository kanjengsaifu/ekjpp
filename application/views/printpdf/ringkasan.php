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
		margin-top: 40px;
	}
	
	table{
		font-size: 10px;
	}
</style>

<body>
	<div class="page">
		<table style="width: 620px; border-bottom: 1px dotted #ccc; padding-bottom: 5px;">
			<tr>
				<td class="title" style="width: 620px"><u>RINGKASAN PENILAIAN</u></td>
			</tr>
		</table>
		<div class="page-content">
			
			<table cellpadding="0" cellspacing="0" style="border-top: 1px solid #ccc;border-right: 1px solid #ccc;">
				<thead>
					<tr bgcolor="#4C9ED9" style="color: #fff; font-weight: bold;">
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;">NO</td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;">URAIAN PROPERTI</td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;">LUAS (M<sup>2</sup> / JUMLAH)</td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;">NILAI PASAR (Rp)</td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;">NILAI LIKUIDASI (Rp)</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$i = 1;
						foreach ($data_survey["lokasi"] as $item_lokasi)
						{
					?>
					<tr style="font-weight: bold;">
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;" align="center"><?=$i?></td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;" colspan="4"><?=$item_lokasi["title"]?></td>
					</tr>
					<?php
							foreach ($item_lokasi["content"] as $key_content => $item_content)
							{
								// var_dump($key_content); echo "<br>";
					?>
					<tr>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;"></td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;"><?=$key_content?></td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;" align="center"><?=$item_content["jumlah"]?></td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;" align="right"><?=$item_content["nilai_pasar"]?></td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;" align="right"><?=$item_content["nilai_likuidasi"]?></td>
					</tr>
					<?php
							}
							
							$i++;
						}
					?>
				</tbody>
				<tfoot>
					<tr bgcolor="#4C9ED9" style="color: #fff; font-weight: bold;">
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;" colspan="3">TOTAL NILAI PROPERTI</td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;" align="right"><?=$data_survey["total_np"]?></td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;" align="right"><?=$data_survey["total_nl"]?></td>
					</tr>
					<tr bgcolor="#4C9ED9" style="color: #fff; font-weight: bold;">
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;" colspan="3">DIBULATKAN</td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;" align="right"><?=$data_survey["total_np_bulat"]?></td>
						<td style="border-bottom: 1px solid #ccc;border-left: 1px solid #ccc; padding: 5px 10px;" align="right"><?=$data_survey["total_nl_bulat"]?></td>
					</tr>
				</tfoot>
			</table>
			
		</div>
	</div>
</body>