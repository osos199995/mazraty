<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable=[
      'name',
      'name_ar',
      'image',
    ];

    public function subCategories(){
        return $this->hasMany(Subcategories::class,'category_id');
    }


}
