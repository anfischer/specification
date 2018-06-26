# PHP Specification pattern

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A package containing base classes to be used as a starting ground for implementation of the Specification pattern in PHP (for more information see [https://martinfowler.com/apsupp/spec.pdf](https://martinfowler.com/apsupp/spec.pdf)).  
  
This package includes the typical set of and(), or() and not() specifications as well as specifications for allOf(), anyOf() and noneOf().

## Install

Via Composer

``` bash
$ composer require anfischer/specification
```

## Usage
General usage of this package can be inferred from its test cases.  
However a very basic and simplified example of usage with a single specification to (not) satisfy might look like this:
``` php
use Anfischer\Specification\Specification;

class Invoice
{
    public function isOverdue()
    {
        /* Logic snip */
        return true;
    }
}

class OverdueInvoiceSpecification extends Specification
{
    public function isSatisfiedBy($invoice): bool
    {
        return $invoice->isOverdue();
    }
}

$overdue = new OverdueInvoiceSpecification;

// Will return true
$overdue->isSatisfiedBy(new Invoice);

// Will return false
$overdue->not()->isSatisfiedBy(new Invoice);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email kontakt@season.dk instead of using the issue tracker.

## Credits

- [Andreas Fischer][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/anfischer/specification.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/anfischer/specification/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/anfischer/specification.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/anfischer/specification.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/anfischer/specification.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/anfischer/specification
[link-travis]: https://travis-ci.org/anfischer/specification
[link-scrutinizer]: https://scrutinizer-ci.com/g/anfischer/specification/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/anfischer/specification
[link-downloads]: https://packagist.org/packages/anfischer/specification
[link-author]: https://github.com/anfischer
[link-contributors]: ../../contributors
