<?php

use Illuminate\Database\Seeder;
use Mentor\Models\Demand;
use Mentor\Models\Perfomance;
use Mentor\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Administration',
            'email' => 'adm@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            'roles' => 3
        ]);

        User::create([
            'name' => 'Mentor',
            'email' => 'mentor@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            'roles' => 2
        ]);


        User::create([
            'name' => 'Aluno',
            'email' => 'aluno@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10)
        ]);


//        factory(User::class, 10)->create()->each(function ($m) {
//            for ( $i=0; $i<=5; $i++ ) {
//                $m->demand()->save(factory(Demand::class)->make());
//            }
//        });
//
//        factory(Perfomance::class, 200)->create();
    }
}
