<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;

use App\Entity\Image as Picture;

class AddImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('path', FileType::class, [
                'label' => false,
                'mapped' => false,
                'by_reference' => false,
                'required' => false,
                'row_attr' => [
                    'class' => 'input-group input-group-lg mb-3'
                ],
                'attr' => [
                    'class' => 'form-control rounded',
                ],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Please add an image',
                    ]),
                    new Assert\Image([
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image format',
                        'allowPortrait' => false,
                        'allowPortraitMessage' => "You can't upload a portrait image",
                        'maxSize' => '2000k',
                        'maxSizeMessage' => 'Your file is too heavy',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Picture::class,
        ]);
    }
}
