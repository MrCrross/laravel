<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = DB::table('films')
            ->get();
        return view('films.index')->with(['films'=>$films]);
    }

    public function show($id)
    {
        $data=DB::table('films')
            ->find($id);
        $schedule=DB::table('schedule')
            ->where('schedule.ID_Film','=',$id)
            ->select('schedule.TimeS','schedule.id_schedule')
            ->get();
        if(Auth::user()) {
            $userRole = Auth::user()->id;
            $role = DB::table('users')->find($userRole);
            if($role->role == 1) {
                return view('films.showAdmin')->with(['data' => $data, 'schedule' => $schedule]);
            }
            else { return view('films.show')->with(['data' => $data, 'schedule' => $schedule]); }
        }
        else { return view('films.show')->with(['data' => $data, 'schedule' => $schedule]); }
    }

}