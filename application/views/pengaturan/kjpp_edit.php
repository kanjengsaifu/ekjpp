<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php echo $_template["_head"]?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Profil KJPP</h1>
		<ol class="breadcrumb">
			<li><?php echo $_breadcrumb ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="box">
			<div class="box-body">
				<?php
				if ( !empty($err_message) ) {
					?>
					<div class="alert alert-warning">
						<b>Warning!</b><br/>
						<?php echo $err_message; ?>
					</div>
					<?php
				}
				?>
				<form name="form-user" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode KJPP <span class="text-required">*</span></label>
						<?=$input["kode_kjpp"]?>
					</div>
					<div class="form-group">
						<label>Nama KJPP <span class="text-required">*</span></label>
						<?=$input["nama_kjpp"]?>
					</div>
					<div class="form-group">
						<label>Kode Identitas Kantor <span class="text-required">*</span></label>
						<?=$input["kode_identitas_kantor"]?>
						<span class="help-block">Identitas KJPP terdiri dari 6 (enam) digit angka, yang terdiri dari 4 (empat) digit terakhir izin usaha KJPP dan 2 (dua) angka kode sebagai KJPP pusat atau cabang (00 untuk pusat dan 01 dst untuk cabang), yang diantara keduanya dipisahkan oleh tanda hubung ("-"). Contoh : 1234-00</span>
					</div>
					<div class="form-group">
						<label>Logo KJPP <span class="text-required">*</span></label>
						<input type="file" class="form-control input-sm" name="logo_kjpp" value="logo_kjpp"></input>
					</div>
					<div class="form-group text-right" style="padding: 15px;">
						<button type="submit" class="btn btn-primary btn-sm btn-form-kjpp">SIMPAN</button>
						<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
<?php echo $_template["_footer"]?>
<script type="text/javascript">

	<?php
	if ( !empty($msg_ekjpp) ) {
		?>
		$(document).ready(function() {
			generate_notification('success', '<?php echo $msg_ekjpp; ?>', "topCenter");
		});
		<?php
	}
	?>

</script>