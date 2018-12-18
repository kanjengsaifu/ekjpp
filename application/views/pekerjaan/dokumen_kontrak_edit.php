<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

<div class="content-wrapper">
	<section class="content-header">
		<h1><?=$title?></h1>
		<ol class="breadcrumb">
			<li><?php echo $_breadcrumb ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="box box-info">
			<div class="box-body">
				<form name="form-dokumen" id="form-dokumen" method="post" enctype="multipart/form-data">
					Format Dokumen belum tersedia.
					<div class="form-group text-left" style="padding: 15px;">
						<!--<button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>-->
						<input type="button" class="btn btn-warning btn-sm btn-batal" value="KEMBALI" />
					</div>
				</form>
			</div>
		</div>
	</section>
</div>

<?php echo $_template["_footer"]?>

<script>
	var redirect_url	= "<?php if (array_key_exists('url', $_GET)) echo $_GET['url']; else echo ''; ?>";
	
	$(".btn-batal").click(function()
	{
		if (redirect_url){
			location = redirect_url;
		}else{
			location = "<?=base_url()?>pekerjaan/";
		}
	});
</script>

<?php echo $_template["_foot"]?>