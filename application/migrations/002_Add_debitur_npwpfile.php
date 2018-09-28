<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_debitur_npwpfile extends CI_Migration {

    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        // $this->dbforge->add_field(); 

        $this->dbforge->add_column("mst_debitur", array(
            'npwp_file' => array( 'type' => 'varchar', 'constraint' => 255, 'after' => 'npwp' ),
        ));
    }

    public function down() {
        $this->dbforge->drop_column('mst_debitur', 'npwp_file');
    }
}