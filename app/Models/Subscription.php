<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'users',
        'subscription_date_start',
        'subscription_date_end',
        'remaining_credit',
    ];

    protected $attributes = [

    ];

    public function user(){
        return $this->belongsTo(User::class); // On ajoute la clé étrangère si nécessaire
    }

    
}
