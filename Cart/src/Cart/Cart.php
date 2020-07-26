<?php

namespace Cart;

use Cart\Product;

class Cart
{
    private $product;
    private $quantity;

    public function __construct(Product $product, $quantity = 1)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * 取得總價錢
     * @return float|int
     */
    public function getTotalPrice()
    {
        return $this->product->getPrice() * $this->quantity;
    }

    /**
     * 更新產品數量
     * @param $quantity
     */
    public function updateQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}