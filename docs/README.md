# Gatovel CLI

Command-line interface for Gatovel Framework.

Gatovel CLI provides commands for creating application components and managing database operations through the terminal.

## Documentation

| Section                           | Description                         |
| --------------------------------- | ----------------------------------- |
| [Installation](installation.md)   | Install and configure Gatovel CLI   |
| [Commands](commands.md)           | Available CLI commands              |
| [Make Commands](make-commands.md) | Generate application components     |
| [Migrations](migrations.md)       | Manage database migrations          |
| [Seeders](seeders.md)             | Create and execute database seeders |

## Available Commands

### General

```bash
php gatovel help
php gatovel version
```

### Generators

```bash
php gatovel make:controller
php gatovel make:migration
php gatovel make:seeder
```

### Database

```bash
php gatovel migrate
php gatovel migrate:rollback
php gatovel db:seed
```

## Architecture

```text
Gatovel CLI
     │
     ├── Commands
     │
     ├── Generators
     │
     └── Command Registry
              │
              ▼
       Gatovel Database
```

The CLI is designed as a separate package and uses the database module when database-related commands are executed.

## Requirements

* PHP 8.3 or higher
* Composer
* `gatovel/database`

## Installation

Install Gatovel CLI using Composer:

```bash
composer require gatovel/cli
```

For detailed installation instructions:

[Installation →](installation.md)

## License

Gatovel CLI is open-source software licensed under the [MIT License](../LICENSE).
