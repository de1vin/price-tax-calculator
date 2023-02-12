<?php

namespace App\Form;


use App\Dto\ProductToCalculationDto;
use App\Service\ProductService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


/**
 * Class CalculatorType
 */
class CalculatorType extends AbstractType
{
    public function __construct(
        private readonly ProductService $productService
    ) {}

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product', ChoiceType::class, [
                'choices' => $this->getProductChoices()
            ])
            ->add('taxCode', TextType::class)
            ->add('calcBtn', SubmitType::class, ['label' => 'Calculate'])
        ;
    }

    /**
     * @return array
     */
    private function getProductChoices(): array
    {
        $choices = [];

        foreach ($this->productService->list() as $product) {
            $label = sprintf('%s - %d €', $product->getTitle(), $product->getPrice());
            $choices[$label] = $product->getId();
        }

        return $choices;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ProductToCalculationDto::class,
        ]);
    }
}
