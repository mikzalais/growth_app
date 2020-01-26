<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewProductController extends AbstractController
{
    /**
     * @Route("/new/product", name="new_product")
     */
    public function index()
    {
        return $this->render('new_product/index.html.twig', [
            'controller_name' => 'NewProductController',
        ]);
    }
}
