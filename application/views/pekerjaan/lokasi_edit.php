<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php echo $_template["_head"]?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()."resources/css/kertas-kerja.css?v=1" ?>">
<style type="text/css">
    .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
        position: absolute;
        right: 30px;
        z-index: 999;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    .pac-container {
        font-family: Roboto;
    }

    #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
    }

    #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }
    #target {
        width: 345px;
    }
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1><?=$title?></h1>
	</section>
	<section class="content">
		<div class="box box-info">
			<div class="box-body">
				<form name="form-klien" method="post">
					<input type="hidden" id="id_lokasi" value="<?php echo $id_lokasi; ?>">
					<?=$input["id"]?>
					<?=$input["id_pekerjaan"]?>
					<?=$input["tanggal_penerimaan"]?>

					<?=$input["temp_id_kota"]?>
					<?=$input["temp_id_kecamatan"]?>
					<?=$input["temp_id_desa"]?>

					<div class="row" class="step" data-step="1" >
						<div class="col-md-4">
							<div class="form-group hidden" >
								<label>Kode</label>
								<?=$input["kode"]?>
							</div>
							<div class="form-group">
								<label>Jenis Objek <span class="required">*</span></label>
								<div><?=$input["id_jenis_objek"]?></div>
							</div>
							<div class="form-group form1 form6" style="display:none">
								<label>Pengembangan Diatasnya Berupa <span class="required">*</span></label>
								<?=$input["pengembangan"]?>
							</div>
							<div class="form-group">
								<label>Jalan / Perum / Komplek / Blok<span class="required">*</span></label>
								<?=$input["alamat"]?>
							</div>
							<div class="form-group">
								<label>Gang</label>
								<?=$input["gang"]?>
							</div>
							<div class="form-group">
								<label>Nomor <span class="required">*</span></label>
								<?=$input["nomor"]?>
							</div>
							<div class="form-group">
								<label>RT. <span class="required">*</span></label>
								<?=$input["rt"]?>
							</div>
							<div class="form-group">
								<label>RW. <span class="required">*</span></label>
								<?=$input["rw"]?>
							</div>
			                <div class="form-group">
			                   <label>Latitude</label>
			                   <input type="number" step="any" class="form-control is_integer" name="koordinat_latitude" id="koordinat_latitude" value="<?php echo empty($detail['koordinat_latitude']) ? NULL : $detail['koordinat_latitude']; ?>">
			                </div>
			                <div class="form-group">
			                   <label>Longitude</label>
			                   <input type="number" step="any" class="form-control is_integer" name="koordinat_longitude" id="koordinat_longitude" value="<?php echo empty($detail['koordinat_longitude']) ? NULL : $detail['koordinat_longitude']; ?>">
			                </div>
			                <div class="form-group">
			                   <label></label>
			                	<button type="button" name="btn_lokasi" class="btn btn-primary" onclick="open_map()">Input Lokasi</button>
			                       <button type="button" name="btn_lokasi" class="btn btn-primary" onclick="view_map($('#koordinat_latitude').val(), $('#koordinat_longitude').val())">View Lokasi</button>
			                </div>
						</div>
						<div class="col-md-4">

							<div class="form-group">
								<label>Provinsi <span class="required">*</span></label>
								<?=$input["id_provinsi"]?>
							</div>
							<div class="form-group">
								<label>d/h</label>
								<?=$input["dh_provinsi"]?>
							</div>
							<div class="form-group">
								<label>Kabupaten / Kota <span class="required">*</span></label>
								<div id="box_kota"><?=$input["id_kota"]?></div>
							</div>
							<div class="form-group">
								<label>d/h</label>
								<div id="box_kota"><?=$input["dh_kota"]?></div>
							</div>
							<div class="form-group">
								<label>Kecamatan <span class="required">*</span></label>
								<div id="box_kecamatan"><?=$input["id_kecamatan"]?></div>
							</div>
							<div class="form-group">
								<label>d/h</label>
								<div id="box_kecamatan"><?=$input["dh_kecamatan"]?></div>
							</div>
							<div class="form-group">
								<label>Kelurahan / Desa <span class="required">*</span></label>
								<div id="box_desa"><?=$input["id_desa"]?></div>
							</div>
							<div class="form-group">
								<label>d/h</label>
								<div id="box_desa"><?=$input["dh_desa"]?></div>
							</div>
                            <div class="form-group">
								<label>Kode Pos</label>
								<div id="box_zip"><?=$input["zip"]?></div>
							</div>

						</div>

						<div class="col-md-4">
							<!--
							<div class="form-group">
								<label>Tanggal Rencana Survey <span class="required">*</span></label>
								<?=$input["tanggal"]?>
							</div>
                                                            <div class="form-group">
								<label>Jam Rencana Survey <span class="required">*</span></label>
								<?=$input["jam"]?>
							</div>
							<div class="form-group">
								<label>Transportasi Survey <span class="required">*</span></label>
								<?=$input["id_transportasi"]?>
							</div>
							-->
							<div class="form-group">
								<label>Kepemilikan Properti </label>
								<?=$input["pemegang_hak"]?>
							</div>
							<div id="form5" style="display:none">
								<div class="form-group">
									<label>Jumlah Unit </label>
									<?=$input["jumlah_unit"]?>
								</div>
								<div class="form-group">
									<label>Merk </label>
									<?=$input["merk"]?>
								</div>
								<div class="form-group">
									<label>Model / Tipe </label>
									<?=$input["model_tipe"]?>
								</div>
								<div class="form-group">
									<label>Negara Pembuat  </label>
									<?=$input["negara_pembuat"]?>
								</div>
								<div class="form-group">
									<label>Tahun Perakitan  </label>
									<?=$input["tahun_rakit"]?>
								</div>
								<div class="form-group">
									<label>Kapasitas </label>
									<?=$input["kapasitas"]?>
								</div>
								<div class="form-group">
									<label>Keterangan </label>
									<?=$input["keterangan"]?>
								</div>
							</div>
							<div class="form1 form6" style="display:none">
							<div class="form-group">
								<label>Kepemilikan </label>
								<?=$input["kepemilikan"]?>
							</div>
							<div class="form-group">
								<label>Jenis Setifikat </label>
								<?=$input["jenis_sertifikat"]?>
							</div>
							<div class="form-group">
								<label>No Sertifikat </label>
								<?=$input["no_sertifikat"]?>
							</div>
							</div>
							<div class="form1 form6 form-group" style="display:none">
								<label class="l_t">Luas Tanah (m<sup>2</sup>) </label>
								<label class="l_l">Luas Lantai (m<sup>2</sup>) </label>
								<?=$input["luas_tanah"]?>
							</div>
							<div class="form1 form-group" style="display:none">
								<label>Luas Bangunan (m<sup>2</sup>) </label>
								<?=$input["luas_bangunan"]?>
							</div>
							<div  id="form2" style="display:none"> <!-- Kendaraan -->
							<div class="form-group">
								<label>Jumlah Unit </label>
								<?=$input["jumlah_unit"]?>
							</div>
							<div class="form-group">
								<label>NOPOL </label>
								<?=$input["nopol"]?>
							</div>
							<div class="form-group">
								<label>Merk </label>
								<?=$input["merk"]?>
							</div>
							<div class="form-group">
								<label>Model / Tipe </label>
								<?=$input["model_tipe"]?>
							</div>
							<div class="form-group">
								<label>Negara Pembuat </label>
								<?=$input["negara_pembuat"]?>
							</div>
							<div class="form-group">
								<label>Tahun Perakitan </label>
								<?=$input["tahun_rakit"]?>
							</div>
							</div>
								<div  id="form3" style="display:none"> <!-- Mesin -->
								<div class="form-group">
									<label>Nama Mesin </label>
									<?=$input["nm_mesin"]?>
								</div>
								<div class="form-group">
									<label>Jumlah Unit </label>
									<?=$input["jumlah_unit"]?>
								</div>
								<div class="form-group">
									<label>Merk </label>
									<?=$input["merk"]?>
								</div>
								<div class="form-group">
									<label>Model / Tipe </label>
									<?=$input["model_tipe"]?>
								</div>
								<div class="form-group">
									<label>Negara Pembuat </label>
									<?=$input["negara_pembuat"]?>
								</div>
								<div class="form-group">
									<label>Tahun Pembuatan </label>
									<?=$input["tahun_buatan"]?>
								</div>
								<div class="form-group">
									<label>Kapasitas </label>
									<?=$input["kapasitas"]?>
								</div>
								<div class="form-group">
									<label>Keterangan </label>
									<?=$input["keterangan"]?>
								</div>
								</div>
									<div  id="form4" style="display:none"> <!-- Kapal -->
									<div class="form-group">
										<label>Jumlah Unit </label>
										<?=$input["jumlah_unit"]?>
									</div>
									<div class="form-group">
										<label>Dimensi Kapal </label>
									</div>
									<div class="form-group">
									<label class="col-sm-2">Panjang</label>
									<div class="col-sm-10 form-group">
										<?=$input["panjang"]?>
									</div>
									</div>
									<div class="form-group">
									<label class="col-sm-2">Lebar</label>
									<div class="col-sm-10 form-group">
										<?=$input["lebar"]?>
									</div>
									</div>
									<div class="form-group">
									<label class="col-sm-2">Tinggi</label>
									<div class="col-sm-10 form-group">
										<?=$input["tinggi"]?>
									</div>
									</div>
									<div class="form-group">
										<label>Berat Kapal </label>
									</div>
									<div class="form-group">
									<label class="col-sm-4">Berat Bersih</label>
									<div class="col-sm-8 form-group">
										<?=$input["berat_bersih"]?>
									</div>
									</div>
									<div class="form-group">
									<label class="col-sm-4">Berat Kotor</label>
									<div class="col-sm-8 form-group">
										<?=$input["berat_kotor"]?>
									</div>
									</div>
									<div class="form-group">
										<label>Jenis Kapal </label>
										<?=$input["jenis_kapal"]?>
									</div>
									<div class="form-group">
										<label>Negara Pembuat </label>
										<?=$input["negara_pembuat"]?>
									</div>
									<div class="form-group">
										<label>Tahun Pembuatan </label>
										<?=$input["tahun_buatan"]?>
									</div>
									<div class="form-group">
										<label>Mesin Penggerak Utama </label>
									</div>
									<div class="form-group">
									<label class="col-sm-5">Jumlah Unit</label>
									<div class="col-sm-7 form-group">
										<?=$input["jml_unit_mesin"]?>
									</div>
									</div>
									<div class="form-group">
									<label class="col-sm-5">Merk dan Tipe</label>
									<div class="col-sm-7 form-group">
										<?=$input["merk_tipe_mesin"]?>
									</div>
									</div>
									<div class="form-group">
									<label class="col-sm-5">Negara Pembuat</label>
									<div class="col-sm-7 form-group">
										<?=$input["negara_pembuat_mesin"]?>
									</div>
									</div>
									<div class="form-group">
									<label class="col-sm-5">Kapasitas</label>
									<div class="col-sm-7 form-group">
										<?=$input["kapasitas_mesin"]?>
									</div>
								</div>
							</div>
						</div>

						<!-- <div class="col-md-12">
							<div class="form-group text-right" style="padding: 15px;">
								<button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>
								<button type="button" class="btn btn-warning btn-sm btn-batal">BATAL</button>
							</div>
						</div> -->
					</div>

					<div class="row" class="step" data-step="2" style="display: none">
						<div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">DATA LEGALITAS</h3>
                                </div>

                                <input type="hidden" id="total_data_legalitas">
                                
                                <div class="table-responsive">
                                    <table id="table_data_legalitas_1" class="table-legalitas table_border_2" width="100%" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">
                                                    <span>No</span>
                                                </th>
                                                <th rowspan="2">
                                                    <span>Dokumen</span>
                                                </th>
                                                <th rowspan="2">
                                                    <span>Jenis Sertifikat</span>
                                                </th>
                                                <th rowspan="2">
                                                    <span>Nomor Sertifikat</span>
                                                </th>
                                                <th rowspan="2">
                                                    <span>Atas Nama</span>
                                                </th>
                                                <th colspan="2">
                                                    <span>Tanggal Sertifikat</span>
                                                </th>
                                                <th colspan="2">
                                                    <select class="form-control table_input input_895_" id="textbox_tanah_87" name="update[tanah_87]" data-id-field="895" data-keterangan="">
                                                        <option>Select</option>
                                                        <?php foreach ($sumber_nomor_sertifikat as $key => $value) { ?>
                                                        <option value="<?php echo $value->sumber_nomor_sertifikat ?>" <?php echo ($value->sumber_nomor_sertifikat==$txn_tanah['sumber_nomor_sertifikat']) ? "selected":"" ?>><?php echo $value->sumber_nomor_sertifikat ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </th>
                                                <th rowspan="2">
                                                    <span>Luas Tanah (m<sup>2</sup>)</span>
                                                </th>
                                                <th rowspan="2"><span></span></th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <span>Terbit</span>
                                                </th>
                                                <th>
                                                    <span>Berakhir</span>
                                                </th>
                                                <th>
                                                    <span>Nomor</span>
                                                </th>
                                                <th>
                                                    <span>Tgl-Bln-Thn</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody_data_legalitas_1"></tbody>
                                        <tfoot>
                                        	<tr>
                                            	<td align="center" colspan="9">
                                                	<span>TOTAL LUAS TANAH SESUAI SERTIFIKAT</span>
                                                </td>
                                                <td>
                                                	<input type="text" id="textbox_tanah_61" name="update[tanah_61]" class="form-control table_input input_162_ text-right" value="<?php echo empty($txn_tanah["luas"]) ? NULL : $txn_tanah["luas"]; ?>" data-id-field="162" data-keterangan="" readonly>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div style="padding: 10px">
                                    <button type="button" class="btn btn-primary btn-sm btn-data-legalitas" data-type="tambah" data-id="">TAMBAH</button>
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group text-right" style="padding: 15px;">
								<button type="button" class="btn btn-primary btn-sm btn-simpan">LANJUTKAN</button>
								<button type="button" class="btn btn-warning btn-sm btn-batal">BATAL</button>
							</div>
						</div>
                    </div>
				</form>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="formAddMarker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Klik Pada Peta Untuk Menentukan Lokasi</h4>
            </div>
            <div class="modal-body" id="modal_content" style="height: 400px; text-align: right; position: relative;">
                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                <div id="map_area" style="width:100%; height: 100%;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php echo $_template["_footer"]?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6Z0Oxaa2Hv37II4swhzH662q0BGIaDaw&libraries=places"></script>
<script type="text/javascript">var icon_marker = 'house.png';</script>
<script type="text/javascript" src="<?php echo base_url().'asset/js/form_manajemen_peta.js' ?>"></script>
<script type="text/javascript">
	$(function(){
		$(":radio.objek_data").click(function(){
			$(".form6, .form1, #form2, #form3, #form4, #form5").hide()
			if($(this).val() == "1" || $(this).val() == "2"|| $(this).val() == "5"){
				$(".form1").show();
				$(".l_t").show();				
				$(".l_l").hide();
			}else if($(this).val() == "8"){
				$("#form2").show();
			}else if($(this).val() == "10"){
				$("#form3").show();
			}else if($(this).val() == "9"){
				$("#form4").show();
			}else if($(this).val() == "11"){
				$("#form5").show();
			}else if($(this).val() == "6" || $(this).val() == "7"  || $(this).val() == "3"){
				$(".l_t").hide();		
				$(".l_l").show();
				$(".form6").show();
			}
		});
	});
</script>
<script>
var redirect_url	= "<?php if (array_key_exists('url', $_GET)) echo $_GET['url']; else echo ''; ?>";
var id_provinsi		= $("#id_provinsi").val();
var id_kota			= $("#temp_id_kota").val();
var id_kecamatan	= $("#temp_id_kecamatan").val();
var id_desa			= $("#temp_id_desa").val();

$(document).ready(function(){
	$("#id_kota").prop("disabled", true);
	$("#id_kecamatan").prop("disabled", true);
	$("#id_desa").prop("disabled", true);

	if(id_provinsi){
		$("#box_kecamatan").html('<input id="id_kecamatan" disabled="true" name="id_kecamatan" class="form-control input-sm" value="Silahkan pilih Kota dulu." placeholder="Kota" required="" type="text">');
		$("#box_desa").html('<input id="id_desa" disabled="true" name="id_desa" class="form-control input-sm" value="Silahkan pilih Kecamatan dulu." placeholder="Kota" required="" type="text">');
		get_location("kota", "box_kota", "id_kota", id_provinsi, id_kota);
	}

	if(id_kota){
		$("#box_desa").html('<input id="id_desa" disabled="true" name="id_desa" class="form-control input-sm" value="Silahkan pilih Kecamatan dulu." placeholder="Kota" required="" type="text">');
		get_location("kecamatan", "box_kecamatan", "id_kecamatan", id_kota, id_kecamatan);
	}

	if(id_kecamatan){
		get_location("desa", "box_desa", "id_desa", id_kecamatan, id_desa);
	}

	$("#kode").prop("readonly", true);
	$("#zip").prop("readonly", true);
	
});
$(document).on("change", "#id_desa", function() {
	getKodePos($(this).val());
});
function getKodePos(id){
	$.ajax({
	  type	: "POST",
	  url 	: base_url + "ajax/get_kode_pos/",
	  data: { id: id },
	  dataType	: "JSON",
	  success	: function (data) {
			//alert(data.kode_pos);
			$("#zip").val(data.kode_pos);
		}
	});
}

var current_step = 1;
var finishing=false;
var luas_tanah=0;
$(".btn-simpan").click(function() {
	var id 				= $("#id").val();
	var id_pekerjaan	= $("#id_pekerjaan").val();
	var id_jenis_objek	= $("input[name=id_jenis_objek]:checked").val();

	var kode 			= $("#kode").val();
	var alamat 			= $("#alamat").val();
	var id_provinsi 	= $("#id_provinsi").val();
	var id_kota 		= $("#id_kota").val();
	var id_kecamatan 	= $("#id_kecamatan").val();
	var id_desa 		= $("#id_desa").val();
	var id_transportasi	= $("#id_transportasi").val();
	var pengembangan = $("#pengembangan").val();
	var pemegang_hak = $("#pemegang_hak").val();
	var kepemilikan = $("#kepemilikan").val();
	var jenis_sertifikat = $("#jenis_sertifikat").val();
	var no_sertifikat = $("#no_sertifikat").val();
	luas_tanah = $("#luas_tanah").val();
	var luas_bangunan = $("#luas_bangunan").val();

	var gang 			= $("#gang").val();
	var nomor 			= $("#nomor").val();
	var rt 				= $("#rt").val();
	var rw 				= $("#rw").val();
	var dh_provinsi 	= $("#dh_provinsi").val();
	var dh_kota 		= $("#dh_kota").val();
	var dh_kecamatan 	= $("#dh_kecamatan").val();
	var dh_desa			= $("#dh_desa").val();
	var zip                 = $("#zip").val();
	var latitude        = $('#koordinat_latitude').val();
	var longitude    	= $('#koordinat_longitude').val();

	var total_step = $('[data-step]').length;
	var next_step = current_step+1;
	
	if (current_step===total_step && redirect_url) {
		var data_legalitas = collect_data_legalitas();
		$.post(base_url + "ajax/do_save_data_legalitas", data_legalitas).done(function(d){
			var data;
			try {
				data = JSON.parse(d);
			}
			catch(e)
			{
				console.log ("Failed to parse!")
			}
		});

		window.location = redirect_url;
		return;
	}

	$.ajax({
		type	: "POST",
		url 	: base_url + "ajax/do_update_data_global/",
		data	: {
			type : "lokasi",
			id : id,
			id_pekerjaan : id_pekerjaan,
			id_jenis_objek : id_jenis_objek,
			kode : kode,
			alamat : alamat,
			id_provinsi : id_provinsi,
			id_kota : id_kota,
			id_kecamatan : id_kecamatan,
			id_desa : id_desa,
			//tanggal : tanggal,
			//jam : jam,
			id_transportasi : id_transportasi,
			pengembangan : pengembangan,
			pemegang_hak : pemegang_hak,
			kepemilikan : kepemilikan,
			jenis_sertifikat : jenis_sertifikat,
			no_sertifikat : no_sertifikat,
			luas_tanah : luas_tanah,
			luas_bangunan : luas_bangunan,
			gang : gang,
			nomor : nomor,
			rt : rt,
			rw : rw,
			dh_provinsi : dh_provinsi,
			dh_kota : dh_kota,
			dh_kecamatan : dh_kecamatan,
			dh_desa : dh_desa,
			zip : zip,
			latitude : latitude,
			longitude : longitude
		},
		beforeSend: function(){
			$(".btn-simpan").html("Loading...");
			$(".btn-simpan").prop("disabled", true);
		},
		dataType	: "JSON",
		success	: function (data) {
			$(".btn-simpan").html("SIMPAN");
			$(".btn-simpan").prop("disabled", false);

			if (data.result.trim() != "success")
			{
				generate_notification(data.result.trim(), data.message.trim(), "topCenter");

				return;
			}

			if (data.result.trim() == "success") {
				$('#id_lokasi').val(data.id_lokasi);
				$('[data-step="'+current_step+'"]').hide();
				$('[data-step="'+next_step+'"]').show();

				current_step++;
				if ( current_step == total_step ) {
					get_data_legalitas('tanah');
				}
			}
		}
	});
});

$(".btn-batal").click(function() {
	if (redirect_url){
		location = redirect_url;
	}else{
		location = "<?=base_url()?>pekerjaan/lokasi/";
	}
});
var YES = Y = true;
var NO =  N = DONT = NO_SET = false;
var doUpdate = DONT;
var ajaxTableInput = [];
var isAjaxTableInput=false;
var list_id_field=[];


$(document).on("change", ".table_input", function(event) {
	event.stopPropagation();
	var $input = $(this);
	$(this).updateTextbox(true);
	return;
});
function ajaxTableInputFinish($input) {
	var index = ajaxTableInput.indexOf($input);
	ajaxTableInput.splice(index,1);
	current_id_field = false;
	isAjaxTableInput = false;
	var idField = $input.attr("class");
	var indexField = list_id_field.indexOf(idField);
	if ( indexField > -1 ) {
		list_id_field.splice(indexField, 1);
	}
}
function calculate_total_luas_tanah_data_legalitas(terget_tab, $input)
{
	doUpdate = YES
	if (!$input)
	{
		$input = $('')
		doUpdate = NO
	}

	total_luas_tanah	= 0;
	$(terget_tab + ' > tbody > tr').each(function(){
		$(this).find('td').each (function() {
			if ($(this).attr("td-type") == "total")
			{
				$(this).find('input').addClass("text-right").number( true, 0 );
				if ($(this).find('input').val() != ""){
					total_luas_tanah += parseFloat($(this).find('input').val());
				}
			}
		});
	});
	
	if ($input.is("#textbox_tanah_60"))
	{
		doUpdate = YES
	}
	$(terget_tab).find("#textbox_tanah_61").val(total_luas_tanah).number( true, 0 ).updateTextbox(doUpdate)

	$(".input_260_0").attr("readonly", true).addClass("readonly").val(total_luas_tanah)	.updateTextbox(doUpdate);

	doUpdate = NO
	if ($input.is('#textbox_tanah_53'))
	{
		doUpdate = YES
	}

	$(".input_259_0,.input_278_0").attr("readonly", true).addClass("readonly").val($(".input_154_1 option:selected").val())	.updateTextbox(doUpdate);

	var luasTanahDinilai = total_luas_tanah-(parseFloat($("#textbox_tanah_62").val())||0);
	$("#luas-tanah-dinilai").val(luasTanahDinilai);
}
$(document).on("change", "#table_data_legalitas_1 > tbody > tr > td > input", function()
{
	calculate_total_luas_tanah_data_legalitas("#table_data_legalitas_1", $(this));
});
(function pump(){
	excecuteTableInput();
	setTimeout(pump, 50);
})();
function excecuteTableInput(){
	var $input;

	if ( ajaxTableInput.length === 0 )
	{
		return;
	}
	$input = ajaxTableInput[0];

	ajaxTableInputSend($input);
}
function ajaxTableInputSend($input){
	if (isAjaxTableInput) {
		return;
	}

	isAjaxTableInput = true;

	var id_lokasi = $("#id_lokasi").val();
	var id_field = $input.attr("data-id-field");
	var type = $input.attr("type");
	var value = $input.val();
	console.log('halo : ' + $input.attr('id') + ', ' + $input.attr('data-id-field'));

	if ($input.attr("data-keterangan"))
	{
		var keterangan	= $input.attr("data-keterangan");
	}
	else
	{
		var keterangan	= "";
	}
	if (typeof id_field !== "undefined" && id_field !== "") {
		var noAjax=false;
		if (id_field=='9' || id_field=='12' || id_field=='26' || id_field=='157' || id_field=='158' || id_field=='160' || id_field=='242' || id_field=='687'){
			if (value=="") {
				// input tanggal tidak boleh kosong
				// window.alert("Input tidak boleh kosong!");
				ajaxTableInputFinish($input);
				noAjax=true;
			}
		}

		if(!noAjax) {
			$.ajax({
				type : "POST",
				url : base_url + "AjaxPekerjaan/update_textbox_kertas_kerja?id_field="+id_field,
				data : {
					id_lokasi : id_lokasi,
					id_field : id_field,
					value : value,
					keterangan : keterangan
				},
				success : function (d) {
					var data;
					try {
						//test
						data = JSON.parse(d);
					}
					catch(e)
					{
						//test
					}

					ajaxTableInputFinish($input);
				},
	            error: function (jqXHR, textStatus, errorThrown) {
	                console.log('Ajax error! ' + errorThrown.message + "\n status: " + textStatus);
					ajaxTableInputFinish($input);
	            }
			});
		}
	}
}

function collect_data_legalitas() {
	var data_legalitas = {};
	$("#table_data_legalitas_1").find("tbody").find("tr").each(function(i,v){
		var $row 						= $(this);
		var id_lokasi					= $('#id_lokasi').val();
		var jenis_sertifikat 			= $row.find('#textbox_tanah_53').val();
		var nomor_sertifikat 			= $row.find('#textbox_tanah_54').val();
		var atas_nama 					= $row.find('#textbox_tanah_55').val();
		var tanggal_sertifikat_terbit 	= $row.find('#textbox_tanah_56').val();
		var tanggal_sertifikat_berakhir = $row.find('#textbox_tanah_57').val();
		var nomor 						= $row.find('#textbox_tanah_58').val();
		var tgl_bln_thn 				= $row.find('#textbox_tanah_59').val();
		var luas_tanah 					= $row.find('#textbox_tanah_60').val();
		var dokumen 					= $row.find('#textbox_tanah_61').val();
		var bobot 						= 0;

		var rowData = {};
		rowData.id_lokasi = id_lokasi;
		rowData.jenis_sertifikat = jenis_sertifikat;
		rowData.nomor_sertifikat = nomor_sertifikat;
		rowData.atas_nama = atas_nama;
		rowData.tanggal_sertifikat_terbit = tanggal_sertifikat_terbit;
		rowData.tanggal_sertifikat_berakhir = tanggal_sertifikat_berakhir;
		rowData.nomor = nomor;
		rowData.tgl_bln_thn = tgl_bln_thn;
		rowData.bobot = bobot;
		rowData.luas_tanah = luas_tanah;
		rowData.dokumen = dokumen;
		data_legalitas[i] = rowData;
	});

	return data_legalitas;
}

function get_data_legalitas(target) {
	var terget_tab	= "";

	if (target == "tanah") {
		var terget_tab = "#table_data_legalitas_1";
		var terget_tab_tbody = "#tbody_data_legalitas_1";
		var target_url = base_url + "AjaxPekerjaan/get_data_legalitas/";
	}

	$.ajax({
		type : "POST",
		url : target_url,
		dataType : "json",
		beforeSend: function() {
			$(terget_tab_tbody).html("<tr><td colspan='10' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
		},
		data : {
			id_lokasi 	: $("#id_lokasi").val()
		},
		success		: function (data) {
			$(terget_tab_tbody).html("");
			var row = "";
			var a = 0;
			var total_luas=0;
			$.each(data.data_table, function(i, item) {
				row	= "<tr>";
				var item_file = data.data_table[i]['tanah_98'];
				item_file = item_file.replace('type="text"', 'type="hidden"');
				row	+= "<td align='center'>" + i + "</td>";
				$.each(item, function(j, item1){
					if (j == "tanah_53")
					{
						row	+= "<td><input type='file' class='form-control tmp_file'><input type='hidden' class='file_po' id='file_po'>"+item_file+"</td>";
						row	+= "<td>" + item1 + "</td>";
					}
					else if (j == "tanah_60")
					{
						row	+= "<td td-type='total'>" + item1 + "</td>";
					}
					else if (j == "tanah_68")
					{
						row	+= "<td td-type='bobot'>" + item1 + "</td>";
					}
					else if (j == "tanah_69")
					{
						row	+= "<td td-type='indikasi'>" + item1 + "</td>";
					}
					else if (j == "tanah_70")
					{
						row	+= "<td td-type='total_nilai_tanah'>" + item1 + "</td>";
					}
					else if ( j != "tanah_98" )
					{
						row	+= "<td>" + item1 + "</td>";
					}
				});
				
				row	+= "</tr>";
				var $row = $(row);
				luas_tanah = parseFloat(luas_tanah);
				$row.find("#textbox_tanah_60").val(luas_tanah);
				total_luas+=luas_tanah;

				$row.appendTo(terget_tab_tbody);
				// $(terget_tab_tbody).append(row);
				a++;
			});
			initDate();
			$("#textbox_tanah_61").val(total_luas);
		}
	})
}
$(document).on("click", ".btn-data-legalitas", function()
{
	if (window.confirm("Apakah Anda yakin?"))
	{
		var id_lokasi = $("#id_lokasi").val();
		var type = $(this).attr("data-type");
		var id = $(this).attr("data-id");
		
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/update_data_legalitas/",
			data		: {
				type : type,
				id_lokasi : id_lokasi,
				id : id
			},
			success		: function (data) {
				get_data_legalitas("tanah");
			},
		});
	}
});
jQuery.fn.extend({
	updateTextbox: function(doUpdate = true) {
		return this.each(function() {
			var $input = $(this);
			if (doUpdate) {
				var isInputExist = ajaxTableInput.indexOf($input);
				var idField = $input.attr("class");
				if (isInputExist === -1)
				{
					list_id_field.push(idField);
					ajaxTableInput.push($input);
				}
			}
		});
		// return this;
	},
});
(function(){
	var $tmp_box;

	$(document).on('change', '.tmp_file', function(){
		$tmp_box = $(this);
		files = event.target.files;
		uploadFiles(event);
	});

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
					$tmp_box.closest("tr").find("#textbox_tanah_98").val(data);
					$tmp_box.closest("tr").find("#textbox_tanah_98").trigger('change');
					$tmp_box.closest("tr").find(".box_file_po").html("<a href='"+base_url+"/asset/file/" + data + "' target='_blank'>Download</a>");
				}
	        }
	    });
	}
})();

</script>

<?php echo $_template["_foot"]?>
