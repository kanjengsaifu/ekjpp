
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
		<!--
		<div class="box-header with-border">
			<div class="col-md-4 table_search">
				<div class="input-group">
					<span class="input-group-addon" style="padding: 4px;"> 
						<select class="input-field" style="font-size: 12px;">
							<option value="nama">Nama</option>
							<option value="nama_klien">Klien</option>
							<option value="keterangan">Deskripsi</option>
						</select>
					</span>
					<input type="text" class="form-control input-sm input-cari" placeholder="Keyword">
					<span class="input-group-btn">
						<button class="btn btn-default btn-sm btn-cari" type="button">CARI</button>
					</span>
				</div>
			</div>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		-->

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

		<!--
		<div class="box-footer">
			<div class="col-md-2 table_count"></div>
			<div class="col-md-7" style="padding: 10px;">
				<span class='badge bg-red' ><a style="color: red">.</a></span> Belum Diproses
				<span class='badge bg-yellow'><a style="color: #fbe204">.</a></span> Sedang Dikerjakan
				<span class='badge bg-green'><a style="color: #2fd053">.</a></span> Selesai
				
			</div>
			<div class="col-md-3 table_perpage text-right form-inline">
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
		-->
	</div>
	
	<div class="row">
		<div class="col-md-12">	
			<div id="paging"></div>

			<?php
				if ($_template["_user"]["id_group"] == 4)
				{
			?>
			<div class="text-right">
				<button class="btn btn-primary btn-sm btn-tambah-klien" type="button">Klien Baru</button>
				<button class="btn btn-primary btn-sm btn-tambah-pekerjaan" type="button">Pekerjaan Baru</button>
			</div>
			<?php
				}
			?>
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
