<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategories;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = SubCategories::paginate(10);
        return view('Admin.sub_categories.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.sub_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategoryRequest $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/sub_categories');

            SubCategories::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'image' => $path
            ]);
            return redirect()->route('sub_categories.index')->with('message', 'Sub Category Created with Image');
        }
        return redirect()->route('sub_categories.index')->with('message', 'Sub Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategories $sub_category)
    {
        return view('Admin.sub_categories.edit', compact('sub_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubCategoryRequest $request, SubCategories $sub_category)
    {
        if($request->hasFile('image')){
            $path = $request->file('image')->store('public/sub_categories');

            $sub_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'image' => $path
            ]);
            return redirect()->route('sub_categories.index')->with('message', 'Sub Category Updated with Image');
        }else{
            $sub_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id
            ]);
            return redirect()->route('sub_categories.index')->with('message', 'Sub Category Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategories $sub_category)
    {
        $sub_category->delete();
        return redirect()->route('sub_categories.index')->with('message', 'Sub Category Deleted');
    }
}
