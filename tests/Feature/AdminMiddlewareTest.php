<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminMiddlewareTest extends TestCase
{
    use RefreshDatabase;
    public function test_allows_kepala_jurusan_to_access_admin_routes()
    {
        // Create a new user with the role of kepala_jurusan
        $user = User::factory()->create([
            'role' => 'kepala_jurusan'
        ]);

        $this->actingAs($user)
            ->get('/admin')
            ->assertOk();
    }

    public function test_allows_bem_to_access_admin_routes()
    {
        // Create a new user with the role of bem
        $user = User::factory()->create([
            'role' => 'bem'
        ]);

        $this->actingAs($user)
            ->get('/admin')
            ->assertOk();
    }

    public function test_allows_himpunan_to_access_admin_routes()
    {
        // Create a new user with the role of himpunan
        $user = User::factory()->create([
            'role' => 'himpunan'
        ]);

        $this->actingAs($user)
            ->get('/admin')
            ->assertOk();
    }

    public function test_unauthorized_for_non_admin_users()
    {
        // Create a new user with the role of mahasiswa
        $user = User::factory()->create([
            'role' => 'mahasiswa'
        ]);

        $this->actingAs($user)
            ->get('/admin')
            ->assertStatus(401);
    }
}
