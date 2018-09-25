$(function(){
	var doUpdatePrefilled = false;
	if ( ! txn_kertas_kerja.nama_penilai ) {
		isFirstTimeKertasKerja = false;
		doUpdatePrefilled = true;
	}

	//ENTRY
	$("#textbox_entry_3, #textbox_entry_5, #textbox_entry_15, #textbox_entry_18, #textbox_entry_21, #textbox_entry_23, #textbox_entry_25, #textbox_entry_27, #textbox_entry_2").attr("readonly", true).addClass("readonly");
	$("#textbox_entry_2, #textbox_entry_3, #textbox_entry_5, #textbox_entry_18, #textbox_entry_21, #textbox_entry_23, #textbox_entry_25, #textbox_entry_27").attr("readonly", true).addClass("readonly").updateTextbox(doUpdatePrefilled);
	$('#no_mappi_penilai, #no_mappi_surveyor').updateTextbox(doUpdatePrefilled);
	
	//TANAH
	$("#textbox_tanah_61").attr("readonly", true);
	$("#textbox_tanah_61, #textbox_tanah_62").addClass("text-right");
	$("#textbox_tanah_1, #textbox_tanah_2, #textbox_tanah_3, #textbox_pembanding_47, #textbox_pembanding_48, #textbox_tanah_61, #textbox_tanah_72, #textbox_tanah_70, #textbox_tanah_71").attr("readonly", true).addClass("readonly");
	
	if ($("#textbox_tanah_30").val() == "Lainnya"){
		$("#textbox_tanah_73").show();
		$("#textbox_tanah_73").css("border", "1px solid #999");
	}else{
		$("#textbox_tanah_73").hide();
	}
	
	if ($("#textbox_tanah_31").val() == "Lainnya"){
		$("#textbox_tanah_74").show();
		$("#textbox_tanah_74").css("border", "1px solid #999");
	}else{
		$("#textbox_tanah_74").hide();
	}
	
	$(".tanah-td-yang-dijumpai").html($("#textbox_entry_11").val());
	$(".tanah-td-jabatan").html($("#textbox_entry_13").val());

	$(" #textbox_tanah_64, #textbox_tanah_65, #textbox_tanah_66").each(function(){
		$(this).number( true, 0 );
	});

	//SARANA PELENGKAP
	$("#textbox_sarana_2, #textbox_sarana_3, #textbox_sarana_4,   #textbox_sarana_8, #textbox_sarana_9, #textbox_sarana_10,  #textbox_sarana_14, #textbox_sarana_15, #textbox_sarana_16,  #textbox_sarana_20, #textbox_sarana_21, #textbox_sarana_22,  #textbox_sarana_24,  #textbox_sarana_26, #textbox_sarana_27 ,  #textbox_sarana_30,  #textbox_sarana_32, #textbox_sarana_33,  #textbox_sarana_36, #textbox_sarana_37, #textbox_sarana_38,  #textbox_sarana_40,  #textbox_sarana_42,  #textbox_sarana_44,  #textbox_sarana_48,  #textbox_sarana_50,   #textbox_sarana_54,  #textbox_sarana_56, #textbox_sarana_60,  #textbox_sarana_62 ,  #textbox_sarana_66,  #textbox_sarana_68,  #textbox_sarana_72,  #textbox_sarana_74, #textbox_sarana_75, #textbox_sarana_78").addClass("text-right");

	$("#textbox_sarana_4, #textbox_sarana_10, #textbox_sarana_16, #textbox_sarana_22, #textbox_sarana_28, #textbox_sarana_34, #textbox_sarana_42, #textbox_sarana_48, #textbox_sarana_54, #textbox_sarana_60, #textbox_sarana_66, #textbox_sarana_72, #textbox_sarana_37, #textbox_sarana_38, #textbox_sarana_75, #textbox_sarana_76, #textbox_sarana_77, #textbox_sarana_78, #textbox_sarana_4, #textbox_sarana_10, #textbox_sarana_16, #textbox_sarana_22, #textbox_sarana_28, #textbox_sarana_34 , #textbox_sarana_12 , #textbox_sarana_24, #textbox_sarana_30, #textbox_sarana_36, #textbox_sarana_44, #textbox_sarana_50, #textbox_sarana_56, #textbox_sarana_62, #textbox_sarana_68, #textbox_sarana_74");
	
	//BANGUNAN
	$(" #textbox_bangunan_54, #textbox_bangunan_55, #textbox_bangunan_56, #textbox_bangunan_57, #textbox_bangunan_58").each(function(){
		$(this).number( true, 0 );
	});


	//DATA BANDING

	$("#textbox_pembanding_47, #textbox_pembanding_48, #textbox_tanah_61, #textbox_tanah_72, #textbox_tanah_70, #textbox_tanah_71").addClass("text-right");

	$(".input_249_0, .input_251_0, .input_252_0, .input_253_0, #latitude_pembanding_0, #longitude_pembanding_0").updateTextbox(doUpdatePrefilled);
	
	$("#textbox_pembanding_9,#textbox_pembanding_11").each(function(){
		$(this).closest("tr")
			.find("td").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
			.find("span").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
			.find(".form-control").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
		;
	});
});

