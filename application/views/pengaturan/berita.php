<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>

<div class="container">
	<div class="row">

		<div class="col-md-12">
			<div class="content">
				<div class="content-inner inner-page">
					<h2 class="page-heading"><?=$title?></h2>
					<div id="test_data"></div>
					<div class="col-md-6 table_search">
						<div class="input-group">
							<!--<select class="form-control input-sm input-field">
								<option value="nama">Nama</option>
							</select>-->
							<span class="input-group-addon" style="padding: 4px;"> 
								<select class="input-field" style="font-size: 12px;">
									<option value="judul">Judul</option>
									<option value="content">Content</option>
									<option value="nama_kategori">Kategori</option>
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
					<div class="table_div">
						<table class="table_custom" cellpadding='0' cellspacing='0' border='0'>
							<thead>
								<tr>
									<th>No</th>
									<th>Judul</th>
									<th>Kategori</th>
									<th>Status</th>
									<th>Created</th>
									<th>Updated</th>
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
					<div id="paging"></div>
				</div>
			</div>
		</div>

	</div>
</div>

<?php echo $_template["_footer"]?>

<script type="text/javascript">
	page		= 1;
	field		= $(".input-field").val();
	keyword		= $(".input-cari").val();
	perpage		= $("#perpage").val();
	type		= "berita";
	update_url	= base_url + "pengaturan/berita_edit/";

	$(document).ready(function(){	
		get_data(type, page, perpage, field, keyword);
	});
</script>

<?php echo $_template["_foot"]?>
