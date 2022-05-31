<p align="center">
    <img src="https://img.shields.io/packagist/v/octopyid/phpunit-extra.svg?style=for-the-badge" alt="Version">
    <img src="https://img.shields.io/packagist/dt/octopyid/phpunit-extra.svg?style=for-the-badge&color=F28D1A" alt="Downloads">
    <img src="https://img.shields.io/packagist/l/octopyid/phpunit-extra?style=for-the-badge" alt="License">
</p>

# PHP Unit Extra

Custom collection for PHPUnit assertions

## Installation

To install the package, simply follow the steps below.

Install the package using Composer:

```bash
composer require octopyid/phpunit-extra --dev
```

## Available Assertions

### 1. [Octopy\PHPUnitExtra\AssertQueryCount](src/AssertQueryCount.php)

A custom assertion for phpunit that allows you to count the number of SQL queries used in a test.
Can be used to enforce certain performance characteristics.

```php
$this->assertNoQueriesExecuted(); // No queries should be executed

$this->assertQueryCountMatches(1); // Exactly one query should be executed

$this->assertQueryCountLessThan(2); // Query count should be less than 2

$this->assertQueryCountGreaterThan(1); // Query count should be greater than 1
```

## License

This package is licensed under the MIT license.
