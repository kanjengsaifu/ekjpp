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
						
						<div class="form-group">
							<table>
								<tr>
									<td width="200"><label>Ruang Lingkup Penugasan</label><span class="required">*</span></td>
									<td></td>
									<td><div><?=$input["ruang_lingkup"]?></div></td>
								</tr>
							</table>
						</div>
						<div class="form-group">
							<table>
								<tr>
									<td width="200"><label>Bidang Penugasan</label><span class="required">*</span></td>
									<td></td>
									<td><div><?=$input["bidang_penugasan"]?></div></td>
								</tr>
							</table>
						</div>
						<div class="form-group">
							<table>
								<tr>
									<td width="200"><label>Jumlah Orang</label><span class="required">*</span></td>
									<td></td>
									<td><?=$input["jumlah_orang"]?></td><td>&nbsp;&nbsp;Orang</td>
								</tr>
							</table>
						</div>
						<div class="form-group">
							<table>
								<tr>
									<td width="200"><label>Jangka Waktu</label><span class="required">*</span></td>
									<td></td>
									<td><?=$input["jangka_waktu"]?></td><td>&nbsp;&nbsp;Hari Kerja</td>
								</tr>
							</table>
						</div>
						<div class="form-group">
							<label>Termin Pembayaran (tidak boleh lebih dari 100%)</label><span class="required">*</span>
							<table cellpadding="5" cellspacing="5" style="width: 90%; " border="0">
								<tr>
									<td width="65"></td>
									<td style="padding: 5px; font-size: 12px; width: 100px;">Termin 1</td>
									<td style="padding: 5px;width: 100px;"><?=$input["termin_pembayaran_1"]?></td>
									<td style="padding: 5px; font-size: 12px; width: 50px;">%</td>
                                                                        <td style="padding: 5px; font-size: 12px; width: 50px;">Komentar </td>
                                                                        <td><?=$input["termin_komentar_1"]?></td><td></td>
								</tr>
								<tr>
									<td width="65"></td>
									<td style="padding: 5px; font-size: 12px; width: 100px;">Termin 2</td>
									<td style="padding: 5px;"><?=$input["termin_pembayaran_2"]?></td>
									<td style="padding: 5px; font-size: 12px; width: 50px;">%</td>
                                                                        <td style="padding: 5px; font-size: 12px; width: 50px;">Komentar </td>
                                                                        <td><?=$input["termin_komentar_2"]?></td><td></td>
								</tr>
								<tr>
									<td width="65"></td>
									<td style="padding: 5px; font-size: 12px; width: 100px;">Termin 3</td>
									<td style="padding: 5px;"><?=$input["termin_pembayaran_3"]?></td>
									<td style="padding: 5px; font-size: 12px; width: 50px;">%</td>
                                                                        <td style="padding: 5px; font-size: 12px; width: 50px;">Komentar </td>
                                                                        <td><?=$input["termin_komentar_3"]?></td><td></td>
								</tr>
								<tr>
									<td width="65"></td>
									<td style="padding: 5px; font-size: 12px; width: 100px;">Termin 4</td>
									<td style="padding: 5px;"><?=$input["termin_pembayaran_4"]?></td>
									<td style="padding: 5px; font-size: 12px; width: 50px;">%</td>
                                                                        <td style="padding: 5px; font-size: 12px; width: 50px;">Komentar </td>
                                                                        <td><?=$input["termin_komentar_4"]?></td><td></td>
								</tr>
								<tr>
									<td width="65"></td>
									<td style="padding: 5px; font-size: 12px; width: 100px;">Termin 5</td>
									<td style="padding: 5px;"><?=$input["termin_pembayaran_5"]?></td>
									<td style="padding: 5px; font-size: 12px; width: 50px;">%</td>
                                                                        <td style="padding: 5px; font-size: 12px; width: 50px;">Komentar </td>
                                                                        <td><?=$input["termin_komentar_5"]?></td><td></td>
								</tr>
							</table>
						</div>
						<div class="form-group">
							<table>
								<tr>
									<td width="200"><label>Project Manager</label><span class="required">*</span></td>
									<td></td>
									<td><?=$input["project_manager"]?></td>
								</tr>
							</table>
						</div>
						<div class="form-group">
							<table>
								<tr valign="top">
									<td width="200"><label>Resiko</label><span class="required">*</span></td>
									<td></td>
									<td><div style="margin-bottom: 10px;"><?=$input["resiko"]?></div>
										<?=$input["resiko_keterangan"]?></td>
								</tr>
							</table>
						</div>
						<div class="form-group">
							<table >
								<tr>
									<td width="200"><label>Harga</label><span class="required">*</span></td>
									<td></td>
									<td ><?=$input["harga"]?></td><td>&nbsp;&nbsp;Rupiah</td>
								</tr>
							</table>
						</div>
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
<script>
	var redirect_url	= "<?php if (array_key_exists('url', $_GET)) echo $_GET['url']; else echo ''; ?>";
	var status_pekerjaan = <?=$pekerjaan->id_status?>;
	var is_update=false;
	
	$(document).ready(function(){
		// if (status_pekerjaan > 5)
		if (status_pekerjaan > 4)
		{
			$(".btn-approve").hide();

			// $(".btn-simpan").hide();
			// $("input").prop("disabled", true);
			// $("textarea").prop("disabled", true);
			// $("select").prop("disabled", true);

			is_update=true;
		}
		else if (status_pekerjaan == 5)
		{
			$(".btn-simpan").hide();
		}
		else
		{
			$(".btn-approve").hide();
		}

		$("#termin_pembayaran_1, #termin_pembayaran_2, #termin_pembayaran_3, #termin_pembayaran_4, #termin_pembayaran_5, #jumlah_orang, #harga, #jangka_waktu").keypress(function (e) {
			if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				return false;
			}
		});
		
		$("#termin_pembayaran_1, #termin_pembayaran_2, #termin_pembayaran_3, #termin_pembayaran_4, #termin_pembayaran_5")
			.attr("type", "number")
			.prop("max", 100);
		$('#harga').number( true, 0 );
	});

	$(".btn-simpan, .btn-approve").click(function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			/*if (!termin_max())
			{
				alert("Total Termin Pembayaran harus 100%");
			}
			else*/
			{
				var id 				= $("#id").val();
				var id_pekerjaan	= $("#id_pekerjaan").val();
				var step			= $("#step").val();
				var id_status			= $("#id_status").val();
				
				var ruang_lingkup = $('input[name="ruang_lingkup"]:checked').val();
				var bidang_penugasan = $('input[name="bidang_penugasan"]:checked').val();
				var jumlah_orang = $("#jumlah_orang").val();
				var jangka_waktu = $("#jangka_waktu").val();
				var termin_pembayaran_1 = $("#termin_pembayaran_1").val();
				var termin_pembayaran_2 = $("#termin_pembayaran_2").val();
				var termin_pembayaran_3 = $("#termin_pembayaran_3").val();
				var termin_pembayaran_4 = $("#termin_pembayaran_4").val();
				var termin_pembayaran_5 = $("#termin_pembayaran_5").val();
                                var termin_komentar_5 = $("#termin_komentar_5").val();
                                var termin_komentar_4 = $("#termin_komentar_4").val();
                                var termin_komentar_3 = $("#termin_komentar_3").val();
                                var termin_komentar_2 = $("#termin_komentar_2").val();
                                var termin_komentar_1 = $("#termin_komentar_1").val();
				var project_manager = $("#project_manager").val();
				var resiko = $('input[name="resiko"]:checked').val();
				var resiko_keterangan = $("#resiko_keterangan").val();
				var harga = $("#harga").val();
				
				$.ajax({
		    		type	: "POST",
					url 	: base_url + "AjaxPekerjaan/update_lembar_kendali/",
					data	: {
						type : "lembar_kendali_2",
						id : id,
						id_pekerjaan : id_pekerjaan,
						step : step,
						id_status : id_status,
						
						ruang_lingkup : ruang_lingkup,
						bidang_penugasan : bidang_penugasan,
						jumlah_orang : jumlah_orang,
						jangka_waktu : jangka_waktu,
						termin_pembayaran_1 : termin_pembayaran_1,
						termin_pembayaran_2 : termin_pembayaran_2,
						termin_pembayaran_3 : termin_pembayaran_3,
						termin_pembayaran_4 : termin_pembayaran_4,
						termin_pembayaran_5 : termin_pembayaran_5,
                                                termin_komentar_5 : termin_komentar_5,
                                                termin_komentar_4 : termin_komentar_4,
                                                termin_komentar_3 : termin_komentar_3,
                                                termin_komentar_2 : termin_komentar_2,
                                                termin_komentar_1 : termin_komentar_1,
						project_manager : project_manager,
						resiko : resiko,
						resiko_keterangan : resiko_keterangan,
						harga : harga,
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
								location = "<?=base_url()?>pekerjaan/";
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
			location = "<?=base_url()?>pekerjaan/";
		}
	});

	function termin_max()
	{
		var termin_pembayaran_1 = parseInt($("#termin_pembayaran_1").val());
		var termin_pembayaran_2 = parseInt($("#termin_pembayaran_2").val());
		var termin_pembayaran_3 = parseInt($("#termin_pembayaran_3").val());
		var termin_pembayaran_4 = parseInt($("#termin_pembayaran_4").val());
		var termin_pembayaran_5 = parseInt($("#termin_pembayaran_5").val());
		
		if (termin_pembayaran_1 + termin_pembayaran_2 + termin_pembayaran_3 + termin_pembayaran_4 + termin_pembayaran_5 != 100)
		{
			return false;
		}
		
		return true;
	}
</script>

<?php echo $_template["_foot"]?>