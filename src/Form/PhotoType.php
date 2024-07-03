<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Photo;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class PhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('filename', FileType::class, [
                'label' => 'Photo',
                'mapped' => false,
                'required' => false,
                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                /*'constraints' => [
                    new File([
                        'maxSize' => '409600k',
                        'mimeTypes' => [
                            'application/jpg',
                            'application/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image file',
                    ])
                ],*/
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Photo::class,
        ]);
    }
}
