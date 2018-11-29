<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\films;
use App\schedule;

class AddScheduleController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()){
            $films = DB::table('films')
                ->select('films.id','films.Name_Film')
                ->get();
            $halls = DB::table('halls')
                ->select('halls.ID_Hall','halls.Name_Hall')
                ->get();
            $schedule = DB::table('schedule')
                ->join('films','schedule.ID_Film','=','films.id')
                ->join('halls','schedule.ID_Hall','=','halls.ID_Hall')
                ->select('schedule.id_schedule','schedule.TimeS','halls.Name_Hall','films.Name_Film')
                ->get();
            return view('add.schedule.create')->with(['schedule'=>$schedule,'films'=>$films,'halls'=>$halls]);
        }
        else {
            return view('auth.login');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'film'=> 'required|string',
            'hall' => 'required|string',
            'timeS' => 'required|string',
        ]);

        $reg = new schedule();
        $reg -> ID_Film = $request->input('film');
        $reg -> ID_Hall = $request->input('hall');
        $reg -> DateS = Carbon::now();
        $reg -> TimeS = $request->input('timeS');
        $reg -> save();

        return redirect()->route('add.schedule');
    }

    public function DelRent(Request $request)
    {
        $this->validate($request, [
            'outRent'=> 'required|string',
        ]);

        films::where('id',$request->input('outRent'))->delete();

        return redirect()->route('add.schedule');
    }

    public function DelS(Request $request)
    {
        $this->validate($request, [
            'session'=> 'required|string',
        ]);

        schedule::where('id_schedule',$request->input('session'))->delete();

        return redirect()->route('add.schedule');
    }
}
