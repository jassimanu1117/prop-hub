<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    // Allow mass assignment for these columns
    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'price',
        'image',
    ];
}
