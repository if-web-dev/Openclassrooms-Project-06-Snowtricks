<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', TextareaType::class, [
                'label' => false,
                'attr' => [
                    'rows' => '5',
                    'class' => 'form-control text-white rounded',
                    'cols' => '60',
                    'placeholder' => 'Post a comment'
                ]
            ])
            ->add('author', HiddenType::class )
            ->add('trick', HiddenType::class )
            ->add('save', SubmitType::class, [
                'label' => 'Send a comment',
                'attr' => [
                    'class' => 'btn btn-lg btn-home-grid d-block mx-auto mt-4 rounded shadow-lg',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
