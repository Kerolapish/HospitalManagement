<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Library;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //go to profile page
    public function profilePage(){
        $data = User::all();
        return view('page.profile' , compact('data'));
    }

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

    //go to register
    public function registerBook(){
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

    public function registerMember(){
        $data = User::all();
        return view('page.registerMember' , compact('data'));
    }
}
