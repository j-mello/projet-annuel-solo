<?php

namespace secretshop\models;

class Category extends Model
{
    protected $id;
    protected $category;

        /* Setters */

        public function setId($id)
        {
            $this->id=$id;
        }
    
        public function setCategory($category)
        {
            $this->category=htmlspecialchars($category);
        }
    
        /* Getters */
    
        public function getId()
        {
            return $this->id;
        }
    
        public function getCategory()
        {
            return $this->category;
        }
}