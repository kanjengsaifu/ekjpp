var YES = Y = true;
var NO =  N = DONT = NO_SET = false;
var firstLoad = YES;
var data_bangunan = new Array();
data_bangunan["brb_bangunan"] = 0;
data_bangunan["kondisi_fisik_bangunan"] = 0;
data_bangunan["indikasi_nilai_pasar_m"] = 0;
data_bangunan["indikasi_nilai_pasar"] = 0;

var luas_bangunan = 0;
var total_luas_tanah = 0;
var tab_loaded = [];
var role = "entry";
var role_role = "";
var isThereAjaxProccess = NO;
var ajaxTableInput = [];
var current_id_field = true;
var saranaPelengkapProcess = NO;
var totalOnChange = 0;
var isFirstTimeKertasKerja = YES;
var isAjaxTableInput=false;
var list_id_field=[];

var input_255_1;
	var input_261_0;
	var input_256_1;
	var input_260_1;
	var input_261_1;
	var input_270_1;
	var input_272_1;
	var input_257_1;
	var input_273_1;
	var input_271_1;
	var input_274_1;
	var input_276_1;
	var input_255_2;
	var input_256_2;
	var input_260_2;
	var input_261_2;
	var input_270_2;
	var input_272_2;
	var input_257_2;
	var input_273_2;
	var input_271_2;
	var input_274_2;
	var input_276_2;
	var input_255_3;
	var input_256_3;
	var input_260_3;
	var input_261_3;
	var input_270_3;
	var input_272_3;
	var input_257_3;
	var input_273_3;
	var input_271_3;
	var input_274_3;
	var input_276_3;
	var input_277_1_0;
	var input_277_2_0;
	var input_277_3_0;
	var input_277_1_2;
	var input_277_2_2;
	var input_277_3_2;
	var input_277_1_3;
	var input_277_2_3;
	var input_277_3_3;
	var input_278_1_0;
	var input_278_2_0;
	var input_278_3_0;
	var input_278_1_2;
	var input_278_2_2;
	var input_278_3_2;
	var input_278_1_3;
	var input_278_2_3;
	var input_278_3_3;
	var input_279_1_0;
	var input_279_2_0;
	var input_279_3_0;
	var input_279_1_2;
	var input_279_2_2;
	var input_279_3_2;
	var input_279_1_3;
	var input_279_2_3;
	var input_279_3_3;
	var input_280_1_0;
	var input_280_2_0;
	var input_280_3_0;
	var input_280_1_2;
	var input_280_2_2;
	var input_280_3_2;
	var input_280_1_3;
	var input_280_2_3;
	var input_280_3_3;
	var input_281_1_0;
	var input_281_2_0;
	var input_281_3_0;
	var input_281_1_2;
	var input_281_2_2;
	var input_281_3_2;
	var input_281_1_3;
	var input_281_2_3;
	var input_281_3_3;
	var input_283_1_0;
	var input_283_2_0;
	var input_283_3_0;
	var input_283_1_1;
	var input_283_2_1;
	var input_283_3_1;
	var input_283_1_2;
	var input_283_2_2;
	var input_283_3_2;
	var input_284_1_0;
	var input_284_2_0;
	var input_284_3_0;
	var input_284_1_1;
	var input_284_2_1;
	var input_284_3_1;
	var input_284_1_2;
	var input_284_2_2;
	var input_284_3_2;
	var input_285_1_0;
	var input_285_2_0;
	var input_285_3_0;
	var input_285_1_2;
	var input_285_2_2;
	var input_285_3_2;
	var input_285_1_3;
	var input_285_2_3;
	var input_285_3_3;
	var input_286_1_0;
	var input_286_2_0;
	var input_286_3_0;
	var input_286_1_2;
	var input_286_2_2;
	var input_286_3_2;
	var input_286_1_3;
	var input_286_2_3;
	var input_286_3_3;
	var input_287_1_0;
	var input_287_2_0;
	var input_287_3_0;
	var input_287_1_2;
	var input_287_2_2;
	var input_287_3_2;
	var input_287_1_3;
	var input_287_2_3;
	var input_287_3_3;
	var input_288_1_0;
	var input_288_2_0;
	var input_288_3_0;
	var input_288_1_1;
	var input_288_2_1;
	var input_288_3_1;
	var input_288_1_2;
	var input_288_2_2;
	var input_288_3_2;

Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};

function ajaxTableInputFinish($input) {
	var index = ajaxTableInput.indexOf($input);
	ajaxTableInput.splice(index,1);
	current_id_field = false;
	isAjaxTableInput = false;
	var idField = $input.attr("class");
	list_id_field.remove(idField);
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
	var id_tanah = $input.attr('data-id-tanah');
	var id_bangunan = $input;

	if ($input.attr("data-keterangan"))
	{
		var keterangan	= $input.attr("data-keterangan");
	}
	else
	{
		var keterangan	= "";
	}

	if (type == "checkbox")
	{
		var id	= $input.attr("id");
		
		if ($("#" + id).is(":checked")){
			value = 1;
		}else{
			value = 0
		}
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
					keterangan : keterangan,
					id_tanah : id_tanah
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
					ajaxTableInputFinish($input);
	            }
			});
		}
	}

	if ($input.is("#latitude_pembanding_0, #latitude_pembanding_1,#latitude_pembanding_2,#latitude_pembanding_3,#longitude_pembanding_0,#longitude_pembanding_1,#longitude_pembanding_2,#longitude_pembanding_3")){
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/update_lokasi_pembanding/",
			data		: {
				id_lokasi 	: id_lokasi,
				value		: value,
				keterangan	: keterangan
			},
			success		: function (data) {
				// if ($input.attr("data-keterangan")){
				// 	calculate_total_luas_tanah_data_legalitas();
				// }
			},
		});
	}

	if (id_field == "10")
	{
		$("#textbox_tanah_1").val(value)	.updateTextbox();
	}
	else if (id_field == "14")
	{
		$("#textbox_tanah_2").val(value)	.updateTextbox();
	}
	else if (id_field == "16")
	{
		$("#textbox_tanah_3").val(value)	.updateTextbox();
	}
	else if (id_field == "9")
	{
		$(".tanah-td-tanggal-inspeksi").html(value)	.updateTextbox();
	}
	else if (id_field == "11")
	{
		$(".tanah-td-yang-dijumpai").html(value);
	}
	else if (id_field == "13")
	{
		$(".tanah-td-jabatan").html(value);
	}
	else if (id_field == "131")
	{
		if (value == "Lainnya")
		{
			$("#textbox_tanah_73").show();
			$("#textbox_tanah_73").css("border", "1px solid #999");
			
			$("#textbox_tanah_73").focus();
		}
		else
		{
			$("#textbox_tanah_73").hide();
			$("#textbox_tanah_73").css("border", "0px");
		}
	}
	else if (id_field == "132")
	{
		if (value == "Lainnya")
		{
			$("#textbox_tanah_74").show();
			$("#textbox_tanah_74").css("border", "1px solid #999");
			$("#textbox_tanah_74").focus();
		}
		else
		{
			$("#textbox_tanah_74").hide();
			$("#textbox_tanah_74").css("border", "0px");
		}
	}
	else if (id_field == "635")
	{
		$(".tipe_bangunan").html(value);
	}
	else if (id_field == "650" || id_field == "651" || id_field == "652" || id_field == "653")
	{
		var role	= $input.attr("data-keterangan");
		// hitung_bct_bangunan(role);
	}
	else if (id_field == "656")
	{
		var role	= $input.attr("data-keterangan");
		
		if ($(".input_657_" + role).val() == "" || $(".input_657_" + role).val() == 0)
		{
			$(".input_657_" + role).val(value).updateTextbox();
			hitung_bct_bangunan(role);
		}	
	}
	else if (id_field == 897 || id_field == 898 || id_field == 899 || id_field == 900)
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/get_alamat/",
			data		: {
				id_lokasi		: $("#id_lokasi").val(),
				dh_provinsi		: $("#textbox_entry_33").val(),
				dh_kota			: $("#textbox_entry_34").val(),
				dh_kecamatan	: $("#textbox_entry_35").val(),
				dh_desa			: $("#textbox_entry_36").val()
			},
			success		: function (data) {
				$("#textbox_entry_18").val(data)	.updateTextbox();
			}
		});
	}
	else if ( id_field == 912 || id_field == 913 )
	{
		var role	= $input.attr("data-keterangan");
		getBiayaLangsung(role);
		
	}

	var role	= $input.attr("data-keterangan");

	if (keterangan != "")
	{
		keterangan	= keterangan.split(" ");

		if (keterangan.length == 2)
		{
			hitung_luas_fisik_bangunan(keterangan[1],$input);
		}
	}
}

function excecuteTableInput(){
	var $input;

	if ( ajaxTableInput.length === 0 )
	{
		return;
	}
	$input = ajaxTableInput[0];

	ajaxTableInputSend($input);
}

jQuery.fn.extend({
	updateTextbox: function(doUpdate = true) {
		return this.each(function() {
			var $input = $(this);
			if (doUpdate) {
				var isInputExist = ajaxTableInput.indexOf($input);
				var idField = $input.attr("class")
				if (list_id_field.indexOf(idField) === -1)
				{
					list_id_field.push(idField);
					ajaxTableInput.push($input);
				}
			}
		});
		// return this;
	},
	AdjustmentMinus: function() {
		this.each(function() {
			var $input = $(this);
			var $table = $input.closest("table");
			var $firstInput = $table.find(".form-control").first();
			var firstInputVal = parseFloat($firstInput.val()) || 0;

			if (firstInputVal<0) {
				$input.css({"color": "red"});
			}
			else
			{
				$input.css({"color": ""});
			}
		});

		return this;
	}
});

var sidebarClicked=0;

function setSidebarClick() {
	if (sidebarClicked === 1)
	{
		var dWidth = $(document).width();
		
		if (dWidth>768) {
			$('.sidebar-toggle').click();
		}
	}
	else if (sidebarClicked>1)
	{
		return;
	}

	sidebarClicked++;
}

(function pump(){
	excecuteTableInput();
	setTimeout(pump, 50);
})();

$(".btn-batal").click(function(){
	location = base_url + "pekerjaan/detail/" + $("#id_pekerjaan").val();
});

$(document).ready(function(){
	$('.sidebar-toggle').click();
	total_luas_tanah = !txn_tanah ? 0 : txn_tanah.luas;

	var doUpdatePrefilled = false;
	if ( ! txn_kertas_kerja.nama_penilai )
	{
		isFirstTimeKertasKerja = false;
		doUpdatePrefilled = true;
	}

	$(".btn-tambah-bangunan").hide();

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
		//
	}
	else if (role === 'splengkap')
	{
		update_sarana_pelengkap(YES);
	}

	var data_type = $('.panel-head.panel-'+role).attr("data-type")
	if (data_type == "bangunan")
	{
		load_tab_bangunan(role)
		$(".btn-tambah-bangunan").show();
	} else {
		$(".btn-tambah-bangunan").hide();
	}

	$("#textbox_tanah_65,#textbox_tanah_66,#textbox_pembanding_47,#textbox_pembanding_48,#textbox_tanah_61,#textbox_tanah_72,#textbox_tanah_70,#textbox_tanah_71").addClass("text-right");
 
	$("#textbox_pembanding_9,#textbox_pembanding_11,#textbox_pembanding_30").each(function(){
		$(this).closest("tr")
			.find("td").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
			.find("span").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
			.find(".form-control").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
		;
	});

	//Pre-filled
	$("#textbox_entry_2, #textbox_entry_3, #textbox_entry_5, #textbox_entry_18, #textbox_entry_21, #textbox_entry_23, #textbox_entry_25, #textbox_entry_27").attr("readonly", true).addClass("readonly").updateTextbox(doUpdatePrefilled);

	$("#textbox_tanah_1,#textbox_tanah_2,#textbox_tanah_3,#textbox_tanah_65,#textbox_tanah_66,#textbox_pembanding_47,#textbox_pembanding_48,#textbox_tanah_61,#textbox_tanah_72,#textbox_tanah_70,#textbox_tanah_71").attr("readonly", true).addClass("readonly");

	$(".input_249_0, .input_251_0, .input_252_0, .input_253_0, #latitude_pembanding_0, #longitude_pembanding_0").updateTextbox(doUpdatePrefilled);
	
	$('#no_mappi_penilai, #no_mappi_surveyor').updateTextbox(doUpdatePrefilled);

	if ($("#textbox_tanah_30").val() == "Lainnya")
	{
		$("#textbox_tanah_73").show();
		$("#textbox_tanah_73").css("border", "1px solid #999");
	}
	else
	{
		$("#textbox_tanah_73").hide();
	}
	
	if ($("#textbox_tanah_31").val() == "Lainnya")
	{
		$("#textbox_tanah_74").show();
		$("#textbox_tanah_74").css("border", "1px solid #999");
	}
	else
	{
		$("#textbox_tanah_74").hide();
	}

	$(".tanah-td-yang-dijumpai").html($("#textbox_entry_11").val());
	$(".tanah-td-jabatan").html($("#textbox_entry_13").val());
	
	$("#textbox_tanah_65, #textbox_tanah_66").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
	
	$(".btn-tambah-bangunan").hide();
	
	$('#formAddMarker').modal({
	    show: false
	});

	$('#formAddMarker').on('shown.bs.modal', function (e) {
	    google.maps.event.trigger(map,'resize',{});
	    map.setCenter(CurrentLatLng);
	});
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

function initForm(id_lokasi){
	$.ajax({
		url: base_url + "AjaxPekerjaan/get_info_bangunan/",
		type:'POST',
		success: function(data) {
			$('#textbox_bangunan_131').html(data);
			var tipe = $('#hdn_tipe_bangunan').val();
			$('#textbox_bangunan_131').val(tipe);
			$('#textbox_bangunan_131')	.updateTextbox();
		}
	});
	
	$.ajax({
		url: base_url + "AjaxPekerjaan/get_klasifikasi_bangunan/",
		type:'POST',
		success: function(data) {
			$('#textbox_bangunan_137').html(data);
		}
	});
}

function getKelasBangunan(role, $input){
	var id = $("#" + role).find("select#textbox_bangunan_137").val();

	if (!$input)
	{
		$input=$("");
	}

	if ($input.is("#textbox_bangunan_138"))
	{
		return;
	}

	if (id != "")
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/get_kelas_bangunan/",
			data		: {
				id 	: id
			},
			success		: function (data) {
				$("#" + role).find("select#textbox_bangunan_138").html(data);
				var val = $("#" + role).find("#hdnKelasBangunan").val();
				$("#" + role).find("select#textbox_bangunan_138").val(val);
			},
		});
	}
}

function getKoefisien(role){
	var jml = $("#" + role).find("select#textbox_bangunan_132").val();
	var tipe = $("#" + role).find("select#textbox_bangunan_131").val();
	if (jml != "" && tipe !="")
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/get_koefisien_lantai/",
			data		: {
				tipe 	: tipe,
				jml 	: jml,
			},
			success		: function (data) {
				$("#" + role).find("#hdnKoefisien").val(data);
			},
		});
	}
}

$(document).on("change", '#textbox_entry_1,#textbox_entry_5', function(){
    var no_mappi = $(this).find(":selected").attr("data-nomappi");
    var alsochange = $(this).attr("data-alsochange");
    var $targetToChange = $(alsochange);
    $targetToChange.val(no_mappi).updateTextbox(true);
});

$(document).on("change", "#textbox_bangunan_137", function(){
    var role = $(this).attr("data-keterangan");
	getKelasBangunan(role);
});

