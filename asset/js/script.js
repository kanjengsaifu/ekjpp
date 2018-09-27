$(".default-date-picker").datepicker();

$(document).on("click", "input", function(){$(this).select();});

$(document).ready(function()

{

	

	// Form Login

	$(".btn-login").click(function(){

    	var email		= $("#email").val();

    	var password	= $("#password").val();

    	var type		= "";

    	var msg			= "";

    	

    	$.ajax({

    		type	: "POST",

			url 	: base_url + "login/do_login/",

			data	: {

				email 		: email,

				password 	: password,

			},

			beforeSend: function(){

	            $(".btn-login").html("Loading...");

	            $(".btn-login").prop("disabled", true);

	        },

			dataType	: "JSON",

			success	: function (data) {

				generate_notification(data.result.trim(), data.message.trim(), "topCenter");

				if (data.result.trim() == "success") location = base_url + "home/dashboard";

				console.log (data);

	            $(".btn-login").html("LOGIN");

	            $(".btn-login").prop("disabled", false);

			}

    	});

    });

	

	$("#form-login").keyup(function(e){

	    if(e.keyCode == 13){

	    	$(this).find(".btn-login").click();

	        //$(".btn-login").click();

	    }

	});

	// Form Login

	

	// Form Lupa Password

	$(".btn-lupa-password").click(function(){

    	var email		= $("#email_lupa").val();

    	var type		= "";

    	var msg			= "";
    	

    	$.ajax({

    		type	: "POST",

			url 	: base_url + "login/do_lupa_password/",

			data	: {

				email 		: email

			},

			beforeSend: function(){

	            $(".btn-lupa-password").html("Loading...");

	            $(".btn-lupa-password").prop("disabled", true);

	        },

			dataType	: "JSON",

			success	: function (data) {

				generate_notification(data.result.trim(), data.message.trim(), "topCenter");

				

	            $(".btn-lupa-password").html("LOGIN");

	            $(".btn-lupa-password").prop("disabled", false);

			}

    	});

    });

	

	$("#form-lupa-password").keyup(function(e){

	    if(e.keyCode == 13){

	    	$(this).find(".btn-lupa-password").click();

	        //$(".btn-login").click();

	    }

	});

	// Form Lupa Password

	

	// Form Ubah Password

	$(".btn-ubah-password").click(function(){

    	var password1		= $("#password1").val();

    	var password2		= $("#password2").val();

    	var password3		= $("#password3").val();

    	var type		= "";

    	var msg			= "";

    	

    	$.ajax({

    		type	: "POST",

			url 	: base_url + "ajax/do_ubah_password/",

			data	: {

				password1	: password1,

				password2	: password2,

				password3	: password3

			},

			beforeSend: function(){

	            $(".btn-ubah-password").html("Loading...");

	            $(".btn-ubah-password").prop("disabled", true);

	        },

			dataType	: "JSON",

			success	: function (data) {

				generate_notification(data.result.trim(), data.message.trim(), "topCenter");

				

	            $(".btn-ubah-password").html("SIMPAN");

	            $(".btn-ubah-password").prop("disabled", false);

	            

	            if (data.result.trim() == "success")

	            {

					$("#password1").val("");

					$("#password2").val("");

					$("#password3").val("");

				}

			}

    	});

    });

	

	$("#form-ubah-password").keyup(function(e){

	    if(e.keyCode == 13){

	    	$(this).find(".btn-ubah-password").click();

	        //$(".btn-login").click();

	    }

	});

	// Form Ubah Password

	

});



function generate_notification(type, text, position)

{



	var n = noty({

		text        : text,

		type        : type,

		dismissQueue: true,

		layout      : position,

		closeWith   : ['click'],

		theme       : 'relax',

		maxVisible  : 10,

		killer		: true,

		timeout		: 5000,

		animation   :

		{

			open  : 'animated bounceInLeft',

			close : 'animated bounceOutRight',

			easing: 'swing',

			speed : 500

		}

	});

}



/*Data Grid*/

