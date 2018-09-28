//START
var role = "entry";
var total_luas_tanah = 0;
var tab_loaded = []

$(document).ready(function(){

	$(".btn-batal").click(function(){
		location = base_url + "pekerjaan/detail/" + $("#id_pekerjaan").val();
	});
	
	update_sarana_pelengkap();

	if (getUrlParameter("role"))
	{
		role = getUrlParameter("role");
	}

	tab_loaded.push(role)
	if (role === 'entry')
	{
		get_ringkasan_laporan()
		get_history_penilaian()
	}
	else if (role === 'tanah')
	{
		get_data_legalitas(role);
	}
	else if (role === 'dbanding')
	{
		get_data_legalitas(role);
		// calculate_tab_pembanding();
	}


	$("#textbox_tanah_61").attr("readonly", true);
	$("#textbox_tanah_61, #textbox_tanah_62").addClass("text-right");	
	
	$("#textbox_sarana_2, #textbox_sarana_3, #textbox_sarana_4,  #textbox_sarana_6,  #textbox_sarana_8, #textbox_sarana_9, #textbox_sarana_10,  #textbox_sarana_12,  #textbox_sarana_14, #textbox_sarana_15, #textbox_sarana_16,  #textbox_sarana_18,  #textbox_sarana_20, #textbox_sarana_21, #textbox_sarana_22,  #textbox_sarana_24,  #textbox_sarana_26, #textbox_sarana_27, #textbox_sarana_28,  #textbox_sarana_30,  #textbox_sarana_32, #textbox_sarana_33, #textbox_sarana_34,  #textbox_sarana_36, #textbox_sarana_37, #textbox_sarana_38,  #textbox_sarana_40, #textbox_sarana_41, #textbox_sarana_42,  #textbox_sarana_44,  #textbox_sarana_46, #textbox_sarana_47, #textbox_sarana_48,  #textbox_sarana_50,  #textbox_sarana_52, #textbox_sarana_53, #textbox_sarana_54,  #textbox_sarana_56,  #textbox_sarana_58, #textbox_sarana_59, #textbox_sarana_60,  #textbox_sarana_62,  #textbox_sarana_64, #textbox_sarana_65, #textbox_sarana_66,  #textbox_sarana_68,  #textbox_sarana_70, #textbox_sarana_71, #textbox_sarana_72,  #textbox_sarana_74, #textbox_sarana_75, #textbox_sarana_76, #textbox_sarana_77, #textbox_sarana_78").addClass("text-right");

	$("#textbox_pembanding_47, #textbox_pembanding_48, #textbox_tanah_61, #textbox_tanah_72, #textbox_tanah_70, #textbox_tanah_71").addClass("text-right");

	$("#textbox_pembanding_9,#textbox_pembanding_11").each(function(){
		$(this).closest("tr")
			.find("td").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
			.find("span").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
			.find(".form-control").css({"font-weight": "bold", "font-size": "1.4rem"}).closest("tr")
		;
	});

	$("#textbox_sarana_37, #textbox_sarana_38, #textbox_sarana_75, #textbox_sarana_76, #textbox_sarana_77, #textbox_sarana_78, #textbox_sarana_4, #textbox_sarana_10, #textbox_sarana_16, #textbox_sarana_22, #textbox_sarana_28, #textbox_sarana_34, #textbox_sarana_6, #textbox_sarana_12, #textbox_sarana_18, #textbox_sarana_24, #textbox_sarana_30, #textbox_sarana_36, #textbox_sarana_44, #textbox_sarana_50, #textbox_sarana_56, #textbox_sarana_62, #textbox_sarana_68, #textbox_sarana_74").attr("readonly", true).addClass("readonly");
	$("#textbox_sarana_4").addClass("readonly");
	$("#textbox_sarana_10").addClass("readonly");
	$("#textbox_sarana_16").addClass("readonly");
	$("#textbox_sarana_22").addClass("readonly");
	$("#textbox_sarana_28").addClass("readonly");
	$("#textbox_sarana_34").addClass("readonly");
	$("#textbox_sarana_42").addClass("readonly");
	$("#textbox_sarana_48").addClass("readonly");
	$("#textbox_sarana_54").addClass("readonly");
	$("#textbox_sarana_60").addClass("readonly");
	$("#textbox_sarana_66").addClass("readonly");
	$("#textbox_sarana_72").addClass("readonly");
	
	$("#textbox_entry_3, #textbox_entry_5, #textbox_entry_15, #textbox_entry_18, #textbox_entry_21, #textbox_entry_23, #textbox_entry_25, #textbox_entry_27, #textbox_entry_2").attr("readonly", true).addClass("readonly");
	
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

	get_ringkasan_laporan()
});

$(document).on("click", ".panel-head", function() {
	var role	= $(this).attr("aria-controls");
	window.history.pushState("object or string", "Title", window.location.pathname + "?role=" + role );
	
	tab_loaded.push(role)
	if (role === 'entry')
	{
		get_ringkasan_laporan()
		get_history_penilaian()
	}
	else if (role == "tanah")
	{
		get_data_legalitas(role);
		calculate_total_luas_tanah_data_legalitas('#table_data_legalitas_1');
		get_ringkasan_laporan()
	}
	else if (role == "dbanding")
	{
		get_pembanding();
		get_data_legalitas(role);
		// calculate_tab_pembanding();
		calculate_total_luas_tanah_data_legalitas('#table_data_legalitas_2');
	}
	
});

$(document).on("change", ".table_input", function(){
	var id_lokasi	= $("#id_lokasi").val();
	var id_field	= $(this).attr("data-id-field");
	var type		= $(this).attr("type");
	var value		= $(this).val();
	
	
	if ($(this).attr("data-keterangan")){
		var keterangan	= $(this).attr("data-keterangan");
	}else{
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
		$("#textbox_tanah_1").val(value)	 //.trigger("change");
	}
	else if (id_field == "14")
	{
		$("#textbox_tanah_2").val(value)	 //.trigger("change");
	}
	else if (id_field == "16")
	{
		$("#textbox_tanah_3").val(value)	 //.trigger("change");
	}
	else if (id_field == "9")
	{
		$(".tanah-td-tanggal-inspeksi").html(value)	 //.trigger("change");
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

$(document).on("click", ".btn-tambah-pembanding", function(){
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
			$.each(data.data_table, function(i, item) {
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
					}else if ( j != "tanah_98" ){
						row	+= "<td>" + item1 + "</td>";
					}
				});
				
				row	+= "</tr>";
				$(terget_tab_tbody).append(row);
				a++;
			});

			initDate();
			
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
}

function calculate_total_luas_tanah_data_legalitas(terget_tab) {
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
	
	$(terget_tab).find("#textbox_tanah_61").val(total_luas_tanah).number( true, 0 )	.trigger("change");
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
		$(this).val(0)	 //.trigger("change");
	}
});


