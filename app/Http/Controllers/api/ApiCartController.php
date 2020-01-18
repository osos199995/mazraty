<?php

namespace App\Http\Controllers\api;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\Util\Json;

class ApiCartController extends Controller
{
    use ApiResponceTrait;

    public function addCart(Request $request){
$user =auth()->user();


    Cart::create([
'product_id'=>'',
'qty'=>'',


    ]);
    return response()->json(['message' => 'your item is added to cart',$random_key]);
}


public function updateCart(Request $request){
    $random_key=$request->random_key;
    Cart::where('random_key',$random_key)->update([
        'cart_content'=>json_encode($request->cart_content),  
    ]);
    return response()->json(['message' => 'your item has updated to cart',$random_key]);
}

}
