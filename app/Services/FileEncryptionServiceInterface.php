<?php

namespace App\Services;

interface FileEncryptionServiceInterface
{
    /**
     *  Encrypt file
     * 
     * @param string $data
     * @param string $key
     * @param string $method
     * @return string
     */
    public function encrypt(string $data, string $key, string $method);

    /**
     *  Decrypt file
     * 
     * @param string $data
     * @param string $key
     * @param string $method
     * @return string
     */
    public function decrypt(string $data, string $key, string $method);
}