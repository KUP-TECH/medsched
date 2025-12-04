<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\VerificationToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Dotenv\Store\File\Paths;

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

    public function verify_token_view(Request $request) {

        $user_id        = Auth::user()->id;
        $patient_id     = Patient::where('user_id', $user_id)
                        ->select(['id'])
                        ->first();

        $data['patient_id'] = $patient_id;


        return view('pages.site.verifyemail', $data);
    }


    public function verify_token(Request $request) {

        $tokeninput     = $request->input('token');
        $user_id        = Auth::user()->id;
        $patient_id     = Patient::where('user_id', $user_id)
                        ->first();
        $data['patient_id'] = $patient_id;
        $token              = VerificationToken::where('patient_id', $patient_id->id)
                            ->first();


        if(!isset($token)) {
            return redirect()
            ->route('verify_token_view');
        }
        // dd($token->token, $tokeninput);

        if($token->token == $tokeninput) {

            $patient_id->is_verified = true;
            $patient_id->save();
            return redirect()->route('patient_view');
        }
        else {
            return redirect()
            ->route('verify_token_view')
            ->with('status',
            [
                'alert' => 'alert-danger', 
                'msg'   => 'Invalid Token',
            ]);
        }


    }

    public function resend_token(Request $request) {
        $user_id        = Auth::user()->id;
        $patient_id     = Patient::where('user_id', $user_id)
                        ->select(['id'])
                        ->first();
        $data['patient_id'] = $patient_id;
        VerificationToken::where('patient_id', $patient_id->id)->delete();
        $token = Str::random(64);

        VerificationToken::create([
            'patient_id'    => $patient_id->id,
            'token'         => $token,
            'expiration'    => Carbon::now()->addHour(),
        ]);

        $message    = "This is from medsched and this is your verification token $token please dont share this to anyone";

                    Mail::raw($message, function ($message)  {
                        $message->to(Auth::user()->email)
                                ->subject('Verification Token');
                    });
        return view('pages.site.verifyemail', $data);
    }
}
