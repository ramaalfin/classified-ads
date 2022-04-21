<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildCategories extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'sub_category_id', 'image'];
}
