<?php

namespace App\Http\Controllers;

use App\Helpers\PermissionHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\student;
use App\Models\Modules;
use Illuminate\Support\Facades\Hash;
class AuthCtrl extends Controller
{
   
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'password'  => 'required',
        ]);


        if ($validator->fails()) {



            return redirect()
            ->route('login')->with([
                'invalid' => 'There was a problem with your input',
            ]);
        }

        $credentials = $request->only('email', 'password');


        //debug 

        // $user = User::where('email', $request->email)->first();

        // dd( Hash::check( $request->password, $user->password),  $user->password, bcrypt('@default_123'), $request->password);



        



        if (Auth::attempt($credentials)) {
            $request
            ->session()
            ->regenerate();
            
      
           

            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with([
            'invalid' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout() {
        Auth::logout();
        session()->invalidate();
        session()->regenerate();

        return redirect()->route('home');
    }


   
    

}
