<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Bid extends Model
{
    //attributes id, bid_value, created_at, updated_at
    //foreing key users, items,
    protected $fillable = ['bid_value', 'user_id', 'item_id'];

    public static function validate(Request $request){
        $request->validate([
            "bid_value" => "required|numeric|gt:0",
            "user_id" => "required",
            "item_id" => "required"
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getBidValue()
    {
        return $this->attributes['bid_value'];
    }

    public function setBidValue($val)
    {
        $this->attributes['bid_value'] = $val;
    }

    public function getCreated_at()
    {
        return $this->attributes['created_at'];
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}

