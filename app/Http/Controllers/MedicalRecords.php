<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Facades\DB;
use App\Models\Patient;
class MedicalRecords extends Controller
{
    public function medical_records(Request $request){
        $search     = $request->input('search');
        $data       = [];
        $page       = $request->input('page', 1);
        $perPage    = 12;

        $data['patients']           = Patient::leftJoin('users', 'users.id', '=', 'patient.user_id')
                                    ->where('users.is_active', 1)
                                    ->when($search, function ($query) use ($search) {
                                        return  $query
                                                ->where('fname','like', '%'. $search .'%')
                                                ->orWhere('lname','like', '%'. $search .'%');
                                    })
                                    ->offset(($page - 1) * $perPage)
                                    ->limit($perPage)
                                    ->get();


        $data['page']               = $page;
        $data['perPage']            = $perPage;
        $data['count']              = Patient::leftJoin('users', 'users.id', '=', 'patient.user_id')
                                    ->where('users.is_active', 1)
                                    ->when($search, function ($query) use ($search) {
                                        return  $query
                                                ->where('users.fname','like', '%'. $search .'%')
                                                ->orWhere('users.lname','like', '%'. $search .'%');
                                    })
                                    ->count();
        $data['totalPages']         = ceil($data['count'] / $perPage);
        $data['search']             = $search;
        $data['active_link']        = 'medical_records';


        return view('pages.medical_records.view', $data);
    }



    public function download_pdf(Request $request) {
        $validated = $request->validate([
            'id'    => 'required',
        ]);


        $data['patient']    = Patient::leftJoin('users', 'users.id', '=', 'patient.user_id')
                            ->select([
                                'users.*',
                                'patient.*',
                                'patient.id as patient_id',
                            ])                    
                            ->where('users.id', $validated['id'])
                            ->where('users.is_active', 1)
                            ->first();
        // dd($data['patient']);

        $dob = Carbon::parse($data['patient']->dob);

        $data['age']        = (int)$dob->diffInYears(Carbon::now());

        $records            = Appointments::where('patient_id', $data['patient']->patient_id)
                            ->leftJoin('service', 'service.id', '=', 'appointment.service_id')
                            ->leftJoin('admin', 'admin.id', '=', 'appointment.attendee_id')
                            ->leftJoin('users', 'users.id', '=', 'admin.user_id')
                            ->get();
        $data['records']    = $records;
        // dd($records);

        return view('pages.medical_records.pdf.pdf', $data);

    }


    public function profile(Request $request) {
        $user = Auth::user();

        $data['patient']    = Patient::leftJoin('users', 'users.id', '=', 'patient.user_id')
                            ->where('users.id', $user->id)
                            ->where('users.is_active', 1)
                            ->select([
                                'users.*',
                                'patient.*',
                                'patient.id as patient_id',
                            ])
                            ->first();
        $records            = Appointments::where('patient_id', $data['patient']->patient_id)
                            ->leftJoin('service', 'service.id', '=', 'appointment.service_id')
                            ->leftJoin('admin', 'admin.id', '=', 'appointment.attendee_id')
                            ->leftJoin('users', 'users.id', '=', 'admin.user_id')
                            ->get();
        $data['records']    = $records;
        $dob                = Carbon::parse($data['patient']->dob);
        $data['age']        = (int)$dob->diffInYears(Carbon::now());
        return view('pages.medical_records.patient_view', $data);
    }
}
