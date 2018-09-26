<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

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
								<h4>Pertimbangan yang harus dilakukan</h4>
								<table border="0" class="table-lembar-kendali" style="border-color: #17AE00;border-width: thin;">
									<tr>
										<td valign="top"></td>
										<td valign="top" style="width: 50%"></td>
										<td valign="top"></td>
										<td valign="top">Komentar</td>
									</tr>
									<tr>
										<td valign="top">1.</td>
										<td valign="top">Penelaahan sistem pengendalian mutu telah dijadwalkan dalam waktu yang sesuai (sebagai contoh, dalam masa tidak sibuk).</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_1a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_1b"]?></td>
									</tr>
									<tr>
										<td valign="top">2.</td>
										<td valign="top">Pimpinan KJPP dan Penilai telah memiliki pemahamaan terhadap sistem pengendalian mutu, standar profesi dan ketentuan perundang-undangan berlaku</td>
										<td valign="top"><?=$input["jawab_2a"]?></td>
										<td valign="top"><?=$input["jawab_2b"]?></td>
									</tr>
									<tr>
										<td valign="top">3.</td>
										<td valign="top">Perubahan terhadap ketentuan terkait dengan profesi dan standar profesi (jika ada) sesuai dengan arahan asosiasi profesi, telah diketahui dan diinformasikan oleh Pimpinan KJPP kepada Penilai</td>
										<td valign="top"><?=$input["jawab_3a"]?></td>
										<td valign="top"><?=$input["jawab_3b"]?></td>
									</tr>
									<tr>
										<td valign="top">4.</td>
										<td valign="top">Pimpinan KJPP telah merencanakan dan melaksanakan pengembangan profesi terhadap Penilai dan karyawan lain yang terkait dengan penugasan penilaian</td>
										<td valign="top"><?=$input["jawab_4a"]?></td>
										<td valign="top"><?=$input["jawab_4b"]?></td>
									</tr>
									<tr>
										<td valign="top">5.</td>
										<td valign="top">Pimpinan KJPP telah memantau program pelatihan internal dan eksternal yang diikuti oleh karyawan dan staf lain sepanjang setahun terakhir.</td>
										<td valign="top"><?=$input["jawab_5a"]?></td>
										<td valign="top"><?=$input["jawab_5b"]?></td>
									</tr>
									<tr>
										<td valign="top">6.</td>
										<td valign="top">Pimpinan KJPP telah melakukan komunikasi internal secara teratur terkait ketentuan atau perubahan terkini terkait dengan bidang jasa yang ditawarkan oleh KJPP.</td>
										<td valign="top"><?=$input["jawab_6a"]?></td>
										<td valign="top"><?=$input["jawab_6b"]?></td>
									</tr>
									<tr>
										<td valign="top">7.</td>
										<td valign="top">Pimpinan KJPP telah memfasilitasi akses informasi, pembelajaran, serta pengkomunikasian pengembangan profesi kepada karyawan.</td>
										<td valign="top"><?=$input["jawab_7a"]?></td>
										<td valign="top"><?=$input["jawab_7b"]?></td>
									</tr>
									<tr>
										<td valign="top">8.</td>
										<td valign="top">Telah dilakukan wawancara dengan rekan yang bertanggung jawab terhadap berbagai aspek sistem pengendalian mutu.Pada setiap wawancara, diberikan beberapa pertanyaan berikut:</td>
									</tr>
									<tr>
										
										<td valign="top">a.</td>
										<td valign="top">Apakah dibutuhkan perubahan terhadap proses atau dokumentasi pada KJPP? Berikan alasan.</td>
										<td valign="top"><?=$input["jawab_8a"]?></td>
										<td valign="top"><?=$input["jawab_8b"]?></td>
									</tr>
									<tr>
										
										<td valign="top">b.</td>
										<td valign="top">Apakah ada masukan yang signifikan dari pihak internal atau eksternal terkait dengan layanan yang diberikan KJPP?</td>
										<td valign="top"><?=$input["jawab_9a"]?></td>
										<td valign="top"><?=$input["jawab_9b"]?></td>
									</tr>
									<tr>
										
										<td valign="top">c.</td>
										<td valign="top">Apakah ada hal lain yang patut dipertimbangkan mengenai proses atau dokumentasi pada KJPP?</td>
										<td valign="top"><?=$input["jawab_10a"]?></td>
										<td valign="top"><?=$input["jawab_10b"]?></td>
									</tr>
									<tr>
										<td valign="top">9.</td>
										<td valign="top">Apakah pernah dilakukan penelaahan KJPP, asosiasi profesi atau regulator pada periode tahun berjalan? (Jika ya, perolehan salinan dan pertimbangkan temuanya.)</td>
										<td valign="top"><?=$input["jawab_11a"]?></td>
										<td valign="top"><?=$input["jawab_11b"]?></td>
									</tr>
									<tr>
										<td valign="top">10.</td>
										<td valign="top">Apakah mekanisme penyelesaian perbedaan pendapat terkait dengan pelaksanaan penugasan telah memadai?</td>
										<td valign="top"><?=$input["jawab_12a"]?></td>
										<td valign="top"><?=$input["jawab_12b"]?></td>
									</tr>
									<tr>
										<td valign="top">11.</td>
										<td valign="top">Apakah telah dipilih secara acak dari laporan penilaian dan telah diverifikasi mengenai hal yang terkait dengan independensi, kerahasiaan, kepatuhan dengan kebijakan KJPP, dan standar pengendalian mutu, serta pengakuan atas kepatuhan terhadap kebijakan KJPP (jika relevan)?</td>
										<td valign="top"><?=$input["jawab_13a"]?></td>
										<td valign="top"><?=$input["jawab_13b"]?></td>
									</tr>
									<tr>
										<td valign="top">12.</td>
										<td valign="top">Apakah berkas yang ditelaah telah mendokumentasikan dan melaporkan kecukupan dan kesesuaian terhadap keputusan dan tindakan yang diambil, terkait dengan hal-hal:</td>
									</tr>
									<tr>
										
										<td valign="top">a.</td>
										<td valign="top">Keluhan internal dan eksternal;</td>
										<td valign="top"><?=$input["jawab_14a"]?></td>
										<td valign="top"><?=$input["jawab_14b"]?></td>
									</tr>
									<tr>
										
										<td valign="top">b.</td>
										<td valign="top">Perselisihan terkait dengan profesi; dan</td>
										<td valign="top"><?=$input["jawab_15a"]?></td>
										<td valign="top"><?=$input["jawab_15b"]?></td>
									</tr>
									<tr>
										
										<td valign="top">c.</td>
										<td valign="top">Pelanggaran (yang tercatat) terhadap kebijakan dan prosedur yang dilakukan oleh rekan maupun staf.</td>
										<td valign="top"><?=$input["jawab_16a"]?></td>
										<td valign="top"><?=$input["jawab_16b"]?></td>
									</tr>
									<tr>
										<td valign="top">13.</td>
										<td valign="top">Terdapat _______ (jumlah) berkas kertas kerja inpeksi yang sudah selesai, menggunakan suatu checklist inspeksi, untuk menentukan  apakah kebijakan pengendalian mutu KJPP telah dipatuhi. Berkas dipilih sedmikian rupa, dalam siklus inspeksi, sehingga ketentuan berikut dapat dipenuhi:</td>
									</tr>
									<tr>
										
										<td valign="top">a.</td>
										<td valign="top">Sekurang-kurangnya satu laporan dan/atau satu penugasan penilaian dari setiap rekan,</td>
										<td valign="top"><?=$input["jawab_17a"]?></td>
										<td valign="top"><?=$input["jawab_17b"]?></td>
									</tr>
									<tr>
										
										<td valign="top">b.</td>
										<td valign="top">Sekurang-kurangnya satu laporan penilaian yang spesifik.</td>
										<td valign="top"><?=$input["jawab_18a"]?></td>
										<td valign="top"><?=$input["jawab_18b"]?></td>
									</tr>
									<tr>
										<td valign="top">14.</td>
										<td valign="top">Dokumentasikan ketidaksesuaian signifikan yang ditemukan selama inspeksi. Jika terdapat ketidak sesuaian signifikan, apakah ketidaksesuaian tersebut menunjukkan adanya ketidaksesuaian pada sistem yang harus diperbaiki, atau terdapat kegagalan dalam mematuhi kebijakan KJPP? </td>
										<td valign="top"><?=$input["jawab_19a"]?></td>
										<td valign="top"><?=$input["jawab_19b"]?></td>
									</tr>
									<tr>
										<td valign="top">15.</td>
										<td valign="top">Kertas kerja yang diinpeksi oleh penelaah tidak termasuk kertas kerja dimana penelaah bertindak sebagai tim kerja penilaian. Jika hal tersebut terjadi, maka pihak lain harus ditugaskan. (Tanggapan diperlukan dalam kolom sebelah kanan).</td>
										<td valign="top"><?=$input["jawab_20a"]?></td>
										<td valign="top"><?=$input["jawab_20b"]?></td>
									</tr>
									<tr>
										<td valign="top">16.</td>
										<td valign="top">Indikasi kekeliruan, pengabadian, perselisihan atau kepatuhan yang ditinjau dalam konteks kewajiban hukum, kontak, serta profesi telah dipertimbangkan dan dilaporkan kepada pimpinan KJPP.</td>
										<td valign="top"><?=$input["jawab_21a"]?></td>
										<td valign="top"><?=$input["jawab_21b"]?></td>
									</tr>
									<tr>
										<td valign="top">17.</td>
										<td valign="top">Terdapat ketidaksesuaian yang belum closed pada saat penelaahan, dan akan direview pada periode pemantauan 3-6 bulan mendatang.</td>
										<td valign="top"><?=$input["jawab_22a"]?></td>
										<td valign="top"><?=$input["jawab_22b"]?></td>
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
		// if (status_pekerjaan > 30)
		if (status_pekerjaan > 29)
		{
			$(".btn-approve").hide();

			// $(".btn-simpan").hide();
			// $("input").prop("disabled", true);
			// $("textarea").prop("disabled", true);
			// $("select").prop("disabled", true);
			
			is_update=true;
		}
		else if (status_pekerjaan == 30)
		{
			$(".btn-simpan").hide();
		}
		else
		{
			$(".btn-approve").hide();
		}

		if (!is_update){
			$('input[name="jawab_1a"], input[name="jawab_2a"], input[name="jawab_3a"], input[name="jawab_4a"], input[name="jawab_5a"], input[name="jawab_6a"], input[name="jawab_7a"], input[name="jawab_8a"], input[name="jawab_9a"], input[name="jawab_10a"], input[name="jawab_11a"], input[name="jawab_12a"], input[name="jawab_13a"], input[name="jawab_14a"], input[name="jawab_15a"], input[name="jawab_16a"], input[name="jawab_17a"], input[name="jawab_18a"], input[name="jawab_19a"], input[name="jawab_20a"], input[name="jawab_21a"], input[name="jawab_22a"]').prop("checked", false);
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
		var jawab_10a = $('input[name="jawab_10a"]:checked').val();
		var jawab_11a = $('input[name="jawab_11a"]:checked').val();
		var jawab_12a = $('input[name="jawab_12a"]:checked').val();
		var jawab_13a = $('input[name="jawab_13a"]:checked').val();
		var jawab_14a = $('input[name="jawab_14a"]:checked').val();
		var jawab_15a = $('input[name="jawab_15a"]:checked').val();
		var jawab_16a = $('input[name="jawab_16a"]:checked').val();
		var jawab_17a = $('input[name="jawab_17a"]:checked').val();
		var jawab_18a = $('input[name="jawab_18a"]:checked').val();
		var jawab_19a = $('input[name="jawab_19a"]:checked').val();
		var jawab_20a = $('input[name="jawab_20a"]:checked').val();
		var jawab_21a = $('input[name="jawab_21a"]:checked').val();
		var jawab_22a = $('input[name="jawab_22a"]:checked').val();

		if (typeof(jawab_1a ) == "undefined" || typeof(jawab_2a ) == "undefined" || typeof(jawab_3a ) == "undefined" || typeof(jawab_4a ) == "undefined" || typeof(jawab_5a ) == "undefined" || typeof(jawab_6a ) == "undefined" || typeof(jawab_7a ) == "undefined" || typeof(jawab_8a ) == "undefined" || typeof(jawab_9a ) == "undefined" || typeof(jawab_10a) == "undefined" || typeof(jawab_11a) == "undefined" || typeof(jawab_12a) == "undefined" || typeof(jawab_13a) == "undefined" || typeof(jawab_14a) == "undefined" || typeof(jawab_15a) == "undefined" || typeof(jawab_16a) == "undefined" || typeof(jawab_17a) == "undefined" || typeof(jawab_18a) == "undefined" || typeof(jawab_19a) == "undefined" || typeof(jawab_20a) == "undefined" || typeof(jawab_21a) == "undefined" || typeof(jawab_22a) == "undefined"){
			window.alert("Semua pertanyaan wajib diisi");
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
				var jawab_10b = $("#jawab_10b").val();
				var jawab_11b = $("#jawab_11b").val();
				var jawab_12b = $("#jawab_12b").val();
				var jawab_13b = $("#jawab_13b").val();
				var jawab_14b = $("#jawab_14b").val();
				var jawab_15b = $("#jawab_15b").val();
				var jawab_16b = $("#jawab_16b").val();
				var jawab_17b = $("#jawab_17b").val();
				var jawab_18b = $("#jawab_18b").val();
				var jawab_19b = $("#jawab_19b").val();
				var jawab_20b = $("#jawab_20b").val();
				var jawab_21b = $("#jawab_21b").val();
				var jawab_22b = $("#jawab_22b").val();

				
				$.ajax({
		    		type	: "POST",
					url 	: base_url + "AjaxPekerjaan/update_lembar_kendali/",
					data	: {
						type : "lembar_kendali_5",
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
						jawab_12a : jawab_12a,
						jawab_12b : jawab_12b,
						jawab_13a : jawab_13a,
						jawab_13b : jawab_13b,
						jawab_14a : jawab_14a,
						jawab_14b : jawab_14b,
						jawab_15a : jawab_15a,
						jawab_15b : jawab_15b,
						jawab_16a : jawab_16a,
						jawab_16b : jawab_16b,
						jawab_17a : jawab_17a,
						jawab_17b : jawab_17b,
						jawab_18a : jawab_18a,
						jawab_18b : jawab_18b,
						jawab_19a : jawab_19a,
						jawab_19b : jawab_19b,
						jawab_20a : jawab_20a,
						jawab_20b : jawab_20b,
						jawab_21a : jawab_21a,
						jawab_21b : jawab_21b,
						jawab_22a : jawab_22a,
						jawab_22b : jawab_22b,
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