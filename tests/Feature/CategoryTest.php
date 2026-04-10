<?php

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Should error request if false name', function () {

    $response = $this->postJson('/api/category/store', [
        'description' => 'any_description'
    ]);

    $response->assertStatus(422);
});

test('Should error request if false description', function () {

    $response = $this->postJson('/api/category/store', [
        'name' => 'any_name',
    ]);

    $response->assertStatus(422);
});

test('Should store category success', function () {

    $response = $this->postJson('/api/category/store', [
        'name' => 'any_name',
        'description' => 'any_description',
    ]);

    $this->assertDatabaseHas('category', [
        'name' => 'any_name',
        'description' => 'any_description',
    ]);
});

test('Should update category success', function () {

    $category = Category::create([
        'name' => 'any_name',
        'description' => 'any_description',
        'order' => '1',
    ]);

    $response = $this->putJson("/api/category/{$category->id}/update", [
        'name' => 'any_name_update',
        'description' => 'any_description_update',
    ]);

    $response->assertStatus(200);

    $this->assertDatabaseHas('category', [
        'id' => $category->id,
        'name' => 'any_name_update',
        'description' => 'any_description_update',
    ]);
});

test('Should update return 404 when category not found', function () {

    $response = $this->putJson("/api/category/999999/update", [
        'name' => 'any_name_update',
        'description' => 'any_description_update',
    ]);

    $response->assertStatus(404);
});

test('Should update return 422 when name not send', function () {

    $response = $this->putJson("/api/category/999999/update", [
        'name' => '',
    ]);

    $response->assertStatus(422);
});

test('Should delete category success', function (){

    $category = Category::create([
        'name' => 'any_name',
        'description' => 'any_description',
        'order' => '1',
    ]);

    $response = $this->deleteJson("/api/category/{$category->id}/delete");

    $response->assertStatus(204);
});

test('Should delete return 404 when category not found', function () {

    $response = $this->deleteJson("/api/category/99999/delete");

    $response->assertStatus(404);
});
