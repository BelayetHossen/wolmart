<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // User login page load
    public function adminLoginPage(){
        return view('backend.pages.users.login');
    }

    // User login page redirect
    public function adminLoginRedirect(){
        return redirect()->route('admin.login.view');
    }


    // Admin login system
    public function adminLoginSystem(Request $request){
        if (Auth::guard('siteuser')->attempt(['email' => $request->email , 'password' => $request->password])) {
            return redirect()->route('admin.dashboard.view')->with('You are succesfully login the dashboard !');
        } else {
            return redirect()->route('admin.login.view')->with('Login info is not correct !');
        }
    }

    // Admin logout system
    public function adminLogout(){

        Auth::guard('siteuser')->logout();
        return redirect()->route('admin.login.view');


    }














}
