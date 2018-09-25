
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
			<form name="form-klien" id="form-klien" method="post">
			    <input type='hidden' id='id' name='id' class='form-control input-sm number-id' value='<?php echo $id ?>' placeholder='id' required>							
			    <div class="row">
			        <div class="step-1 col-sm-6 col-xs-12">
			            <div class="form-group">
			                <label>Klien <span class="required">*</span></label>
			                <select id='id_klien' name='id_klien' class='form-control input-sm' required>
			                    <option disabled='disabled' selected='selected'>Pilih</option>
			                    <option  value='1'>PT ASD</option>
			                    <option  value='25003'>PT Radiant Utama Interinsco Tbk.</option>
			                    <option  value='25004'>PT Supraco Indonesia</option>
			                    <option  value='25005'>PT Ongkir Jaya</option>
			                    <option  value='25006'>PT. Bidar Jaya</option>
			                    <option  value='25007'>ASD</option>
			                    <option  value='25009'>Zamhur</option>
			                    <option  value='25012'>Bambang Sukary</option>
			                    <option  value='25013'>DENI BAHTIAR</option>
			                    <option  value='25014'>PT. Dewa</option>
			                    <option  value='25015'>PT. Jakarta</option>
			                    <option  value='25016'>PT. ASNO</option>
			                    <option  value='25017'>PT. Sumber Rezeki</option>
			                    <option  value='25018'>PT. Test</option>
			                </select>
			            </div>
			            <div class="form-group">
			                <label>Nama Pekerjaan <span class="required">*</span></label>
			                <input type='text' id='nama' name='nama' class='form-control input-sm number-nama' value='' placeholder='Nama' required>									
			            </div>
			            <div class="form-group">
			                <label>Tanggal Penerimaan Informasi <span class="required">*</span></label>
			                <input type='text' id='tanggal_penerimaan' name='tanggal_penerimaan' class='form-control input-sm tanggal' value='09-04-2018' required data-date-format='dd-mm-yyyy' data-date-autoclose='true'>
			                <script>
			                    $('#tanggal_penerimaan').datepicker();
			                </script>
			            </div>
			            <div class="form-group">
			                <label>Nomor Surat Tugas <span class="required">*</span></label>
			                <input type='text' id='no_surat_tugas' name='no_surat_tugas' class='form-control input-sm number-no_surat_tugas' value='' placeholder='Nomor Surat Tugas' required>									
			            </div>
			            <div class="form-group">
			                <label>Tanggal Surat Tugas <span class="required">*</span></label>
			                <input type='text' id='tgl_surat_tugas' name='tgl_surat_tugas' class='form-control input-sm tanggal' value='09-04-2018' required data-date-format='dd-mm-yyyy' data-date-autoclose='true'>
			                <script>
			                    $('#tgl_surat_tugas').datepicker();
			                </script>
			            </div>
			            <div class="form-group">
			                <label>Deskripsi</label>
			                <textarea id='deskripsi' name='deskripsi' class='form-control input-sm' placeholder='Deskripsi'></textarea>									
			            </div>
			        </div>
			        
			        <div class="step-1 col-sm-6 col-xs-12">
			            <div class="form-group">
			                <label>Nama Pemberi Tugas <span class="required">*</span></label><br>
			                <input type='radio' id='jenis_pemberi_tugas_0' name='jenis_pemberi_tugas' value='0' Checked> Klien/Debitur <input type='radio' id='jenis_pemberi_tugas_1' name='jenis_pemberi_tugas' value='1' > Bank 										
			                <select id='pemberi_tugas_klien' name='pemberi_tugas_klien' class='form-control input-sm' >
			                    <option disabled='disabled' selected='selected'>Pilih</option>
			                    <option  value='1'>PT ASD</option>
			                    <option  value='25003'>PT Radiant Utama Interinsco Tbk.</option>
			                    <option  value='25004'>PT Supraco Indonesia</option>
			                    <option  value='25005'>PT Ongkir Jaya</option>
			                    <option  value='25006'>PT. Bidar Jaya</option>
			                    <option  value='25007'>ASD</option>
			                    <option  value='25009'>Zamhur</option>
			                    <option  value='25012'>Bambang Sukary</option>
			                    <option  value='25013'>DENI BAHTIAR</option>
			                    <option  value='25014'>PT. Dewa</option>
			                    <option  value='25015'>PT. Jakarta</option>
			                    <option  value='25016'>PT. ASNO</option>
			                    <option  value='25017'>PT. Sumber Rezeki</option>
			                    <option  value='25018'>PT. Test</option>
			                </select>
			                <select id='pemberi_tugas_debitur' name='pemberi_tugas_debitur' class='form-control input-sm' >
			                    <option disabled='disabled' selected='selected'>Pilih</option>
			                    <option  value='1'>Bank Agris</option>
			                    <option  value='2'>Bank Agroniaga</option>
			                    <option  value='3'>Bank Anda</option>
			                    <option  value='4'>Bank Andara</option>
			                    <option  value='5'>Bank Anglomas Internasional Bank (Surabaya)</option>
			                    <option  value='6'>Bank ANZ Panin Bank</option>
			                    <option  value='7'>Bank Artha Graha Internasional</option>
			                    <option  value='8'>Bank Artos Indonesia (Bandung)</option>
			                    <option  value='9'>Bank Barclays Indonesia</option>
			                    <option  value='10'>Bank BCA Syariah</option>
			                    <option  value='11'>Bank Bengkulu (Kota Bengkulu)</option>
			                    <option  value='12'>Bank Bisnis Internasional (Bandung)</option>
			                    <option  value='13'>Bank BJB (Bandung)</option>
			                    <option  value='14'>Bank BJB Syariah</option>
			                    <option  value='15'>Bank BNI Syariah</option>
			                    <option  value='16'>Bank BNP Paribas Indonesia</option>
			                    <option  value='17'>Bank BPD Aceh (Banda Aceh)</option>
			                    <option  value='18'>Bank BPD Bali (Denpasar)</option>
			                    <option  value='19'>Bank BPD DIY (Yogyakarta)</option>
			                    <option  value='20'>Bank BRI Syariah</option>
			                    <option  value='21'>Bank BRI Syariah</option>
			                    <option  value='22'>Bank Bukopin</option>
			                    <option  value='23'>Bank Bumi Arta</option>
			                    <option  value='24'>Bank Capital Indonesia</option>
			                    <option  value='25'>Bank Central Asia</option>
			                    <option  value='26'>Bank Central Asia Syariah</option>
			                    <option  value='27'>Bank Centratama Nasional Bank (Surabaya)</option>
			                    <option  value='28'>Bank Chinatrust Indonesia</option>
			                    <option  value='29'>Bank CIMB Niaga</option>
			                    <option  value='30'>Bank CIMB Niaga Syariah</option>
			                    <option  value='31'>Bank Commonwealth</option>
			                    <option  value='32'>Bank Danamon</option>
			                    <option  value='33'>Bank Danamon Syariah</option>
			                    <option  value='34'>Bank DBS Indonesia</option>
			                    <option  value='35'>Bank Dipo International</option>
			                    <option  value='36'>Bank DKI (Jakarta)</option>
			                    <option  value='37'>Bank Ekonomi Raharja</option>
			                    <option  value='38'>Bank Fama Internasional (Bandung)</option>
			                    <option  value='39'>Bank Ganesha</option>
			                    <option  value='40'>Bank Hana</option>
			                    <option  value='41'>Bank Harda Internasional</option>
			                    <option  value='42'>Bank Himpunan Saudara 1906 (Bandung)</option>
			                    <option  value='43'>Bank ICB Bumiputera</option>
			                    <option  value='44'>Bank ICBC Indonesia</option>
			                    <option  value='45'>Bank Ina Perdana</option>
			                    <option  value='46'>Bank Index Selindo</option>
			                    <option  value='47'>Bank Indonesia</option>
			                    <option  value='48'>Bank Internasional Indonesia Maybank</option>
			                    <option  value='49'>Bank Jambi (Jambi)</option>
			                    <option  value='50'>Bank Jasa Jakarta</option>
			                    <option  value='51'>Bank Jateng (Semarang)</option>
			                    <option  value='52'>Bank Jatim (Surabaya)</option>
			                    <option  value='53'>Bank Kalbar (Pontianak)</option>
			                    <option  value='54'>Bank Kalsel (Banjarmasin)</option>
			                    <option  value='55'>Bank Kalteng (Palangka Raya)</option>
			                    <option  value='56'>Bank Kaltim (Samarinda)</option>
			                    <option  value='57'>Bank KEB Indonesia</option>
			                    <option  value='58'>Bank Kesawan</option>
			                    <option  value='59'>Bank Kesejahteraan Ekonomi</option>
			                    <option  value='60'>Bank Lampung (Bandar Lampung)</option>
			                    <option  value='61'>Bank Liman International</option>
			                    <option  value='62'>Bank Maluku (Ambon)</option>
			                    <option  value='63'>Bank Mandiri</option>
			                    <option  value='64'>Bank Maspion</option>
			                    <option  value='65'>Bank Mayapada</option>
			                    <option  value='66'>Bank Maybank Syariah Indonesia</option>
			                    <option  value='67'>Bank Maybank Syariah Indonesia</option>
			                    <option  value='68'>Bank Mayora</option>
			                    <option  value='69'>Bank Mega</option>
			                    <option  value='70'>Bank Mega Syariah Indonesia</option>
			                    <option  value='71'>Bank Mestika Dharma</option>
			                    <option  value='72'>Bank Metro Express</option>
			                    <option  value='73'>Bank Mitraniaga</option>
			                    <option  value='74'>Bank Mizuho Indonesia</option>
			                    <option  value='75'>Bank Muamalat Indonesia</option>
			                    <option  value='76'>Bank Muamalat Indonesia</option>
			                    <option  value='77'>Bank Multi Arta Sentosa</option>
			                    <option  value='78'>Bank Mutiara</option>
			                    <option  value='79'>Bank Nagari (Padang)</option>
			                    <option  value='80'>Bank Nationalnobu</option>
			                    <option  value='81'>Bank Negara Indonesia</option>
			                    <option  value='82'>Bank NTB (Mataram)</option>
			                    <option  value='83'>Bank NTT (Kupang)</option>
			                    <option  value='84'>Bank Nusantara Parahyangan</option>
			                    <option  value='85'>Bank OCBC NISP</option>
			                    <option  value='86'>Bank OCBC NISP Syariah</option>
			                    <option  value='87'>Bank Pan Indonesia Bank</option>
			                    <option  value='88'>Bank Pan Indonesia Bank Syariah</option>
			                    <option  value='89'>Bank Pan Indonesia Bank Syariah</option>
			                    <option  value='90'>Bank Papua (Jayapura)</option>
			                    <option  value='91'>Bank Permata</option>
			                    <option  value='92'>Bank Permata Syariah</option>
			                    <option  value='93'>Bank Prima Master Bank</option>
			                    <option  value='94'>Bank Pundi Indonesia</option>
			                    <option  value='95'>Bank Purba Danarta (Semarang)</option>
			                    <option  value='96'>Bank Rabobank Internasional Indonesia</option>
			                    <option  value='97'>Bank Rakyat Indonesia</option>
			                    <option  value='98'>Bank Resona Perdania</option>
			                    <option  value='99'>Bank Riau Kepri (Pekanbaru)</option>
			                    <option  value='100'>Bank Riau Kepri Syariah</option>
			                    <option  value='101'>Bank Royal Indonesia</option>
			                    <option  value='102'>Bank SBI Indonesia</option>
			                    <option  value='103'>Bank Sinar Harapan Bali</option>
			                    <option  value='104'>Bank Sinarmas</option>
			                    <option  value='105'>Bank STMIK Binamulia (Palu)</option>
			                    <option  value='106'>Bank Sulsel (Makassar)</option>
			                    <option  value='107'>Bank Sulteng (Palu)</option>
			                    <option  value='108'>Bank Sultra (Kendari)</option>
			                    <option  value='109'>Bank Sulut (Manado)</option>
			                    <option  value='110'>Bank Sumitomo Mitsui Indonesia</option>
			                    <option  value='111'>Bank Sumsel Babel (Palembang)</option>
			                    <option  value='112'>Bank Sumut (Medan)</option>
			                    <option  value='113'>Bank Swadesi</option>
			                    <option  value='114'>Bank Syariah Bukopin</option>
			                    <option  value='115'>Bank Syariah Bukopin</option>
			                    <option  value='116'>Bank Syariah Mandiri</option>
			                    <option  value='117'>Bank Syariah Mandiri</option>
			                    <option  value='118'>Bank Syariah Mega Indonesia</option>
			                    <option  value='119'>Bank Tabungan Negara</option>
			                    <option  value='120'>Bank Tabungan Pensiunan Nasional (Bandung)</option>
			                    <option  value='121'>Bank UFJ Indonesia</option>
			                    <option  value='122'>Bank UOB Buana</option>
			                    <option  value='123'>Bank Victoria Internasional</option>
			                    <option  value='124'>Bank Victoria Syariah</option>
			                    <option  value='125'>Bank Victoria Syariah</option>
			                    <option  value='126'>Bank Windu Kentjana Internasional</option>
			                    <option  value='127'>Bank Woori Indonesia</option>
			                    <option  value='128'>Bank Yudha Bhakti</option>
			                </select>
			            </div>
			            <div class="form-group">
			                <label>Pemilik Properti <span class="required">*</span></label>
			                <input type='text' id='pemilik_properti' name='pemilik_properti' class='form-control input-sm number-pemilik_properti' value='' placeholder='pemilik properti' required>									
			            </div>
			            <div class="form-group">
			                <label>Maksud dan Tujuan Penilaian <span class="required">*</span></label>
			                <select id='maksud_tujuan' name='maksud_tujuan' class='form-control input-sm' required>
			                    <option disabled='disabled' selected='selected'>Pilih</option>
			                    <option  value='1'>Jaminan/Agunan Kredit</option>
			                    <option  value='2'>Penjaminan Utang</option>
			                    <option  value='3'>Asuransi</option>
			                    <option  value='4'>Jual Beli</option>
			                    <option  value='5'>Jual Beli dalam Waktu Terbatas</option>
			                    <option  value='6'>Agunan yang Diambil Alih Pada Perbankan</option>
			                </select>
			            </div>
			            <div class="form-group">
			                <label>Pengguna Laporan</label>
			                <input type='text' id='pengguna_laporan' name='pengguna_laporan' class='form-control input-sm number-pengguna_laporan' value='' placeholder='pengguna laporan' required>									
			            </div>
			            <div class="form-group">
			                <label>Laporan Ditujukan Kepada <span class="required">*</span></label><br>
			                <input type='radio' id='jenis_tujuan_pelaporan_0' name='jenis_tujuan_pelaporan' value='0' Checked> Klien/Debitur <input type='radio' id='jenis_tujuan_pelaporan_1' name='jenis_tujuan_pelaporan' value='1' > Bank 										
			                <select id='tujuan_pelaporan_klien' name='tujuan_pelaporan_klien' class='form-control input-sm' >
			                    <option disabled='disabled' selected='selected'>Pilih</option>
			                    <option  value='1'>PT ASD</option>
			                    <option  value='25003'>PT Radiant Utama Interinsco Tbk.</option>
			                    <option  value='25004'>PT Supraco Indonesia</option>
			                    <option  value='25005'>PT Ongkir Jaya</option>
			                    <option  value='25006'>PT. Bidar Jaya</option>
			                    <option  value='25007'>ASD</option>
			                    <option  value='25009'>Zamhur</option>
			                    <option  value='25012'>Bambang Sukary</option>
			                    <option  value='25013'>DENI BAHTIAR</option>
			                    <option  value='25014'>PT. Dewa</option>
			                    <option  value='25015'>PT. Jakarta</option>
			                    <option  value='25016'>PT. ASNO</option>
			                    <option  value='25017'>PT. Sumber Rezeki</option>
			                    <option  value='25018'>PT. Test</option>
			                </select>
			                <select id='tujuan_pelaporan_debitur' name='tujuan_pelaporan_debitur' class='form-control input-sm' >
			                    <option disabled='disabled' selected='selected'>Pilih</option>
			                    <option  value='1'>Bank Agris</option>
			                    <option  value='2'>Bank Agroniaga</option>
			                    <option  value='3'>Bank Anda</option>
			                    <option  value='4'>Bank Andara</option>
			                    <option  value='5'>Bank Anglomas Internasional Bank (Surabaya)</option>
			                    <option  value='6'>Bank ANZ Panin Bank</option>
			                    <option  value='7'>Bank Artha Graha Internasional</option>
			                    <option  value='8'>Bank Artos Indonesia (Bandung)</option>
			                    <option  value='9'>Bank Barclays Indonesia</option>
			                    <option  value='10'>Bank BCA Syariah</option>
			                    <option  value='11'>Bank Bengkulu (Kota Bengkulu)</option>
			                    <option  value='12'>Bank Bisnis Internasional (Bandung)</option>
			                    <option  value='13'>Bank BJB (Bandung)</option>
			                    <option  value='14'>Bank BJB Syariah</option>
			                    <option  value='15'>Bank BNI Syariah</option>
			                    <option  value='16'>Bank BNP Paribas Indonesia</option>
			                    <option  value='17'>Bank BPD Aceh (Banda Aceh)</option>
			                    <option  value='18'>Bank BPD Bali (Denpasar)</option>
			                    <option  value='19'>Bank BPD DIY (Yogyakarta)</option>
			                    <option  value='20'>Bank BRI Syariah</option>
			                    <option  value='21'>Bank BRI Syariah</option>
			                    <option  value='22'>Bank Bukopin</option>
			                    <option  value='23'>Bank Bumi Arta</option>
			                    <option  value='24'>Bank Capital Indonesia</option>
			                    <option  value='25'>Bank Central Asia</option>
			                    <option  value='26'>Bank Central Asia Syariah</option>
			                    <option  value='27'>Bank Centratama Nasional Bank (Surabaya)</option>
			                    <option  value='28'>Bank Chinatrust Indonesia</option>
			                    <option  value='29'>Bank CIMB Niaga</option>
			                    <option  value='30'>Bank CIMB Niaga Syariah</option>
			                    <option  value='31'>Bank Commonwealth</option>
			                    <option  value='32'>Bank Danamon</option>
			                    <option  value='33'>Bank Danamon Syariah</option>
			                    <option  value='34'>Bank DBS Indonesia</option>
			                    <option  value='35'>Bank Dipo International</option>
			                    <option  value='36'>Bank DKI (Jakarta)</option>
			                    <option  value='37'>Bank Ekonomi Raharja</option>
			                    <option  value='38'>Bank Fama Internasional (Bandung)</option>
			                    <option  value='39'>Bank Ganesha</option>
			                    <option  value='40'>Bank Hana</option>
			                    <option  value='41'>Bank Harda Internasional</option>
			                    <option  value='42'>Bank Himpunan Saudara 1906 (Bandung)</option>
			                    <option  value='43'>Bank ICB Bumiputera</option>
			                    <option  value='44'>Bank ICBC Indonesia</option>
			                    <option  value='45'>Bank Ina Perdana</option>
			                    <option  value='46'>Bank Index Selindo</option>
			                    <option  value='47'>Bank Indonesia</option>
			                    <option  value='48'>Bank Internasional Indonesia Maybank</option>
			                    <option  value='49'>Bank Jambi (Jambi)</option>
			                    <option  value='50'>Bank Jasa Jakarta</option>
			                    <option  value='51'>Bank Jateng (Semarang)</option>
			                    <option  value='52'>Bank Jatim (Surabaya)</option>
			                    <option  value='53'>Bank Kalbar (Pontianak)</option>
			                    <option  value='54'>Bank Kalsel (Banjarmasin)</option>
			                    <option  value='55'>Bank Kalteng (Palangka Raya)</option>
			                    <option  value='56'>Bank Kaltim (Samarinda)</option>
			                    <option  value='57'>Bank KEB Indonesia</option>
			                    <option  value='58'>Bank Kesawan</option>
			                    <option  value='59'>Bank Kesejahteraan Ekonomi</option>
			                    <option  value='60'>Bank Lampung (Bandar Lampung)</option>
			                    <option  value='61'>Bank Liman International</option>
			                    <option  value='62'>Bank Maluku (Ambon)</option>
			                    <option  value='63'>Bank Mandiri</option>
			                    <option  value='64'>Bank Maspion</option>
			                    <option  value='65'>Bank Mayapada</option>
			                    <option  value='66'>Bank Maybank Syariah Indonesia</option>
			                    <option  value='67'>Bank Maybank Syariah Indonesia</option>
			                    <option  value='68'>Bank Mayora</option>
			                    <option  value='69'>Bank Mega</option>
			                    <option  value='70'>Bank Mega Syariah Indonesia</option>
			                    <option  value='71'>Bank Mestika Dharma</option>
			                    <option  value='72'>Bank Metro Express</option>
			                    <option  value='73'>Bank Mitraniaga</option>
			                    <option  value='74'>Bank Mizuho Indonesia</option>
			                    <option  value='75'>Bank Muamalat Indonesia</option>
			                    <option  value='76'>Bank Muamalat Indonesia</option>
			                    <option  value='77'>Bank Multi Arta Sentosa</option>
			                    <option  value='78'>Bank Mutiara</option>
			                    <option  value='79'>Bank Nagari (Padang)</option>
			                    <option  value='80'>Bank Nationalnobu</option>
			                    <option  value='81'>Bank Negara Indonesia</option>
			                    <option  value='82'>Bank NTB (Mataram)</option>
			                    <option  value='83'>Bank NTT (Kupang)</option>
			                    <option  value='84'>Bank Nusantara Parahyangan</option>
			                    <option  value='85'>Bank OCBC NISP</option>
			                    <option  value='86'>Bank OCBC NISP Syariah</option>
			                    <option  value='87'>Bank Pan Indonesia Bank</option>
			                    <option  value='88'>Bank Pan Indonesia Bank Syariah</option>
			                    <option  value='89'>Bank Pan Indonesia Bank Syariah</option>
			                    <option  value='90'>Bank Papua (Jayapura)</option>
			                    <option  value='91'>Bank Permata</option>
			                    <option  value='92'>Bank Permata Syariah</option>
			                    <option  value='93'>Bank Prima Master Bank</option>
			                    <option  value='94'>Bank Pundi Indonesia</option>
			                    <option  value='95'>Bank Purba Danarta (Semarang)</option>
			                    <option  value='96'>Bank Rabobank Internasional Indonesia</option>
			                    <option  value='97'>Bank Rakyat Indonesia</option>
			                    <option  value='98'>Bank Resona Perdania</option>
			                    <option  value='99'>Bank Riau Kepri (Pekanbaru)</option>
			                    <option  value='100'>Bank Riau Kepri Syariah</option>
			                    <option  value='101'>Bank Royal Indonesia</option>
			                    <option  value='102'>Bank SBI Indonesia</option>
			                    <option  value='103'>Bank Sinar Harapan Bali</option>
			                    <option  value='104'>Bank Sinarmas</option>
			                    <option  value='105'>Bank STMIK Binamulia (Palu)</option>
			                    <option  value='106'>Bank Sulsel (Makassar)</option>
			                    <option  value='107'>Bank Sulteng (Palu)</option>
			                    <option  value='108'>Bank Sultra (Kendari)</option>
			                    <option  value='109'>Bank Sulut (Manado)</option>
			                    <option  value='110'>Bank Sumitomo Mitsui Indonesia</option>
			                    <option  value='111'>Bank Sumsel Babel (Palembang)</option>
			                    <option  value='112'>Bank Sumut (Medan)</option>
			                    <option  value='113'>Bank Swadesi</option>
			                    <option  value='114'>Bank Syariah Bukopin</option>
			                    <option  value='115'>Bank Syariah Bukopin</option>
			                    <option  value='116'>Bank Syariah Mandiri</option>
			                    <option  value='117'>Bank Syariah Mandiri</option>
			                    <option  value='118'>Bank Syariah Mega Indonesia</option>
			                    <option  value='119'>Bank Tabungan Negara</option>
			                    <option  value='120'>Bank Tabungan Pensiunan Nasional (Bandung)</option>
			                    <option  value='121'>Bank UFJ Indonesia</option>
			                    <option  value='122'>Bank UOB Buana</option>
			                    <option  value='123'>Bank Victoria Internasional</option>
			                    <option  value='124'>Bank Victoria Syariah</option>
			                    <option  value='125'>Bank Victoria Syariah</option>
			                    <option  value='126'>Bank Windu Kentjana Internasional</option>
			                    <option  value='127'>Bank Woori Indonesia</option>
			                    <option  value='128'>Bank Yudha Bhakti</option>
			                </select>
			            </div>
			            <div class="form-group">
			                <label>Jenis Laporan <span class="required">*</span></label>
			                <select id='jenis_laporan' name='jenis_laporan' class='form-control input-sm' required>
			                    <option disabled='disabled' selected='selected'>Pilih</option>
			                    <option  value='Ringkas'>Ringkas</option>
			                    <option  value='Lengkap'>Lengkap</option>
			                </select>
			            </div>
			            <div class="form-group">
			                <label>Keterangan Lainnya</label>
			                <textarea id='keterangan' name='keterangan' class='form-control input-sm' placeholder='Keterangan'></textarea>									
			            </div>
			            <div class="form-group">
			                <button type="button" class="btn btn-primary btn-sm btn-next">LANJUTKAN</button>
			            </div>
			        </div>
			        <div class="step-2 col-sm-12 col-xs-12">
			            <h4>Informasi Objek Penilaian <span class="required">*</span></h4>
			            <div id="table_objek" style="background-color: #eee;">
			                <table class="table_custom" style="" cellpadding='0' cellspacing='0' border='0'>
			                    <tbody id="table_lokasi_body"></tbody>
			                </table>
			                <input type="hidden" id="table_lokasi_count"/>
			            </div>
			            <div class="text-right">
			                <button type="button" class="btn btn-primary btn-sm btn-tambah-lokasi">OBJEK PROPERTI - 1</button>
			            </div>
			            <div class="col-sm-5 col-xs-12" style="padding: 0px;">
			                <div class="form-group">
			                    <button type="button" class="btn btn-warning btn-sm btn-kembali">KEMBALI</button>
			                </div>
			            </div>
			        </div>

			        <div class="col-sm-6 col-xs-12"></div>
			        <div class="col-sm-6 col-xs-12"><span class="required">*</span> Wajib diisi.</div>
			    </div>
			</form>
        </div>
    </div>
