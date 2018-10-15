<?php namespace App\Libs;

use Illuminate\Support\Facades\DB;
use App\City;

class DataPrint
{

  public function genders($g){
  	if($g=="P") return "PUTRA";
  	else return "PUTRI";
  }	

  public function countSeries($event_id){
    return DB::table('participants')->where('event_id',$event_id)->distinct('turn')->count('turn');
  }

  public function citys($city_id){
    return City::where('id',$city_id)->pluck('name')->last();
  }

	public function formate($time){
    if($time==null) return "-";
    $ct = strlen($time);
    $s = 7-$ct;
    while($s--){
      $time = "0".$time;
    }
		return substr($time, 0, -5).".".substr(substr($time, -5),0,-3).".".substr($time, -3);
	}

	public function daftarPeserta($event_id, $turn){
    if($turn!=0)
      return DB::table('participants')
                          ->join('athletes','participants.athlete_id', '=', 'athletes.id')
                          ->join('classifications','athletes.classification_id', '=', 'classifications.id')
                          ->select(
                            'athletes.id as athlete_id','athletes.name',
                            'athletes.birth_date','athletes.city_id',
                            'classifications.name as class_name',
                            'participants.medal', 'participants.result_time', 'participants.is_dq', 'participants.is_dn', 'participants.final_result'
                            )
                          ->where([['event_id', $event_id],['participants.turn',$turn]])
                          ->orderBy('participants.result_time', 'asc')
                          ->get();
    else
      return DB::table('participants')
                          ->join('athletes','participants.athlete_id', '=', 'athletes.id')
                          ->join('classifications','athletes.classification_id', '=', 'classifications.id')
                          ->select(
                            'athletes.id as athlete_id','athletes.name',
                            'athletes.birth_date','athletes.city_id',
                            'classifications.name as class_name',
                            'participants.medal', 'participants.result_time', 'participants.is_dq', 'participants.is_dn', 'participants.final_result'
                            )
                          ->where([['event_id',$event_id],['final_result','!=',null]])
                          ->orderBy('participants.final_result', 'asc')
                          ->get();      
	}

  public function medals($is_dq, $is_dn, $medal, $t){
    if($t>1) return "";
    if($is_dq || $is_dn){
      if($is_dq && $is_dn) return "DQ/DN";
      elseif($is_dq) return "DQ";
      else return "DN";
    } else return $medal;
  }

  public function tanggal($date){
    $d = explode("-", $date);
    return $d[2]."/".$d[1]."/".$d[0];
  }

}
