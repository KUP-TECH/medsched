<?php

namespace App\Http\Controllers;

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
                            ->where('users.id', $validated['id'])
                            ->where('users.is_active', 1)
                            ->first();
        // dd($data['patient']);

        $dob = Carbon::parse($data['patient']->dob);

        $data['age']        = (int)$dob->diffInYears(Carbon::now());

        return view('pages.medical_records.pdf.pdf', $data);

    }
}
