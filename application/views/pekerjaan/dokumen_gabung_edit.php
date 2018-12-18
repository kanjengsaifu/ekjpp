<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

<div class="content-wrapper">
	<section class="content-header">
		<h1><?=$title?></h1>
	</section>
	<section class="content">
		<div class="box box-info">
			<div class="box-body">
				<form name="form-dokumen" id="form-dokumen" method="post" enctype="multipart/form-data">
					<?=$input["type"]?>
					<?=$input["id"]?>
					<?=$input["id_user"]?>
					<?=$input["id_pekerjaan"]?>
					<?=$input["id_dokumen_master"]?>
					
					<div class="form-group">
						<label>Nomor</label><span class="required">*</span>
						<?=$input["no"]?>
					</div>
					<div class="form-group">
						<label>Tanggal </label><span class="required">*</span>
						<?=$input["tanggal"]?>
					</div>
					
					<?php
						if ($id_dokumen_master != 8)
						{
					?>
					
					<div class="form-group">
						<label>Total</label><span class="required">*</span>
						<?=$input["total"]?>
					</div>
					
					<?php
						}
					?>
					
					<div class="form-group">
						<label>File <?php echo $dokumen_nama ?></label><span class="required">*</span>
						<?=$input["file"]?>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<?=$input["keterangan"]?>
					</div>
					
					<div class="form-group">
						<label>Dokumen <?php echo $dokumen_nama ?> Final</label>
						<input type="file" id="dokumen_final_tmp_file" class="form-control">
						<input type="hidden" id="dokumen_final_file" name="input[dokumen_final]" value="<?php echo !$dokumen_final ? "" : $dokumen_final ?>">
						<div id="dokumen_final_file_box">
							<?php echo !$dokumen_final ? "" : "<a href=\"".base_url()."asset/file/".$dokumen_final."\">Download</a>" ?>
						</div>
					</div>

					<div class="form-group text-right" style="padding: 15px;">
						<button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>
						<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
					</div>
				</form>
			</div>
		</div>
	</section>
</div>

<?php echo $_template["_footer"]?>

<script>
	var dokumen_gabung = <?php echo json_encode($dokumen); ?>;
var redirect_url	= "<?php if (array_key_exists('url', $_GET)) echo $_GET['url']; else echo ''; ?>";
	
$(document).ready(function(){
	/*$("#no_penawaran").attr("readonly", true);*/
	$('.number-total').number( true, 0 );
	$('.tanggal').datepicker();
});


$(function()
{
	// Variable to store your files
	var files;

	// Add events
	$('#tmp_file').on('change', prepareUpload);
	/*$('form').on('submit', uploadFiles);*/

	// Grab the files and set them to our variable
	function prepareUpload(event)
	{
		files = event.target.files;
		uploadFiles(event);
	}

	// Catch the form submit and upload the files
	function uploadFiles(event)
	{
		event.stopPropagation(); // Stop stuff happening
        event.preventDefault(); // Totally stop stuff happening

        // START A LOADING SPINNER HERE

        // Create a formdata object and add the files
		var data = new FormData();
		$.each(files, function(key, value)
		{
			data.append(key, value);
		});
		
        $.ajax({
            url: base_url + "Ajax/do_upload_data/?files",
            type: 'POST',
            data: data,
            cache: false,
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data)
            {
            	if (data != "")
            	{
					$("#file").val(data);
					$("#box_file").html("<a href='<?=base_url()?>asset/file/" + data + "' target='_blank'><img src='<?=base_url()?>asset/file/" + data + "' style='width: 200px;'></a>");
				}
            }
        });
    }
});

$(".btn-simpan").click(function() {
	if (window.confirm("Apakah Anda yakin?")) {
		$.post(base_url + "ajax/do_update_data_global/", $("#form-dokumen").serialize(), function (data) {
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
		}, "JSON");
		
		
		/*$.ajax({
    		type	: "POST",
			url 	: base_url + "ajax/do_update_data_global/",
			data	: $("#contactForm").serialize(),
			beforeSend: function(){
	            $(".btn-simpan").html("Loading...");
	            $(".btn-simpan").prop("disabled", true);
	        },
			dataType	: "JSON",
			success	: function (data) {
				
			}
    	});*/

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

// For Upload file / PO
$(function() {
	var files;
	$('#dokumen_final_tmp_file').on('change', prepareUpload);

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
					$("#dokumen_final_file").val(data);
					$("#dokumen_final_file_box").html("<a href='http://localhost/ekjpp/asset/file/" + data + "' target='_blank'>Download</a>");
				}
            }
        });
    }
});
</script>

<?php echo $_template["_foot"]?>