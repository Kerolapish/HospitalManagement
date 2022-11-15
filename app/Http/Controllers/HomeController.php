<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Library;
use App\Models\totalMembers;
use App\Models\bookIssue;
use App\Models\Author;
use App\Models\IssuedHistory;

use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;
use DateTime;


class HomeController extends Controller
{

    //PRIMARY FUNCTION
    //go to profile page
    public function profilePage(){
        $data = User::all();
        return view('page.profile' , compact('data'));
    }

    //index function, called after user login
    public function redirectInit(){
        if(Auth::user()-> role == "Superadmin"){
        
            $data = User::all();
            $book = Library::all();
            $bookCount = Library::count();
            $memberCount = User::where('role' , 'Student') -> get() -> count();
            $issuedCount = bookIssue::count();
            $lostBook = Library::where('Availability' , 'Lost') -> get();
            $lostBook = $lostBook -> count();
            
            return view('AdminPanel' , compact('data' , 'book' , 'issuedCount', 'bookCount',
            "memberCount", "lostBook"));
             
        } else if(Auth::user()-> role == "AdminStudent"){

            $data = User::all();
            $book = Library::all();
            $bookCount = Library::count();
            $memberCount = User::where('role' , 'AdminStudent') -> get() -> count();
            $issuedCount = bookIssue::count();
            $lostBook = Library::where('Availability' , 'Lost') -> get();
            $lostBook = $lostBook -> count();

            return view('student.StudentPanel', compact('data' , 'book' , 'issuedCount', 'bookCount', "memberCount", "lostBook"));
     
        }else if(Auth::user()-> role == "AdminBook"){

            $data = User::all();
            $book = Library::all();
            $bookCount = Library::count();
            $issuedCount = bookIssue::count();
            $lostBook = Library::where('Availability' , 'Lost') -> get();
            $lostBook = $lostBook -> count();
            return view('Book.BookPanel', compact('data' , 'book'  , 'issuedCount', 'bookCount', "lostBook"));

        } else if(Auth::user()-> role == "Student"){

            $data = User::all();
            $book = Library::all();
            $username = Auth::user() -> name;
            $issued = bookIssue::where('name' , $username)->get();
            $issuedCount = $issued -> count();
            $bookASAPCount = 0;
            foreach($issued as $issueData){
                $datetoday = new DateTime("now");
                $dateReturn = new DateTime($issueData -> dateReturn);
                if ($datetoday > $dateReturn){
                    $bookASAPCount += 1;
                }
            } 
            $historyTotal = IssuedHistory::where('NameIssued', Auth::user()-> name)  -> count();
            return view ('User.userPanel', compact('data', 'book' , 'issuedCount' , 'bookASAPCount', 'historyTotal'));
        } else {
            return view('layouts.forbidden');
        }
    }


    //go to user management page
    public function userManagement(){
        $data = User::all();
        $user = User::all();
        return view ('Page.UserManagement' , compact('data' , 'user'));
    }

    //function to revoke user authorization 
    public function revokeAuth($id){
        $revoke = User::find($id);
        $revoke -> role = "Student";
        $revoke -> save();
        $data = User::all();
        
        return view('Page.UserManagement' , compact('data'));
    }

    //function to go to promote user page
    public function promote($id){
        $promotedUser = User::find($id);
        $data = User::all();
        return view('page.promoteUser' , compact('data' , 'promotedUser'));
    }

    //function to promote new admin role to student
    public function promoteMember($id, Request $request){
        $promotedUser = User::find($id);
        switch($request -> role){
            case "Superadmin":
                $promotedUser -> role = "Superadmin";
                break;
            case "Admin Student":
                $promotedUser -> role = "AdminStudent";
                break;
            case "Admin Book":
                $promotedUser -> role = "AdminBook";
                break;
        }
        $promotedUser -> havePending = "Admin";
        $promotedUser -> save();
        $data = User::all();
        return view ('Page.UserManagement' , compact('data'));
    }
    //////////////////////////////////

    // PROFILE FUNCTION
    //function to update user information
    public function updateInfo(Request $request, $id){
        $data = user::find($id);
        $data -> name = $request -> name;
        $data -> save();
        return back()->with('success','Record successfully updated!');
    }

    //function to log out
    public function logout(){
        Auth::logout();
        return view ('auth.login');
    }

    //////////////////////////////////

    //BOOK FUNCTIOM
    //go to register book page
    public function registerBook(){
        $data = User::all();
        $listAuthor = Author::all();
        return view('page.register' , compact('data' ,'listAuthor'));
    }

