<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class terbilang 
{
	function __construct() 
	{
		$this->_ci =& get_instance();
		
	}
	
	function terbilang($x){
            $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
            if ($x < 12)
            return " " . $abil[$x];
            elseif ($x < 20)
            return $this->terbilang($x - 10) . "Belas";
            elseif ($x < 100)
            return $this->terbilang($x / 10) . " Puluh" . $this->terbilang($x % 10);
            elseif ($x < 200)
            return " Seratus" . $this->terbilang($x - 100);
            elseif ($x < 1000)
            return $this->terbilang($x / 100) . " Ratus" . $this->terbilang($x % 100);
            elseif ($x < 2000)
            return " Seribu" . $this->terbilang($x - 1000);
            elseif ($x < 1000000)
            return $this->terbilang($x / 1000) . " Ribu" . $this->terbilang($x % 1000);
            elseif ($x < 1000000000)
            return $this->terbilang($x / 1000000) . " Juta" . $this->terbilang($x % 1000000);
        }
}