<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

               DB::table('users')->insert([
            'name' => 'toko',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

                   DB::table('users')->insert([
            'name' => 't',
            'email' => 'tokamenabde@gmail.com',
            'password' => bcrypt('password'),
        ]);

    }
}
