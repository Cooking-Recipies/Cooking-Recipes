<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsOnRecipesTable extends Migration
{
    public function up()
    {
        Schema::create("tags_on_recipes", function (Blueprint $table) {
            $table->unsignedBigInteger("tag_id")
                ->nullable(false);
            $table->unsignedBigInteger("recipe_id");
            $table->timestamps();


            $table->foreign("tag_id")
                ->references("id")
                ->on("tags")
                ->onDelete("cascade");
            $table->foreign("recipe_id")
                ->references("id")
                ->on("recipes")
                ->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists("tags_on_recipes");
    }
}