    //Create book record DB
    public function upload(Request $request){
        $request->validate([
            'name'=>'required',
            'author'=>'required',
            'year'=>'required|max:4',
            'price'=>'required',
            'ISBN'=>'required|max:20'
        ],
        [
            'name.required'=>'Fill the Book Name',
            'author.required'=>'Fill the Author',
            'year.required'=>'Fill the Publishing Year',
            'price.required'=>'Fill the Book Price Number',
            'ISBN.required'=>'Fill the Book ISBN'
        ]
        );
        $library = new library();
        $data = user::all();
        if (Author::where('authorName' , $request->author ) -> get() -> count() == 0){
            $Author = new Author();
            $Author -> authorName = $request -> author;
            $Author -> save();
        }
        $library->name=$request->name;
        $library->author=$request->author;
        $library->year=$request->year;
        $library->price=$request->price;
        $library->ISBN=$request->ISBN;
        $library->save();
        $listAuthor = Author::all();
        return view('Page.register' , compact('data' , 'listAuthor'));
    }

    //function for delete book
    public function delete($id){
        $book=Library::find($id);
        $book->delete();

        return redirect('/totalBook');
    }
    
    //function to go to update book Page
    public function updateBookView($id){
        $data = User::all();
        $book = Library::find($id);
        return view('Page.UpdateBook', compact('data' , 'book'));   
    }

    //function to update book  
    public function updateBook(Request $request,$id){
        $data = User::all();
        $library = Library::find($id);
        $library->name= $request->name;
        $library->author= $request->author;
        $library->year= $request->year;
        $library->price= $request->price;
        $library->save();
        $book= Library::all();
        $bookCount = Library::count();
        $memberCount = User::where('role' , 'Student') -> get() -> count();
        $issuedCount = bookIssue::count();
        $lostbookCount =  Library::where('Availability' , 'Lost' ) -> get();
        $lostBook = $lostbookCount -> count();
        return view('page.totalBook', compact('data' , 'book' , 'bookCount' , 'memberCount' , 'issuedCount', 'lostBook'));
    }

    
    //go to total book page
    public function totalBook(){
        $data = user::all();        
        $book = Library::all();
        return view('page.totalBook' , compact('data' , 'book'));
    }

    
    
    //////////////////////////////////

    // MEMBER FUNCTION
    //function for delete members
    public function deleteMembers($id){

        $member = User::find($id);
        $member->delete();
        return redirect('/totalMember');
    }

    //go to totalMember Page
    public function totalMember(){
       
        $member = User::where('role' , 'Student') -> get();
        $data = User::all(); 
        return view('page.totalMember' , compact('member'  , 'data'));
    }

    //function to revoke member blacklist
    public function revokeMember($id){
        $revoke = User::find($id);
        $revoke -> havePending = "clear";
        $revoke -> save();
        $data = User::all();
        $member = User::where('role' , 'Student') -> get();
        return view('page.totalMember' , compact('data' , 'member'));
    }

    //function to go to updateMembers page
    public function updateMembersPage($id){
        $member = User::find($id);
        $data = User::all();
        return view('page.updateMembers', compact('data', 'member'));
    }

    //function to update member  
    public function updateMembership(Request $request, $id){
        $data = User::all();
        $memberUpdate = User::find($id);
        $date = new DateTime($memberUpdate->period);
        
        $memberUpdate->name= $request->memberName;
        $memberUpdate->IcNum= $request->memberIC;
        $memberUpdate->PhoneNum= $request->phonemember;

        if($request -> memberPeriod == "6 Months"){
            $date->modify('+6 month');
        } else if ($request -> memberPeriod == "1 Year") {
            $date->modify('+12 month');
        } else if ($request -> memberPeriod == "2 Years"){
            $date->modify('+24 month');
        }
        $date = $date->format('Y-m-d');  
        $memberUpdate->period= $date;
        $memberUpdate->save();

        $member = User::where('role' , 'Student') -> get();

        return view('page.totalMember', compact('data' , 'member'));
    }

    //////////////////////////////////

    // ISSUES FUNCTION
    //function for declare lost book
    public function declareLost($id){
        $issued = BookIssue::find($id);
        $bookLost = Library::where('name' , $issued -> bookName ) -> first();
        $memberLost = User::where('name' , $issued -> name) -> first();

        $bookLost -> Availability = "Lost";
        $memberLost -> havePending = "Blacklisted";

        $memberLost -> save();
        $bookLost -> save();
        $issued->delete();
        $data = user::all();
        $lost = Library::where('Availability' , 'Lost') -> get();
        return view('Page.LostBook' , compact('data' , 'lost'));
    }

    //go to Issued Book page
    public function Issue(){
        $issued = BookIssue::all();
        $data = User::all(); 
        return view('page.ListIssue' , compact('issued'  , 'data'));
    }

    //go to register issues page
    public function registerissues(){
        $member = User::where('havePending' , 'clear') -> get();
        $book = Library::where('Availability' , 'Available') -> get();
        $data = User::all();
        return view('page.RegisterIssues' , compact('data', 'member' , 'book'));
    }

