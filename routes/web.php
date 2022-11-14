<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\studentController;
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

//////////////////////////////////
//Super Admin Route
//Profile Page
Route::get('/profile/{id}' , [HomeController::class , "profilePage"]) -> name('Profile Page');
Route::post('/updateInfo/{id}' , [HomeController::class, "updateInfo"]) -> name('update personal info');
Route::post('/change-password', [ChangePasswordController::class, 'store']) -> name('change-password');
Route::get('/registerBook' , [HomeController::class , 'registerBook']) -> name('registerbook');
//Book Management 
Route::get('/totalBook' , [HomeController::class , "totalBook"]) -> name("totalBook");
Route::get('/updateBookView/{id}',[HomeController::class,'updateBookView']);
Route::post('/delete/{id}' , [HomeController::class , 'delete']);
Route::post('/upload',[HomeController::class,'upload']);
Route::post('/updateBook/{id}',[HomeController::class,'updateBook']);
//Membership
Route::post('/registerNewMember' , [HomeController::class , 'registerNewMember']) -> name('registerNewMember');
Route::get('/registerMember' , [HomeController::class , "registerMember"]) -> name("registerMember");
Route::get('/totalMember' , [HomeController::class , "totalMember"]) -> name("totalMember");
Route::post('/deleteMembers/{id}' , [HomeController::class , 'deleteMembers']);
Route::post('/updateMembersPage/{id}' , [HomeController::class , 'updateMembersPage']);
Route::post('/updateMember/{id}',[HomeController::class,'updateMembership']);
Route::post('/revokeMember/{id}' , [HomeController::class , 'revokeMember']) -> name('revokeMember');
//Issue
Route::post('/registerNewIssue' , [HomeController::class, 'registerNewIssue']) -> name('registerNewIssue');
Route::get('/Issue' , [HomeController::class , "Issue"]) -> name("Issue");
Route::get('/issues' , [HomeController::class , "registerissues"]) -> name("registerissues");
Route::post('/issueReturned/{id}' , [HomeController::class , 'issueReturned']) -> name('issueReturned');
//Lost Book
Route::get('/LostBook' , [HomeController::class , 'LostBook']) -> name('LostBook');
Route::post('/Lost/{id}' , [HomeController::class , 'declareLost']);
Route::get('/issueHistory' , [HomeController::class , 'issueHistory'])->name('/issueHistory');
//Author
Route::get('/registerAuthor' , [HomeController::class , 'registerAuthorSuperAdmin']) -> name('registerAuthorSuperAdmin');
Route::post('/registerAuthorNew' , [HomeController::class , 'registerAuthorNew']) -> name('registerAuthorNew');
Route::get('/authorList' , [HomeController::class , 'authorList']) -> name('authorList');
Route::post('/deleteAuthor/{id}' , [HomeController::class , 'deleteAuthor']) -> name('deleteAuthor');
Route::get('/authorUpdate/{id}' , [HomeController::class , 'authorUpdate']) -> name('authorUpdate');
Route::post('/AuthorUpdateDetails/{id}' , [HomeController::class , 'AuthorUpdateDetails']) -> name('AuthorUpdateDetails');

//User Management
Route::post('/recoverBook/{id}' , [HomeController::class , 'recoverBook'])-> name('recoverBook');
Route::get('/userManagement' , [HomeController::class , 'userManagement']) -> name('userManagement');
Route::post('/revokeAuth/{id}' , [HomeController::class , 'revokeAuth']) -> name('revokeAuth');
Route::post('/promote/{id}' , [HomeController::class , 'promote']) -> name('promote');
Route::post('/promoteMember/{id}' , [HomeController::class , 'promoteMember']) -> name('promoteMember');

//////////////////////////////////
//Student Route
Route::get('/User/Profile' , [studentController::class , 'userProfile']) -> name('userProfile');
Route::get('/User/BookIssued/{id}' , [studentController::class , "userBookIssued"]) -> name('userBookIssued');
Route::get('/User/History/{id}' , [studentController::class , "userHistory"]) -> name('userHistory');
Route::post('/User/updateInfoStudent/{id}' , [studentController::class , "updateInfoStudent"]) -> name('updateInfoStudent');


//////////////////////////////////

//Student Admin Route
//Membership List
Route::get('/StudentMember' , [HomeController::class , 'StudMember']) -> name("StudentMember");

//Register Issue, Issued List, Lost Book
Route::get('/StudentRegIssue' , [HomeController::class , "StudentRegIssue"]) -> name("StudRegIssue");
Route::get('/StudentIssueList' , [HomeController::class , "StudentIssueList"]) -> name("StudentIssueList");
Route::get('/StudentLost' , [HomeController::class , 'StudentLostBook']) -> name("StudentLostBook");
Route::post('/StudentRecoverBook/{id}' , [HomeController::class , 'StudentRecoverBook'])-> name('StudentRecoverBook');

//////////////////////////////////
//Student Admin Route
//Membership List
Route::get('/StudentMember' , [AdminStudentController::class , 'StudMember']) -> name("StudentMember");

//Register Issue, Issued List, Lost Book
Route::get('/StudentRegIssue' , [AdminStudentController::class , "StudentRegIssue"]) -> name("StudRegIssue");
Route::post('/UploadNewIssue' , [AdminStudentController::class, 'UploadNewIssue']) -> name('UploadNewIssue');
Route::get('/StudentIssueList' , [AdminStudentController::class , "StudentIssueList"]) -> name("StudentIssueList");
Route::get('/StudentLost' , [AdminStudentController::class , 'StudentLostBook']) -> name("StudentLostBook");
Route::post('/StudentRecoverBook/{id}' , [AdminStudentController::class , 'StudentRecoverBook'])-> name('StudentRecoverBook');
Route::post('/declareLost/{id}' , [AdminStudentController::class , 'declareLost']);


//Book Admin
Route::post('/Book/uploadBook',[AuthorController::class,'uploadBook']) -> name("uploadBook");
Route::get('/Book/BookTotal' , [AuthorController::class , "BookTotal"]) -> name("BookTotal");
Route::get('/Book/BookRegister' , [AuthorController::class , 'BookRegister']) -> name('BookRegister');
Route::get('/Book/BookUpdateView/{id}',[AuthorController::class,'BookUpdateView']);
Route::post('/Book/BookUpdate/{id}',[AuthorController::class,'BookUpdate']);
Route::get('/Book/registerAuthor' , [AuthorController::class , 'registerAuthor']) -> name('registerAuthor');
Route::post('/Book/registerNewAuthor' , [AuthorController::class , 'registerNewAuthor']) -> name('registerNewAuthor');
Route::get('/Book/AuthorList' , [AuthorController::class , 'AuthorList']) -> name('AuthorList');
Route::post('/Book/deleteBook/{id}' , [AuthorController::class , 'deleteBook']);
Route::post('/Book/deleteAuthor/{id}' , [AuthorController::class , 'deleteAuthor']);
Route::get('/Book/AuthorUpdateView/{id}',[AuthorController::class,'AuthorUpdateView']) -> name('AuthorUpdateView');
Route::post('/Book/AuthorUpdate/{id}',[AuthorController::class,'AuthorUpdate']) -> name('AuthorUpdate');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class , 'redirectInit'])->name('dashboard');
});


