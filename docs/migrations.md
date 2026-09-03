# Migrations

Gatovel CLI provides commands for creating and executing database migrations.

Migrations are used to manage changes to the application's database structure in a controlled and versioned way.

## Available Commands

| Command            | Description                          |
| ------------------ | ------------------------------------ |
| `make:migration`   | Create a new migration               |
| `migrate`          | Run pending migrations               |
| `migrate:rollback` | Roll back the latest migration batch |

## make:migration

Creates a new migration file.

### Usage

```bash
php gatovel make:migration CreateUsersTable
```

The migration is generated in:

```text
src/app/database/migration/
```

### Generated Structure

A migration contains two main methods:

```php
public function up(): void
{
    //
}

public function down(): void
{
    //
}
```

The `up()` method defines the changes that should be applied to the database.

The `down()` method defines how those changes should be reversed.

### Example

```php
<?php

namespace Gatovel\Database\migration;

use Gatovel\Database\migration\Migration;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        //
    }

    public function down(): void
    {
        //
    }
}
```

The CLI only generates the migration structure. The database operations are implemented inside the migration itself.

## migrate

Executes pending migrations.

### Usage

```bash
php gatovel migrate
```

The command loads the migrations from:

```text
src/app/database/migration/
```

and executes migrations that have not yet been registered as executed.

The migration system keeps track of executed migrations and their batches.

## migrate:rollback

Rolls back the latest migration batch.

### Usage

```bash
php gatovel migrate:rollback
```

The command reverses the migrations belonging to the latest batch.

The `down()` method of each migration is used to reverse its changes.

## Migration Workflow

A typical workflow is:

```text
Create Migration
      │
      ▼
make:migration
      │
      ▼
Implement up() / down()
      │
      ▼
migrate
      │
      ▼
Migration Registered
```

If the latest migration needs to be reversed:

```text
migrate:rollback
       │
       ▼
Latest Batch
       │
       ▼
down()
       │
       ▼
Changes Reversed
```

## Migration Directory

Application migrations are stored in:

```text
src/app/database/migration/
```

Example:

```text
src/
└── app/
    └── database/
        └── migration/
            ├── CreateUsersTable.php
            ├── CreatePostsTable.php
            └── AddEmailToUsers.php
```

## Migration Batches

Migrations are executed in batches.

A batch groups migrations executed during the same migration operation.

For example:

```text
Batch 1
├── CreateUsersTable
└── CreatePostsTable

Batch 2
└── AddEmailToUsers
```

Running:

```bash
php gatovel migrate:rollback
```

rolls back the latest batch.

## Database Configuration

Before running migrations, the Gatovel Framework project must have a valid database configuration.

The CLI uses the Gatovel Database module to establish the database connection.

For database configuration, see:

[Database Configuration](https://github.com/ttrikingG/gatovel-database/blob/main/docs/configuration.md)

## Migration Architecture

The migration command uses the database module to execute and track migrations.

```text
Gatovel CLI
     │
     ▼
MigrateCommand
     │
     ▼
MigrationRunner
     │
     ├── MigrationLoader
     │
     └── MigrationRepository
              │
              ▼
       Gatovel Database
```

This keeps the CLI responsible for command execution while the database package handles migration functionality.

## Common Workflow

Create a migration:

```bash
php gatovel make:migration CreateUsersTable
```

Implement the migration:

```php
public function up(): void
{
    // Create users table
}
```

Run the migration:

```bash
php gatovel migrate
```

If necessary, roll back the latest batch:

```bash
php gatovel migrate:rollback
```

## Next Step

For database seeders, see:

[Seeders](seeders.md)
