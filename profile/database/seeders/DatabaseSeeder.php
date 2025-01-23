<?php

namespace Database\Seeders;

use App\Models\bus;
use App\Models\festivals; // Use the correct festivals model
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            festivals::factory(rand(1, 5))->create([
                'user_id' => $user->id,
            ]);
        });

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => '12345678',
            'is_admin' => true
            ]);

        Bus::factory()->count(100)->create();

        $users = User::all();
        $buses = Bus::all();

        // random buses aan elke user koppellen
        foreach ($users as $user) {
            $user->buses()->attach(
                $buses->random(rand(1, 3))->pluck('id')->toArray()
            );
        }
    }
}
