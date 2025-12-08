<?php

class MovieCollection
{

    /**
     *
     * @var array<Movie>
     */
    private array $movies = [];

    /**
     *
     * @param array<Movie> $movies
     */
    public function __construct(array $movies)
    {
        $this->movies = $movies;
    }

    /**
     *
     * @param Movie $movie
     * @return void
     */
    public function add(Movie $movie): void
    {
        $this->movies[] = $movie;
    }


    /**
     *
     * @return array<Movie>
     */
    public function get(): array
    {
        return $this->movies;
    }

    /**
     *
     * @param integer $year
     * @return array<Movie>
     */
    public function findByYear(int $year): array
    {
        return array_filter($this->movies, function ($movie) use ($year) {
            return $year === $movie->getYear();
        });
    }

    /**
     *
     * @param string $filter
     * @return array<Movie>
     */
    public function filterByKeyword(string $filter): array
    {
        return array_filter($this->movies, function ($movie) use ($filter) {
            return str_contains($movie->getTitle(), $filter);
        });
    }

    /**
     *
     * @return void
     */
    public function sort(): void
    {
        $this->sortByLength();
    }

    /**
     *
     * @return Movie
     */
    public function getLongestMovie(): Movie
    {
        $this->sort();

        return $this->movies[0];
    }

    /**
     *
     * @return void
     */
    private function sortByLength(): void
    {
        usort($this->movies, function ($a, $b) {
            return $b->getLength() <=> $a->getLength();
        });
    }
}