{

	var page		= "";

	var field		= "";

	var keyword		= "";

	var perpage		= "";

	var type		= "";

	var update_url	= "";



	function get_data(type, page, perpage, field, keyword)

	{

		if (type != "pekerjaan")

		{

			$.ajax({

				type		: "POST",

				url 		: base_url + "ajax/get_data/",

				dataType	: "json",

				beforeSend: function() {

					$("tbody").html("<tr><td colspan='14' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");

				},

				data		: {

					type 	: type,

					page 	: page,

					field 	: field,

					keyword : keyword,

					perpage : perpage

				},

				success		: function (data) {

					//$(".test_data").html(data.data_table);

					$("tbody").html("");

					var row = "";

					if (data.data_total == 0) {
						var total_col = $("tbody").closest("table").find("thead").find("th").length;
						$("tbody").append('<tr><td colspan='+total_col+'>Tidak terinformasi</td></tr>');
					}

					$.each(data.data_table, function(i, item) 

					{

						row	= "<tr>";

						row	+= "<td align='center'>" + i + "</td>";

						$.each(item, function(j, item1) 

						{

							row	+= "<td>" + item1 + "</td>";

						});

						

						row	+= "</tr>";

						$("tbody").append(row);

					});

					

					$(".table_count").html("Total data : " + data.data_total);

					$("#paging").html(data.data_paging);

				},

			});

		}

	}

	

	$(document).on("change", "#perpage", function() {

		perpage	= $(this).val();

		

		get_data(type, 1, perpage, field, keyword);

	});

	

	$(document).on("click", ".btn-paging", function() {

		page	= $(this).attr("data");

		

		get_data(type, page, perpage, field, keyword);

	});



	$(document).on("click", ".btn-cari", function() {

		keyword	= $(".input-cari").val();

		field	= $(".input-field").val();

		get_data(type, 1, perpage, field, keyword);

	});

	

	$(document).on("click", ".btn-edit", function() {

		var id	= $(this).attr("data");

		

		location = update_url + id;

	});

	

	$(document).on("click", ".btn-tambah", function() {

		location = update_url;

	});

	

	$(document).on("click", ".btn-delete", function() {

		var id	= $(this).attr("data");

		/*alert(type)*/

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

						get_data(type, page, perpage, field, keyword)

					}

				},

			});

		}

	});

}



function get_location(type, idbox, idcomponent, idparent, selected)

{

	var new_component	= "";

	

	$.ajax({

		type		: "POST",

		url 		: base_url + "ajax/get_location/",

		dataType	: "JSON",

		beforeSend: function() {

			$("#" + idbox).html('<input id="' + idcomponent + '" name="' + idcomponent + '" class="form-control input-sm" value="" placeholder="Kota" required="" type="text">');

			$("#" + idcomponent).prop("disabled", true);

			$("#" + idcomponent).val("Loading...");

		},

		data		: {

			type 		: type,

			id_parent 	: idparent

		},

		success		: function (data) {

			new_component += "<select name='" + idcomponent + "' id='" + idcomponent + "' class='form-control input-sm'>";

			new_component += "<option>Pilih</option>";

			new_component += "<select name='" + idcomponent + "' id='" + idcomponent + "' class='form-control input-sm'>";

			

			$("#" + idbox).html(new_component);

			

			$.each(data, function (key, value) {

				if (value.id == selected){

					$("#" + idcomponent).append($("<option></option>")

				                  		.attr("selected", "selected")

				                  		.attr("value", value.id)

				                  		.text(value.nama)); 

				}else{

					$("#" + idcomponent).append($("<option></option>")

				                  .attr("value", value.id)

				                  .text(value.nama)); 

				}

			});

		},

	});

}



$(document).on("change", "#id_provinsi", function() {

	var id_provinsi	= $(this).val();

		

	get_location("kota", "box_kota", "id_kota", id_provinsi, "");

});

	

$(document).on("change", "#id_kota", function() {

	var id_kota	= $(this).val();

	

	get_location("kecamatan", "box_kecamatan", "id_kecamatan", id_kota, "");

});

	

$(document).on("change", "#id_kecamatan", function() {

	var id_kecamatan	= $(this).val();

	

	get_location("desa", "box_desa", "id_desa", id_kecamatan, "");

});



function getUrlParameter(sParam) 

{

    var sPageURL = decodeURIComponent(window.location.search.substring(1)),

        sURLVariables = sPageURL.split('&'),

        sParameterName,

        i;



    for (i = 0; i < sURLVariables.length; i++) {

        sParameterName = sURLVariables[i].split('=');



        if (sParameterName[0] === sParam) {

            return sParameterName[1] === undefined ? true : sParameterName[1];

        }

    }

}



function number_only(e)

{

	if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

		return false;

	}

}



$(document).on("click", ".noty_message", function(event){
	event.preventDefault();
	console.log(1);
	$(this).closest("ul").remove();
})