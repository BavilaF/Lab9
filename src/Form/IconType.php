<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Componenet\OptionsResolver\OptionsResolver;
use App\Entity\Icon;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class IconType extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options) {

    $builder->
    ->add('Icon', FileType::class, ['label' => 'Upload icon'])
    ->add('save', SubmitType::class, ['label' => 'Create new item']);
  }

  public function configureOptions(OptiosnResolver $resolver) {
    $resolver->setDefaults(['data_class' => Icon::class]);
  }
}
