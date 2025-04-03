<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status', // active/inactive
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
