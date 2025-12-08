<?php
include_once __DIR__ . "/WorkoutStats.php";
class WorkoutLog
{

    /** @var TrainingSession[] */
    private array $workouts;

    /**
     *
     * @param TrainingSession $session
     * @return void
     */
    public function addSession(TrainingSession $session): void
    {
        $this->workouts[] = $session;
    }

    /**
     *
     * @return array<TrainingSession>
     */
    public function getSessions(): array
    {
        return $this->workouts;
    }

    /**
     *
     * @return float
     */
    public function getTotalCalories(): float
    {
        $usedCalories = 0;

        foreach ($this->workouts as $workout) {
            $usedCalories += $workout->getBurnedCalories();
        }

        return $usedCalories;
    }

    /**
     *
     * @return array<string>
     */
    public function getSummary(): array
    {
        return WorkoutStats::render($this);
    }
}
