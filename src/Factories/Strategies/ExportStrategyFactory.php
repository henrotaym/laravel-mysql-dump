<?php

namespace Henrotaym\LaravelMysqlDump\Factories\Strategies;

use Henrotaym\LaravelMysqlDump\Contracts\Strategies\ExportStrategy;
use Henrotaym\LaravelMysqlDump\Strategies\Exports\DatabaseExportStrategy;
use Henrotaym\LaravelTemporaryFiles\Factories\Services\TemporaryFiles\TemporaryFileServiceFactory;

class ExportStrategyFactory
{
    public function __construct(
        protected TemporaryFileServiceFactory $temporaryFileServiceFactory
    ) {
    }

    public function database(
        string $host,
        string $port,
        string $username,
        string $password,
        string $database,
        array $options = [],
    ): ExportStrategy {
        $temporaryFileService = $this->temporaryFileServiceFactory->create(false);

        return app()->make(DatabaseExportStrategy::class, [
            'host' => $host,
            'port' => $port,
            'database' => $database,
            'username' => $username,
            'password' => $password,
            'options' => $options,
            'temporaryFileService' => $temporaryFileService,
        ]);
    }
}
