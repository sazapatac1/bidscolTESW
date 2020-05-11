<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Wishlist extends Model
{
    protected $fillable = [
        'user_id',
    ];
   public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function items()
   {
       return $this->belongsToMany(Item::class);
   }
}
