<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable=([
        'random_key',
        'cart_content',
    ]);
}
