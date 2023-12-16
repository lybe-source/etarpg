<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Inventory;
use App\Entity\Items;
use App\Entity\Rarity;
use App\Entity\Statistics;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemsType extends AbstractType
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
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
            ])
            ->add('stat', EntityType::class, [
                'class' => Statistics::class,
                'choice_label' => 'name',
                'choices' => $this->em->getRepository(Statistics::class)->findAll(),
                'row_attr' => [
                    'class' => 'form-group'
                ],
                'multiple' => true,
            ])
            // ->add('inventories', EntityType::class, [
            //     'class' => Inventory::class,
            //     'choice_label' => 'id',
            //     'multiple' => true,
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Items::class,
        ]);
    }
}
