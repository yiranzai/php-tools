<?php


namespace Yiranzai\Tools\Tests\Test;

use PHPUnit\Framework\TestCase;
use Yiranzai\Tools\Encrypt;
use Yiranzai\Tools\Filesystem;

class EncryptTest extends TestCase
{
    public function testEncrypt()
    {
        $encrypt = new Encrypt(
            'test',
            'aes-256-gcm',
            md5('hjkadsjkhadskjhlkjdfgjkldgf'),
            OPENSSL_RAW_DATA,
            'jhkadshjkkahjdsd',
            'ghjasdjhgads',
            'jhkjkhads'
        );
        $encrypt->encrypt();
        $this->assertSame('test', $encrypt->data);
        $this->assertSame('test', $encrypt->decrypt()->plainText);
    }

    /**
     * @throws \RuntimeException
     *
     */
    public function testException()
    {
        $this->expectException(\RuntimeException::class);
        $encrypt = new Encrypt(
            'test',
            'aes-256-abm',
            md5('hjkadsjkhadskjhlkjdfgjkldgf'),
            OPENSSL_RAW_DATA,
            'jhkadshjkkahjdsd',
            'ghjasdjhgads',
            'jhkjkhads'
        );
        $encrypt->encrypt();
    }

    /**
     * @throws \RuntimeException
     *
     */
    public function testFlag()
    {
        $encryptOne = new Encrypt(
            'test',
            'aes-256-gcm',
            md5('hjkadsjkhadskjhlkjdfgjkldgf'),
            OPENSSL_RAW_DATA,
            'jhkadshjkkahjdsd',
            'ghjasdjhgads',
            'jhkjkhads'
        );
        $encryptOne->encrypt();
        $encryptTwo = new Encrypt(
            $encryptOne->cipherText,
            'aes-256-gcm',
            md5('hjkadsjkhadskjhlkjdfgjkldgf'),
            OPENSSL_RAW_DATA,
            'jhkadshjkkahjdsd',
            $encryptOne->tag,
            'jhkjkhads'
        );
        $encryptTwo->decrypt();
        $this->assertSame('test', $encryptTwo->plainText);
    }
}
