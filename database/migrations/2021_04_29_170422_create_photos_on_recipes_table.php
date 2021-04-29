<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosOnRecipesTable extends Migration
{
    public function up()
    {
        Schema::create("photos_on_recipes", function (Blueprint $table) {
            $table->string("photo_id")
                ->nullable(false);
            $table->unsignedBigInteger("recipe_id");
            $table->timestamps();


            $table->foreign("photo_id")
                ->references("id")
                ->on("photos")
                ->onDelete("cascade");
            $table->foreign("recipe_id")
                ->references("id")
                ->on("recipes")
                ->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists("photos_on_recipes");
    }
}
