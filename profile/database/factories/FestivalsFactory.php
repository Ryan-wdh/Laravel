<?php

namespace Database\Factories;

use App\Models\bus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FestivalsFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),      // Generate a random sentence for the title
            'content' => $this->faker->paragraph(),  // Generate a random paragraph for content
            'user_id' => $this->faker->numberBetween(1, 10), // Generate a random user_id between 1 and 10
            'created_at' => now(),                  // Use the current timestamp
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

//class FestivalFactory extends Factory
//{
//    protected $model = \App\Models\Festivals::class; // Model ophalen
//
//    public function definition()
//    {
//        // random aankomst en vertrek tijden
//        $start_time = Carbon::now()->addDays(rand(-60, 60)) // random dag vanaf nu +30 -30 dagen
//        ->addHours(rand(0, 23)); // Random hour between 0 and 23
//        $end_time = $start_time->copy()->addHours(rand(1, 12)); // aankomst binnen 1 en 12 uur van vertrek
//
//        $festival_name = $this->faker->company();
//        return [
//            'festival_name' => $festival_name,
//            'start_time' => $start_time,
//            'end_time' => $end_time,
//            'available_buses' => 0,
//        ];
//    }
//    public function withbuses($busCount = null)
//    {
//        return $this->afterCreating(function ($festival) use ($busCount) {
//
//            $buses = Bus::factory()->count($busCount ?? rand(1, 15))->create([
//                'festival_id' => $festival->id,
//            ]);
//
//            $festival->update([
//                'available_buses' => $buses->count(),
//            ]);
//        });
//    }
//}
