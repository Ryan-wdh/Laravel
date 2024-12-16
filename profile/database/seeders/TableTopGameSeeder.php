<?php

namespace Database\Seeders;


use App\Models\ttg;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TableTopGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Ryan',
//            'email' => 's1216264@student.windesheim.nl',
//            'email_verified_at' => now(),
//            'password' => static::$password ??= Hash::make('bjozshawtxsx431915'),
//            'remember_token' => Str::random(10),
//        ]);
        ttg::factory(100)->create();
    }
}
