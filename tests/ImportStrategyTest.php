<?php

use Henrotaym\LaravelMysqlDump\Factories\Strategies\ImportStrategyFactory;
use Illuminate\Support\Facades\DB;

it('can import a database', function () {

    $path = '/opt/apps/app/tests/export.sql';

    /**
     * @var ImportStrategyFactory
     */
    $factory = app()->make(ImportStrategyFactory::class);

    $strategy = $factory->database(
        env('DB_HOST'),
        env('DB_PORT'),
        env('DB_USERNAME'),
        env('DB_PASSWORD'),
        $path
    );
    $strategy->import();

    $hasInvoices = DB::connection('mysql')->table('invoices')->exists();

    expect($hasInvoices)->toBe(true);
});
