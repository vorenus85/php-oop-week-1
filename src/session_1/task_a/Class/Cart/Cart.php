<?php
class Cart
{

    /**
     *
     * @var Product[]
     */
    private array $cart = [];

    /**
     *
     * @param Product[] $cart
     */
    public function __construct(array $cart = [])
    {
        $this->cart = $cart;
    }

    /**
     *
     * @param Product $item
     * @return void
     */
    public function addProduct(Product $item): void
    {
        $this->cart[] = $item;
    }

    /**
     *
     * @return float
     */
    public function getTotal(): float
    {
        $cartItems = $this->cart;
        $total = 0;
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->getPrice();
        }
        return $total;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->cart;
    }
}
