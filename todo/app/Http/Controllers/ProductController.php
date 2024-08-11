<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return "dadss";
    }

    public function maformho()
    {
        return view('product.form');
    }
}
