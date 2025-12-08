<?php

include("../Class/Product/Product.php");
include("../Class/Cart/Cart.php");

$pizza = new Product('Pizza margarita', 2500);
$carbonara = new Product('Carbonara', 3200);

$cart = new Cart();
$cart->addProduct($pizza);
$cart->addProduct($carbonara);

$total = $cart->getTotal();
$products = $cart->getProducts();

var_dump($products);
