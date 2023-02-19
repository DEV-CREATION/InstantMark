<?php

namespace App\Form;

use App\Entity\Campaign;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CampaignType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name',
                'attr' => [
                    'placeholder' => 'Name',
                ],
            ])
            ->add('startedAt', DateType::class, [
                'label' => 'Started at',
                'attr' => [
                    'placeholder' => 'Started at',
                ],
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
            ])
            ->add('endedAt', DateType::class, [
                'label' => 'Ended at',
                'attr' => [
                    'placeholder' => 'Ended at',
                ],
                'input' => 'datetime_immutable',
                'widget' => 'single_text',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Campaign::class,
        ]);
    }
}
