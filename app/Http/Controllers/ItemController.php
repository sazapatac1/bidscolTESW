<?php

namespace App\Http\Controllers;
use App\Item;
use App\Bid;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $data = [];
        $data["title"] = "Products";
        $data["items"] = Item::orderBy("id")->get();

        return view('item.index')->with("data", $data);
    }

    public function create()
    {
        $data = [];
        $data["title"] = "Publish your product";
        $data["categories"] = Category::all();

        return view('item.create')->with("data", $data);
    }

    public function store(Request $request)
    {
        Item::validate($request);
        Item::create($request->only(["name","description","status", "initial_bid", "start_date", "final_date", "category_id", "user_id"]));
        return back()->with('success','Item created successfully!');
    }

    public function show($id)
    {
        $data = [];
        $data["title"] = "Product";
        $data["item"] = Item::find($id);
        $data["max_bid"] = Bid::select('bids.bid_value','users.name')
                            ->join('users', 'bids.user_id','=','users.id')
                            ->where('bids.item_id',$id)
                            ->orderBy('bids.bid_value','DESC')
                            ->first();
        $data["nbids"] = Item::find($id)->bids->count();
        $data["comments"] = Comment::select('comments.description', 'users.name', 'comments.user_id', 'comments.created_at')
                            ->join('users', 'comments.user_id','=','users.id')
                            ->where('comments.item_id',$id)
                            ->get();
        return view('item.show')->with("data", $data);
    }

    public function edit($id)
    {
        $data = [];
        $data["title"] = "Edit user";
        $data["item"]=Item::find($id);
        return view('item.edit')->with("data", $data);
    }

    public function update(Request $request, $id)
    {
        User::validate($request);
        $user->update($request->all());
        return redirect()->route('item.index')->with('succes','Item update successfully');
    }

    public function finishAuction(Request $request)
    {
        $item = Item::find($request->item_id);
        $item->setStatus('Finished');
        $winner= Bid::select('users.id')
                ->join('users', 'bids.user_id','=','users.id')
                ->where('bids.item_id',$request->item_id)
                ->orderBy('bids.bid_value','DESC')
                ->first();
        $item->setWinner($winner->id);
        $item->save();
        return back()->with('succes','Item finished successfully');
    }

    public function destroy($id)
    {
        Item::destroy($id);
        return redirect()->route('home.index');
    }
}
