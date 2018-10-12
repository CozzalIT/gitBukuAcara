<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\XLSXWriter;

class ExcelController extends Controller
{

	protected $headerCol = array( 'font'=>'Tahoma','font-size'=>10,'font-style'=>'bold', 'fill'=>'#a29d9d', 'halign'=>'center','valign'=>'center', 'border'=>'left,right,top,bottom', 'height'=>20);
	protected $header = array( 'font'=>'Tahoma','font-size'=>10,'font-style'=>'bold', 'halign'=>'left', 'valign'=>'center', 'height'=>20);	
	protected $content = array( 'font'=>'Tahoma','font-size'=>10,'halign'=>'center', 'valign'=>'center', 'height'=>19, 'border'=>'left,right,top,bottom');		
	protected $blank = array('height'=>20);		

    public function index(){
		ini_set('display_errors', 0);
		ini_set('log_errors', 1);
		error_reporting(E_ALL & ~E_NOTICE);

		$obj = new XLSXWriter();
		$filename = "example.xlsx";
		header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');

		$writer = new XLSXWriter();
		$writer->setAuthor('Some Author');
		$writer->writeSheetRow('Sheet1',$this->blankLine(), $this->blank);
		$writer->writeSheetRow('Sheet1', array('ACARA 201 : 100M GAYA BEBAS S11 PUTRA'), $this->header);
		$writer->writeSheetRow('Sheet1', array('ACARA 201 : 100M GAYA BEBAS S11 PUTRA'), $this->header);		
		$writer->markMergedCell('Sheet1', 1,0, 1,6);
		$writer->markMergedCell('Sheet1', 2,0, 2,6);
		$writer->writeSheetRow('Sheet1', array(
			'RANK', 'NAME', 'TGL LAHIR', 'KELAS', 'PROVINSI', 'HASIL', 'MEDALI'
		), $this->headerCol);	
		$writer->writeSheetRow('Sheet1', array(
			1, 'Imron', 'Bebas', 'Berat', 'Jbar', 'Mana Saja', 'Emas'
		), $this->content);				
    	return $writer->writeToStdOut();
    }

    private function blankLine(){
    	return array('','','','','','','');
    }

}
