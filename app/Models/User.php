<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected $attributes =[
    // default value of column here
    // ]

    /**
     * One to One User -> subscription
    */
     public function subscription(){
         return $this->hasOne(Subscription::class,'user_id');
     }

    public function cards(){
        return $this->hasMany(Card::class,'card_owner_id');
    }

    public function creations(){
        return $this->hasMany(Image::class,'artiste_id');
    }
    public function imagesOwned(){
        return $this->belongsToMany(Image::class,'buyer_images','buyer_id','image_id');
    }

    public function bundlesBought(){
        return $this->belongsToMany(Bundle::class,'buyer_bundles','buyer_id','bundle_id');
    }
}
