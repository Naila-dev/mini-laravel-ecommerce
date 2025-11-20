<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status',
    ];

    // The user who placed the order
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Items in the order
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
