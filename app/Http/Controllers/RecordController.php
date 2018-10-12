<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classification;
use App\RaceNumber;
use App\Record;
use App\Event;

class RecordController extends Controller
{
    public function index()
    {
        $records = Record::all();
        $classifications = Classification::all();
        $race_numbers = RaceNumber::all();
        return view('record.index', [
          'records' => $records,
          'classifications' => $classifications,
          'race_numbers' => $race_numbers
        ]);
    }

    public function addRecord(Request $request)
    {
        // dd($request);
        $this->validate($request, [
                  'time' => 'required|min:9'
        ]);
        $time = str_replace(":", "", $request->time);

        $records = new Record;
        $records->athlete_name = $request->athlete_name;
        $records->athlete_address = $request->athlete_address;
        $records->athlete_gender = $request->athlete_gender;
        $records->classification_id = $request->classification;
        $records->race_number_id = $request->race_number;
        $records->type = $request->type;
        $records->time = $time;
        $records->location = $request->location;
        $records->recorded_at = $request->recorded_at;
        $records->save();

        $records->addEventRecord($request->athlete_gender,  $request->classification, $request->race_number, $request->type);

        try{
            return redirect()
                   ->back()
                   ->withSuccess(sprintf("Berhasil menambah data rekor ".$request->type));
        }
        catch(QueryException $e){
           return redirect()->back()->with(['error' => "Cek Kembali Data Anda."]);
        }
    }

    public function deleteRecord (Request $request) {
        $id = $request->deletedId;
        $delete = Record::where('id', $id)->delete();
        try{
            return redirect()
                   ->back()
                   ->withSuccess('Berhasil menghapus data');
        }
        catch(QueryException $e){
           return redirect()->back()->with(['error' => "Error."]);
        }
    }
}
