<?php

include_once("./Domain/MenuItem.php");
include_once("./Domain/OrderItem.php");
include_once("./Domain/Order.php");
include_once("./Domain/OrderPrinter.php");
include_once("./Domain/TieredDiscountPolicy.php");

$discountPolicy = new TieredDiscountPolicy();

$menu_item_1 = new MenuItem('Hamburger', 2500);
$menu_item_2 = new MenuItem('Sült krumpli', 1200);
$menu_item_3 = new MenuItem('Cola', 600);


$order_item_1 = new OrderItem($menu_item_1, 2);
$order_item_2 = new OrderItem($menu_item_2, 1);
$order_item_3 = new OrderItem($menu_item_3, 3);

$my_order = new Order($discountPolicy);

$my_order->add($order_item_1);
$my_order->add($order_item_2);
$my_order->add($order_item_3);

$orderHTML = OrderPrinter::render($my_order);

echo ($orderHTML);
