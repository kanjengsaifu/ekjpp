<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

<style type="text/css">
	ol{list-style: none;margin:0;padding: 0}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1><?=$title?></h1>
	</section>
	<section class="content">
		<div class="box box-info">
			<div class="box-body">
				<form name="form-lembar-kendali" method="post">
					<?=$input["id"]?>
					<?=$input["id_pekerjaan"]?>
					<?=$input["step"]?>
					<?=$input["id_status"]?>

					<ol class="draf-lembar-kendali">
						
						<li type="">
							
							<table border="0" class="table-lembar-kendali" style="border-color: #17AE00;border-width: thin;">
								<tr>
									<td valign="top"></td>
									<td valign="top" style="width: 50%"></td>
									<td valign="top"></td>
									<td valign="top">Komentar</td>
								</tr>
								<tr>
									<td valign="top">1.</td>
									<td valign="top">Pastikan Kertas Kerja telah diisisesuai dengan data, metoda penilaian dan analisis yang dilakukan</td>
									<td valign="top" style="width: 300px;"><?=$input["jawab_1a"]?></td>
									<td valign="top" style="width: 200px;"><?=$input["jawab_1b"]?></td>
								</tr>
								<tr>
									<td valign="top">2.</td>
									<td valign="top">Pastikan Kertas Kerja telah melalui review oleh Project Manager, Partner dll</td>
									<td valign="top"><?=$input["jawab_2a"]?></td>
									<td valign="top"><?=$input["jawab_2b"]?></td>
								</tr>
								<tr>
									<td valign="top">3.</td>
									<td valign="top">Pastikan konsistensi data, metoda penilaian dan analisis pada Kertas Kerja, draft Laporan Penilaian, serta Laporan Penilaian</td>
									<td valign="top"><?=$input["jawab_3a"]?></td>
									<td valign="top"><?=$input["jawab_3b"]?></td>
								</tr>
								<tr>
									<td valign="top">4.</td>
									<td valign="top">Pastikan ada dokumentasi untuk proses penerimaan atau keberlanjutan klien</td>
									<td valign="top"><?=$input["jawab_4a"]?></td>
									<td valign="top"><?=$input["jawab_4b"]?></td>
								</tr>
								<tr>
									<td valign="top">5.</td>
									<td valign="top">Pastikan telah dilakukan evaluasi terhadap independensi dari personel serta perntataan independensi dari personil telah didokumentasikan</td>
									<td valign="top"><?=$input["jawab_5a"]?></td>
									<td valign="top"><?=$input["jawab_6b"]?></td>
								</tr>
								<tr>
									<td valign="top">6.</td>
									<td valign="top">Pastikan keberadaan Kontrak, Surat penawaran, komunikasi dengan klien dan bukti lainnya</td>
									<td valign="top"><?=$input["jawab_6a"]?></td>
									<td valign="top"><?=$input["jawab_6b"]?></td>
								</tr>
								<tr>
									<td valign="top">7.</td>
									<td valign="top">Pastikan telah dilakukan pembayaran jasa (minimal tahap 1) kepada KJPP</td>
									<td valign="top"><?=$input["jawab_7a"]?></td>
									<td valign="top"><?=$input["jawab_7b"]?></td>
								</tr>
								<tr>
									<td valign="top">8.</td>
									<td valign="top">Pastikan selurug proses Konsultasi di internal tim kerja telah didokumentasikan</td>
									<td valign="top"><?=$input["jawab_8a"]?></td>
									<td valign="top"><?=$input["jawab_8b"]?></td>
								</tr>
								<tr>
									<td valign="top">9.</td>
									<td valign="top">Pastikan seluruh perbedaan pendapat dengan rekan atau klien telah diselesaikan dan didokumentasikan</td>
									<td valign="top"><?=$input["jawab_9a"]?></td>
									<td valign="top"><?=$input["jawab_9b"]?></td>
								</tr>
							</table>
						</li>
					</ol>
					<div class="form-group text-right" style="padding: 15px;">
						<button type="button" class="btn btn-primary btn-sm btn-approve">SETUJU</button>
						<button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>
						<button type="button" class="btn btn-warning btn-sm btn-batal">BATAL</button>
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
	var status_pekerjaan = <?=$pekerjaan->id_status?>;
	var is_update=false;

	$(document).ready(function(){
		// if (status_pekerjaan > 24)
		if (status_pekerjaan > 23)
		{
			$(".btn-approve").hide();

			// $(".btn-simpan").hide();
			// $("input").prop("disabled", true);
			// $("textarea").prop("disabled", true);
			// $("select").prop("disabled", true);

			is_update=true;
		}
		else if (status_pekerjaan == 24)
		{
			$(".btn-simpan").hide();
		}
		else
		{
			$(".btn-approve").hide();
		}

		if (!is_update){
			$('input[name="jawab_1a"], input[name="jawab_2a"], input[name="jawab_3a"], input[name="jawab_4a"], input[name="jawab_5a"], input[name="jawab_6a"], input[name="jawab_7a"], input[name="jawab_8a"], input[name="jawab_9a"]').prop("checked", false);
		}
	});


	$(".btn-simpan, .btn-approve").click(function()
	{
		var jawab_1a = $('input[name="jawab_1a"]:checked').val();
		var jawab_2a = $('input[name="jawab_2a"]:checked').val();
		var jawab_3a = $('input[name="jawab_3a"]:checked').val();
		var jawab_4a = $('input[name="jawab_4a"]:checked').val();
		var jawab_5a = $('input[name="jawab_5a"]:checked').val();
		var jawab_6a = $('input[name="jawab_6a"]:checked').val();
		var jawab_7a = $('input[name="jawab_7a"]:checked').val();
		var jawab_8a = $('input[name="jawab_8a"]:checked').val();
		var jawab_9a = $('input[name="jawab_9a"]:checked').val();

		if (typeof(jawab_1a)=="undefined" || typeof(jawab_2a)=="undefined" || typeof(jawab_3a)=="undefined" || typeof(jawab_4a)=="undefined" || typeof(jawab_5a)=="undefined" || typeof(jawab_6a)=="undefined" || typeof(jawab_7a)=="undefined" || typeof(jawab_8a)=="undefined" || typeof(jawab_9a)=="undefined"){
			window.alert("Semua pertanyaan wajib diisi!");
		}
		else
		{
			if (window.confirm("Apakah Anda yakin?")) {
				var id 				= $("#id").val();
				var id_pekerjaan	= $("#id_pekerjaan").val();
				var step			= $("#step").val();
				var id_status		= $("#id_status").val();
				
				var jawab_1b = $("#jawab_1b").val();
				var jawab_2b = $("#jawab_2b").val();
				var jawab_3b = $("#jawab_3b").val();
				var jawab_4b = $("#jawab_4b").val();
				var jawab_5b = $("#jawab_5b").val();
				var jawab_6b = $("#jawab_6b").val();
				var jawab_7b = $("#jawab_7b").val();
				var jawab_8b = $("#jawab_8b").val();
				var jawab_9b = $("#jawab_9b").val();
				
				$.ajax({
		    		type	: "POST",
					url 	: base_url + "AjaxPekerjaan/update_lembar_kendali/",
					data	: {
						type : "lembar_kendali_4",
						id : id,
						id_pekerjaan : id_pekerjaan,
						step : step,
						id_status : id_status,
						jawab_1a : jawab_1a,
						jawab_1b : jawab_1b,
						jawab_2a : jawab_2a,
						jawab_2b : jawab_2b,
						jawab_3a : jawab_3a,
						jawab_3b : jawab_3b,
						jawab_4a : jawab_4a,
						jawab_4b : jawab_4b,
						jawab_5a : jawab_5a,
						jawab_5b : jawab_5b,
						jawab_6a : jawab_6a,
						jawab_6b : jawab_6b,
						jawab_7a : jawab_7a,
						jawab_7b : jawab_7b,
						jawab_8a : jawab_8a,
						jawab_8b : jawab_8b,
						jawab_9a : jawab_9a,
						jawab_9b : jawab_9b,
						is_update : is_update

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
		    	});

			}
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
</script>

<?php echo $_template["_foot"]?>