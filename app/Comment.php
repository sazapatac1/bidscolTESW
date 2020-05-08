<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Comment extends Model
{
    //attributes id, description, created_at, updated_at
    //foreign_key item_id, user_id
    protected $fillable = ['description','user_id','item_id'];

    public static function validate(Request $request){
        $request->validate([
            "description" => "required",
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

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($desc)
    {
        $this->attributes['description'] = $desc;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getItemId()
    {
        return $this->attributes['item_id'];
    }

    public function setItemId($item_id)
    {
        $this->attributes['item_id'] = $item_id;
    }

    public function getCreated_at()
    {
        return $this->attributes['created_at'];
    }

    public function producto(){
        return $this->belongsTo(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