    //function to register new issue
    public function registerNewIssue(Request $request){

        $issue = new bookIssue();
        $memberIssued = User::where('name' , $request -> issuedName) -> first();
        $bookIssued = library::where('name' , $request -> issuedBook) -> first();
        $today = new DateTime("now");
        $today = $today -> format('y-m-d');
        $returnDate = new DateTime('now');
        $returnDate = $returnDate->modify("+7 days");
        $returnDate = $returnDate -> format('y-m-d');
        
        $issue -> name = $request -> issuedName;
        $issue -> bookName = $request -> issuedBook;
        $issue -> dateIssued = $today;
        $issue -> dateReturn = $returnDate;
        $bookIssued -> Availability = "Issued"; 
        
        $bookIssued -> save();
        $memberIssued -> save();
        $issue -> save();
        $data = User::all();
        $member = User::where('havePending' , 'clear') -> get();
        $book = Library::where('Availability' , 'Available') -> get();
        return view('page.RegisterIssues' , compact('data' , 'bookIssued' , 'member' , 'book'));

    }

    //function to return the book issued
    public function issueReturned($id){

        $bookIssued = bookIssue::find($id);
        $IssuedName = User::where('name' , $bookIssued -> name) -> first();
        $IssuedBook = library::where('name' , $bookIssued -> bookName) -> first();
        $issueList = new IssuedHistory();

        $issueList -> NameIssued = $IssuedName -> name;
        $issueList -> BookIssued = $IssuedBook -> name;
        $issueList -> dateExpectedReturn = $bookIssued -> dateReturn;
        $issueList -> dateIssued = $bookIssued -> dateIssued;
        $today = new DateTime("now");
        $issueList -> dateReturned = $today;
        
        $IssuedName -> havePending = "clear";
        $IssuedBook -> Availability = "Available";

        $issueList -> save();
        $IssuedName -> save();
        $IssuedBook -> save();
        $bookIssued -> delete();

        
        $issued = BookIssue::all();
        $data = User::all();
        return view('page.ListIssue' , compact('issued'  , 'data'));
    }

    //function to go to lost book page
    public function LostBook(){

        $data = user::all();
        $lost = Library::where('Availability' , 'Lost') -> get();
        return view('Page.LostBook' , compact('data' , 'lost'));
    }

    //function to recover lost book
    public function recoverBook($id){
        $recovered = Library::find($id);
        $recovered -> Availability = "Available";
        $recovered -> save();
        $data = User::all();
        $lost = Library::where('Availability' , 'Lost') -> get();
        return view('page.LostBook' , compact('data' , 'lost'));
    }

    // function to go to issue history page
    public function issueHistory(){
        $data = user::all();
        $issueList = IssuedHistory::all();
        return view('page.IssuedHistory' , compact('data' , 'issueList'));
    }

    ////////////////////////////////
    //Author Function
    ///////////////////////////////

    //function to go to register Author Page
    public function registerAuthorSuperAdmin(){
        $data = user::all();
        $listAuthor = Author::where('haveComplete' , 0) ->get();
        return view('page.AuthorReg' , compact('data' , 'listAuthor'));
    }

    //function to register new author
    public function registerAuthorNew(Request $request){
        if (Author::where('authorName' , $request->author) -> get() -> count() == 0){

            //register for non-existing author
            $Author = new Author();
            $Author -> authorName = $request -> author;
            $Author -> email = $request -> email;
            $Author -> phoneNo = $request -> phoneNo;
            $Author -> haveComplete = true;

        } else {
            
            //register for existing author
            $Author = Author::where('authorName' , $request->author) -> get() -> first();
            $Author -> authorName = $request -> author;
            $Author -> email = $request -> email;
            $Author -> phoneNo = $request -> phoneNo;
            $Author -> haveComplete = true;
        }
        
        $Author -> save();
        $data = User::all();
        $book = Library::all();
        $listAuthor = Author::where('haveComplete' , 0) ->get();
        return view('page.AuthorReg' , compact('data'  , 'listAuthor', "book"));
    }

    //function to go to author list
    public function authorList(){
        $data = user::all();
        $author = author::all();
        $book = Library::all();
        return view('Page.AuthorList' , compact('data' , 'author' , 'book'));
    }

    //function to delete author by id
    public function deleteAuthor($id){
        $authorDel=author::find($id);
        $authorDel->delete();
        $data = user::all();
        $author = author::all();
        $book = Library::all();
        return view('Page.AuthorList' , compact('data' , 'author' , 'book'));
    }

    //function to go to update author page
    public function authorUpdate($id){
        $author = author::find($id);
        $data = User::all();
        $book = Library::all();
        return view('Page.AuthorUpdate', compact('data', 'author', 'book'));
    }

     //function to update author  
     public function AuthorUpdateDetails(Request $request,$id){
        $data = User::all();
        $author = author::find($id);
        $author->authorName= $request->authorName;
        $author->email= $request->email;
        $author->phoneNo= $request->phoneNo;
        $author -> haveComplete = true;
        $author->save();
        $author= author::all();
        $book = Library::all();
        return view('Page.AuthorList', compact('data' , 'author', 'book'));
    }

    //function to go to view author details by id
    public function ViewBook($id){

        $author = author::find($id);
        $book = Library::where('author' , $author -> name) -> get();
        $data = User::all();
        return view('Page.AuthorDetails' , compact('data' , 'book' , 'author'));
    }
}

