<?php

namespace Kaadon\Encrypt;

use \phpseclib3\Crypt\RSA as Phpseclib3Rsa;
use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;
use phpseclib3\Crypt\RSA\PublicKey;
use phpseclib3\Crypt\RSA\PrivateKey;

class RSA
{
    /**
     * @var SymfonyFilesystem
     */
    public $filesystem;

    /**
     *
     */
    public function __construct()
    {
        $this->filesystem = new SymfonyFilesystem();
        return $this;
    }

    /**
     * 创建秘钥
     * @param string|null $path
     * @return bool
     * @throws \Exception
     */
    public static function createKey(?string $path = null): bool
    {
        if (is_null($path)) {
            $path = "./default/";
        }
        try {
            $RSA        = new self();
            $private    = Phpseclib3Rsa::createKey();
            $privateKey = $private->toString('PKCS8');
            $public     = $private->getPublicKey();
            $publicKey  = $public->toString('PKCS8');
            $RSA->filesystem->dumpFile($path . 'public.pem', $publicKey);
            $RSA->filesystem->dumpFile($path . 'private.pem', $privateKey);
        } catch (\Exception $exception) {
            throw new \Exception("Create a secret error");
        }
        return true;
    }

    /**
     * @param string $string
     * @param string|null $privateKey
     * @return mixed
     * @throws \Exception
     */
    public static function decrypt(string $string, ?string $privateKey = null)
    {
        if (is_null($privateKey)) $privateKey = "./default/private.pem";
        try {
            $data = PrivateKey::load(file_get_contents($privateKey))->decrypt($string);
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
            return ;
//            throw new \Exception($exception->getMessage());
        }
        return $data;
    }

    /**
     * @param string $string
     * @param string|null $publicKey
     * @return string
     * @throws \Exception
     */
    public static function encrypt(string $string, ?string $publicKey = null): string
    {
        if (is_null($publicKey)) $publicKey = "./default/public.pem";
        try {
            $data = PublicKey::load(file_get_contents($publicKey))->withHash("sha256")->encrypt($string);
        } catch (\Exception $exception) {
            throw new \Exception("Create a secret error");
        }
        return $data;
    }
}