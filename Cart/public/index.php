<?php

require '../vendor/autoload.php';

use Cart\CartService;
use Cart\Product;

$product = new Product('產品1', 1500);
$product1 = new Product('產品2', 2000);

$service = new CartService();
$service->add($product);
$service->add($product1);
$service->getList();
echo('[*]購物車總金額: ' . $service->getTotalPrice()) . PHP_EOL;

echo('[*] 更改數量') . PHP_EOL;
$service->updateQuantity($product, 5);
$service->getList();

echo('----------') . PHP_EOL;
echo('[*] 移除產品1' . PHP_EOL);
$service->remove($product);
$service->getList();