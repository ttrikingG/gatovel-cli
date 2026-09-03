# Commands

Gatovel CLI provides commands for managing application components and database operations.

All commands are executed from the root directory of the Gatovel Framework project.

## Command Syntax

The general syntax is:

```bash
php gatovel <command>
```

Arguments can be passed after the command:

```bash
php gatovel <command> <arguments>
```

## General Commands

### help

Displays the available commands.

```bash
php gatovel help
```

Example output:

```text
Available commands:

help
version
make:controller
make:migration
make:seeder
migrate
migrate:rollback
db:seed
```

### version

Displays the installed Gatovel CLI version.

```bash
php gatovel version
```

## Generator Commands

Generator commands create application components automatically.

### make:controller

Creates a new controller.

```bash
php gatovel make:controller UserController
```

The generated controller is placed in the application's controller directory.

### make:migration

Creates a new migration.

```bash
php gatovel make:migration CreateUsersTable
```

The migration is generated in:

```text
src/app/database/migration/
```

### make:seeder

Creates a new database seeder.

```bash
php gatovel make:seeder UserSeeder
```

The seeder is generated in:

```text
src/app/database/seeder/
```

For more information about generator commands:

[Make Commands](make-commands.md)

## Database Commands

Gatovel CLI provides commands for database migrations and seeders.

### migrate

Executes pending database migrations.

```bash
php gatovel migrate
```

### migrate:rollback

Rolls back the latest migration batch.

```bash
php gatovel migrate:rollback
```

### db:seed

Executes the application's database seeders.

```bash
php gatovel db:seed
```

For more information:

[Migrations](migrations.md)

[Seeders](seeders.md)

## Command Overview

| Command            | Description                          |
| ------------------ | ------------------------------------ |
| `help`             | Display available commands           |
| `version`          | Display CLI version                  |
| `make:controller`  | Create a controller                  |
| `make:migration`   | Create a migration                   |
| `make:seeder`      | Create a seeder                      |
| `migrate`          | Run pending migrations               |
| `migrate:rollback` | Roll back the latest migration batch |
| `db:seed`          | Run database seeders                 |

## Architecture

Commands are registered by the CLI application through the command registry.

```text
Gatovel CLI
     │
     ▼
Application
     │
     ▼
CommandRegistry
     │
     ├── help
     ├── version
     ├── make:controller
     ├── make:migration
     ├── make:seeder
     ├── migrate
     ├── migrate:rollback
     └── db:seed
```

Each command is responsible for handling its own execution logic.

This structure allows new commands to be added without modifying the existing commands.

## Next Step

For commands that generate application components:

[Make Commands](make-commands.md)
