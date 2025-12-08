<?php

class MovieFormatter
{


    /**
     *
     * @param Movie $movie
     * @return void
     */
    public static function render(Movie $movie): void
    {
        echo (self::format($movie));
    }

    /**
     *
     * @param array<Movie> $movies
     * @return void
     */
    public static function renderList(array $movies): void
    {
        foreach ($movies as $movie) {
            self::render($movie);
        }
    }

    /**
     *
     * @param Movie $movie
     * @return string
     */
    private static function format(Movie $movie): string
    {
        return "\"" . $movie->getTitle() . " (" . $movie->getYear() . ") - " . $movie->getLength() . " min.\"</br>";
    }
}
