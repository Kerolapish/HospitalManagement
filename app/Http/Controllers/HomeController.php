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
        $data = User::all();
        $book = Library::all();
        $bookCount = Library::count();
        $memberCount = totalMembers::count();
        $member = totalMembers::all();
        $issuedCount = bookIssue::count();
        return view('AdminPanel' , compact('data' , 'book' , 'member' , 'issuedCount', 'bookCount', "memberCount"));
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
        return view('Page.register' , compact('data')) -> with('success');
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
        $memberCount = totalMembers::count();
        $issuedCount = bookIssue::count();

        return view('AdminPanel', compact('data' , 'book' , 'bookCount' , 'memberCount' , 'issuedCount'));
    }

    //go to total book page
    public function totalBook(){
        $data = user::all();
        $book = Library::all();
        return view('page.totalBook' , compact('data' , 'book'));
    }
    
    //////////////////////////////////

    // MEMBER FUNCTION
    //go to register member page
    public function registerMember(){
        $data = User::all();
        return view('page.registerMember' , compact('data'));
    }

    //function to register new member
    public function registerNewMember(Request $request){
        $member = new totalMembers();
        $member -> name = $request -> memberName;
        $member -> IcNum = $request -> memberIC;
        $member -> birth = $request -> birthDate;
        $member -> PhoneNum = $request -> phonemember; 
        $member -> period = $request -> memberPeriod;
        $member->save();
        $data = User::all();
        return view('page.registerMember' , compact('data'));
    }

    //function for delete members
    public function deleteMembers($id){
        $member=totalMembers::find($id);

        $member->delete();

        return redirect('/totalMember');
    }

    //go to totalMember Page
    public function totalMember(){
        $member = totalMembers::all();
        $data = User::all(); 
        return view('page.totalMember' , compact('member'  , 'data'));
    }

    //////////////////////////////////

    // ISSUES FUNCTION
    //function for delete Issues
    public function deleteIssues($id){
        $issued=BookIssue::find($id);

        $issued->delete();

        return redirect('/Issue');
    }

    //go to Issued Book page
    public function Issue(){
        $issued = BookIssue::all();
        $data = User::all(); 
        return view('page.ListIssue' , compact('issued'  , 'data'));
    }

    //go to register issues page
    public function registerissues(){
        $member = totalMembers::all();
        $book = Library::all();
        $data = User::all();
        return view('page.RegisterIssues' , compact('data', 'member' , 'book'));
    }

    //function to register new issue
    public function registerNewIssue(Request $request){

        $issue = new bookIssue();
        // $memberIssued = totalMembers::find($request -> issuedName); //TODO - line 17
        $bookIssued = library::where('name' , $request -> issuedBook) -> first();
        $issue -> name = $request -> issuedName;
        $issue -> bookName = $request -> issuedBook;
        $issue -> dateIssued = $request -> issuedDate;
        $issue -> dateReturn = $request -> returnDate;
        $bookIssued -> Availability = "Issued"; 

        // totalmembers column pending = Issued;

        $bookIssued -> save();
        $issue -> save();
        $data = User::all();
        $member = totalMembers::all();
        $book = Library::all();
        return view('page.RegisterIssues' , compact('data' , 'bookIssued' , 'member' , 'book'));
    }
}
