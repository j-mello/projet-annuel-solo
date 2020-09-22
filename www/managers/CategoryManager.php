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

    public function getSelect() {
        $categories = $this->findAll();
        $categorieSelect = [];
        foreach($categories as $categorie) {
            $categorieSelect[] = ['id' => $categorie->getId(), 'value' => $categorie->getCategory()];
        }
        return $categorieSelect;
    }
}
