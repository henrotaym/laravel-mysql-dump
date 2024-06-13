<?php

use Henrotaym\LaravelMysqlDump\Factories\Strategies\ExportStrategyFactory;
use Henrotaym\LaravelMysqlDump\Factories\Strategies\ImportStrategyFactory;
use Illuminate\Support\Facades\DB;

it('can do both', function () {
    /**
     * @var ExportStrategyFactory
     */
    $exportFactory = app()->make(ExportStrategyFactory::class);

    $exportStrategy = $exportFactory->database(
        env('DB_HOST'),
        env('DB_PORT'),
        env('DB_USERNAME'),
        env('DB_PASSWORD'),
        'tenant_4ab79e07-40ca-4c72-833e-a3f9354b4c3c',
    );

    $path = $exportStrategy->export();

    expect(file_exists($path))->toBe(true);

    /**
     * @var ImportStrategyFactory
     */
    $importFactory = app()->make(ImportStrategyFactory::class);

    $importStrategy = $importFactory->database(
        env('DB_HOST'),
        env('DB_PORT'),
        env('DB_USERNAME'),
        env('DB_PASSWORD'),
        $path
    );
    $importStrategy->import();

    $hasInvoices = DB::connection('mysql')->table('invoices')->exists();

    expect($hasInvoices)->toBe(true);
});
