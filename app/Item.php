<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Item extends Model
{
    // attributes id, name, description, status, initial_bid, current_bid, winner, start_date, final_date, created_at, updated_at
    // foreign_key category, user
    protected $fillable = ['name', 'description', 'status','initial_bid', 'image_name', 'start_date','final_date', 'category_id', 'user_id'];


    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'initial_bid' => 'required | numeric | gt:0',
            'item_image' => 'required',
            'start_date' => 'required | date',
            'final_date' => 'required | date'
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

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function setStatus($status)
    {
        $this->attributes['status'] = $status;
    }

    public function getInitial_bid()
    {
        return $this->attributes['initial_bid'];
    }

    public function setInitial_bid($initial_bid)
    {
        $this->attributes['initial_bid'] = $initial_bid;
    }

    public function getImage_name(){
        return $this->attributes['image_name'];
    }

    public function setImage_name($image_name)
    {
        $this->attributes['image_name'] = $image_name;
    }

    public function getWinner()
    {
        return $this->attributes['winner'];
    }

    public function setWinner($winner)
    {
        $this->attributes['winner'] = $winner;
    }

    public function getStart_date()
    {
        return $this->attributes['start_date'];
    }

    public function setStart_date($start_date)
    {
        $this->attributes['start_date'] = $start_date;
    }

    public function getFinal_date()
    {
        return $this->attributes['final_date'];
    }

    public function setFinal_date($final_date)
    {
        $this->attributes['final_date'] = $final_date;
    }

    public function getUser_id()
    {
        return $this->attributtes['user_id'];
    }

    public function setCategory_id($category_id)
    {
        $this->attributes['category_id'] = $category_id;
    }
    public function getCreated_at()
    {
        return $this->attributes['created_at'];
    }

    public function getDaysLeft()
    {
        $now = date("Y-m-d");
        $diff = abs(strtotime($this->attributes['final_date']) - strtotime($now));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $days;
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function bids(){
        return $this->hasMany(Bid::class);
    }

    public function favoritesLists(){
        return $this->belongsToMany(FavoritesList::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
