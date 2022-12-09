<?php
require_once "vendor/autoload.php";
use Kaadon\Encrypt\RSA;
use phpseclib3\Crypt\RSA as Phpseclib3Rsa;
use phpseclib3\Crypt\RSA\PublicKey;
use phpseclib3\Crypt\RSA\PrivateKey;
//RSA::createKey();
//$a = RSA::encrypt("123456");
//var_dump($a);
//var_dump(base64_encode($a));
$b = base64_decode("eKn7rn+enYn4LBxvD67SqslJtmrnaLEOezRmhJqURaxbVGo+H/6H4HMf7jTWzcZOLS0hy1HlUVuc6alHEljDeoyHaWOOUjzpbjS/9PoK55sKtLBtor7dMjKZhio7QDetY13CVTOl/Fb1jAKgxpme4StU95CSOmxegcfhnDvEdHptMWTjbLPw+1o3m0sVNBkwxq+xYnOpEvK6Fc97xOtk/6P6v0jBxPyNB2o0Ro5AvMrI1+C6cQSWGkHqGFX0sUPT9tvhTvl4xYuAxisM+BhQKoz0w1w3bRNQDumqwEbLR12k2Hs10e9p9feKnWDwyoXmSZbBjEJWthWUw7a7FtQDUA==");
var_dump($b);
$as = RSA::decrypt($b);
//var_dump($as);
//$text = "123456";

//$private    = Phpseclib3Rsa::createKey();
//var_dump();
////var_dump($private->getPublicKey());
//var_dump($private->encrypt($text));

//var_dump($private->getPublicKey()->verify());
//$privateKey = $private->toString('PKCS8');
//$public     = $private->getPublicKey();
//$publicKey  = $public->toString('PKCS8');
//
//

//$s = PublicKey::load(file_get_contents('./public.pem'))->encrypt($text);
//var_dump($s);
//$ss = PrivateKey::load(file_get_contents('./private.pem'))->decrypt($s);
//var_dump($ss);
//$rsas = Phpseclib3Rsa::load(file_get_contents('./public.pem'));
//var_dump($rsas);
//$text = $rsas->sign($text);
//var_dump($text);
//$rsa = Phpseclib3Rsa::load(file_get_contents('./private.pem'))->verify($text);
//var_dump($rsa);