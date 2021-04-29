<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsOnRecipesTable extends Migration
{
    public function up()
    {
        Schema::create("components_on_recipes", function (Blueprint $table) {
            $table->unsignedBigInteger("component_id")
                ->nullable(false);
            $table->unsignedBigInteger("recipe_id");
            $table->timestamps();


            $table->foreign("component_id")
                ->references("id")
                ->on("components")
                ->onDelete("cascade");
            $table->foreign("recipe_id")
                ->references("id")
                ->on("recipes")
                ->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists("components_on_recipes");
    }
}
