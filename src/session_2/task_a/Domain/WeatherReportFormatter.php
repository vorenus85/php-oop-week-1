<?php
require_once __DIR__ . "/WeatherParameterType.php";

class WeatherReportFormatter
{
    /**
     *
     * @return void
     */
    public static function renderTitle(): void
    {
        echo "Mai időjárás:<br>";
    }

    /**
     *
     * @param WeatherParameter $parameter
     * @return void
     */
    public static function renderParameter(WeatherParameter $parameter): void
    {
        if ($parameter->getType() === WeatherParameterType::HUMIDITY) {
            echo "Páratartalom: " . $parameter->getValue() . "%<br>";
        }

        if ($parameter->getType() === WeatherParameterType::WIND) {
            echo "Szélsebesség: " . $parameter->getValue() . " km/h<br>";
        }

        if ($parameter->getType() === WeatherParameterType::TEMPERATURE) {
            echo "Hőmérséklet: " . $parameter->getValue() . "°C<br>";
        }
    }
}
