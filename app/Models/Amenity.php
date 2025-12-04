<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'icon', 'status'];

    public function listings()
    {
        return $this->belongsToMany(Listing::class, 'amenity_listing');
    }
}
