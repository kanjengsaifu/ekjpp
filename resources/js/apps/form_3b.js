var data_bangunan	= new Array();
data_bangunan["brb_bangunan"]				= 0;
data_bangunan["kondisi_fisik_bangunan"]		= 0;
data_bangunan["indikasi_nilai_pasar_m"]		= 0;
data_bangunan["indikasi_nilai_pasar"]		= 0;
luas_bangunan	= 0;
var total_luas_tanah = 0;
var tab_loaded = []

var role = "entry";

$(document).ready(function(){
	$(".btn-batal").click(function(){
		location = base_url + "pekerjaan/detail/" + $("#id_pekerjaan").val();
	});
	
	// update_sarana_pelengkap();
	if (getUrlParameter("role"))
	{
		role = getUrlParameter("role");
	}

	tab_loaded.push(role)
	if (role === 'entry')
	{
		get_history_penilaian();
		get_ringkasan_laporan()
	}
	else if (role === 'tanah')
	{
		get_data_legalitas(role);
	}
	else if (role === 'dbanding')
	{
		get_data_legalitas(role);
	}
	else
	{
		$("#textbox_bangunan_3").trigger("change"); //luas bangunan fisik
	}
	
	var data_type = $('.panel-head.panel-'+role).attr("data-type")

	if (data_type == "bangunan")
	{
		load_tab_bangunan(role)
		// hitung_luas_fisik_bangunan(role)
		// hitung_bct_bangunan(role)
		// getBiayaLangsung(role)
		$(".btn-tambah-bangunan").show()
	}
	else
	{
		$(".btn-tambah-bangunan").hide()
	}

	$("#textbox_tanah_61").attr("readonly", true);
	$("#textbox_tanah_61, #textbox_tanah_62").addClass("text-right");	
	
	$("textbox_tanah_65,#textbox_tanah_66,#textbox_pembanding_47,#textbox_bangunan_55,#textbox_pembanding_48,#textbox_tanah_61,#textbox_tanah_72,#textbox_tanah_70,#textbox_tanah_71").addClass("text-right");


	$("#textbox_pembanding_9,#textbox_pembanding_11").each(function(){
		$(this).closest("tr")
			.find("td").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
			.find("span").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
			.find(".form-control").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
		;
	});

	$("#textbox_entry_3,#textbox_entry_5,#textbox_entry_15,#textbox_entry_18,#textbox_entry_21,#textbox_entry_23,#textbox_entry_25,#textbox_entry_27,#textbox_entry_2").attr("readonly", true).addClass("readonly")	//.trigger("change");
	
	$("#textbox_tanah_1,#textbox_tanah_2,#textbox_tanah_3,#textbox_tanah_65,#textbox_tanah_66,#textbox_bangunan_55,#textbox_pembanding_47,#textbox_pembanding_48,#textbox_tanah_61,#textbox_tanah_72,#textbox_tanah_70,#textbox_tanah_71").attr("readonly", true).addClass("readonly")

	
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
	
	
	$("#textbox_tanah_65").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 )	//.trigger("change");
	$("#textbox_tanah_66").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 )	//.trigger("change");
	
	$("#textbox_tanah_64").number( true, 0 );
	$(".btn-tambah-bangunan").hide();
});

$(document).on("click", ".panel-head", function() {
	var role	= $(this).attr("aria-controls");
	window.history.pushState("object or string", "Title", window.location.pathname + "?role=" + role );
	
	tab_loaded.push(role)
	if (role === 'entry')
	{
		get_history_penilaian();
		get_ringkasan_laporan()
	}
	else if (role == "tanah")
	{
		get_data_legalitas(role);
		calculate_total_luas_tanah_data_legalitas('#table_data_legalitas_1');
	}
	else if (role == "dbanding")
	{
		get_pembanding();
		get_data_legalitas(role);
		// calculate_tab_pembanding();
		calculate_total_luas_tanah_data_legalitas('#table_data_legalitas_2');
	}
	
	var data_type = $(this).attr("data-type");
	
	if (data_type == "bangunan")
	{
		load_tab_bangunan(role);
		$(".btn-tambah-bangunan").show();
	}
	else
	{
		$(".btn-tambah-bangunan").hide();
	}
	
});

function initForm(id_lokasi){
		//alert('');
		$.ajax({
			url: base_url + "AjaxPekerjaan/get_info_bangunan/",
			type:'POST',
			//dataType: 'json',
			success: function(data) {
				$('#textbox_bangunan_131').html(data);
				var tipe = $('#hdn_tipe_bangunan').val();
				$('#textbox_bangunan_131').val(tipe);
				$('#textbox_bangunan_131')	//.trigger("change");
			}
		});
		
		$.ajax({
			url: base_url + "AjaxPekerjaan/get_klasifikasi_bangunan/",
			type:'POST',
			//dataType: 'json',
			success: function(data) {
				$('#textbox_bangunan_137').html(data);
				
				
			}
		});
}
function getKelasBangunan(role){
		var id = $("#" + role).find("select#textbox_bangunan_137").val();
		if (id != "")
		{
			$.ajax({
				type		: "POST",
				url 		: base_url + "AjaxPekerjaan/get_kelas_bangunan/",
				data		: {
					id 	: id
				},
				success		: function (data) {
					//alert($("#" + role).find("select#textbox_bangunan_138"));
					$("#" + role).find("select#textbox_bangunan_138").html(data);
					var val = $("#" + role).find("input#hdnKelasBangunan").val();
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
					//alert($("#" + role).find("select#textbox_bangunan_138"));
					$("#" + role).find("input#hdnKoefisien").val(data);
					
				},
			});
		}
		
}

$(document).on("change", "#textbox_bangunan_137", function(){
		//alert('');
	    var role = $(this).attr("data-keterangan");
		getKelasBangunan(role);
	});
