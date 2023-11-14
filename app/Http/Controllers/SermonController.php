<?php

namespace App\Http\Controllers;

use App\Models\CategorySermon;
use App\Models\Sermon;
use Illuminate\Http\Request;

class SermonController extends Controller
{
    //
    function __construct()
    {

    }
    function index(Request $request){
        $currentCat = $request->query('category');
        $sermons = Sermon::query()->orderBy('id', 'desc')->when($currentCat,function($query)use($currentCat){
            $query->whereHas('categorySermon',function($builder)use($currentCat){
                $builder->where('titre',$currentCat);
            });
        })->paginate(6)->fragment("content");
        $categories  = CategorySermon::query()->get();
        return view("sermons",compact("sermons","categories","currentCat"));
    }

    function show($id){
        $sermon = Sermon::findOrFail($id);
        $other = Sermon::query()->get()->sortByDesc(function($elt)use ($id){return $elt->id==$id;});
        return view("sermons_show",compact("sermon","other"));
    }
}