// Form Sarana Pelengkap
$('#textbox_sarana_2, #textbox_sarana_3, #textbox_sarana_5, #textbox_sarana_8, #textbox_sarana_9, #textbox_sarana_11, #textbox_sarana_14, #textbox_sarana_15, #textbox_sarana_17, #textbox_sarana_20, #textbox_sarana_21, #textbox_sarana_23, #textbox_sarana_26, #textbox_sarana_27, #textbox_sarana_29, #textbox_sarana_32, #textbox_sarana_33, #textbox_sarana_35, #textbox_sarana_40, #textbox_sarana_41, #textbox_sarana_43, #textbox_sarana_46, #textbox_sarana_47, #textbox_sarana_49, #textbox_sarana_52, #textbox_sarana_53, #textbox_sarana_55, #textbox_sarana_58, #textbox_sarana_59, #textbox_sarana_61, #textbox_sarana_64, #textbox_sarana_65, #textbox_sarana_67, #textbox_sarana_70, #textbox_sarana_71, #textbox_sarana_73').change(function(){
	update_sarana_pelengkap();
});

function update_sarana_pelengkap()
{	
	var jumlah1 = $("#textbox_sarana_2").val() == "" ? 0 : parseFloat($("#textbox_sarana_2").val()) || 0;
	var jumlah2 = $("#textbox_sarana_8").val() == "" ? 0 : parseFloat($("#textbox_sarana_8").val()) || 0;
	var jumlah3 = $("#textbox_sarana_14").val() == "" ? 0 : parseFloat($("#textbox_sarana_14").val()) || 0;
	var jumlah4 = $("#textbox_sarana_20").val() == "" ? 0 : parseFloat($("#textbox_sarana_20").val()) || 0;
	var jumlah5 = $("#textbox_sarana_26").val() == "" ? 0 : parseFloat($("#textbox_sarana_26").val()) || 0;
	var jumlah6 = $("#textbox_sarana_32").val() == "" ? 0 : parseFloat($("#textbox_sarana_32").val()) || 0;
	var jumlah7 = $("#textbox_sarana_40").val() == "" ? 0 : parseFloat($("#textbox_sarana_40").val()) || 0;
	var jumlah8 = $("#textbox_sarana_46").val() == "" ? 0 : parseFloat($("#textbox_sarana_46").val()) || 0;
	var jumlah9 = $("#textbox_sarana_52").val() == "" ? 0 : parseFloat($("#textbox_sarana_52").val()) || 0;
	var jumlah10 = $("#textbox_sarana_58").val() == "" ? 0 : parseFloat($("#textbox_sarana_58").val()) || 0;
	var jumlah11 = $("#textbox_sarana_64").val() == "" ? 0 : parseFloat($("#textbox_sarana_64").val()) || 0;
	var jumlah12 = $("#textbox_sarana_70").val() == "" ? 0 : parseFloat($("#textbox_sarana_70").val()) || 0;
	
	var biayasatuan1 = $("#textbox_sarana_3").val() == "" ? 0 : parseFloat($("#textbox_sarana_3").val()) || 0;
	var biayasatuan2 = $("#textbox_sarana_9").val() == "" ? 0 : parseFloat($("#textbox_sarana_9").val()) || 0;
	var biayasatuan3 = $("#textbox_sarana_15").val() == "" ? 0 : parseFloat($("#textbox_sarana_15").val()) || 0;
	var biayasatuan4 = $("#textbox_sarana_21").val() == "" ? 0 : parseFloat($("#textbox_sarana_21").val()) || 0;
	var biayasatuan5 = $("#textbox_sarana_27").val() == "" ? 0 : parseFloat($("#textbox_sarana_27").val()) || 0;
	var biayasatuan6 = $("#textbox_sarana_33").val() == "" ? 0 : parseFloat($("#textbox_sarana_33").val()) || 0;
	var biayasatuan7 = $("#textbox_sarana_41").val() == "" ? 0 : parseFloat($("#textbox_sarana_41").val()) || 0;
	var biayasatuan8 = $("#textbox_sarana_47").val() == "" ? 0 : parseFloat($("#textbox_sarana_47").val()) || 0;
	var biayasatuan9 = $("#textbox_sarana_53").val() == "" ? 0 : parseFloat($("#textbox_sarana_53").val()) || 0;
	var biayasatuan10 = $("#textbox_sarana_59").val() == "" ? 0 : parseFloat($("#textbox_sarana_59").val()) || 0;
	var biayasatuan11 = $("#textbox_sarana_65").val() == "" ? 0 : parseFloat($("#textbox_sarana_65").val()) || 0;
	var biayasatuan12 = $("#textbox_sarana_71").val() == "" ? 0 : parseFloat($("#textbox_sarana_71").val()) || 0;
	
	var dep1 = $("#textbox_sarana_5").val() == "" ? 0 : parseFloat($("#textbox_sarana_5").val()) || 0;
	var dep2 = $("#textbox_sarana_11").val() == "" ? 0 : parseFloat($("#textbox_sarana_11").val()) || 0;
	var dep3 = $("#textbox_sarana_17").val() == "" ? 0 : parseFloat($("#textbox_sarana_17").val()) || 0;
	var dep4 = $("#textbox_sarana_23").val() == "" ? 0 : parseFloat($("#textbox_sarana_23").val()) || 0;
	var dep5 = $("#textbox_sarana_29").val() == "" ? 0 : parseFloat($("#textbox_sarana_29").val()) || 0;
	var dep6 = $("#textbox_sarana_35").val() == "" ? 0 : parseFloat($("#textbox_sarana_35").val()) || 0;
	var dep7 = $("#textbox_sarana_43").val() == "" ? 0 : parseFloat($("#textbox_sarana_43").val()) || 0;
	var dep8 = $("#textbox_sarana_49").val() == "" ? 0 : parseFloat($("#textbox_sarana_49").val()) || 0;
	var dep9 = $("#textbox_sarana_55").val() == "" ? 0 : parseFloat($("#textbox_sarana_55").val()) || 0;
	var dep10 = $("#textbox_sarana_61").val() == "" ? 0 : parseFloat($("#textbox_sarana_61").val()) || 0;
	var dep11 = $("#textbox_sarana_67").val() == "" ? 0 : parseFloat($("#textbox_sarana_67").val()) || 0;
	var dep12 = $("#textbox_sarana_73").val() == "" ? 0 : parseFloat($("#textbox_sarana_73").val()) || 0;
	
	var rcn1 = jumlah1 * biayasatuan1;
	var rcn2 = jumlah2 * biayasatuan2;
	var rcn3 = jumlah3 * biayasatuan3;
	var rcn4 = jumlah4 * biayasatuan4;
	var rcn5 = jumlah5 * biayasatuan5;
	var rcn6 = jumlah6 * biayasatuan6;
	var rcn7 = jumlah7 * biayasatuan7;
	var rcn8 = jumlah8 * biayasatuan8;
	var rcn9 = jumlah9 * biayasatuan9;
	var rcn10 = jumlah10 * biayasatuan10;
	var rcn11 = jumlah11 * biayasatuan11;
	var rcn12 = jumlah12 * biayasatuan12;
	
	var nilaipasar1 = rcn1 - (rcn1 * dep1 / 100);
	var nilaipasar2 = rcn2 - (rcn2 * dep2 / 100);
	var nilaipasar3 = rcn3 - (rcn3 * dep3 / 100);
	var nilaipasar4 = rcn4 - (rcn4 * dep4 / 100);
	var nilaipasar5 = rcn5 - (rcn5 * dep5 / 100);
	var nilaipasar6 = rcn6 - (rcn6 * dep6 / 100);
	var nilaipasar7 = rcn7 - (rcn7 * dep7 / 100);
	var nilaipasar8 = rcn8 - (rcn8 * dep8 / 100);
	var nilaipasar9 = rcn9 - (rcn9 * dep9 / 100);
	var nilaipasar10 = rcn10 - (rcn10 * dep10 / 100);
	var nilaipasar11 = rcn11 - (rcn11 * dep11 / 100);
	var nilaipasar12 = rcn12 - (rcn12 * dep12 / 100);

	var total_sp_1	= rcn1 + rcn2 + rcn3 + rcn4 + rcn5 + rcn6;
	var total_sp_2	= rcn7 + rcn7 + rcn9 + rcn10 + rcn11 + rcn12;
	
	var total_nilaipasar_1	= nilaipasar1 + nilaipasar2 + nilaipasar3 + nilaipasar4 + nilaipasar5 + nilaipasar6;
	var total_nilaipasar_2	= nilaipasar7 + nilaipasar8 + nilaipasar9 + nilaipasar10 + nilaipasar11 + nilaipasar12;
	
	$("#textbox_sarana_4").val(rcn1)	//.trigger("change");
	$("#textbox_sarana_10").val(rcn2)	//.trigger("change");
	$("#textbox_sarana_16").val(rcn3)	//.trigger("change");
	$("#textbox_sarana_22").val(rcn4)	//.trigger("change");
	$("#textbox_sarana_28").val(rcn5)	//.trigger("change");
	$("#textbox_sarana_34").val(rcn6)	//.trigger("change");
	$("#textbox_sarana_42").val(rcn7)	//.trigger("change");
	$("#textbox_sarana_48").val(rcn8)	//.trigger("change");
	$("#textbox_sarana_54").val(rcn9)	//.trigger("change");
	$("#textbox_sarana_60").val(rcn10)	//.trigger("change");
	$("#textbox_sarana_66").val(rcn11)	//.trigger("change");
	$("#textbox_sarana_72").val(rcn12)	//.trigger("change");
	
	$("#textbox_sarana_6").val(nilaipasar1)		//.trigger("change");
	$("#textbox_sarana_12").val(nilaipasar2)	//.trigger("change");
	$("#textbox_sarana_18").val(nilaipasar3)	//.trigger("change");
	$("#textbox_sarana_24").val(nilaipasar4)	//.trigger("change");
	$("#textbox_sarana_30").val(nilaipasar5)	//.trigger("change");
	$("#textbox_sarana_36").val(nilaipasar6)	//.trigger("change");
	$("#textbox_sarana_44").val(nilaipasar7)	//.trigger("change");
	$("#textbox_sarana_50").val(nilaipasar8)	//.trigger("change");
	$("#textbox_sarana_56").val(nilaipasar9)	//.trigger("change");
	$("#textbox_sarana_62").val(nilaipasar10)	//.trigger("change");
	$("#textbox_sarana_68").val(nilaipasar11)	//.trigger("change");
	$("#textbox_sarana_74").val(nilaipasar12)	//.trigger("change");
	
	$("#textbox_sarana_37").val(total_sp_1)									//.trigger("change");
	$("#textbox_sarana_75").val(total_sp_2)									//.trigger("change");
	$("#textbox_sarana_77").val(total_sp_1 - total_sp_2)					//.trigger("change");
	
	$("#textbox_sarana_38").val(total_nilaipasar_1) .trigger("change");
	$("#textbox_sarana_76").val(total_nilaipasar_2)							//.trigger("change");
	$("#textbox_sarana_78").val(total_nilaipasar_1 - total_nilaipasar_2)	//.trigger("change");
	
	$("#textbox_tanah_64, #textbox_tanah_65, #textbox_tanah_66, #textbox_sarana_3, #textbox_sarana_9, #textbox_sarana_15, #textbox_sarana_21, #textbox_sarana_27, #textbox_sarana_33, #textbox_sarana_41, #textbox_sarana_47, #textbox_sarana_53, #textbox_sarana_59, #textbox_sarana_65, #textbox_sarana_71, #textbox_sarana_4, #textbox_sarana_4, #textbox_sarana_10, #textbox_sarana_16, #textbox_sarana_22, #textbox_sarana_28, #textbox_sarana_34, #textbox_sarana_6, #textbox_sarana_12, #textbox_sarana_18, #textbox_sarana_24, #textbox_sarana_30, #textbox_sarana_37, #textbox_sarana_38, #textbox_sarana_42, #textbox_sarana_48, #textbox_sarana_54, #textbox_sarana_60, #textbox_sarana_66, #textbox_sarana_44, #textbox_sarana_50, #textbox_sarana_56, #textbox_sarana_62, #textbox_sarana_68, #textbox_sarana_74, #textbox_sarana_72, #textbox_sarana_75, #textbox_sarana_76, #textbox_sarana_77, #textbox_sarana_78").number( true, 0 );
}

