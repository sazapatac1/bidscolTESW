<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

class Comment extends Model
{
    //attributes id, description, rating, id_item, item_id, created_at, updated_at
    protected $fillable = ['description', 'rating'];

    public static function validate(Request $request){
        $request->validate([
            "description" => "required",
            "rating" => "required | numeric|gt:0"
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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($desc)
    {
        $this->attributes['description'] = $desc;
    }

    public function getRating()
    {
        return $this->attributes['rating'];
    }

    public function setRating($calif)
    {
        $this->attributes['rating'] = $calif;
    }

    public function producto(){
        return $this->belongsTo(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
