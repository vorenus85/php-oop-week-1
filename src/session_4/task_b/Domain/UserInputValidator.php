<?php
include_once __DIR__ . '/BasicInputValidator.php';

class UserInputValidator
{
    /**
     *
     * @param string $username
     * @param float $rating
     * @return void
     */
    public function validate(string $username, float $rating): void
    {
        $this->validateUsername($username);
        $this->validateMinimumRating($rating);
    }

    /**
     *
     * @param string $username
     * @return void
     */
    private function validateUsername(string $username): void
    {
        BasicInputValidator::stringValidation($username, 'username');
    }

    /**
     *
     * @param float $minimumRating
     * @return void
     */
    private function validateMinimumRating(float $minimumRating): void
    {
        BasicInputValidator::ratingValidation($minimumRating, 'minimumRating');
    }
}
