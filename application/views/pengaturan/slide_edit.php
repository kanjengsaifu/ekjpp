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
						<label>Title <span class="text-required">*</span></label>
						<?=$input["title"]?>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<?=$input["keterangan"]?>
					</div>
					<div class="form-group">
						<label>File Image <span class="text-required">*</span></label>
						<?=$input["image"]?>
					</div>
					<div class="form-group">
						<label>Order (Urutan) <span class="text-required">*</span></label>
						<?=$input["order"]?>
					</div>
					<div class="form-group text-right" style="padding: 15px;">
						<button type="button" class="btn btn-primary btn-sm btn-edit-submit">SIMPAN</button>
						<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
					</div>
				</form>
			</div>
		</div>
	</section>
</div>

<?php echo $_template["_footer"]?>

<script type="text/javascript">
	$(".btn-edit-submit").click(function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id 			= $("#id").val();
			var title 		= $("#title").val();
			var keterangan 	= $("#keterangan").val();
			var image 		= $("#file").val();
			var order 		= $("#order").val();
			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_update_data_global/",
				data	: {
					type : "slide",
					id : id,
					title : title,
					keterangan : keterangan,
					image : image,
					order : order
				},
				beforeSend: function(){
		            $(".btn-edit-submit").html("Loading...");
		            $(".btn-edit-submit").prop("disabled", true);
		        },
				dataType	: "JSON",
				success	: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					
		            $(".btn-edit-submit").html("SIMPAN");
		            $(".btn-edit-submit").prop("disabled", false);
		            
		            if (data.result.trim() == "success")
		            {
						location = "<?=base_url()?>pengaturan/slide/";
					}
				}
	    	});

		}
	});

	$(".btn-batal").click(function()
	{
		location = "<?=base_url()?>pengaturan/slide/";
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
</script>

<?php echo $_template["_foot"]?>