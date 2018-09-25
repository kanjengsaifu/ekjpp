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
								<table class="table table-lembar-kendali">
									<tr>
										<td valign="top">
											<strong>1.</strong>
										</td>
										<td valign="top" colspan="2">Pastikan hal-hal berikut telah dipenuhi pada Tahapan Perencanaan:</td>
										<td valign="top"></td>
										<td valign="top">Komentar</td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top" style="width: 20px;">a.</td>
										<td valign="top" style="width: 50%">Telah dilakukan persetujuan tertulis dengan Klien berupa kontrak, engagement letter dll</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_1a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_1b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">b.</td>
										<td valign="top" style="width: 50%">Persoalan yang ditunjuk ada, serta telah memiliki Surat Tugas</td>
										<td valign="top"><?=$input["jawab_2a"]?></td>
										<td valign="top"><?=$input["jawab_2b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">c.</td>
										<td valign="top" style="width: 50%">Ada Tenaga Ahli yang diperbantukan, serta telah disetujui Partner/Pimpinan KJPP</td>
										<td valign="top"><?=$input["jawab_3a"]?></td>
										<td valign="top"><?=$input["jawab_3b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">d.</td>
										<td valign="top" style="width: 50%">Kompetisi yang dibutuhkan ada, serta memiliki setifikasi yang disyaratkan</td>
										<td valign="top"><?=$input["jawab_4a"]?></td>
										<td valign="top"><?=$input["jawab_4b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">e.</td>
										<td valign="top" style="width: 50%">Jadwal kerja telah disusun dan dilaksanakan sesuai dengan hari kerja yang diterapkan</td>
										<td valign="top"><?=$input["jawab_5a"]?></td>
										<td valign="top"><?=$input["jawab_5b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">f.</td>
										<td valign="top" style="width: 50%">Identifikasi sedini mungkin kebutuhan KJPP untuk suatu penugasan</td>
										<td valign="top"><?=$input["jawab_6a"]?></td>
										<td valign="top"><?=$input["jawab_6b"]?></td>
									</tr>
								</table>
							</li>
							<li type="">
								<h4></h4>
								<table class="table-lembar-kendali">
									<tr>
										<td valign="top">
											<strong>2.</strong>
										</td>
										<td valign="top" colspan="2">Pastikan hal-hal berikut telah diketahui oleh Partner/Pimpinan Rekan:</td>
										<td valign="top"></td>
										<td valign="top">Komentar</td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top" style="width: 20px;">a.</td>
										<td valign="top" style="width: 50%">Telah dilakukan evaluasi singkat tentang Penugasan</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_7a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_7b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">b.</td>
										<td valign="top" style="width: 50%">Telah dilakukan evaluasi terhadap personel yang dibutuhkan, jadwal kerja dan kompetensi yang dibutuhkan</td>
										<td valign="top"><?=$input["jawab_8a"]?></td>
										<td valign="top"><?=$input["jawab_8b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">c.</td>
										<td valign="top" style="width: 50%">Telah dilakukan penunjukan penyediaan/QA dan ada keterlibatan penyelia/QA</td>
										<td valign="top"><?=$input["jawab_9a"]?></td>
										<td valign="top"><?=$input["jawab_9b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">d.</td>
										<td valign="top" style="width: 50%">Telah didiskusikan kemungkinan ada pergantian personel atau rotasi personel jika ada gangguan atau perubahan rencana kerja</td>
										<td valign="top"><?=$input["jawab_10a"]?></td>
										<td valign="top"><?=$input["jawab_10b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">e.</td>
										<td valign="top" style="width: 50%">Telah didiskusikan potensi independensi dari personel pada penugasan, serta telah dibuat mitigasinya</td>
										<td valign="top"><?=$input["jawab_11a"]?></td>
										<td valign="top"><?=$input["jawab_11b"]?></td>
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
		// if (status_pekerjaan > 14)
		if (status_pekerjaan > 13)
		{
			$(".btn-approve").hide();

			// $(".btn-simpan").hide();
			// $("input").prop("disabled", true);
			// $("textarea").prop("disabled", true);
			// $("select").prop("disabled", true);

			is_update=true;
		}
		else if (status_pekerjaan == 14)
		{
			$(".btn-simpan").hide();
		}
		else
		{
			$(".btn-approve").hide();
		}
		clearRadio();
	});

	function clearRadio(){
		if (!is_update) {
			$("input[type=\"radio\"]").prop('checked', false);
		}
	}

	$(".btn-simpan, .btn-approve").click(function()
	{
		var id 				= $("#id").val();
		var id_pekerjaan	= $("#id_pekerjaan").val();
		var step			= $("#step").val();
		var id_status		= $("#id_status").val();
		
		var jawab_1a = $('input[name="jawab_1a"]:checked').val();
		var jawab_2a = $('input[name="jawab_2a"]:checked').val();
		var jawab_3a = $('input[name="jawab_3a"]:checked').val();
		var jawab_4a = $('input[name="jawab_4a"]:checked').val();
		var jawab_5a = $('input[name="jawab_5a"]:checked').val();
		var jawab_6a = $('input[name="jawab_6a"]:checked').val();
		var jawab_7a = $('input[name="jawab_7a"]:checked').val();
		var jawab_8a = $('input[name="jawab_8a"]:checked').val();
		var jawab_9a = $('input[name="jawab_9a"]:checked').val();
		var jawab_10a = $('input[name="jawab_10a"]:checked').val();
		var jawab_11a = $('input[name="jawab_11a"]:checked').val();
		
		var jawab_1b = $("#jawab_1b").val();
		var jawab_2b = $("#jawab_2b").val();
		var jawab_3b = $("#jawab_3b").val();
		var jawab_4b = $("#jawab_4b").val();
		var jawab_5b = $("#jawab_5b").val();
		var jawab_6b = $("#jawab_6b").val();
		var jawab_7b = $("#jawab_7b").val();
		var jawab_8b = $("#jawab_8b").val();
		var jawab_9b = $("#jawab_9b").val();
		var jawab_10b = $("#jawab_10b").val();
		var jawab_11b = $("#jawab_11b").val();

		console.log (typeof(jawab_1a));

		if (typeof(jawab_1a)=="undefined" || typeof(jawab_2a)=="undefined" || typeof(jawab_3a)=="undefined" || typeof(jawab_4a)=="undefined" || typeof(jawab_5a)=="undefined" || typeof(jawab_6a)=="undefined" || typeof(jawab_7a)=="undefined" || typeof(jawab_8a)=="undefined" || typeof(jawab_9a)=="undefined" || typeof(jawab_10a)=="undefined" || typeof(jawab_11a)=="undefined"){
			window.alert("Semua pertanyaan tidak wajib diisi!");
			return;
		}


		
		if (window.confirm("Apakah Anda yakin?"))
		{
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "AjaxPekerjaan/update_lembar_kendali/",
				data	: {
					type : "lembar_kendali_3",
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
					jawab_10a : jawab_10a,
					jawab_10b : jawab_10b,
					jawab_11a : jawab_11a,
					jawab_11b : jawab_11b,
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