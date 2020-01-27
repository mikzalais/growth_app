<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DataController extends AbstractController
{

  /**
   * @Route("/load", name="data_load")
   */
  public function load()
  {
    // load from json and return as json response
    $json = file_get_contents('../assets/potato_sales.json');
    $response = JsonResponse::fromJsonString($json);
    return $response;
  }

  /**
   * @Route("/store", name="data_store")
   */
  public function store()
  {
    // receive data and acknowledge
    $request = Request::createFromGlobals();
    $product_name = $request->request->get('product_name');
    $product_id = $request->request->get('product_id');
    if ($product_name && $product_id) {
      $response = JsonResponse::fromJsonString('{ "status": "success" }');
    } else {
      $response = JsonResponse::fromJsonString('{ "status": "failure" }');
    }
    return $response;
  }

}
