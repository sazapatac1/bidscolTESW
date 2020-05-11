<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function ($user) {
            Wishlist::create(['user_id' => $user->id]);
        });
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId(){
        return $this->attributes['id'];
    }

    public function getName(){
        return $this->attributes['name'];
    }

    public function getEmail(){
        return $this->attributes['email'];
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function Items(){
        return $this->hasMany(Item::class);
    }

    public function bids(){
        return $this->hasMany(Bid::class);
    }

    public function favoriteLists(){
        return $this->hasOne(Wishlist::class);
    }
}
