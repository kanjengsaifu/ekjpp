

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
        width: 300px;
        position: absolute;
        right: 30px;
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
			<form name="form-klien" method="post">
			    <input type='hidden' id='id' name='id' class='form-control input-sm number-id' value='' placeholder='id' required>
			    <input type='hidden' id='id_pekerjaan' name='id_pekerjaan' class='form-control input-sm number-id_pekerjaan' value='ODY=' placeholder='id_pekerjaan' required>
			    <input type='hidden' id='tanggal_penerimaan' name='tanggal_penerimaan' class='form-control input-sm number-tanggal_penerimaan' value='2018-04-09' placeholder='tanggal_penerimaan' required>
			    <input type='hidden' id='temp_id_kota' name='temp_id_kota' class='form-control input-sm number-temp_id_kota' value='' placeholder='' required>
			    <input type='hidden' id='temp_id_kecamatan' name='temp_id_kecamatan' class='form-control input-sm number-temp_id_kecamatan' value='' placeholder='' required>
			    <input type='hidden' id='temp_id_desa' name='temp_id_desa' class='form-control input-sm number-temp_id_desa' value='' placeholder='' required>

			    <div class="row">
			        <div class="col-sm-4">
			            <div class="form-group hidden" >
			                <label>Kode</label>
			                <input type='hidden' id='kode' name='kode' class='form-control input-sm number-kode' value='' placeholder='Kode' required>								
			            </div>
			            <div class="form-group">
			                <label>Jenis Objek <span class="required">*</span></label>
			                <div><input type='radio' id='id_jenis_objek' name='id_jenis_objek' value='1'  class='objek_data' /> <span>Tanah Kosong + Sarana Pelengkap</span><br> <input type='radio' id='id_jenis_objek' name='id_jenis_objek' value='2'  class='objek_data' /> <span>Tanah Bangunan + Sarana Pelengkap</span><br> <input type='radio' id='id_jenis_objek' name='id_jenis_objek' value='3'  class='objek_data' /> <span>Kios</span><br> <input type='radio' id='id_jenis_objek' name='id_jenis_objek' value='5'  class='objek_data' /> <span>Ruko/Rukan</span><br> <input type='radio' id='id_jenis_objek' name='id_jenis_objek' value='6'  class='objek_data' /> <span>Apartment</span><br> <input type='radio' id='id_jenis_objek' name='id_jenis_objek' value='7'  class='objek_data' /> <span>Office Space (Ruang Kantor)</span><br> <input type='radio' id='id_jenis_objek' name='id_jenis_objek' value='8'  class='objek_data' /> <span>Kendaraan</span><br> <input type='radio' id='id_jenis_objek' name='id_jenis_objek' value='9'  class='objek_data' /> <span>Kapal</span><br> <input type='radio' id='id_jenis_objek' name='id_jenis_objek' value='10'  class='objek_data' /> <span>Mesin & Peralatan</span><br> <input type='radio' id='id_jenis_objek' name='id_jenis_objek' value='11'  class='objek_data' /> <span>Alat Berat</span><br> </select></div>
			            </div>
			            <div class="form-group form1 form6" style="display:none">
			                <label>Pengembangan Diatasnya Berupa <span class="required">*</span></label>
			                <input type='text' id='pengembangan' name='pengembangan' class='form-control input-sm number-pengembangan' value='' placeholder='Pengembangan Diatasnya Berupa' required>								
			            </div>
			            <div class="form-group">
			                <label>Jalan / Perum / Komplek / Blok<span class="required">*</span></label>
			                <input type='text' id='alamat' name='alamat' class='form-control input-sm number-alamat' value='' placeholder='Nama Jalan/Blok/Komplek' required>								
			            </div>
			            <div class="form-group">
			                <label>Gang</label>
			                <input type='text' id='gang' name='gang' class='form-control input-sm number-gang' value='' placeholder='Nama Gang' required>								
			            </div>
			            <div class="form-group">
			                <label>Nomor <span class="required">*</span></label>
			                <input type='text' id='nomor' name='nomor' class='form-control input-sm number-nomor' value='' placeholder='Nomor' required>								
			            </div>
			            <div class="form-group">
			                <label>RT. <span class="required">*</span></label>
			                <input type='text' id='rt' name='rt' class='form-control input-sm number-rt' value='' placeholder='RT' required>								
			            </div>
			            <div class="form-group">
			                <label>RW. <span class="required">*</span></label>
			                <input type='text' id='rw' name='rw' class='form-control input-sm number-rw' value='' placeholder='RW' required>								
			            </div>
			            <div class="form-group">
			                <label>Latitude</label>
			                <input type="number" step="any" class="form-control is_integer" name="koordinat_latitude" id="koordinat_latitude" value="">
			            </div>
			            <div class="form-group">
			                <label>Longitude</label>
			                <input type="number" step="any" class="form-control is_integer" name="koordinat_longitude" id="koordinat_longitude" value="">
			            </div>
			            <div class="form-group">
			                <label></label>
			                <button type="button" name="btn_lokasi" class="btn btn-primary" onclick="open_map()">Input Lokasi</button>
			                <button type="button" name="btn_lokasi" class="btn btn-primary" onclick="view_map($('#koordinat_latitude').val(), $('#koordinat_longitude').val())">View Lokasi</button>
			            </div>
			        </div>
			        <div class="col-sm-4">
			            <div class="form-group">
			                <label>Provinsi <span class="required">*</span></label>
			                <select id='id_provinsi' name='id_provinsi' class='form-control input-sm' required>
			                    <option disabled='disabled' selected='selected'>Pilih</option>
			                    <option  value='11'>Aceh</option>
			                    <option  value='12'>Sumatera Utara</option>
			                    <option  value='13'>Sumatera Barat</option>
			                    <option  value='14'>Riau</option>
			                    <option  value='15'>Jambi</option>
			                    <option  value='16'>Sumatera Selatan</option>
			                    <option  value='17'>Bengkulu</option>
			                    <option  value='18'>Lampung</option>
			                    <option  value='19'>Kepulauan Bangka Belitung</option>
			                    <option  value='21'>Kepulauan Riau</option>
			                    <option  value='31'>DKI Jakarta</option>
			                    <option  value='32'>Jawa Barat</option>
			                    <option  value='33'>Jawa Tengah</option>
			                    <option  value='34'>Di Yogyakarta</option>
			                    <option  value='35'>Jawa Timur</option>
			                    <option  value='36'>Banten</option>
			                    <option  value='51'>Bali</option>
			                    <option  value='52'>Nusa Tenggara Barat</option>
			                    <option  value='53'>Nusa Tenggara Timur</option>
			                    <option  value='61'>Kalimantan Barat</option>
			                    <option  value='62'>Kalimantan Tengah</option>
			                    <option  value='63'>Kalimantan Selatan</option>
			                    <option  value='64'>Kalimantan Timur</option>
			                    <option  value='65'>Kalimantan Utara</option>
			                    <option  value='71'>Sulawesi Utara</option>
			                    <option  value='72'>Sulawesi Tengah</option>
			                    <option  value='73'>Sulawesi Selatan</option>
			                    <option  value='74'>Sulawesi Tenggara</option>
			                    <option  value='75'>Gorontalo</option>
			                    <option  value='76'>Sulawesi Barat</option>
			                    <option  value='81'>Maluku</option>
			                    <option  value='82'>Maluku Utara</option>
			                    <option  value='91'>Papua Barat</option>
			                    <option  value='94'>Papua</option>
			                </select>
			            </div>
			            <div class="form-group">
			                <label>d/h</label>
			                <input type='text' id='dh_provinsi' name='dh_provinsi' class='form-control input-sm number-dh_provinsi' value='' placeholder='Nama propinsi dahulunya' required>								
			            </div>
			            <div class="form-group">
			                <label>Kabupaten / Kota <span class="required">*</span></label>
			                <div id="box_kota"><input type='text' id='id_kota' name='id_kota' class='form-control input-sm number-id_kota' value='' placeholder='Silahkan pilih Provinsi dulu' required></div>
			            </div>
			            <div class="form-group">
			                <label>d/h</label>
			                <div id="box_kota"><input type='text' id='dh_kota' name='dh_kota' class='form-control input-sm number-dh_kota' value='' placeholder='Nama kota dahulunya' required></div>
			            </div>
			            <div class="form-group">
			                <label>Kecamatan <span class="required">*</span></label>
			                <div id="box_kecamatan"><input type='text' id='id_kecamatan' name='id_kecamatan' class='form-control input-sm number-id_kecamatan' value='' placeholder='Silahkan pilih Kota dulu' required></div>
			            </div>
			            <div class="form-group">
			                <label>d/h</label>
			                <div id="box_kecamatan"><input type='text' id='dh_kecamatan' name='dh_kecamatan' class='form-control input-sm number-dh_kecamatan' value='' placeholder='Nama kecamatan dahulunya' required></div>
			            </div>
			            <div class="form-group">
			                <label>Kelurahan / Desa <span class="required">*</span></label>
			                <div id="box_desa"><input type='text' id='id_desa' name='id_desa' class='form-control input-sm number-id_desa' value='' placeholder='Silahkan pilih Kecamatan dulu' required></div>
			            </div>
			            <div class="form-group">
			                <label>d/h</label>
			                <div id="box_desa"><input type='text' id='dh_desa' name='dh_desa' class='form-control input-sm number-dh_desa' value='' placeholder='Nama kelurahan/desa dahulunya' required></div>
			            </div>
			            <div class="form-group">
			                <label>Kode Pos</label>
			                <div id="box_zip"><input type='text' id='zip' name='zip' class='form-control input-sm number-zip' value='' placeholder='Kode Pos' required></div>
			            </div>
			        </div>
			        <div class="col-sm-4">
			            <!--
			                <div class="form-group">
			                	<label>Tanggal Rencana Survey <span class="required">*</span></label>
			                	
			                <input readonly type='text' id='tanggal' name='tanggal' class='form-control input-sm tanggal' value='09-04-2018' required data-date-format='dd-mm-yyyy' data-date-autoclose='true'>
			                <script>
			                $('#tanggal').datepicker({
			                startDate : new Date(2018,3,09)
			                });
			                </script>
			                		</div>
			                                                                        <div class="form-group">
			                	<label>Jam Rencana Survey <span class="required">*</span></label>
			                	
			                <div class='input-group date' id='datetimepicker3'>
			                <input type='text' id='jam' name='jam' class='form-control input-sm tanggal' value='09:36:46' required  data-format='H:i:s'>
			                <span class='input-group-addon'>
			                                <span class='glyphicon glyphicon-time'></span>
			                            </span>
			                </div>
			                <script>
			                $('#jam').timepicker({
			                timeFormat: 'H:i:s'
			                });
			                </script>
			                		</div>
			                <div class="form-group">
			                	<label>Transportasi Survey <span class="required">*</span></label>
			                	<select id='id_transportasi' name='id_transportasi' class='form-control input-sm' required><option disabled='disabled' selected='selected'>Pilih</option><option  value='1'>Kendaraan Roda 2</option></select>								</div>
			                -->
			            <div class="form-group">
			                <label>Kepemilikan Properti </label>
			                <input type='text' id='pemegang_hak' name='pemegang_hak' class='form-control input-sm number-pemegang_hak' value='' placeholder='Nama Pemegang Hak' required>								
			            </div>
			            <div id="form5" style="display:none">
			                <div class="form-group">
			                    <label>Jumlah Unit </label>
			                    <input type='text' id='jml_unit' name='jml_unit' class='form-control input-sm number-jml_unit' value='' placeholder='Jumlah Unit' required>									
			                </div>
			                <div class="form-group">
			                    <label>Merk </label>
			                    <input type='text' id='merk' name='merk' class='form-control input-sm number-merk' value='' placeholder='Merk' required>									
			                </div>
			                <div class="form-group">
			                    <label>Model / Tipe </label>
			                    <input type='text' id='model_tipe' name='model_tipe' class='form-control input-sm number-model_tipe' value='' placeholder='Model / Tipe' required>									
			                </div>
			                <div class="form-group">
			                    <label>Negara Pembuat  </label>
			                    <input type='text' id='negara_pembuat' name='negara_pembuat' class='form-control input-sm number-negara_pembuat' value='' placeholder='Negara Pembuat' required>									
			                </div>
			                <div class="form-group">
			                    <label>Tahun Perakitan  </label>
			                    <input type='text' id='tahun_rakit' name='tahun_rakit' class='form-control input-sm number-tahun_rakit' value='' placeholder='Tahun Perakitan' required>									
			                </div>
			                <div class="form-group">
			                    <label>Kapasitas </label>
			                    <input type='text' id='kapasitas' name='kapasitas' class='form-control input-sm number-kapasitas' value='' placeholder='Kapasitas' required>									
			                </div>
			                <div class="form-group">
			                    <label>Keterangan </label>
			                    <textarea id='keterangan' name='keterangan' class='form-control input-sm' placeholder='Keterangan'></textarea>									
			                </div>
			            </div>
			            <div class="form1 form6" style="display:none">
			                <div class="form-group">
			                    <label>Kepemilikan </label>
			                    <select id='kepemilikan' name='kepemilikan' class='form-control input-sm' required>
			                        <option disabled='disabled' selected='selected'>Pilih</option>
			                        <option  value='Tunggal'>Tunggal</option>
			                        <option  value='Bersama'>Bersama</option>
			                    </select>
			                </div>
			                <div class="form-group">
			                    <label>Jenis Setifikat </label>
			                    <select id='jenis_sertifikat' name='jenis_sertifikat' class='form-control input-sm' required>
			                        <option disabled='disabled' selected='selected'>Pilih</option>
			                        <option  value='Hak Milik (HM)'>Hak Milik (HM)</option>
			                        <option  value='Hak Guna Usaha (HGU)'>Hak Guna Usaha (HGU)</option>
			                        <option  value='Hak Guna Bangunan (HGB)'>Hak Guna Bangunan (HGB)</option>
			                        <option  value='Hak Milik Atas Satuan Rumah Susun (HMASRS)'>Hak Milik Atas Satuan Rumah Susun (HMASRS)</option>
			                        <option  value='Hak Pakai'>Hak Pakai</option>
			                    </select>
			                </div>
			                <div class="form-group">
			                    <label>No Sertifikat </label>
			                    <input type='text' id='no_sertifikat' name='no_sertifikat' class='form-control input-sm number-no_sertifikat' value='' placeholder='Nomor Sertifikat' required>								
			                </div>
			            </div>
			            <div class="form1 form6 form-group" style="display:none">
			                <label class="l_t">Luas Tanah (m<sup>2</sup>) </label>
			                <label class="l_l">Luas Lantai (m<sup>2</sup>) </label>
			                <input type='text' id='luas_tanah' name='luas_tanah' class='form-control input-sm number-luas_tanah' value='0' placeholder='Luas m2' required>								
			            </div>
			            <div class="form1 form-group" style="display:none">
			                <label>Luas Bangunan (m<sup>2</sup>) </label>
			                <input type='text' id='luas_bangunan' name='luas_bangunan' class='form-control input-sm number-luas_bangunan' value='0' placeholder='Luas Bangunan (0 bila tidak ada bangunan)' required>								
			            </div>
			            <div  id="form2" style="display:none">
			                <!-- Kendaraan -->
			                <div class="form-group">
			                    <label>Jumlah Unit </label>
			                    <input type='text' id='jml_unit' name='jml_unit' class='form-control input-sm number-jml_unit' value='' placeholder='Jumlah Unit' required>								
			                </div>
			                <div class="form-group">
			                    <label>NOPOL </label>
			                    <input type='text' id='nopol' name='nopol' class='form-control input-sm number-nopol' value='' placeholder='NOPOL' required>								
			                </div>
			                <div class="form-group">
			                    <label>Merk </label>
			                    <input type='text' id='merk' name='merk' class='form-control input-sm number-merk' value='' placeholder='Merk' required>								
			                </div>
			                <div class="form-group">
			                    <label>Model / Tipe </label>
			                    <input type='text' id='model_tipe' name='model_tipe' class='form-control input-sm number-model_tipe' value='' placeholder='Model / Tipe' required>								
			                </div>
			                <div class="form-group">
			                    <label>Negara Pembuat </label>
			                    <input type='text' id='negara_pembuat' name='negara_pembuat' class='form-control input-sm number-negara_pembuat' value='' placeholder='Negara Pembuat' required>								
			                </div>
			                <div class="form-group">
			                    <label>Tahun Perakitan </label>
			                    <input type='text' id='tahun_rakit' name='tahun_rakit' class='form-control input-sm number-tahun_rakit' value='' placeholder='Tahun Perakitan' required>								
			                </div>
			            </div>
			            <div  id="form3" style="display:none">
			                <!-- Mesin -->
			                <div class="form-group">
			                    <label>Nama Mesin </label>
			                    <input type='text' id='nm_mesin' name='nm_mesin' class='form-control input-sm number-nm_mesin' value='' placeholder='Nama Mesin' required>									
			                </div>
			                <div class="form-group">
			                    <label>Jumlah Unit </label>
			                    <input type='text' id='jml_unit' name='jml_unit' class='form-control input-sm number-jml_unit' value='' placeholder='Jumlah Unit' required>									
			                </div>
			                <div class="form-group">
			                    <label>Merk </label>
			                    <input type='text' id='merk' name='merk' class='form-control input-sm number-merk' value='' placeholder='Merk' required>									
			                </div>
			                <div class="form-group">
			                    <label>Model / Tipe </label>
			                    <input type='text' id='model_tipe' name='model_tipe' class='form-control input-sm number-model_tipe' value='' placeholder='Model / Tipe' required>									
			                </div>
			                <div class="form-group">
			                    <label>Negara Pembuat </label>
			                    <input type='text' id='negara_pembuat' name='negara_pembuat' class='form-control input-sm number-negara_pembuat' value='' placeholder='Negara Pembuat' required>									
			                </div>
			                <div class="form-group">
			                    <label>Tahun Pembuatan </label>
			                    <input type='text' id='tahun_buatan' name='tahun_buatan' class='form-control input-sm number-tahun_buatan' value='' placeholder='Tahun Pembuatan' required>									
			                </div>
			                <div class="form-group">
			                    <label>Kapasitas </label>
			                    <input type='text' id='kapasitas' name='kapasitas' class='form-control input-sm number-kapasitas' value='' placeholder='Kapasitas' required>									
			                </div>
			                <div class="form-group">
			                    <label>Keterangan </label>
			                    <textarea id='keterangan' name='keterangan' class='form-control input-sm' placeholder='Keterangan'></textarea>									
			                </div>
			            </div>
			            <div  id="form4" style="display:none">
			                <!-- Kapal -->
			                <div class="form-group">
			                    <label>Jumlah Unit </label>
			                    <input type='text' id='jml_unit' name='jml_unit' class='form-control input-sm number-jml_unit' value='' placeholder='Jumlah Unit' required>										
			                </div>
			                <div class="form-group">
			                    <label>Dimensi Kapal </label>
			                </div>
			                <div class="form-group">
			                    <label class="col-sm-2">Panjang</label>
			                    <div class="col-sm-10 form-group">
			                        <input type='text' id='panjang' name='panjang' class='form-control input-sm number-panjang' value='' placeholder='Panjang' required>										
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="col-sm-2">Lebar</label>
			                    <div class="col-sm-10 form-group">
			                        <input type='text' id='lebar' name='lebar' class='form-control input-sm number-lebar' value='' placeholder='Lebar' required>										
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="col-sm-2">Tinggi</label>
			                    <div class="col-sm-10 form-group">
			                        <input type='text' id='tinggi' name='tinggi' class='form-control input-sm number-tinggi' value='' placeholder='Tinggi' required>										
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label>Berat Kapal </label>
			                </div>
			                <div class="form-group">
			                    <label class="col-sm-4">Berat Bersih</label>
			                    <div class="col-sm-8 form-group">
			                        <input type='text' id='berat_bersih' name='berat_bersih' class='form-control input-sm number-berat_bersih' value='' placeholder='Berat Bersih' required>										
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="col-sm-4">Berat Kotor</label>
			                    <div class="col-sm-8 form-group">
			                        <input type='text' id='berat_kotor' name='berat_kotor' class='form-control input-sm number-berat_kotor' value='' placeholder='Berat Kotor' required>										
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label>Jenis Kapal </label>
			                    <input type='text' id='jenis_kapal' name='jenis_kapal' class='form-control input-sm number-jenis_kapal' value='' placeholder='Jenis Kapal' required>										
			                </div>
			                <div class="form-group">
			                    <label>Negara Pembuat </label>
			                    <input type='text' id='negara_pembuat' name='negara_pembuat' class='form-control input-sm number-negara_pembuat' value='' placeholder='Negara Pembuat' required>										
			                </div>
			                <div class="form-group">
			                    <label>Tahun Pembuatan </label>
			                    <input type='text' id='tahun_buatan' name='tahun_buatan' class='form-control input-sm number-tahun_buatan' value='' placeholder='Tahun Pembuatan' required>										
			                </div>
			                <div class="form-group">
			                    <label>Mesin Penggerak Utama </label>
			                </div>
			                <div class="form-group">
			                    <label class="col-sm-5">Jumlah Unit</label>
			                    <div class="col-sm-7 form-group">
			                        <input type='text' id='jml_unit_mesin' name='jml_unit_mesin' class='form-control input-sm number-jml_unit_mesin' value='' placeholder='Jumlah Unit Mesin' required>										
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="col-sm-5">Merk dan Tipe</label>
			                    <div class="col-sm-7 form-group">
			                        <input type='text' id='merk_tipe_mesin' name='merk_tipe_mesin' class='form-control input-sm number-merk_tipe_mesin' value='' placeholder='Merk Tipe Mesin' required>										
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="col-sm-5">Negara Pembuat</label>
			                    <div class="col-sm-7 form-group">
			                        <input type='text' id='negara_pembuat_mesin' name='negara_pembuat_mesin' class='form-control input-sm number-negara_pembuat_mesin' value='' placeholder='Negara Pembuat Mesin' required>										
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="col-sm-5">Kapasitas</label>
			                    <div class="col-sm-7 form-group">
			                        <input type='text' id='kapasitas_mesin' name='kapasitas_mesin' class='form-control input-sm number-kapasitas_mesin' value='' placeholder='Kapasitas Mesin' required>										
			                    </div>
			                </div>
			            </div>
			        </div>
			        <div class="col-sm-12">
			            <div class="form-group text-right" style="padding: 15px;">
			                <button type="button" class="btn btn-primary btn-sm btn-simpan">SIMPAN</button>
			                <button type="button" class="btn btn-warning btn-sm btn-batal">BATAL</button>
			            </div>
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
<script type="text/javascript">var icon_marker = 'house.png';</script>
<script type="text/javascript" src="<?php echo base_url().'asset/js/form_manajemen_peta.js' ?>"></script>
<script type="text/javascript">
	$(function(){
		$(":radio.objek_data").click(function(){
			$(".form6, .form1, #form2, #form3, #form4, #form5").hide()
			if($(this).val() == "1" || $(this).val() == "2"|| $(this).val() == "5"){
				$(".form1").show();
				$(".l_t").show();				
				$(".l_l").hide();
			}else if($(this).val() == "8"){
				$("#form2").show();
			}else if($(this).val() == "10"){
				$("#form3").show();
			}else if($(this).val() == "9"){
				$("#form4").show();
			}else if($(this).val() == "11"){
				$("#form5").show();
			}else if($(this).val() == "6" || $(this).val() == "7"  || $(this).val() == "3"){
				$(".l_t").hide();		
				$(".l_l").show();
				$(".form6").show();
			}
		});
	});
