<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\SearchRequestForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;

class ApiSearchController extends Controller
{
    use ApiResponceTrait;
    public function Search(SearchRequestForm $request)
    {
        
       $search=Products::where('title','like','%' . $request->keyword . '%')->orwhere('title_ar','like','%' . $request->keyword . '%')->orderBy('title', 'asc')->get();

       return $this->ApiResponce($search);


    
    }

}
