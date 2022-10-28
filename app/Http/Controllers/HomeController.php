<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Library;
use App\Models\totalMembers;
use App\Models\bookIssue;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //go to profile page
    public function profilePage()
    {
        $data = User::all();
        return view('page.profile' , compact('data'));
    }

    //function to update user information
    public function updateInfo(Request $request, $id)
    {
        $data = user::find($id);
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> save();
        return back()->with('success','Record successfully updated!');
    }

    //function to log out
    public function logout()
    {
        Auth::logout();
        return view ('auth.login');
    }

    //go to register
    public function registerBook()
    {
        $data = User::all();
        return view('page.register' , compact('data'));
    }

    //function for delete information
    public function destroy($id)
    {
        $book=Library::find($id);
        $book->delete();

        return redirect('/dashboard');
    }

    //function to go to Update Page
    public function updateBookView($id)
    {
        $data = User::all();
        $book = Library::find($id);
        return view('Page.UpdateBook', compact('data' , 'book'));
    }

    //update book registration 
    public function updateBook(Request $request,$id)
    {
        
        $data = User::all();
        $library = Library::find($id);
        $library->name= $request->name;
        $library->author= $request->author;
        $library->year= $request->year;
        $library->price= $request->price;
        $library->save();
        $book= Library::all();
        
        return view('AdminPanel', compact('data' , 'book'));
    }

    //upload book registration
    public function upload(Request $request)
    {
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

    //go to register member page
    public function registerMember(){
        $data = User::all();
        return view('page.registerMember' , compact('data'));
    }

    //go to totalMember Page
    public function totalMember(){
        $member = totalMembers::all();
        $data = User::all(); 
        return view('page.totalMember' , compact('member'  , 'data'));
    }

    //go to Issued Book page
    public function Issue(){
        $issued = BookIssue::all();
        $data = User::all(); 
        return view('page.Issue' , compact('issued'  , 'data'));
    }

    public function registerissues(){
        $data = User::all();
        return view('page.issues' , compact('data'));
    }


}
