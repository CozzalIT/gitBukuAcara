<?php namespace App\Libs;

use Illuminate\Support\Facades\DB;

class DataPrint
{

    public function genders($g){
    	if($g=="P") return "PUTRA";
    	else return "PUTRI";
    }	

	public function formate($time){
		return	substr($time, 0, -5).".".substr(substr($time, -5),0,-3).".".substr($time, -3);
	}

	public function daftarPeserta($event_id, $turn){
      $return = DB::table('participants')
                          ->join('athletes','participants.athlete_id', '=', 'athletes.id')
                          ->join('classifications','athletes.classification_id', '=', 'classifications.id')
                          ->select(
                            'athletes.id as athlete_id','athletes.name',
                            'athletes.birth_date','athletes.address',
                            'classifications.name as class_name',
                            'participants.medal', 'participants.result_time', 'participants.is_dq', 'participants.is_dn'
                            )
                          ->where([['event_id', $event_id],['participants.turn',$turn]])
                          ->orderBy('participants.result_time', 'asc')
                          ->get();
        if($return->count()==0) return null;
        else return $return;
	}

  public function medals($is_dq, $is_dn, $medal){
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