function get_pembanding()
{
	return;
	$.ajax({
		type		: "POST",
		url 		: base_url + "AjaxPekerjaan/get_tab_pembanding/",
		beforeSend: function() {
			$("#table_pembanding").html("<div class='text-center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></div>");
		},
		data		: {
			id_lokasi 	: $("#id_lokasi").val()
		},
		success		: function (data) {
			$("#table_pembanding").html("");
			$("#table_pembanding").html(data);
			
			setTimeout(function(){ calculate_tab_pembanding(); }, 3000);
			
		}
	});
}


$(document).on("change", ".input_255_1, .input_256_1, .input_255_2, .input_256_2, .input_255_3, .input_256_3, .input_260_1, .input_260_2, .input_260_3, .input_277_1-0, .input_277_2-0, .input_277_3-0, .input_278_1-0, .input_278_2-0, .input_278_3-0, .input_279_1-0, .input_279_2-0, .input_279_3-0, .input_280_1-0, .input_280_2-0, .input_280_3-0, .input_281_1-0, .input_281_2-0, .input_281_3-0, .input_281_1-0, .input_281_2-0, .input_281_3-0, .input_282_1-0, .input_282_2-0, .input_282_3-0, .input_283_1-0, .input_283_2-0, .input_283_3-0, .input_284_1-0, .input_284_2-0, .input_284_3-0, .input_285_1-0, .input_285_2-0, .input_285_3-0, .input_286_1-0, .input_286_2-0, .input_286_3-0, .input_287_1-0, .input_287_2-0, .input_287_3-0, .input_288_1-0, .input_288_2-0, .input_288_3-0, .input_270_1, .input_270_2, .input_270_3, .input_272_1, .input_272_2, .input_272_3 ", function()
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
		var input_276_1 = input_274_1 / input_260_1;
		
		$(".input_257_1").val(input_257_1)
		$(".input_273_1").val(input_273_1)
		$(".input_274_1").val(input_274_1)
		$(".input_276_1").val(input_276_1)
		$(".input_271_1").val(input_271_1)
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
		var input_276_2 = input_274_2 / input_260_2;
		
		$(".input_257_2").val(input_257_2)
		$(".input_273_2").val(input_273_2)
		$(".input_274_2").val(input_274_2)
		$(".input_276_2").val(input_276_2)
		$(".input_271_2").val(input_271_2)
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
		var input_276_3 = input_274_3 / input_260_3;
		
		$(".input_257_3").val(input_257_3)
		$(".input_273_3").val(input_273_3)
		$(".input_274_3").val(input_274_3)
		$(".input_276_3").val(input_276_3)
		$(".input_271_3").val(input_271_3)
	}
	
	/*Penyesuaian*/
	{
		var input_277_1_0	= parseFloat($(".input_277_1-0").val()) || 0;
		var input_277_2_0	= parseFloat($(".input_277_2-0").val()) || 0;
		var input_277_3_0	= parseFloat($(".input_277_3-0").val()) || 0;

		var input_277_1_2	= input_277_1_0 * input_276_1 / 100;
		var input_277_2_2	= input_277_2_0 * input_276_2 / 100;
		var input_277_3_2	= input_277_3_0 * input_276_3 / 100;
		var input_277_1_3	= input_277_1_2 * input_260_1;
		var input_277_2_3	= input_277_2_2 * input_260_2;
		var input_277_3_3	= input_277_3_2 * input_260_3;
		
		$(".input_277_1-2").val(input_277_1_2)	 //.trigger("change");
		$(".input_277_2-2").val(input_277_2_2)	 //.trigger("change");
		$(".input_277_3-2").val(input_277_3_2)	 //.trigger("change");
		$(".input_277_1-3").val(input_277_1_3)	 //.trigger("change");
		$(".input_277_2-3").val(input_277_2_3)	 //.trigger("change");
		$(".input_277_3-3").val(input_277_3_3)	 //.trigger("change");
		
		
		var input_278_1_0	= parseFloat($(".input_278_1-0").val()) || 0;
		var input_278_2_0	= parseFloat($(".input_278_2-0").val()) || 0;
		var input_278_3_0	= parseFloat($(".input_278_3-0").val()) || 0;
		
		var input_278_1_2	= input_278_1_0 * input_276_1 / 100;
		var input_278_2_2	= input_278_2_0 * input_276_2 / 100;
		var input_278_3_2	= input_278_3_0 * input_276_3 / 100;
		var input_278_1_3	= input_278_1_2 * input_260_1;
		var input_278_2_3	= input_278_2_2 * input_260_2;
		var input_278_3_3	= input_278_3_2 * input_260_3;
		
		$(".input_278_1-2").val(input_278_1_2)	 //.trigger("change");
		$(".input_278_2-2").val(input_278_2_2)	 //.trigger("change");
		$(".input_278_3-2").val(input_278_3_2)	 //.trigger("change");
		$(".input_278_1-3").val(input_278_1_3)	 //.trigger("change");
		$(".input_278_2-3").val(input_278_2_3)	 //.trigger("change");
		$(".input_278_3-3").val(input_278_3_3)	 //.trigger("change");
		
		var input_279_1_0	= parseFloat($(".input_279_1-0").val()) || 0;
		var input_279_2_0	= parseFloat($(".input_279_2-0").val()) || 0;
		var input_279_3_0	= parseFloat($(".input_279_3-0").val()) || 0;
		
		var input_279_1_2	= input_279_1_0 * input_276_1 / 100;
		var input_279_2_2	= input_279_2_0 * input_276_2 / 100;
		var input_279_3_2	= input_279_3_0 * input_276_3 / 100;
		var input_279_1_3	= input_279_1_2 * input_260_1;
		var input_279_2_3	= input_279_2_2 * input_260_2;
		var input_279_3_3	= input_279_3_2 * input_260_3;
		
		$(".input_279_1-2").val(input_279_1_2)	 //.trigger("change");
		$(".input_279_2-2").val(input_279_2_2)	 //.trigger("change");
		$(".input_279_3-2").val(input_279_3_2)	 //.trigger("change");
		$(".input_279_1-3").val(input_279_1_3)	 //.trigger("change");
		$(".input_279_2-3").val(input_279_2_3)	 //.trigger("change");
		$(".input_279_3-3").val(input_279_3_3)	 //.trigger("change");
		
		var input_280_1_0	= parseFloat($(".input_280_1-0").val()) || 0;
		var input_280_2_0	= parseFloat($(".input_280_2-0").val()) || 0;
		var input_280_3_0	= parseFloat($(".input_280_3-0").val()) || 0;
		
		var input_280_1_2	= input_280_1_0 * input_276_1 / 100;
		var input_280_2_2	= input_280_2_0 * input_276_2 / 100;
		var input_280_3_2	= input_280_3_0 * input_276_3 / 100;
		var input_280_1_3	= input_280_1_2 * input_260_1;
		var input_280_2_3	= input_280_2_2 * input_260_2;
		var input_280_3_3	= input_280_3_2 * input_260_3;
		
		$(".input_280_1-2").val(input_280_1_2)	 //.trigger("change");
		$(".input_280_2-2").val(input_280_2_2)	 //.trigger("change");
		$(".input_280_3-2").val(input_280_3_2)	 //.trigger("change");
		$(".input_280_1-3").val(input_280_1_3)	 //.trigger("change");
		$(".input_280_2-3").val(input_280_2_3)	 //.trigger("change");
		$(".input_280_3-3").val(input_280_3_3)	 //.trigger("change");
		
		var input_281_1_0	= parseFloat($(".input_281_1-0").val()) || 0;
		var input_281_2_0	= parseFloat($(".input_281_2-0").val()) || 0;
		var input_281_3_0	= parseFloat($(".input_281_3-0").val()) || 0;
		
		var input_281_1_2	= input_281_1_0 * input_276_1 / 100;
		var input_281_2_2	= input_281_2_0 * input_276_2 / 100;
		var input_281_3_2	= input_281_3_0 * input_276_3 / 100;
		var input_281_1_3	= input_281_1_2 * input_260_1;
		var input_281_2_3	= input_281_2_2 * input_260_2;
		var input_281_3_3	= input_281_3_2 * input_260_3;
		
		$(".input_281_1-2").val(input_281_1_2)	 //.trigger("change");
		$(".input_281_2-2").val(input_281_2_2)	 //.trigger("change");
		$(".input_281_3-2").val(input_281_3_2)	 //.trigger("change");
		$(".input_281_1-3").val(input_281_1_3)	 //.trigger("change");
		$(".input_281_2-3").val(input_281_2_3)	 //.trigger("change");
		$(".input_281_3-3").val(input_281_3_3)	 //.trigger("change");
		
		var input_283_1_0	= parseFloat($(".input_283_1-0").val()) || 0;
		var input_283_2_0	= parseFloat($(".input_283_2-0").val()) || 0;
		var input_283_3_0	= parseFloat($(".input_283_3-0").val()) || 0;
		
		var input_283_1_1	= input_283_1_0 * input_276_1 / 100;
		var input_283_2_1	= input_283_2_0 * input_276_2 / 100;
		var input_283_3_1	= input_283_3_0 * input_276_3 / 100;
		var input_283_1_2	= input_283_1_1 * input_260_1;
		var input_283_2_2	= input_283_2_1 * input_260_2;
		var input_283_3_2	= input_283_3_1 * input_260_3;
		
		$(".input_283_1-1").val(input_283_1_1)	 //.trigger("change");
		$(".input_283_2-1").val(input_283_2_1)	 //.trigger("change");
		$(".input_283_3-1").val(input_283_3_1)	 //.trigger("change");
		$(".input_283_1-2").val(input_283_1_2)	 //.trigger("change");
		$(".input_283_2-2").val(input_283_2_2)	 //.trigger("change");
		$(".input_283_3-2").val(input_283_3_2)	 //.trigger("change");
		
		var input_284_1_0	= parseFloat($(".input_284_1-0").val()) || 0;
		var input_284_2_0	= parseFloat($(".input_284_2-0").val()) || 0;
		var input_284_3_0	= parseFloat($(".input_284_3-0").val()) || 0;
		
		var input_284_1_1	= input_284_1_0 * input_276_1 / 100;
		var input_284_2_1	= input_284_2_0 * input_276_2 / 100;
		var input_284_3_1	= input_284_3_0 * input_276_3 / 100;
		var input_284_1_2	= input_284_1_1 * input_260_1;
		var input_284_2_2	= input_284_2_1 * input_260_2;
		var input_284_3_2	= input_284_3_1 * input_260_3;
		
		$(".input_284_1-1").val(input_284_1_1)	 //.trigger("change");
		$(".input_284_2-1").val(input_284_2_1)	 //.trigger("change");
		$(".input_284_3-1").val(input_284_3_1)	 //.trigger("change");
		$(".input_284_1-2").val(input_284_1_2)	 //.trigger("change");
		$(".input_284_2-2").val(input_284_2_2)	 //.trigger("change");
		$(".input_284_3-2").val(input_284_3_2)	 //.trigger("change");
		
		
		
		var input_285_1_0	= parseFloat($(".input_285_1-0").val()) || 0;
		var input_285_2_0	= parseFloat($(".input_285_2-0").val()) || 0;
		var input_285_3_0	= parseFloat($(".input_285_3-0").val()) || 0;
		
		var input_285_1_2	= input_285_1_0 * input_276_1 / 100;
		var input_285_2_2	= input_285_2_0 * input_276_2 / 100;
		var input_285_3_2	= input_285_3_0 * input_276_3 / 100;
		var input_285_1_3	= input_285_1_2 * input_260_1;
		var input_285_2_3	= input_285_2_2 * input_260_2;
		var input_285_3_3	= input_285_3_2 * input_260_3;
		
		$(".input_285_1-2").val(input_285_1_2)	 //.trigger("change");
		$(".input_285_2-2").val(input_285_2_2)	 //.trigger("change");
		$(".input_285_3-2").val(input_285_3_2)	 //.trigger("change");
		$(".input_285_1-3").val(input_285_1_3)	 //.trigger("change");
		$(".input_285_2-3").val(input_285_2_3)	 //.trigger("change");
		$(".input_285_3-3").val(input_285_3_3)	 //.trigger("change");
		
		var input_286_1_0	= parseFloat($(".input_286_1-0").val()) || 0;
		var input_286_2_0	= parseFloat($(".input_286_2-0").val()) || 0;
		var input_286_3_0	= parseFloat($(".input_286_3-0").val()) || 0;
		
		var input_286_1_2	= input_286_1_0 * input_276_1 / 100;
		var input_286_2_2	= input_286_2_0 * input_276_2 / 100;
		var input_286_3_2	= input_286_3_0 * input_276_3 / 100;
		var input_286_1_3	= input_286_1_2 * input_260_1;
		var input_286_2_3	= input_286_2_2 * input_260_2;
		var input_286_3_3	= input_286_3_2 * input_260_3;
		
		$(".input_286_1-2").val(input_286_1_2)	 //.trigger("change");
		$(".input_286_2-2").val(input_286_2_2)	 //.trigger("change");
		$(".input_286_3-2").val(input_286_3_2)	 //.trigger("change");
		$(".input_286_1-3").val(input_286_1_3)	 //.trigger("change");
		$(".input_286_2-3").val(input_286_2_3)	 //.trigger("change");
		$(".input_286_3-3").val(input_286_3_3)	 //.trigger("change");
		
		var input_287_1_0	= parseFloat($(".input_287_1-0").val()) || 0;
		var input_287_2_0	= parseFloat($(".input_287_2-0").val()) || 0;
		var input_287_3_0	= parseFloat($(".input_287_3-0").val()) || 0;
		
		var input_287_1_2	= input_287_1_0 * input_276_1 / 100;
		var input_287_2_2	= input_287_2_0 * input_276_2 / 100;
		var input_287_3_2	= input_287_3_0 * input_276_3 / 100;
		var input_287_1_3	= input_287_1_2 * input_260_1;
		var input_287_2_3	= input_287_2_2 * input_260_2;
		var input_287_3_3	= input_287_3_2 * input_260_3;
		
		$(".input_287_1-2").val(input_287_1_2)	 //.trigger("change");
		$(".input_287_2-2").val(input_287_2_2)	 //.trigger("change");
		$(".input_287_3-2").val(input_287_3_2)	 //.trigger("change");
		$(".input_287_1-3").val(input_287_1_3)	 //.trigger("change");
		$(".input_287_2-3").val(input_287_2_3)	 //.trigger("change");
		$(".input_287_3-3").val(input_287_3_3)	 //.trigger("change");
		
		var input_288_1_0	= parseFloat($(".input_288_1-0").val()) || 0;
		var input_288_2_0	= parseFloat($(".input_288_2-0").val()) || 0;
		var input_288_3_0	= parseFloat($(".input_288_3-0").val()) || 0;
		
		var input_288_1_1	= input_288_1_0 * input_276_1 / 100;
		var input_288_2_1	= input_288_2_0 * input_276_2 / 100;
		var input_288_3_1	= input_288_3_0 * input_276_3 / 100;
		var input_288_1_2	= input_288_1_1 * input_260_1;
		var input_288_2_2	= input_288_2_1 * input_260_2;
		var input_288_3_2	= input_288_3_1 * input_260_3;
		
		$(".input_288_1-1").val(input_288_1_1)	 //.trigger("change");
		$(".input_288_2-1").val(input_288_2_1)	 //.trigger("change");
		$(".input_288_3-1").val(input_288_3_1)	 //.trigger("change");
		$(".input_288_1-2").val(input_288_1_2)	 //.trigger("change");
		$(".input_288_2-2").val(input_288_2_2)	 //.trigger("change");
		$(".input_288_3-2").val(input_288_3_2)	 //.trigger("change");
	}

	// console.log (input_277_1_0, input_278_1_0, input_279_1_0, input_280_1_0, input_281_1_0, input_283_1_0, input_284_1_0, input_285_1_0, input_286_1_0, input_287_1_0, input_288_1_0);

	// console.log (input_277_1_0 + input_278_1_0 + input_279_1_0 + input_280_1_0 + input_281_1_0 + input_283_1_0 + input_284_1_0 + input_285_1_0 + input_286_1_0 + input_287_1_0 + input_288_1_0);


	var input_289_1_0	= input_277_1_0 + input_278_1_0 + input_279_1_0 + input_280_1_0 + input_281_1_0 + input_283_1_0 + input_284_1_0 + input_285_1_0 + input_286_1_0 + input_287_1_0 + input_288_1_0;
	var input_289_2_0	= input_277_2_0 + input_278_2_0 + input_279_2_0 + input_280_2_0 + input_281_2_0 + input_283_2_0 + input_284_2_0 + input_285_2_0 + input_286_2_0 + input_287_2_0 + input_288_2_0;
	var input_289_3_0	= input_277_3_0 + input_278_3_0 + input_279_3_0 + input_280_3_0 + input_281_3_0 + input_283_3_0 + input_284_3_0 + input_285_3_0 + input_286_3_0 + input_287_3_0 + input_288_3_0;

	$(".input_289_1-0").val(input_289_1_0)	 //.trigger("change");
	$(".input_289_2-0").val(input_289_2_0)	 //.trigger("change");
	$(".input_289_3-0").val(input_289_3_0)	 //.trigger("change");
	
	var input_289_1_1	= input_277_1_2 + input_278_1_2 + input_279_1_2 + input_280_1_2 + input_281_1_2 + input_283_1_1 + input_284_1_1 + input_285_1_2 + input_286_1_2 + input_287_1_2 + input_288_1_1;
	var input_289_2_1	= input_277_2_2 + input_278_2_2 + input_279_2_2 + input_280_2_2 + input_281_2_2 + input_283_2_1 + input_284_2_1 + input_285_2_2 + input_286_2_2 + input_287_2_2 + input_288_2_1;
	var input_289_3_1	= input_277_3_2 + input_278_3_2 + input_279_3_2 + input_280_3_2 + input_281_3_2 + input_283_3_1 + input_284_3_1 + input_285_3_2 + input_286_3_2 + input_287_3_2 + input_288_3_1;
	
	$(".input_289_1-1").val(input_289_1_1)	 //.trigger("change");
	$(".input_289_2-1").val(input_289_2_1)	 //.trigger("change");
	$(".input_289_3-1").val(input_289_3_1)	 //.trigger("change");
	
	var input_289_1_2	= input_277_1_3 + input_278_1_3 + input_279_1_3 + input_280_1_3 + input_281_1_3 + input_283_1_2 + input_284_1_2 + input_285_1_3 + input_286_1_3 + input_287_1_3 + input_288_1_2;
	var input_289_2_2	= input_277_2_3 + input_278_2_3 + input_279_2_3 + input_280_2_3 + input_281_2_3 + input_283_2_2 + input_284_2_2 + input_285_2_3 + input_286_2_3 + input_287_2_3 + input_288_2_2;
	var input_289_3_2	= input_277_3_3 + input_278_3_3 + input_279_3_3 + input_280_3_3 + input_281_3_3 + input_283_3_2 + input_284_3_2 + input_285_3_3 + input_286_3_3 + input_287_3_3 + input_288_3_1;
	
	$(".input_289_1-2").val(input_289_1_2)	 //.trigger("change");
	$(".input_289_2-2").val(input_289_2_2)	 //.trigger("change");
	$(".input_289_3-2").val(input_289_3_2)	 //.trigger("change");
	
	
	
	var input_290_1		= input_276_1 * (1 + (input_289_1_0 / 100));
	var input_290_2		= input_276_2 * (1 + (input_289_2_0 / 100));
	var input_290_3		= input_276_3 * (1 + (input_289_3_0 / 100));
	
	$(".input_290_1").val(input_290_1)	 //.trigger("change");
	$(".input_290_2").val(input_290_2)	 //.trigger("change");
	$(".input_290_3").val(input_290_3)	 //.trigger("change");
	
	cek_deviasi();
	
	// Bobot Rekonsilasi
	{
		var perbedaan_1	=  Math.abs(input_277_1_0) + Math.abs(input_278_1_0) + Math.abs(input_279_1_0) + Math.abs(input_280_1_0) + Math.abs(input_281_1_0) + Math.abs(input_283_1_0) + Math.abs(input_284_1_0) + Math.abs(input_285_1_0) + Math.abs(input_286_1_0) + Math.abs(input_287_1_0) + Math.abs(input_288_1_0);

		var perbedaan_2	=  Math.abs(input_277_2_0) + Math.abs(input_278_2_0) + Math.abs(input_279_2_0) + Math.abs(input_280_2_0) + Math.abs(input_281_2_0) + Math.abs(input_283_2_0) + Math.abs(input_284_2_0) + Math.abs(input_285_2_0) + Math.abs(input_286_2_0) + Math.abs(input_287_2_0) + Math.abs(input_288_2_0);

		var perbedaan_3	=  Math.abs(input_277_3_0) + Math.abs(input_278_3_0) + Math.abs(input_279_3_0) + Math.abs(input_280_3_0) + Math.abs(input_281_3_0) + Math.abs(input_283_3_0) + Math.abs(input_284_3_0) + Math.abs(input_285_3_0) + Math.abs(input_286_3_0) + Math.abs(input_287_3_0) + Math.abs(input_288_3_0);
		
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
		
		$(".input_291_0").val((rekonsiliasi_1 + rekonsiliasi_2 + rekonsiliasi_3) * 100)	 //.trigger("change");
		$(".input_291_1").val(rekonsiliasi_1 * 100)  //.trigger("change");
		$(".input_291_2").val(rekonsiliasi_2 * 100)  //.trigger("change");
		$(".input_291_3").val(rekonsiliasi_3 * 100)  //.trigger("change");
		
		var input_292_1	= input_290_1 * rekonsiliasi_1;
		var input_292_2	= input_290_2 * rekonsiliasi_2;
		var input_292_3	= input_290_3 * rekonsiliasi_3;
		var input_292_0 = input_292_1 + input_292_2 + input_292_3;
		
		$(".input_292_0").val(input_292_0)			//.trigger('change');
		$(".input_292_1").val(input_292_1)			//.trigger('change');
		$(".input_292_2").val(input_292_2)			//.trigger('change');
		$(".input_292_3").val(input_292_3)			//.trigger('change');
		
		
		calculate_tab_pembanding_2();
	}

};

