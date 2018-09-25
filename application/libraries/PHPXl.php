<?php if (!defined('BASEPATH')) exit ('No direct script aceess allowed');

class PHPXl
{
	function __construct(){
		require_once APPPATH. '/libraries/PHPXl/PHPExcel.php';
		require_once APPPATH. '/libraries/PHPXl/PHPExcel/IOFactory.php';
	}


}