<?php

namespace Gatovel\Cli\commands;

use Gatovel\Cli\Command;
use Gatovel\Database\seeder\SeederRunner;

class SeedCommand extends Command
{
    public function name(): string
    {
        return 'db:seed';
    }

    public function description(): string
    {
        return 'Run database seeders';
    }

    public function handle(array $arguments): int
    {
        try {
            $directory = getcwd() . '/src/app/database/seeder';

            if (!is_dir($directory)) {
                echo "Seeder directory not found: {$directory}" . PHP_EOL;

                return 1;
            }

            $seeders = [];

            foreach (glob($directory . '/*.php') as $file) {
                require_once $file;

                $class = pathinfo($file, PATHINFO_FILENAME);

                $className = 'app\\database\\seeder\\' . $class;

                if (!class_exists($className)) {
                    continue;
                }

                $seeders[] = new $className();
            }

            $runner = new SeederRunner();

            $runner->run($seeders);

            echo "Seeders executed successfully." . PHP_EOL;

            return 0;

        } catch (\Throwable $exception) {
            echo "Seeding failed: {$exception->getMessage()}" . PHP_EOL;

            return 1;
        }
    }
}
