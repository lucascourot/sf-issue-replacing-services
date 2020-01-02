<?php

namespace App\Coffee;

interface WaterTank
{
    /**
     * @throws ProblemWhenFillingCup
     * @throws NotEnoughWaterInTank
     */
    public function fillCup() : void;
}
