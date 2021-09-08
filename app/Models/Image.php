<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'artiste_id',
        'image_name',
        'image_path_full',
        'image_path_snippet',
        'image_status',
        'image_price',
        'image_description',
    ];

    public function imagesOwners(){
        return $this->belongsToMany(User::class,'buyer_images','image_id','buyer_id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'category_images','image_id','category_id');
    }

    public function artiste(){
        return $this->belongsTo(User::class,'artiste_id');
    }

    public function cardsPayement(){
        return $this->belongsToMany(Card::class,'buyer_images','image_id','card_id');
    }
}
