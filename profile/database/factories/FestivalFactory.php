<?php

namespace Database\Factories;

use App\Models\festival;
use App\Models\Bus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**

 */
class FestivalFactory extends Factory
{
    protected $model = \App\Models\Festival::class; // Model ophalen

    public function definition()
    {
        // random aankomst en vertrek tijden
        $start_time = Carbon::now()->addDays(rand(-60, 60)) // random dag vanaf nu +30 -30 dagen
        ->addHours(rand(0, 23)); // Random hour between 0 and 23
        $end_time = $start_time->copy()->addHours(rand(1, 12)); // aankomst binnen 1 en 12 uur van vertrek

        $festival_name = $this->faker->company();
        return [
            'festival_name' => $festival_name,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'available_buses' => 0,
        ];
    }
    public function withbuses($busCount = null)
    {
        return $this->afterCreating(function ($festival) use ($busCount) {

            $buses = Bus::factory()->count($busCount ?? rand(1, 15))->create([
                'festival_id' => $festival->id,
            ]);

            $festival->update([
                'available_buses' => $buses->count(),
            ]);
        });
    }
}
