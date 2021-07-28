<?php

namespace App\Services;

use App\Services\FileEncryptionServiceInterface;

/**
 * Original source for this function :
 * https://www.php.net/manual/en/function.openssl-encrypt.php 
 */
class FileEncryptionService implements FileEncryptionServiceInterface
{
    /**
     *  Encrypt file
     * 
     * @param string $data
     * @param string $key
     * @param string $method
     * @return string
     */
    public function encrypt(string $data, string $key, string $method)
    {
        // secure the secret key
        $keyEncrypted = base64_decode($key);

        // set initialization vector
        $initVector = substr($keyEncrypted, 0, 16);

        // return encrypted data
        $encryptedData = openssl_encrypt($data, $method, $keyEncrypted, 0, $initVector);

        return $encryptedData;
    }

    /**
     *  Decrypt file
     * 
     * @param string $data
     * @param string $key
     * @param string $method
     * @return string
     */
    public function decrypt(string $data, string $key, string $method)
    {
        // secure the secret key
        $keyEncrypted = base64_decode($key);

        // set initialization vector
        $initVector = substr($keyEncrypted, 0, 16);

        // return decrypted data
        $decryptedData = openssl_decrypt($data, $method, $keyEncrypted, 0, $initVector);

        return $decryptedData;
    }
}