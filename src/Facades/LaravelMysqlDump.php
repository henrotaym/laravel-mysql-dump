<?php

namespace Henrotaym\LaravelMysqlDump\Facades;

use Henrotaym\LaravelMysqlDump\LaravelMysqlDump as Implementation;
use Illuminate\Support\Facades\Facade;

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
