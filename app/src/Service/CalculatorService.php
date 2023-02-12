<?php

namespace App\Service;

use App\Dto\CalculatedResultDto;
use App\Dto\ProductToCalculationDto;


/**
 * Class CalculatorService
 */
readonly class CalculatorService
{
    public function __construct(
        private ProductService $productService,
        private TaxService $taxService
    ) {}

    /**
     * @param ProductToCalculationDto $productToCalculation
     *
     * @return CalculatedResultDto
     */
    public function calculate(ProductToCalculationDto $productToCalculation): CalculatedResultDto
    {
        $product = $this->productService->findById($productToCalculation->product);
        $tax = $this->taxService->findByCode($productToCalculation->taxCode);
        $calculatedTaxValue = $tax->getCalculated($product->getPrice());

        return new CalculatedResultDto(
            $tax->getCountry(),
            $tax->getRate(),
            $calculatedTaxValue,
            $product->getPrice() + $calculatedTaxValue
        );
    }
}
