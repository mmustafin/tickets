<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $qrcode = 1001;
        return [
            'qrcode' => $qrcode++,
            'area' => $this->faker->randomElement(['Партер', 'Балкон 1-й ярус', 'Балкон 2-й ярус', 'Балкон 3-й ярус', ]),
            'row' => $this->faker->randomDigitNotNull,
            'seat' => $this->faker->randomNumber(2, true),
            'status' => $this->faker->randomElement(['valid', 'used' , 'refunded' , 'cancelled']),
            'event_id' => Event::query()->inRandomOrder()->value('id'),
        ];
    }
}