$(document).on("change", "input[data-id-field=348]", function()
{
	calculate_tab_pembanding_2();
});

function calculate_tab_pembanding_2()
{
	var input_292_0 		= parseFloat($(".input_292_0").val()) || 0;
	var total_luas_tanah 	= 0;
	var total_nilai_tanah 	= 0;
		
	var i = 1;
	$('#table_data_legalitas_2 > tbody > tr').each(function(){
		var luas_tanah	= 0;
		var bobot		= 0;
		var indikasi	= 0;
		var total_tanah	= 0;
		
		$(this).find('td').each (function() {
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
				$(this).find('input').val(indikasi)		//.trigger("change");
			}
				
			total_tanah = indikasi * luas_tanah;
			
			if ($(this).attr("td-type") == "total_nilai_tanah"){
				$(this).find('input').val(total_tanah)	 //.trigger("change");
			}
		}); 
			
		total_luas_tanah	= total_luas_tanah + luas_tanah;
		total_nilai_tanah	= total_nilai_tanah + total_tanah;
				
		i++;
	});
		
	$("#textbox_tanah_71").val(total_nilai_tanah/total_luas_tanah).number( true, 0 )	 //.trigger("change");
	$("#textbox_tanah_72").val(total_nilai_tanah).number( true, 0 )	 //.trigger("change");
	
	var indikasi_nilai_tanah_setelah_pembulatan	= total_nilai_tanah/total_luas_tanah;
	$("#textbox_pembanding_47").val(indikasi_nilai_tanah_setelah_pembulatan).number( true, 0 )	 //.trigger("change");
	$("#textbox_pembanding_48").val(Math.round((indikasi_nilai_tanah_setelah_pembulatan / 10000), 0) * 10000).number( true, 0 )	 //.trigger("change");
	
	
	calculate_tab_pembanding_3();
}

