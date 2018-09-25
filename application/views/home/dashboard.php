
<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo $_template["_head"]?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Dashboard</h1>
		<ol class="breadcrumb">
			<li><?php echo $_breadcrumb ?></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-xs-12">
				<!-- Widget: user widget style 1 -->
				<div class="box box-widget widget-user-2">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-yellow">
						<h3>SUMMARY</h3>
					</div>
					<div class="box-footer no-padding">
						<ul class="nav nav-stacked">
							<li><a href="#">Jumlah Prospek Pekerjaan <span class="pull-right badge bg-red"><?php echo $count_1->count ?></span></a></li>
							<li><a href="#">Jumlah Pekerjaan Sedang Berjalan <span class="pull-right badge bg-yellow"><?php echo $count_2->count?></span></a></li>
							<li><a href="#">Jumlah Pekerjaan Selesai <span class="pull-right badge bg-green"><?php echo $count_3->count?></span></a></li>
							
							<li><a href="#">Pekerjaan Dalam Proses Penerimaan Klien <span class="pull-right badge bg-aqua"><?php echo $count_4->count?></span></a></li>
							<li><a href="#">Pekerjaan Dalam Proses Perencanaan Perikatan <span class="pull-right badge bg-aqua"><?php echo $count_5->count ?></span></a></li>
							<li><a href="#">Pekerjaan Dalam Proses Perencanaan Pekerjaan <span class="pull-right badge bg-aqua"><?php echo $count_6->count?></span></a></li>
							<li><a href="#">Pekerjaan Dalam Proses Implementasi <span class="pull-right badge bg-blue"><?php echo $count_7->count?></span></a></li>
							<li><a href="#">Pekerjaan dalam Proses Finalisasi <span class="pull-right badge bg-blue"><?php echo $count_8->count?></span></a></li>
						</ul>
					</div>
				</div>
				<!-- /.widget-user -->
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<!-- Widget: user widget style 1 -->
				<div class="box box-widget widget-user-2">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-green">
						<h3>PEKERJAAN TERBARU</h3>
					</div>
					<div class="box-footer no-padding">
						<ul class="nav nav-stacked">
							<?php
							$pekerjaan	= $this->global_model->get_data("mst_pekerjaan", 1, array("status"), array(1), "created", "DESC", 1, 8)->result();
							foreach ($pekerjaan as $item)
							{ 
							?>
							<li><a href="<?php echo base_url().'pekerjaan/detail/'.base64_encode($item->id)?>"><?php echo $item->nama ?></a></li>
							<?php
							}
							?>
						</ul>
					</div>
				</div>
				<!-- /.widget-user -->
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<!-- Widget: user widget style 1 -->
				<div class="box box-widget widget-user-2">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<form name="fclient" id="fclient" method="post">
						<div class="widget-user-header bg-red" style="padding:31px">
							<div class="input-group">
		                        <input type="text" class="form-control" placeholder="Nama Klien" id="client_search">
		                        <span class="input-group-btn">
		                            <button class="btn btn-default btn-search-client" type="button">Cari</button>
		                        </span>
		                    </div>
						</div>
						<div class="box-footer no-padding">
		                    <div id="info-client"></div>
						</div>
					</form>
				</div>
				<!-- /.widget-user -->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-yellow">
						<h3 >AGENDA BULAN INI</h3>
					</div>
					<div class="box-footer no-padding">
	                    <div id="my-calendar"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-xs-12">
				<div class="box box-widget widget-user-2">
					<div class="widget-user-header bg-yellow">
						<h3 >AGENDA HARI INI</h3>
					</div>
					<div class="box-footer no-padding">
	                    <div id="today_agenda"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

<?php echo $_template["_footer"]?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#my-calendar").zabuto_calendar({
            ajax: {
                url: "<?=base_url()?>home/show_agenda",
                modal: true
            }
        });

		get_info_client();
		get_today_agenda();

		$(document).on("click", ".btn-search-client", function() {
			get_info_client();
		});

		$("#chart-container").insertFusionCharts({
			 type: "column2d",
			 width: "300",
			 height: "300",
			 dataFormat: "JSONURL",
       dataSource: "<?=base_url()?>/home/get_grafik_pekerjaan"
	 });
	});

	function get_info_client()
	{
		var client_search	= $("#client_search").val();
		$.ajax({
			type		: "POST",
			url 		: "<?=base_url()?>ajax/get_client_info/",
			data		: {
				search : client_search
			},
			success		: function (data) {
				$("#info-client").html(data);
			},
		});
	}

	function get_today_agenda()
	{
		var client_search	= $("#today_agenda").val();
		$.ajax({
			type		: "POST",
			url 		: "<?=base_url()?>ajax/get_today_agenda/",
			data		: {
				search : client_search
			},
			success		: function (data) {
				$("#today_agenda").html(data);
			},
		});
	}
</script>
<?php echo $_template["_foot"]?>
