<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function profilePage(){
        $data = User::all();
        return view('page.profile' , compact('data'));
    }

    public function updateInfo(Request $request, $id){

        $data = user::find($id);
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> save();
        return back()->with('success','Record successfully updated!');
    }

    public function logout(){
        Auth::logout();
        return view ('auth.login');
    }
}
