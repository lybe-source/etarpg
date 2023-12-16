<?php

namespace App\Form;

use App\Entity\Statistics;
use App\Form\_partials\Choice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StatisticsType extends AbstractType
{
    private $choice;

    public function __construct(Choice $choice)
    {
        $this->choice = $choice;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', ChoiceType::class, [
                'label' => 'Nom de la stat',
                'choices' => $this->choice->getStatNameChoice(),
                'row_attr' => [
                    'class' => 'form-group'
                ],
            ])
            ->add('amount', ChoiceType::class, [
                'label' => 'Taux de stat',
                'choices' => $this->choice->getAmoutChoice(),
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'disabled' => true,
                'mapped' => false
            ])
            ->add('amount_hidden', ChoiceType::class, [
                'mapped' => false,
                'label' => false,
                'choices' => $this->choice->getAmoutChoice(),
                'attr' => [
                    'style' => 'display:none'
                ],
            ])
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Statistics::class,
        ]);
    }
}
