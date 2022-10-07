<?php

declare(strict_types=1);

namespace App\MailAddress;

class MailAddress
{
    private string $value;

    /**
     * @throws InvalidMailAddress
     */
    public function __construct(string $value)
    {
        $lowerCaseEmail = mb_strtolower($value, 'UTF-8');

        if (!filter_var($lowerCaseEmail, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidMailAddress('Invalid e-mail: ' . $value);
        }

        $this->value = $lowerCaseEmail;
    }

    public function getValue(): string
    {
        return $this->value;
    }

}
