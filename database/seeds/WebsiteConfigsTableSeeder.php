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

        $WebsiteConfig['kategori']		= 'slider';
        $WebsiteConfig['config']        =   [
                                                'slider1'           =>  [
                                                                            'url'    =>'slider1.jpg',
                                                                            'link'   => 'http://kidzo'
                                                                        ],
                                                'slider2'           =>  [
                                                                            'url'    =>'slider2.jpg',
                                                                            'link'   => 'http://kidzo'
                                                                        ],
                                                'slider3'           =>  [
                                                                            'url'    =>'slider3.jpg',
                                                                            'link'   => 'http://kidzo'
                                                                        ]
                                            ];
        $WebsiteConfig['version']       = $version['attributes'];
        $WebsiteConfig['admin']			= 'Admin';
        $WebsiteConfig['published_at']  = strtotime('now');
        $WebsiteConfig->save();



        $WebsiteConfig 					= new WebsiteConfig;

        $version                        = Version::first();

        $WebsiteConfig['kategori']      = 'contact';
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
