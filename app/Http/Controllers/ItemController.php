<?php

namespace App\Http\Controllers;
use App\Item;
use App\Bid;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use App\Interfaces\ImageStorage;
use App\Mail\WinnerMail;
use Illuminate\Support\Facades\Mail;

class ItemController extends Controller
{
    public function index($option = 'all', $id = 0)
    {
        $data = [];
        $data["title"] = "Products";
        $data["categories"] = Category::all();
        if($option == 'all'){
            $data["items"] = Item::orderBy("id")->get();
            $data["subtitle"] = "All products";
        } else if($option == 'category'){  
            $data["items"] = Item::where('category_id', $id)
                            ->orderBy("id")->get();
            $data["subtitle"] = $data["items"][0]->category->getName();
        } else if($option == 'state'){
            $data["items"] = Item::where('status', $id)
                            ->orderBy("id")->get();
            $data["subtitle"] = $data["items"][0]->getStatus();
        }
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
        $itemData = $request->except('_token', 'item_image');
        $itemData['image_name'] = $request->item_image->getClientOriginalName();        
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request, $itemData['image_name']);
        Item::validate($request);
        Item::create($itemData);
        return back()->with('success','Item created successfully!');
    }

    public function show($id)
    {
        $data = [];
        $data["title"] = "Product";
        $data["item"] = Item::find($id);
        $data["max_bid"] = Bid::where('item_id',$id)
                            ->orderBy('bid_value','DESC')
                            ->first();
        $data["nbids"] = $data["item"]->bids->count();
        $data["comments"] = Comment::where('comments.item_id',$id)->get();
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
        $winner= Bid::where('item_id',$request->item_id)
                ->orderBy('bids.bid_value','DESC')
                ->first();
        $item->setWinner($winner->user->getId());
        $item->save();
        Mail::to($winner->user->getEmail())->send(new WinnerMail);
        return back()->with('succes','Item finished successfully');
    }

    public function listByCategory($id)
    {
        $data = [];
        $data["categories"] = Category::all();
        $data["items"] = Item::where('category_id', $id)
                        ->orderBy("id")->get();
        return view('item.listByCategory')->with("data", $data);
    }

    public function listByState($id)
    {
        $data = [];
        $data["categories"] = Category::all();
        $data["items"] = Item::where('status', $id)
                        ->orderBy("id")->get();
        return view('item.listByCategory')->with("data", $data);
    }

    public function destroy($id)
    {
        Item::destroy($id);
        return redirect()->route('home.index');
    }
}
