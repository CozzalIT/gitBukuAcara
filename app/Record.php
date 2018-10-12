<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}
