<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EnqReport extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'enq_reports';
    use HasFactory;
    protected $fillable = ['name', 'mobile', 'email', 'subject','message','status'];
}
