<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'first_name' => 'Webmaster',
            'surname' => 'MSSNLAGOS',
            'email' => 'webmaster@mssnlagos.net',
            'password' => bcrypt('webmaster@mssnlagos.net'),
            'status' => 'admin',
           
        ]);

        DB::table('users')->insert([
            'first_name' => 'Super',
            'surname' => 'Doctor',
            'email' => 'doctor@admin.com',
            'password' => bcrypt('password'),
            'status' => 'doctor',
        ]);

        DB::table('users')->insert([
            'first_name' => 'Super',
            'surname' => 'Nurse',
            'email' => 'nurse@admin.com',
            'password' => bcrypt('password'),
            'status' => 'nurse',
        ]);

        DB::table('users')->insert([
            'first_name' => 'Super',
            'surname' => 'Pharmacist',
            'email' => 'pharmacist@admin.com',
            'password' => bcrypt('password'),
            'status' => 'pharmacist',
        ]);

        DB::table('users')->insert([
            'first_name' => 'Lab',
            'surname' => 'Scientist',
            'email' => 'labscientist@admin.com',
            'password' => bcrypt('password'),
            'status' => 'lab_scientist',
        ]);

        DB::table('users')->insert([
            'first_name' => 'Record',
            'surname' => 'Officer',
            'email' => 'recordofficer@admin.com',
            'password' => bcrypt('password'),
            'status' => 'record_officer',
        ]);
    }
}
