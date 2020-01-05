<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\ProductsResource;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiProductController extends Controller
{
    use ApiResponceTrait;
    public function index()
    {
        $posts=ProductsResource::collection(Products::paginate($this->paginateNumber));

        return $this->ApiResponce($posts) ;
    }
}
