<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

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
				<form name="form-klien" method="post">
					<?=$input["id"]?>
					<div class="form-group">
						<label>Nama</label>
						<?=$input["nama"]?>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<?=$input["keterangan"]?>
					</div>
					<div class="form-group text-right">
						<button type="button" class="btn btn-primary btn-sm btn-form-edit">SIMPAN</button>
						<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
					</div>
				</form>	
			</div>
		</div>	
	</section>
</div>

<?php echo $_template["_footer"]?>

<script>
	$(document).ready(function(){
		
	});

	$(".btn-form-edit").click(function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id 				= $("#id").val();
			var nama 			= $("#nama").val();
			var keterangan		= $("#keterangan").val();
			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_update_data/",
				data	: {
					type : "transportasi",
					id : id,
					nama : nama,
					keterangan : keterangan
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
						location = "<?=base_url()?>master/transportasi/";
					}
				}
	    	});

		}
	});

	$(".btn-batal").click(function()
	{
		location = "<?=base_url()?>master/transportasi/";
	});

</script>

<?php echo $_template["_foot"]?>