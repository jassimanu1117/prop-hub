<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        // Basic
        'title',
        'slug',
        'short_description',
        'description',

        // Price
        'price',
        'price_type',
        'listing_for',

        // Category
        'category_id',

        // Physical attributes
        'beds',
        'baths',
        'area',
        'area_unit',

        // Flags
        'is_furnished',
        'is_ready_to_move',
        'is_verified',
        'is_featured',
        'is_hot',

        // Contact / owner
        'owner_name',
        'owner_mobile',
        'contact_whatsapp',

        // Address
        'address',
        'city',
        'state',
        'pincode',

        // Geo
        'lat',
        'lng',

        // Images
        'thumbs',

        // Status
        'status',
        'available_from',
    ];

    protected $casts = [
        'is_furnished'      => 'boolean',
        'is_ready_to_move'  => 'boolean',
        'is_verified'       => 'boolean',
        'is_featured'       => 'boolean',
        'is_hot'            => 'boolean',
        'thumbs'            => 'array',
        'price'             => 'decimal:2',
        'lat'               => 'decimal:7',
        'lng'               => 'decimal:7',
        'available_from'    => 'date',
    ];

    public function badges()
    {
     return $this->belongsToMany(Badge::class, 'badge_listing');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'amenity_listing');
    }

    public function images()
    {
        return $this->hasMany(ListingImage::class);
    }

}
