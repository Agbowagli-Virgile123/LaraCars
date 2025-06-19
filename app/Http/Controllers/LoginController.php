<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //Create Method
    public function Create(){
        
        return view("auth.login");
    }
}
