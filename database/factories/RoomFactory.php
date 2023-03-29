<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roomName = [
            'LSI',
            'LKJ',
            'LPY',
            'RT',
            'LPR',
        ];

        // faker random element from array but give number for the element, ex: LSI-1, and it will be unique, so it will not repeat

        return [
            'name' => $this->faker->name,
            'room_name' => $roomName[$this->faker->numberBetween(0, 4)] . '-' . $this->faker->unique()->numberBetween(1, 100),
            'capacity' => $this->faker->numberBetween(30, 60),
            'is_available' => $this->faker->boolean,
        ];
    }
}
