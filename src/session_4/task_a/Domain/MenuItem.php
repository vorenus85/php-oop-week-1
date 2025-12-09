<?php

require_once __DIR__ . "/MenuItemValidator.php";

class MenuItem
{
    private string $name;
    private int $price;

    public function __construct(string $name, int $price)
    {
        MenuItemValidator::validate($name, $price);
        $this->name = $name;
        $this->price = $price;
    }

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     *
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }
}
