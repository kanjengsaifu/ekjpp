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
				<form name="form-lembar-kendali" method="post">
						<?=$input["id"]?>
						<?=$input["id_pekerjaan"]?>
						<?=$input["step"]?>
						<?=$input["id_status"]?>

						<ol class="draf-lembar-kendali">
							<li type="A">
								<h4>Pendahuluan</h4>
								Apakah diskusi dengan klien sudah dilakukan sebelum menerima penugasan untuk mengetahui riwayat klien dan mendapatkan dokumen klien(seperti bagan organisasi, kinerja operasional, dan keuangan dalam dua atau tiga tahun terakhir, perubahan manajemen, struktur operasi, dan segala bentuk yang mempengaruhi penugasan)?
								
							</li>
							<li type="A">
								<h4>Integritas dan karakter calon klien</h4>
								<table class="table-lembar-kendali">
									<tr>
										<td valign="top"></td>
										<td valign="top" style="width: 50%"></td>
										<td valign="top"></td>
										<td valign="top">Komentar</td>
									</tr>
									<tr>
										<td valign="top">1.</td>
										<td valign="top">Apakah telah dilakukan evaluasi pendahuluan terhadap klien dari sisi reputasi, integritas, dll</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_1a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_1b"]?></td>
									</tr>
									<tr>
										<td valign="top">2.</td>
										<td valign="top">Apakah ada dokumentasi terkait dengan klien dari sumber informasi seperti koran, internet dll</td>
										<td valign="top"><?=$input["jawab_2a"]?></td>
										<td valign="top"><?=$input["jawab_2b"]?></td>
									</tr>
									<tr>
										<td valign="top">3.</td>
										<td valign="top">Apakah telah mendapatkan informasi reputasi, integritas klien dll dari penilai atau asosiasi</td>
										<td valign="top"><?=$input["jawab_3a"]?></td>
										<td valign="top"><?=$input["jawab_3b"]?></td>
									</tr>
								</table>
							</li>
							<li type="A">
								<h4>Penilai / KJPP terdahulu</h4>
								<table class="table-lembar-kendali">
									<tr>
										<td valign="top"></td>
										<td valign="top" style="width: 50%"></td>
										<td valign="top"></td>
										<td valign="top">Komentar</td>
									</tr>
									<tr>
										<td valign="top">1.</td>
										<td valign="top">Apakah anda telah menghubungi penilai / KJPP terdahulu <b>(jika relevan dalam penugasan anda)</b></td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_4a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_4b"]?></td>
									</tr>
								</table>
							</li>
							<li type="A">
								<h4>Penilaian independensi</h4>
								<p><b>Larangan yang wajib diterapkan pada penugasan tidak seluruhnya tercantum pada kuisioner ini. Ketentuan pada KEPI wajib menjadi acuan bagi segala petunjuk dan ketentuan yang relevan</b></p>
								<table class="table-lembar-kendali">
									<tr>
										<td valign="top">1.</td>
										<td valign="top" colspan="2">Apakah telah diidentifikasi ancaman terhadap independensi dimana tidak terdapat pencegahan yang memadai, seperti:</td>
										<td valign="top"></td>
										<td valign="top">Komentar</td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top" style="width: 20px;">a.</td>
										<td valign="top" style="width: 50%">Penerimaan hadiah yang signifikan</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_5a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_5b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">b.</td>
										<td valign="top" style="width: 50%">Hubungan yang mengandung benturan kepentingan dengan klien seperti hubungan keluarga dengan klien</td>
										<td valign="top"><?=$input["jawab_6a"]?></td>
										<td valign="top"><?=$input["jawab_6b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">c.</td>
										<td valign="top" style="width: 50%">Fee di bawah standar yang berlaku(kecuali jika dokumentasi dapat membuktikan bahwa standar yang diterapkan telah terpenuhi</td>
										<td valign="top"><?=$input["jawab_7a"]?></td>
										<td valign="top"><?=$input["jawab_7b"]?></td>
									</tr>
									<tr>
										<td valign="top">2.</td>
										<td valign="top" colspan="2">Apakah anda yakin tidak terdapat larangan-larangan yang dapat menghalangi KJPP atau staf untuk melakukan penugasan?</td>
										<td valign="top"><?=$input["jawab_8a"]?></td>
										<td valign="top"><?=$input["jawab_8b"]?></td>
									</tr>
									<tr>
										<td valign="top">3.</td>
										<td valign="top" colspan="2">Mengacu pada kode etik sebagai panduan dalam mengidentifikasi ancaman dan tindak pengamanan terhadap independensi?</td>
										<td valign="top"></td>
										<td valign="top"></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">a.</td>
										<td valign="top" style="width: 50%">Apakah telah dilakukan identifikasi terhadap ancaman independensi terhadap KJPP dan anggota tim kerja?</td>
										<td valign="top"><?=$input["jawab_9a"]?></td>
										<td valign="top"><?=$input["jawab_9b"]?></td>
									</tr>
									<tr>
										<td valign="top"></td>
										<td valign="top">c.</td>
										<td valign="top" style="width: 50%">Apakah untuk ancaman yang signifikan telah dibuat mitigasi yang memadai terhadap independensi?</td>
										<td valign="top"><?=$input["jawab_10a"]?></td>
										<td valign="top"><?=$input["jawab_10b"]?></td>
									</tr>
								</table>
							</li>
							<li type="A">
								<h4>Evaluasi risiko penugasan</h4>
								<table class="table-lembar-kendali">
									<tr>
										<td valign="top"></td>
										<td valign="top" style="width: 50%"></td>
										<td valign="top"></td>
										<td valign="top">Komentar</td>
									</tr>
									<tr>
										<td valign="top">1.</td>
										<td valign="top">Apakah telah diidentifikasi risiko penugasan terkait dengan latar belakang klien, dan asset yang akan dinilai?</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_11a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_11b"]?></td>
									</tr>
									<tr>
										<td valign="top">2.</td>
										<td valign="top">Apakah telah diidentifikasi risiko penugasan terkait dengan latar belakang klien, dan asset yang akan dinilai?</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_12a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_12b"]?></td>
									</tr>
									<tr>
										<td valign="top">3.</td>
										<td valign="top">Apakah anda yakin bahwa tidak ada keraguan yang signifikan terhadap kelangsungan usaha calon klien dalam waktu mendatang (sekurang-kurangnya satu tahun mendatang)?</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_13a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_13b"]?></td>
									</tr>
									<tr>
										<td valign="top">4.</td>
										<td valign="top">Apakah anda yakin bahwa calon klien mau dan mampu membayar imbalan jasa profesional yang wajar?</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_14a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_14b"]?></td>
									</tr>
								</table>
							</li>
							<li type="A">
								<h4>Pembatasan Lingkup Penugasan</h4>
								<table class="table-lembar-kendali">
									<tr>
										<td valign="top"></td>
										<td valign="top" style="width: 50%"></td>
										<td valign="top"></td>
										<td valign="top">Komentar</td>
									</tr>
									<tr>
										<td valign="top">1.</td>
										<td valign="top">Apakah anda yakin bahwa tidak ada pembatasan lingkup penugasan oleh manajemen klien yang mempengaruhi pekerjaan anda?</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_15a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_15b"]?></td>
									</tr>
									<tr>
										<td valign="top">2.</td>
										<td valign="top">Apakah jangka waktu yang disediakan cukup realistis untuk menyelesaikan pekerjaan?</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_16a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_16b"]?></td>
									</tr>
									<tr>
										<td valign="top">3.</td>
										<td valign="top">Apakah terdapat hal-hal lain berkaitan dengan penerimaan klien yang perlu dipertimbangkan, seperti evaluasi secara lebih detail yang terkait dengan independensi dan faktor-faktor lainnya yang beresiko? jika ya, dokumentasikan hal-hal tersebut beserta penanganannya.</td>
										<td valign="top" style="width: 300px;"><?=$input["jawab_17a"]?></td>
										<td valign="top" style="width: 200px;"><?=$input["jawab_17b"]?></td>
									</tr>
								</table>
							</li>
							<li type="A">
								<h4>Kesimpulan rekan</h4>
								<table class="table-lembar-kendali" border="0">
									<tr>
										<td valign="top"></td>
										<td valign="top" colspan="2"><strong>Catatan Rekan/Pimpinan KJPP</strong></td>
										<td colspan="2" valign="top" style="width: 800px;"><?=$input["jawab_18"]?></td>
									</tr>
									<tr style="border-bottom-color: black;border-bottom-style: solid;border-bottom-width: thin">
										<td valign="top"></td>
										<td valign="top" colspan="2">Berdasarkan pengetahuan awal saya mengenai calon klien ini serta faktor-faktor yang telah disebutkan di atas,saya menilai bahwa calon klien ini:</td>
										<td colspan="2" valign="top"><?=$input["jawab_19"]?></td>
									</tr>
                                                                        <tr >
                                                                            <td colspan="4">&nbsp;</td>
                                                                        </tr>
									<tr>
										<td></td>
										<td colspan="4">
											<table border="1" width="50%" style="border-color: #03fc54">
												<tr>
													<td>1.</td>
													<td>Saya yakin bahwa tidak ada larangan-larangan yang dapat menghalangi KJPP atau anggota tim kerja untuk melakukan penugasan ini.</td>
												</tr>
												<tr>
													<td>2.</td>
													<td>Apabila terdapat ancaman signifikan terhadap independensi, pencegahan untuk menghilangkan atau mengurangi ancaman tersebut ke tingkat yang dapat diterima dapat diterapkan</td>
												</tr>
												<tr>
													<td>3.</td>
													<td>Saya tidak mengetahui faktor-faktor lain yang dapat mempengaruhi independensi kami.</td>
												</tr>
												<tr>
													<td>4.</td>
													<td>Saya yakin bahwa kita telah mendapatkan informasi yang cukup untuk menilai apakah penugasan ini dapat diterima atau tidak.</td>
												</tr>
											</table>
										</td>
									</tr>
									
									
									<tr>
										<td valign="top"></td>
										<td valign="top" colspan="2">Menurut pendapat saya, kita sebaliknya <b>menerima</b> atau <b>menolak</b> penugasan ini.</td>
										<td valign="top" colspan="2"><?=$input["jawab_20"]?></td>
									</tr>

									
								</table>
							</li>
						</ol>
						<div class="form-group text-right" style="padding: 15px;">
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
		// if (status_pekerjaan > 3)
		if (status_pekerjaan > 2)
		{
			// $(".btn-simpan").hide();
			// $("input").prop("disabled", true);
			// $("textarea").prop("disabled", true);
			// $("select").prop("disabled", true);

			is_update=true;
		}

		if (!is_update){
			$('[name="jawab_1a"], [name="jawab_2a"], [name="jawab_3a"], [name="jawab_4a"], [name="jawab_5a"], [name="jawab_6a"], [name="jawab_7a"], [name="jawab_8a"], [name="jawab_9a"], [name="jawab_10a"], [name="jawab_11a"], [name="jawab_12a"], [name="jawab_13a"], [name="jawab_14a"], [name="jawab_15a"], [name="jawab_16a"], [name="jawab_17a"], [name="jawab_19"], [name="jawab_20"]').prop("checked", false);
		}
	});

	$(".btn-simpan").click(function() {
		var id = $("#id").val();
		var id_pekerjaan = $("#id_pekerjaan").val();
		var step = $("#step").val();
		var id_status = $("#id_status").val();

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
		var jawab_19 = $('input[name="jawab_19"]:checked').val();
		var jawab_20 = $('input[name="jawab_20"]:checked').val();
		
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
		var jawab_18 = $("#jawab_18").val();

		if(typeof jawab_1a =="undefined" ||  typeof jawab_2a =="undefined" ||  typeof jawab_3a =="undefined" ||  typeof jawab_4a =="undefined" ||  typeof jawab_5a =="undefined" ||  typeof jawab_6a =="undefined" ||  typeof jawab_7a =="undefined" ||  typeof jawab_8a =="undefined" ||  typeof jawab_9a =="undefined" ||  typeof jawab_10a =="undefined" || typeof jawab_11a =="undefined" ||  typeof jawab_12a =="undefined" ||  typeof jawab_13a =="undefined" ||  typeof jawab_14a =="undefined" ||  typeof jawab_15a =="undefined" ||  typeof jawab_16a =="undefined" ||  typeof jawab_17a =="undefined" ||  typeof jawab_19 =="undefined" ||  typeof jawab_20 =="undefined"){
			window.alert("Semua input tidak boleh kosong!");
			return;
		}

		
		if (window.confirm("Apakah Anda yakin?"))
		{
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "AjaxPekerjaan/update_lembar_kendali/",
				data	: {
					type : "lembar_kendali_1",
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
					jawab_18 : jawab_18,
					jawab_19 : jawab_19,
					jawab_20 : jawab_20,
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