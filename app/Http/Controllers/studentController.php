<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Library;
use App\Models\totalMembers;
use App\Models\bookIssue;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;
use DateTime;
use App\Models\IssuedHistory;

class studentController extends Controller
{
    //function to go to profile page
    public function userProfile(){
        $data = User::all();
        return view('User.userProfilePage' , compact('data'));
    }

    //function to go to book issued by x
    public function userBookIssued($id){
       $data = User::all();
       $issuedMember = User::find($id);
       $book = bookIssue::where('name' , $issuedMember -> name) -> get();
       return view ('User.userBookIssued' , compact('data' , 'book'));
    }

    //function to go to history page
    public function userHistory($id){
        $data = User::all();
        $history = IssuedHistory::where('NameIssued' , Auth::user() -> name) -> get();
        return view ('User.userHistory' , compact('data' , 'history'));
    }
}
