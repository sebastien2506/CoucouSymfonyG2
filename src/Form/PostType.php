<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\section;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('postTitel')
            ->add('postDescription')
            ->add('postDateCreated', null, [
                'widget' => 'single_text',
            ])
            ->add('postDatepublished', null, [
                'widget' => 'single_text',
            ])
            ->add('postPublished')
            ->add('sections', EntityType::class, [
                'class' => section::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
