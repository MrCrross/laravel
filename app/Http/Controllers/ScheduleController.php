<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films =DB::table('films')->get();
        $schedule=DB::table('schedule')->get();
        return view('schedule.index')->with(['films'=>$films,'schedule'=>$schedule]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$id_schedule)
    {
        $data=DB::table('schedule')
            ->where('schedule.id_schedule','=', $id_schedule)
            ->join('films','schedule.ID_Film','=','films.id')
            ->join('halls','schedule.ID_Hall','=','halls.ID_Hall')
            ->select( 'halls.ID_Hall','halls.Name_Hall','halls.Price','halls.Num_Row','halls.Num_Column',
                'films.id','films.Name_Film','films.Producer','films.Country','films.Duration','films.Rating','films.Age_Limit','films.Icon','films.Description',
                'schedule.DateS','schedule.TimeS','schedule.id_schedule')
            ->get();
        $schedule=DB::table('schedule')
            ->where('schedule.ID_Film','=',$id)
            ->select('schedule.DateS','schedule.TimeS','schedule.id_schedule')
            ->get();
        return view('schedule.show')->with(['data'=>$data,'schedule'=>$schedule]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
