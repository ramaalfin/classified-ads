<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'featured_image',
        'image_one',
        'image_two',
        'image_three',
        'category_id',
        'sub_category_id',
        'child_category_id',
        'title',
        'slug',
        'description',
        'location',
        'condition',
        'country_id',
        'state_id',
        'city_id',
        'price',
        'price_negotiable',
        'phone_number',
        'is_publish'
    ];
}
