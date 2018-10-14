<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Athlete;
use App\Classification;
use App\RaceNumber;
use App\City;

class AthleteController extends Controller
{
    //GET PAGE <--
    public function index()
    {
        $athletes = Athlete::all();
        $classifications = Classification::all();
        $race_numbers = RaceNumber::all();
        $city = City::all();
        return view('athlete.index', [
          'athletes' => $athletes,
          'classifications' => $classifications,
          'city' => $city,
          'race_numbers' => $race_numbers
        ]);
    }
    //GET PAGE -->

    //CRUD <--
    public function addAthlete(Request $request)
    {
        $athletes = new Athlete;
        $athletes->name = $request->name;
        $athletes->gender = $request->gender;
        $athletes->birth_date = $request->birth_date;
        $athletes->city_id = $request->address;
        $athletes->classification_id = $request->classification;
        $athletes->save();

        $athlete_id = DB::table('athletes')->where('id', DB::raw("(select max(`id`) from athletes)"))->get();
        // dd($athlete_id[0]->id);

        if ($request->single1 != 0) {
          $race_number_id = $request->single1;
          $athletes->addAthleteRaceNumber($athlete_id[0]->id, $race_number_id);
        }
        if ($request->single2 != 0) {
          $race_number_id = $request->single2;
          $athletes->addAthleteRaceNumber($athlete_id[0]->id, $race_number_id);
        }
        if ($request->single3 != 0) {
          $race_number_id = $request->single3;
          $athletes->addAthleteRaceNumber($athlete_id[0]->id, $race_number_id);
        }
        if ($request->relay1 != 0) {
          $race_number_id = $request->relay1;
          $athletes->addAthleteRaceNumber($athlete_id[0]->id, $race_number_id);
        }
        if ($request->relay2 != 0) {
          $race_number_id = $request->relay2;
          $athletes->addAthleteRaceNumber($athlete_id[0]->id, $race_number_id);
        }

        // return redirect()->back();
        try{
            return redirect()
                   ->back()
                   ->withSuccess(sprintf('%s Success', "Berhasil menambah data Atlet ".$request->name));
        }
        catch(QueryException $e){
           return redirect()->back()->with(['error' => "Cek Kembali Data Anda."]);
        }
    }

    public function deleteAthlete (Request $request) {
        $id = $request->deletedId;
        $delete = Athlete::where('id', $id)->delete();
        try{
            return redirect()
                   ->back()
                   ->withSuccess('Berhasil menghapus data');
        }
        catch(QueryException $e){
           return redirect()->back()->with(['error' => "Error."]);
        }
    }
    //CRUD -->

    //AJAX <--
    public function single1Selected()
    {
        $single1_id = $_POST['single1'];
        $single2 = "<option value='0' selected='true'>-- Pilih No Perlombaan --</option>";
        $single3 = "<option value='0' selected='true'>-- Pilih No Perlombaan --</option>";

        $race_numbers = RaceNumber::all();
        foreach ($race_numbers as $race_number) {
          if ($race_number->id != $single1_id) {
            $single2 .= "<option name='user_id' value='$race_number->id'>$race_number->name</option>";
            $single3 .= "<option name='user_id' value='$race_number->id'>$race_number->name</option>";
          }
        }
        return response()->json(array('single2' => $single2, 'single3' => $single3));
    }

    public function single2Selected()
    {
        $single1_id = $_POST['single1'];
        $single2_id = $_POST['single2'];
        $single3 = "<option value='0' selected='true'>-- Pilih No Perlombaan --</option>";

        $race_numbers = RaceNumber::all();
        foreach ($race_numbers as $race_number) {
          if (($race_number->id != $single1_id) && ($race_number->id != $single2_id)) {
            $single3 .= "<option name='user_id' value='$race_number->id'>$race_number->name</option>";
          }
        }
        return response()->json(array('single3' => $single3));
    }

    public function relay1Selected()
    {
        $relay1_id = $_POST['relay1'];
        $relay2 = "<option value='0' selected='true'>-- Pilih No Perlombaan --</option>";

        $race_numbers = RaceNumber::all();
        foreach ($race_numbers as $race_number) {
          if (($race_number->is_relay == true) && ($race_number->id != $relay1_id)) {
            $relay2 .= "<option name='user_id' value='$race_number->id'>$race_number->name</option>";
          }
        }
        return response()->json(array('relay2' => $relay2));
    }
    //AJAX -->
}
