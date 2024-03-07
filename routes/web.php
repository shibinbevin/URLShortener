<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UrlController;

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
Route::get('/login', function () {
    return view('/auth/login');
});
Route::get('/register', function () {
    return view('/auth/register');
});
Route::get('/addurl', function () {
    return view('/user/addurl');
});
Route::get('/urls', function () {
    return view('/user/urls');
});
Route::get('/editurl/{id}', [UrlController::class, "edit"]);

Route::post('/register', [UserController::class, "register"])->name('register');

Route::post('/login', [UserController::class, "login"])->name('login');

Route::get('/logout', [UserController::class, "logout"])->name('logout');

Route::post('/addurl', [UrlController::class, "addurl"])->name('addurl');

Route::delete('/delete/{id}', [UrlController::class, "deleteRecord"])->name('delete');

Route::get('/{shortenedurl}', [UrlController::class, 'redirect']);

Route::get('/urls', [UrlController::class, 'geturls'])->name('urls');

Route::put('/editurl/{id}', [UrlController::class, 'editurl']);
