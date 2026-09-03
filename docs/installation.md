# Installation

Gatovel CLI is distributed as a Composer package and is designed to be used inside a Gatovel Framework project.

## Requirements

Before installing Gatovel CLI, make sure your environment has:

* PHP 8.3 or higher
* Composer
* A Gatovel Framework project

Gatovel CLI also depends on:

* `gatovel/database`

## Installation

From the root directory of your Gatovel Framework project, install the CLI with Composer:

```bash
composer require gatovel/cli
```

Composer will install Gatovel CLI and its required dependencies.

## Verify Installation

Check that the package was installed correctly:

```bash
composer show gatovel/cli
```

You can also verify that the CLI is available:

```bash
php gatovel help
```

The command should display the available Gatovel CLI commands.

## Autoload

Composer manages the required autoloading automatically.

If necessary, regenerate the Composer autoloader:

```bash
composer dump-autoload
```

## Running the CLI

Gatovel CLI is executed from the root directory of the Gatovel Framework project.

General syntax:

```bash
php gatovel <command>
```

Examples:

```bash
php gatovel help
```

```bash
php gatovel version
```

```bash
php gatovel make:controller UserController
```

## Database Commands

Gatovel CLI uses the `gatovel/database` package for database-related commands.

Examples:

```bash
php gatovel migrate
```

```bash
php gatovel migrate:rollback
```

```bash
php gatovel db:seed
```

The database configuration must be available in the Gatovel Framework project before executing these commands.

For database configuration, see:

[Database Configuration](https://github.com/ttrikingG/gatovel-database/blob/main/docs/configuration.md)

## Troubleshooting

### CLI command not found

If:

```bash
php gatovel help
```

does not work, verify that you are running the command from the root directory of the Gatovel Framework project.

Then regenerate the Composer autoloader:

```bash
composer dump-autoload
```

### Package not installed

Check the installed packages:

```bash
composer show gatovel/cli
```

If Gatovel CLI is not listed, install it again:

```bash
composer require gatovel/cli
```

## Next Step

After installation, see the available commands:

[Commands](commands.md)
