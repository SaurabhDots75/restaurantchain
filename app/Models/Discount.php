<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'code', // Discount code
        'discount_type', // percentage or fixed
        'discount_value',
        'valid_from',
        'valid_to',
        'status', // active/inactive
    ];


    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    /**
     * Check if discount is active
     */
    public function isActive()
    {
        return $this->status === 'active' && now()->between($this->valid_from, $this->valid_to);
    }
}
