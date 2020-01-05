<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Products;
use App\Subcategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('admin.products.index', compact('products'));
        //
    }

    public function create()
    {
        $subcategories = Subcategories::all();
        $categories = Categories::all();
        return view('admin.products.create', compact('categories', 'subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpg,png,jpeg',
            'description' => 'required',
            'description_ar' => 'required',
        ]);

        if ($request->hasfile('images')) {

            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/products/', $name);
                $data[] = $name;
            }
        }

        $images = json_encode($data);
//dd($request->all());
        Products::create([
            'images' => $images,
            'title' => $request->title,
            'title_ar' => $request->title_ar,
            'description' => $request->description,
            'description_ar' => $request->description_ar,
            'product_categories_id'=>$request->product_categories_id,
            'product_subcategories_id'=>$request->product_subcategories_id,
            'number_of_container'=>$request->number_of_container,
            'price'=>$request->price,
            'container'=>$request->container,
        ]);


        Session::flash('success', 'products Added Successfully');
        return redirect('productsss');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Products::find($id);

        return view('admin.products.show', compact('products'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::find($id);
        $categories = Categories::all();
        $subcategories=Subcategories::all();
        return view('admin.products.edit', compact('products', 'categories','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpg,png,jpeg',
            'description' => 'required',
            'description_ar' => 'required',
        ]);


        if ($request->hasfile('images')) {

            foreach ($request->file('images') as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/products/', $name);
                $data[] = $name;
                $images = json_encode($data);

                $product= Products::find($id);
                $product->update([
                    'images' => $images,
                    'title' => $request->title,
                    'title_ar' => $request->title_ar,
                    'description' => $request->description,
                    'description_ar' => $request->description_ar,
                    'products_categories_id' => $request->products_categories_id,
                    'product_subcategories_id	'=>$request->product_subcategories_id,
                    'number_of_container'=>$request->number_of_container,
                    'price'=>$request->price,
                    'container'=>$request->container,
                ]);
            }
        }



  $product= Products::find($id);
        $product->update([
            'images' => $product->images,
            'title' => $request->title,
            'title_ar' => $request->title_ar,
            'description' => $request->description,
            'description_ar' => $request->description_ar,
            'products_categories_id' => $request->products_categories_id,
             'product_subcategories_id	'=>$request->product_subcategories_id,
            'number_of_container'=>$request->number_of_container,
             'price'=>$request->price,
             'container'=>$request->container,
        ]);



        Session::flash('success', 'products Updated Successfully');
        return redirect('productsss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::find($id);

        $products->delete();
        Session::flash('danger', 'products Deleted Successfully');
        return redirect('productsss');


    }

    public function sub_category_ajax($categoryId){
        dd('dd');
//        $subcategories = DB::table("subcategories")
//            ->where("category_id",$categoryId)->get();
        return json_encode($subcategories);
    }
}
