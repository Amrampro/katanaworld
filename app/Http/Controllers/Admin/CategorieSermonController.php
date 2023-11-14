<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategorySermon;
use App\Models\CategorySermonRequest;
use Illuminate\Http\Request;

class CategorieSermonController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorySermons = CategorySermon::query()->get();
        return view("admin.category_sermons.index",compact("categorySermons"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.category_sermons.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
	 */
    public function store(Request $request)
    {
        $request->validate([
            'titre'=>'required|unique:category_sermons,titre',
            "description"=>'required|string'
        ]);
        $categorieSermon = new CategorySermon();
        $categorieSermon->titre = $request->titre;
        $categorieSermon->description = $request->description;
     
        $categorieSermon->save();
        return redirect()->route("admin.sermonCategories.index")->with("messages.info","Categorie sermon cree avec success");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $categorySermon = CategorySermon::findOrFail($id);
        $e =  view("admin.category_sermons.edit",compact("categorySermon"))->render();
        return $e;
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
        $categorieSermon = CategorySermon::findOrFail($id);
    
        $categorieSermon->titre = $request->titre;
        $categorieSermon->description = $request->description;
       
        $categorieSermon->save();
        return redirect()->route("admin.sermonCategories.index")->with("messages.info","La categorie de sermon à été supprimé avec success" );
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
        $categorieSermon = CategorySermon::findOrFail($id);
        $categorieSermon->delete();
        return redirect()->back()->with("messages.info","Category sermon Supprimer avec success");
    }
}
