<?php
require_once __DIR__ . "/WeatherParameterType.php";

class WeatherParameterValidator
{
    /**
     *
     * @param integer $parameterValue
     * @param string $parameterType
     * @return void
     */
    public static function validate(int $parameterValue, string $parameterType): void
    {
        $parameterTypes = [
            WeatherParameterType::WIND,
            WeatherParameterType::TEMPERATURE,
            WeatherParameterType::HUMIDITY
        ];

        if (!in_array($parameterType, $parameterTypes, true)) {
            throw new InvalidArgumentException($parameterType . ' is invalid paramter type');
        }

        if ($parameterValue < 0 && ($parameterType === WeatherParameterType::HUMIDITY || $parameterType === WeatherParameterType::WIND)) {
            throw new InvalidArgumentException($parameterType . ' cannot be negative value');
        }

        if ($parameterType === WeatherParameterType::HUMIDITY && $parameterValue > 100) {
            throw new InvalidArgumentException($parameterType . 'cannot be larger than 100');
        }
    }
}
