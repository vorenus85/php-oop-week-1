<?php
class MenuItemValidator
{
    public static function validate(string $name, int $price): void
    {

        self::validateName($name);
        self::validatePrice($price);
    }

    /**
     *
     * @param string $name
     * @return void
     */
    public static function validateName(string $name): void
    {
        if (strlen($name) <= 0) {
            throw new InvalidArgumentException('Missin name property');
        }
    }

    /**
     *
     * @param int $price
     * @return void
     */
    public static function validatePrice(int $price): void
    {
        if ($price < 0) {
            throw new InvalidArgumentException('Price must be positive value');
        }
    }
}
