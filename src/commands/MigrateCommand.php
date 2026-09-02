<?php

namespace Gatovel\Cli\commands;

use Gatovel\Cli\Command;
use nucleo\database\migration\MigrationRunner;

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
        try {
            $directory = getcwd() . '/src/nucleo/database/migration';

            if (!is_dir($directory)) {
                echo "Migration directory not found: {$directory}" . PHP_EOL;

                return 1;
            }

            $runner = new MigrationRunner();

            $runner->migrate($directory);

            echo "Migrations executed successfully." . PHP_EOL;

            return 0;

        } catch (\Throwable $exception) {
            echo "Migration failed: {$exception->getMessage()}" . PHP_EOL;

            return 1;
        }
    }
}