$(function(){
	if (getUrlParameter("role")) {
		role = getUrlParameter("role");
	}
	tab_loaded.push(role);
	if (role === 'entry') {
		get_history_penilaian();
		get_ringkasan_laporan();
	}
	else  if (role === 'tanah')
	{
		get_data_legalitas(role);
	}
	else if (role === 'dbanding')
	{
		get_data_legalitas(role);
	}
	else if (role === 'lampiran')
	{
	}
	else if (role === 'splengkap')
	{
		update_sarana_pelengkap(YES);
	}

	var data_type = $('.panel-head.panel-'+role).attr("data-type")
	if (data_type == "bangunan")
	{
		load_tab_bangunan(role);
		$(".btn-tambah-bangunan").show();
	} else {
		$(".btn-tambah-bangunan").hide();
	}
});

$(document).on("click", ".panel-head", function(){
	role	= $(this).attr("aria-controls");
	window.history.pushState("object or string", "Title", window.location.pathname + "?role=" + role );
	
	tab_loaded.push(role)
	if (role === 'entry')
	{
		get_ringkasan_laporan()
	}
	else if (role == "tanah")
	{
		get_data_legalitas(role)
	}
	else if (role == "dbanding")
	{
		get_data_legalitas(role)
	}
	else if (role === 'splengkap')
	{
		update_sarana_pelengkap(YES)
	}

	var data_type = $(this).attr("data-type");
	if (data_type == "bangunan")
	{
		load_tab_bangunan(role)
		$(".btn-tambah-bangunan").show()
	}
	else
	{
		$(".btn-tambah-bangunan").hide()
	}
});

$(document).on("change", ".table_input", function(event) {
	event.stopPropagation();
	var $input = $(this);
	$(this).updateTextbox();

	if (role === 'entry')
	{

	}
	else  if (role === 'tanah')
	{

	}
	else if (role === 'dbanding')
	{

	}
	else if (role === 'lampiran')
	{

	}
	else if (role === 'splengkap')
	{
		update_sarana_pelengkap(YES, $(this)); 
	}

	var data_type = $('.panel-head.panel-'+role).attr("data-type")
	if (data_type == "bangunan")
	{
		// load_tab_bangunan(role, $input)
		// $(".btn-tambah-bangunan").show()
	}
	
	return;
});

$(".btn-batal").click(function(){
	location = base_url + "pekerjaan/detail/" + $("#id_pekerjaan").val();
});

$(function(){
	$('#formAddMarker').modal({
	    show: false
	});

	$('#formAddMarker').on('shown.bs.modal', function (e) {
	    google.maps.event.trigger(map,'resize',{});
	    map.setCenter(CurrentLatLng);
	});
});

$(document).on("click", ".btn-data-legalitas", function(){
	if (window.confirm("Apakah Anda yakin?"))
	{
		var id_lokasi	= $("#id_lokasi").val();
		var type		= $(this).attr("data-type");
		var id			= $(this).attr("data-id");
		
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/update_data_legalitas/",
			data		: {
				type		: type,
				id_lokasi 	: id_lokasi,
				id			: id
			},
			success		: function (data) {
				get_data_legalitas("tanah");
			},
		});
	}
});

$(document).on("click", ".btn-simpan", function() {
	var id_kertas_kerja = $('#id_kertas_kerja').val();
	if (window.confirm("Apakah Anda yakin?")) {
		$.ajax({
			type		: "POST",
			url 		: base_url + "Ajax/do_update_data_tmp?id_kertas_kerja="+id_kertas_kerja,
			dataType	: "JSON",
			beforeSend: function() {
				$(".btn-simpan").html("Silahkan tunggu...");
				$(".btn-simpan").prop("disabled", true);
			},
			data		: {
				type 				: "kertas_kerja",
				id_pekerjaan		: $("#id_pekerjaan").val()
			},
			success		: function (data) {
				generate_notification(data.result.trim(), data.message.trim(), "topCenter");
				$(".btn-simpan").html("SIMPAN");
				$(".btn-simpan").prop("disabled", false);
				
				if (data.result == "success")
				{
					location	= base_url + "pekerjaan/";
				}
			}
		});
	}
});

