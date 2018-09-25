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
				<div class="tab-boxed">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a aria-expanded="true" href="#umum" aria-controls="umum" role="tab" data-toggle="tab">Umum</a>
						</li>
						<li class="" role="presentation">
							<a aria-expanded="false" href="#email" aria-controls="email" role="tab" data-toggle="tab">Email Configuration</a>
						</li>
					</ul>

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="umum">
							<div style="width: 50%">
								<form name="form-umum" method="post">
									<div class="form-group">
										<label>Nama Situs</label>
										<?=$input["site_name"]?>
									</div>
									<div class="form-group">
										<label>Nama Perusahaan</label>
										<?=$input["company_name"]?>
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<?=$input["company_address"]?>
									</div>
									<div class="form-group">
										<label>Telepon</label>
										<?=$input["company_phone"]?>
									</div>
									<div class="form-group">
										<label>Fax</label>
										<?=$input["company_fax"]?>
									</div>
									<div class="form-group">
										<label>Email Kontak</label>
										<?=$input["email_kontak"]?>
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary btn-sm btn-form-umum">SIMPAN</button>
									</div>
								</form>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="email">
							<div style="width: 50%">
								<form name="form-email" method="post">
									<div class="form-group">
										<label>Host</label>
										<?=$input["mail_host"]?>
									</div>
									<div class="form-group">
										<label>SMTP Auth</label>
										<?=$input["mail_smtp_auth"]?>
									</div>
									<div class="form-group">
										<label>SMTP Secure</label>
										<?=$input["mail_smtp_secure"]?>
									</div>
									<div class="form-group">
										<label>Port</label>
										<?=$input["mail_port"]?>
									</div>
									<div class="form-group">
										<label>Email Pengirim</label>
										<?=$input["mail_email"]?>
									</div>
									<div class="form-group">
										<label>Username</label>
										<?=$input["mail_username"]?>
									</div>
									<div class="form-group">
										<label>Password</label>
										<?=$input["mail_password"]?>
									</div>
									<div class="form-group">
										<label>Nama</label>
										<?=$input["mail_from_name"]?>
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary btn-sm btn-form-mail">SIMPAN</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php echo $_template["_footer"]?>

<script type="text/javascript">
	$(document).on("click", ".btn-form-umum", function() 
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var site_name		= $("#site_name").val();
			var company_name	= $("#company_name").val();
			var company_address	= $("#company_address").val();
			var company_phone	= $("#company_phone").val();
			var company_fax		= $("#company_fax").val();
			var email_kontak	= $("#email_kontak").val();
			
			$.ajax({
		   		type	: "POST",
				url 	: base_url + "ajax/do_update_config/umum",
				data	: {
					site_name 		: site_name,
					company_name 	: company_name,
					company_address : company_address,
					company_phone 	: company_phone,
					company_fax 	: company_fax,
					email_kontak 	: email_kontak
				},
				beforeSend: function(){
		            $(".btn-form-umum").html("Loading...");
		            $(".btn-form-umum").prop("disabled", true);
		        },
				dataType	: "JSON",
				success	: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					
		            $(".btn-form-umum").html("SIMPAN");
		            $(".btn-form-umum").prop("disabled", false);
		            
				}
			});
		}
	});
	
	$(document).on("click", ".btn-form-mail", function() 
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var mail_host			= $("#mail_host").val();
			var mail_smtp_auth		= $("#mail_smtp_auth").val();
			var mail_smtp_secure	= $("#mail_smtp_secure").val();
			var mail_port			= $("#mail_port").val();
			var mail_username		= $("#mail_username").val();
			var mail_password		= $("#mail_password").val();
			var mail_from_name		= $("#mail_from_name").val();
			var mail_email			= $("#mail_email").val();
			

			
			$.ajax({
		   		type	: "POST",
				url 	: base_url + "ajax/do_update_config/mail",
				data	: {
					mail_host : mail_host,
					mail_smtp_auth : mail_smtp_auth,
					mail_smtp_secure : mail_smtp_secure,
					mail_port : mail_port,
					mail_username : mail_username,
					mail_password : mail_password,
					mail_from_name : mail_from_name,
					mail_email : mail_email
				},
				beforeSend: function(){
		            $(".btn-form-mail").html("Loading...");
		            $(".btn-form-mail").prop("disabled", true);
		        },
				dataType	: "JSON",
				success	: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					
		            $(".btn-form-mail").html("SIMPAN");
		            $(".btn-form-mail").prop("disabled", false);
		            
				}
			});
		}
	});
</script>

<?php echo $_template["_foot"]?>
