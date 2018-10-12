<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Record extends Model
{
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

    public function addEventRecord($gender, $classification_id, $race_number_id, $type)
    {
        $record_id = DB::table('records')->pluck('id')->last();

        $events = DB::table('events')
                    ->where('race_number_id', $race_number_id)
                    ->where('classification_id', $classification_id)
                    ->where('gender', $gender)
                    ->get();

        $time = Carbon::now();

        foreach ($events as $event) {
          $input = DB::table('event_records')->insert([
            'record_id' => $record_id,
            'event_id' => $event->id,
            'type' => $type,
            'created_at' => $time->toDateTimeString(),
            'updated_at' => $time->toDateTimeString()
          ]);
        }
        return true;
    }
}
