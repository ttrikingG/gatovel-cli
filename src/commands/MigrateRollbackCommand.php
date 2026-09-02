<?php

namespace Gatovel\Cli\commands;

use Gatovel\Cli\Command;

class MigrateRollbackCommand extends Command
{
    public function name(): string
    {
        return 'migrate:rollback';
    }

    public function description(): string
    {
        return 'Rollback the last database migration batch';
    }

    public function handle(array $arguments): int
    {
        echo "Rolling back migrations..." . PHP_EOL;

        return 0;
    }
}
