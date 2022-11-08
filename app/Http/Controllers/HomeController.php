<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Library;
use App\Models\totalMembers;
use App\Models\bookIssue;
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
            return view('AdminPanel' , compact('data' , 'book' , 'issuedCount', 'bookCount', "memberCount", "lostBook"));

        } else if(Auth::user()-> role == "AdminStudent"){

            $data = User::all();
            $book = Library::all();
            $bookCount = Library::count();
            $memberCount = totalMembers::count();
            $member = totalMembers::all();
            $issuedCount = bookIssue::count();
            $lostBook = Library::where('Availability' , 'Lost') -> get();
            $lostBook = $lostBook -> count();
            return view('student.StudentPanel', compact('data' , 'book' , 'member' , 'issuedCount', 'bookCount', "memberCount", "lostBook"));

        }else if(Auth::user()-> role == "AdminBook"){

            $data = User::all();
            return view ('User.userPanel', compact('data'));

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
            return view ('User.userPanel', compact('data', 'book' , 'issuedCount' , 'bookASAPCount'));

        } else {
            return view('layouts.forbidden');
        }
    }

    //go to user management page
    public function userManagement(){

        $data = User::all();
        return view ('Page.UserManagement' , compact('data'));
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
        $data -> email = $request -> email;
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
        return view('page.register' , compact('data'));
    }

    //Create book record DB
    public function upload(Request $request){
        $request->validate([
            'name'=>'required',
            'author'=>'required',
            'year'=>'required|max:4',
            'price'=>'required'

        ],
        [
            'name.required'=>'Fill the Book Name',
            'author.required'=>'Fill the Author',
            'year.required'=>'Fill the Publishing Year',
            'price.required'=>'Fill the Book Price Number'
        ]
        );
        $library = new library();
        $data = user::all();
        $library->name=$request->name;
        $library->author=$request->author;
        $library->year=$request->year;
        $library->price=$request->price;
        $library->save();
        return view('Page.register' , compact('data')) -> with('successBook', 'has been inserted');
    }

    //function for delete book
    public function delete($id){
        $book=Library::find($id);
        $book->delete();

        return redirect('/dashboard');
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
        return view('AdminPanel', compact('data' , 'book' , 'bookCount' , 'memberCount' , 'issuedCount', 'lostBook'));
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
        return view('page.totalMember' , compact('data'));
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
        $memberUpdate->birth= $request->birthDate;
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

        return view('page.totalMember', compact('data'));
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
        return redirect('/LostBook');
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

        $issue -> name = $request -> issuedName;
        $issue -> bookName = $request -> issuedBook;
        $issue -> dateIssued = $request -> issuedDate;
        $issue -> dateReturn = $request -> returnDate;
        $memberIssued -> havePending = "Pending";
        $bookIssued -> Availability = "Issued"; 
        
        $bookIssued -> save();
        $memberIssued -> save();
        $issue -> save();
        $data = User::all();
        $member = User::all();
        $book = Library::all();
        return view('page.RegisterIssues' , compact('data' , 'bookIssued' , 'member' , 'book'));
    }

    //function to return the book issued
    public function issueReturned($id){

        $bookIssued = bookIssue::find($id);
       
        $IssuedName = User::where('name' , $bookIssued -> name) -> first();
        $IssuedBook = library::where('name' , $bookIssued -> bookName) -> first();
        
        $IssuedName -> havePending = "clear";
        $IssuedBook -> Availability = "Available";

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

    //////////////////////////////////

    //Student Admin Function
    //Function to go to Membership List at student admin
    public function StudMember(){
        $member = totalMembers::all();
        $data = User::all(); 
        return view('student.StudentMember' , compact('member'  , 'data'));
    }

    //go to register issues page at student Admin
    public function StudRegIssue(){
        $member = totalMembers::where('havePending' , 'clear') -> get();
        $book = Library::where('Availability' , 'Available') -> get();
        $data = User::all();
        return view('student.StudentRegIssue' , compact('data', 'member' , 'book'));
    }

    //go to register issues page at student Admin
    public function StudentRegIssue(){
        $member = totalMembers::where('havePending' , 'clear') -> get();
        $book = Library::where('Availability' , 'Available') -> get();
        $data = User::all();
        return view('student.StudentRegIssue' , compact('data', 'member' , 'book'));
    }

    //go to Issued Book page at student admin
    public function StudentIssueList(){
        $issued = BookIssue::all();
        $data = User::all(); 
        return view('student.StudentIssueList' , compact('issued'  , 'data'));
    }

    //function to go to lost book page at admin student
    public function StudentLostBook(){

        $data = user::all();
        $lost = Library::where('Availability' , 'Lost') -> get();
        return view('student.StudentLost' , compact('data' , 'lost'));
    }

    //function to recover lost book
    public function StudenRecoverBook($id){
        $recovered = Library::find($id);
        $recovered -> Availability = "Available";
        $recovered -> save();
        $data = User::all();
        $lost = Library::where('Availability' , 'Lost') -> get();
        return view('page.LostBook' , compact('data' , 'lost'));
    }
}