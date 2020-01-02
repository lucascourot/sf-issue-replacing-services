<?php

namespace App\Command;

use App\Coffee\CoffeeMachine;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class MakeCoffeeCommand extends Command
{
    protected static $defaultName = 'app:make-coffee';

    /**
     * @var CoffeeMachine
     */
    private $coffeeMachine;

    public function __construct(CoffeeMachine $coffeeMachine)
    {
        $this->coffeeMachine = $coffeeMachine;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Makes coffee')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->coffeeMachine->makeCoffee();

        $io->success('Yeah.');

        return 0;
    }
}
