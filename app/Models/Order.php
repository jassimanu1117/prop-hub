<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

        protected $fillable = [
        'user_id',
        'guest_id',
        'name',
        'phone',
        'address',
        'subtotal',
        'total',
        'transaction_id', // ✅ Add this
        'status'
    ];


    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    //Relation: Order belongs to a registered user (optional)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
