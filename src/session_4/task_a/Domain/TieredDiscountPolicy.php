<?php
interface DiscountPolicy
{
    public function apply(float $price): float;
}


class TieredDiscountPolicy implements DiscountPolicy
{
    public function apply(float $price): float
    {
        if ($price > 10000) {
            return $price * 0.8;
        }

        if ($price >= 5000 && $price <= 10000) {
            return $price * 0.9;
        }

        return $price;
    }
}
