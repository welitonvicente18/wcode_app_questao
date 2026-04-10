<?php

namespace App\Service;

use App\Models\OptionQuestion;
use App\Models\Question;

class QuestionService
{

    public function processSaveQuestionAndOptions(array $validated): Question
    {
        $question = $this->processSaveQuestion($validated);
        $this->processSaveOptions($validated);

        return $question;
    }

    public function processSaveQuestion(array $validated): Question
    {
        $question = new Question();
        $question->fill($validated);
        $question->save();

        return $question;
    }

    public function processSaveOptions(array $validated): OptionQuestion
    {
        $optionsQuestion = new OptionQuestion();
        $optionsQuestion->fill($validated);
        $optionsQuestion->save();

        return $optionsQuestion;
    }
}
