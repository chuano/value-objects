<?php

declare(strict_types=1);

namespace Tests;

use App\UserProfile;
use PHPUnit\Framework\TestCase;

class UserProfileTest extends TestCase
{
    public function test_isntantiate_super_admin_user(): void
    {
        $user = UserProfile::superAdmin();
        $this->assertEquals('super admin', $user->getValue());
    }

    public function test_isntantiate_admin_user(): void
    {
        $user = UserProfile::admin();
        $this->assertEquals('admin', $user->getValue());
    }

    public function test_isntantiate_no_admin_user(): void
    {
        $user = UserProfile::noAdmin();
        $this->assertEquals('plain user', $user->getValue());
    }

    public function test_is_admin_true_given_super_admin_profile(): void
    {
        $user = UserProfile::superAdmin();
        $this->assertTrue($user->isAdmin());
    }

    public function test_is_admin_true_given_admin_profile(): void
    {
        $user = UserProfile::admin();
        $this->assertTrue($user->isAdmin());
    }

    public function test_is_admin_false_given_no_admin_profile(): void
    {
        $user = UserProfile::noAdmin();
        $this->assertFalse($user->isAdmin());
    }
}
