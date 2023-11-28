<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// web.php에 루트로 들어오면 welcome으로 갈수있게 함
Route::get('/', function() {
    return view('welcome');
});

Route::fallback(function(){
    return response()->json([
        'code' => 'E03'
    ], 404);
});