<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

   protected $fillable = [
        'name',
        'slug',
        'category_id',
        'logo',
        'logo_thumb',
        'description',
        'status',

    ];

    // Relation with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Brand has many Products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
