<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;

class ApiSearchController extends Controller
{
    use ApiResponceTrait;
    public function Search(Request $request , $product_name)
    {
        
       $search=Products::where('title','like','%' . $product_name . '%')->orwhere('title_ar','like','%' . $product_name . '%')->orderBy('title', 'asc')->get();

       return $this->ApiResponce($search);


    
    }

}
