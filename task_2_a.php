<?php
// WeatherReport

include("./src/tasks_2/Class/WeatherParameterValidator.php");

class WeatherParameter
{
    private $type;
    private $value;

    public function __construct(int $value, string $type)
    {
        WeatherParameterValidator::validate($value, $type);

        $this->type = $type;
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getType(): string
    {
        return $this->type;
    }
}

class WeatherReport
{
    private $temperature;
    private $humidity;
    private $wind;

    public function __construct(int $temperature, int $humidity, int $wind)
    {
        $this->temperature = new WeatherParameter($temperature, TEMPERATURE);
        $this->humidity = new WeatherParameter($humidity, HUMIDITY);
        $this->wind = new WeatherParameter($wind, WIND);
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function getHumidity()
    {
        return $this->humidity;
    }

    public function getWind()
    {
        return $this->wind;
    }

    public function printReport()
    {
        WeatherReportFormatter::renderTitle();
        WeatherReportFormatter::renderParameter($this->temperature);
        WeatherReportFormatter::renderParameter($this->humidity);
        WeatherReportFormatter::renderParameter($this->wind);
    }

    public function getWarings()
    {
        WeatherAnalyzer::render($this);
    }
}

class WeatherAnalyzer
{
    public static function render(WeatherReport $report)
    {
        $warnings = [];
        if ($report->getTemperature()->getType() === TEMPERATURE) {
            if ($report->getTemperature()->getValue() < 0) {
                $warnings[] = "Figyelem: Fagyveszély!<br>";
            }
        }

        if ($report->getHumidity()->getType() === HUMIDITY) {
            if ($report->getHumidity()->getValue() > 80) {
                $warnings[] = "Magas páratartalom!<br>";
            }
        }


        foreach ($warnings as $warning) {
            echo $warning;
        }
    }
}

class WeatherReportFormatter
{
    public static function renderTitle()
    {
        echo "Mai időjárás:<br>";
    }

    public static function renderParameter(WeatherParameter $parameter)
    {
        if ($parameter->getType() === HUMIDITY) {
            echo "Páratartalom: " . $parameter->getValue() . "%<br>";
        }

        if ($parameter->getType() === WIND) {
            echo "Szélsebesség: " . $parameter->getValue() . " km/h<br>";
        }

        if ($parameter->getType() === TEMPERATURE) {
            echo "Hőmérséklet: " . $parameter->getValue() . "°C<br>";
        }
    }
}

$todayWeather = new WeatherReport(-10, 90, 50);
$todayWeather->printReport();
$todayWeather->getWarings();
