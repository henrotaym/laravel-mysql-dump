<?php

namespace Henrotaym\LaravelMysqlDump\Contracts\Strategies;

use Exception;

interface ImportStrategy
{
    /**
     * @throws Exception When import fails.
     */
    public function import(): void;
}
