<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable=([
        'product_id',
        'offer_currency',
    ]);


    public  function product(){
        return $this->belongsTo('App\Products','product_id');
    }


   

}
