<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'restaurant_id',
        'name',
        'slug',
        'description',
        'image',
        'status',
        'sort_order',
        'is_featured'
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_featured' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
