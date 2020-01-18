<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable=([

        'title',
        'images',
        'title_ar',
        'description',
        'description_ar',
        'product_categories_id',
        'product_subcategories_id',
        'number_of_container',
        'container',
        'price',



    ]);



    public  function category(){
        return $this->belongsTo('App\Categories','product_categories_id');
    }


    public  function subcategory(){
        return $this->belongsTo('App\Subcategories','product_subcategories_id');
    }

    public  function Cart(){
        return $this->belongsTo('App\Cart','product_id');
    }
}
