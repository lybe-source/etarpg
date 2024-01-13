<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Inventory;
use App\Entity\Items;
use App\Entity\Rarity;
use App\Entity\Statistics;
use App\Form\_partials\Choice;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemsType extends AbstractType
{

    private $em;
    private $choice;

    public function __construct(EntityManagerInterface $em, Choice $choice)
    {
        $this->em = $em;
        $this->choice = $choice;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'row_attr' => [
                    'class' => 'form-group'
                ],
            ])
            ->add('description', TextType::class, [
                'row_attr' => [
                    'class' => 'form-group'
                ],
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'choices' => $this->em->getRepository(Category::class)->findAll(),
                'row_attr' => [
                    'class' => 'form-group'
                ],
            ])
            ->add('rarity', EntityType::class, [
                'class' => Rarity::class,
                'choice_label' => 'name',
                'row_attr' => [
                    'class' => 'form-group'
                ],
            ])
            ->add('stat', EntityType::class, [
                'class' => Statistics::class,
                'choice_label' => function (Statistics $stat = null) {
                    return $stat ? $stat->getName() . ' - ' . $stat->getAmount() : '';
                },
                'choices' => $this->em->getRepository(Statistics::class)->findAll(),
                'row_attr' => [
                    'class' => 'form-group'
                ]
            ])
            ->add('score', ChoiceType::class, [
                'label' => "Score de l'item",
                'choices' => $this->choice->getScoreItemChoice(),
                'row_attr' => [
                    'class' => 'form-group'
                ]
            ])
            ->add('imageFile', FileType::class, [
                'label' => "Image de l'item",
                'required' => false,
                'row_attr' => [
                    'class' => 'form-group'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Items::class,
        ]);
    }
}
