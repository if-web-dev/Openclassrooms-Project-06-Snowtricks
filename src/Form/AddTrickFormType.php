<?php

namespace App\Form;

use App\Entity\Trick;
use App\Form\VideoType;
use App\Entity\Category;
use App\Form\AddImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AddTrickFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control rounded',
                    'placeholder' => 'Add a trick name',
                ]
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'placeholder' => 'Select a trick category',
                'choice_label' => 'name'
            ])
            ->add('description', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'rows' => 5,
                    'cols' => 50,
                    'placeholder' => 'Post a trick description'
                ]
            ])
            ->add('videos', CollectionType::class, [
                'entry_type' => VideoType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false
            ])
            ->add('images', CollectionType::class, [
                'entry_type' => AddImageType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Save this Trick',
                'attr' => [
                    'class' => 'btn btn-home-grid btn-lg d-block mx-auto mt-4 rounded shadow-lg',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
