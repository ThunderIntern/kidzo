<?php

use Illuminate\Database\Seeder;

use App\Models\Version;
use App\Models\Newsletter;

class NewsletterTableSeeder extends Seeder
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

        $Newsletter['Judul']			= 'Newsletter 1';
        $Newsletter['version']			= $Version->toArray();
        $Newsletter['content']          = 'askdjahusgdhagda';
        $Newsletter->save();

        $Newsletter 					= new Newsletter;

        $Newsletter['Judul']            = 'Newsletter 2';
        $Newsletter['version']			= $Version->toArray();
        $Newsletter['content']          = 'askdjahusgdhagdh';
        $Newsletter->save();
    }
}
