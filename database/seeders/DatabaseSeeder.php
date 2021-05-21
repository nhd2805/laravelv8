<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
    }
}
class UsersTableSeeder extends Seeder{
	public function run(){
		DB::table('users')->insert([
			['name'=>'abc','email'=>'abc@gmail.com','password'=>bcrypt('123456')],
		    ['name'=>'123','email'=>'123@gmail.com','password'=>bcrypt('123456')],
		    ['name'=>'xyz','email'=>'xyz@gmail.com','password'=>bcrypt('123456')]
	]);
}
}
