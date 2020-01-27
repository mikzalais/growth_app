<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;

class NewProductController extends AbstractController
{
    /**
     * @Route("/new/product", name="new_product")
     */
    public function index()
    {
      $new_product_form = $this->createFormBuilder(null, ['attr' => ['id' => 'product-form']])
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

        return $this->render('new_product/index.html.twig', [
            'controller_name' => 'NewProductController',
            'new_product_form' => $new_product_form->createView(),
        ]);
    }
}
