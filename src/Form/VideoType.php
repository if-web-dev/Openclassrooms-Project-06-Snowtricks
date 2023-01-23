<?php

namespace App\Form;

use App\Entity\Video;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Validator\Constraints as Assert;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('url', UrlType::class, [
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Add a Youtube video url',
                        'class' => 'form-control rounded'
                
                    ],
                    'row_attr' => [
                        'class' => 'input-group input-group-lg'
                    ],
                    'constraints' => [
                        new Assert\Regex([
                            'pattern' => '#^https:\/\/www\.youtube\.com\/watch\?v=\w+$#',
                            'match' => true,
                            'message' => 'Please enter a youtube url in the right format'
                        ])
                    ],
                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}
