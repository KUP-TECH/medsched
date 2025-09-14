<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Throwable;
use Illuminate\Support\Facades\DB;

class ClinicServices extends Controller
{
    public function clinic_services(Request $request) {
        $data['active_link']    = 'Services';

        $search     = $request->get('search');
        $page       = $request->input('page', 1);
        $perPage    = 8;

        $services   = Service::where('is_active', 1)
                    ->when($search, function($query) use ($search) {
                        $query->where('name','like','%'. $search .'%');
                    })
                    ->limit($perPage)
                    ->offset(($page - 1)  * $perPage)
                    ->get();
        

        $data['services']   = $services;
        $data['page']       = $page;
        $data['perPage']    = $perPage;
        $data['count']      = Service::where('is_active', 1)
                            ->when($search, function($query) use ($search) {
                                $query->where('name','like','%'. $search .'%');
                            })->count();
        $data['totalPages'] = ceil($data['count'] / $perPage);
        $data['search']     = $search;
        $data['dayMap']     = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        


        return view('pages.clinic_services.clinic_services', $data);

    }



    public function create_service(Request $request) { 

        $validated = $request->validate([
            'name'          => 'required',
            'desc'          => 'nullable',
            'active_days'   => 'nullable|array',
            'start'         => 'nullable',
            'end'           => 'nullable',
        ]);

        db::beginTransaction();
        try {

            Service::create($validated);

        } catch (Throwable $e) {
            
            db::rollBack();

            return redirect()
            ->route('clinic_services')
            ->with('status',
            [
                'alert' => 'alert-danger', 
                'msg'   => $e->getMessage(),
            ]);
        }
        db::commit();

        return  redirect()
                ->route('clinic_services')
                ->with('status',
                [
                    'alert' => 'alert-success', 
                    'msg'   => 'Created Sucessfully!',
                ]);
    }


}
