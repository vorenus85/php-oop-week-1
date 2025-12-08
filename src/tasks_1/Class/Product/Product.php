<?php
class Product
{
    private string $name;
    private float $price;

    /**
     *
     * @param string $name
     * @param float $price
     */
    public function __construct(string $name, float $price)
    {
        $this->name = $name;

        if ($price < 0) {
            throw new InvalidArgumentException('Do not give negative for price');
        } else {
            $this->price = $price;
        }
    }

    /**
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
