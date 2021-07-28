<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use App\Services\FileEncryptionServiceInterface;

class FileController extends Controller
{
    /**
     * @var FileEncryptionServiceInterface $fileService
     */
    private $fileService;

    /**
     * FileController Constructor
     * 
     * @param FileEncryptionServiceInterface $fileService
     */
    public function __construct(FileEncryptionServiceInterface $fileService)
    {
        $this->fileService = $fileService;    
    }

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

            $encryptedFile = $this->fileService->encrypt(file_get_contents($file),
                config('encryption.key'), config('encryption.method'));

            $fileName = 'encrypted/' . $file->getClientOriginalName() . '.enc';
            Storage::disk('public')->put($fileName, $encryptedFile);

            return response()->json([
                'status' => true,
                'message' => 'Your file has been encrypted successfully!',
                'file' => Storage::url($fileName)
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

            $file = $request->file('selected_file');

            $decryptedFile = $this->fileService->decrypt(file_get_contents($file),
                config('encryption.key'), config('encryption.method'));

            $fileName = 'decrypted/' . substr($file->getClientOriginalName(), 0,
                strpos($file->getClientOriginalName(), '.enc'));
            Storage::disk('public')->put($fileName, $decryptedFile);

            return response()->json([
                'status' => true,
                'message' => 'Your file has been decrypted successfully!',
                'file' => Storage::url($fileName)
            ]);
        }
        
        return response()->json([
            'status' => false,
            'message' => 'No file was provided!'
        ]);
    }
}
