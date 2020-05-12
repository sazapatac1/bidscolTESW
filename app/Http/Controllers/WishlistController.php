<?php

namespace App\Http\Controllers;
use App\User;
use App\Item;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

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

    public function store(Request $request)
    {
        Wishlist::validate($request);            
        Wishlist::create($request->only(["user_id","item_id"]));
            
        return back()->with('success','Added to your wishlist');
    }

    public function deleteOne($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete(); 
        return back()->with('success','Item deleted from Wishlist');
    }

}
