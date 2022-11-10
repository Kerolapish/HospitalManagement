<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Library;
use App\Models\totalMembers;
use App\Models\bookIssue;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use DateTime;

class AdminStudentController extends Controller
{
    //Student Admin Function
    //Function to go to Membership List at student admin
    public function StudMember(){
        $member = user::where('role' , 'Student') -> get();
        $data = User::all();
        return view('student.StudentMember' , compact('member'  , 'data'));
    }

    //function to go to update book Page
    public function StudupdateBookView($id){
        $data = User::all();
        $book = Library::find($id);
        return view('student.UpdateBook', compact('data' , 'book'));
    }

    //go to register issues page at student Admin
    public function StudentRegIssue(){
        $member = user::where('role' , 'Student') -> get();
        $book = Library::where('Availability' , 'Available') -> get();
        $data = User::all();
        return view('student.StudentRegIssue' , compact('data', 'member' , 'book'));
    }

    //function to register new issue at Student Admin
    public function UploadNewIssue(Request $request){
        $issue = new bookIssue();
        $memberIssued = user::where('name' , $request -> issuedName) -> first();
        $bookIssued = library::where('name' , $request -> issuedBook) -> first();

        $issue -> name = $request -> issuedName;
        $issue -> bookName = $request -> issuedBook;
        $today = new DateTime("now");
        $today = $today -> format('y-m-d');
        $issue -> dateIssued = $today;
        $issue -> dateReturn = $request -> returnDate;
        $memberIssued -> havePending = "Pending";
        $bookIssued -> Availability = "Issued"; 
        
        $bookIssued -> save();
        $memberIssued -> save();
        $issue -> save();
        $data = User::all();
        $member = user::all();
        $book = Library::all();
        return view('student.StudentRegIssue' , compact('data' , 'bookIssued' , 'member' , 'book'));
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

    //function for declare lost book
    public function declareLost($id){
        $issued = BookIssue::find($id);
        $bookLost = Library::where('name' , $issued -> bookName ) -> first();
        $memberLost = user::where('name' , $issued -> name) -> first();

        $bookLost -> Availability = "Lost";
        $memberLost -> havePending = "Blacklisted";

        $memberLost -> save();
        $bookLost -> save();
        $issued->delete();
        return redirect('/StudentLost');
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
