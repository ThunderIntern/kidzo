<?php

use Illuminate\Database\Seeder;

use App\Models\Admin;

class adminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		admin::truncate();

        $admin 							= new Admin;

		$admin['username']				= 'abc';      
		$admin['password']				= '123456';    
		$admin['email']					= 'abc@gmail.com';         
		$admin['admin']					= 'Admin';     

		$admin->save();


        $admin 							= new Admin;

		$admin['username']				= 'def';      
		$admin['password']				= '789012';    
		$admin['email']					= 'def@gmail.com';      
		$admin['admin']					= 'Admin';     

		$admin->save();									
    }
}
