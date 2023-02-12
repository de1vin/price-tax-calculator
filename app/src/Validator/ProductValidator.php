<?php

namespace App\Validator;

use App\Service\ProductService;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedValueException;


/**
 * Class ProductValidator
 */
class ProductValidator extends ConstraintValidator
{
    /**
     * @param ProductService $productService
     */
    public function __construct(private readonly ProductService $productService)
    {}

    /**
     * @param mixed      $value
     * @param Constraint $constraint
     */
    public function validate(mixed $value, Constraint $constraint)
    {
        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        $taxModel = $this->productService->findById($value);

        if ($taxModel === null) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}
