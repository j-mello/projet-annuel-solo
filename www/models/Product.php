<?php

namespace secretshop\models;

class Product extends Model
{
    protected $id;
    protected $name;
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
}