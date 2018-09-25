<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style type="text/css">
    .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 195px;
        position: absolute;
        right: 30px;
        z-index: 999;
    }
    #pac-button {
        margin-left: 12px;
        position: absolute;
        top: 10px;
        left: 200px;
        z-index: 999;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    .pac-container {
        font-family: Roboto;
    }

    #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
    }

    #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }
    #target {
        width: 345px;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/plugins/snazzy-infowindow/styles.css">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?=$title?></h1>
        <ol class="breadcrumb">
            <li>Peta</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-info id="filter" <?php echo $is_filter ? 'collapsed-box' : NULL; ?>">
                    <div class="box-header with-border">
                        <h3 class="box-title">Filter</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa  <?php echo $is_filter ? 'fa-plus' : 'fa-minus'; ?>"></i></button>
                        </div>
                    </div>
                    <div class="box-body" <?php echo $is_filter ? 'style="display: none"' : NULL; ?>>
                        <form role="form" method="get">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <label>Provinsi <span class="requred">*</span></label>
                                    <select name="provinsi" id="provinsi" class="form-control cmb_select2" required>
                                        <option value="">Pilih Provinsi</option>
                                        <?php
                                        $list_provisi = $this->global_model->get_list('mst_provinsi');
                                        foreach ($list_provisi as $prov) {
                                            $selected = $provinsi == $prov->id ? 'selected' : NULL;
                                            ?>
                                            <option value="<?php echo $prov->id ?>" <?php echo $selected ?>><?php echo $prov->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label>Kabupaten/Kota <span class="requred">*</span></label>
                                    <select name="kota" id="kota" class="form-control cmb_select2" required>
                                        <option value="">Pilih Kabupaten/Kota</option>
                                        <?php
                                        $list_kabkot = empty($provinsi) ? array() : $this->global_model->get_list('mst_kota', array('id_provinsi' => $provinsi));
                                        foreach ($list_kabkot as $kabkot) {
                                            $selected = $kota == $kabkot->id ? 'selected' : NULL;
                                            ?>
                                            <option value="<?php echo $kabkot->id ?>" <?php echo $selected ?>><?php echo $kabkot->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <label>Kecamatan</label>
                                    <select name="kecamatan" id="kecamatan" class="form-control cmb_select2">
                                        <option value="">Pilih Kecamatan</option>
                                        <?php
                                        $list_kecamatan = empty($kota) ? array() : $this->global_model->get_list('mst_kecamatan', array('id_kota' => $kota));
                                        foreach ($list_kecamatan as $kec) {
                                            $selected = $kecamatan == $kec->id ? 'selected' : NULL;
                                            ?>
                                            <option value="<?php echo $kec->id ?>" <?php echo $selected ?>><?php echo $kec->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label>Kelurahan/Desa</label>
                                    <select name="desa" id="desa" class="form-control cmb_select2">
                                        <option value="">Pilih Kelurahan/Desa</option>
                                        <?php
                                        $list_kelurahan = empty($kecamatan) ? array() : $this->global_model->get_list('mst_desa', array('id_kecamatan' => $kecamatan));
                                        foreach ($list_kelurahan as $kel) {
                                            $selected = $desa == $kel->id ? 'selected' : NULL;
                                            ?>
                                            <option value="<?php echo $kel->id ?>" <?php echo $selected ?>><?php echo $kel->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <label>Jenis Objek</label>
                                    <select name="jenis_objek" id="jenis_objek" class="form-control">
                                        <?php
                                        foreach ($list_jenis_objek as $jo) {
                                            $selected = $jenis_objek == $jo->id ? 'selected' : NULL;
                                            ?>
                                            <option value="<?php echo $jo->id; ?>" <?php echo $selected ?>><?php echo $jo->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label>Harga</label>
                                    <?php
                                    $string_harga_min = $string_harga_max = $string_harga = NULL;
                                    $strlen_min = strlen($harga_min);
                                    $string_harga_min = ($harga_min/1000000).'Jt';
                                    if ( $strlen_min >= 10 && $strlen_min <= 12 ) {
                                        $string_harga_min = ($harga_min/1000000000).'M';
                                    } else if ( $strlen_min >= 13 && $strlen_min <= 15 ) {
                                        $string_harga_min = ($harga_min/1000000000000).'T';
                                    }
                                    $strlen_max = strlen($harga_max);
                                    $string_harga_max = ($harga_max/1000000).'Jt';
                                    if ( $strlen_max >= 10 && $strlen_max <= 12 ) {
                                        $string_harga_max = ($harga_max/1000000000).'M';
                                    } else if ( $strlen_max >= 13 && $strlen_max <= 15 ) {
                                        $string_harga_max = ($harga_max/1000000000000).'T';
                                    }
                                    $string_harga = $string_harga_min . ' - '.($harga_max >= 20000000000 ? $string_harga_max.'+' : $string_harga_max);
                                    ?>
                                    <span id="txt_harga" class="form-control"><?php echo $string_harga ?></span>
                                    <input type="hidden" name="harga_min" id="harga_min" value="<?php echo $harga_min ?>">
                                    <input type="hidden" name="harga_max" id="harga_max" value="<?php echo $harga_max ?>">
                                    
                                    <div id="harga-range" style="margin-left: 5px"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <label>Luas Bangunan (m<sup>2</sup>)</label>
                                    <?php
                                    $string_luas_bangunan = $luas_bangunan_min . ' - '.($luas_bangunan_max >= 7000 ? $luas_bangunan_max.'+' : $luas_bangunan_max);
                                    ?>
                                    <span id="txt_luas_banngunan" class="form-control"><?php echo $string_luas_bangunan ?></span>
                                    <input type="hidden" name="luas_bangunan_min" id="luas_bangunan_min" value="<?php echo $luas_bangunan_min ?>">
                                    <input type="hidden" name="luas_bangunan_max" id="luas_bangunan_max" value="<?php echo $luas_bangunan_max ?>">
                                    
                                    <div id="bangunan-range" style="margin-left: 5px"></div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label>Luas Tanah (m<sup>2</sup>)</label>
                                    <?php
                                    $string_luas_tanah = $luas_tanah_min . ' - '.($luas_tanah_max >= 7000 ? $luas_tanah_max.'+' : $luas_tanah_max);
                                    ?>
                                    <span id="txt_luas_tanah" class="form-control"><?php echo $string_luas_tanah ?></span>
                                    <input type="hidden" name="luas_tanah_min" id="luas_tanah_min" value="<?php echo $luas_tanah_min ?>">
                                    <input type="hidden" name="luas_tanah_max" id="luas_tanah_max" value="<?php echo $luas_tanah_max ?>">
                                    
                                    <div id="tanah-range" style="margin-left: 5px"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <label>Tanggal Pekerjaan</label>
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control pull-right" id="tanggal_pekerjaan" name="tanggal_pekerjaan" value="<?php echo $tanggal_pekerjaan ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>&nbsp;</p>
                                    <p class="text-center">
                                        <input type="submit" class="btn btn-primary" value="Cari">s
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="box" style="height: 600px">
                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <input id="pac-button" class="btn btn-primary" type="button" value="Cari di Area Ini">
                        <div class="box-body" id="map_area" style="height: 600px"></div>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-info id="filter" <?php echo $is_filter ? 'collapsed-box' : NULL; ?>">
                    <div class="box-header with-border">
                        <h3 class="box-title">Filter</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa  <?php echo $is_filter ? 'fa-plus' : 'fa-minus'; ?>"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4">Legenda</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Data Objek</th>
                                    <th colspan="2">Data Banding</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="<?php echo base_url() ?>asset/images/aset-icon/tanah.png"></td>
                                    <td>Tanah Kosong + Sarana Pelengkap / Tanah Bangunan + Sarana Pelengkap</td>
                                    <td><img src="<?php echo base_url() ?>asset/images/aset-icon/tanah_pembanding.png"></td>
                                    <td>Tanah Kosong + Sarana Pelengkap / Tanah Bangunan + Sarana Pelengkap</td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo base_url() ?>asset/images/aset-icon/apartemen.png"></td>
                                    <td>Apartemen</td>
                                    <td><img src="<?php echo base_url() ?>asset/images/aset-icon/apartemen_pembanding.png"></td>
                                    <td>Apartemen</td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo base_url() ?>asset/images/aset-icon/ruko.png"></td>
                                    <td>Ruko</td>
                                    <td><img src="<?php echo base_url() ?>asset/images/aset-icon/ruko_pembanding.png"></td>
                                    <td>Ruko</td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo base_url() ?>asset/images/aset-icon/kios.png"></td>
                                    <td>Kios</td>
                                    <td><img src="<?php echo base_url() ?>asset/images/aset-icon/kios_pembanding.png"></td>
                                    <td>Kios</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script type="text/javascript">var show_peta = true;</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6Z0Oxaa2Hv37II4swhzH662q0BGIaDaw&libraries=places"></script>
<script type="text/javascript">var icon_marker = 'house.png';</script>
<script type="text/javascript">var icon_marker_pembanding = 'house-with-box.png';</script>
<script type="text/javascript">var list_point = '<?php echo preg_replace('/\s\s+/', '',preg_replace("/[\n\r]/","",json_encode((array)$list_lokasi))); ?>';</script>
<script type="text/javascript" src="<?php echo base_url().'asset/plugins/snazzy-infowindow/snazzy-info-window.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'asset/js/peta.js?v=2.1' ?>"></script>

