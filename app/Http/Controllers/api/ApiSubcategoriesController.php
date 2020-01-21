<?php

namespace App\Http\Controllers\api;

use App\Categories;
use App\Http\Resources\SubcategoriesResource;
use App\Subcategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiSubcategoriesController extends Controller
{
//    use ApiResponceTrait;
    public function index(Categories  $category)
    {

        $subCategories=SubcategoriesResource::collection(Subcategories::where('category_id',$category->id)->paginate(2));
         return response()->json(['data'=>$subCategories]);
    }
}
