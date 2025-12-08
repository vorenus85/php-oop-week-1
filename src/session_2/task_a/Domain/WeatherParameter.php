<?php
require_once __DIR__ . "/WeatherParameterValidator.php";
class WeatherParameter
{
    private int $value;
    private string $type;

    /**
     *
     * @param integer $value
     * @param string $type
     */
    public function __construct(int $value, string $type)
    {
        WeatherParameterValidator::validate($value, $type);

        $this->type = $type;
        $this->value = $value;
    }

    /**
     *
     * @return integer
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
