<?php

use Illuminate\Support\Facades\Schema;
use App\Models\FaqCategory;
use App\Http\Controllers\Admin\SlugController;

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
if (!function_exists("generateSlug")) {
    function generateSlug($modelName,$request)
    {
        if (isset($request->table_id) && !empty($request->table_id) && $request->slug_bk != $request->slug) {
            $slugController = new SlugController;
            return $slugController->makeNewSlugName($modelName, $request->name, $request->slug);
        }

        $slugController = new SlugController;
        return $slugController->makeNewSlugName($modelName, $request->name, $request->slug);
    }
}