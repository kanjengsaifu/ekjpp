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
						<?=$input["id_dokumen_master"]?>
						
						<div class="form-group">
							<label>Nomor Surat Penawaran</label>
							<?=$input["no_penawaran"]?>
						</div>
						<div class="form-group">
							<label>Kota dikeluarkan Surat</label><span class="required">*</span>
							<?=$input["kota"]?>
						</div>
						<div class="form-group">
							<label>Tanggal Terbit Surat</label><span class="required">*</span>
							<?=$input["tanggal"]?>
						</div>
						<div class="form-group">
							<label>UP</label><span class="required">*</span>
							<?=$input["up"]?>
						</div>
						<div class="form-group">
							<label>Domisili Pemberi Kerja</label><span class="required">*</span>
							<?=$input["domisili"]?>
						</div>
						<div class="form-group">
							<label>Kontak Pemberi Kerja</label><span class="required">*</span>
							<?=$input["kontak"]?>
						</div>
						<div class="form-group">
							<label>Komunikasi Via</label><span class="required">*</span>
							<?=$input["komunikasi_via"]?>
							<?=$input["komunikasi_via_keterangan"]?>
						</div>
						<div class="form-group">
							<label>Tanggal Komunisasi</label><span class="required">*</span>
							<?=$input["tanggal_komunikasi"]?>
						</div>
						<div class="form-group">
							<label>Tujuan Penilaian</label><span class="required">*</span>
							<?=$input["tujuan_penilaian"]?>
						</div>
						<div class="form-group">
							<label>Biaya</label>
							<?=$input["biaya"]?>
						</div>
						<div class="form-group">
							<label>Penanda Tangan Laporan</label><span class="required">*</span>
							<?=$input["penanda_tangan"]?>
						</div>
						<div class="form-group">
							<label>Dokumen Final</label>
							<input type="file" id="dokumen_final_tmp_file" class="form-control">
							<input type="hidden" id="dokumen_final_file" name="dokumen_final" value="<?php echo !$dokumen_final ? "" : $dokumen_final ?>">
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

<style>
	#komunikasi_via_keterangan{
		margin-top: 5px;
	}
</style>
<script>
var redirect_url	= "<?php if (array_key_exists('url', $_GET)) echo $_GET['url']; else echo ''; ?>";
	
$(document).ready(function(){
	$("#no_penawaran").attr("readonly", true);
	$("#biaya").attr("readonly", true);
	$('#biaya').number( true, 0 );
	
	if ($("#komunikasi_via").val() == "Surat")
	{
		$("#komunikasi_via_keterangan").show();
	}
	else
	{
		$("#komunikasi_via_keterangan").hide();
	}
});

$(document).on("change", "#komunikasi_via", function()  {
	if ($("#komunikasi_via").val() == "Surat")
	{
		$("#komunikasi_via_keterangan").show();
	}
	else
	{
		$("#komunikasi_via_keterangan").hide();
	}
});

$(".btn-simpan").click(function() {
	if (window.confirm("Apakah Anda yakin?"))
	{
		var id = $("#id").val();
		var id_pekerjaan = $("#id_pekerjaan").val();
		var id_dokumen_master = $("#id_dokumen_master").val();
		var no_penawaran = $("#no_penawaran").val();
		var tanggal = $("#tanggal").val();
		var kota = $("#kota").val();
		var up = $("#up").val();
		var domisili = $("#domisili").val();
		var kontak = $("#kontak").val();
		var komunikasi_via = $("#komunikasi_via").val();
		var komunikasi_via_keterangan = $("#komunikasi_via_keterangan").val();
		var tanggal_komunikasi = $("#tanggal_komunikasi").val();
		var tujuan_penilaian = $("#tujuan_penilaian").val();
		var biaya = $("#biaya").val();
		var penanda_tangan = $("#penanda_tangan").val();
		var dokumen_final = $('[name="dokumen_final"]').val();
		
		$.ajax({
    		type	: "POST",
			url 	: base_url + "ajax/do_update_data_global/",
			data	: {
				type : "dokumen_penawaran",
				id : id,
				id_pekerjaan : id_pekerjaan,
				id_dokumen_master : id_dokumen_master,
				no_penawaran : no_penawaran,
				tanggal : tanggal,
				kota : kota,
				up : up,
				domisili : domisili,
				kontak : kontak,
				komunikasi_via : komunikasi_via,
				komunikasi_via_keterangan : komunikasi_via_keterangan,
				tanggal_komunikasi : tanggal_komunikasi,
				tujuan_penilaian : tujuan_penilaian,
				biaya : biaya,
				penanda_tangan : penanda_tangan,
				dokumen_final : dokumen_final
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