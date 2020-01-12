<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminCustomersController extends Controller
{
public function index(){
   $users = User::where('role_id',0)->get();
   return view('admin.customers.index',compact('users'));
}


public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

}
