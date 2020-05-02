<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data["title"] = "Products | Bidscol";
        $data["items"] = Item::orderBy("id")->get();

        return view('item.index')->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data["title"] = "Create item";

        return view('item.create')->with("data", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Item::validate($request);
        Item::create($request->only(["name","description","status","initial_bid","start_date","final_date"]));
        return back()->with('success','Item created successfully!');
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
        $data["title"] = "Product";
        $data["item"] = Item::find($id);
        $bids = $data["item"]->bids;
        $data["max_bid"] = $data["item"]->getInitial_bid();
        foreach ($bids as $bid){
            if($bid->bid_value > $data["max_bid"]){
                $data["max_bid"] = $bid->bid_value;
            }
        }
        return view('item.show')->with("data", $data);
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
        $data["title"] = "Edit user";
        $data["item"]=Item::find($id);
        return view('item.edit')->with("data", $data);
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
        User::validate($request);
        $user->update($request->all());
        return redirect()->route('item.index')->with('succes','Item update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);
        return redirect()->route('home.index');
    }
}
