<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Item as ItemResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Item;

class ItemApi extends Controller
{
    public function index()
    {
        return ItemResource::collection(Item::all());
    }

    public function show($id)
    {
        return new ItemResource(Item::findOrFail($id));
    }
}