$(document).on("change", "#textbox_bangunan_136, #textbox_bangunan_137, #textbox_bangunan_138, #textbox_bangunan_139, #textbox_bangunan_140,#textbox_bangunan_153,#textbox_bangunan_154,#textbox_bangunan_155,#textbox_bangunan_160,#textbox_bangunan_163,#textbox_bangunan_164,#textbox_bangunan_166,#textbox_bangunan_167, .langsung_element, #jenis_renovasi, .biaya_input, #kelas_bangunan", function(){
    var role = $(this).attr("data-keterangan");
	kalkulasiBiaya(role);
});

function kalkulasiBiaya(role) {
	var tab_role	= role.split("_");
	if (tab_role.length > 2) {
		role = tab_role[0] +"_"+ tab_role[1];
	}

	var umur_efektif = 0;
	var tahun_penilaian = parseFloat($("#" + role).find("#textbox_bangunan_133").val()) || 0; 
	var tahun_bangun =   parseFloat($("#" + role).find("#textbox_bangunan_134").val()) || 0; 
	var tahun_renovasi = parseFloat($("#" + role).find("#textbox_bangunan_136").val()) || 0;
	var jumlah_lantai = parseFloat($("#" + role).find("select#textbox_bangunan_132").val()) || 0;
	
	getKoefisien(role);

	var koefisien = $("#" + role).find("#hdnKoefisien").val();
	
	$("#jumlah_lantai_dinilai").html(jumlah_lantai);
	var jml_standard = $("#" + role).find("#jumlah_lantai_standard").val();
	
	umur_efektif = tahun_penilaian - tahun_bangun;
	
	if ($("#" + role).find("select#textbox_bangunan_135").val()=='Renovasi Sebagian'){
		umur_efektif = (tahun_penilaian - tahun_bangun)-((tahun_renovasi-tahun_bangun)/2);
	}
	if ($("#" + role).find("select#textbox_bangunan_135").val()=='Renovasi Total'){
		umur_efektif = tahun_penilaian - tahun_renovasi;
	}
	$("#" + role).find("#textbox_bangunan_140").val(umur_efektif).attr("readonly", true).addClass("readonly");
	
	var kelas_bangunan = $("#" + role).find("select#textbox_bangunan_138").val();
	if (kelas_bangunan==null){
		kelas_bangunan = 0;
	}
	var umur_ekonomis = kelas_bangunan;
	$("#" + role).find("#textbox_bangunan_139").val(umur_ekonomis).attr("readonly", true).addClass("readonly");
	$("#" + role).find("#textbox_bangunan_2072").val(umur_ekonomis).attr("readonly", true).addClass("readonly");
	
	var total_biaya2 = 0;
	var total_biaya1 = 0;
	var plafond=dinding=pintu_jendela=lantai=0;

	$(".table_biaya_langsung_" + tab_role[1] + " tr ").find("input[id=textbox_bangunan_157]").each(function(index) {
		var $row = $(this).closest("tr");
		var terpasang2 = $row.find("#textbox_bangunan_163").val();
		var material2 = $row.find("#textbox_bangunan_160").val();
		
		var harga2 = $row.find("#textbox_bangunan_164").val();
		var terpasang1 = 100;
		var harga1 = $row.find("#a_harga_1").val();

		$row.find("#textbox_bangunan_158").addClass("text-right").number( true, 1 );
		
		if (isNaN(harga1)){
			harga1 = 0;
		}

		if (jml_standard != jumlah_lantai && (index==0 || index==1)) {
			$row.find("#textbox_bangunan_162").attr("value", "penyesuaian index lantai").addClass("readonly");
		}
		
		if (terpasang2 !='') {
			terpasang1 = 100 - terpasang2;
			$row.find("#textbox_bangunan_159").val(terpasang1);
		}

		if(material2 ==''){
			material2 = 1.00;
		}

		$row.find("#textbox_bangunan_161").val(material2); 
		var imm = $row.find("#textbox_bangunan_161").val();
		var hargaPenyesuaian = 0;

		if (index==0 || index==1){
			var textbox_bangunan_162 = $row.find("#textbox_bangunan_162").val();
			if (textbox_bangunan_162=="penyesuaian index lantai") {
				hargaPenyesuaian = parseFloat(koefisien)*parseFloat(harga1);
			}
			else
			{

			}
		}
		else
		{
			if (index === 2) {
			}

		    hargaPenyesuaian = (parseFloat(harga1) * (parseFloat(imm) + 0) * parseFloat(terpasang1)) + (parseFloat(harga2) * parseFloat(terpasang2));


			hargaPenyesuaian = parseFloat(hargaPenyesuaian) / 100;
		}

		if (index==4) {
			plafond=harga1;
		}
		else if (index==5) {
			dinding=harga1;
		}
		else if (index==6) {
			pintu_jendela=harga1;
		}
		else if (index==7) {
			lantai=harga1;
		}

		$row.find("#textbox_bangunan_163").addClass("text-right").number( true, 1 );
		$row.find("#textbox_bangunan_164").addClass("text-right").number( true, 0 );
		

		//OFF
		$row.find("#textbox_bangunan_165").val(hargaPenyesuaian).attr("value", hargaPenyesuaian).number(true,0);

		if (isNaN(hargaPenyesuaian)){
			hargaPenyesuaian = 0;
		}
		total_biaya2 = parseFloat(total_biaya2) + parseFloat(hargaPenyesuaian);
	});

	var luas_mizzanen = $(".gudang_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_127]").val();
	var mizzanen = $(".table_biaya_langsung_" + tab_role[1] + " th ").find("select[id=textbox_bangunan_166]").val();
	if (mizzanen ==''){
		mizzanen = 0;
	}
	$(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_168]").attr("value", mizzanen).val(mizzanen);
	$(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_168]").number(true,0);
	
	mizzanen = $(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_168]").val();
	if (mizzanen ==''){
		mizzanen = 0;
	}
	var luas_bangunan = parseFloat($("#" + role).find("#textbox_bangunan_5").val()) || 0;
	
	if (luas_mizzanen ==''){
		luas_mizzanen = 0;
	}
	var total_mizzanen=0;
	if (luas_mizzanen > 0){
		total_mizzanen = parseFloat(mizzanen) * parseFloat(luas_mizzanen) /  parseFloat(luas_bangunan);
		
		$(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_169]").val(total_mizzanen);
		$(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_169]").number(true,0);
		
		total_biaya2 = parseFloat(total_biaya2) + parseFloat(total_mizzanen);
	}

	var textbox_bangunan_167 = $(".table_biaya_langsung_" + tab_role[1] + " th ").find("#textbox_bangunan_167").val();
	var textbox_bangunan_170 = 0;
	var luas_bangunan_lainya = $(".gudang_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_128]").val();
	luas_bangunan_lainya = parseFloat(luas_bangunan_lainya);

	var bangunan_lainya_lantai1 = parseFloat(plafond)+parseFloat(dinding)+parseFloat(pintu_jendela)+parseFloat(lantai);
	if(textbox_bangunan_167=="1 - Lantai") {
		textbox_bangunan_170 = bangunan_lainya_lantai1;
	}
	else if(textbox_bangunan_167=="2 - Lantai")
	{
		textbox_bangunan_170 = bangunan_lainya_lantai1*1.09;
	}
	textbox_bangunan_170=Math.round(textbox_bangunan_170);
	var textbox_bangunan_171=parseFloat((textbox_bangunan_170*luas_bangunan_lainya)/(luas_bangunan)) || 0;
	
	total_biaya2 = parseFloat(total_biaya2) + parseFloat(textbox_bangunan_171);

	$(".table_biaya_langsung_" + tab_role[1] + " th ").find("#textbox_bangunan_170").val(textbox_bangunan_170).number(true,0);
	$(".table_biaya_langsung_" + tab_role[1] + " th ").find("#textbox_bangunan_171").val(textbox_bangunan_171).number(true,0);

	$(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_174]").val(total_biaya2) .number(true,0);
	
	var jml = $('#biaya_jumlah').val();
	var total = 0;
	var a_total_1 = 0;	
	var a_total_2 = 0;
	
	total_biaya1 = $(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_175]").val();
	
	a_total_1 = total_biaya1;
	
	var fee1 = 0;
	fee1 = (parseFloat(total_biaya1) * 0.03) + (parseFloat(total_biaya1) * 0.015) + (parseFloat(total_biaya1) * 0.1);
	
	$("#" + role).find("#textbox_bangunan_141").val(fee1).attr("value", fee1);
	$("#" + role).find("#textbox_bangunan_141").addClass("readonly").addClass("text-right").number( true, 0 );
	
	var b_total_1 =  $("#" + role).find("#textbox_bangunan_141").val();
	$("#" + role).find("#textbox_bangunan_142").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("#textbox_bangunan_142").val(b_total_1);
	
	var total_1 = parseFloat(b_total_1) + parseFloat(a_total_1);
	$("#" + role).find("#textbox_bangunan_143").addClass("readonly").addClass("text-right").number( true, 0 );
	var textbox_bangunan_143 = parseFloat($("#" + role).find("#textbox_bangunan_141").val()) + parseFloat(total_biaya1);
	$("#" + role).find("#textbox_bangunan_143").val(textbox_bangunan_143);
	
	var ppn_1 = parseFloat(total_1) /10;
	$("#" + role).find("#textbox_bangunan_144").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("#textbox_bangunan_144").val(ppn_1);
	var grand_1 = parseFloat(total_1) + parseFloat(ppn_1);
	grand_1 = Math.round(grand_1/10000)*10000;

	$("#" + role).find("#textbox_bangunan_145").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("#textbox_bangunan_145").val(grand_1);
	
	a_total_2 = total_biaya2;
	
	var fee2 = 0;
	fee2 = (parseFloat(total_biaya2) * 0.03) + (parseFloat(total_biaya2) * 0.015) + (parseFloat(total_biaya2) * 0.1);

	$("#" + role).find("#textbox_bangunan_146").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("#textbox_bangunan_146").val(fee2);
	var b_total_2 = $("#" + role).find("#textbox_bangunan_146").val();
	$("#" + role).find("#textbox_bangunan_147").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("#textbox_bangunan_147").val(b_total_2);
	var total_2 = parseFloat(b_total_2) + parseFloat(a_total_2);
	$("#" + role).find("#textbox_bangunan_148").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("#textbox_bangunan_148").val(total_2);
	
	var ppn_2 = parseFloat(total_2) / 10;
	$("#" + role).find("#textbox_bangunan_149").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("#textbox_bangunan_149").val(ppn_2);
	
	var grand_2 = parseFloat(total_2) + parseFloat(ppn_2);

	grand_2 = Math.round(grand_2/10000)*10000;

	$("#" + role).find("#textbox_bangunan_150").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("#textbox_bangunan_150").val(grand_2);
	
	var selisih = grand_2 - grand_1;
	$("#" + role).find("#textbox_bangunan_151").addClass("readonly").addClass("text-right").number( true, 0 ).css({"background-color": "red", "font-weight": "bold", "color": "white"});
	$("#" + role).find("#textbox_bangunan_151").val(selisih);
	
	var penyusutan_fisik = umur_efektif / umur_ekonomis * 100 ;
	if (isNaN(penyusutan_fisik) || penyusutan_fisik==Number.NEGATIVE_INFINITY ){
		penyusutan_fisik=0;
	}

	$("#" + role).find("#textbox_bangunan_152").val(penyusutan_fisik.toFixed(1)).addClass("readonly").attr("readonly","readonly").updateTextbox();
	
	$("#" + role).find("#textbox_bangunan_153").addClass("text-right").attr('maxlength',3);
	var penyusutan_terlihat = parseFloat($("#" + role).find("#textbox_bangunan_153").val()) || 0;
	if (isNaN(penyusutan_terlihat)) {
		penyusutan_terlihat=0;
	}
	$("#" + role).find("#textbox_bangunan_154").addClass("text-right").attr('maxlength',3);
	var penyusutan_fungsional = parseFloat($("#" + role).find("#textbox_bangunan_154").val()) || 0;
		
	if (isNaN(penyusutan_fungsional)){
		penyusutan_fungsional=0; 
	}
	$("#" + role).find("#textbox_bangunan_155").addClass("text-right").attr('maxlength',3);
	var penyusutan_ekonomis = parseFloat($("#" + role).find("#textbox_bangunan_155").val()) || 0;
	if (isNaN(penyusutan_ekonomis)){
		penyusutan_ekonomis=0;
	}

	var C93=parseFloat(penyusutan_fisik);
	var K93=parseFloat(penyusutan_terlihat);
	var Q93=penyusutan_fungsional;
	var X93=penyusutan_ekonomis;
	var AE93=((C93/100)+(K93/100))+((1-(C93/100))*(Q93/100))+((1-(C93/100))*(X93/100));
	AE93 = (AE93*100).toFixed(1);

	var penyusutan_total = AE93;
	$("#" + role).find("#textbox_bangunan_156").addClass("readonly").addClass("text-right").val(penyusutan_total) .updateTextbox();

	var kondisi_bangunan_persen = 0;
	kondisi_bangunan_persen = 100 - penyusutan_total;
	kondisi_bangunan_persen  = parseFloat(kondisi_bangunan_persen).toFixed(0);
	$("#kondisi_bangunan_persen").text(kondisi_bangunan_persen +'%');
	var kondisi_bangunan = 'Kurang';
	if (kondisi_bangunan_persen > 55){
		kondisi_bangunan = 'Cukup';
	}
	if (kondisi_bangunan_persen > 69){
		kondisi_bangunan = 'Baik';
	}
	if (kondisi_bangunan_persen > 89){
		kondisi_bangunan = 'Sangat Baik';
	}

	data_bangunan["kondisi_fisik_bangunan"] = kondisi_bangunan_persen;
	
	$("#kondisi_bangunan").text(kondisi_bangunan);
	
	var brb_m2 = 0;
	brb_m2 = parseFloat(grand_2);

	brb_m2 = Math.round(brb_m2/10000)*10000;

	$("#" + role).find("#textbox_bangunan_176").attr("readonly", "readonly").addClass("readonly").addClass("text-right").number( true, 0 ).val(brb_m2) .updateTextbox();
	data_bangunan["brb_bangunan"] = brb_m2;

	var brb = 0;
	var luas_total = parseFloat($("#textbox_bangunan_130").val()) || 0
	var brb_m2_float = parseFloat(brb_m2) || 0;

	brb = luas_total * brb_m2_float;

	$("#brb").attr("readonly", "readonly").val(addCommas(brb));
	
	var nilai_pasar_m2 = 0;
	nilai_pasar_m2 =  parseFloat(brb_m2) * (parseFloat(1-penyusutan_total/100));
	nilai_pasar_m2  = parseFloat(nilai_pasar_m2).toFixed(0);

	$("#nilai_pasar_m2").attr("readonly", "readonly").val(addCommas(nilai_pasar_m2));
	data_bangunan['indikasi_nilai_pasar_m'] = nilai_pasar_m2;
	
	var nilai_pasar 	= 0;
	nilai_pasar 		= parseFloat(brb) * (parseFloat(1-penyusutan_total/100));
	nilai_pasar  		= parseFloat(nilai_pasar).toFixed(0);

	data_bangunan['indikasi_nilai_pasar'] = nilai_pasar;

	var nilai_pasar_luquidasi	= nilai_pasar - (nilai_pasar * 30 / 100);

	$("#nilai_pasar").attr("readonly", "readonly").val(addCommas(nilai_pasar));

	if (IS_BANGUNAN)
	{
		$("#" + role).find("#textbox_bangunan_55").val(nilai_pasar).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly").updateTextbox();
		$("#" + role).find("#textbox_bangunan_56").val(nilai_pasar_luquidasi).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly").updateTextbox();
	}
}

