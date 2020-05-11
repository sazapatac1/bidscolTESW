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
    public function index()
    {
        $user = Auth::id();
        $user_id = User::find($user);
        $wish = $user_id->wishlist->items->get();
        if (count($wish) == 0) {
            $data = [];
            $data["wishlist"] = $wish;
            $data["message"] = 'You don´t have any wishes yet';
            return view('wishlist.index')->with(["data", $data]);
        }
        return view('wishlist.index')->with(['wishlist' => $wish]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $wish = $user->wishlist->items()->get();
        return view('wishlist.show')->with('wishlist', $wish);
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
        $request->user()->wishlist->items()->attach($item->id);
        $user= $request->user()->id;
        $wishlist = Wishlist::where('user_id', '=', $user)->get();
        return back()->with('wishlist', $wishlist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $request->user()->wishlist->items()->detach($id);
        $user_id = Auth::id();
        $user = User::find($user_id);
        $wish = $user->wishlist->items()->get();
        return back()->with('wishlist', $wish);
    }
}
