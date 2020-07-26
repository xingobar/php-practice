<?php

require_once('./Product.php');
require_once('./Cart.php');

class CartService
{
    /**
     * 產品列表
     * @var array
     */
    protected $carts = [];

    /**
     * 新增產品
     * @param Product $product
     */
    public function add(Product $product)
    {
        $index = $this->getIndexByName($product);
        if ($index === null) {
            $this->carts[] = new Cart($product);
        }
    }

    /**
     * 根據產品名稱取得索引
     * @param $product
     * @return int|string|null
     */
    private function getIndexByName($product)
    {
        $index = null;
        foreach($this->carts as $key => $cart) {
            if ($cart->getProduct()->getName() === $product->getName()) {
                $index = $key;
                break;
            }
        }
        return $index;
    }

    /**
     * 移除產品
     * @param Product $product
     */
    public function remove($product)
    {
        $removeIndex = $this->getIndexByName($product);
        if ($removeIndex !== null) {
            unset($this->carts[$removeIndex]);
        }
    }

    /**
     * 更新商品數量
     * @param $product - 產品名稱
     * @param $quantity - 數量
     */
    public function updateQuantity($product, $quantity)
    {
        $index = $this->getIndexByName($product);
        if ($index !== null) {
            // 更新購物車產品數量
            $this->carts[$index]->updateQuantity($quantity);
        }
    }

    /**
     * 取得總價格
     * @return float|int
     */
    public function getTotalPrice()
    {
        return array_sum(array_map(function(Cart $cart) {
            return $cart->getTotalPrice();
        }, $this->carts));
    }

    public function getList()
    {
        foreach($this->carts as $key => $cart) {
            $index = $key + 1;
            $product = $cart->getProduct();
            echo "-----產品{$index}-------" . PHP_EOL;
            echo '產品名稱: ' . $product->getName() . PHP_EOL;
            echo '產品價格: ' . $product->getPrice() . PHP_EOL;
            echo '產品數量:' . $cart->getQuantity() . PHP_EOL;
            echo '總價格: ' . $cart->getTotalPrice() . PHP_EOL;
        }
    }
}