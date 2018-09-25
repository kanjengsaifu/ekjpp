<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<h5 class="widget-heading">KONTAK</h5>
					</div>
					<div class="panel-body">
						<form id="form-kontak" method="post" action="#">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" />
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Email" />
							</div>
							<div class="form-group">
								<label>Judul</label>
								<input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" />
							</div>
							<div class="form-group">
								<label>Pesan</label>
								<textarea class="form-control" rows="5" id="pesan"></textarea>
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-primary btn-block btn-kontak" style="width: 20%">KIRIM</button>
							</div>
							<div class="form-group">
								<hr/>
							</div>
							<div class="form-group">
								<img src="../asset/images/logomappinew.png" height="200px"/>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-md-8 -->
			<!-- END MAIN CONTENT -->
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>


<?php echo $_template["_footer"]?>

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click", ".btn-kontak", function() {
			$.ajax({
				type		: "POST",
				url 		: "<?=base_url()?>ajax/send_kontak/",
				dataType	: "JSON",	
				data		: {
					nama : $("#nama").val(),
					email : $("#email").val(),
					judul : $("#judul").val(),
					pesan : $("#pesan").val()
				},
				beforeSend: function() {
					$(".btn-kontak").html("Loading...");
	         	   	$(".btn-kontak").prop("disabled", true);
				},
				success		: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					$(".btn-kontak").html("KIRIM");
		            $(".btn-kontak").prop("disabled", false);
		            
					if (data.result.trim() == "success")
					{
						$(".btn-kontak").closest('form').find("input[type=email], input[type=text], textarea").val("");
					}
					
		           
				},
			});
		});
	});
</script>

<?php echo $_template["_foot"]?>