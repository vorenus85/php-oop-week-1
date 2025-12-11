<?php

include_once __DIR__ . '/UserInputValidator.php';

class User
{
    private string $username;
    /**
     *
     * @var array<Genre>
     */
    private array $preferredGenres;
    private float $minimumRating;

    /**
     *
     * @param string $username
     * @param array<Genre> $preferredGenres
     * @param float $minimumRating
     */
    public function __construct(string $username, array $preferredGenres, float $minimumRating)
    {
        $userInputValidator = new UserInputValidator();
        $userInputValidator->validate($username, $minimumRating);

        $this->username = $username;
        $this->preferredGenres = $preferredGenres;
        $this->minimumRating = $minimumRating;
    }

    /**
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     *
     * @return array<Genre>
     */
    public function getPreferredGenres(): array
    {
        return $this->preferredGenres;
    }

    /**
     *
     * @return float
     */
    public function getMinimumRating(): float
    {
        return $this->minimumRating;
    }
}
