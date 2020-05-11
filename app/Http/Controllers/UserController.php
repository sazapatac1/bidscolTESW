<?php

namespace App\Http\Controllers;

use App\User;
use App\Bid;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showList()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Users";
        $orderBy = 'id';
        $data["users"] = User::orderBy($orderBy,'asc')->get();
        return view('user.list')->with("data",$data);
        
    }

    public function editOne($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit')->with('user',$user);
    }

    public function update(Request $request)
    {                   
        $user = User::findOrFail($request->user_id);
        $user->setName($request->name);
        $user->setEmail($request->email);
        $user->save();
        return redirect()->route('user.list')->with('success','User edited');
    }

    public function deleteOne($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); 
        return back()->with('success','User deleted');
    }

    public function profile(){
        $data["title"] = "Profile";
        $data["items"] = Auth::user()->items;
        $data["bids"] = Bid::where('user_id',Auth::user()->getId())
                            ->orderBy('item_id','ASC')
                            ->get();
        return view('user.profile')->with("data",$data);
    }

    public function exportPDF(){
        $data["items"] = Auth::user()->items;
        $data["bids"] =  Bid::select('bids.bid_value','items.name', 'bids.created_at')
                            ->join('items', 'bids.item_id', '=', 'items.id')
                            ->where('bids.user_id', Auth::user()->id)
                            ->orderBy('items.name', 'ASC')
                            ->get();
        return PDF::loadView('user.pdf', compact('data'))->stream('archivo.pdf');
    }

    public function admin(){
        $data["title"] = "Admin panel";
        return view('user.admin')->with("data",$data);
    }
}