<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChildCategories;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChildCategoryRequest;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $child_categories = ChildCategories::paginate(10);
        return view('Admin.child_categories.index', compact('child_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.child_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChildCategoryRequest $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/child_categories');

            ChildCategories::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'sub_category_id' => $request->sub_category_id,
                'image' => $path
            ]);

            return redirect()->route('child_categories.index')->with('pesan', 'Child Categories Created with Image');
        }
        return redirect()->route('child_categories.index')->with('pesan', 'Child Categories Created');
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
    public function edit(ChildCategories $child_category)
    {
        return view('Admin.child_categories.edit', compact('child_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChildCategoryRequest $request, ChildCategories $child_category)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/child_categories');

            $child_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'sub_category_id' => $request->sub_category_id,
                'image' => $path
            ]);
            return redirect()->route('child_categories.index')->with('pesan', 'Child Categories Updated with Image');
        }else{
            $child_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'sub_category_id' => $request->sub_category_id
            ]);
            return redirect()->route('child_categories.index')->with('pesan', 'Child Categories Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildCategories $child_category)
    {
        $child_category->delete();
        return redirect()->route('child_categories.index')->with('pesan', 'Child Category Deleted');
    }
}
