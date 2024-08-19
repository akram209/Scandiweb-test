<?php

namespace Api\Controller;

use Api\Model\Product;
use Api\Core\Request;

class ProductController
{
    public function index(Request $request)
    {
        $product = new Product();
        echo json_encode($product->getAll());
    }

    // Other actions like create, update, delete can be added here
}
