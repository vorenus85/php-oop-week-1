<?php

class OrderPrinter
{

    /**
     * Undocumented function
     *
     * @param Order $order
     * @return string
     */
    public static function render(Order $order): string
    {
        $return = "";
        $orderItems = $order->get();
        $discountAmount = $order->getDiscountAmount();

        foreach ($orderItems as $orderItem) {
            $return .= "Item: " . $orderItem->getItem()->getName() . ", Qty.: " . $orderItem->getQty() . " SubTotal: " . $order->getSubtotal($orderItem) . "</br>";
        }

        if ($discountAmount > 0) {
            $return .= "Discount : " . $discountAmount . "</br>";
        }

        $return .= "Final amount: " . $order->getFinalAmount();

        return $return;
    }
}
