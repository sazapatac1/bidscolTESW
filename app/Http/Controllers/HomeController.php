<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Bid;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
    }

    public function info()
    {
        return view('layouts.app');
    }

    public function profile(){
        $data["title"] = "Profile";
        $data["items"] = User::find(Auth::user()->id)->items;
        $data["bids"] =  User::find(Auth::user()->id)->bids;
        return view('home.profile')->with("data",$data);
    }
}
