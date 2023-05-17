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
        $rooms = [
            'LSI' => 'Laboratorium Sistem Informasi',
            'LKJ' => 'Laboratorium Komputasi Jaringan',
            'LPY' => 'Laboratorium Proyek',
            'RT'  => 'Ruang Teori',
            'LPR' => 'Laboratorium Pemrograman',
        ];

        $randomKey = $this->faker->randomElement(array_keys($rooms));

        return [
            'name' => $rooms[$randomKey],
            'code' => $randomKey,
            'capacity' => $this->faker->numberBetween(30, 60),
            'floor' => $this->faker->numberBetween(1, 3),
            'image' => 'https://source.unsplash.com/1920x1080/?classroom?sig=' . $this->faker->numberBetween(1, 1000),
        ];
    }
}
