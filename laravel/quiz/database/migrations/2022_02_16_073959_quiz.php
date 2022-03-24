<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quizes', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('description');
            $table->enum('state',['active','passive','draft'])->default('draft');
            $table->timestamp('finished_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quizes');
    }
};
