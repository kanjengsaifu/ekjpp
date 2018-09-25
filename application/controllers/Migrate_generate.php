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
                if ("migrations"==$table) continue;
                //if view skip
                if (substr($table,0,5)=="view_" || substr($table,0,1)=="v_"){

                    $query = $this->db->query("SHOW CREATE VIEW ".$table);
                    $rTable = $query->result();
                    foreach (  $rTable[0] as $k => $val) {
                        if ($k == "Create View") {
                            $s .= "\$this->db->query(\"".$val."\");\n\n";
                        }
                    }
                    continue;
                }

                $query = $this->db->query("describe ".$table);
                $rTable = $query->result();
                $key_field = "";
                // var_dump($rTable); echo "\n\n";

                $i = 0;
                $s .= "\$this->dbforge->add_field(array(";
                foreach ($rTable as $d) {
                    $Field = $d->Field;
                    $Type = $d->Type;
                    $Null = $d->Null;
                    $Key = $d->Key;
                    $Default = $d->Default;
                    $Extra = $d->Extra;
                    $IsUnsigned = preg_match("/unsigned/i", $Type) ? TRUE : FALSE;
                    preg_match('#\((.*?)\)#', $Type, $match);
                    $constraint = count($match) == 0 ? 0 : (int)$match[1];
                    $IsAutoIncrement = $Extra=="auto_increment" ? TRUE : FALSE;
                    $dataType = $this->detectType($Type);

                    if ($Key=="PRI"){
                        $key_field = $Field;
                    }

                    if ($dataType=="enum"){
                        $dataType = $Type;
                        $constraint = "";
                    }

                    $arr_stuc = array();
                    $arr_stuc["type"] = $dataType;
                    $arr_stuc["constraint"] = $constraint;
                    $arr_stuc["unsigned"] = $IsUnsigned;
                    $arr_stuc["auto_increment"] = $IsAutoIncrement;

                    $a2s = $this->array_to_str($arr_stuc);

                    $s .= $i>0 ? ",":"";
                    $s .= "\n\t\"".$Field."\" => ".$a2s;
                    //array( 'type' => '".$dataType."', 'constraint' => ".$constraint.", 'unsigned' => ".$IsUnsigned.", 'auto_increment' => ".$IsAutoIncrement." ),\n";
                    // \"blog_title\" => array( \"type\" => \"VARCHAR\", \"constraint\" =>\ \"100\" ),
                    // \"blog_description\" => array( \"type\" => \"TEXT\", \"null\" => TRUE )
                    $i++;
                }
                $s .= "\n));\n";

                if ($key_field){
                    $s .= "\$this->dbforge->add_key(\"".$key_field."\", TRUE);\n";
                }
                
                $s .= "\$this->dbforge->create_table(\"".$table."\");\n\n";
            }
            $i++;
        }
        return $s;
    }

    private function enum_opt($file){
        // $file = "enum('F','T')";
        preg_match('/\((.*?)\)/', $file, $match);
        $enum_opt = $match[1];
        return $enum_opt;
    }

    private function is_key(){

    }

    private function array_to_str($array){
        $r = "array(\n";
        $i = 0;
        foreach ($array as $key => $value) {
            if (is_bool($value)){
                $vals = ($value===TRUE) ? "TRUE" : "FALSE" ;
            }elseif (is_numeric($value)){
                $vals = (int)$value ;
            }else{
                $vals = '"'.$value.'"' ;
            }

            $r .= $i>0 ? ",\n" : "";
            $r .= "\t\t\"".$key."\" => ".$vals."";
            $i++;
        }
        $r .= "\n\t)";
        return $r;
    }

    private function detectType($string){
        $types = array("tinyint",  "smallint",  "mediumint",  "int",  "bigint",  "decimal",  "float",  "double",  "date",  "datetime",  "timestamp",  "time",  "year",  "char",  "varchar",  "tinytext",  "text",  "mediumtext",  "longtext",  "enum",  "set",  "bit",  "binary",  "varbinary",  "tinyblob",  "blob",  "mediumblob",  "longblob",  "geometry",  "point",  "linestring",  "polygon",  "multipoint",  "multilinestring",  "multipolygon",  "geometrycollection");

        $type = "";
        foreach ($types as $value) {
            // var_dump(strpos($string, $value));
            if (substr($string,0,strlen($value))==$value){
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