<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bid;
use App\Item;
use App\Category;
use Http;

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
        //statistics
        $data["biggest_bid"] = Bid::OrderBy('bid_value','desc')->first();
        $data["mostItem_bids"] = Item::where('status','Active')->withCount('bids')->orderBy('bids_count', 'desc')->first();
        $data["mostItem_wishLists"] = Item::where('status','Active')->withCount('wishlists')->orderBy('wishlists_count', 'desc')->first();

        //Apis
        $apiCurrency = Http::get('http://www.floatrates.com/daily/cop.json');
        $cambioMoneda = $apiCurrency->json();

        $apiExercise = Http::get('http://18.206.205.89/public/api/routines');
        $rutinasEjercicio = $apiExercise->json();

        $data["categories"] = Category::all();
        return view('home.index', compact('cambioMoneda', 'rutinasEjercicio'))->with("data",$data);
    }

    public function info()
    {
        return view('layouts.app');
    }

}
