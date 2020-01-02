<?php

namespace App\Controller;

use App\Coffee\CoffeeMachine;
use App\Coffee\Infra\EmptyTank;
use App\Coffee\UnableToMakeCoffee;
use App\Coffee\WaterTank;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MakeCoffeeController extends AbstractController
{
    /**
     * @Route("/coffee", name="make_coffee")
     */
    public function index(WaterTank $waterTank, ContainerInterface $container)
    {
        dump($waterTank); // FullTank : hasn't been replaced :(
        dump($container->get(WaterTank::class)); // EmptyTank : has correctly been replaced
        // by `$kernel->getContainer()->set(WaterTank::class, new EmptyTank());`
        // in tests/MakeCoffeeControllerTest.php

        $coffeeMachine = new CoffeeMachine($waterTank);

        try {
            $coffeeMachine->makeCoffee();

            return $this->json([
                'message' => 'Enjoy your coffee!',
            ], 201);
        } catch (UnableToMakeCoffee $e) {
            return $this->json([
                'message' => 'Unable to make coffee.',
            ], 400);
        }
    }
}