function calculate_tab_pembanding_3()
{
	console.log ("TP 3")
	// var tanah_luas 			= $("#textbox_tanah_61").val();
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

	$("#textbox_pembanding_11").val(total_nilai_pasar)						//.trigger("change");
	
	$(".input_274_0").val($("#textbox_pembanding_48").val() * tanah_luas)	//.trigger("change");
	
	if (tab_loaded.indexOf('dbanding') !== -1)
	{
		console.log ("indikasi")
		var indikasi = $("#textbox_pembanding_48").val() * tanah_luas;
		
		$("#textbox_tanah_65").val(indikasi).addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 ).trigger("change");
		
		var textbox_tanah_66 = indikasi * 80 / 100;
		
		$("#textbox_tanah_66").val(textbox_tanah_66).addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 ).trigger("change");
	}

	style_after_ajax_pembanding();
}

function style_after_ajax_pembanding()
{
	$("#textbox_entry_18")	 //.trigger("change");
	$(".input_274_0").addClass("text-right").attr("readonly", true).addClass("readonly").number( true, 0 );
	$(".input_249_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_7").val())	//.trigger("change");
	$(".input_250_0").attr("readonly", true).addClass("readonly");
	$(".input_251_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_8").val())	//.trigger("change");
	$(".input_252_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_2").val())	//.trigger("change");
	$(".input_253_0").attr("readonly", true).addClass("readonly").val($("#textbox_entry_18").val())	//.trigger("change");
	$(".input_254_0").attr("readonly", true).addClass("readonly");
	$(".input_255_0").attr("readonly", true).addClass("readonly");
	$(".input_256_0").attr("readonly", true).addClass("readonly");
	$(".input_257_0").attr("readonly", true).addClass("readonly");
	$(".input_270_0").attr("readonly", true).addClass("readonly");

	$(".input_260_0").attr("readonly", true).addClass("readonly").val($(".input_162_").val())	//.trigger("change");
	$(".input_261_0").attr("readonly", true).addClass("readonly").val(0)	//.trigger("change");
	$(".input_262_0").attr("readonly", true).addClass("readonly").val("-")	//.trigger("change");
	$(".input_263_0").attr("readonly", true).addClass("readonly").val("-")	//.trigger("change");
	
	$(".input_264_0").attr("readonly", true).addClass("readonly").val($("#textbox_tanah_39").val());
	$(".input_266_0").attr("readonly", true).addClass("readonly").val($("#textbox_tanah_49").val());
	$(".input_268_0").attr("readonly", true).addClass("readonly").val($("#textbox_tanah_46").val());
	$(".input_269_0").attr("readonly", true).addClass("readonly").val($("#textbox_tanah_45").val());
	
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
			$(".input_277_" + i).attr("readonly", true).addClass("readonly").val($(".input_253_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_278_" + i).attr("readonly", true).addClass("readonly").val($(".input_259_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_279_" + i).attr("readonly", true).addClass("readonly").val($(".input_260_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_280_" + i).attr("readonly", true).addClass("readonly").val($(".input_264_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_281_" + i).attr("readonly", true).addClass("readonly").val($(".input_265_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			
			$(".input_285_" + i).attr("readonly", true).addClass("readonly").val($(".input_267_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_286_" + i).attr("readonly", true).addClass("readonly").val($(".input_269_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_287_" + i).attr("readonly", true).addClass("readonly").val($(".input_258_" + i).val())	 //.trigger("change").parent().addClass("readonly");
		}
		else
		{
			$(".input_277_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_253_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_278_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_259_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_279_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_260_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_280_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_264_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_281_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_265_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			
			$(".input_285_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_267_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_286_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_269_" + i).val())	 //.trigger("change").parent().addClass("readonly");
			$(".input_287_" + i + "-1").attr("readonly", true).addClass("readonly").val($(".input_258_" + i).val())	 //.trigger("change").parent().addClass("readonly");
		}
		
		$(".input_282_" + i).attr("readonly", true).addClass("readonly").val($(".input_266_" + i).val())	 //.trigger("change");

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
        $('#latitude_pembanding_'+active_idx).val(marker.getPosition().lat());
        $('#longitude_pembanding_'+active_idx).val(marker.getPosition().lng());
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
$(document).on("change", ".custom_input", function(event) {
	var name  = $(this).attr("id");
	var value = $(this).val();
	var kertas_kerja = $('#id_kertas_kerja').val();
	var kode_jenis_jasa = '__';
	if ( value != '' && value != undefined && value != null )
		kode_jenis_jasa = value;
	update_kertas_kerja(name, value, kertas_kerja);
	$('#string_kode_jenis_jasa').html(kode_jenis_jasa);
	update_nomor_laporan();
});
$(document).on("change", '#textbox_entry_1', function(){
    var no_mappi = $(this).find(":selected").attr("data-nomappi");
    var no_ijinpp = $(this).find(":selected").attr("data-noijinpp");

   	var name  = "no_ijinpp_penandatangan";
	var value = no_ijinpp;
	var kertas_kerja = $('#id_kertas_kerja').val();
	update_kertas_kerja(name, value, kertas_kerja);
	update_kertas_kerja('no_mappi_penandatangan_laporan', no_mappi, kertas_kerja);
	var length_val = value.length;
	if ( parseInt(length_val) >= 4 ) {
		var start = parseInt(length_val)-4;
		var string_nomor_izin_profesi = no_ijinpp.substring(start, parseInt(length_val));
		$('#kode_nomor_izin_profesi').html(string_nomor_izin_profesi);
		update_nomor_laporan();
	} else {
		$('#kode_nomor_izin_profesi').html('____');
		update_nomor_laporan();
	}
});
$(document).on("change", '#nomor_urut_laporan', function(){
    update_nomor_laporan();
});
$(document).on("change", '#textbox_entry_12', function(){
    var tanggal_laporan = $(this).val();
    if ( tanggal_laporan != '' ) {
    	var bulan = tanggal_laporan.substring(5, 7);
    	var tahun = tanggal_laporan.substring(0, 4);
    	var bulan_roman = romanize(parseInt(bulan));
    	var string_bulan_tahun = bulan_roman + '/' + tahun;
    	$('#bulan_tahun_laporan').html(string_bulan_tahun);

    	update_nomor_laporan();
    }
});
function update_nomor_laporan() {
	var kode_identitas_kantor = $('#kode_identitas_kantor').html();
    var kode_jenis_jasa = $('#string_kode_jenis_jasa').html();
    var kode_industri_pengguna_jasa = $('#kode_industri_pengguna_jasa').html();
    //console.log(kode_nomor_izin_profesi);
    var kode_npwp = $('#kode_npwp').html();
    var bulan_tahun_laporan = $('#bulan_tahun_laporan').html();
    var kode_nomor_izin_profesi = $('#kode_nomor_izin_profesi').html();
    var nomor_laporan = $('#nomor_urut_laporan').val() + "/" + kode_identitas_kantor + "/" + kode_jenis_jasa + "/" + kode_industri_pengguna_jasa  + "/" + kode_nomor_izin_profesi + "/" + kode_npwp + "/" + bulan_tahun_laporan;
    console.log(nomor_laporan);
    $('#textbox_entry_15').val(nomor_laporan);
    $('#textbox_entry_15').trigger('change');
}
function update_kertas_kerja(name, value, id) {
	var kertas_kerja = id;
	$.ajax({
		type : "POST",
		url : base_url + "AjaxPekerjaan/update_kertas_kerja/"+kertas_kerja,
		data : {
			name : name,
			value : value
		},
		success : function (d) {
			var data;
			try {
				//test
				data = JSON.parse(d);
			} catch(e)
			{
					//test
			}
		},
	    error: function (jqXHR, textStatus, errorThrown) {
	        console.log('Ajax error! ' + errorThrown.message + "\n status: " + textStatus);
			ajaxTableInputFinish($(this));
	    }
	}); 
}

function romanize(num) {
  var lookup = {M:1000,CM:900,D:500,CD:400,C:100,XC:90,L:50,XL:40,X:10,IX:9,V:5,IV:4,I:1},roman = '',i;
  for ( i in lookup ) {
    while ( num >= lookup[i] ) {
      roman += i;
      num -= lookup[i];
    }
  }
  return roman;
}