# Seeders

Gatovel CLI provides commands for creating and executing database seeders.

Seeders are used to populate the application's database with initial, test, or development data.

## Available Commands

| Command       | Description          |
| ------------- | -------------------- |
| `make:seeder` | Create a new seeder  |
| `db:seed`     | Run database seeders |

## make:seeder

Creates a new database seeder.

### Usage

```bash
php gatovel make:seeder UserSeeder
```

The seeder is generated in:

```text
src/app/database/seeder/
```

### Generated Structure

A generated seeder contains a `run()` method:

```php
<?php

namespace app\database\seeder;

use Gatovel\Database\seeder\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //
    }
}
```

The `run()` method contains the logic responsible for inserting data into the database.

## Example

A seeder can use the Gatovel Database module to insert data.

```php
<?php

namespace app\database\seeder;

use Gatovel\Database\Database;
use Gatovel\Database\seeder\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        Database::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }
}
```

The exact fields depend on the application's database structure.

## db:seed

Executes the application's database seeders.

### Usage

```bash
php gatovel db:seed
```

The CLI searches for seeder files in:

```text
src/app/database/seeder/
```

Each valid seeder is loaded and executed through the database module's `SeederRunner`.

## Seeder Workflow

A typical workflow is:

```text
Create Seeder
      │
      ▼
make:seeder
      │
      ▼
Implement run()
      │
      ▼
db:seed
      │
      ▼
SeederRunner
      │
      ▼
Database
```

### Step 1 — Create the Seeder

```bash
php gatovel make:seeder UserSeeder
```

### Step 2 — Implement the Seeder

Add the data that should be inserted inside `run()`.

### Step 3 — Execute the Seeder

```bash
php gatovel db:seed
```

## Seeder Directory

Application seeders are stored in:

```text
src/app/database/seeder/
```

Example:

```text
src/
└── app/
    └── database/
        └── seeder/
            ├── UserSeeder.php
            ├── ProductSeeder.php
            └── CategorySeeder.php
```

## Multiple Seeders

Multiple seeder files can exist in the seeder directory.

For example:

```text
UserSeeder.php
ProductSeeder.php
CategorySeeder.php
```

When `db:seed` is executed, the CLI loads the available PHP seeder files and passes the valid seeders to the `SeederRunner`.

## Repeated Execution

Seeders should be written carefully because running:

```bash
php gatovel db:seed
```

multiple times can insert the same data more than once.

For development data, consider using values or logic that make repeated execution safe when necessary.

## Seeder Architecture

The CLI is responsible for discovering and executing the application's seeders, while the database package provides the seeder infrastructure.

```text
Gatovel CLI
     │
     ▼
SeedCommand
     │
     ▼
Seeder Files
     │
     ▼
SeederRunner
     │
     ▼
Gatovel Database
```

This separation keeps the CLI focused on command execution while database functionality remains inside `gatovel/database`.

## Errors

If the seeder directory does not exist, the command reports the missing directory.

```text
Seeder directory not found: ...
```

If an error occurs while executing a seeder, the command reports the failure:

```text
Seeding failed: ...
```

## Migrations and Seeders

Migrations and seeders have different responsibilities.

| Feature   | Responsibility     |
| --------- | ------------------ |
| Migration | Database structure |
| Seeder    | Database data      |

For example:

```text
Migration
    │
    ▼
Create users table
    │
    ▼
Seeder
    │
    ▼
Insert users
```

A common workflow is to run migrations first:

```bash
php gatovel migrate
```

and then execute the seeders:

```bash
php gatovel db:seed
```

## Next Step

This completes the main Gatovel CLI documentation.

The complete documentation structure is:

```text
docs/
├── README.md
├── installation.md
├── commands.md
├── make-commands.md
├── migrations.md
└── seeders.md
```
[← Back to Documentation](README.md)
