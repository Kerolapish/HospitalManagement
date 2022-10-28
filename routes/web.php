<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChangePasswordController;
use App\Models\User;
use App\Models\Library;
use App\Models\totalMembers;
use App\Models\bookIssue;

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

Route::post('/change-password', [ChangePasswordController::class, 'store']) -> name('change-password');
Route::get('/registerBook' , [HomeController::class , 'registerBook']) -> name('registerbook');

Route::get('/registerMember' , [HomeController::class , "registerMember"]) -> name("registerMember");
Route::get('/totalMember' , [HomeController::class , "totalMember"]) -> name("totalMember");
Route::get('/Issue' , [HomeController::class , "Issue"]) -> name("Issue");
Route::get('/totalBook' , [HomeController::class , "totalBook"]) -> name("totalBook");

Route::get('/issues' , [HomeController::class , "registerissues"]) -> name("registerissues");

Route::post('/delete/{id}' , [HomeController::class , 'delete']);
Route::post('/deleteMembers/{id}' , [HomeController::class , 'deleteMembers']);
Route::post('/deleteIssues/{id}' , [HomeController::class , 'deleteIssues']);
// Route::post('/update_view/{id}' , [HomeController::class , 'update_view']);

Route::post('/upload/{id}',[HomeController::class,'upload']);


Route::get('/updateBookView/{id}',[HomeController::class,'updateBookView']);
Route::post('/updateBook/{id}',[HomeController::class,'updateBook']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class , 'redirectInit'])->name('AdminPanel');
});


