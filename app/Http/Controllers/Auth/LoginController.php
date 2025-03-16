<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
}