$(document).on("click", ".btn-upload-image", function() {
	var data_id_field  	= $(this).attr("data-id-field");
	var data_keterangan	= $(this).attr("data-keterangan");
	
	if (data_keterangan == "")
	{
		$("#file-" + data_id_field).click();
	}
	else
	{
		$(".file-" + data_id_field + "-" + data_keterangan).click();
	}
});

// For Upload file
$(function(){
	// Variable to store your files
	var files;

	// Add events
	$(document).on("change", '.tmp_file', function(event){
		var $input = $(this);
		var file = this.files[0];
        var img = new Image();
        var _URL = window.URL || window.webkitURL;
        if ((file = this.files[0])) {
	        img.onload = function () {
	        	// console.log (this.width, this.height);
				var data_name_field = $input.attr("data-name-field");
				var data_id_field  	= $input.attr("data-id-field");
				var data_keterangan = $input.attr("data-keterangan");
				prepareUpload(event, data_name_field, data_id_field, data_keterangan);

	        };
	        img.src = _URL.createObjectURL(file);
	    }

	});
	/*$('form').on('submit', uploadFiles);*/

	// Grab the files and set them to our variable
	function prepareUpload(event, data_name_field, data_id_field, data_keterangan)
	{
		files = event.target.files;
		uploadFiles(event, data_name_field, data_id_field, data_keterangan);
	}

	// Catch the form submit and upload the files
	function uploadFiles(event, data_name_field, data_id_field, data_keterangan)
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
            	// console.log (event, data_name_field, data_id_field, data_keterangan);
            	if (data != "")
            	{
            		if (data_keterangan == "")
            		{
						$("#textbox_" + data_name_field).val(data).updateTextbox();
						$("#img_" + data_name_field).attr("src",  base_url + "asset/file/" + data);
					}
					else
					{

						$(".textbox-" + data_id_field + "-" + data_keterangan).val(data).updateTextbox();
						$(".img-" + data_id_field + "-" + data_keterangan).attr("src", base_url + "asset/file/" + data);
					}
				}
            }
        });
    }
});

$(document).on('keydown change', '#textbox_tanah_24, #textbox_tanah_25, #textbox_tanah_26, #textbox_tanah_27, #textbox_tanah_28, #textbox_tanah_29', function(e){
	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         // Allow: Ctrl+A, Command+A
        (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
         // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {
             // let it happen, don't do anything
             return;
    }
    
    var textbox_tanah_24 = parseFloat($("#textbox_tanah_24").val()) || 0;
    var textbox_tanah_25 = parseFloat($("#textbox_tanah_25").val()) || 0;
    var textbox_tanah_26 = parseFloat($("#textbox_tanah_26").val()) || 0;
    var textbox_tanah_27 = parseFloat($("#textbox_tanah_27").val()) || 0;
    var textbox_tanah_28 = parseFloat($("#textbox_tanah_28").val()) || 0;
    var textbox_tanah_29 = parseFloat($("#textbox_tanah_29").val()) || 0;
    
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
    
    if ((textbox_tanah_24 + textbox_tanah_25  + textbox_tanah_26  + textbox_tanah_27  + textbox_tanah_28  + textbox_tanah_29) > 100)
    {
		alert("Total Penggunaan tanah saat ini harus 100%");
		$(this).val(0)	 .updateTextbox();
	}
});

$(document).on("change", "#table_data_legalitas_1 > tbody > tr > td > input", function() {
	calculate_total_luas_tanah_data_legalitas("#table_data_legalitas_1");
});

$(document).on("change", "#table_data_legalitas_2 > tbody > tr > td > input", function()
{
	calculate_total_luas_tanah_data_legalitas("#table_data_legalitas_2");
});

// Form Sarana Pelengkap
$('#textbox_sarana_2, #textbox_sarana_3, #textbox_sarana_5, #textbox_sarana_8, #textbox_sarana_9, #textbox_sarana_11, #textbox_sarana_14, #textbox_sarana_15, #textbox_sarana_17, #textbox_sarana_20, #textbox_sarana_21, #textbox_sarana_23, #textbox_sarana_26, #textbox_sarana_27, #textbox_sarana_29, #textbox_sarana_32, #textbox_sarana_33, #textbox_sarana_35, #textbox_sarana_40, #textbox_sarana_41, #textbox_sarana_43, #textbox_sarana_46, #textbox_sarana_47, #textbox_sarana_49, #textbox_sarana_52, #textbox_sarana_53, #textbox_sarana_55, #textbox_sarana_58, #textbox_sarana_59, #textbox_sarana_61, #textbox_sarana_64, #textbox_sarana_65, #textbox_sarana_67, #textbox_sarana_70, #textbox_sarana_71, #textbox_sarana_73').change(function(){
	update_sarana_pelengkap();
});

