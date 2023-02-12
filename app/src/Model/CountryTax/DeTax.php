<?php

namespace App\Model\CountryTax;


/**
 * Class DeTax
 */
class DeTax extends AbstractCountryTax
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return 'DE';
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return 'Germany';
    }

    /**
     * @return string
     */
    public function getCodePatter(): string
    {
        return '/^DE\d{9}$/i';
    }

    /**
     * @return int|float
     */
    public function getRate(): int|float
    {
        return 19;
    }
}
