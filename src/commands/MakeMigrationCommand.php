<?php

namespace Gatovel\Cli\commands;

use Gatovel\Cli\Command;
use Gatovel\Cli\generators\MigrationGenerator;

class MakeMigrationCommand extends Command
{
    public function name(): string
    {
        return 'make:migration';
    }

    public function description(): string
    {
        return 'Create a new migration';
    }

    public function handle(array $arguments): int
    {
        $name = $arguments[2] ?? null;

        if ($name === null) {
            echo "Migration name is required." . PHP_EOL;

            return 1;
        }

        try {
            $generator = new MigrationGenerator();

            $path = $generator->generate($name);

            echo "Migration created: {$path}" . PHP_EOL;

            return 0;

        } catch (\Exception $exception) {
            echo $exception->getMessage() . PHP_EOL;

            return 1;
        }
    }
}