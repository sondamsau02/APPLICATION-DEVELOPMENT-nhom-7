<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginPost(Request $request){
        $credentials = $request->only('name','password');
        if(Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard');

        }else{
            echo 'sai';

        }
    }
    
    public function dashboard(){
        $adminUser = Auth::guard('admin')->user();
        return view ('admin.dashboard',['user'=>$adminUser]);
    } 
    public function logout(){
         Auth::guard('admin')->logout();

         return redirect('/admin/login');

        }

}

     
    

    

