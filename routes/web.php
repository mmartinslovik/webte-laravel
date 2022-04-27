<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Session;


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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/search', function () {
    session_start();
    if (isset($_SESSION['user'])) {
        return view('result')->with([
            'location' => $_SESSION['user']['location'],
            'country' => $_SESSION['user']['country'],
            'weather' => $_SESSION['user']['weather'],
            'iso_code' => $_SESSION['user']['iso_code']
        ]);
    } else {
        return view('search');
    }
});

Route::post('/search', [LocationController::class, 'search']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
