# TobyMaxham Laravel DateTime Scopes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tobymaxham/laravel-datetime-scopes.svg?style=flat-square)](https://packagist.org/packages/tobymaxham/laravel-datetime-scopes)
[![Total Downloads](https://img.shields.io/packagist/dt/tobymaxham/laravel-datetime-scopes.svg?style=flat-square)](https://packagist.org/packages/tobymaxham/laravel-datetime-scopes)

## Composer install package
```bash
composer require tobymaxham/laravel-datetime-scopes
```

## Usage

```php
use TobyMaxham\LaravelDateTimeScopes\DateTimeScopes;

class Invoice extends Model
{
    use DateTimeScopes;
}
```

```php
// samples.php

Invoice::ofYesterday(); // query invoices created yesterday
Invoice::ofLastWeek(); // query invoices created in the last week
Invoice::ofLastMonth(); // query invoices created in the last month
Invoice::ofLastQuarter(); // query invoices created in the last quarter
Invoice::ofLastYear(); // query invoices created in the last year
```

Also there are the methods `ofLastMinutes` and `ofLastHour` you could use to fetch entries that are created in the last minute/hour.

## Security Vulnerabilities

If you've found a bug regarding security please mail git@maxham.de instead of using the issue tracker.

## Support me

[![ko-fi](https://ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/Z8Z4NZKU)

## Credits

- [TobyMaxham](https://github.com/TobyMaxham)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.