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
                          ->select('records.time', 'records.athlete_name', 'records.athlete_address', 'records.recorded_at')
                          ->where('event_id', $event_id)
                          ->where('event_records.type', 'PEPARNAS')
                          ->get();

        return $peparnas;
    }

    public static function selectPeparda($event_id)
    {
        $peparda = DB::table('event_records')
                          ->join('records', 'event_records.record_id', '=', 'records.id')
                          ->select('records.time', 'records.athlete_name', 'records.athlete_address', 'records.recorded_at')
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

    public static function showParticipant($event_id, $turn, $track)
    {
      $participant = DB::table('participants')
                          ->join('athletes','participants.athlete_id', '=', 'athletes.id')
                          ->select('athletes.id as athlete_id', 'athletes.name')
                          ->where('event_id', '=', $event_id)
                          // ->where('athlete_id', '=', $athlete_id)
                          ->where('turn', '=', $turn)
                          ->where('track', '=', $track)
                          ->get();

      return $participant;
    }

    public static function addParticipants($event_id, $athlete_id, $turn, $track)
    {
      $time = Carbon::now();
      $input = DB::table('participants')->insert([
        'event_id' => $event_id,
        'athlete_id' => $athlete_id,
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

    public static function showRaceNumber($race_number_id)
    {
      $race_number = DB::table('race_numbers')->where('id', '=', $race_number_id)->get();
      return ($race_number);
    }
}
