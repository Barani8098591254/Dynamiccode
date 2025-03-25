<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3BucketController extends Controller
{
    protected $s3Folder = 'databases.back/testing';

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $path = Storage::disk('s3')->put($this->s3Folder, $file);

        return response()->json(['path' => $path], 201);
    }

    public function read($filename)
    {
        $file = Storage::disk('s3')->get($this->s3Folder . $filename);

        return response($file, 200)->header('Content-Type', 'application/octet-stream');
    }

    public function download($filename)
    {
        $path = Storage::disk('s3')->url($this->s3Folder . $filename);

        return response()->json(['url' => $path]);
    }

    public function delete($filename)
    {
        Storage::disk('s3')->delete($this->s3Folder . $filename);

        return response()->json(null, 204);
    }
}