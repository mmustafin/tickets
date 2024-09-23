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
        static $qrcode = 5001;
        return [
            'qrcode' => $qrcode++,
            'area' => $this->faker->randomElement(['Партер', 'Балкон 3-й ярус', ]),
            'row' => $this->faker->randomDigitNotNull,
            'seat' => $this->faker->randomNumber(2, true),
            'status' => $this->faker->randomElement(['valid', 'used' , 'refunded' , 'cancelled']),
            'event_id' => 1,


/*[
  {"id": 1, "qrcode": "5001", "area":  "Партер", "row":  "1", "seat":  "54", "status":  "valid"},
  {"id": 2, "qrcode": "5002", "area":  "Партер", "row":  "2", "seat":  "1", "status":  "valid"},
  {"id": 3, "qrcode": "5003", "area":  "Партер", "row":  "45", "seat":  "231", "status":  "valid"},
  {"id": 4, "qrcode": "5004", "area":  "Балкон 3-й ярус", "row":  "", "seat":  "А", "status":  "valid"},
  {"id": 4, "qrcode": "5005", "area":  "Балкон 3-й ярус", "row":  "", "seat":  "Б", "status":  "used"},
  {"id": 5, "qrcode": "5006", "area":  "Партер", "row":  "1", "seat":  "54", "status":  "refunded"},
  {"id": 6, "qrcode": "5007", "area":  "Партер", "row":  "1", "seat":  "54", "status":  "cancelled"}
]*/
        ];
    }
}
