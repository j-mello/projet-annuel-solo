<?php

namespace secretshop\managers;

use secretshop\core\Manager;
use secretshop\models\Category;

class CategoryManager extends Manager
{
    public function __construct()
    {
        parent::__construct(Category::class, 'category');
    }
}
