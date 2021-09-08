<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;

    protected $fillable = [
        'bundle_type',
    ];

    //Bundle type info => plus simple à faire en json
    public static $bundleInfos = [
        'basic' => [
            'price' => 10,
            'duration' => 'P30D',
            'credit' => 10,
        ],
        'eco' => [
            'price' => 20,
            'duration' => 'P70D',
            'credit' => 30,
        ],
        'premium' => [
            'price' => 40,
            'duration' => 'P365D',
            'credit' => 400,
        ],
        'error' => [
            'price' => 0,
            'duration' => 'P0D',
            'credit' => 0,
        ]
    ];
    protected function fillBundle($value){
          
            $this->attributes['bundle_type'] = $value;
            $this->attributes['bundle_price'] = self::$bundleInfos[$value]['price'];
            $this->attributes['bundle_duration'] =  self::$bundleInfos[$value]['duration'];
            $this->attributes['bundle_credit'] = self::$bundleInfos[$value]['credit'];
        
    }
    //Setting the bundle type will automatically set price and credit
    public function setBundleTypeAttribute($value) {
     
        switch ($value){
            case 'basic':
                $this->fillBundle('basic');
                break;
            case 'eco':  
                $this->fillBundle('eco');
                break;
            case 'premium': 
                $this->fillBundle('premium');
                break;
            default:
                $this->fillBundle('error');
                break;
        }
        
    }
    //Getting human readable duration
    public function getBundleDurationAttribute($value){ 
        return "".CarbonInterval::make($value)->format('%d days');
    }

    public function bundlesBuyers(){
        return $this->belongsToMany(User::class,'buyer_bundles','bundle_id','buyer_id');
    }

    public function bundlesPayments(){
        return $this->belongsToMany(Card::class,'buyer_bundles','bundle_id','card_id');
    }

    //No need pf update at and created_at
  
}
