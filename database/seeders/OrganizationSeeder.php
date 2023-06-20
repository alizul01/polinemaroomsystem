<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $organizations = [
      [
        'name' => 'Badan Eksekutif Mahasiswa',
        'abbreviation' => 'BEM',
        'description' => 'Description for BEM',
      ],
      [
        'name' => 'Himpunan Mahasiswa Teknologi Informasi',
        'abbreviation' => 'HMTI',
        'description' => 'Description for HMTI',
      ],
      [
        'name' => 'Workshop Riset Informatika',
        'abbreviation' => 'WRI',
        'description' => 'Description for WRI',
      ],
      [
        'name' => 'Information Technology Departement English Community',
        'abbreviation' => 'ITDEC',
        'description' => 'Description for ITDEC',
      ],
    ];
    foreach ($organizations as $organization) {
      Organization::create($organization);
    }
  }
}
