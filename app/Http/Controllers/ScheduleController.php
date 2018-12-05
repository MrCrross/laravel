<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films =DB::table('films')
            ->get();
        $schedule=DB::table('schedule')
            ->get();
        return view('schedule.index')->with(['films'=>$films,'schedule'=>$schedule]);
    }

    public function show($id,$id_schedule)
    {
        $data=DB::table('schedule')
            ->where('schedule.id_schedule','=', $id_schedule)
            ->join('films','schedule.ID_Film','=','films.id')
            ->join('halls','schedule.ID_Hall','=','halls.ID_Hall')
            ->select( 'halls.ID_Hall','halls.Name_Hall','halls.Price','halls.Price1','halls.Num_Row','halls.Num_Column',
                'films.id','films.Name_Film','films.Producer','films.Country','films.Genres','films.Duration','films.Rating','films.Age_Limit','films.Icon','films.Description',
                'schedule.DateS','schedule.TimeS','schedule.id_schedule')
            ->get();
        $schedule=DB::table('schedule')
            ->where('schedule.ID_Film','=',$id)
            ->select('schedule.DateS','schedule.TimeS','schedule.id_schedule')
            ->get();
        $tickets = DB::table('tickets')
            ->where('tickets.id_schedule','=', $id_schedule)
            ->select('tickets.id_schedule','tickets.Row','tickets.Column')
            ->get();
        return view('schedule.show')->with(['data'=>$data,'schedule'=>$schedule,'tickets'=>$tickets]);
    }

}
