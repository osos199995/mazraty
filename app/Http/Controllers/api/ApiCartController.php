<?php

namespace App\Http\Controllers\api;

use App\Cart;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Json;

class ApiCartController extends Controller
{
    use ApiResponceTrait;

public function addCart(Request $request){
$userId =auth()->id();

//dd($request->products);

$products=array_map(function ($products)use ($userId){
    return array_merge($products,['user_id'=>$userId]);
},$request->products);
  DB::table('carts')->insert($products);
return response()->json(['message' => 'your item is added to cart']);
}

public function getCart($user_id){
$cart=CartResource::collection(Cart::where('user_id',$user_id)->get());
return response()->json([
    'data'=>$cart,
]);
}



public function updateCart(Request $request , $cart){

   Cart::where('id',$cart->id)->update([
       'qty'=>$request->qty,
   ]);
    return response()->json(['message' => 'your item has updated to cart']);
}

public function deleteCart($cart_id){
    $cart=Cart::find($cart_id);

    if ($cart &&auth()->id()==$cart->user_id){
        $cart->delete();
        return response()->json(['message' => 'your item has been deleted']);

    }else{
        return response()->json(['message' => 'user does\'t have such a record'],404);

    }

}

}
