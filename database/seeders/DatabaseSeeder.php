<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user   = User::create([ 
                    'fname'     => 'Admin',
                    'lname'     => 'Admin',
                    'email'     => 'MedSched@gmail.com',
                    'password'  => '@default123',
                    'gender'    => 'male',
                    'dob'       => now(),
                    'address'   => 'Cantilan, Surigao Del Sur',
                    'contactno' => 'N/A',
                ]);
                
        $admin  = Admin::create([
                    'user_id'   => $user->id,
                    'role'      => 'System Administrator',
                ]);
        


    }
}
