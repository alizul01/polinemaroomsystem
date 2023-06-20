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
      'email' => env('SUPERADMIN_EMAIL'),
      'nomor_telepon' => '081234567890',
      'password' => Hash::make(env('SUPERADMIN_PASSWORD')),
      'role' => "superadmin",
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Kepala Jurusan Teknologi Informasi',
      'email' => 'kajur@admin.com',
      'nomor_telepon' => '081234567890',
      'password' => Hash::make(env('ADMIN_PASSWORD')),
      'role' => "kajur",
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Presiden BEM',
      'email' => 'bem@admin.com',
      'password' => Hash::make(env('ADMIN_PASSWORD')),
      'role' => "bem",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Himpunan Mahasiswa Teknologi Informasi',
      'email' => 'hmti@admin.com',
      'password' => Hash::make(env('ADMIN_PASSWORD')),
      'role' => "hmti",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Muhammad Ali Zulfikar',
      'email' => 'ali@example.com',
      'password' => Hash::make(env('USER_PASSWORD')),
      'role' => "user",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Alfan Olivan',
      'email' => 'alivan@example.com',
      'password' => Hash::make(env('USER_PASSWORD')),
      'role' => "user",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Anisa Rahmasari',
      'email' => 'anisa@example.com',
      'password' => Hash::make(env('USER_PASSWORD')),
      'role' => "user",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Gabriel Dimas',
      'email' => 'gabriel@example.com',
      'password' => Hash::make(env('USER_PASSWORD')),
      'role' => "user",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);

    User::factory()->create([
      'name' => 'Ilham Yudantyo',
      'email' => 'ilham@example.com',
      'password' => Hash::make(env('USER_PASSWORD')),
      'role' => "user",
      'nomor_telepon' => '081234567890',
      'organization_id' => 1,
    ]);
  }
}
