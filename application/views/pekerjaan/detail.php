<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php echo $_template["_head"]?>
<style>
	.table_custom{
		margin-bottom: 10px;
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
	<!-- Main content -->
	<section class="content">
		<form name="form-klien" id="form-klien" method="post">
			<?php echo $input["id"] ?>
			<?php echo $input["id_klien"] ?>
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">
						Proses Pekerjaan Saat Ini: <small class="label bg-red"><?php echo $pekerjaan->id_status != 6 && $pekerjaan->hasil_status != "reject" ? $pekerjaan->sub_status : $pekerjaan->sub_status." (Reject)" ?></small>
					</h4>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<?php if (!empty($error_msg)){ ?>
						<div class="alert alert-danger"><?php echo $error_msg ?></div>
					<?php } ?>
					<table class="table table-condensed">
						<tr>
							<td>User Role</td>
							<td style="width: 30px; text-align: center;">:</td>
							<td><small class="label bg-green"><?=$pekerjaan->nama_group?></small></td>
						</tr>
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
                            <td><label><?php echo format_tanggal($pekerjaan->tanggal_penerimaan); ?></label></td>
						</tr>
						<tr>
							<td>Jenis Laporan</td>
							<td style="width: 30px; text-align: center;">:</td>
							<td><label><?php
							$jenis_laporan_array = array("Ringkas"=>"Short Report","Lengkap"=>"Narrative Report");
							echo $jenis_laporan_array[$pekerjaan->jenis_laporan];
							?></label></td>
						</tr>
						<tr>
							<td>Keterangan</td>
							<td style="width: 30px; text-align: center;">:</td>
							<td><label><?=$pekerjaan->keterangan?></label></td>
						</tr>
	                                                            <tr>
							<td>Fee Penilaian</td>
							<td style="width: 30px; text-align: center;">:</td>
							<td><label><?=number_format($lembar_kendali_2->harga,0)?></label></td>
						</tr>
	                                                        <tr>
							<td>Estimasi Waktu Pekerjaan</td>
							<td style="width: 30px; text-align: center;">:</td>
							<td><label><?=$lembar_kendali_2->jangka_waktu?></label></td>
						</tr>
	                                                                <tr>
							<td>Jumlah Personil</td>
							<td style="width: 30px; text-align: center;">:</td>
							<td><label><?=$lembar_kendali_2->jumlah_orang?></label></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="box">
				<div class="box-header with-border">
					<h4 class="box-title">Informasi Objek Penilaian</h4>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body" id="table_objek">
					<table class="table table-condensed">
						<thead>
						</thead>
						<tbody id="table_lokasi_body"></tbody>
					</table>
					<input type="hidden" id="table_lokasi_count"/>
				</div>
				<?php
				if (!empty($pekerjaan) &&  $pekerjaan->id_status < 4)
				{
				?>
				<div class="box-footer">
					<button type="button" class="btn btn-primary btn-sm btn-edit-lokasi" data="">OBJEK PROPERTI - <?php echo $jmlobjek +1; ?> </button>
				</div>
				<?php
				}
				?>
			</div>
			<div class="box">
				<div class="box-header with-border">
					<?php
						if (!empty($pekerjaan) &&  $pekerjaan->id_status == 34)
						{ $lblmohon="";
						} else {
							$lblmohon="Mohon";
						}
					?>
					<h4 class="box-title" style="color: red"><?php echo $lblmohon;?> <?=$pekerjaan->sub_status?></h4>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<!--Panel Lembar Kendali, Evaluasi, Dokumen & PO-->					
					<div class="col-md-12 col-xs-12 panel-1" style="padding: 0px; margin-top: 20px; margin-bottom: 20px;">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#lembar" class="panel-head panel-lembar" aria-controls="lembar" role="tab" data-toggle="tab">Lembar Kendali Klien </a></li>
							<!--<li role="presentation"><a href="#evaluasi" class="panel-head panel-evaluasi" aria-controls="evaluasi" role="tab" data-toggle="tab">Evaluasi</a></li>-->
							<?php if (!empty($pekerjaan) &&  $pekerjaan->id_status > 7)
								{ 
									?>
									<li role="presentation"><a href="#dokumen" class="panel-head panel-dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen</a></li>
									<?php 
								}
							?>
							<?php
								if (!empty($pekerjaan) &&  $pekerjaan->id_status >= 10)
								{
							?>
							<li role="presentation"><a href="#po" class="panel-head panel-po" aria-controls="po" role="tab" data-toggle="tab">PO</a></li>
							<?php
								}
							?>
							<li role="presentation"><a href="#catatan" class="panel-head panel-catatan" aria-controls="catatan" role="tab" data-toggle="tab">Catatan </a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content tab-content-1" style="padding: 20px; border: 1px solid #ccc;">
							<div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="lembar">
								<h4>Lembar Kendali Klien</h4>
								<table class="table table-condensed">
									<thead>
										<tr>
											<th>No</th>
											<th>Step Pekerjaan</th>
											<th>Jabatan</th>
											<th>Diubah Oleh</th>
											<th>Tanggal Dibuat</th>
											<th>Tanggal Diubah</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="table_body_lembar_kendali"></tbody>
								</table>
								<input type="hidden" id="lembar_kendali_count"/>
								<div class="text-right">
									<button type="button" class="btn btn-primary btn-sm btn-edit-lembar-kendali  tambah_lk" data="">TAMBAH LEMBAR KENDALI</button>
								</div>

							</div>
							<div role="tabpanel" class="tab-pane" id="evaluasi" style="padding: 0px;">
								<h4>Evaluasi</h4>
								<table class="table table-condensed">
									<thead>
										<tr>
											<th>No</th>
											<th>Keterangan</th>
											<th>Group</th>
											<th>Dibuat oleh</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="table_body_evaluasi"></tbody>
								</table>
								<input type="hidden" id="evaluasi_count"/>
								<div class="text-right">
									<button type="button" class="btn btn-primary btn-sm btn-edit-evaluasi  tambah_evaluasi" data="">TAMBAH EVALUASI</button>
								</div>

							</div>
							<div role="tabpanel" class="tab-pane" id="dokumen" style="padding: 0px;">
								<h4>Dokumen</h4>
								<table class="table table-condensed">
									<thead>
										<tr>
											<th>No</th>
											<th>Dokumen</th>
											<!--<th>File</th>-->
											<th>Keterangan</th>
											<th>Group</th>
											<th>Dibuat oleh</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="table_body_dokumen"></tbody>
								</table>
								<input type="hidden" id="dokumen_count"/>
							</div>
							<?php
								if (!empty($pekerjaan) &&  $pekerjaan->id_status >= 10)
								{
							?>
							<div role="tabpanel" class="tab-pane" id="po" style="padding: 0px;">
								<?php
									if ($pekerjaan->id_status == 10)
									{
								?>
								<h4>Input PO</h4>
								<div class="row">
									<div class="col-md-4">
										<form name="form-lembar-kendali" method="post">
											<div class="form-group">
												<label>Klien</label>
												<input type="text" id="po_klien" class="form-control" value="<?php echo $klien->nama?>" readonly="" />
											</div>
											<div class="form-group">
												<label>Debitur</label>
												<input type="text" id="po_debitur" class="form-control" value="<?php echo $klien->debitur?>" readonly="" />
											</div>
											<div class="form-group">
												<label>Nomor PO Klien</label>
												<input type="text" name="po_no" id="po_no" placeholder="nomor PO dari Klien" class="form-control">
											</div>

											<div class="form-group">
												<label>Tanggal PO</label><span class="required">*</span>
												<div class="input-group date default-date-picker" data-date-format="dd-mm-yyyy" data-date-autoclose="true">

													<input id="po_tanggal" name="po_tanggal" class="form-control input-sm" value="" placeholder="Tanggal PO" type="text">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												</div>
											</div>

											<div class="form-group">
												<label>Upload Scan PO</label><span class="required">*</span>
												<input type="file" id="tmp_file" value="" readonly="" />
												<input type="hidden" id="po_file" name="po_file" value="" readonly="" />
												<div id="box_file_po"></div>
											</div>
											<div class="form-group">
												<label>Keterangan</label>
												<textarea name="po_keterangan" id="po_keterangan" placeholder="keterangan tambahan" class="form-control"></textarea>
											</div>
											<div class="form-group text-right" style="padding-top: 15px;">
												<button type="button" class="btn btn-primary btn-sm btn-simpan-po">SIMPAN</button>
											</div>
										</form>
									</div>
								</div>
								<input type="hidden" id="dokumen_count"/>
								<?php
									}
									else
									{

								?>
								<table>
									<tr>
										<td valign="top">Klien</td>
										<td valign="top" align="center" width="20">:</td>
										<td><?=$klien->nama?></td>
									</tr>
									<tr>
										<td valign="top">Debitur</td>
										<td valign="top" align="center" width="20">:</td>
										<td><?=$klien->debitur?></td>
									</tr>
									<tr>
										<td valign="top">Nomor PO</td>
										<td valign="top" align="center" width="20">:</td>
										<td><?=$po->no?></td>
									</tr>
									<tr>
										<td valign="top">Tanggal</td>
										<td valign="top" align="center" width="20">:</td>
										<td><?=date("d-m-Y", strtotime($po->tanggal))?></td>
									</tr>
									<tr>
										<td valign="top">File Scan</td>
										<td valign="top" align="center" width="20">:</td>
										<td><a href="<?=base_url()?>asset/file/<?=$po->file?>" target="_blank">Download</a></td>
									</tr>
									<tr>
										<td valign="top">Keterangan</td>
										<td valign="top" align="center" width="20">:</td>
										<td><?=$po->keterangan?></td>
									</tr>
								</table>
								<?php
									}
								?>
							</div>
							<?php
								}
							?>
							<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="catatan">
								<h4>Catatan</h4>

								<table class="table table-condensed" cellpadding='0' cellspacing='0' border='0'>
									<thead>
										<tr>
											<th>No</th>
											<th>Step Pekerjaan</th>
											<th>Hasil</th>
											<th>Catatan</th>
											<th>User</th>
											<th>Tanggal</th>
										</tr>
									</thead>
									<tbody id="table_body_catatan"></tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-12 col-xs-12 panel-2" style="padding: 0px; margin-top: 0px; margin-bottom: 20px;">
						<h4>Susun Rencana Penugasan</h4>
						<div style="padding: 20px 0; border: 1px solid #ccc;">
							<div class="table-responsive">
								<div class="table_div" style="margin-bottom: 10px;">
									<table class="table table-bordered table-sm table_custom1 table_tugas" cellpadding='0' cellspacing='0' border='0' style="width: 100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode</th>
												<th>Alamat</th>
												<th>Provinsi</th>
												<th>Tanggal Mulai</th>
												<th>Jam</th>
												<th>Tanggal Selesai</th>
												<th>Biaya</th>
												<th>Nama Surveyor</th>
												<?php
													if ($pekerjaan->id_status == 16 || $pekerjaan->id_status == 17)
													{
												?>
												<th>Surat Tugas</th>
												<?php
													}

													if ($pekerjaan->id_status >= 17 || $pekerjaan->id_status == 18 || $pekerjaan->id_status == 19 || $pekerjaan->id_status == 2)
													{
												?>
												<th>Kertas Kerja</th>
												<?php
													}
												?>
											</tr>
										</thead>
										<tbody id="table_tugas_body"></tbody>
									</table>
								</div>
								<input type="hidden" class="table_tugas_count" />
								<div class="row">
									<div class="col-md-4" style="background-color: #f5f5f5; border: 1px solid #ddd; margin: 15px; padding-top: 10px;">								<?php
											if ($pekerjaan->id_status == 11)
											{
										?>
										<div class="form-group">
											<label>Penilai</label>
											<select class="form-control input-sm" name="penilai" id="penilai">
												<option disabled="disabled" selected="selected">Select</option>
												<?php
													$penilai	= $this->global_model->get_list("view_user", "id_group=8 OR id_group=2", "nama");

													foreach ($penilai as $item_penilai)
													{
														if ($item_penilai->id == $pekerjaan->penilai) $select = "selected";
														else $select	= "";
														echo "<option ".$select." value='".$item_penilai->id."'>".$item_penilai->nama."</option>";
													}
												?>

											</select>
										</div>
										<div class="form-group">
											<label>QA (Reviewer)</label>
											<select class="form-control input-sm" name="reviewer" id="reviewer">
												<option disabled="disabled" selected="selected">Select</option>
												<?php
													$reviewer	= $this->global_model->get_list("view_user", "id_group=10 OR id_group=2","nama");

													foreach ($reviewer as $item_reviewer)
													{
														if ($item_reviewer->id == $pekerjaan->reviewer) $select = "selected";
														else $select	= "";
														echo "<option ".$select." value='".$item_reviewer->id."'>".$item_reviewer->nama."</option>";
													}
												?>
											</select>
										</div>
										<div class="form-group">
											<button type="button" class="btn btn-primary btn-sm btn-simpan-penugasan">SIMPAN</button>
										</div>
										<?php
											}
											else
											{
										?>
										<table style="margin: 10px; margin-top: 0px;">
											<tr>
												<td>Penilai</td>
												<td align="center" width="20">:</td>
												<td><?=$pekerjaan->nama_penilai?></td>
											</tr>
											<tr>
												<td>QC (Reviewer)</td>
												<td align="center" width="20">:</td>
												<td><?=$pekerjaan->nama_reviewer?></td>
											</tr>
										</table>

										<?php
											}
										?>


									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
						if ($pekerjaan->id_status >= 22 && $pekerjaan->jenis_laporan=='Lengkap')
						{
							for ($x = 0; $x < $lokasi->num_rows(); $x++) {
								$id_kertas_kerja = $this->global_model->get_data("txn_kertas_kerja", 1, array("id_lokasi"), array($lokasi->row($x)->id),"id_lokasi")->row();
					 		?>
							<a href='<?=base_url("printpdf/ringkasan")?>/<?=base64_encode($pekerjaan->id)?>/<?=base64_encode($lokasi->row($x)->id)?>/<?=base64_encode($id_kertas_kerja->id_kertas_kerja)?>/pdf/' class='btn btn-primary btn-sm btn-download-ringkasan' style="margin-bottom: 10px;">DOWNLOAD RINGKASAN PENILAIAN</a><br />
					<?php
							}
						}
					?>

					<!--Draf Laporan-->
					<?php
						if ($pekerjaan->id_status == 22)
						{
					?>
					<a href='javascript:void(0)' class='btn btn-primary btn-sm btn-input-laporan'>UPLOAD DRAFT LAPORAN (NARRATIVE REPORT)</a>
					<?php
						}

						if (($pekerjaan->id_status == 23 ) && $pekerjaan->jenis_laporan=='Lengkap'  || ($pekerjaan->id_status == 25 && $pekerjaan->jenis_laporan=='Lengkap'))
						{
					?>
					<a href='javascript:void(0)' class="btn btn-primary btn-sm btn-input-laporan">EDIT/VIEW DRAFT LAPORAN (NARRATIVE REPORT)</a>

					<?php
						}

						if ($pekerjaan->id_status > 23 && $pekerjaan->jenis_laporan=='Lengkap')
						{

						$url_draft_laporan	= base_url();

						$draft_laporan		= $this->global_model->get_data("txn_draft_laporan", 2, array("id_pekerjaan", "type"), array($pekerjaan->id, "draft_laporan"), "id", "DESC",0, 1);

						if ($draft_laporan->num_rows() > 0)
						{
							$url_draft_laporan	= base_url("asset/file/".$draft_laporan->row()->filename);
						}
					?>

					<!-- <a href='<?=$url_draft_laporan?>' target='_blank'  class="btn btn-primary btn-sm">DOWNLOAD DRAFT LAPORAN (NARRATIVE REPORT)</a> -->

					<a href='<?=base_url()?>draft_laporan/download/<?php echo $pekerjaan->id ?>' class="btn btn-primary btn-sm">DOWNLOAD DRAF LAPORAN </a>

					<?php
						}
					?>
					<!--Draf Laporan-->

					<!--Draf Laporan Final-->
					<?php
					if ($pekerjaan->id_status == 26) {
					?>

					<br><br>
					<a href='javascript:void(0)' class='btn btn-primary btn-sm btn-input-laporan-final'>UPLOAD LAPORAN FINAL (NARRATIVE REPORT)</a>
					<?php } ?>

					<?php
					if (($pekerjaan->id_status == 27 && $pekerjaan->jenis_laporan=='Lengkap') || ($pekerjaan->id_status == 28 && $pekerjaan->jenis_laporan=='Lengkap') || ($pekerjaan->id_status == 29 && $pekerjaan->jenis_laporan=='Lengkap') || ($pekerjaan->id_status == 30 && $pekerjaan->jenis_laporan=='Lengkap') || ($pekerjaan->id_status == 31 && $pekerjaan->jenis_laporan=='Lengkap' ))
					{

						$url_draft_laporan_final	= base_url();
						$draft_laporan_final		= $this->global_model->get_data("txn_draft_laporan", 2, array("id_pekerjaan", "type"), array($pekerjaan->id, "draft_laporan_final"), "id", "DESC",0, 1);

						if ($draft_laporan_final->num_rows() > 0)
						{
							$url_draft_laporan_final	= base_url("asset/file/".$draft_laporan_final->row()->filename);
						}

					?>
					<br><br>
					<a href='javascript:void(0)' class="btn btn-primary btn-sm link_draf_laporan_final btn-input-laporan-final">EDIT/VIEW LAPORAN FINAL (NARRATIVE REPORT)</a>
					<a href='<?=$url_draft_laporan_final?>' class="btn btn-primary btn-sm">DOWNLOAD LAPORAN FINAL (NARRATIVE REPORT)</a>
					<?php
						}
					?>


					<!--Draf Laporan Final-->

					<!--Cetak Form Pengiriman Dokumen-->
					<?php
						if ($pekerjaan->id_status == 32  )
						{

							$url_draft_laporan_final	= base_url();
							$draft_laporan_final		= $this->global_model->get_data("txn_draft_laporan", 2, array("id_pekerjaan", "type"), array($pekerjaan->id, "draft_laporan_final"), "id", "DESC",0, 1);

							if ($draft_laporan_final->num_rows() > 0)
							{
								$url_draft_laporan_final	= base_url("asset/file/".$draft_laporan_final->row()->filename);
							}
						
						if ($pekerjaan->jenis_laporan=='Lengkap') {
							
						
					?>

					<a href='<?=$url_draft_laporan_final?>' target='_blank'  class="btn btn-primary btn-sm">DOWNLOAD LAPORAN FINAL (NARRATIVE REPORT)</a>
					
					<?php
					} else { 
						if ($lokasi->num_rows() > 0) {
							for ($x = 0; $x < $lokasi->num_rows(); $x++) {
								$id_kertas_kerja = $this->global_model->get_data("txn_kertas_kerja", 1, array("id_lokasi"), array($lokasi->row($x)->id),"id_lokasi")->row();
					 		?>	
					 <!-- short report -->
						<button type="button" class="btn btn-primary btn-sm" onclick="window.open('<?=base_url()?>printpdf/laporan_ringkas/<?=base64_encode($pekerjaan->id)?>/<?=base64_encode($lokasi->row($x)->id)?>/<?=base64_encode($id_kertas_kerja->id_kertas_kerja)?>/pdf/', '_blank')" >LAPORAN RINGKAS OBJEK -<?=$x+1?></button>
					
					<?php
							} 
						}
					} ?>

					<br/><br/>
					<a href='<?=base_url()?>Ajax/download/form_pengiriman_dokumen/<?=base64_encode($pekerjaan->id)?>' target='_blank' class='btn btn-primary btn-sm btn-cetak-form-pengiriman-dokumen download'>CETAK FORM PENGIRIMAN DOKUMEN</a>
					<?php
						}
					?>
					<!--Cetak Form Pengiriman Dokumen-->

					<!--Cetak Bukti Pengiriman Dokumen-->
					<?php
						if ($pekerjaan->id_status == 33)
						{
							$url_draft_laporan_final	= base_url();
							$draft_laporan_final		= $this->global_model->get_data("txn_draft_laporan", 2, array("id_pekerjaan", "type"), array($pekerjaan->id, "draft_laporan_final"), "id", "DESC",0, 1);

							if ($draft_laporan_final->num_rows() > 0)
							{
								$url_draft_laporan_final	= base_url("asset/file/".$draft_laporan_final->row()->filename);
							}
							
						if ($pekerjaan->jenis_laporan=='Lengkap') {

					?>

					<a href='<?=base_url()?>asset/template/laporan.doc' target='_blank'  class="btn btn-primary btn-sm">DOWNLOAD LAPORAN FINAL</a>
					
					<?php if(!$pekerjaan->surat_tugas_final){ ?>
					<a href='<?=base_url()?>new/upload_surat_tugas_final/edit/<?php echo $pekerjaan->id ?>' target='_blank'  class="btn btn-primary btn-sm">UPLOAD SURAT TUGAS FINAL</a>
					<?php }else{ ?>
					<a href='<?=base_url()?>asset/file/<?php echo $pekerjaan->surat_tugas_final ?>' target='_blank'  class="btn btn-primary btn-sm">DOWNLOAD SURAT TUGAS FINAL</a>
					<?php } ?>
					
					<?php
						} else {
							if ($lokasi->num_rows() > 0) {
									for ($x = 0; $x < $lokasi->num_rows(); $x++) {
							 		?>	
							 <!-- short report -->
								<button type="button" class="btn btn-primary btn-sm" onclick="window.open('<?=base_url()?>printpdf/laporan_ringkas/<?=base64_encode($pekerjaan->id)?>/<?=base64_encode($lokasi->row($x)->id)?>/pdf/', '_blank')" >LAPORAN RINGKAS OBJEK -<?=$x+1?></button>
							
							<?php
										} 
									}
								}
					
					 ?>

					<br/><br/><a href='<?=base_url()?>Ajax/download/form_pengiriman_dokumen/<?=base64_encode($pekerjaan->id)?>' target='_blank' class='btn btn-primary btn-sm btn-cetak-form-pengiriman-dokumen download'>CETAK FORM PENGIRIMAN DOKUMEN</a>
					
					<a href='javascript:void(0)' class='btn btn-primary btn-sm btn-input-tandaterima-dokumen'>UPLOAD TANDA TERIMA DOKUMEN</a>
					
						<!--<a href='<?=base_url()?>Ajax/download/bukti_pengiriman_dokumen/<?=base64_encode($pekerjaan->id)?>' target='_blank' class='btn btn-primary btn-sm btn-cetak-bukti-pengiriman-dokumen download'>Upload</a>  -->
					
					<?php
						}
					?>
					<!--Cetak Bukti Pengiriman Dokumen-->
					
					
					<!--Selesai-->
					<?php
						if ($pekerjaan->id_status == 34)
						{
							
							if ($pekerjaan->jenis_laporan == 'Lengkap') {
								
							
							
								$url_draft_laporan_final	= base_url();
								$draft_laporan_final		= $this->global_model->get_data("txn_draft_laporan", 2, array("id_pekerjaan", "type"), array($pekerjaan->id, "draft_laporan_final"), "id", "DESC",0, 1);

								if ($draft_laporan_final->num_rows() > 0)
								{
									$url_draft_laporan_final	= base_url("asset/file/".$draft_laporan_final->row()->filename);
								}

					?>

					<a href='<?=base_url()?>asset/template/laporan.doc' target='_blank'  class="btn btn-primary btn-sm">DOWNLOAD LAPORAN FINAL</a>
					
					<?php if(!$pekerjaan->surat_tugas_final){ ?>
					<a href='<?=base_url()?>new/upload_surat_tugas_final/edit/<?php echo $pekerjaan->id ?>' target='_blank'  class="btn btn-primary btn-sm">UPLOAD SURAT TUGAS FINAL</a>
					<?php }else{ ?>
					<a href='<?=base_url()?>asset/file/<?php echo $pekerjaan->surat_tugas_final ?>' target='_blank'  class="btn btn-primary btn-sm">DOWNLOAD SURAT TUGAS FINAL</a>
					<?php } ?>
					
					<?php
							} else {
								if ($lokasi->num_rows() > 0) {
									for ($x = 0; $x < $lokasi->num_rows(); $x++) {
							 		?>	
							 <!-- short report -->
							 <?php $id_kertas_kerja = $this->global_model->get_data("txn_kertas_kerja", 1, array("id_lokasi"), array($lokasi->row($x)->id),"id_lokasi")->row();?>
								<button type="button" class="btn btn-primary btn-sm" onclick="window.open('<?=base_url()?>printpdf/laporan_ringkas/<?=base64_encode($pekerjaan->id)?>/<?=base64_encode($lokasi->row($x)->id)?>/<?=base64_encode($id_kertas_kerja->id_kertas_kerja)?>/pdf/', '_blank')" >LAPORAN RINGKAS OBJEK -<?=$x+1?></button>
							
							<?php
									} 
								}
							
							}
						
						
					$url_tterima_dokumen	= base_url();
					$tterima_dokumen		= $this->global_model->get_data("txn_draft_laporan", 2, array("id_pekerjaan", "type"), array($pekerjaan->id, "upload_tterima_dokumen"), "id", "DESC",0, 1);

					if ($tterima_dokumen->num_rows() > 0)
					{
						$url_tterima_dokumen	= base_url("asset/file/".$tterima_dokumen->row()->filename);
					}
									
					?>

					<br/><br/><a href='<?=base_url()?>Ajax/download/form_pengiriman_dokumen/<?=base64_encode($pekerjaan->id)?>' target='_blank' class='btn btn-primary btn-sm btn-cetak-form-pengiriman-dokumen download'>CETAK FORM PENGIRIMAN DOKUMEN</a>
					<a href='<?=$url_tterima_dokumen?>' target='_blank'  class="btn btn-primary btn-sm">DOWNLOAD TANDA TERIMA DOKUMEN</a> <br/><br/>
					
					<label>Status Pekerjaan : <span style="color:#1e0df2">Selesai</span></label><br/>
					
					<?php }  ?>
					
					<!--Selesai-->

					<div class="col-md-12 col-xs-12 text-right" style="padding: 0px; border-top: 1px solid #ccc; padding-top: 10px; margin-top: 10px;">
						<div class="form-group">
							<button type="button" class="btn btn-default btn-sm btn-kembali">KEMBALI</button>
							<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-sm btn-reject <?php if ($button["reject"] == 0) echo 'hidden'; ?>">TOLAK</button>
							<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-sm btn-approve <?php if ($button["approve"] == 0) echo 'hidden'; ?>">SETUJU</button>
							<button type="button" class="btn btn-primary btn-sm btn-kirim <?php if ($button["kirim"] == 0) echo 'hidden'; ?>">SUBMIT</button>
						</div>
					</div>

				</div>				
			</div>
		</form>
	</section>
</div>

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Keterangan</h4>
			</div>
			<div class="modal-body">
				<textarea class="form-control" id="keterangan_approve"></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">BATAL</button>
				<button type="button" class="btn btn-sm btn-primary btn-lanjut"></button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="TugasModal" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Team Kerja</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="tmp_id_lokasi" />
				<!--<div class="form-group">
					<label>Tipe Petugas</label>
					<select id="tipe_petugas" class="form-control input-sm">
						<option selected="selected" disabled="disabled">Select</option>
						<option value="7">Surveyor</option>
						<option value="8">Penilai</option>
						<option value="9">Asisten Penilai</option>
						<option value="10">QC (Reviewer)</option>
					</select>
				</div>-->
				<div class="form-group">
					<label>Petugas</label>
					<div id="box_petugas">
						<input  type="text" id="textbox_petugas" placeholder="Silahkan Pilih Tipe Petugas" class="form-control input-sm" disabled="true" />
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">BATAL</button>
				<button type="button" class="btn btn-sm btn-primary btn-tambah-petugas">TAMBAH</button>
			</div>
		</div>
	</div>
</div>
<!-- tambahan hendra 20180514 -->
<!-- Modal -->
<div class="modal fade" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="upload_modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
        	<form method="post" enctype="multipart/form-data" class="form-horizontal">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h4 class="modal-title" id="upload_modalLabel"> <i class="fa fa-upload"></i> Upload Excel </h4>
	            </div>            
	            <div class="modal-body">
	            	<div class="form-group">
	                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Surveyor</label>
	                    <div class="col-md-5 col-sm-5 col-xs-5">
	                        <select class="form-control" id="nama_surveyor_upload" name="nama_surveyor_upload" required>
	                            <option value=""> - Pilih Surveyor - </option>
	                            <?php
	                            $list_surveyor = $this->global_model->get_list('mst_user','id_group=7');
	                            foreach ( $list_surveyor as $key ) {
	                            ?>
	                            <option value="<?php echo $key->nama; ?>"><?php echo $key->nama; ?></option>
	                            <?php
	                            }
	                            ?>       
	                        </select>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="control-label col-md-3 col-sm-3 col-xs-12">File Excel</label>
	                    <div class="col-md-5 col-sm-5 col-xs-5">
	                    	<input class="form-control" name="file_xls" type="file" style="display:inline" required/>
	                    </div>
	                </div>
	            </div> 
	            <div class="modal-footer">
	            	<a class="pull-left" href="<?php echo base_url().'asset/file/kertas_kerja/template_laporan.xlsx'?>"><small class="label bg-red"> <i class="fa fa-download"></i> Download Template Laporan Disini</small></a>
	            	<button class="btn btn-primary btn_import_excel">upload</button>
	            </div>   
            </form>          
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php echo $_template["_footer"]?>
<script>
	var base64_id			= <?php echo json_encode($base64_id) ?>;
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

	var tambah_lk			= <?=$button['tambah_lk']?>;
	var tambah_evaluasi		= <?=$button['tambah_evaluasi']?>;
	var update_dokumen		= <?=$button['update_dokumen']?>;
	var id_user				= <?=$user['id']?>;
	var pekerjaan_id_user	= "<?=$pekerjaan->id_user?>";

	$(".default-date-picker").datepicker();

	$(document).ready(function(){
		id 			= $("#id").val();
		id_status	= "<?=$pekerjaan->id_status?>";

		get_lokasi();
		get_catatan()
		id_status	= parseInt(id_status);

		if (id_status == 1){
			id_status = 2;
		}

		if (getUrlParameter("role"))
		{
			$(".panel-" + getUrlParameter("role")).click();
		}
		else
		{
			$(".panel-lembar").click();
		}


		if (id_status >= 11)
		{

			$(".panel-2").show();
			get_penugasan();
		}
		else
		{
			$(".panel-2").hide();

		}



		if (id_status == 21 || id_status == 22)
		{
			$(".link_draf_laporan").attr("href", base_url + "pekerjaan/laporan_edit/" + id + "/?url=" + current_url);
		}


		if (id_status == 24 || id_status == 25 || id_status == 26)
		{
			$(".link_draf_laporan_final").attr("href", base_url + "pekerjaan/laporan_final_edit/" + id + "/?url=" + current_url);
		}

		$(".btn-kirim").attr("data", (parseInt(id_status) + 1));
		$(".btn-approve").attr("data", (parseInt(id_status) + 1));
		$(".btn-reject").attr("data", (parseInt(id_status) + 1));

		cek_button();
	});
	
	
	$(document).on("click", ".btn-kembali", function()
	{
		location = base_url + "pekerjaan/";

	});

	$(document).on("click", ".btn-edit-lokasi", function() {
		var id_lokasi	= $(this).attr("data");

		location = base_url + "pekerjaan/lokasi_edit/" + id + "/" + id_lokasi + "/?url=" + current_url;
	});

	$(document).on("click", ".btn-edit-lembar-kendali", function() {
		var id_lembar_kendali	= $(this).attr("data");
		
		location = base_url + "pekerjaan/lembar_kendali_edit/" + id + "/" + id_lembar_kendali + "/?url=" + current_url;
		return false;
	});

	$(document).on("click", ".btn-edit-evaluasi", function() {
		var id_evaluasi	= $(this).attr("data");

		location = base_url + "pekerjaan/evaluasi_edit/" + id + "/" + id_evaluasi + "/?url=" + current_url;
		return false;
	});

	$(document).on("click", ".btn-edit-dokumen", function() {
		var id_dokumen_gabung = $(this).closest('[data-id_dokumen_gabung]').data("id_dokumen_gabung");
		var id_dokumen_master	= $(this).attr("data");
		//alert('');

		if (!id_dokumen_gabung){
			location = base_url + "pekerjaan/dokumen_edit/" + id + "/" + id_dokumen_master + "/?url=" + current_url;
		}
		else
		{
			location = base_url + "pekerjaan/dokumen_edit/" + id + "/" + id_dokumen_master + "/" +id_dokumen_gabung+ "/?url=" + current_url;
		}
		return false;
	});


	$(document).on("click", ".btn-delete-lokasi", function() {
		var id	= $(this).attr("data");
		if (window.confirm("Apakah Anda yakin?"))
		{
			$.ajax({
				type		: "POST",
				url 		: base_url + "Ajax/delete_data/lokasi",
				dataType	: "JSON",
				data		: {
					id 	: id
				},
				success		: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					if (data.result.trim() == "success"){
						get_lokasi()
					}
				},
			});
		}
	});

	$(document).on("click", ".btn-delete-lembar-kendali", function() {
		var id	= $(this).attr("data");
		if (window.confirm("Apakah Anda yakin?"))
		{
			$.ajax({
				type		: "POST",
				url 		: base_url + "Ajax/delete_data/lembar_kendali",
				dataType	: "JSON",
				data		: {
					id 	: id
				},
				success		: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					if (data.result.trim() == "success"){
						get_lembar_kendali()
					}
				},
			});
		}
		return false;
	});

	$(document).on("click", ".btn-delete-petugas", function() {
		var id	= $(this).attr("data");
		if (window.confirm("Apakah Anda yakin?"))
		{
			$.ajax({
				type		: "POST",
				url 		: base_url + "Ajax/delete_data/petugas",
				dataType	: "JSON",
				data		: {
					id 	: id
				},
				success		: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					if (data.result.trim() == "success"){
						get_penugasan();
					}
				},
			});
		}
	});

	$(document).on("click", ".btn-kirim", function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			id_klien			= $("#id_klien").val();
			nama				= $("#nama").val();
			tanggal_penerimaan	= $("#tanggal_penerimaan").val();
			deskripsi			= $("#deskripsi").val();
			jenis_laporan		= $("#jenis_laporan").val();
			keterangan			= $("#keterangan").val();

			$.ajax({
				type		: "POST",
				url 		: base_url + "AjaxPekerjaan/update_pekerjaan/",
				dataType	: "JSON",
				beforeSend: function() {
					$(".btn-submit").html("Silahkan tunggu...");
					$(".btn-submit").prop("disabled", true);
				},
				data		: {
					type 				: $(this).attr("data"),
					id		 			: id,
				},
				success		: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					$(".btn-submit").html("SIMPAN");
					$(".btn-submit").prop("disabled", false);

					if (data.result == "success")
					{
						location	= base_url + "pekerjaan/";
					}
				},
			});
		}
	});

	$(document).on("click", ".btn-reject", function()
	{
		$("#keterangan_approve").val("");
		$(".btn-lanjut").html("TOLAK");
		$(".btn-lanjut").removeClass("ok_approve");
		$(".btn-lanjut").addClass("ok_reject");
	});

	$(document).on("click", ".btn-approve", function()
	{
		$("#keterangan_approve").val("");
		$(".btn-lanjut").html("SETUJU");
		$(".btn-lanjut").removeClass("ok_reject");
		$(".btn-lanjut").addClass("ok_approve");
	});

	$(document).on("click", ".ok_reject", function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			$.ajax({
				type		: "POST",
				url 		: base_url + "AjaxPekerjaan/update_pekerjaan/",
				dataType	: "JSON",
				beforeSend: function() {
					$(".btn-submit").html("Silahkan tunggu...");
					$(".btn-submit").prop("disabled", true);
				},
				data		: {
					type 				: $(".btn-reject").attr("data"),
					id		 			: id,
					hasil				: "reject",
					keterangan			: $("#keterangan_approve").val()
				},
				success		: function (data) {
					$(".close").click();
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					$(".btn-submit").html("SIMPAN");
					$(".btn-submit").prop("disabled", false);

					if (data.result == "success")
					{
						location	= base_url + "pekerjaan/";
					}
				},
			});
		}
		else
		{
			$(".close").click();
		}
	});

	$(document).on("click", ".ok_approve", function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			$.ajax({
				type		: "POST",
				url 		: base_url + "AjaxPekerjaan/update_pekerjaan/",
				dataType	: "JSON",
				beforeSend: function() {
					$(".btn-submit").html("Silahkan tunggu...");
					$(".btn-submit").prop("disabled", true);
				},
				data		: {
					type 				: $(".btn-approve").attr("data"),
					id		 			: id,
					hasil				: "approve",
					keterangan			: $("#keterangan_approve").val()
				},
				success		: function (data) {
					$(".close").click();
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					$(".btn-submit").html("SIMPAN");
					$(".btn-submit").prop("disabled", false);

					if (data.result == "success")
					{
						location	= base_url + "pekerjaan/";
					}
				},
			});
		}
		else
		{
			$(".close").click();
		}
	});


	$(document).on("click", ".download", function()
	{
		setTimeout(function(){ location.reload() }, 2000);
	});



	$(document).on("change", ".textbox_penugasan", function()
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/update_textbox_penugasan/",
			data		: {
				id_lokasi 	: $(this).attr("data-id-lokasi"),
				field		: $(this).attr("name"),
				value		: $(this).val()
			},
			success		: function (data) {

			},
		});
	});

	$(document).on("click", ".btn-btn-tambah-petugas", function()
	{
		var id_lokasi	= $(this).attr("data-id-lokasi");
		$("#tmp_id_lokasi").val(id_lokasi);
		get_petugas(id_lokasi, 7);
	});

	$(document).on("change", "#tipe_petugas", function()
	{
		var id_lokasi	= $("#tmp_id_lokasi").val();
		var id_group	= $(this).val();
		console.log("id_lokasi : " + id_lokasi + "id_group : " + id_group);
		get_petugas(id_lokasi, id_group);
	});

	$(document).on("click", ".btn-tambah-petugas", function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			var id_lokasi	= $("#tmp_id_lokasi").val();
			var id_user		= $("#textbox_petugas").val();

			if (id_user.length===0)
			{
				return;
			}

			$.ajax({
	    		type	: "POST",
				url 	: base_url + "Ajax/do_update_data_global/",
				data	: {
					type : "penugasan",
					id : "",
					id_lokasi : id_lokasi,
					id_user : id_user

				},
				beforeSend: function(){
		            $(".btn-tambah-petugas").html("Loading...");
		            $(".btn-tambah-petugas").prop("disabled", true);
		        },
				dataType	: "JSON",
				success	: function (data) {
					$(".close").click();
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");

		            $(".btn-tambah-petugas").html("TAMBAH");
		            $(".btn-tambah-petugas").prop("disabled", false);

		            if (data.result.trim() == "success")
		            {
		            	get_penugasan();
					}
				}
	    	});
		}
	});

	$(document).on("click", ".btn-simpan-penugasan", function()
	{
		var penilai		= $("#penilai").val();
		var reviewer	= $("#reviewer").val();

		if (penilai==reviewer){
			alert("Penilai dan Reviewer tidak boleh sama!");
			return;
		}

		if (window.confirm("Apakah Anda yakin?"))
		{
			$.ajax({
				type		: "POST",
				url 		: base_url + "AjaxPekerjaan/update_penugasan/",
				dataType	: "JSON",
				beforeSend: function() {
					$(".btn-submit").html("Silahkan tunggu...");
					$(".btn-submit").prop("disabled", true);
				},
				data		: {
					id		 	: id,
					penilai		: penilai,
					reviewer	: reviewer
				},
				success		: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					$(".btn-submit").html("SIMPAN");
					$(".btn-submit").prop("disabled", false);

					if (data.result == "success")
					{
						location.reload();
					}
				},
			});
		}
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

	function get_lembar_kendali()
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "Ajax/get_data_table/",
			dataType	: "json",
			beforeSend: function() {
				$("#table_body_lembar_kendali").html("<tr><td colspan='8' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
			},
			data		: {
				type			: "lembar_kendali",
				id_pekerjaan 	: id
			},
			success		: function (data) {
				//$(".test_data").html(data.data_table);
				$("#table_body_lembar_kendali").html("");
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
					$("#table_body_lembar_kendali").append(row);
				});

				$("#lembar_kendali_count").val(data.data_total);

				if (id_status == 2 && data.data_total > 0)
				{
					$(".btn-kirim").removeClass("hidden");
				}

				cek_button();
			},
		});
	}

	function get_evaluasi()
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "Ajax/get_data_table/",
			dataType	: "json",
			beforeSend: function() {
				$("#table_body_evaluasi").html("<tr><td colspan='8' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
			},
			data		: {
				type			: "evaluasi",
				id_pekerjaan 	: id
			},
			success		: function (data) {
				//$(".test_data").html(data.data_table);
				$("#table_body_evaluasi").html("");
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
					$("#table_body_evaluasi").append(row);
				});

				$("#evaluasi_count").val(data.data_total);
				cek_button();

				/*if (id_status == 5 && id_user == pekerjaan_id_user && data.data_total > 0)
				{
					$(".tambah_evaluasi").removeClass("hidden");
					$(".btn-approve").removeClass("hidden");
				}*/

			},
		});
	}

	function get_dokumen()
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "Ajax/get_data_table_custom/",
			dataType	: "json",
			beforeSend: function() {
				$("#table_body_dokumen").html("<tr><td colspan='7' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
			},
			data		: {
				type			: "dokumen",
				id_pekerjaan 	: id
			},
			success		: function (data) {
				//$(".test_data").html(data.data_table);
				$("#table_body_dokumen").html("");
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
					$("#table_body_dokumen").append(row);
				});

				$("#dokumen_count").val(data.data_total);
				cek_button();
			},
		});
	}

	function get_penugasan()
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/get_penugasan/",
			dataType	: "json",
			beforeSend: function() {
				$("#table_tugas_body").html("<tr><td colspan='9' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
			},
			data		: {
				id_pekerjaan 	: id
			},
			success		: function (data) {
				//$(".test_data").html(data.data_table);
				$("#table_tugas_body").html("");
				var row = "";
				$.each(data.data_table, function(i, item)
				{
					row	= "<tr>";
					row	+= "<td align='center'>" + i + "</td>";
					$.each(item, function(j, item1)
					{
						if (j == "alamat")
						{

							row	+= "<td widht='20%'>" + item1 + "</td>";
						}
						else
						{
							row	+= "<td>" + item1 + "</td>";

						}
					});

					row	+= "</tr>";
					$("#table_tugas_body").append(row);
				});

				$(".table_tugas_count").val(data.data_total);

				$(".default-date-picker").datepicker();

				$(".jam").timepicker(
					{ 'timeFormat': 'H:i' }
				);
			},
		});

	}

	function get_catatan()
	{
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/get_catatan/",
			dataType	: "json",
			beforeSend: function() {
				$("#table_body_catatan").html("<tr><td colspan='6' align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
			},
			data		: {
				id_pekerjaan 	: id
			},
			success		: function (data) {
				//$(".test_data").html(data.data_table);
				$("#table_body_catatan").html("");
				var row = "";
				$.each(data.data_table, function(i, item)
				{
					row	= "<tr>";
					row	+= "<td align='center'>" + i + "</td>";
					$.each(item, function(j, item1)
					{
						if (j == "tanggal" || j == "hasil")
						{
							row	+= "<td align='center'>" + item1 + "</td>";
						}
						else
						{
							row	+= "<td>" + item1 + "</td>";
						}
					});

					row	+= "</tr>";
					$("#table_body_catatan").append(row);
				});
			},
		});

	}

	function get_petugas(id_lokasi, id_group)
	{
		var new_component	= "";
		var idcomponent		= "textbox_petugas";
		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/get_petugas/",
			dataType	: "JSON",
			beforeSend: function() {
				$("#box_petugas").html('<input id="textbox_petugas" name="textbox_petugas" class="form-control input-sm" value="" placeholder="Pilih dulu Tipe Petugas" required="" type="text">');
				$("#textbox_petugas").prop("disabled", true);
				$("#textbox_petugas").val("Loading...");
			},
			data		: {
				id_group 		: id_group,
				id_lokasi 		: id_lokasi
			},
			success		: function (data) {
				new_component += "<select name='" + idcomponent + "' id='" + idcomponent + "' class='form-control input-sm'>";
				new_component += "<option value=\"\">Pilih</option>";
				new_component += "<select name='" + idcomponent + "' id='" + idcomponent + "' class='form-control input-sm'>";

				$("#box_petugas").html(new_component);

				$.each(data, function (key, value) {
					$("#" + idcomponent).append($("<option></option>")
										.attr("value", value.id)
										.text(value.nama));

				});
			},
		});
	}

	$(document).on("click", ".panel-head", function()
	{
		var role	= $(this).attr("aria-controls");
		window.history.pushState("object or string", "Title", window.location.pathname + "?role=" + role );

		if (role == "lembar"){
			get_lembar_kendali();
		}else if (role == "evaluasi"){
			get_evaluasi();
		}else if (role == "dokumen"){
			get_dokumen();
		}else if (role == "catatan"){
			get_catatan();
		}

		current_url			= window.location.href;
	});

	function cek_button()
	{
		if (tambah_lk == 0){
			$(".tambah_lk").addClass("hidden");
		}
		if (tambah_evaluasi == 0){
			$(".tambah_evaluasi").addClass("hidden");
		}
		if (update_dokumen == 0){
			$(".update_dokumen").addClass("hidden");
		}
	}


	// For Upload file / PO
	$(function()
	{
		// Variable to store your files
		var files;

		// Add events
		$('#tmp_file').on('change', prepareUpload);
		/*$('form').on('submit', uploadFiles);*/

		// Grab the files and set them to our variable
		function prepareUpload(event)
		{
			files = event.target.files;
			uploadFiles(event);
		}

		// Catch the form submit and upload the files
		function uploadFiles(event)
		{
			event.stopPropagation(); // Stop stuff happening
	        event.preventDefault(); // Totally stop stuff happening

	        // START A LOADING SPINNER HERE

	        // Create a formdata object and add the files
			var data = new FormData();
			$.each(files, function(key, value)
			{
				data.append(key, value);
			});

	        $.ajax({
	            url: base_url + "Ajax/do_upload_data/?files",
	            type: 'POST',
	            data: data,
	            cache: false,
	            processData: false, // Don't process the files
	            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
	            success: function(data)
	            {
	            	if (data != "")
	            	{
						$("#po_file").val(data);
						$("#box_file_po").html("<a href='<?=base_url()?>asset/file/" + data + "' target='_blank'>Download</a>");
					}
	            }
	        });
	    }

		// submit Popover
		$(document).on("click", ".btn-simpan-po", function()
		{
			if (window.confirm("Apakah Anda yakin?"))
			{
				$.ajax({
					type		: "POST",
					url 		: base_url + "AjaxPekerjaan/submit_po/",
					dataType	: "JSON",
					beforeSend: function() {
						$(".btn-submit").html("Silahkan tunggu...");
						$(".btn-submit").prop("disabled", true);
					},
					data		: {
						id_pekerjaan		: id,
						no					: $("#po_no").val(),
						tanggal				: $("#po_tanggal").val(),
						file				: $("#po_file").val(),
						keterangan			: $("#po_keterangan").val()
					},
					success		: function (data) {
						$(".close").click();
						generate_notification(data.result.trim(), data.message.trim(), "topCenter");
						$(".btn-submit").html("SIMPAN");
						$(".btn-submit").prop("disabled", false);

						if (data.result == "success")
						{
							location	= base_url + "pekerjaan/";
						}
					},
				});
			}
			else
			{
				$(".close").click();
			}
		});
	});

	$(document).on("click", ".btn-input-laporan", function()
	{
		location = base_url + "pekerjaan/laporan_edit/" + id + "/?url=" + current_url;
	});

	$(document).on("click", ".btn-input-laporan-final", function()
	{
		location = base_url + "pekerjaan/laporan_final_edit/" + id + "/?url=" + current_url;
	});
	
	$(document).on("click", ".btn-input-tandaterima-dokumen", function()
	{
		location = base_url + "pekerjaan/upload_tandaterima_dokumen_edit/" + id + "/?url=" + current_url;
	});

	$(document).on("click", ".btn-download", function(){
		window.location.reload()
	})

	// tambahan hendra 20180509
	$(document).on("click", ".btn_import_excel", function(event)
	{
		// event.preventDefault();
		if (window.confirm("Apakah Anda yakin?"))
		{
			$.ajax({
	    		type	: "POST",
				url 	: base_url + "pekerjaan/detail/"+base64_id,
				beforeSend: function(){
		            $(".btn_import_excel").html("<i class=\"fa fa-refresh fa-spin\"></i> Loading ...");
		        },
				dataType	: "JSON",
				success	: function (data) {
		            $(".btn_import_excel").html("upload");
		            $('#myModal').modal('hide');	            
				}
	    	});
		}
	});
	setTimeout('$(".alert_error_msg").hide()',5400);

</script>
<?php echo $_template["_foot"]?>
