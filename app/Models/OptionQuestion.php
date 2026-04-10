<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionQuestion extends Model
{
    protected $table = 'option_question';

    protected $fillable = [
        'question_id',
        'description',
        'is_correct',
    ];
}
