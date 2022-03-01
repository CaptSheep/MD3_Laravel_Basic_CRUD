<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function showFormLogin()
    {
        return view('modules.customer.login');
    }

    public function login(Request $request)
    {
        $user = $request->only('email','password');
        // dung attemp check xem user co hay khong
        if(Auth::attempt($user)){
            return redirect()->route('index');
        }
        else{
            Session::flash('msg','Sai tai khoan hoac mat khau');
            return  redirect()->back();
        }
    }

    public function showFormRegister()
    {
        return view('modules.customer.register');
    }

    public function register(Request $request)
    {
      $user = $request->only('name', 'phone','email','password');
      $user["password"] = Hash::make($user["password"]); // Ma hoa password voi Hash
      DB::table('customers')->insert($user);
      return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
