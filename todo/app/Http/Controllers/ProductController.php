<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('backend.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brand::all();
        $category = Category::all();
        return view('backend.product.create', compact('brand','category'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
            'stock'=>'required',
            'quantity'=>'required',
            'color'=>'required',
            'size'=>'required'
        ]);
        // dd($request->all());
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        // $product->image = $request->image;
        
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('product', $image_new_name);
        
        $product->image = $image_new_name;

        
    
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->quantity = $request->quantity;
        $product->color = $request->color;
        $product->size = $request->size;

        $product->save();
        return redirect()->back()->with('message','Product saved successfully. ');

        // return view('product.form');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('backend.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
            'brand_id'=>'required',
            'category_id'=>'required',
            'stock'=>'required',
            'quantity'=>'required',
            'color'=>'required',
            'size'=>'required'
        ]);
        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        // $product->image = $request->image;
        
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('prouct', $image_new_name);
        
        $product->image = $image_new_name;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->quantity = $request->quantity;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->save();
        return redirect()->back()->with('message','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product deleted successfully.');
    }
}