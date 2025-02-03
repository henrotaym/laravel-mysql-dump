<?php

namespace Henrotaym\LaravelMysqlDump\Strategies\Exports;

use Henrotaym\LaravelMysqlDump\Contracts\Strategies\ExportStrategy;
use Henrotaym\LaravelMysqlDump\Services\Mysqldump;
use Henrotaym\LaravelTemporaryFiles\Services\TemporaryFiles\TemporaryFileService;
use PDO;

class DatabaseExportStrategy implements ExportStrategy
{
    public function __construct(
        protected string $host,
        protected string $port,
        protected string $username,
        protected string $password,
        protected string $database,
        protected array $options,
        protected TemporaryFileService $temporaryFileService
    ) {}

    public function export(): string
    {
        $defaultOptions = [
            'add-drop-database' => true,
            'add-drop-table' => true,
            'no-create-db' => false,
            'databases' => true,
        ];
        $options = array_merge($defaultOptions, $this->options);
        $dsn = 'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->database;

        $dump = new Mysqldump(
            $dsn,
            $this->username,
            $this->password,
            $options,
            [
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_EMULATE_PREPARES => true,
            ]);
        $path = $this->temporaryFileService->path()->extension('sql');

        $dump->start($path);

        return $path;
    }
}
