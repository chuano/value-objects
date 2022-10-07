<?php

declare(strict_types=1);

namespace App\PostalAddress;

class PostalAddress
{
    private string $street;
    private string $number;
    private string $zipCode;
    private string $province;

    /**
     * @throws InvalidStreet
     * @throws InvalidStreetNumber
     * @throws InvalidZipCode
     * @throws InvalidProvince
     */
    public function __construct(string $street, string $number, string $zipCode, string $province)
    {
        $this->setStreet($street);
        $this->setNumber($number);
        $this->setZipCode($zipCode);
        $this->setProvince($province);
    }

    public function oneLine(): string
    {
        return $this->street . ', ' . $this->number . ' - ' . $this->zipCode . ' ' . $this->province;
    }

    public function forLetter(): string
    {
        return $this->street . ", " . $this->number . "\n" . $this->zipCode . " " . $this->province;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @throws InvalidStreet
     */
    private function setStreet(string $street): void
    {
        if (strlen($street) > 250) {
            throw new InvalidStreet('Street is too long: ' . $street);
        }
        if (strlen($street) < 3) {
            throw new InvalidStreet('Street is too short: ' . $street);
        }
        $this->street = $street;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @throws InvalidStreetNumber
     */
    private function setNumber(string $number): void
    {
        if (strlen($number) > 10) {
            throw new InvalidStreetNumber('Street number is too long: ' . $number);
        }
        if ($number === '') {
            throw new InvalidStreetNumber('Street number is required');
        }
        $this->number = $number;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

    /**
     * @throws InvalidZipCode
     */
    private function setZipCode(string $zipCode): void
    {
        if (strlen($zipCode) !== 5) {
            throw new InvalidZipCode('Invalid zip code: ' . $zipCode);
        }
        $this->zipCode = $zipCode;
    }

    public function getProvince(): string
    {
        return $this->province;
    }

    /**
     * @throws InvalidProvince
     */
    private function setProvince(string $province): void
    {
        if (strlen($province) > 250) {
            throw new InvalidProvince('Province is too long: ' . $province);
        }
        if (strlen($province) < 3) {
            throw new InvalidProvince('Province is too short: ' . $province);
        }
        $this->province = $province;
    }
}
