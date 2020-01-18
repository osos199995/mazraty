<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=([
        'product_id',
        'user_id',
        'qty',
    ]);
    public  function Cart(){
        return $this->belongsTo('App\Products','product_id');
    }
}
