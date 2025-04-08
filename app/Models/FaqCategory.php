<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaqCategory extends Model
{
    use HasFactory;

    protected $table = 'faq_categories';
    
    protected $fillable = ['title'];
    
    /**
     * FAQ Data
     *
     * @return void
     */
	public function getFAQData(){
		return $this->hasMany(Faq::class,'categories','id')->where('status',1);
	}
}
