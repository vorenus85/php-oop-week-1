<?php
class ExerciseInputValidator
{
    /**
     *
     * @param string $name
     * @param float $usedCaloriePerMinute
     * @return void
     */
    public static function validate(string $name, float $usedCaloriePerMinute): void
    {
        if ($name === "") {
            throw new InvalidArgumentException("Missing exercise name");
        }

        if ($usedCaloriePerMinute < 0) {
            throw new InvalidArgumentException("Used calorie per minute must be positive number");
        }
    }
}
