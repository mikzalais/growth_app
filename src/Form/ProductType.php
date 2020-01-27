<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('product_name', TextType::class, [
              'required' => true,
              'attr' => [
                'maxlength' => 50
              ]
            ])
            ->add('product_id', IntegerType::class, [
              'required' => true,
            ])
            ->add('product_manager', TextType::class, [
              'attr' => [
                'maxlength' => 30
              ]
            ])
            ->add('sales_start_data', DateType::class, [
              'required' => true,
            ])
            ->add('submit', SubmitType::class, ['label' => 'Submit'])
            ->add('reset', ResetType::class, ['label' => 'Clear'])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
