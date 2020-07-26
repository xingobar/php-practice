<?php

namespace Cart;

class Product
{
    // 產品名稱
    private $name;

    // 產品價格
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }

}