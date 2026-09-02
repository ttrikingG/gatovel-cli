<?php

namespace Gatovel\Cli\commands;

use Gatovel\Cli\Command;

class MigrateCommand extends Command
{
    public function name(): string
    {
        return 'migrate';
    }

    public function description(): string
    {
        return 'Run database migrations';
    }

    public function handle(array $arguments): int
    {
        echo "Running migrations..." . PHP_EOL;

        return 0;
    }
}
