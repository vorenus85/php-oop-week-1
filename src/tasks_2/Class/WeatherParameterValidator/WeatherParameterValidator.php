<?php
include("./src/tasks_2/Utils/utils.php");

class WeatherParameterValidator
{
    public static function validate(int $parameterValue, string $parameterType)
    {
        $parameterTypes = [WIND, TEMPERATURE, HUMIDITY];

        if (!in_array($parameterType, $parameterTypes, true)) {
            throw new InvalidArgumentException($parameterType . ' is invalid paramter type');
        }

        if ($parameterValue < 0 && ($parameterType === HUMIDITY || $parameterType === WIND)) {
            throw new InvalidArgumentException($parameterType . ' cannot be negative value');
        }

        if ($parameterType === HUMIDITY && $parameterValue > 100) {
            throw new InvalidArgumentException($parameterType . 'cannot be larger than 100');
        }
    }
}
