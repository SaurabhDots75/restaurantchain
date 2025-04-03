<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'user_id',
        'status', // pending, preparing, completed, cancelled
        'total_price',
        'payment_status', // paid, unpaid, refunded
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * Relationship with User (Customer)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Order Items
     */
    // public function orderItems()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }
}
