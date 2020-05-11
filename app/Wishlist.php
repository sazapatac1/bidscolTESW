<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use Illuminate\Http\Request;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id', 'item_id',
    ];

    public static function validate(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'item_id' => 'required'
        ]);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function item()
    {
       return $this->belongsTo(Item::class);
    }
}
