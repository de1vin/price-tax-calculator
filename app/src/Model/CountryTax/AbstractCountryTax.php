<?php

namespace App\Model\CountryTax;


/**
 * Class AbstractCountryTax
 */
abstract class AbstractCountryTax implements CountryTaxInterface
{
    /**
     * @return string
     */
    abstract public function getId(): string;

    /**
     * @return string
     */
    abstract public function getCountry(): string;

    /**
     * @return string
     */
    abstract public function getCodePattern(): string;

    /**
     * @return int|float
     */
    abstract public function getRate(): int|float;

    /**
     * @param int|float $price
     *
     * @return int|float
     */
    public function getCalculated(int|float $price): int|float
    {
        return $price * $this->getRate() / 100;
    }
}
