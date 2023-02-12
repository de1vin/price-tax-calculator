<?php

namespace App\Model\CountryTax;


/**
 * Class CountryTaxInterface
 */
interface CountryTaxInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return string
     */
    public function getCountry(): string;

    /**
     * @return string
     */
    public function getCodePatter(): string;

    /**
     * @return int|float
     */
    public function getRate(): int|float;

    /**
     * @param int|float $price
     *
     * @return int|float
     */
    public function getCalculated(int|float $price): int|float;
}
