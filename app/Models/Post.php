<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Post extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'subtitle', 'slug', 'categories', 'short_description', 'description', 'status', 'image', 'meta_title', 'meta_description', 'faq_title','faq_category', 'meta_keyword', 'deleted_at', 'created_at', 'updated_at'
    ];

    protected $appends = ['cat_details', 'cat_name'];

    /**
     * Cat Details
     *
     * @return void
     */
    public function getCatDetailsAttribute()
    {
        $ids = explode(',', $this->categories);
        $user = PostCategory::whereIn('id', $ids)->pluck('name')->toArray();
        return implode(',', $user);
    }
    
    /**
     * Cat Name Attribute
     *
     * @return void
     */
    public function getCatNameAttribute()
    {
        $ids = explode(',', $this->categories);
        return PostCategory::where('id', $ids[0])->select('name', 'slug')->first();
    }
}
