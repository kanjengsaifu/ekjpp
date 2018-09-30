<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_All extends CI_Migration{
	public function up() {
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'varchar', 'constraint' => 128, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ip_address' => array( 'type' => 'varchar', 'constraint' => 45, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'timestamp' => array( 'type' => 'int', 'constraint' => 10, 'unsigned' => TRUE, 'auto_increment' => FALSE ),
	'data' => array( 'type' => 'blob', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->create_table("ci_sessions"); 
 
$this->dbforge->add_field(array(
	'ID_KOTAKAB' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ID_PROVINSI' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'NAMA_KOTAKAB' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ISACTIVE' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'INDEKS' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("ID_KOTAKAB", TRUE);
$this->dbforge->create_table("kotakab_btb_2"); 
 
$this->dbforge->add_field(array(
	'ID_KOTAKAB' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ID_PROVINSI' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'NAMA_KOTAKAB' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ISACTIVE' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'INDEKS' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("ID_KOTAKAB", TRUE);
$this->dbforge->create_table("kotakab_btb_2017"); 
 
$this->dbforge->add_field(array(
	'ID_KOTAKAB' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'ID_PROVINSI' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'NAMA_KOTAKAB' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ISACTIVE' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'INDEKS' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("ID_KOTAKAB", TRUE);
$this->dbforge->create_table("kotakab_btb_2018"); 
 
$this->dbforge->add_field(array(
	'version' => array( 'type' => 'bigint', 'constraint' => 20, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->create_table("migrations"); 
 
$this->dbforge->add_field(array(
	'id_arah' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'arah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_arah", TRUE);
$this->dbforge->create_table("mst_arah"); 
 
$this->dbforge->add_field(array(
	'id_arsitektur_bangunan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'arsitektur_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_arsitektur_bangunan", TRUE);
$this->dbforge->create_table("mst_arsitektur_bangunan"); 
 
$this->dbforge->add_field(array(
	'id_batas_properti' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'batas_properti' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_batas_properti", TRUE);
$this->dbforge->create_table("mst_batas_properti"); 
 
$this->dbforge->add_field(array(
	'id_bentuk_tanah' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'bentuk_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_bentuk_tanah", TRUE);
$this->dbforge->create_table("mst_bentuk_tanah"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'judul' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'thumbnail' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'content' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'slug' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kategori' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status' => array( 'type' => 'enum', 'constraint' => 'F','T', 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_berita"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'bidang_usaha' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kode' => array( 'type' => 'char', 'constraint' => 2, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_bidang_usaha"); 
 
$this->dbforge->add_field(array(
	'id_brb_bangunan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'brb_bangunan' => array( 'type' => 'float', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_brb_bangunan", TRUE);
$this->dbforge->create_table("mst_brb_bangunan"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'element' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lov' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'but' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_but"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'key' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'value' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_config"); 
 
$this->dbforge->add_field(array(
	'id_daya_listrik' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'daya_listrik' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_daya_listrik", TRUE);
$this->dbforge->create_table("mst_daya_listrik"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alamat' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_provinsi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kota' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kode_pos' => array( 'type' => 'varchar', 'constraint' => 6, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'npwp' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'npwp_file' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_status_kepemilikan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_bidang_usaha' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bidang_usaha_lainnya' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'go_publik' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 500, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_debitur"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_field' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_jenis_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sarana_pelengkap' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_depresiasi_sarana_pelengkap"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'bigint', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kecamatan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kode_pos' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_desa"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_pekerjaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_dokumen_master' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'total' => array( 'type' => 'int', 'constraint' => 20, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'file' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_final' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_dokumen_gabung"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_pekerjaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_dokumen_master' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'berupa' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bank' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sebesar' => array( 'type' => 'int', 'constraint' => 20, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'terbilang' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dikirim' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'diterima' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_final' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_dokumen_kwitansi"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'template' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 500, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_dokumen_master"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_pekerjaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_dokumen_master' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_penawaran' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kota' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'up' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'domisili' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kontak' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'komunikasi_via' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'komunikasi_via_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_komunikasi' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tujuan_penilaian' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penanda_tangan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_final' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_dokumen_penawaran"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'element' => array( 'type' => 'varchar', 'constraint' => 200, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bangunan' => array( 'type' => 'varchar', 'constraint' => 300, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lov' => array( 'type' => 'varchar', 'constraint' => 300, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'index' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_element"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'element' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lov' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'index' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'but' => array( 'type' => 'decimal', 'constraint' => 18,0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_element_2018"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_pekerjaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_status' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'unix_string' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_evaluasi"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_jenis_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alias' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'type' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'condition' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_field_objek"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_jenis_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alias' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'type' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'condition' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_field_objek_apartemen"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_jenis_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alias' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'type' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'condition' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_field_objek_kios"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_jenis_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alias' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'type' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'condition' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_field_objek_office_space"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_jenis_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alias' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'type' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'condition' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_field_objek_ruko"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_jenis_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alias' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'type' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'condition' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_field_objek_tmp"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'name' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'type' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'condition' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_field_tanah"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 500, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_group"); 
 
$this->dbforge->add_field(array(
	'id_harga_tanah_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'harga_tanah_objek' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_harga_tanah_objek", TRUE);
$this->dbforge->create_table("mst_harga_tanah_objek"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'category' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'name' => array( 'type' => 'varchar', 'constraint' => 500, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_icon"); 
 
$this->dbforge->add_field(array(
	'id_jaringan_air' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'jaringan_air' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_jaringan_air", TRUE);
$this->dbforge->create_table("mst_jaringan_air"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'kode' => array( 'type' => 'char', 'constraint' => 2, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_jasa' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_jenis_jasa"); 
 
$this->dbforge->add_field(array(
	'id_jenis_klien' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'jenis_klien' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_jenis_klien", TRUE);
$this->dbforge->create_table("mst_jenis_klien"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 500, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'is_active' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_jenis_objek"); 
 
$this->dbforge->add_field(array(
	'id_jenis_properti' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'jenis_properti' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_jenis_properti", TRUE);
$this->dbforge->create_table("mst_jenis_properti"); 
 
$this->dbforge->add_field(array(
	'id_jenis_tanah' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'jenis_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_jenis_tanah", TRUE);
$this->dbforge->create_table("mst_jenis_tanah"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'slug' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_kategori"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kota' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_kecamatan"); 
 
$this->dbforge->add_field(array(
	'id_kegunaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'kegunaan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_kegunaan", TRUE);
$this->dbforge->create_table("mst_kegunaan"); 
 
$this->dbforge->add_field(array(
	'id_kehadiran' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'kehadiran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_kehadiran", TRUE);
$this->dbforge->create_table("mst_kehadiran"); 
 
$this->dbforge->add_field(array(
	'id_kelas_bangunan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'kelas_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_ekonomis' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_kelas_bangunan", TRUE);
$this->dbforge->create_table("mst_kelas_bangunan"); 
 
$this->dbforge->add_field(array(
	'id_kepadatan_bangunan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'kepadatan_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_kepadatan_bangunan", TRUE);
$this->dbforge->create_table("mst_kepadatan_bangunan"); 
 
$this->dbforge->add_field(array(
	'id_keterangan_sumber_data' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'keterangan_sumber_data' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_keterangan_sumber_data", TRUE);
$this->dbforge->create_table("mst_keterangan_sumber_data"); 
 
$this->dbforge->add_field(array(
	'id_keterbukaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'keterbukaan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_keterbukaan", TRUE);
$this->dbforge->create_table("mst_keterbukaan"); 
 
$this->dbforge->add_field(array(
	'kode_kjpp' => array( 'type' => 'varchar', 'constraint' => 20, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_kjpp' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'logo_kjpp' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kode_identitas_kantor' => array( 'type' => 'char', 'constraint' => 7, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("kode_kjpp", TRUE);
$this->dbforge->create_table("mst_kjpp"); 
 
$this->dbforge->add_field(array(
	'id_klasifikasi_bangunan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'klasifikasi_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_klasifikasi_bangunan", TRUE);
$this->dbforge->create_table("mst_klasifikasi_bangunan"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alamat' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_provinsi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kota' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kode_pos' => array( 'type' => 'varchar', 'constraint' => 6, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_status_kepemilikan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_bidang_usaha' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bidang_usaha_lainnya' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'go_publik' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'telepon' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fax' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_kontak' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_kontak' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_debitur' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'catatan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'email' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'npwp' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'npwp_file' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'website' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'emailpribadi' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_klien"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'bangunan' => array( 'type' => 'varchar', 'constraint' => 200, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jml_lantai' => array( 'type' => 'varchar', 'constraint' => 10, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'koefisien' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_koefisien_lantai"); 
 
$this->dbforge->add_field(array(
	'id_kondisi_eksterior_interior' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'kondisi_eksterior_interior' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_kondisi_eksterior_interior", TRUE);
$this->dbforge->create_table("mst_kondisi_eksterior_interior"); 
 
$this->dbforge->add_field(array(
	'id_kondisi_existing_tanah' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'kondisi_existing_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_kondisi_existing_tanah", TRUE);
$this->dbforge->create_table("mst_kondisi_existing_tanah"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'email' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'judul' => array( 'type' => 'varchar', 'constraint' => 256, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pesan' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_kontak"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_provinsi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_kota"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_pekerjaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_status' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'step' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'unix_string' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_lembar_kendali"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_pekerjaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_jenis_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kode' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alamat' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gang' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nomor' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'rt' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'rw' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_provinsi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kota' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kecamatan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_desa' => array( 'type' => 'bigint', 'constraint' => 15, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dh_provinsi' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dh_kota' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dh_kecamatan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dh_desa' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jam' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_transportasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pengembangan' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemegang_hak' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kepemilikan' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_sertifikat' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_sertifikat' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_bangunan' => array( 'type' => 'varchar', 'constraint' => 150, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_mulai' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_selesai' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'biaya' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_survey' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_laporan' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'custom_data' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'zip' => array( 'type' => 'varchar', 'constraint' => 5, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'latitude' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'longitude' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'latitude_pembanding_0' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'longitude_pembanding_0' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'latitude_pembanding_1' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'longitude_pembanding_1' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'latitude_pembanding_2' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'longitude_pembanding_3' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'latitude_pembanding_3' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'longitude_pembanding_2' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_lokasi"); 
 
$this->dbforge->add_field(array(
	'id_lokasi_bidang_tanah' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'lokasi_bidang_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_lokasi_bidang_tanah", TRUE);
$this->dbforge->create_table("mst_lokasi_bidang_tanah"); 
 
$this->dbforge->add_field(array(
	'id_lokasi_tanah_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'lokasi_tanah_objek' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_lokasi_tanah_objek", TRUE);
$this->dbforge->create_table("mst_lokasi_tanah_objek"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'surveyor' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_pendamping' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kontak_pendamping' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'photo_pendamping' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jabatan_pendamping' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_laporan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penandatangan_laporan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_lokasi_tmp"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'label' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'link' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'controller' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'method' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'show' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'public' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'icon' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_parent' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'level' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'order' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_menu"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_negara"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_klien' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_penerimaan' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'deskripsi' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_laporan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penilai' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'reviewer' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'unix' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_pemberi_tugas' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemberi_tugas' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemilik_properti' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'maksud_tujuan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_pengguna_laporan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pengguna_laporan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pengguna_laporan_lainnya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_tujuan_pelaporan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tujuan_pelaporan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_jasa' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_surat_tugas' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'surat_tugas_final' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tgl_surat_tugas' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_pekerjaan"); 
 
$this->dbforge->add_field(array(
	'id_pemasangan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'pemasangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_pemasangan", TRUE);
$this->dbforge->create_table("mst_pemasangan"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'pengguna_laporan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kode' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_pengguna_laporan"); 
 
$this->dbforge->add_field(array(
	'id_persen_deviasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_jenis_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai' => array( 'type' => 'float', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_persen_deviasi", TRUE);
$this->dbforge->create_table("mst_persen_deviasi"); 
 
$this->dbforge->add_field(array(
	'id_pertumbuhan_bangunan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'pertumbuhan_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_pertumbuhan_bangunan", TRUE);
$this->dbforge->create_table("mst_pertumbuhan_bangunan"); 
 
$this->dbforge->add_field(array(
	'id_perubahan_lingkungan_response' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'perubahan_lingkungan_response' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_perubahan_lingkungan_response", TRUE);
$this->dbforge->create_table("mst_perubahan_lingkungan_response"); 
 
$this->dbforge->add_field(array(
	'id_peruntukan_kawasan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'peruntukan_kawasan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_peruntukan_kawasan", TRUE);
$this->dbforge->create_table("mst_peruntukan_kawasan"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_pekerjaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'file' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_po"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_negara' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_provinsi"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe' => array( 'type' => 'varchar', 'constraint' => 200, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'data1' => array( 'type' => 'varchar', 'constraint' => 300, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'data2' => array( 'type' => 'varchar', 'constraint' => 300, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'data3' => array( 'type' => 'varchar', 'constraint' => 300, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_reference"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'title' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'image' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'order' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_slide"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'group_pekerjaan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'module' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'step' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_group' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'klien_baru' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pekerjaan_baru' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_lokasi' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_lk' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_evaluasi' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'update_dokumen' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_po' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_petugas' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kirim' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'setujui' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tolak' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status_step' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_status"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'status_kepemilikan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kode' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_status_kepemilikan"); 
 
$this->dbforge->add_field(array(
	'id_status_objek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'status_objek' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_status_objek", TRUE);
$this->dbforge->create_table("mst_status_objek"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'group_pekerjaan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'module' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'step' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_group' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'klien_baru' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pekerjaan_baru' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_lokasi' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_lk' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_evaluasi' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'update_dokumen' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_po' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_petugas' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kirim' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'setujui' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tolak' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status_step' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_status_tmp"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'group_pekerjaan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'module' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'step' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_group' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'klien_baru' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pekerjaan_baru' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_lokasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_lkk1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_evaluasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'update_dokumen' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_po' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambah_petugas' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kirim' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'setujui' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tolak' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status_step' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->create_table("mst_status_tmp_1"); 
 
$this->dbforge->add_field(array(
	'id_sumber_nomor_sertifikat' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'sumber_nomor_sertifikat' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_sumber_nomor_sertifikat", TRUE);
$this->dbforge->create_table("mst_sumber_nomor_sertifikat"); 
 
$this->dbforge->add_field(array(
	'id_tipe_area_parkir' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_area_parkir' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_area_parkir", TRUE);
$this->dbforge->create_table("mst_tipe_area_parkir"); 
 
$this->dbforge->add_field(array(
	'id_tipe_bangunan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_bangunan", TRUE);
$this->dbforge->create_table("mst_tipe_bangunan"); 
 
$this->dbforge->add_field(array(
	'id_tipe_bangunan_btb' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_bangunan_btb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kode_tipe_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_bangunan_btb", TRUE);
$this->dbforge->create_table("mst_tipe_bangunan_btb"); 
 
$this->dbforge->add_field(array(
	'id_tipe_dinding' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_dinding' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_dinding", TRUE);
$this->dbforge->create_table("mst_tipe_dinding"); 
 
$this->dbforge->add_field(array(
	'id_tipe_hunian' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_hunian' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_hunian", TRUE);
$this->dbforge->create_table("mst_tipe_hunian"); 
 
$this->dbforge->add_field(array(
	'id_tipe_jalan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_jalan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_jalan", TRUE);
$this->dbforge->create_table("mst_tipe_jalan"); 
 
$this->dbforge->add_field(array(
	'id_tipe_keadaan_halaman' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_keadaan_halaman' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_keadaan_halaman", TRUE);
$this->dbforge->create_table("mst_tipe_keadaan_halaman"); 
 
$this->dbforge->add_field(array(
	'id_tipe_kejadian' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_kejadian' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_kejadian", TRUE);
$this->dbforge->create_table("mst_tipe_kejadian"); 
 
$this->dbforge->add_field(array(
	'id_tipe_kolam_renang' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_kolam_renang' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_kolam_renang", TRUE);
$this->dbforge->create_table("mst_tipe_kolam_renang"); 
 
$this->dbforge->add_field(array(
	'id_tipe_kusen' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_kusen' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_kusen", TRUE);
$this->dbforge->create_table("mst_tipe_kusen"); 
 
$this->dbforge->add_field(array(
	'id_tipe_lantai' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_lantai' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_lantai", TRUE);
$this->dbforge->create_table("mst_tipe_lantai"); 
 
$this->dbforge->add_field(array(
	'id_tipe_legalitas_tanah' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_legalitas_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_legalitas_tanah", TRUE);
$this->dbforge->create_table("mst_tipe_legalitas_tanah"); 
 
$this->dbforge->add_field(array(
	'id_tipe_lokasi_kios' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_lokasi_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_lokasi_kios", TRUE);
$this->dbforge->create_table("mst_tipe_lokasi_kios"); 
 
$this->dbforge->add_field(array(
	'id_tipe_masa_bangunan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_masa_bangunan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_masa_bangunan", TRUE);
$this->dbforge->create_table("mst_tipe_masa_bangunan"); 
 
$this->dbforge->add_field(array(
	'id_tipe_pagar_halaman' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_pagar_halaman' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_pagar_halaman", TRUE);
$this->dbforge->create_table("mst_tipe_pagar_halaman"); 
 
$this->dbforge->add_field(array(
	'id_tipe_partisi_ruangan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_partisi_ruangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_partisi_ruangan", TRUE);
$this->dbforge->create_table("mst_tipe_partisi_ruangan"); 
 
$this->dbforge->add_field(array(
	'id_tipe_pemagaran_halaman' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_pemagaran_halaman' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_pemagaran_halaman", TRUE);
$this->dbforge->create_table("mst_tipe_pemagaran_halaman"); 
 
$this->dbforge->add_field(array(
	'id_tipe_pemanas_air' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_pemanas_air' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_pemanas_air", TRUE);
$this->dbforge->create_table("mst_tipe_pemanas_air"); 
 
$this->dbforge->add_field(array(
	'id_tipe_penangkal_petir' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_penangkal_petir' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_penangkal_petir", TRUE);
$this->dbforge->create_table("mst_tipe_penangkal_petir"); 
 
$this->dbforge->add_field(array(
	'id_tipe_pendingin_ruangan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_pendingin_ruangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_pendingin_ruangan", TRUE);
$this->dbforge->create_table("mst_tipe_pendingin_ruangan"); 
 
$this->dbforge->add_field(array(
	'id_tipe_penilaian' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_penilaian' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_penilaian", TRUE);
$this->dbforge->create_table("mst_tipe_penilaian"); 
 
$this->dbforge->add_field(array(
	'id_tipe_penutup_atap' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_penutup_atap' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_penutup_atap", TRUE);
$this->dbforge->create_table("mst_tipe_penutup_atap"); 
 
$this->dbforge->add_field(array(
	'id_tipe_perkerasan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_perkerasan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_perkerasan", TRUE);
$this->dbforge->create_table("mst_tipe_perkerasan"); 
 
$this->dbforge->add_field(array(
	'id_tipe_pintu_jendela' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_pintu_jendela' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_pintu_jendela", TRUE);
$this->dbforge->create_table("mst_tipe_pintu_jendela"); 
 
$this->dbforge->add_field(array(
	'id_tipe_plafond' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_plafond' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_plafond", TRUE);
$this->dbforge->create_table("mst_tipe_plafond"); 
 
$this->dbforge->add_field(array(
	'id_tipe_pondasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_pondasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_pondasi", TRUE);
$this->dbforge->create_table("mst_tipe_pondasi"); 
 
$this->dbforge->add_field(array(
	'id_tipe_posisi_kios' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_posisi_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_posisi_kios", TRUE);
$this->dbforge->create_table("mst_tipe_posisi_kios"); 
 
$this->dbforge->add_field(array(
	'id_tipe_posisi_tanah' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_posisi_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_posisi_tanah", TRUE);
$this->dbforge->create_table("mst_tipe_posisi_tanah"); 
 
$this->dbforge->add_field(array(
	'id_tipe_pusat_perbelanjaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_pusat_perbelanjaan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_pusat_perbelanjaan", TRUE);
$this->dbforge->create_table("mst_tipe_pusat_perbelanjaan"); 
 
$this->dbforge->add_field(array(
	'id_tipe_rangka_atap' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_rangka_atap' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_rangka_atap", TRUE);
$this->dbforge->create_table("mst_tipe_rangka_atap"); 
 
$this->dbforge->add_field(array(
	'id_tipe_renovasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_renovasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_renovasi", TRUE);
$this->dbforge->create_table("mst_tipe_renovasi"); 
 
$this->dbforge->add_field(array(
	'id_tipe_sertifikat' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_sertifikat' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_sertifikat", TRUE);
$this->dbforge->create_table("mst_tipe_sertifikat"); 
 
$this->dbforge->add_field(array(
	'id_tipe_strategis' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_strategis' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_strategis", TRUE);
$this->dbforge->create_table("mst_tipe_strategis"); 
 
$this->dbforge->add_field(array(
	'id_tipe_struktur' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_struktur' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_struktur", TRUE);
$this->dbforge->create_table("mst_tipe_struktur"); 
 
$this->dbforge->add_field(array(
	'id_tipe_tangga' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tipe_tangga' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tipe_tangga", TRUE);
$this->dbforge->create_table("mst_tipe_tangga"); 
 
$this->dbforge->add_field(array(
	'id_topografi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'topografi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_topografi", TRUE);
$this->dbforge->create_table("mst_topografi"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 500, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_transportasi_survey"); 
 
$this->dbforge->add_field(array(
	'id_tujuan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'tujuan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tujuan", TRUE);
$this->dbforge->create_table("mst_tujuan"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_group' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'email' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'password' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'auth' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'telepon' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alamat' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'avatar' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jabatan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_mappi' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_ijinpp' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_sttdojk' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kualifikasi' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'is_tandatanganlaporan' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status' => array( 'type' => 'enum', 'constraint' => 'F','T', 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("mst_user"); 
 
$this->dbforge->add_field(array(
	'id_waktu_penawaran' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'waktu_penawaran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_waktu_penawaran", TRUE);
$this->dbforge->create_table("mst_waktu_penawaran"); 
 
$this->dbforge->add_field(array(
	'id_zoning' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'zoning' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_zoning", TRUE);
$this->dbforge->create_table("mst_zoning"); 
 
$this->dbforge->add_field(array(
	'ID_PROVINSI' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'NAMA_PROVINSI' => array( 'type' => 'varchar', 'constraint' => 32, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'INDEKS' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ISACTIVE' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("ID_PROVINSI", TRUE);
$this->dbforge->create_table("provinsi_btb_2017"); 
 
$this->dbforge->add_field(array(
	'id_data_legalitas' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kertas_kerja' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_tanah' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_sertifikat' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nomor_sertifikat' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'atas_nama' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_sertifikat_terbit' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_sertifikat_berakhir' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nomor' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tgl_bln_thn' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bobot' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah' => array( 'type' => 'float', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_data_legalitas", TRUE);
$this->dbforge->create_table("r_data_legalitas"); 
 
$this->dbforge->add_field(array(
	'id_skin' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'value' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'is_active' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_skin", TRUE);
$this->dbforge->create_table("setting_skin"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'element1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'element2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'element3' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'harga_dki' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("tmp_btb_zdr"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'kode' => array( 'type' => 'varchar', 'constraint' => 10, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'elemen' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'rtmewah2lantai' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'rtmenengah2lantai' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'rtsederhana1lantai' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'semipermanen1lantai' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gudang1lantai' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gbrendah' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gbsedang' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gbtinggi' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'urutan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("tmpbtb_2017"); 
 
$this->dbforge->add_field(array(
	'id_bangunan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kertas_kerja' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bangunan_role' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe_bangunan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penggunaan_saat_ini' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nomor_imb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_imb' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_lantai' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_imb' => array( 'type' => 'decimal', 'constraint' => 18,3, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perbedaan_luas_fisik_imb' => array( 'type' => 'decimal', 'constraint' => 18,3, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'peruntukan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ketinggian_bangunan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe_massa_bangunan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'koefisien_dasar_bangunan' => array( 'type' => 'double', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'koefisien_dasar_lantai' => array( 'type' => 'double', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'melanggar_ketinggian_bangunan' => array( 'type' => 'double', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pelebaran_jalan' => array( 'type' => 'double', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gsb' => array( 'type' => 'double', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gss' => array( 'type' => 'double', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'total_luas_terpotong' => array( 'type' => 'double', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'arsitektur_bangunan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_bangunan_depan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'panjang' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_dibangun' => array( 'type' => 'char', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_direnovasi' => array( 'type' => 'char', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lantai_bangunan_utama' => array( 'type' => 'double', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jalan_depan_properti' => array( 'type' => 'double', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pondasi' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'struktur' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'rangka_atap' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penutup_atap' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'plafond' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dinding' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'partisi_ruangan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kusen' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_jendela' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lantai' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tangga' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_tower' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_lantai_objek' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_ruang_apartment' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'view_menghadap_ke' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pantry' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'saluran_listrik' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ac' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'air_bersih' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_kamar_tidur' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_kamar_mandi' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'furnished' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dinding_ruangan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kamar_pembantu' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dapur_bersih' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'laundry_room' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'teras_balkon' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pembuangan_sampah' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_kamar_mandi' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sanitair' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'saluran_listrik_pln' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sambungan_telepon' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jaringan_air_bersih' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pendingin_ruangan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe_pendingin_ruangan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemanas_air' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe_pemanas_air' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penangkal_petir' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe_penangkal_petir' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kolam_renang' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe_kolam_renang' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'area_parkir' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe_area_parkir' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'security_parking' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemagaran_halaman' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keadaan_halaman' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'informasi_njop_properti' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bumi_bersama' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bangunan_bersama' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_njop' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'harga_per_meter' => array( 'type' => 'decimal', 'constraint' => 18,0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_pasar_fisik' => array( 'type' => 'decimal', 'constraint' => 18,0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_nilai_likuidasi_fisik' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_pasar_peraturan' => array( 'type' => 'decimal', 'constraint' => 18,0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_nilai_likuidasi_peraturan' => array( 'type' => 'decimal', 'constraint' => 18,0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_likuidasi_fisik' => array( 'type' => 'decimal', 'constraint' => 18,0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'catatan_penilai' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_unit_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_lantai_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'blok_area' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_unit_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'interior_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'produk_dagang' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'daya_listrik' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'unit_ac' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'telepon' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe_bangunan_btb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_lantai_btb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_penilaian_btb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_bangun_btb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_renovasi_btb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_renovasi_btb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'klasifikasi_bangunan_btb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kelas_bangunan_btb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'umur_ekonomis_btb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'umur_efektif_btb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'total_luas_btb' => array( 'type' => 'varchar', 'constraint' => 225, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kondisi_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_pasar_permeter' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'brb_rcn' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'brb_rcn_permeter' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_likuidasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kemunduran_fisik' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kondisi_terlihat' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keusangan_fungsional' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keusangan_ekonomis' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'total_penyusutan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'disc' => array( 'type' => 'varchar', 'constraint' => 20, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_bangunan", TRUE);
$this->dbforge->create_table("txn_bangunan"); 
 
$this->dbforge->add_field(array(
	'id_bangunan_btb' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kertas_kerja' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_bangunan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_lantai' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_penilaian' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_bangun' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_renovasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_renovasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'klasifikasi_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kelas_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'umur_ekonomis' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'umur_efektif' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_bangunan_btb", TRUE);
$this->dbforge->create_table("txn_bangunan_btb"); 
 
$this->dbforge->add_field(array(
	'id_data_banding' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kertas_kerja' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_pembanding' => array( 'type' => 'varchar', 'constraint' => 225, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'foto_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'foto_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumber_data_nama' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumber_data_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumber_data_telepon' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_properti' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_apartment' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_tower' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lantai_ruang_apartment' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_pusat_perbelanjaan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_lantai_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'blok_area' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alamat' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'latitude' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'longitude' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jarak_dengan_objek' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'harga_penawaran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkiraan_diskon' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_harga_transaksi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'waktu_penawaran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_legalitas' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_ruangan_apartment' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_unit_ruangan_apartment' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'view_menghadap_ke' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_ruang_apartment' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'furnished' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_kamar_tidur' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_rasio_ruang_apartment' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_unit_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_unit_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_unit_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_lantai' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_dibangun' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_jalan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kondisi_eksterior_interior' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bentuk_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_posisi_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'peruntukan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kondisi_existing_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'topografi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_depan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'panjang_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'brb_standar_mappi' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'brb_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kondisi_fisik_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_nilai_pasar_bangunan_permeter' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_nilai_pasar_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_nilai_pasar_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_nilai_tanah_permeter' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_nilai_bangunan_permeter' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_op' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_dt_1' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_dt_2' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_dt_3' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_dt_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_legalitas_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_legalitas_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_legalitas_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_legalitas_op' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_legalitas_dt_1' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_legalitas_dt_2' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_legalitas_dt_3' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dokumen_legalitas_dt_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lantai_ruang_apartment_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lantai_ruang_apartment_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lantai_ruang_apartment_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lantai_ruang_apartment_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_ruangan_apartment_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_ruangan_apartment_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_ruangan_apartment_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_ruangan_apartment_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'view_menghadap_ke_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'view_menghadap_ke_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'view_menghadap_ke_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'view_menghadap_ke_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_ruang_apartment_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_ruang_apartment_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_ruang_apartment_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_ruang_apartment_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'furnished_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'furnished_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'furnished_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'furnished_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_kamar_tidur_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_kamar_tidur_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_kamar_tidur_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_kamar_tidur_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_ruang_apartment_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_ruang_apartment_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_ruang_apartment_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_ruang_apartment_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah_op' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah_dt_1' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah_dt_2' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah_dt_3' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah_dt_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_bangunan_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_bangunan_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_bangunan_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_bangunan_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_kios_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_kios_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_kios_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_kios_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_lantai_kios_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_lantai_kios_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_lantai_kios_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_lantai_kios_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_kios_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_kios_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_kios_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_kios_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_kios_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_kios_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_kios_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_kios_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_kios_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_kios_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_kios_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_kios_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_kondisi_jalan_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_kondisi_jalan_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_kondisi_jalan_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_kondisi_jalan_op' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_kondisi_jalan_dt_1' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_kondisi_jalan_dt_2' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_kondisi_jalan_dt_3' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_kondisi_jalan_dt_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_depan_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_depan_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_depan_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_depan_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'panjang_bangunan_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'panjang_bangunan_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'panjang_bangunan_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'panjang_bangunan_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kondisi_eksterior_interior_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kondisi_eksterior_interior_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kondisi_eksterior_interior_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kondisi_eksterior_interior_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_lingkungan_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_lingkungan_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_lingkungan_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_lingkungan_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sarana_parkir_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sarana_parkir_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sarana_parkir_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sarana_parkir_op' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_posisi_bangunan_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_posisi_bangunan_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_posisi_bangunan_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_posisi_bangunan_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bentuk_tanah_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bentuk_tanah_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bentuk_tanah_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bentuk_tanah_op' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bentuk_tanah_dt_1' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bentuk_tanah_dt_2' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bentuk_tanah_dt_3' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bentuk_tanah_dt_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_sudut_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_sudut_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_sudut_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_sudut_op' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_sudut_dt_1' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_sudut_dt_2' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_sudut_dt_3' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_sudut_dt_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_tusuk_sate_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_tusuk_sate_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_tusuk_sate_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_tusuk_sate_op' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_tusuk_sate_dt_1' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_tusuk_sate_dt_2' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_tusuk_sate_dt_3' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah_tusuk_sate_dt_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'peruntukan_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'peruntukan_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'peruntukan_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'peruntukan_op' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'peruntukan_dt_1' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'peruntukan_dt_2' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'peruntukan_dt_3' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'peruntukan_dt_0p' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'topografi_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'topografi_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'topografi_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'topografi_op' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'topografi_dt_1' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'topografi_dt_2' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'topografi_dt_3' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'topografi_dt_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'waktu_penawaran_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'waktu_penawaran_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'waktu_penawaran_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'waktu_penawaran_op' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'waktu_penawaran_dt_1' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'waktu_penawaran_dt_2' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'waktu_penawaran_dt_3' => array( 'type' => 'int', 'constraint' => 4, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'waktu_penawaran_dt_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lain_lain_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lain_lain_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lain_lain_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lain_lain_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'total_0' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'total_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'total_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'total_op' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_nilai_properti' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_nilai_properti_permeter' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_pasar_bangunan_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_pasar_properti' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'depresiasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_likuidasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pembulatan_nilai_pasar_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pembulatan_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pembulatan_nilai_likuidasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_nilai_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bobot_rekonsiliasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'indikasi_nilai_pasar_tanah_permeter' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_pasar_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_data_banding", TRUE);
$this->dbforge->create_table("txn_data_banding"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_pekerjaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'type' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'filename' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_draft_laporan"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_evaluasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ruang_lingkup' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bidang_penugasan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_orang' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jangka_waktu' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_pembayaran' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'project_manager' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'resiko' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'harga' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_evaluasi_1"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_evaluasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'catatan_lembar_kendali' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kriteria_keberhasilan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_pembayaran' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'project_manager' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kriteria_lain' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_evaluasi_2"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_evaluasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'catatan_teknis' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'catatan_sdm' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_evaluasi_3"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_group' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_menu' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_group_menu"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_pekerjaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nomor_laporan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_laporan' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_pemberi_tugas' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alamat_pemberi_tugas' => array( 'type' => 'varchar', 'constraint' => 300, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'provinsi_pemberi_tugas' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kota_pemberi_tugas' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kodepos_pemberi_tugas' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'npwp_pemberi_tugas' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'go_publik' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status_kepemilikan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bidang_usaha' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bidang_usaha_lainnya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_penilaian' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pengguna_laporan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pengguna_laporan_lainnya' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tujuan_penilaian' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pendekatan_penilaian' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pendekatan_penilaian_lainnya' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'metode_penilaian' => array( 'type' => 'varchar', 'constraint' => 200, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_yang_dihasilkan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_lainnya' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_jasa' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'imbalan_jasa_fee' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penanda_tangan_laporan_penilaian' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kesimpulan' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ditandatangani_oleh' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'is_from_excel' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created_by' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_history_pekerjaan"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nomor_laporan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_laporan' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_pemberi_tugas' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alamat_pemberi_tugas' => array( 'type' => 'varchar', 'constraint' => 300, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'provinsi_pemberi_tugas' => array( 'type' => 'varchar', 'constraint' => 20, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kota_pemberi_tugas' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kodepos_pemberi_tugas' => array( 'type' => 'int', 'constraint' => 5, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'npwp_pemberi_tugas' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'go_publik' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status_kepemilikan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bidang_usaha' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bidang_usaha_lainnya' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_penilaian' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pengguna_laporan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pengguna_laporan_lainnya' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tujuan_penilaian' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pendekatan_penilaian' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pendekatan_penilaian_lainnya' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'metode_penilaian' => array( 'type' => 'varchar', 'constraint' => 200, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_yang_dihasilkan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_lainnya' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kesimpulan_nilai' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_jasa' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'imbalan_jasa_fee' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penanda_tangan_laporan_penilaian' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dilakukan_oleh' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created_by' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_import_kertas_kerja"); 
 
$this->dbforge->add_field(array(
	'id_kertas_kerja' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_mappi_penandatangan_laporan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_ijinpp_penandatangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penandatangan_laporan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kode_jenis_jasa' => array( 'type' => 'char', 'constraint' => 2, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_mappi_penilai' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_penilai' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_mappi_surveyor' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_surveyor' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_inspeksi_penilaian' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_laporan' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nomor_laporan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'obyek_penilaian' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kegunaan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_klien' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'klien' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'telepon_klien' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status_objek' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'yang_dijumpai' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'selaku' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'obyek_ditempati_oleh' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penggunaan_obyek' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'debitur' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_cabang' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_staff' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jabatan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nomor_penugasan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_penugasan' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tujuan_penilaian' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_apartment' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_tower' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'letak_lantai_objek' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nomor_ruang' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alamat_properti' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'provinsi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dh_provinsi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kotakab' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dh_kotakab' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kecamatan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dh_kecamatan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kelurahan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'dh_kelurahan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_gedung' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'blok' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lantai' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nomor' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'marketibility' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'attachment_kertas_kerja' => array( 'type' => 'mediumtext', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_kertas_kerja", TRUE);
$this->dbforge->create_table("txn_kertas_kerja"); 
 
$this->dbforge->add_field(array(
	'id_lampiran' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kertas_kerja' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_lampiran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lampiran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'no_urut' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_lampiran", TRUE);
$this->dbforge->create_table("txn_lampiran"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lembar_kendali' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_1a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_1b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_2a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_2b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_3a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_3b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_4a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_4b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_5a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_5b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_6a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_6b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_7a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_7b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_8a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_8b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_9a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_9b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_10a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_10b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_11a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_11b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_12a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_12b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_13a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_13b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_14a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_14b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_15a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_15b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_16a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_16b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_17a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_17b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_18' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_19' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_20' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_lembar_kendali_1"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lembar_kendali' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ruang_lingkup' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bidang_penugasan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_orang' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jangka_waktu' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_pembayaran_1' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_pembayaran_2' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_pembayaran_3' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_pembayaran_4' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_pembayaran_5' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_komentar_5' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_komentar_4' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_komentar_3' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_komentar_2' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'termin_komentar_1' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'project_manager' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'resiko' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'resiko_keterangan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'harga' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_lembar_kendali_2"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lembar_kendali' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_1a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_1b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_2a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_2b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_3a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_3b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_4a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_4b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_5a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_5b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_6a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_6b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_7a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_7b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_8a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_8b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_9a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_9b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_10a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_10b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_11a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_11b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_lembar_kendali_3"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lembar_kendali' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_1a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_1b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_2a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_2b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_3a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_3b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_4a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_4b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_5a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_5b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_6a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_6b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_7a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_7b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_8a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_8b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_9a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_9b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_lembar_kendali_4"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lembar_kendali' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_1a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_1b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_2a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_2b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_3a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_3b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_4a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_4b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_5a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_5b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_6a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_6b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_7a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_7b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_8a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_8b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_9a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_9b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_10a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_10b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_11a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_11b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_12a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_12b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_13a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_13b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_14a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_14b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_15a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_15b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_16a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_16b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_17a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_17b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_18a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_18b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_19a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_19b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_20a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_20b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_21a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_21b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_22a' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab_22b' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_lembar_kendali_5"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_field' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jawab' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_lokasi_data"); 
 
$this->dbforge->add_field(array(
	'id_obyek' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nomor_laporan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_obyek' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alamat' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'provinsi' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kota' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_satuan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'total_nilai' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'klasifikasi_jenis_jasa' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'klasifikasi_jenis_jasa_lainnya' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'data_pembanding' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created_by' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_obyek", TRUE);
$this->dbforge->create_table("txn_obyek"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_pekerjaan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_status' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'do' => array( 'type' => 'bit', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'hasil' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keterangan' => array( 'type' => 'varchar', 'constraint' => 250, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_pekerjaan_status"); 
 
$this->dbforge->add_field(array(
	'id_pembanding' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nomor_laporan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nama_obyek' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tipe_properti' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_bangunan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alamat' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'provinsi' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kota' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'transaksi_penawaran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'harga' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_data' => array( 'type' => 'varchar', 'constraint' => 6, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumber_data' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'merk' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'produsen' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_pembuatan' => array( 'type' => 'varchar', 'constraint' => 6, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created_by' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_pembanding", TRUE);
$this->dbforge->create_table("txn_pembanding"); 
 
$this->dbforge->add_field(array(
	'id_ruangan_lantai' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kertas_kerja' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_bangunan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bangunan_role' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'koordinat_x' => array( 'type' => 'int', 'constraint' => 5, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'koordinat_y' => array( 'type' => 'int', 'constraint' => 5, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas' => array( 'type' => 'float', 'constraint' => 11,0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_ruangan_lantai", TRUE);
$this->dbforge->create_table("txn_ruang_lantai"); 
 
$this->dbforge->add_field(array(
	'id_sarana_pelengkap' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kertas_kerja' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'daya_listrik_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'daya_listrik_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'daya_listrik_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'daya_listrik_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'daya_listrik_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'telkom_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'telkom_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'telkom_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'telkom_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'telkom_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pdam_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pdam_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pdam_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pdam_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pdam_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pdam_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumur_bor_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumur_bor_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumur_bor_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumur_bor_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumur_bor_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumur_dalam_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumur_dalam_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumur_dalam_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumur_dalam_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumur_dalam_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ac_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ac_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ac_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ac_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ac_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ac_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemanas_air_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemanas_air_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemanas_air_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemanas_air_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemanas_air_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemanas_air_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penangkal_petir_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penangkal_petir_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penangkal_petir_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penangkal_petir_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penangkal_petir_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penangkal_petir_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'water_toren_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'water_toren_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'water_toren_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'water_toren_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'water_toren_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'water_toren_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kolam_renang_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kolam_renang_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kolam_renang_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kolam_renang_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kolam_renang_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kolam_renang_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambahan_nama' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambahan_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambahan_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambahan_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambahan_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambahan_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tambahan_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport2_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport2_terpotong_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport2_terpotong_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport2_terpotong_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport2_terpotong_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'carport2_terpotong_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan2_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan2_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan2_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan2_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan2_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkerasan2_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar2_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar2_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar2_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar2_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar2_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pintu_pagar2_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman2_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman2_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman2_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman2_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman2_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pagar_halaman2_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura2_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura2_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura2_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura2_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura2_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gapura2_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman2_keterangan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman2_ukuran' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman2_biaya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman2_brb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman2_dep' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman2_nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_pasar' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'brb_rcn' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_likuidasi' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'disc' => array( 'type' => 'varchar', 'constraint' => 20, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'catatan_penilai' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_sarana_pelengkap", TRUE);
$this->dbforge->create_table("txn_sarana_pelengkap"); 
 
$this->dbforge->add_field(array(
	'id_tanah' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_kertas_kerja' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'foto' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'status_obyek' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'obyek_dihuni_oleh' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penggunaan_obyek' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perusahaan_pengembang' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tahun_dibangun' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keadaan_lingkungan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penghijauan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemeliharaan_bangunan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_batas_1' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'batas_properti_1' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_batas_2' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'batas_properti_2' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_batas_3' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'batas_properti_3' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_batas_4' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'batas_properti_4' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_pusat_perbelanjaan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'harga_unit_kios' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'harga_apartment' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_apartment' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kepadatan_hunian' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pertumbuhan_hunian' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'mayoritas_data_hunian' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_tanah' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_perkantoran' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'harga_unit_ruang_kantor' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'harga_tanah_obyek' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kepadatan_bangunan' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pertumbuhan_bangunan' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kemudahan_mencapai_lokasi' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kemudahan_belanja' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kemudahan_rekreasi' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kemudahan_angkutan_umum' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kemudahan_sarana_pendidikan' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keamanan_terhadap_kejahatan' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keamanan_terhadap_kebakaran' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'keamanan_terhadap_bencana' => array( 'type' => 'varchar', 'constraint' => 30, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kepemilkan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penyewaan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'instansi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'kosong' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'genset' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jaringan_wifi' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lobby_utama' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'swimming_pool' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jogging_track' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fitness_center' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sport_center' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'play_ground' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'medical_center' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'mini_market' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'restaurant' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'music_lounge' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'atm_banking' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'shoping_center' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bookstore' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'laundry_room' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'secure_parking' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ac_control' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'food_court' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'gallery_atm' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sarana_ibadah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lift_penumpang' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lift_barang' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasilitas_parkir' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'cctv' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'permukiman' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'industri' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pertokoan' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perkantoran' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'taman' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanah_kosong' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perubahan_lingkungan' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'data_hunian' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'perubahan_lingkungan_lainya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'data_hunian_lainya' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_jalan_depan' => array( 'type' => 'decimal', 'constraint' => 5,2, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lebar_jalan_sekitar' => array( 'type' => 'decimal', 'constraint' => 5,2, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_jalan_depan' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'drainase' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'trotoar' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lampu_jalan' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jaringan_listrik' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jaringan_telepon' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jaringan_air_bersih' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jaringan_gas' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'pemakaman_umum' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'penampungan_sampah' => array( 'type' => 'int', 'constraint' => 1, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'fasum_lain' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ukuran_panjang' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'menghadap_ke' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ukuran_lebar' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'lokasi_bidang_tanah' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'excalator' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tangga_darurat' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'hydrant' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'alarm_system' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'topografi' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jenis_tanah' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tata_lingkungan' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'resiko_banjir' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'posisi_tanah' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tinggi_tanah' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'ruang_areal_sutet' => array( 'type' => 'varchar', 'constraint' => 60, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jarak_obyek_terhadap_sutet' => array( 'type' => 'varchar', 'constraint' => 100, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'peruntukan_kawasan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nomor_imb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_dikeluarkan_imb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_imb' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'sumber_nomor_sertifikat' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah_pada_sertifikat' => array( 'type' => 'float', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah_terpotong' => array( 'type' => 'float', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanggal_njop' => array( 'type' => 'date', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'bangunan_permeter' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tanah_permeter' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas_tanah' => array( 'type' => 'decimal', 'constraint' => 18,0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'luas' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_pasar' => array( 'type' => 'decimal', 'constraint' => 18,0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'nilai_likuidasi' => array( 'type' => 'decimal', 'constraint' => 18,0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'disc' => array( 'type' => 'varchar', 'constraint' => 20, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'catatan_penilai' => array( 'type' => 'text', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tanah", TRUE);
$this->dbforge->create_table("txn_tanah"); 
 
$this->dbforge->add_field(array(
	'id_tenagakerja' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'nomor_laporan' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'tenaga_kerja' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jabatan' => array( 'type' => 'varchar', 'constraint' => 255, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'jumlah_jam' => array( 'type' => 'varchar', 'constraint' => 10, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created_by' => array( 'type' => 'varchar', 'constraint' => 50, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id_tenagakerja", TRUE);
$this->dbforge->create_table("txn_tenagakerja"); 
 
$this->dbforge->add_field(array(
	'id' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => TRUE ),
	'id_lokasi' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'id_user' => array( 'type' => 'int', 'constraint' => 11, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'created' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
	'updated' => array( 'type' => 'time', 'constraint' => 0, 'unsigned' => FALSE, 'auto_increment' => FALSE ),
)); 
$this->dbforge->add_key("id", TRUE);
$this->dbforge->create_table("txn_tugas"); 
 
$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_berita` AS select `ma`.`id` AS `id`,`ma`.`judul` AS `judul`,`ma`.`thumbnail` AS `thumbnail`,`ma`.`content` AS `content`,`ma`.`slug` AS `slug`,`ma`.`id_kategori` AS `id_kategori`,`mk`.`nama` AS `nama_kategori`,`mk`.`slug` AS `slug_kategori`,`ma`.`id_user` AS `id_user`,`mu`.`nama` AS `nama_user`,`ma`.`status` AS `status`,`ma`.`created` AS `created`,`ma`.`updated` AS `updated` from ((`mst_berita` `ma` join `mst_kategori` `mk` on((`ma`.`id_kategori` = `mk`.`id`))) join `mst_user` `mu` on((`ma`.`id_user` = `mu`.`id`)))');

$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dokumen` AS select `md`.`id` AS `id`,`md`.`nama` AS `nama`,`md`.`created` AS `created`,`md`.`updated` AS `updated` from `mst_dokumen_master` `md`');

$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_evaluasi` AS select `me`.`id` AS `id`,`me`.`id_pekerjaan` AS `id_pekerjaan`,`me`.`tipe` AS `tipe`,`me`.`id_status` AS `id_status`,`me`.`id_user` AS `id_user`,`mu`.`nama` AS `nama_user`,`mg`.`nama` AS `nama_group`,`me`.`created` AS `created`,`me`.`updated` AS `updated` from (((`mst_evaluasi` `me` join `mst_user` `mu` on((`me`.`id_user` = `mu`.`id`))) join `mst_group` `mg` on((`mu`.`id_group` = `mg`.`id`))) join `mst_user` `mpm` on((`me`.`id_user` = `mpm`.`id`)))');

$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_klien` AS select `mk`.`id` AS `id`,`mk`.`nama` AS `nama`,`mk`.`alamat` AS `alamat`,`mk`.`id_provinsi` AS `id_provinsi`,`mp`.`nama` AS `provinsi`,`mk`.`id_kota` AS `id_kota`,`mko`.`nama` AS `kota`,`mk`.`telepon` AS `telepon`,`mk`.`fax` AS `fax`,`mk`.`no_kontak` AS `no_kontak`,`mk`.`nama_kontak` AS `nama_kontak`,`mk`.`id_debitur` AS `id_debitur`,`md`.`nama` AS `debitur`,`mk`.`catatan` AS `catatan`,`mk`.`created` AS `created`,`mk`.`updated` AS `updated`,`mk`.`email` AS `email`,`mk`.`npwp` AS `npwp`,`mk`.`website` AS `website`,`mk`.`emailpribadi` AS `emailpribadi` from (((`mst_klien` `mk` left join `mst_provinsi` `mp` on((`mk`.`id_provinsi` = `mp`.`id`))) left join `mst_kota` `mko` on((`mk`.`id_kota` = `mko`.`id`))) left join `mst_debitur` `md` on((`mk`.`id_debitur` = `md`.`id`)))');

$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_lembar_kendali` AS select `mlk`.`id` AS `id`,`mlk`.`id_pekerjaan` AS `id_pekerjaan`,`mlk`.`id_status` AS `id_status`,`mlk`.`step` AS `step`,`mg`.`nama` AS `nama_group`,`mlk`.`id_user` AS `id_user`,`mu`.`nama` AS `nama_user`,`mlk`.`created` AS `created`,`mlk`.`updated` AS `updated`,`mu`.`jabatan` AS `jabatan` from ((`mst_lembar_kendali` `mlk` join `mst_user` `mu` on((`mlk`.`id_user` = `mu`.`id`))) join `mst_group` `mg` on((`mu`.`id_group` = `mg`.`id`)))');

$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_list_dokumen` AS select `a`.`id` AS `id`,`a`.`nama` AS `nama_pekerjaan`,`b`.`nama` AS `nama_klien`,`d`.`jenis_sertifikat` AS `jenis_sertifikat`,`d`.`dokumen` AS `file_sertifikat`,`f`.`nama` AS `nama_dokumen_master`,`e`.`file` AS `file_dokumen_gabung` from (((((`mst_pekerjaan` `a` left join `mst_klien` `b` on((`b`.`id` = `a`.`id_klien`))) left join `mst_lokasi` `c` on((`c`.`id_pekerjaan` = `a`.`id`))) left join `r_data_legalitas` `d` on((`d`.`id_lokasi` = `c`.`id`))) left join `mst_dokumen_gabung` `e` on((`e`.`id_pekerjaan` = `a`.`id`))) left join `mst_dokumen_master` `f` on((`f`.`id` = `e`.`id_dokumen_master`))) where (`c`.`id_pekerjaan` = `a`.`id`) order by `a`.`id`');

$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_list_laporan` AS select `mst_pekerjaan`.`id` AS `id_pekerjaan`,`mst_lokasi`.`id` AS `id_lokasi`,`mst_klien`.`id` AS `id_klien`,`txn_kertas_kerja`.`id_kertas_kerja` AS `id_kertas_kerja`,`mst_klien`.`nama` AS `nama_klien`,`mst_pekerjaan`.`nama` AS `nama_pekerjaan`,`mst_pekerjaan`.`jenis_laporan` AS `jenis_laporan` from (((`mst_pekerjaan` join `mst_klien` on((`mst_klien`.`id` = `mst_pekerjaan`.`id_klien`))) join `mst_lokasi` on((`mst_lokasi`.`id_pekerjaan` = `mst_pekerjaan`.`id`))) join `txn_kertas_kerja` on(((`txn_kertas_kerja`.`id_lokasi` = `mst_lokasi`.`id`) and (`txn_kertas_kerja`.`id_lokasi` = `mst_lokasi`.`id`))))');

$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_lokasi` AS select `ml`.`id` AS `id`,`ml`.`id_pekerjaan` AS `id_pekerjaan`,`ml`.`id_jenis_objek` AS `id_jenis_objek`,`mj`.`nama` AS `nama_jenis_objek`,`ml`.`kode` AS `kode`,`ml`.`alamat` AS `alamat`,`ml`.`gang` AS `gang`,`ml`.`nomor` AS `nomor`,`ml`.`rt` AS `rt`,`ml`.`rw` AS `rw`,`ml`.`id_provinsi` AS `id_provinsi`,`mp`.`nama` AS `nama_provinsi`,`ml`.`id_kota` AS `id_kota`,`mk`.`nama` AS `nama_kota`,`ml`.`id_kecamatan` AS `id_kecamatan`,`mkec`.`nama` AS `nama_kecamatan`,`ml`.`id_desa` AS `id_desa`,`md`.`nama` AS `nama_desa`,`ml`.`tanggal` AS `tanggal`,`ml`.`jam` AS `jam`,`ml`.`dh_provinsi` AS `dh_provinsi`,`ml`.`dh_kota` AS `dh_kota`,`ml`.`dh_kecamatan` AS `dh_kecamatan`,`ml`.`dh_desa` AS `dh_desa`,`ml`.`id_transportasi` AS `id_transportasi`,`mt`.`nama` AS `nama_transportasi`,`ml`.`id_user` AS `id_user`,`mu`.`nama` AS `nama_user`,`ml`.`pengembangan` AS `pengembangan`,`ml`.`pemegang_hak` AS `pemegang_hak`,`ml`.`kepemilikan` AS `kepemilikan`,`ml`.`jenis_sertifikat` AS `jenis_sertifikat`,`ml`.`no_sertifikat` AS `no_sertifikat`,`ml`.`luas_tanah` AS `luas_tanah`,`ml`.`luas_bangunan` AS `luas_bangunan`,`ml`.`tanggal_mulai` AS `tanggal_mulai`,`ml`.`tanggal_selesai` AS `tanggal_selesai`,`ml`.`biaya` AS `biaya`,`ml`.`tanggal_survey` AS `tanggal_survey`,`ml`.`tanggal_laporan` AS `tanggal_laporan`,`ml`.`custom_data` AS `custom_data`,`ml`.`latitude` AS `latitude`,`ml`.`longitude` AS `longitude`,`ml`.`created` AS `created`,`ml`.`updated` AS `updated` from (((((((`mst_lokasi` `ml` left join `mst_jenis_objek` `mj` on((`ml`.`id_jenis_objek` = `mj`.`id`))) left join `mst_provinsi` `mp` on((`ml`.`id_provinsi` = `mp`.`id`))) left join `mst_kota` `mk` on((`ml`.`id_kota` = `mk`.`id`))) left join `mst_kecamatan` `mkec` on((`ml`.`id_kecamatan` = `mkec`.`id`))) left join `mst_desa` `md` on((`ml`.`id_desa` = `md`.`id`))) left join `mst_transportasi_survey` `mt` on((`ml`.`id_transportasi` = `mt`.`id`))) left join `mst_user` `mu` on((`ml`.`id_user` = `mu`.`id`)))');

$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_menu` AS select `mg`.`id` AS `id_group`,`mg`.`nama` AS `nama_group`,`mm`.`id` AS `id_menu`,`mm`.`nama` AS `nama`,`mm`.`label` AS `label`,`mm`.`link` AS `link`,`mm`.`controller` AS `controller`,`mm`.`method` AS `method`,`mm`.`show` AS `show`,`mm`.`public` AS `public`,`mm`.`icon` AS `icon`,`mm`.`id_parent` AS `id_parent`,`mm`.`level` AS `level`,`mm`.`order` AS `order`,`mm`.`keterangan` AS `keterangan`,`mm`.`created` AS `created`,`mm`.`updated` AS `updated` from ((`txn_group_menu` `tgm` join `mst_group` `mg` on((`tgm`.`id_group` = `mg`.`id`))) join `mst_menu` `mm` on((`tgm`.`id_menu` = `mm`.`id`)))');

$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pekerjaan` AS select `mp`.`id` AS `id`,`mp`.`id_klien` AS `id_klien`,`mk`.`nama` AS `nama_klien`,`mp`.`nama` AS `nama`,`mp`.`tanggal_penerimaan` AS `tanggal_penerimaan`,`mp`.`deskripsi` AS `deskripsi`,`mp`.`jenis_laporan` AS `jenis_laporan`,`mp`.`keterangan` AS `keterangan`,`mp`.`unix` AS `unix`,`mp`.`status` AS `status`,`tps`.`id` AS `id_txn_status`,`tps`.`id_status` AS `id_status`,`ms`.`id_group` AS `id_group`,`mg`.`nama` AS `nama_group`,`ms`.`group_pekerjaan` AS `nama_status`,`ms`.`module` AS `sub_status`,`ms`.`step` AS `step`,`tps`.`do` AS `do`,`tps`.`hasil` AS `hasil_status`,`tps`.`keterangan` AS `keterangan_status`,`tps`.`id_user` AS `id_user`,`mu`.`nama` AS `nama_user`,`mp`.`penilai` AS `penilai`,`mpn`.`nama` AS `nama_penilai`,`mp`.`reviewer` AS `reviewer`,`mr`.`nama` AS `nama_reviewer`,`mp`.`created` AS `created`,`mp`.`updated` AS `updated`,`mp`.`no_surat_tugas` AS `no_surat_tugas`,`mp`.`surat_tugas_final` AS `surat_tugas_final` from (((((((`mst_pekerjaan` `mp` join `mst_klien` `mk` on((`mp`.`id_klien` = `mk`.`id`))) left join `txn_pekerjaan_status` `tps` on((`mp`.`id` = `tps`.`id_pekerjaan`))) left join `mst_status` `ms` on((`ms`.`id` = `tps`.`id_status`))) left join `mst_group` `mg` on((`mg`.`id` = `ms`.`id_group`))) left join `mst_user` `mu` on((`mu`.`id` = `tps`.`id_user`))) left join `mst_user` `mpn` on((`mpn`.`id` = `mp`.`penilai`))) left join `mst_user` `mr` on((`mr`.`id` = `mp`.`reviewer`))) where ((`mp`.`status` = 1) and (`tps`.`created` = (select max(`b`.`created`) from `txn_pekerjaan_status` `b` where (`mp`.`id` = `b`.`id_pekerjaan`))))');

$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_slug` AS select `ma`.`id` AS `id`,'berita' AS `type`,`ma`.`slug` AS `slug` from `mst_berita` `ma` union all select `mk`.`id` AS `id`,'kategori' AS `type`,`mk`.`slug` AS `slug` from `mst_kategori` `mk`');

$this->db->query('CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user` AS select `mu`.`id` AS `id`,`mu`.`id_group` AS `id_group`,`mg`.`nama` AS `nama_group`,`mu`.`email` AS `email`,`mu`.`password` AS `password`,`mu`.`auth` AS `auth`,`mu`.`nama` AS `nama`,`mu`.`telepon` AS `telepon`,`mu`.`alamat` AS `alamat`,`mu`.`avatar` AS `avatar`,`mu`.`status` AS `status`,`mu`.`created` AS `created`,`mu`.`updated` AS `updated`,`mu`.`jabatan` AS `jabatan` from (`mst_user` `mu` join `mst_group` `mg` on((`mu`.`id_group` = `mg`.`id`)))');

	}
	public function down() {
	}
}