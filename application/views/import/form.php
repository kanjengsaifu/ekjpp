<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>
<style>
	.table_custom{
		margin-bottom: 10px;
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
	    <h1><?php echo $title; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo base_url(); ?>">Home</a></li>
	        <li><a href="<?php echo base_url().$this->router->fetch_class(); ?>">Pekerjaan</a></li>
	        <li class="active"><?php echo $title; ?></li>
	    </ol>
	</section>
	<section class="content">
		<form name="form-klien" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>File</label>
							<input type="file" name="inpFile" id="inpFile" accept=".xlsm,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
						</div>
						<div class="form-group">
							<a href="<?php echo base_url().'asset/template/pekerjaan_lama.xlsx'; ?>"><span class="fa fa-file-excel-o"></span> Download Template</a>
						</div>
						
						<div class="form-group text-right">
							<button type="submit" class="btn btn-primary btn-sm btn-form-edit">UPLOAD</button>
							<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
						</div>
					</form>
	</section>
</div>

<?php echo $_template["_footer"]?>

<script>
		
	$(".btn-batal").click(function()
	{
		location = "<?=base_url()?>history/";
	});

</script>

<?php echo $_template["_foot"]?>