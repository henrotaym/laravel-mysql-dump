<?php

use Henrotaym\LaravelMysqlDump\Factories\Strategies\ExportStrategyFactory;
use Henrotaym\LaravelMysqlDump\Factories\Strategies\ImportStrategyFactory;
use Illuminate\Support\Facades\DB;

it('can do both', function () {
    $tenantDatabase = 'tenant_4ab79e07-40ca-4c72-833e-a3f9354b4c3c';
    $seedPath = '/opt/apps/app/tests/export.sql';

    /**
     * @var ImportStrategyFactory
     */
    $importFactory = app()->make(ImportStrategyFactory::class);

    $seedStrategy = $importFactory->database(
        env('DB_HOST'),
        env('DB_PORT'),
        env('DB_USERNAME'),
        env('DB_PASSWORD'),
        $seedPath
    );
    $seedStrategy->import();

    /**
     * @var ExportStrategyFactory
     */
    $exportFactory = app()->make(ExportStrategyFactory::class);

    $exportStrategy = $exportFactory->database(
        env('DB_HOST'),
        env('DB_PORT'),
        env('DB_USERNAME'),
        env('DB_PASSWORD'),
        $tenantDatabase,
    );

    $path = $exportStrategy->export();

    expect(file_exists($path))->toBe(true);

    $importStrategy = $importFactory->database(
        env('DB_HOST'),
        env('DB_PORT'),
        env('DB_USERNAME'),
        env('DB_PASSWORD'),
        $path
    );
    $importStrategy->import();

    config(['database.connections.mysql.database' => $tenantDatabase]);
    DB::purge('mysql');

    $hasInvoices = DB::connection('mysql')->table('invoices')->exists();

    expect($hasInvoices)->toBe(true);
});
