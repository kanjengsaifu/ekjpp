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
				<div class="col-md-6 table_search">
						<div class="input-group">
							<!--<select class="form-control input-sm input-field">
								<option value="nama">Nama</option>
							</select>-->
							<span class="input-group-addon" style="padding: 4px;"> 
								<select class="input-field" style="font-size: 12px;">
									<option value="kode">Kode</option>
									<option value="bidang_usaha">Jenis Jasa</option>
								</select>
							</span>
							<input type="text" class="form-control input-sm input-cari" placeholder="Keyword">
							<span class="input-group-btn">
								<button class="btn btn-default btn-sm btn-cari" type="button">CARI</button>
							</span>
						</div>
					</div>
				<div class="col-md-6 table_tambah text-right">
						<button class="btn btn-primary btn-sm btn-tambah" type="button">Tambah Data</button>
					</div>
			</div>
			<div class="box-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode</th>
							<th>Jenis Jasa</th>
							<th>Action</th>
						</tr>
						</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<div class="box-footer">
				<div class="col-md-6 table_count"></div>
						<div class="col-md-6 table_perpage text-right form-inline">
							Tampilkan data 
							<select class="form-control input-sm" name="perpage" id="perpage">
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="40">40</option>
								<option value="50">50</option>
								<option value="100">100</option>
							</select>
						</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">	
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
	perpage		= $("#perpage").val();
	type		= "jenis_jasa";
	update_url	= base_url + "master/jenis_jasa_edit/";

	$(document).ready(function(){	
		get_data(type, page, perpage, field, keyword);
	});
</script>

<?php echo $_template["_foot"]?>
