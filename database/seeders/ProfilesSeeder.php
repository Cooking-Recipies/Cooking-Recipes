<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\ProfileFactory;
use Illuminate\Database\Seeder;

class ProfilesSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::query()->get();
        foreach ($users as $user)
        {
            $user->profile()->update(ProfileFactory::new()->definition());
        }
    }
}