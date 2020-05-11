<?php

namespace App\Http\Controllers;
use App\Item;
use App\Bid;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use App\Interfaces\ImageStorage;
use App\Mail\WinnerMail;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            $data["subtitle"] = Category::find($id)->getName();
        } else if($option == 'state'){
            $data["items"] = Item::where('status', $id)
                            ->orderBy("id")->get();
            $data["subtitle"] = $id;
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
        $wishitem = Wishlist::where('item_id',$id)->where('user_id', Auth::user()->getId())->get();
        if($wishitem){
            $data["wishitem"] = "False";
        } else {
            $data["wishitem"] = "True";
        $data["max_bid"] = Bid::where('item_id',$id)
                            ->orderBy('bid_value','DESC')
                            ->first();
        $data["nbids"] = $data["item"]->bids->count();
        $data["comments"] = Comment::where('comments.item_id',$id)->get();
        return view('item.show')->with("data", $data);
    }

    public function showList()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Products";
        $orderBy = 'name';
        $data["items"] = Item::orderBy($orderBy,'asc')->get();
        return view('item.list')->with("data",$data);
        
    }

    public function editOne($id)
    {
        $data = []; //to be sent to the view
        $data["item"] = Item::findOrFail($id);
        $data["categories"] = Category::all();
        return view('item.edit')->with('data',$data);
    }

    public function update(Request $request)
    {
        $item = Item::findOrFail($request->item_id);
        $item->setName($request->name);
        $item->setDescription($request->description);
        $item->setStatus($request->status);
        $item->setInitial_bid($request->initial_bid);
        $item->setStart_date($request->start_date);
        $item->setFinal_date($request->final_date);
        $item->setCategory_id($request->category_id);
        $item->save();
        return redirect()->route('item.list')->with('success','Product edited');
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

    public function deleteOne($id)
    {
        $item = Item::findOrFail($id);
        //delete item image
        $storeInterface = app(ImageStorage::class);
        $storeInterface->delete($item->getImage_name());
        //delete item
        $item->delete(); 
        return redirect()->route('item.list')->with('success','Item deleted successfully');
    }
}
