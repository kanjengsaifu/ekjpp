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
				<form name="form-user" method="post">
					<?=$input["id"]?>
					<div class="form-group">
						<label>Group <span class="text-required">*</span></label>
						<?=$input["id_group"]?>
					</div>
					<div class="form-group">
						<label>Email <span class="text-required">*</span></label>
						<?=$input["email"]?>
					</div>
					<div class="form-group">
						<label>Nama <span class="text-required">*</span></label>
						<?=$input["nama"]?>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<?=$input["alamat"]?>
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<?=$input["telepon"]?>
					</div>
                    <div class="form-group">
						<label>Jabatan</label>
						<?=$input["jabatan"]?>
					</div>
                    <div class="form-group">
						<label>No. Mappi</label>
						<?=$input["no_mappi"]?>
					</div>
                    <div class="form-group">
						<label>No. Izin Penilai Publik</label>
						<?=$input["no_ijinpp"]?>
					</div>
					<div class="form-group text-right" style="padding: 15px;">
						<button type="button" class="btn btn-primary btn-sm btn-form-user">SIMPAN</button>
						<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
					</div>
				</form>
			</div>
		</div>
	</section>
</div>

<?php echo $_template["_footer"]?>

<script>
	$(".btn-form-user").click(function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id 				= $("#id").val();
			var id_group		= $("#id_group").val();
			var email 			= $("#email").val();
			var nama 			= $("#nama").val();
			var alamat 			= $("#alamat").val();
			var telepon 		= $("#telepon").val();
			var jabatan  		= $("#jabatan").val();
			var no_mappi		= $("#no_mappi").val();
			var no_ijinpp       = $("#no_ijinpp").val();
			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_user_edit/",
				data	: {
					id : id,
					id_group : id_group,
					email : email,
					nama : nama,
					alamat : alamat,
					telepon : telepon,
					jabatan : jabatan,
					no_mappi : no_mappi,
					no_ijinpp : no_ijinpp
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
						location = "<?=base_url()?>pengaturan/user/";
					}
				}
	    	});

		}
	});

	$(".btn-batal").click(function()
	{
		location = "<?=base_url()?>pengaturan/user/";
	});
</script>

<?php echo $_template["_foot"]?>