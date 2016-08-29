<?php

use Illuminate\Database\Seeder;

use App\Models\Version;
use App\Models\emailTime;

class emailTimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		emailTime::truncate();

        $emailTime 					    = new emailTime;

        $emailTime['judul']			   = 'emailTime 1';
        $emailTime['content']          = 'askdjahusgdhagda';
        $emailTime['email']            = 'abc@abc';
        $emailTime->save();

        $emailTime 					   = new emailTime;

        $emailTime['judul']            = 'emailTime 2';
        $emailTime['content']          = 'askdjahusgdhagdh';
        $emailTime['email']            = 'def@def';
        $emailTime->save();
    }
}
