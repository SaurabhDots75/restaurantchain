<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'payment_method', // Example: Card, Cash, Wallet
        'transaction_id', // If applicable, for online payments
        'amount',
        'status', // pending, completed, failed, refunded
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
