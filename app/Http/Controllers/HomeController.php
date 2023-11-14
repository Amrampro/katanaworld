<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\Sermon;
use App\Models\Testimony;
use App\Models\Prayer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // methodes qui gere la page d'acceuil (la route / )
    function index(){
        // traitements
        $sermons = Sermon::orderBy("created_at","desc")->get()->take(3);
        $events = Event::orderBy("created_at","desc")->get()->take(3);
        $testimonies=Testimony::take(4)->get();
        $lastEvent = Event::query()->oldest("start_at")->whereDate("start_at",">",now())->first();
        $lastEventDate = $lastEvent?->start_at??now();
        $lastEventDate = $lastEventDate->format("M d, Y h:i:s");
        $properties = Property::query()
			->leftJoin(PropertyValue::getModel()->getTable(),function($join){
				$join->on("property_values.property_id","properties.id");
			})->select('value',"properties.name")->get()->keyBy("name");

        return view("index",compact("sermons","events","lastEvent","lastEventDate","testimonies","properties"));
    }

    // Route contacts
    function contact(){
        return view("contact");
    }

    // Route about
    function about(){
        return view("about");
    }

    function free_bible(){
        return view("free_bible");
    }

    function prayer(){
        return view('prayer');
    }

    function prayer_store(Request $request){
        $request->validate([
            'name'=> 'required',
            'topic'=> 'required'
        ]);

        $prayer=new Prayer;
        $prayer->name=$request->name;
        $prayer->email=$request->email;
        $prayer->adress=$request->adress;
        $prayer->tel=$request->tel;
        $prayer->topic=$request->topic;
        $prayer->save();

        return redirect('prayer')->with('success', 'Submitted');
    }
}
