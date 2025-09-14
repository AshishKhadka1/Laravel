<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::where('status', 'published')->orderBy('created_at', 'desc')->get();
        return view('home', compact('news'));
    }   
}
