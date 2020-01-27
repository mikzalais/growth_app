<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use app\Form\ProductType;

class NewProductController extends AbstractController
{
    /**
     * @Route("/new/product", name="new_product")
     */
    public function index()
    {
      $form = $this->createFormBuilder(null, ['attr' => ['id' => 'product-form']])
        ->setAction($this->generateUrl('data_store'))
        ->add('product', ProductType::class)
        ->getForm();

        return $this->render('new_product/index.html.twig', [
            'controller_name' => 'NewProductController',
            'form' => $form->createView(),
        ]);
    }
}
