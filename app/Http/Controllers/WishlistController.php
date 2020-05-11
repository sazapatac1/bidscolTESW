<?php

namespace App\Http\Controllers;
use App\User;
use App\Item;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user()->getId();
        $wishlist = Wishlist::where('user_id',$user)->get();
        if (!$wishlist) {
            $message = 'You don´t have any wishes yet';
            return view('wishlist.show')->with(["message", $message]);
        }
        return view('wishlist.show')->with(['wishlist' => $wishlist]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Wishlist::validate($request);            
        Wishlist::create($request->only(["user_id","item_id"]));
            
        return back()->with('success','Added to your wishlist');
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item, User $user)
    {

    }

    public function deleteOne($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete(); 
        return back()->with('success','Item deleted from Wishlist');
    }

}
