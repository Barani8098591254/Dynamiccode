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
Route::get('/read/{filename}', [S3BucketController::class, 'read']);
Route::get('/download/{filename}', [S3BucketController::class, 'download']);
Route::delete('/delete/{filename}', [S3BucketController::class, 'delete']);
