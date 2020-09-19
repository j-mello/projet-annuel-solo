<?php

namespace secretshop\models;

use secretshop\managers\CategoryManager;

class Product extends Model
{
    protected $id;
    protected $name;
    protected $slug;
    protected $image;
    protected $formerPrice;
    protected $price;
    protected $resume;
    protected $description;
    protected $idCategory;

    /* Setters */

    public function setId($id)
    {
        $this->id=$id;
    }

    public function setName($name)
    {
        $this->name=strip_tags($name);
    }

    public function setSlug($slug)
    {
        $this->name=strip_tags($slug);
    }

    public function setImage($image)
    {
        $this->image=$image;
    }

    public function setFormerPrice($formerPrice)
    {
        $this->formerPrice=$formerPrice;
    }

    public function setPrice($price)
    {
        $this->price=$price;
    }

    public function setResume($resume)
    {
        $this->resume=strip_tags($resume);
    }

    public function setDescription($description)
    {
        $this->description=strip_tags($description);
    }

    public function setIdCategory($idCategory)
    {
        $this->idCategory=$idCategory;
    }

    /* Getters */

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSlug()
    {
        return $this->slug;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function getFormerPrice()
    {
        return $this->formerPrice;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function gettResume()
    {
        return $this->resume;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getIdCategory()
    {
        return $this->idCategory;
    }

    public static function showProductTable($products)
    {
        $categoryManager = new CategoryManager();
        $tabProducts = [];

        foreach($products as $product)
        {
            $category = $categoryManager->find($product->getIdCategory());

            $tabProducts[] = [
                "id" => $product->getId(),
                "name" => $product->getName(),
                "slug" => $product->getSlug(),
                "image" => $product->getImage(),
                "formerPrice" => $product->getFormerPrice(),
                "price" => $product->getPrice(),
                "resume" => $product->gettResume(),
                "description" => $product->getDescription(),
                "idCategory" => $category->getId()
            ];

        }

        $tab = [
            "colonnes"=>[
                "Id",
                "Name",
                "Slug",
                "Image",
                "FormerPrice",
                "Price",
                "Resume",
                "Description",
                "Categorie"
            ],
            "fields"=>[
                "Product"=>[]
            ]
        ];

        $tab["fields"]["Product"] = $tabProducts;

        return $tab;
    }
}