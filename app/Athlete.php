<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Athlete extends Model
{
    public function checkAthlete($race_number_id)
    {
      $athlete_id = DB::table('athlete_race_numbers')
                                ->select('athlete_id')
                                ->where('race_number_id', $race_number_id)
                                ->get();

      // $athletes = DB::table('athletes')
      //                 ->select('id')
      //                 ->where('classification_id', $classification_id)
      //                 ->where('gender', $gender)
      //                 ->get();

      // foreach ($athlete_race_number as $athlete) {
      //   $athlete_id = $athlete->id;
      // }

      return $athlete_id;
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

    public function addAthleteRaceNumber($athlete_id, $race_number_id)
    {
        $time = Carbon::now();
        $input = DB::table('athlete_race_numbers')->insert([
          'athlete_id' => $athlete_id,
          'race_number_id' => $race_number_id,
          'created_at' => $time->toDateTimeString(),
          'updated_at' => $time->toDateTimeString()
        ]);
    }
}
