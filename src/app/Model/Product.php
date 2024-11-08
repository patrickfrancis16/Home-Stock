<?php

namespace AndersonLucas\HomeStock\Model;

class Product
{
    private $id;
    private $category_id;
    private $name;
    private $description;
    private $sku;

    public function __construct($id, $category_id, $name, $description, $sku)
    {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->name = $name;
        $this->description = $description;
        $this->sku =  $sku;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'description' => $this->description,
            'sku' => $this->sku
        ];
    }
}