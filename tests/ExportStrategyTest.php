<?php

use Henrotaym\LaravelMysqlDump\Factories\Strategies\ExportStrategyFactory;

it('can export a database', function () {
    /**
     * @var ExportStrategyFactory
     */
    $factory = app()->make(ExportStrategyFactory::class);

    $strategy = $factory->database(
        env('DB_HOST'),
        env('DB_PORT'),
        env('DB_USERNAME'),
        env('DB_PASSWORD'),
        'tenant_4ab79e07-40ca-4c72-833e-a3f9354b4c3c',
    );

    $path = $strategy->export();

    expect(file_exists($path))->toBe(true);
});

it('throws for unknown databases', function () {
    /**
     * @var ExportStrategyFactory
     */
    $factory = app()->make(ExportStrategyFactory::class);

    $strategy = $factory->database(
        env('DB_HOST'),
        env('DB_PORT'),
        env('DB_USERNAME'),
        env('DB_PASSWORD'),
        'tenant_4ab79e07-40ca-4c72-833e-a3f9354b4c3c_test',
    );

    $strategy->export();

})->throws(
    Exception::class,
    "Connection to mysql failed with message: SQLSTATE[HY000] [1049] Unknown database 'tenant_4ab79e07-40ca-4c72-833e-a3f9354b4c3c_test'"
);
