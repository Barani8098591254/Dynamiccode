<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use Illuminate\Support\Facades\View;
use Aws\Resource\Aws;
class S3BuketController extends Controller
{
    //



    public function s3buket()
    {

        // Initialize S3 client
        $s3Client = new S3Client([
            'version' => '2012-10-17', // or specify the version you need
            'region' => 'us-west-2',
            'credentials' => [
               'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);
    
        // Specify the path to your folder in the S3 bucket
        $folderPath = 'databases.back/testing/';
    
        // List objects in the specified folder
        $result = $s3Client->listObjects([
            'Bucket' => 'databases.back',
            'Prefix' => $folderPath,
        ]);
    
    // Extract image URLs from the result if it's not null
    $imageUrls = [];
    if (!empty($result['Contents'])) {
        foreach ($result['Contents'] as $object) {
            // Generate URL for each object
            $imageUrl = $s3Client->getObjectUrl('databases.back', $object['Key']);
            $imageUrls[] = $imageUrl;
        }
    }
        // Pass the image URLs to the view
        return view('image', ['imageUrls' => $imageUrls]);
    }





    
    

}
