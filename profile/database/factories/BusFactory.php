<?php

namespace Database\Factories;

use App\Models\bus;
use App\Models\festivals;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class BusFactory extends Factory
{
    protected $model = \App\Models\Bus::class;

    public function definition()
    {
        $leavesAt = Carbon::now()->addDays(rand(-60, 60))
        ->addHours(rand(0, 23));
        $arrivesAt = $leavesAt->copy()->addHours(rand(1, 12));
        $ticket_price = rand(1, 15);
        return [
            'leaves_at' => $leavesAt,
            'arrives_at' => $arrivesAt,
            'ticket_price' => $ticket_price,
            'departure_from' => fake()->randomElement(['Amsterdam', 'Rotterdam', 'Utrecht', 'The Hague', 'Eindhoven']),
            'destination' => fake()->randomElement(['Lowlands', 'Pinkpop', 'Rock Werchter', 'Tomorrowland', 'Defqon.1']),
            'festivals_id' => festivals::inRandomOrder()->first()->id ?? null,
            'user_id' => user::inRandomOrder()->first()->id ?? null,
        ];
    }
}

