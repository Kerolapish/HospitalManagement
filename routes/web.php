<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChangePasswordController;
use App\Models\User;
use App\Models\Library;

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

Route::get('/', function () {
        return view('/Auth/login');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/profile/{id}' , [HomeController::class , "profilePage"]) -> name('Profile Page');
Route::post('/updateInfo/{id}' , [HomeController::class, "updateInfo"]) -> name('update personal info');

Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('change-password');
Route::get('/registerBook' , [HomeController::class , 'registerBook'])-> name('registerbook');

Route::post('/delete/{id}' , [HomeController::class , 'destroy']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $data = User::all();
        $book = Library::all();
        return view('AdminPanel' , compact('data' , 'book'));
    })->name('AdminPanel');
});
