<?php

namespace App\Service;

use App\Helper\ModelListLoader;
use App\Model\CountryTax\CountryTaxInterface;
use Symfony\Component\HttpKernel\KernelInterface;


/**
 * Class TaxService
 */
class TaxService
{
    private string $modelsPath;

    /**
     * @param KernelInterface $appKernel
     */
    public function __construct(KernelInterface $appKernel)
    {
        $this->modelsPath = sprintf('%s/src/Model/CountryTax', $appKernel->getProjectDir());
    }

    /**
     * @return CountryTaxInterface[]
     */
    public function list(): array
    {
        $productModelsList = ModelListLoader::load(
            $this->modelsPath,
            'App\Model\CountryTax',
            CountryTaxInterface::class
        );
        $products = [];

        foreach ($productModelsList as $productModel) {
            $products[$productModel->getId()] = $productModel;
        }

        return $products;
    }

    /**
     * @param string $taxCode
     *
     * @return CountryTaxInterface|null
     */
    public function findByCode(string $taxCode): ?CountryTaxInterface
    {
        $taxModel = null;

        foreach ($this->list() as $tax) {
            $isPatternMatched = (bool)preg_match($tax->getCodePatter(), $taxCode);

            if ($isPatternMatched) {
                $taxModel = $tax;
                break;
            }
        }

        return $taxModel;
    }
}
