<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    protected $fillable=[
        'name',
        'name_ar',
        'category_id',
        'image',
        'description',
        'description_ar',
    ];


    public  function Subcategories(){
        return $this->belongsTo('App\Categories','category_id');
    }
}
