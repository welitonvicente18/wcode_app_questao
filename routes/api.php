<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/category/store', [CategoryController::class, 'store']);
Route::put('/category/{id}/update', [CategoryController::class, 'update']);
Route::delete('/category/{id}/delete', [CategoryController::class, 'delete']);

Route::post('/question/store', [QuestionController::class, 'store']);
