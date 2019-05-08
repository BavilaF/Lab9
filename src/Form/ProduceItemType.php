<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Componenet\OptionsResolver\OptionsResolver;
use App\Entity\ProduceItem;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProduceItemType extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options) {

    $builder->
    ->add('Name of the item', TextType::class)
    ->add('Expiration Date', DateType::class)
    ->add('Icon', FileType::class, ['label' => 'Upload icon'])
    ->add('save', SubmitType::class, ['label' => 'Create new Task']);
    ->add('showAll', SubmitType::class, ['label' => 'Show all icon names']);
  }

  public function configureOptions(OptiosnResolver $resolver) {
    $resolver->setDefaults(['data_class' => ProduceItem::class]);
  }
}
