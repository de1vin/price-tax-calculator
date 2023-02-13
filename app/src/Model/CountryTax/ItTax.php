<?php

namespace App\Model\CountryTax;


/**
 * Class ItTax
 */
class ItTax extends AbstractCountryTax
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return 'IT';
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return 'Italy';
    }

    /**
     * @return string
     */
    public function getCodePattern(): string
    {
        return '/^IT\d{11}$/i';
    }

    /**
     * @return int|float
     */
    public function getRate(): int|float
    {
        return 22;
    }
}
