<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * Test if user with kepala_jurusan role is admin.
     */
    public function test_kepala_jurusan_is_admin(): void
    {
        $user = new User();
        $user->role = 'kepala_jurusan';
        $this->assertTrue($user->isAdmin());
    }

    /**
     * Test if user with himpunan role is admin.
     */
    public function test_himpunan_is_admin(): void
    {
        $user = new User();
        $user->role = 'himpunan';
        $this->assertTrue($user->isAdmin());
    }

    /**
     * Test if user with bem role is admin.
     */
    public function test_bem_is_admin(): void
    {
        $user = new User();
        $user->role = 'bem';
        $this->assertTrue($user->isAdmin());
    }

    /**
     * Test if user with mahasiswa role is not admin.
     */
    public function test_mahasiswa_is_not_admin(): void
    {
        $user = new User();
        $user->role = 'mahasiswa';
        $this->assertFalse($user->isAdmin());
    }

    /**
     * Test if user with dosen role is not admin.
     */
    public function test_dosen_is_not_admin(): void
    {
        $user = new User();
        $user->role = 'dosen';
        $this->assertFalse($user->isAdmin());
    }
}
