<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Athlete extends Model
{
    public function race_number()
    {
        return $this->belongsToMany('App\RaceNumber', 'athlete_race_numbers', 'athlete_id', 'race_number_id');
    }

    public function checkAthlete($race_number_id)
    {
      $athlete_id = DB::table('athlete_race_numbers')
                                ->select('athlete_id')
                                ->where('race_number_id', $race_number_id)
                                ->get();

      return $athlete_id;
    }

    public static function showCity($city_id)
    {
        $city = DB::table('city')
                    ->select('name')
                    ->where('id', $city_id)
                    ->get();

        return $city;
    }

    public static function athleteRaceNumbers($athlete_id)
    {
        $race_number = DB::table('athlete_race_numbers')
                            ->join('race_numbers', 'athlete_race_numbers.race_number_id', '=', 'race_numbers.id')
                            ->select('race_numbers.id as rn_id', 'race_numbers.name as race_number_name', 'race_numbers.is_relay')
                            ->where('athlete_race_numbers.athlete_id', $athlete_id)
                            ->get();

        return $race_number;
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
