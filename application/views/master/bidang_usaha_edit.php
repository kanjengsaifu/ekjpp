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
		<form name="form-bidang-usaha" id="form-bidang-usaha" method="post">
						<?=$input["id"]?>
						<div class="form-group">
							<label>Kode</label>
							<?=$input["kode"]?>
						</div>
						<div class="form-group">
							<label>Bidang Usaha</label>
							<?=$input["bidang_usaha"]?>
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-primary btn-sm btn-form-edit">SIMPAN</button>
							<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
						</div>
					</form>
	</section>
</div>
<?php echo $_template["_footer"]?>
<script>
	$(document).ready(function(){
		
	});

	$("#form-bidang-usaha").submit(function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id 				= $("#id").val();
			var kode 			= $("#kode").val();
			var bidang_usaha	= $("#bidang_usaha").val();
			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_update_data/",
				data	: {
					type : "bidang_usaha",
					id : id,
					kode : kode,
					bidang_usaha : bidang_usaha
				},
				beforeSend: function(){
		            $(".btn-form-edit").html("Loading...");
		            $(".btn-form-edit").prop("disabled", true);
		        },
				dataType	: "JSON",
				success	: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");					
		            $(".btn-form-edit").html("SIMPAN");
		            $(".btn-form-edit").prop("disabled", false);
		            
		            if (data.result.trim() == "success")
		            {
						location = "<?=base_url()?>master/bidang_usaha/";
					}
				}
	    	});

		}
		return false;
	});

	$(".btn-batal").click(function()
	{
		location = "<?=base_url()?>master/bidang_usaha/";
	});

</script>

<?php echo $_template["_foot"]?>