<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileTable extends Migration
{
    public function up(): void
    {
        Schema::create("profiles", function (Blueprint $table): void {
            $table->bigIncrements("id");
            $table->string("name")->default("");
            $table->string("description")->default("");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");

            $table->foreignUuid("photo_id")
                ->nullable()
                ->default(null);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("profiles");
    }
}
