<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoritesList extends model
{
    // attributes id, created_at, updated_at
    // foreign_key items, user

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getCreatet_at()
    {
        return $this->attributes['createt_at'];
    }

    public function items(){
        return $this->hasMany(Item::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}