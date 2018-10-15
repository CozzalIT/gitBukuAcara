<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Event extends Model
{
    public static function selectPeparnas($event_id)
    {
        $peparnas = DB::table('event_records')
                          ->join('records', 'event_records.record_id', '=', 'records.id')
                          ->select('records.time', 'records.athlete_name', 'records.athlete_address', 'records.recorded_at', 'records.location')
                          ->where('event_id', $event_id)
                          ->where('event_records.type', 'PEPARNAS')
                          ->get();

        return $peparnas;
    }

    public static function selectPeparda($event_id)
    {
        $peparda = DB::table('event_records')
                          ->join('records', 'event_records.record_id', '=', 'records.id')
                          ->select('records.time', 'records.athlete_name', 'records.athlete_address', 'records.recorded_at', 'records.location')
                          ->where('event_records.event_id', $event_id)
                          ->where('event_records.type', 'PEPARDA')
                          ->get();

        return $peparda;
    }

    public function selectClassification($id)
    {
        $classification = DB::table('classifications')
                    ->select('name as classification_name')
                    ->where('id', $id)
                    ->get();
        $name = "Undefined";
        foreach ($classification as $key) {
            $name = $key->classification_name;
        }
        return $name;
    }

    public function selectRaceNumber($id)
    {
        $race_number = DB::table('race_numbers')
                    ->select('name as race_numbers_name')
                    ->where('id', $id)
                    ->get();
        $name = "Undefined";
        foreach ($race_number as $key) {
            $name = $key->race_numbers_name;
        }
        return $name;
    }

    public function addEventRecord($gender, $classification_id, $race_number_id)
    {
        $event_id = DB::table('events')->pluck('id')->last();

        $records = DB::table('records')
                    ->where('race_number_id', $race_number_id)
                    ->where('classification_id', $classification_id)
                    ->where('athlete_gender', $gender)
                    ->get();

        $time = Carbon::now();

        foreach ($records as $record) {
          $input = DB::table('event_records')->insert([
            'event_id' => $event_id,
            'record_id' => $record->id,
            'type' => $record->type,
            'created_at' => $time->toDateTimeString(),
            'updated_at' => $time->toDateTimeString()
          ]);
        }
        return true;
    }

    public static function isFilled($event_id, $athlete_id, $turn, $track)
    {
      $isFilled = DB::table('participants')
                      ->where('event_id', '=', $event_id)
                      ->where('athlete_id', '=', $athlete_id)
                      ->where('turn', '=', $turn)
                      ->where('track', '=', $track)
                      ->get();

      return count($isFilled);
    }

    public static function isFilledRelay($event_id, $turn, $track)
    {
      $isFilledRelay = DB::table('participants')
                          ->where('event_id', '=', $event_id)
                          ->where('turn', '=', $turn)
                          ->where('track', '=', $track)
                          ->get();

      return $isFilledRelay;
    }

    public static function isFilledFinal($event_id, $athlete_id, $final_track)
    {
      $isFilled = DB::table('participants')
                      ->where('event_id', '=', $event_id)
                      ->where('athlete_id', '=', $athlete_id)
                      ->where('final_track', '=', $final_track)
                      ->get();

      return count($isFilled);
    }

    public static function isFinalResult($event_id, $final_track)
    {
      $final_result = DB::table('participants')
                          ->where('event_id', '=', $event_id)
                          ->where('final_track', '=', $final_track)
                          ->get();

      if (count($final_result) > 0) {
        return $final_result;
      }else{
        return false;
      }
    }

    public static function showMedal($event_id, $final_track)
    {
      $final_result = DB::table('participants')
                          ->where('event_id', '=', $event_id)
                          ->where('final_track', '=', $final_track)
                          ->get();

      if (count($final_result) > 0) {
        return $final_result;
      }else{
        return false;
      }
    }

    public static function checkMedal($athlete_id)
    {
      $checkMedal = DB::table('participants')
                      ->where('athlete_id', '=', $athlete_id)
                      ->get();

      return count($checkMedal);
    }

    public static function showParticipant($event_id, $turn, $track)
    {
      $participant = DB::table('participants')
                          ->join('athletes','participants.athlete_id', '=', 'athletes.id')
                          ->join('classifications','athletes.classification_id', '=', 'classifications.id')
                          ->select(
                            'athletes.id as athlete_id',
                            'athletes.name', 'athletes.birth_date',
                            'classifications.name as classification_name',
                            'participants.medal', 'participants.result_time', 'participants.is_dq', 'participants.is_dn'
                            )
                          ->where('event_id', '=', $event_id)
                          ->where('turn', '=', $turn)
                          ->where('track', '=', $track)
                          ->get();

      if (count($participant) > 0) {
        return $participant;
      }else{
        return false;
      }
    }

    public static function showFinalParticipant($athlete_id, $track)
    {
      $participant = DB::table('participants')
                          ->join('athletes','participants.athlete_id', '=', 'athletes.id')
                          ->join('classifications','athletes.classification_id', '=', 'classifications.id')
                          ->select(
                            'athletes.id as athlete_id',
                            'athletes.name', 'athletes.birth_date',
                            'classifications.name as classification_name',
                            'participants.medal', 'participants.result_time', 'participants.is_dq', 'participants.is_dn'
                            )
                          ->where('athlete_id', '=', $athlete_id)
                          ->where('track', '=', $track)
                          ->get();

      if (count($participant) > 0) {
        return $participant;
      }else{
        return false;
      }
    }

    public static function addParticipants($event_id, $athlete_id, $turn, $track)
    {
      $time = Carbon::now();
      $input = DB::table('participants')->insert([
        'event_id' => $event_id,
        'athlete_id' => $athlete_id,
        'is_dq' => 0,
        'is_dn' => 0,
        'turn' => $turn,
        'track' => $track,
        'created_at' => $time->toDateTimeString(),
        'updated_at' => $time->toDateTimeString()
      ]);
      return $input;
    }

    public static function clearParticipants($event_id, $turn)
    {
      DB::table('participants')
          ->where('event_id', $event_id)
          ->where('turn', $turn)
          ->delete();
    }

    public static function showAthlete($event_id)
    {
        $event = DB::table('events')->where('id', '=', $event_id)->get();
        return ($event);
    }

    public static function maxTurn($event_id)
    {
        $turn1 = DB::table('participants')->select('turn')->where('turn', 1)->where('event_id', $event_id)->get();
        $turn2 = DB::table('participants')->select('turn')->where('turn', 2)->where('event_id', $event_id)->get();
        $turn3 = DB::table('participants')->select('turn')->where('turn', 3)->where('event_id', $event_id)->get();

        $trn1 = (count($turn1) > 1) ? 1 : 0;
        $trn2 = (count($turn2) > 1) ? 1 : 0;
        $trn3 = (count($turn3) > 1) ? 1 : 0;

        $maxTurn = $trn1 + $trn2 + $trn3;
        if ($maxTurn > 1) {
          return true;
        }else{
          return false;
        }
    }

    public static function showBigThree($event_id)
    {
        $turn1 = DB::table('participants')->select('turn')->where('turn', 1)->where('event_id', $event_id)->get();
        $turn2 = DB::table('participants')->select('turn')->where('turn', 2)->where('event_id', $event_id)->get();
        $turn3 = DB::table('participants')->select('turn')->where('turn', 3)->where('event_id', $event_id)->get();

        $participants = DB::table('participants')->where('event_id', $event_id)->get();

        $i = 0;
        foreach ($participants as $participant) {
          if ($participant->result_time != 0) {
            $result_time[$i] = $participant->result_time;
            $athlete_id[$i] = $participant->athlete_id;
          }
          $i++;
        }

        if (isset($result_time)) {
          sort($result_time);
          for ($i=0; $i < 3; $i++) {
            if (isset($result_time[$i])) {
              $bigThree[$i] = DB::table('participants')
                                  ->select('athlete_id')
                                  ->where('result_time', $result_time[$i])
                                  ->where('event_id', $event_id)
                                  ->get();
            }
          }

          $no = 1;
          for ($i=0; $i < 5; $i++) {
            if (isset($bigThree[0][$i])) {
              $realBigThree[$no] = $bigThree[0][$i]->athlete_id;
            }
            $no++;
          }
          for ($i=0; $i < 5; $i++) {
            if (isset($bigThree[1][$i])) {
              $realBigThree[$no] = $bigThree[1][$i]->athlete_id;
            }
            $no++;
          }
          for ($i=0; $i < 5; $i++) {
            if (isset($bigThree[2][$i])) {
              $realBigThree[$no] = $bigThree[2][$i]->athlete_id;
            }
            $no++;
          }

          if (isset($realBigThree)) {
            sort($realBigThree);
          }
        }else{
          $realBigThree = false;
        }

        $trn1 = (count($turn1) > 1) ? 1 : 0;
        $trn2 = (count($turn2) > 1) ? 1 : 0;
        $trn3 = (count($turn3) > 1) ? 1 : 0;

        $maxTurn = $trn1 + $trn2 + $trn3;
        if ($maxTurn > 1) {
          return $realBigThree;
        }else{
          return false;
        }
    }

    public static function showRaceNumber($race_number_id)
    {
        $race_number = DB::table('race_numbers')->where('id', '=', $race_number_id)->get();
        return ($race_number);
    }
}
