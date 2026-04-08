<?php

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
