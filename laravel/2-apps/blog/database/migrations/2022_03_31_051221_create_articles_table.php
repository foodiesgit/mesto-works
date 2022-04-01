<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('articals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->delete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->longText('content');
            $table->string('image');
            $table->integer('hit')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('articals');
    }
};
