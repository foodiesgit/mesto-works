<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quizes_id')->constrained()->delete('cascade');
            $table->longText('question');
            $table->longText('image')->nullable();
            $table->longText('subject');
            $table->longText('level');
            $table->longText('line');
            $table->longText('A');
            $table->longText('B');
            $table->longText('C')->nullable();
            $table->longText('D')->nullable();
            $table->enum('correct_answer',['A','B','C','D']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
