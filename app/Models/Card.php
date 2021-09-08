<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_owner_id',
        'card_number',
        'card_type',
        'card_expiration_date',
    ];

    protected $attributes = [

    ];

    public function owner(){
        return $this->belongsTo(User::class,'card_owner_id'); // On ajoute la clé étrangère si nécessaire
    }

    public function bundlesBought(){
        return $this->belongsToMany(Bundle::class,'buyer_bundles','card_id','bundle_id');
    }

    public function imagesBought(){
        return $this->belongsToMany(Image::class,'buyer_images','card_id','image_id');
    }
}
