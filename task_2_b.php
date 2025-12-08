<?php 
class ExerciseInputValidator {
    public static function validate(string $name, float $usedCaloriePerMinute){
        if($name === ""){
            throw new InvalidArgumentException("Missing exercise name");
        }

        if($usedCaloriePerMinute < 0){
            throw new InvalidArgumentException("Used calorie per minute must be positive number");
        }
    }
}

class DurationValidator {
    public static function validate(int $duration){
        if($duration < 0){
            throw new InvalidArgumentException("Used duration must be positive number");
        }
    }
}


class Exercise {
    private $name;
    private $usedCaloriePerMinute;

    public function __construct(string $name, float $usedCaloriePerMinute)
    {
        ExerciseInputValidator::validate($name, $usedCaloriePerMinute);
        $this->name = $name;
        $this->usedCaloriePerMinute = $usedCaloriePerMinute;
    }

    public function getName(){
        return $this->name;
    }

    public function getUsedCaloriePerMinute():float{
        return $this->usedCaloriePerMinute;
    }
}


class TrainingSession {
    private $exercise;
    private $duration;

    public function __construct(Exercise $exercise, int $duration)
    {
        DurationValidator::validate($duration);
        $this->exercise = $exercise;
        $this->duration = $duration;
    }

    public function getExercise(){
        return  $this->exercise;
    }

    public function getDuration(){
        return  $this->duration;
    }

    public function getBurnedCalories():float{
        return $this->exercise->getUsedCaloriePerMinute() * $this->duration;
    }
}

class WorkoutGoal{
    private $goal = 500;

    public function goalIsreached(float $total):bool{
        return $total > $this->goal ? true : false;
    }
}

class WorkoutStats {
    public static function render(WorkoutLog $workoutLog){
        $sessions = $workoutLog->getSessions();
        $result = ['My workoutstats <br>'];
        for ($i=0; $i < count($sessions); $i++) { 
            $result[] = $i+1 . '. session was ' . $sessions[$i]->getExercise()->getName() . ' duration was ' . $sessions[$i]->getDuration() . ' minutes, ' . 'used calorie was ' . $sessions[$i]->getBurnedCalories() . 'kcal.<br>';
        }

        $result[] = 'Total calorie burned: ' . $workoutLog->getTotalCalories(). 'kcal<br>';

        $workoutGoal = new WorkoutGoal();


        if($workoutGoal->goalIsreached($workoutLog->getTotalCalories())){
            $result[] = "Grats your daily goal is reached!";
        }

        return $result;
    }
}

class WorkoutLog {

     /** @var TrainingSession[] */
    private array $workouts;

    public function addSession(TrainingSession $session){
        $this->workouts[] = $session;
    }

    public function getSessions(){
        return $this->workouts;
    }

    public function getTotalCalories():float{
        $usedCalories = 0;

        foreach($this->workouts as $workout){
            $usedCalories += $workout->getBurnedCalories();
        }

        return $usedCalories;
    }

    public function getSummary(){
        return WorkoutStats::render($this);
    }
}

$exercise_1 = new Exercise('cycling', 9);
$exercise_2 = new Exercise('walking', 4.5);
$exercise_3 = new Exercise('running', 13);

$session_1 = new TrainingSession($exercise_1, 40);
$session_2 = new TrainingSession($exercise_2, 35);
$session_3 = new TrainingSession($exercise_3, 15);

$my_workout = new WorkoutLog;
$my_workout->addSession($session_1);
$my_workout->addSession($session_2);
$my_workout->addSession($session_3);

$allUsedCalories = $my_workout->getTotalCalories();


foreach($my_workout->getSummary() as $line){
    echo $line;
}