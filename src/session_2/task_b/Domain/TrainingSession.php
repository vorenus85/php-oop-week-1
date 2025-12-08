<?php
include_once __DIR__ . "/DurationValidator.php";
class TrainingSession
{
    private Exercise $exercise;
    private int $duration;

    public function __construct(Exercise $exercise, int $duration)
    {
        DurationValidator::validate($duration);
        $this->exercise = $exercise;
        $this->duration = $duration;
    }

    /**
     *
     * @return Exercise
     */
    public function getExercise(): Exercise
    {
        return  $this->exercise;
    }

    /**
     *
     * @return integer
     */
    public function getDuration(): int
    {
        return  $this->duration;
    }

    /**
     *
     * @return float
     */
    public function getBurnedCalories(): float
    {
        return $this->exercise->getUsedCaloriePerMinute() * $this->duration;
    }
}
