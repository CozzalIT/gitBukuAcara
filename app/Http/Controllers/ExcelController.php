<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\XLSXWriter;
use App\Libs\DataPrint;
use App\Event;

class ExcelController extends Controller
{

	protected $headerCol = array( 'font'=>'Tahoma','font-size'=>10,'font-style'=>'bold', 'fill'=>'#a29d9d', 'halign'=>'center','valign'=>'center', 'border'=>'left,right,top,bottom', 'height'=>20);

	protected $header = array( 'font'=>'Tahoma','font-size'=>10,'font-style'=>'bold', 'halign'=>'left', 'valign'=>'center', 'height'=>20);	

	protected $content = array( 'font'=>'Tahoma','font-size'=>10,'halign'=>'center', 'valign'=>'center', 'height'=>19, 'border'=>'left,right,top,bottom');		

    protected $Serie = array( 'font'=>'Tahoma','font-size'=>11,'halign'=>'center', 'valign'=>'center', 'height'=>21, 'border'=>'left,right,top,bottom');  

	protected $blank = array('height'=>20, 'widths'=>[10,40,25,13,35,20,15]);	

	protected $mergedPos=1;	

    public function index(Request $req){
    	$id = $req->race_number;
    	$proc = false;
    	if($id!=0){
    		$event = Event::find($id);
    		$proc = $this->pr($event,1);
    	} else {
    		$event = Event::all();
    		$proc = $this->pr($event,2);    		
    	}

    	if(!$proc) return "Proses Input Hasil Belum Selesai";
    	elseif($proc==null) return "Tidak Ada Event yang berlangsung";
    }

    private function pr($data, $s){
    	$tool = new Event();
		$e = new DataPrint();
    	$writer = new XLSXWriter();
    	$writer->setAuthor('MINOR');
    	$writer->writeSheetHeader('Sheet1',$this->blankLine(), $this->blank);
    	$ret = null;
    	if($s==1){
    		$datas = array(
    			"id" => $data->id, "name" => $data->name, 
    			"rN_id" => $data->race_number_id, "class_id" => $data->classification_id, "gender" => $data->gender
    		);
    		$ret = $this->printSingle($writer, $tool, $e, $data);
    		$filename = "Hasil Acara $data->name.xlsx";
    	} else {
    		$hit=0 ;
    		foreach ($data as $k) {
    			$datas = array(
	    			"id" => $k->id, "name" => $k->name, "rN_id" => $k->race_number_id, 
	    			"class_id" => $k->classification_id, "gender" => $k->gender
    			);
    			$ret = $this->printSingle($writer, $tool, $e, $datas);
    			if($ret==false) break; 
    		}
    		$filename = "Hasil Semua Acara.xlsx";
    	}

    	if(!$ret) return false; elseif($ret==null) return $ret;
    	ini_set('display_errors', 0);
	    ini_set('log_errors', 1);
	    error_reporting(E_ALL & ~E_NOTICE);
		header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');		
    	$writer->writeToStdOut();
    	return $ret;

    }


