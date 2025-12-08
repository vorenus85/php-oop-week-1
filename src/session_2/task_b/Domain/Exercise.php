<?php
include_once __DIR__ . "/ExerciseInputValidator.php";
class Exercise
{
    private string $name;
    private float $usedCaloriePerMinute;

    /**
     *
     * @param string $name
     * @param float $usedCaloriePerMinute
     */
    public function __construct(string $name, float $usedCaloriePerMinute)
    {
        ExerciseInputValidator::validate($name, $usedCaloriePerMinute);
        $this->name = $name;
        $this->usedCaloriePerMinute = $usedCaloriePerMinute;
    }

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     *
     * @return float
     */
    public function getUsedCaloriePerMinute(): float
    {
        return $this->usedCaloriePerMinute;
    }
}
