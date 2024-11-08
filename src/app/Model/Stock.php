<?php

namespace AndersonLucas\HomeStock\Model;


class Stock{

    private $id;
    private $product_id;
    private $quantity;

    public function __construct($id, $product_id, $quantity){
        $this->id = $id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function getId(){
        return $this->id;
    }

    public function getProductId(){
        return $this->product_id;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setProductId($product_id){
        $this->product_id = $product_id;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function toArray(){
        return [
            'id' => $this->id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity
        ];
    }
}

