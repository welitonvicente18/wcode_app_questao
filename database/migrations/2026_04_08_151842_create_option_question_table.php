<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('option_question', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('question_id');
            $table->string('description', 255);
            $table->boolean('is_correct')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('question_id')->references('id')->on('question');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('option_question');
    }
};
