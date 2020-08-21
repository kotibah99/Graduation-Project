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
        $teacherRole = Role::where('name', 'teacher')->first();
        $developerRole = Role::where('name', 'developer')->first();
        $translatorRole = Role::where('name', 'translator')->first();
        $bloggerRole = Role::where('name', 'blogger')->first();
        $studentRole = Role::where('name', 'student')->first();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'points' => 100,
            'section' => 'admin'

        ]);

        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@manager.com',
            'password' => Hash::make('12345678'),
            'points' => 100,
            'section' => 'manager'
        ]);

        $teacher = User::create([
            'name' => 'teacher',
            'email' => 'teacher@teacher.com',
            'password' => Hash::make('12345678'),
            'points' => 100,
            'section' => 'teacher'
        ]);

        $developer = User::create([
            'name' => 'developer',
            'email' => 'developer@developer.com',
            'password' => Hash::make('12345678'),
            'points' => 100,
            'section' => 'dev'
        ]);

        $translator = User::create([
            'name' => 'translator',
            'email' => 'translator@translator.com',
            'password' => Hash::make('12345678'),
            'points' => 100,
            'section' => 'translate'
        ]);

        $blogger = User::create([
            'name' => 'blogger',
            'email' => 'blogger@blogger.com',
            'password' => Hash::make('12345678'),
            'points' => 100,
            'section' => 'blogger'
        ]);

        $student = User::create([
            'name' => 'student',
            'email' => 'student@student.com',
            'password' => Hash::make('12345678'),
            'points' => 100,
            'section' => 'student'
        ]);

        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $teacher->roles()->attach($teacherRole);
        $developer->roles()->attach($developerRole);
        $translator->roles()->attach($translatorRole);
        $blogger->roles()->attach($bloggerRole);
        $student->roles()->attach($studentRole);
    }
}
