<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subcategories_id')->nullable();
            $table->string('title'); // a simple string
            $table->mediumText('description'); //medium height text
            $table->string('image'); // this is for the image, we just want the name as a string
            $table->json('ingredients');
            $table->json('steps');// long height text
            $table->string('prep_time')->nullable();
            $table->string('cook_time')->nullable();
            $table->string('servings')->nullable();
            $table->string('difficulty')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
