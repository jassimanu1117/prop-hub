<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'brand_id',
        'gender',
        'slug',
        'is_trending',
        'is_new_arrival',
        'status',
    ];

    /**
     * Booted method to handle slug creation/updating
     */
    protected static function booted()
    {
        // On create: generate slug
        static::creating(function ($product) {
            $product->slug = self::generateUniqueSlug($product->name);
        });

        // On save (create or update): update slug if name changed
        static::saving(function ($product) {
            if ($product->isDirty('name')) {
                $product->slug = self::generateUniqueSlug($product->name, $product->id);
            }
        });
    }

    /**
     * Generate a unique slug based on the product name
     */
    protected static function generateUniqueSlug($name, $id = null)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        // Check if slug exists; exclude current product id when updating
        while (self::where('slug', $slug)
            ->when($id, fn($query) => $query->where('id', '!=', $id))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    /**
     * Relationship: Product belongs to a Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relationship: Product belongs to a Brand
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Relationship: Product has many images
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Optional: Get first image as main
     */
    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->oldest();
    }
    
    // Product has many sizes via pivot
    public function sizes() {
        return $this->belongsToMany(Size::class, 'product_sizes')
                    ->withPivot('stock')
                    ->withTimestamps();
    }


    public function reviews()
    {
    return $this->hasMany(Review::class);
    }


}
