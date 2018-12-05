<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\tickets;

class MailController extends Controller {

    public function mail(Request $request){
        $schedule=DB::table('schedule')
            ->where('schedule.id_schedule','=',$request->id_schedule)
            ->select('schedule.DateS','schedule.TimeS')
            ->get();
        $tickets=DB::table('tickets')
            ->where('tickets.id_schedule','=',$request->id_schedule)
            ->select('tickets.Row','tickets.Column')
            ->get();
        foreach ($schedule as $time){
            $dateS=$time->DateS;
            $timeS=$time->TimeS;
        }
        $mail=$request->email;
        $rows=$request->Row;
        $columns=$request->Column;
        $content='';
        $idr=-1;
        $idc=-1;
        $flag=true;
        foreach ($rows as $row){
            $idr++;
            foreach ($columns as $col){
                $idc++;
                if($idr==$idc){
                    foreach ($tickets as $ticket){
                        if(($ticket->Row == $row)&&($ticket->Column == $col)){
                            $flag=false;
                        }
                    }
                    if($flag==true){
                        $content .= 'Дата: '.$dateS.' Время: '.$timeS.' Ряд: '.$row.' Место: '.$col;

                        $reg = new tickets();
                        $reg -> id_schedule = $request->id_schedule;
                        $reg -> Row = $row;
                        $reg -> Column = $col;
                        $reg -> save();
                    }
                }
            }
        }

        $this->sendmail($mail,$content);
        return response()->json('Чек отправлен');
    }

    public function sendmail($mail,$content){
        $data = ['name'=>"KinoKill",];
        Mail::send(['mail', $content], $data, function($message) use ($mail) {
            $message->to($mail, 'Вы')->subject('Ваш чек');
            $message->from('KinoKill@kino.com','KinoKill');
        });
//        Mail::raw($data->content,function ($message) use ($mail) {
//            $message->to($mail, 'Вы')->subject('Ваш чек');
//            $message->from('KinoKill@kino.com', 'KinoKill');
//        });
    }
}