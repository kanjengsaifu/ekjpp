<style type="text/css">
    .page
    {
        width: 710px;
        font-size: 12px;
        /*border: 2px solid #ff0000;*/
    }
    
    .panel
    {
        margin: 30px;
        width: 650px;
        font-size: 12px;
    }

    .panel-content
    {
        padding: 10px;
        font-size: 12px;
        text-align: justify;
        display: block;
    }
        .panel-content-left
    {
        padding: 10px;
        font-size: 12px;
        text-align: left;
        display: block;
    }
    
    .panel-no-margin
    {
        margin-top: 10px;
        margin-bottom: 0px;
    }
    
    ol{
        width: 600px;
    }
    
    ol li {
        text-align: justify;
        font-size: 12px;
    }
        
        
    ol ul{
        width: 550px;
    }
    
    ol ul li {
        text-align: justify;
        font-size: 12px;
                
    }
    
    ol ul ol{
        width: 500px;
    }
    
    ol ul ol li {
        text-align: justify;
        font-size: 12px;
    }
    
    .table-color{
        font-size: 12px;
    }
    .table-color th{
        background-color: #999;
        font-size: 12px;
    }
    .table-color td{
        font-size: 12px;
    }
</style>
<?php

// header('Content-Type: application/force-download');
// header('Content-disposition: attachment; filename=tes.doc');

// header("Pragma: ");
// header("Cache-Control: ");

 
?>        
        
