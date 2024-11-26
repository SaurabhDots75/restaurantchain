<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menus extends Model
{
    use HasFactory;
    /**
     * @var string $table
     */
    protected $table = 'menus';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'parent', 'title', 'slug', 'icon', 'target', 'tooltip', 'status'
    ];
}
