# php-tools

[ENGLISH](README.md) | [中文](README_ZH_CN.md)

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

php 常用工具

## 目录

```
src/
tests/
```

## 安装

Via Composer

```bash
$ composer require yiranzai/tools
```

## 使用

[更多请查看用户手册](USER_MANUAL_ZH_CN.md)

> 摘要

-   `Arr::class`
    -   `\Yiranzai\Tools\Arr::sortBy()` // 使用给定的回调对数组进行排序并保留原始键
    -   `\Yiranzai\Tools\Arr::arrSortByField()` // 二维数组排序
    -   `\Yiranzai\Tools\Arr::arrGroup()` // 数组按字段分组
    -   `\Yiranzai\Tools\Arr::heapSort()` // 堆排序
    -   `\Yiranzai\Tools\Arr::mergeSort()` // 归并排序
    -   `\Yiranzai\Tools\Arr::quickSort()` // 快速排序
-   `Date::class`
    -   `\Yiranzai\Tools\Date::toCarbon()` // 生成 Carbon 对象
    -   `\Yiranzai\Tools\Date::timeDiffFormat()` // 输出两个 DateTime 对象的差距
-   `Math::class`
    -   `\Yiranzai\Tools\Math::formatDiv()` // 四舍五入 格式化除法
    -   `\Yiranzai\Tools\Math::formatMod()` // 四舍五入 格式化取余（模运算）
    -   `\Yiranzai\Tools\Math::formatMul()` // 四舍五入 格式化乘法
    -   `\Yiranzai\Tools\Math::formatSub()` // 四舍五入 格式化减法
    -   `\Yiranzai\Tools\Math::formatAdd()` // 四舍五入 格式化加法
    -   `\Yiranzai\Tools\Math::gcd()` // 求两个数的最大公约数
    -   `\Yiranzai\Tools\Math::gcdArray()` // 求一个数组的最大公约数
-   `Filesystem::class`
    -   `\Yiranzai\Tools\Filesystem::put()` // 将内容存储在文件中。
    -   `\Yiranzai\Tools\Filesystem::get()` // 获取文件的内容。
-   `Tools::class`
    -   `\Yiranzai\Tools\Tools::getNiceFileSize()` // 人性化转化内存信息
    -   `\Yiranzai\Tools\Tools::callFunc()` // 调用对象的方法
    -   `\Yiranzai\Tools\Tools::iteratorGet()` // 获取一个对象或者一个数组的属性
    -   `\Yiranzai\Tools\Tools::arrGet()` // 获取数组中的某个元素
    -   `\Yiranzai\Tools\Tools::objectGet()` // 获取对象中的某个元素
-   `SnowFlake::class`
    -   `\Yiranzai\SnowFlake\SnowFlake::next()` // 生成 64 位 id
    -   `\Yiranzai\SnowFlake\SnowFlake::analysis()` // 解析 64 位 id
-   `Zval::class`
    -   `Zval::isRef()` // 确定两个变量是否具有引用关系

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## 测试

```bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## 安全

If you discover any security related issues, please email wuqingdzx@gmail.com instead of using the issue tracker.

## Credits

-   [yiranzai][link-author]
-   [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

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
