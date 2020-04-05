<?php

namespace App\Form;

use App\Entity\Picture;
use App\Entity\Project;
use App\Entity\Technology;
use App\Entity\Tools;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProjectType extends AbstractType
{
  /**
   * @param FormBuilderInterface $builder
   * @param array $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('projectName', TextType::class, [
        'attr' => [
          'placeholder' => 'Nom du projet',
          'class' => 'form-control-sm'
        ],
        'label' => false
      ])
      ->add('projectDesc', TextareaType::class, [
        'attr' => [
          'placeholder' => 'Description du projet',
          'class' => 'form-control-sm'
        ],
        'label' => false
      ])
      ->add('technologies', EntityType::class, [
        'class' => Technology::class,
        'label' => 'Technologies',
        'required' => true,
        'choice_label' => 'technoName',
        'multiple' => true
      ])
      ->add('tools', EntityType::class, [
        'class' => Tools::class,
        'label' => 'Outils',
        'required' => true,
        'choice_label' => 'toolName',
        'multiple' => true
      ])
      ->add('pictures', EntityType::class, [
        'class' => Picture::class,
        'label' => 'Images',
        'required' => true,
        'choice_label' => 'pictureFile',
        'multiple' => true
      ])
      ->add('createdAt');
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Project::class,
    ]);
  }
}
