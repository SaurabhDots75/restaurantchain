<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lookup extends Model
{
    protected $table = 'lookups';

    protected $fillable = [
        'name',
        'lookup_type',
    ];
}
