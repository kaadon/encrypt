<?php

namespace Kaadon\Encrypt\RSA;

use phpseclib3\Crypt\RSA as Phpseclib3Rsa;
use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;

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
    }

    /**
     * 创建秘钥
     * @param string|null $path
     * @return bool
     * @throws \Exception
     */
    public static function createKey(?string $path = null): array
    {
        if (is_null($path)) {
            throw new \Exception("Please provide PATH");
        }
        $path = rtrim($path, '/') . '/';
        try {
            $RSA        = new self();
            $private    = Phpseclib3Rsa::createKey(4096);
            $privateKey = $private->toString('PKCS8');
            $public     = $private->getPublicKey();
            $publicKey  = $public->toString('PKCS8');
            $RSA->filesystem->dumpFile($path . 'public.pem', $publicKey);
            $RSA->filesystem->dumpFile($path . 'private.pem', $privateKey);
        } catch (\Exception $exception) {
            throw new \Exception("Create secret error");
        }
        return [
            "public"  => $path . 'public.pem',
            "private" => $path . 'private.pem'
        ];
    }

    /**
     * @param string $string
     * @param string|null $path
     * @return mixed
     * @throws \Exception
     */
    public static function decrypt(string $string, ?string $path = null)
    {
        if (is_null($path)) $path = "./default/";
        $path = rtrim($path, '/') . '/';
        try {
            $Private = Phpseclib3Rsa::loadPrivateKey(file_get_contents($path . "private.pem"))
                ->withPadding(Phpseclib3Rsa::ENCRYPTION_PKCS1);
            $data    = $Private->decrypt(base64_decode($string, true));
        } catch (\Exception $exception) {
            throw new \Exception("Decrypted  error");
        }
        return $data;
    }

    /**
     * @param string $string
     * @param string|null $publicKey
     * @return string
     * @throws \Exception
     */
    public static function encrypt(string $string, ?string $path = null): string
    {
        if (is_null($path)) $path = "./default/";
        $path = rtrim($path, '/') . '/';
        try {
            $Public = Phpseclib3Rsa::loadPublicKey(file_get_contents($path . "public.pem"))
                ->withPadding(Phpseclib3Rsa::ENCRYPTION_PKCS1);
            $data   = base64_encode($Public->encrypt($string));
        } catch (\Exception $exception) {
            throw new \Exception("Encrypt error");
        }
        return $data;
    }
}