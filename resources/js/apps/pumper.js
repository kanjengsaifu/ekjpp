//pumper.js by adam
var ajaxTableInput=[];
var list_id_field=[];
var isAjaxTableInput=false;

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

jQuery.fn.extend({
	updateTextbox: function(doUpdate = true) {
		return this.each(function() {
			var $input = $(this);
			if (!doUpdate) {
				return;
			}

			var isInputExist = ajaxTableInput.indexOf($input);
			var idField = $input.attr("class");

			if (list_id_field.indexOf(idField) === -1) {
				list_id_field.push(idField);
				ajaxTableInput.push($input);
			}
		});
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

	var id_lokasi 	= $("#id_lokasi").val();
	var id_field 	= $input.attr("data-id-field");
	var type 		= $input.attr("type");
	var value 		= $input.val();
	var id_tanah 	= $input.attr('data-id-tanah');
	var id_bangunan = $input;
	var keterangan	= "";
	
	if ($input.attr("data-keterangan")) {
		var keterangan	= $input.attr("data-keterangan");
	}

	if (type == "checkbox") {
		var id	= $input.attr("id");
		
		if ($("#" + id).is(":checked")) {
			value = 1;
		} else {
			value = 0;
		}
	}

	if (typeof id_field !== "undefined" && id_field !== "") {
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
			success : function (data) {
				ajaxTableInputFinish($input);
			},
		});
	}

	if ($input.is("#latitude_pembanding_0, #latitude_pembanding_1, #latitude_pembanding_2, #latitude_pembanding_3, #longitude_pembanding_0, #longitude_pembanding_1, #longitude_pembanding_2, #longitude_pembanding_3")){
		$.ajax({
			type: "POST",
			url: base_url + "AjaxPekerjaan/update_lokasi_pembanding/",
			data: {
				id_lokasi: id_lokasi,
				value: value,
				keterangan: keterangan
			},
			success : function (data) {
			}
		});
	}

	if (id_field == "10")
	{
		$("#textbox_tanah_1").val(value).updateTextbox();
	}
	else if (id_field == "14")
	{
		$("#textbox_tanah_2").val(value).updateTextbox();
	}
	else if (id_field == "16")
	{
		$("#textbox_tanah_3").val(value).updateTextbox();
	}
	else if (id_field == "9")
	{
		$(".tanah-td-tanggal-inspeksi").html(value).updateTextbox();
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

function excecuteTableInput() {
	var $input;
	if ( ajaxTableInput.length === 0 ) {
		return;
	}

	$input = ajaxTableInput[0];
	ajaxTableInputSend($input);
}

//Starting pumper
(function pump(){
	excecuteTableInput();
	setTimeout(pump, 50);
})();
