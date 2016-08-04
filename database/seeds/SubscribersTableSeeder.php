<?php

use Illuminate\Database\Seeder;

use App\Models\Version;
use App\Models\Subscriber;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Subscriber::truncate();

        $Subscriber 					= new Subscriber;

        $Version 						= Version::first();

        $Subscriber['email']			= 'abc@gmail.com';
        $Subscriber['version']			= $Version->toArray();
        $Subscriber['is_subscribe']		= True;
        $Subscriber['unsubscribe_token']= 'askdjahusgdhagda';
        $Subscriber->save();

        $Subscriber 					= new Subscriber;

        $Subscriber['email']			= 'cde@gmail.com';
        $Subscriber['version']			= $Version->toArray();
        $Subscriber['is_subscribe']		= True;
        $Subscriber['unsubscribe_token']= 'askdjahusgdhagdh';
        $Subscriber->save();
    }
}
