<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class MenuItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'restaurant_id', 
        'menu_id', 
        'category_id', 
        'name', 
        'description', 
        'image', 
        'price', 
        'discount_price', 
        'is_veg', 
        'status', 
        'preparation_time', 
        'stock_quantity'
    ];

    protected $casts = [
        'is_veg' => 'boolean',
        'status' => 'integer'
    ];

    public function getIsActiveAttribute()
    {
        return $this->status === 1;
    }

    public function setIsActiveAttribute($value)
    {
        $this->attributes['status'] = $value ? 1 : 0;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    
}
