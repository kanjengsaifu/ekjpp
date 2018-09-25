<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?=$title?></h1>
		<ol class="breadcrumb">
			<li><?php echo $_breadcrumb ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<div class="col-md-4 table_search">
					<div class="input-group">
						<input type="text" class="form-control input-sm input-cari" placeholder="Keyword">
						<span class="input-group-btn">
							<button class="btn btn-default btn-sm btn-cari-objek" type="button">CARI</button>
						</span>
					</div>
				</div>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>

			<div class="box-body">
				<div class="table_div">
					<table class="table table-striped" cellpadding='0' cellspacing='0' border='0'>
						<thead>
							<tr>
								<th>No</th>
								<th>Jenis Objek</th>
								<th>Alamat</th>
								<th>Tanggal Survey</th>
								<th>Luas Tanah</th>
								<th>Luas Bangunan</th>
								<th>Tanggal Laporan</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="col-md-12 border_bottom">
					<div class="col-md-6 table_count"></div>
					<div class="col-md-6 table_perpage text-right form-inline">
						Tampilkan data 
						<select class="form-control input-sm" name="perpage-pekerjaan" id="perpage-pekerjaan">
							<option value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option value="40">40</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
					</div>
				</div>
				<div id="paging"></div>
			</div>
		</div>
	</section>
</div>

<?php echo $_template["_footer"]?>

<script type="text/javascript">
	page		= 1;
	field		= $(".input-field").val();
	keyword		= $(".input-cari").val();
	perpage		= $("#perpage-pekerjaan").val();
	type		= "objek";
	
	$(document).ready(function(){	
		get_data_objek();
	});
	
	$(document).on("click", ".btn-cari-objek", function() {
		keyword	= $(".input-cari").val();
		get_data_objek();
	});
	
	$(document).on("change", "#perpage-pekerjaan", function() {
		perpage	= $(this).val();
		get_data_objek();
	});
	
	$(document).on("click", ".btn-paging-pekerjaan", function() {
		page	= $(this).attr("data");
		get_data_objek();
	});
	
	function get_data_objek()
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/get_data_objek/",
			dataType	: "json",
			beforeSend: function() {
				$("tbody").html("<tr><td colspan='7' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
			},
			data		: {
				type 	: type,
				page 	: page,
				keyword : keyword,
				perpage : perpage
			},
			success		: function (data) {
				//$(".test_data").html(data.data_table);
				$("tbody").html("");
				var row = "";
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
</script>

<?php echo $_template["_foot"]?>
