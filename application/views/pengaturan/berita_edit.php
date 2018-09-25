<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

<div class="container">
	<div class="row">

		<div class="col-md-12">
			<div class="content">
				<div class="content-inner inner-page">
					<h2 class="page-heading"><?=$title?></h2>
					<form name="form-user" method="post">
						<?=$input["id"]?>
						<?=$input["id_user"]?>
						<div class="form-group">
							<label>Judul <span class="text-required">*</span></label>
							<?=$input["judul"]?>
						</div>
						<div class="form-group">
							<label>Slug</label>
							<?=$input["slug"]?>
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<?=$input["id_kategori"]?>
						</div>
						<div class="form-group">
							<label>Thumbnail</label>
							<?=$input["thumbnail"]?>
						</div>
						<div class="form-group">
							<label>Content</label>
							<?=$input["content"]?>
						</div>
						<div class="form-group">
							<label>Status</label>
							<?=$input["status"]?>
						</div>
						<div class="form-group">
							<label>Tanggal</label>
							<?=$input["created"]?>
						</div>
						<div class="form-group text-right" style="padding: 15px;">
							<button type="button" class="btn btn-primary btn-sm btn-edit-submit">SIMPAN</button>
							<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>

<?php echo $_template["_footer"]?>

<script type="text/javascript">
	bkLib.onDomLoaded(function() {
		new nicEditor({fullPanel : true}).panelInstance('content');
	});
	
	$(document).ready(function(){
		$("#slug").attr("readonly", true);
		update_slug();
		
		$("#judul").keyup(function(){
	        update_slug();
	    });
	});
	
	function update_slug()
	{
        var judul    = $("#judul").val().toLowerCase();
        judul        = judul.replace(",", "").replace(".", "").replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
        $("#slug").val(judul);
	}
	
	$(".btn-edit-submit").click(function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id 				= $("#id").val();
			var judul 			= $("#judul").val();
			var slug 			= $("#slug").val();
			var content 		= nicEditors.findEditor('content').getContent();
			var id_kategori 	= $("#id_kategori").val();
			var status 			= $("#status").val();
			var id_user 		= $("#id_user").val();
			var thumbnail 		= $("#file").val();
			var created 		= $("#created").val();
			
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "ajax/do_update_data_global/",
				data	: {
					type : "berita",
					id : id,
					judul : judul,
					slug : slug,
					content : content,
					status : status,
					id_user : id_user,
					thumbnail : thumbnail,
					id_kategori : id_kategori,
					created : created
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
						location = "<?=base_url()?>pengaturan/berita/";
					}
				}
	    	});

		}
	});

	$(".btn-batal").click(function()
	{
		location = "<?=base_url()?>pengaturan/berita/";
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