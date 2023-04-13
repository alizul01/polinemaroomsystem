<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApprovalTest extends TestCase
{
    public function test_jurusan_required_to_update_approval_changes() {
        $user = new User();
        $user->role = 'kepala_jurusan';
        $this->actingAs($user);
        $response = $this->put('/approval/1', [
            'request_id' => 1,
        ]);
        $response->assertSessionHasErrors('jurusan_approved');
    }

    public function test_jurusan_is_not_required_to_update_approval_himpunan_changes() {
        $user = new User();
        $user->role = 'kepala_jurusan';
        $this->actingAs($user);
        $response = $this->put('/approval/1', [
            'request_id' => 1,
            'jurusan_approved' => true,
        ]);
        $response->assertSessionDoesntHaveErrors('himpunan_approved');
    }

    public function test_himpunan_required_to_update_approval_changes() {
        $user = new User();
        $user->role = 'himpunan';
        $this->actingAs($user);
        $response = $this->put('/approval/1', [
            'request_id' => 1,
        ]);
        $response->assertSessionHasErrors('himpunan_approved');
    }

    public function test_bem_required_to_update_approval_changes() {
        $user = new User();
        $user->role = 'bem';
        $this->actingAs($user);
        $response = $this->put('/approval/1', [
            'request_id' => 1,
        ]);
        $response->assertSessionHasErrors('bem_approved');
    }
}
