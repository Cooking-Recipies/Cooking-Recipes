<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikesSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 80; $i++) {
            $liker = User::all()->random();
            $model = Recipe::all()->random();
            $liker->like($model);
        }
    }
}