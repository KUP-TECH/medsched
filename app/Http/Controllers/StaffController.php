<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
class StaffController extends Controller
{
    public function staff(Request $request) {
        $data['active_link']    = 'staff';
        $search     = $request->get('search');
        $page       = $request->input('page', 1);
        $perPage    = 8;

        $staff      = Admin::join('users','users.id','=','admin.user_id')
                    ->when($search, function($query) use ($search) {

                        $query->where( function($q) use ($search) {
                            $q->where('fname','like','%'. $search .'%')
                            ->orWhere('lname', 'like', '%'. $search .'%');
                        });
                        
                    })
                    ->select([
                        'users.*',
                        'admin.role',
                        'admin.start',
                        'admin.end',
                        'admin.active_days',
                    ])
                    ->where('admin.role', '!=', 'System Administrator')
                    ->where('users.is_active', 1)
                    ->limit($perPage)
                    ->offset(($page - 1)  * $perPage)
                    ->get();
        

        $data['staff']      = $staff;
        $data['page']       = $page;
        $data['perPage']    = $perPage;
        $data['search']     = $search;
        
        $data['count']      = Admin::join('users','users.id','=','admin.user_id')
                            ->when($search, function($query) use ($search) {
                                $query->where( function($q) use ($search) {
                                    $q->where('fname','like','%'. $search .'%')
                                    ->orWhere('lname', 'like', '%'. $search .'%');
                                });
                            })
                            ->where('admin.role', '!=', 'System Administrator')
                            ->where('users.is_active', 1)->count();
        $data['totalPages'] = ceil($data['count'] / $perPage);
        $data['dayMap']     = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        return view('pages.staff.view', $data);
    } 


    public function create_staff(Request $request) {
        $validated = $request->validate([
            'fname'             => 'required',
            'mname'             => 'nullable',
            'lname'             => 'required',
            'dob'               => 'required',
            'address'           => 'required',
            'contactno'         => 'required',
            'gender'            => 'required',
            'email'             => 'required',
            'password'          => 'required|confirmed',
            'role'              => 'required',
            'active_days'       => 'nullable|array'
        ]);



        db::beginTransaction();

        try {

            $user = User::create($validated);

            Admin::create([
                'user_id'       => $user->id,
                'role'          => $validated['role'],
                'active_days'   => $validated['active_days'],
            ]);

           

        } catch(Throwable $e) {
            db::rollBack();
            return redirect()
            ->route('staff')
            ->with('status',
            [
                'alert' => 'alert-danger', 
                'msg'   => $e->getMessage(),
            ]);
        }
        
        db::commit();


        return redirect()
            ->route('staff')
            ->with('status',
            [
                'alert' => 'alert-success', 
                'msg'   => 'Staff Created!',
            ]);


    }



    public function edit_staff(Request $request) {

        


    }

    public function delete_staff(Request $request) {
        $validated = $request->validate([
            'id'    => 'required',
        ]);


        db::beginTransaction();

        
        try {

            $user = User::findOrFail($validated['id']);
            $user->update(['is_active' => 0]);
           

        } catch(Throwable $e) {
            db::rollBack();
            return redirect()
            ->route('staff')
            ->with('status',
            [
                'alert' => 'alert-danger', 
                'msg'   => $e->getMessage(),
            ]);
        }
        
        db::commit();


        return redirect()
            ->route('staff')
            ->with('status',
            [
                'alert' => 'alert-info', 
                'msg'   => 'Staff Delete!',
            ]);


    }
}
