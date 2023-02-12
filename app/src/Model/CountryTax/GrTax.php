<?php

namespace App\Model\CountryTax;


/**
 * Class GrTax
 */
class GrTax extends AbstractCountryTax
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return 'GR';
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return 'Greece';
    }

    /**
     * @return string
     */
    public function getCodePatter(): string
    {
        return '/^GR\d{9}$/i';
    }

    /**
     * @return int|float
     */
    public function getRate(): int|float
    {
        return 24;
    }
}
