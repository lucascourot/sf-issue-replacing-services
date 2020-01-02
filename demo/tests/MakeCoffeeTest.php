<?php

namespace App\Tests;

use App\Coffee\Coffee;
use App\Coffee\CoffeeMachine;
use App\Coffee\Infra\FullTank;
use App\Coffee\NotEnoughWaterInTank;
use App\Coffee\ProblemWhenFillingCup;
use App\Coffee\UnableToMakeCoffee;
use App\Coffee\WaterTank;
use PHPUnit\Framework\TestCase;

class MakeCoffeeTest extends TestCase
{
    public function testShouldMakeCoffeeWhenEnoughWater()
    {
        // Given
        $waterTank = new FullTank();
        $coffeeMachine = new CoffeeMachine($waterTank);

        // When
        $coffee = $coffeeMachine->makeCoffee();

        // Then
        $this->assertInstanceOf(Coffee::class, $coffee);
    }

    public function testShouldNotMakeCoffeeWhenProblemWhenFillingCup()
    {
        // Expect
        $this->expectException(UnableToMakeCoffee::class);

        // Given
        $coffeeMachine = new CoffeeMachine(new class implements WaterTank {
            public function fillCup(): void
            {
                throw new ProblemWhenFillingCup();
            }
        });

        // When
        $coffee = $coffeeMachine->makeCoffee();
    }

    public function testShouldNotMakeCoffeeWhenNotEnoughWaterInTank()
    {
        // Expect
        $this->expectException(UnableToMakeCoffee::class);

        // Given
        $coffeeMachine = new CoffeeMachine(new class implements WaterTank {
            public function fillCup(): void
            {
                throw new NotEnoughWaterInTank();
            }
        });

        // When
        $coffee = $coffeeMachine->makeCoffee();
    }
}
