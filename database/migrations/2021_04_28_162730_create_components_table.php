<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    public function up()
    {
        Schema::create("components", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("name");
        });
    }

    public function down()
    {
        Schema::dropIfExists("components");
    }
}