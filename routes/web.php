<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('post', PostController::class)->except('index');
Route::get('/', [PostController::class, 'index']);

// Show login form
Route::get('/login', [UserController::class, 'login']);

// Show register form
Route::get('/signup', [UserController::class, 'create']);

// store register form
Route::post('/signup', [UserController::class, 'store']);

//login user
Route::post('/login/auth', [UserController::class, 'auth']);

// log out user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

