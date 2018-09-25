<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed'); 

$list_bangunan	= $custom_data["tab_bangunan"];
					
?>

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-body">
			<div class="content-inner inner-page">
				<h2 class="page-heading">Kertas Kerja</h2>
				<form name="form-kertas-kerja" id="form-kertas-kerja" method="post">

					<input type='hidden' id='id_pekerjaan' name='id_pekerjaan' class='form-control input-sm number-id_pekerjaan' value='<?php echo $id_pekerjaan ?>' placeholder='id_pekerjaan' required>			
					<input type='hidden' id='id_lokasi' name='id_lokasi' class='form-control input-sm number-id_lokasi' value='<?php echo $id_lokasi ?>' placeholder='id_lokasi' required>			
					<input type='hidden' id='jumlah_bangunan' name='jumlah_bangunan' class='form-control input-sm number-jumlah_bangunan' value='<?php echo $jumlah_bangunan ?>' placeholder='jumlah_bangunan' required>
					

					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#entry" class="panel-head panel-entry" aria-controls="entry" role="tab" data-toggle="tab" data-type="">Entry</a>
						</li>
						<li role="presentation">
							<a href="#tanah" class="panel-head panel-tanah" aria-controls="tanah" role="tab" data-toggle="tab" data-type="">Tanah</a>
						</li>

						<?php
							$i = 1;
							foreach ($list_bangunan as $id_bangunan => $item_bangunan)
							{
								$role	= str_replace(" ", "_", $id_bangunan);
						?>
						<li role="presentation">
							<a href="#<?=$role?>" class="panel-head panel-<?=$role?>" aria-controls="<?=$role?>" role="tab" data-toggle="tab" data-type="bangunan"><?=$id_bangunan?></a>
						</li>
						<?php $i++; } ?>
						
						<li role="presentation">
							<a href="#splengkap" class="panel-head panel-splengkap" aria-controls="splengkap" role="tab" data-toggle="tab" data-type="">Sarana Pelengkap</a>
						</li>
						<li role="presentation">
							<a href="#dbanding" class="panel-head panel-dbanding" aria-controls="dbanding" role="tab" data-toggle="tab" data-type="">Data Banding</a>
						</li>
						<li role="presentation">
							<a href="#lampiran" class="panel-head panel-lampiran" aria-controls="lampiran" role="tab" data-toggle="tab" data-type="">Lampiran-Lampiran</a>
						</li>
					</ul>


					<div class="tab-content" style="padding: 20px; border: 1px solid #eee;">
						<div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="entry">
						   <h4>FORM DATA ENTRY SURVEYOR</h4>
						   <div class="row">
						      <div class="col-sm-6">
						         <div class="form-group row" style="background:#2862bb">
						            <div class="col-md-12" style="color:#ffffff; padding-left: 10px">
						               <label>SURVEYOR & LAPORAN</label>
						            </div>
						         </div>
						         
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Penandatangan Laporan</label>
						               <select class='form-control table_input' id='textbox_entry_1' name='update[entry_1]' data-id-field='1' data-keterangan=''>
						                  <option selected='selected' disabled='disabled'>Select</option>

							               	<?php  foreach ($penandatangan as $key => $value) {?>
						                  		<option value='<?php echo $value->nama ?>' <?php echo ($txn_kertas_kerja['penandatangan_laporan'] == $value->nama) ? "selected":"" ?>><?php echo $value->nama ?></option>
							               	<?php } ?>
						               </select>
						            </div>
						         </div>

						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Nama Penilai</label>
						               <input type='text' id='textbox_entry_3' name='update[entry_3]' class='form-control table_input input_3_ ' value='<?php echo $txn_kertas_kerja['nama_penilai'] ?>' data-id-field='3' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Nama Surveyor</label>
						               <input type='text' id='textbox_entry_5' name='update[entry_5]' class='form-control table_input input_5_ ' value='<?php echo $txn_kertas_kerja['nama_surveyor'] ?>' data-id-field='5' data-keterangan=''>								
						            </div>
						         </div>

						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Tanggal Inspeksi & Penilaian</label>
						               <input type='text' id='textbox_entry_9' name='update[entry_9]' class='form-control table_input' value='<?php echo $txn_kertas_kerja['tanggal_inspeksi_penilaian'] ?>' data-id-field='9' data-date-format='dd-mm-yyyy' data-date-autoclose='true' data-keterangan=''>
						               <script>
						                  $('#textbox_entry_9').datepicker();
						               </script>
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Tanggal Laporan</label>
						               <input type='text' id='textbox_entry_12' name='update[entry_12]' class='form-control table_input' value='<?php echo $txn_kertas_kerja['tanggal_laporan'] ?>' data-id-field='12' data-date-format='dd-mm-yyyy' data-date-autoclose='true' data-keterangan=''>
						               <script>
						                  $('#textbox_entry_12').datepicker();
						               </script>
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Nomor Laporan</label>
						               <input type='text' id='textbox_entry_15' name='update[entry_15]' class='form-control table_input input_15_ ' value='<?php echo $txn_kertas_kerja['nomor_laporan'] ?>' data-id-field='15' data-keterangan=''>								
						            </div>
						         </div>
						      </div>
						      <div class="col-sm-6">
						         <div class="form-group row" style="background:#2862bb">
						            <div class="col-md-12" style="color:#ffffff; padding-left: 10px">
						               <label>DATA-DATA UMUM PROPERTI</label>
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Obyek Penilaian</label>
						               <input type='text' id='textbox_entry_2' name='update[entry_2]' class='form-control table_input input_2_ ' value='<?php echo $txn_kertas_kerja['obyek_penilaian'] ?>' data-id-field='2' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Highest and Best Use</label>
						               <select class='form-control table_input input_4_' id='textbox_entry_4' name='update[entry_4]' data-id-field='4' data-keterangan=''>
						                  <option selected='selected' disabled='disabled'>Select</option>

						                  <?php foreach ($list_kegunaan as $key => $value) { ?>
						                  <option value='<?php echo $value->kegunaan ?>' <?php echo ($txn_kertas_kerja['kegunaan'] == $value->kegunaan) ? "selected" : "" ?>><?php echo $value->kegunaan ?></option>
						                  <?php } ?>
						               </select>
						               </td>
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Klien</label>
						               <div class="row">
						                  <div class="col-md-6">
						                     <select class='form-control table_input input_6_' id='textbox_entry_6' name='update[entry_6]' data-id-field='6' data-keterangan=''>
						                        <option selected='selected' disabled='disabled'>Select</option>
						                        <?php foreach ($jenis_klien as $key => $value) { ?>
						                        <option value='<?php echo $value->jenis_klien ?>' <?php ($txn_kertas_kerja['jenis_klien'] == $value->jenis_klien) ? "selected" : "" ?>><?php echo $value->jenis_klien ?></option>
						                        <?php } ?>
						                     </select>
						                  </div>
						                  <div class="col-md-6"><input type='text' id='textbox_entry_7' name='update[entry_7]' class='form-control table_input input_7_ ' value='<?php echo $txn_kertas_kerja['klien'] ?>' data-id-field='7' data-keterangan=''></div>
						               </div>
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Telepon / HP.</label>
						               <input type='text' id='textbox_entry_8' name='update[entry_8]' class='form-control table_input input_8_ ' value='<?php echo $txn_kertas_kerja['telepon_klien'] ?>' data-id-field='8' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Status Obyek</label>
						               <select class='form-control table_input input_10_' id='textbox_entry_10' name='update[entry_10]' data-id-field='10' data-keterangan=''>
						                  <option selected='selected' disabled='disabled'>Select</option>
						                  <?php foreach ($status_objek as $key => $value) { ?>
						                  <option value='<?php echo $value->status_objek ?>' <?php echo ($txn_kertas_kerja['status_objek'] == $value->status_objek) ? "selected":"" ?>><?php echo $value->status_objek ?></option>
						                  <?php } ?>
						               </select>
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Yang dijumpai</label>
						               <input type='text' id='textbox_entry_11' name='update[entry_11]' class='form-control table_input input_11_ ' value='<?php echo $txn_kertas_kerja['yang_dijumpai'] ?>' data-id-field='11' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Selaku</label>
						               <input type='text' id='textbox_entry_13' name='update[entry_13]' class='form-control table_input input_13_ ' value='<?php echo $txn_kertas_kerja['selaku'] ?>' data-id-field='13' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Obyek ditempati oleh</label>
						               <input type='text' id='textbox_entry_14' name='update[entry_14]' class='form-control table_input input_14_ ' value='<?php echo $txn_kertas_kerja['obyek_ditempati_oleh'] ?>' data-id-field='14' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Penggunaan Obyek</label>
						               <input type='text' id='textbox_entry_16' name='update[entry_16]' class='form-control table_input input_16_ ' value='<?php echo $txn_kertas_kerja['penggunaan_obyek'] ?>' data-id-field='16' data-keterangan=''>								
						            </div>
						         </div>
						      </div>
						   </div>
						   <div class="row">
						      <div class="col-sm-6">
						         <div class="form-group row" style="background:#2862bb">
						            <div class="col-md-12" style="color:#ffffff; padding-left: 10px">
						               <label>DATA-DATA PEMBERI TUGAS</label>
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Nama Instansi / Perorangan</label>
						               <select class='form-control table_input' id='textbox_entry_17' name='update[entry_17]' data-id-field='17' data-keterangan=''>
						                  <option selected='selected' disabled='disabled'>Select</option>
						                  <?php foreach ($list_debitur as $key => $value) { ?>
						                  <option value='<?php echo $value->nama ?>' <?php echo ($txn_kertas_kerja['debitur'] == $value->nama) ? "selected" : "" ?>><?php echo $value->nama ?></option>
						                  <?php } ?>
						               </select>
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Nama Cabang</label>
						               <input type='text' id='textbox_entry_19' name='update[entry_19]' class='form-control table_input input_19_ ' value='<?php echo $txn_kertas_kerja['nama_cabang'] ?>' data-id-field='19' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Nama Staff</label>
						               <input type='text' id='textbox_entry_20' name='update[entry_20]' class='form-control table_input input_20_ ' value='<?php echo $txn_kertas_kerja['nama_staff'] ?>' data-id-field='20' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Jabatan</label>
						               <input type='text' id='textbox_entry_22' name='update[entry_22]' class='form-control table_input input_22_ ' value='<?php echo $txn_kertas_kerja['jabatan'] ?>' data-id-field='22' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Nomor Penugasan</label>
						               <input type='text' id='textbox_entry_24' name='update[entry_24]' class='form-control table_input input_24_ ' value='<?php echo $txn_kertas_kerja['nomor_penugasan'] ?>' data-id-field='24' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Tanggal Penugasan</label>
						               <input type='text' id='textbox_entry_26' name='update[entry_26]' class='form-control table_input' value='<?php echo $txn_kertas_kerja['tanggal_penugasan'] ?>' data-id-field='26' data-date-format='dd-mm-yyyy' data-date-autoclose='true' data-keterangan=''>
						               <script>
						                  $('#textbox_entry_26').datepicker();
						               </script>
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Tujuan Penilaian</label>
						               <select class='form-control table_input input_28_' id='textbox_entry_28' name='update[entry_28]' data-id-field='28' data-keterangan=''>
						                  <option selected='selected' disabled='disabled'>Select</option>
						                  <?php foreach ($tujuan_penilaian as $key => $value) { ?>
						                  <option value='<?php echo $value->tujuan ?>' <?php echo ($txn_kertas_kerja['tujuan_penilaian']==$value->tujuan) ? "selected":"" ?>><?php echo $value->tujuan ?></option>
						                  <?php } ?>
						               </select>
						            </div>
						         </div>
						      </div>
						      <div class="col-sm-6">
						         <div class="form-group row" style="background:#2862bb">
						            <div class="col-md-12" style="color:#ffffff; padding-left: 10px">
						               <label>ALAMAT LENGKAP PROPERTI</label>
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Alamat Properti</label>
						               <textarea id='textbox_entry_18' name='update[entry_18]' class='form-control table_input input_18_' data-id-field='18' data-keterangan=''><?php echo $txn_kertas_kerja['alamat_properti'] ?></textarea>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Nama Provinsi</label>
						               <input type='text' id='textbox_entry_21' name='update[entry_21]' class='form-control table_input input_21_ ' value='Banten' data-id-field='21' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>d/h</label>
						               <input type='text' id='textbox_entry_33' name='update[entry_33]' class='form-control table_input input_897_ ' value='qqqqq' data-id-field='897' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Nama Kota / Kabupaten</label>
						               <input type='text' id='textbox_entry_23' name='update[entry_23]' class='form-control table_input input_23_ ' value='Kota Tangerang' data-id-field='23' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>d/h</label>
						               <input type='text' id='textbox_entry_34' name='update[entry_34]' class='form-control table_input input_898_ ' value='qqqq111' data-id-field='898' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Kecamatan</label>
						               <input type='text' id='textbox_entry_25' name='update[entry_25]' class='form-control table_input input_25_ ' value='Pinang' data-id-field='25' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>d/h</label>
						               <input type='text' id='textbox_entry_35' name='update[entry_35]' class='form-control table_input input_899_ ' value='qqq' data-id-field='899' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>Kelurahan / Desa</label>
						               <input type='text' id='textbox_entry_27' name='update[entry_27]' class='form-control table_input input_27_ ' value='Pinang' data-id-field='27' data-keterangan=''>								
						            </div>
						         </div>
						         <div class="form-group row">
						            <div class="col-md-12">
						               <label>d/h</label>
						               <input type='text' id='textbox_entry_36' name='update[entry_36]' class='form-control table_input input_900_ ' value='qqq' data-id-field='900' data-keterangan=''>								
						            </div>
						         </div>
						      </div>
						   </div>
						   <div class="row">
						      <div class="col-md-12">
						         <h4>RINGKASAN PENILAIAN PROPERTI 1</h4>
						         <div class="table_div table-responsive">
						            <table class="table table-bordered table_border" cellpadding="0" cellspacing="0" >
						               <tbody>
						                  <tr bgcolor="#4C9ED9">
						                     <td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>No</span></td>
						                     <td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Uraian Properti</span></td>
						                     <td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Luas (m<sup>2</sup>) / Jumlah</span></td>
						                     <td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Nilai Pasar (Rp)</span></td>
						                     <td align="center" style="color:#ffffff; padding-left: 10px; padding-right: 10px"><span>Nilai Lukuidasi (Rp)</span></td>
						                  </tr>
						               </tbody>
						               <tbody  id="table_body_ringkasan">
						               </tbody>
						            </table>
						         </div>
						      </div>
						   </div>
						   <div class="row">
						      <div class="col-md-12">
						         <div class="table_div">
						            <table class="table-bordered table_border" cellpadding="0" cellspacing="0" >
						               <tbody>
						                  <tr>
						                     <td colspan="5">
						                        <table class="table table_border" cellpadding="0" cellspacing="0">
						                           <tr bgcolor="#2862bb">
						                              <td align="center" colspan="6" style="color:#ffffff;">
						                                 <span>HASIL PENILAIAN TERDAHULU</span>
						                              </td>
						                           </tr>
						                        </table>
						                     </td>
						                  </tr>
						                  <tr>
						                     <td colspan="5" id="history_penilaian">
						                        <table class="table table_border" cellpadding="0" cellspacing="0">
						                           <tr bgcolor="#4C9ED9">
						                              <td align="center" style="color: #ffffff">No.</td>
						                              <td align="center" style="color: #ffffff">U R A I A N</td>
						                              <td align="center" style="color: #ffffff">TAHUN 2013</td>
						                              <td align="center" style="color: #ffffff">TAHUN 2014</td>
						                              <td align="center" style="color: #ffffff">TAHUN 2015</td>
						                              <td align="center" style="color: #ffffff">TAHUN 2016</td>
						                           </tr>
						                           <tr>
						                              <td><span>1.</span></td>
						                              <td><span>Nama Surveyor</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                           </tr>
						                           <tr>
						                              <td><span>2.</span></td>
						                              <td><span>Tanggal Inspeksi</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                           </tr>
						                           <tr>
						                              <td><span>3.</span></td>
						                              <td><span>Luas Tanah</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                           </tr>
						                           <tr>
						                              <td><span>4.</span></td>
						                              <td><span>Luas Bangunan</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                           </tr>
						                           <tr>
						                              <td><span>5.</span></td>
						                              <td><span>Nilai Pasar Tanah</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                           </tr>
						                           <tr>
						                              <td><span>6.</span></td>
						                              <td><span>Nilai Pasar Bangunan</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                           </tr>
						                           <tr>
						                              <td><span>7.</span></td>
						                              <td><span>Nilai Pasar</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                           </tr>
						                           <tr>
						                              <td><span>8.</span></td>
						                              <td><span>Nilai Likuidasi</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                              <td><span>-</span></td>
						                           </tr>
						                        </table>
						                     </td>
						                  </tr>
						               </tbody>
						            </table>
						         </div>
						      </div>
						   </div>
						</div>

						<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="tanah">
						   <ul class="nav nav-tabs" role="tablist">
						      <li role="presentation" class="">
						         <a aria-expanded="false" href="#tanah_form" class="panel-tanah_tanah active" aria-controls="tanah_tanah" role="tab" data-toggle="tab" data-type="">Form Tanah</a>
						      </li>
						   </ul>
						   <div class="tab-content" style="padding: 20px; border: 1px solid #eee;">
						      <div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="tanah_form">
						         <div class="row">
						            <div class="col-lg-12">
						               <div class="panel panel-default">
						                  <div class="panel-heading">
						                     <h3 class="panel-title">O B Y E K&nbsp;&nbsp;&nbsp;P E N I L A I A N</h3>
						                  </div>
						                  <div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
						                     <table class="table table_info" cellpadding="0" cellspacing="0" style="width: 100%">
						                        <colgroup>
						                           <col style="width: 30%">
						                           <col style="width: 20">
						                        </colgroup>
						                        <tr valign="top">
						                           <td width="120">Nama</td>
						                           <td align="center" width="20">:</td>
						                           <td><?php echo $pekerjaan->nama_klien ?></td>
						                        </tr>
						                        <tr valign="top">
						                           <td>Tanggal Inspeksi</td>
						                           <td align="center" width="20">:</td>
						                           <td class="tanah-td-tanggal-inspeksi"><?php echo $lokasi->tanggal_mulai ?></td>
						                        </tr>
						                        <tr valign="top">
						                           <td>Alamat Obyek</td>
						                           <td align="center" width="20">:</td>
						                           <td>
														<?=$lokasi->alamat." ".(!empty($lokasi->gang) ? "Gang ".$lokasi->gang : "")." No. ".$lokasi->nomor.", RT. ".$lokasi->rt." RW. ".$lokasi->rw." ".$lokasi->nama_desa." ".(!empty($lokasi->dh_desa) ? "(d/h ".$lokasi->dh_desa.")" : "")." ".$lokasi->nama_kecamatan." ".(!empty($lokasi->dh_kecamatan) ? "(d/h ".$lokasi->dh_kecamatan.")" : "")." ".$lokasi->nama_kota." ".(!empty($lokasi->dh_kota) ? "(d/h ".$lokasi->dh_kota.")" : "").", ".$lokasi->nama_provinsi ." ".(!empty($lokasi->dh_provinsi) ? "(d/h ".$lokasi->dh_provinsi.")" : "")?>												
						                           </td>
						                        </tr>
						                     </table>
						                  </div>
						                  <div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
						                     <table class="table table_info" cellpadding="0" cellspacing="0" style="width: 100%">
						                        <colgroup>
						                           <col style="width: 30%">
						                           <col style="width: 20">
						                        </colgroup>
						                        <tr valign="top">
						                           <td>Yang dijumpai dilokasi</td>
						                           <td align="center" width="20">:</td>
						                           <td class="tanah-td-yang-dijumpai"></td>
						                        </tr>
						                        <tr valign="top">
						                           <td>Jabatan</td>
						                           <td align="center" width="20">:</td>
						                           <td class="tanah-td-jabatan"></td>
						                        </tr>
						                        <tr valign="top">
						                           <td>Upload Photo</td>
						                           <td align="center" width="20">:</td>
						                           <td>
						                              <img id='img_tanah_32' src='<?php echo base_url('/asset/file/'.$txn_tanah['foto']) ?>' data-id-field='133' data-name-field='tanah_32' data-keterangan='' class='btn-upload-image img-133-' style='border: 1px solid #ccc; margin-top: 10px; margin-bottom: 20px; height: 100px;' />
						                              <input type='file' id='file-133' class='form-control tmp_file file-133-' data-id-field='133' data-name-field='tanah_32' style='display: none;' data-keterangan=''>
						                              <input type='hidden' id='textbox_tanah_32' name='update[tanah_32]' class='table_input textbox-133-' value='<?php echo $txn_tanah['foto'] ?>' data-id-field='133' data-name-field='tanah_32' data-keterangan=''>
						                           </td>
						                        </tr>
						                     </table>
						                     <div class="col-md-6" style="padding: 0px;">
						                        <h4>Informasi Properti</h4>
						                        <table class="table table_border" cellpadding="0" cellspacing="0">
						                           <colgroup>
						                              <col style="width: 40%">
						                           </colgroup>
						                           <tr>
						                              <td width="15%"><span>Status obyek</span></td>
						                              <td><input type='text' id='textbox_tanah_1' name='update[tanah_1]' class='form-control table_input input_102_ ' value='<?php echo $txn_kertas_kerja['status_objek'] ?>' data-id-field='102' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td><span>Obyek dihuni oleh</span></td>
						                              <td><input type='text' id='textbox_tanah_2' name='update[tanah_2]' class='form-control table_input input_103_ ' value='<?php echo $txn_kertas_kerja['obyek_ditempati_oleh'] ?>' data-id-field='103' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td><span>Penggunaan obyek</span></td>
						                              <td><input type='text' id='textbox_tanah_3' name='update[tanah_3]' class='form-control table_input input_104_ ' value='<?php echo $txn_kertas_kerja['penggunaan_obyek'] ?>' data-id-field='104' data-keterangan=''></td>
						                           </tr>
						                        </table>
						                     </div>
						                     <div class="col-md-6" style="padding: 0px">
						                        <h4>Batas-batas Properti</h4>
						                        <table class="table table_border" cellpadding="0" cellspacing="0">
						                           <colgroup>
						                              <col style="width: 40%">
						                           </colgroup>
						                           <tr>
						                              <td width="30%">
						                                 <select class='form-control table_input input_105_' id='textbox_tanah_4' name='update[tanah_4]' data-id-field='105' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($batas_properti as $key => $value) { ?>
						                                    <option value='<?php echo $value->batas_properti ?>' <?php echo ($txn_tanah['jenis_batas_1'] == $value->batas_properti) ? "selected":"" ?>><?php echo $value->batas_properti ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                              <td><input type='text' id='textbox_tanah_5' name='update[tanah_5]' class='form-control table_input input_106_ ' value='<?php echo $txn_tanah['batas_properti_1'] ?>' data-id-field='106' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td>
						                                 <select class='form-control table_input input_107_' id='textbox_tanah_6' name='update[tanah_6]' data-id-field='107' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($batas_properti as $key => $value) { ?>
						                                    <option value='<?php echo $value->batas_properti ?>' <?php echo ($txn_tanah['jenis_batas_2'] == $value->batas_properti) ? "selected":""  ?>><?php echo $value->batas_properti ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                              <td><input type='text' id='textbox_tanah_7' name='update[tanah_7]' class='form-control table_input input_108_ ' value='<?php echo $txn_tanah['batas_properti_2'] ?>' data-id-field='108' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td>
						                                 <select class='form-control table_input input_109_' id='textbox_tanah_8' name='update[tanah_8]' data-id-field='109' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($batas_properti as $key => $value) { ?>
						                                    <option value='<?php echo $value->batas_properti ?>' <?php echo ($txn_tanah['jenis_batas_3'] == $value->batas_properti) ? "selected":""  ?>><?php echo $value->batas_properti ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                              <td><input type='text' id='textbox_tanah_9' name='update[tanah_9]' class='form-control table_input input_110_ ' value='<?php echo $txn_tanah['batas_properti_3'] ?>' data-id-field='110' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td>
						                                 <select class='form-control table_input input_111_' id='textbox_tanah_10' name='update[tanah_10]' data-id-field='111' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($batas_properti as $key => $value) { ?>
						                                    <option value='<?php echo $value->batas_properti ?>' <?php echo ($txn_tanah['jenis_batas_4'] == $value->batas_properti) ? "selected":""  ?>><?php echo $value->batas_properti ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                              <td><input type='text' id='textbox_tanah_11' name='update[tanah_11]' class='form-control table_input input_112_ ' value='<?php echo $txn_tanah['batas_properti_4'] ?>' data-id-field='112' data-keterangan=''></td>
						                           </tr>
						                        </table>
						                     </div>
						                  </div>
						                  <div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
						                     <h4>INFORMASI LINGKUNGAN</h4>
						                     <div class="col-md-6" style="padding: 0px;">
						                        <table class="table table_border" cellpadding="0" cellspacing="0">
						                           <colgroup>
						                              <col style="width: 40%">
						                           </colgroup>
						                           <tr>
						                              <td width="15%"><span>Lokasi tanah obyek</span></td>
						                              <td>
						                                 <select class='form-control table_input input_113_' id='textbox_tanah_12' name='update[tanah_12]' data-id-field='113' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($lokasi_tanah_objek as $key => $value) { ?>
						                                    <option value='<?php echo $value->lokasi_tanah_objek ?>' <?php echo ($txn_tanah['lokasi_tanah'] == $value->lokasi_tanah_objek) ? "selected" : "" ?>><?php echo $value->lokasi_tanah_objek ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Harga tanah obyek</span></td>
						                              <td>
						                                 <select class='form-control table_input input_114_' id='textbox_tanah_13' name='update[tanah_13]' data-id-field='114' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($harga_tanah_objek as $key => $value) { ?>
						                                    <option value='<?php echo $value->harga_tanah_objek ?>' <?php echo ($value->harga_tanah_objek==$txn_tanah['harga_tanah_obyek']) ? "selected":"" ?>><?php echo $value->harga_tanah_objek ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                        </table>
						                     </div>
						                     <div class="col-md-6" style="padding: 0px">
						                        <table class="table table_border" cellpadding="0" cellspacing="0">
						                           <colgroup>
						                              <col style="width: 40%">
						                           </colgroup>
						                           <tr>
						                              <td width="15%"><span>Kepadatan bangunan</span></td>
						                              <td>
						                                 <select class='form-control table_input input_115_' id='textbox_tanah_14' name='update[tanah_14]' data-id-field='115' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($kepadatan_bangunan as $key => $value) { ?>
						                                    <option value='<?php echo $value->kepadatan_bangunan ?>' <?php echo ($value->kepadatan_bangunan==$txn_tanah['kepadatan_bangunan']) ? "selected":"" ?>><?php echo $value->kepadatan_bangunan ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Pertumbuhan bangunan</span></td>
						                              <td>
						                                 <select class='form-control table_input input_116_' id='textbox_tanah_15' name='update[tanah_15]' data-id-field='116' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($pertumbuhan_bangunan as $key => $value) { ?>
						                                    <option value='<?php echo $value->pertumbuhan_bangunan ?>' <?php echo ($value->pertumbuhan_bangunan==$txn_tanah['pertumbuhan_bangunan']) ? "selected":"" ?>><?php echo $value->pertumbuhan_bangunan ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                        </table>
						                     </div>
						                  </div>
						                  <div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
						                     <div class="col-md-6" style="padding: 0px;">
						                        <h4>ANALISA LINGKUNGAN</h4>
						                        <table class="table table_border">
						                           <colgroup>
						                              <col style="width: 40%">
						                           </colgroup>
						                           <tr>
						                              <td width="25%"><span>Kemudahan mencapai lokasi obyek</span></td>
						                              <td>
						                                 <select class='form-control table_input input_117_' id='textbox_tanah_16' name='update[tanah_16]' data-id-field='117' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
						                                    <option value='<?php echo $value->tipe_penilaian ?>' <?php echo ($value->tipe_penilaian==$txn_tanah['kemudahan_mencapai_lokasi']) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Kemudahan belanja / shooping</span></td>
						                              <td>
						                                 <select class='form-control table_input input_118_' id='textbox_tanah_17' name='update[tanah_17]' data-id-field='118' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
						                                    <option value='<?php echo $value->tipe_penilaian ?>' <?php echo ($value->tipe_penilaian==$txn_tanah['kemudahan_belanja']) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Kemudahan rekreasi /  hiburan</span></td>
						                              <td>
						                                 <select class='form-control table_input input_119_' id='textbox_tanah_18' name='update[tanah_18]' data-id-field='119' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
						                                    <option value='<?php echo $value->tipe_penilaian ?>' <?php echo ($value->tipe_penilaian==$txn_tanah['kemudahan_rekreasi']) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Kemudahan angkutan umum / transportasi</span></td>
						                              <td>
						                                 <select class='form-control table_input input_120_' id='textbox_tanah_19' name='update[tanah_19]' data-id-field='120' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
						                                    <option value='<?php echo $value->tipe_penilaian ?>' <?php echo ($value->tipe_penilaian==$txn_tanah['kemudahan_angkutan_umum']) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Kemudahan sarana pendidikan / sekolah</span></td>
						                              <td>
						                                 <select class='form-control table_input input_121_' id='textbox_tanah_20' name='update[tanah_20]' data-id-field='121' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
						                                    <option value='<?php echo $value->tipe_penilaian ?>' <?php echo ($value->tipe_penilaian==$txn_tanah['kemudahan_sarana_pendidikan']) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Keamanan terhadap kejahatan / kriminal</span></td>
						                              <td>
						                                 <select class='form-control table_input input_122_' id='textbox_tanah_21' name='update[tanah_21]' data-id-field='122' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
						                                    <option value='<?php echo $value->tipe_penilaian ?>' <?php echo ($value->tipe_penilaian==$txn_tanah['keamanan_terhadap_kejahatan']) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Keamanan terhadap bencana kebakaran</span></td>
						                              <td>
						                                 <select class='form-control table_input input_123_' id='textbox_tanah_22' name='update[tanah_22]' data-id-field='123' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
						                                    <option value='<?php echo $value->tipe_penilaian ?>' <?php echo ($value->tipe_penilaian==$txn_tanah['keamanan_terhadap_kebakaran']) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Keamanan terhadap bencana alam</span></td>
						                              <td>
						                                 <select class='form-control table_input input_124_' id='textbox_tanah_23' name='update[tanah_23]' data-id-field='124' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
						                                    <option value='<?php echo $value->tipe_penilaian ?>' <?php echo ($value->tipe_penilaian==$txn_tanah['keamanan_terhadap_bencana']) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                        </table>
						                     </div>

						                     <div class="col-md-6" style="padding: 0px">
						                        <h4>INFORMASI KAWASAN</h4>
						                        <table class="table table_border">
						                           <colgroup>
						                              <col style="width: 40%">
						                           </colgroup>
						                           <tr>
						                              <td width="25%"><span>Perumahan / pemukiman (%)</span></td>
						                              <td><input type='number' id='textbox_tanah_24' name='update[tanah_24]' class='form_control table_input number  input_125_' value='<?php echo $txn_tanah['permukiman'] ?>' data-id-field='125' min='0' max='100' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td><span>Industri / pergudangan (%)</span></td>
						                              <td><input type='number' id='textbox_tanah_25' name='update[tanah_25]' class='form_control table_input number  input_126_' value='<?php echo $txn_tanah['industri'] ?>' data-id-field='126' min='0' max='100' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td><span>Pertokoan / perniagaan (%)</span></td>
						                              <td><input type='number' id='textbox_tanah_26' name='update[tanah_26]' class='form_control table_input number  input_127_' value='<?php echo $txn_tanah['pertokoan'] ?>' data-id-field='127' min='0' max='100' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td width="25%"><span>Perkantoran / perdagangan & jasa (%)</span></td>
						                              <td><input type='number' id='textbox_tanah_27' name='update[tanah_27]' class='form_control table_input number  input_128_' value='<?php echo $txn_tanah['perkantoran'] ?>' data-id-field='128' min='0' max='100' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td><span>Taman /  penghijauan / jalur hijau (%)</span></td>
						                              <td><input type='number' id='textbox_tanah_28' name='update[tanah_28]' class='form_control table_input number  input_129_' value='<?php echo $txn_tanah['taman'] ?>' data-id-field='129' min='0' max='100' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td><span>Tanah kosong / tanah idle (%)</span></td>
						                              <td><input type='number' id='textbox_tanah_29' name='update[tanah_29]' class='form_control table_input number  input_130_' value='<?php echo $txn_tanah['tanah_kosong'] ?>' data-id-field='130' min='0' max='100' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td><span>Perubahan lingkungan / tata guna<br> tanah pada masa akan datang</span></td>
						                              <td>
						                                 <select class='form-control table_input input_131_' id='textbox_tanah_30' name='update[tanah_30]' data-id-field='131' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($perubahan_lingkungan_response as $key => $value) {?>
						                                    <option value='<?php echo $value->perubahan_lingkungan_response ?>' <?php echo ($value->perubahan_lingkungan_response==$txn_tanah['perubahan_lingkungan']) ? "selected":"" ?>><?php echo $value->perubahan_lingkungan_response ?></option>
						                                    <?php } ?>
						                                 </select>
						                                 <br>
						                                 <input type='text' id='textbox_tanah_73' name='update[tanah_73]' class='form-control table_input input_353_ ' value='' data-id-field='353' data-keterangan=''>														
						                              </td>
						                           </tr>
						                           <tr>
						                              <td ><span>Mayoritas data hunian pada kawasan</span></td>
						                              <td>
						                                 <select class='form-control table_input input_132_' id='textbox_tanah_31' name='update[tanah_31]' data-id-field='132' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_hunian as $key => $value) {?>
						                                    <option value='<?php echo $value->tipe_hunian ?>' <?php echo ($value->tipe_hunian==$txn_tanah['data_hunian']) ? "selected":"" ?>><?php echo $value->tipe_hunian ?></option>
						                                    <?php } ?>
						                                 </select>
						                                 <br>
						                                 <input type='text' id='textbox_tanah_74' name='update[tanah_74]' class='form-control table_input input_354_ ' value='' data-id-field='354' data-keterangan=''>														
						                              </td>
						                           </tr>
						                        </table>
						                     </div>
						                  </div>
						               </div>
						               <div class="panel panel-default">
						                  <div class="panel-heading">
						                     <h3 class="panel-title">L O K A S I&nbsp;&nbsp;&nbsp;S I T E</h3>
						                  </div>
						                  <div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
						                     <h4>FASILITAS LINGKUNGAN</h4>
						                     <div class="col-md-6" style="padding: 0px;">
						                        <table class="table table_border">
						                           <colgroup>
						                              <col style="width: 40%">
						                           </colgroup>
						                           <tr>
						                              <td><span>Lebar jalan di depan obyek (m)</span></td>
						                              <td><input type='text' id='textbox_tanah_39' name='update[tanah_39]' class='form-control table_input input_140_ ' value='<?php echo $txn_tanah['lebar_jalan_depan'] ?>' data-id-field='140' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td><span>Lebar jalan di sekitar obyek (m)</span></td>
						                              <td>
						                              	<input type='text' id='textbox_tanah_40' name='update[tanah_40]' class='form-control table_input input_141_ ' value='<?php echo $txn_tanah['lebar_jalan_sekitar'] ?>' data-id-field='141' data-keterangan=''>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Jenis jalan depan obyek</span></td>
						                              <td>
						                                 <select class='form-control table_input input_142_' id='textbox_tanah_41' name='update[tanah_41]' data-id-field='142' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_jalan as $key => $value) {?>
						                                    <option value='<?php echo $value->tipe_jalan ?>' <?php echo ($value->tipe_jalan==$txn_tanah['jenis_jalan_depan']) ? "selected":"" ?>><?php echo $value->tipe_jalan ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Drainage / Saluran</span></td>
						                              <td>
						                                 <select class='form-control table_input input_143_' id='textbox_tanah_42' name='update[tanah_42]' data-id-field='143' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($keterbukaan as $key => $value) {?>
						                                    <option value='<?php echo $value->keterbukaan ?>' <?php echo ($value->keterbukaan==$txn_tanah['drainase']) ? "selected":"" ?>><?php echo $value->keterbukaan ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Trotoar</span></td>
						                              <td>
						                                 <select class='form-control table_input input_144_' id='textbox_tanah_43' name='update[tanah_43]' data-id-field='144' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($kehadiran as $key => $value) {?>
						                                    <option value='<?php echo $value->kehadiran ?>' <?php echo ($value->kehadiran==$txn_tanah['trotoar']) ? "selected":"" ?>><?php echo $value->kehadiran ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Lampu Jalan (PJU)</span></td>
						                              <td>
						                                 <select class='form-control table_input input_145_' id='textbox_tanah_44' name='update[tanah_44]' data-id-field='145' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($kehadiran as $key => $value) {?>
						                                    <option value='<?php echo $value->kehadiran ?>' <?php echo ($value->kehadiran==$txn_tanah['lampu_jalan']) ? "selected":"" ?>><?php echo $value->kehadiran ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                        </table>
						                     </div>
						                     <div class="col-md-6" style="padding: 0px;">
						                        <table class="table table_border">
						                           <colgroup>
						                              <col style="width: 40%">
						                           </colgroup>
						                           <tr>
						                              <td><span>Jaringan Listrik</span></td>
						                              <td width="25px">
						                                 <input type='checkbox' id='textbox_tanah_33' name='update[tanah_33]' class='table_input' data-id-field='134' data-keterangan='' <?php echo ($txn_tanah['jaringan_listrik'] == 1) ? "checked" : "" ?>>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Jaringan Telepon</span></td>
						                              <td>
						                                 <input type='checkbox' id='textbox_tanah_34' name='update[tanah_34]' class='table_input'  data-id-field='135' data-keterangan='' <?php echo ($txn_tanah['jaringan_telepon'] == 1) ? "checked" : "" ?>>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Jaringan Air Bersih</span></td>
						                              <td>
						                                 <input type='checkbox' id='textbox_tanah_35' name='update[tanah_35]' class='table_input'  data-id-field='136' data-keterangan='' <?php echo ($txn_tanah['jaringan_air_bersih'] == 1) ? "checked" : "" ?>>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Jaringan Gas</span></td>
						                              <td>
						                                 <input type='checkbox' id='textbox_tanah_36' name='update[tanah_36]' class='table_input'  data-id-field='137' data-keterangan='' <?php echo ($txn_tanah['jaringan_gas'] == 1) ? "checked" : "" ?>>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Taman Pemakaman Umum</span></td>
						                              <td>
						                                 <input type='checkbox' id='textbox_tanah_37' name='update[tanah_37]' class='table_input'  data-id-field='138' data-keterangan='' <?php echo ($txn_tanah['pemakaman_umum'] == 1) ? "checked" : "" ?>>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Penampungan Sampah</span></td>
						                              <td>
						                                 <input type='checkbox' id='textbox_tanah_38' name='update[tanah_38]' class='table_input'  data-id-field='139' data-keterangan='' <?php echo ($txn_tanah['penampungan_sampah'] == 1) ? "checked" : "" ?>>
						                              </td>
						                           </tr>
						                        </table>
						                     </div>
						                  </div>

						                  <div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
						                     <h4>GAMBARAN UMUM SITE</h4>
						                     <div class="col-md-6" style="padding: 0px;">
						                        <table class="table table_border">
						                           <colgroup>
						                              <col style="width: 40%">
						                           </colgroup>
						                           <tr>
						                              <td><span>Topografi / Kontur</span></td>
						                              <td>
						                                 <select class='form-control table_input input_146_' id='textbox_tanah_45' name='update[tanah_45]' data-id-field='146' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($topografi as $key => $value) {?>
						                                    <option value='<?php echo $value->topografi ?>' <?php echo ($value->topografi==$txn_tanah['topografi']) ? "selected":"" ?>><?php echo $value->topografi ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Jenis Tanah</span></td>
						                              <td>
						                                 <select class='form-control table_input input_147_' id='textbox_tanah_46' name='update[tanah_46]' data-id-field='147' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($jenis_tanah as $key => $value) {?>
						                                    <option value='<?php echo $value->jenis_tanah ?>' <?php echo ($value->jenis_tanah==$txn_tanah['jenis_tanah']) ? "selected":"" ?>><?php echo $value->jenis_tanah ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Tata Lingkungan</span></td>
						                              <td>
						                                 <select class='form-control table_input input_148_' id='textbox_tanah_47' name='update[tanah_47]' data-id-field='148' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
						                                    <option value='<?php echo $value->tipe_penilaian ?>' <?php echo ($value->tipe_penilaian==$txn_tanah['tata_lingkungan']) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Resiko Banjir</span></td>
						                              <td>
						                                 <select class='form-control table_input input_149_' id='textbox_tanah_48' name='update[tanah_48]' data-id-field='149' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_kejadian as $key => $value) { ?>
						                                    <option value='<?php echo $value->tipe_kejadian ?>' <?php echo ($value->tipe_kejadian==$txn_tanah['resiko_banjir']) ? "selected":"" ?>><?php echo $value->tipe_kejadian ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                        </table>
						                     </div>
						                     <div class="col-md-6" style="padding: 0px;">
						                        <table class="table table_border">
						                           <colgroup>
						                              <col style="width: 40%">
						                           </colgroup>
						                           <tr>
						                              <td><span>Letak / Posisi Tanah</span></td>
						                              <td>
						                                 <select class='form-control table_input input_150_' id='textbox_tanah_49' name='update[tanah_49]' data-id-field='150' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($tipe_posisi_tanah as $key => $value) { ?>
						                                    <option value='<?php echo $value->tipe_posisi_tanah ?>' <?php echo ($value->tipe_posisi_tanah==$txn_tanah['posisi_tanah']) ? "selected":"" ?>><?php echo $value->tipe_posisi_tanah ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Tinggi Tanah (terhadap jalan) (cm)</span></td>
						                              <td><input type='text' id='textbox_tanah_50' name='update[tanah_50]' class='form-control table_input input_151_ ' value='<?php echo $txn_tanah['tinggi_tanah'] ?>' data-id-field='151' data-keterangan=''></td>
						                           </tr>
						                           <tr>
						                              <td><span>Jalur / Ruang Areal SUTT - SUTET (cm)</span></td>
						                              <td>
						                                 <select class='form-control table_input input_152_' id='textbox_tanah_51' name='update[tanah_51]' data-id-field='152' data-keterangan=''>
						                                    <option selected='selected' disabled='disabled'>Select</option>
						                                    <?php foreach ($kehadiran as $key => $value) {?>
						                                    <option value='<?php echo $value->kehadiran ?>' <?php echo ($value->kehadiran==$txn_tanah['ruang_areal_sutet']) ? "selected":"" ?>><?php echo $value->kehadiran ?></option>
						                                    <?php } ?>
						                                 </select>
						                              </td>
						                           </tr>
						                           <tr>
						                              <td><span>Jarak obyek terhadap SUTT - SUTET (m)</span></td>
						                              <td><input type='text' id='textbox_tanah_52' name='update[tanah_52]' class='form-control table_input input_153_ ' value='<?php echo $txn_tanah['jarak_obyek_terhadap_sutet'] ?>' data-id-field='153' data-keterangan=''></td>
						                           </tr>
						                        </table>
						                     </div>
						                  </div>
						               </div>
						               <div class="panel panel-default">
						                  <div class="panel-heading">
						                     <h3 class="panel-title">D A T A&nbsp;&nbsp;&nbsp;L E G A L I T A S</h3>
						                  </div>
						                  <input type="hidden" id="total_data_legalitas">
						                  <div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
						                     <div class="table-responsive">
						                        <table id="table_data_legalitas_1" class="table table_border_2" width="100%" cellpadding="0" cellspacing="0">
						                        	<colgroup>
						                        		<col style="width: 100px">
						                        		<col style="width: 200px">
						                        		<col style="width: 200px">
						                        		<col style="width: 200px">
						                        		<col style="width: 200px">
						                        		<col style="width: 200px">
						                        		<col style="width: 200px">
						                        		<col style="width: 200px">
						                        	</colgroup>
						                           <thead>
						                              <tr>
						                                 <th rowspan="2">No</th>
						                                 <th rowspan="2">Jenis Sertifikat</th>
						                                 <th rowspan="2">Nomor Sertifikat</th>
						                                 <th rowspan="2">Atas Nama</th>
						                                 <th colspan="2">Tanggal Sertifikat</th>
						                                 <th colspan="2">
						                                    <select class='form-control table_input input_895_' id='textbox_tanah_87' name='update[tanah_87]' data-id-field='895' data-keterangan=''>
						                                       <option selected='selected' disabled='disabled'>Select</option>
						                                       <option value='Gambar Situasi'>Gambar Situasi</option>
						                                       <option value='Surat Ukur' selected='selected'>Surat Ukur</option>
						                                    </select>
						                                 </th>
						                                 <th rowspan="2">Luas Tanah (m<sup>2</sup>)</th>
						                                 <th rowspan="2"></th>
						                              </tr>
						                              <tr>
						                                 <th>Terbit</th>
						                                 <th>Berakhir</th>
						                                 <th>Nomor</th>
						                                 <th>Tgl-Bln-Thn</th>
						                              </tr>
						                           </thead>
						                           <tbody id="tbody_data_legalitas_1">
						                           </tbody>
						                           <tfoot>
						                              <tr>
						                                 <td align="center" colspan="8"><span>TOTAL LUAS TANAH SESUAI SERTIFIKAT</span></td>
						                                 <td><input type='text' id='textbox_tanah_61' name='update[tanah_61]' class='form-control table_input input_162_ ' value='<?php echo $txn_tanah['luas_tanah_pada_sertifikat'] ?>' data-id-field='162' data-keterangan=''></td>
						                                 <td></td>
						                              </tr>
						                           </tfoot>
						                        </table>
						                     </div>
						                     <br> 
						                     <button type="button" class="btn btn-primary btn-sm btn-data-legalitas" data-type="tambah" data-id="">TAMBAH</button>
						                     <table class="table table_border_2" id="" cellpadding="0" cellspacing="0" style="margin-top: 10px;">
						                        <tbody>
						                           <td colspan="2"><span> INFORMASI DINAS TATA KOTA TENTANG RENCANA PEMBANGUNAN / PELEBARAN JALAN  :</span></td>
						                        </tbody>
						                        <tfoot>
						                           <tr>
						                              <td align="center"><span>Total luas tanah yang terpotong (rencana pembangunan / pelebaran jalan)</span></td>
						                              <td><input type='text' id='textbox_tanah_62' name='update[tanah_62]' class='form-control table_input input_241_ ' value='<?php echo $txn_tanah['luas_tanah_terpotong'] ?>' data-id-field='241' data-keterangan=''></td>
						                           </tr>
						                        </tfoot>
						                     </table>
						                  </div>
						               </div>
						                     <br>
						               <div class="panel panel-default">
						                  <div class="panel-heading">
						                     <h3 class="panel-title">K E S I M P U L A N&nbsp;&nbsp;&nbsp;N I L A I&nbsp;&nbsp;&nbsp;T A N A H</h3>
						                  </div>
						                  <div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
						                     <div class="col-md-6" style="padding: 0px;">
						                        <table class="table table_border" cellpadding="0" cellspacing="0">
						                           <thead>
						                              <tr>
						                                 <th colspan="2">INFORMASI NJOP TANAH</th>
						                              </tr>
						                           </thead>
						                           <tbody>
						                              <tr>
						                                 <td><span>NJOP Tanggal</span></td>
						                                 <td>
						                                    <input type='text' id='textbox_tanah_63' name='update[tanah_63]' class='form-control table_input' value='<?php echo $txn_tanah['tanggal_njop'] ?>' data-id-field='242' data-date-format='dd-mm-yyyy' data-date-autoclose='true' data-keterangan=''>
						                                    <script>
						                                       $('#textbox_tanah_63').datepicker();
						                                    </script>
						                                 </td>
						                              </tr>
						                              <tr>
						                                 <td><span>Tanah ( / m<sup>2</sup> )</span></td>
						                                 <td><input type='text' id='textbox_tanah_64' name='update[tanah_64]' class='form-control table_input input_243_ ' value='<?php echo $txn_tanah['luas_tanah'] ?>' data-id-field='243' data-keterangan=''></td>
						                              </tr>
						                           </tbody>
						                        </table>
						                     </div>
						                     <div class="col-md-6" style="padding: 0px;">
						                        <table class="table table_border" cellpadding="0" cellspacing="0">
						                           <thead>
						                              <tr>
						                                 <th colspan="2">BERDASARKAN FISIK</th>
						                              </tr>
						                           </thead>
						                           <tbody>
						                              <tr>
						                                 <td><span>NILAI PASAR</span></td>
						                                 <td><input type='text' id='textbox_tanah_65' name='update[tanah_65]' class='form-control table_input input_244_ ' value='<?php echo $txn_tanah['nilai_pasar'] ?>' data-id-field='244' data-keterangan=''></td>
						                              </tr>
						                              <tr>
						                                 <td><span>INDIKASI NILAI LIKUIDASI</span></td>
						                                 <td><input type='text' id='textbox_tanah_66' name='update[tanah_66]' class='form-control table_input input_245_ ' value='<?php echo $txn_tanah['nilai_likuidasi'] ?>' data-id-field='245' data-keterangan=''></td>
						                              </tr>
						                           </tbody>
						                        </table>
						                     </div>
						                  </div>
						               </div>
						               <div class="panel panel-default">
						                  <div class="panel-heading">
						                     <h3 class="panel-title">C A T A T A N&nbsp;&nbsp;&nbsp;P E N I L A I</h3>
						                  </div>
						                  <div class="panel-body" style="border: 1px solid #e1e1e1; border-top: 0px;">
						                     <textarea id='textbox_tanah_67' name='update[tanah_67]' class='form-control table_input input_246_' data-id-field='246' data-keterangan=''><?php echo $txn_tanah['catatan_penilai'] ?></textarea>										
						                  </div>
						               </div>
						            </div>
						         </div>
						      </div>
						   </div>
						</div>

						<?php 
							$i = 1;
							foreach ($list_bangunan as $id_bangunan => $item_bangunan)
							{
								$role	= str_replace(" ", "_", $id_bangunan);
						?>

						<div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="<?php echo $role ?>">
							<h4>Penilaian Bangunan 1</h4>

							<div id="tab_Bangunan_1">
							   <ul class="nav nav-tabs" role="tablist">
							      <li role="presentation" class="">
							         <a aria-expanded="false" href="#bangunan_bangunan_Bangunan_1" class="panel-bangunan_bangunan active" aria-controls="bangunan_bangunan" role="tab" data-toggle="tab" data-type="">Form Bangunan</a>
							      </li>
							   </ul>
							   <div class="tab-content" style="padding: 20px; border: 1px solid #eee;">
							      <div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="bangunan_bangunan_Bangunan_1">
							         <div class='panel '>
							            <div class='panel-heading'>
							               <h3 class='panel-title'>O B Y E K&nbsp;&nbsp;&nbsp;P E N I L A I A N</h3>
							            </div>
							            <div class='panel-body' style='border: 1px solid #e1e1e1; border-top: 0px;'>
							            	<table class="table">
							            		<colgroup>
							            			<col style="width: 30%">
							            			<col style="width: 20px">
							            		</colgroup>
							            		<tbody>
							            			<tr>
							            				<td>Tanggal Inspeksi</td>
							            				<td>:</td>
							            				<td><?php echo date("d-m-Y", strtotime($tanggal_inspeksi)) ?></td>
							            			</tr>
							            			<tr>
							            				<td colspan="3"><strong><?php echo $pekerjaan->nama_klien ?></strong></td>
							            			</tr>
							            			<tr>
							            				<td>Alamat Objek</td>
							            				<td>:</td>
							            				<td>
							            					<?php 
							            					echo $lokasi->alamat." ".(!empty($lokasi->gang) ? "Gang ".$lokasi->gang : "")." No. ".$lokasi->nomor.", RT. ".$lokasi->rt." RW. ".$lokasi->rw." ".$lokasi->nama_desa." ".(!empty($lokasi->dh_desa) ? "(d/h ".$lokasi->dh_desa.")" : "")." ".$lokasi->nama_kecamatan." ".(!empty($lokasi->dh_kecamatan) ? "(d/h ".$lokasi->dh_kecamatan.")" : "")." ".$lokasi->nama_kota." ".(!empty($lokasi->dh_kota) ? "(d/h ".$lokasi->dh_kota.")" : "").", ".$lokasi->nama_provinsi ." ".(!empty($lokasi->dh_provinsi) ? "(d/h ".$lokasi->dh_provinsi.")" : "") ?></td>
							            			</tr>
							            		</tbody>
							            	</table>

							            </div>
							            <br>
							            <div class='panel-heading'>
							               <h3 class='panel-title'>LUAS PENGUKURAN FISIK BANGUNAN <span class='tipe_bangunan'></span></h3>
							            </div>
							            <div class='panel-body' style='border: 1px solid #e1e1e1; border-top: 0px;'>
							               <div class='row'>
							                  <div class='col-lg-8' style='overflow-x: scroll;'>
							                     <table class='table table_border_2 table_bangunan Bangunan_1' cellpadding='0' cellspacing='0'>
							                        <thead>
							                           <tr>
							                              <th>Ruangan</th>
							                              <th><a style='cursor: pointer; color: #eee' class='change-ruang' data-id='1' data-bangunan='Bangunan_1' >Ruang 1</a></th>
							                              <th><a style='cursor: pointer; color: #eee' class='change-ruang' data-id='2' data-bangunan='Bangunan_1' >Ruang 2</a></th>
							                              <th>Jumlah Luas<br>&nbsp;</th>
							                           </tr>
							                        </thead>
							                        <tbody>
							                           <tr>
							                              <td><span>Basement</span></td>
							                              <td><input type='text' id='textbox_bangunan_3' name='update[bangunan_3]' class='form-control table_input input_637_Bangunan_1__1__1 Bangunan_1 Bangunan_1__1__1 Bangunan_1' value='10' data-id-field='637' data-keterangan='Bangunan_1__1__1 Bangunan_1'></td>
							                              <td><input type='text' id='textbox_bangunan_3' name='update[bangunan_3]' class='form-control table_input input_637_Bangunan_1__1__2 Bangunan_1 Bangunan_1__1__2 Bangunan_1' value='91919' data-id-field='637' data-keterangan='Bangunan_1__1__2 Bangunan_1'></td>
							                              <td><input type='text' id='textbox_bangunan_3' name='update[bangunan_3]' class='form-control table_input input_637_Bangunan_1__1__3 Bangunan_1__1__3' value='91929' data-id-field='637' data-keterangan='Bangunan_1__1__3'></td>
							                           </tr>
							                           <tr>
							                              <td><span>Lantai 1</span></td>
							                              <td><input type='text' id='textbox_bangunan_3' name='update[bangunan_3]' class='form-control table_input input_637_Bangunan_1__2__1 Bangunan_1 Bangunan_1__2__1 Bangunan_1' value='47' data-id-field='637' data-keterangan='Bangunan_1__2__1 Bangunan_1'></td>
							                              <td><input type='text' id='textbox_bangunan_3' name='update[bangunan_3]' class='form-control table_input input_637_Bangunan_1__2__2 Bangunan_1 Bangunan_1__2__2 Bangunan_1' value='334' data-id-field='637' data-keterangan='Bangunan_1__2__2 Bangunan_1'></td>
							                              <td><input type='text' id='textbox_bangunan_3' name='update[bangunan_3]' class='form-control table_input input_637_Bangunan_1__2__3 Bangunan_1__2__3' value='381' data-id-field='637' data-keterangan='Bangunan_1__2__3'></td>
							                           </tr>
							                           <tr>
							                              <td><span>Lantai 2</span></td>
							                              <td><input type='text' id='textbox_bangunan_3' name='update[bangunan_3]' class='form-control table_input input_637_Bangunan_1__3__1 Bangunan_1 Bangunan_1__3__1 Bangunan_1' value='47' data-id-field='637' data-keterangan='Bangunan_1__3__1 Bangunan_1'></td>
							                              <td><input type='text' id='textbox_bangunan_3' name='update[bangunan_3]' class='form-control table_input input_637_Bangunan_1__3__2 Bangunan_1 Bangunan_1__3__2 Bangunan_1' value='2333' data-id-field='637' data-keterangan='Bangunan_1__3__2 Bangunan_1'></td>
							                              <td><input type='text' id='textbox_bangunan_3' name='update[bangunan_3]' class='form-control table_input input_637_Bangunan_1__3__3 Bangunan_1__3__3' value='2380' data-id-field='637' data-keterangan='Bangunan_1__3__3'></td>
							                           </tr>
							                        </tbody>
							                        <thead>
							                           <tr>
							                              <th colspan='3'>TOTAL LUAS PENGUKURAN FISIK BANGUNAN UTAMA <span class='tipe_bangunan'></span></th>
							                              <th><input type='text' id='textbox_bangunan_511' name='update[bangunan_511]' class='form-control table_input input_639_Bangunan_1 Bangunan_1' value='94690' data-id-field='639' data-keterangan='Bangunan_1'></th>
							                           </tr>
							                        </thead>
							                     </table>
							                  </div>
							                  <div class='col-lg-1'>
							                     <table class='table table_border_2 teras_1' cellpadding='0' cellspacing='0' style='text-align: center'>
							                        <thead>
							                           <tr>
							                              <th>Teras<br>Balkon(m<sup>2</sup>)</th>
							                           </tr>
							                        </thead>
							                        <tr>
							                           <td align='center'><input type='text' id='textbox_bangunan_113' name='update[bangunan_113]' class='form-control table_input input_747_Bangunan_1__1 Bangunan_1 Bangunan_1__1 Bangunan_1' value='1123' data-id-field='747' data-keterangan='Bangunan_1__1 Bangunan_1'></td>
							                        </tr>
							                        <tr>
							                           <td align='center'><input type='text' id='textbox_bangunan_113' name='update[bangunan_113]' class='form-control table_input input_747_Bangunan_1__2 Bangunan_1 Bangunan_1__2 Bangunan_1' value='7' data-id-field='747' data-keterangan='Bangunan_1__2 Bangunan_1'></td>
							                        </tr>
							                        <tr>
							                           <td align='center'><input type='text' id='textbox_bangunan_113' name='update[bangunan_113]' class='form-control table_input input_747_Bangunan_1__3 Bangunan_1 Bangunan_1__3 Bangunan_1' value='7' data-id-field='747' data-keterangan='Bangunan_1__3 Bangunan_1'></td>
							                        </tr>
							                        <thead>
							                           <tr>
							                              <th><input type='text' id='textbox_bangunan_113' name='update[bangunan_113]' class='form-control table_input input_747_Bangunan_1__4 Bangunan_1 Bangunan_1__4 Bangunan_1' value='' data-id-field='747' data-keterangan='Bangunan_1__4 Bangunan_1'></th>
							                           </tr>
							                        </thead>
							                     </table>
							                  </div>
							               </div>
							            </div>
							            <br><br>
							            <button type='button' class='btn btn-primary btn-sm btn-tambah-lantai' data-bangunan='Bangunan_1'>Tambah Lantai</button>
							            <button type='button' class='btn btn-primary btn-sm btn-tambah-ruangan' data-bangunan='Bangunan_1'>Tambah Ruangan</button>
							            <br>
							            <br>
							         </div>
							      </div>
							      <div class='panel-body' style='border: 1px solid #e1e1e1;'>
							         <h4>INFORMASI DINAS TATAKOTA <span class='div-provinsi' style=''></span></h4>
							         <p style='font-weight: bold;'>Ijin Mendirikan Bangunan (IMB)</p>
							         <div class='col-lg-4' style='padding: 0px;'>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='15%'><span>Nomor</span></td>
							                  <td><input type='text' id='textbox_bangunan_6' name='update[bangunan_6]' class='form-control table_input input_640_Bangunan_1 Bangunan_1' value='' data-id-field='640' data-keterangan='Bangunan_1'></td>
							               </tr>
							               <tr>
							                  <td width='15%'><span>Tanggal</span></td>
							                  <td>
							                     <input type='text' id='textbox_bangunan_8' name='update[bangunan_8]' class='form-control table_input' value='' data-id-field='642' data-date-format='dd-mm-yyyy' data-date-autoclose='true' data-keterangan='Bangunan_1'>
							                     <script>
							                        $('#textbox_bangunan_8').datepicker();
							                     </script>
							                  </td>
							               </tr>
							            </table>
							         </div>
							         <div class='col-lg-4' style='padding: 0px;'>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='15%'><span>Jumlah Lantai</span></td>
							                  <td><input type='text' id='textbox_bangunan_7' name='update[bangunan_7]' class='form-control table_input input_641_Bangunan_1 Bangunan_1' value='2' data-id-field='641' data-keterangan='Bangunan_1'></td>
							               </tr>
							               <tr>
							                  <td width='15%'><span>Total Luas IMB (m<sup>2</sup>)</span></td>
							                  <td><input type='text' id='textbox_bangunan_9' name='update[bangunan_9]' class='form-control table_input input_643_Bangunan_1 Bangunan_1' value='20' data-id-field='643' data-keterangan='Bangunan_1'></td>
							               </tr>
							            </table>
							         </div>
							         <div class='col-lg-4' style='padding: 0px;'>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='15%'><span>Perbedaan Luas Fisik dengan <br>Luas IMB (m<sup>2</sup>)</span></td>
							                  <td><input type='text' id='textbox_bangunan_10' name='update[bangunan_10]' class='form-control table_input input_644_Bangunan_1 Bangunan_1' value='NaN' data-id-field='644' data-keterangan='Bangunan_1'></td>
							               </tr>
							            </table>
							         </div>
							      </div>
						                     <br>
							      <div class='panel-body' style='border: 1px solid #e1e1e1;'>
							         <p style='font-weight: bold;'>Pemotongan luas bangunan karena melanggar peraturan / ketentuan dan rencana tata ruang yang berlaku, adalah sbb :</p>
							         <div class='col-lg-6' style='padding: 0px;'>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='20%'><span>Melanggar Ketinggian Bangunan</span></td>
							                  <td><input type='text' id='textbox_bangunan_16' name='update[bangunan_16]' class='form-control table_input input_650_Bangunan_1 Bangunan_1' value='0' data-id-field='650' data-keterangan='Bangunan_1'></td>
							               </tr>
							               <tr>
							                  <td width='20%'><span>Pembangunan / pelebaran jalan</span></td>
							                  <td><input type='text' id='textbox_bangunan_17' name='update[bangunan_17]' class='form-control table_input input_651_Bangunan_1 Bangunan_1' value='0' data-id-field='651' data-keterangan='Bangunan_1'></td>
							               </tr>
							            </table>
							         </div>
							            <br>
							         <div class='col-lg-6' style='padding: 0px;'>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='15%'><span>Garis Sempadan Bangunan (GSB)</span></td>
							                  <td><input type='text' id='textbox_bangunan_18' name='update[bangunan_18]' class='form-control table_input input_652_Bangunan_1 Bangunan_1' value='0' data-id-field='652' data-keterangan='Bangunan_1'></td>
							               </tr>
							               <tr>
							                  <td width='15%'><span>Garis Sempadan Sungai (GSS)</span></td>
							                  <td><input type='text' id='textbox_bangunan_19' name='update[bangunan_19]' class='form-control table_input input_653_Bangunan_1 Bangunan_1' value='0' data-id-field='653' data-keterangan='Bangunan_1'></td>
							               </tr>
							               <tr>
							                  <td width='15%'><span><b>TOTAL LUAS BANGUNAN YANG TERPOTONG</b></span></td>
							                  <td><input type='text' id='textbox_bangunan_20' name='update[bangunan_20]' class='form-control table_input input_654_Bangunan_1 Bangunan_1' value='0' data-id-field='654' data-keterangan='Bangunan_1'></td>
							               </tr>
							            </table>
							         </div>
							      </div>
							            <br>
							      <div class='panel-body' style='border: 1px solid #e1e1e1;'>
							         <h4>KETERANGAN UMUM BANGUNAN</h4>
							         <div class='col-lg-6' style='padding: 0px;'>
							            <p style='font-weight: bold;'>&nbsp;</p>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='20%'><span>Arsitektur bangunan</span></td>
							                  <td colspan='3'>
							                     <select class='form-control table_input input_655_Bangunan_1' id='textbox_bangunan_21' name='update[bangunan_21]' data-id-field='655' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Bentuk bangunan standar' selected='selected'>Bentuk bangunan standar</option>
							                        <option value=' Bentuk bangunan minimalis'> Bentuk bangunan minimalis</option>
							                        <option value=' Bentuk bangunan modern'> Bentuk bangunan modern</option>
							                        <option value=' Bentuk bangunan klasik'> Bentuk bangunan klasik</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='20%'><span>Lebar depan / Frontage</span></td>
							                  <td><input type='text' id='textbox_bangunan_129' name='update[bangunan_129]' class='form-control table_input input_910_Bangunan_1 Bangunan_1' value='4.5' data-id-field='910' data-keterangan='Bangunan_1'></td>
							                  <td width='10%'><span>& Pjg.</span></td>
							                  <td><input type='text' id='textbox_bangunan_183' name='update[bangunan_183]' class='form-control table_input input_911_Bangunan_1 Bangunan_1' value='10.44' data-id-field='911' data-keterangan='Bangunan_1'></td>
							               </tr>
							               <tr>
							                  <td width='20%'><span>Tahun dibangun</span></td>
							                  <td colspan='3'><input type='text' id='textbox_bangunan_22' name='update[bangunan_22]' class='form-control table_input input_656_Bangunan_1 Bangunan_1' value='2010' data-id-field='656' data-keterangan='Bangunan_1'></td>
							               </tr>
							               <tr>
							                  <td width='20%'><span>Tahun direnovasi</span></td>
							                  <td colspan='3'><input type='text' id='textbox_bangunan_23' name='update[bangunan_23]' class='form-control table_input input_657_Bangunan_1 Bangunan_1' value='2010' data-id-field='657' data-keterangan='Bangunan_1'></td>
							               </tr>
							            </table>
							         </div>
							         <div class='col-lg-6' style='padding: 0px;'>
							            <p style='font-weight: bold;'>Tinggi halaman, terhadap</p>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='20'><span>Lantai bangunan utama</span></td>
							                  <td><input type='text' id='textbox_bangunan_24' name='update[bangunan_24]' class='form-control table_input input_658_Bangunan_1 Bangunan_1' value='2' data-id-field='658' data-keterangan='Bangunan_1'></td>
							               </tr>
							               <tr>
							                  <td width='20%'><span>Lebar jalan di depan properti</span></td>
							                  <td><input type='text' id='textbox_bangunan_25' name='update[bangunan_25]' class='form-control table_input input_659_Bangunan_1 Bangunan_1' value='10' data-id-field='659' data-keterangan='Bangunan_1'></td>
							               </tr>
							            </table>
							         </div>
							      </div>
							            <br>
							      <div class='panel-body' style='border: 1px solid #e1e1e1;'>
							         <h4>SPESIFIKASI ELEMEN BANGUNAN</h4>
							         <div class='col-lg-6' style='padding: 0px;'>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='25%'><span>Pondasi</span></td>
							                  <td>
							                     <select class='form-control table_input input_660_Bangunan_1' id='textbox_bangunan_26' name='update[bangunan_26]' data-id-field='660' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Beton'>Beton</option>
							                        <option value='Batu kali'>Batu kali</option>
							                        <option value='Umpak'>Umpak</option>
							                        <option value='Roolag bata'>Roolag bata</option>
							                        <option value='Tiang pancang'>Tiang pancang</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Struktur</span></td>
							                  <td>
							                     <select class='form-control table_input input_661_Bangunan_1' id='textbox_bangunan_27' name='update[bangunan_27]' data-id-field='661' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Beton bertulang'>Beton bertulang</option>
							                        <option value='Kayu kelas I'>Kayu kelas I</option>
							                        <option value=' Kayu kelas II'> Kayu kelas II</option>
							                        <option value='Baja'>Baja</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Rangka Atap</span></td>
							                  <td>
							                     <select class='form-control table_input input_662_Bangunan_1' id='textbox_bangunan_28' name='update[bangunan_28]' data-id-field='662' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Beton bertulang'>Beton bertulang</option>
							                        <option value='Kayu kelas I'>Kayu kelas I</option>
							                        <option value=' Kayu kelas II'> Kayu kelas II</option>
							                        <option value='Baja ringan'>Baja ringan</option>
							                        <option value='Rangka kayu'>Rangka kayu</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Penutup Atap</span></td>
							                  <td>
							                     <select class='form-control table_input input_663_Bangunan_1' id='textbox_bangunan_29' name='update[bangunan_29]' data-id-field='663' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Asbes'>Asbes</option>
							                        <option value='Dak beton'>Dak beton</option>
							                        <option value='Fibreglass'>Fibreglass</option>
							                        <option value=' Genteng tanah liat'> Genteng tanah liat</option>
							                        <option value=' Genteng glazur'> Genteng glazur</option>
							                        <option value='Genteng keramik'>Genteng keramik</option>
							                        <option value='Genteng kodok'>Genteng kodok</option>
							                        <option value='Genteng metal'>Genteng metal</option>
							                        <option value='Genteng beton'>Genteng beton</option>
							                        <option value='Genteng tegola'>Genteng tegola</option>
							                        <option value='Pelat fiber semen harflex'>Pelat fiber semen harflex</option>
							                        <option value='Seng gelombang'>Seng gelombang</option>
							                        <option value='Sirap'>Sirap</option>
							                        <option value='Spandex'>Spandex</option>
							                        <option value=' Galvalum / zincalum'> Galvalum / zincalum</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Plafond</span></td>
							                  <td>
							                     <select class='form-control table_input input_664_Bangunan_1' id='textbox_bangunan_30' name='update[bangunan_30]' data-id-field='664' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Akustik'>Akustik</option>
							                        <option value='Almunium (lambersering)'>Almunium (lambersering)</option>
							                        <option value='Asbes'>Asbes</option>
							                        <option value='Beton ekspos dicat'>Beton ekspos dicat</option>
							                        <option value='Bondek'>Bondek</option>
							                        <option value='Gypsumboard'>Gypsumboard</option>
							                        <option value='Plywood'>Plywood</option>
							                        <option value='Teakwood'>Teakwood</option>
							                        <option value='Tripleks'>Tripleks</option>
							                        <option value='Tanpa plafond'>Tanpa plafond</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Dinding</span></td>
							                  <td>
							                     <select class='form-control table_input input_665_Bangunan_1' id='textbox_bangunan_31' name='update[bangunan_31]' data-id-field='665' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Batu bata'>Batu bata</option>
							                        <option value='Habel'>Habel</option>
							                        <option value='Batako'>Batako</option>
							                        <option value='Celcon'>Celcon</option>
							                        <option value='Papan'>Papan</option>
							                        <option value='Gypsumboard'>Gypsumboard</option>
							                        <option value='Anyaman bambu'>Anyaman bambu</option>
							                        <option value='Seng'>Seng</option>
							                        <option value='Spandex'>Spandex</option>
							                        <option value='Tanpa dinding'>Tanpa dinding</option>
							                     </select>
							                  </td>
							               </tr>
							            </table>
							         </div>
							         <div class='col-lg-6' style='padding: 0px;'>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='20'><span>Partisi Ruangan</span></td>
							                  <td>
							                     <select class='form-control table_input input_666_Bangunan_1' id='textbox_bangunan_32' name='update[bangunan_32]' data-id-field='666' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Gypsum'>Gypsum</option>
							                        <option value='Triplek'>Triplek</option>
							                        <option value='Batu bata'>Batu bata</option>
							                        <option value='Seng'>Seng</option>
							                        <option value='Spandex'>Spandex</option>
							                        <option value='Tanpa partisi'>Tanpa partisi</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Kusen</span></td>
							                  <td>
							                     <select class='form-control table_input input_667_Bangunan_1' id='textbox_bangunan_33' name='update[bangunan_33]' data-id-field='667' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Kayu diplitur'>Kayu diplitur</option>
							                        <option value='Kayu dicat halus'>Kayu dicat halus</option>
							                        <option value='Kayu dicat sedang'>Kayu dicat sedang</option>
							                        <option value='Kayu dicat kasar'>Kayu dicat kasar</option>
							                        <option value='Kayu tanpa cat / plitur'>Kayu tanpa cat / plitur</option>
							                        <option value='Almunium'>Almunium</option>
							                        <option value='Tanpa kusen'>Tanpa kusen</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Pintu & Jendela</span></td>
							                  <td>
							                     <select class='form-control table_input input_668_Bangunan_1' id='textbox_bangunan_34' name='update[bangunan_34]' data-id-field='668' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Pintu & jendela kaca rayband'>Pintu & jendela kaca rayband</option>
							                        <option value='Pintu & jendela kaca bening'>Pintu & jendela kaca bening</option>
							                        <option value='Pintu & jendela kaca es'>Pintu & jendela kaca es</option>
							                        <option value='Pintu plywood'>Pintu plywood</option>
							                        <option value='Almunium'>Almunium</option>
							                        <option value='Pintu besi / baja'>Pintu besi / baja</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Lantai</span></td>
							                  <td>
							                     <select class='form-control table_input input_669_Bangunan_1' id='textbox_bangunan_35' name='update[bangunan_35]' data-id-field='669' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Granit lokal'>Granit lokal</option>
							                        <option value='Granit impor'>Granit impor</option>
							                        <option value='Karpet lokal'>Karpet lokal</option>
							                        <option value='Karpet impor'>Karpet impor</option>
							                        <option value='Keramik lokal'>Keramik lokal</option>
							                        <option value='Keramik impor'>Keramik impor</option>
							                        <option value='Marmer lokal'>Marmer lokal</option>
							                        <option value='Marmer impor'>Marmer impor</option>
							                        <option value='Mozaik'>Mozaik</option>
							                        <option value='Porselin'>Porselin</option>
							                        <option value='Rabat beton (semen ekspose)'>Rabat beton (semen ekspose)</option>
							                        <option value='Ubin kayu impor'>Ubin kayu impor</option>
							                        <option value='Papan'>Papan</option>
							                        <option value='Ubin PC'>Ubin PC</option>
							                        <option value='Ubin teraso'>Ubin teraso</option>
							                        <option value='Vynil'>Vynil</option>
							                        <option value='Tanpa lantai'>Tanpa lantai</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Tangga</span></td>
							                  <td>
							                     <select class='form-control table_input input_670_Bangunan_1' id='textbox_bangunan_36' name='update[bangunan_36]' data-id-field='670' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Beton railing besi'>Beton railing besi</option>
							                        <option value='Beton railing kayu'>Beton railing kayu</option>
							                        <option value='Beton railing besi SS'>Beton railing besi SS</option>
							                        <option value='Beton tanpa railing'>Beton tanpa railing</option>
							                        <option value='Plat besi'>Plat besi</option>
							                        <option value='Kayu'>Kayu</option>
							                        <option value='Tanpa tangga'>Tanpa tangga</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Pagar Halaman</span></td>
							                  <td>
							                     <select class='form-control table_input input_671_Bangunan_1' id='textbox_bangunan_37' name='update[bangunan_37]' data-id-field='671' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Besi'>Besi</option>
							                        <option value='Besi tempa'>Besi tempa</option>
							                        <option value='Batu bata'>Batu bata</option>
							                        <option value='BRC / Wiremesh'>BRC / Wiremesh</option>
							                        <option value='Panel beton'>Panel beton</option>
							                        <option value='Alumunium'>Alumunium</option>
							                        <option value='Tanpa pagar'>Tanpa pagar</option>
							                     </select>
							                  </td>
							               </tr>
							            </table>
							         </div>
							      </div>
						            <br>
							      <div class='panel-body' style='border: 1px solid #e1e1e1;'>
							         <h4>FASILITAS / SARANA PELENGKAP KESELURUHAN PADA AREAL PROPERTI</h4>
							         <div class='col-lg-6' style='padding: 0px;'>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='25%'><span>Saluran listrik PLN</span></td>
							                  <td colspan='2'><input type='text' id='textbox_bangunan_38' name='update[bangunan_38]' class='form-control table_input input_672_Bangunan_1 Bangunan_1' value='' data-id-field='672' data-keterangan='Bangunan_1'></td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Sambungan telepon</span></td>
							                  <td colspan='2'>
							                     <select class='form-control table_input input_673_Bangunan_1' id='textbox_bangunan_39' name='update[bangunan_39]' data-id-field='673' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Tidak ada'>Tidak ada</option>
							                        <option value='1'>1</option>
							                        <option value='2'>2</option>
							                        <option value='3'>3</option>
							                        <option value='4'>4</option>
							                        <option value='5'>5</option>
							                        <option value='6'>6</option>
							                        <option value='7'>7</option>
							                        <option value='8'>8</option>
							                        <option value='9'>9</option>
							                        <option value='10'>10</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Jaringan air bersih</span></td>
							                  <td colspan='2'>
							                     <select class='form-control table_input input_674_Bangunan_1' id='textbox_bangunan_40' name='update[bangunan_40]' data-id-field='674' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Sumur bor / pantek'>Sumur bor / pantek</option>
							                        <option value='PDAM'>PDAM</option>
							                        <option value='PDAM & sumur bor / pantek'>PDAM & sumur bor / pantek</option>
							                        <option value='Artesis'>Artesis</option>
							                        <option value='Tidak ada'>Tidak ada</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Pendingin ruangan</span></td>
							                  <td>
							                     <select class='form-control table_input input_675_Bangunan_1' id='textbox_bangunan_41' name='update[bangunan_41]' data-id-field='675' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Tidak ada'>Tidak ada</option>
							                        <option value='1'>1</option>
							                        <option value='2'>2</option>
							                        <option value='3'>3</option>
							                        <option value='4'>4</option>
							                        <option value='5'>5</option>
							                        <option value='6'>6</option>
							                        <option value='7'>7</option>
							                        <option value='8'>8</option>
							                        <option value='9'>9</option>
							                        <option value='10'>10</option>
							                        <option value='11'>11</option>
							                        <option value='12'>12</option>
							                        <option value='13'>13</option>
							                        <option value='14'>14</option>
							                        <option value='15'>15</option>
							                        <option value='16'>16</option>
							                        <option value='17'>17</option>
							                        <option value='18'>18</option>
							                        <option value='19'>19</option>
							                        <option value='20'>20</option>
							                     </select>
							                  </td>
							                  <td>
							                     <select class='form-control table_input input_676_Bangunan_1' id='textbox_bangunan_42' name='update[bangunan_42]' data-id-field='676' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='tipe split'>tipe split</option>
							                        <option value='tipe window'>tipe window</option>
							                        <option value='tipe cassette'>tipe cassette</option>
							                        <option value='tipe spilt & window'>tipe spilt & window</option>
							                        <option value='tipe spilt & cassette'>tipe spilt & cassette</option>
							                     </select>
							                  </td>
							               </tr>
							            </table>
							         </div>
							         <div class='col-lg-6' style='padding: 0px;'>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='25%'><span>Pemanas air</span></td>
							                  <td>
							                     <select class='form-control table_input input_677_Bangunan_1' id='textbox_bangunan_43' name='update[bangunan_43]' data-id-field='677' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Ada'>Ada</option>
							                        <option value='Tidak ada'>Tidak ada</option>
							                     </select>
							                  </td>
							                  <td>
							                     <select class='form-control table_input input_678_Bangunan_1' id='textbox_bangunan_44' name='update[bangunan_44]' data-id-field='678' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Electric Water Heater'>Electric Water Heater</option>
							                        <option value='Solar Water Heater'>Solar Water Heater</option>
							                        <option value='Gas Water Heater'>Gas Water Heater</option>
							                        <option value='Aircon Water Heater'>Aircon Water Heater</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Penangkal petir</span></td>
							                  <td colspan='2'>
							                     <select class='form-control table_input input_679_Bangunan_1' id='textbox_bangunan_45' name='update[bangunan_45]' data-id-field='679' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Ada'>Ada</option>
							                        <option value='Tidak ada'>Tidak ada</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Area parkir</span></td>
							                  <td colspan='2'>
							                     <select class='form-control table_input input_681_Bangunan_1' id='textbox_bangunan_47' name='update[bangunan_47]' data-id-field='681' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Ada'>Ada</option>
							                        <option value='Tidak ada'>Tidak ada</option>
							                     </select>
							                  </td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>Security parking</span></td>
							                  <td colspan='2'>
							                     <select class='form-control table_input input_683_Bangunan_1' id='textbox_bangunan_49' name='update[bangunan_49]' data-id-field='683' data-keterangan='Bangunan_1'>
							                        <option selected='selected' disabled='disabled'>Select</option>
							                        <option value='Ada'>Ada</option>
							                        <option value='Tidak ada'>Tidak ada</option>
							                     </select>
							                  </td>
							               </tr>
							            </table>
							         </div>
							      </div>
						            <br>
							      <div class='panel-body' style='border: 1px solid #e1e1e1;'>
							         <h4>KESIMPULAN NILAI BANGUNAN  <span class='tipe_bangunan'></span></h4>
							         <div class='col-lg-6' style='padding: 0px;'>
							            <table class='table table_border' cellpadding='0' cellspacing='0'>
							               <tr>
							                  <td width='25%'><span>NILAI PASAR</span></td>
							                  <td><input type='text' id='textbox_bangunan_55' name='update[bangunan_55]' class='form-control table_input input_689_Bangunan_1 Bangunan_1' value='1074485965' data-id-field='689' data-keterangan='Bangunan_1'></td>
							               </tr>
							               <tr>
							                  <td width='25%'><span>INDIKASI NILAI LIKUIDASI</span></td>
							                  <td><input type='text' id='textbox_bangunan_186' name='update[bangunan_186]' class='form-control table_input input_971_Bangunan_1 Bangunan_1' value='860000000' data-id-field='971' data-keterangan='Bangunan_1'></td>
							               </tr>
							            </table>
							            </table>
							         </div>
							      </div>
						            <br>
							      <div class='panel-body' style='border: 1px solid #e1e1e1;'>
							         <h4>C A T A T A N    P E N I L A I</h4>
							         <textarea id='textbox_bangunan_59' name='update[bangunan_59]' class='form-control table_input input_693_Bangunan_1' data-id-field='693' data-keterangan='Bangunan_1'>11111</textarea>
							      </div>
							   </div>
							</div>
						</div>
						<?php
								$i++;
							}
							
						?>

						<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="splengkap">
							<div class="table-responsive">
								<table class="table table_border_2 table_sarana" id="" cellpadding="0" cellspacing="0">
									<thead>
										<tr>
											<th colspan="7" style="background-color: #1680e9; color: #fff;">PERHITUNGAN SARANA PELENGKAP</th>
										</tr>
										<tr>
											<th>Unit Sarana Pelengkap</th>
											<th colspan="2">Ukuran / Jumlah</th>
											<th>Biaya Satuan</th>
											<th>BRB / RCN</th>
											<th>Dep.</th>
											<th>Nilai Pasar</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><span>Daya listrik PLN</span></td>
											<td colspan="2"><?=$input["sarana_1"];?></td>
											<td><?=$input["sarana_2"];?></td>
											<td><?=$input["sarana_3"];?></td>
											<td><?=$input["sarana_4"];?></td>
											<td style="text-align: right;"><?=$input["sarana_5"];?></td>
										</tr>
										<tr>
											<td><span>Jaringan telepon TELKOM</span></td>
											<td colspan="2"><?=$input["sarana_6"];?></td>
											<td><?=$input["sarana_8"];?></td>
											<td><?=$input["sarana_9"];?></td>
											<td><?=$input["sarana_10"];?></td>
											<td><?=$input["sarana_11"];?></td>
										</tr>
										<tr>
											<td><span>Jaringan air bersih PDAM</span></td>
											<td rowspan="3" style="background-color: #eee"><?=$input["sarana_12"];?></td>
											<td><?=$input["sarana_13"];?></td>
											<td><?=$input["sarana_14"];?></td>
											<td><?=$input["sarana_15"];?></td>
											<td><?=$input["sarana_16"];?></td>
											<td><?=$input["sarana_17"];?></td>
										</tr>
										<tr>
											<td><span>Sumur bor / pantek</span></td>
											<td><?=$input["sarana_18"];?></td>
											<td><?=$input["sarana_19"];?></td>
											<td><?=$input["sarana_20"];?></td>
											<td><?=$input["sarana_21"];?></td>
											<td><?=$input["sarana_22"];?></td>
										</tr>
										<tr>
											<td><span>Sumur dalam / artesis</span></td>
											<td><?=$input["sarana_23"];?></td>
											<td><?=$input["sarana_24"];?></td>
											<td><?=$input["sarana_25"];?></td>
											<td><?=$input["sarana_26"];?></td>
											<td><?=$input["sarana_27"];?></td>
										</tr>
										<tr>
											<td><span>Air Conditioner (AC)</span></td>
											<td><?=$input["sarana_28"];?></td>
											<td><?=$input["sarana_29"];?></td>
											<td><?=$input["sarana_30"];?></td>
											<td><?=$input["sarana_31"];?></td>
											<td><?=$input["sarana_32"];?></td>
											<td><?=$input["sarana_33"];?></td>
										</tr>

										<tr>
											<td><span>Carport</span></td>
											<td><?=$input["sarana_34"];?></td>
											<td><?=$input["sarana_35"];?></td>
											<td><?=$input["sarana_36"];?></td>
											<td><?=$input["sarana_37"];?></td>
											<td><?=$input["sarana_38"];?></td>
											<td><?=$input["sarana_39"];?></td>
										</tr>
										<tr>
											<td><span>Perkerasan</span></td>
											<td><?=$input["sarana_40"];?></td>
											<td><?=$input["sarana_41"];?></td>
											<td><?=$input["sarana_42"];?></td>
											<td><?=$input["sarana_43"];?></td>
											<td><?=$input["sarana_44"];?></td>
											<td><?=$input["sarana_45"];?></td>
										</tr>
										<tr>
											<td><span>Pintu Pagar</span></td>
											<td><?=$input["sarana_46"];?></td>
											<td><?=$input["sarana_47"];?></td>
											<td><?=$input["sarana_48"];?></td>
											<td><?=$input["sarana_49"];?></td>
											<td><?=$input["sarana_50"];?></td>
											<td><?=$input["sarana_51"];?></td>
										</tr>
										<tr>
											<td><span>Pagar halaman</span></td>
											<td><?=$input["sarana_52"];?></td>
											<td><?=$input["sarana_53"];?></td>
											<td><?=$input["sarana_54"];?></td>
											<td><?=$input["sarana_55"];?></td>
											<td><?=$input["sarana_56"];?></td>
											<td><?=$input["sarana_57"];?></td>
										</tr>
										<tr>
											<td><span>Pemanas air / water heater</span></td>
											<td><?=$input["sarana_58"];?></td>
											<td><?=$input["sarana_59"];?></td>
											<td><?=$input["sarana_60"];?></td>
											<td><?=$input["sarana_61"];?></td>
											<td><?=$input["sarana_62"];?></td>
											<td><?=$input["sarana_63"];?></td>
										</tr>
										<tr>
											<td><span>Penangkal petir</span></td>
											<td><?=$input["sarana_64"];?></td>
											<td><?=$input["sarana_65"];?></td>
											<td><?=$input["sarana_66"];?></td>
											<td><?=$input["sarana_67"];?></td>
											<td><?=$input["sarana_68"];?></td>
											<td><?=$input["sarana_69"];?></td>
										</tr>
										<tr>
											<td><span>Gapura</span></td>
											<td><?=$input["sarana_70"];?></td>
											<td><?=$input["sarana_71"];?></td>
											<td><?=$input["sarana_72"];?></td>
											<td><?=$input["sarana_73"];?></td>
											<td><?=$input["sarana_74"];?></td>
											<td><?=$input["sarana_75"];?></td>
										</tr>
										<tr>
											<td><span>Water Toren + Filter</span></td>
											<td><?=$input["sarana_76"];?></td>
											<td><?=$input["sarana_77"];?></td>
											<td><?=$input["sarana_78"];?></td>
											<td><?=$input["sarana_79"];?></td>
											<td><?=$input["sarana_80"];?></td>
											<td><?=$input["sarana_81"];?></td>
										</tr>
										<tr>
											<td><span>Kolam renang + pompa</span></td>
											<td><?=$input["sarana_82"];?></td>
											<td><?=$input["sarana_83"];?></td>
											<td><?=$input["sarana_84"];?></td>
											<td><?=$input["sarana_85"];?></td>
											<td><?=$input["sarana_86"];?></td>
											<td><?=$input["sarana_87"];?></td>
										</tr>
										<tr>
											<td><?=$input["sarana_118"];?></td>
											<td><?=$input["sarana_119"];?></td>
											<td><?=$input["sarana_120"];?></td>
											<td><?=$input["sarana_121"];?></td>
											<td><?=$input["sarana_122"];?></td>
											<td><?=$input["sarana_123"];?></td>
											<td><?=$input["sarana_124"];?></td>
										</tr>

										<tr style="font-weight: bold;">
											<td align="right" colspan="4" style="background-color: #eee;" colspan="4"><span>TOTAL SARANA PELENGKAP</span></td>
											<td><?=$input["sarana_88"];?></td>
											<td style="background-color: #eee;"></td>
											<td><?=$input["sarana_89"];?></td>
										</tr>
									</tbody>
									<thead>
										<tr>
											<th colspan="7" style="background-color: #1680e9; color: #fff;">BAGIAN SARANA PELENGKAP "TERPOTONG" KETENTUAN & PERATURAN (GSB / PELEBARAN JALAN)</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><span>Carpot (m<sup>2</sup>)</span></td>
											<td><?=$input["sarana_90"];?></td>
											<td><?=$input["sarana_91"];?></td>
											<td><?=$input["sarana_92"];?></td>
											<td><?=$input["sarana_93"];?></td>
											<td><?=$input["sarana_94"];?></td>
											<td><?=$input["sarana_95"];?></td>
										</tr>
										<tr>
											<td><span>Perkerasan</span></td>
											<td><?=$input["sarana_96"];?></td>
											<td><?=$input["sarana_97"];?></td>
											<td><?=$input["sarana_98"];?></td>
											<td><?=$input["sarana_99"];?></td>
											<td><?=$input["sarana_100"];?></td>
											<td><?=$input["sarana_101"];?></td>
										</tr>
										<tr>
											<td><span>Pagar Halaman</span></td>
											<td><?=$input["sarana_102"];?></td>
											<td><?=$input["sarana_103"];?></td>
											<td><?=$input["sarana_104"];?></td>
											<td><?=$input["sarana_105"];?></td>
											<td><?=$input["sarana_106"];?></td>
											<td><?=$input["sarana_107"];?></td>
										</tr>
										<tr>
											<td><span>Taman / Lanscaping</span></td>
											<td><?=$input["sarana_108"];?></td>
											<td><?=$input["sarana_109"];?></td>
											<td><?=$input["sarana_110"];?></td>
											<td><?=$input["sarana_111"];?></td>
											<td><?=$input["sarana_112"];?></td>
											<td><?=$input["sarana_113"];?></td>
										</tr>
										<tr style="font-weight: bold;">
											<td align="right" colspan="4" style="background-color: #eee;"><span>TOTAL SARANA PELENGKAP</span></td>
											<td><?=$input["sarana_114"];?></td>
											<td style="background-color: #eee;"></td>
											<td><?=$input["sarana_115"];?></td>
										</tr>
										<tr style="font-weight: bold;">
											<td align="right" colspan="4" style="background-color: #1680e9; color: #fff;"><span>SISA TOTAL SARANA PELENGKAP</span></td>
											<td><?=$input["sarana_116"];?></td>
											<td style="background-color: #eee;"></td>
											<td><?=$input["sarana_117"];?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="dbanding">
							<div class="table-responsive">
								<div id="table_pembanding"></div>
							</div>
							<div class="table-responsive">
								<table id="table_data_legalitas_2" class="table table_border_2" width="100%" cellpadding="0" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Jenis Sertifikat</th>
											<th>Nomor Sertifikat</th>
											<th>Luas Tanah (m<sup>2</sup>)</th>
											<th>Bobot</th>
											<th>Indikasi Nilai Tanah ( Rp. / m<sup>2</sup> ) </th>
											<th>Total Nilai Tanah ( Rp. )</th>
										</tr>
									</thead>
									<tbody id="tbody_data_legalitas_2"></tbody>
									<tfoot>
										<tr>
											<td align="center" colspan="3"><span>TOTAL LUAS TANAH SESUAI SERTIFIKAT</span></td>
											<td><?=$input["tanah_61"];?></td>
											<td></td>
											<td><?=$input["tanah_71"];?></td>
											<td><?=$input["tanah_72"];?></td>
										</tr>
									</tfoot>
								</table>
							</div>
							<br>

							<div class="table-responsive">
								<table class="table table_border_2" width="100%" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td style="background-color: #eee;"><span>Indikasi Nilai Tanah Setelah Pembobotan ( / m<sup>2</sup> )</span></td>
											<td><?=$input["pembanding_47"];?></td>
										</tr>
										<tr>
											<td style="background-color: #eee;"><span>P E M B U L A T A N</span></td>
											<td><?=$input["pembanding_48"];?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						
						<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="lampiran">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a aria-expanded="false" href="#lampiran_properti" class="panel-lampiran_properti " aria-controls="lampiran_properti" role="tab" data-toggle="tab" data-type="">Foto Properti</a>
								</li>
								<li role="presentation" class="">
									<a aria-expanded="false" href="#lampiran_layout" class="panel-lampiran_layout" aria-controls="lampiran_layout" role="tab" data-toggle="tab" data-type="">Layout Properti</a>
								</li>
								<li role="presentation" class="">
									<a aria-expanded="false" href="#lampiran_peta" class="panel-lampiran_peta" aria-controls="lampiran_peta" role="tab" data-toggle="tab" data-type="">Peta Lokasi Properti</a>
								</li>
								<li role="presentation" class="">
									<a aria-expanded="false" href="#lampiran_kota" class="panel-lampiran_kota" aria-controls="lampiran_kota" role="tab" data-toggle="tab" data-type="">Keterangan Tata Kota</a>
								</li>
							</ul>

							<div class="tab-content" style="padding: 20px; border: 1px solid #eee;">
								<div role="tabpanel" class="tab-pane active" style="padding: 0px;" id="lampiran_properti">
									<h4>Foto Properti</h4>
									<div class="row">
										<div class="col-lg-12">
											<div id="image_lampiran">
												<?php
													foreach ($list_image_lampiran as $item_image)
													{
														$multi_ket			= explode("##", $item_image->keterangan);
														$multi_file			= $item_image->jawab;
														$multi_urut			= $multi_ket[0];
														$multi_keterangan	= $multi_ket[1];
														
												?>
												<div class="col-md-6 list_multi_image list_<?=str_replace(".", "", $multi_file)?>">
													<img src="<?=base_url("asset/file/".$multi_file)?>" style="width: 100%" />
													<table class="table" style="margin-bottom: 10px;">
														<tr>
															<td>No. Urut</td>
															<td>:</td>
															<td><?=$multi_urut?></td>
														</tr>
														<tr>
															<td>Keterangan</td>
															<td>:</td>
															<td><?=$multi_keterangan?></td>
														</tr>
													</table>
													<button type="button" class="btn btn-warning btn-sm btn-delete-image-multi" data-file="<?=str_replace(".", "", $multi_file)?>" data-id="<?=base64_encode($item_image->id)?>">Delete</button>
												</div>
												<?php
													}
												?>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="row">
												<div class="col-md-6">
													<div style="margin-top: 10px; background-color: #f3f3f3; border: 1px solid #eee; padding: 10px;">
														<div class="form-group">
															<label>File</label>
															<input type="file" name="multi_image" id="multi_image" />
														</div>
														<div class="form-group">
															<label>No. Urut</label>
															<input type="text" name="multi_urut" id="multi_urut" class="form-control input-xs" />
														</div>
														<div class="form-group">
															<label>Keterangan</label>
															<textarea name="multi_keterangan" id="multi_keterangan" class="form-control input-xs"></textarea>
														</div>
														<div class="form-group">
															<button type="button" id="btn_upload_multi" class="btn btn-primary btn-sm">UPLOAD</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="lampiran_layout">
									<h4>Layout Properti</h4>
									<?=$input["entry_29"]?>
								</div>
								<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="lampiran_peta">
									<h4>Peta Lokasi Properti</h4>
									<?=$input["entry_30"]?>
								</div>
								<div role="tabpanel" class="tab-pane" style="padding: 0px;" id="lampiran_kota">
									<h4>Keterangan Tata Kota</h4>
									<?=$input["entry_31"]?>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						
						<div class="col-md-6">
							<div class="form-group text-left" style="padding: 15px;">
								<button type="button" class="btn btn-primary btn-sm" onclick="window.open('<?=base_url()?>printpdf/laporan_ringkas/<?=base64_encode($pekerjaan->id)?>/<?=base64_encode($lokasi->id)?>/pdf/', '_blank')" >PDF LAPORAN (SORT REPORT)</button>
								<!--<button type="button" class="btn btn-primary btn-sm" onclick="window.open('<?=base_url()?>printpdf/laporan_ringkas/<?=base64_encode($pekerjaan->id)?>/<?=base64_encode($lokasi->id)?>/print/', '_blank')" >PRINT LAPORAN RINGKAS</button>-->
								<button type="button" class="btn btn-success btn-sm btn-tambah-bangunan">TAMBAH BANGUNAN</button>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group text-right" style="padding: 15px;">
								<button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>
								<input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
							</div>
						</div>
						<div class="col-md-12">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<style>
	h4{
		color: #1196ee;
		
	}
	.panel .panel-heading{
		background-color: #2397dc;
		color: #fff;
		font-weight: bold;
	}
	.panel .panel-heading h3{
		font-weight: bold;
	}
</style>
<div class="modal fade" id="formAddMarker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Klik Pada Peta Untuk Menentukan Lokasi</h4>
            </div>
            <div class="modal-body" id="modal_content" style="height: 400px; text-align: right; position: relative;">
                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                <div id="map_area" style="width:100%; height: 100%;"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6Z0Oxaa2Hv37II4swhzH662q0BGIaDaw&libraries=places"></script>
<script type="text/javascript">var icon_marker = 'house-with-box.png';</script>

<!-- <script src="<?=base_url()?>asset/js/form_2.js?ver=1.12"></script> -->
<script type="text/javascript" src="<?php echo base_url('resources/js/apps/form_2.js?v=1.12') ?>"></script>
<style>
	.input_879_,
	.input_880_,
	.input_881_,
	.input_882_,
	.input_883_,
	.input_884_
	{
		border: 1px solid #eee;
	}
</style>

