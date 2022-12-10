<?php

namespace Kaadon\Encrypt;

use Kaadon\Encrypt\RSA\RSA;

class TPRSA extends RSA
{
    public static function createKey(?string $path = null): bool
    {

        return parent::createKey($path); // TODO: Change the autogenerated stub
    }

    public static function decrypt(string $string, ?string $privateKey = null)
    {
        return parent::decrypt($string, $privateKey); // TODO: Change the autogenerated stub
    }
    public static function encrypt(string $string, ?string $publicKey = null): string
    {
        return parent::encrypt($string, $publicKey); // TODO: Change the autogenerated stub
    }
}