<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;

class UserController extends Controller
{
    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }
}