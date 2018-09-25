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
							<label>Ruang Lingkup Penugasan</label>
							<?=$input["ruang_lingkup"]?>
						</div>
						<div class="form-group">
							<label>Bidang Penugasan</label>
							<?=$input["bidang_penugasan"]?>
						</div>
						<div class="form-group">
							<label>Jumlah Orang</label>
							<?=$input["jumlah_orang"]?>
						</div>
						<div class="form-group">
							<label>Jangka Waktu</label>
							<?=$input["jangka_waktu"]?>
						</div>
						<div class="form-group">
							<label>Termin Pembayaran</label>
							<?=$input["termin_pembayaran"]?>
						</div>
						<div class="form-group">
							<label>Project Manager</label>
							<?=$input["project_manager"]?>
						</div>
						<div class="form-group">
							<label>Resiko</label>
							<?=$input["resiko"]?>
						</div>
						<div class="form-group">
							<label>Harga</label>
							<?=$input["harga"]?>
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
			var id = $("#id").val();
			var id_txn = $("#id_txn").val();
			var id_pekerjaan = $("#id_pekerjaan").val();
			
			var ruang_lingkup = $("#ruang_lingkup").val();
			var bidang_penugasan = $("#bidang_penugasan").val();
			var jumlah_orang = $("#jumlah_orang").val();
			var jangka_waktu = $("#jangka_waktu").val();
			var termin_pembayaran = $("#termin_pembayaran").val();
			var project_manager = $("#project_manager").val();
			var resiko = $("#resiko").val();
			var harga = $("#harga").val();
			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "AjaxPekerjaan/update_evaluasi/",
				data	: {
					type : "evaluasi",
					id : id,
					id_txn : id_txn,
					id_pekerjaan : id_pekerjaan,
					
					ruang_lingkup : ruang_lingkup,
					bidang_penugasan : bidang_penugasan,
					jumlah_orang : jumlah_orang,
					jangka_waktu : jangka_waktu,
					termin_pembayaran : termin_pembayaran,
					project_manager : project_manager,
					resiko : resiko,
					harga : harga


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