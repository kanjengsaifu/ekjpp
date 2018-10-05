<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_All extends CI_Migration{
	public function up() {
        exec("mysql -u ".$this->db->username." -h ".$this->db->hostname." -p".$this->db->password." ".$this->db->database." < asus.sql");

	}
	public function down() {
	}
}