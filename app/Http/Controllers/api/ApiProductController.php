<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\ProductsResource;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiProductController extends Controller
{
    use ApiResponceTrait;
    public function index($id)
    {

        $products=ProductsResource::collection(Products::where('product_subcategories_id',$id->id)->paginate($this->paginateNumber));

        return response()->json(['data'=>$products]);
    }
}
