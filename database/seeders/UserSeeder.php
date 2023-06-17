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
    User::factory()->create([
      'name' => 'Super Admin',
      'email' => 'polarys@superadmin.com',
      'nomor_telepon' => '081234567890',
      'password' => Hash::make('polarys#2023admproj1'),
      'role' => "superadmin",
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Kepala Jurusan Teknologi Informasi',
      'email' => 'kajur@admin.com',
      'nomor_telepon' => '081234567890',
      'password' => Hash::make('password'),
      'role' => "kajur",
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Presiden BEM',
      'email' => 'bem@admin.com',
      'password' => Hash::make('password'),
      'role' => "bem",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Himpunan Mahasiswa Teknologi Informasi',
      'email' => 'hmti@admin.com',
      'password' => Hash::make('password'),
      'role' => "hmti",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Muhammad Ali Zulfikar',
      'email' => 'ali@example.com',
      'password' => Hash::make('password'),
      'role' => "user",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Alfan Olivan',
      'email' => 'alivan@example.com',
      'password' => Hash::make('password'),
      'role' => "user",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Anisa Rahmasari',
      'email' => 'anisa@example.com',
      'password' => Hash::make('password'),
      'role' => "user",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Gabriel Dimas',
      'email' => 'gabriel@example.com',
      'password' => Hash::make('password'),
      'role' => "user",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Ilham Yudantyo',
      'email' => 'ilham@example.com',
      'password' => Hash::make('password'),
      'role' => "user",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);
  }
}
