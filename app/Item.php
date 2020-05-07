<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class Item extends Model
{
    // attributes id, name, description, status, initial_bid, current_bid, winner, start_date, final_date, created_at, updated_at
    // foreign_key category, user
    protected $fillable = ['name', 'description', 'status','initial_bid','current_bid','start_date','final_date', 'category_id', 'user_id'];
    private $API_url_eur = '';

    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'initial_bid' => 'required | numeric | gt:0',
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

    public function getCurrent_bid()
    {
        return $this->attributes['current_bid'];
    }

    public function getCurrent_bid_cop()
    {
        $bid = $this->attributes['current_bid'];
        $client = new Client([
            'base_uri' => 'https://api.cambio.today/v1/quotes/USD/COP/json?quantity=1&key=4339|2TE63aa^nfxqKvSYe3f9oKaPn_jjsbw9',
            'timeout' => 2.0,
        ]); 

        $response = $client->request('GET', '');
        $contents = json_decode($response->getBody()->getContents());
        foreach ($contents as $content){
            $value = $content['value'];
        }
        $bid = $bid * $value;
    }

    public function getCurrent_bid_eur()
    {
        $bid = $this->attributes['current_bid'];
    }

    public function setCurrent_bid($current_bid)
    {
        $this->attributes['current_bid'] = $current_bid;
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
