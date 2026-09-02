<?php

namespace Gatovel\Cli\generators;

class MigrationGenerator
{
    public function generate(string $name): string
    {
        $name = trim($name, '/');

        $parts = explode('/', $name);

        $className = array_pop($parts);

        $directory = 'src/app/database/migration';

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $file = $directory . '/' . $className . '.php';

        if (file_exists($file)) {
            throw new \Exception(
                "Migration already exists: {$className}"
            );
        }

        $content = "<?php\n\n";
        $content .= "namespace Gatovel\Database\migration;\n\n";
        $content .= "use Gatovel\Database\migration\Migration;\n\n";
        $content .= "class {$className} extends Migration\n";
        $content .= "{\n";
        $content .= "    public function up(): void\n";
        $content .= "    {\n";
        $content .= "        //\n";
        $content .= "    }\n\n";
        $content .= "    public function down(): void\n";
        $content .= "    {\n";
        $content .= "        //\n";
        $content .= "    }\n";
        $content .= "}\n";

        file_put_contents($file, $content);

        return $file;
    }
}