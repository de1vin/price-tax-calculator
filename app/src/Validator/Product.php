<?php

namespace App\Validator;

use Attribute;
use Symfony\Component\Validator\Constraint;


/**
 * Class Product
 */
#[Attribute]
class Product extends Constraint
{
    public string $message = 'Product not found';
}
