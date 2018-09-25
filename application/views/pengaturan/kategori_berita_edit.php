<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

<div class="container">
	<div class="row">

		<div class="col-md-6">
			<div class="content">
				<div class="content-inner inner-page">
					<h2 class="page-heading"><?=$title?></h2>
					<form name="form-user" method="post">
						<?=$input["id"]?>
						<div class="form-group">
							<label>Nama <span class="text-required">*</span></label>
							<?=$input["nama"]?>
						</div>
						<div class="form-group">
							<label>Slug</label>
							<?=$input["slug"]?>
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<?=$input["keterangan"]?>
						</div>
						<div class="form-group text-right" style="padding: 15px;">
							<button type="button" class="btn btn-primary btn-sm btn-form-user">SIMPAN</button>
							<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>

<?php echo $_template["_footer"]?>

<script>
	$(".btn-form-user").click(function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id 				= $("#id").val();
			var nama 			= $("#nama").val();
			var slug 			= $("#slug").val();
			var keterangan 		= $("#keterangan").val();
			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_update_data_global/",
				data	: {
					type : "kategori_berita",
					id : id,
					nama : nama,
					slug : slug,
					keterangan : keterangan
				},
				beforeSend: function(){
		            $(".btn-form-user").html("Loading...");
		            $(".btn-form-user").prop("disabled", true);
		            console.log("test");
		        },
				dataType	: "JSON",
				success	: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					
		            $(".btn-form-user").html("SIMPAN");
		            $(".btn-form-user").prop("disabled", false);
		            
		            if (data.result.trim() == "success")
		            {
						location = "<?=base_url()?>pengaturan/kategori_berita/";
					}
				}
	    	});

		}
	});

	$(".btn-batal").click(function()
	{
		location = "<?=base_url()?>pengaturan/kategori_berita/";
	});
</script>

<?php echo $_template["_foot"]?>