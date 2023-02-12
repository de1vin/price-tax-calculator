<?php

namespace App\Dto;

use App\Validator\Product;
use App\Validator\TaxCode;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class ProductToCalculationDto
 */
class ProductToCalculationDto
{
    public function __construct(
        #[Assert\NotBlank]
        #[Product]
        public ?string $product,
        #[Assert\NotBlank]
        #[TaxCode]
        public ?string $taxCode
    ) {}
}
