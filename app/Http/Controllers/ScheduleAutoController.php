<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScheduleAutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()) {
            $films = DB::table('films')
                ->select('films.id', 'films.Name_Film', 'films.Duration')
                ->get();
            $halls = DB::table('halls')
                ->select('halls.ID_Hall', 'halls.Name_Hall')
                ->get();
            $schedule = DB::table('schedule')
                ->select('schedule.ID_Hall', 'schedule.ID_Film', 'schedule.TimeS')
                ->get();

            return view('add.schedule.auto')->with(['schedule' => $schedule, 'films' => $films, 'halls' => $halls]);
        }
        else {
            return view('auth.login');
        }
    }

    public function store(Request $request)
    {

    }


}
