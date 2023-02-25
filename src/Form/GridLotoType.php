<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Count;

class GridLotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('userBallsSelection', ChoiceType::class, [
                'constraints' => new Count(['max' => 5]),
                'choices' => [
                    array_combine(range(1, 49), range(1, 49))
                ],
                'expanded' => true,
                'multiple' => true,
            ])
            ->add('userLuckyNumberSelection', ChoiceType::class, [
                'constraints' => new Count(['max' => 1]),
                'choices' => [
                    array_combine(range(1, 10), range(1, 10))
                ],
                'expanded' => true,
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