function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

function getBiayaLangsung(role){
    var tab_role	= role.split("_");
    var id_kertas_kerja = $('#id_kertas_kerja').val();
	var id = $("#" + role).find("select#textbox_bangunan_131").val();
    var kode_tipe_bangunan = $("#" + role).find("select#textbox_bangunan_131").find(":selected").attr("data-kode_tipe_bangunan");

  	if (id != "") {
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/get_biaya_langsung?id_kertas_kerja="+id_kertas_kerja,
			data		: {
				id 	: id,
				role : role,
				id_lokasi 	: $("#id_lokasi").val(),
				kode_tipe_bangunan: kode_tipe_bangunan
			},
			success		: function (data) {
				$("#" + role).find("#div_biaya_langsung").html(data); //$('#div_biaya_langsung').html(data);
				var obj = $("#" + role).find("select#textbox_bangunan_131");
				var jmlLantai = $('option:selected', obj).attr('lantai'); 
				$("#" + role).find("#jumlah_lantai_standard").html(jmlLantai);	
				kalkulasiBiaya(role);
			},
		});
	}
}

$(document).ajaxStop(function() {
	firstLoad= false;
})

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

$(document).on("click", ".btn-data-legalitas", function()
{
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
})

$(document).on("click", ".btn-tambah-pembanding", function()
{
	if (window.confirm("Apakah Anda yakin?"))
	{
		var id_lokasi	= $("#id_lokasi").val();
		var type		= $(this).attr("data-type");
		var id			= $(this).attr("data-id");
		
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/update_jumlah_pembanding/",
			data		: {
				type		: type,
				id_lokasi 	: id_lokasi,
				id			: id
			},
			success		: function (data) {
				get_pembanding();
			},
		});
	}
});

