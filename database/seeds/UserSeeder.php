<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'andre',
            'email'=>'andre.muenstermann@gmail.com',
            'password'=>bcrypt('Wqpj2080')
        ]);
    }
}
