# Make Commands

Gatovel CLI provides generator commands for creating application components automatically.

Generators reduce repetitive work and provide a consistent structure for generated files.

## Available Generators

| Command           | Description              |
| ----------------- | ------------------------ |
| `make:controller` | Create a controller      |
| `make:migration`  | Create a migration       |
| `make:seeder`     | Create a database seeder |

## make:controller

Creates a new controller.

### Usage

```bash
php gatovel make:controller UserController
```

The command generates the controller inside the application's controller directory.

### Example

```bash
php gatovel make:controller UserController
```

The generated controller can then be customized according to the application's requirements.

## make:migration

Creates a new migration.

### Usage

```bash
php gatovel make:migration CreateUsersTable
```

The migration is generated in:

```text
src/app/database/migration/
```

### Example

```bash
php gatovel make:migration CreateUsersTable
```

The generated migration contains the basic `up()` and `down()` methods.

Example:

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

The `up()` method is used to apply the migration.

The `down()` method is used to reverse it.

For more information:

[Migrations](migrations.md)

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

### Example

```bash
php gatovel make:seeder UserSeeder
```

The generated seeder contains a `run()` method.

Example:

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

The `run()` method contains the data that should be inserted into the database.

For more information:

[Seeders](seeders.md)

## Generator Behavior

Generators follow a simple workflow:

```text
CLI Command
     │
     ▼
Generator
     │
     ▼
Create Directory
     │
     ▼
Create PHP File
     │
     ▼
Return Generated Path
```

If the target file already exists, the generator stops and reports an error instead of overwriting the existing file.

## Required Arguments

Generator commands that require a name will return an error if the name is not provided.

For example:

```bash
php gatovel make:seeder
```

Output:

```text
Seeder name is required.
```

The same behavior applies to migrations and other generators that require a name.

## Naming

Use descriptive names for generated components.

Examples:

```text
UserController
CreateUsersTable
UserSeeder
```

The generated class name is based on the name provided to the command.

## Architecture

Generators are separated from command classes.

```text
Command
   │
   ▼
Generator
   │
   ▼
Generated Component
```

This separation keeps command execution and file generation independent.

For example:

```text
MakeSeederCommand
        │
        ▼
SeederGenerator
        │
        ▼
UserSeeder.php
```

This makes generators easier to maintain and allows new generators to be added without changing the existing generator logic.

## Next Step

Database migration commands are documented in:

[Migrations](migrations.md)
