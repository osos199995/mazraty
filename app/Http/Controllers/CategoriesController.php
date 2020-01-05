<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function index()
    {

        $categories=Categories::all();
        return view('admin.categories.showcategories',compact('categories'));
    }


    public function store(Request $request)
    {

        $input=$request->all();
        Categories::create($input);
        Session::flash('success','Category Added Successfully');
        return redirect()->back();

    }


    public function update(Request $request, $id)
    {
        $input=$request->all();
        Categories::find($id)->update($input);
        Session::flash('success','Category Updated Successfully');
        return redirect('categories');
    }


    public function destroy($id)
    {
//        Products::where('product_categories_id',$id)->delete();
        Categories::find($id)->delete();
        Session::flash('danger','Category Deleted Successfully and products related too');
        return redirect()->back();


    }
}
