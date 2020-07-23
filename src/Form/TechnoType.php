<?php

namespace App\Form;

use App\Entity\Techno;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TechnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('type', ChoiceType::class, [
                'placeholder' => '--- Type ---',
                'choices' => [
                    'Web language' => 'Web language',
                    'Programming language' => 'Programming language',
                    'Framework' => 'Framework',
                    'Other' => 'Other',
                ]
            ])
            ->add('description', TextareaType::class)
            ->add('image');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Techno::class,
        ]);
    }
}
