<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(['name' => "admin"]);
        Role::create(['name' => "manager"]);
        Role::create(['name' => "teacher"]);
        Role::create(['name' => "developer"]);
        Role::create(['name' => "translator"]);
        Role::create(['name' => "blogger"]);
        Role::create(['name' => "student"]);
    }
}
