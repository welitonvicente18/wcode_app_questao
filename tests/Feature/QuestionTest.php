<?php

use App\Models\Category;
use App\Service\QuestionService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Should error if request paraments false', function () {

    $response = $this->postJson('/api/question/store', []);

    $response->assertStatus(422);
});

test('Should success store question service has no option', function () {

    $category = Category::create([
        'name' => 'any_name',
        'description' => 'any_description',
        'order' => '1',
    ]);

    $data = [
        'title' => 'any_title',
        'question' => 'any_question',
        'level' => 1,
        'category_id' => $category->id,
    ];

    $questionService = new QuestionService();
    $question = $questionService->processSaveQuestion($data);

    expect($question->toArray())->toMatchArray($data);
});
