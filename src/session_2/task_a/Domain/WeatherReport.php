<?php
require_once __DIR__ . "/WeatherParameter.php";
require_once __DIR__ . "/WeatherParameterType.php";
require_once __DIR__ . "/WeatherReportFormatter.php";
require_once __DIR__ . "/WeatherAnalyzer.php";

class WeatherReport
{
    private WeatherParameter $temperature;
    private WeatherParameter $humidity;
    private WeatherParameter $wind;

    public function __construct(int $temperature, int $humidity, int $wind)
    {
        $this->temperature = new WeatherParameter($temperature, WeatherParameterType::TEMPERATURE);
        $this->humidity = new WeatherParameter($humidity, WeatherParameterType::HUMIDITY);
        $this->wind = new WeatherParameter($wind, WeatherParameterType::WIND);
    }

    /**
     *
     * @return WeatherParameter
     */
    public function getTemperature(): WeatherParameter
    {
        return $this->temperature;
    }

    /**
     *
     * @return WeatherParameter
     */
    public function getHumidity(): WeatherParameter
    {
        return $this->humidity;
    }

    /**
     *
     * @return WeatherParameter
     */
    public function getWind(): WeatherParameter
    {
        return $this->wind;
    }

    /**
     *
     * @return void
     */
    public function printReport(): void
    {
        WeatherReportFormatter::renderTitle();
        WeatherReportFormatter::renderParameter($this->temperature);
        WeatherReportFormatter::renderParameter($this->humidity);
        WeatherReportFormatter::renderParameter($this->wind);
    }

    /**
     *
     * @return void
     */
    public function getWarings(): void
    {
        WeatherAnalyzer::render($this);
    }
}
