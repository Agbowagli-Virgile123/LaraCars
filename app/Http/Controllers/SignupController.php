<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    //Create Method
    public function Create(){
        return view("auth.signup");
    }
}
