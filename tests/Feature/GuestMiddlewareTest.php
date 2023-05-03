<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GuestMiddlewareTest extends TestCase
{
    public function test_logged_in_users_cannot_access_guest_routes()
    {
        $user = User::factory()->create([
            'role' => 'kepala_jurusan'
        ]);

        $this->actingAs($user)
            ->get('/login')
            ->assertStatus(302);
    }

    public function test_logged_users_cannot_access_register_pages_routes() {
        $user = User::factory()->create([
            'role' => 'kepala_jurusan'
        ]);

        $this->actingAs($user)
            ->get('/register')
            ->assertStatus(302);
    }
}
