<?php
include_once("./Domain/Exercise.php");
include_once("./Domain/TrainingSession.php");
include_once("./Domain/WorkoutLog.php");

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


foreach ($my_workout->getSummary() as $line) {
    echo $line;
}
