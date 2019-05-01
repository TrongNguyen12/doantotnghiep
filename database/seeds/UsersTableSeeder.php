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
        $data = [
        	[
        		'name' => 'Quản Lý',
        		'email' => 'admin@gmail.com',
        		'password' => Hash::make('123456'),
        		'level'=>1,
                'created_at'=> new DateTime()
        	]
        ];
        DB::table('vp_users')->insert($data);
    }
}
