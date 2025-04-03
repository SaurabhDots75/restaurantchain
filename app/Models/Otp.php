<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'otp_code', 'expires_at'];

    public $timestamps = true;

    // Check if OTP is expired
    public function isExpired()
    {
        return Carbon::now()->greaterThan($this->expires_at);
    }

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
