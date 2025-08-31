<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // For controller practice 
    Function getUser(){
        return view ('user');
    }
     Function getUserName($name){
        return view('getuser',['name'=>$name]);
    }

    function adminLogin(){
        return view('admin.login');

        // For view practice
        function userHome(){
            return view('home');
        }
    }
}
