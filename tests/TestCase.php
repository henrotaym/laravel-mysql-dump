<?php

namespace Henrotaym\LaravelMysqlDump\Tests;

use Henrotaym\LaravelMysqlDump\LaravelMysqlDumpServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Henrotaym\\LaravelMysqlDump\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelMysqlDumpServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        // config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_example_table.php.stub';
        $migration->up();
        */
    }
}
