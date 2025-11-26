<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Throwable;

class PatientManager extends Controller
{   
    
    
    public function create(Request $request) {
        $validated = $request->validate([
            'fname'             => 'required',
            'mname'             => 'nullable',
            'lname'             => 'required',
            'dob'               => 'required',
            'address'           => 'required',
            'contactno'         => 'required',
            'gender'            => 'required',
            'civil'             => 'required',
            'idno'              => 'nullable',
            'e_contact'         => 'required',
            'e_number'          => 'required',
            'relationship'      => 'required',
            'allergies'         => 'nullable',
            'medications'       => 'nullable',
            'previuos_illness'  => 'nullable',
            'smoke'             => 'required',
            'illness'           => 'nullable',
            'email'             => 'required',
            'blood_type'        => 'required',
            'password'          => 'required|confirmed|min:8|alpha_num'
        ]);

        db::beginTransaction();
        
        try {

            $user = User::create($validated);


            if(isset($validated['allergies'])) {
                $allergies              = $validated['allergies'];
                $allergies              = explode(',', $allergies);
                $validated['allergies'] = $allergies;
            }

            if(isset($validated['medications'])) {
                $medications              = $validated['medications'];
                $medications              = explode(',', $medications);
                $validated['medications'] = $medications;
            }

            if(isset($validated['previuos_illness'])) {
                $previuos_illness              = $validated['previuos_illness'];
                $previuos_illness              = explode(',', $previuos_illness);
                $validated['previuos_illness'] = $previuos_illness;
            }

            $validated['user_id']   = $user->id;

            Patient::create($validated);
        } catch(Throwable $e) {
            DB::rollBack();
            return redirect()
            ->route('create')
            ->with('status',
            [
                'alert' => 'alert-warning', 
                'msg'   => $e->getMessage(),
            ]);
        }
        
        db::commit();


        return redirect()
            ->route('login')
            ->with('status',
            [
                'alert' => 'alert-success', 
                'msg'   => 'Account Created!',
            ]);
    }


    public function view(Request $request) {

        $search     = $request->input('search');
        $data       = [];
        $page       = $request->input('page', 1);
        $perPage    = 12;
        


        $data['patients']   = Patient::join('users','users.id','=','patient.user_id')
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
        $data['count']              = Patient::join('users','users.id','=','patient.user_id')->count();
        $data['totalPages']         = ceil($data['count'] / $perPage);
        $data['search']             = $search;
        $data['active_link']        = 'Patients';

        return view('pages.patients.view', $data);
    }
}
