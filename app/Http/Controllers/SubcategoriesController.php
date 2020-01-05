<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use App\Subcategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubcategoriesController extends Controller
{
    public function index()
    {
        $categories=Categories::all();
        $subcategories=Subcategories::all();

        return view('admin.subcategories.showsubcategories',compact('subcategories','categories'));
    }


    public function store(Request $request)
    {

        $input=$request->all();

        if($file=$request->file('image')){
            $name=time().$file->getClientOriginalName();
            $file->move('subcategories',$name);
            $input['image']=$name;
        }
        Subcategories::create($input);
        Session::flash('success','subcategory Added Successfully');
        return redirect()->back();

    }


    public function update(Request $request, $id)
    {
        $input=$request->all();
        if($file=$request->file('image')){
            $name=time().$file->getClientOriginalName();
            $file->move('subcategories',$name);
            $input['image']=$name;
            Subcategories::find($id)->update([
                'image'=>$name,
                'name'=>$request->name,
                'name_ar'=>$request->name_ar,
                'description'=>$request->description,
                'description_ar'=>$request->description_ar,
                'category_id'=>$request->category_id,
            ]);
        }
        $name=Subcategories::find($id);
        $name=$name->image;
        Subcategories::find($id)->update([
            'image'=>$name,
            'name'=>$request->name,
            'name_ar'=>$request->name_ar,
            'description'=>$request->description,
            'description_ar'=>$request->description_ar,
            'category_id'=>$request->category_id,
        ]);
        Session::flash('success','subcategory Updated Successfully');
        return redirect('subcategory');
    }


    public function destroy($id)
    {
       $product= Products::where('product_categories_id',$id)->get();
       if ($product){
           Products::where('product_categories_id',$id)->delete();
       }
        Subcategories::find($id)->delete();
        Session::flash('danger','subcategory Deleted Successfully and products related too');
        return redirect()->back();


    }
}
