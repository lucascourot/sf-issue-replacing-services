<?php

namespace App\Tests;

use App\Coffee\Infra\EmptyTank;
use App\Coffee\Infra\FullTank;
use App\Coffee\WaterTank;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Request;

class MakeCoffeeControllerTest extends KernelTestCase
{
    public function testShouldReturn400WhenWaterTankIsEmpty()
    {
        // Given
        $kernel = self::bootKernel();

        $kernel->getContainer()->set(WaterTank::class, new EmptyTank());

        // When
        $response = $kernel->handle(Request::create('/coffee', 'GET'));

        // Then
        $this->assertSame(400, $response->getStatusCode());
    }

//    public function testShouldReturn201ForNewCoffee()
//    {
//        // Given
//        $kernel = self::bootKernel();
//
//        $kernel->getContainer()->set(WaterTank::class, new FullTank());
//
//        // When
//        $response = $kernel->handle(Request::create('/coffee', 'GET'));
//
//        // Then
//        $this->assertSame(201, $response->getStatusCode());
//        $this->assertSame('{"message":"Enjoy your coffee!"}', $response->getContent());
//    }
}
