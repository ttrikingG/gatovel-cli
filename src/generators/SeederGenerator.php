<?php

namespace Gatovel\Cli\generators;

class SeederGenerator
{
    public function generate(string $name): string
    {
        $name = trim($name, '/');

        $parts = explode('/', $name);

        $className = array_pop($parts);

        $directory = 'src/app/database/seeder';

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $file = $directory . '/' . $className . '.php';

        if (file_exists($file)) {
            throw new \Exception(
                "Seeder already exists: {$className}"
            );
        }

        $content = "<?php\n\n";
        $content .= "namespace app\\database\\seeder;\n\n";
        $content .= "use Gatovel\\Database\\seeder\\Seeder;\n\n";
        $content .= "class {$className} extends Seeder\n";
        $content .= "{\n";
        $content .= "    public function run(): void\n";
        $content .= "    {\n";
        $content .= "        //\n";
        $content .= "    }\n";
        $content .= "}\n";

        file_put_contents($file, $content);

        return $file;
    }
}
