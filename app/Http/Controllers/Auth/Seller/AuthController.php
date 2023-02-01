<?php

namespace App\Http\Controllers\Auth\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('seller.auth.login');
    }

    public function login(Request $request){
        if(Auth::guard('seller')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->intended(route('seller'))->with('success','You are loged in as an  seller');
        }
        else{
            return back()->withInput($request->only('email'));
        }
      
    }
}
