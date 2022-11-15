<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Library;
use App\Models\totalMembers;
use App\Models\bookIssue;
use App\Models\IssuedHistory;
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

    //function for delete members at student admin
    public function StudentDelete($id){
        $memberdel = User::find($id);
        $memberdel->delete();
        $data = User::all();
        $member = user::where('role' , 'Student') -> get();
        return view('student.StudentMember' , compact('member' , 'data'));
    }

    //Function to go to update member page at student admin
    public function StudentUpdateView($id){
        $data = User::all();
        $member = User::find($id);
        return view('student.StudentUpdate', compact('data' , 'member'));
    }
    
    //function to revoke member blacklist at student Admin
    public function StudentrevokeMember($id){
        $revoke = User::find($id);
        $revoke -> havePending = "clear";
        $revoke -> save();
        $data = User::all();
        $member = User::where('role' , 'Student') -> get();
        return view('student.StudentMember' , compact('data' , 'member'));
    }

    //function to update member  
    public function StudentUpdateMembership(Request $request, $id){
        $data = User::all();
        $memberUpdate = User::find($id);
        $date = new DateTime($memberUpdate->period);
        
        $memberUpdate->name= $request->name;
        $memberUpdate->IcNum= $request->IcNum;
        $memberUpdate->PhoneNum= $request->PhoneNum;

        if($request -> Period == "6 Months"){
            $date->modify('+6 month');
        } else if ($request -> Period == "1 Year") {
            $date->modify('+12 month');
        } else if ($request -> Period == "2 Years"){
            $date->modify('+24 month');
        }
        $date = $date->format('Y-m-d');  
        $memberUpdate->Period= $date;
        $memberUpdate->save();
        $member = User::where('role' , 'Student') -> get();
        return view('student.StudentMember', compact('data' , 'member'));
    }

    //function to search at student
    public function StudentSearch(Request $request)
    {
        $search = $request->search;
        $member = user::where('StudentUUID','like','%'.$search.'%') -> get();
        $data = User::all();

        return view('student.StudentMember',compact('data' , 'member'));
    }

    //go to register issues page at student Admin
    public function StudentRegIssue(){
        $member = user::where('havePending' , 'clear') -> get();
        $book = Library::where('Availability' , 'Available') -> get();
        $data = User::all();
        return view('student.StudentRegIssue' , compact('data', 'member' , 'book'));
    }

    //function to register new issue at Student Admin
    public function UploadNewIssue(Request $request){
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

    //function for declare lost book at admin student
    public function StudentdeclareLost($id){
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
        return view('student.StudentLost' , compact('data' , 'lost'));
    }

    //function to recover lost book
    public function StudentRecoverBook($id){
        $recovered = Library::find($id);
        $recovered -> Availability = "Available";
        $recovered -> save();
        $data = User::all();
        $lost = Library::where('Availability' , 'Lost') -> get();
        return view('student.StudentLost' , compact('data' , 'lost'));
    }

    //function to return the book issued
    public function StudentIssueReturned($id){

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
        return view('student.StudentIssueList' , compact('issued'  , 'data'));
    }

    // function to go to issue history page at student admin
    public function StudentIssuedHistory(){
        $data = user::all();
        $issueList = IssuedHistory::all();
        return view('student.StudentIssuedHistory' , compact('data' , 'issueList'));
    }
}
