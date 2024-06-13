<?php

namespace Henrotaym\LaravelMysqlDump;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/*
 * @see https://github.com/spatie/laravel-package-tools
 */
class LaravelMysqlDumpServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-mysql-dump')
            ->hasConfigFile('laravel-mysql-dump')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile();
            });
    }
}
