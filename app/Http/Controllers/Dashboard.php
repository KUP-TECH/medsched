<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Patient;
use App\Models\Appointments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class Dashboard extends Controller
{
    


    public function dashboard(Request $request) {

        $data['active_link']    = 'dashboard';
        $data['patient']        = Patient::count();
        $data['staff']          = Admin::count();
        $data['appointments']   = Appointments::count();
        $data['pending']        = Appointments::where('status', 'pending')->count();

        
        $apps                   = Appointments::join('service', 'service.id', '=', 'appointment.service_id')
                                ->whereBetween('date', [Carbon::today()->startOfMonth(),Carbon::today()->endOfMonth()])
                                ->select([
                                    'service.name',
                                    DB::raw('COUNT(appointment.id) as total'),
                                ])
                                ->groupBy('service.name')
                                ->get();
        
        $data['apps_label']     = $apps->pluck('name');
        $data['apps_data']      = $apps->pluck('total');

        // dd($data['apps_label'], $data['apps_data']);
        
        return view('pages.dashboard.view', $data);
    }


}
