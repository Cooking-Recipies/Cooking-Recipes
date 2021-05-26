<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMainPhotoToRecipe extends Migration
{
    public function up()
    {
        Schema::table("recipes", function (Blueprint $table) {
            $table->foreignUuid("main_photo")
                ->nullable()
                ->default(null);
        });
    }

    public function down()
    {
        Schema::table("recipes", function (Blueprint $table) {
            $table->dropColumn("main_photo");
        });
    }
}
