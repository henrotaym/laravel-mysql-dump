<?php

namespace Henrotaym\LaravelMysqlDump\Contracts\Strategies;

use Exception;

interface ExportStrategy
{
    /**
     * @return string Export file path
     *
     * @throws Exception When export fails.
     */
    public function export(): string;
}
