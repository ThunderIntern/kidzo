<?php

use Illuminate\Database\Seeder;

use App\Models\Version;

class VersionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Version::truncate();

        $Version 						= new Version;

        $Version['name']				= 'Kidzo';
        $Version['domain']				= 'kidzo.id';
        $Version->save();

        $Version 						= new Version;

        $Version['name']				= 'Sewa Mainan Anak';
        $Version['domain']				= 'sewamainananak.com';
        $Version->save();        
    }
}