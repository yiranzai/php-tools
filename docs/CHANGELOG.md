# Changelog

All notable changes to `tools` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## v0.2.3 - 2019-04-15

Add `Zval::isRef()`

### Added

-   `Zval::class`
    -   `Zval::isRef()` // Determine if two variables have a reference relationship

## v0.2.2 - 2019-04-09

Add SnowFlake algo, generate 64 bit identifier, use snowflakes from Twitter.

### Added

-   `SnowFlake::class`
    -   `\Yiranzai\SnowFlake\SnowFlake::next()` // generate 64 bit identifier
    -   `\Yiranzai\SnowFlake\SnowFlake::analysis()` // analysis 64 bit identifier

## v0.2.1 - 2019-04-08

Add `Arr::sortBy()`

### Added

-   `Arr::class`
    -   `\Yiranzai\Tools\Arr::sortBy()` // Sorts the array with the given callback and retains the original key, support multi-column sorting.

## v0.2 - 2019-04-04

Add file operations adn three sorting methods.

### Added

-   `Arr::class`
    -   `\Yiranzai\Tools\Arr::heapSort()` // Heap Sort
    -   `\Yiranzai\Tools\Arr::mergeSort()` // Merge Sort
    -   `\Yiranzai\Tools\Arr::quickSort()` // Quick Sort
-   `Filesystem::class`
    -   `\Yiranzai\Tools\Filesystem::hash()` // Get the MD5 hash of the file at the given path.
    -   `\Yiranzai\Tools\Filesystem::prepend()` // Prepend to a file.
    -   `\Yiranzai\Tools\Filesystem::exists()` // Determine if a file or directory exists.
    -   `\Yiranzai\Tools\Filesystem::put()` // Store contents in the file.
    -   `\Yiranzai\Tools\Filesystem::makeDirectory()` // Create a directory.
    -   `\Yiranzai\Tools\Filesystem::get()` // Get the contents of a file.
    -   `\Yiranzai\Tools\Filesystem::isFile()` // Determine if the given path is a file.
    -   `\Yiranzai\Tools\Filesystem::sharedGet()` // Get contents of a file with shared access.
    -   `\Yiranzai\Tools\Filesystem::size()` // Get the file size of a given file.
    -   `\Yiranzai\Tools\Filesystem::append()` // Append to a file.
    -   `\Yiranzai\Tools\Filesystem::chmodFile()` // Get or set UNIX mode of a file or directory.
    -   `\Yiranzai\Tools\Filesystem::move()` // Move a file to a new location.
    -   `\Yiranzai\Tools\Filesystem::name()` // Extract the file name from a file path.
    -   `\Yiranzai\Tools\Filesystem::basename()` // Extract the trailing name component from a file path.
    -   `\Yiranzai\Tools\Filesystem::dirname()` // Extract the parent directory from a file path.
    -   `\Yiranzai\Tools\Filesystem::extension()` // Extract the file extension from a file path.
    -   `\Yiranzai\Tools\Filesystem::type()` // Get the file type of a given file.
    -   `\Yiranzai\Tools\Filesystem::mimeType()` // Get the mime-type of a given file.
    -   `\Yiranzai\Tools\Filesystem::lastModified()` // Get the file's last modification time.
    -   `\Yiranzai\Tools\Filesystem::isReadable()` // Determine if the given path is readable.
    -   `\Yiranzai\Tools\Filesystem::isWritable()` // Determine if the given path is writable.
    -   `\Yiranzai\Tools\Filesystem::moveDirectory()` // Move a directory.
    -   `\Yiranzai\Tools\Filesystem::isDirectory()` // Determine if the given path is a directory.
    -   `\Yiranzai\Tools\Filesystem::deleteDirectory()` // Recursively delete a directory.
    -   `\Yiranzai\Tools\Filesystem::delete()` // Delete the file at a given path.
    -   `\Yiranzai\Tools\Filesystem::copyDirectory()` // Copy a directory from one location to another.
    -   `\Yiranzai\Tools\Filesystem::copyFile()` // Copy a file to a new location.
    -   `\Yiranzai\Tools\Filesystem::cleanDirectory()` // Empty the specified directory of all files and folders.
    -   `\Yiranzai\Tools\Filesystem::windowsOs()` // Determine whether the current environment is Windows based.

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
