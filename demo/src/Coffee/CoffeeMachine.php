<?php

namespace App\Coffee;

final class CoffeeMachine
{
    private WaterTank $waterTank;

    public function __construct(WaterTank $waterTank)
    {
        $this->waterTank = $waterTank;
    }

    /**
     * @throws UnableToMakeCoffee
     */
    public function makeCoffee() : Coffee
    {
        try {
            $this->waterTank->fillCup();
        } catch (ProblemWhenFillingCup|NotEnoughWaterInTank $e) {
            throw new UnableToMakeCoffee('Unable to make coffee', null, $e);
        }

        return new Coffee();
    }
}
