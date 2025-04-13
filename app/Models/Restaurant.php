<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory ,SoftDeletes;


    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'zip_code',
        'is_active',
        'logo',
        'cover_image',
        'description',
        'opening_time',
        'closing_time',
        'registration_number',
        'website_url',
        'delivery_enabled',
        'dine_in_enabled',
        'pickup_enabled',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Relationship with Menu Items
     */
    // public function menuItems()
    // {
    //     return $this->hasMany(MenuItem::class);
    // }

    // /**
    //  * Relationship with Orders
    //  */
    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }
}
