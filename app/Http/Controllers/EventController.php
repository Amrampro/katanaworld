<?php

namespace App\Http\Controllers;

use App\Events\DeleteEventEvent;
use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    //
    function __construct(Request $request)
    {   
        // je supprime tous les evenement qui sont deja passe
        $passEvent = Event::query()->where("start_at","<",now())->get();
        event(new DeleteEventEvent($passEvent));
        // dd($passEvent);
    }
    function index(Request $request){
        $allEvents = Event::orderBy("start_at","asc")->paginate($perPage = 4, $columns = ['*'], $pageName = 'pageAll');
        $activeEvents = Event::active()->orderBy("start_at","asc")->paginate($perPage = 4, $columns = ['*'], $pageName = 'pageActive');
        $passEvents = Event::inactive()->orderBy("start_at","asc")->paginate($perPage = 4, $columns = ['*'], $pageName = 'pagePass');
        $allEvents->appends(['tab'=>3]);
        $activeEvents->appends(['tab'=>2]);
        $passEvents->appends(['tab'=>1]);
        
        $tab = $request->query('tab')??2;
        
        return view("events",compact("allEvents","activeEvents","passEvents","tab"));
    }

    function show($id){
        $event = Event::findOrFail($id);
        return view("events_show",compact("event"));
    }

    function lastevent(){
        $event = Event::query()->orderBy("start_at","asc")->first();
        return redirect()->route("events.show",['event'=>$event->id]);
    }
}