$(document).on("change", ".langsung_element", function(){
		kalkulasiBiaya();
});	
$(document).on("change", "#jenis_renovasi", function(){
		kalkulasiBiaya();
});	
$(document).on("change", ".biaya_input", function(){
		kalkulasiBiaya();
});	
$(document).on("change", "#kelas_bangunan", function(){
		kalkulasiBiaya();
});	
function kalkulasiBiaya(role){
	//alert('');
	//Umur bangunan
	var tab_role	= role.split("_");
	if (tab_role.length > 2){
		role = tab_role[0] +"_"+ tab_role[1];
	}			
	var umur_efektif = 0;
	var tahun_penilaian = $("#" + role).find("input#textbox_bangunan_133").val(); 
	var tahun_bangun =   $("#" + role).find("input#textbox_bangunan_134").val(); 
	var tahun_renovasi = $("#" + role).find("input#textbox_bangunan_136").val();
	var jumlah_lantai = $("#" + role).find("select#textbox_bangunan_132").val();
	
	getKoefisien(role);
	var koefisien = $("#" + role).find("#hdnKoefisien").val();
	
	//alert(jumlah_lantai);
	//
	$("#jumlah_lantai_dinilai").html(jumlah_lantai);
	var jml_standard = $("#" + role).find("#jumlah_lantai_standard").val();
	
	umur_efektif = tahun_penilaian - tahun_bangun;
	
	if ($("#" + role).find("select#textbox_bangunan_135").val()=='Renovasi Sebagian'){
		umur_efektif = (tahun_penilaian - tahun_bangun)-((tahun_renovasi-tahun_bangun)/2);
	}
	if ($("#" + role).find("select#textbox_bangunan_135").val()=='Renovasi Total'){
		umur_efektif = tahun_penilaian - tahun_renovasi;
	}
	$("#" + role).find("input#textbox_bangunan_140").val(umur_efektif).attr("readonly", true).addClass("readonly");
	
	
	
	//Umur Ekonomis
	var kelas_bangunan = $("#" + role).find("select#textbox_bangunan_138").val(); //$('#kelas_bangunan').val();
	//alert(kelas_bangunan);
	//console.log('kelas:'+ kelas_bangunan);
	if (kelas_bangunan==null){
		kelas_bangunan = 0;
	}
	var umur_ekonomis = kelas_bangunan;
	$("#" + role).find("input#textbox_bangunan_139").val(umur_ekonomis).attr("readonly", true).addClass("readonly");
	
	//console.log('OK :' + role);


	
	//$(".table_biaya_langsung_" + role + " tr ").find("td").find("select[id=textbox_bangunan_157]").each(function(index) 
	var total_biaya2 = 0;
	var total_biaya1 = 0;
	//console.log('role:'+ role);
	
	//console.log('koefisien:'+ koefisien);
	$(".table_biaya_langsung_" + tab_role[1] + " tr ").find("input[id=textbox_bangunan_157]").each(function(index) 
	{
		var $row = $(this).closest("tr");    // Find the row
		var terpasang2 = $row.find("#textbox_bangunan_163").val();
		var material2 = $row.find("#textbox_bangunan_160").val();
		
		var harga2 = $row.find("#textbox_bangunan_164").val();
		var terpasang1 = 100;
		var harga1 = $row.find("#a_harga_1").val();
		
		
		$row.find("#textbox_bangunan_158").addClass("text-right").number( true, 1 );
		
		if (isNaN(harga1)){
			harga1 = 0;
		}
		if (jml_standard != jumlah_lantai && (index==0 || index==1)){
			$row.find("#textbox_bangunan_162").val("penyesuaian index lantai");
			$row.find("#textbox_bangunan_162").addClass("readonly");
		}
		
		if (terpasang2 !=''){
			terpasang1 = 100 - terpasang2;
			$row.find("#textbox_bangunan_159").val(terpasang1);
		}
		if(material2 ==''){
			material2 = 1.00;
		}
		$row.find("#textbox_bangunan_161").val(material2); 
		var imm = $row.find("#textbox_bangunan_161").val();
		/*
		console.log('harga1:'+ harga1);
		console.log('imm:'+ imm);
		console.log('terpasang1:'+ terpasang1);
		console.log('harga2:'+ harga2);
		console.log('terpasang2:'+ terpasang2);
		*/
	
		var harga2 = 0; 
		if (index==0 || index==1){
			harga2 = (parseFloat(harga1) * (parseFloat(imm) + 0) * parseFloat(terpasang1)); 
			harga2 = parseFloat(harga2) * parseFloat(koefisien);
		}else{
		    harga2 = (parseFloat(harga1) * (parseFloat(imm) + 0) * parseFloat(terpasang1)) + (parseFloat(harga2) * parseFloat(terpasang2)); 
		}
		harga2 = parseFloat(harga2) / 100;
		
		
		$row.find("#textbox_bangunan_163").addClass("text-right").number( true, 1 );
		$row.find("#textbox_bangunan_164").addClass("text-right").number( true, 0 );
		
		$row.find("#textbox_bangunan_165").val(harga2); 
		$row.find("#textbox_bangunan_165").number(true,0);
		if (isNaN(harga2)){
			harga2 = 0;
		}
		total_biaya2 = parseFloat(total_biaya2) + parseFloat(harga2);
	
		//console.log('asasa'+  $text);
		//$(".table_biaya_langsung_" + tab_role[1] + " tr ").find("input[id=textbox_bangunan_158]").get(index).val($(this).val());
	
	});
	
	
	var luas_mizzanen = $(".gudang_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_127]").val();
	var mizzanen = $(".table_biaya_langsung_" + tab_role[1] + " th ").find("select[id=textbox_bangunan_166]").val();
	if (mizzanen ==''){
		mizzanen = 0;
	}
	$(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_168]").val(mizzanen);
	$(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_168]").number(true,0);
	
	mizzanen = $(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_168]").val();
	if (mizzanen ==''){
		mizzanen = 0;
	}
	var luas_bangunan = $("#" + role).find("input#textbox_bangunan_5").val();
	
	//console.log('Luas:'+ luas_mizzanen);
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
	//console.log('Biaya2:'+ total_biaya2);
	
	$(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_174]").val(total_biaya2);
	$(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_174]").number(true,0);
	
	
	//console.log('luas_mizzanen:'+ luas_mizzanen);
	
	var jml = $('#biaya_jumlah').val();
	var total = 0;
	/*
	for(var i=0;i<jml;i++){
		var imm = $("#a_element_2_"+ i).val();
		if (imm==''){
			imm = 1.00;
		}
		var a_harga_1 =  $("#a_harga_1_"+ i).val();
		var a_terpasang_1 =  $("#a_terpasang_1_"+ i).val();
		
		var a_harga_2 =  $("#a_harga_2_"+ i).val();
		var a_terpasang_2 =  $("#a_terpasang_2_"+ i).val();
		
		var subtotal = 0;
		
		subtotal = (a_harga_1 * imm)+(a_harga_2 * a_terpasang_2);
		total = total + subtotal;
		subtotal = parseFloat(subtotal).toFixed(0);
		
		$("#a_imm_"+ i).val(imm);
		$("#a_subtotal_"+ i).val(addCommas(subtotal));
		
	}
	if (total==''){
		total = 0;
	}
	
	a_total_2 = parseFloat(total).toFixed(0);
	if (a_total_2==''){
		a_total_2 = 0;
	}
	$("#a_total_2").val(a_total_2);
	$("#a_total_2_display").val(addCommas(a_total_2));
	
	var a_total_1 = $("#a_total_1").val();
	//alert(a_total_1);
	if (isNaN(a_total_1)) {
		a_total_1 = 0;	
	}
	//a_total_1 = 0;
	//alert(a_total_1);
	*/
	var a_total_1 = 0;	
	var a_total_2 = 0;
	
	total_biaya1 = $(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_175]").val();
	
	a_total_1 = total_biaya1;
	
	var fee1 = 0;
	fee1 = (parseFloat(total_biaya1) * 0.03) + (parseFloat(total_biaya1) * 0.015) + (parseFloat(total_biaya1) * 0.01);
	//console.log('Fee:'+ fee1);
	$("#" + role).find("input#textbox_bangunan_141").val(fee1);
	$("#" + role).find("input#textbox_bangunan_141").addClass("readonly").addClass("text-right").number( true, 0 );
	
	var b_total_1 =  $("#" + role).find("input#textbox_bangunan_141").val();
	$("#" + role).find("input#textbox_bangunan_142").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("input#textbox_bangunan_142").val(b_total_1);
	
	var total_1 = parseFloat(b_total_1) + parseFloat(a_total_1);
	//total_1  = parseFloat(total_1).toFixed(0); 
	//$("#total_1").val(addCommas(total_1));
	$("#" + role).find("input#textbox_bangunan_143").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("input#textbox_bangunan_143").val(b_total_1);
	
	var ppn_1 = parseFloat(total_1) /10;
	//$("#ppn_1").val(addCommas(ppn_1));
	$("#" + role).find("input#textbox_bangunan_144").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("input#textbox_bangunan_144").val(ppn_1);
	
	
	var grand_1 = parseFloat(total_1) + parseFloat(ppn_1);
	//grand_1  = parseFloat(grand_1).toFixed(0); 
	//$("#grand_1").val(addCommas(grand_1));
	$("#" + role).find("input#textbox_bangunan_145").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("input#textbox_bangunan_145").val(grand_1);
	
	
	
	total_biaya2 = $(".table_biaya_langsung_" + tab_role[1] + " th ").find("input[id=textbox_bangunan_174]").val();
	
	a_total_2 = total_biaya2;
	
	var fee2 = 0;
	fee2 = (parseFloat(total_biaya2) * 0.03) + (parseFloat(total_biaya2) * 0.015) + (parseFloat(total_biaya2) * 0.01);
	
	
	$("#" + role).find("input#textbox_bangunan_146").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("input#textbox_bangunan_146").val(fee2);
	var b_total_2 = $("#" + role).find("input#textbox_bangunan_146").val();
	//console.log('aaa:'+ b_total_2);
	$("#" + role).find("input#textbox_bangunan_147").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("input#textbox_bangunan_147").val(b_total_2);
	
		
	var total_2 = parseFloat(b_total_2) + parseFloat(a_total_2);
	//total_2  = parseFloat(total_2).toFixed(0); 
	$("#" + role).find("input#textbox_bangunan_148").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("input#textbox_bangunan_148").val(total_2);
	//$("#total_2").val(addCommas(total_2));
	
	var ppn_2 = parseFloat(total_2) / 10;
	//$("#ppn_2").val(addCommas(ppn_2));
	$("#" + role).find("input#textbox_bangunan_149").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("input#textbox_bangunan_149").val(ppn_2);
	
	var grand_2 = parseFloat(total_2) + parseFloat(ppn_2);
	//grand_2  = parseFloat(grand_2).toFixed(0); 
	//$("#grand_2").val(addCommas(grand_2));
	$("#" + role).find("input#textbox_bangunan_150").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("input#textbox_bangunan_150").val(grand_2);
	
	var selisih = grand_2 - grand_1;
	//$("#selisih").val(addCommas(selisih));
	$("#" + role).find("input#textbox_bangunan_151").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("input#textbox_bangunan_151").val(selisih);
	
	//penyusutan_fisik
	var penyusutan_fisik = umur_efektif / umur_ekonomis * 100 ;
	//alert(umur_ekonomis);
	//alert(umur_efektif);
	if (isNaN(penyusutan_fisik) || penyusutan_fisik==Number.NEGATIVE_INFINITY ){
		penyusutan_fisik=0;
	}
	//$("#penyusutan_fisik").val(penyusutan_fisik);
	$("#" + role).find("input#textbox_bangunan_152").addClass("readonly");
	$("#" + role).find("input#textbox_bangunan_152").val(penyusutan_fisik);
	
	$("#" + role).find("input#textbox_bangunan_153").addClass("text-right").number( true, 0 ).attr('maxlength',3);
	var penyusutan_terlihat = $("#" + role).find("input#textbox_bangunan_153").val();
	//alert(penyusutan_terlihat);
	
	
	if (isNaN(penyusutan_terlihat)){
		penyusutan_terlihat=0;
	}
	//var penyusutan_fungsional = $("#penyusutan_fungsional").val();
	$("#" + role).find("input#textbox_bangunan_154").addClass("text-right").number( true, 0 ).attr('maxlength',3);
	var penyusutan_fungsional = $("#" + role).find("input#textbox_bangunan_154").val();
	
	
	
	if (isNaN(penyusutan_fungsional)){
		penyusutan_fungsional=0; 
	}
	//var penyusutan_ekonomis = $("#penyusutan_ekonomis").val();
	$("#" + role).find("input#textbox_bangunan_155").addClass("text-right").number( true, 0 ).attr('maxlength',3);
	var penyusutan_ekonomis = $("#" + role).find("input#textbox_bangunan_155").val();
	if (isNaN(penyusutan_ekonomis)){
		penyusutan_ekonomis=0;
	}

	var penyusutan_total = (parseFloat(penyusutan_fisik)+parseFloat(penyusutan_terlihat)) + ((100-parseFloat(penyusutan_fisik))* penyusutan_fungsional) +((100-parseFloat(penyusutan_fisik)) * penyusutan_ekonomis);  //((100*parseFloat(penyusutan_fungsional))+parseFloat(100*penyusutan_ekonomis)); 
	//penyusutan_total = parseFloat(penyusutan_total) / 100;
	$("#" + role).find("input#textbox_bangunan_156").addClass("readonly").addClass("text-right").number( true, 0 );
	$("#" + role).find("input#textbox_bangunan_156").val(penyusutan_total);
	//$("#penyusutan_total").val(penyusutan_total);.trigger("change")

	
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
	
	$("#kondisi_bangunan").text(kondisi_bangunan);
	
	var brb_m2 = 0;
	brb_m2 = total_2;
	
	$("#" + role).find("input#textbox_bangunan_176").val(brb_m2);
	$("#" + role).find("input#textbox_bangunan_176").addClass("readonly").addClass("text-right").number( true, 0 );
	//$("#" + role).find("input#textbox_bangunan_176")	//.trigger("change");
	
	
	
	//$("#brb_m2").val(addCommas(brb_m2));
	
	var brb = 0;
	brb = parseFloat($("#textbox_bangunan_5").val()) || 0 * parseFloat(brb_m2);
	$("#brb").val(addCommas(brb));
	
	var nilai_pasar_m2 = 0;
	nilai_pasar_m2 =  parseFloat(brb_m2) * (parseFloat(1-penyusutan_total/100));
	nilai_pasar_m2  = parseFloat(nilai_pasar_m2).toFixed(0);
	$("#nilai_pasar_m2").val(addCommas(nilai_pasar_m2));
	
	var nilai_pasar = 0;
	nilai_pasar = parseFloat(brb) * (parseFloat(1-penyusutan_total/100));
	nilai_pasar  = parseFloat(nilai_pasar).toFixed(0);
	$("#nilai_pasar").val(addCommas(nilai_pasar));
	
			
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
/*
$(document).on("change", "#textbox_bangunan_131", function(){
		//alert($(this).data('keterangan'));
		getBiayaLangsung();
});	*/
function getBiayaLangsung(role){
	    var tab_role	= role.split("_");
		
		var id = $("#" + role).find("select#textbox_bangunan_131").val();
	  	if (id != "")
		{
			$.ajax({
				type		: "POST",
				url 		: base_url + "AjaxPekerjaan/get_biaya_langsung/",
				data		: {
					id 	: id,
					role : role,
					id_lokasi 	: $("#id_lokasi").val(),
				},
				success		: function (data) {
					$("#" + role).find("#div_biaya_langsung").html(data); //$('#div_biaya_langsung').html(data);
					var obj = $("#" + role).find("select#textbox_bangunan_131");
					var jmlLantai = $('option:selected', obj).attr('lantai'); 
					$("#" + role).find("#jumlah_lantai_standard").html(jmlLantai);	
					kalkulasiBiaya(role);
					/*
					$(".table_biaya_langsung_" + tab_role[1] + " tr ").find("input[id=textbox_bangunan_157]").each(function(index) 
					{
						var $row = $(this).closest("tr");    // Find the row
						var $terpasang2 = $row.find("#textbox_bangunan_163").val();
						var $material2 = $row.find("#textbox_bangunan_160").val();
						if ($terpasang2 !=''){
							
						}
						if($material2 !=''){
							$row.find("#textbox_bangunan_161").val($material2); 
						}
						//console.log('ADAD');
						//console.log('asasa'+  $text);
						//$(".table_biaya_langsung_" + tab_role[1] + " tr ").find("input[id=textbox_bangunan_158]").get(index).val($(this).val());
					
					});*/
					
				},
			});
		}
		
		
}

$(document).on("change", ".table_input", function()
{
	var id_lokasi	= $("#id_lokasi").val();
	var id_field	= $(this).attr("data-id-field");
	var type		= $(this).attr("type");
	var value		= $(this).val();
	
	
	if ($(this).attr("data-keterangan"))
	{
		var keterangan	= $(this).attr("data-keterangan");
	}
	else
	{
		var keterangan	= "";
	}
	
	if (type == "checkbox")
	{
		var id	= $(this).attr("id");
		
		if ($("#" + id).is(":checked")){
			value = 1;
		}else{
			value = 0
		}
	}
	
	if (id_field != undefined || id_field != "")
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/update_textbox_kertas_kerja/",
			data		: {
				id_lokasi 	: id_lokasi,
				id_field	: id_field,
				value		: value,
				keterangan	: keterangan
			},
			success		: function (data) {
				if ($(this).attr("data-keterangan")){
					calculate_total_luas_tanah_data_legalitas();
				}
			},
		});
	}
	
	
	if (id_field == "10")
	{
		$("#textbox_tanah_1").val(value)	//.trigger("change");
	}
	// else if (id_field == "971")
	// {
	// 	$("#textbox_entry_37").val(value)	//.trigger("change");
	// }
	// else if (id_field == "970")
	// {
	// 	$("#textbox_entry_38").val(value)	//.trigger("change");
	// }
	// else if (id_field == "972")
	// {
	// 	$("#textbox_entry_39").val(value)	//.trigger("change");
	// }
	// else if (id_field == "973")
	// {
	// 	$("#textbox_entry_40").val(value)	//.trigger("change");
	// }
	else if (id_field == "14")
	{
		$("#textbox_tanah_2").val(value)	//.trigger("change");
	}
	else if (id_field == "16")
	{
		$("#textbox_tanah_3").val(value)	//.trigger("change");
	}
	else if (id_field == "9")
	{
		$(".tanah-td-tanggal-inspeksi").html(value)	//.trigger("change");
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
		var role	= $(this).attr("data-keterangan");
		hitung_bct_bangunan(role);
	}
	else if (id_field == "656")
	{
		var role	= $(this).attr("data-keterangan");
		
		if ($(".input_657_" + role).val() == "" || $(".input_657_" + role).val() == 0)
		{
			$(".input_657_" + role).val(value)	//.trigger("change");
			hitung_bct_bangunan(role);
		}
		
	}
	
	// Update sarana pelengkap
	else if ((id_field == "672" || id_field == "673" || id_field == "674" || id_field == "676" || id_field == "683" || id_field == "671" || id_field == "671" || id_field == "678" || id_field == "680" || id_field == "682" || id_field == "675") && keterangan == "Bangunan_1")
	{
		update_sarana_pelengkap();
	}
	
	// else if (id_field == 897 || id_field == 898 || id_field == 899 || id_field == 900)
	// {
	// 	$.ajax({
	// 		type		: "POST",
	// 		url 		: base_url + "AjaxPekerjaan/get_alamat/",
	// 		data		: {
	// 			id_lokasi		: $("#id_lokasi").val(),
	// 			dh_provinsi		: $("#textbox_entry_33").val(),
	// 			dh_kota			: $("#textbox_entry_34").val(),
	// 			dh_kecamatan	: $("#textbox_entry_35").val(),
	// 			dh_desa			: $("#textbox_entry_36").val()
	// 		},
	// 		success		: function (data) {
	// 			$("#textbox_entry_18").val(data)	//.trigger("change");
	// 		}
	// 	});
	// }
	else if (id_field == 912 )
	{
		var role	= $(this).attr("data-keterangan");
		getBiayaLangsung(role);
		
	}
	else if (id_field >= 913 && id_field <= 957 )
	{
		var role	= $(this).attr("data-keterangan");
		
		if (role !=''){
			kalkulasiBiaya(role);
		}
	}
	//var role	= $(this).attr("data-keterangan");
	var role	= $(this).attr("data-keterangan");
	
	
	
	if (keterangan != "")
	{
		keterangan	= keterangan.split(" ");
		if (keterangan.length == 2)
		{
			hitung_luas_fisik_bangunan(keterangan[1]);
		}
	}
	
	
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
});

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
		/*var data	= $("#form-kertas-kerja").serialize();*/
		/*console.log(data);*/
		
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

