# Changelog

All notable changes to `tools` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## v0.1 - 2019-03-22

php tools

### Added

-   `Arr::class`
    -   `\Yiranzai\Tools\Arr::arrSortByField()` // dyadic array sorting
    -   `\Yiranzai\Tools\Arr::arrGroup()` // Arrays are grouped by field
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
-   `Tools::class`
    -   `\Yiranzai\Tools\Tools::getNiceFileSize()` // Humanized conversion memory information
    -   `\Yiranzai\Tools\Tools::callFunc()` // Method of calling the object
    -   `\Yiranzai\Tools\Tools::iteratorGet()` // Get an object or an array of elements
    -   `\Yiranzai\Tools\Tools::arrGet()` // Get an element in the array
    -   `\Yiranzai\Tools\Tools::objectGet()` // Get an element from the object
