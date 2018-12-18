<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>
<div class="content-wrapper">
	<section class="content-header">
		<h1><?=$title?></h1>
		<ol class="breadcrumb">
			<li><?php echo $_breadcrumb ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="box box-info">
			<div class="box-body">
				<form name="form-dokumen" id="form-dokumen" method="post" enctype="multipart/form-data">
						<?=$input["id"]?>
						<?=$input["id_pekerjaan"]?>
						<?=$input["file"]?>
						
						<div class="form-group">
							<label>Tipe Dokumen</label>
							<?=$input["tipe"]?>
						</div>
						<div class="form-group">
							<label>Keterangan</label>
							<?=$input["keterangan"]?>
						</div>
						<div class="form-group">
							<label>File</label>
							<input type="file" name="tmpfile" id="tmpfile">
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

<?php
	
?>
	
<script>
	var redirect_url	= "<?php if (array_key_exists('url', $_GET)) echo $_GET['url']; else echo ''; ?>";
		
	$(document).ready(function(){
		
	});

	$(".btn-simpan").click(function() {
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id 				= $("#id").val();
			var id_pekerjaan	= $("#id_pekerjaan").val();
			var tipe 			= $("#tipe").val();
			var keterangan 		= $("#keterangan").val();
			var file 			= $("#file").val();

			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_update_data_global/",
				data	: {
					type : "dokumen",
					id : id,
					id_pekerjaan : id_pekerjaan,
					tipe : tipe,
					keterangan : keterangan,
					file : file

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
	
	$(function()
	{
		// Variable to store your files
		var files;

		// Add events
		$('input[type=file]').on('change', prepareUpload);
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
	            url: base_url + "ajax/do_upload_data/?files",
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
					}
	            }
	        });
	    }

	    function submitForm(event, data)
		{
			// Create a jQuery object from the form
			$form = $(event.target);
			
			// Serialize the form data
			var formData = $form.serialize();
			
			// You should sterilise the file names
			$.each(data.files, function(key, value)
			{
				formData = formData + '&filenames[]=' + value;
			});

			$.ajax({
				url: base_url + "ajax/do_upload_data/",
	            type: 'POST',
	            data: formData,
	            cache: false,
	            success: function(data)
	            {
	            	if (data != "")
	            	{
						$("#file").val(data);
					}
	            }
			});
		}
		
	});
</script>

<?php echo $_template["_foot"]?>