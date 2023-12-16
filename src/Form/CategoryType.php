<?php

namespace App\Form;

use App\Entity\Category;
use App\Form\_partials\Choice;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
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
                'label' => 'Nom de la catégorie',
                'choices' => $this->choice->getCategoryChoice(),
                'row_attr' => [
                    'class' => 'form-group'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
