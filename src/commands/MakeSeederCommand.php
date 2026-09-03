<?php

namespace Gatovel\Cli\commands;

use Gatovel\Cli\Command;
use Gatovel\Cli\generators\SeederGenerator;

class MakeSeederCommand extends Command
{
    public function name(): string
    {
        return 'make:seeder';
    }

    public function description(): string
    {
        return 'Create a new seeder';
    }

    public function handle(array $arguments): int
    {
        $name = $arguments[2] ?? null;

        if ($name === null) {
            echo "Seeder name is required." . PHP_EOL;

            return 1;
        }

        try {
            $generator = new SeederGenerator();

            $path = $generator->generate($name);

            echo "Seeder created: {$path}" . PHP_EOL;

            return 0;

        } catch (\Exception $exception) {
            echo $exception->getMessage() . PHP_EOL;

            return 1;
        }
    }
}
