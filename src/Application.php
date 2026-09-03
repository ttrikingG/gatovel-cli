<?php

namespace Gatovel\Cli;

use Gatovel\Cli\commands\HelpCommand;
use Gatovel\Cli\commands\VersionCommand;
use Gatovel\Cli\commands\MakeControllerCommand;
use Gatovel\Cli\commands\MigrateCommand;
use Gatovel\Cli\commands\MigrateRollbackCommand;
use Gatovel\Cli\commands\MakeMigrationCommand;
use Gatovel\Cli\commands\SeedCommand;
use Gatovel\Cli\commands\MakeSeederCommand;

class Application
{
    private CommandRegistry $registry;

    public function __construct()
    {
        $this->registry = new CommandRegistry();

        $this->registerCommands();
    }

    private function registerCommands(): void
    {
        $this->registry->register(
            'help',
            new HelpCommand($this->registry)
        );

        $this->registry->register(
            'version',
            new VersionCommand()
        );

        $this->registry->register(
            'make:controller',
            new MakeControllerCommand()
        );

        $this->registry->register(
            'migrate',
            new MigrateCommand()
        );

        $this->registry->register(
            'migrate:rollback',
            new MigrateRollbackCommand()
        );

        $this->registry->register(
            'make:migration', new MakeMigrationCommand()
        );

        $this->registry->register(
            'db:seed',
            new SeedCommand()
        );

       $this->registry->register(
            'make:seeder',
            new MakeSeederCommand()
        );

    }

    public function run(array $arguments): int
    {
        $commandName = $arguments[1] ?? 'help';

        if (!$this->registry->has($commandName)) {

            echo "Command not found: {$commandName}" . PHP_EOL;
            echo "Run 'php gatovel help' for available commands." . PHP_EOL;

            return 1;
        }

        return $this->registry
            ->get($commandName)
            ->handle($arguments);
    }
}