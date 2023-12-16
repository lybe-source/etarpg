<?php

namespace App\Form;

use App\Entity\Rarity;
use App\Form\_partials\Choice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RarityType extends AbstractType
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
                'label' => 'Nom de la rareté',
                'choices' => $this->choice->getDropRateNameChoice(),
                'row_attr' => [
                    'class' => 'form-group'
                ],
            ])
            ->add('drop_rate', ChoiceType::class, [
                'label' => 'Taux de drop',
                'choices' => $this->choice->getDropRateChoice(),
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'disabled' => true,
                'mapped' => false
            ])
            ->add('drop_rate_hidden', ChoiceType::class, [
                'mapped' => false,
                'label' => false,
                'choices' => $this->choice->getDropRateChoice(),
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
            'data_class' => Rarity::class,
        ]);
    }
}
