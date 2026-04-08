<?php

namespace App\Service;

use App\Models\Category;

class CategoryService
{
    public function processSave($validated): Category
    {
        $category = new Category();
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->order = $validated['order'] ?? 1;

        $category->save();
        return $category;
    }
}
