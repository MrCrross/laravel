<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()){

            $userRole = Auth::user()->id;
            $role = DB::table('users')->find($userRole);

            if($role->role == 0){
                $films =DB::table('films')->get();
                return view('home')->with(['films'=>$films]);
            }
            else{
                $films =DB::table('films')->get();
                return view('homeAdmin')->with(['films'=>$films]);
                }
        }
        else{
            $films =DB::table('films')->get();
            return view('home')->with(['films'=>$films]);
        }
    }
}
