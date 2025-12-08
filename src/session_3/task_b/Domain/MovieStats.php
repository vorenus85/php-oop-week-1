<?php
class MovieStats
{
    /**
     *
     * @param array<Movie> $movies
     * @return float
     */
    public static function averageLength(array $movies): float
    {
        $moviesCount = count($movies);

        $allLength = 0;

        foreach ($movies as $movie) {
            $allLength += $movie->getLength();
        }

        return $allLength / $moviesCount;
    }
}
