<?php

namespace App\Http\Controllers;

use App\Bid;
use Illuminate\Http\Request;

class BidController extends Controller
{
      
    public function store(Request $request)
    {
        Bid::validate($request);
        Bid::create($request->only(["bid_value","item_id", "user_id"]));
        return back()->with('success','Bid done!');
    }

       
    public function showList()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Bids";
        $orderBy = 'created_at';
        $data["bids"] = Bid::orderBy($orderBy,'asc')->get();
        return view('bid.list')->with("data",$data);
        
    }

    public function editOne($id)
    {
        $bid = Bid::findOrFail($id);
        return view('bid.edit')->with('bid',$bid);
    }

    public function update(Request $request)
    {    
        $bid = Bid::findOrFail($request->bid_id);
        $bid->setBidValue($request->bid_value);
        $bid->save();
        return redirect()->route('bid.list')->with('success','Bid edited');
    }

    public function deleteOne($id)
    {
        $bid = Bid::findOrFail($id);
        $bid->delete(); 
        return redirect()->route('bid.list')->with('success','Bid deleted');
    }
    
}
