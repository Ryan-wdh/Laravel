<?php

namespace Database\Factories;

use App\Models\festivals;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Festival>
 */
class FestivalsFactory extends Factory
{
    protected $model = Festivals::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $usedFestivals = [];
//dit stuk van de factory is gemaakt door Floris hij heeft toestemming voor gebruik gegeven
        $festivals = collect([
            ['Pinkpop', '06-21', 3],
            ['Rock Werchter', '07-04', 4],
            ['Tomorrowland', '07-19', 3],
            ['Lowlands', '08-16', 3],
            ['Defqon.1', '06-28', 3],
            ['Mysteryland', '08-23', 3],
            ['Awakenings', '06-29', 2],
        ])->filter(function($fest) use (&$usedFestivals) {
            if (count($usedFestivals) >= 7) $usedFestivals = [];
            return !in_array($fest[0], $usedFestivals);
        });

        $festival = $festivals->random();
        $usedFestivals[] = $festival[0];

        return [
            'title' => $festival[0],
            'content' => fake()->realText(200),
        ];
    }
}
