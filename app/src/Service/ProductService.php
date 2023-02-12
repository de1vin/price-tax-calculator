<?php

namespace App\Service;


use App\Helper\ModelListLoader;
use App\Model\Product\ProductInterface;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Class ProductService
 */
class ProductService
{
    private string $modelsPath;

    /**
     * @param KernelInterface $appKernel
     */
    public function __construct(KernelInterface $appKernel)
    {
        $this->modelsPath = sprintf('%s/src/Model/Product', $appKernel->getProjectDir());
    }

    /**
     * @return ProductInterface[]
     */
    public function list(): array
    {
        $productModelsList = ModelListLoader::load(
            $this->modelsPath,
            'App\Model\Product',
            ProductInterface::class
        );
        $products = [];

        foreach ($productModelsList as $productModel) {
            $products[$productModel->getId()] = $productModel;
        }

        return $products;
    }

    public function findById(string $productId): ?ProductInterface
    {
        $productModel = null;

        foreach ($this->list() as $product) {
            if ($product->getId() === $productId) {
                $productModel = $product;
                break;
            }
        }

        return $productModel;
    }
}
