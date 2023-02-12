<?php

namespace App\Validator;

use Attribute;
use Symfony\Component\Validator\Constraint;


/**
 * Class TaxCode
 */
#[Attribute]
class TaxCode extends Constraint
{
    public string $message = 'Invalid tax code';
}