<body>
    <div class="panel" style="margin-bottom: 0px;">
        <table style="font-family: Century Gothic; font-size: 10pt" border ="0" width="100%">
            <tr>
                <td colspan="7">No. <?=$dokumen_penawaran->no_penawaran?></td>
            </tr>
            <tr>
                <td colspan="7"><?=$dokumen_penawaran->kota?>, <?=date("d F Y", strtotime($dokumen_penawaran->tanggal))?></td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7">Kepada Yang Terhormat</td>
            </tr>
            <tr>
                <td colspan="7"><b><?=strtoupper($pekerjaan->nama_klien)?></b></td>
            </tr>
            <tr>
                <td colspan="7"><?=$klien->alamat?></td>
            </tr>
            <tr>
                <td colspan="7"><?=$klien->kota?>, <?=$klien->provinsi?></td>
            </tr>
            <tr>
                <td colspan="7">Up. Bpk. / Ibu <?=$dokumen_penawaran->up?></td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr >
                <td align="center" colspan="7"><b>Perihal : Surat Penawaran Pekerjaan Penilaian Properti/Aset Tetap</b></td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7" style="text-align:justify">Sehubungan dengan informasi yang kami terima dari <?=$beri_tugas->nama?>, 
                    Tbk yang  berdomisili <?=$dokumen_penawaran->domisili?> dengan C.P <?=$dokumen_penawaran->kontak?> 
                    via <?=$dokumen_penawaran->komunikasi_via?> 
                    tanggal <?=date("d F Y", strtotime($dokumen_penawaran->tanggal_komunikasi))?> 
                    tentang kebutuhan Manajemen <b><?=strtoupper($beri_tugas->nama)?></b> 
                    untuk melakukan penilaian properti/aset tetap, maka bersama ini kami sampaikan 
                    perihal tersebut di atas dengan persyaratan/ruang lingkup penugasan, sebagai berikut :</td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td><b>1.&nbsp;</b> </td>
                <td colspan="6"><b>STATUS PENILAI</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="6" style="text-align:justify">Kami adalah Penilai Publik (Penilai Independent) yang bernaung di bawah 
                                        <b>Kantor Jasa Penilai Publik Asno Minanda, Usep Prawira dan Rekan (KJPP ASUS)</b> dengan ijin usaha 
                                        No. 1020/KM.1/2016, yang akan memberikan opini penilaian objektip dan tidak memihak. 
                                        Dalam pelaksanaan penilaian ini, kami (beserta seluruh karyawan KJPP ASUS) 
                                        tidak memiliki Benturan kepentingan dengan subjek dan atau objek penilaian, 
                                        serta kami memiliki kompetensi untuk melaksanakan pekerjaan ini sesuai 
                                        ketentuan yang berlaku (KEPI dan SPI Edisi VI tahun 2015, serta Peraturan Perundang-undangan terkait lainnya).</td>
            </tr>
            <tr>
                <td><b>2.&nbsp;</b> </td>
                <td colspan="6"><b>PEMBERI TUGAS DAN PENGGUNA LAPORAN</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td style="vertical-align: top" width="140px">Pemberi Tugas</td>
                <td style="vertical-align: top">:</td>
                <td colspan="3" style="vertical-align: top"><b><?=strtoupper($beri_tugas->nama)?></b> yang berdomisili di <?=$dokumen_penawaran->domisili?>.</td>
                
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td style="vertical-align: top">Pengguna Laporan</td>
                <td style="vertical-align: top">:</td>
                <td colspan="3" style="vertical-align: top">Manajemen Pemberi Tugas dan <?=$id_tugas->pengguna_laporan?>.</td>
                
            </tr>
            <tr>
                <td><b>3.&nbsp;</b> </td>
                <td colspan="6"><b>MAKSUD DAN TUJUAN PENILAIAN</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="6" style="text-align:justify">Untuk memberikan pendapat/opini nilai properti/asset yang akan 
                    digunakan untuk tujuan "<?=$dokumen_penawaran->tujuan_penilaian?>" pada <b><?=$id_tugas->pengguna_laporan?>.</b></td>
            </tr>
            <tr>
                <td><b>4.&nbsp;</b> </td>
                <td colspan="6"><b>OBJEK PENILAIAN DAN LINGKUP PENUGASAN</b></td>
            </tr>
            
            <?php
                    $i = 1;
                    foreach ($data_lokasi as $item_lokasi)
                    {
            ?>
            
            <tr>
                <td></b> </td>
                <td colspan="6"><b>DATA OBJEK PROPERTI - <?=$i?></b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td style="vertical-align: top">Properti/Aset Tetap</td>
                <td style="vertical-align: top">:</td>
                <td colspan="3" style="vertical-align: top">1-<?=$item_lokasi->nama_jenis_objek?> <?=$item_lokasi->jenis_sertifikat?> No. <?=$item_lokasi->no_sertifikat?> seluas <?=$item_lokasi->luas_tanah?> m<sup>2</sup>, beserta pengembangan di atasnya berupa <?=$item_lokasi->pengembangan?>.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td style="vertical-align: top">Pemegang Hak</td>
                <td style="vertical-align: top">:</td>
                <td colspan="3" style="vertical-align: top"><?=$item_lokasi->pemegang_hak?></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td style="vertical-align: top">Lokasi Properti</td>
                <td style="vertical-align: top">:</td>
                <td colspan="3" style="vertical-align: top"><?="".$item_lokasi->alamat." ".(!empty($item_lokasi->gang) ? "Gang ".$item_lokasi->gang : "")." No. ".$item_lokasi->nomor.", RT. ".$item_lokasi->rt." RW. ".$item_lokasi->rw." Kel. ".$item_lokasi->nama_desa." ".(!empty($item_lokasi->dh_desa) ? "(d/h ".$item_lokasi->dh_desa.")" : "")." Kec. ".$item_lokasi->nama_kecamatan." ".(!empty($item_lokasi->dh_kecamatan) ? "(d/h ".$item_lokasi->dh_kecamatan.")" : "")." ".$item_lokasi->nama_kota." ".(!empty($item_lokasi->dh_kota) ? "(d/h ".$item_lokasi->dh_kota.")" : "").", ".$item_lokasi->nama_provinsi ." ".(!empty($item_lokasi->dh_provinsi) ? "(d/h ".$item_lokasi->dh_provinsi.")" : "")?></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td style="vertical-align: top">Bentuk kepemilikan</td>
                <td style="vertical-align: top">:</td>
                <td colspan="3" style="vertical-align: top">Properti yang dinilai adalah kepemilikan <?=$item_lokasi->kepemilikan?>.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td style="vertical-align: top">Lingkup penugasan</td>
                <td style="vertical-align: top">:</td>
                <td style="vertical-align: top"><li type="circle"></li></td>
                <td colspan="2"  style="vertical-align: top">Identifikasi syarat penugasan (properti dan data terkait).</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="circle"></li></td>
                <td colspan="2"  style="vertical-align: top">Analisis pendahuluan dan pengumpulan data awal properti.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="circle"></li></td>
                <td colspan="2"  style="vertical-align: top">Proses Inspeksi lapangan, berupa; pengumpulan dan verifikasi data fisik properti, lingkungan serta pasar properti.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="circle"></li></td>
                <td colspan="2"  style="vertical-align: top">Penerapan Pendekatan Penilaian.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="circle"></li></td>
                <td colspan="2"  style="vertical-align: top">Rekonsiliasi indikasi nilai bila digunakan lebih dari satu pendekatan dan opini nilai akhir.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="circle"></li></td>
                <td colspan="2"  style="vertical-align: top">Pelaporan/Penulisan Laporan Penilaian.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="circle"></li></td>
                <td colspan="2"  style="vertical-align: top">Waktu penyelesaian <b><?=$harikerja?>  hari kerja</b>, setelah survey dan data- data yang diperlukan dipenuhi oleh Pemberi Tugas.</td>
            </tr>
            
            <?php
                    $i++;   
                    }
            ?>
            <tr>
                <td><b>5.&nbsp;</b> </td>
                <td colspan="6"><b>DASAR NILAI DAN PENDEKATAN PENILAIAN</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="5" style="vertical-align: top;text-align:justify">Dasar nilai yang digunakan dalam penilaian ini, 
                    yaitu Nilai Pasar yang menurut SPI Edisi VI Tahun 2015 didefinisikan,  
                    sebagai berikut :</td>
                
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"></td>
                
                <td colspan="5" style="vertical-align: top;align: center">
                    <table width="90%"><tr><td>&nbsp;&nbsp;&nbsp;</td><td style="text-align:justify; font-family: Century Gothic; font-size:10pt;">
                    "estimasi sejumlah uang pada 
                    tanggal penilaian, yang dapat diperoleh dari hasil penukaran suatu aset atau 
                    liabilitas pada tanggal penilaian, antara pembeli yang berminat membeli dengan 
                    penjual yang berminat menjual, dalam suatu transaksi bebas ikatan, 
                    yang pemasarannya dilakukan secara layak, dimana kedua pihak masing-masing 
                    bertindak atas dasar pemahaman yang dimilikinya, kehati-hatian dan tanpa paksaan".
                    </td></tr></table>
                </td>
                
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="5" style="vertical-align: top;text-align:justify">Pendekatan penilaian yang digunakan yaitu; 
                    "Pendekatan Pasar untuk menilai aset Tanah dengan metode Perbandingan langsung data 
                    transaksi pasar", sedangkan Bangunan dan Sarana Pelengkap menggunakan Pendekatan 
                    biaya dengan metode Biaya Pengganti Baru Terdepresiasi".</td>
                
            </tr>
            <tr>
                <td><b>6.&nbsp;</b> </td>
                <td colspan="6"><b>TANGGAL INSPEKSI, PENILAIAN DAN PELAPORAN</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td style="vertical-align: top">Tanggal Inspeksi</td>
                <td style="vertical-align: top">:</td>
                <td colspan="3" style="vertical-align: top">Sesuai kesepakatan yang ditetapkan oleh Pemberi Tugas.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td style="vertical-align: top">Tanggal Penilaian</td>
                <td style="vertical-align: top">:</td>
                <td colspan="3" style="vertical-align: top">Sama dengan tanggal terakhir inspeksi lapangan.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td style="vertical-align: top">Tanggal Laporan</td>
                <td style="vertical-align: top">:</td>
                <td colspan="3" style="vertical-align: top">Sesuai tanggal berakhirnya masa kerja penugasan.</td>
            </tr>
            <tr>
                <td><b>7.&nbsp;</b> </td>
                <td colspan="6"><b>DATA PROPERTI YANG DIBUTUHKAN</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td colspan="6" style="vertical-align: top">Data-data yang diperlukan dalam penugasan ini adalah sebagai berikut :</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top">Foto copy sertifikat</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top">Foto copy PBB dua tahun terakhir</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top">Foto copy IMB (Surat Ijin Mendirikan Bangunan)</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top">Nama contact person yang berwenang menemani di lokasi properti</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top">Data-data lainnya yang mempengaruhi nilai properti.</td>
            </tr>
            <tr>
                <td><b>8.&nbsp;</b> </td>
                <td colspan="6"><b>MATA UANG YANG DIGUNAKAN</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Opini Nilai Properti menggunakan mata uang Rupiah (Rp.-) dan apabila dicantumkan dalam mata uang asing, maka akan dilakukan konversi sesuai kurs konversi Bank Indonesia (BI) per tanggal penilaian.</td>
            </tr>
            <tr>
                <td><b>9.&nbsp;</b> </td>
                <td colspan="6"><b>TINGKAT KEDALAMAN INVESTIGASI</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Inspeksi terhadap properti dilakukan dengan akses memadai (tanpa hambatan) dan pengumpulan, penelaahan/verifikasi serta analisis data (properti dan pasar properti) dilakukan dengan waktu yang memadai.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Adanya batas atau pembatasan dalam melakukan inpeksi, menelaah, penghitungan dan analisis akan mempengaruhi tingkat kedalaman investigasi yang dapat kami lakukan, dan akan kami nyatakan secara terperinci dalam laporan penilaian.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Dalam pelaksanaan inspeksi lapangan, Surveyor (Tim Inspeksi) kami harus didampingi oleh counterpart yang mengetahui (aspek teknis dan hukum) dari properti yang dinilai, dan Surat Tugas kami (yang dapat berlaku sebagai dokumen Berita Acara Hasil Inspeksi) harus ditandatangani bersama antara Surveyor dengan counterpart lapangan.</td>
            </tr>
            <tr>
                <td><b>10.&nbsp;</b> </td>
                <td colspan="6"><b>SIFAT DAN SUMBER INFORMASI YANG DAPAT DIANDALKAN</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Data terkait properti yang bersumber dari lembaga resmi pemerintah yang digunakan sebagai referensi/bahan analisis (tanpa verifikasi) dalam proses penilaian ini (seperti; Jurnal PU, BI, BPS, REI, PHRI, BTB-MAPPI dan lembaga riset resmi lainnya) telah dimengerti dan disetujui oleh Pemberi Tugas.</td>
            </tr>
            <tr>
                <td><b>11.&nbsp;</b> </td>
                <td colspan="6"><b>LAPORAN PENILAIAN</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Laporan penilaian ditulis dalam Bahasa Indonesia berupa "Laporan Lengkap (Narrative Report), sesuai SPI 105 (Standar Umum: Pelaporan Penilaian). Laporan ini ditujukan kepada Pemberi Tugas serta diberikan sebanyak 2 (dua) eksemplar asli.</td>
            </tr>
            <tr>
                <td><b>12.&nbsp;</b> </td>
                <td colspan="6"><b>PERSYARATAN ATAS PERSETUJUAN UNTUK PUBLIKASI</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Laporan penilaian ini beserta seluruh lampirannya adalah dokumen rahasia yang hanya ditujukan untuk pengguna dan dengan tujuan penilaian sebagaimana tercantum pada butir 2 dan 3. Setiap publikasi terhadap keseluruhan atau sebagian dari laporan, atau referensi yang dipublikasikan, termasuk referensi mengenai laporan keuangan perusahaan, dan/atau laporan direksi/pimpinan perusahaan, dan/atau pernyataan atau kajian lainnya atau pernyataan/edaran apapun dari Perusahaan (Pemberi Tugas), harus mendapat persetujuan (ijin) tertulis dari kami/Penilai (KJPP ASUS).</td>
            </tr>
            <tr>
                <td><b>13.&nbsp;</b> </td>
                <td colspan="6"><b>SYARAT PEMBATAS DAN PERNYATAAN PEMBERI TUGAS</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Kami/Penilai tidak memiliki tanggung jawab (dalam bentuk apapun juga) kepada pihak Ketiga, selama tidak menyimpang dari Peraturan dan ketentuan hukum yang berlaku.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Kami/Penilai tidak bertanggung jawab atas kerugian serta permasalahan hukum yang dapat/akan terjadi ketentuan pada butir 12 dilanggar.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Sebelum ada kesepakatan tentang kompensasi biaya (atas kehilangan waktu kerja/Man days), kami/Penilai tidak berkewajiban menjadi saksi (memberikan kesaksian) dalam suatu permasalahan hukum yang timbul dari penggunaan laporan ini.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Pemberi Tugas dengan ini menyatakan, bahwa properti/aset yang dinilai ini tidak sedang dalam penilaian oleh Penilai Publik lain dalam waktu yang bersamaan dan/atau dalam kurun waktu kurang dan sama dengan dari 1 (satu) bulan, atau tidak menjadikan penilaian kami sebagai opini nilai pembanding untuk memperoleh nilai yang tertinggi serta untuk digunakan untuk tujuan apapun (selain yang tertulis pada point 3.</td>
            </tr>
            <tr>
                <td><b>14.&nbsp;</b> </td>
                <td colspan="6"><b>SURAT REPRESENTASI DARI PEMBERI TUGAS</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Pemberi Tugas harus membuat pernyataan tertulis berupa “surat representasi” mengenai; sifat informasi; kebenaran/validitas;, keaslian/absah dan keakuratan seluruh data, informasi/ keterangan tentang objek penilaian yang diberikan kepada kami. Surat Representasi, terlampir bersama Surat Penawaran ini dan harus ditandatangani bersamaan dengan ditandatanganinya Surat Penawaran atau dokumen Kontrak Kerja ini.</td>
            </tr>
            <tr>
                <td><b>15.&nbsp;</b> </td>
                <td colspan="6"><b>ASUMSI DAN ASUMSI KHUSUS PENILAIAN</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Properti (objek penilaian) dilengkapi dokumen kepemilikan yang syah, bebas dari jaminan/tuntutan atau hambatan lainnya dan dapat dialihkan.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Semua data/dokumen dan informasi/keterangan yang diberikan Pemberi Tugas; sah/ valid, benar dan akurat sesuai dengan fakta fisik dan hukumnya.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Penilai diberi akses yang memadai untuk melakukan inspeksi lapangan.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Keseluruhan properti dapat beroperasi secara normal, wajar, dalam kondisi yang layak dan on-going concern serta tidak menimbulkan dampak/pencemaran lingkungan.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Pemberi Tugas menyetujui, dilakukannya inspeksi dari luar objek penilaian terhadap properti yang memiliki hambatan fisik dan hukum untuk dapat dilakukan pemeriksaan secara memadai. Informasi tentang properti diberikan secara lisan dan/atau tertulis oleh Pemberi Tugas dan/atu counterpart yang ditunjuknya.</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td style="vertical-align: top"><li type="square"></li></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Jika setelah inspeksi lapangan ditemukan beberapa kondisi yang memerlukan asumsi khusus, maka asumsi khusus tersebut akan dinyatakan dalam laporan Penilaian.</td>
            </tr>
            <tr>
                <td><b>16.&nbsp;</b> </td>
                <td colspan="6"><b>BIAYA JASA PENILAIAN (<i>PROFESSIONAL FEE</i>)</b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">Besarnya biaya jasa pelaksanaan penilaian ini didasarkan atas ruang lingkup pekerjaan, mencakup; jumlah tenaga/pekerja yang terlibat, waktu penyelesaian dan biaya lainnya yang dibutuhkan untuk menyelesaikan keseluruhan pekerjaan. Atas dasar hal tersebut, kami mengajukan biaya jasa penilaian, sebagai berikut :</td>
            </tr>
            <tr>
                <td style="vertical-align: top;"></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">
                    <table class="table-color" cellpadding="0" cellspacing="0" width="100%" style=" font-family: Century Gothic; font-size:10pt;border-left: 1px solid #999; border-top: 1px solid #999;">
                        <thead>
                                <tr style="color:  black;">
                                        <th style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;">UNSUR BIAYA</th>
                                        <th style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;">JUMLAH</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;" align="center">Biaya Jasa Penilaian Properti (Professional Fee) </td>
                                        <td style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;" align="right">Rp.  <?=number_format($dokumen_penawaran->biaya)?></td>
                                </tr>
                                <tr style="background-color: #C0C0C0">
                                        <td style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;" align="right"><b>TOTAL IMBALAN JASA</b></td>
                                        <td style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;" align="right">Rp.  <?=number_format($dokumen_penawaran->biaya)?></td>
                                </tr>
                                <tr style="background-color: #C0C0C0">
                                    <td colspan="2" style="padding: 5px 10px; border-bottom: 1px solid #999; border-right: 1px solid #999;" align="center"><b><i>Terbilang : 
                                        <?php
                                        $this->load->library("terbilang");
                                        $terbilang = $this->terbilang->terbilang($dokumen_penawaran->biaya);
                                        echo $terbilang.' Rupiah,-';
                                        ?></i></b>
                                    </td>
                                        
                                </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;"><b><u>Syarat & Kondisi Penawaran:</u></b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">
                    <table width ="100%" style="font-size:10pt;font-family: Century Gothic;">
                        <tr valign="top">
                            <td><li type="square"></li></td>
                            <td>Fee <u><b>sudah termasuk</b></u>  Pajak PPN 10%</td>
                        </tr>
                        <tr valign="top">
                            <td><li type="square"></li></td>
                            <td>Fee sudah / belum termasuk transportasi pesawat udara, transportasi lokal dan akomodasi yang ditanggung oleh pihak pemberi pekerjaan</td>
                        </tr>
                        <tr valign="top">
                            <td><li type="square"></li></td>
                            <td>Apabila pihak pemberi kerja memutuskan pekerjaan sepihak, sedangkan pekerjaan telah selesai dikerjakan maka pemberi kerja tetap harus membayar biaya jasa penilaian sesuai dengan yang telah disepakati.</td>
                        </tr>
                        <tr valign="top">
                            <td><li type="square"></li></td>
                            <td>Kami akan mengenakan denda sebesar 0,2 % untuk setiap hari keterlambatan, terhitung 5 hari sejak penyampaian tagihan.</td>
                        </tr>
                        <tr valign="top">
                            <td><li type="square"></li></td>
                            <td>Apabila pekerjaan dihentikan oleh Pemberi Tugas sebelum dikeluarkannya laporan final maka pemberi tugas berkewajiban menyelesaikan pembiayaan hingga termin yang telah dilaksanakan. Laporan akan difinalisasikan paling lambat 1 (satu) minggu setelah setelah penyampaian draft laporan, kecuali terdapat kesepakatan lainnya antara kedua belah pihak.</td>
                        </tr>
                    </table>
                    
                </td>
            </tr>
             <tr>
                <td style="vertical-align: top"></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;"><b><u>Termin pembayaran :</u></b></td>
            </tr>
            <tr>
                <td style="vertical-align: top"></td>
                <td colspan="6" style="vertical-align: top;text-align: justify;">
                    <table width ="100%" style="font-size:10pt;font-family: Century Gothic;">
                        <?php
                        
                        if ($lembar_kendali->termin_pembayaran_1 > 0) { ?>
                            <tr valign="top">
                                <td width="5px"><li type="square"></li></td>
                                <td>Termin 1 : <?=$lembar_kendali->termin_pembayaran_1?> % &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - <?=$lembar_kendali->termin_komentar_1?></td>
                            </tr>
                        <?php
                        }
                        if ($lembar_kendali->termin_pembayaran_2 > 0) { ?>
                            <tr valign="top">
                                <td><li type="square"></li></td>
                                <td>Termin 2 : <?=$lembar_kendali->termin_pembayaran_2?> %  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - <?=$lembar_kendali->termin_komentar_2?></td>
                            </tr>
                        
                        <?php
                        }
                        if ($lembar_kendali->termin_pembayaran_3 > 0) { ?>
                        
                            <tr valign="top">
                                <td><li type="square"></li></td>
                                <td>Termin 3 : <?=$lembar_kendali->termin_pembayaran_3?> %  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <?=$lembar_kendali->termin_komentar_3?></td>
                            </tr>
                        
                        <?php
                        }
                        if ($lembar_kendali->termin_pembayaran_4 > 0) { ?>
                            <tr valign="top">
                                <td><li type="square"></li></td>
                                <td>Termin 4 : <?=$lembar_kendali->termin_pembayaran_4?> %  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <?=$lembar_kendali->termin_komentar_4?></td>
                            </tr>
                       
                        <?php
                        }
                        if ($lembar_kendali->termin_pembayaran_5 > 0) { ?> 
                            <tr valign="top">
                                 <td><li type="square"></li></td>
                                 <td>Termin 5 : <?=$lembar_kendali->termin_pembayaran_5?> %  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <?=$lembar_kendali->termin_komentar_5?></td>
                             </tr>
                        
                        <?php
                        }
                        ?>
                    </table>
                    
                </td>
            </tr>
            <tr>
                <td colspan="7" style="text-align:justify">Demikian Surat Penawaran Pekerjaan Penilaian ini kami sampaikan dan berlaku juga sebagai dokumen Kontrak Kerja atau Surat Perintah Kerja (SPK) antara <b><?=strtoupper($beri_tugas->nama)?></b> dengan <b>KJPP ASUS </b>. Atas perhatian dan kerja sama yang baik, kami mengucapkan terima kasih.</td>
            </tr>
            <tr>
                <td colspan="7">
                    <table class="table-footer" style="font-size: 12px;width: 630px;">
                <tr>
                    <td style="width: 300px">
                        <b>KJPP Asno Minanda Usep Prawira dan REKAN</b>
                        <br /><br /><br /><br /><br /><br />
                        <b><?=$user_approve->nama?></b><br />
                        <?=$user_approve->jabatan?><br />
                                        
                        MAPPI (Cert.)   : <?=$user_approve->no_mappi?><br />
                        Ijin Penilai Publik : <?=$user_approve->no_ijinpp?><br />
                        Kualifikasi  Penilai    : <?=$user_approve->kualifikasi?><br />
                    </td>
                    <td style="width: 300px; padding-left: 30px;">
                        <!-- <b><?=strtoupper($pekerjaan->nama_klien)?></b> -->
                        <br /><br /><br /><br /><br /><br />
                        <b><?=$dokumen_penawaran->up?></b><br />
                        Jabatan : ...................................<br />
                        Tgl persetujuan : ...........................<br />
                        No NPWP : ...................................<br />
                        Alamat NPWP : ...............................<br />
                    </td>
                </tr>
            </table>
                </td>
            </tr>
        </table>
        
    </div>
</body>