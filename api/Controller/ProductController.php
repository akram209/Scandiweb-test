<?php

namespace  Api\Controller;

use Api\Model\Product;
use Api\Core\Request;

class ProductController
{
    private $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function index()
    {
        $product = new Product();
        echo json_encode($product->getAll());
    }
    public function store()
    {

        $product = new Product();
        $product->store();
    }

    // Other actions like create, update, delete can be added here
}
