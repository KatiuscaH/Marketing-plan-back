<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
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
            'email' => "p@p.com",
            'email_verified_at' => now(),
            'nombre' => 'a',
            'apellido' => 'a',
            'password' => bcrypt("123"), // secret
            'remember_token' => str_random(10),
            'rol' => 0,
        ]);

        User::create([
            'email' => "e@e.com",
            'email_verified_at' => now(),
            'nombre' => 'a',
            'apellido' => 'a',
            'password' => bcrypt("123"), // secret
            'remember_token' => str_random(10),
            'rol' => 1,
        ]);
        User::create([
            'email' => "m@m.com",
            'email_verified_at' => now(),
            'nombre' => 'a',
            'apellido' => 'a',
            'password' => bcrypt("123"), // secret
            'remember_token' => str_random(10),
            'rol' => 2,
        ]);
    }
}
