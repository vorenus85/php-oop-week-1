<?php
class DurationValidator
{
    /**
     *
     * @param integer $duration
     * @return void
     */
    public static function validate(int $duration): void
    {
        if ($duration < 0) {
            throw new InvalidArgumentException("Used duration must be positive number");
        }
    }
}
