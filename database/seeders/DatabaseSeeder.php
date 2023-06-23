<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (config('app.env') === 'production') {
            $this->call([
                UserSeeder::class,
                OrganizationSeeder::class,
            ]);
        } else {
            $this->call([
                OrganizationSeeder::class,
                UserSeeder::class,
                RoomSeeder::class,
                RoomReservationSeeder::class,
            ]);
        }
    }
}
