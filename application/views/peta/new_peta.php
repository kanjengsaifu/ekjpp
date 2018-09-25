<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/plugins/snazzy-infowindow/styles.css">
<style type="text/css">
    #myBtn {
        display: none; /* Hidden by default */
        position: fixed; /* Fixed/sticky position */
        bottom: 20px; /* Place the button at the bottom of the page */
        right: 30px; /* Place the button 30px from the right */
        z-index: 99; /* Make sure it does not overlap */
        border: none; /* Remove borders */
        outline: none; /* Remove outline */
        background-color: red; /* Set a background color */
        color: white; /* Text color */
        cursor: pointer; /* Add a mouse pointer on hover */
        padding: 15px; /* Some padding */
        border-radius: 10px; /* Rounded corners */
        font-size: 18px; /* Increase font size */
    }

    #myBtn:hover {
        background-color: #555; /* Add a dark-grey background on hover */
    }
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
    .modal-dialog {
      width: 98%;
      height: 92%;
      padding: 0;
    }

    .modal-content {
      height: 99%;
    }
    .modal-body {
        height: 80%;
    }
    .si-content {font-size: 12px}
</style>

<section class="content">
	<div class="row">
		<div class="col-lg-4 box_filter">
			<div class="box box-info">
				<div class="box-header">
					<h4 class="box-title" style="font-size: 16px;">Jenis Obyek</h4>
				</div>
				<div class="box-body">
					<table class="table table-borderless" id="filter_jenis_obyek">
						<tbody>
						<?php
						foreach ($list_jenis_objek as $jo) {
							?>
							<tr>
								<td style="width: 20px;"><input type="checkbox" name="jenis_objek[]" value="<?php echo $jo->id ?>" class="chk_objek"></td>
								<td><a href="javascript: void(0);" class="objek_filter"><?php echo $jo->nama; ?></a></td>
							</tr>
							<?php
						}
						?>
						</tbody>
					</table>
					<hr/>
				</div>
			</div>
            <div class="box box-info">
                <div class="box-header">
                    <h4 class="box-title" style="font-size: 16px;">Wilayah</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <select name="provinsi" id="provinsi" class="form-control cmb_select2" required>
                                        <option value="">Provinsi</option>
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
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-lg-12">
                    <select name="kota" id="kota" class="form-control cmb_select2" required>
                                        <option value="">Kabupaten/Kota</option>
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
                    <br/>
                    <div class="row">
                        <div class="col-lg-12">
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
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-lg-12">
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
                    <hr/>
                    <div class="text-right" style="width: 100%">
                        <button class="btn btn-primary" type="button" onclick="filter_wilayah()">Terapkan Filter</button>
                    </div>
                </div>
            </div>
		</div>
		<div class="col-lg-8">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Obyek</h3>
				</div>
				<div class="box-body" id="list_box">
					
				</div>
				<div class="overlay" id="list_loader">
		        	<i class="fa fa-refresh fa-spin"></i>
		        </div>
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="formPeta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="box" style="height: 100%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" id="modal_content" style="text-align: right;">
                <div class="row" style="height: 100%">
                    <div class="col-lg-9 col-sm-12 col-xs-12" style="height: 100%">
                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                        <div id="map_area" style="width:100%; height: 100%;"></div>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-xs-12" id="box_banding" style="max-height: 100%; overflow: auto;">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <img src="<?php echo base_url().'asset/images/aset-icon/tanah.png'; ?>"> Tanah Kosong / Tanah Bangunan
                <img src="<?php echo base_url().'asset/images/aset-icon/kios.png'; ?>"> Kios
                <img src="<?php echo base_url().'asset/images/aset-icon/ruko.png'; ?>"> Ruko
                <img src="<?php echo base_url().'asset/images/aset-icon/apartemen.png'; ?>"> Apartemen
                <img src="<?php echo base_url().'asset/images/aset-icon/tanah_pembanding.png'; ?>"> DB Tanah Kosong / Tanah Bangunan
                <img src="<?php echo base_url().'asset/images/aset-icon/kios_pembanding.png'; ?>"> DB Kios
                <img src="<?php echo base_url().'asset/images/aset-icon/ruko_pembanding.png'; ?>"> DB Ruko
                <img src="<?php echo base_url().'asset/images/aset-icon/apartemen_pembanding.png'; ?>"> DB Apartemen
            </div>
            <div class="overlay" id="map_loader" style="opacity: 0.8; display: none">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>
        </div>
    </div>
</div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<script type="text/javascript">var result_location = '';</script>
<script type="text/javascript">var show_peta = true;</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6Z0Oxaa2Hv37II4swhzH662q0BGIaDaw&libraries=places"></script>
<script type="text/javascript">var icon_marker = 'house.png';</script>
<script type="text/javascript">var icon_marker_pembanding = 'house-with-box.png';</script>
<script type="text/javascript">var list_point = '{}';</script>
<script type="text/javascript" src="<?php echo base_url().'asset/plugins/snazzy-infowindow/snazzy-info-window.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'asset/js/new_peta.js?v=1.3' ?>"></script>