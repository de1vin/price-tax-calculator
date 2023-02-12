<?php

namespace App\Model\Product;


/**
 * Class PhoneCase
 */
class PhoneCase implements ProductInterface
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return 'phone_case';
    }
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return 'Phone case';
    }

    /**
     * @return int|float
     */
    public function getPrice(): int|float
    {
        return 20;
    }
}
