<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'post_categories';

    protected $fillable = ['name','slug','parent_id','description','image_url','meta_title','meta_keyword','meta_description','status'];

    protected $appends = [
        'blog_title_details'
    ];

    /**
     * Blog Title Details
     *
     * @return void
     */
    public function getBlogTitleDetailsAttribute()
    {
        return Page::where('slug','blog')->first(); // Change after SEO discuss 05Jan2023 seo_change
    }
}
