<?php

use App\Models\Category;
use App\Models\Question;
use App\Service\QuestionService;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Should success store service option question', function () {

    $category = Category::create([
        'name' => 'any_name',
        'description' => 'any_description',
        'order' => '1',
    ]);

    $question = Question::create([
        'title' => 'any_title',
        'question' => 'any_question',
        'level' => 1,
        'category_id' => $category->id,
    ]);

    $data = [
        'question_id' => $question->id,
        'description' => 'any_question',
        'is_correct' => 1,
    ];

    $questionService = new QuestionService();
    $optionsQuestion = $questionService->processSaveOptions($data);

    expect($optionsQuestion->toArray())->toMatchArray($data);
});
