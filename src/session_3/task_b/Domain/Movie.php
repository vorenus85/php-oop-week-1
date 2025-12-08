<?php

require_once __DIR__ . "/MovieInputValidator.php";

class Movie
{
    private string $title;
    private int $year;
    private int $length;

    /**
     *
     * @param string $title
     * @param integer $year
     * @param integer $length
     */
    public function __construct(string $title, int $year, int $length)
    {
        MovieInputValidator::validate($title, $year, $length);
        $this->title = $title;
        $this->year = $year;
        $this->length = $length;
    }

    /**
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     *
     * @return integer
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     *
     * @return integer
     */
    public function getLength(): int
    {
        return $this->length;
    }
}
