<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout(){
        auth()->guard('web')->logout();
        return redirect('\loginadmin');
    }
}
