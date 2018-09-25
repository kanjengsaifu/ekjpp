<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php echo $_template["_head"]?>
<style>
	.table_custom{
		margin-bottom: 10px;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="content">
				<div class="content-inner">
					<h2 class="page-heading"><?=$title?></h2>
					<div class="post-content">
						<form name="form-klien" id="form-klien" method="post">
							<?=$input["id"]?>
							<?=$input["id_klien"]?>
							
							<div class="row">
								<div class="step-1">
									<div class="col-md-6 col-xs-12">
										<table style="margin-bottom: 20px;">
											<tr>
												<td>Klien</td>
												<td style="width: 30px; text-align: center;">:</td>
												<td><label><?=$pekerjaan->nama_klien?></label></td>
											</tr>
											<tr>
												<td>Nama Pekerjaan</td>
												<td style="width: 30px; text-align: center;">:</td>
												<td><label><?=$pekerjaan->nama?></label></td>
											</tr>
											<tr>
												<td>Deskripsi</td>
												<td style="width: 30px; text-align: center;">:</td>
												<td><label><?=$pekerjaan->deskripsi?></label></td>
											</tr>
											<tr>
												<td>Tanggal Penerimaan</td>
												<td style="width: 30px; text-align: center;">:</td>
												<td><label><?=$pekerjaan->tanggal_penerimaan?></label></td>
											</tr>
											<tr>
												<td>Jenis Laporan</td>
												<td style="width: 30px; text-align: center;">:</td>
												<td><label><?=$pekerjaan->jenis_laporan?></label></td>
											</tr>
											<tr>
												<td>Keterangan</td>
												<td style="width: 30px; text-align: center;">:</td>
												<td><label><?=$pekerjaan->keterangan?></label></td>
											</tr>
										</table>
									</div>
									<div class="col-md-6 col-xs-12">
										<table style="margin-bottom: 20px; color: red">
											<tr>
												<td>Proses Pekerjaan Saat Ini</td>
												<td style="width: 30px; text-align: center;">:</td>
												<td>
													<label>
														<?php
															if ($pekerjaan->id_status != 6 && $pekerjaan->hasil_status != "reject")
															{
																echo $pekerjaan->sub_status;
															}
															else
															{
																echo $pekerjaan->sub_status." (Reject)";
															}
															
														?>
													</label>
												</td>
											</tr>
											<tr>
												<td>User Role</td>
												<td style="width: 30px; text-align: center;">:</td>
												<td><label><?=$pekerjaan->nama_group?></label></td>
											</tr>
										</table>
									</div>
								</div>
								<div class="step-2 col-md-12 col-xs-12">
									<h4>Informasi Objek Penilaian</h4>
									<div id="table_objek" style="background-color: #eee;">
										<table class="table_custom" style="" cellpadding='0' cellspacing='0' border='0'>
											<thead>
												<!--<tr>
													<th>No</th>
													<th>Kode</th>
													<th>Alamat</th>
													<th>Kota</th>
													<th>Provinsi</th>
													<th>Tanggal Harapan Survey</th>
													<th>Transportasi Survey</th>
													<?php
														if ($pekerjaan->id_status < 4)
														{
													?>
													<th>Action</th>
													<?php
														}
													?>
												</tr>-->
											</thead>
											<tbody id="table_lokasi_body"></tbody>
										</table>
										<input type="hidden" id="table_lokasi_count"/>
									</div>
									
									<h4 style="margin-top: 30px;">Informasi Step Pekerjaan</h4>
									
									<!--<pre>
										<?php print_r($status); ?>
									</pre>-->
									
									<div class="row">
										<div class="col-lg-12">
										
											<div class="btn-group">
								                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Pilih Status <span class="caret"></span></button>
								                <ul class="dropdown-menu scrollable-menu " role="menu">
								                    <li class="disabled"><a href='#panel-tab-status'> ---------------------------------- </a></li>
								                    <?php
								                		$i = 1;
								                		foreach ($status as $item_status)
								                		{
															echo "<li> <a href='#panel-tab-status' class='menu-status' data-id='".$item_status->id."'><span class='label label-primary'>".$i."</span> ".$item_status->module."</a></li>";
															
															$i++;
														}
								                	?>
								                	<li class="disabled"><a href='#panel-tab-status'> ---------------------------------- </a></li>
								                </ul>
								            </div>
										
											<div class="panel panel-default panel-tab-status" style="margin-top: 15px; margin-bottom: 15px;">
												<div class="panel-heading"></div>
												<div class="panel-body"></div>
											</div>
										</div>
									</div>
									
									<div class="col-md-12 col-xs-12 text-right" style="padding: 0px; border-top: 1px solid #ccc; padding-top: 10px; margin-top: 20px;">
										<div class="form-group">
											<button type="button" class="btn btn-primary btn-sm btn-kembali">KEMBALI</button>
										</div>
									</div>
									
									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $_template["_footer"]?>
<script>
	var type				= "lokasi";
	var id 					= "";
	var id_klien			= "";
	var id_status			= "";
	var nama				= "";
	var tanggal_penerimaan	= "";
	var deskripsi			= "";
	var jenis_laporan		= "";
	var keterangan			= "";
	var current_url			= window.location.href;
	
	$(document).ready(function(){
		id 			= $("#id").val();
		get_lokasi();
		
		$(".panel-tab-status").hide();
	});
	
	$(document).on("click", ".btn-kembali", function() 
	{		
		location = base_url + "pekerjaan/";
		
	});
	
	$(document).on("click", ".menu-status", function() 
	{
		var id_status	= $(this).attr("data-id");
		var text_status	= $(this).html();
		
		$(".dropdown-toggle").html(text_status);
		
		$.ajax({
			type		: "GET",
			url 		: base_url + "AjaxPekerjaan/get_log/",
			dataType	: "json",
			beforeSend: function() {
				$(".panel-tab-status").show();
				$(".panel-tab-status").find(".panel-heading").hide();
				$(".panel-tab-status").find(".panel-body").html("<center><img src='" + base_url + "asset/images/loading.gif' class='loading' /></center>");
			},
			data		: {
				id_pekerjaan 	: id,
				id_status	 	: id_status
			},
			success		: function (data) {
				
			},
		});
		
		
	});
	
	function get_lokasi()
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/get_lokasi_pekerjaan/",
			dataType	: "json",
			beforeSend: function() {
				$("#table_lokasi_body").html("<tr><td colspan='8' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
			},
			data		: {
				id_pekerjaan 	: id
			},
			success		: function (data) {
				//$(".test_data").html(data.data_table);
				$("#table_lokasi_body").html("");
				var row = "";
				
				$.each(data.data_table, function(i, item) 
				{
					if (i%2 == 0){
						row	= "<tr style='background-color: #fff2cc;'>";
					}else{
						row	= "<tr style='background-color: #e2efda;'>";
					}
					
					/*row	+= "<td align='center'>" + i + "</td>";*/
					$.each(item, function(j, item1) 
					{
						row	+= "<td>" + item1 + "</td>";
					});
					
					row	+= "</tr>";
					$("#table_lokasi_body").append(row);
				});
				
				$(".table_lokasi_count").html("Total data : " + data.data_total);
				
				
			},
		});
	}
	
	
</script>
<?php echo $_template["_foot"]?>