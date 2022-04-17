<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $studentRole = Role::where('name', 'student')->first();
        

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
                   ]);

        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@manager.com',
            'password' => Hash::make('12345678'),
           
        ]);

        $student = User::create([
            'name' => 'student',
            'email' => 'student@student.com',
            'password' => Hash::make('12345678'),
           
        ]);

      
        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $student->roles()->attach($studentRole);
    }
}
