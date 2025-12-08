<?php
// WeatherReport
include_once("./Domain/WeatherReport.php");

$todayWeather = new WeatherReport(-10, 90, 50);
$todayWeather->printReport();
$todayWeather->getWarings();