$(document).on("click", ".btn-simpan", function()
{
	var id_kertas_kerja = $('#id_kertas_kerja').val();
	if (window.confirm("Apakah Anda yakin?"))
	{
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
$(document).on("click", ".btn-upload-image", function()
{
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
$(function()
{
	var files;
	$(document).on("change", '.tmp_file', function(event){
		var $input = $(this);
		var file = this.files[0];
        var img = new Image();
        var _URL = window.URL || window.webkitURL;
        if ((file = this.files[0])) {
	        img.onload = function () {
				var data_name_field = $input.attr("data-name-field");
				var data_id_field  	= $input.attr("data-id-field");
				var data_keterangan = $input.attr("data-keterangan");
				prepareUpload(event, data_name_field, data_id_field, data_keterangan);
	        };
	        img.src = _URL.createObjectURL(file);
	    }
	});
	$(document).on("click", '#btn_upload_multi', function(event)
	{
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
	$(document).on("click", '.btn-delete-image-multi', function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id_field_multi	= $(this).attr("data-id");
			var multifile		= $(this).attr("data-file");
			var elt	= $('#image_lampiran').find('.list_' + multifile);
			
			$.ajax({
				type		: "POST",
				url 		: base_url + "ajax/delete_data/multi_image",
				dataType	: "JSON",
				data		: {
					id 	: id_field_multi
				},
				success		: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					if (data.result.trim() == "success"){
						elt.remove();
					}
				},
			});
		}
	});
	function prepareUpload(event, data_name_field, data_id_field, data_keterangan)
	{
		files = event.target.files;
		uploadFiles(event, data_name_field, data_id_field, data_keterangan);
	}
	function uploadFiles(event, data_name_field, data_id_field, data_keterangan)
	{
		event.stopPropagation();
        event.preventDefault();
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
            processData: false,
            contentType: false,
            success: function(data)
            {
            	if (data != "")
            	{
            		if (data_keterangan == "")
            		{
						$("#textbox_" + data_name_field).val(data).updateTextbox();
						$("#img_" + data_name_field)
							.attr("src",  base_url + "asset/file/" + data)
							.attr("class",  "img-responsive")
						;
					}
					else
					{
						$(".textbox-" + data_id_field + "-" + data_keterangan).val(data).updateTextbox();
						$(".img-" + data_id_field + "-" + data_keterangan)
							.attr("src", base_url + "asset/file/" + data)
							.attr("class",  "img-responsive")
						;
					}
				}
            }
        });
    }
})

function get_data_legalitas(target)
{
	var terget_tab	= "";
	if (target == "tanah")
	{
		var terget_tab			= "#table_data_legalitas_1";
		var terget_tab_tbody	= "#tbody_data_legalitas_1";
		var target_url			= base_url + "AjaxPekerjaan/get_data_legalitas/";
		
	}
	else if (target == "dbanding")
	{
		var terget_tab			= "#table_data_legalitas_2";
		var terget_tab_tbody	= "#tbody_data_legalitas_2";
		var target_url			= base_url + "AjaxPekerjaan/get_data_legalitas2/";
	}
	
	$.ajax({
		type		: "POST",
		url 		: target_url,
		dataType	: "json",
		beforeSend: function() {
			$(terget_tab_tbody).html("<tr><td colspan='10' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
		},
		data		: {
			id_lokasi 	: $("#id_lokasi").val()
		},
		success		: function (data) {
			$(terget_tab_tbody).html("");
			var row = "";
			
			var a = 0;
			$.each(data.data_table, function(i, item) {
				row	= "<tr>";
				
				row	+= "<td align='center'>" + i + "</td>";
				$.each(item, function(j, item1){
					if (j == "tanah_60")
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
					else
					{
						row	+= "<td>" + item1 + "</td>";
					}
				});
				
				row	+= "</tr>";
				$(terget_tab_tbody).append(row);
				a++;
			});
			
			$("#total_data_legalitas").val(a);
			$(".default-date-picker").datepicker();

			calculate_total_luas_tanah_data_legalitas(terget_tab);

			if (getUrlParameter("role"))
			{
				role = getUrlParameter("role");
			}
			if (role === 'tanah')
			{
			}
			else if (role === 'dbanding')
			{
				calculate_tab_pembanding(NO)
			}
			else
			{
			}
		}
	})
}

function calculate_total_luas_tanah_data_legalitas(terget_tab, $input)
{
	if (IS_RUKO) {
		if (terget_tab==="#table_data_legalitas_2" ){
			return;
		}
	}

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

	var luasTanahDinilai = total_luas_tanah-(parseFloat($("#textbox_tanah_62").val())||0)
	$("#luas-tanah-dinilai").val(luasTanahDinilai)
}

$(document).on("change", "#table_data_legalitas_1 > tbody > tr > td > input", function()
{
	calculate_total_luas_tanah_data_legalitas("#table_data_legalitas_1", $(this));
});

$(document).on("change", "#table_data_legalitas_2 > tbody > tr > td > input", function()
{
	calculate_total_luas_tanah_data_legalitas("#table_data_legalitas_2", $(this));
});

$(document).on('keydown change', '#textbox_tanah_24, #textbox_tanah_25, #textbox_tanah_26, #textbox_tanah_27, #textbox_tanah_28, #textbox_tanah_29', function(e){
	if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
        (e.keyCode >= 35 && e.keyCode <= 40)) {
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
		$(this).val(0)	.updateTextbox();
	}
});

$('#textbox_sarana_2, #textbox_sarana_4, #textbox_sarana_7, #textbox_sarana_8, #textbox_sarana_10, #textbox_sarana_13, #textbox_sarana_14, #textbox_sarana_16, #textbox_sarana_18, #textbox_sarana_19, #textbox_sarana_21, #textbox_sarana_23, #textbox_sarana_24, #textbox_sarana_26, #textbox_sarana_30, #textbox_sarana_32, #textbox_sarana_35, #textbox_sarana_36, #textbox_sarana_38, #textbox_sarana_40, #textbox_sarana_41, #textbox_sarana_42, #textbox_sarana_44, #textbox_sarana_47, #textbox_sarana_48, #textbox_sarana_50, #textbox_sarana_52, #textbox_sarana_53, #textbox_sarana_54, #textbox_sarana_56, #textbox_sarana_59, #textbox_sarana_60, #textbox_sarana_62, #textbox_sarana_65, #textbox_sarana_66, #textbox_sarana_68, #textbox_sarana_70, #textbox_sarana_71, #textbox_sarana_72, #textbox_sarana_74, #textbox_sarana_76, #textbox_sarana_77, #textbox_sarana_78, #textbox_sarana_80, #textbox_sarana_83, #textbox_sarana_84, #textbox_sarana_86, #textbox_sarana_90, #textbox_sarana_91, #textbox_sarana_92, #textbox_sarana_94, #textbox_sarana_96, #textbox_sarana_97, #textbox_sarana_98, #textbox_sarana_100, #textbox_sarana_102, #textbox_sarana_103, #textbox_sarana_104, #textbox_sarana_106, #textbox_sarana_108, #textbox_sarana_109, #textbox_sarana_110, #textbox_sarana_112, #textbox_sarana_90, #textbox_sarana_91, #textbox_sarana_92, #textbox_sarana_94, #textbox_sarana_96, #textbox_sarana_97, #textbox_sarana_98, #textbox_sarana_100, #textbox_sarana_102, #textbox_sarana_103, #textbox_sarana_104, #textbox_sarana_106, #textbox_sarana_108, #textbox_sarana_109, #textbox_sarana_110, #textbox_sarana_112, #textbox_sarana_120, #textbox_sarana_121, #textbox_sarana_123').change(function(){
	// update_sarana_pelengkap(YES, $(this));
})

function update_sarana_pelengkap(doUpdate = DONT, $input){
	if (!$input)
	{
		doUpdate = DONT;
		$input = $(""); //DEFAULT
		// return;
	}

	var rcn1 = 0;
	var pasar1 = 0;
	var rcn2 = 0;	
	var pasar2 = 0;
	var rcn3 = 0;	
	var pasar3 = 0;
	var rcn4 = 0;	
	var pasar4 = 0;
	var rcn5 = 0;	
	var pasar5 = 0;
	var rcn6 = 0;	
	var pasar6 = 0;
	var rcn7 = 0;	
	var pasar7 = 0;
	var rcn8 = 0;	
	var pasar8 = 0;
	var rcn9 = 0;	
	var pasar9 = 0;
	var rcn10 = 0;	
	var pasar10 = 0;
	var rcn11 = 0;	
	var pasar11 = 0;
	var rcn12 = 0;	
	var pasar12 = 0;
	var rcn13 = 0;	
	var pasar13 = 0;
	var rcn14 = 0;	
	var pasar14 = 0;
	var rcn15 = 0;	
	var pasar15 = 0;
	var rcn16 = 0;	
	var pasar16 = 0;
	var rcn17 = 0;	
	var pasar17 = 0;
	var rcn18 = 0;	
	var pasar18 = 0;
	var rcn19 = 0;	
	var pasar19 = 0;
	var rcn20 = 0;	
	var pasar20 = 0;

	doUpdate = DONT;
	if ($input.is(".input_672_Bangunan_1,#textbox_sarana_2,#textbox_sarana_4"))
	{
		doUpdate = YES;
	}
	

	{
		$("#textbox_sarana_1");

		if ($(".input_672_Bangunan_1").length)
		{
			$("#textbox_sarana_1").val($(".input_672_Bangunan_1").val()).updateTextbox(doUpdate);
		}

		var daya_listrik	= parseFloat($("#textbox_sarana_1").val()) ? parseFloat($("#textbox_sarana_1").val()) || 0 : 0;
		var satuan1			= parseFloat($("#textbox_sarana_2").val()) ? parseFloat($("#textbox_sarana_2").val()) || 0 : 0;
		var dep1			= parseFloat($("#textbox_sarana_4").val()) ? parseFloat($("#textbox_sarana_4").val()) || 0 : 0;
		
		if (daya_listrik == "Belum terpasang" || daya_listrik == "Tidak ada")
		{
			rcn1 = 0;
		}
		else 
		{
			rcn1 = daya_listrik * satuan1;
		}
		
		pasar1	= rcn1 - (rcn1 * dep1 / 100);
		
		$("#textbox_sarana_2").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_3").val(rcn1).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_5").val(pasar1).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_673_Bangunan_1,#textbox_sarana_8,#textbox_sarana_10"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_673_Bangunan_1").length)
		{
			$("#textbox_sarana_6").val($(".input_673_Bangunan_1").val()).updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_6");
		}
		
		var jaringan_telepon	= parseFloat($("#textbox_sarana_6").val()) ? parseFloat($("#textbox_sarana_6").val()) || 0 : 0;
		var satuan2				= parseFloat($("#textbox_sarana_8").val()) ? parseFloat($("#textbox_sarana_8").val()) || 0 : 0;
		var dep2				= parseFloat($("#textbox_sarana_10").val()) ? parseFloat($("#textbox_sarana_10").val()) || 0 : 0;
		
		if (jaringan_telepon == "Belum terpasang" || jaringan_telepon == "Tidak ada")
		{
			rcn2 = 0;
		}
		else 
		{
			rcn2 = jaringan_telepon * satuan2;
		}
		
		pasar2	= rcn2 - (rcn2 * dep2 / 100);
		
		$("#textbox_sarana_8").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_9").val(rcn2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_11").val(pasar2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_13,#textbox_sarana_14,#textbox_sarana_16"))
	{
		doUpdate = YES;
	}
	{
		var air_bersih		= parseFloat($("#textbox_sarana_13").val()) ? parseFloat($("#textbox_sarana_13").val()) || 0 : 0;
		var satuan3			= parseFloat($("#textbox_sarana_14").val()) ? parseFloat($("#textbox_sarana_14").val()) || 0 : 0;
		var dep3			= parseFloat($("#textbox_sarana_16").val()) ? parseFloat($("#textbox_sarana_16").val()) || 0 : 0;
		
		rcn3 	= air_bersih * satuan3;
		pasar3	= rcn3 - (rcn3 * dep3 / 100);
		
		$("#textbox_sarana_14").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_15").val(rcn3).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_17").val(pasar3).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_18,#textbox_sarana_19,#textbox_sarana_21"))
	{
		doUpdate = YES;
	}
	{
		var sumur_bor		= parseFloat($("#textbox_sarana_18").val()) ? parseFloat($("#textbox_sarana_18").val()) || 0 : 0;
		var satuan4			= parseFloat($("#textbox_sarana_19").val()) ? parseFloat($("#textbox_sarana_19").val()) || 0 : 0;
		var dep4			= parseFloat($("#textbox_sarana_21").val()) ? parseFloat($("#textbox_sarana_21").val()) || 0 : 0;
		
		rcn4 	= sumur_bor * satuan4;
		pasar4	= rcn4 - (rcn4 * dep4 / 100);
		
		$("#textbox_sarana_19").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_20").val(rcn4).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_22").val(pasar4).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_23,#textbox_sarana_24,#textbox_sarana_26"))
	{
		doUpdate = YES;
	}
	{
		var sumur_dalam		= parseFloat($("#textbox_sarana_23").val()) ? parseFloat($("#textbox_sarana_23").val()) || 0 : 0;
		var satuan5			= parseFloat($("#textbox_sarana_24").val()) ? parseFloat($("#textbox_sarana_24").val()) || 0 : 0;
		var dep5			= parseFloat($("#textbox_sarana_26").val()) ? parseFloat($("#textbox_sarana_26").val()) || 0 : 0;
		
		rcn5 	= sumur_dalam * satuan5;
		pasar5	= rcn5 - (rcn5 * dep5 / 100);
		
		$("#textbox_sarana_24").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_25").val(rcn5).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_27").val(pasar5).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_675_Bangunan_1,.input_676_Bangunan_1,#textbox_sarana_29,#textbox_sarana_30,#textbox_sarana_32"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_676_Bangunan_1").length)
		{
			$("#textbox_sarana_28").val($(".input_676_Bangunan_1").val()).updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_28");
		}
		
		if ($(".input_675_Bangunan_1").length)
		{
			$("#textbox_sarana_29").val($(".input_675_Bangunan_1").val()).updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_29");
		}
		
		var ac				= parseFloat($("#textbox_sarana_29").val()) ? parseFloat($("#textbox_sarana_29").val()) || 0 : 0;
		var satuan6			= parseFloat($("#textbox_sarana_30").val()) ? parseFloat($("#textbox_sarana_30").val()) || 0 : 0;
		var dep6			= parseFloat($("#textbox_sarana_32").val()) ? parseFloat($("#textbox_sarana_32").val()) || 0 : 0;
		
		rcn6 	= ac * satuan6;
		pasar6	= rcn6 - (rcn6 * dep6 / 100);
		
		$("#textbox_sarana_30").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_31").val(rcn6).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_33").val(pasar6).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_683_Bangunan_1,#textbox_sarana_35,#textbox_sarana_36,#textbox_sarana_38"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_683_Bangunan_1").length)
		{
			$("#textbox_sarana_34").val($(".input_683_Bangunan_1").val()).updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_34");
		}
		
		var objek			= parseFloat($("#textbox_sarana_35").val()) ? parseFloat($("#textbox_sarana_35").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_36").val()) ? parseFloat($("#textbox_sarana_36").val()) || 0 : 0;
		var dep7			= parseFloat($("#textbox_sarana_38").val()) ? parseFloat($("#textbox_sarana_38").val()) || 0 : 0;
		
		rcn7 	= objek * satuan;
		pasar7	= rcn7 - (rcn7 * dep7 / 100);
		
		$("#textbox_sarana_36").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_37").val(rcn7).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_39").val(pasar7).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_672_Bangunan_1,#textbox_sarana_41,#textbox_sarana_42,#textbox_sarana_44"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_41").val()) ? parseFloat($("#textbox_sarana_41").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_42").val()) ? parseFloat($("#textbox_sarana_42").val()) || 0 : 0;
		var dep8			= parseFloat($("#textbox_sarana_44").val()) ? parseFloat($("#textbox_sarana_44").val()) || 0 : 0;
		
		rcn8 	= objek * satuan;
		pasar8	= rcn8 - (rcn8 * dep8 / 100);
		
		$("#textbox_sarana_42").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_43").val(rcn8).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_45").val(pasar8).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_671_Bangunan_1,#textbox_sarana_47,#textbox_sarana_48,#textbox_sarana_50"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_671_Bangunan_1").length)
		{
			$("#textbox_sarana_46").val($(".input_671_Bangunan_1").val()).updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_46");
		}
		
		var objek			= parseFloat($("#textbox_sarana_47").val()) ? parseFloat($("#textbox_sarana_47").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_48").val()) ? parseFloat($("#textbox_sarana_48").val()) || 0 : 0;
		var dep9			= parseFloat($("#textbox_sarana_50").val()) ? parseFloat($("#textbox_sarana_50").val()) || 0 : 0;
		
		rcn9 	= objek * satuan;
		pasar9	= rcn9 - (rcn9 * dep9 / 100);
		
		$("#textbox_sarana_48").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_49").val(rcn9).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_51").val(pasar9).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_53,#textbox_sarana_54,#textbox_sarana_56"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_53").val()) ? parseFloat($("#textbox_sarana_53").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_54").val()) ? parseFloat($("#textbox_sarana_54").val()) || 0 : 0;
		var dep10			= parseFloat($("#textbox_sarana_56").val()) ? parseFloat($("#textbox_sarana_56").val()) || 0 : 0;
		
		rcn10 	= objek * satuan;
		pasar10	= rcn10 - (rcn10 * dep10 / 100);
		
		$("#textbox_sarana_54").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_55").val(rcn10).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_57").val(pasar10).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_678_Bangunan_1,#textbox_sarana_59,#textbox_sarana_60,#textbox_sarana_62"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_678_Bangunan_1").length)
		{
			$("#textbox_sarana_58").val($(".input_678_Bangunan_1").val()).updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_58");
		}
		
		
		var objek			= parseFloat($("#textbox_sarana_59").val()) ? parseFloat($("#textbox_sarana_59").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_60").val()) ? parseFloat($("#textbox_sarana_60").val()) || 0 : 0;
		var dep11			= parseFloat($("#textbox_sarana_62").val()) ? parseFloat($("#textbox_sarana_62").val()) || 0 : 0;
		
		rcn11 	= objek * satuan;
		pasar11	= rcn11 - (rcn11 * dep11 / 100);
		
		$("#textbox_sarana_60").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_61").val(rcn11).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_63").val(pasar11).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	// 
	doUpdate = DONT;
	if ($input.is(".input_680_Bangunan_1,#textbox_sarana_65,#textbox_sarana_66,#textbox_sarana_68"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_680_Bangunan_1").length)
		{
			$("#textbox_sarana_64").val($(".input_680_Bangunan_1").val()).updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_64");
		}
		
		
		var objek			= parseFloat($("#textbox_sarana_65").val()) ? parseFloat($("#textbox_sarana_65").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_66").val()) ? parseFloat($("#textbox_sarana_66").val()) || 0 : 0;
		var dep12			= parseFloat($("#textbox_sarana_68").val()) ? parseFloat($("#textbox_sarana_68").val()) || 0 : 0;
		
		rcn12 	= objek * satuan;
		pasar12	= rcn12 - (rcn12 * dep12 / 100);
		
		$("#textbox_sarana_66").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_67").val(rcn12)	.attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 ) .updateTextbox(doUpdate);
		$("#textbox_sarana_69").val(pasar12).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_71,#textbox_sarana_72,#textbox_sarana_74"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_71").val()) ? parseFloat($("#textbox_sarana_71").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_72").val()) ? parseFloat($("#textbox_sarana_72").val()) || 0 : 0;
		var dep13			= parseFloat($("#textbox_sarana_74").val()) ? parseFloat($("#textbox_sarana_74").val()) || 0 : 0;
		
		rcn13 	= objek * satuan;
		pasar13	= rcn13 - (rcn13 * dep13 / 100);
		
		$("#textbox_sarana_72").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_73").val(rcn13).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_75").val(pasar13).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_77,#textbox_sarana_78,#textbox_sarana_80"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_77").val()) ? parseFloat($("#textbox_sarana_77").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_78").val()) ? parseFloat($("#textbox_sarana_78").val()) || 0 : 0;
		var dep14			= parseFloat($("#textbox_sarana_80").val()) ? parseFloat($("#textbox_sarana_80").val()) || 0 : 0;
		
		rcn14 	= objek * satuan;
		pasar14	= rcn14 - (rcn14 * dep14 / 100);
		
		$("#textbox_sarana_78").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_79").val(rcn14).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_81").val(pasar14).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is(".input_682_Bangunan_1,#textbox_sarana_83,#textbox_sarana_84,#textbox_sarana_86"))
	{
		doUpdate = YES;
	}
	{
		if ($(".input_682_Bangunan_1").length)
		{
			$("#textbox_sarana_82").val($(".input_682_Bangunan_1").val()).updateTextbox(doUpdate);
		}
		else
		{
			$("#textbox_sarana_82");
		}
		
		var objek			= parseFloat($("#textbox_sarana_83").val()) ? parseFloat($("#textbox_sarana_83").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_84").val()) ? parseFloat($("#textbox_sarana_84").val()) || 0 : 0;
		var dep15			= parseFloat($("#textbox_sarana_86").val()) ? parseFloat($("#textbox_sarana_86").val()) || 0 : 0;
		
		rcn15 	= objek * satuan;
		pasar15	= rcn15 - (rcn15 * dep15 / 100);
		
		$("#textbox_sarana_84").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_85").val(rcn15).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_87").val(pasar15).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_120,#textbox_sarana_121,#textbox_sarana_123"))
	{
		doUpdate = YES;
	}
	{
		var lainnya		= parseFloat($("#textbox_sarana_120").val()) ? parseFloat($("#textbox_sarana_120").val()) || 0 : 0;
		var satuan		= parseFloat($("#textbox_sarana_121").val()) ? parseFloat($("#textbox_sarana_121").val()) || 0 : 0;
		var dep			= parseFloat($("#textbox_sarana_123").val()) ? parseFloat($("#textbox_sarana_123").val()) || 0 : 0;
		
		rcn20 	= lainnya * satuan;
		pasar20	= rcn20 - (rcn20 * dep / 100);
		
		$("#textbox_sarana_121").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_122").val(rcn20).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_124").val(pasar20).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = DONT;
	if ($input.is("#textbox_sarana_91,#textbox_sarana_92,#textbox_sarana_94"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_91").val()) ? parseFloat($("#textbox_sarana_91").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_92").val()) ? parseFloat($("#textbox_sarana_92").val()) || 0 : 0;
		var dep16			= parseFloat($("#textbox_sarana_94").val()) ? parseFloat($("#textbox_sarana_94").val()) || 0 : 0;
		
		rcn16 	= objek * satuan;
		pasar16	= rcn16 - (rcn16 * dep16 / 100);
		
		$("#textbox_sarana_92").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_93").val(rcn16).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_95").val(pasar16).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}

	doUpdate = DONT;
	if ($input.is("#textbox_sarana_97,#textbox_sarana_98,#textbox_sarana_100"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_97").val()) ? parseFloat($("#textbox_sarana_97").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_98").val()) ? parseFloat($("#textbox_sarana_98").val()) || 0 : 0;
		var dep17			= parseFloat($("#textbox_sarana_100").val()) ? parseFloat($("#textbox_sarana_100").val()) || 0 : 0;
		
		rcn17 	= objek * satuan;
		pasar17	= rcn17 - (rcn17 * dep17 / 100);
		
		$("#textbox_sarana_98").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_99").val(rcn17).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_101").val(pasar17).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}

	doUpdate = DONT;
	if ($input.is("#textbox_sarana_103,#textbox_sarana_104,#textbox_sarana_106"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_103").val()) ? parseFloat($("#textbox_sarana_103").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_104").val()) ? parseFloat($("#textbox_sarana_104").val()) || 0 : 0;
		var dep18			= parseFloat($("#textbox_sarana_106").val()) ? parseFloat($("#textbox_sarana_106").val()) || 0 : 0;
		
		rcn18 	= objek * satuan;
		pasar18	= rcn18 - (rcn18 * dep18 / 100);
		
		$("#textbox_sarana_104").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_105").val(rcn18).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_107").val(pasar18).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}

	doUpdate = DONT;
	if ($input.is("#textbox_sarana_109,#textbox_sarana_110,#textbox_sarana_112"))
	{
		doUpdate = YES;
	}
	{
		var objek			= parseFloat($("#textbox_sarana_109").val()) ? parseFloat($("#textbox_sarana_109").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_110").val()) ? parseFloat($("#textbox_sarana_110").val()) || 0 : 0;
		var dep19			= parseFloat($("#textbox_sarana_112").val()) ? parseFloat($("#textbox_sarana_112").val()) || 0 : 0;
		
		rcn19 	= objek * satuan;
		pasar19	= rcn19 - (rcn19 * dep19 / 100);
		
		$("#textbox_sarana_110").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_111").val(rcn19).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_113").val(pasar19).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}
	
	doUpdate = YES;
	if ($input.length === 0)
	{
		doUpdate = DONT;
	}

	{
		var total_rcn	= rcn1 + rcn2 + rcn3 + rcn4 + rcn5 + rcn6 + rcn7 + rcn8 + rcn9 + rcn10 + rcn11 + rcn12 + rcn13 + rcn14 + rcn15 + rcn20;
		var total_pasar	= pasar1 + pasar2 + pasar3 + pasar4 + pasar5 + pasar6 + pasar7 + pasar8 + pasar9 + pasar10 + pasar11 + pasar12 + pasar13 + pasar14 + pasar15 + pasar20;
		
		var total_rcn2		= rcn16 + rcn17 + rcn18 + rcn19;
		var total_pasar2	= pasar16 + pasar17 + pasar18 + pasar19;
		
		$("#textbox_sarana_88").val(total_rcn).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_89").val(total_pasar).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 ) .updateTextbox(doUpdate);
		
		$("#textbox_sarana_114").val(total_rcn2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_115").val(total_pasar2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		
		$("#textbox_sarana_116").val(total_rcn + total_rcn2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
		$("#textbox_sarana_117").val(total_pasar + total_pasar2).attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 )	.updateTextbox(doUpdate);
	}

	$("#textbox_sarana_3,#textbox_sarana_9,#textbox_sarana_15,#textbox_sarana_20,#textbox_sarana_25,#textbox_sarana_31,#textbox_sarana_37,#textbox_sarana_43,#textbox_sarana_49,#textbox_sarana_55,#textbox_sarana_61,#textbox_sarana_67,#textbox_sarana_73,#textbox_sarana_79,#textbox_sarana_85,#textbox_sarana_122,#textbox_sarana_88,#textbox_sarana_93,#textbox_sarana_99,#textbox_sarana_105,#textbox_sarana_111,#textbox_sarana_114,#textbox_sarana_116,#textbox_sarana_5,#textbox_sarana_11,#textbox_sarana_17,#textbox_sarana_22,#textbox_sarana_27,#textbox_sarana_33,#textbox_sarana_45,#textbox_sarana_51,#textbox_sarana_57,#textbox_sarana_63,#textbox_sarana_69,#textbox_sarana_75,#textbox_sarana_81,#textbox_sarana_87,#textbox_sarana_124, #textbox_sarana_89,#textbox_sarana_95,#textbox_sarana_101,#textbox_sarana_107,#textbox_sarana_57,#textbox_sarana_113,#textbox_sarana_115,#textbox_sarana_117").number( true, 0 );
}

function get_pembanding()
{
	return;
}

$(document).on("change", ".input_255_1, .input_256_1, .input_255_2, .input_256_2, .input_255_3, .input_256_3, .input_260_1, .input_260_2, .input_260_3, .input_277_1-0, .input_277_2-0, .input_277_3-0, .input_278_1-0, .input_278_2-0, .input_278_3-0, .input_279_1-0, .input_279_2-0, .input_279_3-0, .input_280_1-0, .input_280_2-0, .input_280_3-0, .input_281_1-0, .input_281_2-0, .input_281_3-0, .input_281_1-0, .input_281_2-0, .input_281_3-0, .input_282_1-0, .input_282_2-0, .input_282_3-0, .input_283_1-0, .input_283_2-0, .input_283_3-0, .input_284_1-0, .input_284_2-0, .input_284_3-0, .input_285_1-0, .input_285_2-0, .input_285_3-0, .input_286_1-0, .input_286_2-0, .input_286_3-0, .input_287_1-0, .input_287_2-0, .input_287_3-0, .input_288_1-0, .input_288_2-0, .input_288_3-0, .input_270_1, .input_270_2, .input_270_3, .input_272_1, .input_272_2, .input_272_3 ", function(event)
{
	calculate_tab_pembanding(YES, $(this));
});

$(document).on("change", ".input_253_1, .input_253_2, .input_253_3, .input_259_1, .input_259_2, .input_259_3, .input_264_1, .input_264_2, .input_264_3, .input_265_0, .input_265_1, .input_265_2, .input_265_3, .input_266_0, .input_266_1, .input_266_2, .input_266_3, .input_267_0, .input_267_1, .input_267_2, .input_267_3, .input_269_0, .input_269_1, .input_269_2, .input_269_3, .input_258_1, .input_258_2, .input_258_3", function()
{
	style_after_ajax_pembanding(YES, $(this));
})

function calculate_tab_pembanding(doUpdate = DONT, $input = NO_SET)
{
	doUpdate = YES
	if (!$input)
	{
		doUpdate = NO;
		$input = $('');
	}

	{
		input_255_1 = parseFloat($(".input_255_1").val()) || 0;
		input_256_1 = parseFloat($(".input_256_1").val()) || 0;
		input_260_1 = parseFloat($(".input_260_1").val()) || 0;
		input_261_1 = parseFloat($(".input_261_1").val()) || 0;
		input_270_1 = parseFloat($(".input_270_1").val()) || 0;
		input_272_1 = parseFloat($(".input_272_1").val()) || 0;

		input_257_1 = input_255_1 - (input_255_1 * input_256_1 / 100);
		input_273_1 = input_270_1 * input_272_1 / 100;
		input_271_1 = input_273_1 * input_261_1;
		input_274_1 = input_257_1 - input_271_1;
		input_276_1 = input_274_1 / input_260_1;

		if (is_nilai_properti) {
			input_276_1 = input_257_1 / input_261_1;
		}
		
		doUpdate = NO
		if ($input.is('.input_255_1,.input_256_1'))
		{
			doUpdate = YES
		}
		$(".input_257_1").val(input_257_1)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_1,.input_272_1'))
		{
			doUpdate = YES
		}
		$(".input_273_1").val(input_273_1)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_1,.input_256_1,.input_260_1,.input_261_1,.input_270_1,.input_272_1'))
		{
			doUpdate = YES
		}
		$(".input_274_1").val(input_274_1)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_1,.input_256_1,.input_260_1,.input_261_1,.input_270_1,.input_272_1'))
		{
			doUpdate = YES
		}
		$(".input_276_1").val(input_276_1)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_1,.input_272_1,.input_261_1'))
		{
			doUpdate = YES
		}
		$(".input_271_1").val(input_271_1)	.updateTextbox(doUpdate);
	}
	
	{
		input_255_2 = parseFloat($(".input_255_2").val()) || 0;
		input_256_2 = parseFloat($(".input_256_2").val()) || 0;
		input_256_2 = parseFloat($(".input_256_2").val()) || 0;
		input_260_2 = parseFloat($(".input_260_2").val()) || 0;
		input_261_2 = parseFloat($(".input_261_2").val()) || 0;
		input_270_2 = parseFloat($(".input_270_2").val()) || 0;
		input_272_2 = parseFloat($(".input_272_2").val()) || 0;
		input_257_2 = input_255_2 - (input_255_2 * input_256_2 / 100);
		input_273_2 = input_270_2 * input_272_2 / 100;
		input_271_2 = input_273_2 * input_261_2;
		input_274_2 = input_257_2 - input_271_2;
		input_276_2 = input_274_2 / input_260_2;

		if (is_nilai_properti) {
			input_276_2 = input_257_2 / input_261_2;
		}
		
		doUpdate = NO
		if ($input.is('.input_255_2,.input_256_2'))
		{
			doUpdate = YES
		}
		$(".input_257_2").val(input_257_2)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_2,.input_272_2'))
		{
			doUpdate = YES
		}
		$(".input_273_2").val(input_273_2)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_2,.input_256_2,.input_260_2,.input_261_2,.input_270_2,.input_272_2'))
		{
			doUpdate = YES
		}
		$(".input_274_2").val(input_274_2)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_2,.input_256_2,.input_260_2,.input_261_2,.input_270_2,.input_272_2'))
		{
			doUpdate = YES
		}
		$(".input_276_2").val(input_276_2)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_2,.input_272_2,.input_261_2'))
		{
			doUpdate = YES
		}
		$(".input_271_2").val(input_271_2)	.updateTextbox(doUpdate);
	}
	
	{
		input_255_3 = parseFloat($(".input_255_3").val()) || 0;
		input_256_3 = parseFloat($(".input_256_3").val()) || 0;
		input_256_3 = parseFloat($(".input_256_3").val()) || 0;
		input_260_3 = parseFloat($(".input_260_3").val()) || 0;
		input_261_3 = parseFloat($(".input_261_3").val()) || 0;
		input_270_3 = parseFloat($(".input_270_3").val()) || 0;
		input_272_3 = parseFloat($(".input_272_3").val()) || 0;
		input_257_3 = input_255_3 - (input_255_3 * input_256_3 / 100);
		input_273_3 = input_270_3 * input_272_3 / 100;
		input_271_3 = input_273_3 * input_261_3;
		input_274_3 = input_257_3 - input_271_3;
		input_276_3 = input_274_3 / input_260_3;

		if (is_nilai_properti) {
			input_276_3 = input_257_3 / input_261_3;
		}
		
		doUpdate = NO
		if ($input.is('.input_255_3,.input_256_3'))
		{
			doUpdate = YES
		}

		doUpdate = NO
		if ($input.is('.input_270_3,.input_272_3'))
		{
			doUpdate = YES
		}
		$(".input_257_3").val(input_257_3)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_3,.input_272_3'))
		{
			doUpdate = YES
		}
		$(".input_273_3").val(input_273_3)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_3,.input_256_3,.input_260_3,.input_261_3,.input_270_3,.input_272_3'))
		{
			doUpdate = YES
		}
		$(".input_274_3").val(input_274_3)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_255_3,.input_256_3,.input_260_3,.input_261_3,.input_270_3,.input_272_3'))
		{
			doUpdate = YES
		}
		$(".input_276_3").val(input_276_3)	.updateTextbox(doUpdate);

		doUpdate = NO
		if ($input.is('.input_270_3,.input_272_3,.input_261_3'))
		{
			doUpdate = YES
		}
		$(".input_271_3").val(input_271_3)	.updateTextbox(doUpdate);
	}

	//Adjustment
	{
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 277) {
			doUpdate = YES;
		}

		input_277_1_0	= parseFloat($(".input_277_1-0").val()) || 0;
		input_277_2_0	= parseFloat($(".input_277_2-0").val()) || 0;
		input_277_3_0	= parseFloat($(".input_277_3-0").val()) || 0;

		input_277_1_2	= input_277_1_0 * input_276_1 / 100;
		input_277_2_2	= input_277_2_0 * input_276_2 / 100;
		input_277_3_2	= input_277_3_0 * input_276_3 / 100;
		input_277_1_3	= input_277_1_2 * input_260_1;
		input_277_2_3	= input_277_2_2 * input_260_2;
		input_277_3_3	= input_277_3_2 * input_260_3;

		$(".input_277_1-2").val(input_277_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_277_2-2").val(input_277_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_277_3-2").val(input_277_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_277_1-3").val(input_277_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_277_2-3").val(input_277_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_277_3-3").val(input_277_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 278)
		{
			doUpdate = YES;
		}

		input_278_1_0	= parseFloat($(".input_278_1-0").val()) || 0;
		input_278_2_0	= parseFloat($(".input_278_2-0").val()) || 0;
		input_278_3_0	= parseFloat($(".input_278_3-0").val()) || 0;		
		input_278_1_2	= input_278_1_0 * input_276_1 / 100;
		input_278_2_2	= input_278_2_0 * input_276_2 / 100;
		input_278_3_2	= input_278_3_0 * input_276_3 / 100;
		input_278_1_3	= input_278_1_2 * input_260_1;
		input_278_2_3	= input_278_2_2 * input_260_2;
		input_278_3_3	= input_278_3_2 * input_260_3;
		
		$(".input_278_1-2").val(input_278_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_278_2-2").val(input_278_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_278_3-2").val(input_278_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_278_1-3").val(input_278_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_278_2-3").val(input_278_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_278_3-3").val(input_278_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 279)
		{
			doUpdate = YES;
		}

		input_279_1_0	= parseFloat($(".input_279_1-0").val()) || 0;
		input_279_2_0	= parseFloat($(".input_279_2-0").val()) || 0;
		input_279_3_0	= parseFloat($(".input_279_3-0").val()) || 0;
		input_279_1_2	= input_279_1_0 * input_276_1 / 100;
		input_279_2_2	= input_279_2_0 * input_276_2 / 100;
		input_279_3_2	= input_279_3_0 * input_276_3 / 100;
		input_279_1_3	= input_279_1_2 * input_260_1;
		input_279_2_3	= input_279_2_2 * input_260_2;
		input_279_3_3	= input_279_3_2 * input_260_3;
		
		$(".input_279_1-2").val(input_279_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_279_2-2").val(input_279_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_279_3-2").val(input_279_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_279_1-3").val(input_279_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_279_2-3").val(input_279_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_279_3-3").val(input_279_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 280)
		{
			doUpdate = YES;
		}

		input_280_1_0	= parseFloat($(".input_280_1-0").val()) || 0;
		input_280_2_0	= parseFloat($(".input_280_2-0").val()) || 0;
		input_280_3_0	= parseFloat($(".input_280_3-0").val()) || 0;
		input_280_1_2	= input_280_1_0 * input_276_1 / 100;
		input_280_2_2	= input_280_2_0 * input_276_2 / 100;
		input_280_3_2	= input_280_3_0 * input_276_3 / 100;
		input_280_1_3	= input_280_1_2 * input_260_1;
		input_280_2_3	= input_280_2_2 * input_260_2;
		input_280_3_3	= input_280_3_2 * input_260_3;
		
		$(".input_280_1-2").val(input_280_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_280_2-2").val(input_280_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_280_3-2").val(input_280_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_280_1-3").val(input_280_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_280_2-3").val(input_280_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_280_3-3").val(input_280_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 281)
		{
			doUpdate = YES;
		}

		input_281_1_0	= parseFloat($(".input_281_1-0").val()) || 0;
		input_281_2_0	= parseFloat($(".input_281_2-0").val()) || 0;
		input_281_3_0	= parseFloat($(".input_281_3-0").val()) || 0;
		input_281_1_2	= input_281_1_0 * input_276_1 / 100;
		input_281_2_2	= input_281_2_0 * input_276_2 / 100;
		input_281_3_2	= input_281_3_0 * input_276_3 / 100;
		input_281_1_3	= input_281_1_2 * input_260_1;
		input_281_2_3	= input_281_2_2 * input_260_2;
		input_281_3_3	= input_281_3_2 * input_260_3;
		
		$(".input_281_1-2").val(input_281_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_281_2-2").val(input_281_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_281_3-2").val(input_281_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_281_1-3").val(input_281_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_281_2-3").val(input_281_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_281_3-3").val(input_281_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);

		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 283)
		{
			doUpdate = YES;
		}

		input_283_1_0	= parseFloat($(".input_283_1-0").val()) || 0;
		input_283_2_0	= parseFloat($(".input_283_2-0").val()) || 0;
		input_283_3_0	= parseFloat($(".input_283_3-0").val()) || 0;
		input_283_1_1	= input_283_1_0 * input_276_1 / 100;
		input_283_2_1	= input_283_2_0 * input_276_2 / 100;
		input_283_3_1	= input_283_3_0 * input_276_3 / 100;
		input_283_1_2	= input_283_1_1 * input_260_1;
		input_283_2_2	= input_283_2_1 * input_260_2;
		input_283_3_2	= input_283_3_1 * input_260_3;
		
		$(".input_283_1-1").val(input_283_1_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_283_2-1").val(input_283_2_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_283_3-1").val(input_283_3_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_283_1-2").val(input_283_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_283_2-2").val(input_283_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_283_3-2").val(input_283_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 284)
		{
			doUpdate = YES;
		}

		input_284_1_0	= parseFloat($(".input_284_1-0").val()) || 0;
		input_284_2_0	= parseFloat($(".input_284_2-0").val()) || 0;
		input_284_3_0	= parseFloat($(".input_284_3-0").val()) || 0;
		input_284_1_1	= input_284_1_0 * input_276_1 / 100;
		input_284_2_1	= input_284_2_0 * input_276_2 / 100;
		input_284_3_1	= input_284_3_0 * input_276_3 / 100;
		input_284_1_2	= input_284_1_1 * input_260_1;
		input_284_2_2	= input_284_2_1 * input_260_2;
		input_284_3_2	= input_284_3_1 * input_260_3;
		
		$(".input_284_1-1").val(input_284_1_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_284_2-1").val(input_284_2_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_284_3-1").val(input_284_3_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_284_1-2").val(input_284_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_284_2-2").val(input_284_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_284_3-2").val(input_284_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 285)
		{
			doUpdate = YES;
		}

		input_285_1_0	= parseFloat($(".input_285_1-0").val()) || 0;
		input_285_2_0	= parseFloat($(".input_285_2-0").val()) || 0;
		input_285_3_0	= parseFloat($(".input_285_3-0").val()) || 0;
		input_285_1_2	= input_285_1_0 * input_276_1 / 100;
		input_285_2_2	= input_285_2_0 * input_276_2 / 100;
		input_285_3_2	= input_285_3_0 * input_276_3 / 100;
		input_285_1_3	= input_285_1_2 * input_260_1;
		input_285_2_3	= input_285_2_2 * input_260_2;
		input_285_3_3	= input_285_3_2 * input_260_3;
		
		$(".input_285_1-2").val(input_285_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_285_2-2").val(input_285_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_285_3-2").val(input_285_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_285_1-3").val(input_285_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_285_2-3").val(input_285_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_285_3-3").val(input_285_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 286)
		{
			doUpdate = YES;
		}

		input_286_1_0	= parseFloat($(".input_286_1-0").val()) || 0;
		input_286_2_0	= parseFloat($(".input_286_2-0").val()) || 0;
		input_286_3_0	= parseFloat($(".input_286_3-0").val()) || 0;
		input_286_1_2	= input_286_1_0 * input_276_1 / 100;
		input_286_2_2	= input_286_2_0 * input_276_2 / 100;
		input_286_3_2	= input_286_3_0 * input_276_3 / 100;
		input_286_1_3	= input_286_1_2 * input_260_1;
		input_286_2_3	= input_286_2_2 * input_260_2;
		input_286_3_3	= input_286_3_2 * input_260_3;
		
		$(".input_286_1-2").val(input_286_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_286_2-2").val(input_286_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_286_3-2").val(input_286_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_286_1-3").val(input_286_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_286_2-3").val(input_286_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_286_3-3").val(input_286_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 287)
		{
			doUpdate = YES;
		}

		input_287_1_0	= parseFloat($(".input_287_1-0").val()) || 0;
		input_287_2_0	= parseFloat($(".input_287_2-0").val()) || 0;
		input_287_3_0	= parseFloat($(".input_287_3-0").val()) || 0;
		input_287_1_2	= input_287_1_0 * input_276_1 / 100;
		input_287_2_2	= input_287_2_0 * input_276_2 / 100;
		input_287_3_2	= input_287_3_0 * input_276_3 / 100;
		input_287_1_3	= input_287_1_2 * input_260_1;
		input_287_2_3	= input_287_2_2 * input_260_2;
		input_287_3_3	= input_287_3_2 * input_260_3;
		
		$(".input_287_1-2").val(input_287_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_287_2-2").val(input_287_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_287_3-2").val(input_287_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_287_1-3").val(input_287_1_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_287_2-3").val(input_287_2_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_287_3-3").val(input_287_3_3).AdjustmentMinus()	.updateTextbox(doUpdate);
		
		doUpdate = NO;
		if (parseFloat($input.attr("data-id-field")) === 288)
		{
			doUpdate = YES;
		}

		input_288_1_0	= parseFloat($(".input_288_1-0").val()) || 0;
		input_288_2_0	= parseFloat($(".input_288_2-0").val()) || 0;
		input_288_3_0	= parseFloat($(".input_288_3-0").val()) || 0;
		input_288_1_1	= input_288_1_0 * input_276_1 / 100;
		input_288_2_1	= input_288_2_0 * input_276_2 / 100;
		input_288_3_1	= input_288_3_0 * input_276_3 / 100;
		input_288_1_2	= input_288_1_1 * input_260_1;
		input_288_2_2	= input_288_2_1 * input_260_2;
		input_288_3_2	= input_288_3_1 * input_260_3;
		
		$(".input_288_1-1").val(input_288_1_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_288_2-1").val(input_288_2_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_288_3-1").val(input_288_3_1).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_288_1-2").val(input_288_1_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_288_2-2").val(input_288_2_2).AdjustmentMinus()	.updateTextbox(doUpdate);
		$(".input_288_3-2").val(input_288_3_2).AdjustmentMinus()	.updateTextbox(doUpdate);
	}

	calculate_tab_pembanding_2(doUpdate , $input);
}

$(document).on("change", "input[data-id-field=161],input[data-id-field=348]", function(){
	calculate_tab_pembanding_2(YES, $(this))
})

function calculate_tab_pembanding_2(doUpdate = NO, $input)
{
	doUpdate = true;

	if ($input.length===0)
	{
		$input = $("");
		doUpdate = NO;
	}

	var input_289_1_0	= input_277_1_0 + input_278_1_0 + input_279_1_0 + input_280_1_0 + input_281_1_0 + input_283_1_0 + input_284_1_0 + input_285_1_0 + input_286_1_0 + input_287_1_0 + input_288_1_0;
	var input_289_2_0	= input_277_2_0 + input_278_2_0 + input_279_2_0 + input_280_2_0 + input_281_2_0 + input_283_2_0 + input_284_2_0 + input_285_2_0 + input_286_2_0 + input_287_2_0 + input_288_2_0;
	var input_289_3_0	= input_277_3_0 + input_278_3_0 + input_279_3_0 + input_280_3_0 + input_281_3_0 + input_283_3_0 + input_284_3_0 + input_285_3_0 + input_286_3_0 + input_287_3_0 + input_288_3_0;
	
	$(".input_289_1-0").val(input_289_1_0)  .updateTextbox(doUpdate);
	$(".input_289_2-0").val(input_289_2_0)  .updateTextbox(doUpdate);
	$(".input_289_3-0").val(input_289_3_0)	.updateTextbox(doUpdate);
	
	var input_289_1_1	= input_277_1_2 + input_278_1_2 + input_279_1_2 + input_280_1_2 + input_281_1_2 + input_283_1_1 + input_284_1_1 + input_285_1_2 + input_286_1_2 + input_287_1_2 + input_288_1_1;
	var input_289_2_1	= input_277_2_2 + input_278_2_2 + input_279_2_2 + input_280_2_2 + input_281_2_2 + input_283_2_1 + input_284_2_1 + input_285_2_2 + input_286_2_2 + input_287_2_2 + input_288_2_1;
	var input_289_3_1	= input_277_3_2 + input_278_3_2 + input_279_3_2 + input_280_3_2 + input_281_3_2 + input_283_3_1 + input_284_3_1 + input_285_3_2 + input_286_3_2 + input_287_3_2 + input_288_3_1;
	
	$(".input_289_1-1").val(input_289_1_1)	.updateTextbox(doUpdate);
	$(".input_289_2-1").val(input_289_2_1)	.updateTextbox(doUpdate);
	$(".input_289_3-1").val(input_289_3_1)	.updateTextbox(doUpdate);
	
	var input_289_1_2	= input_277_1_3 + input_278_1_3 + input_279_1_3 + input_280_1_3 + input_281_1_3 + input_283_1_2 + input_284_1_2 + input_285_1_3 + input_286_1_3 + input_287_1_3 + input_288_1_2;
	var input_289_2_2	= input_277_2_3 + input_278_2_3 + input_279_2_3 + input_280_2_3 + input_281_2_3 + input_283_2_2 + input_284_2_2 + input_285_2_3 + input_286_2_3 + input_287_2_3 + input_288_2_2;
	var input_289_3_2	= input_277_3_3 + input_278_3_3 + input_279_3_3 + input_280_3_3 + input_281_3_3 + input_283_3_2 + input_284_3_2 + input_285_3_3 + input_286_3_3 + input_287_3_3 + input_288_3_1;
	
	$(".input_289_1-2").val(input_289_1_2)	.updateTextbox(doUpdate);
	$(".input_289_2-2").val(input_289_2_2)	.updateTextbox(doUpdate);
	$(".input_289_3-2").val(input_289_3_2)	.updateTextbox(doUpdate);
	
	var input_290_1		= input_276_1 * (1 + (input_289_1_0 / 100));
	var input_290_2		= input_276_2 * (1 + (input_289_2_0 / 100));
	var input_290_3		= input_276_3 * (1 + (input_289_3_0 / 100));
	
	// doUpdate=true;
	$(".input_290_1").val(input_290_1)	.updateTextbox(doUpdate);
	$(".input_290_2").val(input_290_2)	.updateTextbox(doUpdate);
	$(".input_290_3").val(input_290_3)	.updateTextbox(doUpdate);
	
	// doUpdate=false;
	cek_deviasi();
	
	{
		var perbedaan_1	=  Math.abs(input_277_1_0) + Math.abs(input_278_1_0) + Math.abs(input_279_1_0) + Math.abs(input_280_1_0) + Math.abs(input_281_1_0) + Math.abs(input_283_1_0) + Math.abs(input_284_1_0) + Math.abs(input_285_1_0) + Math.abs(input_286_1_0) + Math.abs(input_287_1_0) + Math.abs(input_288_1_0);
		var perbedaan_2	=  Math.abs(input_277_2_0) + Math.abs(input_278_2_0) + Math.abs(input_279_2_0) + Math.abs(input_280_2_0) + Math.abs(input_281_2_0) + Math.abs(input_283_2_0) + Math.abs(input_284_2_0) + Math.abs(input_285_2_0) + Math.abs(input_286_2_0) + Math.abs(input_287_2_0) + Math.abs(input_288_2_0);
		var perbedaan_3	=  Math.abs(input_277_3_0) + Math.abs(input_278_3_0) + Math.abs(input_279_3_0) + Math.abs(input_280_3_0) + Math.abs(input_281_3_0) + Math.abs(input_283_3_0) + Math.abs(input_284_3_0) + Math.abs(input_285_3_0) + Math.abs(input_286_3_0) + Math.abs(input_287_3_0) + Math.abs(input_288_3_0);
		
		var jumlah_perbedaan = perbedaan_1 + perbedaan_2 + perbedaan_3;

		var bobot_perbedaan_1 = 0;
		if (perbedaan_1 !== 0 && jumlah_perbedaan !== 0 )
		{
			bobot_perbedaan_1	= perbedaan_1 / jumlah_perbedaan;
		}
		var bobot_perbedaan_2	= 0;
		if (perbedaan_2 !== 0 && jumlah_perbedaan !== 0 )
		{
			bobot_perbedaan_2	= perbedaan_2 / jumlah_perbedaan;
		}
		var bobot_perbedaan_3	= 0;
		if (perbedaan_3 !== 0 && jumlah_perbedaan !== 0 )
		{
			bobot_perbedaan_3	= perbedaan_3 / jumlah_perbedaan;
		}

		var bobot_persamaan_1	= 1 - bobot_perbedaan_1;
		var bobot_persamaan_2	= 1 - bobot_perbedaan_2;
		var bobot_persamaan_3	= 1 - bobot_perbedaan_3;
		var jumlah_persamaan	= bobot_persamaan_1 + bobot_persamaan_2 + bobot_persamaan_3;
		
		var rekonsiliasi_1		= bobot_persamaan_1 / jumlah_persamaan;
		var rekonsiliasi_2		= bobot_persamaan_2 / jumlah_persamaan;
		var rekonsiliasi_3		= bobot_persamaan_3 / jumlah_persamaan;
		
		// doUpdate=true;
		$(".input_291_0").val((rekonsiliasi_1 + rekonsiliasi_2 + rekonsiliasi_3) * 100)	.updateTextbox(doUpdate);
		$(".input_291_1").val(rekonsiliasi_1 * 100) .updateTextbox(doUpdate);
		$(".input_291_2").val(rekonsiliasi_2 * 100) .updateTextbox(doUpdate);
		$(".input_291_3").val(rekonsiliasi_3 * 100) .updateTextbox(doUpdate);
		// doUpdate=false;
		
		var input_292_1	= input_290_1 * rekonsiliasi_1;
		var input_292_2	= input_290_2 * rekonsiliasi_2;
		var input_292_3	= input_290_3 * rekonsiliasi_3;
		var input_292_0 = input_292_1 + input_292_2 + input_292_3;
		
		$(".input_292_0").val(input_292_0).updateTextbox(doUpdate);
		$(".input_292_1").val(input_292_1).updateTextbox(doUpdate);
		$(".input_292_2").val(input_292_2).updateTextbox(doUpdate);
		$(".input_292_3").val(input_292_3).updateTextbox(doUpdate);	

		if ( !IS_BANGUNAN ) {
			input_261_0 = parseFloat($('.input_261_0').val()) || 0;
			var nilai_pasar_permeter = input_292_0;
			var nilai_pasar_properti = nilai_pasar_permeter*input_261_0;
			$('.nilai_pasar_db,.nilai_pasar_bg,.nilai_pasar_tanah').val(nilai_pasar_properti).number(true).updateTextbox(doUpdate);
			hitung_likuidasi(doUpdate);
		}
	}

	//ORIGINAL
	var input_292_0 		= parseFloat($(".input_292_0").val()) || 0;
	var total_luas_tanah 	= 0;
	var total_nilai_tanah 	= 0;
		
	var i = 1;
	$('#table_data_legalitas_2 > tbody > tr').each(function() {
		var luas_tanah	= 0;
		var bobot		= 0;
		var indikasi	= 0;
		var total_tanah	= 0;
		
		$(this).find('td').each (function()  {
			if ($(this).attr("td-type") == "total"){
				if ($(this).find('input').val() != ""){
					luas_tanah = parseFloat($(this).find('input').val());
				}
			}
			if ($(this).attr("td-type") == "bobot"){
				if ($(this).find('input').val() != ""){
					bobot = parseFloat($(this).find('input').val());
				}
			}
			indikasi	= bobot * input_292_0 / 100;
			if ($(this).attr("td-type") == "indikasi"){
				$(this).find('input').val(indikasi)	.updateTextbox(doUpdate);
			}
				
			total_tanah = indikasi * luas_tanah;
			
			if ($(this).attr("td-type") == "total_nilai_tanah"){
				$(this).find('input').val(total_tanah)	.updateTextbox(doUpdate);
			}
		}); 
			
		total_luas_tanah	= total_luas_tanah + luas_tanah;
		total_nilai_tanah	= total_nilai_tanah + total_tanah;
				
		i++;
	});

	$("#textbox_tanah_71").val(total_nilai_tanah/total_luas_tanah).number( true, 0 )	.updateTextbox(doUpdate);
	$("#textbox_tanah_72").val(total_nilai_tanah).number( true, 0 )	.updateTextbox(doUpdate);
	
	var indikasi_nilai_tanah_setelah_pembulatan	= total_nilai_tanah/total_luas_tanah;
	var pembulatan = Math.round((indikasi_nilai_tanah_setelah_pembulatan / 10000), 0) * 10000;
	
	if (!is_nilai_properti) {
		$("#textbox_pembanding_47").val(indikasi_nilai_tanah_setelah_pembulatan).number( true, 0 ).updateTextbox();
		$("#textbox_pembanding_48").val(pembulatan).number( true, 0 ).updateTextbox(doUpdate);
	}

	calculate_tab_pembanding_3(doUpdate , $input);
}
function calculate_tab_pembanding_3(doUpdate = NO, $input)
{
	// doUpdate = NO;
	var role = "entry"
	if (getUrlParameter("role"))
	{
		role = getUrlParameter("role");
	}
	var tanah_luas = parseFloat($('#'+role).find("#textbox_tanah_61").val()) || 0
	
	var tanah_harga			= parseFloat($("#textbox_pembanding_48").val()) || 0;
	
	var carpot_jumlah		= parseFloat($("#textbox_sarana_2").val()) || 0;
	var carpot_harga		= parseFloat($("#textbox_sarana_3").val()) || 0;
	
	var perkerasan_jumlah	= parseFloat($("#textbox_sarana_8").val()) || 0;
	var perkerasan_harga	= parseFloat($("#textbox_sarana_9").val()) || 0;
	
	var pagar_jumlah		= parseFloat($("#textbox_sarana_14").val()) || 0;
	var pagar_harga			= parseFloat($("#textbox_sarana_15").val()) || 0;
	
	var halaman_jumlah		= parseFloat($("#textbox_sarana_20").val()) || 0;
	var halaman_harga		= parseFloat($("#textbox_sarana_21").val()) || 0;
	
	var gapura_jumlah		= parseFloat($("#textbox_sarana_26").val()) || 0;
	var gapura_harga		= parseFloat($("#textbox_sarana_27").val()) || 0;
	
	var taman_jumlah		= parseFloat($("#textbox_sarana_32").val()) || 0;
	var taman_harga			= parseFloat($("#textbox_sarana_33").val()) || 0;
	
	var rcn_tanah			= tanah_luas * tanah_harga;
	var rcn_carpot			= carpot_jumlah * carpot_harga;
	var rcn_perkerasan		= perkerasan_jumlah * perkerasan_harga;
	var rcn_pagar			= pagar_jumlah * pagar_harga;
	var rcn_halaman			= halaman_jumlah * halaman_harga;
	var rcn_gapura			= gapura_jumlah * gapura_harga;
	var rcn_taman			= taman_jumlah * taman_harga;
	
	var total_nilai_pasar	= rcn_tanah + rcn_carpot + rcn_perkerasan + rcn_pagar + rcn_halaman + rcn_gapura + rcn_taman;
	$("#textbox_pembanding_11").val(total_nilai_pasar).hide()	.updateTextbox();
	var textbox_pembanding_48 = parseFloat($("#textbox_pembanding_48").val()) || 0;

	$(".input_274_0").val(textbox_pembanding_48 * tanah_luas).updateTextbox();

	var indikasi = textbox_pembanding_48 * tanah_luas;
	if (is_nilai_properti) {
		indikasi = parseFloat($('.nilai_pasar_db').val()) || 0;
	}

	$("#textbox_tanah_65").val(indikasi).addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 ).updateTextbox();

	var textbox_tanah_66 = indikasi * 80 / 100;
	if (is_nilai_properti) {
		textbox_tanah_66 = parseFloat($('.nilai_likuidasi_db').val()) || 0;
	}

	$("#textbox_tanah_66").val(textbox_tanah_66).addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 ) .updateTextbox();

	if (tab_loaded.indexOf('Bangunan_1') !== -1)
	{
		$(".input_270_0").val(data_bangunan["brb_bangunan"]).number( true, 0 ) .updateTextbox();
		$(".input_272_0").val(data_bangunan["kondisi_fisik_bangunan"]).attr("readonly", true) .updateTextbox();
		$(".input_273_0").val(data_bangunan["indikasi_nilai_pasar_m"]).number( true, 0 ) .updateTextbox();
		$(".input_271_0").val(data_bangunan["indikasi_nilai_pasar"]).number( true, 0 ) .updateTextbox();
	}
	
	style_after_ajax_pembanding(doUpdate , $input);
}

function style_after_ajax_pembanding(doUpdate = NO, $input)
{
	doUpdate = NO;
	$(".input_274_0").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
	$(".input_249_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_7").val())	.updateTextbox(doUpdate);
	$(".input_250_0").attr("readonly", true).addClass("readonly");
	$(".input_251_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_8").val())	.updateTextbox(doUpdate);
	$(".input_252_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_2").val())	.updateTextbox(doUpdate);
	$(".input_253_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_18").val())	.updateTextbox(doUpdate);
	$(".input_254_0").attr("readonly", true).addClass("readonly");
	$(".input_255_0").attr("readonly", true).addClass("readonly");
	$(".input_256_0").attr("readonly", true).addClass("readonly");
	$(".input_257_0").attr("readonly", true).addClass("readonly");
	$(".input_270_0").attr("readonly", true).addClass("readonly");
	 
	luas_bangunan = !txn_bangunan.Bangunan_1 ? 0 : txn_bangunan.Bangunan_1.luas;
	
	var jumlah_lantai = !txn_bangunan.Bangunan_1 ? 0 : txn_bangunan.Bangunan_1.jumlah_lantai

	$(".input_262_0").attr("readonly", true).val("").addClass("readonly")	.updateTextbox(doUpdate);
	$(".input_263_0").attr("readonly", true).addClass("readonly").val($("#textbox_bangunan_134").val())	.updateTextbox(doUpdate);
	
	$(".input_264_0").attr("readonly", true).addClass("readonly").val($("#textbox_tanah_39").val()).updateTextbox(doUpdate);
	$(".input_266_0").attr("readonly", true).addClass("readonly").val($("#textbox_tanah_49").val()).updateTextbox(doUpdate);
	$(".input_268_0").attr("readonly", true).addClass("rea donly").val($("#textbox_tanah_46").val()).updateTextbox(doUpdate);
	$(".input_269_0").attr("readonly", true).addClass("readonly").val($("#textbox_tanah_45").val()).updateTextbox(doUpdate);
	
	var jumlah_pembanding = $("#jumlah_pembanding").val();
	
	for(var i = 0; i <= jumlah_pembanding ; i++)
	{
		$(".input_255_" + i).number( true, 0 );
		$(".input_257_" + i).number( true, 0 ); 
		$(".input_270_" + i).number( true, 0 );
		$(".input_271_" + i).number( true, 0 );
		$(".input_273_" + i).number( true, 0 );
		$(".input_274_" + i).number( true, 0 );
		$(".input_276_" + i).number( true, 0 );
		$(".input_290_" + i).number( true, 0 );
		$(".input_292_" + i).number( true, 0 );
		
		if (i == 0)
		{
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 277)
			{
				doUpdate = YES;
			}
			$(".input_277_" + i).attr("readonly", true).addClass("readonly").val($(".input_253_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 278)
			{
				doUpdate = YES;
			}
			$(".input_278_" + i).attr("readonly", true).addClass("readonly").val($(".input_259_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 279)
			{
				doUpdate = YES;
			}
			$(".input_279_" + i).attr("readonly", true).addClass("readonly").val($(".input_260_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 280)
			{
				doUpdate = YES;
			}
			$(".input_280_" + i).attr("readonly", true).addClass("readonly").val($(".input_264_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 281)
			{
				doUpdate = YES;
			}
			$(".input_281_" + i).attr("readonly", true).addClass("readonly").val($(".input_265_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 285)
			{
				doUpdate = YES;
			}
			$(".input_285_" + i).attr("readonly", true).addClass("readonly").val($(".input_267_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 286)
			{
				doUpdate = YES;
			}
			$(".input_286_" + i).attr("readonly", true).addClass("readonly").val($(".input_269_" + i).val()).updateTextbox(doUpdate);
			
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 287)
			{
				doUpdate = YES;
			}
			$(".input_287_" + i).attr("readonly", true).addClass("readonly").val($(".input_258_" + i).val()).updateTextbox(doUpdate);
		}
		else
		{
			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 277)
			{
				doUpdate = YES;
			}
			$(".input_277_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_253_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 278)
			{
				doUpdate = YES;
			}
			$(".input_278_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_259_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 279)
			{
				doUpdate = YES;
			}
			$(".input_279_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_260_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 280)
			{
				doUpdate = YES;
			}
			$(".input_280_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_264_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 281)
			{
				doUpdate = YES;
			}
			$(".input_281_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_265_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 285)
			{
				doUpdate = YES;
			}
			$(".input_285_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_267_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 286)
			{
				doUpdate = YES;
			}
			$(".input_286_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_269_" + i).val()) .updateTextbox(doUpdate);

			doUpdate = NO;
			if (parseFloat($input.attr("data-id-field")) === 287)
			{
				doUpdate = YES;
			}
			$(".input_287_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_258_" + i).val()) .updateTextbox(doUpdate);
		}
		
		$(".input_282_" + i).attr("readonly", true).addClass("readonly").val($(".input_266_" + i).val())	.updateTextbox(doUpdate);
		
		$(".input_255_" + i).addClass("text-right");
		$(".input_257_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_260_" + i).addClass("text-right");
		$(".input_261_" + i).addClass("text-right");
		$(".input_264_" + i).addClass("text-right");
		$(".input_270_" + i).addClass("text-right");
		$(".input_273_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_271_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_274_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_276_" + i).addClass("text-right").attr("readonly", true).addClass("readonly").addClass("bold");
		$(".input_279_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );	
		$(".input_280_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly");		
		$(".input_283_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_284_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_288_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_289_" + i + "-1").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_277_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_278_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_279_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_280_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_281_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_283_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_284_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_285_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_286_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_287_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_288_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_289_" + i + "-2").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_277_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_278_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_279_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_280_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_281_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_283_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_284_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_285_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_286_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_287_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_288_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
		$(".input_289_" + i + "-3").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );

		$(".input_290_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_291_" + i).addClass("text-center").attr("readonly", true).addClass("readonly");
		$(".input_292_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		// Text Align Center
		$(".input_256_" + i).addClass("text-center");
		$(".input_272_" + i).addClass("text-center").css("background-color", "white");
		
		$(".input_277_" + i + "-0").addClass("text-center");
		$(".input_278_" + i + "-0").addClass("text-center");
		$(".input_279_" + i + "-0").addClass("text-center");
		$(".input_280_" + i + "-0").addClass("text-center");
		$(".input_281_" + i + "-0").addClass("text-center");
		$(".input_283_" + i + "-0").addClass("text-center");
		$(".input_284_" + i + "-0").addClass("text-center");
		$(".input_285_" + i + "-0").addClass("text-center");
		$(".input_286_" + i + "-0").addClass("text-center");
		$(".input_287_" + i + "-0").addClass("text-center");
		$(".input_288_" + i + "-0").addClass("text-center");
		$(".input_289_" + i + "-0").addClass("text-center");
	}
	
	var total_data_legalitas = $("#total_data_legalitas").val();
	
	for (var i = 1; i <= total_data_legalitas; i++)
	{
		$(".input_348_" + i).addClass("text-center").number( true, 0 );
		$(".input_349_" + i).addClass("text-right").number( true, 0 );
		$(".input_350_" + i).addClass("text-right").number( true, 0 );
	}
}

$(document).on("click", ".btn-tambah-bangunan", function()
{
	if (window.confirm("Apakah Anda yakin?"))
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/tambah_bangunan/",
			data		: {
				type		: "tambah",
				id_lokasi 	: $("#id_lokasi").val()
			},
			success		: function (data) {
				if (data.trim() == "success")
				{
					location.reload();
				}
			}
		});
	}
});
$(document).on("click", ".btn-tambah-lantai", function()
{
	if (window.confirm("Apakah Anda yakin?"))
	{
		var bangunan	= $(this).attr("data-bangunan");
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/tambah_lantai/",
			data		: {
				type		: "tambah",
				id_lokasi 	: $("#id_lokasi").val(),
				bangunan	: bangunan
			},
			success		: function (data) {
				if (data.trim() == "success")
				{
					// load_tab_bangunan(bangunan);
					window.location.reload();
				}
			}
		});
	}
});
$(document).on("click", ".btn-tambah-ruangan", function()
{
	if (window.confirm("Apakah Anda yakin?"))
	{
		var bangunan	= $(this).attr("data-bangunan");
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/tambah_ruangan/",
			data		: {
				type		: "tambah",
				id_lokasi 	: $("#id_lokasi").val(),
				bangunan	: bangunan
			},
			success		: function (data) {
				if (data.trim() == "success")
				{
					// load_tab_bangunan(bangunan);
					window.location.reload();
				}
				else
				{
					generate_notification("error", data.trim(), "topCenter");
				}
			}
		});
	}
});
$(document).on("dblclick", ".change-ruang", function()
{
	var id_ruangan		= $(this).attr("data-id");
	var nama_ruangan	= $(this).text();
	var bangunan	= $(this).attr("data-bangunan");
	var parent			= $(this).parent();
	
	parent.html("<input type='text' value='" + nama_ruangan + "' style='color: #999;' class='change-ruang' id='nama_ruangan' data-bangunan='"+bangunan+"' data-id='"+id_ruangan+"' >");
	$("#nama_ruangan").focus();
});
$(document).on("blur", ".change-ruang", function()
{
	var id_ruangan		= $(this).attr("data-id");
	var nama_ruangan	= $(this).val();
	var bangunan	= $(this).attr("data-bangunan");
	var parent			= $(this).parent();
	
	parent.html("<a style='cursor: pointer; color: #eee' class='change-ruang' data-id='"+id_ruangan+"' data-bangunan='"+bangunan+"' >"+nama_ruangan+"</a>");
	
	$.ajax({
		type		: "POST",
		url 		: base_url + "AjaxPekerjaan/tambah_ruangan/",
		data		: {
			type		: "ubah",
			id_lokasi 	: $("#id_lokasi").val(),
			bangunan	: bangunan,
			id_ruangan		: id_ruangan,
			nama_ruangan	: nama_ruangan
		},
		success		: function (data) {
		}
	});
	
});

function load_tab_bangunan(role) {
	var jumlah_bangunan	= $("#jumlah_bangunan").val();
	
	for(var i = 1; i < jumlah_bangunan; i++)
	{
		var role_bangunan	= "Bangunan_" + i;
		if (role_bangunan != role)
		{
			$("#tab_" + role_bangunan).html("");
		}
	}

	$(".table_bangunan").find("input").addClass("text-center")

	hitung_luas_fisik_bangunan(role);
	hitung_bct_bangunan(role);
	
	$(".tipe_bangunan").html($("#" + role).find("select#textbox_bangunan_1").val());

	$("#" + role).find("#textbox_bangunan_60").val($("#" + role).find("select#textbox_bangunan_1").val()).attr("readonly", true).addClass("readonly")	.updateTextbox();

	$(".div-provinsi").html(" - " + $("#textbox_entry_23").val()).css("text-transform", "uppercase");
	

	$(".input_650_" + role_bangunan).number( true, 0 );
	$(".input_654_" + role_bangunan).number( true, 0 );
	$(".input_688_" + role_bangunan).number( true, 0 );

	getKelasBangunan(role);
	getBiayaLangsung(role);
}

function hitung_luas_fisik_bangunan(role, $input)
{
	var doUpdate=true;
	var totalDoUpdate=0;
	if (!$input)
	{
		$input=$("");
	}
	var input_id_field=parseFloat($input.attr("data-id-field")) || 0;

	var luas_total			= 0;
	var luas_pelanggaran	= 0;
	var jumlah_lantai	= $("#" + role).find("#textbox_bangunan_7").val();

	$("." + role + " tr ").each(function(index){
		var index_tr	= index;
		var td_last	= $(this).find("td").length;

		var luas_tr	= 0;
		var luas_td	= 0;
		
		$(this).find("td").each(function(index){
			var urutan	= index + 1;
			var $luasRuangan=$(this).find("input");

			var td_id_field=parseFloat($luasRuangan.attr("data-id-field")) || 0;
			doUpdate=false;

			if(input_id_field>0 && td_id_field>0 && input_id_field===td_id_field)
			{
				doUpdate=true;
				totalDoUpdate++;
			}

			if (urutan !== td_last)
			{
				luas_td = parseFloat($luasRuangan.val()) || 0;
				luas_tr += luas_td;
			}
			else
			{
				$luasRuangan.val(luas_tr).attr("readonly", true).addClass("readonly") .updateTextbox(doUpdate);
			}
		})
		
		var td_first	= $(this).find("td:first").html();
		
		if (td_first != "" && td_first != undefined)
		{
			if (td_first.indexOf("Lantai") != -1)
			{
				td_first	= td_first.replace("<span>", "");
				td_first	= td_first.replace("</span>", "");
				td_first	= td_first.replace("Lantai ", "");
				
				
				if (td_first > jumlah_lantai + 1)
				{
					luas_pelanggaran = luas_pelanggaran + luas_tr;
				}
			}
			
		}
		
		luas_total = luas_total + luas_tr
	});

	input_261_0 = luas_total;

	doUpdate=false;

	if (totalDoUpdate>0)
	{
		doUpdate=true;
	}
	input_261_0 = luas_total;
	$("." + role + ".input_639_" + role).val(luas_total).attr("readonly", true).addClass("readonly") .updateTextbox(doUpdate);
	
	$(".input_261_0").val(luas_total).attr("readonly", true).addClass("readonly") .updateTextbox(doUpdate);

	
	var tab_role	= role.split("_");
	
	var td_last	= $(".teras_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_113]").length;
	var luas		= 0;
	var luas_tmp	= 0;
	
	$(".teras_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_113]").each(function(index) 
	{
		var urutan		= index + 1;
		if ($(this).val() == undefined || $(this).val() == "")
		{
			luas_tmp = 0;
		}
		else
		{
			luas_tmp = $(this).val();
		}
		luas = parseFloat(luas_tmp) + luas;
	});

	$(".teras_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_113]").val(luas).attr("readonly", true).addClass("readonly").updateTextbox(totalDoUpdate);

	luas_tmp = luas * 0.5;
	luas_tmp = Math.round(luas_tmp);
	$(".teras_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_129]").val(luas_tmp).attr("readonly", true).addClass("readonly").updateTextbox(totalDoUpdate);
	
	var td_last	= $(".gudang_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_127]").length;
	var luas		= 0;
	var luas_tmp	= 0;
	
	$(".gudang_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_127]").each(function(index) 
	{
		var urutan		= index + 1;	
		if ($(this).val() == undefined || $(this).val() == "")
		{
			luas_tmp = 0;
		}
		else
		{
			luas_tmp = $(this).val();
		}
		luas = parseFloat(luas_tmp) + luas;
	});

	$(".gudang_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_127]").val(luas).attr("readonly", true).addClass("readonly").updateTextbox(totalDoUpdate);
	
	var td_last	= $(".gudang_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_128]").length;
	var luas		= 0;
	var luas_tmp	= 0;
	
	$(".gudang_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_128]").each(function(index) 
	{
		var urutan		= index + 1;
		
		if ($(this).val() == undefined || $(this).val() == "")
		{
			luas_tmp = 0;
		}
		else
		{
			luas_tmp = $(this).val();
		}
		luas = parseFloat(luas_tmp) + luas;
	});

	$(".gudang_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_128]").val(luas).attr("readonly", true).addClass("readonly").updateTextbox(totalDoUpdate);

	var td_last	= $(".teras_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_114]").length;
	var luas		= 0;
	var luas_tmp	= 0;
	
	$(".teras_" + tab_role[1] + " tr ").find("td").find("input[id=textbox_bangunan_114]").each(function(index) 
	{
		var urutan		= index + 1;
		
		if ($(this).val() == undefined || $(this).val() == "")
		{
			luas_tmp = 0;
		}
		else
		{
			luas_tmp = $(this).val();
		}
		luas = parseFloat(luas_tmp) + luas;
	});

	$(".teras_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_114]").val(luas).attr("readonly", true).addClass("readonly").updateTextbox(totalDoUpdate);

	$("#" + role).find("input[id=textbox_bangunan_92]").val(luas).attr("readonly", true).addClass("readonly").updateTextbox();

	var luas_teras = $("#" + role).find("#textbox_bangunan_129").val();
	var luas_bangunan = $("#" + role).find("#textbox_bangunan_5").val();
	var total_ruas_bangunan = parseFloat(luas_bangunan) + parseFloat(luas_teras);

	$("#" + role).find("#textbox_bangunan_130").val(total_ruas_bangunan).attr("readonly", true).addClass("readonly") .updateTextbox(doUpdate);

	// kalkulasiBiaya(role);
}

$(document).on("change", "#textbox_bangunan_26, #textbox_bangunan_27, #textbox_bangunan_28, #textbox_bangunan_29, #textbox_bangunan_30, #textbox_bangunan_31, #textbox_bangunan_34, #textbox_bangunan_35", function(){
	hitung_bangunan(this);
});

function hitung_bangunan(el)
{
	var type	= $(el).attr("data-keterangan");
	var id		= $(el).attr("id");
	var value	= $(el).val();
	
	if (id == "textbox_bangunan_26")
	{
		$("#" + type).find("#textbox_bangunan_64").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_27")
	{
		$("#" + type).find("#textbox_bangunan_67").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_28")
	{
		$("#" + type).find("#textbox_bangunan_68").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_29")
	{
		$("#" + type).find("#textbox_bangunan_71").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_30")
	{
		$("#" + type).find("#textbox_bangunan_72").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_31")
	{
		$("#" + type).find("#textbox_bangunan_75").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_34")
	{
		$("#" + type).find("#textbox_bangunan_78").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	else if (id == "textbox_bangunan_35")
	{
		$("#" + type).find("#textbox_bangunan_79").val(value).attr("readonly", true).addClass("readonly")	.updateTextbox();
	}
	
	// get_ringkasan_laporan();
}

$(document).on("change", "#textbox_bangunan_7, #textbox_bangunan_65, #textbox_bangunan_69, #textbox_bangunan_73, #textbox_bangunan_76, #textbox_bangunan_80, #textbox_bangunan_89, #textbox_bangunan_93, #textbox_bangunan_99, #textbox_bangunan_100, #textbox_bangunan_101, #textbox_bangunan_102, #textbox_bangunan_9, #textbox_bangunan_26, #textbox_bangunan_27, #textbox_bangunan_28, #textbox_bangunan_29, #textbox_bangunan_30, #textbox_bangunan_31, #textbox_bangunan_32, #textbox_bangunan_33, #textbox_bangunan_34, #textbox_bangunan_35, #textbox_bangunan_36, #textbox_bangunan_37", function()
{
	// var role	= $(this).attr("data-keterangan");
	// hitung_bct_bangunan(role);
});
$(document).on('change', '.depresiasi', function(e){
	e.preventDefault();

	hitung_likuidasi(true);
});

function hitung_likuidasi(doUpdate){
	var nilai_pasar_properti = parseFloat($('.nilai_pasar_db').val()) || 0;
	var depresiasi = parseFloat($('.depresiasi').val()) || 0;
	var nilai_likuidasi = nilai_pasar_properti-(nilai_pasar_properti*depresiasi/100);

	$('.nilai_likuidasi_db').val(nilai_likuidasi).number(true).updateTextbox(doUpdate);

	if (!IS_BANGUNAN) {
		$('.nilai_likuidasi_bg,.nilai_likuidasi_tanah').val(nilai_likuidasi).number(true).updateTextbox(doUpdate);
	}
}

function hitung_bct_bangunan(role)
{
	var dteNow = new Date();
	var intYear = dteNow.getFullYear();
	
	$("#" + role).find("#textbox_bangunan_82").val(intYear).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_83").val($("#" + role).find("#textbox_bangunan_22").val()).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_84").val($("#" + role).find("#textbox_bangunan_23").val()).attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	var kemunduran_fisik		= parseFloat($("#" + role).find("#textbox_bangunan_99").val()) || 0;	//c93
	var kondisi_terlihat		= parseFloat($("#" + role).find("#textbox_bangunan_100").val()) || 0;	//k93
	var keusangan_fungsional	= parseFloat($("#" + role).find("#textbox_bangunan_101").val()) || 0;	//q93
	var keusangan_ekonomis		= parseFloat($("#" + role).find("#textbox_bangunan_102").val()) || 0;	//x93
	var penyusutan_fisik		= kemunduran_fisik + kondisi_terlihat;

	keusangan_fungsional	= (100 - penyusutan_fisik) * keusangan_fungsional;
	keusangan_ekonomis		= (100 - penyusutan_fisik) * keusangan_ekonomis;
	
	// var total_penyusutan	= penyusutan_fisik + keusangan_ekonomis + keusangan_fungsional;
	var total_penyusutan	= parseFloat($("#textbox_bangunan_156").val()) || 0;
	
	luas_bangunan		= $("#" + role).find("#textbox_bangunan_5").val()
	
	$("#" + role).find("#textbox_bangunan_61").val(luas_bangunan).attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	$("#" + role).find("#textbox_bangunan_103").val(penyusutan_fisik).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_104").val(keusangan_fungsional).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_105").val(keusangan_ekonomis).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_106").val(total_penyusutan).attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	var luas_imb		= parseFloat($("#" + role).find("#textbox_bangunan_9").val()) || 0;
	var perbedaan_luas	= luas_bangunan - luas_imb;
	$("#" + role).find("#textbox_bangunan_10").val(Math.abs(perbedaan_luas)).attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	var a = parseFloat($("#" + role).find("#textbox_bangunan_16").val()) || 0;
	var b = parseFloat($("#" + role).find("#textbox_bangunan_17").val()) || 0;
	var c = parseFloat($("#" + role).find("#textbox_bangunan_18").val()) || 0;
	var d = parseFloat($("#" + role).find("#textbox_bangunan_19").val()) || 0;
			
	var e = a + b + c + d
	$("#" + role).find("#textbox_bangunan_20").val(e).attr("readonly", true).addClass("readonly").attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	var data = {
		id_lokasi				: $("#id_lokasi").val(),
		type_bangunan			: $("#" + role).find("select#textbox_bangunan_62").val(),
		luas_bangunan			: luas_bangunan,
		
		ket_pondasi_struktur	: $("#" + role).find("select#textbox_bangunan_65").val(),
		ket_rangka_penutup		: $("#" + role).find("select#textbox_bangunan_69").val(),
		ket_plafond				: $("#" + role).find("select#textbox_bangunan_73").val(),
		ket_dinding_pintu		: $("#" + role).find("select#textbox_bangunan_76").val(),
		ket_lantai_utilitas		: $("#" + role).find("select#textbox_bangunan_80").val(),
		
		teras_luas				: $("#" + role).find("#textbox_bangunan_88").val(),
		teras_type				: $("#" + role).find("select#textbox_bangunan_89").val(),
		balkon_luas				: $("#" + role).find("#textbox_bangunan_92").val(),
		balkon_type				: $("#" + role).find("select#textbox_bangunan_93").val(),
		
		tahun_bangun			: $("#" + role).find("#textbox_bangunan_83").val(),
		tahun_renof				: $("#" + role).find("#textbox_bangunan_84").val(),
		total_penyusutan		: total_penyusutan
	};
	
	$.ajax({
		type		: "POST",
		url 		: base_url + "AjaxPekerjaan/hitung_bct_bangunan/",
		dataType	: "JSON",
		data		: {
			data : data
		},
		success		: function (data) {
			$("#" + role).find("#textbox_bangunan_66").val(data.harga_pondasi_struktur).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_70").val(data.harga_rangka_penutup).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_74").val(data.harga_plafond).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_77").val(data.harga_dinding_pintu).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_81").val(data.harga_lantai_utilitas).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_87").val(data.rcn_bangunan).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			
			
			$("#" + role).find("#textbox_bangunan_90").val(data.ket_teras).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_91").val(data.harga_teras).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_94").val(data.ket_balkon).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_95").val(data.harga_balkon).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_96").val(data.rcn_teras_balkon).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox()
			$("#" + role).find("#textbox_bangunan_97").val(data.rcn_bangunan2).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_98").val(data.pembulatan_rcn).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			
			$("#" + role).find("#textbox_bangunan_85").val(data.umur_ekonomis).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_86").val(data.umur_efektif).attr("readonly", true).addClass("readonly")	.updateTextbox();
			
			
			$("#" + role).find("#textbox_bangunan_108").val(data.kondisi_bangunan).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_109").val(data.rcn_rp).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_110").val(data.rcn_rp_m).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_111").val(data.nilai_pasar).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			$("#" + role).find("#textbox_bangunan_112").val(data.nilai_pasar2).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly")	.updateTextbox();
			
			var nilai_pasar_luquidasi	= data.nilai_pasar2 - (data.nilai_pasar2 * 30 / 100);
			
			var luas_resmi					= luas_bangunan - e;
			var nilai_resmi_pasar			= data.rcn_rp_m * luas_resmi;
			var nilai_resmi_pasar_luquidasi	= nilai_resmi_pasar - (nilai_resmi_pasar * 30 / 100);
			$("#" + role).find("#textbox_bangunan_57").val(nilai_resmi_pasar).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly") .updateTextbox();
			$("#" + role).find("#textbox_bangunan_58").val(nilai_resmi_pasar_luquidasi).addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly") .updateTextbox();
			
		}
	});
	
	var pondasi			= $("#" + role).find("select#textbox_bangunan_26").val();
	var struktur		= $("#" + role).find("select#textbox_bangunan_27").val();
	var rangka_atap		= $("#" + role).find("select#textbox_bangunan_28").val();
	var penutup_atap	= $("#" + role).find("select#textbox_bangunan_29").val();
	var plafond			= $("#" + role).find("select#textbox_bangunan_30").val();
	var dinding			= $("#" + role).find("select#textbox_bangunan_31").val();
	var pintu_jendela	= $("#" + role).find("select#textbox_bangunan_34").val();
	var lantai			= $("#" + role).find("select#textbox_bangunan_35").val();
	
	$("#" + role).find("#textbox_bangunan_64").val(pondasi).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_67").val(struktur).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_68").val(rangka_atap).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_71").val(penutup_atap).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_72").val(plafond).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_75").val(dinding).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_78").val(pintu_jendela).attr("readonly", true).addClass("readonly")	.updateTextbox();
	$("#" + role).find("#textbox_bangunan_79").val(lantai).attr("readonly", true).addClass("readonly")	.updateTextbox();
	
	// get_ringkasan_laporan();
} 
function get_ringkasan_laporan()
{
	var id_kertas_kerja = $('#id_kertas_kerja').val();
	$.ajax({
		type		: "POST",
		url 		: base_url + "AjaxPekerjaan/get_ringkasan_penilaian?id_kertas_kerja="+id_kertas_kerja,
		beforeSend: function() {
			$("#table_body_ringkasan").html("<tr><td colspan='5' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
		},
		data		: {
			id_lokasi 	: $("#id_lokasi").val()
		},
		success		: function (data) {
			$("#table_body_ringkasan").html(data);
		},
	});
		
}
function get_history_penilaian()
{
	$.ajax({
		type		: "POST",
		url 		: base_url + "AjaxPekerjaan/get_history_penilaian/",
		beforeSend: function() {
			$("#history_penilaian").html("<center><img src='" + base_url + "asset/images/loading.gif' class='loading' align='center' /></center>");
		},
		data		: {
			id_lokasi 	: $("#id_lokasi").val()
		},
		success		: function (data) {
			$("#history_penilaian").html(data);
		},
	});
}
var map;
var temp_marker = [];
var markers = [];
if ( typeof google != 'undefined' ) {
    var MyLatLng = new google.maps.LatLng(-6.296225924299342, 106.709375);
    var CurrentLatLng = MyLatLng;
}
if ( typeof MyLatLng != 'undefined' ) {
    var mapProp = {
        center:MyLatLng,
        zoom:11,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    map=new google.maps.Map(document.getElementById("map_area"),mapProp);
    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();
        if (places.length == 0) {
            return;
        }
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                return;
            }
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };
            if (place.geometry.viewport) {
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);
    });
}
var active_idx;
function open_map(idx) {
	active_idx = idx;
    if ( typeof MyLatLng != 'undefined' ) {
        reset_markers(temp_marker);
        CurrentLatLng = MyLatLng;
        $('#exampleModalLabel').html('Klik Pada Peta Untuk Menentukan Lokasi');
        $('#formAddMarker').modal('show');
        map.setCenter(MyLatLng);
        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
        });
    }
}
function view_map(lat, lng) {
    if ( typeof MyLatLng != 'undefined' && lat != '' && lng != '' ) {
        reset_markers(temp_marker);
        var location = new google.maps.LatLng(lat, lng);
        CurrentLatLng = location;
        $('#exampleModalLabel').html('View Lokasi Pada Peta');
        $('#formAddMarker').modal('show');
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: base_url + 'asset/images/aset-icon/' + icon_marker
        });
        temp_marker.push(marker);
        map.setZoom(11);
    } else {
        alert('Koordinat Latitude dan Longitude tidak tersedia.');
    }
}
function reset_markers(item_marker) {
    for ( var i=0; i<item_marker.length; i++ ) {
        item_marker[i].setMap(null);
    }
}
function placeMarker(location) {
    if ( typeof MyLatLng != 'undefined' ) {
        reset_markers(markers);
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: base_url + 'asset/images/aset-icon/' + icon_marker
        });
        temp_marker.push(marker);
        var pos_lat = marker.getPosition().lat();
        var pos_long = marker.getPosition().lng();

        $('#latitude_pembanding_'+active_idx).attr("value",pos_lat).val(pos_lat).updateTextbox();
        $('#longitude_pembanding_'+active_idx).attr("value",pos_long).val(pos_long).updateTextbox();
        $.ajax({
				type		: "POST",
				url 		: base_url + "AjaxPekerjaan/update_lokasi_pembanding_by_map/",
				data		: {
					id_lokasi 	: $('#id_lokasi').val(),
					latitude		: $('#latitude_pembanding_'+active_idx).val(),
					longitude		: $('#longitude_pembanding_'+active_idx).val(),
					keterangan	: active_idx
				},
				success		: function (data) {
					if ($(this).attr("data-keterangan")){
						calculate_total_luas_tanah_data_legalitas();
					}
				},
			});
        $('#formAddMarker').modal('hide');
    }
}
function cek_deviasi()
{
	var input_290_1 = parseFloat($(".input_290_1").val()) || 0;
	var input_290_2 = parseFloat($(".input_290_2").val()) || 0;
	var input_290_3 = parseFloat($(".input_290_3").val()) || 0;
	var nilai_indikasi_tertinggi = Math.max(input_290_1, input_290_2, input_290_3)
	var nilai_indikasi_terendah = Math.min(input_290_1, input_290_2, input_290_3)
	var deviasi_data = (1-(nilai_indikasi_terendah/nilai_indikasi_tertinggi))*100;
	deviasi_data = deviasi_data.toFixed(2)
	deviasi_data = parseFloat(deviasi_data) || 0
	$(".btn-simpan").hide();
	$("#analisaUlang").hide();
	$('#deviasi_data').val(deviasi_data)
	if (deviasi_data<deviasi_limit)
	{
		$(".btn-simpan").show();
	}
	else
	{
		$("#analisaUlang").show();
	}
}
$(document).on("change", "#textbox_tanah_61,#textbox_tanah_62", function(event){
	var luasTanahDinilai = total_luas_tanah-(parseFloat($("#textbox_tanah_62").val())||0)
	$("#luas-tanah-dinilai").val(luasTanahDinilai)
});