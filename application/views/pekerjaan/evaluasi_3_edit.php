<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

<div class="container">
	<div class="row">

		<div class="col-md-8">
			<div class="content">
				<div class="content-inner inner-page">
					<h2 class="page-heading"><?=$title?></h2>
					<form name="form-lembar-kendali" method="post">
						<?=$input["id"]?>
						<?=$input["id_pekerjaan"]?>
						<?=$input["id_txn"]?>
						
						<div class="form-group">
							<label>Catatan Pekerjaan Secara Teknis</label>
							<?=$input["catatan_teknis"]?>
						</div>
						<div class="form-group">
							<label>Catatan Pekerjaan Alokasi SDM</label>
							<?=$input["catatan_sdm"]?>
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<?=$input["keterangan"]?>
						</div>
						<div class="form-group text-right" style="padding: 15px;">
							<button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>
							<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $_template["_footer"]?>

<?php
	
?>
	
<script>
	var redirect_url	= "<?php if (array_key_exists('url', $_GET)) echo $_GET['url']; else echo ''; ?>";
		
	$(document).ready(function(){
		
	});

	$(".btn-simpan").click(function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id 				= $("#id").val();
			var id_txn			= $("#id_txn").val();
			var id_pekerjaan	= $("#id_pekerjaan").val();
			var catatan_teknis 	= $("#catatan_teknis").val();
			var catatan_sdm 	= $("#catatan_sdm").val();
			var keterangan 		= $("#keterangan").val();


			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "AjaxPekerjaan/update_evaluasi/",
				data	: {
					type : "evaluasi",
					id : id,
					id_txn : id_txn,
					id_pekerjaan : id_pekerjaan,
					catatan_teknis : catatan_teknis,
					catatan_sdm : catatan_sdm,
					keterangan : keterangan

				},
				beforeSend: function(){
		            $(".btn-simpan").html("Loading...");
		            $(".btn-simpan").prop("disabled", true);
		        },
				dataType	: "JSON",
				success	: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					
		            $(".btn-simpan").html("SIMPAN");
		            $(".btn-simpan").prop("disabled", false);
		            
		            if (data.result.trim() == "success")
		            {
		            	if (redirect_url){
							location = redirect_url;
						}else{
							location = "<?=base_url()?>pekerjaan/";
						}
						
					}
				}
	    	});

		}
	});

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