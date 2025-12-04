<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'color_class',
        'for_type',
        'status',
    ];

    public function listings()
    {
    return $this->belongsToMany(Listing::class, 'badge_listing');
    }
}
