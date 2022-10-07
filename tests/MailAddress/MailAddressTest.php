<?php

declare(strict_types=1);

namespace Tests\MailAddress;

use App\MailAddress\InvalidMailAddress;
use App\MailAddress\MailAddress;
use PHPUnit\Framework\TestCase;

class MailAddressTest extends TestCase
{
    public function test_instantiate_email(): void
    {
        $mail = new MailAddress('valid@email.com');
        $this->assertEquals('valid@email.com', $mail->getValue());
    }

    public function test_convert_to_lowercase(): void
    {
        $mail = new MailAddress('VALID@EMAIL.COM');
        $this->assertEquals('valid@email.com', $mail->getValue());
    }

    public function test_throws_invalid_email_exception_given_invalid_email(): void
    {
        $this->expectException(InvalidMailAddress::class);
        new MailAddress('invalid@email');
    }
}
