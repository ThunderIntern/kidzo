<?php

use Illuminate\Database\Seeder;

use App\Models\Version;
use App\Models\Newsletter;

class NewslettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Newsletter::truncate();

        $Newsletter 					= new Newsletter;

        $Version 						= Version::first();

        $Newsletter['email']			= 'abc@gmail.com';
        $Newsletter['version']			= $Version->toArray();
        $Newsletter['is_subscribe']		= True;
        $Newsletter['unsubscribe_token']= 'askdjahusgdhagda';
        $Newsletter->save();

        $Newsletter 					= new Newsletter;

        $Newsletter['email']			= 'cde@gmail.com';
        $Newsletter['version']			= $Version->toArray();
        $Newsletter['is_subscribe']		= True;
        $Newsletter['unsubscribe_token']= 'askdjahusgdhagdh';
        $Newsletter->save();
    }
}
