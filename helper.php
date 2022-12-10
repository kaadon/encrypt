<?php


if (!function_exists('kaadon_rsa_createKey')) {
    function kaadon_rsa_createKey()
    {
        return \Kaadon\Encrypt\TPRSA::createKey();
    }
}

if (!function_exists('kaadon_rsa_encrypt')) {
    function kaadon_rsa_encrypt(string $string)
    {
        return \Kaadon\Encrypt\TPRSA::encrypt($string);
    }
}

if (!function_exists('kaadon_rsa_decrypt')) {
    function kaadon_rsa_decrypt(string $string)
    {
        return \Kaadon\Encrypt\TPRSA::decrypt($string);
    }
}
