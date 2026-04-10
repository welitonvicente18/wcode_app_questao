<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Service\CategoryService;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $category = $this->categoryService->processSave($validated);

        return response()->json($category, 201);
    }

    public function update(CategoryRequest $request, $id): JsonResponse
    {
        $validated = $request->validated();
        $validated['id'] = $id;

        $category = $this->categoryService->processUpdate($validated);

        return response()->json($category, 200);
    }

    public function delete($id): JsonResponse
    {
        $this->categoryService->processDelete($id);

        return response()->json(['msg' => 'Success to delete'], 204);
    }
}
