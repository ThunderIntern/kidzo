<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		user::truncate();

        $user 							= new User;

		$user['username']				= 'abc';      
		$user['password']				= '123456';    
		$user['email']					= 'graygevaldi@gmail.com'; 
		$user['name']				    = 'abc';      
		$user['phone']				    = '08123456789';    
		$user['address']			    = 'jl.palembang';         
		$user['admin']					= 'Admin';     

		$user->save();


        $user 							= new User;

		$user['username']				= 'def';      
		$user['password']				= '789012';    
		$user['email']					= '311310010@student.machung.ac.id';
		$user['name']				    = 'def';      
		$user['phone']				    = '08987654321';    
		$user['address']			    = 'jl.bandung';         
		$user['admin']					= 'Admin';     

		$user->save();									
    }
}
