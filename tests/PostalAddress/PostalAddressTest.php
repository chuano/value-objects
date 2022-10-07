<?php

declare(strict_types=1);

namespace Tests\PostalAddress;

use App\PostalAddress\InvalidZipCode;
use App\PostalAddress\PostalAddress;
use PHPUnit\Framework\TestCase;

class PostalAddressTest extends TestCase
{
    public function test_instantiate_address(): void
    {
        $address = new PostalAddress('Street', '1', '46001', 'Valencia');
        $this->assertEquals('Street', $address->getStreet());
        $this->assertEquals('1', $address->getNumber());
        $this->assertEquals('46001', $address->getZipCode());
        $this->assertEquals('Valencia', $address->getProvince());
    }

    public function test_throws_invalid_zip_code_given_invalid_zip_code(): void
    {
        $this->expectException(InvalidZipCode::class);
        new PostalAddress('Street', '1', '4600', 'Valencia');
    }
}
