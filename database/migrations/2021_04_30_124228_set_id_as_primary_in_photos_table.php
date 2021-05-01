<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetIdAsPrimaryInPhotosTable extends Migration
{
    public function up(): void
    {
        Schema::table("photos", function (Blueprint $table): void {
            $table->primary("id");
        });
    }

    public function down(): void
    {
    }
}
