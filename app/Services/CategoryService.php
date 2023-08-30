<?php

namespace App\Services;
use App\Models\Category;

/**
 * Class CategoryService.
 */
class CategoryService
{
    public function all(){
        $categories = Category::with(['section', 'parentCategory'])->get();

        return $categories;
    }

    public function destroy($id)
    {
        Category::where('id', $id)->delete();
    }
}
