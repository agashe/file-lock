<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
