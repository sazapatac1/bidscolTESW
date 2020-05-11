<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bid;
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
