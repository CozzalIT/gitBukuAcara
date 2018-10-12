<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use App\Athlete;
use App\Classification;
use App\RaceNumber;

class EventController extends Controller
{
    //GET PAGE <--
    public function index()
    {
        $classifications = Classification::all();
        $race_numbers = RaceNumber::all();
        $events = Event::all();
        return view('event.index', [
          'events' => $events,
          'classifications' => $classifications,
          'race_numbers' => $race_numbers
        ]);
    }

    public function filterAthlete($event_id, $race_number_id, $classification_id, $gender)
    {
        $athlete_lists = DB::table('athlete_race_numbers')
                            ->join('athletes', 'athletes.id', '=', 'athlete_race_numbers.athlete_id')
                            ->select('athletes.id as athlete_id', 'athletes.name')
                            ->where('athlete_race_numbers.race_number_id', $race_number_id)
                            ->where('athletes.classification_id', $classification_id)
                            ->where('athletes.gender', $gender)
                            ->get();

        $isFilled = Event::all();
        $peparnas = Event::selectPeparnas($event_id);
        $peparda = Event::selectPeparda($event_id);
        $event = Event::showAthlete($event_id);

        $race_number = Event::showRaceNumber($race_number_id);
        return view('event.filter.index', [
          'isFilled' => $isFilled,
          'peparnas' => $peparnas,
          'peparda' => $peparda,
          'event' => $event,
          'race_number' => $race_number,
          'athlete_lists' => $athlete_lists
        ]);
    }

    public function eventResult($event_id, $race_number_id, $classification_id, $gender){
      $race_number = Event::showRaceNumber($race_number_id);
      $peparnas = Event::selectPeparnas($event_id);
      $peparda = Event::selectPeparda($event_id);
      $event = Event::showAthlete($event_id);

      return view('event.result.index', [
        'race_number' => $race_number,
        'peparnas' => $peparnas,
        'peparda' => $peparda,
        'event' => $event
      ]);
    }
    //GET PAGE -->

    //AJAX <--
    public function isRelay()
    {
        $is_relay = $_POST['is_relay'];
        $race_number_option = "<option value='0' selected='true'>-- Pilih No Perlombaan --</option>";

        $race_numbers = RaceNumber::all();
        foreach ($race_numbers as $race_number) {
          if ($race_number->is_relay == $is_relay) {
            $race_number_option .= "<option value='$race_number->id'>$race_number->name</option>";
          }
        }
        return response()->json(array('race_number_option' => $race_number_option));
    }

    public function selectTrack()
    {
      $classification_id = $_POST['classification_id'];
      $race_number_id = $_POST['race_number_id'];
      $gender = $_POST['gender'];
      $seri1Lintasan1 = $_POST['seri1Lintasan1'];

      $track1 = "<option value='0' >-- Pilih Atlet --</option>";
      $track2 = "<option value='0' selected='true'>-- Pilih Atlet --</option>";

      // $athletes = Athlete::all();
      $athletes = Athlete::checkAthlete($race_number_id);
      foreach ($athletes as $athlete) {
        // if ($athlete->id == $athlete->checkAthlete($race_number_id, $classification_id, $gender)) {
          // $track1 .= "<option value='$athlete->id' ".($athlete->id == $seri1Lintasan1 ? 'selected' : ' ').">$athlete->name</option>";
          $track2 .= "<option value='$athlete->athlete_id'>$athlete->athlete_id</option>";
        // }
      }
      return response()->json(array('track1' => $track1, 'track2' => $track2));
    }
    //AJAX -->

    //CRUD <--
    public function selectAthlete(Request $request)
    {
        $event_id = $_POST['event_id'];
        if (isset($request->seri1)) {
          Event::clearParticipants($event_id, 1);
          for ($i=0; $i < 8; $i++) {
            $seri1[$i+1] = $request->seri1[$i];
            if ($seri1[$i+1] != 0) {
              $splitData = explode("/",$seri1[$i+1]);
              Event::addParticipants($event_id, $splitData[1], 1, $splitData[0]);
            }
          }
          $turn = "turn1";
        } elseif (isset($request->seri2)) {
          Event::clearParticipants($event_id, 2);
          for ($i=0; $i < 8; $i++) {
            $seri2[$i+1] = $request->seri2[$i];
            if ($seri2[$i+1] != 0) {
              $splitData = explode("/",$seri2[$i+1]);
              Event::addParticipants($event_id, $splitData[1], 2, $splitData[0]);
            }
          }
          $turn = "turn2";
        } elseif (isset($request->seri3)) {
          Event::clearParticipants($event_id, 3);
          for ($i=0; $i < 8; $i++) {
            $seri3[$i+1] = $request->seri3[$i];
            if ($seri3[$i+1] != 0) {
              $splitData = explode("/",$seri3[$i+1]);
              Event::addParticipants($event_id, $splitData[1], 3, $splitData[0]);
            }
          }
          $turn = "turn3";
        }

        try{
            return redirect()
                   ->back()
                   ->with(['turn' => $turn] )
                   ->withSuccess(sprintf("Berhasil menambahkan atlet kedalam acara."));
        }
        catch(QueryException $e){
           return redirect()->back()->with(['error' => "Select atlet gagal!"]);
        }
    }

    public function addEvent(Request $request)
    {
        $events = new Event;
        $events->name = $request->name;
        $events->gender = $request->gender;
        $events->classification_id = $request->classification;
        $events->is_relay = $request->is_relay;
        $events->race_number_id = $request->race_number;
        $events->save();
        $events->addEventRecord($request->gender,  $request->classification, $request->race_number);

        try{
            return redirect()
                   ->back()
                   ->withSuccess(sprintf("Berhasil menambah data acara ".$request->name));
        }
        catch(QueryException $e){
           return redirect()->back()->with(['error' => "Cek Kembali Data Anda."]);
        }
    }

    public function deleteEvent (Request $request) {
        $id = $request->deletedId;
        $delete = Event::where('id', $id)->delete();
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
}
