<?php
require_once "vendor/autoload.php";
use \phpseclib3\Crypt\RSA;
$private = RSA::createKey()->withHash("sha512");
$privateKey = $private->toString('PKCS8');
$public = $private->getPublicKey();
$publicKey = $public->toString('PKCS8');
use phpseclib3\Crypt\PublicKeyLoader;

$key = PublicKeyLoader::load($privateKey)->withHash('sha1')->withMGFHash('sha1');
echo $key->decrypt(...);
file_get_contents('./private.pem',$privateKey);
file_get_contents('./public.pem',$publicKey);