// For Upload file
$(function()
{
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
								$("#image_lampiran").append(data);
								$("#multi_image").val("");
								$("#multi_urut").val("");
								$("#multi_keterangan").val("");
							}
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
			
			/*alert(elt);*/
			
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

	/*$('form').on('submit', uploadFiles);*/

	// Grab the files and set them to our variable
	function prepareUpload(event, data_name_field, data_id_field, data_keterangan)
	{
		files = event.target.files;
		/*console.log(files);*/
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
            	if (data != "")
            	{
            		
            		if (data_keterangan == "")
            		{
						$("#textbox_" + data_name_field).val(data).trigger("change");
						$("#img_" + data_name_field).attr("src",  base_url + "asset/file/" + data);
					}
					else
					{
						$(".textbox-" + data_id_field + "-" + data_keterangan).val(data).trigger("change");
						$(".img-" + data_id_field + "-" + data_keterangan).attr("src", base_url + "asset/file/" + data);
					}
				}
            }
        });
    }
});

function get_data_legalitas(target)
{
	var terget_tab	= "";
	if (target == "tanah"){
		var terget_tab			= "#table_data_legalitas_1";
		var terget_tab_tbody	= "#tbody_data_legalitas_1";
		var target_url			= base_url + "AjaxPekerjaan/get_data_legalitas/";
		
	}else if (target == "dbanding"){
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
			$.each(data.data_table, function(i, item) 
			{
				row	= "<tr>";
				
				row	+= "<td align='center'>" + i + "</td>";
				$.each(item, function(j, item1) 
				{
					if (j == "tanah_60"){
						row	+= "<td td-type='total'>" + item1 + "</td>";
					}else if (j == "tanah_68"){
						row	+= "<td td-type='bobot'>" + item1 + "</td>";
					}else if (j == "tanah_69"){
						row	+= "<td td-type='indikasi'>" + item1 + "</td>";
					}else if (j == "tanah_70"){
						row	+= "<td td-type='total_nilai_tanah'>" + item1 + "</td>";
					}else{
						row	+= "<td>" + item1 + "</td>";
					}
					/*row	+= "<td>" + j + "</td>";*/
					/*row	+= "<td>" + item1 + "</td>";*/
				});
				
				row	+= "</tr>";
				$(terget_tab_tbody).append(row);
				a++;
			});
			
			$("#total_data_legalitas").val(a);
			$(".default-date-picker").datepicker();
			calculate_total_luas_tanah_data_legalitas(terget_tab);

			$(".input_259_0, .input_278_0").attr("readonly", true).addClass("readonly").val($(".input_154_1 option:selected").val())	//.trigger("change");
			
			if (getUrlParameter("role"))
			{
				role = getUrlParameter("role");
			}

			if (role === 'tanah')
			{

			}
			else if (role === 'dbanding')
			{
			}
			else
			{
			}
			style_after_ajax_pembanding();
			calculate_tab_pembanding();

		}
	});

	get_ringkasan_laporan();
}

function calculate_total_luas_tanah_data_legalitas(terget_tab)
{
	total_luas_tanah	= 0;
	/*console.log($('.table_data_legalitas tbody tr').html());*/
	
	$(terget_tab + ' > tbody > tr').each(function(){
		/*console.log($(this ).html());*/
		
		
		$(this).find('td').each (function() {
			if ($(this).attr("td-type") == "total")
			{
				$(this).find('input').addClass("text-right");
				if ($(this).find('input').val() != ""){
					total_luas_tanah += parseFloat($(this).find('input').val());
					/*console.log($(this).find('input').val());*/
				}
			}
		 	
		}); 
	});
	
	/*console.log(total_luas_tanah);*/
	$(terget_tab).find("#textbox_tanah_61").val(total_luas_tanah) .trigger("change");
	var luasTanahDinilai = total_luas_tanah-(parseFloat($("#textbox_tanah_62").val())||0)
	$("#luas-tanah-dinilai").val(luasTanahDinilai)
}

$(document).on("change", "#table_data_legalitas_1 > tbody > tr > td > input", function()
{
	calculate_total_luas_tanah_data_legalitas("#table_data_legalitas_1");
});

$(document).on("change", "#table_data_legalitas_2 > tbody > tr > td > input", function()
{
	calculate_total_luas_tanah_data_legalitas("#table_data_legalitas_2");
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
		$(this).val(0)	//.trigger("change");
	}
    /*
    // Ensure that it is a number and stop the keypress
    else if ($(this).val() > max){
    	console.log($(this).val());
    	console.log(max);
    	
		e.preventDefault();
		$(this).val(100)	//.trigger("change");
	}*/
});


// Form Sarana Pelengkap
$('#textbox_sarana_2, #textbox_sarana_4, #textbox_sarana_7, #textbox_sarana_8, #textbox_sarana_10, #textbox_sarana_13, #textbox_sarana_14, #textbox_sarana_16, #textbox_sarana_18, #textbox_sarana_19, #textbox_sarana_21, #textbox_sarana_23, #textbox_sarana_24, #textbox_sarana_26, #textbox_sarana_30, #textbox_sarana_32, #textbox_sarana_35, #textbox_sarana_36, #textbox_sarana_38, #textbox_sarana_40, #textbox_sarana_41, #textbox_sarana_42, #textbox_sarana_44, #textbox_sarana_47, #textbox_sarana_48, #textbox_sarana_50, #textbox_sarana_52, #textbox_sarana_53, #textbox_sarana_54, #textbox_sarana_56, #textbox_sarana_59, #textbox_sarana_60, #textbox_sarana_62, #textbox_sarana_65, #textbox_sarana_66, #textbox_sarana_68, #textbox_sarana_70, #textbox_sarana_71, #textbox_sarana_72, #textbox_sarana_74, #textbox_sarana_76, #textbox_sarana_77, #textbox_sarana_78, #textbox_sarana_80, #textbox_sarana_83, #textbox_sarana_84, #textbox_sarana_86, #textbox_sarana_90, #textbox_sarana_91, #textbox_sarana_92, #textbox_sarana_94, #textbox_sarana_96, #textbox_sarana_97, #textbox_sarana_98, #textbox_sarana_100, #textbox_sarana_102, #textbox_sarana_103, #textbox_sarana_104, #textbox_sarana_106, #textbox_sarana_108, #textbox_sarana_109, #textbox_sarana_110, #textbox_sarana_112, #textbox_sarana_90, #textbox_sarana_91, #textbox_sarana_92, #textbox_sarana_94, #textbox_sarana_96, #textbox_sarana_97, #textbox_sarana_98, #textbox_sarana_100, #textbox_sarana_102, #textbox_sarana_103, #textbox_sarana_104, #textbox_sarana_106, #textbox_sarana_108, #textbox_sarana_109, #textbox_sarana_110, #textbox_sarana_112, #textbox_sarana_120, #textbox_sarana_121, #textbox_sarana_123').change(function(){
	update_sarana_pelengkap();
});

