<?php

use Illuminate\Support\Facades\Schema;
use App\Models\FaqCategory;

function getFilter($table, $query, $filter = [])
{
    if (count($filter)) {
        foreach ($filter as $key => $value) {
            if (Schema::hasColumn(app($table)->getTable(), $key)) {
                $query = $query->where($key, 'like', '%' . $filter[$key] . '%');
            }
        }
    }
    return $query;
}

if (!function_exists("singleStorageImageUpload")) {
    function singleStorageImageUpload()
    {
        return 'uploads/resized_image.jpg';
    }
}
if (!function_exists("getFaqsAllCategory")) {
    function getFaqsAllCategory()
    {
        return FaqCategory::get();
    }
}