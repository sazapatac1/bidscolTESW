<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Item as ItemResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;
use App\Category;

class ItemApi extends Controller
{
    public function index()
    {
        return ItemResource::collection(Item::where("category_id",1)->get());
    }

    public function show($id)
    {
        return new ItemResource(Item::findOrFail($id));
    }
}
