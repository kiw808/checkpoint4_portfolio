<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Project;
use App\Entity\Techno;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('date', DateType::class)
            ->add('url', TextType::class)
            ->add('description', TextareaType::class)
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'placeholder' => '--- Client ---',
                'choice_label' => 'name',
            ])
            ->add('technos', EntityType::class, [
                'class' => Techno::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
