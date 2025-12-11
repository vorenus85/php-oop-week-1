<?php

include_once __DIR__ . '/BasicInputValidator.php';

class ContentInputValidator
{

    /**
     *
     * @param string $title
     * @param float $rating
     * @return void
     */
    public function validate(string $title, float $rating): void
    {
        $this->validateTitle($title);
        $this->validateRating($rating);
    }

    /**
     *
     * @param string $title
     * @return void
     */
    private function validateTitle(string $title): void
    {
        BasicInputValidator::stringValidation($title, 'title');
    }

    /**
     *
     * @param float $rating
     * @return void
     */
    private function validateRating(float $rating): void
    {
        BasicInputValidator::ratingValidation($rating, 'rating');
    }
}
