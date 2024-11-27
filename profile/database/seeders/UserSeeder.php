<?php

namespace Database\Seeders;

use App\Models\posts; // Use the correct posts model
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            posts::factory(rand(1, 5))->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
