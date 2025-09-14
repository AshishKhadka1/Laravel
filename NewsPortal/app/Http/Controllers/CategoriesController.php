<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = categories::all();
        return view('admin.categories.index', compact('categories'));
    }  
    public function create()
    {
        return view('admin.categories.create');
    }
 
      public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        categories::create($request->all());

        return redirect()->route('index')
                         ->with('success', 'Category created successfully.');
    }

    public function edit(categories $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, categories $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    public function destroy(categories $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Category deleted successfully.');
    }
}       