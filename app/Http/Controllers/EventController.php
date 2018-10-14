<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use App\Athlete;
use App\Classification;
use App\Participant;
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

    public function filterRelay($event_id, $race_number_id, $gender){
        $athlete_lists = DB::table('athlete_race_numbers')
                            ->join('athletes', 'athletes.id', '=', 'athlete_race_numbers.athlete_id')
                            ->select('athletes.id as athlete_id', 'athletes.name')
                            ->where('athlete_race_numbers.race_number_id', $race_number_id)
                            ->where('athletes.gender', $gender)
                            ->get();

        // dd($athlete_lists);
        $isFilled = Event::all();
        $peparnas = Event::selectPeparnas($event_id);
        $peparda = Event::selectPeparda($event_id);
        $event = Event::showAthlete($event_id);

        $race_number = Event::showRaceNumber($race_number_id);
        return view('event.relay.index', [
          'isFilled' => $isFilled,
          'peparnas' => $peparnas,
          'peparda' => $peparda,
          'event' => $event,
          'race_number' => $race_number,
          'athlete_lists' => $athlete_lists
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
      $athlete_lists = Athlete::all();
      $race_number = Event::showRaceNumber($race_number_id);
      $peparnas = Event::selectPeparnas($event_id);
      $bigThree = Event::showBigThree($event_id);
      $maxTurn = Event::maxTurn($event_id);
      $peparda = Event::selectPeparda($event_id);
      $event = Event::showAthlete($event_id);
      // $tes = Event::isFinalResult($event_id, 4);
      //
      // dd($tes->final_result);
      $checkTurn2 = count(DB::table('participants')->select('turn')->where('turn', 2)->where('event_id', $event_id)->get());
      $checkTurn3 = count(DB::table('participants')->select('turn')->where('turn', 3)->where('event_id', $event_id)->get());
      $turn2 = ($checkTurn2 > 1) ? true : false ;
      $turn3 = ($checkTurn3 > 1) ? true : false ;


      return view('event.result.index', [
        'athlete_lists' => $athlete_lists,
        'race_number' => $race_number,
        'bigThree' => $bigThree,
        'peparnas' => $peparnas,
        'peparda' => $peparda,
        'maxTurn' => $maxTurn,
        'event' => $event,
        'turn2' => $turn2,
        'turn3' => $turn3
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
    public function selectRelay(Request $request)
    {
        dd($request);
    }

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
        if ($request->is_relay == 0) {
          $events->classification_id = $request->classification;
        }
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

    public function finalResult (Request $request) {
      $this->validate($request, [
                'time' => 'array|min:1',
                'time.*'  => 'string|min:9'
      ]);

      for ($i=0; $i < 8; $i++) {
        if ($request->final[$i] != 0) {
          $tmp = explode("/",$request->final[$i]);
          $final_track = $tmp[0];
          $athlete_id = $tmp[1];
          $time[$i] = str_replace(":", "", $request->time[$i+1]);
          Participant::where('event_id', $request->event_id)
                        ->where('athlete_id', $athlete_id)
                        ->update(['final_track' => $final_track, 'final_result' => $time[$i]]);

          if(isset($request->is_dq[$i+1])){
            Participant::where('event_id', $request->event_id)
            ->where('athlete_id', $athlete_id)
            ->update(['is_dq' => 1]);
          }else{
            Participant::where('event_id', $request->event_id)
            ->where('athlete_id', $athlete_id)
            ->update(['is_dq' => 0]);
          }

          if(isset($request->is_dn[$i+1])){
            Participant::where('event_id', $request->event_id)
            ->where('athlete_id', $athlete_id)
            ->update(['is_dn' => 1]);
          }else {
            Participant::where('event_id', $request->event_id)
            ->where('athlete_id', $athlete_id)
            ->update(['is_dn' => 0]);
          }
        }
      }

      sort($time);

      //Reset Medal
      Participant::where('event_id', $request->event_id)
                  ->update(['medal' => null]);

      if ((isset($time[0])) && ($time[0] != "9999999")) {
        //Emas
        Participant::where('event_id', $request->event_id)
                      ->where('final_result', $time[0])
                      ->update(['medal' => 'Emas']);
      }

      if ((isset($time[1])) && ($time[1] != "9999999")) {
        //Perak
        Participant::where('event_id', $request->event_id)
                      ->where('final_result', $time[1])
                      ->update(['medal' => 'Perak']);
      }

      if ((isset($time[2])) && ($time[2] != "9999999")) {
        //Perunggu
        Participant::where('event_id', $request->event_id)
                      ->where('final_result', $time[2])
                      ->update(['medal' => 'Perunggu']);
      }

      try{
          return redirect()
                 ->back()
                 ->withSuccess('Berhasil menghapus data');
      }
      catch(QueryException $e){
         return redirect()->back()->with(['error' => "Error."]);
      }
    }

    public function addResult (Request $request) {
        $this->validate($request, [
                  'time' => 'required|array|min:1',
                  'time.*'  => 'required|string|min:9'
        ]);

        for ($i=1; $i < 9; $i++) {
          if (isset($request->athlete_id[$i])) {
            $athlete_id[$i] = str_replace(":", "", $request->athlete_id[$i]);
          }

          $time[$i] = "0000000";
          if (isset($request->time[$i])) {
            if (!isset($request->is_dq[$i]) and !isset($request->is_dn[$i])) {
              $time[$i] = str_replace(":", "", $request->time[$i]);
              Participant::where('event_id', $request->event_id)
                            ->where('track', $i)
                            ->where('turn', $request->turn)
                            ->update(['result_time' => $time[$i]]);
            }

            if(isset($request->is_dq[$i])){
              Participant::where('event_id', $request->event_id)
                            ->where('track', $i)
                            ->where('turn', $request->turn)
                            ->update(['is_dq' => 1]);
            }else{
              Participant::where('event_id', $request->event_id)
                            ->where('track', $i)
                            ->where('turn', $request->turn)
                            ->update(['is_dq' => 0]);
            }
            if(isset($request->is_dn[$i])){
              Participant::where('event_id', $request->event_id)
                            ->where('track', $i)
                            ->where('turn', $request->turn)
                            ->update(['is_dn' => 1]);
            }else {
              Participant::where('event_id', $request->event_id)
                            ->where('track', $i)
                            ->where('turn', $request->turn)
                            ->update(['is_dn' => 0]);
            }
          }
        }

        for ($i=1; $i < 9; $i++) {
          if ($time[$i] == "0000000") {
            $time[$i] = "9999999";
          }
        }
        sort($time);

        //Reset Medal
        Participant::where('event_id', $request->event_id)
                    ->where('turn', '=', $request->turn)
                    ->update(['medal' => null]);

        if (Event::maxTurn($request->event_id) == false) {
          if ((isset($time[0])) && ($time[0] != "9999999")) {
            //Emas
            Participant::where('event_id', $request->event_id)
            ->where('turn', $request->turn)
            ->where('result_time', $time[0])
            ->update(['medal' => 'Emas']);
          }

          if ((isset($time[1])) && ($time[1] != "9999999")) {
            //Perak
            Participant::where('event_id', $request->event_id)
            ->where('turn', $request->turn)
            ->where('result_time', $time[1])
            ->update(['medal' => 'Perak']);
          }

          if ((isset($time[2])) && ($time[2] != "9999999")) {
            //Perunggu
            Participant::where('event_id', $request->event_id)
                        ->where('turn', $request->turn)
                        ->where('result_time', $time[2])
                        ->update(['medal' => 'Perunggu']);
          }
        }

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
