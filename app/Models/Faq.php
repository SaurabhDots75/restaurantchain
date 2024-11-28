<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    /**
     * @var string $table
     */
  protected $table = 'faqs';

  use HasFactory;

  protected $fillable = ['title', 'categories', 'description', 'status'];

  protected $appends = ['category_name'];

  /**
   * Faq Category name
   *
   * @return void
   */
  public function getCategoryNameAttribute()
  {
      return FaqCategory::where('id',$this->categories)->pluck('title')->first();
  }
}
