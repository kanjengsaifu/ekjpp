<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php echo $_template["_head"]?>
<style>
	.table_custom{
		margin-bottom: 10px;
	}
</style>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?=$title?></h1>
		<ol class="breadcrumb">
			<li><?php echo $_breadcrumb ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-body">
				<table>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Jenis Objek</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=$objek->nama_jenis_objek?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Alamat</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=$objek->alamat?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Tanggal Harapan Survey</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=$objek->tanggal?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Transportasi Survey</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=$objek->nama_transportasi?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Pengembangan Diatasnya Berupa</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=$objek->pengembangan?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Pemegang Hak</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=$objek->pemegang_hak?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Luas Tanah</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=$objek->luas_tanah?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Luas Bangunan</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=$objek->luas_bangunan?></b></td>
					</tr>
					
					
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Tanggal Survey</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=$objek->tanggal_survey?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Survey Oleh</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=($objek_tmp->num_rows() == 0 ? "-" : $objek_tmp->row()->surveyor)?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Nama Pendamping Survey</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=($objek_tmp->num_rows() == 0 ? "-" : $objek_tmp->row()->nama_pendamping)?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>No Kontak Pendamping</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=($objek_tmp->num_rows() == 0 ? "-" : $objek_tmp->row()->kontak_pendamping)?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Jabatan Pendamping</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=($objek_tmp->num_rows() == 0 ? "-" : $objek_tmp->row()->jabatan_pendamping)?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Photo Pendamping</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'>
							
							<?php
								if ($objek_tmp->num_rows() == 0)
								{
									echo "-";
								}
								else
								{
							?>
							<img src="<?=base_url()?>asset/file/<?=($objek_tmp->num_rows() == 0 ? "-" : $objek_tmp->row()->photo_pendamping)?>" style="width: 50%; margin: 10px;" />
							<?php	
								}
							?>
						</td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>No Laporan</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=($objek_tmp->num_rows() == 0 ? "-" : $objek_tmp->row()->no_laporan)?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Tanggal Laporan</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=$objek->tanggal_laporan?></b></td>
					</tr>
					<tr style='border: 0px;'>
						<td style='padding: 1px;' valign='top'>Penandatangan Laporan</td>
						<td style='padding: 1px;' valign='top' width='20' align='center'>:</td>
						<td style='padding: 1px;' valign='top'><b><?=($objek_tmp->num_rows() == 0 ? "-" : $objek_tmp->row()->penandatangan_laporan)?></b></td>
					</tr>
				</table>
			</div>
			<div class="box-footer">
				<a href="<?=base_url()?>objek" class="btn btn-sm btn-primary">KEMBALI</a>
			</div>
		</div>
	</section>
</div>

<?php echo $_template["_footer"]?>
<script>
	
</script>
<?php echo $_template["_foot"]?>