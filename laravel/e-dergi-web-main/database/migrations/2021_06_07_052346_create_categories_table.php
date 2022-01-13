<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('top_id')->nullable()->default(0)->constrained('categories')->onDelete('cascade');
            $table->string('name', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('class_name', 255)->nullable();
            $table->string('hex_color_code', 255)->nullable();
            $table->tinyInteger('is_active')->default(1)->nullable()->index();
            $table->integer('order')->default(0)->nullable();
            $table->string('slug', 255)->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