    private function printSingle($writer, $tool, $e, $data){

		$race_number = $tool->selectRaceNumber($data["rN_id"]);
		$class = $tool->selectClassification($data["class_id"]);
		$gender = $e->genders($data["gender"]);

		$pnD = $tool->selectPeparnas($data["id"]);
		$pdD = $tool->selectPeparda($data["id"]);

		$r_pn = "-";
		if($pnD->count()!=0) {
			$pn = $pnD[0];
			$r_pn = $e->formate($pn->time)." $pn->athlete_name($pn->athlete_address) - $pn->location, ".$e->tanggal($pn->recorded_at);			
		}
		$r_pd = "-";
		if($pdD->count()!=0){
			$pd = $pdD[0];
			$r_pd = $e->formate($pd->time)." $pd->athlete_name($pd->athlete_address) - $pd->location, ".$e->tanggal($pd->recorded_at);			
		} 		

		$this->writeHead($writer, 'Sheet1', "ACARA ".$data['name']." : $race_number $class $gender");
		$this->writeHead($writer, 'Sheet1', "Rekor PEPARNAS : $r_pn");
		$this->writeHead($writer, 'Sheet1', "Rekor PEPARNAS : $r_pd");				
	
		$writer->writeSheetRow('Sheet1', array(
			'RANK', 'NAMA', 'TGL LAHIR', 'KELAS', 'PROVINSI', 'HASIL', 'MEDALI'
		), $this->headerCol);	
		$this->mergedPos++;

        $null_ar = [];
        $Cs = $e->countSeries($data['id']);
        for($j=1; $j<=$Cs; $j++){
            $dataSet = $e->daftarPeserta($data['id'], $j);            
            $this->writeHeadSerie($writer, 'Sheet1' ,$j);
            $i = 0;
            foreach ($dataSet as $k) {
                if($k->result_time==null && !$k->is_dq && !$k->is_dn) return false;
                
                if($k->result_time==null){
                    $null_ar[] = [
                        "name" => $k->name,
                        "tanggal" => $e->tanggal($k->birth_date),
                        "class" =>  $k->class_name,
                        "address" => $e->citys($k->city_id),
                        "result" => $e->formate($k->result_time),
                        "medal" => $e->medals($k->is_dq, $k->is_dn, $k->medal, $Cs)
                    ];
                    goto lewat1;
                }

                $i++;
                $writer->writeSheetRow('Sheet1', array(
                    $i, $k->name, $e->tanggal($k->birth_date), $k->class_name,
                    $e->citys($k->city_id), $e->formate($k->result_time), 
                    $e->medals($k->is_dq, $k->is_dn, $k->medal, $Cs)
                ), $this->content); 
                $this->mergedPos++;
                lewat1:
            }

            foreach ($null_ar as $k) {
                $i++;
                $writer->writeSheetRow('Sheet1', array(
                    $i, $k['name'], $k['tanggal'], $k['class'],
                    $k['address'], $k['result'], $k['medal'] 
                ), $this->content); 
                $this->mergedPos++;                
            }

        }

        if($Cs>1){
            $null_ar = [];
            $dataSet = $e->daftarPeserta($data['id'], 0);
            $this->writeHeadSerie($writer, 'Sheet1' ,0);
            $i = 0;
            foreach ($dataSet as $k) {
                $i++;
                $writer->writeSheetRow('Sheet1', array(
                    $i, $k->name, $e->tanggal($k->birth_date), $k->class_name,
                    $e->citys($k->city_id), $e->formate($k->final_result), 
                    $e->medals($k->is_dq, $k->is_dn, $k->medal, 0)
                ), $this->content); 
                $this->mergedPos++;
            }                       
        }

        elseif($Cs==0) $this->writeEmptyData($writer, 'Sheet1');

		$writer->writeSheetRow('Sheet1',$this->blanksSeparator(), $this->blank);

    	return true;    	
    }

    // Formating Function

    private function writeHead($writer, $sheet, $data){
    	$writer->writeSheetRow($sheet, array($data), $this->header);
    	$writer->markMergedCell('Sheet1', $this->mergedPos,0, $this->mergedPos,6);
    	$this->mergedPos++;
    }

    private function writeEmptyData($writer, $sheet){
    	$writer->writeSheetRow($sheet, array('Tidak Ada Data'), $this->content);
    	$writer->markMergedCell('Sheet1', $this->mergedPos,0, $this->mergedPos,6);
    	$this->mergedPos++;    	
    }

    private function writeHeadSerie($writer, $sheet, $series){
        if($series!=0){
            $writer->writeSheetRow($sheet, array("SERI $series"), $this->Serie);    
        } else {
            $writer->writeSheetRow($sheet, array("FINAL"), $this->Serie);
        }
        
        $writer->markMergedCell('Sheet1', $this->mergedPos,0, $this->mergedPos,6);
        $this->mergedPos++;     
    }

    private function blanksSeparator(){
    	$this->mergedPos++;
    	return array('','','','','','','');    	
    }

    private function blankLine(){
    	return array(
		  ' '=>'string',//text
		  '  '=>'string',//text
		  '   '=>'string',//text
		  '    '=>'string',//text
		  '     '=>'string',//text
		  '      '=>'string',//text
		  '       '=>'string',//text		  
    	);
    }
}
