<?php

namespace App\Form;

use App\Entity\Depenses;
use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class DepensesType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montant')
            ->add('createdAt',ChoiceType::class, [
                'choices' => [
                    'now' => new \DateTime('now'),
                    'tomorrow' => new \DateTime('+1 day'),
                    '1 week' => new \DateTime('+1 week'),
                    '1 month' => new \DateTime('+1 month'),
                ]])
                ->add('category', EntityType::class, [
                    'class' => Categories::class,
                    'required' => true,
                    'choice_label' => 'Category',
                ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Depenses::class,
        ]);
    }
}
