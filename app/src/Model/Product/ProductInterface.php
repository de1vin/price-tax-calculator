<?php

namespace App\Model\Product;

/**
 * Interface ProductInterface
 */
interface ProductInterface
{
    public function getId(): string;

    public function getTitle(): string;

    public function getPrice(): int|float;
}
