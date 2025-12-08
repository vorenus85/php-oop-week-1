<?php
require_once __DIR__ . "/WeatherParameterType.php";

class WeatherAnalyzer
{
    /**
     *
     * @param WeatherReport $report
     * @return void
     */
    public static function render(WeatherReport $report): void
    {
        $warnings = [];
        if ($report->getTemperature()->getType() === WeatherParameterType::TEMPERATURE) {
            if ($report->getTemperature()->getValue() < 0) {
                $warnings[] = "Figyelem: Fagyveszély!<br>";
            }
        }

        if ($report->getHumidity()->getType() === WeatherParameterType::HUMIDITY) {
            if ($report->getHumidity()->getValue() > 80) {
                $warnings[] = "Magas páratartalom!<br>";
            }
        }


        foreach ($warnings as $warning) {
            echo $warning;
        }
    }
}
