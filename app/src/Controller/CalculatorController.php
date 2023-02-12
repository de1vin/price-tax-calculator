<?php

namespace App\Controller;

use App\Dto\ProductToCalculationDto;
use App\Form\CalculatorType;
use App\Service\CalculatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;


/**
 * Class CalculatorController
 */
#[Route('/', name: 'calculator_' )]
class CalculatorController extends AbstractController
{
    public function __construct(
        private readonly CalculatorService $calculatorService,
        private readonly DenormalizerInterface $denormalizer,
    ) {}

    /**
     * @param Request $request
     *
     * @return Response
     *
     * @throws
     */
    #[Route('', name: 'index')]
    public function index(Request $request): Response
    {
        /** @var ProductToCalculationDto $productToCalculation */
        $productToCalculation = $this->denormalizer->denormalize(
            $request->request->all(),
            ProductToCalculationDto::class
        );

        $calculatorForm = $this->createForm(CalculatorType::class, $productToCalculation);
        $calculatorForm->handleRequest($request);

        if ($calculatorForm->isSubmitted() && $calculatorForm->isValid()) {
            $calculatedResult = $this->calculatorService->calculate($productToCalculation);
        }

        return $this->render('calculator/index.html.twig', [
            'calculatorForm' => $calculatorForm,
            'calculatedResult' => $calculatedResult ?? null
        ]);
    }
}
