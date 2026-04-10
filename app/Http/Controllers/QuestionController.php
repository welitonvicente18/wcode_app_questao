<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Service\QuestionService;

class QuestionController extends Controller
{
    protected QuestionService $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function store(QuestionRequest $request)
    {
        $validated = $request->validated();

        $this->questionService->processSaveQuestionAndOptions($validated);
    }
}
