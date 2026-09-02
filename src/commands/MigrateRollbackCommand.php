<?php

namespace Gatovel\Cli\commands;

use Gatovel\Cli\Command;
use nucleo\database\migration\MigrationRunner;

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
        try {
            $directory = getcwd() . '/src/nucleo/database/migration';

            if (!is_dir($directory)) {
                echo "Migration directory not found: {$directory}" . PHP_EOL;

                return 1;
            }

            $runner = new MigrationRunner();

            $runner->rollbackLastBatch($directory);

            echo "Migrations rolled back successfully." . PHP_EOL;

            return 0;

        } catch (\Throwable $exception) {
            echo "Rollback failed: {$exception->getMessage()}" . PHP_EOL;

            return 1;
        }
    }
}