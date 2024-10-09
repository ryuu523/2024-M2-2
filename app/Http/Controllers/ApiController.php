<?php

namespace App\Http\Controllers;

use App\Models\Dispatche;
use App\Models\Event;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function events_approval(Request $request){
        $event_id=$request->event_id;
        $worker_id=$request->worker_id;
        $dispatche=Dispatche::where("event_id",(int)$event_id)->where("worker_id",(int)$worker_id)->first();
        if(!$dispatche){
            return response()->json(["error"=>"data not found"],404);
        }
        $dispatche->update(["is_approval"=>true]);
        return response()->json(["status"=>"success"],200);
    }
    public function get_events(Request $request){
        $worker_id=$request->worker_id;
        $date=$request->data;
        $place=$request->place;
        $title=$request->title;
        if(!$worker_id){
            return response()->json(["error"=>"worker_id not assignment"],404);
        }
        $event_ids=Dispatche::where("worker_id",$worker_id)->pluck("event_id");
        $events=Event::whereIn("event_id",$event_ids);
        if($date){
            $events->whereDate("date",$date);
        }
        if($place){
            $events->where("place",$place);
        }
        if($title){
            $events->where("name","like","%$title%");
        }
        $events=$events->get()->toArray();
        if(!$events){
            return response()->json(["error"=>"data not found"],404);
        }
        return response()->json($events,200);
    }
}
