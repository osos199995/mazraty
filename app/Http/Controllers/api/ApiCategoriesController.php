<?php

namespace App\Http\Controllers\api;

use App\Categories;
use App\Http\Resources\CategoriesResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiCategoriesController extends Controller
{
    use ApiResponceTrait;
    public function index()
    {
        $posts=CategoriesResource::collection(Categories::paginate($this->paginateNumber));

        return $this->ApiResponce($posts) ;
    }
}
