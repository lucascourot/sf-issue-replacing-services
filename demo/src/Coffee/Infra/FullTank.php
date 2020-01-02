<?php

namespace App\Coffee\Infra;

use App\Coffee\WaterTank;

final class FullTank implements WaterTank
{
    public function fillCup(): void
    {
        return;
    }
}
