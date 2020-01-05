<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'Mohamed',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('123456')
        ]);
    }

}
