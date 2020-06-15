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
    }
}
