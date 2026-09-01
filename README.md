# gatovel-cli

The **Gatovel CLI** is the command-line interface for the **Gatovel PHP Framework**.

It provides commands that help developers interact with and manage Gatovel applications directly from the terminal.

## What is it for?

The CLI is designed to automate common development tasks within Gatovel applications, such as:

* Displaying available commands
* Displaying the framework version
* Generating controllers
* Providing a foundation for future framework commands

Instead of manually creating files and directories, developers can use simple terminal commands to perform common tasks.

## Available Commands

### Help

Displays the available commands:

```bash
php gatovel
```

or:

```bash
php gatovel help
```

### Version

Displays the current Gatovel CLI version:

```bash
php gatovel version
```

### Make Controller

Generates a new controller with the basic controller methods:

```bash
php gatovel make:controller UserController
```

This generates a controller containing methods such as:

```php
index()
create()
store()
show()
edit()
update()
destroy()
```

## Installation

The Gatovel CLI is distributed as a Composer package:

```bash
composer require gatovel/cli
```

## Architecture

The CLI is maintained as an independent package from the Gatovel Framework core.

```text
Gatovel Framework
        │
        └── gatovel/cli
                │
                ├── Application
                ├── Command
                ├── CommandRegistry
                ├── Commands
                └── Generators
```

This separation allows the CLI to have its own development cycle, versioning, and releases without being directly coupled to the framework's core.

## Requirements

* PHP 8.3 or higher
* Composer

## Status

This project is currently under development as part of the Gatovel PHP Framework.

More commands and generators will be added as the framework evolves.

## License

MIT
