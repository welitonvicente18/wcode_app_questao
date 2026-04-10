<?php

namespace App\Service;

use App\Models\Category;

class CategoryService
{
    public function processSave(array $validated): Category
    {
        $category = new Category();
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->order = $validated['order'] ?? 1;

        $category->save();
        return $category;
    }

    public function processUpdate(array $validated): Category
    {
        $category = Category::findOrFail($validated['id']);
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->order = $validated['order'] ?? 1;

        $category->update();
        return $category;
    }

    public function processDelete(int $id): bool
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return true;
    }
}
