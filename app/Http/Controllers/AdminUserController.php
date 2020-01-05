<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
            'password'=>'required',
        ]);

        $input=$request->all();
        $input['password']=bcrypt($request->input('password'));


        User::find(Auth::id())->update($input);
        Session::flash('success','User Updated Successfully');
        return redirect()->back();
    }
}
