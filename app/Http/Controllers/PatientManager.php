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
            'fname'     => 'required',
            'mname'     => 'nullable',
            'lname'     => 'required',
            'dob'       => 'required',
            'address'   => 'required',
            'contactno' => 'required',
            'email'     => 'required',
            'password'  => 'required|confirmed'
        ]);

        db::beginTransaction();
        
        try {

            $user = User::create($validated);
            Patient::create([
                'user_id' => $user->id,
            ]);
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
