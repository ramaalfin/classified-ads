<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::paginate(10);
        return view('Admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        if($request->hasFile('image')){
            $path = $request->file('image')->store('public/categories');

            Categories::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $path
            ]);
            return redirect()->route('categories.index')->with('pesan', 'Category Created with Image');
        }
        return redirect()->route('categories.index')->with('pesan', 'Category Created');
    }

    public function show($id)
    {
        //
    }

    public function edit(Categories $category)
    {
        return view('Admin.categories.edit', compact('category'));
    }

    public function update(StoreCategoryRequest $request, Categories $category)
    {
        if($request->hasFile('image')){
            $path = $request->file('image')->store('public/categories');

            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $path
            ]);
            return redirect()->route('categories.index')->with('pesan', 'Category Updated with Image');
        }else{
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            return redirect()->route('categories.index')->with('pesan', 'Category Updated');
        }
    }

    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('pesan', 'Category Deleted');
    }
}
