<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $req) {
        $userName = $req->user;
        $password = md5($req->password);
        $user = User::where('name', $userName)->where('password', $password)->get();
        if(count($user) == 1) {
            return view('home');
        }
        return back()->with('msg', 'Credentials Invalid');
    }

    public function forgetPassword(Request $req) {

    }
}
