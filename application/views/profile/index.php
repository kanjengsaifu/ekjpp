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
		<div class="row">
			<div class="col-md-push-3 col-md-6">
				<!-- Widget: user widget style 1 -->
				<div class="box box-widget widget-user-2">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-aqua">
						<div class="widget-user-image">
							<img class="img-circle" src="<?=base_url()?>asset/images/avatar/<?=$user->avatar?>" alt="User">
						</div>
						<!-- /.widget-user-image -->
						<h3 class="widget-user-username"><?=$user->nama?></h3>
						<h5 class="widget-user-desc"><?=$user->nama_group?></h5>
					</div>
					<div class="box-footer no-padding">
						<form name="form-profile" method="post">
							<input type="hidden" id="id" name="id" value="<?=base64_encode($user->id)?>"/>
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#panel-profile" class="panel-head" aria-controls="panel-profile" role="tab" data-toggle="tab">Profile</a></li>
								<li role="presentation"><a href="#panel-password" class="panel-head" aria-controls="password" role="tab" data-toggle="tab">Ubah Password</a></li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content" style="padding: 20px; border: 1px solid #ddd;">
								<div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="panel-profile">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" class="form-control" id="nama" name="nama" value="<?=$user->nama?>" disabled="disabled">
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="text" class="form-control" id="email" name="email" value="<?=$user->email?>" disabled="disabled">
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<textarea id="alamat" name="alamat" class="form-control" disabled="disabled"><?=$user->alamat?></textarea>
									</div>
									<div class="form-group">
										<label>Telepon</label>
										<input type="text" class="form-control" id="telepon" name="telepon" value="<?=$user->telepon?>" disabled="disabled">
									</div>
									<div class="form-group text-right">
										
										<button type="button" class="btn btn-primary btn-sm btn-profile-edit">EDIT</button>
										<button type="button" class="btn btn-warning btn-sm btn-profile-batal">BATAL</button>
										<button type="button" class="btn btn-primary btn-sm btn-profile-simpan">SIMPAN</button>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" id="panel-password">
									<div class="form-group">
										<label>Password Lama</label>
										<input type="password" class="form-control" id="password1" name="password1">
									</div>
									<div class="form-group">
										<label>Password Baru</label>
										<input type="password" class="form-control" id="password2" name="password2">
									</div>
									<div class="form-group">
										<label>Ulangi Password Baru</label>
										<input type="password" class="form-control" id="password3" name="password3">
									</div>
									<div class="form-group text-right">
										<button type="button" class="btn btn-primary btn-sm btn-ubah-password">SIMPAN</button>
									</div>
								</div>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
	
<?php echo $_template["_footer"]?>

<script>
	$(document).ready(function(){
		$(".btn-profile-batal").hide();
		$(".btn-profile-simpan").hide();
	});
	
	$(document).on("click", ".btn-profile-edit", function() 
	{
		$("#panel-profile").find("input").prop("disabled", false);
		$("#panel-profile").find("textarea").prop("disabled", false);
		$(".btn-profile-batal").show();
		$(".btn-profile-simpan").show();
		$(this).hide();
	});
	
	
	$(document).on("click", ".btn-profile-batal", function() 
	{
		$("#panel-profile").find("input").prop("disabled", true);
		$("#panel-profile").find("textarea").prop("disabled", true);
		$(".btn-profile-edit").show();
		$(".btn-profile-simpan").hide();
		$(this).hide();
	});
	
	
	$(document).on("click", ".btn-profile-simpan", function() 
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id 		= $("#id").val();
			var nama	= $("#nama").val();
			var email	= $("#email").val();
			var alamat	= $("#alamat").val();
			var telepon	= $("#telepon").val();
						
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_update_data_global/",
				data	: {
					type : "profile",
					id : id,
					nama : nama,
					email : email,
					alamat : alamat,
					telepon : telepon

				},
				beforeSend: function(){
		            $(".btn-profile-simpan").html("Loading...");
		            $(".btn-profile-simpan").prop("disabled", true);
		            $(".btn-profile-batal").prop("disabled", true);
		        },
				dataType	: "JSON",
				success	: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					
		            $(".btn-profile-simpan").html("SIMPAN");
		            $(".btn-profile-simpan").prop("disabled", false);
		            $(".btn-profile-batal").prop("disabled", false);
					$("#panel-profile").find("input").prop("disabled", true);
					$("#panel-profile").find("textarea").prop("disabled", true);
		            
		            if (data.result.trim() == "success")
		            {
		            	$(".page-heading").html(nama);
		            	$(".name").html(nama);
					}
				}
	    	});

		}
	});
	
	
</script>

<?php echo $_template["_foot"]?>