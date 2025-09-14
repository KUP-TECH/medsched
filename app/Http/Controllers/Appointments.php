<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointments as Appointment;
use App\Models\Patient;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Facades\DB;
class Appointments extends Controller
{
    



    public function patient_view(Request $request) {
        $data['active_link']    = 'Appoinments';

        $data['services']   = Service::where('is_active', 1)
                            ->select(['name', 'id', 'active_days', 'start', 'end'])
                            ->get();

        $data['dayMap']     = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
       
        $data['patient_id'] = Patient::where('user_id', Auth::user()->id)->first()->id;
        

        $page       = $request->input('page', 1);
        $perPage    = 8;


        $appoinments    = Appointment::where('patient_id', $data['patient_id'])
                        ->join('service', 'service.id', '=', 'appointment.service_id')
                        ->limit($perPage)
                        ->offset(($page - 1)  * $perPage)
                        ->get();
        $data['appointments'] = $appoinments;

        // dd($appoinments, $data['patient_id']);


        $data['page']       = $page;
        $data['perPage']    = $perPage;
        $data['count']      = Appointment::where('patient_id', $data['patient_id'])->count();
        $data['totalPages'] = ceil($data['count'] / $perPage);

        $data['search']     = null;
        return view('pages.appointments.patient_view', $data);
    }


    public function create_appointment(Request $request) {

        $validated = $request->validate([
            'service_id'    => 'required',
            'patient_id'    => 'required',
            'date'          => 'required',
            'start'         => 'required',
            'end'           => 'required',

        ]);


        db::beginTransaction();

        try {

            Appointment::create($validated);

        } catch (Throwable $e) {
            db::rollback();
            return  redirect()
                    ->route('patient_view')
                    ->with('status',
                    [
                        'alert' => 'alert-danger', 
                        'msg'   => $e->getMessage(),
                    ]);
        }
        db::commit();
        return  redirect()
                ->route('patient_view')
                ->with('status',
                [
                    'alert' => 'alert-success', 
                    'msg'   => 'Created Sucessfully!',
                ]);
    }
}
