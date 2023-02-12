<?php

namespace App\Dto;


/**
 * Class CalculatedResultDto
 */
readonly class CalculatedResultDto
{
    public function __construct(
        public string $country,
        public int|float $taxRate,
        public int|float $taxValue,
        public int|float $calculatedPrice,
    ) {}
}
