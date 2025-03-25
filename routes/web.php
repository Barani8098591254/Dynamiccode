<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\S3BuketController;
use App\Http\Controllers\S3BucketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::post('/upload', [S3BucketController::class, 'upload']);

Route::post('/I will check the route', [S3BucketController::class, 'I will check the route']);
