<?php

class OrderItem
{
    private MenuItem $item;
    private int $qty;

    public function __construct(MenuItem $item, int $qty)
    {

        if ($qty < 0) {
            throw new InvalidArgumentException('Quantity must be positive value');
        }

        $this->item = $item;
        $this->qty = $qty;
    }

    /**
     *
     * @return MenuItem
     */
    public function getItem(): MenuItem
    {
        return $this->item;
    }

    /**
     *
     * @return integer
     */
    public function getQty(): int
    {
        return $this->qty;
    }
}
