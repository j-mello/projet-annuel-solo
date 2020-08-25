<?php

namespace secretshop\managers;

use secretshop\core\Manager;
use secretshop\models\Product;

class ProductManager extends Manager
{
    public function __construct()
    {
        parent::__construct(Product::class, 'product');
    }
}