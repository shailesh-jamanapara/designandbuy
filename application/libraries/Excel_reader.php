<?php

/**
 * Excel reader class
 * 
 * PHP class for reading an Excel spreadsheet document.
 *
 * @author James Gifford
 * @copyright Copyright (c) 2006, James Gifford
 * @link http://jamesgifford.com My Website
 * @link sc.openoffice.org/excelfileformat.pdf Excel format documentation 
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @category Spredsheets
 * @version 0.1.2
 * @filesource
 * @todo Too many things to list at this time
 */
 include_once('PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');
class Excel_reader 
{
	public $reader;
    public $filepath;
    public $Column_Names;
   function __construct(){
        $this->Column_Names['A']=1;
        $this->Column_Names['B']=2;
        $this->Column_Names['C']=3;
        $this->Column_Names['D']=4;
        $this->Column_Names['E']=5;
        $this->Column_Names['F']=6;
        $this->Column_Names['G']=7;
        $this->Column_Names['H']=8;
        $this->Column_Names['I']=9;
        $this->Column_Names['J']=10;
        $this->Column_Names['K']=11;
        $this->Column_Names['L']=12;
        $this->Column_Names['M']=13;
        $this->Column_Names['N']=14;
        $this->Column_Names['O']=15;
        $this->Column_Names['P']=16;
        $this->Column_Names['Q']=17;
        $this->Column_Names['R']=18;
        $this->Column_Names['S']=19;
        $this->Column_Names['T']=20;
        $this->Column_Names['U']=21;
        $this->Column_Names['V']=22;
        $this->Column_Names['W']=23;
        $this->Column_Names['X']=24;
        $this->Column_Names['Y']=25;
        $this->Column_Names['Z']=26;
    }
   function load(){
	  return PHPExcel_IOFactory::load($this->filepath);
	 
   }
   
}