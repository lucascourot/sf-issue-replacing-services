<?php

namespace App\Coffee\Infra;

use App\Coffee\NotEnoughWaterInTank;
use App\Coffee\WaterTank;

final class EmptyTank implements WaterTank
{
    public function fillCup(): void
    {
        throw new NotEnoughWaterInTank();
    }
}
