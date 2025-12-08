<?php
class WorkoutGoal
{
    private float $goal = 500;

    /**
     *
     * @param float $total
     * @return boolean
     */
    public function goalIsreached(float $total): bool
    {
        return $total > $this->goal ? true : false;
    }
}
