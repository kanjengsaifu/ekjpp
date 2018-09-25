<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/html2pdf/html2pdf.class.php';

class Pdf extends HTML2PDF
{	
    function __construct()
    {
        parent::__construct();
    }
}