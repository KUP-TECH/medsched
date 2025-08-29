<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Site extends Controller
{
    public function home(Request $request) {


        return view('pages.site.home');
    }


    public function login(){

        return view('pages.site.loginpage');
    }


    public function create(){

        return view('pages.site.createaccount');
    }
}
