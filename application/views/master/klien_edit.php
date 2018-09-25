<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>
<style>
	.table_custom{
		margin-bottom: 10px;
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1><?=$title?></h1>
	</section>
	<section class="content">
		<div class="box box-info">
			<div class="box-body">
				<form name="form-klien" method="post">
					<?=$input["id"]?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Nama Klien</label>
								<?=$input["nama"]?>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<?=$input["alamat"]?>
							</div>
							<div class="form-group">
								<label>Provinsi</label>
								<?=$input["id_provinsi"]?>
							</div>
							<div class="form-group">
								<label>Kota</label>
								<div id="box_kota"><?=$input["id_kota"]?></div>
							</div>
							<div class="form-group">
								<label>Kode Pos</label>
								<?=$input["kode_pos"]?>
							</div>
							<div class="form-group">
								<label>Status Kepemilikan</label>
								<?=$input["status_kepemilikan"]?>
							</div>
							<div class="form-group">
								<label>Bidang Usaha</label>
								<?=$input["bidang_usaha"]?>
							</div>
							<?php $id_bidang_usaha = empty($objek_edit->id_bidang_usaha) ? NULL : $objek_edit->id_bidang_usaha; ?>
							<div class="form-group form_bu_lainnya" <?php echo $id_bidang_usaha == 17 ? NULL : 'style="display:none;"' ?>>
								<label>Bidang Usaha Lainnya</label>
								<?=$input["bidang_usaha_lainnya"]?>
							</div>
							<div class="form-group">
								<label>Go Publik</label>
								<div>
									<?php $go_publik = (isset($objek_edit->go_publik) ? $objek_edit->go_publik : NULL); ?>
								<input type="radio" id="go_publik_1" name="go_publik" value="1" <?php echo $go_publik == 1 ? 'checked' : NULL; ?>> Ya
								<input type="radio" id="go_publik_2" name="go_publik" value="0" <?php echo $go_publik == 0 && is_numeric($go_publik) ? 'checked' : NULL; ?>> Tidak
								</div>
							</div>
		                    <div class="form-group">
								<label>NPWP</label>
								<?=$input["npwp"]?>
							</div>
		                    <div class="form-group">
								<label>Attachment NPWP</label>
								<input type="file" id="tmp_file" value="" readonly="" />
								<input type="hidden" id="npwp_file" name="npwp_file" value="" readonly="" />
								<div id="npwp_file_box"></div>

							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Telepon</label>
								<?=$input["telepon"]?>
							</div>
		                    <div class="form-group">
								<label>Fax</label>
								<?=$input["fax"]?>
							</div>
		                                            <div class="form-group">
								<label>Website</label>
								<?=$input["website"]?>
							</div>
							<div class="form-group">
								<label>Contact Person</label>
								<?=$input["nama_kontak"]?>
							</div>
							<div class="form-group">
								<label>Nomor HP</label>
								<?=$input["no_kontak"]?>
							</div>
							<div class="form-group">
								<label>Email Kantor</label>
								<?=$input["email"]?>
							</div>
		                                            <div class="form-group">
								<label>Email Pribadi</label>
								<?=$input["emailpribadi"]?>
							</div>
							<div class="form-group">
								<label>Debitur Bank</label>
								<?=$input["id_debitur"]?>
							</div>
							<div class="form-group">
								<label>Catatan</label>
								<?=$input["catatan"]?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group pull-right" style="padding: 15px;">
								<button type="button" class="btn btn-primary btn-sm btn-form-klien">SIMPAN</button>
								<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>

<?php echo $_template["_footer"]?>

<script>
	var redirect_url	= "<?php if (array_key_exists('url', $_GET)) echo $_GET['url']; else echo ''; ?>";
	$(document).ready(function(){
		$("#id_kota").prop("disabled", true);
		
		var id_provinsi		= $("#id_provinsi").val();
		
		if(id_provinsi){
			get_location("kota", "box_kota", "id_kota", id_provinsi, $("#id_kota").val());
		}
		$('#bidang_usaha').change(function() {
			var bidang_usaha = $(this).val();
			if ( parseInt(bidang_usaha) === 17 ) {
				$('.form_bu_lainnya').show();
			} else {
				$('.form_bu_lainnya').hide();
			}
		});
	});

	$(".btn-form-klien").click(function() {
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id 				= $("#id").val();
			var nama 			= $("#nama").val();
			var alamat 			= $("#alamat").val();
			var id_provinsi 	= $("#id_provinsi").val();
			var id_kota 		= $("#id_kota").val();
			var kode_pos 		= $("#kode_pos").val();
			var status_kepemilikan 		= $("#status_kepemilikan").val();
			var bidang_usaha 		= $("#bidang_usaha").val();
			var bidang_usaha_lainnya = $("#bidang_usaha_lainnya").val();
			var go_publik = $('input[name="go_publik"]:checked').val();
			var npwp                = $("#npwp").val();var telepon 		= $("#telepon").val();
			var fax 			= $("#fax").val();
			var no_kontak 		= $("#no_kontak").val();
			var nama_kontak 	= $("#nama_kontak").val();
			var id_debitur 		= $("#id_debitur").val();
			var catatan 		= $("#catatan").val();
            var email               = $("#email").val();
            var website            = $("#website").val();
            var emailpribadi       = $("#emailpribadi").val();
            var npwp_file = $("#npwp_file").val();
			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_klien_edit/",
				data	: {
					id : id,
					nama : nama,
					alamat : alamat,
					id_provinsi : id_provinsi,
					id_kota : id_kota,
					kode_pos : kode_pos,
					id_status_kepemilikan : status_kepemilikan,
					id_bidang_usaha : bidang_usaha,
					bidang_usaha_lainnya: bidang_usaha_lainnya,
					go_publik : go_publik,
					npwp : npwp,
					telepon : telepon,
					fax : fax,
					no_kontak : no_kontak,
					nama_kontak : nama_kontak,
					id_debitur : id_debitur,
					catatan : catatan,
			        email : email,
			        website : website,
			        emailpribadi : emailpribadi,
			        npwp_file : npwp_file
                                        
				},
				beforeSend: function(){
		            $(".btn-form-klien").html("Loading...");
		            $(".btn-form-klien").prop("disabled", true);
		        },
				dataType	: "JSON",
				success	: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					
		            $(".btn-form-klien").html("SIMPAN");
		            $(".btn-form-klien").prop("disabled", false);
		            
		            if (data.result.trim() == "success")
		            {
		            	if (redirect_url){
							location = redirect_url;
						}else{
							location = "<?=base_url()?>master/klien/";
						}
						
					}
				}
	    	});

		}
	});

	$(".btn-batal").click(function() {
		if (redirect_url){
			location = redirect_url;
		}else{
			location = "<?=base_url()?>master/klien/";
		}
	});


	// For Upload file / PO
	$(function() {
		var files;

		$('#tmp_file').on('change', prepareUpload);

		function prepareUpload(event) {
			files = event.target.files;
			uploadFiles(event);
		}

		function uploadFiles(event) {
			event.stopPropagation();
	        event.preventDefault();

			var data = new FormData();
			$.each(files, function(key, value) {
				data.append(key, value);
			});

	        $.ajax({
	            url: base_url + "Ajax/do_upload_data/?files",
	            type: 'POST',
	            data: data,
	            cache: false,
	            processData: false,
	            contentType: false,
	            success: function(data) {
	            	if (data != "") {
						$("#npwp_file").val(data);
						$("#npwp_file_box").html("<a href='<?php echo base_url() ?>asset/file/" + data + "' target='_blank'>Download</a>");
					}
	            }
	        });
	    }
	});


</script>

<?php echo $_template["_foot"]?>