<?php

namespace App\Form;

use App\Entity\Banner;
use App\Entity\Campaign;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CampaignBannersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('banners', EntityType::class, [
                'class' => Banner::class,
                'choices' => $options['banners'],
                'choice_label' => false,
                'choice_attr' => function (Banner $banner) {
                    return [
                        'imageUrl' => $banner->getImageUrl(),
                        'name' => $banner->getName(),
                        'campaigns' => json_encode($banner->getCampaigns()->map(function (Campaign $campaign) {
                            return $campaign->getName();
                        })->toArray()),
                    ];
                },
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Campaign::class,
        ]);

        $resolver->setRequired('banners');
    }
}
