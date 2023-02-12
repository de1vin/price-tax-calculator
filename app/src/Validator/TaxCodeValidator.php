<?php

namespace App\Validator;

use App\Service\TaxService;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedValueException;


/**
 * Class TaxCodeValidator
 */
class TaxCodeValidator extends ConstraintValidator
{
    public function __construct(private readonly TaxService $taxService)
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

        $taxModel = $this->taxService->findByCode($value);

        if ($taxModel === null) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}
