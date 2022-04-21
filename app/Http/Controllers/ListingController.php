<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListingRequest;
use Illuminate\Support\Str;
use App\Models\Listing;


class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListingRequest $request)
    {
        $featured_image = $request->file('featured_image')->store('public/listings');
        $image_one = $request->file('image_one')->store('public/listings');
        $image_two = $request->file('image_two')->store('public/listings');
        $image_three = $request->file('image_three')->store('public/listings');

        Listing::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'child_category_id'=> $request->child_category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'price_negotiable' => $request->price_negotiable,
            'condition' => $request->condition,
            'location' => $request->location,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'is_publish' => $request->is_publish,
            'phone_number' => $request->phone_number,
            'featured_image' => $request->featured_image,
            'image_one' => $request->image_one,
            'image_two' => $request->image_two,
            'image_three' => $request->image_three,
        ]);
        return redirect()->route('dashboard');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreListingRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