function update_sarana_pelengkap()
{
	// declare Variable
	{
		var rcn1 = 0;	var pasar1 = 0;
		var rcn2 = 0;	var pasar2 = 0;
		var rcn3 = 0;	var pasar3 = 0;
		var rcn4 = 0;	var pasar4 = 0;
		var rcn5 = 0;	var pasar5 = 0;
		var rcn6 = 0;	var pasar6 = 0;
		var rcn7 = 0;	var pasar7 = 0;
		var rcn8 = 0;	var pasar8 = 0;
		var rcn9 = 0;	var pasar9 = 0;
		var rcn10 = 0;	var pasar10 = 0;
		var rcn11 = 0;	var pasar11 = 0;
		var rcn12 = 0;	var pasar12 = 0;
		var rcn13 = 0;	var pasar13 = 0;
		var rcn14 = 0;	var pasar14 = 0;
		var rcn15 = 0;	var pasar15 = 0;
		
		var rcn16 = 0;	var pasar16 = 0;
		var rcn17 = 0;	var pasar17 = 0;
		var rcn18 = 0;	var pasar18 = 0;
		var rcn19 = 0;	var pasar19 = 0;
		var rcn20 = 0;	var pasar20 = 0;

	}
	
	
	if ($(".input_674_Bangunan_1").length)
	{
		$("#textbox_sarana_12").val($(".input_674_Bangunan_1").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
	}
	else
	{
		$("#textbox_sarana_12").attr("readonly", true).addClass("readonly");
	}
	
	// daya_listrik
	{
		if ($(".input_672_Bangunan_1").length)
		{
			$("#textbox_sarana_1").val($(".input_672_Bangunan_1").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
		}
		else
		{
			$("#textbox_sarana_1").attr("readonly", true).addClass("readonly");
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
		$("#textbox_sarana_3").val(rcn1)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_5").val(pasar1)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// jaringan_telepon
	{
		if ($(".input_673_Bangunan_1").length)
		{
			$("#textbox_sarana_6").val($(".input_673_Bangunan_1").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
		}
		else
		{
			$("#textbox_sarana_6").attr("readonly", true).addClass("readonly");
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
		$("#textbox_sarana_9").val(rcn2)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_11").val(pasar2)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// air_bersih
	{
		var air_bersih		= parseFloat($("#textbox_sarana_13").val()) ? parseFloat($("#textbox_sarana_13").val()) || 0 : 0;
		var satuan3			= parseFloat($("#textbox_sarana_14").val()) ? parseFloat($("#textbox_sarana_14").val()) || 0 : 0;
		var dep3			= parseFloat($("#textbox_sarana_16").val()) ? parseFloat($("#textbox_sarana_16").val()) || 0 : 0;
		
		rcn3 	= air_bersih * satuan3;
		pasar3	= rcn3 - (rcn3 * dep3 / 100);
		
		$("#textbox_sarana_14").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_15").val(rcn3)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_17").val(pasar3)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// sumur_bor
	{
		var sumur_bor		= parseFloat($("#textbox_sarana_18").val()) ? parseFloat($("#textbox_sarana_18").val()) || 0 : 0;
		var satuan4			= parseFloat($("#textbox_sarana_19").val()) ? parseFloat($("#textbox_sarana_19").val()) || 0 : 0;
		var dep4			= parseFloat($("#textbox_sarana_21").val()) ? parseFloat($("#textbox_sarana_21").val()) || 0 : 0;
		
		rcn4 	= sumur_bor * satuan4;
		pasar4	= rcn4 - (rcn4 * dep4 / 100);
		
		$("#textbox_sarana_19").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_20").val(rcn4)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_22").val(pasar4)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// sumur_dalam
	{
		var sumur_dalam		= parseFloat($("#textbox_sarana_23").val()) ? parseFloat($("#textbox_sarana_23").val()) || 0 : 0;
		var satuan5			= parseFloat($("#textbox_sarana_24").val()) ? parseFloat($("#textbox_sarana_24").val()) || 0 : 0;
		var dep5			= parseFloat($("#textbox_sarana_26").val()) ? parseFloat($("#textbox_sarana_26").val()) || 0 : 0;
		
		rcn5 	= sumur_dalam * satuan5;
		pasar5	= rcn5 - (rcn5 * dep5 / 100);
		
		$("#textbox_sarana_24").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_25").val(rcn5)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_27").val(pasar5)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// ac
	{
		if ($(".input_676_Bangunan_1").length)
		{
			$("#textbox_sarana_28").val($(".input_676_Bangunan_1").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
		}
		else
		{
			$("#textbox_sarana_28").attr("readonly", true).addClass("readonly");
		}
		
		if ($(".input_675_Bangunan_1").length)
		{
			$("#textbox_sarana_29").val($(".input_675_Bangunan_1").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
		}
		else
		{
			$("#textbox_sarana_29").attr("readonly", true).addClass("readonly");
		}
		
		var ac				= parseFloat($("#textbox_sarana_29").val()) ? parseFloat($("#textbox_sarana_29").val()) || 0 : 0;
		var satuan6			= parseFloat($("#textbox_sarana_30").val()) ? parseFloat($("#textbox_sarana_30").val()) || 0 : 0;
		var dep6			= parseFloat($("#textbox_sarana_32").val()) ? parseFloat($("#textbox_sarana_32").val()) || 0 : 0;
		
		rcn6 	= ac * satuan6;
		pasar6	= rcn6 - (rcn6 * dep6 / 100);
		
		$("#textbox_sarana_30").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_31").val(rcn6)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_33").val(pasar6)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// carpot
	{
		if ($(".input_683_Bangunan_1").length)
		{
			$("#textbox_sarana_34").val($(".input_683_Bangunan_1").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
		}
		else
		{
			$("#textbox_sarana_34").attr("readonly", true).addClass("readonly");
		}
		
		var objek			= parseFloat($("#textbox_sarana_35").val()) ? parseFloat($("#textbox_sarana_35").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_36").val()) ? parseFloat($("#textbox_sarana_36").val()) || 0 : 0;
		var dep7			= parseFloat($("#textbox_sarana_38").val()) ? parseFloat($("#textbox_sarana_38").val()) || 0 : 0;
		
		rcn7 	= objek * satuan;
		pasar7	= rcn7 - (rcn7 * dep7 / 100);
		
		$("#textbox_sarana_36").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_37").val(rcn7)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_39").val(pasar7)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// perkerasan
	{	
		var objek			= parseFloat($("#textbox_sarana_41").val()) ? parseFloat($("#textbox_sarana_41").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_42").val()) ? parseFloat($("#textbox_sarana_42").val()) || 0 : 0;
		var dep8			= parseFloat($("#textbox_sarana_44").val()) ? parseFloat($("#textbox_sarana_44").val()) || 0 : 0;
		
		rcn8 	= objek * satuan;
		pasar8	= rcn8 - (rcn8 * dep8 / 100);
		
		$("#textbox_sarana_42").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_43").val(rcn8)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_45").val(pasar8)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// pintu pagar
	{
		if ($(".input_671_Bangunan_1").length)
		{
			$("#textbox_sarana_46").val($(".input_671_Bangunan_1").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
		}
		else
		{
			$("#textbox_sarana_46").attr("readonly", true).addClass("readonly");
		}
		
		var objek			= parseFloat($("#textbox_sarana_47").val()) ? parseFloat($("#textbox_sarana_47").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_48").val()) ? parseFloat($("#textbox_sarana_48").val()) || 0 : 0;
		var dep9			= parseFloat($("#textbox_sarana_50").val()) ? parseFloat($("#textbox_sarana_50").val()) || 0 : 0;
		
		rcn9 	= objek * satuan;
		pasar9	= rcn9 - (rcn9 * dep9 / 100);
		
		$("#textbox_sarana_48").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_49").val(rcn9)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_51").val(pasar9)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// pagar halaman
	{	
		var objek			= parseFloat($("#textbox_sarana_53").val()) ? parseFloat($("#textbox_sarana_53").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_54").val()) ? parseFloat($("#textbox_sarana_54").val()) || 0 : 0;
		var dep10			= parseFloat($("#textbox_sarana_56").val()) ? parseFloat($("#textbox_sarana_56").val()) || 0 : 0;
		
		rcn10 	= objek * satuan;
		pasar10	= rcn10 - (rcn10 * dep10 / 100);
		
		$("#textbox_sarana_54").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_55").val(rcn10)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_57").val(pasar10)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// pemanas air
	{
		if ($(".input_678_Bangunan_1").length)
		{
			$("#textbox_sarana_58").val($(".input_678_Bangunan_1").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
		}
		else
		{
			$("#textbox_sarana_58").attr("readonly", true).addClass("readonly");
		}
		
		
		var objek			= parseFloat($("#textbox_sarana_59").val()) ? parseFloat($("#textbox_sarana_59").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_60").val()) ? parseFloat($("#textbox_sarana_60").val()) || 0 : 0;
		var dep11			= parseFloat($("#textbox_sarana_62").val()) ? parseFloat($("#textbox_sarana_62").val()) || 0 : 0;
		
		rcn11 	= objek * satuan;
		pasar11	= rcn11 - (rcn11 * dep11 / 100);
		
		$("#textbox_sarana_60").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_61").val(rcn11)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_63").val(pasar11)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// penangkal petir
	{
		if ($(".input_680_Bangunan_1").length)
		{
			$("#textbox_sarana_64").val($(".input_680_Bangunan_1").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
		}
		else
		{
			$("#textbox_sarana_64").attr("readonly", true).addClass("readonly");
		}
		
		
		var objek			= parseFloat($("#textbox_sarana_65").val()) ? parseFloat($("#textbox_sarana_65").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_66").val()) ? parseFloat($("#textbox_sarana_66").val()) || 0 : 0;
		var dep12			= parseFloat($("#textbox_sarana_68").val()) ? parseFloat($("#textbox_sarana_68").val()) || 0 : 0;
		
		rcn12 	= objek * satuan;
		pasar12	= rcn12 - (rcn12 * dep12 / 100);
		
		$("#textbox_sarana_66").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_67").val(rcn12)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_69").val(pasar12)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// Gapura
	{
		var objek			= parseFloat($("#textbox_sarana_71").val()) ? parseFloat($("#textbox_sarana_71").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_72").val()) ? parseFloat($("#textbox_sarana_72").val()) || 0 : 0;
		var dep13			= parseFloat($("#textbox_sarana_74").val()) ? parseFloat($("#textbox_sarana_74").val()) || 0 : 0;
		
		rcn13 	= objek * satuan;
		pasar13	= rcn13 - (rcn13 * dep13 / 100);
		
		$("#textbox_sarana_72").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_73").val(rcn13)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_75").val(pasar13)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// Toren
	{
		
		var objek			= parseFloat($("#textbox_sarana_77").val()) ? parseFloat($("#textbox_sarana_77").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_78").val()) ? parseFloat($("#textbox_sarana_78").val()) || 0 : 0;
		var dep14			= parseFloat($("#textbox_sarana_80").val()) ? parseFloat($("#textbox_sarana_80").val()) || 0 : 0;
		
		rcn14 	= objek * satuan;
		pasar14	= rcn14 - (rcn14 * dep14 / 100);
		
		$("#textbox_sarana_78").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_79").val(rcn14)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_81").val(pasar14)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// Kolam Renang
	{
		if ($(".input_682_Bangunan_1").length)
		{
			$("#textbox_sarana_82").val($(".input_682_Bangunan_1").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
		}
		else
		{
			$("#textbox_sarana_82").attr("readonly", true).addClass("readonly");
		}
		
		var objek			= parseFloat($("#textbox_sarana_83").val()) ? parseFloat($("#textbox_sarana_83").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_84").val()) ? parseFloat($("#textbox_sarana_84").val()) || 0 : 0;
		var dep15			= parseFloat($("#textbox_sarana_86").val()) ? parseFloat($("#textbox_sarana_86").val()) || 0 : 0;
		
		rcn15 	= objek * satuan;
		pasar15	= rcn15 - (rcn15 * dep15 / 100);
		
		$("#textbox_sarana_84").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_85").val(rcn15)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_87").val(pasar15)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// lAINNYA
	{
		var lainnya		= parseFloat($("#textbox_sarana_120").val()) ? parseFloat($("#textbox_sarana_120").val()) || 0 : 0;
		var satuan		= parseFloat($("#textbox_sarana_121").val()) ? parseFloat($("#textbox_sarana_121").val()) || 0 : 0;
		var dep			= parseFloat($("#textbox_sarana_123").val()) ? parseFloat($("#textbox_sarana_123").val()) || 0 : 0;
		
		rcn20 	= lainnya * satuan;
		pasar20	= rcn20 - (rcn20 * dep / 100);
		
		$("#textbox_sarana_121").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_122").val(rcn20)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_124").val(pasar20)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	{
		
		var objek			= parseFloat($("#textbox_sarana_91").val()) ? parseFloat($("#textbox_sarana_91").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_92").val()) ? parseFloat($("#textbox_sarana_92").val()) || 0 : 0;
		var dep16			= parseFloat($("#textbox_sarana_94").val()) ? parseFloat($("#textbox_sarana_94").val()) || 0 : 0;
		
		rcn16 	= objek * satuan;
		pasar16	= rcn16 - (rcn16 * dep16 / 100);
		
		$("#textbox_sarana_92").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_93").val(rcn16)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_95").val(pasar16)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	
		
		var objek			= parseFloat($("#textbox_sarana_97").val()) ? parseFloat($("#textbox_sarana_97").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_98").val()) ? parseFloat($("#textbox_sarana_98").val()) || 0 : 0;
		var dep17			= parseFloat($("#textbox_sarana_100").val()) ? parseFloat($("#textbox_sarana_100").val()) || 0 : 0;
		
		rcn17 	= objek * satuan;
		pasar17	= rcn17 - (rcn17 * dep17 / 100);
		
		$("#textbox_sarana_98").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_99").val(rcn17)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_101").val(pasar17)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		
		
		var objek			= parseFloat($("#textbox_sarana_103").val()) ? parseFloat($("#textbox_sarana_103").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_104").val()) ? parseFloat($("#textbox_sarana_104").val()) || 0 : 0;
		var dep18			= parseFloat($("#textbox_sarana_106").val()) ? parseFloat($("#textbox_sarana_106").val()) || 0 : 0;
		
		rcn18 	= objek * satuan;
		pasar18	= rcn18 - (rcn18 * dep18 / 100);
		
		$("#textbox_sarana_104").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_105").val(rcn18)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_107").val(pasar18)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		
		
		var objek			= parseFloat($("#textbox_sarana_109").val()) ? parseFloat($("#textbox_sarana_109").val()) || 0 : 0;
		var satuan			= parseFloat($("#textbox_sarana_110").val()) ? parseFloat($("#textbox_sarana_110").val()) || 0 : 0;
		var dep19			= parseFloat($("#textbox_sarana_112").val()) ? parseFloat($("#textbox_sarana_112").val()) || 0 : 0;
		
		rcn19 	= objek * satuan;
		pasar19	= rcn19 - (rcn19 * dep19 / 100);
		
		$("#textbox_sarana_110").number( true, 0 ).addClass("text-right");
		$("#textbox_sarana_111").val(rcn19)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_113").val(pasar19)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	// Total RCN & Nilai Pasar
	{
		var total_rcn	= rcn1 + rcn2 + rcn3 + rcn4 + rcn5 + rcn6 + rcn7 + rcn8 + rcn9 + rcn10 + rcn11 + rcn12 + rcn13 + rcn14 + rcn15 + rcn20;
		var total_pasar	= pasar1 + pasar2 + pasar3 + pasar4 + pasar5 + pasar6 + pasar7 + pasar8 + pasar9 + pasar10 + pasar11 + pasar12 + pasar13 + pasar14 + pasar15 + pasar20;
		
		var total_rcn2		= rcn16 + rcn17 + rcn18 + rcn19;
		var total_pasar2	= pasar16 + pasar17 + pasar18 + pasar19;
		
		$("#textbox_sarana_88").val(total_rcn)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_89").val(total_pasar)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		
		$("#textbox_sarana_114").val(total_rcn2)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_115").val(total_pasar2)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		
		$("#textbox_sarana_116").val(total_rcn + total_rcn2)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
		$("#textbox_sarana_117").val(total_pasar + total_pasar2)	//.trigger("change").attr("readonly", true).addClass("readonly").addClass("text-right").number( true, 0 );
	}
	
	get_ringkasan_laporan();
}

// Form Sarana Pelengkap

// Form Pembanding

function get_pembanding()
{
	return;
	$.ajax({
		type		: "POST",
		url 		: base_url + "AjaxPekerjaan/get_tab_pembanding/",
		beforeSend: function() {
			// $("#table_pembanding").html("<div class='text-center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></div>");
		},
		data		: {
			id_lokasi 	: $("#id_lokasi").val()
		},
		success		: function (data) {
			// $("#table_pembanding").html("");
			// $("#table_pembanding").html(data);
			
			setTimeout(function(){ calculate_tab_pembanding(); }, 3000);
			
		}
	});

	get_ringkasan_laporan();
}


$(document).on("change", ".input_255_1, .input_689_Bangunan_1, .input_256_1, .input_255_2, .input_256_2, .input_255_3, .input_256_3, .input_260_1, .input_260_2, .input_260_3, .input_277_1-0, .input_277_2-0, .input_277_3-0, .input_278_1-0, .input_278_2-0, .input_278_3-0, .input_279_1-0, .input_279_2-0, .input_279_3-0, .input_280_1-0, .input_280_2-0, .input_280_3-0, .input_281_1-0, .input_281_2-0, .input_281_3-0, .input_281_1-0, .input_281_2-0, .input_281_3-0, .input_282_1-0, .input_282_2-0, .input_282_3-0, .input_283_1-0, .input_283_2-0, .input_283_3-0, .input_284_1-0, .input_284_2-0, .input_284_3-0, .input_285_1-0, .input_285_2-0, .input_285_3-0, .input_286_1-0, .input_286_2-0, .input_286_3-0, .input_287_1-0, .input_287_2-0, .input_287_3-0, .input_288_1-0, .input_288_2-0, .input_288_3-0, .input_270_1, .input_270_2, .input_270_3, .input_272_1, .input_272_2, .input_272_3 ", function()
{
	calculate_tab_pembanding();
});


$(document).on("change", ".input_253_1, .input_253_2, .input_253_3, .input_259_1, .input_259_2, .input_259_3, .input_264_1, .input_264_2, .input_264_3, .input_265_0, .input_265_1, .input_265_2, .input_265_3, .input_266_0, .input_266_1, .input_266_2, .input_266_3, .input_267_0, .input_267_1, .input_267_2, .input_267_3, .input_269_0, .input_269_1, .input_269_2, .input_269_3, .input_258_1, .input_258_2, .input_258_3", function()
{
	style_after_ajax_pembanding();
});

function calculate_tab_pembanding()
{
	{
		var input_255_1 = parseFloat($(".input_255_1").val()) || 0;
		var input_256_1 = parseFloat($(".input_256_1").val()) || 0;
		var input_256_1 = parseFloat($(".input_256_1").val()) || 0;
		var input_260_1 = parseFloat($(".input_260_1").val()) || 0;
		var input_261_1 = parseFloat($(".input_261_1").val()) || 0;
		var input_270_1 = parseFloat($(".input_270_1").val()) || 0;
		var input_272_1 = parseFloat($(".input_272_1").val()) || 0;
		
		
		var input_257_1 = input_255_1 - (input_255_1 * input_256_1 / 100);
		var input_273_1 = input_270_1 * input_272_1 / 100;
		var input_271_1 = input_273_1 * input_261_1;
		var input_274_1 = input_257_1 - input_271_1;
		
		var input_276_1 = input_257_1 / input_260_1;
		
		$(".input_257_1").val(input_257_1)	//.trigger("change");
		$(".input_273_1").val(input_273_1)	//.trigger("change");
		$(".input_274_1").val(input_274_1)	//.trigger("change");
		$(".input_276_1").val(input_276_1)	//.trigger("change");
		$(".input_271_1").val(input_271_1)	//.trigger("change");
	}
	
	{
		var input_255_2 = parseFloat($(".input_255_2").val()) || 0;
		var input_256_2 = parseFloat($(".input_256_2").val()) || 0;
		var input_256_2 = parseFloat($(".input_256_2").val()) || 0;
		var input_260_2 = parseFloat($(".input_260_2").val()) || 0;
		var input_261_2 = parseFloat($(".input_261_2").val()) || 0;
		
		var input_270_2 = parseFloat($(".input_270_2").val()) || 0;
		var input_272_2 = parseFloat($(".input_272_2").val()) || 0;
		
		
		var input_257_2 = input_255_2 - (input_255_2 * input_256_2 / 100);
		var input_273_2 = input_270_2 * input_272_2 / 100;
		var input_271_2 = input_273_2 * input_261_2;
		var input_274_2 = input_257_2 - input_271_2;
		
		var input_276_2 = input_257_2 / input_260_2;
		
		$(".input_257_2").val(input_257_2)	//.trigger("change");
		$(".input_273_2").val(input_273_2)	//.trigger("change");
		$(".input_274_2").val(input_274_2)	//.trigger("change");
		$(".input_276_2").val(input_276_2)	//.trigger("change");
		$(".input_271_2").val(input_271_2)	//.trigger("change");
	}
	
	{
		var input_255_3 = parseFloat($(".input_255_3").val()) || 0;
		var input_256_3 = parseFloat($(".input_256_3").val()) || 0;
		var input_256_3 = parseFloat($(".input_256_3").val()) || 0;
		var input_260_3 = parseFloat($(".input_260_3").val()) || 0;
		var input_261_3 = parseFloat($(".input_261_3").val()) || 0;
		
		var input_270_3 = parseFloat($(".input_270_3").val()) || 0;
		var input_272_3 = parseFloat($(".input_272_3").val()) || 0;
		
		
		var input_257_3 = input_255_3 - (input_255_3 * input_256_3 / 100);
		var input_273_3 = input_270_3 * input_272_3 / 100;
		var input_271_3 = input_273_3 * input_261_3;
		var input_274_3 = input_257_3 - input_271_3;
		
		var input_276_3 = input_257_3 / input_260_3;
		
		$(".input_257_3").val(input_257_3)	//.trigger("change");
		$(".input_273_3").val(input_273_3)	//.trigger("change");
		$(".input_274_3").val(input_274_3)	//.trigger("change");
		$(".input_276_3").val(input_276_3)	//.trigger("change");
		$(".input_271_3").val(input_271_3)	//.trigger("change");
	}
	
	
	/*Penyesuaian*/
	{
		// var input_277_1_0	= parseFloat($(".input_277_1-0").val()) || 0;
		// var input_277_2_0	= parseFloat($(".input_277_2-0").val()) || 0;
		// var input_277_3_0	= parseFloat($(".input_277_3-0").val()) || 0;
		
		// var input_277_1_2	= input_277_1_0 * input_276_1 / 100;
		// var input_277_2_2	= input_277_2_0 * input_276_2 / 100;
		// var input_277_3_2	= input_277_3_0 * input_276_3 / 100;
		// var input_277_1_3	= input_277_1_2 * input_260_1;
		// var input_277_2_3	= input_277_2_2 * input_260_2;
		// var input_277_3_3	= input_277_3_2 * input_260_3;
		
		// $(".input_277_1-2").val(input_277_1_2)	//.trigger("change");
		// $(".input_277_2-2").val(input_277_2_2)	//.trigger("change");
		// $(".input_277_3-2").val(input_277_3_2)	//.trigger("change");
		// $(".input_277_1-3").val(input_277_1_3)	//.trigger("change");
		// $(".input_277_2-3").val(input_277_2_3)	//.trigger("change");
		// $(".input_277_3-3").val(input_277_3_3)	//.trigger("change");
		
		
		var input_278_1_0	= parseFloat($(".input_278_1-0").val()) || 0;
		var input_278_2_0	= parseFloat($(".input_278_2-0").val()) || 0;
		var input_278_3_0	= parseFloat($(".input_278_3-0").val()) || 0;
		
		var input_278_1_2	= input_278_1_0 * input_276_1 / 100;
		var input_278_2_2	= input_278_2_0 * input_276_2 / 100;
		var input_278_3_2	= input_278_3_0 * input_276_3 / 100;
		var input_278_1_3	= input_278_1_2 * input_260_1;
		var input_278_2_3	= input_278_2_2 * input_260_2;
		var input_278_3_3	= input_278_3_2 * input_260_3;
		
		$(".input_278_1-2").val(input_278_1_2)	//.trigger("change");
		$(".input_278_2-2").val(input_278_2_2)	//.trigger("change");
		$(".input_278_3-2").val(input_278_3_2)	//.trigger("change");
		$(".input_278_1-3").val(input_278_1_3)	//.trigger("change");
		$(".input_278_2-3").val(input_278_2_3)	//.trigger("change");
		$(".input_278_3-3").val(input_278_3_3)	//.trigger("change");
		
		var input_279_1_0	= parseFloat($(".input_279_1-0").val()) || 0;
		var input_279_2_0	= parseFloat($(".input_279_2-0").val()) || 0;
		var input_279_3_0	= parseFloat($(".input_279_3-0").val()) || 0;
		
		var input_279_1_2	= input_279_1_0 * input_276_1 / 100;
		var input_279_2_2	= input_279_2_0 * input_276_2 / 100;
		var input_279_3_2	= input_279_3_0 * input_276_3 / 100;
		var input_279_1_3	= input_279_1_2 * input_260_1;
		var input_279_2_3	= input_279_2_2 * input_260_2;
		var input_279_3_3	= input_279_3_2 * input_260_3;
		
		$(".input_279_1-2").val(input_279_1_2)	//.trigger("change");
		$(".input_279_2-2").val(input_279_2_2)	//.trigger("change");
		$(".input_279_3-2").val(input_279_3_2)	//.trigger("change");
		$(".input_279_1-3").val(input_279_1_3)	//.trigger("change");
		$(".input_279_2-3").val(input_279_2_3)	//.trigger("change");
		$(".input_279_3-3").val(input_279_3_3)	//.trigger("change");
		
		// var input_280_1_0	= parseFloat($(".input_280_1-0").val()) || 0;
		// var input_280_2_0	= parseFloat($(".input_280_2-0").val()) || 0;
		// var input_280_3_0	= parseFloat($(".input_280_3-0").val()) || 0;
		
		// var input_280_1_2	= input_280_1_0 * input_276_1 / 100;
		// var input_280_2_2	= input_280_2_0 * input_276_2 / 100;
		// var input_280_3_2	= input_280_3_0 * input_276_3 / 100;
		// var input_280_1_3	= input_280_1_2 * input_260_1;
		// var input_280_2_3	= input_280_2_2 * input_260_2;
		// var input_280_3_3	= input_280_3_2 * input_260_3;
		
		// $(".input_280_1-2").val(input_280_1_2)	//.trigger("change");
		// $(".input_280_2-2").val(input_280_2_2)	//.trigger("change");
		// $(".input_280_3-2").val(input_280_3_2)	//.trigger("change");
		// $(".input_280_1-3").val(input_280_1_3)	//.trigger("change");
		// $(".input_280_2-3").val(input_280_2_3)	//.trigger("change");
		// $(".input_280_3-3").val(input_280_3_3)	//.trigger("change");
		
		var input_281_1_0	= parseFloat($(".input_281_1-0").val()) || 0;
		var input_281_2_0	= parseFloat($(".input_281_2-0").val()) || 0;
		var input_281_3_0	= parseFloat($(".input_281_3-0").val()) || 0;
		
		var input_281_1_2	= input_281_1_0 * input_276_1 / 100;
		var input_281_2_2	= input_281_2_0 * input_276_2 / 100;
		var input_281_3_2	= input_281_3_0 * input_276_3 / 100;
		var input_281_1_3	= input_281_1_2 * input_260_1;
		var input_281_2_3	= input_281_2_2 * input_260_2;
		var input_281_3_3	= input_281_3_2 * input_260_3;
		
		$(".input_281_1-2").val(input_281_1_2)	//.trigger("change");
		$(".input_281_2-2").val(input_281_2_2)	//.trigger("change");
		$(".input_281_3-2").val(input_281_3_2)	//.trigger("change");
		$(".input_281_1-3").val(input_281_1_3)	//.trigger("change");
		$(".input_281_2-3").val(input_281_2_3)	//.trigger("change");
		$(".input_281_3-3").val(input_281_3_3)	//.trigger("change");
		
		
		
		
		var input_283_1_0	= parseFloat($(".input_283_1-0").val()) || 0;
		var input_283_2_0	= parseFloat($(".input_283_2-0").val()) || 0;
		var input_283_3_0	= parseFloat($(".input_283_3-0").val()) || 0;
		
		var input_283_1_1	= input_283_1_0 * input_276_1 / 100;
		var input_283_2_1	= input_283_2_0 * input_276_2 / 100;
		var input_283_3_1	= input_283_3_0 * input_276_3 / 100;
		var input_283_1_2	= input_283_1_1 * input_260_1;
		var input_283_2_2	= input_283_2_1 * input_260_2;
		var input_283_3_2	= input_283_3_1 * input_260_3;
		
		$(".input_283_1-1").val(input_283_1_1)	//.trigger("change");
		$(".input_283_2-1").val(input_283_2_1)	//.trigger("change");
		$(".input_283_3-1").val(input_283_3_1)	//.trigger("change");
		$(".input_283_1-2").val(input_283_1_2)	//.trigger("change");
		$(".input_283_2-2").val(input_283_2_2)	//.trigger("change");
		$(".input_283_3-2").val(input_283_3_2)	//.trigger("change");
		
		var input_284_1_0	= parseFloat($(".input_284_1-0").val()) || 0;
		var input_284_2_0	= parseFloat($(".input_284_2-0").val()) || 0;
		var input_284_3_0	= parseFloat($(".input_284_3-0").val()) || 0;
		
		var input_284_1_1	= input_284_1_0 * input_276_1 / 100;
		var input_284_2_1	= input_284_2_0 * input_276_2 / 100;
		var input_284_3_1	= input_284_3_0 * input_276_3 / 100;
		var input_284_1_2	= input_284_1_1 * input_260_1;
		var input_284_2_2	= input_284_2_1 * input_260_2;
		var input_284_3_2	= input_284_3_1 * input_260_3;
		
		$(".input_284_1-1").val(input_284_1_1)	//.trigger("change");
		$(".input_284_2-1").val(input_284_2_1)	//.trigger("change");
		$(".input_284_3-1").val(input_284_3_1)	//.trigger("change");
		$(".input_284_1-2").val(input_284_1_2)	//.trigger("change");
		$(".input_284_2-2").val(input_284_2_2)	//.trigger("change");
		$(".input_284_3-2").val(input_284_3_2)	//.trigger("change");
		
		
		
		// var input_285_1_0	= parseFloat($(".input_285_1-0").val()) || 0;
		// var input_285_2_0	= parseFloat($(".input_285_2-0").val()) || 0;
		// var input_285_3_0	= parseFloat($(".input_285_3-0").val()) || 0;
		
		// var input_285_1_2	= input_285_1_0 * input_276_1 / 100;
		// var input_285_2_2	= input_285_2_0 * input_276_2 / 100;
		// var input_285_3_2	= input_285_3_0 * input_276_3 / 100;
		// var input_285_1_3	= input_285_1_2 * input_260_1;
		// var input_285_2_3	= input_285_2_2 * input_260_2;
		// var input_285_3_3	= input_285_3_2 * input_260_3;
		
		// $(".input_285_1-2").val(input_285_1_2)	//.trigger("change");
		// $(".input_285_2-2").val(input_285_2_2)	//.trigger("change");
		// $(".input_285_3-2").val(input_285_3_2)	//.trigger("change");
		// $(".input_285_1-3").val(input_285_1_3)	//.trigger("change");
		// $(".input_285_2-3").val(input_285_2_3)	//.trigger("change");
		// $(".input_285_3-3").val(input_285_3_3)	//.trigger("change");
		
		var input_286_1_0	= parseFloat($(".input_286_1-0").val()) || 0;
		var input_286_2_0	= parseFloat($(".input_286_2-0").val()) || 0;
		var input_286_3_0	= parseFloat($(".input_286_3-0").val()) || 0;
		
		var input_286_1_2	= input_286_1_0 * input_276_1 / 100;
		var input_286_2_2	= input_286_2_0 * input_276_2 / 100;
		var input_286_3_2	= input_286_3_0 * input_276_3 / 100;
		var input_286_1_3	= input_286_1_2 * input_260_1;
		var input_286_2_3	= input_286_2_2 * input_260_2;
		var input_286_3_3	= input_286_3_2 * input_260_3;
		
		$(".input_286_1-2").val(input_286_1_2)	//.trigger("change");
		$(".input_286_2-2").val(input_286_2_2)	//.trigger("change");
		$(".input_286_3-2").val(input_286_3_2)	//.trigger("change");
		$(".input_286_1-3").val(input_286_1_3)	//.trigger("change");
		$(".input_286_2-3").val(input_286_2_3)	//.trigger("change");
		$(".input_286_3-3").val(input_286_3_3)	//.trigger("change");
		
		var input_287_1_0	= parseFloat($(".input_287_1-0").val()) || 0;
		var input_287_2_0	= parseFloat($(".input_287_2-0").val()) || 0;
		var input_287_3_0	= parseFloat($(".input_287_3-0").val()) || 0;
		
		var input_287_1_2	= input_287_1_0 * input_276_1 / 100;
		var input_287_2_2	= input_287_2_0 * input_276_2 / 100;
		var input_287_3_2	= input_287_3_0 * input_276_3 / 100;
		var input_287_1_3	= input_287_1_2 * input_260_1;
		var input_287_2_3	= input_287_2_2 * input_260_2;
		var input_287_3_3	= input_287_3_2 * input_260_3;
		
		$(".input_287_1-2").val(input_287_1_2)	//.trigger("change");
		$(".input_287_2-2").val(input_287_2_2)	//.trigger("change");
		$(".input_287_3-2").val(input_287_3_2)	//.trigger("change");
		$(".input_287_1-3").val(input_287_1_3)	//.trigger("change");
		$(".input_287_2-3").val(input_287_2_3)	//.trigger("change");
		$(".input_287_3-3").val(input_287_3_3)	//.trigger("change");
		
		// var input_288_1_0	= parseFloat($(".input_288_1-0").val()) || 0;
		// var input_288_2_0	= parseFloat($(".input_288_2-0").val()) || 0;
		// var input_288_3_0	= parseFloat($(".input_288_3-0").val()) || 0;
		
		// var input_288_1_1	= input_288_1_0 * input_276_1 / 100;
		// var input_288_2_1	= input_288_2_0 * input_276_2 / 100;
		// var input_288_3_1	= input_288_3_0 * input_276_3 / 100;
		// var input_288_1_2	= input_288_1_1 * input_260_1;
		// var input_288_2_2	= input_288_2_1 * input_260_2;
		// var input_288_3_2	= input_288_3_1 * input_260_3;
		
		// $(".input_288_1-1").val(input_288_1_1)	//.trigger("change");
		// $(".input_288_2-1").val(input_288_2_1)	//.trigger("change");
		// $(".input_288_3-1").val(input_288_3_1)	//.trigger("change");
		// $(".input_288_1-2").val(input_288_1_2)	//.trigger("change");
		// $(".input_288_2-2").val(input_288_2_2)	//.trigger("change");
		// $(".input_288_3-2").val(input_288_3_2)	//.trigger("change");
	}
	
	var input_289_1_0	= input_278_1_0 + input_279_1_0 + input_281_1_0 + input_283_1_0 + input_284_1_0 + input_286_1_0 + input_287_1_0;
	var input_289_2_0	= input_278_2_0 + input_279_2_0 + input_281_2_0 + input_283_2_0 + input_284_2_0 + input_286_2_0 + input_287_2_0;
	var input_289_3_0	= input_278_3_0 + input_279_3_0 + input_281_3_0 + input_283_3_0 + input_284_3_0 + input_286_3_0 + input_287_3_0;
	
	$(".input_289_1-0").val(input_289_1_0)	//.trigger("change");
	$(".input_289_2-0").val(input_289_2_0)	//.trigger("change");
	$(".input_289_3-0").val(input_289_3_0)	//.trigger("change");
	
	var input_289_1_1	= input_278_1_2 + input_279_1_2 + input_281_1_2 + input_283_1_1 + input_284_1_1 + input_286_1_2 + input_287_1_2;
	var input_289_2_1	= input_278_2_2 + input_279_2_2 + input_281_2_2 + input_283_2_1 + input_284_2_1 + input_286_2_2 + input_287_2_2;
	var input_289_3_1	= input_278_3_2 + input_279_3_2 + input_281_3_2 + input_283_3_1 + input_284_3_1 + input_286_3_2 + input_287_3_2;

	$(".input_289_1-1").val(input_289_1_1)	//.trigger("change");
	$(".input_289_2-1").val(input_289_2_1)	//.trigger("change");
	$(".input_289_3-1").val(input_289_3_1)	//.trigger("change");
	
	var input_289_1_2	= input_278_1_3 + input_279_1_3 + input_281_1_3 + input_283_1_2 + input_284_1_2 + input_286_1_3 + input_287_1_3;
	var input_289_2_2	= input_278_2_3 + input_279_2_3 + input_281_2_3 + input_283_2_2 + input_284_2_2 + input_286_2_3 + input_287_2_3;
	var input_289_3_2	= input_278_3_3 + input_279_3_3 + input_281_3_3 + input_283_3_2 + input_284_3_2 + input_286_3_3 + input_287_3_3;

	$(".input_289_1-2").val(input_289_1_2)	//.trigger("change");
	$(".input_289_2-2").val(input_289_2_2)	//.trigger("change");
	$(".input_289_3-2").val(input_289_3_2)	//.trigger("change");
	
	
	
	var input_290_1		= input_276_1 * (1 + (input_289_1_0 / 100));
	var input_290_2		= input_276_2 * (1 + (input_289_2_0 / 100));
	var input_290_3		= input_276_3 * (1 + (input_289_3_0 / 100));
	
	$(".input_290_1").val(input_290_1)	//.trigger("change");
	$(".input_290_2").val(input_290_2)	//.trigger("change");
	$(".input_290_3").val(input_290_3)	//.trigger("change");
	
	cek_deviasi();
	
	// Bobot Rekonsilasi
	{
		var perbedaan_1	=  Math.abs(input_278_1_0) + Math.abs(input_279_1_0) + Math.abs(input_281_1_0) + Math.abs(input_283_1_0) + Math.abs(input_284_1_0) + Math.abs(input_286_1_0) + Math.abs(input_287_1_0);
		var perbedaan_2	=  Math.abs(input_278_2_0) + Math.abs(input_279_1_0) + Math.abs(input_281_2_0) + Math.abs(input_283_2_0) + Math.abs(input_284_2_0) + Math.abs(input_286_2_0) + Math.abs(input_287_2_0);
		var perbedaan_3	=  Math.abs(input_278_3_0) + Math.abs(input_279_1_0) + Math.abs(input_281_3_0) + Math.abs(input_283_3_0) + Math.abs(input_284_3_0) + Math.abs(input_286_3_0) + Math.abs(input_287_3_0);
		
		var jumlah_perbedaan = perbedaan_1 + perbedaan_2 + perbedaan_3;
		
		var bobot_perbedaan_1	= perbedaan_1 / jumlah_perbedaan;
		var bobot_perbedaan_2	= perbedaan_2 / jumlah_perbedaan;
		var bobot_perbedaan_3	= perbedaan_3 / jumlah_perbedaan;
		
		var bobot_persamaan_1	= 1 - bobot_perbedaan_1;
		var bobot_persamaan_2	= 1 - bobot_perbedaan_2;
		var bobot_persamaan_3	= 1 - bobot_perbedaan_3;
		var jumlah_persamaan	= bobot_persamaan_1 + bobot_persamaan_2 + bobot_persamaan_3;
		
		var rekonsiliasi_1		= bobot_persamaan_1 / jumlah_persamaan;
		var rekonsiliasi_2		= bobot_persamaan_2 / jumlah_persamaan;
		var rekonsiliasi_3		= bobot_persamaan_3 / jumlah_persamaan;
		
		$(".input_291_0").val((rekonsiliasi_1 + rekonsiliasi_2 + rekonsiliasi_3) * 100)	//.trigger("change");
		$(".input_291_1").val((rekonsiliasi_1 * 100)) //.trigger("change");
		$(".input_291_2").val((rekonsiliasi_2 * 100)) //.trigger("change");
		$(".input_291_3").val((rekonsiliasi_3 * 100)) //.trigger("change");
		
		var input_292_1	= input_290_1 * rekonsiliasi_1;
		var input_292_2	= input_290_2 * rekonsiliasi_2;
		var input_292_3	= input_290_3 * rekonsiliasi_3;
		var input_292_0 = input_292_1 + input_292_2 + input_292_3;
		
		$(".input_292_0").val(input_292_0)	//.trigger("change");
		$(".input_292_1").val(input_292_1)	//.trigger("change");
		$(".input_292_2").val(input_292_2)	//.trigger("change");
		$(".input_292_3").val(input_292_3)	//.trigger("change");
		
		
		calculate_tab_pembanding_2();
	}
	
	
	
	/*Penyesuaian*/
	
};

$(document).on("change", "#textbox_pembanding_101, input[data-id-field=348]", function()
{
	calculate_tab_pembanding_2();
});

function calculate_tab_pembanding_2()
{
	var input_292_0 		= parseFloat($(".input_292_0").val()) || 0;
	// var input_261_0 		= parseFloat($(".input_261_0").val()) || 0;
	var total_luas_tanah 	= 0;
	var total_nilai_tanah 	= 0;
	var tanah 				= $(document).find("#textbox_pembanding_14").val();
	var harga				= $(document).find("#textbox_pembanding_46").val();

	var test 				= tanah*harga; 
	var i = 1;
	console.log ("LUAS KIOS ", tanah, "HARGA ", harga, "TEST ", test);
	$('#table_data_legalitas_2 > tbody > tr').each(function(){
		var luas_tanah	= 0;
		var bobot		= 0;
		var indikasi	= 0;
		var total_tanah	= 0;
		
		$(this).find('td').each (function() 
		{
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
				
			indikasi	= 100 * input_292_0 / 100;
		
			if ($(this).attr("td-type") == "indikasi"){
				$(this).find('input').val(indikasi)	//.trigger("change");
			}
				
			total_tanah = indikasi * luas_tanah;
			
			if ($(this).attr("td-type") == "total_nilai_tanah"){
				$(this).find('input').val(total_tanah)	//.trigger("change");
			}
		}); 
			
		total_luas_tanah	= total_luas_tanah + luas_tanah;
		total_nilai_tanah	= total_nilai_tanah + total_tanah;
				
		i++;
	});
		
	$("#textbox_tanah_71").val(total_nilai_tanah/total_luas_tanah).number( true, 0 )	//.trigger("change");
	$("#textbox_tanah_72").val(total_nilai_tanah).number( true, 0 )	//.trigger("change");
	
	var indikasi_nilai_tanah_setelah_pembulatan	= total_nilai_tanah/total_luas_tanah;
	$("#textbox_pembanding_47").val(test).number( true, 0 )	//.trigger("change");
	// $("#textbox_bangunan_56").val($("#textbox_pembanding_47").val()).number( true, 0 )	//.trigger("change");
	$("#textbox_pembanding_102").attr("readonly", true).addClass("readonly").addClass("text-right").val(test).number( true, 0 )	//.trigger("change");

	$("#textbox_pembanding_48").val(Math.round((test / 10000), 0) * 10000).number( true, 0 )	//.trigger("change");
	$("#textbox_bangunan_57").attr("readonly", true).addClass("text-right").val($("#textbox_pembanding_48").val()).number( true, 0 ) .trigger("change");
	
	
	var lik 			= $("#textbox_pembanding_102").val();
	var dep 			= $("#textbox_pembanding_101").val();
	var hasil			= lik * (1-dep/100);
	if (dep >= 20 && dep <= 40){
		$("#textbox_pembanding_103").attr("readonly", true).addClass("readonly").addClass("text-right").val(hasil).number( true, 0 )	//.trigger("change");
	}
	else{
		alert("Depresiasi harus antara 20% sampai 40%");
		$("#textbox_pembanding_103").attr("readonly", true).addClass("readonly").addClass("text-right").val('0').number( true, 0 )	//.trigger("change");
	}

	var input_980_0 = $("#textbox_pembanding_103").val();
	$("#textbox_pembanding_48").val(Math.round((input_980_0 / 1000000), 6) * 1000000).addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 )	//.trigger("change");
		
	$("#textbox_bangunan_58").attr("readonly", true).addClass("readonly").addClass("text-right").val($("#textbox_pembanding_48").val()).number( true, 0 ) .trigger("change");
	

	calculate_tab_pembanding_3();
}

function calculate_tab_pembanding_3()
{
	var tanah_luas 			= $("#textbox_tanah_61").val();
	var tanah_harga			= $("#textbox_pembanding_48").val();
	
	var carpot_jumlah		= $("#textbox_sarana_2").val();
	var carpot_harga		= $("#textbox_sarana_3").val();
	
	var perkerasan_jumlah	= $("#textbox_sarana_8").val();
	var perkerasan_harga	= $("#textbox_sarana_9").val();
	
	var pagar_jumlah		= $("#textbox_sarana_14").val();
	var pagar_harga			= $("#textbox_sarana_15").val();
	
	var halaman_jumlah		= $("#textbox_sarana_20").val();
	var halaman_harga		= $("#textbox_sarana_21").val();
	
	var gapura_jumlah		= $("#textbox_sarana_26").val();
	var gapura_harga		= $("#textbox_sarana_27").val();
	
	var taman_jumlah		= $("#textbox_sarana_32").val();
	var taman_harga			= $("#textbox_sarana_33").val();
	
	var rcn_tanah			= tanah_luas * tanah_harga;
	var rcn_carpot			= carpot_jumlah * carpot_harga;
	var rcn_perkerasan		= perkerasan_jumlah * perkerasan_harga;
	var rcn_pagar			= pagar_jumlah * pagar_harga;
	var rcn_halaman			= halaman_jumlah * halaman_harga;
	var rcn_gapura			= gapura_jumlah * gapura_harga;
	var rcn_taman			= taman_jumlah * taman_harga;
	
	var total_nilai_pasar	= rcn_tanah + rcn_carpot + rcn_perkerasan + rcn_pagar + rcn_halaman + rcn_gapura + rcn_taman;
	
	$("#textbox_pembanding_11").val(total_nilai_pasar)	//.trigger("change");
	
	$(".input_274_0").val($("#textbox_pembanding_48").val() * tanah_luas)	//.trigger("change");
	
	var indikasi = $("#textbox_pembanding_48").val() * tanah_luas;
	
	$("#textbox_tanah_65").val(indikasi).addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 )	//.trigger("change");
	
	var textbox_tanah_66 = indikasi * 80 / 100;
	
	$("#textbox_tanah_66").val(textbox_tanah_66).addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 )	//.trigger("change");
	
	
	$(".input_270_0").val(data_bangunan["brb_bangunan"]).number( true, 0 )	//.trigger("change");
	$(".input_272_0").val(data_bangunan["kondisi_fisik_bangunan"])	//.trigger("change");
	$(".input_273_0").val(data_bangunan["indikasi_nilai_pasar_m"]).number( true, 0 )	//.trigger("change");
	$(".input_271_0").val(data_bangunan["indikasi_nilai_pasar"]).number( true, 0 )	//.trigger("change");

	
	
	// $(".input_690_Bangunan_1").val($(".input_293_").val())	//.trigger("change");
	

	// $("textbox_bangunan_55").attr("readonly", true).addClass("readonly").val($("#textbox_pembanding_47").val())	//.trigger("change");
	
	style_after_ajax_pembanding();


}

function style_after_ajax_pembanding()
{

	$(".input_274_0").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
	$(".input_249_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_7").val())	//.trigger("change");
	$(".input_250_0").attr("readonly", true).addClass("readonly");
	$(".input_251_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_8").val())	//.trigger("change");
	$(".input_252_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_2").val())	//.trigger("change");
	$(".input_253_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_33").val())	//.trigger("change");
	$(".input_254_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_35").val())	//.trigger("change");
	$(".input_255_0").attr("readonly", true).addClass("readonly");
	$(".input_256_0").attr("readonly", true).addClass("readonly");
	$(".input_257_0").attr("readonly", true).addClass("readonly");
	$(".input_270_0").attr("readonly", true).addClass("readonly");
	$(".input_691_Bangunan_1").attr("readonly", true).addClass("readonly");
	$(".input_692_Bangunan_1").attr("readonly", true).addClass("readonly");

	$(".input_260_0").attr("readonly", true).addClass("readonly").val($(".input_162_").val())	//.trigger("change");
	
	$(".input_261_0").attr("readonly", true).addClass("readonly").val($("#textbox_bangunan_14").val())	//.trigger("change");
	$(".input_264_0").attr("readonly", true).addClass("readonly").val($("#textbox_bangunan_11").val())	//.trigger("change");
	// $("textbox_bangunan_55").val($("#textbox_pembanding_47").val()).number( true, 0 )	//.trigger("change");
	// $("textbox_bangunan_55").val($("#textbox_pembanding_47").val())	//.trigger("change");
	// if ($(".input_261_0").val() == "" || $(".input_261_0").val() == "0")
	// {
	// 	$(".input_261_0").val(luas_bangunan).attr("readonly", true).addClass("readonly")	//.trigger("change");
	// }
	// else
	// {
	// 	$(".input_261_0").attr("readonly", true).addClass("readonly");
	// }

	// $(".input_646_Bangunan_1").val($("#textbox_entry_35").val());
	$(".input_262_0").attr("readonly", true).addClass("readonly").val($("#textbox_bangunan_14").val())	//.trigger("change");;
	$(".input_263_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_34").val())	//.trigger("change");
	
	
	/*$(".input_265_0").attr("readonly", true).addClass("readonly");*/
	$(".input_266_0").attr("readonly", true).addClass("readonly").val($("#textbox_tanah_49").val());
	/*$(".input_267_0").attr("readonly", true).addClass("readonly");*/
	$(".input_268_0").attr("readonly", true).addClass("readonly").val($("#textbox_bangunan_129").val());
	$(".input_269_0").attr("readonly", true).addClass("readonly").val($("#textbox_bangunan_183").val());
	
	var jumlah_pembanding = $("#jumlah_pembanding").val();

	
	for(var i = 0; i <= jumlah_pembanding ; i++)
	{
		
		$(".input_255_" + i).number( true, 0 );
		$(".input_257_" + i).number( true, 0 );
		// $(".input_260_" + i).number( true, 0 );
		// $(".input_261_" + i).number( true, 0 );
		$(".input_273_" + i).number( true, 0 );
		$(".input_271_" + i).number( true, 0 );
		$(".input_274_" + i).number( true, 0 );
		$(".input_276_" + i).number( true, 0 );
		$(".input_290_" + i).number( true, 0 );
		$(".input_292_" + i).number( true, 0 );
		
		if (i == 0)
		{
			$(".input_277_" + i).attr("readonly", true).addClass("readonly").val($(".input_253_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_278_" + i).attr("readonly", true).addClass("readonly").val($(".input_259_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_279_" + i).attr("readonly", true).addClass("readonly").val($(".input_260_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_280_" + i).attr("readonly", true).addClass("readonly").val($(".input_264_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_281_" + i).attr("readonly", true).addClass("readonly").val($(".input_265_" + i).val())	//.trigger("change").parent().addClass("readonly");
			
			$(".input_285_" + i).attr("readonly", true).addClass("readonly").val($(".input_267_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_286_" + i).attr("readonly", true).addClass("readonly").val($(".input_269_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_287_" + i).attr("readonly", true).addClass("readonly").val($(".input_258_" + i).val())	//.trigger("change").parent().addClass("readonly");
			
			
		}
		else
		{
			
			$(".input_277_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_253_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_278_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_259_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_279_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_260_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_280_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_264_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_281_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_265_" + i).val())	//.trigger("change").parent().addClass("readonly");
			
			$(".input_285_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_267_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_286_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_269_" + i).val())	//.trigger("change").parent().addClass("readonly");
			$(".input_287_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_258_" + i).val())	//.trigger("change").parent().addClass("readonly");
			
		}
		
		$(".input_282_" + i).attr("readonly", true).addClass("readonly").val($(".input_266_" + i).val())	//.trigger("change");
		
		
		// Text align Right
		$(".input_255_" + i).addClass("text-right");
		$(".input_257_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_260_" + i).addClass("text-right");
		$(".input_261_" + i).addClass("text-right");
		$(".input_262_" + i).addClass("text-right");
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

		// var nilaip				= $("#textbox_pembanding_47").val();
		// $(".input_689_Bangunan_1").val(nilaip).number( true, 0 )	//.trigger("change");
		// $(".input_689_Bangunan_1" + i).addClass("text-right").number_format( true, 0 );

		$(".input_290_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		$(".input_291_" + i).addClass("text-center").attr("readonly", true).addClass("readonly");
		$(".input_292_" + i).addClass("text-right").attr("readonly", true).addClass("readonly");
		
		// Text Align Center
		$(".input_256_" + i).addClass("text-center");
		$(".input_272_" + i).addClass("text-center").css("background-color", "white");
		
		$(".input_277_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
		$(".input_278_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
		$(".input_279_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
		$(".input_280_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
		$(".input_281_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
		
		$(".input_283_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
		$(".input_284_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
		$(".input_285_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
		$(".input_286_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
		$(".input_287_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
		$(".input_288_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
		$(".input_289_" + i + "-0").addClass("text-center").css("background-color", "white").parent().css("background-color", "white");
	}
	
	var total_data_legalitas = $("#total_data_legalitas").val();
	
	for (var i = 1; i <= total_data_legalitas; i++)
	{
		$(".input_348_" + i).addClass("text-center").number( true, 0 );
		$(".input_349_" + i).addClass("text-right").number( true, 0 );
		$(".input_350_" + i).addClass("text-right").number( true, 0 );
	}

	
	get_ringkasan_laporan();
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
					load_tab_bangunan(bangunan);
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
					load_tab_bangunan(bangunan);
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

function load_tab_bangunan(role)
{
	$.ajax({
		type		: "POST",
		url 		: base_url + "AjaxPekerjaan/load_bangunan/",
		beforeSend: function() {
			// $("#tab_" + role).html("<div class='text-center' style='padding: 20px;'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></div>");
		},
		data		: {
			id_lokasi 	: $("#id_lokasi").val(),
			role		: role
		},
		success		: function (data) {
			// $("#tab_" + role).html(data);
			
			var jumlah_bangunan	= $("#jumlah_bangunan").val();
			
			for(var i = 1; i < jumlah_bangunan; i++)
			{
				var role_bangunan	= "Bangunan_" + i;
				
				if (role_bangunan != role)
				{
					$("#tab_" + role_bangunan).html("");
				}
			}
			
			$(".table_bangunan").find("input").addClass("text-center");
			hitung_luas_fisik_bangunan(role);
			hitung_bct_bangunan(role)
			
			$(".tipe_bangunan").html($("#" + role).find("select#textbox_bangunan_1").val());
			$("#" + role).find("input#textbox_bangunan_60").val($("#" + role).find("select#textbox_bangunan_1").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
			$(".div-provinsi").html(" - " + $("#textbox_entry_23").val()).css("text-transform", "uppercase");
			
			if (role == "Bangunan_1")
			{
				update_sarana_pelengkap();
			}
			
			$(".input_650_" + role_bangunan).number( true, 0 );
			$(".input_654_" + role_bangunan).number( true, 0 );
			$(".input_688_" + role_bangunan).number( true, 0 );
			
			getKelasBangunan(role);
			
			getBiayaLangsung(role);
			
			//initForm(id_lokasi); 
		}
	});
	$(".input_646_Bangunan_1").val($(".input_899_").val())	//.trigger("change");
	$(".input_647_Bangunan_1").val($(".input_898_").val())	//.trigger("change");
	
	// var a = 100;
	// var b = 10;
	// var result = a * b;
	
 //        $(".input_689_Bangunan_1").val(result)	//.trigger("change");
      
}

function hitung_luas_fisik_bangunan(role)
{
	var luas_total			= 0;
	var luas_pelanggaran	= 0;
	var jumlah_lantai	= $("#" + role).find("input#textbox_bangunan_7").val()
	
	$("." + role + " tr ").each(function(index) 
	{
		var index_tr	= index;
		var td_last	= $(this).find("td").length;
		
		var luas_tr	= 0;
		var luas_td	= 0;
		
		
		$(this).find("td").each(function(index)
		{
			var urutan	= index + 1;
			
			
			
			if (urutan == td_last)
			{
				$(this).find("input").val(luas_tr).attr("readonly", true).addClass("readonly")	//.trigger("change");
			}
			else
			{
				if ($(this).find("input").val() == undefined || $(this).find("input").val() == "")
				{
					luas_td = 0;
				}
				else
				{
					luas_td = $(this).find("input").val();
				}
				luas_tr =  parseFloat(luas_td) + luas_tr;
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
	})
	
	/*$("#" + role).find("input#textbox_bangunan_16").val(luas_pelanggaran)	//.trigger("change").attr("readonly", true).addClass("readonly");*/
	$("." + role + ".input_639_" + role).val(luas_total).attr("readonly", true).addClass("readonly").trigger("change");
	
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
	$(".teras_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_113]").val(luas).attr("readonly", true).addClass("readonly");
	luas_tmp = luas * 0.5;
	$(".teras_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_129]").val(luas_tmp).attr("readonly", true).addClass("readonly");
	
	
	//$(".teras_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_113]").val(luas).attr("readonly", true).addClass("readonly");
	//$("#" + role).find("input[id=textbox_bangunan_88]").val(luas)	//.trigger("change").attr("readonly", true).addClass("readonly");
	
	//GUDANG
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
	$(".gudang_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_127]").val(luas).attr("readonly", true).addClass("readonly");
	
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
	$(".gudang_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_128]").val(luas).attr("readonly", true).addClass("readonly");
	
	
	
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
	$(".teras_" + tab_role[1] + " tr ").find("th").find("input[id=textbox_bangunan_114]").val(luas).attr("readonly", true).addClass("readonly");
	$("#" + role).find("input[id=textbox_bangunan_92]").val(luas)	//.trigger("change").attr("readonly", true).addClass("readonly");
	
	//Luas Bangunan Total
	var luas_teras = $("#" + role).find("input#textbox_bangunan_129").val();
	var luas_bangunan = $("#" + role).find("input#textbox_bangunan_5").val();
	var total_ruas_bangunan = parseFloat(luas_bangunan) + parseFloat(luas_teras);
	$("#" + role).find("input#textbox_bangunan_130").val(total_ruas_bangunan)	//.trigger("change").attr("readonly", true).addClass("readonly");
	
	
	get_ringkasan_laporan();
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
		$("#" + type).find("#textbox_bangunan_64").val(value)	//.trigger("change").attr("readonly", true).addClass("readonly");
	}
	else if (id == "textbox_bangunan_27")
	{
		$("#" + type).find("#textbox_bangunan_67").val(value)	//.trigger("change").attr("readonly", true).addClass("readonly");
	}
	else if (id == "textbox_bangunan_28")
	{
		$("#" + type).find("#textbox_bangunan_68").val(value)	//.trigger("change").attr("readonly", true).addClass("readonly");
	}
	else if (id == "textbox_bangunan_29")
	{
		$("#" + type).find("#textbox_bangunan_71").val(value)	//.trigger("change").attr("readonly", true).addClass("readonly");
	}
	else if (id == "textbox_bangunan_30")
	{
		$("#" + type).find("#textbox_bangunan_72").val(value)	//.trigger("change").attr("readonly", true).addClass("readonly");
	}
	else if (id == "textbox_bangunan_31")
	{
		$("#" + type).find("#textbox_bangunan_75").val(value)	//.trigger("change").attr("readonly", true).addClass("readonly");
	}
	else if (id == "textbox_bangunan_34")
	{
		$("#" + type).find("#textbox_bangunan_78").val(value)	//.trigger("change").attr("readonly", true).addClass("readonly");
	}
	else if (id == "textbox_bangunan_35")
	{
		$("#" + type).find("#textbox_bangunan_79").val(value)	//.trigger("change").attr("readonly", true).addClass("readonly");
	}
	

      
	get_ringkasan_laporan();
}

$(document).on("change","#textbox_bangunan_7, #textbox_bangunan_65, #textbox_bangunan_69, #textbox_bangunan_73, #textbox_bangunan_76, #textbox_bangunan_80, #textbox_bangunan_89, #textbox_bangunan_93, #textbox_bangunan_99, #textbox_bangunan_100, #textbox_bangunan_101, #textbox_bangunan_102, #textbox_bangunan_9, #textbox_bangunan_26, #textbox_bangunan_27, #textbox_bangunan_28, #textbox_bangunan_29, #textbox_bangunan_30, #textbox_bangunan_31, #textbox_bangunan_32, #textbox_bangunan_33, #textbox_bangunan_34, #textbox_bangunan_35, #textbox_bangunan_36, #textbox_bangunan_37", function()
{
	var role	= $(this).attr("data-keterangan");
	hitung_bct_bangunan(role);
});

function hitung_bct_bangunan(role)
{
	// var dteNow = new Date();
	// var intYear = dteNow.getFullYear();
	
	// $("#" + role).find("input#textbox_bangunan_82").val(intYear)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_83").val($("#" + role).find("input#textbox_bangunan_22").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_84").val($("#" + role).find("input#textbox_bangunan_23").val())	//.trigger("change").attr("readonly", true).addClass("readonly");
	
	// var kemunduran_fisik		= parseFloat($("#" + role).find("input#textbox_bangunan_99").val()) || 0;
	// var kondisi_terlihat		= parseFloat($("#" + role).find("input#textbox_bangunan_100").val()) || 0;
	// var keusangan_fungsional	= parseFloat($("#" + role).find("input#textbox_bangunan_101").val()) || 0;
	// var keusangan_ekonomis		= parseFloat($("#" + role).find("input#textbox_bangunan_102").val()) || 0;
	// var penyusutan_fisik		= kemunduran_fisik + kondisi_terlihat;
	
	// keusangan_fungsional	= (100 - penyusutan_fisik) * keusangan_fungsional;
	// keusangan_ekonomis		= (100 - penyusutan_fisik) * keusangan_ekonomis;
	
	// var total_penyusutan	= penyusutan_fisik + keusangan_ekonomis + keusangan_fungsional;
	
	// luas_bangunan		= $("#" + role).find("input#textbox_bangunan_5").val()
	
	// $("#" + role).find("input#textbox_bangunan_61").val(luas_bangunan)	//.trigger("change").attr("readonly", true).addClass("readonly");
	
	// $("#" + role).find("input#textbox_bangunan_103").val(penyusutan_fisik)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_104").val(keusangan_fungsional)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_105").val(keusangan_ekonomis)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_106").val(total_penyusutan)	//.trigger("change").attr("readonly", true).addClass("readonly");
	
	// var luas_imb		= parseFloat($("#" + role).find("input#textbox_bangunan_9").val()) || 0;
	// var perbedaan_luas	= luas_bangunan - luas_imb;
	// $("#" + role).find("input#textbox_bangunan_10").val(Math.abs(perbedaan_luas))	//.trigger("change").attr("readonly", true).addClass("readonly");
	
	// var a = parseFloat($("#" + role).find("input#textbox_bangunan_16").val()) || 0;
	// var b = parseFloat($("#" + role).find("input#textbox_bangunan_17").val()) || 0;
	// var c = parseFloat($("#" + role).find("input#textbox_bangunan_18").val()) || 0;
	// var d = parseFloat($("#" + role).find("input#textbox_bangunan_19").val()) || 0;
			
	// var e = a + b + c + d
	// $("#" + role).find("input#textbox_bangunan_20").val(e)	//.trigger("change").attr("readonly", true).addClass("readonly").attr("readonly", true).addClass("readonly");
	
	// var data = {
	// 	id_lokasi				: $("#id_lokasi").val(),
	// 	type_bangunan			: $("#" + role).find("select#textbox_bangunan_62").val(),
	// 	luas_bangunan			: luas_bangunan,
		
	// 	ket_pondasi_struktur	: $("#" + role).find("select#textbox_bangunan_65").val(),
	// 	ket_rangka_penutup		: $("#" + role).find("select#textbox_bangunan_69").val(),
	// 	ket_plafond				: $("#" + role).find("select#textbox_bangunan_73").val(),
	// 	ket_dinding_pintu		: $("#" + role).find("select#textbox_bangunan_76").val(),
	// 	ket_lantai_utilitas		: $("#" + role).find("select#textbox_bangunan_80").val(),
		
	// 	teras_luas				: $("#" + role).find("input#textbox_bangunan_88").val(),
	// 	teras_type				: $("#" + role).find("select#textbox_bangunan_89").val(),
	// 	balkon_luas				: $("#" + role).find("input#textbox_bangunan_92").val(),
	// 	balkon_type				: $("#" + role).find("select#textbox_bangunan_93").val(),
		
	// 	tahun_bangun			: $("#" + role).find("input#textbox_bangunan_83").val(),
	// 	tahun_renof				: $("#" + role).find("input#textbox_bangunan_84").val(),
	// 	total_penyusutan		: total_penyusutan
	// };
	
	// $.ajax({
	// 	type		: "POST",
	// 	url 		: base_url + "AjaxPekerjaan/hitung_bct_bangunan/",
	// 	dataType	: "JSON",
	// 	data		: {
	// 		data : data
	// 	},
	// 	success		: function (data) {
	// 		$("#" + role).find("input#textbox_bangunan_66").val(data.harga_pondasi_struktur)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_70").val(data.harga_rangka_penutup)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_74").val(data.harga_plafond)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_77").val(data.harga_dinding_pintu)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_81").val(data.harga_lantai_utilitas)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_87").val(data.rcn_bangunan)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
			
			
	// 		$("#" + role).find("input#textbox_bangunan_90").val(data.ket_teras)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_91").val(data.harga_teras)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_94").val(data.ket_balkon)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_95").val(data.harga_balkon)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_96").val(data.rcn_teras_balkon)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_97").val(data.rcn_bangunan2)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_98").val(data.pembulatan_rcn)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
			
	// 		$("#" + role).find("input#textbox_bangunan_85").val(data.umur_ekonomis)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_86").val(data.umur_efektif)	//.trigger("change").attr("readonly", true).addClass("readonly");
			
			
	// 		$("#" + role).find("input#textbox_bangunan_107").val(data.kondisi_bangunan_persen)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_108").val(data.kondisi_bangunan)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_109").val(data.rcn_rp)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_110").val(data.rcn_rp_m)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_111").val(data.nilai_pasar)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_112").val(data.nilai_pasar2)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
			
			
			
	// 		var nilai_pasar_luquidasi	= data.nilai_pasar2 - (data.nilai_pasar2 * 30 / 100);
			
	// 		$("#" + role).find("input#textbox_bangunan_56").val(nilai_pasar_luquidasi)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
			
	// 		var luas_resmi					= luas_bangunan - e;
	// 		var nilai_resmi_pasar			= data.rcn_rp_m * luas_resmi;
	// 		var nilai_resmi_pasar_luquidasi	= nilai_resmi_pasar - (nilai_resmi_pasar * 30 / 100);
			
	// 		$("#" + role).find("input#textbox_bangunan_57").val(nilai_resmi_pasar)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
	// 		$("#" + role).find("input#textbox_bangunan_58").val(nilai_resmi_pasar_luquidasi)	//.trigger("change").addClass("text-right").number( true, 0 ).attr("readonly", true).addClass("readonly");
			
			
			
	// 		if (role == "Bangunan_1")
	// 		{
	// 			data_bangunan["brb_bangunan"]				= data.rcn_rp_m;
	// 			data_bangunan["kondisi_fisik_bangunan"]		= data.kondisi_bangunan_persen;
	// 			data_bangunan["indikasi_nilai_pasar_m"]		= data.nilai_pasar;
	// 			data_bangunan["indikasi_nilai_pasar"]		= data.nilai_pasar2;
	// 		}
	// 	}
	// });
	
	
	// var pondasi			= $("#" + role).find("select#textbox_bangunan_26").val();
	// var struktur		= $("#" + role).find("select#textbox_bangunan_27").val();
	// var rangka_atap		= $("#" + role).find("select#textbox_bangunan_28").val();
	// var penutup_atap	= $("#" + role).find("select#textbox_bangunan_29").val();
	// var plafond			= $("#" + role).find("select#textbox_bangunan_30").val();
	// var dinding			= $("#" + role).find("select#textbox_bangunan_31").val();
	// var pintu_jendela	= $("#" + role).find("select#textbox_bangunan_34").val();
	// var lantai			= $("#" + role).find("select#textbox_bangunan_35").val();

	
	// $("#" + role).find("input#textbox_bangunan_64").val(pondasi)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_67").val(struktur)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_68").val(rangka_atap)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_71").val(penutup_atap)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_72").val(plafond)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_75").val(dinding)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_78").val(pintu_jendela)	//.trigger("change").attr("readonly", true).addClass("readonly");
	// $("#" + role).find("input#textbox_bangunan_79").val(lantai)	//.trigger("change").attr("readonly", true).addClass("readonly");
	
	get_ringkasan_laporan();
} 

function get_ringkasan_laporan()
{
	$.ajax({
		type		: "POST",
		url 		: base_url + "AjaxPekerjaan/get_ringkasan_penilaian/",
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
        $('#latitude_pembanding_'+active_idx).val(marker.getPosition().lat()).trigger("change");
        $('#longitude_pembanding_'+active_idx).val(marker.getPosition().lng()).trigger("change");
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
	deviasi_data = parseFloat(deviasi_data)

	console.clear();
	console.log ("DDATA DLIMIT", deviasi_data, deviasi_limit)
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
})