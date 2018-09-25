<?php
if( ! defined("BASEPATH")) exit("No direct script access allowed");
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/kertas-kerja.css">
<section class="content-header">
    <h1>
        <?php echo $title; ?>
    </h1>
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
                        <a href="#entry" class="panel-head panel-entry" aria-controls="entry" role="tab" data-toggle="tab" data-type="">Entry</a>
                    </li>
                    <li role="presentation" <?php echo (isset($_GET["role"]) && $_GET["role"]=="tanah") ? "class=\"active\"" : "" ?>>
                        <a href="#tanah" class="panel-head panel-tanah" aria-controls="tanah" role="tab" data-toggle="tab" data-type="">Tanah</a>
                    </li>
                    <?php
                        $i = 1;
                        foreach ($list_bangunan as $id_bangunan => $item_bangunan)
                        {
                            $role   = str_replace(" ", "_", $id_bangunan);
                        ?>
                    <li role="presentation" <?php echo (isset($_GET["role"]) && $_GET["role"]==$role) ? "class=\"active\"" : "" ?>>
                        <a href="#<?=$role?>" class="panel-head panel-<?=$role?>" aria-controls="<?=$role?>" role="tab" data-toggle="tab" data-type="bangunan"><?=$id_bangunan?></a>
                    </li>
                    <?php $i++; } ?>

                    <li role="presentation" <?php echo (isset($_GET["role"]) && $_GET["role"]=="dbanding") ? "class=\"active\"" : "" ?>>
                        <a href="#dbanding" class="panel-head panel-dbanding" aria-controls="dbanding" role="tab" data-toggle="tab" data-type="">Data Banding</a>
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
                                        <input type="text" id="textbox_entry_3" name="update[entry_3]" class="form-control table_input input_3_ " value="<?php echo (empty($txn_kertas_kerja["nama_penilai"])) ? $nama_penilai : $txn_kertas_kerja["nama_penilai"] ?>" data-id-field="3" data-keterangan="">
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

                                        <input type="text" id="textbox_entry_9" name="update[entry_9]" class="form-control table_input" value="<?php echo (empty($txn_kertas_kerja["tanggal_inspeksi_penilaian"])) ? format_ymd($tanggal_inspeksi_penilaian) : format_ymd($txn_kertas_kerja["tanggal_inspeksi_penilaian"]) ?>" data-id-field="9" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-keterangan="">
                                        <script>
                                            $(function(){
                                                $("#textbox_entry_9").datepicker({ dateFormat: "yyyy-mm-dd" });
                                            });
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Tanggal Laporan</label>
                                        <input type="text" id="textbox_entry_12" name="update[entry_12]" class="form-control table_input" value="<?php echo (empty($txn_kertas_kerja["tanggal_laporan"])) ? format_ymd($tanggal_laporan) : format_ymd($txn_kertas_kerja["tanggal_laporan"]) ?>" data-id-field="12" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-keterangan="">
                                        <script>
                                            $(function(){
                                                $("#textbox_entry_12").datepicker({ dateFormat: "yyyy-mm-dd" });
                                            })
                                        </script>
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
                                        <input type="text" id="textbox_entry_2" name="update[entry_2]" class="form-control table_input input_2_ " value="<?php echo (empty($txn_kertas_kerja["obyek_penilaian"])) ? $obyek_penilaian : $txn_kertas_kerja["obyek_penilaian"] ?>" data-id-field="2" data-keterangan="">                               
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
                                        <input type="text" id="textbox_entry_26" name="update[entry_26]" class="form-control table_input" value="<?php echo format_ymd($txn_kertas_kerja["tanggal_penugasan"]) ?>" data-id-field="26" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-keterangan="">
                                        <script>
                                            $(function(){
                                                $("#textbox_entry_26").datepicker({ dateFormat: "yyyy-mm-dd" });
                                            });
                                        </script>
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
                                        <textarea id="textbox_entry_18" name="update[entry_18]" class="form-control table_input input_18_" data-id-field="18" data-keterangan=""><?php echo (empty($txn_kertas_kerja["alamat_properti"])) ? $alamat_properti : $txn_kertas_kerja["alamat_properti"] ?></textarea>                               
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nama Provinsi</label>
                                        <input type="text" id="textbox_entry_21" name="update[entry_21]" class="form-control table_input input_21_ " value="<?php echo (empty($txn_kertas_kerja["provinsi"])) ? $provinsi : $txn_kertas_kerja["provinsi"] ?>" data-id-field="21" data-keterangan="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nama Kota / Kabupaten</label>
                                        <input type="text" id="textbox_entry_23" name="update[entry_23]" class="form-control table_input input_23_ " value="<?php echo (empty($txn_kertas_kerja["kotakab"])) ? $kotakab : $txn_kertas_kerja["kotakab"] ?>" data-id-field="23" data-keterangan="">                               
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Kecamatan</label>
                                        <input type="text" id="textbox_entry_25" name="update[entry_25]" class="form-control table_input input_25_ " value="<?php echo (empty($txn_kertas_kerja["kecamatan"])) ? $kecamatan : $txn_kertas_kerja["kecamatan"] ?>" data-id-field="25" data-keterangan="">                             
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Kelurahan / Desa</label>
                                        <input type="text" id="textbox_entry_27" name="update[entry_27]" class="form-control table_input input_27_ " value="<?php echo (empty($txn_kertas_kerja["kelurahan"])) ? $kelurahan : $txn_kertas_kerja["kelurahan"] ?>" data-id-field="27" data-keterangan="">                             
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nama Gedung</label>
                                        <input type="text" id="textbox_entry_33" name="update[entry_33]" class="form-control table_input input_897_ " value="<?php echo (empty($txn_kertas_kerja["nama_gedung"])) ? $kelurahan : $txn_kertas_kerja["nama_gedung"] ?>" data-id-field="897" data-keterangan="">                             
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Blok/Area</label>
                                        <input type="text" id="textbox_entry_34" name="update[entry_34]" class="form-control table_input input_898_ " value="<?php echo (empty($txn_kertas_kerja["blok"])) ? $kelurahan : $txn_kertas_kerja["blok"] ?>" data-id-field="898" data-keterangan="">                             
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Letak Lantai Unit Kios</label>
                                        <input type="text" id="textbox_entry_35" name="update[entry_35]" class="form-control table_input input_899_ " value="<?php echo (empty($txn_kertas_kerja["lantai"])) ? $kelurahan : $txn_kertas_kerja["lantai"] ?>" data-id-field="899" data-keterangan="">                             
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Nomor Unit Kios</label>
                                        <input type="text" id="textbox_entry_36" name="update[entry_36]" class="form-control table_input input_900_ " value="<?php echo (empty($txn_kertas_kerja["nomor"])) ? $kelurahan : $txn_kertas_kerja["nomor"] ?>" data-id-field="900" data-keterangan="">                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h4>HASIL PENILAIAN TERDAHULU</h4>
                                
                                <div class="table-responsive table_div" id="history_penilaian"></div>
                            </div>
                        </div>
                    </div>

                    <div role="tabpanel" id="tanah" <?php echo (isset($_GET["role"]) && $_GET["role"]=="tanah") ? "class=\"tab-pane active\"" : "class=\"tab-pane\" " ?>>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="">
                                <a aria-expanded="false" href="#tanah_form" class="panel-tanah_tanah active" aria-controls="tanah_tanah" role="tab" data-toggle="tab" data-type="">Form Tanah</a>
                            </li>
                        </ul>

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
                                                        <td class="tanah-td-tanggal-inspeksi"><?php echo (empty($txn_kertas_kerja["tanggal_inspeksi_penilaian"])) ? format_ymd($tanggal_inspeksi_penilaian) : format_ymd($txn_kertas_kerja["tanggal_inspeksi_penilaian"]) ?></td>
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
                                                            <img id="img_tanah_32" src="<?php echo base_url() ?>/asset/file/<?php echo (empty($txn_tanah["foto"]) ? "default.jpg" : $txn_tanah["foto"]) ?>" data-id-field="133" data-name-field="tanah_32" data-keterangan="" class="img-responsive btn-upload-image img-133-" style="border: 1px solid #ccc; margin-top: 10px; margin-bottom: 20px; height: 100px;" />
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
                                                            <td>
                                                                <input type="text" id="textbox_tanah_5" name="update[tanah_5]" class="form-control table_input input_106_ " value="<?php echo $txn_tanah["batas_properti_1"] ?>" data-id-field="106" data-keterangan="">
                                                            </td>
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
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="col-md-6">
                                                    <h4>GAMBARAN LINGKUNGAN</h4>
                                                    <table class="table table_border" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td width="15%"><span>Lokasi pusat perbelanjaan</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_113_" id="textbox_tanah_12" name="update[tanah_12]" data-id-field="113" data-keterangan="">
                                                                    <option selected="selected" disabled="disabled">Select</option>
                                                                    <?php foreach ($tipe_pusat_perbelanjaan as $key => $value) {?>
                                                                    <option value="<?php echo $value->tipe_pusat_perbelanjaan ?>" <?php echo ($value->tipe_pusat_perbelanjaan==$txn_tanah["lokasi_pusat_perbelanjaan"]) ? "selected":"" ?>><?php echo $value->tipe_pusat_perbelanjaan ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Harga unit kios</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_114_" id="textbox_tanah_13" name="update[tanah_13]" data-id-field="114" data-keterangan="">
                                                                    <option selected="selected" disabled="disabled">Select</option>
                                                                    <?php foreach ($harga_tanah_objek as $key => $value) { ?>
                                                                    <option value="<?php echo $value->harga_tanah_objek ?>" <?php echo ($value->harga_tanah_objek==$txn_tanah["harga_unit_kios"]) ? "selected":"" ?>><?php echo $value->harga_tanah_objek ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="15%"><span>Kepadatan hunian</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_115_" id="textbox_tanah_14" name="update[tanah_14]" data-id-field="115" data-keterangan="">
                                                                    <option selected="selected" disabled="disabled">Select</option>
                                                                    <?php foreach ($kepadatan_bangunan as $key => $value) { ?>
                                                                    <option value="<?php echo $value->kepadatan_bangunan ?>" <?php echo ($value->kepadatan_bangunan==$txn_tanah["kepadatan_hunian"]) ? "selected":"" ?>><?php echo $value->kepadatan_bangunan ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><span>Pertumbuhan hunian</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_116_" id="textbox_tanah_15" name="update[tanah_15]" data-id-field="116" data-keterangan="">
                                                                    <option selected="selected" disabled="disabled">Select</option>
                                                                    <?php foreach ($pertumbuhan_bangunan as $key => $value) { ?>
                                                                    <option value="<?php echo $value->pertumbuhan_bangunan ?>" <?php echo ($value->pertumbuhan_bangunan==$txn_tanah["pertumbuhan_hunian"]) ? "selected":"" ?>><?php echo $value->pertumbuhan_bangunan ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-6" style="padding: 0px">
                                                    <h4>ANALISA LINGKUNGAN</h4>
                                                    <table class="table table_border">
                                                        <tr>
                                                            <td><span>Mayoritas data hunian pada kawasan</span></td>
                                                            <td>
                                                                <select class="form-control table_input input_132_" id="textbox_tanah_31" name="update[tanah_31]" data-id-field="132" data-keterangan="">
                                                                    <option selected="selected" disabled="disabled">Select</option>
                                                                    <?php foreach ($tipe_hunian as $key => $value) {?>
                                                                    <option value="<?php echo $value->tipe_hunian ?>" <?php echo ($value->tipe_hunian==$txn_tanah["data_hunian"]) ? "selected":"" ?>><?php echo $value->tipe_hunian ?></option>
                                                                    <?php } ?>
                                                                </select>

                                                                <br>

                                                                <input type="text" id="textbox_tanah_74" name="update[tanah_74]" class="form-control table_input input_354_ " value="<?php echo $txn_tanah['data_hunian_lainya'] ?>" data-id-field="354" data-keterangan="">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><span>Kemudahan mencapai lokasi obyek</span></td>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">LOKASI SITE</h3>
                                    </div>
                                    <div class="panel-body">
                                        <h4>FASILITAS BANGUNAN</h4>
                                        <div class="col-md-6">
                                            <table class="table table_border">
                                                <tr>
                                                    <td><span>AC Control</span></td>
                                                    <td width="25px">
                                                        <input type="checkbox" id="textbox_tanah_39" name="update[tanah_39]" class="table_input" data-id-field="140" data-keterangan="" <?php echo ($txn_tanah["ac_control"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span>Food Court</span></td>
                                                    <td>
                                                        <input type="checkbox" id="textbox_tanah_40" name="update[tanah_40]" class="table_input" data-id-field="141" data-keterangan="" <?php echo ($txn_tanah["food_court"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span>Gallery ATM</span></td>
                                                    <td>
                                                        <input type="checkbox" id="textbox_tanah_41" name="update[tanah_41]" class="table_input"  data-id-field="142" data-keterangan="" <?php echo ($txn_tanah["gallery_atm"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span>Sarana Ibadah</span></td>
                                                    <td>
                                                        <input type="checkbox" id="textbox_tanah_42" name="update[tanah_42]" class="table_input"  data-id-field="143" data-keterangan="" <?php echo ($txn_tanah["sarana_ibadah"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span>Lift Penumpang</span></td>
                                                    <td>
                                                        <input type="checkbox" id="textbox_tanah_43" name="update[tanah_43]" class="table_input"  data-id-field="144" data-keterangan="" <?php echo ($txn_tanah["lift_penumpang"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span>Lift Barang</span></td>
                                                    <td>
                                                        <input type="checkbox" id="textbox_tanah_44" name="update[tanah_44]" class="table_input"  data-id-field="145" data-keterangan="" <?php echo ($txn_tanah["lift_barang"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span>Fasilitas / Pengelola Parkir</span></td>
                                                    <td>
                                                        <input type="checkbox" id="textbox_tanah_48" name="update[tanah_48]" class="table_input"  data-id-field="149" data-keterangan="" <?php echo ($txn_tanah["fasilitas_parkir"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span>CCTV System</span></td>
                                                    <td>
                                                        <input type="checkbox" id="textbox_tanah_46" name="update[tanah_46]" class="table_input"  data-id-field="147" data-keterangan="" <?php echo ($txn_tanah["cctv"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table_border">
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
                                                    <td><span>Excalator</span></td>
                                                    <td>
                                                        <input type="checkbox" id="textbox_tanah_37" name="update[tanah_37]" class="table_input"  data-id-field="138" data-keterangan="" <?php echo ($txn_tanah["excalator"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span>Tangga Darurat</span></td>
                                                    <td>
                                                        <input type="checkbox" id="textbox_tanah_38" name="update[tanah_38]" class="table_input"  data-id-field="139" data-keterangan="" <?php echo ($txn_tanah["tangga_darurat"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span>Hydrant</span></td>
                                                    <td>
                                                        <input type="checkbox" id="textbox_tanah_47" name="update[tanah_47]" class="table_input"  data-id-field="148" data-keterangan="" <?php echo ($txn_tanah["hydrant"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span>Alarm System</span></td>
                                                    <td>
                                                        <input type="checkbox" id="textbox_tanah_41" name="update[tanah_41]" class="table_input"  data-id-field="142" data-keterangan="" <?php echo ($txn_tanah["alarm_system"] == 1) ? "checked" : "" ?>>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>

                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">D A T A&nbsp;&nbsp;&nbsp;L E G A L I T A S</h3>
                                    </div>

                                    <div class="panel-body">
                                        <table class="table" cellpadding="0" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <td>Nomor IMB (Bersama)</td>
                                                <td>
                                                    <span><input type="text" id="textbox_tanah_50" name="update[tanah_50]" class="form-control table_input input_151_ " value="<?php echo $txn_tanah["nomor_imb"] ?>" data-id-field="151" data-keterangan=""></span>
                                                </td>
                                                <td>Luas Bangunan Berdasarkan IMB</td>
                                                <td>
                                                    <span><input type="text" id="textbox_tanah_52" name="update[tanah_52]" class="form-control table_input input_153_ " value="<?php echo $txn_tanah["tanggal_dikeluarkan_imb"] ?>" data-id-field="153" data-keterangan=""></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal di Keluarkan IMB (Bersama)</td>
                                                <td>
                                                    <span>
                                        			<input type="text" id="textbox_tanah_51" name="update[tanah_51]" class="form-control table_input" value="<?php echo format_ymd($txn_tanah["tanggal_dikeluarkan_imb"]) ?>" data-id-field="152" data-date-format="yyyy-mm-dd" data-date-autoclose="true" data-keterangan="">
                                        			<script>
                                                    $(function(){
                                        			 $("#textbox_tanah_51").datepicker();
                                                    });
                                        			</script>
                                        			</span>
                                                </td>
                                                <td>(Luas Keseluruhan <span class="tanah_block"></span>)</td>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <input type="hidden" id="total_data_legalitas">

                                    <div class="table-responsive">
                                        <table id="table_data_legalitas_1" class="table-legalitas table_border_2" width="100%" cellpadding="0" cellspacing="0">
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
                                                    <span>Luas Lantai (m<sup>2</sup>)</span>
                                                </th>
                                                <th rowspan="2">
                                                    <span></th>
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
                                            <tbody id="tbody_data_legalitas_1"></tbody>
                                            <tfoot>
                                            <tr>
                                                <td align="center" colspan="8">
                                                    <span>TOTAL LUAS UNIT KIOS SESUAI SERTIFIKAT</span>
                                                </td>
                                                <td>
                                                    <input type="text" id="textbox_tanah_61" name="update[tanah_61]" class="form-control table_input input_162_ " value="<?php echo $txn_tanah['luas'] ?>" data-id-field="162" data-keterangan="">
                                                </td>
                                                <td></td>
                                            </tr>
                                            </tfoot>
                                        </table><br>
                                    </div>
                                
                                    <div style="padding: 10px">
                                        <button type="button" class="btn btn-primary btn-sm btn-data-legalitas" data-type="tambah" data-id="">TAMBAH</button>
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

                    <?php 
                        $i = 1; 
                        foreach ($list_bangunan as $id_bangunan => $item_bangunan) {
                            $role   = str_replace(" ", "_", $id_bangunan);
                            $txn_bangunan = $this->global_model->get_list_array("txn_bangunan", "id_lokasi=\"$id_lokasi\" AND bangunan_role=\"$role\"");
                            if (count($txn_bangunan)===0)
                            {
                                $txn_id_bangunan = $this->global_model->insert_data("txn_bangunan", array("id_lokasi"=>$id_lokasi, "bangunan_role"=>$role), 1);
                                $txn_bangunan = $this->global_model->get_list_array("txn_bangunan", "id_lokasi=\"$id_lokasi\" AND bangunan_role=\"$role\"");
                            }
                            $txn_bangunan = (count($txn_bangunan)===0) ? array() : $txn_bangunan[0];
                            $txn_id_bangunan = isset($txn_bangunan["id_bangunan"]) ? $txn_bangunan["id_bangunan"] : false;
                            $txn_bangunan_btb = $this->global_model->get_by_id_array("txn_bangunan_btb", "id_bangunan", $txn_id_bangunan);
                        ?>
                    <div role="tabpanel" id="<?php echo $role ?>" <?php echo (isset($_GET["role"]) && $_GET["role"]==$role) ? "class=\"tab-pane active\"" : "class=\"tab-pane\" " ?>>
                        <h4>Penilaian Bangunan 1</h4>

                        <div id="tab_<?php echo $role ?>">   
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class=""> 
                                    <a aria-expanded="false" href="#bangunan_bangunan_<?php echo $role ?>" class="panel-bangunan_bangunan active" aria-controls="bangunan_bangunan" role="tab" data-toggle="tab" data-type="">Form Bangunan</a> 
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="bangunan_bangunan_<?php echo $role ?>">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">O B Y E K&nbsp;&nbsp;&nbsp;P E N I L A I A N</h3>
                                        </div>

                                        <div class="panel-body">
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
                                                                echo 
                                                                $lokasi->alamat." ".
                                                                (!empty($lokasi->gang) ? "Gang ".$lokasi->gang : "")." No. ".$lokasi->nomor.", RT. ".$lokasi->rt." RW. ".$lokasi->rw." ".$lokasi->nama_desa." ".(!empty($lokasi->dh_desa) ? "(d/h ".$lokasi->dh_desa.")" : "")." ".$lokasi->nama_kecamatan." ".(!empty($lokasi->dh_kecamatan) ? "(d/h ".$lokasi->dh_kecamatan.")" : "")." ".$lokasi->nama_kota." ".(!empty($lokasi->dh_kota) ? "(d/h ".$lokasi->dh_kota.")" : "").", ".$lokasi->nama_provinsi ." ".(!empty($lokasi->dh_provinsi) ? "(d/h ".$lokasi->dh_provinsi.")" : "");
                                                                ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">LUAS PENGUKURAN FISIK BANGUNAN <span class="tipe_bangunan"></span></h3>
                                        </div>

                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="table-responsive">
                                                        <table class="table table_border_2 table_bangunan <?php echo $role ?>" cellpadding="0" cellspacing="0" style="table-layout:fixed">
                                                            <?php 
                                                                $luas_ruangan = $this->app_model->get_luas_kordiant_as_key($id_lokasi, $role, "Ruangan");
                                                                $luas_teras_balkon = $this->app_model->get_luas_kordiant_as_key($id_lokasi, $role, "Teras Balkon");
                                                                $luas_lantai_mezzanine = $this->app_model->get_luas_kordiant_as_key($id_lokasi, $role, "Lantai Mezzanine");
                                                                $luas_lain = $this->app_model->get_luas_kordiant_as_key($id_lokasi, $role, "Lain-lain");
                                                                
                                                                $list_lantai = $custom_data["tab_bangunan"][$id_bangunan]["lantai"];
                                                                $list_ruangan = $custom_data["tab_bangunan"][$id_bangunan]["ruangan"];
                                                                ?>
                                                            <colgroup>
                                                                <col style="width:120px">
                                                                <?php foreach ($list_ruangan as $key => $ruangan) { ?> 
                                                                <col style="width:70px">
                                                                <?php } ?>
                                                                <col style="width:70px">
                                                            </colgroup>
                                                            <thead>
                                                                <tr>
                                                                    <th>Ruangan</th>
                                                                    <?php $i = 1; foreach ($list_ruangan as $key => $ruangan) { ?>
                                                                    <th><a style="cursor: pointer; color: #eee" class="change-ruang" data-id="<?php echo $i ?>" data-bangunan="<?php echo $role ?>" ><?php echo $ruangan ?></a></th>
                                                                    <?php $i++; } ?>
                                                                    <th>Jumlah<br>Luas</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                    $y = 1; 
                                                                    foreach ($list_lantai as $key => $lantai) { 
                                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <span><?php echo $lantai ?></span>
                                                                    </td>
                                                                    <?php $x = 1; foreach ($list_ruangan as $key => $ruangan) { ?>
                                                                    <?php
                                                                        $koordinat = $role."__".$y."__".$x;
                                                                        
                                                                        $luas_ruangan_x = isset($luas_ruangan[$x]) ? $luas_ruangan[$x] : array();
                                                                        $luas_ruangan_z = isset($luas_ruangan_x[$y]) ? $luas_ruangan_x[$y] : 0;
                                                                        
                                                                        ?>
                                                                    <td>
                                                                        <input type="text" id="textbox_bangunan_3" name="update[bangunan_3]" class="form-control table_input input_637_<?php echo $koordinat ?> <?php echo $role ?> <?php echo $koordinat ?> <?php echo $role ?>" value="<?php echo $luas_ruangan_z ?>" data-id-field="637" data-keterangan="<?php echo $koordinat ?> <?php echo $role ?>">
                                                                    </td>
                                                                    <?php 
                                                                        if ($x == count($list_ruangan)){ 
                                                                            $koordinat_jumlah = $role."__".$y."__".($x+1);
                                                                            ?>
                                                                    <td>
                                                                        <input type="text" id="textbox_bangunan_3" name="update[bangunan_3]" class="form-control table_input input_637_<?php echo $koordinat_jumlah ?> <?php echo $koordinat_jumlah ?> text-center readonly" value="0" data-id-field="637" data-keterangan="<?php echo $koordinat_jumlah ?>">
                                                                    </td>
                                                                    <?php } ?>
                                                                    <?php $x++; } ?>
                                                                </tr>
                                                                <?php $y++; } ?>
                                                            </tbody>
                                                            <thead>
                                                                <?php
                                                                    $luas_colspan = count($list_ruangan)+1;
                                                                    ?>
                                                                <tr>
                                                                    <th colspan="<?php echo $luas_colspan ?>">TOTAL LUAS PENGUKURAN FISIK BANGUNAN UTAMA <span class="tipe_bangunan"></span></th>
                                                                    <th>
                                                                        <input type="text" id="textbox_bangunan_5" name="update[bangunan_5]" class="form-control table_input input_639_<?php echo $role ?> <?php echo $role ?>" value="0" data-id-field="639" data-keterangan="<?php echo $role ?>">
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="table-responsive">
                                                        <table class="table table_border_2 teras_1" cellpadding="0" cellspacing="0" style="text-align: center">
                                                            <thead>
                                                                <tr>
                                                                    <th>Teras<br>Balkon(m<sup>2</sup>)</th>
                                                                </tr>
                                                            </thead>
                                                            <?php 
                                                                $y = 1; 
                                                                foreach ($list_lantai as $key => $lantai) { 
                                                                    $koordinat = $role."__".$y;
                                                                
                                                                    $luas_ruangan_x = isset($luas_teras_balkon[1]) ? $luas_teras_balkon[1] : array();
                                                                    $luas_ruangan_z = isset($luas_ruangan_x[$y]) ? $luas_ruangan_x[$y] : 0; 
                                                                    ?>
                                                            <tr>
                                                                <td align="center">
                                                                    <input type="text" id="textbox_bangunan_113" name="update[bangunan_113]" class="form-control table_input input_747_<?php echo $koordinat ?> <?php echo $role ?> <?php echo $koordinat ?> <?php echo $role ?>" value="<?php echo $luas_ruangan_z ?>" data-id-field="747" data-keterangan="<?php echo $koordinat ?> <?php echo $role ?>">
                                                                </td>
                                                            </tr>
                                                            <?php $y++; } ?>
                                                            <thead>
                                                                <?php
                                                                    $koordinat = $role."__".$y;
                                                                    $y++;
                                                                    ?>
                                                                <tr>
                                                                    <th>
                                                                        <input type="text" id="textbox_bangunan_113" name="update[bangunan_113]" class="form-control table_input input_747_<?php echo $koordinat ?> <?php echo $role ?> <?php echo $koordinat ?> <?php echo $role ?>" value="0" data-id-field="747" data-keterangan="<?php echo $koordinat ?> <?php echo $role ?>">
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="padding: 15px">
	                                        <button type="button" class="btn btn-primary btn-sm btn-tambah-lantai" data-bangunan="<?php echo $role ?>">Tambah Lantai</button> <button type="button" class="btn btn-primary btn-sm btn-tambah-ruangan" data-bangunan="<?php echo $role ?>">Tambah Ruangan</button>
	                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">LOKASI DAN FASILITAS UNIT KIOS <span class="tipe_bangunan"></span></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <table class="table table_border" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td><span>Lokasi unit kios</span></td>
                                                <td>
                                                    <select class="form-control table_input input_645_<?php echo $role ?>" id="textbox_<?php echo $role ?>1" name="update[<?php echo $role ?>1]" data-id-field="645" data-keterangan="<?php echo $role ?>">
                                                        <option selected="selected" disabled="disabled">Select</option>

                                                        <?php foreach ($tipe_strategis as $key => $value) { ?>
                                                        <option value="<?php echo $value->tipe_strategis ?>" <?php echo ($txn_bangunan["lokasi_unit_kios"] == $value->tipe_strategis) ? "selected":"" ?>><?php echo $value->tipe_strategis ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Letak lantai kios</span></td>
                                                <td>
                                                    <input type="text" id="textbox_<?php echo $role ?>2" name="update[<?php echo $role ?>2]" class="form-control table_input input_646_<?php echo $role ?> <?php echo $role ?>" value="<?php echo $txn_bangunan["letak_lantai_kios"] ?>" data-id-field="646" data-keterangan="<?php echo $role ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Blok / Area</span></td>
                                                <td><input type="text" id="textbox_<?php echo $role ?>3" name="update[<?php echo $role ?>3]" class="form-control table_input input_647_<?php echo $role ?> <?php echo $role ?>" value="<?php echo $txn_bangunan["blok_area"] ?>" data-id-field="647" data-keterangan="<?php echo $role ?>"></td>
                                            </tr>
                                            <tr>
                                                <td><span>Posisi unit kios</span></td>
                                                <td>
                                                    <select class="form-control table_input input_648_<?php echo $role ?>" id="textbox_<?php echo $role ?>4" name="update[<?php echo $role ?>4]" data-id-field="648" data-keterangan="<?php echo $role ?>">
                                                        <option selected="selected" disabled="disabled">Select</option>
                                                        <?php foreach ($tipe_posisi_kios as $key => $value) { ?>
                                                        <option value="<?php echo $value->tipe_posisi_kios ?>" <?php echo ($txn_bangunan["posisi_unit_kios"] == $value->tipe_posisi_kios) ? "selected":"" ?>><?php echo $value->tipe_posisi_kios ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Interior kios</span></td>
                                                <td>
                                                    <select class="form-control table_input input_649_<?php echo $role ?>" id="textbox_<?php echo $role ?>5" name="update[<?php echo $role ?>5]" data-id-field="649" data-keterangan="<?php echo $role ?>">
                                                        <option selected="selected" disabled="disabled">Select</option>
                                                        <?php foreach ($tipe_penilaian as $key => $value) { ?>
                                                        <option value="<?php echo $value->tipe_penilaian ?>" <?php echo ($txn_bangunan["interior_kios"] == $value->tipe_penilaian) ? "selected":"" ?>><?php echo $value->tipe_penilaian ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Produk dagang</span></td>
                                                <td>
                                                    <input type="text" id="textbox_<?php echo $role ?>6" name="update[<?php echo $role ?>6]" class="form-control table_input input_650_<?php echo $role ?> <?php echo $role ?>" value="<?php echo $txn_bangunan["produk_dagang"] ?>" data-id-field="650" data-keterangan="<?php echo $role ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Daya listrik</span></td>
                                                <td>
                                                    <select class="form-control table_input input_651_<?php echo $role ?>" id="textbox_<?php echo $role ?>7" name="update[<?php echo $role ?>7]" data-id-field="651" data-keterangan="<?php echo $role ?>">
                                                        <option selected="selected" disabled="disabled">Select</option>
                                                        <?php foreach ($daya_listrik as $key => $value) { ?>
                                                        <option value="<?php echo $value->daya_listrik ?>" <?php echo ($txn_bangunan["daya_listrik"] == $value->daya_listrik) ? "selected":"" ?>><?php echo $value->daya_listrik ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Unit AC</span></td>
                                                <td>
                                                    <select class="form-control table_input input_652_<?php echo $role ?>" id="textbox_<?php echo $role ?>8" name="update[<?php echo $role ?>8]" data-id-field="652" data-keterangan="<?php echo $role ?>">
                                                        <option selected="selected" disabled="disabled">Select</option>
                                                        <?php for ($i = 0; $i <=20; $i++){ ?>
                                                        <option value="<?php echo $i ?>" <?php echo ($txn_bangunan["unit_ac"] == $i) ? "selected":"" ?>><?php echo $i ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><span>Telepon</span></td>
                                                <td>
                                                    <select class="form-control table_input input_653_<?php echo $role ?>" id="textbox_<?php echo $role ?>9" name="update[<?php echo $role ?>9]" data-id-field="653" data-keterangan="<?php echo $role ?>">
                                                        <option selected="selected" disabled="disabled">Select</option>
                                                        <?php for ($i = 0; $i <=20; $i++){ ?>
                                                        <option value="<?php echo $i ?>" <?php echo ($txn_bangunan["telepon"] == $i) ? "selected":"" ?>><?php echo $i ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">KESIMPULAN NILAI PROPERTI<span class="tipe_bangunan"></span></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <table class="table table_border" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>
                                                	<span>NILAI PASAR</span>
                                                </td>
                                                <td colspan = "2">
                                                	<input type="text" id="textbox_bangunan_57" name="update[bangunan_57]" class="form-control table_input input_691_<?php echo $role ?> <?php echo $role ?> text-right" value="<?php echo $txn_bangunan["nilai_pasar"] ?>" data-id-field="691" data-keterangan="<?php echo $role ?>" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                	<span>INDIKASI NILAI LIKUIDASI</span>
                                                </td>
                                                <td colspan = "2">
                                                	<input type="text" id="textbox_bangunan_58" name="update[bangunan_58]" class="form-control table_input input_692_<?php echo $role ?> <?php echo $role ?> text-right" value="<?php echo $txn_bangunan["nilai_likuidasi"] ?>" data-id-field="692" data-keterangan="<?php echo $role ?>" readonly>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">CATATAN PENILAI</h3>
                                </div>
                                <div class="panel-body">
                                    <textarea id="textbox_bangunan_59" name="update[bangunan_59]" class="form-control table_input input_693_<?php echo $role ?>" data-id-field="693" data-keterangan="<?php echo $role ?>"><?php echo $txn_bangunan["catatan_penilai"] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $i++; 
                        } ?>

                    <div role="tabpanel" id="dbanding" <?php echo (isset($_GET["role"]) && $_GET["role"]=="dbanding") ? "class=\"tab-pane active\"" : "class=\"tab-pane\" " ?>>
                        <div id="table_pembanding">
                            <input type="hidden" id="jumlah_pembanding" value="4">
                            <div class="table_div">
                                <table class="table-movefield table_border_3" cellpadding="0" cellspacing="0">
                                    <colgroup>
                                        <col style="width: 20%">
                                        <col style="width: 20%">
                                        <col style="width: 20%">
                                        <col style="width: 20%">
                                        <col style="width: 20%">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>URAIAN</th>
                                            <th>Objek Penilaian</th>
                                            <th>Pembanding 1</th>
                                            <th>Pembanding 2</th>
                                            <th>Pembanding 3</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td rowspan="2"><span>Lampiran Foto</span></td>
                                            <td>
                                                <img id="img_pembanding_1" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_0["foto_1"]) ? "default.jpg" : $txn_data_banding_0["foto_1"]; ?>" data-id-field="247"  data-name-field="pembanding_1" data-keterangan="0" class="img-responsive btn-upload-image img-247-0" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-247" class="form-control tmp_file file-247-0" data-id-field="247" data-name-field="pembanding_1" style="display: none;" data-keterangan="0">
                                                <input type="hidden" id="textbox_pembanding_1" name="update[pembanding_1]" class="form-control table_input textbox-247-0" value="<?php echo empty($txn_data_banding_0["foto_1"]) ? "default.jpg" : $txn_data_banding_0["foto_1"]; ?>" data-id-field="247" data-name-field="pembanding_1" data-keterangan="0">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_1" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_1["foto_1"]) ? "default.jpg" : $txn_data_banding_1["foto_1"]; ?>" data-id-field="247"  data-name-field="pembanding_1" data-keterangan="1" class="img-responsive btn-upload-image img-247-1" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-247" class="form-control tmp_file file-247-1" data-id-field="247" data-name-field="pembanding_1" style="display: none;" data-keterangan="1">
                                                <input type="hidden" id="textbox_pembanding_1" name="update[pembanding_1]" class="form-control table_input textbox-247-1" value="<?php echo empty($txn_data_banding_1["foto_1"]) ? "default.jpg" : $txn_data_banding_1["foto_1"]; ?>" data-id-field="247" data-name-field="pembanding_1" data-keterangan="1">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_1" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_2["foto_1"]) ? "default.jpg" : $txn_data_banding_2["foto_1"]; ?>" data-id-field="247"  data-name-field="pembanding_1" data-keterangan="2" class="img-responsive btn-upload-image img-247-2" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-247" class="form-control tmp_file file-247-2" data-id-field="247" data-name-field="pembanding_1" style="display: none;" data-keterangan="2">
                                                <input type="hidden" id="textbox_pembanding_1" name="update[pembanding_1]" class="form-control table_input textbox-247-2" value="<?php echo empty($txn_data_banding_2["foto_1"]) ? "default.jpg" : $txn_data_banding_2["foto_1"]; ?>" data-id-field="247" data-name-field="pembanding_1" data-keterangan="2">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_1" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_3["foto_1"]) ? "default.jpg" : $txn_data_banding_3["foto_1"]; ?>" data-id-field="247"  data-name-field="pembanding_1" data-keterangan="3" class="img-responsive btn-upload-image img-247-3" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-247" class="form-control tmp_file file-247-3" data-id-field="247" data-name-field="pembanding_1" style="display: none;" data-keterangan="3">
                                                <input type="hidden" id="textbox_pembanding_1" name="update[pembanding_1]" class="form-control table_input textbox-247-3" value="<?php echo empty($txn_data_banding_3["foto_1"]) ? "default.jpg" : $txn_data_banding_3["foto_1"]; ?>" data-id-field="247" data-name-field="pembanding_1" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img id="img_pembanding_2" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_0["foto_2"]) ? "default.jpg" : $txn_data_banding_0["foto_2"]; ?>" data-id-field="248"  data-name-field="pembanding_2" data-keterangan="0" class="img-responsive btn-upload-image img-248-0" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-248" class="form-control tmp_file file-248-0" data-id-field="248" data-name-field="pembanding_2" style="display: none;" data-keterangan="0">
                                                <input type="hidden" id="textbox_pembanding_2" name="update[pembanding_2]" class="form-control table_input textbox-248-0" value="<?php echo empty($txn_data_banding_0["foto_2"]) ? "default.jpg" : $txn_data_banding_0["foto_2"]; ?>" data-id-field="248" data-name-field="pembanding_2" data-keterangan="0">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_2" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_1["foto_2"]) ? "default.jpg" : $txn_data_banding_1["foto_2"]; ?>" data-id-field="248"  data-name-field="pembanding_2" data-keterangan="1" class="img-responsive btn-upload-image img-248-1" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-248" class="form-control tmp_file file-248-1" data-id-field="248" data-name-field="pembanding_2" style="display: none;" data-keterangan="1">
                                                <input type="hidden" id="textbox_pembanding_2" name="update[pembanding_2]" class="form-control table_input textbox-248-1" value="<?php echo empty($txn_data_banding_1["foto_2"]) ? "default.jpg" : $txn_data_banding_1["foto_2"]; ?>" data-id-field="248" data-name-field="pembanding_2" data-keterangan="1">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_2" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_2["foto_2"]) ? "default.jpg" : $txn_data_banding_2["foto_2"]; ?>" data-id-field="248"  data-name-field="pembanding_2" data-keterangan="2" class="img-responsive btn-upload-image img-248-2" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-248" class="form-control tmp_file file-248-2" data-id-field="248" data-name-field="pembanding_2" style="display: none;" data-keterangan="2">
                                                <input type="hidden" id="textbox_pembanding_2" name="update[pembanding_2]" class="form-control table_input textbox-248-2" value="<?php echo empty($txn_data_banding_2["foto_2"]) ? "default.jpg" : $txn_data_banding_2["foto_2"]; ?>" data-id-field="248" data-name-field="pembanding_2" data-keterangan="2">
                                            </td>
                                            <td>
                                                <img id="img_pembanding_2" src="<?php echo base_url() ?>/asset/file/<?php echo empty($txn_data_banding_3["foto_2"]) ? "default.jpg" : $txn_data_banding_3["foto_2"]; ?>" data-id-field="248"  data-name-field="pembanding_2" data-keterangan="3" class="img-responsive btn-upload-image img-248-3" style="display:block; min-width:100%;" />
                                                <input type="file" id="file-248" class="form-control tmp_file file-248-3" data-id-field="248" data-name-field="pembanding_2" style="display: none;" data-keterangan="3">
                                                <input type="hidden" id="textbox_pembanding_2" name="update[pembanding_2]" class="form-control table_input textbox-248-3" value="<?php echo empty($txn_data_banding_3["foto_2"]) ? "default.jpg" : $txn_data_banding_3["foto_2"]; ?>" data-id-field="248" data-name-field="pembanding_2" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" style="padding: 8px 0; font-weight: bold;">
                                            	<span>INFORMASI</span>
                                            </td>
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
                                            <td></td>
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
                                                <input type="text" id="textbox_pembanding_5" name="update[pembanding_5]" class="form-control table_input input_251_0 0" value="<?php echo $txn_kertas_kerja["telepon_klien"] ?>" data-id-field="251" data-keterangan="0">
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
                                            <td><span>Nama pusat perbelanjaan</span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_7" name="update[pembanding_7]" class="form-control table_input input_253_0 0" value="<?php echo $txn_data_banding_0["nama_pusat_perbelanjaan"] ?>" data-id-field="253" data-keterangan="0">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_7" name="update[pembanding_7]" class="form-control table_input input_253_1 1" value="<?php echo $txn_data_banding_1["nama_pusat_perbelanjaan"] ?>" data-id-field="253" data-keterangan="1">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_7" name="update[pembanding_7]" class="form-control table_input input_253_2 2" value="<?php echo $txn_data_banding_2["nama_pusat_perbelanjaan"] ?>" data-id-field="253" data-keterangan="2">
                                            </td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_7" name="update[pembanding_7]" class="form-control table_input input_253_3 3" value="<?php echo $txn_data_banding_3["nama_pusat_perbelanjaan"] ?>" data-id-field="253" data-keterangan="3">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Letak lantai unit kios</span></td>
                                            <td><input type="text" id="textbox_pembanding_8" name="update[pembanding_8]" class="form-control table_input input_254_0 0" value="<?php echo $txn_data_banding_0["letak_lantai_kios"] ?>" data-id-field="254" data-keterangan="0"></td>
                                            <td><input type="text" id="textbox_pembanding_8" name="update[pembanding_8]" class="form-control table_input input_254_1 1" value="<?php echo $txn_data_banding_1["letak_lantai_kios"] ?>" data-id-field="254" data-keterangan="1"></td>
                                            <td><input type="text" id="textbox_pembanding_8" name="update[pembanding_8]" class="form-control table_input input_254_2 2" value="<?php echo $txn_data_banding_2["letak_lantai_kios"] ?>" data-id-field="254" data-keterangan="2"></td>
                                            <td><input type="text" id="textbox_pembanding_8" name="update[pembanding_8]" class="form-control table_input input_254_3 3" value="<?php echo $txn_data_banding_3["letak_lantai_kios"] ?>" data-id-field="254" data-keterangan="3"></td>
                                        </tr>
                                        <tr>
                                            <td><span>Blok / Area</span></td>
                                            <td><input type="text" id="textbox_pembanding_17" name="update[pembanding_17]" class="form-control table_input input_263_0 0" value="<?php echo $txn_data_banding_0["blok_area"] ?>" data-id-field="263" data-keterangan="0"></td>
                                            <td><input type="text" id="textbox_pembanding_17" name="update[pembanding_17]" class="form-control table_input input_263_1 1" value="<?php echo $txn_data_banding_1["blok_area"] ?>" data-id-field="263" data-keterangan="1"></td>
                                            <td><input type="text" id="textbox_pembanding_17" name="update[pembanding_17]" class="form-control table_input input_263_2 2" value="<?php echo $txn_data_banding_2["blok_area"] ?>" data-id-field="263" data-keterangan="2"></td>
                                            <td><input type="text" id="textbox_pembanding_17" name="update[pembanding_17]" class="form-control table_input input_263_3 3" value="<?php echo $txn_data_banding_3["blok_area"] ?>" data-id-field="263" data-keterangan="3"></td>
                                        </tr>
                                        <tr>
                                            <td><span>Harga penawaran </span></td>
                                            <td><input type="text" id="textbox_pembanding_9" name="update[pembanding_9]" class="form-control table_input input_255_0 0" value="<?php echo $txn_data_banding_0["harga_penawaran"] ?>" data-id-field="255" data-keterangan="0"></td>
                                            <td><input type="text" id="textbox_pembanding_9" name="update[pembanding_9]" class="form-control table_input input_255_1 1" value="<?php echo $txn_data_banding_1["harga_penawaran"] ?>" data-id-field="255" data-keterangan="1"></td>
                                            <td><input type="text" id="textbox_pembanding_9" name="update[pembanding_9]" class="form-control table_input input_255_2 2" value="<?php echo $txn_data_banding_2["harga_penawaran"] ?>" data-id-field="255" data-keterangan="2"></td>
                                            <td><input type="text" id="textbox_pembanding_9" name="update[pembanding_9]" class="form-control table_input input_255_3 3" value="<?php echo $txn_data_banding_3["harga_penawaran"] ?>" data-id-field="255" data-keterangan="3"></td>
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
                                            <td><input type="text" id="textbox_pembanding_11" name="update[pembanding_11]" class="form-control table_input input_257_0 0" value="<?php echo $txn_data_banding_0["indikasi_harga_transaksi"] ?>" data-id-field="257" data-keterangan="0"></td>
                                            <td><input type="text" id="textbox_pembanding_11" name="update[pembanding_11]" class="form-control table_input input_257_1 1" value="<?php echo $txn_data_banding_1["indikasi_harga_transaksi"] ?>" data-id-field="257" data-keterangan="1"></td>
                                            <td><input type="text" id="textbox_pembanding_11" name="update[pembanding_11]" class="form-control table_input input_257_2 2" value="<?php echo $txn_data_banding_2["indikasi_harga_transaksi"] ?>" data-id-field="257" data-keterangan="2"></td>
                                            <td><input type="text" id="textbox_pembanding_11" name="update[pembanding_11]" class="form-control table_input input_257_3 3" value="<?php echo $txn_data_banding_3["indikasi_harga_transaksi"] ?>" data-id-field="257" data-keterangan="3"></td>
                                        </tr>
                                        <tr>
                                            <td><span>Waktu penawaran / transaksi </span></td>
                                            <td></td>
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
                                        <!--spesifikasi data-->
                                        <tr>
                                            <td colspan="5" style="padding: 8px 0; font-weight: bold;"><span>SPESIFIKASI DATA</span></td>
                                        </tr>
                                        <tr>
                                            <td><span>Dokumen / legalitas</span></td>
                                            <td><input id="textbox_pembanding_13" name="update[pembanding_6]" class="form-control table_input input_259_0 readonly" value="" data-id-field="252" data-keterangan="0" type="text"></td>
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
                                            	<span>Luas unit kios </span>
                                            </td>
                                            <td>
                                            	<input type="text" id="textbox_pembanding_14" name="update[pembanding_14]" class="form-control table_input input_260_0 0" value="<?php echo $txn_data_banding_0["luas_unit_kios"] ?>" data-id-field="260" data-keterangan="0">
                                            </td>
                                            <td>
                                            	<input type="text" id="textbox_pembanding_14" name="update[pembanding_14]" class="form-control table_input input_260_1 1" value="<?php echo $txn_data_banding_1["luas_unit_kios"] ?>" data-id-field="260" data-keterangan="1">
                                            </td>
                                            <td>
                                            	<input type="text" id="textbox_pembanding_14" name="update[pembanding_14]" class="form-control table_input input_260_2 2" value="<?php echo $txn_data_banding_2["luas_unit_kios"] ?>" data-id-field="260" data-keterangan="2">
                                            </td>
                                            <td>
                                            	<input type="text" id="textbox_pembanding_14" name="update[pembanding_14]" class="form-control table_input input_260_3 3" value="<?php echo $txn_data_banding_3["luas_unit_kios"] ?>" data-id-field="260" data-keterangan="3">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span>Posisi unit kios</span></td>
                                            <td>
                                                <select class="form-control table_input input_262_0" id="textbox_pembanding_16" name="update[pembanding_16]" data-id-field="262" data-keterangan="0">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_posisi_kios as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_posisi_kios ?>" <?php echo ($txn_data_banding_0["posisi_unit_kios"] == $value->tipe_posisi_kios) ? "selected":"" ?>><?php echo $value->tipe_posisi_kios ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_262_1" id="textbox_pembanding_16" name="update[pembanding_16]" data-id-field="262" data-keterangan="1">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_posisi_kios as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_posisi_kios ?>" <?php echo ($txn_data_banding_1["posisi_unit_kios"] == $value->tipe_posisi_kios) ? "selected":"" ?>><?php echo $value->tipe_posisi_kios ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_262_2" id="textbox_pembanding_16" name="update[pembanding_16]" data-id-field="262" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_posisi_kios as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_posisi_kios ?>" <?php echo ($txn_data_banding_2["posisi_unit_kios"] == $value->tipe_posisi_kios) ? "selected":"" ?>><?php echo $value->tipe_posisi_kios ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_262_3" id="textbox_pembanding_16" name="update[pembanding_16]" data-id-field="262" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_posisi_kios as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_posisi_kios ?>" <?php echo ($txn_data_banding_3["posisi_unit_kios"] == $value->tipe_posisi_kios) ? "selected":"" ?>><?php echo $value->tipe_posisi_kios ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Lokasi unit kios</span></td>
                                            <td>
                                                <select class="form-control table_input input_264_0" id="textbox_pembanding_18" name="update[pembanding_18]" data-id-field="264" data-keterangan="0">
                                                    <option selected="selected" disabled="disabled">Select</option>

                                                    <?php foreach ($tipe_strategis as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_strategis ?>" <?php echo ($txn_data_banding_0["lokasi_unit_kios"] == $value->tipe_strategis) ? "selected":"" ?>><?php echo $value->tipe_strategis ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_264_1" id="textbox_pembanding_18" name="update[pembanding_18]" data-id-field="264" data-keterangan="1">
                                                    <option selected="selected" disabled="disabled">Select</option>

                                                    <?php foreach ($tipe_strategis as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_strategis ?>" <?php echo ($txn_data_banding_1["lokasi_unit_kios"] == $value->tipe_strategis) ? "selected":"" ?>><?php echo $value->tipe_strategis ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_264_2" id="textbox_pembanding_18" name="update[pembanding_18]" data-id-field="264" data-keterangan="2">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_strategis as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_strategis ?>" <?php echo ($txn_data_banding_2["lokasi_unit_kios"] == $value->tipe_strategis) ? "selected":"" ?>><?php echo $value->tipe_strategis ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control table_input input_264_3" id="textbox_pembanding_18" name="update[pembanding_18]" data-id-field="264" data-keterangan="3">
                                                    <option selected="selected" disabled="disabled">Select</option>
                                                    <?php foreach ($tipe_strategis as $key => $value) { ?>
                                                    <option value="<?php echo $value->tipe_strategis ?>" <?php echo ($txn_data_banding_3["lokasi_unit_kios"] == $value->tipe_strategis) ? "selected":"" ?>><?php echo $value->tipe_strategis ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right" colspan="2" style="background-color: white;"><span>Indikasi Nilai Bangunan ( / m<sup>2</sup> )</span></td>
                                            <td><input type="text" id="textbox_pembanding_30" name="update[pembanding_30]" class="form-control table_input input_276_1 1" value="<?php echo $txn_data_banding_1["indikasi_nilai_bangunan_permeter"] ?>" data-id-field="276" data-keterangan="1"></td>
                                            <td><input type="text" id="textbox_pembanding_30" name="update[pembanding_30]" class="form-control table_input input_276_2 2" value="<?php echo $txn_data_banding_2["indikasi_nilai_bangunan_permeter"] ?>" data-id-field="276" data-keterangan="2"></td>
                                            <td><input type="text" id="textbox_pembanding_30" name="update[pembanding_30]" class="form-control table_input input_276_3 3" value="<?php echo $txn_data_banding_3["indikasi_nilai_bangunan_permeter"] ?>" data-id-field="276" data-keterangan="3"></td>
                                        </tr>
                                        <!--penyesuaian-->
                                        <tr>
                                            <th>PENYESUAIAN</th>
                                            <th>Objek Penilaian</th>
                                            <th>Pembanding 1</th>
                                            <th>Pembanding 2</th>
                                            <th>Pembanding 3</th>
                                        </tr>
                                        <tr>
                                            <td><span>Dokumen / legalitas</span></td>
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
                                                <!-- <input type="text" id="textbox_pembanding_32" name="update[pembanding_32]" class="form-control table_input input_278_0 0" value="<?php echo $txn_data_banding_0["dokumen_legalitas_0"] ?>" data-id-field="278" data-keterangan="0" readonly> -->
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
                                            <td><span>Luas unit kios </span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_0 0" data-id-field="2083" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["luas_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
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
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["luas_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
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
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["luas_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
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
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["luas_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!-- <input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_0 0" value="<?php echo $txn_data_banding_0["luas_kios_0"] ?>" data-id-field="279" data-keterangan="0"> -->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_1-0" value="<?php echo $txn_data_banding_1["luas_kios_0"] ?>" data-id-field="279" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_1-2" value="<?php echo $txn_data_banding_1["luas_kios_1"] ?>" data-id-field="279" data-keterangan="1-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_1-3" value="<?php echo $txn_data_banding_1["luas_kios_2"] ?>" data-id-field="279" data-keterangan="1-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_2-0" value="<?php echo $txn_data_banding_2["luas_kios_0"] ?>" data-id-field="279" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_2-2" value="<?php echo $txn_data_banding_2["luas_kios_1"] ?>" data-id-field="279" data-keterangan="2-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_2-3" value="<?php echo $txn_data_banding_2["luas_kios_2"] ?>" data-id-field="279" data-keterangan="2-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_3-0" value="<?php echo $txn_data_banding_3["luas_kios_0"] ?>" data-id-field="279" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_3-2" value="<?php echo $txn_data_banding_3["luas_kios_1"] ?>" data-id-field="279" data-keterangan="3-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_33" name="update[pembanding_33]" class="form-control table_input input_279_3-3" value="<?php echo $txn_data_banding_3["luas_kios_2"] ?>" data-id-field="279" data-keterangan="3-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Letak lantai unit kios</span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_0 0" data-id-field="2084" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["letak_lantai_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_1 1" data-id-field="2084" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["letak_lantai_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_2 2" data-id-field="2084" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["letak_lantai_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_3 3" data-id-field="2084" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["letak_lantai_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!-- <input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_0 0" value="" data-id-field="283" data-keterangan="0"> -->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_1-0" value="<?php echo $txn_data_banding_1["luas_kios_0"] ?>" data-id-field="283" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_1-1" value="<?php echo $txn_data_banding_1["luas_kios_1"] ?>" data-id-field="283" data-keterangan="1-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_1-2" value="<?php echo $txn_data_banding_1["luas_kios_2"] ?>" data-id-field="283" data-keterangan="1-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_2-0" value="<?php echo $txn_data_banding_2["luas_kios_0"] ?>" data-id-field="283" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_2-1" value="<?php echo $txn_data_banding_2["luas_kios_1"] ?>" data-id-field="283" data-keterangan="2-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_2-2" value="<?php echo $txn_data_banding_2["luas_kios_2"] ?>" data-id-field="283" data-keterangan="2-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_3-0" value="<?php echo $txn_data_banding_3["luas_kios_0"] ?>" data-id-field="283" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_3-1" value="<?php echo $txn_data_banding_3["luas_kios_1"] ?>" data-id-field="283" data-keterangan="3-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_37" name="update[pembanding_37]" class="form-control table_input input_283_3-2" value="<?php echo $txn_data_banding_3["luas_kios_2"] ?>" data-id-field="283" data-keterangan="3-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Lokasi unit kios</span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_0 0" data-id-field="2085" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["lokasi_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_1 1" data-id-field="2085" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["lokasi_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_2 2" data-id-field="2085" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["lokasi_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_105" name="update[pembanding_105]" class="form-control table_input input_2083_3 3" data-id-field="2085" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["lokasi_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!-- <input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_0 0" value="" data-id-field="284" data-keterangan="0"> -->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_1-0" value="<?php echo $txn_data_banding_1["luas_kios_0"] ?>" data-id-field="284" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_1-1" value="<?php echo $txn_data_banding_1["luas_kios_1"] ?>" data-id-field="284" data-keterangan="1-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_1-2" value="<?php echo $txn_data_banding_1["luas_kios_2"] ?>" data-id-field="284" data-keterangan="1-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_2-0" value="<?php echo $txn_data_banding_2["luas_kios_0"] ?>" data-id-field="284" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_2-1" value="<?php echo $txn_data_banding_2["luas_kios_1"] ?>" data-id-field="284" data-keterangan="2-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_2-2" value="<?php echo $txn_data_banding_2["luas_kios_2"] ?>" data-id-field="284" data-keterangan="2-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_3-0" value="<?php echo $txn_data_banding_3["luas_kios_0"] ?>" data-id-field="284" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_3-1" value="<?php echo $txn_data_banding_3["luas_kios_1"] ?>" data-id-field="284" data-keterangan="3-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_38" name="update[pembanding_38]" class="form-control table_input input_284_3-2" value="<?php echo $txn_data_banding_3["luas_kios_2"] ?>" data-id-field="284" data-keterangan="3-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Posisi unit kios</span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_0 0" data-id-field="2086" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["posisi_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_1 1" data-id-field="2086" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["posisi_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_2 2" data-id-field="2086" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["posisi_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_3 3" data-id-field="2086" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["posisi_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!-- <input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_0 0" value="<?php echo $txn_data_banding_0["posisi_kios_0"] ?>" data-id-field="281" data-keterangan="0"> -->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_1-0" value="<?php echo $txn_data_banding_1["posisi_kios_0"] ?>" data-id-field="281" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_1-2" value="<?php echo $txn_data_banding_1["posisi_kios_1"] ?>" data-id-field="281" data-keterangan="1-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_1-3" value="<?php echo $txn_data_banding_1["posisi_kios_2"] ?>" data-id-field="281" data-keterangan="1-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_2-0" value="<?php echo $txn_data_banding_2["posisi_kios_0"] ?>" data-id-field="281" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_2-2" value="<?php echo $txn_data_banding_2["posisi_kios_1"] ?>" data-id-field="281" data-keterangan="2-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_2-3" value="<?php echo $txn_data_banding_2["posisi_kios_2"] ?>" data-id-field="281" data-keterangan="2-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_3-0" value="<?php echo $txn_data_banding_3["posisi_kios_0"] ?>" data-id-field="281" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_3-2" value="<?php echo $txn_data_banding_3["posisi_kios_1"] ?>" data-id-field="281" data-keterangan="3-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_35" name="update[pembanding_35]" class="form-control table_input input_281_3-3" value="<?php echo $txn_data_banding_3["posisi_kios_2"] ?>" data-id-field="281" data-keterangan="3-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span>Fasilitas unit kios</span></td>
                                            <td style="width: 213px;">
                                                <table style="width: 100%;">
                                                    <tbody>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 36%;">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_0 0" data-id-field="2087" data-keterangan="0">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_0["fasilitas_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_1 1" data-id-field="2087" data-keterangan="1">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_1["fasilitas_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_2 2" data-id-field="2087" data-keterangan="2">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_2["fasilitas_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="padding: 0px 0px 0px 0px; border-bottom: 0px; width: 21%; border-right: 0px; border-left: 1px solid #ddd">
                                                            <select style="width: 100%;" id="textbox_pembanding_107" name="update[pembanding_107]" class="form-control table_input input_2085_3 3" data-id-field="2087" data-keterangan="3">
                                                                <option value=""></option>
                                                                <?php
                                                                for ( $rank=1; $rank<=4; $rank++ ) {
                                                                    ?>
                                                                    <option value="<?php echo $rank; ?>" <?php echo $rank==$txn_data_banding_3["fasilitas_kios_op"] ? 'selected' : NULL ?>><?php echo $rank ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tbody>
                                                </table>
                                                <!-- <input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_0 0" value="" data-id-field="286" data-keterangan="0"> -->
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_1-0" value="<?php echo $txn_data_banding_1["fasilitas_kios_0"] ?>" data-id-field="286" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_1-2" value="<?php echo $txn_data_banding_1["fasilitas_kios_1"] ?>" data-id-field="286" data-keterangan="1-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_1-3" value="<?php echo $txn_data_banding_1["fasilitas_kios_2"] ?>" data-id-field="286" data-keterangan="1-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_2-0" value="<?php echo $txn_data_banding_2["fasilitas_kios_0"] ?>" data-id-field="286" data-keterangan="2-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_2-2" value="<?php echo $txn_data_banding_2["fasilitas_kios_1"] ?>" data-id-field="286" data-keterangan="2-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_2-3" value="<?php echo $txn_data_banding_2["fasilitas_kios_2"] ?>" data-id-field="286" data-keterangan="2-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_3-0" value="<?php echo $txn_data_banding_3["fasilitas_kios_0"] ?>" data-id-field="286" data-keterangan="3-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_3-2" value="<?php echo $txn_data_banding_3["fasilitas_kios_1"] ?>" data-id-field="286" data-keterangan="3-2"></td>
                                                            <td><input type="text" id="textbox_pembanding_40" name="update[pembanding_40]" class="form-control table_input input_286_3-3" value="<?php echo $txn_data_banding_3["fasilitas_kios_2"] ?>" data-id-field="286" data-keterangan="3-3"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        <tr>
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
                                                <!-- <input type="text" id="textbox_pembanding_41" name="update[pembanding_41]" class="form-control table_input input_287_0 0" value="<?php echo $txn_data_banding_0["waktu_penawaran_0"] ?>" data-id-field="287" data-keterangan="0"> -->
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
                                            <td align="right" colspan="2" style="background-color: white;">
                                                <span>Total Penyesuaian</span>
                                            </td>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" class="table_border_4">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_1-0" value="<?php echo $txn_data_banding_1["total_0"] ?>" data-id-field="289" data-keterangan="1-0">
                                                                <span class="percent-sign">%</span>
                                                            </td>
                                                            <td><input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_1-1" value="<?php echo $txn_data_banding_1["total_1"] ?>" data-id-field=" data-keterangan="1-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_1-2" value="<?php echo $txn_data_banding_1["total_2"] ?>" data-id-field=" data-keterangan="1-2"></td>
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
                                                            <td><input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_2-1" value="<?php echo $txn_data_banding_2["total_1"] ?>" data-id-field="289" data-keterangan="2-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_2-2" value="<?php echo $txn_data_banding_2["total_2"] ?>" data-id-field="289" data-keterangan="2-2"></td>
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
                                                            <td><input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_3-1" value="<?php echo $txn_data_banding_3["total_1"] ?>" data-id-field="289" data-keterangan="3-1"></td>
                                                            <td><input type="text" id="textbox_pembanding_43" name="update[pembanding_43]" class="form-control table_input input_289_3-2" value="<?php echo $txn_data_banding_3["total_2"] ?>" data-id-field="289" data-keterangan="3-2"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr style="background-color: #eee;">
                                            <td colspan="2"><span>Indikasi Nilai Properti Setelah Penyesuaian ( / m<sup>2</sup> )</span></td>
                                            <td><input type="text" id="textbox_pembanding_44" name="update[pembanding_44]" class="form-control table_input input_290_1 1" value="<?php echo $txn_data_banding_1["indikasi_nilai_properti"] ?>" data-id-field="290" data-keterangan="1"></td>
                                            <td><input type="text" id="textbox_pembanding_44" name="update[pembanding_44]" class="form-control table_input input_290_2 2" value="<?php echo $txn_data_banding_2["indikasi_nilai_properti"] ?>" data-id-field="290" data-keterangan="2"></td>
                                            <td><input type="text" id="textbox_pembanding_44" name="update[pembanding_44]" class="form-control table_input input_290_3 3" value="<?php echo $txn_data_banding_3["indikasi_nilai_properti"] ?>" data-id-field="290" data-keterangan="3"></td>
                                        </tr>
                                        <tr>
                                            <td><span>Bobot Rekonsiliasi (%)</span></td>
                                            <td class="td-with-percent">
                                                <input type="text" id="textbox_pembanding_45" name="update[pembanding_45]" class="form-control table_input input_291_0 0" value="<?php echo $txn_data_banding_0["bobot_rekonsiliasi"] ?>" data-id-field="291" data-keterangan="0">
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
                                            <td style="background-color: #eee;"><span>Indikasi Nilai Properti ( / m<sup>2</sup> ) </span></td>
                                            <td><input type="text" id="textbox_pembanding_46" name="update[pembanding_46]" class="form-control table_input input_292_0 0" value="<?php echo $txn_data_banding_0["indikasi_nilai_properti_permeter"] ?>" data-id-field="292" data-keterangan="0"></td>
                                            <td><input type="text" id="textbox_pembanding_46" name="update[pembanding_46]" class="form-control table_input input_292_1 1" value="<?php echo $txn_data_banding_1["indikasi_nilai_properti_permeter"] ?>" data-id-field="292" data-keterangan="1"></td>
                                            <td><input type="text" id="textbox_pembanding_46" name="update[pembanding_46]" class="form-control table_input input_292_2 2" value="<?php echo $txn_data_banding_2["indikasi_nilai_properti_permeter"] ?>" data-id-field="292" data-keterangan="2"></td>
                                            <td><input type="text" id="textbox_pembanding_46" name="update[pembanding_46]" class="form-control table_input input_292_3 3" value="<?php echo $txn_data_banding_3["indikasi_nilai_properti_permeter"] ?>" data-id-field="292" data-keterangan="3"></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #eee;"><span>Nilai Pasar Bangunan Kios (Fisik)</span></td>
                                            <td><input type="text" id="textbox_pembanding_102" name="update[pembanding_102]" class="form-control table_input input_969_0 0" value="<?php echo $txn_data_banding_0["nilai_pasar_bangunan_kios"] ?>" data-id-field="969" data-keterangan="0"></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #eee;"><span>Depresiasi %</span></td>
                                            <td>
                                                <input type="text" id="textbox_pembanding_101" name="update[pembanding_101]" class="form-control table_input input_1117_3 0" value="<?php echo (!empty($txn_data_banding_0["depresiasi"])) ? $txn_data_banding_0["depresiasi"] : 20 ?>" data-id-field="1117" data-keterangan="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #eee;"><span>Nilai Likuidasi</span></td>
                                            <td><input type="text" id="textbox_pembanding_103" name="update[pembanding_103]" class="form-control table_input input_980_0 0" value="<?php echo $txn_data_banding_0["nilai_likuidasi"] ?>" data-id-field="980" data-keterangan="0"></td>
                                        </tr>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table_border_2" width="100%" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td style="background-color: #eee;">
                                            <span>PEMBULATAN NILAI PASAR PROPERTI/KIOS</span>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_pembanding_47" name="update[pembanding_47]" class="form-control table_input input_293_ " value="<?php echo $txn_data_banding_0["pembulatan_nilai_pasar_kios"] ?>" data-id-field="293" data-keterangan="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #eee;">
                                            <span>PEMBULATAN NILAI LIKUIDASI</span>
                                        </td>
                                        <td>
                                            <input type="text" id="textbox_pembanding_48" name="update[pembanding_48]" class="form-control table_input input_294_ " value="<?php echo $txn_data_banding_0["pembulatan_nilai_likuidasi"] ?>" data-id-field="294" data-keterangan="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #eee;">
                                            <span>DEVIASI DATA</span>
                                        </td>
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
                                            <?php foreach ($txn_lampiran as $key => $value) { ?>
                                            <?php if ($value["jenis_lampiran"] != "Foto Properti") continue; ?>
                                            <div class="col-sm-2 list_multi_image list_1523349146-20180410png">
                                                <img src="<?php echo base_url() ?>asset/file/<?php echo $value["lampiran"] ?>" class="img-responsive">
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
                                <!-- <pre><?php var_dump($lampiran_layout_properti); ?></pre> -->
                                <img id="img_entry_29" src="<?php echo base_url() ?>asset/file/<?php echo (!$lampiran_layout_properti) ? "default.jpg" : $lampiran_layout_properti["lampiran"] ?>" data-id-field="891"  data-name-field="entry_29" data-keterangan="" class="img-responsive btn-upload-image img-891-"  />
                                <input type="file" id="file-891" class="tmp_file file-891-" data-id-field="891" data-name-field="entry_29" style="display: none;" data-keterangan="">
                                <input type="hidden" id="textbox_entry_29" name="update[entry_29]" class="table_input textbox-891-" value="default.jpg" data-id-field="891" data-name-field="entry_29" data-keterangan="Layout Properti">
                            </div>
                            <div role="tabpanel" class="tab-pane" id="lampiran_peta">
                                <h4>Peta Lokasi Properti</h4>
                                <img id="img_entry_30" src="<?php echo base_url() ?>asset/file/<?php echo (!$lampiran_peta_lokasi) ? "default.jpg" : $lampiran_peta_lokasi["lampiran"] ?>" data-id-field="892"  data-name-field="entry_30" data-keterangan="" class="img-responsive btn-upload-image img-892-"  />
                                <input type="file" id="file-892" class="tmp_file file-892-" data-id-field="892" data-name-field="entry_30" style="display: none;" data-keterangan="">
                                <input type="hidden" id="textbox_entry_30" name="update[entry_30]" class="table_input textbox-892-" value="default.jpg" data-id-field="892" data-name-field="entry_30" data-keterangan="Peta Lokasi Properti">
                            </div>
                            <div role="tabpanel" class="tab-pane" id="lampiran_kota">
                                <h4>Keterangan Tata Kota</h4>
                                <img id="img_entry_31" src="<?php echo base_url() ?>asset/file/<?php echo (!$lampiran_tata_kota) ? "default.jpg" : $lampiran_tata_kota["lampiran"] ?>" data-id-field="893"  data-name-field="entry_31" data-keterangan="" class="img-responsive btn-upload-image img-893-"  />
                                <input type="file" id="file-893" class="tmp_file file-893-" data-id-field="893" data-name-field="entry_31" style="display: none;" data-keterangan="">
                                <input type="hidden" id="textbox_entry_31" name="update[entry_31]" class="table_input textbox-893-" value="default.jpg" data-id-field="893" data-name-field="entry_31" data-keterangan="Keterangan Tata Kota">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group text-left" style="padding: 15px;">
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.open(&quot;<?=base_url()?>printpdf/laporan_ringkas/<?=base64_encode($pekerjaan->id)?>/<?=base64_encode($lokasi->id)?>/<?=base64_encode($txn_kertas_kerja['id_kertas_kerja'])?>/pdf/&quot;, &quot;_blank&quot;)">PDF LAPORAN (SORT REPORT)</button>
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
var icon_marker = "house-with-box.png";
var deviasi_limit = <?php echo json_encode($deviasi_data) ?>;
</script>
<script type="text/javascript" src="<?php echo base_url() ?>resources/js/apps/form_3.js?v=<?=time()?>"></script>

<script src="<?php echo base_url() ?>resources/js/apps/kertas-kerja.js?v=<?php echo time() ?>"></script>