</script>
<script>
	var redirect_url	= "<?php if (array_key_exists('url', $_GET)) echo $_GET['url']; else echo ''; ?>";
	var id_provinsi		= $("#id_provinsi").val();
	var id_kota			= $("#temp_id_kota").val();
	var id_kecamatan	= $("#temp_id_kecamatan").val();
	var id_desa			= $("#temp_id_desa").val();

	$(document).ready(function(){
		$("#id_kota").prop("disabled", true);
		$("#id_kecamatan").prop("disabled", true);
		$("#id_desa").prop("disabled", true);



		if(id_provinsi){
			$("#box_kecamatan").html('<input id="id_kecamatan" disabled="true" name="id_kecamatan" class="form-control input-sm" value="Silahkan pilih Kota dulu." placeholder="Kota" required="" type="text">');
			$("#box_desa").html('<input id="id_desa" disabled="true" name="id_desa" class="form-control input-sm" value="Silahkan pilih Kecamatan dulu." placeholder="Kota" required="" type="text">');
			get_location("kota", "box_kota", "id_kota", id_provinsi, id_kota);
		}

		if(id_kota){
			$("#box_desa").html('<input id="id_desa" disabled="true" name="id_desa" class="form-control input-sm" value="Silahkan pilih Kecamatan dulu." placeholder="Kota" required="" type="text">');
			get_location("kecamatan", "box_kecamatan", "id_kecamatan", id_kota, id_kecamatan);
		}

		if(id_kecamatan){
			get_location("desa", "box_desa", "id_desa", id_kecamatan, id_desa);
		}

		$("#kode").prop("readonly", true);
		$("#zip").prop("readonly", true);
		
	});
	$(document).on("change", "#id_desa", function() {
		getKodePos($(this).val());
	});
	function getKodePos(id){
		$.ajax({
		  type	: "POST",
		  url 	: base_url + "ajax/get_kode_pos/",
		  data: { id: id },
		  dataType	: "JSON",
		  success	: function (data) {
				//alert(data.kode_pos);
				$("#zip").val(data.kode_pos);
			}
		});
	}
	$(".btn-simpan").click(function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			 simpan();
			/*
			var tgl				= $("#tanggal").val(); //13-06-2016
			var tgl_penerimaan = $("#tanggal_penerimaan").val();
			var d1 = Date.parse(tgl_penerimaan);
			var tgl_split = tgl.split("-");
			var d2 = Date.parse(tgl_split[2] +"-"+ tgl_split[1] +"-"+ tgl_split[0]);
			if (d1==d2){
					if (window.confirm("Tanggal Survey sama dengan tanggal penerimaan, Apakah Anda yakin?")){
						simpan();
					}
			}	else{
				   simpan();
			}
			*/


		}
	});
	
	$(".btn-batal").click(function()
	{
		if (redirect_url){
			location = redirect_url;
		}else{
			location = "<?=base_url()?>pekerjaan/lokasi/";
		}
	});
  function simpan(){
		//var tgl				= $("#tanggal").val(); //13-06-2016
		var id 				= $("#id").val();
		var id_pekerjaan	= $("#id_pekerjaan").val();
		var id_jenis_objek	= $("input[name=id_jenis_objek]:checked").val();

		var kode 			= $("#kode").val();
		var alamat 			= $("#alamat").val();

		var id_provinsi 	= $("#id_provinsi").val();
		var id_kota 		= $("#id_kota").val();
		var id_kecamatan 	= $("#id_kecamatan").val();
		var id_desa 		= $("#id_desa").val();
		/*
		thn					= tgl.substring(6,10);
		bln 				= tgl.substring(3,5);
		hari 				= tgl.substring(0,2);
		var tanggal 		= thn+'-'+bln+'-'+hari;
											var jam                 = $("#jam").val(); //13-06-2016
		*/

		//var tanggal 		= $("#tanggal").val();



		var id_transportasi	= $("#id_transportasi").val();

		var pengembangan = $("#pengembangan").val();
		var pemegang_hak = $("#pemegang_hak").val();
		var kepemilikan = $("#kepemilikan").val();
		var jenis_sertifikat = $("#jenis_sertifikat").val();
		var no_sertifikat = $("#no_sertifikat").val();
		var luas_tanah = $("#luas_tanah").val();
		var luas_bangunan = $("#luas_bangunan").val();

		var gang 			= $("#gang").val();
		var nomor 			= $("#nomor").val();
		var rt 				= $("#rt").val();
		var rw 				= $("#rw").val();
		var dh_provinsi 	= $("#dh_provinsi").val();
		var dh_kota 		= $("#dh_kota").val();
		var dh_kecamatan 	= $("#dh_kecamatan").val();
		var dh_desa			= $("#dh_desa").val();
		var zip                 = $("#zip").val();
		var latitude        = $('#koordinat_latitude').val();
		var longitude    	= $('#koordinat_longitude').val();

		$.ajax({
				type	: "POST",
			url 	: base_url + "ajax/do_update_data_global/",
			data	: {
				type : "lokasi",
				id : id,
				id_pekerjaan : id_pekerjaan,
				id_jenis_objek : id_jenis_objek,
				kode : kode,
				alamat : alamat,
				id_provinsi : id_provinsi,
				id_kota : id_kota,
				id_kecamatan : id_kecamatan,
				id_desa : id_desa,
				//tanggal : tanggal,
				//jam : jam,
				id_transportasi : id_transportasi,
				pengembangan : pengembangan,
				pemegang_hak : pemegang_hak,
				kepemilikan : kepemilikan,
				jenis_sertifikat : jenis_sertifikat,
				no_sertifikat : no_sertifikat,
				luas_tanah : luas_tanah,
				luas_bangunan : luas_bangunan,
				gang : gang,
				nomor : nomor,
				rt : rt,
				rw : rw,
				dh_provinsi : dh_provinsi,
				dh_kota : dh_kota,
				dh_kecamatan : dh_kecamatan,
				dh_desa : dh_desa,
				zip : zip,
				latitude : latitude,
				longitude : longitude
			},
			beforeSend: function(){
							$(".btn-simpan").html("Loading...");
							$(".btn-simpan").prop("disabled", true);
					},
			dataType	: "JSON",
			success	: function (data) {
				generate_notification(data.result.trim(), data.message.trim(), "topCenter");

							$(".btn-simpan").html("SIMPAN");
							$(".btn-simpan").prop("disabled", false);

							if (data.result.trim() == "success")
							{
								if (redirect_url){
						location = redirect_url;
					}else{
						location = "<?=base_url()?>pekerjaan/lokasi/";
					}

				}
			}
			});
	}

</script>

