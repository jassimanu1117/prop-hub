<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'group', // property / tolet
        'name',
        'slug',
        'description',
        'image_path',
        'image_thumb',
        'status'
    ];

    // ------------------------------
    // RELATIONSHIPS
    // ------------------------------

    /**
     * Parent category (NULL if it's a top-level group)
     */
    public function parent()
    {
        return $this->belongsTo(PropertyCategory::class, 'parent_id');
    }

    /**
     * Child categories (subcategories)
     */
    public function children()
    {
        return $this->hasMany(PropertyCategory::class, 'parent_id');
    }

    /**
     * Scope: Only parent categories (top-level)
     */
    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope: Only subcategories (child categories)
     */
    public function scopeChildren($query)
    {
        return $query->whereNotNull('parent_id');
    }

    /**
     * Scope: Filter by type group (property / tolet)
     */
    public function scopeGroup($query, $group)
    {
        return $query->where('type_group', $group);
    }

    /**
     * Get full category path (e.g. "Residential → Apartment / Flat")
     */
    public function getFullNameAttribute()
    {
        if ($this->parent) {
            return $this->parent->name . ' → ' . $this->name;
        }

        return $this->name;
    }

    // Listings assigned to this category
    public function listings()
    {
        return $this->hasMany(Listing::class, 'category_id');
    }

}
