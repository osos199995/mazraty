<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\SubcategoriesResource;
use App\Subcategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiSubcategoriesController extends Controller
{
    use ApiResponceTrait;
    public function index($id)
    {
        $posts=SubcategoriesResource::collection(Subcategories::where('category_id',$id)->paginate($this->paginateNumber));

        return $this->ApiResponce($posts) ;
    }
}
