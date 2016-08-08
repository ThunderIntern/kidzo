<?php

use Illuminate\Database\Seeder;

use App\Models\Version;
use App\Models\WebsiteConfig;

class WebsiteConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		WebsiteConfig::truncate();

        $WebsiteConfig 					= new WebsiteConfig;

        $version 						= Version::first();

        $WebsiteConfig['category']		= 'slider';
        $WebsiteConfig['config']        =   [
                                                'slider1'           => 'slider1.jpg',
                                                'slider2'           => 'slider2.jpg',
                                                'slider3'           => 'slider3.jpg',
                                            ];
        $WebsiteConfig['version']       = $version['attributes'];
        $WebsiteConfig['admin']			= 'Admin';
        $WebsiteConfig['published_at']  = strtotime('now');
        $WebsiteConfig->save();



        $WebsiteConfig 					= new WebsiteConfig;

        $version                        = Version::first();

        $WebsiteConfig['category']      = 'contact';
        $WebsiteConfig['config']        =   [
                                                'phone'             => '081-1230123786',
                                                'address'           => 'jl. Diponegoro 12A, Malang',
                                                'facebook'          => 'facebook.com/kidzo',
                                            ];
        $WebsiteConfig['version']       = $version['attributes'];
        $WebsiteConfig['admin']         = 'Admin';
        $WebsiteConfig['published_at']  = strtotime('now');
        $WebsiteConfig->save();

    }
}
