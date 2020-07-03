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
include_once('PHPExcel-1.8/Classes/PHPExcel.php');
class Excel_writer 
{

   function __construct(){
	  
   }
   function load($fname, $data = array()){
			if(empty($data)){
				return false;
			}
			//echo "<pre>";
			//print_r($data);
			//echo "</pre>";
			//exit;
			$objPHPExcel = new PHPExcel();

			// Set document properties
			$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
						 ->setLastModifiedBy("Maarten Balliauw")
						 ->setTitle("Office 2007 XLSX Test Document")
						 ->setSubject("Office 2007 XLSX Test Document")
						 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
						 ->setKeywords("office 2007 openxml php")
						 ->setCategory("Test result file");


			// Add some data
			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Serial No.')
			->setCellValue('B1', 'Student Name')
			->setCellValue('C1', 'Standard')
			->setCellValue('D1', 'Division')
			->setCellValue('E1', 'House')
			->setCellValue('F1', 'Mobile No.')
			->setCellValue('G1', 'Link ');
			$sr_no = 1;
			$i = 2;
			foreach($data as $arr){
				$sms_link = 'http://35.154.29.3/wbs/index.php/Schools/ontimelinkforstudentparent?q='.$arr['token'];
				$house = (isset($arr['house_id']) && $arr['house_id']!= '' )?$arr['house_id'] : 'NULL';
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$i, $sr_no)
				->setCellValue('B'.$i, $arr['student_name'])
				->setCellValue('C'.$i, $arr['standard_id'])
				->setCellValue('D'.$i, $arr['class_id'])
				->setCellValue('E'.$i, $house)
				->setCellValue('F'.$i, $arr['mobile_no'])
				->setCellValue('G'.$i, $sms_link);
				$i++;
				$sr_no++;
			}

			// Rename worksheet
			$objPHPExcel->getActiveSheet()->setTitle('Simple');


			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$objPHPExcel->setActiveSheetIndex(0);


			// Redirect output to a client’s web browser (Excel5)
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$fname.'"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;
	 
   }
   function downloadSheet($filename, $columns = array(), $user_template_id = ''){
		
		if(empty($columns) || $filename == ''){
			return false;
		}
		$objPHPExcel = new PHPExcel();

			// Set document properties
			$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
						 ->setLastModifiedBy("Maarten Balliauw")
						 ->setTitle("Office 2007 XLSX Test Document")
						 ->setSubject("Office 2007 XLSX Test Document")
						 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
						 ->setKeywords("office 2007 openxml php")
						 ->setCategory("Test result file");


			// Add some data
	
			$objPHPExcel->setActiveSheetIndex(0);
			$index = 65;
			foreach($columns as $column){
				$char = chr($index).'1'; 
				$objPHPExcel->getActiveSheet()->setCellValue($char, $column);
				$index++;
			}

			$objPHPExcel->getActiveSheet()->setTitle('Fill data');


			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$objPHPExcel->setActiveSheetIndex(0);


			// Redirect output to a client’s web browser (Excel5)
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
			header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
			header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header ('Pragma: public'); // HTTP/1.0

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;
   }
   
}