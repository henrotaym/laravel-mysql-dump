# laravel-mysql-dump

[![Latest Version on Packagist](https://img.shields.io/packagist/v/henrotaym/laravel-mysql-dump.svg?style=flat-square)](https://packagist.org/packages/henrotaym/laravel-mysql-dump)
[![Total Downloads](https://img.shields.io/packagist/dt/henrotaym/laravel-mysql-dump.svg?style=flat-square)](https://packagist.org/packages/henrotaym/laravel-mysql-dump)

## Installation

You can install the package via composer:

```bash
composer require henrotaym/laravel-mysql-dump
```

You can install package with:

```bash
php artisan laravel-mysql-dump:install
```

<!-- You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-mysql-dump-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-mysql-dump-config"
``` -->

This is the contents of the published config file:

```php
return [
];
```

<!-- Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-mysql-dump-views"
``` -->

## Usage

```php
// EXPORT
$factory = app()->make(ExportStrategyFactory::class);
$strategy = $factory->database(
    env('DB_HOST'),
    env('DB_PORT'),
    env('DB_USERNAME'),
    env('DB_PASSWORD'),
    'tenant_4ab79e07-40ca-4c72-833e-a3f9354b4c3c',
);
$path = $strategy->export();

// IMPORT
$importFactory = app()->make(ImportStrategyFactory::class);
$importStrategy = $importFactory->database(
    env('DB_HOST'),
    env('DB_PORT'),
    env('DB_USERNAME'),
    env('DB_PASSWORD'),
    $path
);
$importStrategy->import();
```

## Testing

```bash
./cli test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
