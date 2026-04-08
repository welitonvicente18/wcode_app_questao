<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Service\CategoryService;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $validated = $request->validated();

        try {
            $category = $this->categoryService->processSave($validated);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json($category, 201);
    }
}
