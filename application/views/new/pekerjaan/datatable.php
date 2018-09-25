
<section class="content-header">
    <h1>
        <?php echo $title; ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $title; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-body">
			<table class="table table-striped" id="datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Klien</th>
						<th>Tanggal Penerimaan</th>
						<th>PIC</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">	
			<div id="paging"></div>

			<?php if ($_template["_user"]["id_group"] == 4) { ?>
			<div class="text-right">
				<button class="btn btn-primary btn-sm btn-tambah-klien" type="button">Klien Baru</button>
				<button class="btn btn-primary btn-sm btn-tambah-pekerjaan" type="button">Pekerjaan Baru</button>
			</div>
			<?php } ?>
		</div>
	</div>
</section>

<script type="text/javascript">
	$(function(){
	page		= 1;
	field		= $(".input-field").val();
	keyword		= $(".input-cari").val();
	perpage		= $("#perpage-pekerjaan").val();
	type		= "pekerjaan";
	
	$(document).ready(function(){	
		get_data_pekerjaan();
		
		$(".btn-tambah-pekerjaan").click(function(){
			location = base_url + "pekerjaan/tambah/";
		});
		
		$(".btn-tambah-klien").click(function(){
			location = base_url + "master/klien_edit/?url=" + window.location.href;
		});
	});
	
	$(document).on("click", ".btn-cari", function() {
		keyword	= $(".input-cari").val();
		field	= $(".input-field").val();
		get_data_pekerjaan();
	});
	
	$(document).on("change", "#perpage-pekerjaan", function() {
		perpage	= $(this).val();
		get_data_pekerjaan();
	});
	
	$(document).on("click", ".btn-paging-pekerjaan", function() {
		page	= $(this).attr("data");
		get_data_pekerjaan();
	});
	
	function get_data_pekerjaan()
	{
		// $.ajax({
		// 	type		: "POST",
		// 	url 		: base_url + "AjaxPekerjaan/get_data_pekerjaan/",
		// 	dataType	: "json",
		// 	beforeSend: function() {
		// 		$("tbody").html("<tr><td colspan='7' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
		// 	},
		// 	data		: {
		// 		type 	: type,
		// 		page 	: page,
		// 		field 	: field,
		// 		keyword : keyword,
		// 		perpage : perpage
		// 	},
		// 	success		: function (data) {
		// 		//$(".test_data").html(data.data_table);
		// 		$("tbody").html("");
		// 		var row = "";
		// 		$.each(data.data_table, function(i, item) 
		// 		{
		// 			row	= "<tr>";
		// 			row	+= "<td align='center'>" + i + "</td>";
		// 			$.each(item, function(j, item1) 
		// 			{
		// 				row	+= "<td>" + item1 + "</td>";
		// 			});
					
		// 			row	+= "</tr>";
		// 			$("tbody").append(row);
		// 		});
				
		// 		$(".table_count").html("Total data : " + data.data_total);
		// 		$("#paging").html(data.data_paging);
		// 	},
		// });
	}
	})
</script>
