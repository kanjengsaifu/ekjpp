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
				<h2 class="page-heading"><?=$title?></h2>
				<form name="form-klien" method="post">
					<?=$input["id_pekerjaan"]?>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>File Draft Laporan</label><span class="required">*</span>
								<input type="file" id="tmp_file" value="" readonly="" />
								<input type="hidden" id="draft_laporan" name="draft_laporan" value="" readonly="" />
								<div id="box_draft_laporan"></div>
							</div>
							<div class="form-group text-left">
								<button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>
								<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
							</div>
						</div>
					</div>
				</form>

				<?=$history?>
			</div>
		</div>
	</div>
	</section>
</div>

<?php echo $_template["_footer"]?>

<?php
	
?>
	
<script>
	var redirect_url	= "<?php if (array_key_exists('url', $_GET)) echo $_GET['url']; else echo ''; ?>";
	
	$(".btn-simpan").click(function()
	{	
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id_pekerjaan	= $("#id_pekerjaan").val();
			
			/*$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_update_data_tmp/",
				data	: {
					type : "laporan",
					id_pekerjaan : id_pekerjaan,
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
							location = "<?=base_url()?>pekerjaan/lokasi/";
						}
						
					}
				}
	    	});*/
			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_update_data_global/",
				data	: {
					type : "draft_laporan",
					id : null,
					id_pekerjaan : id_pekerjaan,
					filename : $("#draft_laporan").val()
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
			location = "<?=base_url()?>pekerjaan/lokasi/";
		}
	});

	// For Upload file / PO
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
						$("#draft_laporan").val(data);
						$("#box_draft_laporan").html("<a href='<?=base_url()?>asset/file/" + data + "' target='_blank'>Download</a>");
					}
	            }
	        });
	    }
	});
</script>

<?php echo $_template["_foot"]?>