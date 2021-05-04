<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    public function up()
    {
        Schema::create("recipes", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("category_id");
            $table->integer("number_of_people");
            $table->string("preparing_time");
            $table->string("title");
            $table->text("instruction");
            $table->timestamps();

            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");

            $table->foreign("category_id")
                ->references("id")
                ->on("categories")
                ->onDelete("cascade");
        });
    }

    public function down()
    {
        Schema::dropIfExists("recipes");
    }
}
