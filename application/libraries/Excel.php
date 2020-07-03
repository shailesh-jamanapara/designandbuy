<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
require_once Excel_reader.php;
 
class Excel extends Excel_reader {
    public function __construct() {
        parent::__construct();
    }
}