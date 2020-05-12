<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bid;
use App\Item;
use App\Category;
use Illuminate\Support\Facades\Mail;
use Http;

class HomeController extends Controller
{

    public function index()
    {
        //statistics
        $data["biggest_bid"] = Bid::OrderBy('bid_value','desc')->first();
        $data["mostItem_bids"] = Item::where('status','Active')->withCount('bids')->orderBy('bids_count', 'desc')->first();
        $data["mostItem_wishLists"] = Item::where('status','Active')->withCount('wishlists')->orderBy('wishlists_count', 'desc')->first();

        //Apis
        $apiCurrency = Http::get('http://www.floatrates.com/daily/cop.json');
        $cambioMoneda = $apiCurrency->json();

        $apiExercise = Http::get('http://cano.ml/public/api/routines');
        $rutinasEjercicio = $apiExercise->json();

        $data["categories"] = Category::all();
        return view('home.index', compact('cambioMoneda', 'rutinasEjercicio'))->with("data",$data);
    }

    public function info()
    {
        return view('layouts.app');
    }

    public function contact(){
        return view('home.contact');
    }

    public function about(){
        return view('home.about');
    }

    public function sendEmailContact(Request $request){
        Mail::send('emails.contact',
             array(
                 'name' => $request->name,
                 'email' => $request->email,
                 'message_user' => $request->message
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('487c74d232-512076@inbox.mailtrap.io');
               });

          return back()->with('success', @lang('homecontroller.Thank_you_for_contact_us'));
    }

}
