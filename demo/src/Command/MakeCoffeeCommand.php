<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class MakeCoffeeCommand extends Command
{
    protected static $defaultName = 'app:make-coffee';

    protected function configure()
    {
        $this
            ->setDescription('Makes coffee')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->success('Yeah.');

        return 0;
    }
}
