<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php echo $_template["_head"]?>
<style type="text/css">
tr.selected {
    background-color: orange!important;
}
</style>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?=$title?></h1>
		<ol class="breadcrumb">
			<li><?php echo $_breadcrumb ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<div class="col-md-4 table_search">
					<div class="input-group">
					<!--<select class="form-control input-sm input-field">
						<option value="nama">Nama</option>
					</select>-->
						<span class="input-group-addon" style="padding: 4px;"> 
							<select class="input-field" style="font-size: 12px;">
								<option value="nomor_laporan">Nomor Laporan</option>
								<option value="nama_pemberi_tugas">Nama Pemberi Tugas</option>
							</select>
						</span>
						<input type="text" class="form-control input-sm input-cari" placeholder="Keyword">
						<span class="input-group-btn">
							<button class="btn btn-default btn-sm btn-cari" type="button">CARI</button>
						</span>
					</div>
				</div>
				<div class="col-md-4 table_search text-right">
						<button class="btn btn-info" onclick="go_edit_data()">Detail</button>
				</div>
				<div class="col-md-4 table_search text-right">
					<div class="input-group" style="width: 180px">
						<input type="number" class="form-control input-sm" placeholder="Tahun" value="<?php echo $tahun; ?>">
						<span class="input-group-btn">
						<button class="btn btn-sm btn-danger" type="button" id="btn_export_excel" onclick="document.location = '<?php echo base_url().'history/export_excel/?tahun='.$tahun ?>'"><span class="fa fa-file-excel-o"></span> Export ke Excel</button>
						</span>
					</div>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nomor Laporan</th>
							<th>Tanggal Laporan</th>
							<th>Nama Pemberi Tugas</th>
							<th>Alamat Pemberi Tugas</th>
							<th>NPWP Pemberi Tugas</th>
							<th>Go Publik</th>
							<th>Status Kepemilikan</th>
							<th>Bidang Usaha</th>
							<th>Tanggal Penilaian</th>
							<th>Tujuan Penilaian</th>
							<th>Pendekatan Penilaian</th>
							<th>Metode Penilaian</th>
							<th>Nilai Dihasilkan</th>
						</tr>
					</thead>
					<tbody></tbody>
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
	var active_id = '';
	page		= 1;
	field		= $(".input-field").val();
	keyword		= $(".input-cari").val();
	perpage		= $("#perpage").val();
	type		= "history";
	update_url	= base_url + "master/jenis_objek_edit/";

    function selectrowtable(obj) {
        var parentrow = obj.parent().parent();
        if (  active_id != obj.val() ) {
            $("table tbody tr").removeClass("selected");
            parentrow.addClass("selected");
            active_id = obj.val();
        } else {
            parentrow.removeClass("selected");
            active_id = "";
        }
    }
    function go_edit_data() {
        if ( active_id.length < 1 ) {
            alert('Pilih baris data pada tabel yang ingin diubah!');
        } else {
            document.location = "<?php echo base_url() ?>history/detail/" + active_id;
        }
    }

	$(document).ready(function(){	
		$('#btn_export_excel').click(function() {

		});
		get_data(type, page, perpage, field, keyword);


        $("table").on( "click", "tr", function () {
            var objcheck = $(this).children().find(".selectedrow");
            selectrowtable(objcheck);
        } );
	});

</script>

<?php echo $_template["_foot"]?>
