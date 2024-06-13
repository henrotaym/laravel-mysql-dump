<?php

namespace Henrotaym\LaravelMysqlDump\Facades;

use Illuminate\Support\Facades\Facade;
use Henrotaym\LaravelMysqlDump\LaravelMysqlDump as Implementation;

/**
 * @see \Henrotaym\LaravelMysqlDump\LaravelMysqlDump
 */
class LaravelMysqlDump extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Implementation::class;
    }
}
