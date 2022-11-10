<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Library;
use App\Models\totalMembers;
use App\Models\bookIssue;
use App\Models\Author;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;
use DateTime;

class AuthorController extends Controller
{

    //go to register book page(Admin Book)
    public function BookRegister(){
        $data = User::all();
        return view('Book.BookRegister' , compact('data'));
    }
    
    public function uploadBook(Request $request){
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
        $library->name=$request->name;
        $library->author=$request->author;
        $library->year=$request->year;
        $library->price=$request->price;
        $library->ISBN=$request->ISBN;
        $library->save();
        return view('Book.BookRegister' , compact('data')) -> with('successBook', 'has been inserted');
    }

    //go to total book page(Admin Book)
    public function BookTotal(){
        $data = user::all();
        $book = Library::all();
        return view('Book.BookTotal' , compact('data' , 'book'));
    }

     //go to total book page(Admin Book)
     public function deleteBook($id){
        $book=Library::find($id);
        $book->delete();
        return redirect('/dashboard');
    }

    public function BookUpdateView($id){
        $data = User::all();
        $book = Library::find($id);
        return view('Book.BookUpdate', compact('data' , 'book'));
    }

    //function to update book  
    public function BookUpdate(Request $request,$id){
        $data = User::all();
        $library = Library::find($id);
        $library->name= $request->name;
        $library->author= $request->author;
        $library->year= $request->year;
        $library->price= $request->price;
        $library->ISBN= $request->ISBN;
        $library->save();
        $book= Library::all();
        $bookCount = Library::count();
        $memberCount = totalMembers::count();
        $issuedCount = bookIssue::count();
        $lostbookCount =  Library::where('Availability' , 'Lost' ) -> get();
        $lostBook = $lostbookCount -> count();
        return view('Book.BookPanel', compact('data' , 'book' , 'bookCount' , 'memberCount' , 'issuedCount', 'lostBook'));
    }


    //go to total book page(Admin Book)
    public function registerAuthor(){
        $member = Library::where('role' , 'Author') -> get();
        $book = Library::where('Availability' , 'Available') -> get();
        $data = User::all();
        return view('Book.AuthorRegister' , compact('data', 'member' , 'book'));
    }

    //go to total book page(Admin Book)
    public function registerNewAuthor(Request $request){
        $Author = new Author();
        $authorName = library::where('author' , $request -> authorName) -> first();
        $bookName = library::where('name' , $request -> bookName) -> first();

        $Author -> authorName = $request -> authorName;
        $Author -> bookName = $request -> bookName;
        $Author -> email = $request -> email;
        $Author -> phoneNo = $request -> phoneNo;

        //dd($request);
        $bookName -> save();
        $authorName -> save();
        $Author -> save();
        $data = User::all();
        $member = Library::all();
        $book = Library::all();
        return view('Book.AuthorRegister' , compact('data'  , 'member' , 'book'));

    }

    //go to total book page(Admin Book)
    public function AuthorList(){
        $data = user::all();
        $author = author::all();
        return view('Book.AuthorList' , compact('data' , 'author'));
    }

    //go to total book page(Admin Book)
    public function deleteAuthor($id){
        $author=author::find($id);
        $author->delete();
        return redirect('/Book/AuthorList');
    }

    //go to total book page(Admin Book)
    public function AuthorUpdateView($id){
        $author = author::find($id);
        $data = User::all();
        return view('Book.updateAuthor', compact('data', 'author'));
    }

    //function to update book  
    public function AuthorUpdate(Request $request,$id){
        $data = User::all();
        $author = author::find($id);
        $author->authorName= $request->authorName;
        $author->bookName= $request->bookName;
        $author->email= $request->email;
        $author->phoneNo= $request->phoneNo;
        $author->save();
        $author= author::all();
        return view('Book.AuthorList', compact('data' , 'author'));
    }
}
