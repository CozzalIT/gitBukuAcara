<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Athlete;
use App\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $athletes = Athlete::all();
        $events = Event::all();
        return view('dashboard.index', [
          'athletes' => $athletes,
          'events' => $events
        ]);
    }
}
