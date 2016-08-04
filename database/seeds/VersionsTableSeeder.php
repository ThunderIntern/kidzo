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

        $Version['version_name']		= 'Kidzo';
        $Version['domain']              = 'kidzo.id';
        $Version['is_active']			= true;
        $Version['admin']               = 'Admin';

        $Version->save();

        $Version 						= new Version;

        $Version['version_name']		= 'Sewa Mainan Anak';
        $Version['domain']				= 'sewamainananak.com';
        $Version['is_active']           = true;
        $Version['admin']               = 'Admin Satunya';

        $Version->save();        
    }
}