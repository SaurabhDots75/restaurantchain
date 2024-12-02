<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Page extends Model
{
    use Notifiable;
    
    protected $fillable = [
        'title','subtitle','slug','short_description', 'description', 'status', 'template', 'image', 'meta_title', 'meta_description','meta_keyword', 'is_deleted','deleted_at','created_at','updated_at'
    ];
}