$(document).on("change", ".input_255_1, .input_256_1, .input_255_2, .input_256_2, .input_255_3, .input_256_3, .input_260_1, .input_260_2, .input_260_3, .input_277_1-0, .input_277_2-0, .input_277_3-0, .input_278_1-0, .input_278_2-0, .input_278_3-0, .input_279_1-0, .input_279_2-0, .input_279_3-0, .input_280_1-0, .input_280_2-0, .input_280_3-0, .input_281_1-0, .input_281_2-0, .input_281_3-0, .input_281_1-0, .input_281_2-0, .input_281_3-0, .input_282_1-0, .input_282_2-0, .input_282_3-0, .input_283_1-0, .input_283_2-0, .input_283_3-0, .input_284_1-0, .input_284_2-0, .input_284_3-0, .input_285_1-0, .input_285_2-0, .input_285_3-0, .input_286_1-0, .input_286_2-0, .input_286_3-0, .input_287_1-0, .input_287_2-0, .input_287_3-0, .input_288_1-0, .input_288_2-0, .input_288_3-0, .input_270_1, .input_270_2, .input_270_3, .input_272_1, .input_272_2, .input_272_3 ", function()
{
	calculate_tab_pembanding();
});

$(document).on("change", ".input_253_1, .input_253_2, .input_253_3, .input_259_1, .input_259_2, .input_259_3, .input_264_1, .input_264_2, .input_264_3, .input_265_0, .input_265_1, .input_265_2, .input_265_3, .input_266_0, .input_266_1, .input_266_2, .input_266_3, .input_267_0, .input_267_1, .input_267_2, .input_267_3, .input_269_0, .input_269_1, .input_269_2, .input_269_3, .input_258_1, .input_258_2, .input_258_3", function()
{
	style_after_ajax_pembanding();
});

$(document).on("change", "input[data-id-field=348]", function() {
	calculate_tab_pembanding_2();
});

$(document).on("click", '#btn_upload_multi', function(event){
	if (window.confirm("Apakah Anda yakin?"))
	{
		var multi_file	= "";
		var data 		= new FormData();
		jQuery.each(jQuery('#multi_image')[0].files, function(i, file) {
		    data.append('file-'+i, file);
		});
		
		if ($("#multi_urut").val() == "" || $("#multi_keterangan").val() == "" || !data)
		{
			generate_notification("error", "File, No. Urut dan Keterangan tidak boleh kosong.", "topCenter");
		}
		else
		{
			$.ajax({
	            url: base_url + "Ajax/do_upload_multi/?files",
	            type: 'POST',
	            data: data,
	            cache: false,
	            processData: false,
	            contentType: false,
	            success: function(data)
	            {
	            	$.ajax({
						type		: "POST",
						url 		: base_url + "Ajax/do_upload_multi_table/",
						data		: {
							id_lokasi 			: $("#id_lokasi").val(),
							multi_file 			: data,
							multi_urut 			: $("#multi_urut").val(),
							multi_keterangan 	: $("#multi_keterangan").val()
						},
						success		: function (data) {
							var $imgCol = $(data);
							$imgCol.find('img').attr('class', 'img-responsive').removeAttr('style');
							$imgCol.find('.col-lg-6').attr('class', 'col-sm-6')
							$("#image_lampiran").append($imgCol);
							$("#multi_image").val("");
							$("#multi_urut").val("");
							$("#multi_keterangan").val("");
						}
					});


					var dataLampiran = {
						"id_lokasi" : $("#id_lokasi").val(),
						"jenis_lampiran" : "Foto Properti",
						"lampiran" : data,
						"no_urut" : $("#multi_urut").val(),
						"keterangan" : $("#multi_keterangan").val()
					};

					$.post(base_url+"new/pekerjaan/ajax_update_lampiran", dataLampiran).done(function() {
					});
	            }
	        });
	    }
	}
});

$(document).on("change", "#textbox_tanah_61,#textbox_tanah_62", function(event){
	var luasTanahDinilai = total_luas_tanah-(parseFloat($("#textbox_tanah_62").val())||0)
	$("#luas-tanah-dinilai").val(luasTanahDinilai);
});

$(document).on("change", '#textbox_entry_1,#textbox_entry_5', function(){
    var no_mappi = $(this).find(":selected").attr("data-nomappi");
    var alsochange = $(this).attr("data-alsochange");
    var $targetToChange = $(alsochange);
    $targetToChange.val(no_mappi).updateTextbox(true);
});
