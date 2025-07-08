<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Debug extends Controller
{
    public function index(){
        
        return view('test.form');

    }
}
