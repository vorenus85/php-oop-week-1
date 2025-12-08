<?php
class MovieInputValidator
{
    /**
     *
     * @param string $title
     * @param integer $year
     * @param integer $length
     * @return void
     */
    public static function validate(string $title, int $year, int $length): void
    {
        self::validateTitle($title);
        self::validateYear($year);
        self::validateLength($length);
    }

    /**
     *
     * @param string $title
     * @return void
     */
    public static function validateTitle(string $title): void
    {
        if ($title === "") {
            throw new InvalidArgumentException('Missing parameter: title');
        }
    }

    /**
     *
     * @param integer $year
     * @return void
     */
    public static function validateYear(int $year): void
    {
        if ($year < 0) {
            throw new InvalidArgumentException('Do not add negative value: year');
        }
    }

    /**
     *
     * @param integer $length
     * @return void
     */
    public static function validateLength(int $length): void
    {
        if ($length < 0) {
            throw new InvalidArgumentException('Do not add negative value: length');
        }
    }
}
