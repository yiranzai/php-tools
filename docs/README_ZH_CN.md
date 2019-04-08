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

[用户手册](USER_MANUAL_ZH_CN.md)

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
    -   `\Yiranzai\Tools\Filesystem::hash()` // 获取给定路径上的文件的 MD5 哈希值。
    -   `\Yiranzai\Tools\Filesystem::prepend()` // 将内容存储到到文件开头。
    -   `\Yiranzai\Tools\Filesystem::exists()` // 确定文件或目录是否存在。
    -   `\Yiranzai\Tools\Filesystem::put()` // 将内容存储在文件中。
    -   `\Yiranzai\Tools\Filesystem::makeDirectory()` // 创建一个目录。
    -   `\Yiranzai\Tools\Filesystem::get()` // 获取文件的内容。
    -   `\Yiranzai\Tools\Filesystem::isFile()` // 确定给定路径是否为文件。
    -   `\Yiranzai\Tools\Filesystem::sharedGet()` // 获取具有共享访问权限的文件的内容。
    -   `\Yiranzai\Tools\Filesystem::size()` // 获取给定文件的文件大小。
    -   `\Yiranzai\Tools\Filesystem::append()` // 将内容存储到到文件结尾（追加）。
    -   `\Yiranzai\Tools\Filesystem::chmodFile()` // 获取或设置文件或目录的 UNIX 模式。
    -   `\Yiranzai\Tools\Filesystem::move()` // 将文件移动到新位置。
    -   `\Yiranzai\Tools\Filesystem::name()` // 从文件路径中提取文件名。
    -   `\Yiranzai\Tools\Filesystem::basename()` // 从文件路径中提取尾随名称组件。
    -   `\Yiranzai\Tools\Filesystem::dirname()` // 从文件路径中提取父目录。
    -   `\Yiranzai\Tools\Filesystem::extension()` // 从文件路径中提取文件扩展名。
    -   `\Yiranzai\Tools\Filesystem::type()` // 获取给定文件的文件类型。
    -   `\Yiranzai\Tools\Filesystem::mimeType()` // 获取给定文件的 mime 类型。
    -   `\Yiranzai\Tools\Filesystem::lastModified()` // 获取文件的上次修改时间。
    -   `\Yiranzai\Tools\Filesystem::isReadable()` // 确定给定路径是否可读。
    -   `\Yiranzai\Tools\Filesystem::isWritable()` // 确定给定路径是否可写。
    -   `\Yiranzai\Tools\Filesystem::moveDirectory()` // 移动目录。
    -   `\Yiranzai\Tools\Filesystem::isDirectory()` // 确定给定路径是否是目录。
    -   `\Yiranzai\Tools\Filesystem::deleteDirectory()` // 递归删除目录。
    -   `\Yiranzai\Tools\Filesystem::delete()` // 删除给定路径的文件。
    -   `\Yiranzai\Tools\Filesystem::copyDirectory()` // 将目录从一个位置复制到另一个位置。
    -   `\Yiranzai\Tools\Filesystem::copyFile()` // 将文件复制到新位置。
    -   `\Yiranzai\Tools\Filesystem::cleanDirectory()` // 清空所有文件和文件夹的指定目录。
    -   `\Yiranzai\Tools\Filesystem::windowsOs()` // 确定当前环境是否基于 Windows。
-   `Tools::class`
    -   `\Yiranzai\Tools\Tools::getNiceFileSize()` // 人性化转化内存信息
    -   `\Yiranzai\Tools\Tools::callFunc()` // 调用对象的方法
    -   `\Yiranzai\Tools\Tools::iteratorGet()` // 获取一个对象或者一个数组的属性
    -   `\Yiranzai\Tools\Tools::arrGet()` // 获取数组中的某个元素
    -   `\Yiranzai\Tools\Tools::objectGet()` // 获取对象中的某个元素

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
