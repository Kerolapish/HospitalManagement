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
Route::post('/updateMembersPage/{id}' , [HomeController::class , 'updateMembersPage']);
Route::post('/declareLost/{id}' , [HomeController::class , 'declareLost']);
Route::post('/issueReturned/{id}' , [HomeController::class , 'issueReturned']) -> name('issueReturned');
Route::post('/revokeMember/{id}' , [HomeController::class , 'revokeMember']) -> name('revokeMember');

Route::post('/upload',[HomeController::class,'upload']);
Route::get('/LostBook' , [HomeController::class , 'LostBook']) -> name('LostBook');
Route::post('/recoverBook/{id}' , [HomeController::class , 'recoverBook'])-> name('recoverBook');
Route::get('/updateBookView/{id}',[HomeController::class,'updateBookView']);
Route::post('/updateBook/{id}',[HomeController::class,'updateBook']);
Route::post('/updateMember/{id}',[HomeController::class,'updateMembership']);
Route::post('/registerNewMember' , [HomeController::class , 'registerNewMember']) -> name('registerNewMember');
Route::post('/registerNewIssue' , [HomeController::class, 'registerNewIssue']) -> name('registerNewIssue');
Route::get('/userManagement' , [HomeController::class , 'userManagement']) -> name('userManagement');
Route::post('/acceptReg/{id}' , [HomeController::class , 'acceptReg']) -> name('acceptReg');
Route::post('/revokeAuth/{id}' , [HomeController::class , 'revokeAuth']) -> name('revokeAuth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class , 'redirectInit'])->name('AdminPanel');
});


