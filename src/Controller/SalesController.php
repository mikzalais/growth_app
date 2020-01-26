<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SalesController extends AbstractController
{
    /**
     * @Route("/sales", name="sales")
     */
    public function index()
    {
        return $this->render('sales/index.html.twig', [
            'controller_name' => 'SalesController',
        ]);
    }
}
