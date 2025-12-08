<?php
include_once __DIR__ . "/WorkoutGoal.php";
class WorkoutStats
{
    /**
     *
     * @param WorkoutLog $workoutLog
     * @return array<string>
     */
    public static function render(WorkoutLog $workoutLog): array
    {
        $sessions = $workoutLog->getSessions();
        $result = ['My workoutstats <br>'];
        for ($i = 0; $i < count($sessions); $i++) {
            $result[] = $i + 1 . '. session was ' . $sessions[$i]->getExercise()->getName() . ' duration was ' . $sessions[$i]->getDuration() . ' minutes, ' . 'used calorie was ' . $sessions[$i]->getBurnedCalories() . 'kcal.<br>';
        }

        $result[] = 'Total calorie burned: ' . $workoutLog->getTotalCalories() . 'kcal<br>';

        $workoutGoal = new WorkoutGoal();


        if ($workoutGoal->goalIsreached($workoutLog->getTotalCalories())) {
            $result[] = "Grats your daily goal is reached!";
        }

        return $result;
    }
}
