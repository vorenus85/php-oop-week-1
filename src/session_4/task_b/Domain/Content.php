<?php

include_once __DIR__ . '/ContentInputValidator.php';

class Content
{
    private string $title;
    private Genre $genre;
    private float $rating;

    /**
     *
     * @param string $title
     * @param Genre $genre
     * @param float $rating
     */
    public function __construct(string $title, Genre $genre, float $rating)
    {

        $contentValidator = new ContentInputValidator();

        $contentValidator->validate($title, $rating);
        $this->title = $title;
        $this->genre = $genre;
        $this->rating = $rating;
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
     * @return Genre
     */
    public function getGenre(): Genre
    {
        return $this->genre;
    }

    /**
     *
     * @return float
     */
    public function getRating(): float
    {
        return $this->rating;
    }
}
