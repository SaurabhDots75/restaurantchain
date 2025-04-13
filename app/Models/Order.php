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
        'total_price',
        'wallet_redeemed',
        'status',
        'order_type',
        'source',
        'table_number',
        'delivery_address',
        'notes',
    ];
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class); // Or User::class if restaurant is a user
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
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
