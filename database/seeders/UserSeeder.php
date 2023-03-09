<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'polarys@superadmin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('polarys#2023admproj1'),
            'role' => "superadmin",
            'remember_token' => str()->random(10),
        ]);

        User::factory()->create([
            'name' => 'Kepala Jurusan Teknologi Informasi',
            'email' => 'kajur@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => "kajur",
            'remember_token' => str()->random(10),
        ]);

        User::factory()->create([
            'name' => 'Presiden BEM',
            'email' => 'bem@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => "bem",
            'remember_token' => str()->random(10),
        ]);

        User::factory()->create([
            'name' => 'Himpunan Mahasiswa Teknologi Informasi',
            'email' => 'hmti@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => "himpunan",
            'remember_token' => str()->random(10),
        ]);

        User::factory()->create([
            'name' => 'Muhammad Ali Zulfikar',
            'email' => 'ali@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => "user",
            'remember_token' => str()->random(10),
        ]);

        User::factory()->create([
            'name' => 'Alfan Olivan',
            'email' => 'alivan@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => "user",
            'remember_token' => str()->random(10),
        ]);

        User::factory()->create([
            'name' => 'Anisa Rahmasari',
            'email' => 'anisa@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => "user",
            'remember_token' => str()->random(10),
        ]);

        User::factory()->create([
            'name' => 'Gabriel Dimas',
            'email' => 'gabriel@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => "user",
            'remember_token' => str()->random(10),
        ]);

        User::factory()->create([
            'name' => 'Ilham Yudantyo',
            'email' => 'ilham@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role' => "user",
            'remember_token' => str()->random(10),
        ]);
    }
}
