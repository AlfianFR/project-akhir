<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        $admin = new \App\Models\User();
        $admin->name = "Admin";
        $admin->email = "akuadmin@gmail.com";
        $admin->password = bcrypt("rahasia");
        $admin->role = "admin";
        $admin->save();
    }
}
