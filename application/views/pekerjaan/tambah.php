<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
echo $_template["_head"]; 
?>
<style>
	.table_custom{
		margin-bottom: 10px;
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
	    <h1><?php echo $title; ?></h1>
	    <ol class="breadcrumb">
	        <li><a href="<?php echo base_url(); ?>">Home</a></li>
	        <li><a href="<?php echo base_url().$this->router->fetch_class(); ?>">Pekerjaan</a></li>
	        <li class="active"><?php echo $title; ?></li>
	    </ol>
	</section>
	<section class="content">
		<div class="box">
			<div class="box-body">
				<form name="form-klien" id="form-klien" method="post">
					<?=$input["id"]?>
					<div class="row">
						<div class="step-1 col-md-6 col-xs-12">
							<div class="form-group">
								<label>Klien <span class="required">*</span></label>
								<?=$input["id_klien"]?>
							</div>
							<div class="form-group">
								<label>Bank <!-- <span class="required">*</span> --></label>
								<?=$input["id_debitur"]?>
							</div>
							<div class="form-group">
								<label>Nama Pekerjaan <span class="required">*</span></label>
								<?=$input["nama"]?>
							</div>
							<div class="form-group">
								<label>Tanggal Penerimaan Informasi <span class="required">*</span></label>
								<?=$input["tanggal_penerimaan"]?>
							</div>
							<div class="form-group">
								<label>Nomor Surat Tugas <span class="required">*</span></label>
								<?=$input["no_surat_tugas"]?>
							</div>
							<div class="form-group">
								<label>Tanggal Surat Tugas <span class="required">*</span></label>
								<?=$input["tgl_surat_tugas"]?>
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<?=$input["deskripsi"]?>
							</div>
							
						</div>
						<div class="step-1 col-md-6 col-xs-12">
							<div class="form-group">
								<label>Pemberi Tugas <span class="required">*</span></label><br>
								<?=$input["jenis_pemberi_tugas"]?>
								<?=$input["pemberi_tugas_klien_id"]?>
								<?=$input["pemberi_tugas_klien"]?>
								<?=$input["pemberi_tugas_debitur_id"]?> 
								<?=$input["pemberi_tugas_debitur"]?> 
							</div>
							<div class="form-group">
								<label>Pemilik Properti <span class="required">*</span></label>
								<?=$input["pemilik_properti"]?>
							</div>
							<div class="form-group">
								<label>Maksud dan Tujuan Penilaian <span class="required">*</span></label>
								<?=$input["maksud_tujuan"]?>
							</div>
							<div class="form-group">
								<label>Pengguna Laporan</label><br>
								<?=$input["jenis_pengguna_laporan"]?>
								<?=$input["pengguna_laporan"]?>
								<!-- <?=$input["pengguna_laporan_bank"]?> -->
							</div>
							<div class="form-group">
								<label>Laporan Ditujukan Kepada <span class="required">*</span></label><br>
								<?=$input["jenis_tujuan_pelaporan"]?>
								<?=$input["tujuan_pelaporan_klien"]?>
								<?=$input["tujuan_pelaporan_debitur"]?>
							</div>
							<div class="form-group">
								<label>Jenis Laporan <span class="required">*</span></label>
								<?=$input["jenis_laporan"]?>
							</div>
							<div class="form-group">
								<label>Jenis Jasa <span class="required">*</span></label>
								<?=$input["jenis_jasa"]?>
							</div>
							<div class="form-group">
								<label>Keterangan Lainnya</label>
								<?=$input["keterangan"]?>
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-primary btn-sm btn-next">LANJUTKAN</button>
							</div>
						</div>
						<div class="step-2 col-md-12 col-xs-12">
							<h4>Informasi Objek Penilaian <span class="required">*</span></h4>
							<div id="table_objek" style="background-color: #eee;">
								<table class="table_custom" style="" cellpadding='0' cellspacing='0' border='0'>
									<tbody id="table_lokasi_body"></tbody>
								</table>
								<input type="hidden" id="table_lokasi_count"/>
							</div>
							<div class="text-right">
								<button type="button" class="btn btn-primary btn-sm btn-tambah-lokasi">OBJEK PROPERTI - <?php echo $jmlobjek; ?></button>
							</div>
							<div class="col-md-5 col-xs-12" style="padding: 0px;">

								<div class="form-group">
									<?php if ($jmlobjek > 1) { ?>
									<button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>
									<?php } ?>
									<button type="button" class="btn btn-warning btn-sm btn-kembali">KEMBALI</button>
								</div>
							</div>

						</div>
						<div class="col-md-6 col-xs-12"></div>
						<div class="col-md-6 col-xs-12"><span class="required">*</span> Wajib diisi.</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>

<?php echo $_template["_footer"]?>	

<script>
	var type				= "lokasi";
	var id 					= "";
	var id_klien			= "";
	var nama				= "";
	var tanggal_penerimaan	= "";
	var deskripsi			= "";
	var jenis_laporan			= "";
	var keterangan			= "";
	var current_url			= window.location.href;

	$(document).ready(function(){

		id = $("#id").val();

		if (getUrlParameter("state") == 1)
		{
			$(".step-1").show();
			$(".step-2").hide();
		}
		else if (getUrlParameter("state") == 2)
		{
			$(".step-1").hide();
			$(".step-2").show();
			get_lokasi();
			
			
		}
		else
		{
			$(".step-1").show();
			$(".step-2").hide();
		}


	});

	$(document).on("click", ".btn-next", function() {
		id_klien			= $("#id_klien").val();
		nama				= $("#nama").val();
		tgl					= $("#tanggal_penerimaan").val(); //13-06-2016
		thn					= tgl.substring(6,10);
		bln 				= tgl.substring(3,5);
		hari 				= tgl.substring(0,2);
		// tanggal_penerimaan 	= thn+'-'+bln+'-'+hari;
		tanggal_penerimaan 	= $("#tanggal_penerimaan").val();
		no_surat_tugas		= $("#no_surat_tugas").val();
		tgl					= $("#tgl_surat_tugas").val(); //13-06-2016
		thn					= tgl.substring(6,10);
		bln 				= tgl.substring(3,5);
		hari 				= tgl.substring(0,2);
		// tgl_surat_tugas 	= thn+'-'+bln+'-'+hari;
		tgl_surat_tugas		= $("#tgl_surat_tugas").val();
		deskripsi			= $("#deskripsi").val();
		jenis_laporan 	= $("#jenis_laporan").val();
		jenis_jasa 	= $("#jenis_jasa").val();
		keterangan			= $("#keterangan").val();
		
		if ($("#jenis_pemberi_tugas_0").is( ":checked" )){
			jenis_pemberi_tugas	= 0;
			pemberi_tugas	= $("#pemberi_tugas_klien").val();
		}else{
			jenis_pemberi_tugas	= 1;
			pemberi_tugas	= $("#pemberi_tugas_debitur").val();
		}

		pemilik_properti			= $("#pemilik_properti").val();
		maksud_tujuan			= $("#maksud_tujuan").val();
		pengguna_laporan			= $("#pengguna_laporan").val();
		if ($("#jenis_tujuan_pelaporan_0").is( ":checked" )){
			jenis_tujuan_pelaporan	= 0;
			tujuan_pelaporan	= $("#tujuan_pelaporan_klien").val();
		}else{
			jenis_tujuan_pelaporan	= 1;
			tujuan_pelaporan	= $("#tujuan_pelaporan_debitur").val();
		}

		if ($("#jenis_pengguna_laporan_0").is( ":checked" )){
			jenis_pengguna_laporan	= 0;
			// pengguna_laporan	= $("#pengguna_laporan_klien").val();
		}else if ($("#jenis_pengguna_laporan_1").is( ":checked" )){
			jenis_pengguna_laporan	= 1;
			// pengguna_laporan	= $("#pengguna_laporan_klien").val();
		}else{
			jenis_pengguna_laporan	= 2;
			// pengguna_laporan	= $("#pengguna_laporan_bank").val();
		}
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/update_pekerjaan/",
			dataType	: "JSON",
			beforeSend: function() {
				$(".btn-next").html("Silahkan tunggu...");
				$(".btn-next").prop("disabled", true);
			},
			data		: {
				type 				: "step-1a",
				id		 			: id,
				id_klien 			: id_klien,
				nama 				: nama,
				tanggal_penerimaan 	: tanggal_penerimaan,
				no_surat_tugas 		: no_surat_tugas,
				tgl_surat_tugas 	: tgl_surat_tugas,
				deskripsi 			: deskripsi,
				jenis_laporan 			: jenis_laporan,
				jenis_jasa 			: jenis_jasa,
				keterangan 			: keterangan,

				jenis_pemberi_tugas 			: jenis_pemberi_tugas,
				pemberi_tugas 			: pemberi_tugas,
				pemilik_properti 			: pemilik_properti,
				maksud_tujuan 			: maksud_tujuan,
				jenis_pengguna_laporan 			: jenis_pengguna_laporan,
				pengguna_laporan 			: pengguna_laporan,
				jenis_tujuan_pelaporan 			: jenis_tujuan_pelaporan,
				tujuan_pelaporan 			: tujuan_pelaporan

			},
			success		: function (data) {
				$(".btn-next").html("LANJUTKAN");
				$(".btn-next").prop("disabled", false);

				if (data.result == "success"){
					$(".step-1").hide();
					$(".step-2").show();
					window.history.pushState("object or string", "Title", window.location.pathname + "?state=2" );
					get_lokasi();
				}
				else
				{
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
				}
			},
		});
	});

	$(document).on("click", ".btn-kembali", function()
	{
		$(".step-1").show();
		$(".step-2").hide();
		window.history.pushState("object or string", "Title", window.location.pathname + "?state=1" );

	});

	$(document).on("click", ".btn-tambah-lokasi", function()
	{
		location = base_url + "pekerjaan/lokasi_edit/" + id + "/?url=" + window.location.href;
		/*
		jenis_laporan		= $("#jenis_laporan").val();
		keterangan			= $("#keterangan").val();
		$.ajax({
			type		: "POST",
			dataType	: "JSON",
			url 		: base_url + "AjaxPekerjaan/update_informasi_penilaian/",
			data: {
				id: id,
				jenis_laporan:jenis_laporan,
				keterangan:keterangan,
			},
			success		: function (data) {
				if (data.result == "success"){
						location = base_url + "pekerjaan/lokasi_edit/" + id + "/?url=" + window.location.href;
				}
				else
				{
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
				}
			},
		});*/

	});

	$(document).on("click", ".btn-edit-lokasi", function() {
		var id_lokasi	= $(this).attr("data");

		location = base_url + "pekerjaan/lokasi_edit/" + id + "/" + id_lokasi + "/?url=" + window.location.href;
	});

	$(document).on("click", ".btn-delete-lokasi", function() {
		var id	= $(this).attr("data");
		if (window.confirm("Apakah Anda yakin?"))
		{
			$.ajax({
				type		: "POST",
				url 		: base_url + "ajax/delete_data/" + type,
				dataType	: "JSON",
				data		: {
					id 	: id
				},
				success		: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					if (data.result.trim() == "success"){
						get_lokasi()
					}
				},
			});
		}
	});

	$(document).on("click", ".btn-simpan", function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			id_klien			= $("#id_klien").val();
			nama				= $("#nama").val();
			tgl					= $("#tanggal_penerimaan").val(); //13-06-2016
			thn					= tgl.substring(6,10);
			bln 				= tgl.substring(3,5);
			hari 				= tgl.substring(0,2);
			tanggal_penerimaan 	= thn+'-'+bln+'-'+hari;
			deskripsi			= $("#deskripsi").val();
			jenis_laporan		= $("#jenis_laporan").val();
			jenis_jasa		= $("#jenis_jasa").val();
			keterangan			= $("#keterangan").val();

			$.ajax({
				type		: "POST",
				url 		: base_url + "AjaxPekerjaan/update_pekerjaan/",
				dataType	: "JSON",
				beforeSend: function() {
					$(".btn-simpan").html("Silahkan tunggu...");
					$(".btn-simpan").prop("disabled", true);
				},
				data		: {
					type 				: "step-1b",
					id		 			: id,
					id_klien 			: id_klien,
					nama 				: nama,
					tanggal_penerimaan 	: tanggal_penerimaan,
					deskripsi 			: deskripsi,
					jenis_laporan 		: jenis_laporan,
					jenis_jasa 		: jenis_jasa,
					keterangan 			: keterangan
				},
				success		: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					$(".btn-simpan").html("SIMPAN");
					$(".btn-simpan").prop("disabled", false);

					if (data.result == "success")
					{
						location	= base_url + "pekerjaan/";
					}
				},
			});
		}
	});

	$(document).on("change", "#id_klien, #id_debitur", function(event){
		var val = $(this).val();
		var text = $("option:selected", this).text();
		if ("id_klien"==$(this).attr("id")) 
		{
			$("#pemberi_tugas_klien").val(val);
			$("#pemberi_tugas_klien_text").val(text);
		}
		else if ("id_debitur"==$(this).attr("id")) 
		{
			$("#pemberi_tugas_debitur").val(val);
			$("#pemberi_tugas_debitur_text").val(text);
		}

		getPenggunaLaporan();
	});

	function get_lokasi()
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/get_lokasi_pekerjaan/",
			dataType	: "json",
			beforeSend: function() {
				$("tbody").html("<tr><td align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
			},
			data		: {
				id_pekerjaan 	: id
			},
			success		: function (data) {
				//$(".test_data").html(data.data_table);
				$("tbody").html("");
				var row = "";
				$.each(data.data_table, function(i, item)
				{
					if (i%2 == 0){
						row	= "<tr style='background-color: #fff2cc;'>";
					}else{
						row	= "<tr style='background-color: #e2efda;'>";
					}

					/*row	+= "<td align='center'>" + i + "</td>";*/
					$.each(item, function(j, item1)
					{
						row	+= "<td>" + item1 + "</td>";
					});

					row	+= "</tr>";
					$("#table_lokasi_body").append(row);
				});
				//alert();
				$(".table_count").html("Total data : " + data.data_total);
				//$("#table_lokasi_count").val($("#table_lokasi_body tr").length);
				$("#paging").html(data.data_paging);
				var lokasi_count = $("#table_lokasi_body tr").length;
				//alert(lokasi_count);
				if (lokasi_count <= 0){
					location = base_url + "pekerjaan/lokasi_edit/" + id + "/?url=" + window.location.href;
				}
			},
		});
	}
	function getPemberiTugas(){

		if ($("#jenis_pemberi_tugas_0").is( ":checked" )){
			var id_klien = $("#id_klien").val();
			var klien = $("#id_klien option:selected").text();
			$("#pemberi_tugas_klien_text").val(klien);
			$("#pemberi_tugas_klien").val(id_klien);
			$("#pemberi_tugas_klien_text").show();
			$("#pemberi_tugas_debitur_text").hide();
			$("#pemberi_tugas_klien_text").prop('required',true);
			$("#pemberi_tugas_debitur_text").prop('required',false);
		}else{
			var id_debitur = $("#id_debitur").val();
			var debitur = $("#id_debitur option:selected").text();
			$("#pemberi_tugas_debitur_text").val(debitur);
			$("#pemberi_tugas_debitur").val(id_debitur);
			$("#pemberi_tugas_klien_text").hide();
			$("#pemberi_tugas_debitur_text").show();
			$("#pemberi_tugas_klien_text").prop('required',false);
			$("#pemberi_tugas_debitur_text").prop('required',true);
		}
	}
	function getPenggunaLaporan(){
		var klien = $("#id_klien option:selected").text();
		var debitur = $("#id_debitur option:selected").text();
		var val = "";
		if ($("#jenis_pengguna_laporan_0").is( ":checked" )){
			val = klien;
		}else if ($("#jenis_pengguna_laporan_1").is( ":checked" )){
			val = debitur;
		}else{
			val = klien+" & "+debitur;
		}
		$("#pengguna_laporan").val(val);
	}
	function getTujuanPelaporan(){
		if ($("#jenis_tujuan_pelaporan_0").is( ":checked" )){
			  $("#tujuan_pelaporan_klien").show();
				$("#tujuan_pelaporan_debitur").hide();
				$("#tujuan_pelaporan_klien").prop('required',true);
				$("#tujuan_pelaporan_debitur").prop('required',false);
		}else{
				$("#tujuan_pelaporan_klien").hide();
				$("#tujuan_pelaporan_debitur").show();
				$("#tujuan_pelaporan_klien").prop('required',false);
				$("#tujuan_pelaporan_debitur").prop('required',true);
		}
	}

  $(document).ready(function(){
		getPemberiTugas();
		$("#jenis_pemberi_tugas_0,#jenis_pemberi_tugas_1").click(function() {
			getPemberiTugas();
		});
		getPenggunaLaporan();
		$("#jenis_pengguna_laporan_0,#jenis_pengguna_laporan_1,#jenis_pengguna_laporan_2").click(function() {
			getPenggunaLaporan();
		});
		getTujuanPelaporan();
		$("#jenis_tujuan_pelaporan_0,#jenis_tujuan_pelaporan_1").click(function() {
			getTujuanPelaporan();
		});
	});

  $(document).on("change", "#maksud_tujuan", function(e){
  	var val = $(this).val();
  	if (6==val){
  		var jenis_pemberi_tugas=0;
  		if($('#jenis_pemberi_tugas_1').is( ":checked" )){
  			jenis_pemberi_tugas=1;
  		}

  		var pemberi_tugas=$("#pemberi_tugas_klien option:selected").text();
  		if (jenis_pemberi_tugas==1){
  			pemberi_tugas=$("#pemberi_tugas_debitur option:selected").text();
  		}

  		if($('#jenis_pemberi_tugas_0').is( ":checked" )){
	  		$("#jenis_pengguna_laporan_0")[0].click();
	  		$("#pengguna_laporan_klien").val(pemberi_tugas);
  		}else{
  			console.log (pemberi_tugas, $('#jenis_pemberi_tugas_0').is( ":checked" ));

  			$("#jenis_pengguna_laporan_1")[0].click();
  			$("#pengguna_laporan_bank").val(pemberi_tugas);
  		}
  	}
  })
</script>

<?php echo $_template["_foot"]?>
