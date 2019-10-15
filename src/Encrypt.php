<?php


namespace Yiranzai\Tools;

class Encrypt
{
    public $data;
    public $plainText;
    public $cipher;
    public $key;
    public $options;
    public $iv;
    public $tag;
    public $aad;
    public $tagLength;
    public $cipherText;
    protected $flag = 1;

    public function __construct(
        $data,
        $cipher,
        $key,
        $options = 0,
        $iv = null,
        $tag = null,
        $aad = ''
    ) {
        if (!in_array($cipher, openssl_get_cipher_methods(), true)) {
            throw new \RuntimeException('cipher: ' . $cipher . 'not support');
        }
        $this->data = $data;
        $this->cipher = $cipher;
        $this->key = $key;
        $this->options = $options;
        $ivLen = openssl_cipher_iv_length($cipher);
        $this->iv = $iv ?? openssl_random_pseudo_bytes($ivLen);
        $this->tag = $tag;
        $this->aad = $aad;
        $this->tagLength = mb_strlen($this->tag);
    }

    public function encrypt()
    {
        if ($this->flag) {
            $this->plainText = $this->data;
        }
        $this->cipherText = openssl_encrypt(
            $this->plainText,
            $this->cipher,
            $this->key,
            $this->options,
            $this->iv,
            $this->tag,
            $this->aad,
            $this->tagLength
        );
        $this->flag = 0;
        return $this;
    }

    public function decrypt()
    {
        if ($this->flag) {
            $this->cipherText = $this->data;
        }
        $this->plainText = openssl_decrypt(
            $this->cipherText,
            $this->cipher,
            $this->key,
            $this->options,
            $this->iv,
            $this->tag,
            $this->aad
        );
        $this->flag = 0;
        return $this;
    }
}
