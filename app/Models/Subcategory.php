<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';

    protected $fillable = [
        'category_id',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}