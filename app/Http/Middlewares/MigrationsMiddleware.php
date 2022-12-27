<?php

namespace App\Http\Middlewares;

use App\Libraries\Database;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class MigrationsMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {
        $files = scandir(path('migrations'));

        array_shift($files);
        array_shift($files);

        try {
            $migrations = Database::getInstance()->select('migrations', '*');
        } catch (\Throwable $th) {
            $migrations = [];
        }

        foreach ($files as $file) {
            if (!$this->hasMigrationInDatabase($migrations, $file)) {
                $migration = file_get_contents(path("migrations/{$file}"));
                Database::getInstance()->query($migration);

                Database::getInstance()->insert('migrations', [
                    'migration' => $file,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }

    /**
     * @param array $migrations
     * @param string $file
     * @return boolean
     */
    private function hasMigrationInDatabase(array $migrations, string $file): bool
    {
        foreach ($migrations as $migration) {
            if ($migration['migration'] === $file) {
                return true;
            }
        }

        return false;
    }
}
