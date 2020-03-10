<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

class Category extends Model
{
    //attributes id, name, price, created_at, updated_at
    protected $fillable = ["title"];

    public static function validate(Request $request){
        $request->validate([
            "title" => "required"
        ]);
    }

    public function items()
    {
        // return $this->hasMany("App/Item");
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['title'];
    }

    public function setName($name)
    {
        $this->attributes['title'] = $name;
    }

}
