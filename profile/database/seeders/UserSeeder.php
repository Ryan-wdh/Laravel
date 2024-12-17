<?php

namespace Database\Seeders;

use App\Models\bus;
use App\Models\festivals; // Use the correct festivals model
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            festivals::factory(rand(1, 5))->create([
                'user_id' => $user->id,
            ]);
        });
        Bus::factory()->count(50)->create();
    }
}
