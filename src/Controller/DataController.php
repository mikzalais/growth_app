<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DataController extends AbstractController
{

  /**
   * @Route("/data/load", name="data_load")
   */
  public function load()
  {
    // load from json and return as json response
    $json = file_get_contents('../data/potato_sales.json');
    $response = JsonResponse::fromJsonString($json);
    return $response;
  }

  /**
   * @Route("/data/store", name="data_store")
   */
  public function store(Request $request)
  {
    $request = Request::createFromGlobals();
    $product_name = $request->get('product_name');
    $product_id = $request->get('product_id');
    $sales_start_data = $request->get('sales_start_data');
    $product_id = $request->get('product_id');
    if ($product_name && $product_id) {
      $response = JsonResponse::fromJsonString('{ "status": "success" }');
    } else {
      $response = JsonResponse::fromJsonString('{ "status": "failure" }');
    }
    return $response;
  }

}
