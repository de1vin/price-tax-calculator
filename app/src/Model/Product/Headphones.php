<?php

namespace App\Model\Product;


/**
 * Class Headphones
 */
class Headphones implements ProductInterface
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return 'headphones';
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Headphones';
    }

    /**
     * @return int|float
     */
    public function getPrice(): int|float
    {
        return 100;
    }
}
