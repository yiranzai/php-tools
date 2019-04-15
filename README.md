# php-tools

[ENGLISH](docs/README.md) | [中文](docs/README_ZH_CN.md)

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](docs/LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

php tools

## Structure

```
src/
tests/
```

## Install

Via Composer

```bash
$ composer require yiranzai/tools
```

## Usage

[More please check the user manual](docs/USER_MANUAL.md)

> abstract

-   `Arr::class`
    -   `\Yiranzai\Tools\Arr::sortBy()` // Sorts the array with the given callback and retains the original key, support multi-column sorting.
    -   `\Yiranzai\Tools\Arr::arrSortByField()` // dyadic array sorting
    -   `\Yiranzai\Tools\Arr::arrGroup()` // Arrays are grouped by field
    -   `\Yiranzai\Tools\Arr::heapSort()` // Heap Sort
    -   `\Yiranzai\Tools\Arr::mergeSort()` // Merge Sort
    -   `\Yiranzai\Tools\Arr::quickSort()` // Quick Sort
-   `Date::class`
    -   `\Yiranzai\Tools\Date::toCarbon()` // Generate a Carbon object
    -   `\Yiranzai\Tools\Date::timeDiffFormat()` // Output the gap between two DateTime objects
-   `Math::class`
    -   `\Yiranzai\Tools\Math::formatDiv()` // rounding format division
    -   `\Yiranzai\Tools\Math::formatMod()` // rounded out formatted remainder (modulo operation)
    -   `\Yiranzai\Tools\Math::formatMul()` // rounding format multiplication
    -   `\Yiranzai\Tools\Math::formatSub()` // rounding format subtraction
    -   `\Yiranzai\Tools\Math::formatAdd()` // rounding up formatting addition
    -   `\Yiranzai\Tools\Math::gcd()` // Find the greatest common divisor of two numbers
    -   `\Yiranzai\Tools\Math::gcdArray()` // Find the greatest common divisor of an array
-   `Filesystem::class`
    -   `\Yiranzai\Tools\Filesystem::put()` // Store contents in the file.
    -   `\Yiranzai\Tools\Filesystem::get()` // Get the contents of a file.
-   `Tools::class`
    -   `\Yiranzai\Tools\Tools::getNiceFileSize()` // Humanized conversion memory information
    -   `\Yiranzai\Tools\Tools::callFunc()` // Method of calling the object
    -   `\Yiranzai\Tools\Tools::iteratorGet()` // Get an object or an array of elements
    -   `\Yiranzai\Tools\Tools::arrGet()` // Get an element in the array
    -   `\Yiranzai\Tools\Tools::objectGet()` // Get an element from the object
-   `SnowFlake::class`
    -   `\Yiranzai\SnowFlake\SnowFlake::next()` // generate 64 bit identifier
    -   `\Yiranzai\SnowFlake\SnowFlake::analysis()` // analysis 64 bit identifier
-   `Zval::class`
    -   `Zval::isRef()` // Determine if two variables have a reference relationship

## Change log

Please see [CHANGELOG](docs/CHANGELOG.md) for more information on what has changed recently.

## Testing

```bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](docs/CONTRIBUTING.md) and [CODE_OF_CONDUCT](docs/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email wuqingdzx@gmail.com instead of using the issue tracker.

## Credits

-   [yiranzai][link-author]
-   [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](docs/LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/yiranzai/tools.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/yiranzai/php-tools/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/yiranzai/php-tools.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/yiranzai/php-tools.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/yiranzai/tools.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/yiranzai/tools
[link-travis]: https://travis-ci.org/yiranzai/php-tools
[link-scrutinizer]: https://scrutinizer-ci.com/g/yiranzai/php-tools/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/yiranzai/php-tools
[link-downloads]: https://packagist.org/packages/yiranzai/tools
[link-author]: https://github.com/yiranzai
[link-contributors]: ../../contributors
