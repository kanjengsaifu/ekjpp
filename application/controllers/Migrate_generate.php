<?php

Class Migrate_generate Extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $s  = $this->generate();
        $data = $this->controller_migrate($s);
        $this->save_file($data);
    }

    private function save_file($data){
        $file_name = $this->fcpath()."application/migrations/001_All.php";
        file_put_contents($file_name, $data);
    }

    private function controller_migrate($s){
        $c = "<?php defined('BASEPATH') OR exit('No direct script access allowed');\n".
        "class Migration_All extends CI_Migration{\n".
        "\tpublic function up() {\n".
        $s.
        "\t}\n".
        "\tpublic function down() {\n".
        "\t}\n".
        "}";
        return $c;
    }

    private function generate(){
        $query = $this->db->query("show tables");
        $result = $query->result();
        $s = "";
        $i = 0;
        foreach ($result as $value) {
            // if ($i > 3) continue;
            foreach ($value as $table) {
                //if view skip
                if (substr($table,0,5)=="view_" || substr($table,0,1)=="v_"){

                    $query = $this->db->query("SHOW CREATE VIEW ".$table);
                    $rTable = $query->result();
                    foreach (  $rTable[0] as $k => $val) {
                        if ($k == "Create View") {
                            $s .= "\$this->db->query('".$val."');\n\n";
                        }
                    }
                    continue;
                }

                $query = $this->db->query("describe ".$table);
                $rTable = $query->result();
                $key_field = "";
                // var_dump($rTable); echo "\n\n";

                $s .= "\$this->dbforge->add_field(array(\n";
                foreach ($rTable as $d) {
                    $Field = $d->Field;
                    $Type = $d->Type;
                    $Null = $d->Null;
                    $Key = $d->Key;
                    $Default = $d->Default;
                    $Extra = $d->Extra;
                    $IsUnsigned = preg_match("/unsigned/i", $Type) ? "TRUE" : "FALSE";
                    preg_match('#\((.*?)\)#', $Type, $match);
                    $constraint = count($match) == 0 ? 0 : $match[1];
                    $IsAutoIncrement = $Extra=="auto_increment" ? "TRUE" : "FALSE";
                    $dataType = $this->detectType($Type);

                    if ($Key=="PRI"){
                        $key_field = $Field;
                    }

                    $s .= "\t'".$Field."' => array( 'type' => '".$dataType."', 'constraint' => ".$constraint.", 'unsigned' => ".$IsUnsigned.", 'auto_increment' => ".$IsAutoIncrement." ),\n";
                    // \"blog_title\" => array( \"type\" => \"VARCHAR\", \"constraint\" =>\ \"100\" ),
                    // \"blog_description\" => array( \"type\" => \"TEXT\", \"null\" => TRUE )
                    
                }
                $s .= ")); \n";

                if ($key_field){
                    $s .= "\$this->dbforge->add_key(\"".$key_field."\", TRUE);\n";
                }
                
                $s .= "\$this->dbforge->create_table(\"".$table."\"); \n \n";
            }
            $i++;
        }
        return $s;
    }

    private function is_key(){

    }

    private function detectType($string){
        $types = array("tinyint",  "smallint",  "mediumint",  "int",  "bigint",  "decimal",  "float",  "double",  "date",  "datetime",  "timestamp",  "time",  "year",  "char",  "varchar",  "tinytext",  "text",  "mediumtext",  "longtext",  "enum",  "set",  "bit",  "binary",  "varbinary",  "tinyblob",  "blob",  "mediumblob",  "longblob",  "geometry",  "point",  "linestring",  "polygon",  "multipoint",  "multilinestring",  "multipolygon",  "geometrycollection");

        $type = "";
        foreach ($types as $value) {
            // var_dump(strpos($string, $value));
            if (false!==strpos($string, $value)){
                $type = $value;
            }
        }
        return $type;
    }

    private function fcpath() {
        $FCPATH = FCPATH;
        $newpath = preg_replace("/\\\\/", "/", $FCPATH);
        return $newpath;
    }
}