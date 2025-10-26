<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Patient;
use App\Models\Appointments;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    


    public function dashboard(Request $request) {

        $data['active_link']    = 'dashboard';
        $data['patient']        = Patient::count();
        $data['staff']          = Admin::count();
        $data['appointments']   = Appointments::count();
        $data['pending']        = Appointments::where('status', 'pending')->count();

        return view('pages.dashboard.view', $data);
    }


}
