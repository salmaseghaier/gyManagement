<?php

namespace App\Form;

use App\Entity\Abonnement;
use App\Entity\Course;
use App\Entity\User;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbonnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', choiceType::class, [
                'choices' => [
                    'Monthly' => 'monthly',
                    'Annual' => 'annual',
                ]
            ])
            ->add('price', NumberType::class,[
                'label' => 'Price',
                'attr' => [
                    'placeholder' => 'Enter the subscription price' ,
                ]
            ])
            ->add('startDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Start date',
                'required' => true,
            ])
            ->add('endDate', DateType::class, [
                'widget' => 'single_text',
                'label' => 'End date',
                'required' => true,
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'email',
                'label' => 'User',
                'placeholder' => 'Select a user',
            ])
            ->add('courses', EntityType::class, [
                'label' => 'Courses',
                'class' => Course::class,
                'choice_label' => 'title',
                'multiple' => true,
                'expanded' => true,
                'attr' => [
                    'class' => 'form-select',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abonnement::class,
        ]);
    }
}
