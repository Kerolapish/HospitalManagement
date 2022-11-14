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
        $listAuthor = Author::all();
        return view('Book.BookRegister' , compact('data' ,'listAuthor'));
    }
    
    //function to register book
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
        return view('Book.BookRegister' , compact('data' , 'listAuthor')) -> with('successBook', 'has been inserted' );
    }

    //go to total book page(Admin Book)
    public function BookTotal(){
        $data = user::all();
        $book = Library::all();
        return view('Book.BookTotal' , compact('data' , 'book'));
    }

     //function delete book page
     public function deleteBook($id){
        $book=Library::find($id);
        $book->delete();
        return redirect('/dashboard');
    }

    //go to update book page
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
        $issuedCount = bookIssue::count();
        $lostbookCount =  Library::where('Availability' , 'Lost' ) -> get();
        $lostBook = $lostbookCount -> count();
        return view('Book.BookPanel', compact('data' , 'book' , 'bookCount' , 'issuedCount', 'lostBook'));
    }


    //go to register new author(Admin Book)
    public function registerAuthor(){
        $listAuthor = Author::where('haveComplete' , 0) ->get();
        $data = User::all();
        return view('Book.AuthorRegister' , compact('data' , 'listAuthor'));
    }

    //function to register new author
    public function registerNewAuthor(Request $request){
         
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
        return view('Book.AuthorRegister' , compact('data'  , 'listAuthor', "book"));

    }

    //function to go to list of author
    public function AuthorList(){
        $data = user::all();
        $author = author::all();
        $book = Library::all();
        return view('Book.AuthorList' , compact('data' , 'author' , 'book'));
    }

    //function to delete author by id
    public function deleteAuthor($id){
        $author=author::find($id);
        $author->delete();
        return redirect('/Book/AuthorList');
    }

    //go to go to Author update page
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
        $author->email= $request->email;
        $author->phoneNo= $request->phoneNo;
        $author -> haveComplete = true;
        $author->save();
        $author= author::all();
        $book = Library::all();
        return view('Book.AuthorList', compact('data' , 'author', 'book'));
    }
}
