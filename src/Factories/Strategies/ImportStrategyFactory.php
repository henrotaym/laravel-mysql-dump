<?php

namespace Henrotaym\LaravelMysqlDump\Factories\Strategies;

use Henrotaym\LaravelMysqlDump\Contracts\Strategies\ImportStrategy;
use Henrotaym\LaravelMysqlDump\Strategies\Imports\DatabaseImportStrategy;

class ImportStrategyFactory
{
    public function database(
        string $host,
        string $port,
        string $username,
        string $password,
        string $path
    ): ImportStrategy {

        return app()->make(DatabaseImportStrategy::class, [
            'host' => $host,
            'port' => $port,
            'username' => $username,
            'password' => $password,
            'path' => $path,
        ]);
    }
}
