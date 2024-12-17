<?php

namespace Database\Seeders;

use App\Models\bus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Bus::factory()->count(50)->create();
//        User::factory()->create([
//            'name' => 'Ryan',
//            'email' => 's1216264@student.windesheim.nl',
//            'email_verified_at' => now(),
//            'password' => static::$password ??= Hash::make('bjozshawtxsx431915'),
//            'remember_token' => Str::random(10),
//        ]);
 }
}
