<?php

class Order
{
    /**
     *
     * @var array<OrderItem>
     */
    private array $orderItems = [];

    public function __construct(private DiscountPolicy $discountPolicy) {}

    /**
     *
     * @return array<OrderItem>
     */
    public function get(): array
    {
        return $this->orderItems;
    }

    /**
     *
     * @param OrderItem $orderItem
     * @return void
     */
    public function add(OrderItem $orderItem): void
    {
        $this->orderItems[] = $orderItem;
    }

    /**
     *
     * @return float
     */
    public function getTotal(): float
    {
        $sum = 0;

        foreach ($this->orderItems as $orderItem) {
            $sum += $this->getSubtotal($orderItem);
        }

        return $sum;
    }

    /**
     *
     * @param OrderItem $orderItem
     * @return float
     */
    public function getSubtotal(OrderItem $orderItem): float
    {
        return $orderItem->getItem()->getPrice() * $orderItem->getQty();
    }

    /**
     *
     * @return float
     */
    public function getFinalAmount(): float
    {
        $sum = $this->getTotal();
        return $this->discountPolicy->apply($sum);
    }

    /**
     *
     * @return float
     */
    public function getDiscountAmount(): float
    {
        $sum = $this->getTotal();
        return $sum - $this->getFinalAmount();
    }
}
