<?php

class BasicInputValidator
{
    /**
     *
     * @param string $value
     * @param string $fieldName
     * @return void
     */
    public static function stringValidation(string $value, string $fieldName): void
    {
        if (strlen($value) < 1) {
            throw new InvalidArgumentException('Missing ' . $fieldName . ' parameter');
        }
    }

    /**
     *
     * @param float $value
     * @param string $fieldName
     * @return void
     */
    public static function ratingValidation(float $value, string $fieldName): void
    {
        if ($value < 0 || $value > 10) {
            throw new InvalidArgumentException($fieldName . ' must be 0 and 10');
        }
    }
}