</section>


<script>
	var type				= "lokasi";
	var id 					= "";
	var id_klien			= "";
	var nama				= "";
	var tanggal_penerimaan	= "";
	var deskripsi			= "";
	var jenis_laporan			= "";
	var keterangan			= "";
	var current_url			= window.location.href;

	$(document).ready(function(){

		id = $("#id").val();

		if (getUrlParameter("state") == 1)
		{
			$(".step-1").show();
			$(".step-2").hide();
		}
		else if (getUrlParameter("state") == 2)
		{
			$(".step-1").hide();
			$(".step-2").show();
			get_lokasi();
			
			
		}
		else
		{
			$(".step-1").show();
			$(".step-2").hide();
		}


	});

	$(document).on("click", ".btn-next", function()
	{
		id_klien			= $("#id_klien").val();
		nama				= $("#nama").val();
		tgl					= $("#tanggal_penerimaan").val(); //13-06-2016
		thn					= tgl.substring(6,10);
		bln 				= tgl.substring(3,5);
		hari 				= tgl.substring(0,2);
		tanggal_penerimaan 	= thn+'-'+bln+'-'+hari;
		no_surat_tugas		= $("#no_surat_tugas").val();
		tgl					= $("#tgl_surat_tugas").val(); //13-06-2016
		thn					= tgl.substring(6,10);
		bln 				= tgl.substring(3,5);
		hari 				= tgl.substring(0,2);
		tgl_surat_tugas 	= thn+'-'+bln+'-'+hari;
		deskripsi			= $("#deskripsi").val();
		jenis_laporan 	= $("#jenis_laporan").val();
		keterangan			= $("#keterangan").val();
		
		if ($("#jenis_pemberi_tugas_0").is( ":checked" )){
			  jenis_pemberi_tugas	= 0;
				pemberi_tugas	= $("#pemberi_tugas_klien").val();
		}else{
			 jenis_pemberi_tugas	= 1;
		   pemberi_tugas	= $("#pemberi_tugas_debitur").val();
		}
		pemilik_properti			= $("#pemilik_properti").val();
		maksud_tujuan			= $("#maksud_tujuan").val();
		pengguna_laporan			= $("#pengguna_laporan").val();
		if ($("#jenis_tujuan_pelaporan_0").is( ":checked" )){
			  jenis_tujuan_pelaporan	= 0;
				tujuan_pelaporan	= $("#tujuan_pelaporan_klien").val();
		}else{
			 jenis_tujuan_pelaporan	= 1;
		   tujuan_pelaporan	= $("#tujuan_pelaporan_debitur").val();
		}

		$.ajax({
			type		: "POST",
			url 		: base_url + "AjaxPekerjaan/update_pekerjaan/",
			dataType	: "JSON",
			beforeSend: function() {
				$(".btn-next").html("Silahkan tunggu...");
				$(".btn-next").prop("disabled", true);
			},
			data		: {
				type 				: "step-1a",
				id		 			: id,
				id_klien 			: id_klien,
				nama 				: nama,
				tanggal_penerimaan 	: tanggal_penerimaan,
				no_surat_tugas 		: no_surat_tugas,
				tgl_surat_tugas 	: tgl_surat_tugas,
				deskripsi 			: deskripsi,
				jenis_laporan 			: jenis_laporan,
				keterangan 			: keterangan,

				jenis_pemberi_tugas 			: jenis_pemberi_tugas,
				pemberi_tugas 			: pemberi_tugas,
				pemilik_properti 			: pemilik_properti,
				maksud_tujuan 			: maksud_tujuan,
				pengguna_laporan 			: pengguna_laporan,
				jenis_tujuan_pelaporan 			: jenis_tujuan_pelaporan,
				tujuan_pelaporan 			: tujuan_pelaporan

			},
			success		: function (data) {
				$(".btn-next").html("LANJUTKAN");
				$(".btn-next").prop("disabled", false);

				if (data.result == "success"){
					$(".step-1").hide();
					$(".step-2").show();
					//window.history.pushState("object or string", "Title", window.location.pathname + "?state=2" );
					get_lokasi();
				}
				else
				{
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
				}
			},
		});
	});

	$(document).on("click", ".btn-kembali", function()
	{
		$(".step-1").show();
		$(".step-2").hide();
		window.history.pushState("object or string", "Title", window.location.pathname + "?state=1" );

	});

	$(document).on("click", ".btn-tambah-lokasi", function()
	{
		location = base_url + "pekerjaan/lokasi_edit/" + id + "/?url=" + window.location.href;
		/*
		jenis_laporan		= $("#jenis_laporan").val();
		keterangan			= $("#keterangan").val();
		$.ajax({
			type		: "POST",
			dataType	: "JSON",
			url 		: base_url + "AjaxPekerjaan/update_informasi_penilaian/",
			data: {
				id: id,
				jenis_laporan:jenis_laporan,
				keterangan:keterangan,
			},
			success		: function (data) {
				if (data.result == "success"){
						location = base_url + "pekerjaan/lokasi_edit/" + id + "/?url=" + window.location.href;
				}
				else
				{
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
				}
			},
		});*/

	});

	$(document).on("click", ".btn-edit-lokasi", function() {
		var id_lokasi	= $(this).attr("data");

		location = base_url + "pekerjaan/lokasi_edit/" + id + "/" + id_lokasi + "/?url=" + window.location.href;
	});

	$(document).on("click", ".btn-delete-lokasi", function() {
		var id	= $(this).attr("data");
		if (window.confirm("Apakah Anda yakin?"))
		{
			$.ajax({
				type		: "POST",
				url 		: base_url + "ajax/delete_data/" + type,
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

	$(document).on("click", ".btn-simpan", function()
	{
		if (window.confirm("Apakah Anda yakin?"))
		{
			id_klien			= $("#id_klien").val();
			nama				= $("#nama").val();
			tgl					= $("#tanggal_penerimaan").val(); //13-06-2016
			thn					= tgl.substring(6,10);
			bln 				= tgl.substring(3,5);
			hari 				= tgl.substring(0,2);
			tanggal_penerimaan 	= thn+'-'+bln+'-'+hari;
			deskripsi			= $("#deskripsi").val();
			jenis_laporan		= $("#jenis_laporan").val();
			keterangan			= $("#keterangan").val();

			$.ajax({
				type		: "POST",
				url 		: base_url + "AjaxPekerjaan/update_pekerjaan/",
				dataType	: "JSON",
				beforeSend: function() {
					$(".btn-simpan").html("Silahkan tunggu...");
					$(".btn-simpan").prop("disabled", true);
				},
				data		: {
					type 				: "step-1b",
					id		 			: id,
					id_klien 			: id_klien,
					nama 				: nama,
					tanggal_penerimaan 	: tanggal_penerimaan,
					deskripsi 			: deskripsi,
					jenis_laporan 		: jenis_laporan,
					keterangan 			: keterangan
				},
				success		: function (data) {
					generate_notification(data.result.trim(), data.message.trim(), "topCenter");
					$(".btn-simpan").html("SIMPAN");
					$(".btn-simpan").prop("disabled", false);

					if (data.result == "success")
					{
						location	= base_url + "pekerjaan/";
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
				$("tbody").html("<tr><td align='center'><img src='" + base_url + "asset/images/loading.gif' class='loading' /></td></tr>");
			},
			data		: {
				id_pekerjaan 	: id
			},
			success		: function (data) {
				//$(".test_data").html(data.data_table);
				$("tbody").html("");
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
				//alert();
				$(".table_count").html("Total data : " + data.data_total);
				//$("#table_lokasi_count").val($("#table_lokasi_body tr").length);
				$("#paging").html(data.data_paging);
				var lokasi_count = $("#table_lokasi_body tr").length;
				//alert(lokasi_count);
				if (lokasi_count <= 0){
					location = base_url + "pekerjaan/lokasi_edit/" + id + "/?url=" + window.location.href;
				}
			},
		});
	}
	function getPemberiTugas(){
		if ($("#jenis_pemberi_tugas_0").is( ":checked" )){
			  $("#pemberi_tugas_klien").show();
				$("#pemberi_tugas_debitur").hide();
				$("#pemberi_tugas_klien").prop('required',true);
				$("#pemberi_tugas_debitur").prop('required',false);
		}else{
				$("#pemberi_tugas_klien").hide();
				$("#pemberi_tugas_debitur").show();
				$("#pemberi_tugas_klien").prop('required',false);
				$("#pemberi_tugas_debitur").prop('required',true);
		}
	}
	function getTujuanPelaporan(){
		if ($("#jenis_tujuan_pelaporan_0").is( ":checked" )){
			  $("#tujuan_pelaporan_klien").show();
				$("#tujuan_pelaporan_debitur").hide();
				$("#tujuan_pelaporan_klien").prop('required',true);
				$("#tujuan_pelaporan_debitur").prop('required',false);
		}else{
				$("#tujuan_pelaporan_klien").hide();
				$("#tujuan_pelaporan_debitur").show();
				$("#tujuan_pelaporan_klien").prop('required',false);
				$("#tujuan_pelaporan_debitur").prop('required',true);
		}
	}
  $(document).ready(function(){
		getPemberiTugas();
		$("#jenis_pemberi_tugas_0,#jenis_pemberi_tugas_1").click(function() {
			getPemberiTugas();
		});
		getTujuanPelaporan();
		$("#jenis_tujuan_pelaporan_0,#jenis_tujuan_pelaporan_1").click(function() {
			getTujuanPelaporan();
		});
	});
</script>