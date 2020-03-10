<?php

namespace App\Http\Controllers;
use App\FavoritesList;
use Illuminate\Http\Request;

class FavoritesListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data["title"] = "Show favorites lists";
        $data["favoritesLists"] = FavoritesList::orderBy("id")->get();

        return view('favoritesList.index')->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data["title"] = "Create favorites list";

        return view('favoritesList.create')->with("data", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //FavoritesList::validate($request);
        FavoritesList::create();
        return back()->with('success','Favorites List created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $data["title"] = "Show favorites list";
        $data["favoritesList"] = FavoritesList::find($id);

        return view('favoritesList.show')->with("data", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data["title"] = "Edit favorites list";
        $data["favoritesList"]=FavoritesList::find($id);
        return view('favoritesList.edit')->with("data", $data);
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
        FavoritesList::validate($request);
        $favoritesList->update($request->all());
        return redirect()->route('favoritesList.index')->with('succes','Favorites List update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FavoritesList::destroy($id);
        return redirect()->route('home.index');
    }
}
