<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        if(User::query()->get()->isEmpty())
        {
            $this->call([
                UsersSeeder::class,
                ProfilesSeeder::class,
            ]);
        }
    }
}
