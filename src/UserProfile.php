<?php

declare(strict_types=1);

namespace App;

class UserProfile
{
    private const SUPERADMIN = 'super admin';
    private const ADMIN = 'admin';
    private const NO_ADMIN = 'plain user';

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function superAdmin(): self
    {
        return new self(self::SUPERADMIN);
    }

    public static function admin(): self
    {
        return new self(self::ADMIN);
    }

    public static function noAdmin(): self
    {
        return new self(self::NO_ADMIN);
    }

    public function isAdmin(): bool
    {
        return $this->value !== self::NO_ADMIN;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
