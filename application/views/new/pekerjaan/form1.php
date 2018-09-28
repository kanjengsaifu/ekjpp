<?php
if( ! defined("BASEPATH")) exit("No direct script access allowed"); 
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/kertas-kerja.css">

<section class="content-header">
    <h1><?php echo $title; ?></h1>

    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $title; ?></li>
    </ol>
</section>

<section class="content inner-page">
    <div class="box box-info">
        <div class="box-body">
            <form name="form-kertas-kerja" id="form-kertas-kerja" method="post">
                <input  type="hidden" id="id_kertas_kerja" value="<?php echo (!empty($txn_kertas_kerja['id_kertas_kerja'])) ? $txn_kertas_kerja['id_kertas_kerja'] : 0 ?>">
                <input type="hidden" id="id_pekerjaan" name="id_pekerjaan" class="form-control input-sm number-id_pekerjaan" value="<?php echo $id_pekerjaan ?>" placeholder="id_pekerjaan" required>           
                <input type="hidden" id="id_lokasi" name="id_lokasi" class="form-control input-sm number-id_lokasi" value="<?php echo $id_lokasi ?>" placeholder="id_lokasi" required>
                <input type="hidden" id="jumlah_bangunan" name="jumlah_bangunan" class="form-control input-sm number-jumlah_bangunan" value="<?php echo $jumlah_bangunan ?>" placeholder="jumlah_bangunan" required>

                <?php $_GET["role"] = empty($_GET["role"]) ? "entry" : $_GET["role"]; ?>

                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" <?php echo (isset($_GET["role"]) && $_GET["role"]=="entry") ? "class=\"active\"" : "" ?>>
                        <a href="#entry" class="panel-head panel-entry" aria-controls="entry" role="tab" data-toggle="tab">Entry</a>
                    </li>
                    <li role="presentation" <?php echo (isset($_GET["role"]) && $_GET["role"]=="tanah") ? "class=\"active\"" : "" ?>>
                        <a href="#tanah" class="panel-head panel-tanah" aria-controls="tanah" role="tab" data-toggle="tab">Tanah</a>
                    </li>
                    <li role="presentation" <?php echo (isset($_GET["role"]) && $_GET["role"]=="splengkap") ? "class=\"active\"" : "" ?>>
                        <a href="#splengkap" class="panel-head panel-splengkap" aria-controls="splengkap" role="tab" data-toggle="tab">Sarana Pelengkap</a>
                    </li>
                    <li role="presentation" <?php echo (isset($_GET["role"]) && $_GET["role"]=="dbanding") ? "class=\"active\"" : "" ?>>
                        <a href="#dbanding" class="panel-head panel-dbanding" aria-controls="dbanding" role="tab" data-toggle="tab">Data Banding</a>
                    </li>
                    <li role="presentation" <?php echo (isset($_GET["role"]) && $_GET["role"]=="lampiran") ? "class=\"active\"" : "" ?>>
                        <a href="#lampiran" class="panel-head panel-lampiran" aria-controls="lampiran" role="tab" data-toggle="tab" data-type="">Lampiran-Lampiran</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" id="entry" <?php echo (isset($_GET["role"]) && $_GET["role"]=="entry") ? "class=\"tab-pane active\"" : "class=\"tab-pane\" " ?>>
                        <h4>FORM DATA ENTRY SURVEYOR</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group sub-label"> 
                                    <label>SURVEYOR & LAPORAN</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Penandatangan Laporan</label>
                                        <select class="form-control table_input" id="textbox_entry_1" name="update[entry_1]" data-id-field="1" data-keterangan="" data-alsochange="#no_mappi_penandatangan_laporan">
                                            <option value="" data-noijinpp="" data-nomappi="">Select</option>
                                            <?php foreach ($penandatangan as $key => $value) { ?>
                                            <option data-noijinpp="<?php echo $value->no_ijinpp; ?>" data-nomappi="<?php echo $value->no_mappi ?>" value="<?php echo $value->nama ?>" <?php echo ($txn_kertas_kerja["penandatangan_laporan"] == $value->nama) ? "selected":"" ?>><?php echo $value->nama ?></option>
                                            <?php } ?>
                                        </select>

                                        <input type="hidden" id="no_mappi_penandatangan_laporan" class="input_2074" data-id-field="2074" value="<?php echo !empty($txn_kertas_kerja["no_mappi_penandatangan_laporan"]) ? $txn_kertas_kerja["no_mappi_penandatangan_laporan"] : "" ?>">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Jenis Jasa Penilaian</label>
                                        <select class="form-control table_input custom_input" id="kode_jenis_jasa" name="kode_jenis_jasa">
                                            <option value="">Select</option>
                                            <?php foreach ($jenis_jasa_penilaian as $jp) { ?>
                                            <option value="<?php echo $jp->kode ?>" <?php echo ($txn_kertas_kerja["kode_jenis_jasa"] == $jp->kode) ? "selected":"" ?>><?php echo $jp->kode.' - '.$jp->jenis_jasa ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nama Penilai</label>
                                        <input type="text" id="textbox_entry_3" name="update[entry_3]" class="form-control table_input input_3_ " value="<?php echo (empty($txn_kertas_kerja["nama_penilai"])) ? $nama_penilai : $txn_kertas_kerja["nama_penilai"] ?>" data-id-field="3" data-keterangan="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nama Surveyor</label>
                                        <?php if ($user['id_group']==2){ ?>
                                        <select id="textbox_entry_5" name="update[entry_5]" class="form-control table_input input_5_ "   data-id-field="5" data-keterangan="">
                                            <option>Select</option>
                                            <?php foreach ($petugas as $key => $value) { ?>
                                            <option value="<?php echo $value->nama ?>" <?php echo ($value->nama==$txn_kertas_kerja['nama_surveyor']) ? "selected":"" ?>><?php echo $value->nama ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php }else{ ?>
                                        <input type="text" id="textbox_entry_5" name="update[entry_5]" class="form-control table_input input_5_ " value="<?php echo (empty($txn_kertas_kerja["nama_surveyor"])) ? $nama_surveyor : $txn_kertas_kerja["nama_surveyor"] ?>" data-id-field="5" data-keterangan="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Tanggal Inspeksi & Penilaian</label>

                                        <?php
                                        $date_name = "update[entry_9]";
                                        $date_label = "Tanggal Inspeksi & Penilaian";
                                        $date_value = (!strtotime($txn_kertas_kerja["tanggal_inspeksi_penilaian"])) ? format_ymd($tanggal_inspeksi_penilaian) : format_ymd($txn_kertas_kerja["tanggal_inspeksi_penilaian"]);
                                        $date_id = "textbox_entry_9";
                                        $date_class = "table_input";
                                        $date_attr = 'data-id-field="9" data-keterangan=""';

                                        echo ( $this->formlib->_generate_input_date($date_name, $date_label, $date_value, true, false, "dd-mm-yyyy", $date_id, $date_class, $date_attr) );
                                        ?>

                                        <!-- <input type="text" id="textbox_entry_9" name="update[entry_9]" class="form-control table_input" value="<?php echo (!strtotime($txn_kertas_kerja["tanggal_inspeksi_penilaian"])) ? format_ymd($tanggal_inspeksi_penilaian) : format_ymd($txn_kertas_kerja["tanggal_inspeksi_penilaian"]) ?>" data-id-field="9" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-keterangan="">
                                        <script>
                                            $(function(){
                                                $("#textbox_entry_9").datepicker();
                                            });
                                        </script> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Tanggal Laporan</label>

                                        <?php
                                        $date_name = "update[entry_12]";
                                        $date_label = "Tanggal Laporan";
                                        $date_value = (empty($txn_kertas_kerja["tanggal_laporan"])) ? format_ymd($tanggal_laporan) : format_ymd($txn_kertas_kerja["tanggal_laporan"]);
                                        $date_id = "textbox_entry_12";
                                        $date_class = "table_input";
                                        $date_attr = 'data-id-field="12" data-keterangan=""';

                                        echo ( $this->formlib->_generate_input_date($date_name, $date_label, $date_value, true, false, "dd-mm-yyyy", $date_id, $date_class, $date_attr) );
                                        ?>

                                        <!-- <input type="text" id="textbox_entry_12" name="update[entry_12]" class="form-control table_input" value="<?php echo (empty($txn_kertas_kerja["tanggal_laporan"])) ? format_ymd($tanggal_laporan) : format_ymd($txn_kertas_kerja["tanggal_laporan"]) ?>" data-id-field="12" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-keterangan="">
                                        
                                        <script>
                                            $(function(){
                                                $("#textbox_entry_12").datepicker({ dateFormat: "yyyy-mm-dd" });
                                            })
                                        </script> -->
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Nomor Laporan</label>
                                        <div class="input-group" style="width: 300px">
                                          <input type="text" id="nomor_urut_laporan" class="form-control" id="basic-url" aria-describedby="label_nomor_laporan" value="<?php echo $nomor_urut ?>">
                                          <div class="input-group-addon" id="label_nomor_laporan">/<span id="kode_identitas_kantor"><?php echo empty($kode_identitas_kantor) ? '_______' : $kode_identitas_kantor; ?></span>/<span id="string_kode_jenis_jasa"><?php echo empty($kode_jenis_jasa) ? '__' : $kode_jenis_jasa; ?></span>/<span id="kode_industri_pengguna_jasa"><?php echo empty($kode_industri_pengguna_jasa) ? '__' : $kode_industri_pengguna_jasa; ?></span>/<span id="kode_nomor_izin_profesi"><?php echo empty($kode_nomor_izin_profesi) ? '____' : $kode_nomor_izin_profesi; ?></span>/<span id="kode_npwp"><?php echo empty($kode_npwp) ? 0 : $kode_npwp; ?></span>/<span id="bulan_tahun_laporan"><?php echo empty($bulan_romawi) ? '__' : $bulan_romawi; ?>/<?php echo empty($tahun_laporan) ? '____' : $tahun_laporan; ?></span></div>
                                        </div>
                                        <input type="hidden" id="textbox_entry_15" name="update[entry_15]" class="form-control table_input input_15_ " value="<?php echo (empty($txn_kertas_kerja["nomor_laporan"])) ? $nomor_laporan : $txn_kertas_kerja["nomor_laporan"] ?>" data-id-field="15" data-keterangan="">                             
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group sub-label">
                                    <label>DATA-DATA UMUM PROPERTI</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Obyek Penilaian</label>
                                        <input type="text" id="textbox_entry_2" name="update[entry_2]" class="form-control table_input input_2_ " value="<?php echo (empty($txn_kertas_kerja["obyek_penilaian"])) ? $obyek_penilaian : $txn_kertas_kerja["obyek_penilaian"] ?>" data-id-field="2" data-keterangan="" readonly>                 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Highest and Best Use</label>
                                        <select class="form-control table_input input_4_" id="textbox_entry_4" name="update[entry_4]" data-id-field="4" data-keterangan="">
                                            <option >Select</option>
                                            <?php foreach ($list_kegunaan as $key => $value) { ?>
                                            <option value="<?php echo $value->kegunaan ?>" <?php echo ($txn_kertas_kerja["kegunaan"] == $value->kegunaan) ? "selected" : "" ?>><?php echo $value->kegunaan ?></option>
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
                                                <select class="form-control table_input input_6_" id="textbox_entry_6" name="update[entry_6]" data-id-field="6" data-keterangan="">
                                                    <option>Select</option>
                                                    <?php foreach ($jenis_klien as $key => $value) { ?>
                                                    <option value="<?php echo $value->jenis_klien ?>" <?php echo ($txn_kertas_kerja["jenis_klien"] == $value->jenis_klien) ? "selected" : "" ?>><?php echo $value->jenis_klien ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" id="textbox_entry_7" name="update[entry_7]" class="form-control table_input input_7_ " value="<?php echo (empty($txn_kertas_kerja["klien"])) ? $klien : $txn_kertas_kerja["klien"] ?>" data-id-field="7" data-keterangan="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Telepon / HP.</label>
                                        <input type="text" id="textbox_entry_8" name="update[entry_8]" class="form-control table_input input_8_ " value="<?php echo $txn_kertas_kerja["telepon_klien"] ?>" data-id-field="8" data-keterangan="">                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Status Obyek</label>
                                        <select class="form-control table_input input_10_" id="textbox_entry_10" name="update[entry_10]" data-id-field="10" data-keterangan="">
                                            <option>Select</option>
                                            <?php foreach ($status_objek as $key => $value) { ?>
                                            <option value="<?php echo $value->status_objek ?>" <?php echo ($txn_kertas_kerja["status_objek"] == $value->status_objek) ? "selected":"" ?>><?php echo $value->status_objek ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Yang dijumpai</label>
                                        <input type="text" id="textbox_entry_11" name="update[entry_11]" class="form-control table_input input_11_ " value="<?php echo $txn_kertas_kerja["yang_dijumpai"] ?>" data-id-field="11" data-keterangan="">                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Selaku</label>
                                        <input type="text" id="textbox_entry_13" name="update[entry_13]" class="form-control table_input input_13_ " value="<?php echo $txn_kertas_kerja["selaku"] ?>" data-id-field="13" data-keterangan="">                               
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Obyek ditempati oleh</label>
                                        <input type="text" id="textbox_entry_14" name="update[entry_14]" class="form-control table_input input_14_ " value="<?php echo $txn_kertas_kerja["obyek_ditempati_oleh"] ?>" data-id-field="14" data-keterangan="">                             
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Penggunaan Obyek</label>
                                        <input type="text" id="textbox_entry_16" name="update[entry_16]" class="form-control table_input input_16_ " value="<?php echo $txn_kertas_kerja["penggunaan_obyek"] ?>" data-id-field="16" data-keterangan="">                             
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group sub-label">
                                    <label>DATA-DATA PEMBERI TUGAS</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nama Instansi / Perorangan</label>
                                        <select class="form-control table_input" id="textbox_entry_17" name="update[entry_17]" data-id-field="17" data-keterangan="">
                                            <option>Select</option>
                                            <?php foreach ($list_debitur as $key => $value) { ?>
                                            <option value="<?php echo $value->nama ?>" <?php echo ($txn_kertas_kerja["debitur"] == $value->nama) ? "selected" : "" ?>><?php echo $value->nama ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nama Cabang</label>
                                        <input type="text" id="textbox_entry_19" name="update[entry_19]" class="form-control table_input input_19_ " value="<?php echo $txn_kertas_kerja["nama_cabang"] ?>" data-id-field="19" data-keterangan="">                              
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nama Staff</label>
                                        <input type="text" id="textbox_entry_20" name="update[entry_20]" class="form-control table_input input_20_ " value="<?php echo $txn_kertas_kerja["nama_staff"] ?>" data-id-field="20" data-keterangan="">                               
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Jabatan</label>
                                        <input type="text" id="textbox_entry_22" name="update[entry_22]" class="form-control table_input input_22_ " value="<?php echo $txn_kertas_kerja["jabatan"] ?>" data-id-field="22" data-keterangan="">                              
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nomor Penugasan</label>
                                        <input type="text" id="textbox_entry_24" name="update[entry_24]" class="form-control table_input input_24_ " value="<?php echo $txn_kertas_kerja["nomor_penugasan"] ?>" data-id-field="24" data-keterangan="">                              
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Tanggal Penugasan</label>

                                        <?php
                                        $date_name = "update[entry_26]";
                                        $date_label = "Tanggal Penugasan";
                                        $date_value = (!strtotime($txn_kertas_kerja["tanggal_penugasan"])) ? "" : format_ymd($txn_kertas_kerja["tanggal_penugasan"]);
                                        $date_id = "textbox_entry_26";
                                        $date_class = "table_input";
                                        $date_attr = 'data-id-field="26" data-keterangan=""';

                                        echo ( $this->formlib->_generate_input_date($date_name, $date_label, $date_value, true, false, "dd-mm-yyyy", $date_id, $date_class, $date_attr) );
                                        ?>

                                        <!-- <input type="text" id="textbox_entry_26" name="update[entry_26]" class="form-control table_input" value="<?php echo (!strtotime($txn_kertas_kerja["tanggal_penugasan"])) ? "" : format_ymd($txn_kertas_kerja["tanggal_penugasan"]) ?>" data-id-field="26" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-keterangan="">
                                        <script>
                                            $(function(){
                                                $("#textbox_entry_26").datepicker();
                                            })
                                        </script> -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Tujuan Penilaian</label>
                                        <select class="form-control table_input input_28_" id="textbox_entry_28" name="update[entry_28]" data-id-field="28" data-keterangan="">
                                            <option>Select</option>
                                            <?php foreach ($tujuan_penilaian as $key => $value) { ?>
                                            <option value="<?php echo $value->tujuan ?>" <?php echo ($txn_kertas_kerja["tujuan_penilaian"]==$value->tujuan) ? "selected":"" ?>><?php echo $value->tujuan ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group sub-label">
                                    <label>ALAMAT LENGKAP PROPERTI</label>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Alamat Properti</label>
                                        <textarea id="textbox_entry_18" name="update[entry_18]" class="form-control table_input input_18_" data-id-field="18" data-keterangan="" readonly><?php echo (empty($txn_kertas_kerja["alamat_properti"])) ? $alamat_properti : $txn_kertas_kerja["alamat_properti"] ?></textarea>                               
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nama Provinsi</label>
                                        <input type="text" id="textbox_entry_21" name="update[entry_21]" class="form-control table_input input_21_ " value="<?php echo (empty($txn_kertas_kerja["provinsi"])) ? $provinsi : $txn_kertas_kerja["provinsi"] ?>" data-id-field="21" data-keterangan="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>d/h</label>
                                        <input type="text" id="textbox_entry_33" name="update[entry_33]" class="form-control table_input input_897_ " value="<?php echo (empty($txn_kertas_kerja["dh_provinsi"])) ? $dh_provinsi : $txn_kertas_kerja["dh_provinsi"] ?>" data-id-field="897" data-keterangan="">                             
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nama Kota / Kabupaten</label>
                                        <input type="text" id="textbox_entry_23" name="update[entry_23]" class="form-control table_input input_23_ " value="<?php echo (empty($txn_kertas_kerja["kotakab"])) ? $kotakab : $txn_kertas_kerja["kotakab"] ?>" data-id-field="23" data-keterangan="" readonly>                               
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>d/h</label>
                                        <input type="text" id="textbox_entry_34" name="update[entry_34]" class="form-control table_input input_898_ " value="<?php echo (empty($txn_kertas_kerja["dh_kotakab"])) ? $dh_kotakab : $txn_kertas_kerja["dh_kotakab"] ?>" data-id-field="898" data-keterangan="">                                
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Kecamatan</label>
                                        <input type="text" id="textbox_entry_25" name="update[entry_25]" class="form-control table_input input_25_ " value="<?php echo (empty($txn_kertas_kerja["kecamatan"])) ? $kecamatan : $txn_kertas_kerja["kecamatan"] ?>" data-id-field="25" data-keterangan="" readonly>                             
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>d/h</label>
                                        <input type="text" id="textbox_entry_35" name="update[entry_35]" class="form-control table_input input_899_ " value="<?php echo (empty($txn_kertas_kerja["dh_kecamatan"])) ? $dh_kecamatan : $txn_kertas_kerja["dh_kecamatan"] ?>" data-id-field="899" data-keterangan="">                              
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Kelurahan / Desa</label>
                                        <input type="text" id="textbox_entry_27" name="update[entry_27]" class="form-control table_input input_27_ " value="<?php echo (empty($txn_kertas_kerja["kelurahan"])) ? $kelurahan : $txn_kertas_kerja["kelurahan"] ?>" data-id-field="27" data-keterangan="" readonly>                             
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>d/h</label>
                                        <input type="text" id="textbox_entry_36" name="update[entry_36]" class="form-control table_input input_900_ " value="<?php echo (empty($txn_kertas_kerja["dh_kelurahan"])) ? $dh_kelurahan : $txn_kertas_kerja["dh_kelurahan"] ?>" data-id-field="900" data-keterangan="">                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
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
                                        <tbody  id="table_body_ringkasan"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>HASIL PENILAIAN TERDAHULU</h4>
                                
                                <div class="table-responsive table_div" id="history_penilaian"></div>
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" id="tanah" <?php echo (isset($_GET["role"]) && $_GET["role"]=="tanah") ? "class=\"tab-pane active\"" : "class=\"tab-pane\" " ?>>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a aria-expanded="false" href="#tanah_form" class="panel-tanah_tanah active" aria-controls="tanah_tanah" role="tab" data-toggle="tab" data-type="">Form Tanah</a>
                            </li>
                        </ul>
                        <br>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="tanah_form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">OBYEK PENILAIAN</h3>
                                            </div>
                                            <div class="panel-body">
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
                                            <div class="panel-body">
                                                <table class="table table_info" cellpadding="0" cellspacing="0" style="width: 100%">
                                                    <colgroup>
                                                        <col style="width: 30%">
                                                        <col style="width: 20">
                                                    </colgroup>
                                                    <tr valign="top">
                                                        <td>Yang dijumpai dilokasi</td>
                                                        <td align="center" width="20">:</td>
                                                        <td class="tanah-td-yang-dijumpai"><?php echo $txn_kertas_kerja["yang_dijumpai"] ?></td>
                                                    </tr>
                                                    <tr valign="top">
                                                        <td>Jabatan</td>
                                                        <td align="center" width="20">:</td>
                                                        <td class="tanah-td-jabatan"><?php echo $txn_kertas_kerja["jabatan"] ?></td>
                                                    </tr>
                                                    <tr valign="top">
                                                        <td>Upload Photo</td>
                                                        <td align="center" width="20">:</td>
                                                        <td>
                                                            <img id="img_tanah_32" src="<?php echo base_url() ?>/asset/file/<?php echo (empty($txn_tanah["foto"]) ? "default.jpg" : $txn_tanah["foto"]) ?>" data-id-field="133" data-name-field="tanah_32" data-keterangan="" class="btn-upload-image img-133-" style="border: 1px solid #ccc; margin-top: 10px; margin-bottom: 20px; height: 100px;" />
                                                            <input type="file" id="file-133" class="form-control tmp_file file-133-" data-id-field="133" data-name-field="tanah_32" style="display: none;" data-keterangan="">
                                                            <input type="hidden" id="textbox_tanah_32" name="update[tanah_32]" class="form-control table_input textbox-133-" value="<?php echo $txn_tanah["foto"] ?>" data-id-field="133" data-name-field="tanah_32" data-keterangan="">
                                                        </td>
                                                    </tr>
                                                </table>
                                                <div class="col-md-6">
                                                    <h4>Informasi Properti</h4>
                                                    <table class="table table_border" cellpadding="0" cellspacing="0">
                                                        <colgroup>
                                                            <col style="width: 40%">
                                                        </colgroup>
                                                        <tr>
                                                            <td width="15%"><span>Status obyek</span></td>
                                                            <td><input type="text" id="textbox_tanah_1" name="update[tanah_1]" class="form-control table_input input_102_ " value="<?php echo $txn_kertas_kerja["status_objek"] ?>" data-id-field="102" data-keterangan=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Obyek dihuni oleh</span></td>
                                                            <td><input type="text" id="textbox_tanah_2" name="update[tanah_2]" class="form-control table_input input_103_ " value="<?php echo $txn_kertas_kerja["obyek_ditempati_oleh"] ?>" data-id-field="103" data-keterangan=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Penggunaan obyek</span></td>
                                                            <td><input type="text" id="textbox_tanah_3" name="update[tanah_3]" class="form-control table_input input_104_ " value="<?php echo $txn_kertas_kerja["penggunaan_obyek"] ?>" data-id-field="104" data-keterangan=""></td>
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
                                                                <select class="form-control table_input input_105_" id="textbox_tanah_4" name="update[tanah_4]" data-id-field="105" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($batas_properti as $key => $value) { ?>
                                                                    <option value="<?php echo $value->batas_properti ?>" <?php echo ($txn_tanah["jenis_batas_1"] == $value->batas_properti) ? "selected":"" ?>><?php echo $value->batas_properti ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" id="textbox_tanah_5" name="update[tanah_5]" class="form-control table_input input_106_ " value="<?php echo $txn_tanah["batas_properti_1"] ?>" data-id-field="106" data-keterangan=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control table_input input_107_" id="textbox_tanah_6" name="update[tanah_6]" data-id-field="107" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($batas_properti as $key => $value) { ?>
                                                                    <option value="<?php echo $value->batas_properti ?>" <?php echo ($txn_tanah["jenis_batas_2"] == $value->batas_properti) ? "selected":""  ?>><?php echo $value->batas_properti ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" id="textbox_tanah_7" name="update[tanah_7]" class="form-control table_input input_108_ " value="<?php echo $txn_tanah["batas_properti_2"] ?>" data-id-field="108" data-keterangan=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control table_input input_109_" id="textbox_tanah_8" name="update[tanah_8]" data-id-field="109" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($batas_properti as $key => $value) { ?>
                                                                    <option value="<?php echo $value->batas_properti ?>" <?php echo ($txn_tanah["jenis_batas_3"] == $value->batas_properti) ? "selected":""  ?>><?php echo $value->batas_properti ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" id="textbox_tanah_9" name="update[tanah_9]" class="form-control table_input input_110_ " value="<?php echo $txn_tanah["batas_properti_3"] ?>" data-id-field="110" data-keterangan=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <select class="form-control table_input input_111_" id="textbox_tanah_10" name="update[tanah_10]" data-id-field="111" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($batas_properti as $key => $value) { ?>
                                                                    <option value="<?php echo $value->batas_properti ?>" <?php echo ($txn_tanah["jenis_batas_4"] == $value->batas_properti) ? "selected":""  ?>><?php echo $value->batas_properti ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" id="textbox_tanah_11" name="update[tanah_11]" class="form-control table_input input_112_ " value="<?php echo $txn_tanah["batas_properti_4"] ?>" data-id-field="112" data-keterangan=""></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <h4>INFORMASI LINGKUNGAN</h4>
                                                <div class="col-md-6">
                                                    <table class="table table_border" cellpadding="0" cellspacing="0">
                                                        <colgroup>
                                                            <col style="width: 40%">
                                                        </colgroup>
                                                        <tr>
                                                            <td width="15%"><span>Lokasi tanah obyek</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_113_" id="textbox_tanah_12" name="update[tanah_12]" data-id-field="113" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($lokasi_tanah_objek as $key => $value) { ?>
                                                                    <option value="<?php echo $value->lokasi_tanah_objek ?>" <?php echo ($txn_tanah["lokasi_tanah"] == $value->lokasi_tanah_objek) ? "selected" : "" ?>><?php echo $value->lokasi_tanah_objek ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Harga tanah obyek</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_114_" id="textbox_tanah_13" name="update[tanah_13]" data-id-field="114" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($harga_tanah_objek as $key => $value) { ?>
                                                                    <option value="<?php echo $value->harga_tanah_objek ?>" <?php echo ($value->harga_tanah_objek==$txn_tanah["harga_tanah_obyek"]) ? "selected":"" ?>><?php echo $value->harga_tanah_objek ?></option>
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
                                                                <select class="form-control table_input input_115_" id="textbox_tanah_14" name="update[tanah_14]" data-id-field="115" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($kepadatan_bangunan as $key => $value) { ?>
                                                                    <option value="<?php echo $value->kepadatan_bangunan ?>" <?php echo ($value->kepadatan_bangunan==$txn_tanah["kepadatan_bangunan"]) ? "selected":"" ?>><?php echo $value->kepadatan_bangunan ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Pertumbuhan bangunan</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_116_" id="textbox_tanah_15" name="update[tanah_15]" data-id-field="116" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($pertumbuhan_bangunan as $key => $value) { ?>
                                                                    <option value="<?php echo $value->pertumbuhan_bangunan ?>" <?php echo ($value->pertumbuhan_bangunan==$txn_tanah["pertumbuhan_bangunan"]) ? "selected":"" ?>><?php echo $value->pertumbuhan_bangunan ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <h4>ANALISA LINGKUNGAN</h4>
                                                    <table class="table table_border">
                                                        <colgroup>
                                                            <col style="width: 40%">
                                                        </colgroup>
                                                        <tr>
                                                            <td width="25%"><span>Kemudahan mencapai lokasi obyek</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_117_" id="textbox_tanah_16" name="update[tanah_16]" data-id-field="117" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
                                                                    <option value="<?php echo $value->tipe_penilaian ?>" <?php echo ($value->tipe_penilaian==$txn_tanah["kemudahan_mencapai_lokasi"]) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Kemudahan belanja / shooping</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_118_" id="textbox_tanah_17" name="update[tanah_17]" data-id-field="118" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
                                                                    <option value="<?php echo $value->tipe_penilaian ?>" <?php echo ($value->tipe_penilaian==$txn_tanah["kemudahan_belanja"]) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Kemudahan rekreasi /  hiburan</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_119_" id="textbox_tanah_18" name="update[tanah_18]" data-id-field="119" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
                                                                    <option value="<?php echo $value->tipe_penilaian ?>" <?php echo ($value->tipe_penilaian==$txn_tanah["kemudahan_rekreasi"]) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Kemudahan angkutan umum / transportasi</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_120_" id="textbox_tanah_19" name="update[tanah_19]" data-id-field="120" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
                                                                    <option value="<?php echo $value->tipe_penilaian ?>" <?php echo ($value->tipe_penilaian==$txn_tanah["kemudahan_angkutan_umum"]) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Kemudahan sarana pendidikan / sekolah</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_121_" id="textbox_tanah_20" name="update[tanah_20]" data-id-field="121" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
                                                                    <option value="<?php echo $value->tipe_penilaian ?>" <?php echo ($value->tipe_penilaian==$txn_tanah["kemudahan_sarana_pendidikan"]) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Keamanan terhadap kejahatan / kriminal</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_122_" id="textbox_tanah_21" name="update[tanah_21]" data-id-field="122" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
                                                                    <option value="<?php echo $value->tipe_penilaian ?>" <?php echo ($value->tipe_penilaian==$txn_tanah["keamanan_terhadap_kejahatan"]) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Keamanan terhadap bencana kebakaran</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_123_" id="textbox_tanah_22" name="update[tanah_22]" data-id-field="123" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
                                                                    <option value="<?php echo $value->tipe_penilaian ?>" <?php echo ($value->tipe_penilaian==$txn_tanah["keamanan_terhadap_kebakaran"]) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Keamanan terhadap bencana alam</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_124_" id="textbox_tanah_23" name="update[tanah_23]" data-id-field="124" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
                                                                    <option value="<?php echo $value->tipe_penilaian ?>" <?php echo ($value->tipe_penilaian==$txn_tanah["keamanan_terhadap_bencana"]) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
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
                                                            <td>
                                                                <span>Perumahan / pemukiman (%)</span>
                                                            </td>
                                                            <td>
                                                                <input type="number" id="textbox_tanah_24" name="update[tanah_24]" class="form-control table_input number  input_125_ width8rem" value="<?php echo $txn_tanah["permukiman"] ?>" data-id-field="125" min="0" max="100" data-keterangan="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span>Industri / pergudangan (%)</span>
                                                            </td>
                                                            <td>
                                                                <input type="number" id="textbox_tanah_25" name="update[tanah_25]" class="form-control table_input number  input_126_ width8rem" value="<?php echo $txn_tanah["industri"] ?>" data-id-field="126" min="0" max="100" data-keterangan="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span>Pertokoan / perniagaan (%)</span>
                                                            </td>
                                                            <td>
                                                                <input type="number" id="textbox_tanah_26" name="update[tanah_26]" class="form-control table_input number  input_127_ width8rem" value="<?php echo $txn_tanah["pertokoan"] ?>" data-id-field="127" min="0" max="100" data-keterangan="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="25%">
                                                                <span>Perkantoran / perdagangan & jasa (%)</span>
                                                            </td>
                                                            <td>
                                                                <input type="number" id="textbox_tanah_27" name="update[tanah_27]" class="form-control table_input number  input_128_ width8rem" value="<?php echo $txn_tanah["perkantoran"] ?>" data-id-field="128" min="0" max="100" data-keterangan="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span>Taman /  penghijauan / jalur hijau (%)</span>
                                                            </td>
                                                            <td>
                                                                <input type="number" id="textbox_tanah_28" name="update[tanah_28]" class="form-control table_input number  input_129_ width8rem" value="<?php echo $txn_tanah["taman"] ?>" data-id-field="129" min="0" max="100" data-keterangan="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span>Tanah kosong / tanah idle (%)</span>
                                                            </td>
                                                            <td>
                                                                <input type="number" id="textbox_tanah_29" name="update[tanah_29]" class="form-control table_input number  input_130_ width8rem" value="<?php echo $txn_tanah["tanah_kosong"] ?>" data-id-field="130" min="0" max="100" data-keterangan="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span>Perubahan lingkungan / tata guna<br> tanah pada masa akan datang</span>
                                                            </td>
                                                            <td>
                                                                <select class="form-control table_input input_131_" id="textbox_tanah_30" name="update[tanah_30]" data-id-field="131" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($perubahan_lingkungan_response as $key => $value) {?>
                                                                    <option value="<?php echo $value->perubahan_lingkungan_response ?>" <?php echo ($value->perubahan_lingkungan_response==$txn_tanah["perubahan_lingkungan"]) ? "selected":"" ?>><?php echo $value->perubahan_lingkungan_response ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <br>
                                                                <input type="text" id="textbox_tanah_73" name="update[tanah_73]" class="form-control table_input input_353_ " value="<?php echo $txn_tanah['perubahan_lingkungan_lainya'] ?>" data-id-field="353" data-keterangan="">                                                      
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span>Mayoritas data hunian pada kawasan</span>
                                                            </td>
                                                            <td>
                                                                <select class="form-control table_input input_132_" id="textbox_tanah_31" name="update[tanah_31]" data-id-field="132" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_hunian as $key => $value) {?>
                                                                    <option value="<?php echo $value->tipe_hunian ?>" <?php echo ($value->tipe_hunian==$txn_tanah["data_hunian"]) ? "selected":"" ?>><?php echo $value->tipe_hunian ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <br>
                                                                <input type="text" id="textbox_tanah_74" name="update[tanah_74]" class="form-control table_input input_354_ " value="<?php echo $txn_tanah['data_hunian_lainya'] ?>" data-id-field="354" data-keterangan="">         
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">LOKASI SITE</h3>
                                            </div>
                                            <div class="panel-body">
                                                <h4>FASILITAS LINGKUNGAN</h4>
                                                <div class="col-md-6">
                                                    <table class="table table_border">
                                                        <colgroup>
                                                            <col style="width: 40%">
                                                        </colgroup>
                                                        <tr>
                                                            <td><span>Lebar jalan di depan obyek (m)</span></td>
                                                            <td><input type="text" id="textbox_tanah_39" name="update[tanah_39]" class="form-control table_input input_140_ " value="<?php echo $txn_tanah["lebar_jalan_depan"] ?>" data-id-field="140" data-keterangan=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Lebar jalan di sekitar obyek (m)</span></td>
                                                            <td>
                                                                <input type="text" id="textbox_tanah_40" name="update[tanah_40]" class="form-control table_input input_141_ " value="<?php echo $txn_tanah["lebar_jalan_sekitar"] ?>" data-id-field="141" data-keterangan="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Jenis jalan depan obyek</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_142_" id="textbox_tanah_41" name="update[tanah_41]" data-id-field="142" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_jalan as $key => $value) {?>
                                                                    <option value="<?php echo $value->tipe_jalan ?>" <?php echo ($value->tipe_jalan==$txn_tanah["jenis_jalan_depan"]) ? "selected":"" ?>><?php echo $value->tipe_jalan ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Drainage / Saluran</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_143_" id="textbox_tanah_42" name="update[tanah_42]" data-id-field="143" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($keterbukaan as $key => $value) {?>
                                                                    <option value="<?php echo $value->keterbukaan ?>" <?php echo ($value->keterbukaan==$txn_tanah["drainase"]) ? "selected":"" ?>><?php echo $value->keterbukaan ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Trotoar</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_144_" id="textbox_tanah_43" name="update[tanah_43]" data-id-field="144" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($kehadiran as $key => $value) {?>
                                                                    <option value="<?php echo $value->kehadiran ?>" <?php echo ($value->kehadiran==$txn_tanah["trotoar"]) ? "selected":"" ?>><?php echo $value->kehadiran ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Lampu Jalan (PJU)</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_145_" id="textbox_tanah_44" name="update[tanah_44]" data-id-field="145" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($kehadiran as $key => $value) {?>
                                                                    <option value="<?php echo $value->kehadiran ?>" <?php echo ($value->kehadiran==$txn_tanah["lampu_jalan"]) ? "selected":"" ?>><?php echo $value->kehadiran ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table_border">
                                                        <colgroup>
                                                            <col style="width: 40%">
                                                        </colgroup>
                                                        <tr>
                                                            <td><span>Jaringan Listrik</span></td>
                                                            <td width="25px">
                                                                <input type="checkbox" id="textbox_tanah_33" name="update[tanah_33]" class="table_input" data-id-field="134" data-keterangan="" <?php echo ($txn_tanah["jaringan_listrik"] == 1) ? "checked" : "" ?>>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Jaringan Telepon</span></td>
                                                            <td>
                                                                <input type="checkbox" id="textbox_tanah_34" name="update[tanah_34]" class="table_input"  data-id-field="135" data-keterangan="" <?php echo ($txn_tanah["jaringan_telepon"] == 1) ? "checked" : "" ?>>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Jaringan Air Bersih</span></td>
                                                            <td>
                                                                <input type="checkbox" id="textbox_tanah_35" name="update[tanah_35]" class="table_input"  data-id-field="136" data-keterangan="" <?php echo ($txn_tanah["jaringan_air_bersih"] == 1) ? "checked" : "" ?>>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Jaringan Gas</span></td>
                                                            <td>
                                                                <input type="checkbox" id="textbox_tanah_36" name="update[tanah_36]" class="table_input"  data-id-field="137" data-keterangan="" <?php echo ($txn_tanah["jaringan_gas"] == 1) ? "checked" : "" ?>>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Taman Pemakaman Umum</span></td>
                                                            <td>
                                                                <input type="checkbox" id="textbox_tanah_37" name="update[tanah_37]" class="table_input"  data-id-field="138" data-keterangan="" <?php echo ($txn_tanah["pemakaman_umum"] == 1) ? "checked" : "" ?>>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Penampungan Sampah</span></td>
                                                            <td>
                                                                <input type="checkbox" id="textbox_tanah_38" name="update[tanah_38]" class="table_input"  data-id-field="139" data-keterangan="" <?php echo ($txn_tanah["penampungan_sampah"] == 1) ? "checked" : "" ?>>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <h4>GAMBARAN UMUM SITE</h4>
                                                <div class="col-md-6">
                                                    <table class="table table_border">
                                                        <colgroup>
                                                            <col style="width: 40%">
                                                        </colgroup>
                                                        <tr>
                                                            <td><span>Topografi / Kontur</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_146_" id="textbox_tanah_45" name="update[tanah_45]" data-id-field="146" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($topografi as $key => $value) {?>
                                                                    <option value="<?php echo $value->topografi ?>" <?php echo ($value->topografi==$txn_tanah["topografi"]) ? "selected":"" ?>><?php echo $value->topografi ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Jenis Tanah</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_147_" id="textbox_tanah_46" name="update[tanah_46]" data-id-field="147" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($jenis_tanah as $key => $value) {?>
                                                                    <option value="<?php echo $value->jenis_tanah ?>" <?php echo ($value->jenis_tanah==$txn_tanah["jenis_tanah"]) ? "selected":"" ?>><?php echo $value->jenis_tanah ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Tata Lingkungan</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_148_" id="textbox_tanah_47" name="update[tanah_47]" data-id-field="148" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_penilaian as $key => $value) { ?>
                                                                    <option value="<?php echo $value->tipe_penilaian ?>" <?php echo ($value->tipe_penilaian==$txn_tanah["tata_lingkungan"]) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Resiko Banjir</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_149_" id="textbox_tanah_48" name="update[tanah_48]" data-id-field="149" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_kejadian as $key => $value) { ?>
                                                                    <option value="<?php echo $value->tipe_kejadian ?>" <?php echo ($value->tipe_kejadian==$txn_tanah["resiko_banjir"]) ? "selected":"" ?>><?php echo $value->tipe_kejadian ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table_border">
                                                        <colgroup>
                                                            <col style="width: 40%">
                                                        </colgroup>
                                                        <tr>
                                                            <td><span>Letak / Posisi Tanah</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_150_" id="textbox_tanah_49" name="update[tanah_49]" data-id-field="150" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($tipe_posisi_tanah as $key => $value) { ?>
                                                                    <option value="<?php echo $value->tipe_posisi_tanah ?>" <?php echo ($value->tipe_posisi_tanah==$txn_tanah["posisi_tanah"]) ? "selected":"" ?>><?php echo $value->tipe_posisi_tanah ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Tinggi Tanah (terhadap jalan) (cm)</span></td>
                                                            <td><input type="text" id="textbox_tanah_50" name="update[tanah_50]" class="form-control table_input input_151_ " value="<?php echo $txn_tanah["tinggi_tanah"] ?>" data-id-field="151" data-keterangan=""></td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Jalur / Ruang Areal SUTT - SUTET (cm)</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_152_" id="textbox_tanah_51" name="update[tanah_51]" data-id-field="152" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($kehadiran as $key => $value) {?>
                                                                    <option value="<?php echo $value->kehadiran ?>" <?php echo ($value->kehadiran==$txn_tanah["ruang_areal_sutet"]) ? "selected":"" ?>><?php echo $value->kehadiran ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Jarak obyek terhadap SUTT - SUTET (m)</span></td>
                                                            <td><input type="text" id="textbox_tanah_52" name="update[tanah_52]" class="form-control table_input input_153_ " value="<?php echo $txn_tanah["jarak_obyek_terhadap_sutet"] ?>" data-id-field="153" data-keterangan=""></td>
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
                                            <div class="table-responsive">
                                                <table id="table_data_legalitas_1" class="table-legalitas table_border_2">
                                                    <colgroup>
                                                    </colgroup>
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="2">
                                                                <span>No</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span>Jenis Sertifikat</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span>Nomor Sertifikat</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span>Atas Nama</span>
                                                            </th>
                                                            <th colspan="2">
                                                                <span>Tanggal Sertifikat</span>
                                                            </th>
                                                            <th colspan="2">
                                                                <select class="form-control table_input input_895_" id="textbox_tanah_87" name="update[tanah_87]" data-id-field="895" data-keterangan="">
                                                                    <option>Select</option>
                                                                    <?php foreach ($sumber_nomor_sertifikat as $key => $value) { ?>
                                                                    <option value="<?php echo $value->sumber_nomor_sertifikat ?>" <?php echo ($value->sumber_nomor_sertifikat==$txn_tanah['sumber_nomor_sertifikat']) ? "selected":"" ?>><?php echo $value->sumber_nomor_sertifikat ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span>Luas Tanah (m<sup>2</sup>)</span>
                                                            </th>
                                                            <th rowspan="2">
                                                                <span></span>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <span>Terbit</span>
                                                            </th>
                                                            <th>
                                                                <span>Berakhir</span>
                                                            </th>
                                                            <th>
                                                                <span>Nomor</span>
                                                            </th>
                                                            <th>
                                                                <span>Tgl-Bln-Thn</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody_data_legalitas_1">
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td align="center" colspan="8">
                                                                <span>TOTAL LUAS TANAH SESUAI SERTIFIKAT</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_tanah_61" name="update[tanah_61]" class="form-control table_input input_162_ " value="<?php echo $txn_tanah["luas"] ?>" data-id-field="162" data-keterangan="" readonly>
                                                            </td>
                                                            <td> </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                            <table class="table-legalitas table_border_2" >
                                                <tfoot>
                                                    <tr>
                                                        <td align="center">
                                                            <span>Total luas tanah yang terpotong (rencana pembangunan / pelebaran jalan)</span>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="textbox_tanah_62" name="update[tanah_62]" class="form-control table_input input_241_ " value="<?php echo $txn_tanah["luas_tanah_terpotong"] ?>" data-id-field="241" data-keterangan="">
                                                        </td>
                                                        <td><span></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                            <span>Luas tanah yang dinilai</span>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="luas-tanah-dinilai" class="form-control text-right" readonly="" value="0">
                                                        </td>
                                                        <td><span></span></td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                            <div style="padding: 10px">
                                                <button type="button" class="btn btn-primary btn-sm btn-data-legalitas" data-type="tambah" data-id="">TAMBAH</button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">K E S I M P U L A N&nbsp;&nbsp;&nbsp;N I L A I&nbsp;&nbsp;&nbsp;T A N A H</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="col-md-6">
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

                                                                    <?php
                                                                    $date_name = "update[tanah_63]";
                                                                    $date_label = "NJOP Tanggal";
                                                                    $date_value = $txn_tanah["tanggal_njop"];
                                                                    $date_id = "textbox_tanah_63";
                                                                    $date_class = "table_input";
                                                                    $date_attr = 'data-id-field="242" data-keterangan=""';

                                                                    echo ( $this->formlib->_generate_input_date($date_name, $date_label, $date_value, true, false, "dd-mm-yyyy", $date_id, $date_class, $date_attr) );
                                                                    ?>

                                                                    <!-- <input type="text" id="textbox_tanah_63" name="update[tanah_63]" class="form-control table_input" value="<?php echo format_ymd($txn_tanah["tanggal_njop"]) ?>" data-id-field="242" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-keterangan="">
                                                                    <script>
                                                                        $(function(){
                                                                            $("#textbox_tanah_63").datepicker();
                                                                        })
                                                                    </script> -->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span>Tanah ( / m<sup>2</sup> )</span></td>
                                                                <td><input type="text" id="textbox_tanah_64" name="update[tanah_64]" class="form-control table_input input_243_ " value="<?php echo $txn_tanah["luas_tanah"] ?>" data-id-field="243" data-keterangan=""></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table_border" cellpadding="0" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2">BERDASARKAN FISIK</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <span>NILAI PASAR</span>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="textbox_tanah_65" name="update[tanah_65]" class="form-control table_input input_244_ text-right" value="<?php echo $txn_tanah["nilai_pasar"] ?>" data-id-field="244" data-keterangan="" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <span>INDIKASI NILAI LIKUIDASI</span>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="textbox_tanah_66" name="update[tanah_66]" class="form-control table_input input_245_ text-right" value="<?php echo $txn_tanah["nilai_likuidasi"] ?>" data-id-field="245" data-keterangan="" readonly>
                                                                </td>
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
                                            <div class="panel-body">
                                                <textarea id="textbox_tanah_67" name="update[tanah_67]" class="form-control table_input input_246_" data-id-field="246" data-keterangan=""><?php echo $txn_tanah["catatan_penilai"] ?></textarea>                                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div role="tabpanel" id="splengkap" <?php echo (isset($_GET["role"]) && $_GET["role"]=="splengkap") ? "class=\"tab-pane active\"" : "class=\"tab-pane\" " ?>>
                        <div class="table-responsive">
                            <table class="table table_border_2 table_sarana" id="" cellpadding="0" cellspacing="0">
                                <colgroup>
                                    <col style="display: none">
                                    <col style="display: none">
                                    <col style="display: none">
                                    <col style="display: none">
                                    <col style="display: none">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th colspan="7" style="background-color: #1680e9; color: #fff;">PERHITUNGAN SARANA PELENGKAP</th>
                                </tr>
                                <tr>
                                    <th>Unit Sarana Pelengkap</th>
                                    <th>Ukuran</th>
                                    <th>Jumlah</th>
                                    <th>Biaya Satuan</th>
                                    <th>BRB / RCN</th>
                                    <th>Dep.</th>
                                    <th>Nilai Pasar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span>Carpot (m<sup>2</sup>)</span></td>
                                        <td>
                                            <input type="text" id="textbox_sarana_1" name="update[sarana_1]" class="form-control table_input input_163_ " value="<?php echo $txn_sarana_pelengkap["carport_keterangan"] ?>" data-id-field="163" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_2" name="update[sarana_2]" class="text-right form-control table_input input_164_ " value="<?php echo $txn_sarana_pelengkap["carport_ukuran"] ?>" data-id-field="164" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_3" name="update[sarana_3]" class="text-right form-control table_input input_165_ " value="<?php echo $txn_sarana_pelengkap["carport_biaya"] ?>" data-id-field="165" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_4" name="update[sarana_4]" class="text-right form-control table_input input_166_ " value="<?php echo $txn_sarana_pelengkap["carport_brb"] ?>" data-id-field="166" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_5" name="update[sarana_5]" class="text-right form-control table_input input_167_ " value="<?php echo $txn_sarana_pelengkap["carport_dep"] ?>" data-id-field="167" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_6" name="update[sarana_6]" class="text-right form-control table_input input_168_ " value="<?php echo $txn_sarana_pelengkap["carport_nilai_pasar"] ?>" data-id-field="168" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Perkerasan (m<sup>2</sup>)</span></td>
                                        <td>
                                            <input type="text" id="textbox_sarana_7" name="update[sarana_7]" class="form-control table_input input_169_ " value="<?php echo $txn_sarana_pelengkap["perkerasan_keterangan"] ?>" data-id-field="169" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_8" name="update[sarana_8]" class="text-right form-control table_input input_170_ " value="<?php echo $txn_sarana_pelengkap["perkerasan_ukuran"] ?>" data-id-field="170" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_9" name="update[sarana_9]" class="text-right form-control table_input input_171_ " value="<?php echo $txn_sarana_pelengkap["perkerasan_biaya"] ?>" data-id-field="171" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_10" name="update[sarana_10]" class="text-right form-control table_input input_172_ " value="<?php echo $txn_sarana_pelengkap["perkerasan_brb"] ?>" data-id-field="172" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_11" name="update[sarana_11]" class="text-right form-control table_input input_173_ " value="<?php echo $txn_sarana_pelengkap["perkerasan_dep"] ?>" data-id-field="173" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_12" name="update[sarana_12]" class="text-right form-control table_input input_174_ " value="<?php echo $txn_sarana_pelengkap["perkerasan_nilai_pasar"] ?>" data-id-field="174" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Pintu Pagar (m<sup>2</sup>)</span></td>
                                        <td>
                                            <input type="text" id="textbox_sarana_13" name="update[sarana_13]" class="form-control table_input input_175_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar_keterangan"] ?>" data-id-field="175" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_14" name="update[sarana_14]" class="text-right form-control table_input input_176_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar_ukuran"] ?>" data-id-field="176" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_15" name="update[sarana_15]" class="text-right form-control table_input input_177_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar_biaya"] ?>" data-id-field="177" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_16" name="update[sarana_16]" class="text-right form-control table_input input_178_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar_brb"] ?>" data-id-field="178" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_17" name="update[sarana_17]" class="text-right form-control table_input input_179_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar_dep"] ?>" data-id-field="179" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_18" name="update[sarana_18]" class="text-right form-control table_input input_180_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar_nilai_pasar"] ?>" data-id-field="180" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Pagar Halaman (m<sup>2</sup>)</span></td>
                                        <td>
                                            <input type="text" id="textbox_sarana_19" name="update[sarana_19]" class="form-control table_input input_181_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman_keterangan"] ?>" data-id-field="181" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_20" name="update[sarana_20]" class="text-right form-control table_input input_182_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman_ukuran"] ?>" data-id-field="182" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_21" name="update[sarana_21]" class="text-right form-control table_input input_183_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman_biaya"] ?>" data-id-field="183" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_22" name="update[sarana_22]" class="text-right form-control table_input input_184_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman_brb"] ?>" data-id-field="184" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_23" name="update[sarana_23]" class="text-right form-control table_input input_185_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman_dep"] ?>" data-id-field="185" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_24" name="update[sarana_24]" class="text-right form-control table_input input_186_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman_nilai_pasar"] ?>" data-id-field="186" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Gapura (m)</span></td>
                                        <td>
                                            <input type="text" id="textbox_sarana_25" name="update[sarana_25]" class="form-control table_input input_187_ " value="<?php echo $txn_sarana_pelengkap["gapura_keterangan"] ?>" data-id-field="187" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_26" name="update[sarana_26]" class="text-right form-control table_input input_188_ " value="<?php echo $txn_sarana_pelengkap["gapura_ukuran"] ?>" data-id-field="188" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_27" name="update[sarana_27]" class="text-right form-control table_input input_189_ " value="<?php echo $txn_sarana_pelengkap["gapura_biaya"] ?>" data-id-field="189" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_28" name="update[sarana_28]" class="text-right form-control table_input input_190_ " value="<?php echo $txn_sarana_pelengkap["gapura_brb"] ?>" data-id-field="190" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_29" name="update[sarana_29]" class="text-right form-control table_input input_191_ " value="<?php echo $txn_sarana_pelengkap["gapura_dep"] ?>" data-id-field="191" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_30" name="update[sarana_30]" class="text-right form-control table_input input_192_ " value="<?php echo $txn_sarana_pelengkap["gapura_nilai_pasar"] ?>" data-id-field="192" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Taman / Lanscaping</span></td>
                                        <td>
                                            <input type="text" id="textbox_sarana_31" name="update[sarana_31]" class="form-control table_input input_193_ " value="<?php echo $txn_sarana_pelengkap["taman_keterangan"] ?>" data-id-field="193" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_32" name="update[sarana_32]" class="text-right form-control table_input input_194_ " value="<?php echo $txn_sarana_pelengkap["taman_ukuran"] ?>" data-id-field="194" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_33" name="update[sarana_33]" class="text-right form-control table_input input_195_ " value="<?php echo $txn_sarana_pelengkap["taman_biaya"] ?>" data-id-field="195" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_34" name="update[sarana_34]" class="text-right form-control table_input input_196_ " value="<?php echo $txn_sarana_pelengkap["taman_brb"] ?>" data-id-field="196" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_35" name="update[sarana_35]" class="text-right form-control table_input input_197_ " value="<?php echo $txn_sarana_pelengkap["taman_dep"] ?>" data-id-field="197" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_36" name="update[sarana_36]" class="text-right form-control table_input input_198_ " value="<?php echo $txn_sarana_pelengkap["taman_nilai_pasar"] ?>" data-id-field="198" data-keterangan="" readonly>
                                        </td>
                                    </tr>

                                    <tr style="font-weight: bold;">
                                        <td align="right" colspan="4" style="background-color: #eee;" colspan="4"><span>TOTAL SARANA PELENGKAP</span></td>
                                        <td><input type="text" id="textbox_sarana_37" name="update[sarana_37]" class="text-right form-control table_input input_199_ " value="" data-id-field="199" data-keterangan="" readonly></td>
                                        <td style="background-color: #eee;"></td>
                                        <td><input type="text" id="textbox_sarana_38" name="update[sarana_38]" class="text-right form-control table_input input_200_ " value="" data-id-field="200" data-keterangan="" readonly></td>
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
                                        <td>
                                            <input type="text" id="textbox_sarana_39" name="update[sarana_39]" class="form-control table_input input_201_ " value="<?php echo $txn_sarana_pelengkap["carport2_keterangan"] ?>" data-id-field="201" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_40" name="update[sarana_40]" class="text-right form-control table_input input_202_ " value="<?php echo $txn_sarana_pelengkap["carport2_terpotong_ukuran"] ?>" data-id-field="202" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_41" name="update[sarana_41]" class="text-right form-control table_input input_203_ " value="<?php echo $txn_sarana_pelengkap["carport2_terpotong_biaya"] ?>" data-id-field="203" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_42" name="update[sarana_42]" class="text-right form-control table_input input_204_ " value="<?php echo $txn_sarana_pelengkap["carport2_terpotong_brb"] ?>" data-id-field="204" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_43" name="update[sarana_43]" class="text-right form-control table_input input_205_ " value="<?php echo $txn_sarana_pelengkap["carport2_terpotong_dep"] ?>" data-id-field="205" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_44" name="update[sarana_44]" class="text-right form-control table_input input_206_ " value="<?php echo $txn_sarana_pelengkap["carport2_terpotong_nilai_pasar"] ?>" data-id-field="206" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Perkerasan (m<sup>2</sup>)</span></td>
                                        <td>
                                            <input type="text" id="textbox_sarana_45" name="update[sarana_45]" class="form-control table_input input_207_ " value="<?php echo $txn_sarana_pelengkap["perkerasan2_keterangan"] ?>" data-id-field="207" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_46" name="update[sarana_46]" class="text-right form-control table_input input_208_ " value="<?php echo $txn_sarana_pelengkap["perkerasan2_ukuran"] ?>" data-id-field="208" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_47" name="update[sarana_47]" class="text-right form-control table_input input_209_ " value="<?php echo $txn_sarana_pelengkap["perkerasan2_biaya"] ?>" data-id-field="209" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_48" name="update[sarana_48]" class="text-right form-control table_input input_210_ " value="<?php echo $txn_sarana_pelengkap["perkerasan2_brb"] ?>" data-id-field="210" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_49" name="update[sarana_49]" class="text-right form-control table_input input_211_ " value="<?php echo $txn_sarana_pelengkap["perkerasan2_dep"] ?>" data-id-field="211" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_50" name="update[sarana_50]" class="text-right form-control table_input input_212_ " value="<?php echo $txn_sarana_pelengkap["perkerasan2_nilai_pasar"] ?>" data-id-field="212" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Pintu Pagar (m<sup>2</sup>)</span></td>
                                        <td>
                                            <input type="text" id="textbox_sarana_51" name="update[sarana_51]" class="form-control table_input input_213_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar2_keterangan"] ?>" data-id-field="213" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_52" name="update[sarana_52]" class="text-right form-control table_input input_214_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar2_ukuran"] ?>" data-id-field="214" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_53" name="update[sarana_53]" class="text-right form-control table_input input_215_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar2_biaya"] ?>" data-id-field="215" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_54" name="update[sarana_54]" class="text-right form-control table_input input_216_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar2_brb"] ?>" data-id-field="216" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_55" name="update[sarana_55]" class="text-right form-control table_input input_217_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar2_dep"] ?>" data-id-field="217" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_56" name="update[sarana_56]" class="text-right form-control table_input input_218_ " value="<?php echo $txn_sarana_pelengkap["pintu_pagar2_nilai_pasar"] ?>" data-id-field="218" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Pagar Halaman (m<sup>2</sup>)</span></td>
                                        <td>
                                            <input type="text" id="textbox_sarana_57" name="update[sarana_57]" class="form-control table_input input_219_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman2_keterangan"] ?>" data-id-field="219" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_58" name="update[sarana_58]" class="text-right form-control table_input input_220_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman2_ukuran"] ?>" data-id-field="220" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_59" name="update[sarana_59]" class="text-right form-control table_input input_221_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman2_biaya"] ?>" data-id-field="221" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_60" name="update[sarana_60]" class="text-right form-control table_input input_222_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman2_brb"] ?>" data-id-field="222" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_61" name="update[sarana_61]" class="text-right form-control table_input input_223_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman2_dep"] ?>" data-id-field="223" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_62" name="update[sarana_62]" class="text-right form-control table_input input_224_ " value="<?php echo $txn_sarana_pelengkap["pagar_halaman2_nilai_pasar"] ?>" data-id-field="224" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Gapura (m)</span></td>
                                        <td>
                                            <input type="text" id="textbox_sarana_63" name="update[sarana_63]" class="form-control table_input input_225_ " value="<?php echo $txn_sarana_pelengkap["gapura2_keterangan"] ?>" data-id-field="225" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_64" name="update[sarana_64]" class="text-right form-control table_input input_226_ " value="<?php echo $txn_sarana_pelengkap["gapura2_ukuran"] ?>" data-id-field="226" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_65" name="update[sarana_65]" class="text-right form-control table_input input_227_ " value="<?php echo $txn_sarana_pelengkap["gapura2_biaya"] ?>" data-id-field="227" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_66" name="update[sarana_66]" class="text-right form-control table_input input_228_ " value="<?php echo $txn_sarana_pelengkap["gapura2_brb"] ?>" data-id-field="228" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_67" name="update[sarana_67]" class="text-right form-control table_input input_229_ " value="<?php echo $txn_sarana_pelengkap["gapura2_dep"] ?>" data-id-field="229" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_68" name="update[sarana_68]" class="text-right form-control table_input input_230_ " value="<?php echo $txn_sarana_pelengkap["gapura2_nilai_pasar"] ?>" data-id-field="230" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span>Taman / Lanscaping</span></td>
                                        <td>
                                            <input type="text" id="textbox_sarana_69" name="update[sarana_69]" class="form-control table_input input_231_ " value="<?php echo $txn_sarana_pelengkap["taman2_keterangan"] ?>" data-id-field="231" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_70" name="update[sarana_70]" class="text-right form-control table_input input_232_ " value="<?php echo $txn_sarana_pelengkap["taman2_ukuran"] ?>" data-id-field="232" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_71" name="update[sarana_71]" class="text-right form-control table_input input_233_ " value="<?php echo $txn_sarana_pelengkap["taman2_biaya"] ?>" data-id-field="233" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_72" name="update[sarana_72]" class="text-right form-control table_input input_234_ " value="<?php echo $txn_sarana_pelengkap["taman2_brb"] ?>" data-id-field="234" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_73" name="update[sarana_73]" class="text-right form-control table_input input_235_ " value="<?php echo $txn_sarana_pelengkap["taman2_dep"] ?>" data-id-field="235" data-keterangan="">
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_sarana_74" name="update[sarana_74]" class="text-right form-control table_input input_236_ " value="<?php echo $txn_sarana_pelengkap["taman2_nilai_pasar"] ?>" data-id-field="236" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr style="font-weight: bold;">
                                        <td align="right" colspan="4" style="background-color: #eee;"><span>TOTAL SARANA PELENGKAP</span></td>
                                        <td ><input type="text" id="textbox_sarana_75" name="update[sarana_75]" class="text-right form-control table_input input_237_ " value="" data-id-field="237" data-keterangan="" readonly></td>
                                        <td style="background-color: #eee;"></td>
                                        <td><input type="text" id="textbox_sarana_76" name="update[sarana_76]" class="text-right form-control table_input input_238_ " value="" data-id-field="238" data-keterangan="" readonly></td>
                                    </tr>
                                    <tr style="font-weight: bold;">
                                        <td align="right" colspan="4" style="background-color: #1680e9; color: #fff;"><span>SISA TOTAL SARANA PELENGKAP</span></td>
                                        <td><input type="text" id="textbox_sarana_77" name="update[sarana_77]" class="text-right form-control table_input input_239_ " value="" data-id-field="239" data-keterangan="" readonly></td>
                                        <td style="background-color: #eee;"></td>
                                        <td><input type="text" id="textbox_sarana_78" name="update[sarana_78]" class="text-right form-control table_input input_240_ " value="" data-id-field="240" data-keterangan="" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">CATATAN PENILAI</h3>
                            </div>
                            <div class="panel-body">
                                <textarea name="update[sarana_pelengkap_862]" class="form-control table_input input_862_" data-id-field="862" data-keterangan=""><?php echo $txn_sarana_pelengkap["catatan_penilai"] ?></textarea>                                       
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" id="dbanding" <?php echo (isset($_GET["role"]) && $_GET["role"]=="dbanding") ? "class=\"tab-pane active\"" : "class=\"tab-pane\" " ?>>
                        <div id="table_pembanding">
                            <input type="hidden" id="jumlah_pembanding" value="4">
                            <div class="table-responsive table_div">
                                <table class="table-movefield table_border_3">
                                    <colgroup>
                                        <col style="width: 240px">
                                        <col style="width: 240px">
                                        <col style="width: 240px">
                                        <col style="width: 240px">
                                        <col style="width: 240px">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>
                                                <span>URAIAN</span>
                                            </th>
                                            <th>
                                                <span>Objek Penilaian</span>
                                            </th>
                                            <th>
                                                <span>Pembanding 1</span>
                                            </th>
                                            <th>
                                                <span>Pembanding 2</span>
                                            </th>
                                            <th>
                                                <span>Pembanding 3</span>
                                                <!-- <span id="btnAddcloseBanding">
                                                    <button type="button" class="btn btn-info btn-sm" id="addPembanding">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </span> -->
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span>TAMPAK DEPAN PROPERTI</span></td>
                                            <td>
                                                <img id="img_pembanding_1" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_0["foto_1"]) ? "default.jpg" : $txn_data_banding_0["foto_1"]; ?>" data-id-field="247"  data-name-field="pembanding_1" data-keterangan="0" class="btn-upload-image img-247-0 img-responsive" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-247" class="form-control tmp_file file-247-0" data-id-field="247" data-name-field="pembanding_1" style="display: none;" data-keterangan="0">
                                                <input type="hidden" id="textbox_pembanding_1" name="update[pembanding_1]" class="form-control table_input textbox-247-0" value="<?php echo empty($txn_data_banding_0["foto_1"]) ? "default.jpg" : $txn_data_banding_0["foto_1"]; ?>" data-id-field="247" data-name-field="pembanding_1" data-keterangan="0">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_1" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_1["foto_1"]) ? "default.jpg" : $txn_data_banding_1["foto_1"]; ?>" data-id-field="247"  data-name-field="pembanding_1" data-keterangan="1" class="btn-upload-image img-247-1 img-responsive" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-247" class="form-control tmp_file file-247-1" data-id-field="247" data-name-field="pembanding_1" style="display: none;" data-keterangan="1">
                                                <input type="hidden" id="textbox_pembanding_1" name="update[pembanding_1]" class="form-control table_input textbox-247-1" value="<?php echo empty($txn_data_banding_1["foto_1"]) ? "default.jpg" : $txn_data_banding_1["foto_1"]; ?>" data-id-field="247" data-name-field="pembanding_1" data-keterangan="1">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_1" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_2["foto_1"]) ? "default.jpg" : $txn_data_banding_2["foto_1"]; ?>" data-id-field="247"  data-name-field="pembanding_1" data-keterangan="2" class="btn-upload-image img-247-2 img-responsive" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-247" class="form-control tmp_file file-247-2" data-id-field="247" data-name-field="pembanding_1" style="display: none;" data-keterangan="2">
                                                <input type="hidden" id="textbox_pembanding_1" name="update[pembanding_1]" class="form-control table_input textbox-247-2" value="<?php echo empty($txn_data_banding_2["foto_1"]) ? "default.jpg" : $txn_data_banding_2["foto_1"]; ?>" data-id-field="247" data-name-field="pembanding_1" data-keterangan="2">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_1" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_3["foto_1"]) ? "default.jpg" : $txn_data_banding_3["foto_1"]; ?>" data-id-field="247"  data-name-field="pembanding_1" data-keterangan="3" class="btn-upload-image img-247-3 img-responsive" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-247" class="form-control tmp_file file-247-3" data-id-field="247" data-name-field="pembanding_1" style="display: none;" data-keterangan="3">
                                                <input type="hidden" id="textbox_pembanding_1" name="update[pembanding_1]" class="form-control table_input textbox-247-3" value="<?php echo empty($txn_data_banding_3["foto_1"]) ? "default.jpg" : $txn_data_banding_3["foto_1"]; ?>" data-id-field="247" data-name-field="pembanding_1" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>TAMPAK JALAN DI DEPAN PROPERTI</span></td>
                                            <td>
                                                <img id="img_pembanding_2" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_0["foto_2"]) ? "default.jpg" : $txn_data_banding_0["foto_2"]; ?>" data-id-field="248"  data-name-field="pembanding_2" data-keterangan="0" class="btn-upload-image img-248-0 img-responsive" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-248" class="form-control tmp_file file-248-0" data-id-field="248" data-name-field="pembanding_2" style="display: none;" data-keterangan="0">
                                                <input type="hidden" id="textbox_pembanding_2" name="update[pembanding_2]" class="form-control table_input textbox-248-0" value="<?php echo empty($txn_data_banding_0["foto_2"]) ? "default.jpg" : $txn_data_banding_0["foto_2"]; ?>" data-id-field="248" data-name-field="pembanding_2" data-keterangan="0">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_2" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_1["foto_2"]) ? "default.jpg" : $txn_data_banding_1["foto_2"]; ?>" data-id-field="248"  data-name-field="pembanding_2" data-keterangan="1" class="btn-upload-image img-248-1 img-responsive" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-248" class="form-control tmp_file file-248-1" data-id-field="248" data-name-field="pembanding_2" style="display: none;" data-keterangan="1">
                                                <input type="hidden" id="textbox_pembanding_2" name="update[pembanding_2]" class="form-control table_input textbox-248-1" value="<?php echo empty($txn_data_banding_1["foto_2"]) ? "default.jpg" : $txn_data_banding_1["foto_2"]; ?>" data-id-field="248" data-name-field="pembanding_2" data-keterangan="1">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_2" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_2["foto_2"]) ? "default.jpg" : $txn_data_banding_2["foto_2"]; ?>" data-id-field="248"  data-name-field="pembanding_2" data-keterangan="2" class="btn-upload-image img-248-2 img-responsive" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-248" class="form-control tmp_file file-248-2" data-id-field="248" data-name-field="pembanding_2" style="display: none;" data-keterangan="2">
                                                <input type="hidden" id="textbox_pembanding_2" name="update[pembanding_2]" class="form-control table_input textbox-248-2" value="<?php echo empty($txn_data_banding_2["foto_2"]) ? "default.jpg" : $txn_data_banding_2["foto_2"]; ?>" data-id-field="248" data-name-field="pembanding_2" data-keterangan="2">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_2" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_3["foto_2"]) ? "default.jpg" : $txn_data_banding_3["foto_2"]; ?>" data-id-field="248"  data-name-field="pembanding_2" data-keterangan="3" class="btn-upload-image img-248-3 img-responsive" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-248" class="form-control tmp_file file-248-3" data-id-field="248" data-name-field="pembanding_2" style="display: none;" data-keterangan="3">
                                                <input type="hidden" id="textbox_pembanding_2" name="update[pembanding_2]" class="form-control table_input textbox-248-3" value="<?php echo empty($txn_data_banding_3["foto_2"]) ? "default.jpg" : $txn_data_banding_3["foto_2"]; ?>" data-id-field="248" data-name-field="pembanding_2" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 10px 0; font-weight: bold;"><span>INFORMASI</span></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><span>Sumber Data (Nama) </span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_3" name="update[pembanding_3]" class="form-control table_input input_249_0 0" value="<?php echo (empty($txn_kertas_kerja["klien"])) ? $klien : $txn_kertas_kerja["klien"] ?>" data-id-field="249" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_3" name="update[pembanding_3]" class="form-control table_input input_249_1 1" value="<?php echo empty($txn_data_banding_1["sumber_data_nama"]) ? "" : $txn_data_banding_1["sumber_data_nama"] ?>" data-id-field="249" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_3" name="update[pembanding_3]" class="form-control table_input input_249_2 2" value="<?php echo empty($txn_data_banding_2["sumber_data_nama"]) ? "" : $txn_data_banding_2["sumber_data_nama"] ?>" data-id-field="249" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_3" name="update[pembanding_3]" class="form-control table_input input_249_3 3" value="<?php echo empty($txn_data_banding_3["sumber_data_nama"]) ? "" : $txn_data_banding_3["sumber_data_nama"] ?>" data-id-field="249" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Keterangan Sumber Data</span></td>
                                            <td>
                                                <input style="width: 1px;height:1px" class="form-control">
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_250_1" id="textbox_pembanding_4" name="update[pembanding_4]" data-id-field="250" data-keterangan="1">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($keterangan_sumber_data as $key => $value) { ?>
                                                    <option value="<?php echo $value->keterangan_sumber_data ?>" <?php echo ($value->keterangan_sumber_data==$txn_data_banding_1["sumber_data_keterangan"]) ? "selected" : "" ?>><?php echo $value->keterangan_sumber_data ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_250_2" id="textbox_pembanding_4" name="update[pembanding_4]" data-id-field="250" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($keterangan_sumber_data as $key => $value) { ?>
                                                    <option value="<?php echo $value->keterangan_sumber_data ?>" <?php echo ($value->keterangan_sumber_data==$txn_data_banding_2["sumber_data_keterangan"]) ? "selected" : "" ?>><?php echo $value->keterangan_sumber_data ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_250_3" id="textbox_pembanding_4" name="update[pembanding_4]" data-id-field="250" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($keterangan_sumber_data as $key => $value) { ?>
                                                    <option value="<?php echo $value->keterangan_sumber_data ?>" <?php echo ($value->keterangan_sumber_data==$txn_data_banding_3["sumber_data_keterangan"]) ? "selected" : "" ?>><?php echo $value->keterangan_sumber_data ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Telepon / Hp. </span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_5" name="update[pembanding_5]" class="form-control table_input input_251_0 0" value="<?php echo $txn_kertas_kerja["telepon_klien"] ?>" data-id-field="251" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_5" name="update[pembanding_5]" class="form-control table_input input_251_1 1" value="<?php echo $txn_data_banding_1["sumber_data_telepon"] ?>" data-id-field="251" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_5" name="update[pembanding_5]" class="form-control table_input input_251_2 2" value="<?php echo $txn_data_banding_2["sumber_data_telepon"] ?>" data-id-field="251" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_5" name="update[pembanding_5]" class="form-control table_input input_251_3 3" value="<?php echo $txn_data_banding_3["sumber_data_telepon"] ?>" data-id-field="251" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Jenis Properti </span></td>
                                            <td>
                                                <input id="textbox_pembanding_6" name="update[pembanding_6]" class="form-control table_input input_252_0" value="<?php echo (empty($txn_kertas_kerja["obyek_penilaian"])) ? $obyek_penilaian : $txn_kertas_kerja["obyek_penilaian"] ?>" data-id-field="252" data-keterangan="0" type="text" readonly>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_252_1" id="textbox_pembanding_6" name="update[pembanding_6]" data-id-field="252" data-keterangan="1">
                                                <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($jenis_properti as $key => $value) { ?>
                                                    <option value="<?php echo $value->jenis_properti ?>" <?php echo ($value->jenis_properti==$txn_data_banding_1["jenis_properti"]) ? "selected" : "" ?>><?php echo $value->jenis_properti ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_252_2" id="textbox_pembanding_6" name="update[pembanding_6]" data-id-field="252" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($jenis_properti as $key => $value) { ?>
                                                    <option value="<?php echo $value->jenis_properti ?>" <?php echo ($value->jenis_properti==$txn_data_banding_2["jenis_properti"]) ? "selected" : "" ?>><?php echo $value->jenis_properti ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_252_3" id="textbox_pembanding_6" name="update[pembanding_6]" data-id-field="252" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($jenis_properti as $key => $value) { ?>
                                                    <option value="<?php echo $value->jenis_properti ?>" <?php echo ($value->jenis_properti==$txn_data_banding_3["jenis_properti"]) ? "selected" : "" ?>><?php echo $value->jenis_properti ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Alamat</span></td>
                                            <td>
                                                <textarea id="textbox_pembanding_7" name="update[pembanding_7]" class="form-control table_input input_253_0 0" data-id-field="253" data-keterangan="0" rows="5" readonly><?php echo (empty($txn_kertas_kerja["alamat_properti"])) ? $alamat_properti : $txn_kertas_kerja["alamat_properti"] ?></textarea>
                                            </td>
                                            <td>
                                                <textarea id="textbox_pembanding_7" name="update[pembanding_7]" class="form-control table_input input_253_1 1" data-id-field="253" data-keterangan="1" rows="5"><?php echo $txn_data_banding_1["alamat"] ?></textarea>
                                            </td>
                                            <td>
                                                <textarea id="textbox_pembanding_7" name="update[pembanding_7]" class="form-control table_input input_253_2 2" data-id-field="253" data-keterangan="2" rows="5"><?php echo $txn_data_banding_2["alamat"] ?></textarea>
                                            </td>
                                            <td>
                                                <textarea id="textbox_pembanding_7" name="update[pembanding_7]" class="form-control table_input input_253_3 3" data-id-field="253" data-keterangan="3" rows="5"><?php echo $txn_data_banding_3["alamat"] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Latitude</span></td>
                                            <td>
                                                <input type="text" id="latitude_pembanding_0" name="update[pembanding_9900]" class="form-control table_input input_9900_0 0" value="<?php echo $lokasi->latitude ?>" data-id-field="9900" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="latitude_pembanding_1" name="update[pembanding_9900]" class="form-control table_input input_9900_1 1" value="<?php echo $txn_data_banding_1["latitude"] ?>" data-id-field="9900" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="latitude_pembanding_2" name="update[pembanding_9900]" class="form-control table_input input_9900_2 2" value="<?php echo $txn_data_banding_2["latitude"] ?>" data-id-field="9900" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="latitude_pembanding_3" name="update[pembanding_9900]" class="form-control table_input input_9900_3 3" value="<?php echo $txn_data_banding_3["latitude"] ?>" data-id-field="9900" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Longitude</span></td>
                                            <td>
                                                <input type="text" id="longitude_pembanding_0" name="update[pembanding_9901]" class="form-control table_input input_9901_0 0" value="<?php echo $lokasi->longitude ?>" data-id-field="9901" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="longitude_pembanding_1" name="update[pembanding_9901]" class="form-control table_input input_9901_1 1" value="<?php echo $txn_data_banding_1["longitude"] ?>" data-id-field="9901" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="longitude_pembanding_2" name="update[pembanding_9901]" class="form-control table_input input_9901_2 2" value="<?php echo $txn_data_banding_2["longitude"] ?>" data-id-field="9901" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="longitude_pembanding_3" name="update[pembanding_9901]" class="form-control table_input input_9901_3 3" value="<?php echo $txn_data_banding_3["longitude"] ?>" data-id-field="9901" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Set Lokasi</span></td>
                                            <td>
                                                <input class="form-control" type="button" value="Input Lokasi" onclick="open_map('0')">
                                            </td>
                                            <td>
                                                <input class="form-control" type="button" value="Input Lokasi" onclick="open_map('1')">
                                            </td>
                                            <td>
                                                <input class="form-control" type="button" value="Input Lokasi" onclick="open_map('2')"></td>
                                            <td>
                                                <input class="form-control" type="button" value="Input Lokasi" onclick="open_map('3')">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Jarak dengan obyek </span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_8" name="update[pembanding_8]" class="form-control table_input input_254_0 0" value="<?php echo $txn_data_banding_0["jarak_dengan_objek"] ?>" data-id-field="254" data-keterangan="0">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_8" name="update[pembanding_8]" class="form-control table_input input_254_1 1" value="<?php echo $txn_data_banding_1["jarak_dengan_objek"] ?>" data-id-field="254" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_8" name="update[pembanding_8]" class="form-control table_input input_254_2 2" value="<?php echo $txn_data_banding_2["jarak_dengan_objek"] ?>" data-id-field="254" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_8" name="update[pembanding_8]" class="form-control table_input input_254_3 3" value="<?php echo $txn_data_banding_3["jarak_dengan_objek"] ?>" data-id-field="254" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Harga penawaran </span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_9" name="update[pembanding_9]" class="form-control table_input input_255_0 0" value="<?php echo $txn_data_banding_0["harga_penawaran"] ?>" data-id-field="255" data-keterangan="0">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_9" name="update[pembanding_9]" class="form-control table_input input_255_1 1" value="<?php echo $txn_data_banding_1["harga_penawaran"] ?>" data-id-field="255" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_9" name="update[pembanding_9]" class="form-control table_input input_255_2 2" value="<?php echo $txn_data_banding_2["harga_penawaran"] ?>" data-id-field="255" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_9" name="update[pembanding_9]" class="form-control table_input input_255_3 3" value="<?php echo $txn_data_banding_3["harga_penawaran"] ?>" data-id-field="255" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Perkiraan diskon </span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_10" name="update[pembanding_10]" class="form-control table_input input_256_0 0" value="<?php echo $txn_data_banding_0["perkiraan_diskon"] ?>" data-id-field="256" data-keterangan="0">
                                            </td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_10" name="update[pembanding_10]" class="form-control table_input input_256_1 1" value="<?php echo $txn_data_banding_1["perkiraan_diskon"] ?>" data-id-field="256" data-keterangan="1">
                                                <span class="percent-sign">%</span>
                                            </td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_10" name="update[pembanding_10]" class="form-control table_input input_256_2 2" value="<?php echo $txn_data_banding_2["perkiraan_diskon"] ?>" data-id-field="256" data-keterangan="2">
                                                <span class="percent-sign">%</span>
                                            </td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_10" name="update[pembanding_10]" class="form-control table_input input_256_3 3" value="<?php echo $txn_data_banding_3["perkiraan_diskon"] ?>" data-id-field="256" data-keterangan="3">
                                                <span class="percent-sign">%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Indikasi harga transaksi </span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_11" name="update[pembanding_11]" class="form-control table_input input_257_0 0" value="<?php echo $txn_data_banding_0["indikasi_harga_transaksi"] ?>" data-id-field="257" data-keterangan="0">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_11" name="update[pembanding_11]" class="form-control table_input input_257_1 1" value="<?php echo $txn_data_banding_1["indikasi_harga_transaksi"] ?>" data-id-field="257" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_11" name="update[pembanding_11]" class="form-control table_input input_257_2 2" value="<?php echo $txn_data_banding_2["indikasi_harga_transaksi"] ?>" data-id-field="257" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_11" name="update[pembanding_11]" class="form-control table_input input_257_3 3" value="<?php echo $txn_data_banding_3["indikasi_harga_transaksi"] ?>" data-id-field="257" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Waktu penawaran / transaksi </span></td>
                                            <td><input style="width: 1px;height:1px" class="form-control"></td>
                                            <td>
                                                <select class="form-control table_input input_258_1" id="textbox_pembanding_12" name="update[pembanding_12]" data-id-field="258" data-keterangan="1">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($waktu_penawaran as $key => $value) { ?>
                                                    <option value="<?php echo $value->waktu_penawaran ?>" <?php echo ($value->waktu_penawaran==$txn_data_banding_1["waktu_penawaran"]) ? "selected" : "" ?>><?php echo $value->waktu_penawaran ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_258_2" id="textbox_pembanding_12" name="update[pembanding_12]" data-id-field="258" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($waktu_penawaran as $key => $value) { ?>
                                                    <option value="<?php echo $value->waktu_penawaran ?>" <?php echo ($value->waktu_penawaran==$txn_data_banding_1["waktu_penawaran"]) ? "selected" : "" ?>><?php echo $value->waktu_penawaran ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_258_3" id="textbox_pembanding_12" name="update[pembanding_12]" data-id-field="258" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($waktu_penawaran as $key => $value) { ?>
                                                    <option value="<?php echo $value->waktu_penawaran ?>" <?php echo ($value->waktu_penawaran==$txn_data_banding_1["waktu_penawaran"]) ? "selected" : "" ?>><?php echo $value->waktu_penawaran ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <!--Spesifikasi data-->
                                        <tr>
                                            <td style="padding: 10px 0; font-weight: bold;"><span>SPESIFIKASI DATA</span></td>
                                            <td>
                                                <input style="width: 1px;height:1px" class="form-control">
                                            </td>
                                            <td>
                                                <input style="width: 1px;height:1px" class="form-control">
                                            </td>
                                            <td>
                                                <input style="width: 1px;height:1px" class="form-control">
                                            </td>
                                            <td>
                                                <input style="width: 1px;height:1px" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Dokumen / legalitas</span></td>
                                            <td>
                                                <input id="textbox_pembanding_13" name="update[pembanding_6]" class="form-control table_input input_259_0 readonly" value="" data-id-field="252" data-keterangan="0" type="text" readonly>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_259_1" id="textbox_pembanding_13" name="update[pembanding_13]" data-id-field="259" data-keterangan="1">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_legalitas_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_legalitas_tanah ?>" <?php echo ($value->tipe_legalitas_tanah==$txn_data_banding_1["dokumen_legalitas"]) ? "selected" : "" ?>><?php echo $value->tipe_legalitas_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_259_2" id="textbox_pembanding_13" name="update[pembanding_13]" data-id-field="259" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_legalitas_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_legalitas_tanah ?>" <?php echo ($value->tipe_legalitas_tanah==$txn_data_banding_2["dokumen_legalitas"]) ? "selected" : "" ?>><?php echo $value->tipe_legalitas_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_259_3" id="textbox_pembanding_13" name="update[pembanding_13]" data-id-field="259" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_legalitas_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_legalitas_tanah ?>" <?php echo ($value->tipe_legalitas_tanah==$txn_data_banding_3["dokumen_legalitas"]) ? "selected" : "" ?>><?php echo $value->tipe_legalitas_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Luas tanah </span>
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_14" name="update[pembanding_14]" class="form-control table_input input_260_0 0" value="<?php echo empty($txn_data_banding_0["luas_tanah"]) ? $txn_tanah['luas'] : $txn_data_banding_0["luas_tanah"] ?>" data-id-field="260" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_14" name="update[pembanding_14]" class="form-control table_input input_260_1 1" value="<?php echo $txn_data_banding_1["luas_tanah"] ?>" data-id-field="260" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_14" name="update[pembanding_14]" class="form-control table_input input_260_2 2" value="<?php echo $txn_data_banding_2["luas_tanah"] ?>" data-id-field="260" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_14" name="update[pembanding_14]" class="form-control table_input input_260_3 3" value="<?php echo $txn_data_banding_3["luas_tanah"] ?>" data-id-field="260" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Luas bangunan</span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_15" name="update[pembanding_15]" class="form-control table_input input_261_0 0" value="<?php echo $txn_data_banding_0["luas_bangunan"] ?>" data-id-field="261" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_15" name="update[pembanding_15]" class="form-control table_input input_261_1 1" value="<?php echo $txn_data_banding_1["luas_bangunan"] ?>" data-id-field="261" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_15" name="update[pembanding_15]" class="form-control table_input input_261_2 2" value="<?php echo $txn_data_banding_2["luas_bangunan"] ?>" data-id-field="261" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_15" name="update[pembanding_15]" class="form-control table_input input_261_3 3" value="<?php echo $txn_data_banding_3["luas_bangunan"] ?>" data-id-field="261" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Jumlah lantai bangunan </span></td>
                                            <td>
                                                <input id="textbox_pembanding_16" name="update[pembanding_6]" class="form-control table_input input_262_0 readonly" value="<?php echo $txn_data_banding_0["jumlah_lantai"] ?>" data-id-field="262" data-keterangan="0" type="text" readonly>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_262_1" id="textbox_pembanding_16" name="update[pembanding_16]" data-id-field="262" data-keterangan="1">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php for($i = 0; $i <= 7; $i++){ ?>
                                                    <option value="<?php echo $i ?>" <?php echo ($i == $txn_data_banding_1["jumlah_lantai"]) ? "selected" : "" ?>><?php echo $i ?> Lantai</option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_262_2" id="textbox_pembanding_16" name="update[pembanding_16]" data-id-field="262" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php for($i = 0; $i <= 7; $i++){ ?>
                                                    <option value="<?php echo $i ?>" <?php echo ($i == $txn_data_banding_2["jumlah_lantai"]) ? "selected" : "" ?>><?php echo $i ?> Lantai</option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_262_3" id="textbox_pembanding_16" name="update[pembanding_16]" data-id-field="262" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php for($i = 0; $i <= 7; $i++){ ?>
                                                    <option value="<?php echo $i ?>" <?php echo ($i == $txn_data_banding_3["jumlah_lantai"]) ? "selected" : "" ?>><?php echo $i ?> Lantai</option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Tahun di bangun </span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_17" name="update[pembanding_17]" class="form-control table_input input_263_0 0" value="<?php echo $txn_data_banding_0["tahun_dibangun"] ?>" data-id-field="263" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_17" name="update[pembanding_17]" class="form-control table_input input_263_1 1" value="<?php echo $txn_data_banding_1["tahun_dibangun"] ?>" data-id-field="263" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_17" name="update[pembanding_17]" class="form-control table_input input_263_2 2" value="<?php echo $txn_data_banding_2["tahun_dibangun"] ?>" data-id-field="263" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_17" name="update[pembanding_17]" class="form-control table_input input_263_3 3" value="<?php echo $txn_data_banding_3["tahun_dibangun"] ?>" data-id-field="263" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Lebar jalan </span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_18" name="update[pembanding_18]" class="form-control table_input input_264_0 0" value="<?php echo $txn_data_banding_0["lebar_jalan"] ?>" data-id-field="264" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_18" name="update[pembanding_18]" class="form-control table_input input_264_1 1" value="<?php echo $txn_data_banding_1["lebar_jalan"] ?>" data-id-field="264" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_18" name="update[pembanding_18]" class="form-control table_input input_264_2 2" value="<?php echo $txn_data_banding_2["lebar_jalan"] ?>" data-id-field="264" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_18" name="update[pembanding_18]" class="form-control table_input input_264_3 3" value="<?php echo $txn_data_banding_3["lebar_jalan"] ?>" data-id-field="264" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Bentuk tanah </span></td>
                                            <td>
                                                <select class="form-control table_input input_265_0" id="textbox_pembanding_19" name="update[pembanding_19]" data-id-field="265" data-keterangan="0">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($bentuk_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->bentuk_tanah ?>" <?php echo ($value->bentuk_tanah==$txn_data_banding_0["bentuk_tanah"]) ? "selected":"" ?>><?php echo $value->bentuk_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_265_1" id="textbox_pembanding_19" name="update[pembanding_19]" data-id-field="265" data-keterangan="1">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($bentuk_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->bentuk_tanah ?>" <?php echo ($value->bentuk_tanah==$txn_data_banding_1["bentuk_tanah"]) ? "selected":"" ?>><?php echo $value->bentuk_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_265_2" id="textbox_pembanding_19" name="update[pembanding_19]" data-id-field="265" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($bentuk_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->bentuk_tanah ?>" <?php echo ($value->bentuk_tanah==$txn_data_banding_2["bentuk_tanah"]) ? "selected":"" ?>><?php echo $value->bentuk_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_265_3" id="textbox_pembanding_19" name="update[pembanding_19]" data-id-field="265" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($bentuk_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->bentuk_tanah ?>" <?php echo ($value->bentuk_tanah==$txn_data_banding_3["bentuk_tanah"]) ? "selected":"" ?>><?php echo $value->bentuk_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Letak / posisi tanah </span></td>
                                            <td>
                                                <select class="form-control table_input input_266_0" id="textbox_pembanding_20" name="update[pembanding_20]" data-id-field="266" data-keterangan="0">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_posisi_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_posisi_tanah ?>" <?php echo ($value->tipe_posisi_tanah==$txn_data_banding_0["letak_posisi_tanah"]) ? "selected" : "" ?>><?php echo $value->tipe_posisi_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_266_1" id="textbox_pembanding_20" name="update[pembanding_20]" data-id-field="266" data-keterangan="1">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_posisi_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_posisi_tanah ?>" <?php echo ($value->tipe_posisi_tanah==$txn_data_banding_1["letak_posisi_tanah"]) ? "selected" : "" ?>><?php echo $value->tipe_posisi_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_266_2" id="textbox_pembanding_20" name="update[pembanding_20]" data-id-field="266" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_posisi_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_posisi_tanah ?>" <?php echo ($value->tipe_posisi_tanah==$txn_data_banding_2["letak_posisi_tanah"]) ? "selected" : "" ?>><?php echo $value->tipe_posisi_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_266_3" id="textbox_pembanding_20" name="update[pembanding_20]" data-id-field="266" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_posisi_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_posisi_tanah ?>" <?php echo ($value->tipe_posisi_tanah==$txn_data_banding_3["letak_posisi_tanah"]) ? "selected" : "" ?>><?php echo $value->tipe_posisi_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Peruntukan / zoning </span></td>
                                            <td>
                                                <select class="form-control table_input input_267_0" id="textbox_pembanding_21" name="update[pembanding_21]" data-id-field="267" data-keterangan="0">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($zoning as $key => $value) { ?>
                                                    <option value="<?php echo $value->zoning ?>" <?php echo ($value->zoning==$txn_data_banding_0["peruntukan"]) ? "selected" : "" ?>><?php echo $value->zoning ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_267_1" id="textbox_pembanding_21" name="update[pembanding_21]" data-id-field="267" data-keterangan="1">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($zoning as $key => $value) { ?>
                                                    <option value="<?php echo $value->zoning ?>" <?php echo ($value->zoning==$txn_data_banding_1["peruntukan"]) ? "selected" : "" ?>><?php echo $value->zoning ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_267_2" id="textbox_pembanding_21" name="update[pembanding_21]" data-id-field="267" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($zoning as $key => $value) { ?>
                                                    <option value="<?php echo $value->zoning ?>" <?php echo ($value->zoning==$txn_data_banding_2["peruntukan"]) ? "selected" : "" ?>><?php echo $value->zoning ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_267_3" id="textbox_pembanding_21" name="update[pembanding_21]" data-id-field="267" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($zoning as $key => $value) { ?>
                                                    <option value="<?php echo $value->zoning ?>" <?php echo ($value->zoning==$txn_data_banding_3["peruntukan"]) ? "selected" : "" ?>><?php echo $value->zoning ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Kondisi eksisting tanah </span></td>
                                            <td>
                                                <select class="form-control table_input input_268_0" id="textbox_pembanding_22" name="update[pembanding_22]" data-id-field="268" data-keterangan="0">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($kondisi_existing_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->kondisi_existing_tanah ?>" <?php echo ($value->kondisi_existing_tanah==$txn_data_banding_0["kondisi_existing_tanah"]) ? "selected":"" ?>><?php echo $value->kondisi_existing_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_268_1" id="textbox_pembanding_22" name="update[pembanding_22]" data-id-field="268" data-keterangan="1">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($kondisi_existing_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->kondisi_existing_tanah ?>" <?php echo ($value->kondisi_existing_tanah==$txn_data_banding_1["kondisi_existing_tanah"]) ? "selected":"" ?>><?php echo $value->kondisi_existing_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_268_2" id="textbox_pembanding_22" name="update[pembanding_22]" data-id-field="268" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($kondisi_existing_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->kondisi_existing_tanah ?>" <?php echo ($value->kondisi_existing_tanah==$txn_data_banding_2["kondisi_existing_tanah"]) ? "selected":"" ?>><?php echo $value->kondisi_existing_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_268_3" id="textbox_pembanding_22" name="update[pembanding_22]" data-id-field="268" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($kondisi_existing_tanah as $key => $value) { ?>
                                                    <option value="<?php echo $value->kondisi_existing_tanah ?>" <?php echo ($value->kondisi_existing_tanah==$txn_data_banding_3["kondisi_existing_tanah"]) ? "selected":"" ?>><?php echo $value->kondisi_existing_tanah ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Kontur tanah / topograpi </span></td>
                                            <td>
                                                <select class="form-control table_input input_269_0" id="textbox_pembanding_23" name="update[pembanding_23]" data-id-field="269" data-keterangan="0">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($topografi as $key => $value) { ?>
                                                    <option value="<?php echo $value->topografi ?>" <?php echo ($value->topografi==$txn_data_banding_0["topografi"]) ? "selected":"" ?>><?php echo $value->topografi ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_269_1" id="textbox_pembanding_23" name="update[pembanding_23]" data-id-field="269" data-keterangan="1">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($topografi as $key => $value) { ?>
                                                    <option value="<?php echo $value->topografi ?>" <?php echo ($value->topografi==$txn_data_banding_1["topografi"]) ? "selected":"" ?>><?php echo $value->topografi ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_269_2" id="textbox_pembanding_23" name="update[pembanding_23]" data-id-field="269" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($topografi as $key => $value) { ?>
                                                    <option value="<?php echo $value->topografi ?>" <?php echo ($value->topografi==$txn_data_banding_2["topografi"]) ? "selected":"" ?>><?php echo $value->topografi ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_269_3" id="textbox_pembanding_23" name="update[pembanding_23]" data-id-field="269" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($topografi as $key => $value) { ?>
                                                    <option value="<?php echo $value->topografi ?>" <?php echo ($value->topografi==$txn_data_banding_3["topografi"]) ? "selected":"" ?>><?php echo $value->topografi ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <!--Analaisa data-->
                                        <tr>
                                            <td style="padding: 10px 0; font-weight: bold;">
                                                <span>ANALISA DATA</span>
                                            </td>
                                            <td style="padding: 10px 0; font-weight: bold;">
                                                <span>Objek Penilaian</span>
                                            </td>
                                            <td style="padding: 10px 0; font-weight: bold;">
                                                <span>Pembanding 1</span>
                                            </td>
                                            <td style="padding: 10px 0; font-weight: bold;">
                                                <span>Pembanding 2</span>
                                            </td>
                                            <td style="padding: 10px 0; font-weight: bold;">
                                                <span>Pembanding 3</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>BRB Bangunan ( / m<sup>2</sup> ) </span></td>
                                            <td>
                                                <select class="form-control table_input input_270_0" id="textbox_pembanding_24" name="update[pembanding_24]" data-id-field="270" data-keterangan="0">
                                                <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($brb_bangunan as $key => $value) { ?>
                                                    <option value="<?php echo $value->brb_bangunan ?>" <?php echo ($value->brb_bangunan==$txn_data_banding_0["brb_bangunan"]) ? "selected":"" ?>><?php echo number_format($value->brb_bangunan,0,".",",") ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_270_1" id="textbox_pembanding_24" name="update[pembanding_24]" data-id-field="270" data-keterangan="1">
                                                <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($brb_bangunan as $key => $value) { ?>
                                                    <option value="<?php echo $value->brb_bangunan ?>" <?php echo ($value->brb_bangunan==$txn_data_banding_1["brb_bangunan"]) ? "selected":"" ?>><?php echo number_format($value->brb_bangunan,0,".",",") ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_270_2" id="textbox_pembanding_24" name="update[pembanding_24]" data-id-field="270" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($brb_bangunan as $key => $value) { ?>
                                                    <option value="<?php echo $value->brb_bangunan ?>" <?php echo ($value->brb_bangunan==$txn_data_banding_2["brb_bangunan"]) ? "selected":"" ?>><?php echo number_format($value->brb_bangunan,0,".",",") ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_270_3" id="textbox_pembanding_24" name="update[pembanding_24]" data-id-field="270" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($brb_bangunan as $key => $value) { ?>
                                                    <option value="<?php echo $value->brb_bangunan ?>" <?php echo ($value->brb_bangunan==$txn_data_banding_3["brb_bangunan"]) ? "selected":"" ?>><?php echo number_format($value->brb_bangunan,0,".",",") ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: white"><span>Kondisi fisik bangunan (%)</span></td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_26" name="update[pembanding_26]" class="form-control table_input input_272_0 0" value="<?php echo $txn_data_banding_0["kondisi_fisik_bangunan"] ?>" data-id-field="272" data-keterangan="0" readonly>
                                                <span class="percent-sign">%</span>
                                            </td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_26" name="update[pembanding_26]" class="form-control table_input input_272_1 1" value="<?php echo $txn_data_banding_1["kondisi_fisik_bangunan"] ?>" data-id-field="272" data-keterangan="1">
                                                <span class="percent-sign">%</span>
                                            </td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_26" name="update[pembanding_26]" class="form-control table_input input_272_2 2" value="<?php echo $txn_data_banding_2["kondisi_fisik_bangunan"] ?>" data-id-field="272" data-keterangan="2">
                                                <span class="percent-sign">%</span>
                                            </td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_26" name="update[pembanding_26]" class="form-control table_input input_272_3 3" value="<?php echo $txn_data_banding_3["kondisi_fisik_bangunan"] ?>" data-id-field="272" data-keterangan="3">
                                                <span class="percent-sign">%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Indikasi Nilai Pasar Bgn. ( / m<sup>2</sup> ) </span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_27" name="update[pembanding_27]" class="form-control table_input input_273_0 0" value="<?php echo $txn_data_banding_0["indikasi_nilai_pasar_bangunan_permeter"] ?>" data-id-field="273" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_27" name="update[pembanding_27]" class="form-control table_input input_273_1 1" value="<?php echo $txn_data_banding_1["indikasi_nilai_pasar_bangunan_permeter"] ?>" data-id-field="273" data-keterangan="1"></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_27" name="update[pembanding_27]" class="form-control table_input input_273_2 2" value="<?php echo $txn_data_banding_2["indikasi_nilai_pasar_bangunan_permeter"] ?>" data-id-field="273" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_27" name="update[pembanding_27]" class="form-control table_input input_273_3 3" value="<?php echo $txn_data_banding_3["indikasi_nilai_pasar_bangunan_permeter"] ?>" data-id-field="273" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Indikasi Nilai Pasar Bangunan</span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_25" name="update[pembanding_25]" class="form-control table_input input_271_0 0" value="<?php echo $txn_data_banding_0["indikasi_nilai_pasar_bangunan"] ?>" data-id-field="271" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_25" name="update[pembanding_25]" class="form-control table_input input_271_1 1" value="<?php echo $txn_data_banding_1["indikasi_nilai_pasar_bangunan"] ?>" data-id-field="271" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_25" name="update[pembanding_25]" class="form-control table_input input_271_2 2" value="<?php echo $txn_data_banding_2["indikasi_nilai_pasar_bangunan"] ?>" data-id-field="271" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_25" name="update[pembanding_25]" class="form-control table_input input_271_3 3" value="<?php echo $txn_data_banding_3["indikasi_nilai_pasar_bangunan"] ?>" data-id-field="271" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Indikasi Nilai Pasar Tanah</span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_28" name="update[pembanding_28]" class="form-control table_input input_274_0 0" value="<?php echo $txn_data_banding_0["indikasi_nilai_pasar_tanah"] ?>" data-id-field="274" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_28" name="update[pembanding_28]" class="form-control table_input input_274_1 1" value="<?php echo $txn_data_banding_1["indikasi_nilai_pasar_tanah"] ?>" data-id-field="274" data-keterangan="1"></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_28" name="update[pembanding_28]" class="form-control table_input input_274_2 2" value="<?php echo $txn_data_banding_2["indikasi_nilai_pasar_tanah"] ?>" data-id-field="274" data-keterangan="2"></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_28" name="update[pembanding_28]" class="form-control table_input input_274_3 3" value="<?php echo $txn_data_banding_3["indikasi_nilai_pasar_tanah"] ?>" data-id-field="274" data-keterangan="3"></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><span>Indikasi Nilai Tanah ( / m<sup>2</sup> )</span></td>
                                            <td></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_30" name="update[pembanding_30]" class="form-control table_input input_276_1 1" value="<?php echo $txn_data_banding_1["indikasi_nilai_tanah_permeter"] ?>" data-id-field="276" data-keterangan="1"></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_30" name="update[pembanding_30]" class="form-control table_input input_276_2 2" value="<?php echo $txn_data_banding_2["indikasi_nilai_tanah_permeter"] ?>" data-id-field="276" data-keterangan="2"></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_30" name="update[pembanding_30]" class="form-control table_input input_276_3 3" value="<?php echo $txn_data_banding_3["indikasi_nilai_tanah_permeter"] ?>" data-id-field="276" data-keterangan="3"></td>
                                        </tr>
                                        <!--Penyesuaian-->
                                        <tr>
                                            <td style="padding: 10px 0; font-weight: bold;">
                                                <span>PENYESUAIAN</span>
                                            </td>
                                            <td style="padding: 10px 0; font-weight: bold;">
                                                <span>Objek Penilaian</span>
                                            </td>
                                            <td style="padding: 10px 0; font-weight: bold;">
                                                <span>Pembanding 1</span>
                                            </td>
                                            <td style="padding: 10px 0; font-weight: bold;">
                                                <span>Pembanding 2</span>
                                            </td>
                                            <td style="padding: 10px 0; font-weight: bold;">
                                                <span>Pembanding 3</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Lokasi</span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_103" name="update[pembanding_103]" class="form-control table_input input_2081_0 0" data-id-field="2081" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["lokasi_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_103" name="update[pembanding_103]" class="form-control table_input input_2081_1 1" data-id-field="2081" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["lokasi_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_103" name="update[pembanding_103]" class="form-control table_input input_2081_2 2" data-id-field="2081" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["lokasi_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_103" name="update[pembanding_103]" class="form-control table_input input_2081_3 3" data-id-field="2081" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["lokasi_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_31" name="update[pembanding_31]" class="form-control table_input input_277_1-0" value="<?php echo $txn_data_banding_1["lokasi_0"] ?>" data-id-field="277" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_31" name="update[pembanding_31]" class="form-control table_input input_277_1-2" value="<?php echo $txn_data_banding_1["lokasi_1"] ?>" data-id-field="277" data-keterangan="1-2">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_31" name="update[pembanding_31]" class="form-control table_input input_277_1-3" value="<?php echo $txn_data_banding_1["lokasi_2"] ?>" data-id-field="277" data-keterangan="1-3">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_31" name="update[pembanding_31]" class="form-control table_input input_277_2-0" value="<?php echo $txn_data_banding_2["lokasi_0"] ?>" data-id-field="277" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_31" name="update[pembanding_31]" class="form-control table_input input_277_2-2" value="<?php echo $txn_data_banding_2["lokasi_1"] ?>" data-id-field="277" data-keterangan="2-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_31" name="update[pembanding_31]" class="form-control table_input input_277_2-3" value="<?php echo $txn_data_banding_2["lokasi_2"] ?>" data-id-field="277" data-keterangan="2-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_31" name="update[pembanding_31]" class="form-control table_input input_277_3-0" value="<?php echo $txn_data_banding_3["lokasi_0"] ?>" data-id-field="277" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_31" name="update[pembanding_31]" class="form-control table_input input_277_3-2" value="<?php echo $txn_data_banding_3["lokasi_1"] ?>" data-id-field="277" data-keterangan="3-2">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_31" name="update[pembanding_31]" class="form-control table_input input_277_3-3" value="<?php echo $txn_data_banding_3["lokasi_2"] ?>" data-id-field="277" data-keterangan="3-3">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Dokumen / legalitas tanah</span></td>
                                            
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_104" name="update[pembanding_104]" class="form-control table_input input_2082_0 0" data-id-field="2082" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["dokumen_legalitas_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_104" name="update[pembanding_104]" class="form-control table_input input_2082_1 1" data-id-field="2082" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["dokumen_legalitas_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_104" name="update[pembanding_104]" class="form-control table_input input_2082_2 2" data-id-field="2082" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["dokumen_legalitas_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_104" name="update[pembanding_104]" class="form-control table_input input_2082_3 3" data-id-field="2082" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["dokumen_legalitas_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!--input type="text" id="textbox_pembanding_32" name="update[pembanding_32]" class="form-control table_input input_278_0 0" value="<?php echo $txn_data_banding_0["dokumen_legalitas_0"] ?>" data-id-field="278" data-keterangan="0" readonly-->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_32" name="update[pembanding_32]" class="form-control table_input input_278_1-0" value="<?php echo $txn_data_banding_1["dokumen_legalitas_0"] ?>" data-id-field="278" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_32" name="update[pembanding_32]" class="form-control table_input input_278_1-2" value="<?php echo $txn_data_banding_1["dokumen_legalitas_1"] ?>" data-id-field="278" data-keterangan="1-2">
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_32" name="update[pembanding_32]" class="form-control table_input input_278_1-3" value="<?php echo $txn_data_banding_1["dokumen_legalitas_2"] ?>" data-id-field="278" data-keterangan="1-3">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_32" name="update[pembanding_32]" class="form-control table_input input_278_2-0" value="<?php echo $txn_data_banding_2["dokumen_legalitas_0"] ?>" data-id-field="278" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_32" name="update[pembanding_32]" class="form-control table_input input_278_2-2" value="<?php echo $txn_data_banding_2["dokumen_legalitas_1"] ?>" data-id-field="278" data-keterangan="2-2">
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_32" name="update[pembanding_32]" class="form-control table_input input_278_2-3" value="<?php echo $txn_data_banding_2["dokumen_legalitas_2"] ?>" data-id-field="278" data-keterangan="2-3">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_32" name="update[pembanding_32]" class="form-control table_input input_278_3-0" value="<?php echo $txn_data_banding_3["dokumen_legalitas_0"] ?>" data-id-field="278" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_32" name="update[pembanding_32]" class="form-control table_input input_278_3-2" value="<?php echo $txn_data_banding_3["dokumen_legalitas_1"] ?>" data-id-field="278" data-keterangan="3-2">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_32" name="update[pembanding_32]" class="form-control table_input input_278_3-3" value="<?php echo $txn_data_banding_3["dokumen_legalitas_2"] ?>" data-id-field="278" data-keterangan="3-3">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Luas tanah </span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_0 0" data-id-field="2083" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["luas_tanah_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_1 1" data-id-field="2083" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["luas_tanah_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_2 2" data-id-field="2083" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["luas_tanah_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_3 3" data-id-field="2083" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["luas_tanah_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!--input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_0 0" value="<?php echo $txn_data_banding_0["luas_tanah_0"] ?>" data-id-field="279" data-keterangan="0"-->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_1-0" value="<?php echo $txn_data_banding_1["luas_tanah_0"] ?>" data-id-field="279" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_1-2" value="<?php echo $txn_data_banding_1["luas_tanah_1"] ?>" data-id-field="279" data-keterangan="1-2">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_1-3" value="<?php echo $txn_data_banding_1["luas_tanah_2"] ?>" data-id-field="279" data-keterangan="1-3">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_2-0" value="<?php echo $txn_data_banding_2["luas_tanah_0"] ?>" data-id-field="279" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_2-2" value="<?php echo $txn_data_banding_2["luas_tanah_1"] ?>" data-id-field="279" data-keterangan="2-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_2-3" value="<?php echo $txn_data_banding_2["luas_tanah_2"] ?>" data-id-field="279" data-keterangan="2-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_3-0" value="<?php echo $txn_data_banding_3["luas_tanah_0"] ?>" data-id-field="279" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_3-2" value="<?php echo $txn_data_banding_3["luas_tanah_1"] ?>" data-id-field="279" data-keterangan="3-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_3-3" value="<?php echo $txn_data_banding_3["luas_tanah_2"] ?>" data-id-field="279" data-keterangan="3-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Lebar dan kondisi jalan </span></td>
                                            
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_106" name="update[pembanding_106]" class="form-control table_input input_2084_0 0" data-id-field="2084" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["lebar_kondisi_jalan_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_106" name="update[pembanding_106]" class="form-control table_input input_2084_1 1" data-id-field="2084" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["lebar_kondisi_jalan_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_106" name="update[pembanding_106]" class="form-control table_input input_2084_2 2" data-id-field="2084" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["lebar_kondisi_jalan_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_106" name="update[pembanding_106]" class="form-control table_input input_2084_3 3" data-id-field="2084" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["lebar_kondisi_jalan_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!--input type="text" id="textbox_pembanding_34" name="update[pembanding_34]" class="form-control table_input input_280_0 0" value="<?php echo $txn_data_banding_0["lebar_kondisi_jalan_0"] ?>" data-id-field="280" data-keterangan="0"-->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_34" name="update[pembanding_34]" class="form-control table_input input_280_1-0" value="<?php echo $txn_data_banding_1["lebar_kondisi_jalan_0"] ?>" data-id-field="280" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_34" name="update[pembanding_34]" class="form-control table_input input_280_1-2" value="<?php echo $txn_data_banding_1["lebar_kondisi_jalan_1"] ?>" data-id-field="280" data-keterangan="1-2">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_34" name="update[pembanding_34]" class="form-control table_input input_280_1-3" value="<?php echo $txn_data_banding_1["lebar_kondisi_jalan_2"] ?>" data-id-field="280" data-keterangan="1-3">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_34" name="update[pembanding_34]" class="form-control table_input input_280_2-0" value="<?php echo $txn_data_banding_2["lebar_kondisi_jalan_0"] ?>" data-id-field="280" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_34" name="update[pembanding_34]" class="form-control table_input input_280_2-2" value="<?php echo $txn_data_banding_2["lebar_kondisi_jalan_1"] ?>" data-id-field="280" data-keterangan="2-2">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_34" name="update[pembanding_34]" class="form-control table_input input_280_2-3" value="<?php echo $txn_data_banding_2["lebar_kondisi_jalan_2"] ?>" data-id-field="280" data-keterangan="2-3">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_34" name="update[pembanding_34]" class="form-control table_input input_280_3-0" value="<?php echo $txn_data_banding_3["lebar_kondisi_jalan_0"] ?>" data-id-field="280" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_34" name="update[pembanding_34]" class="form-control table_input input_280_3-2" value="<?php echo $txn_data_banding_3["lebar_kondisi_jalan_1"] ?>" data-id-field="280" data-keterangan="3-2">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_34" name="update[pembanding_34]" class="form-control table_input input_280_3-3" value="<?php echo $txn_data_banding_3["lebar_kondisi_jalan_2"] ?>" data-id-field="280" data-keterangan="3-3">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Bentuk tanah</span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_0 0" data-id-field="2085" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["bentuk_tanah_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_1 1" data-id-field="2085" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["bentuk_tanah_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_2 2" data-id-field="2085" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["bentuk_tanah_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_3 3" data-id-field="2085" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["bentuk_tanah_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!--input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_0 0" value="<?php echo $txn_data_banding_0["bentuk_tanah_0"] ?>" data-id-field="281" data-keterangan="0"-->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_1-0" value="<?php echo $txn_data_banding_1["bentuk_tanah_0"] ?>" data-id-field="281" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_1-2" value="<?php echo $txn_data_banding_1["bentuk_tanah_1"] ?>" data-id-field="281" data-keterangan="1-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_1-3" value="<?php echo $txn_data_banding_1["bentuk_tanah_2"] ?>" data-id-field="281" data-keterangan="1-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_2-0" value="<?php echo $txn_data_banding_2["bentuk_tanah_0"] ?>" data-id-field="281" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_2-2" value="<?php echo $txn_data_banding_2["bentuk_tanah_1"] ?>" data-id-field="281" data-keterangan="2-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_2-3" value="<?php echo $txn_data_banding_2["bentuk_tanah_2"] ?>" data-id-field="281" data-keterangan="2-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_3-0" value="<?php echo $txn_data_banding_3["bentuk_tanah_0"] ?>" data-id-field="281" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_3-2" value="<?php echo $txn_data_banding_3["bentuk_tanah_1"] ?>" data-id-field="281" data-keterangan="3-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_3-3" value="<?php echo $txn_data_banding_3["bentuk_tanah_2"] ?>" data-id-field="281" data-keterangan="3-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Posisi tanah sudut / hook </span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_108" name="update[pembanding_108]" class="form-control table_input input_2086_0 0" data-id-field="2086" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["posisi_tanah_sudut_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_108" name="update[pembanding_108]" class="form-control table_input input_2086_1 1" data-id-field="2086" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["posisi_tanah_sudut_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_108" name="update[pembanding_108]" class="form-control table_input input_2086_2 2" data-id-field="2086" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["posisi_tanah_sudut_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_108" name="update[pembanding_108]" class="form-control table_input input_2086_3 3" data-id-field="2086" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["posisi_tanah_sudut_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!--input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_0 0" value="<?php echo $txn_data_banding_0["posisi_tanah_sudut_0"] ?>" data-id-field="283" data-keterangan="0"-->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_1-0" value="<?php echo $txn_data_banding_1["posisi_tanah_sudut_0"] ?>" data-id-field="283" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_1-1" value="<?php echo $txn_data_banding_1["posisi_tanah_sudut_1"] ?>" data-id-field="283" data-keterangan="1-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_1-2" value="<?php echo $txn_data_banding_1["posisi_tanah_sudut_2"] ?>" data-id-field="283" data-keterangan="1-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_2-0" value="<?php echo $txn_data_banding_2["posisi_tanah_sudut_0"] ?>" data-id-field="283" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_2-1" value="<?php echo $txn_data_banding_2["posisi_tanah_sudut_1"] ?>" data-id-field="283" data-keterangan="2-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_2-2" value="<?php echo $txn_data_banding_2["posisi_tanah_sudut_2"] ?>" data-id-field="283" data-keterangan="2-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_3-0" value="<?php echo $txn_data_banding_3["posisi_tanah_sudut_0"] ?>" data-id-field="283" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_3-1" value="<?php echo $txn_data_banding_3["posisi_tanah_sudut_0"] ?>" data-id-field="283" data-keterangan="3-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_3-2" value="<?php echo $txn_data_banding_3["posisi_tanah_sudut_2"] ?>" data-id-field="283" data-keterangan="3-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Posisi tanah tusuk sate </span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_109" name="update[pembanding_109]" class="form-control table_input input_2087_0 0" data-id-field="2087" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["posisi_tanah_tusuk_sate_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_109" name="update[pembanding_109]" class="form-control table_input input_2087_1 1" data-id-field="2087" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["posisi_tanah_tusuk_sate_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_109" name="update[pembanding_109]" class="form-control table_input input_2087_2 2" data-id-field="2087" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["posisi_tanah_tusuk_sate_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_109" name="update[pembanding_109]" class="form-control table_input input_2087_3 3" data-id-field="2087" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["posisi_tanah_tusuk_sate_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!--input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_0 0" value="<?php echo $txn_data_banding_0["posisi_tanah_sudut_0"] ?>" data-id-field="284" data-keterangan="0"-->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_1-0" value="<?php echo $txn_data_banding_1["posisi_tanah_tusuk_sate_0"] ?>" data-id-field="284" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_1-1" value="<?php echo $txn_data_banding_1["posisi_tanah_tusuk_sate_1"] ?>" data-id-field="284" data-keterangan="1-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_1-2" value="<?php echo $txn_data_banding_1["posisi_tanah_tusuk_sate_2"] ?>" data-id-field="284" data-keterangan="1-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_2-0" value="<?php echo $txn_data_banding_2["posisi_tanah_tusuk_sate_0"] ?>" data-id-field="284" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_2-1" value="<?php echo $txn_data_banding_2["posisi_tanah_tusuk_sate_1"] ?>" data-id-field="284" data-keterangan="2-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_2-2" value="<?php echo $txn_data_banding_2["posisi_tanah_tusuk_sate_2"] ?>" data-id-field="284" data-keterangan="2-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_3-0" value="<?php echo $txn_data_banding_3["posisi_tanah_tusuk_sate_0"] ?>" data-id-field="284" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_3-1" value="<?php echo $txn_data_banding_3["posisi_tanah_tusuk_sate_1"] ?>" data-id-field="284" data-keterangan="3-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_3-2" value="<?php echo $txn_data_banding_3["posisi_tanah_tusuk_sate_2"] ?>" data-id-field="284" data-keterangan="3-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Peruntukan / zoning</span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_110" name="update[pembanding_110]" class="form-control table_input input_2088_0 0" data-id-field="2088" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["peruntukan_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_110" name="update[pembanding_110]" class="form-control table_input input_2088_1 1" data-id-field="2088" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["peruntukan_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_110" name="update[pembanding_110]" class="form-control table_input input_2088_2 2" data-id-field="2088" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["peruntukan_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_110" name="update[pembanding_110]" class="form-control table_input input_2088_3 3" data-id-field="2088" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["peruntukan_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!--input type="text" id="textbox_pembanding_39" name="update[pembanding_39]" class="form-control table_input input_285_0 0" value="<?php echo $txn_data_banding_0["peruntukan_0"] ?>" data-id-field="285" data-keterangan="0"-->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_39" name="update[pembanding_39]" class="form-control table_input input_285_1-0" value="<?php echo $txn_data_banding_1["peruntukan_0"] ?>" data-id-field="285" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_39" name="update[pembanding_39]" class="form-control table_input input_285_1-2" value="<?php echo $txn_data_banding_1["peruntukan_1"] ?>" data-id-field="285" data-keterangan="1-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_39" name="update[pembanding_39]" class="form-control table_input input_285_1-3" value="<?php echo $txn_data_banding_1["peruntukan_2"] ?>" data-id-field="285" data-keterangan="1-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_39" name="update[pembanding_39]" class="form-control table_input input_285_2-0" value="<?php echo $txn_data_banding_2["peruntukan_0"] ?>" data-id-field="285" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_39" name="update[pembanding_39]" class="form-control table_input input_285_2-2" value="<?php echo $txn_data_banding_2["peruntukan_1"] ?>" data-id-field="285" data-keterangan="2-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_39" name="update[pembanding_39]" class="form-control table_input input_285_2-3" value="<?php echo $txn_data_banding_2["peruntukan_2"] ?>" data-id-field="285" data-keterangan="2-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_39" name="update[pembanding_39]" class="form-control table_input input_285_3-0" value="<?php echo $txn_data_banding_3["peruntukan_0"] ?>" data-id-field="285" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_39" name="update[pembanding_39]" class="form-control table_input input_285_3-2" value="<?php echo $txn_data_banding_3["peruntukan_1"] ?>" data-id-field="285" data-keterangan="3-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_39" name="update[pembanding_39]" class="form-control table_input input_285_3-3" value="<?php echo $txn_data_banding_3["peruntukan_2"] ?>" data-id-field="285" data-keterangan="3-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Kontur tanah / topograpi </span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_111" name="update[pembanding_111]" class="form-control table_input input_2089_0 0" data-id-field="2089" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["topografi_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_111" name="update[pembanding_111]" class="form-control table_input input_2089_1 1" data-id-field="2089" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["topografi_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_111" name="update[pembanding_111]" class="form-control table_input input_2089_2 2" data-id-field="2089" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["topografi_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_111" name="update[pembanding_111]" class="form-control table_input input_2089_3 3" data-id-field="2089" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["topografi_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!--input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_0 0" value="<?php echo $txn_data_banding_0["topografi_0"] ?>" data-id-field="286" data-keterangan="0"-->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_1-0" value="<?php echo $txn_data_banding_1["topografi_0"] ?>" data-id-field="286" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_1-2" value="<?php echo $txn_data_banding_1["topografi_1"] ?>" data-id-field="286" data-keterangan="1-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_1-3" value="<?php echo $txn_data_banding_1["topografi_2"] ?>" data-id-field="286" data-keterangan="1-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_2-0" value="<?php echo $txn_data_banding_2["topografi_0"] ?>" data-id-field="286" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_2-2" value="<?php echo $txn_data_banding_2["topografi_1"] ?>" data-id-field="286" data-keterangan="2-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_2-3" value="<?php echo $txn_data_banding_2["topografi_2"] ?>" data-id-field="286" data-keterangan="2-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_3-0" value="<?php echo $txn_data_banding_3["topografi_0"] ?>" data-id-field="286" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_3-2" value="<?php echo $txn_data_banding_3["topografi_1"] ?>" data-id-field="286" data-keterangan="3-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_3-3" value="<?php echo $txn_data_banding_3["topografi_2"] ?>" data-id-field="286" data-keterangan="3-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span> Waktu penawaran / transaksi </span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_112" name="update[pembanding_112]" class="form-control table_input input_2090_0 0" data-id-field="2090" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["waktu_penawaran_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_112" name="update[pembanding_112]" class="form-control table_input input_2090_1 1" data-id-field="2090" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["waktu_penawaran_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_112" name="update[pembanding_112]" class="form-control table_input input_2090_2 2" data-id-field="2090" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["waktu_penawaran_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_112" name="update[pembanding_112]" class="form-control table_input input_2090_3 3" data-id-field="2090" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["waktu_penawaran_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!--input type="text" id="textbox_pembanding_41" name="update[pembanding_41]" class="form-control table_input input_287_0 0" value="<?php echo $txn_data_banding_0["waktu_penawaran_0"] ?>" data-id-field="287" data-keterangan="0"-->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_41" name="update[pembanding_41]" class="form-control table_input input_287_1-0" value="<?php echo $txn_data_banding_1["waktu_penawaran_0"] ?>" data-id-field="287" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_41" name="update[pembanding_41]" class="form-control table_input input_287_1-2" value="<?php echo $txn_data_banding_1["waktu_penawaran_1"] ?>" data-id-field="287" data-keterangan="1-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_41" name="update[pembanding_41]" class="form-control table_input input_287_1-3" value="<?php echo $txn_data_banding_1["waktu_penawaran_2"] ?>" data-id-field="287" data-keterangan="1-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_41" name="update[pembanding_41]" class="form-control table_input input_287_2-0" value="<?php echo $txn_data_banding_2["waktu_penawaran_0"] ?>" data-id-field="287" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_41" name="update[pembanding_41]" class="form-control table_input input_287_2-2" value="<?php echo $txn_data_banding_2["waktu_penawaran_1"] ?>" data-id-field="287" data-keterangan="2-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_41" name="update[pembanding_41]" class="form-control table_input input_287_2-3" value="<?php echo $txn_data_banding_2["waktu_penawaran_2"] ?>" data-id-field="287" data-keterangan="2-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_41" name="update[pembanding_41]" class="form-control table_input input_287_3-0" value="<?php echo $txn_data_banding_3["waktu_penawaran_0"] ?>" data-id-field="287" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_41" name="update[pembanding_41]" class="form-control table_input input_287_3-2" value="<?php echo $txn_data_banding_3["waktu_penawaran_1"] ?>" data-id-field="287" data-keterangan="3-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_41" name="update[pembanding_41]" class="form-control table_input input_287_3-3" value="<?php echo $txn_data_banding_3["waktu_penawaran_2"] ?>" data-id-field="287" data-keterangan="3-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Lain-lain  </span></td>
                                            <td><input type="text" id="textbox_pembanding_42" name="update[pembanding_42]" class="form-control table_input input_288_0 0" value="<?php echo $txn_data_banding_0["lain_lain_0"] ?>" data-id-field="288" data-keterangan="0" readonly></td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_42" name="update[pembanding_42]" class="form-control table_input input_288_1-0" value="<?php echo $txn_data_banding_1["lain_lain_0"] ?>" data-id-field="288" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_42" name="update[pembanding_42]" class="form-control table_input input_288_1-1" value="<?php echo $txn_data_banding_1["lain_lain_1"] ?>" data-id-field="288" data-keterangan="1-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_42" name="update[pembanding_42]" class="form-control table_input input_288_1-2" value="<?php echo $txn_data_banding_1["lain_lain_2"] ?>" data-id-field="288" data-keterangan="1-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_42" name="update[pembanding_42]" class="form-control table_input input_288_2-0" value="<?php echo $txn_data_banding_2["lain_lain_0"] ?>" data-id-field="288" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_42" name="update[pembanding_42]" class="form-control table_input input_288_2-1" value="<?php echo $txn_data_banding_2["lain_lain_1"] ?>" data-id-field="288" data-keterangan="2-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_42" name="update[pembanding_42]" class="form-control table_input input_288_2-2" value="<?php echo $txn_data_banding_2["lain_lain_2"] ?>" data-id-field="288" data-keterangan="2-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_42" name="update[pembanding_42]" class="form-control table_input input_288_3-0" value="<?php echo $txn_data_banding_3["lain_lain_0"] ?>" data-id-field="288" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_42" name="update[pembanding_42]" class="form-control table_input input_288_3-1" value="<?php echo $txn_data_banding_3["lain_lain_1"] ?>" data-id-field="288" data-keterangan="3-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_42" name="update[pembanding_42]" class="form-control table_input input_288_3-2" value="<?php echo $txn_data_banding_3["lain_lain_2"] ?>" data-id-field="288" data-keterangan="3-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Total Penyesuaian</span></td>
                                            <td></td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_1-0" value="<?php echo $txn_data_banding_1["total_0"] ?>" data-id-field="289" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_1-1" value="<?php echo $txn_data_banding_1["total_1"] ?>" data-id-field="289" data-keterangan="1-1">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_1-2" value="<?php echo $txn_data_banding_1["total_2"] ?>" data-id-field="289" data-keterangan="1-2">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_2-0" value="<?php echo $txn_data_banding_2["total_0"] ?>" data-id-field="289" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_2-1" value="<?php echo $txn_data_banding_2["total_1"] ?>" data-id-field="289" data-keterangan="2-1">
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_2-2" value="<?php echo $txn_data_banding_2["total_2"] ?>" data-id-field="289" data-keterangan="2-2">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_3-0" value="<?php echo $txn_data_banding_3["total_0"] ?>" data-id-field="289" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_3-1" value="<?php echo $txn_data_banding_3["total_1"] ?>" data-id-field="289" data-keterangan="3-1">
                                                            </td>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_3-2" value="<?php echo $txn_data_banding_3["total_2"] ?>" data-id-field="289" data-keterangan="3-2">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #eee;">
                                            <td>
                                                <span>Indikasi Nilai Tanah Setelah Penyesuaian ( / m<sup>2</sup> )</span>
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_44" name="update[pembanding_44]" class="form-control table_input input_290_1 1" value="<?php echo $txn_data_banding_1["indikasi_nilai_tanah"] ?>" data-id-field="290" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_44" name="update[pembanding_44]" class="form-control table_input input_290_2 2" value="<?php echo $txn_data_banding_2["indikasi_nilai_tanah"] ?>" data-id-field="290" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_44" name="update[pembanding_44]" class="form-control table_input input_290_3 3" value="<?php echo $txn_data_banding_3["indikasi_nilai_tanah"] ?>" data-id-field="290" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Bobot Rekonsiliasi (%)</span></td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_45" name="update[pembanding_45]" class="form-control table_input input_291_0 0" value="<?php echo $txn_data_banding_0["bobot_rekonsiliasi"] ?>" data-id-field="291" data-keterangan="0" readonly>
                                                <span class="percent-sign">%</span>
                                            </td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_45" name="update[pembanding_45]" class="form-control table_input input_291_1 1" value="<?php echo $txn_data_banding_1["bobot_rekonsiliasi"] ?>" data-id-field="291" data-keterangan="1">
                                                <span class="percent-sign">%</span>
                                            </td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_45" name="update[pembanding_45]" class="form-control table_input input_291_2 2" value="<?php echo $txn_data_banding_2["bobot_rekonsiliasi"] ?>" data-id-field="291" data-keterangan="2">
                                                <span class="percent-sign">%</span>
                                            </td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_45" name="update[pembanding_45]" class="form-control table_input input_291_3 3" value="<?php echo $txn_data_banding_3["bobot_rekonsiliasi"] ?>" data-id-field="291" data-keterangan="3">
                                                <span class="percent-sign">%</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #eee;"><span>Nilai Pasar Tanah ( / m<sup>2</sup> ) </span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_46" name="update[pembanding_46]" class="form-control table_input input_292_0 0" value="<?php echo $txn_data_banding_0["nilai_pasar_tanah"] ?>" data-id-field="292" data-keterangan="0" readonly>
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_46" name="update[pembanding_46]" class="form-control table_input input_292_1 1" value="<?php echo $txn_data_banding_1["nilai_pasar_tanah"] ?>" data-id-field="292" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_46" name="update[pembanding_46]" class="form-control table_input input_292_2 2" value="<?php echo $txn_data_banding_2["nilai_pasar_tanah"] ?>" data-id-field="292" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_46" name="update[pembanding_46]" class="form-control table_input input_292_3 3" value="<?php echo $txn_data_banding_3["nilai_pasar_tanah"] ?>" data-id-field="292" data-keterangan="3">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>

                        <div class="table-responsive">
                            <table id="table_data_legalitas_2" class="table-legalitas table_border_2" width="100%" cellpadding="0" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>
                                            <span>No</span>
                                        </th>
                                        <th>
                                            <span>Jenis Sertifikat</span>
                                        </th>
                                        <th>
                                            <span>Nomor Sertifikat</span>
                                        </th>
                                        <th>
                                            <span>Luas Tanah (m<sup>2</sup>)</span>
                                        </th>
                                        <th>
                                            <span>Bobot</span>
                                        </th>
                                        <th>
                                            <span>Indikasi Nilai Tanah ( Rp. / m<sup>2</sup> ) </span>
                                        </th>
                                        <th>
                                            <span>Total Nilai Tanah ( Rp. )</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_data_legalitas_2"></tbody>
                                <tfoot>
                                    <tr>
                                        <td align="center" colspan="3">
                                            <span>TOTAL LUAS TANAH SESUAI SERTIFIKAT</span>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_tanah_61" name="update[tanah_61]" class="form-control table_input input_162_ " value="<?php echo $txn_tanah['luas'] ?>" data-id-field="162" data-keterangan="" readonly>
                                        </td>
                                        <td></td>
                                        <td>
                                            <input type="text" id="textbox_tanah_71" name="update[tanah_71]" class="form-control table_input input_351_ " value="0" data-id-field="351" data-keterangan="" readonly>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_tanah_72" name="update[tanah_72]" class="form-control table_input input_352_ " value="0" data-id-field="352" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <br>

                        <div class="table-responsive">
                            <table class="table table_border_2" width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td style="background-color: #eee;">
                                            <span>Indikasi Nilai Tanah Setelah Pembobotan ( / m<sup>2</sup> )</span>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_pembanding_47" name="update[pembanding_47]" class="form-control table_input input_293_ " value="0" data-id-field="293" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #eee;">
                                            <span>PEMBULATAN</span>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_pembanding_48" name="update[pembanding_48]" class="form-control table_input input_294_ " value="0" data-id-field="294" data-keterangan="" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #eee;"><span>DEVIASI DATA</span></td>
                                        <td>
                                            <input type="text" id="deviasi_data" class="form-control text-center" value=0 readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="analisaUlang" style="display: none">ANALISA ULANG / CARI DATA LAGI !!</div>
                    </div>


                    <div role="tabpanel" id="lampiran" <?php echo (isset($_GET["role"]) && $_GET["role"]=="lampiran") ? "class=\"tab-pane active\"" : "class=\"tab-pane\" " ?>>
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
                        
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="lampiran_properti">
                                <h4>Foto Properti</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="image_lampiran">
                                            <?php 
                                            foreach ($txn_lampiran as $key => $value) {
                                                $lamp = explode(".", $value["lampiran"]);
                                                $ext = array_pop( $lamp );
                                                $file_name = implode(".", $lamp);
                                                $file_thumb = $file_name."-thumb.".$ext;

                                                ?>
                                            <?php if ($value["jenis_lampiran"] != "Foto Properti") continue; ?>
                                            <div class="col-sm-2 list_multi_image list_1523349146-20180410png">
                                                <img src="<?php echo base_url() ?>asset/file/<?php echo $file_thumb ?>" class="img-responsive">
                                                <table style="margin-bottom: 10px;">
                                                    <tbody>
                                                        <tr>
                                                            <td>No. Urut</td>
                                                            <td>:</td>
                                                            <td><?php echo $value["no_urut"] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Keterangan</td>
                                                            <td>:</td>
                                                            <td><?php echo $value["keterangan"] ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn btn-warning btn-sm btn-delete-image-multi" data-file="1523349146-20180410png" data-id="NTM0MA==">Delete</button>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
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
                            <div role="tabpanel" class="tab-pane" id="lampiran_layout">
                                <h4>Layout Properti</h4>
                                <?php
                                    $lamp = explode(".", $lampiran_layout_properti["lampiran"]);
                                    $ext = array_pop( $lamp );
                                    $file_name = implode(".", $lamp);
                                    $file_thumb = $file_name."-thumb.".$ext;
                                    ?>
                                <img id="img_entry_29" src="<?php echo base_url() ?>asset/file/<?php echo (!$lampiran_layout_properti) ? "default.jpg" : $file_thumb ?>" data-id-field="891"  data-name-field="entry_29" data-keterangan="" class="img-responsive btn-upload-image img-891-"  />
                                <input type="file" id="file-891" class="tmp_file file-891-" data-id-field="891" data-name-field="entry_29" style="display: none;" data-keterangan="">
                                <input type="hidden" id="textbox_entry_29" name="update[entry_29]" class="table_input textbox-891-" value="default.jpg" data-id-field="891" data-name-field="entry_29" data-keterangan="Layout Properti">
                            </div>
                            <div role="tabpanel" class="tab-pane" id="lampiran_peta">
                                <h4>Peta Lokasi Properti</h4>
                                <?php
                                    $lamp = explode(".", $lampiran_peta_lokasi["lampiran"]);
                                    $ext = array_pop( $lamp );
                                    $file_name = implode(".", $lamp);
                                    $file_thumb = $file_name."-thumb.".$ext;
                                    ?>
                                <img id="img_entry_30" src="<?php echo base_url() ?>asset/file/<?php echo (!$lampiran_peta_lokasi) ? "default.jpg" : $file_thumb ?>" data-id-field="892"  data-name-field="entry_30" data-keterangan="" class="img-responsive btn-upload-image img-892-"  />
                                <input type="file" id="file-892" class="tmp_file file-892-" data-id-field="892" data-name-field="entry_30" style="display: none;" data-keterangan="">
                                <input type="hidden" id="textbox_entry_30" name="update[entry_30]" class="table_input textbox-892-" value="default.jpg" data-id-field="892" data-name-field="entry_30" data-keterangan="Peta Lokasi Properti">
                            </div>
                            <div role="tabpanel" class="tab-pane" id="lampiran_kota">
                                <h4>Keterangan Tata Kota</h4>
                                <?php
                                    $lamp = explode(".", $lampiran_tata_kota["lampiran"]);
                                    $ext = array_pop( $lamp );
                                    $file_name = implode(".", $lamp);
                                    $file_thumb = $file_name."-thumb.".$ext;
                                    ?>
                                <img id="img_entry_31" src="<?php echo base_url() ?>asset/file/<?php echo (!$lampiran_tata_kota) ? "default.jpg" : $file_thumb ?>" data-id-field="893"  data-name-field="entry_31" data-keterangan="" class="img-responsive btn-upload-image img-893-"  />
                                <input type="file" id="file-893" class="tmp_file file-893-" data-id-field="893" data-name-field="entry_31" style="display: none;" data-keterangan="">
                                <input type="hidden" id="textbox_entry_31" name="update[entry_31]" class="table_input textbox-893-" value="default.jpg" data-id-field="893" data-name-field="entry_31" data-keterangan="Keterangan Tata Kota">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-right">
                            <button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>
                            <input type="button" class="btn btn-warning btn-sm btn-batal" value="BATAL" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-sm" onclick="window.open(&quot;<?=base_url()?>printpdf/laporan_ringkas/<?=base64_encode($pekerjaan->id)?>/<?=base64_encode($lokasi->id)?>/<?=base64_encode($txn_kertas_kerja['id_kertas_kerja'])?>/pdf/&quot;, &quot;_blank&quot;)">PDF LAPORAN (SORT REPORT)</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

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
<script type="text/javascript">
var id_jenis_objek = <?php echo json_encode($lokasi->id_jenis_objek ) ?>;
var icon_marker = "house-with-box.png";
var deviasi_limit = <?php echo json_encode($deviasi_data) ?>;
</script>

<script src="<?php echo base_url() ?>resources/js/apps/kertas-kerja.js?v=<?php echo time() ?>"></script>
<script src="<?php echo base_url() ?>resources/js/apps/form_1.js?v=<?php echo time() ?>"></script>