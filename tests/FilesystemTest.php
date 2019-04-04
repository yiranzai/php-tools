<?php

declare(strict_types=1);

namespace Yiranzai\File\Tests;

use Exception;
use Yiranzai\Tools\Filesystem;
use PHPUnit\Framework\TestCase;

/**
 * Class FilesystemTest
 * @package Yiranzai\File\Tests
 */
class FilesystemTest extends TestCase
{
    /**
     *
     */
    public function testFile(): void
    {
        $file      = new Filesystem();
        $str       = 'test';
        $path      = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'testOne.txt';
        $pathTwo   = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'testTwo.yaml';
        $pathThree = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'testThree.ini';
        $file->prepend($path, $str);
        $this->assertSame($file->basename($path), pathinfo($path, PATHINFO_BASENAME));
        $this->assertSame($file->name($path), pathinfo($path, PATHINFO_FILENAME));
        $this->assertSame($file->dirname($path), pathinfo($path, PATHINFO_DIRNAME));
        $this->assertSame($file->extension($path), pathinfo($path, PATHINFO_EXTENSION));
        $this->assertSame($file->type($path), filetype($path));
        $this->assertSame($file->hash($path), md5_file($path));
        $this->assertSame($file->mimeType($path), finfo_file(finfo_open(FILEINFO_MIME_TYPE), $path));
        $this->assertTrue($file->isReadable($path));
        $this->assertTrue($file->isWritable($path));
        $file->chmodFile($path, 0000);
        $this->assertFalse($file->isReadable($path));
        $this->assertFalse($file->isWritable($path));
        $file->chmodFile($path, 0755);
        $this->assertSame($file->lastModified($path), filemtime($path));
        $this->assertTrue($file->exists($path));
        $this->assertSame($str, $file->get($path));

        $file->copyFile($path, $pathTwo);
        $this->assertTrue($file->exists($path));
        $this->assertTrue($file->exists($pathTwo));
        $this->assertSame($str, $file->get($pathTwo));
        $this->assertSame($str, $file->sharedGet($pathTwo));
        $file->append($path, $str . '1');
        $this->assertSame($str . $str . '1', $file->get($path));
        $file->prepend($path, $str . '2');
        $this->assertSame($str . '2' . $str . $str . '1', $file->get($path));

        $file->delete($path);
        $this->assertFalse($file->exists($path));

        $file->move($pathTwo, $pathThree);
        $this->assertFalse($file->exists($pathTwo));
        $this->assertTrue($file->exists($pathThree));
        $this->assertSame($str, $file->get($pathThree));
        $this->assertSame($str, $file->sharedGet($pathThree));
        $file->delete($pathThree);
        $file->deleteDirectory(dirname($pathThree));
        $this->assertFalse($file->exists($pathThree));
    }

    /**
     *
     */
    public function testDir(): void
    {
        $file      = new Filesystem();
        $path      = __DIR__ . DIRECTORY_SEPARATOR . 'testOne';
        $children  = ['aaa', 'bbb', 'ccc'];
        $pathTwo   = __DIR__ . DIRECTORY_SEPARATOR . 'testTwo';
        $pathThree = __DIR__ . DIRECTORY_SEPARATOR . 'testThree';
        $file->makeDirectory($path);
        foreach ($children as $child) {
            $file->makeDirectory($path . DIRECTORY_SEPARATOR . $child);
        }
        $this->assertTrue($file->exists($path));
        foreach ($children as $child) {
            $this->assertTrue($file->exists($path . DIRECTORY_SEPARATOR . $child));
        }
        $this->assertTrue($file->isDirectory($path));
        $this->assertTrue($file->isWritable($path));
        $file->chmodFile($path, 0000);
        $this->assertFalse($file->isReadable($path));
        $this->assertFalse($file->isWritable($path));
        $file->chmodFile($path, 0755);


        $file->copyDirectory($path, $pathTwo);
        $this->assertTrue($file->exists($path));
        $this->assertTrue($file->exists($pathTwo));

        $file->deleteDirectory($path);
        $this->assertFalse($file->exists($path));

        $file->moveDirectory($pathTwo, $pathThree);
        $this->assertFalse($file->exists($pathTwo));
        $this->assertTrue($file->exists($pathThree));

        $file->deleteDirectory($pathThree);
        $this->assertFalse($file->exists($pathThree));
    }

    /**
     *
     */
    public function testDirTwo(): void
    {
        $file      = new Filesystem();
        $path      = __DIR__ . DIRECTORY_SEPARATOR . 'testOne';
        $pathTwo   = __DIR__ . DIRECTORY_SEPARATOR . 'testTwo';
        $pathThree = __DIR__ . DIRECTORY_SEPARATOR . 'testThree';
        $file->makeDirectory($path, 0755, false, true);
        $this->assertTrue($file->isDirectory($path));
        $this->assertTrue($file->isWritable($path));
        $file->chmodFile($path, 0000);
        $this->assertFalse($file->isReadable($path));
        $this->assertFalse($file->isWritable($path));
        $file->chmodFile($path, 0755);
        $this->assertTrue($file->exists($path));

        $file->copyDirectory($path, $pathTwo);
        $this->assertTrue($file->exists($path));
        $this->assertTrue($file->exists($pathTwo));
        $this->assertSame(substr(sprintf('%o', fileperms($path)), -4), $file->chmodFile($path));

        $file->cleanDirectory($path);
        $this->assertTrue($file->exists($path));
        $file->deleteDirectory($path);
        $this->assertFalse($file->exists($path));

        $file->moveDirectory($pathTwo, $pathThree);
        $this->assertFalse($file->exists($pathTwo));
        $this->assertTrue($file->exists($pathThree));
        $this->assertFalse($file->moveDirectory($pathTwo, $pathThree, true));
        $this->assertFalse($file->exists($pathThree));

        $file->deleteDirectory($pathThree);
        $this->assertFalse($file->exists($pathThree));

        $this->assertSame($file->windowsOs(), stripos(PHP_OS, 'win') === 0);
    }

    /**
     *
     */
    public function testDirException(): void
    {
        $this->expectException(Exception::class);
        $file = new Filesystem();
        $file->get(__DIR__);
    }
}
