<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class FileController extends Controller
{
    /**
     * Encrypt file
     * 
     * @param Request $request
     * @return Response
     */
    public function encrypt(Request $request)
    {
        if ($request->hasFile('selected_file')) {
            $file = $request->file('selected_file');

            /**
             * Original source for this function :
             * https://www.php.net/manual/en/function.openssl-encrypt.php 
             */

            // secure key
            $key = 'MbeX9gQ7RrrKv&Er7`c,t6$:,^LHx5~e';

            $encryption_key = base64_decode($key);
            $iv = substr($encryption_key, 0, 16);
            $encrypted = openssl_encrypt(file_get_contents($file), 
                'aes-256-cbc', $encryption_key, 0, $iv);

            Storage::disk('public')->put('encrypted/' . $file->getClientOriginalName() . '.enc', $encrypted);

            return response()->json([
                'status' => true,
                'message' => 'Success'
            ]);
        }
        
        return response()->json([
            'status' => false,
            'message' => 'No file was provided!'
        ]);
    }

    /**
     * Decrypt file
     * 
     * @param Request $request
     * @return Response
     */
    public function decrypt(Request $request)
    {
        if ($request->hasFile('selected_file')) {
            $file = $request->file('selected_file');

            /**
             * Original source for this function :
             * https://www.php.net/manual/en/function.openssl-encrypt.php 
             */

            // secure key
            $key = 'MbeX9gQ7RrrKv&Er7`c,t6$:,^LHx5~e';

            $encryption_key = base64_decode($key);
            $iv = substr($encryption_key, 0, 16);
            $decrypted = openssl_decrypt(file_get_contents($file), 
                'aes-256-cbc', $encryption_key, 0, $iv);

            Storage::disk('public')->put(
                'decrypted/' . substr($file->getClientOriginalName(), 0,
                strpos($file->getClientOriginalName(), '.enc')), $decrypted
            );

            return response()->json([
                'status' => true,
                'message' => 'Success'
            ]);
        }
        
        return response()->json([
            'status' => false,
            'message' => 'No file was provided!'
        ]);
    }
}
